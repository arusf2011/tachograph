<?php
    $f3 = Base::instance();
    session_start();
    $files = $_SESSION['files'];
    $name = array_keys($files);
    $name = $name['0'];
    if($files[0] == false)
    {
        $f3->set('result',$db->exec('UPDATE users SET img_profile = "'.$name.'" WHERE nickname = "'.$_SESSION['nickname'].'"'));
        $result = $f3->get('result');
        if($result)
        {
            header('Location: ./upavatar_success');
            exit();
        }
        else
        {
            header('Location: ./settings/1');
            exit();
        }
    }
    else
    {
        header('Location: ./settings/2');
        exit();
    }