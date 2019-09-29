<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';
    $name = $_SESSION['role_name'];
    $short_name = $_SESSION['role_shortname'];
    $admin = intval($_SESSION['role_admin']);
    $edit_user = intval($_SESSION['role_edit_user']);
    $color = $_SESSION['role_color'];
    $f3->set('result',$db->exec('INSERT INTO roles VALUES (NULL,?,?,?,?,?)',
        array($name,$short_name,$admin,$edit_user,$color)
    ));
    $result = $f3->get('result');
    if($result == true)
    {
        unset(
            $_SESSION['role_name'],
            $_SESSION['role_shortname'],
            $_SESSION['role_admin'],
            $_SESSION['role_edit_user'],
            $_SESSION['role_color']
        );
        header('Location: ./addrole_success');
        exit();
    }
    else
    {
        header('Location: ./roles/1');
        exit();
    }