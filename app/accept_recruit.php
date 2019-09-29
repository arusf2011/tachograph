<?php
    $f3 = Base::instance();
    session_start();
    $f3->set('global_settings',$db->exec('SELECT * FROM settings'));
    $global_settings = $f3->get('global_settings');
    $message_mail = $_SESSION['message'];
    $message_notification = $f3->get('welcome_message');
    $recruit_id = intval($_SESSION['recruit_id']);
    $type = 'accepted_recruit';
    $f3->set('change_status',$db->exec('UPDATE recrutation SET status = 2 WHERE id = ?',$recruit_id));
    $change_status = $f3->get('change_status');
    $f3->set('user_data',$db->exec('SELECT * FROM recrutation WHERE id = ?',$recruit_id));
    $user_data = $f3->get('user_data');
    $pass = password_generate(10);
    $pass_hash = password_hash($pass,PASSWORD_DEFAULT);
    $url_tmpid = file_get_contents('https://api.truckersmp.com/v2/player/'.intval($user_data[0]['steam_id']));
    $tmpid = json_decode($url_tmpid);
    $tmpid = $tmpid->response->id;
    $f3->set('add_user',$db->exec('INSERT INTO users VALUES (NULL,?,?,?,NULL,?,?,"","",?,2)',array(
        $user_data[0]['nickname'],
        $user_data[0]['email'],
        $pass_hash,
        $user_data[0]['ats'],
        $tmpid,
        $user_data[0]['dlcs']
    )));
    $add_user = $f3->get('add_user');
    $id_user = $db->lastInsertId();
    $f3->set('notify',$db->exec('INSERT INTO notifications VALUES (NULL,?,?,?,false)',array($id_user,$type,$message_notification)));
    $notify = $f3->get('notify');
    if($notify && $change_status && $add_user)
    {
        unset(
            $_SESSION['message'],
            $_SESSION['user_id'],
            $_SESSION['recruit_id']
        );
        $hash=uniqid(NULL,TRUE);
        $smtp = new SMTP ($global_settings[13]['value'],$global_settings[15]['value'],$global_settings[14]['value'],$global_settings[11]['value'],$global_settings[12]['value']);
        $smtp->set('From', '"'.$global_settings[0]['value'].'" <'.$global_settings[11]['value'].'>');
        $smtp->set('To', '<'.$user_data[0]['email'].'>');
        $smtp->set('Subject', $f3->get('welcome_to_company'));  
        $smtp->set('Errors-to', '<'.$global_settings[11]['value'].'>');
        $smtp->set('Content-Type', 'multipart/alternative; boundary="'.$hash.'"');

        $html = $f3->get('accept_recruit_firstpart').$message_mail.'<br><a href="'.$_SERVER['SERVER_NAME'].'">'.$_SERVER['SERVER_NAME'].'</a><br>'.$f3->get('nickname').' - '.$user_data[0]['nickname'].'<br>'.$f3->get('password').' - '.$pass.'<br>'.$f3->get('accept_recruit_secondpart');
        
        $eol="\r\n";
        $body  = '--'.$hash.$eol;
        $body .= 'Content-Type: text/html; charset=UTF-8'.$eol;
        $body .= $html.$eol.$eol;

        $sent = $smtp->send($body, TRUE);


        $mylog = $smtp->log();

        if ($sent)
        {
            header('Location: ./accepted_recruit');
            exit();
        }
        else
        {
            exit($mylog);
        }
    }
    else
    {
        header('Location: ./../recrutation/error_db');
        exit();
    }