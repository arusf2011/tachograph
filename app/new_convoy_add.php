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
    $name = $_SESSION['name'];
    $date = $_SESSION['date'];
    $time_beg = $_SESSION['time_beg'];
    $time_groupup = $_SESSION['time_groupup'];
    $game = intval($_SESSION['game']);
    $from_city = $_SESSION['from_city'];
    $from_company = $_SESSION['from_company'];
    $to_city = $_SESSION['to_city'];
    $to_company = $_SESSION['to_company'];
    $server_game = $_SESSION['server_game'];
    $server_voip = $_SESSION['server_voip'];
    $route = $_SESSION['route'];
    $image_start = $_SESSION['image_start'];
    $image_end = $_SESSION['image_end'];
    $rules = $_SESSION['rules'];
    $private = intval($_SESSION['private']);
    $f3->set('result',$db->exec('INSERT INTO convoys VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
        array($from_city,
              $from_company,
              $to_city,
              $to_company,
              $name,
              $game,
              $date,
              $time_beg,
              $time_groupup,
              $server_game,
              $server_voip,
              $route,
              $image_start,
              $image_end,
              $rules,
              $private)
        )
    );
    $result = $f3->get('result');
    if($result)
    {
        unset($_SESSION['name']);
        unset($_SESSION['date']);
        unset($_SESSION['time_beg']);
        unset($_SESSION['time_groupup']);
        unset($_SESSION['game']);
        unset($_SESSION['from_city']);
        unset($_SESSION['from_company']);
        unset($_SESSION['to_city']);
        unset($_SESSION['to_company']);
        unset($_SESSION['server_game']);
        unset($_SESSION['server_voip']);
        unset($_SESSION['route']);
        unset($_SESSION['image_start']);
        unset($_SESSION['image_end']);
        unset($_SESSION['rules']);
        unset($_SESSION['error']);
        header('Location: ./addconvoy_success');
        exit();
    }
    else
    {
        header('Location: ./add_convoy/1');
        exit();
    }