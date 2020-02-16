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
    $id = $_SESSION['convoy_id'];
    $server_game = $_SESSION['server_game'];
    $server_voip = $_SESSION['server_voip'];
    $route = $_SESSION['route'];
    $image_start = $_SESSION['image_start'];
    $image_end = $_SESSION['image_end'];
    $rules = $_SESSION['rules'];
    $private = intval($_SESSION['private']);
    $f3->set('result',$db->exec('UPDATE convoys SET server_game = ?, server_voip = ?, route = ?, image_start = ?, image_end = ?, rules = ?, private = ? WHERE id = ?',
        array($server_game,
              $server_voip,
              $route,
              $image_start,
              $image_end,
              $rules,
              $private,
              $id)
        )
    );
    $result = $f3->get('result');
    if($result)
    {
        unset($_SESSION['error']);
        header('Location: ./addconvoy_success');
        exit();
    }
    else
    {
        header('Location: ./mod_convoy/'.$id.'/1');
        exit();
    }