<?php
    $f3=Base::instance();
    $f3->set('global_settings_arr',$db->exec('SELECT * FROM settings'));
    $global_settings = $f3->get('global_settings_arr');
?>
<!DOCTYPE html>
<html>
	<head>
        <title><?php echo $f3->get('register_title'); ?></title>
        <link href="./css/register.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/dd99fb3228.js"></script>
        <style>
            body
            {
                height:100vh;
            }
        </style>
    </head>
	<body>
	    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="<?= $global_settings[1]['value'] ?>" />
            <p id="profile-name" class="profile-name-card"></p>
            <h2><b><?= $f3->get('application_added') ?></b></h2>
            <p><?= $f3->get('soon_reply') ?></p>
            <?php
                $url_vtc = file_get_contents('https://api.truckersmp.com/v2/vtc/'.intval($global_settings[3]['value']));
                $vtc = json_decode($url_vtc);
                if($vtc->response->socials->twitter != NULL)
                {
                    ?>
                    <a href="<?= $vtc->response->socials->twitter ?>" target="_blank" class="btn text-light mt-2" style="background-color: #00aced;"><i class="fab fa-twitter"></i> Twitter</a>
                    <?php
                }
                if($vtc->response->socials->facebook != NULL)
                {
                    ?>
                    <a href="<?= $vtc->response->socials->facebook ?>" target="_blank" class="btn text-light mt-2" style="background-color: #3C5A99;"><i class="fab fa-facebook-square"></i> Facebook</a>
                    <?php
                }
                if($vtc->response->socials->twitch != NULL)
                {
                    ?>
                    <a href="<?= $vtc->response->socials->twitch ?>" target="_blank" class="btn text-light mt-2" style="background-color: #6441A4;"><i class="fab fa-twitch"></i> Twitch</a>
                    <?php
                }
                if($vtc->response->socials->playstv != NULL)
                {
                    ?>
                    <a href="<?= $vtc->response->socials->playstv ?>" target="_blank" class="btn text-light mt-2" style="background-color: #14b3b2;"><i class="fas fa-film"></i> PlaysTV</a>
                    <?php
                }
                if($vtc->response->socials->discord != NULL)
                {
                    ?>
                    <a href="<?= $vtc->response->socials->discord ?>" target="_blank" class="btn text-light mt-2" style="background-color: #7289DA;"><i class="fab fa-discord"></i> Discord</a>
                    <?php
                }
                if($vtc->response->socials->youtube != NULL)
                {
                    ?>
                    <a href="<?= $vtc->response->socials->youtube ?>" target="_blank" class="btn text-light mt-2" style="background-color: #FF0000;"><i class="fab fa-youtube"></i> YouTube</a>
                    <?php
                }
            ?>
            <a href="https://truckersmp.com/vtc/<?= $global_settings[3]['value'] ?>" target="_blank" class="btn text-light mt-2" style="background-color:#222;"><i class="fas fa-truck"></i> TruckersMP VTC</a>
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