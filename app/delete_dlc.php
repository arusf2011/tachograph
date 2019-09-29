<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';
    $id = $_SESSION['dlc_id'];
    $f3->set('result',$db->exec('DELETE FROM dlcs WHERE id = '.$id));
    $result = $f3->get('result');
    if($result == true)
    {
        unset($_SESSION['dlc_id']);
        header('Location: ./../deldlc_success');
        exit();
    }
    else
    {
        header('Location: ./dlcs/1');
        exit();
    }