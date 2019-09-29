<?php
    $f3=Base::instance();
    $md = \Markdown::instance();
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
    </head>
	<body>
	    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="<?= $global_settings[1]['value'] ?>" />
            <p id="profile-name" class="profile-name-card"></p>
            <?php
                $url_vtc = file_get_contents('https://api.truckersmp.com/v2/vtc/'.intval($global_settings[3]['value']));
                $vtc = json_decode($url_vtc);
            ?>
            <?= $md->convert($vtc->response->information) ?>
            <h3><b><?= $f3->get('rules') ?></b></h3>
            <?= $md->convert($vtc->response->rules) ?>
            <h3><b><?= $f3->get('requirements') ?></b></h3>
            <?= $md->convert($vtc->response->requirements) ?>
            <h5><b><?= $f3->get('ready_to_recruit') ?></b></h5>
            <small><i><?= $f3->get('disclaimer_steam') ?></i></small>
            <a href="./login_steam" class="btn btn-secondary mt-3"><i class="fab fa-steam"></i> <?= $f3->get('login_with_steam') ?></a>
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