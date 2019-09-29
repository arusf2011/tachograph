<?php
    $f3 = Base::instance();
    session_start();
    $f3->set('get_user_id',$db->exec('SELECT id FROM users WHERE nickname = ?',$_SESSION['nickname']));
    $get_user_id = $f3->get('get_user_id');
    $f3->set('result',$db->exec('UPDATE notifications SET is_read = 1 WHERE user_id = ? AND is_read = 0',$get_user_id[0]['id']));
    $result = $f3->get('result');
    if($result)
    {
        exit();
    }
    else
    {
        header('Location: ./500');
        exit();
    }