<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';
    if(!isset($_SESSION['nickname']))
    {
      header('Location: ./login');
      exit();
    }
    $f3->set('user_data',$db->exec('SELECT * FROM users WHERE nickname = ?',$_SESSION['nickname']));
    $user_data = $f3->get('user_data');
    $f3->set('roles_arr',$db->exec('SELECT * FROM roles'));
    $roles = $f3->get('roles_arr');
    $role = $user_data[0]['role_id'];
    if($roles[$role-1]['admin'] == false)
    {
        header('Location: ./dashboard');
        exit();
    }
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