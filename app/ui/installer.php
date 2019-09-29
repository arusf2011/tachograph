<?php
    $f3=Base::instance();
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
        <title><?php echo $f3->get('installer_title'); ?></title>
        <link href="./css/register.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/dd99fb3228.js"></script>
    </head>
	<body>
	    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="./images/truck_tacho.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <?php
                if(isset($_SESSION['error']) && $_SESSION['error'] == '1')
                {
                    ?>
                    <div class="alert alert-danger"><?= $f3->get('error_db') ?></div>
                    <?php
                    unset($_SESSION['error']);
                }
                else if(isset($_SESSION['error']) && $_SESSION['error'] == '2')
                {
                    ?>
                    <div class="alert alert-danger"><?= $f3->get('error_import_data') ?></div>
                    <?php
                    unset($_SESSION['error']);
                }
                else if(isset($_SESSION['error']) && $_SESSION['error'] == '3')
                {
                    ?>
                    <div class="alert alert-danger"><?= $f3->get('error_inserting_data') ?></div>
                    <?php
                    unset($_SESSION['error']);
                }
            ?>
            <h1><?= $f3->get('welcome') ?></h1>
            <p><?= $f3->get('installer_desc1') ?></p>
            <form method="post" action="./install">
                <h3><?= $f3->get('main_user') ?></h3>
                <small><?= $f3->get('main_user_desc') ?></small><br>
                <input type="text" class="form-control mt-2" name="nickname" placeholder="<?= $f3->get('nickname') ?>" required>
                <input type="email" class="form-control mt-2 mb-2" name="email" placeholder="<?= $f3->get('email') ?>" required>
                <p><?= $f3->get('installer_password') ?></p>
                <h3><?= $f3->get('global_settings') ?></h3>
                <small><?= $f3->get('global_settings_desc') ?></small>
                <h5 class="mt-2"><?= $f3->get('database') ?></h5>
                <input type="text" class="form-control mt-2" name="db_name" placeholder="<?= $f3->get('db_name') ?>" required>
                <input type="text" class="form-control mt-2" name="db_nickname" placeholder="<?= $f3->get('db_nickname') ?>" required>
                <input type="password" class="form-control mt-2" name="db_pass" placeholder="<?= $f3->get('db_pass') ?>" required>
                <input type="text" class="form-control mt-2" name="db_host" placeholder="<?= $f3->get('db_host') ?>" required>
                <h5 class="mt-2"><?= $f3->get('mail_server') ?></h5>
                <input type="text" class="form-control mt-2" name="smtp_email" placeholder="<?= $f3->get('email_address') ?>" required>
                <input type="password" class="form-control mt-2" name="smtp_pass" placeholder="<?= $f3->get('email_pass') ?>" required>
                <input type="text" class="form-control mt-2" name="smtp_method" placeholder="<?= $f3->get('method_connection') ?>" required>
                <input type="number" class="form-control mt-2" name="smtp_port" placeholder="<?= $f3->get('port_number_smtp') ?>" required>
                <input type="text" class="form-control mt-2" name="smtp_host" placeholder="<?= $f3->get('mail_server_host') ?>" required>
                <h5 class="mt-2"><?= $f3->get('vtc_settings') ?></h5>
                <input type="text" class="form-control mt-2" name="vtc_name" placeholder="<?= $f3->get('vtc_name') ?>" required>
                <input type="text" class="form-control mt-2" name="vtc_logo" placeholder="<?= $f3->get('vtc_logo') ?>" required>
                <small><?= $f3->get('vtc_logo_desc') ?></small>
                <input type="text" class="form-control mt-2" name="vtc_slogan" placeholder="<?= $f3->get('vtc_slogan') ?>" required>
                <input type="number" class="form-control mt-2" name="vtc_tmpid" placeholder="<?= $f3->get('vtc_tmpid') ?>" required>
                <h5 class="mt-2"><?= $f3->get('steam_api_key') ?></h5>
                <small>
                    <?= $f3->get('steam_api_desc') ?>
                </small>
                <input type="text" class="form-control mt-2" name="api_key" placeholder="<?= $f3->get('write_here') ?>" required>
                <hr>
                <p><?= $f3->get('installer_desc2') ?></p>
                <div class="text-center">
                    <button type="submit" class="btn btn-success"><?= $f3->get('install_now') ?></button>
                </div>
            </form>
        </div><!-- /card-container -->
    </div><!-- /container -->
	<footer class="fixed-bottom bg-dark text-light text-center">
        <p>Made with <3 by Arkadiusz Fatyga</p>
        <p>Powered by Fat-Free Framework</p>
	</footer>
	</body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>