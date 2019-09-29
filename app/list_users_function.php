<?php
    $f3 = Base::instance();
    session_start();

    $f3->set('drivers',$db->exec('SELECT * FROM users'));
    $drivers = $f3->get('drivers');
    $f3->set('trucks',$db->exec('SELECT short_name, name FROM trucks'));
    $trucks = $f3->get('trucks');
    $f3->set('roles',$db->exec('SELECT * FROM roles'));
    $roles = $f3->get('roles');

    $f3->set('admin_data',$db->exec('SELECT role_id FROM users WHERE nickname = ?',$_SESSION['nickname']));
    $admin_data = $f3->get('admin_data');

    $count_drivers = count($drivers);
    for($i = 0; $i < count($drivers);$i++)
    {
        ?>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100">
                    <div class="card-header">
                        <h2 class="<?= $roles[$drivers[$i]['role_id']-1]['color'] ?>"><b><?= $drivers[$i]['nickname'] ?></b></h2> 
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <p class="small text-primary mb-1"><?php echo $f3->get('email').' - '.$drivers[$i]['email'] ?></p>
                                <p class="small text-primary mb-1">
                                    <?php
                                    if(!empty($used_truck_ets2))
                                    {
                                        $f3->set('truck_used_ets2',$db->exec('SELECT name FROM trucks WHERE short_name = "'.$drivers[$i]['truck_ets2'].'"'));
                                        $used_truck_ets2 = $f3->get('truck_used_ets2');
                                        $used_truck_echo = $f3->get('used_truck_ets2').' - '.$used_truck_ets2[0]['name'];
                                        echo $used_truck_echo;
                                    }
                                    else
                                    {
                                        echo $f3->get('used_truck_ets2').' - '.$f3->get('none');
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
                                                $used_truck_echo = $f3->get('used_truck_ats').' - '.$used_truck_ats[0]['name'];
                                                echo $used_truck_echo;
                                            ?>
                                        </p>
                                        <?php
                                    }
                                    else
                                    {
                                    ?>
                                        <p class="small text-primary mb-1"><?= $f3->get('used_truck_ats').' - '.$f3->get('none') ?></p>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="col-auto">
                                <?php
                                    if(is_null($drivers[$i]['img_profile']))
                                    {
                                        ?>
                                        <i class="fas fa-fw fa-user fa-4x"></i>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <img src="<?= $drivers[$i]['img_profile'] ?>" class="img-profile rounded-circle" style="width: 64px;"/>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer form-inline">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="roles" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php if($_SESSION['nickname'] == $drivers[$i]['nickname']) echo 'disabled' ?> >
                            <i class="fas fa-user-shield"></i> <?= $f3->get('change_role') ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="roles">
                            <?php
                                foreach($roles as $role)
                                {
                                    if($drivers[$i]['role_id'] == $role['id'])
                                    {
                                        echo null;
                                    }
                                    else
                                    {
                                        ?>
                                        <a href="./change_role/<?= $drivers[$i]['id'] ?>/<?= $role['id'] ?>" class="dropdown-item"><?= $role['name'] ?></a>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                        <?php if($roles[$admin_data[0]['role_id']-1]['edit_user'] == true) { ?>
                            <form method="POST" action="./pass_reset_admin/"><input type="hidden" name="email" value="<?= $drivers[$i]['email'] ?>"><button type="submit" class="btn btn-warning lookup_btn" <?php if($_SESSION['nickname'] == $drivers[$i]['nickname']) echo 'disabled' ?> ><i class="fas fa-key"></i></button></form>
                            <button href="javascript:void(0);" data-href="./delete_user/<?= $drivers[$i]['id'] ?>" class="btn btn-danger lookup_btn" <?php if($_SESSION['nickname'] == $drivers[$i]['nickname']) echo 'disabled' ?> ><i class="fas fa-trash"></i></button>
                        <?php } ?>
                        <button href="javascript:void(0);" data-href="./user/<?= $drivers[$i]['id'] ?>" class="btn btn-secondary lookup_btn"><i class="fas fa-info-circle"></i></button>
                    </div>
                </div>
            </div>
        <?php
    }
    ?>
    <div class="modal fade" id="lookup_modal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body-trip modal-body">
          </div>
        </div>
      </div>
    </div>