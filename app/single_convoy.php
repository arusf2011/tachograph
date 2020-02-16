<?php
    $f3 = Base::instance();
    session_start();
    $f3->set('convoy_data',$db->exec('SELECT * FROM convoys WHERE id = ?',$_SESSION['convoy_id']));
    $convoy_data = $f3->get('convoy_data');

    $f3->set('c_start_name',$db->exec('SELECT name FROM cities WHERE short_name = "'.$convoy_data[0]['c_start'].'"'));
    $c_start_name = $f3->get('c_start_name');

    $f3->set('comp_start_name',$db->exec('SELECT name FROM companies WHERE short_name = "'.$convoy_data[0]['comp_start'].'"'));
    $comp_start_name = $f3->get('comp_start_name');

    $f3->set('c_end_name',$db->exec('SELECT name FROM cities WHERE short_name = "'.$convoy_data[0]['c_end'].'"'));
    $c_end_name = $f3->get('c_end_name');

    $f3->set('comp_end_name',$db->exec('SELECT name FROM companies WHERE short_name = "'.$convoy_data[0]['comp_end'].'"'));
    $comp_end_name = $f3->get('comp_end_name');
    
    $f3->set('global_settings_arr',$db->exec('SELECT * FROM settings'));
    $global_settings = $f3->get('global_settings_arr');
    ?>
        <h3><b><?= $convoy_data[0]['name'] ?></b></h3>
        <?php
            if(isset($_SESSION['nickname']))
            {
                echo '<p class="small text-primary mb-1">';
                if($convoy_data[$i]['private'] == true)
                {
                    echo $f3->get('convoy_private');
                }
                else
                {
                    echo $f3->get('convoy_public');
                }
                echo '</p>';
            }
        ?>
        <p class="small <?php if(isset($_SESSION['nickname']))  echo 'text-primary'; ?> mb-1">
            <?php
                if($convoy_data[0]['game'] == 0)
                {
                    echo $f3->get('game').' - <b>ETS2</b>';
                }
                else
                {
                    echo $f3->get('game').' - <b>ATS</b>';
                }
            ?>
        </p>
        <p class="small <?php if(isset($_SESSION['nickname']))  echo 'text-primary'; ?> mb-1">
            <?php
                echo $f3->get('date').' - <b>'.date($global_settings[8]['value'],strtotime($convoy_data[0]['date_beg_convoy'])).'</b>';
            ?>
        </p>
        <p class="small <?php if(isset($_SESSION['nickname']))  echo 'text-primary'; ?> mb-1">
            <?php
                echo $f3->get('time_beg_convoy').' - <b>'.date($global_settings[9]['value'],strtotime($convoy_data[0]['time_beg_convoy'])).'</b>';
            ?>
        </p>
        <p class="small <?php if(isset($_SESSION['nickname']))  echo 'text-primary'; ?> mb-1">
            <?php
                echo $f3->get('time_groupup').' - <b>'.date($global_settings[9]['value'],strtotime($convoy_data[0]['groupup'])).'</b>';
            ?>
        </p>
        <p class="small <?php if(isset($_SESSION['nickname']))  echo 'text-primary'; ?> mb-1">
            <?php
                echo $f3->get('from').' - <b>'.$c_start_name[0]['name'].' ('.$comp_start_name[0]['name'].')</b>';
            ?>
        </p>
        <p class="small <?php if(isset($_SESSION['nickname']))  echo 'text-primary'; ?> mb-1">
            <?php
                echo $f3->get('to').' - <b>'.$c_end_name[0]['name'].' ('.$comp_end_name[0]['name'].')</b>';
            ?>
        </p>
        <p class="small <?php if(isset($_SESSION['nickname']))  echo 'text-primary'; ?> mb-1">
            <?php
                if(empty($convoy_data[0]['server']))
                {
                    echo $f3->get('server_game').' - <b>'.$f3->get('unselected').'</b>';

                }
                else
                {
                    echo $f3->get('server_game').' - <b>'.$convoy_data[0]['server_game'].'</b>';
                }
            ?>
        </p>
        <p class="small <?php if(isset($_SESSION['nickname']))  echo 'text-primary'; ?> mb-1">
            <?php
                echo $f3->get('server_voip').' - <b>'.$convoy_data[0]['server_voip'].'</b>';
            ?>
        </p>
        <p class="small <?php if(isset($_SESSION['nickname']))  echo 'text-primary'; ?> mb-1">
            <?php
                echo $f3->get('route');
                echo '<img src="'.$convoy_data[0]['route'].'" class="img-fluid">';
            ?>
        </p>
        <p class="small <?php if(isset($_SESSION['nickname']))  echo 'text-primary'; ?> mb-1">
            <?php
                echo $f3->get('start_convoy');
                echo '<img src="'.$convoy_data[0]['image_start'].'" class="img-fluid">';
            ?>
        </p>
        <p class="small <?php if(isset($_SESSION['nickname']))  echo 'text-primary'; ?> mb-1">
            <?php
                echo $f3->get('end_convoy');
                echo '<img src="'.$convoy_data[0]['image_end'].'" class="img-fluid">';
            ?>
        </p>
        <p class="small <?php if(isset($_SESSION['nickname']))  echo 'text-primary'; ?> mb-1">
            <?php
                echo $f3->get('rules');
                echo '<b>'.$convoy_data[0]['rules'].'</b>';
            ?>
        </p>