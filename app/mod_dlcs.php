<?php
    $f3 = Base::instance();
    session_start();
    $nickname = $_SESSION['nickname'];
    $arr_dlcs = $_SESSION['dlcs'];
    for($i = 0;$i < count($arr_dlcs); $i++)
    {
        if($i == 0)
        {
            $dlcs .= $arr_dlcs[$i];
        }
        else
        {
            $dlcs .= ','.$arr_dlcs[$i];
        }
    }
    $dlcs = substr($dlcs,3);
    $f3->set('result',$db->exec('UPDATE users SET dlcs = ? WHERE nickname = ?',array($dlcs,$nickname)));
    $result = $f3->get('result');
    if($result)
    {
        unset($_SESSION['dlcs']);
        header('Location: ./moddlcs_success');
        exit();
    }
    else
    {
        header('Location: ./settings/1');
        exit();
    }