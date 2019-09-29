<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';
    $id = $_SESSION['city_id'];
    $f3->set('result',$db->exec('DELETE FROM cities WHERE id = '.$id));
    $result = $f3->get('result');
    if($result == true)
    {
        unset($_SESSION['city_id']);
        header('Location: ./../delcity_success');
        exit();
    }
    else
    {
        header('Location: ./cities/1');
        exit();
    }