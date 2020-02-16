<?php
    $f3=Base::instance();
    $md = \Markdown::instance();
    $f3->set('global_settings_arr',$db->exec('SELECT * FROM settings'));
    $global_settings = $f3->get('global_settings_arr');

    $f3->set('convoys_db',$db->exec('SELECT * FROM convoys WHERE private = false'));
    $convoys = $f3->get('convoys_db');

    $f3->set('global_settings_arr',$db->exec('SELECT * FROM settings'));
    $global_settings = $f3->get('global_settings_arr');

    $count_convoys = count($convoys);

?>
<!DOCTYPE html>
<html>
	<head>
        <title><?php echo $f3->get('dashboard_listconvoys_title'); ?></title>
        <link href="./css/register.css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/dd99fb3228.js"></script>
    </head>
	<body>
	    <div class="container-fluid" <?php if($count_convoys == 0) echo 'style="height: 90vh"'; ?> >
            <div class="card card-container">
                <div class="row">
                    <div class="col-6">
                        <img id="profile-img" style="width: 96px;height: 96px; float: right;" src="<?= $global_settings[1]['value'] ?>" />
                    </div>
                    <div class="col-6">
                        <p class="mt-2" style="font-size:5vh;"><?= $global_settings[0]['value'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h1><?= $f3->get('convoys') ?></h1>
                    </div>
                    <div class="col text-right">
                        <a href="./" class="btn btn-primary"><i class="fas fa-home"></i> <?= $f3->get('go_homepage') ?></a>
                    </div>
                </div>
                <?php
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
                                    <div class="card border-success shadow h-100">
                                        <div class="card-header">
                                            <h2><b><?= $convoys[$i]['name'] ?></b></h2> 
                                        </div>
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <p class="small mb-1"><?php echo $f3->get('from').' - '.$c_start_name[0]['name'].' ('.$comp_start_name[0]['name'].')' ?></p>
                                                    <p class="small mb-1"><?php echo $f3->get('to').' - '.$c_end_name[0]['name'].' ('.$comp_end_name[0]['name'].')' ?></p>
                                                    <p class="small mb-1"><?php echo $f3->get('date').' - '.date($global_settings[8]['value'],strtotime($convoys[$i]['date_beg_convoy'])) ?></p>
                                                    <p class="small mb-1"><?php echo $f3->get('time_beg_convoy').' - '.date($global_settings[9]['value'],strtotime($convoys[$i]['time_beg_convoy'])) ?></p>
                                                    <p class="small mb-1"><?php echo $f3->get('time_groupup').' - '.date($global_settings[9]['value'],strtotime($convoys[$i]['groupup'])) ?></p>
                                                    
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-fw fa-truck-moving fa-4x"></i>
                                                    <p class="text-center mt-2"><?php if(!empty($convoys[$i]['server_game'])) echo $convoys[$i]['server_game']; else echo $f3->get('unselected') ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer form-inline">
                                            <button href="javascript:void(0);" data-href="./convoy/<?= $convoys[$i]['id'] ?>" class="btn btn-secondary align-middle lookup_btn"><i class="fas fa-info-circle"></i> <?= $f3->get('more_details') ?></button>
                                            <?php
                                                if(!empty($convoys[$i]['server_voip']))
                                                {
                                                    ?>
                                                        <a href="<?= $convoys[$i]['server_voip'] ?>"  target="_blank" class="ml-1 btn btn-primary"><i class="fas fa-microphone"></i> <?= $f3->get('connect_voip') ?></a>
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
                        echo $f3->get('empty_data');
                    }
                ?>
            </div><!-- /card-container -->
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
        </div><!-- /container -->
        <footer class="fixed-bottom bg-dark text-light text-center">
            <p>Made with <3 by Arkadiusz Fatyga</p>
            <p>Powered by Fat-Free Framework</p>
        </footer>
	</body>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
        $('.lookup_btn').on('click',function(){
            var data_href = $(this).attr('data-href');
            $('.modal-body-convoy').load(data_href,function(){
                $('#lookup_modal').modal({show:true});
            });
        });
        });
    </script>
</html>