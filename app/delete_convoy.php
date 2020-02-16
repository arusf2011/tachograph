<?php
    $f3 = Base::instance();
    session_start();
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
    $f3->set('global_settings',$db->exec('SELECT * FROM settings'));
    $global_settings = $f3->get('global_settings');
    $f3->set('convoy_name',$db->exec('SELECT name FROM convoys WHERE id = "'.intval($_SESSION['convoy_id']).'"'));
    $convoy_name = $f3->get('convoy_name');
    ?>
        <h3><b><?= $f3->get('u_are_about_del').' '.$convoy_name[0]['name'] ?></b></h3>
        <form method="post" action="./delconvoy/<?= intval($_SESSION['convoy_id']) ?>">
            <label><?= $f3->get('are_u_sure_delconvoy') ?></label><br>
            <button type="submit" class="btn btn-danger mt-2"><i class="fas fa-trash"></i> <?= $f3->get('remove_convoy') ?></button>
        </form>