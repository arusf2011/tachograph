<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';
    $short_name = $_SESSION['load_shortname'];
    $game = $_SESSION['load_game'];
    $tonnage = $_SESSION['load_tonnage'];
    $f3->set('result',$db->exec('INSERT INTO loads VALUES (NULL,?,?,?)',
        array($short_name,$game,$tonnage)
    ));
    $result = $f3->get('result');
    if($result == true)
    {
        unset($_SESSION['load_shortname'],$_SESSION['load_game'],$_SESSION['load_tonnage']);
        header('Location: ./addload_success');
        exit();
    }
    else
    {
        header('Location: ./loads/1');
        exit();
    }