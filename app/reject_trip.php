<?php
    $f3 = Base::instance();
    session_start();
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
    $message = $_SESSION['message'];
    $user_id = $_SESSION['user_id'];
    $trip_id = intval($_SESSION['trip_id']);
    $type = 'rejected_trip_'.$trip_id;
    $f3->set('admin_id',$db->exec('SELECT id FROM users WHERE nickname = ?',$_SESSION['nickname']));
    $admin_id = $f3->get('admin_id');
    $f3->set('change_status',$db->exec('UPDATE trips SET status = 2, id_admin = ? WHERE id = ?',array($admin_id[0]['id'],$trip_id)));
    $change_status = $f3->get('change_status');
    $f3->set('notify',$db->exec('INSERT INTO notifications VALUES (NULL,?,?,?,false)',array($user_id,$type,$message)));
    $notify = $f3->get('notify');
    if($notify && $change_status)
    {
        unset(
            $_SESSION['message'],
            $_SESSION['user_id'],
            $_SESSION['trip_id']
        );
        header('Location: ./../rejected_trip');
        exit();
    }
    else
    {
        header('Location: ./../trips_admin/error_db');
        exit();
    }