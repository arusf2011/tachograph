<?php
    $f3 = Base::instance();

    $f3->set('trip',$db->exec('SELECT * FROM trips WHERE id = '.$_SESSION['trip_id']));
    $trip = $f3->get('trip');
    $f3->set('trip',$db->exec('SELECT * FROM users WHERE id = '.$trip[0]['id_user']));
    $user = $f3->get('trip');
    $f3->set('global_settings',$db->exec('SELECT * FROM settings'));
    $global_settings = $f3->get('global_settings');
    $f3->set('city_start',$db->exec('SELECT name FROM cities WHERE short_name = "'.$trip[0]['city_from'].'"'));
    $city_start = $f3->get('city_start');
    $f3->set('city_end',$db->exec('SELECT name FROM cities WHERE short_name = "'.$trip[0]['city_to'].'"'));
    $city_end = $f3->get('city_end');
    $f3->set('comp_from',$db->exec('SELECT name FROM companies WHERE short_name = "'.$trip[0]['comp_from'].'"'));
    $comp_from = $f3->get('comp_from');
    $f3->set('comp_to',$db->exec('SELECT name FROM companies WHERE short_name = "'.$trip[0]['comp_to'].'"'));
    $comp_to = $f3->get('comp_to');
    $f3->set('trip_user_nickname',$db->exec('SELECT nickname FROM users WHERE id = "'.$trip[0]['id_user'].'"'));
    $trip_user_nickname = $f3->get('trip_user_nickname');
    $f3->set('convoy_name',$db->exec('SELECT name FROM convoys WHERE id = '.$trip[0]['participate_convoy']));
    $convoy_name = $f3->get('convoy_name');
    switch($trip[0]['game'])
    {
        case 0:
            $game = 'ETS2';
            break;
        case 1:
            $game = 'ATS';
            break;
        default:
            $game = 'ETS2';
    }
    ?>
        <h3><b><?= $f3->get('trip_no').' '.$trip[0]['id'].' ('.$game.')' ?></b></h3>
        <p class="small text-primary mb-1">
            <b><?php echo $f3->get('status') ?> -</b> 
            <?php
                switch($trip['status'])
                {
                    case 0:
                        echo $f3->get('new');
                        break;
                    case 2:
                        echo $f3->get('rejected');
                        break;
                    case 3:
                        echo $f3->get('accepted');
                        break;
                    default:
                        echo NULL;
                }
            ?>
        </p>
        <p class="small text-primary mb-1">
            <b><?php echo $f3->get('datetime_beg') ?></b><br>
            <?php echo date($global_settings[8]['value'].' '.$global_settings[9]['value'],strtotime($trip[0]['date_beg'])) ?>
        </p>
        <p class="small text-primary mb-1">
            <b><?php echo $f3->get('datetime_end') ?></b><br>
            <?php echo date($global_settings[8]['value'].' '.$global_settings[9]['value'],strtotime($trip[0]['date_end'])) ?>
        </p>
        <p class="small text-primary mb-1">
            <b><?= $f3->get('load') ?></b><br>
            <?= $f3->get($trip[0]['load_type']) ?>
        </p>
        <p class="small text-primary mb-1">
            <b><?= $f3->get('tonnage') ?></b><br>
            <?= $trip[0]['tonnage'].' '.$global_settings[4]['value'] ?>
        </p>
        <p class="small text-primary mb-1">
            <b><?= $f3->get('from') ?></b><br>
            <?= $city_start[0]['name'].' - '.$comp_from[0]['name'] ?>
        </p>
        <p class="small text-primary mb-1">
            <b><?= $f3->get('to') ?></b><br>
            <?= $city_end[0]['name'].' - '.$comp_to[0]['name'] ?>
        </p>
        <p class="small text-primary mb-1"><b><?= $f3->get('fuel_used_trip').' -</b> '.$trip[0]['fuel_used'].' '.$global_settings[5]['value'] ?></p>
		<p class="small text-primary mb-1"><b><?= $f3->get('driven_distance').' -</b> '.$trip[0]['distance'].' '.$global_settings[4]['value'] ?></p>
        <?php
            $avg_fuel = @(($trip[0]['fuel_used'] / $trip[0]['distance']) * 100);
        ?>
		<p class="small text-primary mb-1"><b><?= $f3->get('average_use_of_fuel').' -</b> '.round($avg_fuel,1).' '.$global_settings[5]['value'].'/100 '.$global_settings[4]['value'] ?></p>
        <p class="small text-primary mb-1"><b><?= $f3->get('gained_money').' -</b> '.$trip[0]['money'].' '.$global_settings[7]['value'] ?></p>
        <p class="small text-primary mb-1"><b><?= $f3->get('damage').' -</b> '.$trip[0]['damage'].'%' ?></p>
        <p class="small text-primary mb-1"><b><?= $f3->get('participated_convoy').' '.$convoy_name[0]['name'] ?></b></p>
        <p class="small text-primary mb-1"><b><?= $f3->get('image_end') ?></b></p>
		<img src="<?= $trip[0]['image_end'] ?>" class="img-fluid image_end" id="image_end_img">
        <script>
            // Get the modal
            var modal = document.getElementById("image_end_div");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("image_end_img");
            var modalImg = document.getElementById("img_modal");
            var captionText = document.getElementById("caption");
            img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close_img_end")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() { 
            modal.style.display = "none";
            }
        </script>
    <?php
    