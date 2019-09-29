<?php
    $f3 = Base::instance();
    session_start();
    $f3->set('global_settings',$db->exec('SELECT * FROM settings'));
    $global_settings = $f3->get('global_settings');
    $f3->set('user_nickname',$db->exec('SELECT nickname FROM users WHERE id = "'.$_SESSION['user_id'].'"'));
    $user_nickname = $f3->get('user_nickname');
    $f3->set('suser_data',$db->exec('SELECT * FROM users WHERE id = ?',$_SESSION['user_id']));
    $suser_data = $f3->get('suser_data');
    ?>
        <h3><b><?= $f3->get('u_are_about_del').' '.$user_nickname[0]['nickname'] ?></b></h3>
        <h4><?= $f3->get('give_a_reason') ?></h4>
        <form method="post" action="./deluser/<?= $_SESSION['user_id'] ?>">
            <textarea class="form-control" name="reason"></textarea>
            <button type="submit" class="btn btn-danger mt-2"><i class="fas fa-trash"></i> <?= $f3->get('remove_user') ?></button>
        </form>