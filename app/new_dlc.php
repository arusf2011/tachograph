<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';
    $name = $_SESSION['dlc_name'];
    $short_name = $_SESSION['dlc_shortname'];
    $f3->set('result',$db->exec('INSERT INTO dlcs VALUES (NULL,?,?)',
        array($name,$short_name)
    ));
    $result = $f3->get('result');
    if($result == true)
    {
        unset($_SESSION['dlc_name']);
        unset($_SESSION['dlc_shortname']);
        header('Location: ./adddlc_success');
        exit();
    }
    else
    {
        header('Location: ./dlcs/1');
        exit();
    }