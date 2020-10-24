<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';

    $nickname = $f3->get('nickname');
    $pass = $f3->get('pass');

    $f3->set('result',$db->exec('SELECT * FROM users WHERE nickname = ?',
        $nickname
    ));
    $result = $f3->get('result');
    if(!empty($result))
    {
        $verify_pass = password_verify($pass,$result[0]['pass_hash']);
        if($verify_pass)
        {
            $_SESSION['nickname'] = $nickname;
            unset($_SESSION['error']);
            header('Location: ./dashboard');
            exit();
        }
        else {
            header('Location: ./login/1');
            exit();
        }
    }
    else
    {
        header('Location: ./login/2');
        exit();
    }