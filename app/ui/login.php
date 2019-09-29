<?php
    $f3=Base::instance();
    session_start();
    $f3->set('global_settings_arr',$db->exec('SELECT * FROM settings'));
    $global_settings = $f3->get('global_settings_arr');
    if(isset($_SESSION['nickname']))
    {
      header('Location: ./dashboard');
    }
?>
<!DOCTYPE html>
<html>
	<head>
        <title><?php echo $f3->get('login_title'); ?></title>
        <link href="./css/login.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
	    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="<?= $global_settings[1]['value'] ?>" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="POST" action="./signin" autocomplete="on">
                <span id="reauth-email" class="reauth-email"></span>
                <?php
                    if($_SESSION['error'] == 1)
                    {
                        ?>
                        <div class="alert alert-danger text-center"><?php echo $f3->get('wrong_pass'); ?></div>
                        <?php
                        unset($_SESSION['error']);
                    }
                    else if($_SESSION['error'] == 2)
                    {
                        ?>
                        <div class="alert alert-danger text-center"><?php echo $f3->get('wrong_nickname'); ?></div>
                        <?php
                        unset($_SESSION['error']);
                    }
                    else if($_SESSION['error'] == 3)
                    {
                        ?>
                        <div class="alert alert-danger text-center"><?php echo $f3->get('expired_url'); ?></div>
                        <?php
                        unset($_SESSION['error']);
                    }
                    else if($_SESSION['error'] == 4)
                    {
                        ?>
                        <div class="alert alert-danger text-center"><?php echo $f3->get('used_url'); ?></div>
                        <?php
                        unset($_SESSION['error']);
                    }
                    if($_SESSION['success'] == 'reset_pass')
                    {
                        ?>
                        <div class="alert alert-success text-center"><?php echo $f3->get('reset_pass_success'); ?></div>
                        <?php
                        unset($_SESSION['success']);
                    }
                    else if($_SESSION['success'] == 'new_pass')
                    {
                        ?>
                        <div class="alert alert-success text-center"><?php echo $f3->get('new_pass_success'); ?></div>
                        <?php
                        unset($_SESSION['success']);
                    }
                ?>
                <input type="text" name="nickname" id="inputEmail" autocomplete="nickname" class="form-control" placeholder="<?php echo $f3->get('nickname'); ?>" required autofocus>
                <input type="password" name="pass" id="inputPassword" autocomplete="current-password" class="form-control" placeholder="<?php echo $f3->get('password'); ?>" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit"><?php echo $f3->get('signin'); ?></button>
            </form><!-- /form -->
            <a href="./reset_password" class="forgot-password">
                <?php echo $f3->get('forgotpass_login'); ?>
            </a>
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