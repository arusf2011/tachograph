<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';
    $user_id = $_SESSION['user_id'];
    $role_id = $_SESSION['role_id'];
    $f3->set('result',$db->exec('UPDATE users SET role_id = '.$role_id.' WHERE id = '.$user_id));
    $result = $f3->get('result');
    if($result == true)
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['role_id']);
        header('Location: ./../../modrole_success');
        exit();
    }
    else
    {
        header('Location: ./list_users/1');
        exit();
    }