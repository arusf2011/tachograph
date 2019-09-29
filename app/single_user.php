<?php
    $f3 = Base::instance();
    session_start();
    $f3->set('trip_count',$db->exec('SELECT count(*) as counter FROM trips WHERE id_user = '.$_SESSION['user_id']));
    $trip_count = $f3->get('trip_count');
    $f3->set('dist_driven',$db->exec('SELECT sum(distance) as dist FROM trips WHERE id_user = '.$_SESSION['user_id']));
    $dist_driven = $f3->get('dist_driven');
    if($dist_driven[0]['dist'] == '')
    {
        $dist_driven[0]['dist'] = 0;
    }
    $f3->set('fuel_used',$db->exec('SELECT sum(fuel_used) as fuel FROM trips WHERE id_user = '.$_SESSION['user_id']));
    $fuel_used = $f3->get('fuel_used');
    if($fuel_used[0]['fuel'] == '')
    {
        $fuel_used[0]['fuel'] = 0;
    }
    $f3->set('global_settings',$db->exec('SELECT * FROM settings'));
    $global_settings = $f3->get('global_settings');
    $f3->set('user_nickname',$db->exec('SELECT nickname FROM users WHERE id = "'.$_SESSION['user_id'].'"'));
    $user_nickname = $f3->get('user_nickname');
    $f3->set('suser_data',$db->exec('SELECT * FROM users WHERE id = ?',$_SESSION['user_id']));
    $suser_data = $f3->get('suser_data');
    $f3->set('role_name',$db->exec('SELECT name FROM roles WHERE id = ?',$suser_data[0]['role_id']));
    $role_name = $f3->get('role_name');
    if($fuel_used[0]['fuel'] == 0 || $dist_driven[0]['dist'] == 0)
    {
        $avg_fuel = 0;
    }
    else
    {
        $avg_fuel = @(($fuel_used[0]['fuel'] / $dist_driven[0]['dist']) * 100);
    }
    ?>
        <h3><b><?= $user_nickname[0]['nickname'] ?></b></h3>
        <p class="small text-primary mb-1"><b><?= $f3->get('role').' -</b> '.$role_name[0]['name'] ?></p>
        <p class="small text-primary mb-1">
            <b><?= $f3->get('is_on_tmp').'</b> ' ?>
            <?php
                if($suser_data[0]['tmpid'] != 0)
                {
                    echo $f3->get('yes');
                }
                else
                {
                    echo $f3->get('no');
                }
            ?>
        </p>
        <?php
            if($suser_data[0]['tmpid'] != 0)
            {
                ?>
                    <p class="small text-primary mb-1">
                        <b><?php echo $f3->get('is_in_game') ?></b>
                        <?php
                            $url_map = file_get_contents('https://api.truckyapp.com/v3/map/online?playerID='.$suser_data[0]['tmpid']);
                            $map = json_decode($url_map);
                            if($map->response->online == false)
                            {
                                ?>
                                <?= $f3->get('no') ?></p>
                                <?php
                            }
                            else
                            {
                                $url_server = file_get_contents('https://api.truckyapp.com/v3/map/online?playerID='.$suser_data[0]['tmpid']);
                                $server = json_decode($url_server);
                                ?>
                                <?= $f3->get('yes') ?></p>
                                <a href="https://ets2map.com/?follow=<?= intval($suser_data[0]['tmpid']) ?>" class="btn btn-info mb-1" target="popup" onclick="window.open('https://ets2map.com/?follow=<?= intval($suser_data[0]['tmpid']) ?>','popup','width=800,height=600'); return false;"><?= $f3->get('follow') ?></a>
                                <p class="small text-primary mb-1">
                                    <b><?= $f3->get('server') ?> - </b><?= $server->response->serverDetails->name ?><br>
                                    <b><?= $f3->get('near_city') ?></b> <?= $server->response->location->poi->realName ?>
                                </p>
                                <?php
                            }
            }
        ?>
        <p class="small text-primary mb-1"><b><?php echo $f3->get('email').' -</b> '.$suser_data[0]['email'] ?></p>
        <p class="small text-primary mb-1">
            <?php
                if(!empty($used_truck_ets2))
                {
                    $f3->set('truck_used_ets2',$db->exec('SELECT name FROM trucks WHERE short_name = "'.$suser_data[0]['truck_ets2'].'"'));
                    $used_truck_ets2 = $f3->get('truck_used_ets2');
                    $used_truck_echo = '<b>'.$f3->get('used_truck_ets2').' -</b> '.$used_truck_ets2[0]['name'];
                    echo $used_truck_echo;
                }
                else
                {
                    echo '<b>'.$f3->get('used_truck_ets2').' -</b> '.$f3->get('none');
                }
            ?>
        </p>
        <?php
            if($drivers[$i]['ats'] == true)
            {
                ?>
                    <p class="small text-primary mb-1">
                        <?php
                            $f3->set('truck_used_ats',$db->exec('SELECT name FROM trucks WHERE short_name = "'.$drivers[$i]['truck_ats'].'"'));
                            $used_truck_ats = $f3->get('truck_used_ats');
                            $used_truck_echo = '<b>'.$f3->get('used_truck_ats').' -</b> '.$used_truck_ats[0]['name'];
                            echo $used_truck_echo;
                        ?>
                    </p>
                <?php
            }
            else
            {
                ?>
                    <p class="small text-primary mb-1"><b><?= $f3->get('used_truck_ats').' -</b> '.$f3->get('none') ?></p>
                <?php
            }
        ?>
        <p class="small text-primary mb-1"><b><?= $f3->get('dlcs_owned').':' ?></b></p>
        <?php
            if(strpos($suser_data[0]['dlcs'],',') == false && !empty($suser_data[0]['dlcs']))
            {
                $f3->set('one_dlc',$db->exec('SELECT name FROM dlcs WHERE short_name = "'.$suser_data[0]['dlcs'].'"'));
                $one_dlc = $f3->get('one_dlc');
                ?>
                <ul class="small text-primary mb-1">
                    <li><?= $one_dlc[0]['name'] ?></li>
                </ul>
                <?php
            }
            else if(strpos($suser_data[0]['dlcs'],',') == true && !empty($suser_data[0]['dlcs']))
            {
                ?>
                <ul class="small text-primary mb-1">
                <?php
                $arr_dlcs = explode(',',$suser_data[0]['dlcs']);
                foreach($arr_dlcs as $dlc)
                {
                    $f3->set('one_dlc',$db->exec('SELECT name FROM dlcs WHERE short_name = "'.$dlc.'"'));
                    $one_dlc = $f3->get('one_dlc');
                    ?>
                    <li><?= $one_dlc[0]['name'] ?></li>
                <?php
                }
                ?>
                </ul>
                <?php
            }
            else 
            {
                ?>
                <p class="small text-primary mb-1"><?= $f3->get('none'); ?></p>
                <?php
            }
        ?>
        <hr>
        <p class="small text-primary mb-1"><b><?= $f3->get('stats_alltime') ?></b></p>
        <p class="small text-primary mb-1"><b><?= $f3->get('trips_done').' -</b> '.$trip_count[0]['counter'] ?></p>
        <p class="small text-primary mb-1"><b><?= $f3->get('distance_driven').' -</b> '.$dist_driven[0]['dist'].$global_settings[4]['value'] ?></p>
        <p class="small text-primary mb-1"><b><?= $f3->get('fuel_used_trip').' -</b> '.$fuel_used[0]['fuel'].$global_settings[5]['value'] ?></p>
        <p class="small text-primary mb-1"><b><?= $f3->get('fuel_economy').' -</b> '.round($avg_fuel,1).' '.$global_settings[5]['value'].'/100'.$global_settings[4]['value'] ?></p>
        <hr>
        <p class="text-default mb-1" <?php if($_SESSION['nickname'] == $suser_data[0]['nickname']) echo 'style="display: none;"' ?> ><b><?= $f3->get('disc_lookup_user') ?></b></p>