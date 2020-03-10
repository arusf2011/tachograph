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
    $f3->set('global_settings',$db->exec('SELECT * FROM settings'));
    $global_settings = $f3->get('global_settings');
    $roles = $f3->get('roles_arr');
    $role = $user_data[0]['role_id'];
    if($roles[$role-1]['admin'] == false)
    {
        header('Location: ./dashboard');
        exit();
    }
    $nick_new = $_SESSION['nick_new'];
    $email = $_SESSION['email'];
    $arr_dlcs = $_SESSION['dlcs'];
    $truck_ets2 = $_SESSION['truck_ets2'];
    $truck_ats = $_SESSION['truck_ats'];
    $rules = intval($_SESSION['rules']);
    $ats = intval($_SESSION['ats']);
    $tmpid = intval($_SESSION['tmpid']);
    for($i = 0;$i < count($arr_dlcs); $i++)
    {
        if($i == 0)
        {
            $dlcs .= $arr_dlcs[$i];
        }
        else
        {
            $dlcs .= ','.$arr_dlcs[$i];
        }
    }
    if($rules == true)
    {
        $f3->set('result',$db->exec('INSERT INTO users VALUES (NULL,?,?,"",NULL,?,?,?,?,?,0)',
            array($nick_new,
            $email,
            $ats,
            $tmpid,
            $truck_ets2,
            $truck_ats,
            $dlcs)
        ));
        $hash_pass=uniqid(NULL,TRUE);
        $expiration_date = date('Y-m-d H:i',time()+28880);
        $f3->set('result_ins',$db->exec('INSERT INTO pass_url VALUES(NULL,?,?,?,false)',array($db->lastInsertId(),$hash_pass,$expiration_date)));
        $result_ins = $f3->get('result_ins');
        $result = $f3->get('result');
        if($result && $result_ins)
        {
            unset($_SESSION['nick_new']);
            unset($_SESSION['email']);
            unset($_SESSION['dlcs']);
            unset($_SESSION['truck_ets2']);
            unset($_SESSION['truck_ats']);
            unset($_SESSION['rules']);
            unset($_SESSION['ats']);
            unset($_SESSION['tmpid']);
            unset($_SESSION['error']);
            $hash=uniqid(NULL,TRUE);
            $smtp = new SMTP ($global_settings[13]['value'],$global_settings[15]['value'],$global_settings[14]['value'],$global_settings[11]['value'],$global_settings[12]['value']);
            $smtp->set('From', '"'.$global_settings[0]['value'].'" <'.$global_settings[11]['value'].'>');
            $smtp->set('To', '<'.$user_data[0]['email'].'>');
            $smtp->set('Subject', $f3->get('welcome_to_company'));  
            $smtp->set('Errors-to', '<'.$global_settings[11]['value'].'>');
            $smtp->set('Content-Type', 'text/html; charset=UTF-8; boundary="'.$hash.'"');
    
            $html = $f3->get('accept_recruit_firstpart').$message_mail.'<br><a href="'.$_SERVER['SERVER_NAME'].'">'.$_SERVER['SERVER_NAME'].'</a><br>'.$f3->get('nickname').' - '.$user_data[0]['nickname'].'<br>'.$f3->get('password').' - <a href="'.$_SERVER['SERVER_NAME'].'/set_password/'.$hash_pass.'">'.$f3->get('click_resetpass').'</a><br>'.$f3->get('accept_recruit_secondpart');
            
            $eol="\r\n";
            $body .= $html.$eol.$eol;
    
            $sent = $smtp->send($body, TRUE);
    
    
            $mylog = $smtp->log();
    
            if ($sent)
            {
                header('Location: ./adduser_success');
                exit();
            }
            else
            {
                exit($mylog);
            }
        }
        else
        {
            header('Location: ./add_user/2');
            exit();
        }
    }
    else
    {
        header('Location: ./add_user/1');
        exit();
    }