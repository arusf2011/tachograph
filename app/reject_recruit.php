<?php
    $f3 = Base::instance();
    session_start();
    if(!isset($_SESSION['nickname']))
    {
      header('Location: ./login');
      exit();
    }
    $f3->set('user_data',$db->exec('SELECT * FROM users WHERE nickname = ?',$_SESSION['nickname']));
    $user_data = $f3->get('user_data');
    $f3->set('roles_arr',$db->exec('SELECT * FROM roles'));
    $roles = $f3->get('roles_arr');
    $role = $user_data[0]['role_id'];
    if($roles[$role-1]['admin'] == false)
    {
        header('Location: ./dashboard');
        exit();
    }
    $f3->set('global_settings',$db->exec('SELECT * FROM settings'));
    $global_settings = $f3->get('global_settings');
    $message = $_SESSION['message'];
    $recruit_id = intval($_SESSION['recruit_id']);
    $f3->set('change_status',$db->exec('UPDATE recrutation SET status = 1 WHERE id = ?',$recruit_id));
    $change_status = $f3->get('change_status');
    if($change_status)
    {
        unset(
            $_SESSION['message'],
            $_SESSION['recruit_id']
        );
        $hash=uniqid(NULL,TRUE);
        $smtp = new SMTP ($global_settings[13]['value'],$global_settings[15]['value'],$global_settings[14]['value'],$global_settings[11]['value'],$global_settings[12]['value']);
        $smtp->set('From', '"'.$global_settings[0]['value'].'" <'.$global_settings[11]['value'].'>');
        $smtp->set('To', '<'.$user_data[0]['email'].'>');
        $smtp->set('Subject', $f3->get('information_from_company'));  
        $smtp->set('Errors-to', '<'.$global_settings[11]['value'].'>');
        $smtp->set('Content-Type', 'multipart/alternative; boundary="'.$hash.'"');

        $html = $f3->get('reject_recruit_firstpart').$message_mail.'<br>'.$f3->get('reject_recruit_secondpart');
        
        $eol="\r\n";
        $body  = '--'.$hash.$eol;
        $body .= 'Content-Type: text/html; charset=UTF-8'.$eol;
        $body .= $html.$eol.$eol;

        $sent = $smtp->send($body, TRUE);


        $mylog = $smtp->log();

        if ($sent)
        {
            header('Location: ./rejected_recruit');
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