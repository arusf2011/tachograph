<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';
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
    $id = intval($_SESSION['user_id']);
    $reason = $_SESSION['reason'];
    $f3->set('email',$db->exec('SELECT email FROM users WHERE id = '.$id));
    $email = $f3->get('email');
    $f3->set('result1',$db->exec('DELETE FROM users WHERE id = '.$id));
    $result1 = $f3->get('result1');
    $f3->set('trips',$db->exec('SELECT * FROM trips WHERE id_user = '.$id));
    $trips = $f3->get('trips');
    if(count($trips) == 0)
    {
        $result2 = true;
    }
    else
    {
        $f3->set('result2',$db->exec('DELETE FROM trips WHERE id_user = '.$id));
        $result2 = $f3->get('result2');
    }
    if($result1 && $result2)
    {
        unset($_SESSION['user_id'],$_SESSION['reason']);
        
        $hash=uniqid(NULL,TRUE);
        $smtp = new SMTP ($global_settings[13]['value'],$global_settings[15]['value'],$global_settings[14]['value'],$global_settings[11]['value'],$global_settings[12]['value']);
        $smtp->set('From', '"'.$global_settings[0]['value'].'" <'.$global_settings[11]['value'].'>');
        $smtp->set('To', '<'.$email[0]['email'].'>');
        $smtp->set('Subject', $f3->get('information_from_company'));  
        $smtp->set('Errors-to', '<'.$global_settings[11]['value'].'>');
        $smtp->set('Content-Type', 'multipart/alternative; boundary="'.$hash.'"');

        $html = $f3->get('deluser_firstpart').$reason.'<br>'.$f3->get('deluser_secondpart');
        
        $eol="\r\n";
        $body  = '--'.$hash.$eol;
        $body .= 'Content-Type: text/html; charset=UTF-8'.$eol;
        $body .= $html.$eol.$eol;

        $sent = $smtp->send($body, TRUE);


        $mylog = $smtp->log();

        if ($sent)
        {
            header('Location: ./../deluser_success');
            exit();
        }
        else
        {
            exit($mylog);
        }
    }
    else
    {
        header('Location: ./../list_users/1');
        exit();
    }