<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';
    $f3->set('result',$db->exec('UPDATE users SET ats = true WHERE nickname = ?',$_SESSION['nickname']));
    $result = $f3->get('result');
    if($result == true)
    {
        header('Location: ./ownats_success');
        exit();
    }
    else
    {
        header('Location: ./local_settings/1');
        exit();
    }