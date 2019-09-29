<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';
    $name = $_SESSION['city_name'];
    $short_name = $_SESSION['city_shortname'];
    $game = $_SESSION['city_game'];
    $dlc = $_SESSION['city_dlc'];
    $f3->set('result',$db->exec('INSERT INTO cities VALUES (NULL,?,?,?,?)',
        array($name,$short_name,$game,$dlc)
    ));
    $result = $f3->get('result');
    if($result == true)
    {
        unset($_SESSION['city_name']);
        unset($_SESSION['city_shortname']);
        unset($_SESSION['city_game']);
        unset($_SESSION['city_dlc']);
        header('Location: ./addcity_success');
        exit();
    }
    else
    {
        header('Location: ./cities/1');
        exit();
    }