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
    
    $f3->set('user_id',$db->exec('SELECT id FROM users WHERE nickname = ?',$_SESSION['nickname']));
    $id_user = $f3->get('user_id');
    $game = intval($_SESSION['game']);
    $from_city = $_SESSION['from_city'];
    $from_company = $_SESSION['from_company'];
    $to_city = $_SESSION['to_city'];
    $to_company = $_SESSION['to_company'];
    $load = $_SESSION['load'];
    $tonnage = intval($_SESSION['tonnage']);
    $used_truck = $_SESSION['used_truck'];
    $distance = intval($_SESSION['distance']);
    $fuel_used = intval($_SESSION['fuel_used']);
    $damage = intval($_SESSION['damage']);
    $money = intval($_SESSION['money']);
    $datetime_beg = $_SESSION['datetime_beg'];
    $datetime_end = $_SESSION['datetime_end'];
    $participate_convoy = $_SESSION['participate_convoy'];
    $files = $_SESSION['files'];
    $name = array_keys($files);
    $name = $name['0'];
    if($files[0] == false)
    {
        $f3->set('result',$db->exec('INSERT INTO trips VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,0,?,0,?)',
            array($from_city,                               //(NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,0,?)
            $from_company,
            $to_city,
            $to_company,
            $datetime_beg,
            $datetime_end,
            $load,
            $tonnage,
            $distance,
            $fuel_used,
            $damage,
            $money,
            $name,
            $id_user[0]['id'],
            $participate_convoy)
        ));
        $result = $f3->get('result');
        if($result == true)
        {
            unset(
                $_SESSION['game'],
                $_SESSION['from_city'],
                $_SESSION['from_company'],
                $_SESSION['to_city'],
                $_SESSION['to_company'],
                $_SESSION['load'],
                $_SESSION['tonnage'],
                $_SESSION['used_truck'],
                $_SESSION['distance'],
                $_SESSION['fuel_used'],
                $_SESSION['damage'],
                $_SESSION['money'],
                $_SESSION['datetime_beg'],
                $_SESSION['datetime_end'],
                $_SESSION['participate_convoy'],
                $_SESSION['files'],
                $_SESSION['error']);
            header('Location: ./addtrip_success');
            exit();
        }
        else
        {
            header('Location: ./add_trip/2');
            exit();
        }
    }
    else
    {
        header('Location: ./add_trip/1');
        exit();
    }