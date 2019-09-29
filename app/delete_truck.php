<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';
    $id = $_SESSION['truck_id'];
    $f3->set('result',$db->exec('DELETE FROM trucks WHERE id = '.$id));
    $result = $f3->get('result');
    if($result == true)
    {
        unset($_SESSION['truck_id']);
        header('Location: ./../deltruck_success');
        exit();
    }
    else
    {
        header('Location: ./trucks/1');
        exit();
    }