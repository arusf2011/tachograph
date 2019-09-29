<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';
    $name = $_SESSION['truck_name'];
    $short_name = $_SESSION['truck_shortname'];
    $game = $_SESSION['truck_game'];
    $f3->set('result',$db->exec('INSERT INTO trucks VALUES (NULL,?,?,?)',
        array($name,$short_name,$game)
    ));
    $result = $f3->get('result');
    if($result == true)
    {
        unset($_SESSION['truck_name']);
        unset($_SESSION['truck_shortname']);
        unset($_SESSION['truck_game']);
        header('Location: ./addtruck_success');
        exit();
    }
    else
    {
        header('Location: ./trucks/1');
        exit();
    }