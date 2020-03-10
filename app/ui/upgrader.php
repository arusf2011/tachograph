<?php
    $f3=Base::instance();
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
        <title><?php echo $f3->get('upgrader_title'); ?></title>
        <link href="./css/register.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/dd99fb3228.js"></script>
    </head>
	<body>
	    <div class="container">
        <div class="card card-container" style="height: 82.5vh">
            <img id="profile-img" class="profile-img-card" src="./images/truck.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <?php
                if(isset($_SESSION['error']) && $_SESSION['error'] == '2')
                {
                    ?>
                    <div class="alert alert-danger"><?= $f3->get('error_import_data') ?></div>
                    <?php
                    unset($_SESSION['error']);
                }
            ?>
            <h1><?= $f3->get('welcome') ?></h1>
            <p><?= $f3->get('upgrader_desc') ?></p>
            <form method="post" action="./upgrade">
                <p><?= $f3->get('select_version') ?></p>
                <select name="version" class="form-control">
                    <option value="">----</option>
                    <option value="1_0">1.0.x</option>
                    <option value="1_0">1.1.1b</option>
                </select>
                <p class="mt-2"><?= $f3->get('alert_users') ?></p>
                <div class="text-center">
                    <button type="submit" class="btn btn-success"><?= $f3->get('upgrade_now') ?></button>
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