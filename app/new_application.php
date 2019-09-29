<?php
    $f3=Base::instance();
    session_start();
    $recruit_nickname = $_SESSION['recruit_nickname'];
    $recruit_steamid = $_SESSION['recruit_steam_id'];
    $arr_dlcs = $_SESSION['recruit_dlcs'];
    $recruit_steamlink = $_SESSION['recruit_steam_link'];
    $recruit_on_tmp = $_SESSION['recruit_on_tmp'];
    $recruit_ats = intval($_SESSION['recruit_ats']);
    $recruit_age = intval($_SESSION['recruit_age']);
    $recruit_email = $_SESSION['recruit_email'];
    $recruit_why_u = $_SESSION['recruit_why_u'];
    $recruit_why_we = $_SESSION['recruit_why_we'];
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
    $dlcs = substr($dlcs,3,strlen($dlcs));
    $f3->set('result',$db->exec('INSERT INTO recrutation VALUES (NULL,?,?,?,?,?,?,?,?,?,?)',
        array($recruit_nickname,
        $recruit_steamid,
        $recruit_steamlink,
        $recruit_on_tmp,
        $recruit_ats,
        $dlcs,
        $recruit_age,
        $recruit_email,
        $recruit_why_u,
        $recruit_why_we)
    ));
    $result = $f3->get('result');
    if($result == true)
    {
        session_destroy();
        session_unset();
        header('Location: ./addrecruit_success');
        exit();
    }
    else
    {
        header('Location: ./create_application/1');
        exit();
    }