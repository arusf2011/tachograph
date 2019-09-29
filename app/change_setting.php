<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';
    $id = $_SESSION['setting_id'];
    $value = $_SESSION['setting_value'];
    $f3->set('result',$db->exec('UPDATE settings SET value = "'.$value.'" WHERE id = '.$id));
    $result = $f3->get('result');
    if($result == true)
    {
        unset($_SESSION['setting_id']);
        unset($_SESSION['setting_value']);
        header('Location: ./../modsetting_success');
        exit();
    }
    else
    {
        header('Location: ./global_settings/1');
        exit();
    }