<?php
    $f3 = Base::instance();
    session_start();
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