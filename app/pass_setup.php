<?php
    $f3 = Base::instance();
    session_start();
    $pass = $_SESSION['new_pass'];
    $hash = $_SESSION['hash'];
    if(strlen($pass) >= 8)
    {
        $pass_hash = password_hash($pass,PASSWORD_DEFAULT);
        $f3->set('id_user',$db->exec('SELECT id_user FROM pass_url WHERE hash = ?',$hash));
        $id_user = $f3->get('id_user');
        $f3->set('result1',$db->exec('UPDATE pass_url SET used = true WHERE hash = ?',$hash));
        $result1 = $f3->get('result1');
        $f3->set('result2',$db->exec('UPDATE users SET pass_hash = ? WHERE id = ?',array($pass_hash,$id_user[0]['id_user'])));
        $result2 = $f3->get('result2');
        if($id_user && $result1 && $result2)
        {
            header('Location: ./login/new_pass');
            exit();
        }
        else
        {
            header('Location: ./set_password/'.$hash.'/2');
            exit();
        }
    }
    else
    {
        header('Location: ./set_password/'.$hash.'/1');
        exit();
    }