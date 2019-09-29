<?php
    $f3=Base::instance();
    session_start();
    $f3->set('global_settings_arr',$db->exec('SELECT * FROM settings'));
    $global_settings = $f3->get('global_settings_arr');
    include_once './app/assets/userInfo.php';
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
                if(isset($_SESSION['error']) && $_SESSION['error'] == '1')
                {
                ?>
                <div class="alert alert-danger"><?= $f3->get('error_db') ?></div>
                <?php
                unset($_SESSION['error']);
                }
            ?>
            <form method="post" action="./new_application">
                <label for="nickname"><?= $f3->get('nickname') ?><span style="color:red;font-size: 20px;">*</span></label>
                <input type="text" name="nickname" id="nickname" class="form-control" value="<?= $_SESSION['steam_personaname'] ?>" required>
                <input type="hidden" name="steam_id" value="<?= $_SESSION['steam_steamid'] ?>">
                <input type="hidden" name="steam_link" value="<?= $_SESSION['steam_profileurl'] ?>">
                <label for="on_tmp"><?= $f3->get('areu_on_tmp') ?><span style="color:red;font-size: 20px;">*</span></label>
                <select name="on_tmp" id="on_tmp" class="form-control" required>
                    <option value=""><?php echo $f3->get('select_option') ?></option>
                    <option value="0"><?php echo $f3->get('no') ?></option>
                    <option value="1"><?php echo $f3->get('yes') ?></option>
                </select>
                <label for="ats"><?= $f3->get('have_u_ats') ?><span style="color:red;font-size: 20px;">*</span></label>
                <select name="ats" id="ats" class="form-control" required>
                    <option value=""><?php echo $f3->get('select_option') ?></option>
                    <option value="0"><?php echo $f3->get('no') ?></option>
                    <option value="1"><?php echo $f3->get('yes') ?></option>
                </select>
                <label for="dlcs" class="mt-2"><?php echo $f3->get('which_dlcs_u_own') ?><span style="color:red;font-size: 20px;">*</span></label>
                <select name="dlcs" id="dlcs" class="form-control" required multiple size="6">
                    <?php
                        $f3->set('dlcs',$db->exec('SELECT * FROM dlcs'));
                        $dlcs = $f3->get('dlcs');
                        foreach($dlcs as $dlc)
                        {
                            ?>
                            <option value="<?= $dlc['short_name'] ?>"><?= $dlc['name'] ?></option>
                            <?php
                        }
                    ?>
                </select>
                <label for="age"><?= $f3->get('age') ?><span style="color:red;font-size: 20px;">*</span></label>
                <input type="number" name="age" class="form-control" required>
                <label for="email"><?= $f3->get('email') ?><span style="color:red;font-size: 20px;">*</span></label>
                <input type="email" name="email" id="email" class="form-control" required>
                <label for="why_u"><?= $f3->get('why_u') ?><span style="color:red;font-size: 20px;">*</span></label>
                <textarea name="why_u" id="why_u" class="form-control" required></textarea>
                <label for="why_we"><?= $f3->get('why_we') ?><span style="color:red;font-size: 20px;">*</span></label>
                <textarea name="why_we" id="why_we" class="form-control" required></textarea>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-2"><i class="fas fa-paper-plane"></i> <?= $f3->get('send_application') ?></button>
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