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
    include_once './app/functions.php';
    $f3->set('result_sel',$db->exec('SELECT id FROM users WHERE email = ?',$_SESSION['email']));
    $result_sel = $f3->get('result_sel');
    $f3->set('global_settings',$db->exec('SELECT * FROM settings'));
    $global_settings = $f3->get('global_settings');
    if(!empty($result_sel))
    {
        $hash_pass=uniqid(NULL,TRUE);
        $expiration_date = date('Y-m-d H:i',time()+28880);
        $f3->set('result_ins',$db->exec('INSERT INTO pass_url VALUES(NULL,?,?,?,false)',array($result_sel[0]['id'],$hash_pass,$expiration_date)));
        $result_ins = $f3->get('result_ins');
        if($result_ins == true)
        {
            $hash_mail=uniqid(NULL,TRUE);
            $smtp = new SMTP ($global_settings[13]['value'],$global_settings[15]['value'],$global_settings[14]['value'],$global_settings[11]['value'],$global_settings[12]['value']);
            $smtp->set('From', '"'.$global_settings[0]['value'].'" <'.$global_settings[11]['value'].'>');
            $smtp->set('To', '<'.$_SESSION['email'].'>');
            $smtp->set('Subject', $f3->get('change_password'));  
            $smtp->set('Errors-to', '<'.$global_settings[11]['value'].'>');
            $smtp->set('Content-Type', 'text/html; boundary="'.$hash_mail.'"');
            $server_name = $_SERVER['HTTP_HOST'];
            $html = $f3->get('new_password_firstpart').'<a href="'.$server_name.'/set_password/'.$hash_pass.'">'.$f3->get('click_resetpass').'</a>'.$f3->get('new_password_secondpart');
            
            $eol="\r\n";
            $body .= $html.$eol.$eol;

            $sent = $smtp->send($body, TRUE);


            $mylog = $smtp->log();

            if ($sent)
            {
                header('Location: ./list_users/reset_pass');
            }
            else
            {
                exit($mylog);
            }
        }
    }
    else
    {
        header('Location: ./list_users/1');
    }