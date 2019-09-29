<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';
    $id = $_SESSION['role_id'];
    $f3->set('result',$db->exec('DELETE FROM roles WHERE id = '.$id));
    $result = $f3->get('result');
    if($result == true)
    {
        unset($_SESSION['role_id']);
        header('Location: ./../delrole_success');
        exit();
    }
    else
    {
        header('Location: ./roles/1');
        exit();
    }