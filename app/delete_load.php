<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';
    $id = $_SESSION['load_id'];
    $f3->set('result',$db->exec('DELETE FROM loads WHERE id = '.$id));
    $result = $f3->get('result');
    if($result == true)
    {
        unset($_SESSION['load_id']);
        header('Location: ./../delload_success');
        exit();
    }
    else
    {
        header('Location: ./loads/1');
        exit();
    }