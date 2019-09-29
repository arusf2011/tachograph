<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';

    $nickname = $_SESSION['nickname'];
    $pass = $_SESSION['pass'];

    $f3->set('result',$db->exec('SELECT * FROM users WHERE nickname = ?',
        $nickname
    ));
    $result = $f3->get('result');
    if(!empty($result) && password_verify($pass,$result[0]['pass_hash']))
    {
        unset($_SESSION['error'],$_SESSION['pass']);
        header('Location: ./dashboard');
    }
    else if(!empty($result) && password_verify($pass,$result[0]['pass_hash']) == false) 
    {
        header('Location: ./login/1');
        exit();
    }
    else
    {
        header('Location: ./login/2');
        exit();
    }