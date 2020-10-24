<?php
    $f3 = Base::instance();
    session_start();

    $f3->set('convoys',$db->exec('SELECT * FROM convoys'));
    $convoys = $f3->get('convoys');

    $f3->set('admin_data',$db->exec('SELECT role_id FROM users WHERE nickname = ?',$_SESSION['nickname']));
    $admin_data = $f3->get('admin_data');
    $role = $admin_data[0]['role_id'];

    $f3->set('roles_arr',$db->exec('SELECT * FROM roles'));
    $roles = $f3->get('roles_arr');

    $f3->set('global_settings_arr',$db->exec('SELECT * FROM settings'));
    $global_settings = $f3->get('global_settings_arr');

    $count_convoys = count($convoys);
    if($count_convoys > 0)
    {
        for($i = 0; $i < $count_convoys;$i++)
        {
            $f3->set('c_start_name',$db->exec('SELECT name FROM cities WHERE short_name = "'.$convoys[$i]['c_start'].'"'));
            $c_start_name = $f3->get('c_start_name');

            $f3->set('comp_start_name',$db->exec('SELECT name FROM companies WHERE short_name = "'.$convoys[$i]['comp_start'].'"'));
            $comp_start_name = $f3->get('comp_start_name');

            $f3->set('c_end_name',$db->exec('SELECT name FROM cities WHERE short_name = "'.$convoys[$i]['c_end'].'"'));
            $c_end_name = $f3->get('c_end_name');

            $f3->set('comp_end_name',$db->exec('SELECT name FROM companies WHERE short_name = "'.$convoys[$i]['comp_end'].'"'));
            $comp_end_name = $f3->get('comp_end_name');
            ?>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-<?= $global_settings[17]['value'] ?> shadow h-100">
                        <div class="card-header">
                            <h2><b><?= $convoys[$i]['name'] ?></b></h2> 
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <p class="small text-primary mb-1"><?php echo $f3->get('from').' - '.$c_start_name[0]['name'].' ('.$comp_start_name[0]['name'].')' ?></p>
                                    <p class="small text-primary mb-1"><?php echo $f3->get('to').' - '.$c_end_name[0]['name'].' ('.$comp_end_name[0]['name'].')' ?></p>
                                    <p class="small text-primary mb-1"><?php echo $f3->get('date').' - '.date($global_settings[8]['value'],strtotime($convoys[$i]['date_beg_convoy'])) ?></p>
                                    <p class="small text-primary mb-1"><?php echo $f3->get('time_beg_convoy').' - '.date($global_settings[9]['value'],strtotime($convoys[$i]['time_beg_convoy'])) ?></p>
                                    <p class="small text-primary mb-1"><?php echo $f3->get('time_groupup').' - '.date($global_settings[9]['value'],strtotime($convoys[$i]['time_groupup'])) ?></p>
                                    
                                </div>
                                <div class="col-auto"><i class="fas fa-fw fa-truck-moving fa-4x"></i></div>
                            </div>
                        </div>
                        <div class="card-footer form-inline">
                            <button href="javascript:void(0);" data-href="./convoy/<?= $convoys[$i]['id'] ?>" class="btn btn-secondary lookup_btn"><i class="fas fa-info-circle"></i> <?= $f3->get('more_details') ?></button>
                            <?php
                                if(!empty($convoys[$i]['server_voip']))
                                {
                                    ?>
                                        <a href="<?= $convoys[$i]['server_voip'] ?>" target="_blank" class="btn btn-primary ml-1"><i class="fas fa-microphone"></i> <?= $f3->get('connect_voip') ?></a>
                                    <?php
                                }
                                if($roles[$role-1]['admin'] == true)
                                {
                                    ?>
                                        <a href="./edit_convoy/<?= $convoys[$i]['id'] ?>" class="btn btn-warning ml-1"><i class="fas fa-edit"></i> <?= $f3->get('edit') ?></a>
                                        <button href="javascript:void(0);" data-href="./delete_convoy/<?= $convoys[$i]['id'] ?>" class="btn btn-danger lookup_btn ml-1"><i class="fas fa-trash"></i></button>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
    else
    {
        ?>        
            <p class="ml-3"><?= $f3->get('empty_data') ?></p>
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
          <div class="modal-body-convoy modal-body">
          </div>
        </div>
      </div>
    </div>