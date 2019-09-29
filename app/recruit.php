<?php
    $f3 = Base::instance();

    $f3->set('recruit',$db->exec('SELECT * FROM recrutation WHERE id = '.$_SESSION['recruit_id']));
    $recruit = $f3->get('recruit');
    $f3->set('format_date',$db->exec('SELECT value FROM settings WHERE id = 9'));
    $date_format = $f3->get('format_date');
    ?>
        <h3><b><?= $f3->get('nickname').' - </b>'.$recruit[0]['nickname'] ?></h3>
        <p class="small text-primary mb-1"><b><?php echo $f3->get('email').' - </b>'.$recruit[0]['email'] ?></p>
        <p class="small text-primary mb-1"><b><?= $f3->get('age').' - </b>'.$recruit[0]['age'].' '.$f3->get('years_old') ?></p>
        <?php
            if($recruit[0]['ats'] == true)
            {
                ?>
                <p class="small text-primary mb-1"><b><?= $f3->get('ats_owner').' - </b>'.$f3->get('yes') ?></p>
                <?php
            }
            else
            {
            ?>
                <p class="small text-primary mb-1"><b><?= $f3->get('ats_owner').' - </b>'.$f3->get('no') ?></p>
                <?php
            }
            if($recruit[0]['on_tmp'] == true)
            {
                ?>
                <p class="small text-primary mb-1"><b><?= $f3->get('is_on_tmp').'</b> '.$f3->get('yes') ?></p>
                <?php
                $url_user = file_get_contents('https://api.truckersmp.com/v2/player/'.intval($recruit[0]['steam_id']));
                $user = json_decode($url_user);
                $date_join = date($date_format[0]['value'],strtotime($user->response->joinDate));
                if($user->response->displayBans == false)
                {
                    ?>
                    <p class="small text-primary mb-1">
                        <?= $f3->get('blocked_checkban') ?>
                    </p>
                    <p class="small text-primary mb-1">
                        <?= $f3->get('on_tmp_from').$date_join ?>
                    </p>
                    <?php
                }
                else
                {
                    $url_bans = file_get_contents('https://api.truckersmp.com/v2/bans/'.intval($recruit[0]['steam_id']));
                    $bans = json_decode($url_bans);
                    $arr_bans = $bans->response;
                    $count_arr_bans = count($arr_bans);
                    $count_bans = 0;
                    for($i = 0;$i < $count_arr_bans; $i++)
                    {
                        if($ban['reason'] == '@BANBYMISTAKE' || $ban['reason'] = 'test')
                        {
                            $count_bans = $count_bans;
                        }
                        else
                        {
                            $count_bans += 1;
                        }
                    }
                    ?>
                    <p class="small text-primary mb-1">
                        <b><?= $f3->get('amount_of_bans').' - </b>'.$count_bans ?>
                    </p>
                    <p class="small text-primary mb-1">
                        <?= $f3->get('on_tmp_from').$date_join ?>
                    </p>
                    <?php
                }
            }
            else
            {
            ?>
                <p class="small text-primary mb-1"><b><?= $f3->get('is_on_tmp').'</b>'.$f3->get('no') ?></p>
                <?php
            }
        ?>
        <p class="small text-primary mb-1"><b><?= $f3->get('dlcs_owned').':' ?></b></p>
        <?php
            if(strpos($recruit[0]['dlcs'],',') == false && !empty($recruit[0]['dlcs']))
            {
                $f3->set('one_dlc',$db->exec('SELECT name FROM dlcs WHERE short_name = "'.$recruit[0]['dlcs'].'"'));
                $one_dlc = $f3->get('one_dlc');
                ?>
                <ul class="small text-primary mb-1">
                    <li><?= $one_dlc[0]['name'] ?></li>
                </ul>
                <?php
            }
            else if(strpos($recruit[0]['dlcs'],',') == true && !empty($recruit[0]['dlcs']))
            {
                ?>
                <ul class="small text-primary mb-1">
                <?php
                $arr_dlcs = explode(',',$recruit[0]['dlcs']);
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
        </ul>
        <p class="small text-primary mb-1">
            <b><?= $f3->get('why_you') ?></b><br>
            <?= $recruit[0]['why_u'] ?>
        </p>
        <p class="small text-primary mb-1">
            <b><?= $f3->get('why_us') ?></b><br>
            <?= $recruit[0]['why_us'] ?>
        </p>
        <div class="row mt-2">
            <div class="col">
                <button class="btn btn-success btn-block" data-toggle="collapse" data-target="#accept">
                    <i class="fas fa-check fa-fw"></i> <?= $f3->get('accept') ?>
                </button>
            </div>
            <div class="col">
                <button class="btn btn-danger btn-block" data-toggle="collapse" data-target="#reject">
                    <i class="fas fa-times fa-fw"></i> <?= $f3->get('reject') ?>
                </button>
            </div>
        </div>
        <div class="collapse mt-3" id="accept">
            <form method="post" action="./accept_recruit/<?= $recruit[0]['id'] ?>">
                <label><?= $f3->get('message_to_user') ?><font color="red">*</font></label><br>
                <textarea class="form-control" name="message" required></textarea>
                <button type="submit" class="btn btn-info btn-block mt-1"><i class="fas fa-check fa-fw"></i> <?= $f3->get('accept') ?></button>
            </form>
        </div>
        <div class="collapse mt-3" id="reject">
            <form method="post" action="./reject_recruit/<?= $recruit[0]['id'] ?>">
                <label><?= $f3->get('message_to_user') ?><font color="red">*</font></label><br>
                <textarea class="form-control" name="message" required></textarea>
                <button type="submit" class="btn btn-info btn-block mt-1"><i class="fas fa-times fa-fw"></i> <?= $f3->get('reject') ?></button>
            </form>
        </div>
        <script>
            $(document).ready(function(){
                $(".btn-success").click(function(){
                    $("#accept").collapse('show');
                    $("#reject").collapse('hide');
                });
                $(".btn-danger").click(function(){
                    $("#accept").collapse('hide');
                    $("#reject").collapse('show');
                });
            });
        </script>
    <?php
    