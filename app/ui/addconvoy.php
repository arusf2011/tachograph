<?php
  $f3=Base::instance();
  session_start();
  $f3->set('global_settings_arr',$db->exec('SELECT * FROM settings'));
  $global_settings = $f3->get('global_settings_arr');
  if(!isset($_SESSION['nickname']))
  {
    header('Location: ./login');
    exit();
  }
  $f3->set('user_data',$db->exec('SELECT * FROM users WHERE nickname = ?',$_SESSION['nickname']));
  $user_data = $f3->get('user_data');
  $f3->set('not_count',$db->exec('SELECT count(*) as value FROM notifications WHERE user_id = ? AND is_read = 0',$user_data[0]['id']));
  $not_count = $f3->get('not_count');
  $f3->set('roles_arr',$db->exec('SELECT * FROM roles'));
  $roles = $f3->get('roles_arr');
  $role = $user_data[0]['role_id'];
  if($roles[$role-1]['admin'] == false)
  {
      header('Location: ./dashboard');
      exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $f3->get('dashboard_addconvoy_title'); ?></title>

  <!-- Custom fonts for this template-->
  <script src="https://kit.fontawesome.com/dd99fb3228.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="./css/sb-admin-2.min.css" rel="stylesheet">
  <link href="./css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/bootstrap-select.min.css">
  <link rel="stylesheet" href="./css/gijgo.min.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-<?= $global_settings[17]['value'] ?> sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./dashboard">
        <div class="sidebar-brand-icon col-sm-5">
          <img src="<?= $global_settings[1]['value'] ?>" class="img-fluid" />
        </div>
        <div class="col-sm-7 sidebar-brand-text mx-3"><?= $global_settings[0]['value'] ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="./dashboard">
          <i class="fas fa-fw fa-columns"></i>
          <span><?php echo $f3->get('main_page'); ?></span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        <i class="fas fa-landmark fa-fw"></i> <?php echo $f3->get('administration'); ?>
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="./trips_admin">
          <i class="far fa-fw fa-list-alt"></i>
          <span><?php echo $f3->get('trips'); ?></span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span><?php echo $f3->get('users'); ?></span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="./list_users"><i class="fas fa-list-alt fa-fw"></i> <?php echo $f3->get('list'); ?></a>
            <a class="collapse-item" href="./add_user"><i class="fas fa-user-plus fa-fw"></i> <?php echo $f3->get('add'); ?></a>
            <a class="collapse-item" href="./roles"><i class="fas fa-user-shield fa-fw"></i> <?php echo $f3->get('roles'); ?></a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#convoys" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-truck-moving"></i>
          <span><?php echo $f3->get('convoys'); ?></span>
        </a>
        <div id="convoys" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="./list_convoys"><i class="fas fa-list-alt fa-fw"></i> <?php echo $f3->get('list'); ?></a>
            <a class="collapse-item active text-<?= $global_settings[17]['value'] ?>" href="./add_convoy"><i class="far fa-plus-square fa-fw"></i> <?php echo $f3->get('add'); ?></a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span><?php echo $f3->get('settings_lang'); ?></span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="./cities"><i class="fas fa-city fa-fw"></i> <?php echo $f3->get('cities'); ?></a>
            <a class="collapse-item" href="./companies"><i class="fas fa-building fa-fw"></i> <?php echo $f3->get('companies'); ?></a>
            <a class="collapse-item" href="./dlcs"><i class="fas fa-file-download fa-fw"></i> <?php echo $f3->get('dlcs'); ?></a>
            <a class="collapse-item" href="./trucks"><i class="fas fa-truck fa-fw"></i> <?php echo $f3->get('trucks'); ?></a>
            <a class="collapse-item" href="./loads"><i class="fas fa-truck-loading fa-fw"></i> <?php echo $f3->get('loads'); ?></a>
            <a class="collapse-item" href="./global_settings"><i class="fas fa-edit fa-fw"></i> <?php echo $f3->get('global_settings'); ?></a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="./recrutation">
          <i class="fas fa-fw fa-address-card"></i>
          <span><?php echo $f3->get('recrutation'); ?></span>
        </a>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        <i class="fas fa-user fa-fw"></i> <?= $f3->get('you') ?>
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#trips" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-address-book"></i>
          <span><?= $f3->get('trips') ?></span>
        </a>
        <div id="trips" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="./add_trip"><i class="fas fa-plus-square fa-fw"></i> <?= $f3->get('add_trip') ?></a>
            <a class="collapse-item" href="./trips_user"><i class="fas fa-clipboard-list fa-fw"></i> <?= $f3->get('list') ?></a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="./convoys">
          <i class="fas fa-fw fa-truck-moving"></i>
          <span><?php echo $f3->get('convoys'); ?></span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"><i class="fas fa-bars text-white"></i></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

             <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter" id="counter"><?= $not_count[0]['value'] ?></span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  <div class="row">
                    <div class="col-sm-6"><?= $f3->get('notifications') ?></div>
                    <div class="col-sm-6 text-right">
                      <a href="#" style="color:white; text-decoration: none;" onclick="mark_as_read();"><i class="fas fa-check-circle"></i> <?= $f3->get('mark_as_read') ?></a>
                    </div>
                  </div>
                </h6>
                <?php
                  $f3->set('not_list',$db->exec('SELECT * FROM notifications WHERE user_id = ? AND is_read = 0',$user_data[0]['id']));
                  $notifications = $f3->get('not_list');
                  if(count($notifications) == 0)
                  {
                    ?>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="mr-3">
                        <div class="icon-circle bg-primary">
                          <i class="far fa-bell-slash text-white"></i>
                        </div>
                      </div>
                      <div>
                        <span class="font-weight-bold"><?= $f3->get('no_notifications') ?></span>
                      </div>
                    </a>
                    <?php
                  }
                  else
                  {
                    foreach($notifications as $notification)
                    {
                      if(strpos($notification['type'],'accepted_trip') !== false)
                      {
                        $id_trip = trim($notification['type'],'accepted_trip');
                        ?>
                        <a class="dropdown-item d-flex align-items-center notification" href="#">
                          <div class="mr-3">
                            <div class="icon-circle bg-success">
                              <i class="fas fa-check text-white"></i>
                            </div>
                          </div>
                          <div>
                            <p class="font-weight-bold mb-1"><?= $f3->get('trip_accepted_firstpart').' '.$id_trip.' '.$f3->get('trip_accepted_secondpart') ?></p>
                            <span class="small"><?= $notification['information'] ?></span>
                          </div>
                        </a>
                        <?php
                      }
                      else if(strpos($notification['type'],'accepted_recruit') !== false)
                      {
                        ?>
                        <a class="dropdown-item d-flex align-items-center notification" href="#">
                          <div class="mr-3">
                            <div class="icon-circle bg-success">
                              <i class="fas fa-rss text-white"></i>
                            </div>
                          </div>
                          <div>
                            <p class="font-weight-bold mb-1"><?= $f3->get('welcome') ?></p>
                            <span class="small"><?= $notification['information'] ?></span>
                          </div>
                        </a>
                        <?php
                      }
                      else if(strpos($notification['type'],'rejected_trip') !== false)
                      {
                        $id_trip = trim($notification['type'],'rejected_trip');
                        ?>
                        <a class="dropdown-item d-flex align-items-center notification" href="#">
                          <div class="mr-3">
                            <div class="icon-circle bg-danger">
                              <i class="fas fa-times text-white"></i>
                            </div>
                          </div>
                          <div>
                            <p class="font-weight-bold mb-1"><?= $f3->get('trip_rejected_firstpart').' '.$id_trip.' '.$f3->get('trip_rejected_secondpart') ?></p>
                            <span class="small"><?= $notification['information'] ?></span>
                          </div>
                        </a>
                        <?php
                      }
                    }
                  }
                ?>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nickname'] ?></span>
                <?php
                if(is_null($user_data[0]['img_profile']))
                {
                  ?>
                  <i class="fas fa-fw fa-user"></i>
                  <?php
                }
                else
                {
                  ?>
                  <img src="<?= $user_data[0]['img_profile'] ?>" class="img-profile rounded-circle"/>
                  <?php
                }
                ?>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!--<a class="dropdown-item" href="./profile">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  <?php echo $f3->get('profile'); ?>
                </a> -->
                <a class="dropdown-item" href="./settings">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  <?php echo $f3->get('settings'); ?>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="./signout" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  <?php echo $f3->get('sign_out'); ?>
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="page-title"><?php echo $f3->get('addconvoy') ?></h1>
          <?php 
            if(isset($_SESSION['error']) && $_SESSION['error'] == '1')
            {
              ?>
              <div class="alert alert-danger"><?= $f3->get('error_db') ?></div>
              <?php
            }
          ?>
          <form method="POST" action="./new_convoy_add">
            <div class="row">
                <div class="col">
                  <label for="name"><?php echo $f3->get('name') ?><span style="color:red;font-size: 20px;">*</span></label>
                  <input type="text" class="form-control" name="name" required>
                  <label for="datepicker" class="mt-3"><?= $f3->get('date') ?><span style="color:red;font-size: 20px;">*</span></label>
                  <input id="datepicker" />
                  <input type="hidden" name="date" id="date">
                  <label for="timepicker1" class="mt-3"><?= $f3->get('time_beg_convoy') ?><span style="color:red;font-size: 20px;">*</span></label>
                  <input id="timepicker1" />
                  <input type="hidden" name="time_beg" id="time_beg">
                  <label for="timepicker2" class="mt-3"><?= $f3->get('time_groupup') ?><span style="color:red;font-size: 20px;">*</span></label>
                  <input id="timepicker2" />
                  <input type="hidden" name="time_groupup" id="time_groupup">
                  <label for="server_game" class="mt-2"><?php echo $f3->get('server_game') ?></label>
                  <select class="form-control" name="server_game" id="server">
                    <option value=""><?= $f3->get('unselected') ?></option>
                    <?php
                      $url_servers = file_get_contents('https://api.truckersmp.com/v2/servers');
                      $servers = json_decode($url_servers);
                      foreach($servers->response as $server)
                      {
                        echo '<option value="'.$server->shortname.'">'.$server->game.' - '.$server->name.'</option>';
                      }
                    ?>
                    <option value="ETS2 Event">ETS2 - Event</option>
                    <option value="ATS Event">ATS - Event</option>
                  </select>
                  <label for="server_voip" class="mt-2"><?php echo $f3->get('server_voip') ?>&nbsp;<small><?= $f3->get('post_url_voip') ?></small></label>
                  <input type="text" name="server_voip" id="server_voip" class="form-control">
                  <label for="route" class="mt-2"><?= $f3->get('route') ?>&nbsp;<small><?= $f3->get('post_url_image') ?></small></label>
                  <input type="text" name="route" id="route" class="form-control">
                  <label for="route" class="mt-2"><?= $f3->get('convoy_is_private') ?></label>
                  <select name="private" id="private" class="form-control">
                      <option value="0" selected><?= $f3->get('no') ?></option>
                      <option value="1"><?= $f3->get('yes') ?></option>
                  </select>
                </div>
                <div class="col">
                  <label for="game"><?= $f3->get('select_game') ?><span style="color:red;font-size: 20px;">*</span></label>
                  <select id="game" class="form-control">
                    <option value="">---</option>
                    <option value="0">ETS2</option>
                    <option value="1">ATS</option>
                  </select>
                  <label for="from_city" class="mt-2"><?php echo $f3->get('from') ?><span style="color:red;font-size: 20px;">*</span></label>
                  <select class="form-control" name="from_city" required id="from_city" data-live-search="true">
                  </select>
                  <select class="form-control" name="from_company" required id="from_company" data-live-search="true">
                  </select>
                  <label for="to_city" class="mt-2"><?php echo $f3->get('to') ?><span style="color:red;font-size: 20px;">*</span></label>
                  <select class="form-control" name="to_city" id="to_city" required data-live-search="true">
                  </select>
                  <select class="form-control" name="to_company" id="to_company" required data-live-search="true">
                  </select>
                  <label for="image_start" class="mt-2"><?= $f3->get('start_convoy') ?>&nbsp;<small><?= $f3->get('post_url_image') ?></small></label>
                  <input type="text" name="image_start" id="image_start" class="form-control">
                  <label for="image_end" class="mt-2"><?= $f3->get('end_convoy') ?>&nbsp;<small><?= $f3->get('post_url_image') ?></small></label>
                  <input type="text" name="image_end" id="image_end" class="form-control">
                  <label for="rules" class="mt-2"><?= $f3->get('rules') ?></label>
                  <textarea class="form-control" name="rules" id="rules"></textarea>
                </div>
            </div>
            <div class="text-center mt-3">
              <button class="btn btn-success"><i class="fas fa-plus-square"></i> <?php echo $f3->get('addconvoy') ?></button>
            </div>
          </form>
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Made with <3 by <a href="https://arkadiusz-fatyga.eu" target="_blank">Arkadiusz Fatyga</a> | <a href="https://github.com/arusf2011/tachograph" target="_blank">Version 1.1.2</a></span><br>
            <span id="copyright">Copyright &copy; <script> var data = new Date(); var copyright = document.getElementById('copyright'); copyright.innerHTML = copyright.innerHTML + data.getFullYear();</script></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content border-danger">
        <div class="modal-header bg-danger text-light">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo $f3->get('logout_popup_title'); ?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body"><?php echo $f3->get('logout_popup_content'); ?></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo $f3->get('cancel'); ?></button>
          <a class="btn btn-primary" href="./logout"><?php echo $f3->get('logout'); ?></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Core plugin JavaScript-->
  <script src="./js/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="./js/sb-admin-2.min.js"></script>
  <script src="./js/bootstrap-select.min.js"></script>
  <script src="./js/gijgo.min.js"></script>
  <script>
    $("#game").change(function() {
        var game = document.getElementById('game').value;
        var xmlhttp_cities = new XMLHttpRequest();
        xmlhttp_cities.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("from_city").innerHTML = this.responseText;
            document.getElementById("to_city").innerHTML = this.responseText;
            document.getElementById("from_city").classList.add('selectpicker');
            document.getElementById("to_city").classList.add('selectpicker');
            $('#from_city').selectpicker({
              style: 'btn-default border-secondary'
            });
            $('#to_city').selectpicker({
              style: 'btn-default border-secondary'
            });
          }
        };
        xmlhttp_cities.open("GET", "./load_cities/"+game, true);
        xmlhttp_cities.send();
        
        var xmlhttp_companies = new XMLHttpRequest();
        xmlhttp_companies.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("from_company").innerHTML = this.responseText;
            document.getElementById("to_company").innerHTML = this.responseText;
            document.getElementById("from_company").classList.add('selectpicker');
            document.getElementById("to_company").classList.add('selectpicker');
            $('#from_company').selectpicker({
              style: 'btn-default border-secondary'
            });
            $('#to_company').selectpicker({
              style: 'btn-default border-secondary'
            });
          }
        };
        xmlhttp_companies.open("GET", "./load_companies/"+game, true);
        xmlhttp_companies.send();
    });
    $('#datepicker').datepicker({
      modal:true,
      footer:true,
      format: 'yyyy-mm-dd',
      change: function () {
        var datepicker = $('#datepicker').datepicker();
        document.getElementById('date').value = datepicker.value();
      }
    });

    $('#timepicker1').timepicker({
      modal:true,
      footer:true,
      mode:'24hr',
      format: 'HH:MM',
      change: function () {
        var timepicker1 = $('#timepicker1').timepicker();
        document.getElementById('time_beg').value = timepicker1.value();
      }
    });

    $('#timepicker2').timepicker({
      modal:true,
      footer:true,
      mode:'24hr',
      format: 'HH:MM',
      change: function () {
        var timepicker2 = $('#timepicker2').timepicker();
        document.getElementById('time_groupup').value = timepicker2.value();
      }
    });
    function mark_as_read() {
      var xmlhttp_notifications = new XMLHttpRequest();
      xmlhttp_notifications.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          $('head').append('<style>'+
            '.notification {background-color: #f8f6f6;}'+
            '</style>'
          );
          document.getElementById('counter').innerHTML = "0";
        }
      };
      xmlhttp_notifications.open("GET", "./notifications_read", true);
      xmlhttp_notifications.send();
    }
  </script>
  
</body>

</html>
