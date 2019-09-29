<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';
    $game = $_SESSION['game'];
    $truck = $_SESSION['truck'];
    if($game == false)
    {
        $f3->set('result',$db->exec('UPDATE users SET truck_ets2 = "'.$truck.'" WHERE nickname = "'.$_SESSION['nickname'].'"'));
        $result = $f3->get('result');
        if($result == true)
        {
            unset($_SESSION['game']);
            unset($_SESSION['truck']);
            header('Location: ./../modtruck_success');
            exit();
        }
        else
        {
            header('Location: ./local_settings/1');
            exit();
        }
    }
    else
    {
        $f3->set('result',$db->exec('UPDATE users SET truck_ats = "'.$truck.'" WHERE nickname = "'.$_SESSION['nickname'].'"'));
        $result = $f3->get('result');
        if($result == true)
        {
            unset($_SESSION['game']);
            unset($_SESSION['truck']);
            header('Location: ./../modtruck_success');
            exit();
        }
        else
        {
            header('Location: ./local_settings/1');
            exit();
        }
    }
    