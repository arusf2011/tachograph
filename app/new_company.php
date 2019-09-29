<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';
    $name = $_SESSION['company_name'];
    $short_name = $_SESSION['company_shortname'];
    $game = intval($_SESSION['company_game']);
    $f3->set('result',$db->exec('INSERT INTO companies VALUES (NULL,?,?,?)',
        array($name,$short_name,$game)
    ));
    $result = $f3->get('result');
    if($result == true)
    {
        unset($_SESSION['company_name']);
        unset($_SESSION['company_shortname']);
        unset($_SESSION['company_game']);
        header('Location: ./addcompany_success');
        exit();
    }
    else
    {
        header('Location: ./companies/1');
        exit();
    }