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
  $role = $user_data[0]['role_id'];
  $f3->set('roles_arr',$db->exec('SELECT * FROM roles'));
  $roles = $f3->get('roles_arr');
  $f3->set('not_count',$db->exec('SELECT count(*) as value FROM notifications WHERE user_id = ? AND is_read = 0',$user_data[0]['id']));
  $not_count = $f3->get('not_count');
  $f3->set('user_trips',$db->exec('SELECT count(*) as sum_trips, sum(fuel_used) as fuel_used, sum(distance) as sum_driven FROM trips WHERE status = 3 AND month(date_beg) = month(now()) AND id_user = '.$user_data[0]['id']));
  $user_trips = $f3->get('user_trips');
  if($user_trips[0]['sum_trips'] == '')
  {
    $user_trips[0]['sum_trips'] = 0;
  }
  if($user_trips[0]['fuel_used'] == '')
  {
    $user_trips[0]['fuel_used'] = 0;
  }
  if($user_trips[0]['sum_driven'] == '')
  {
    $user_trips[0]['sum_driven'] = 0;
  }
  require_once './app/json_lang.php';
  require_once './app/json_top10.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $f3->get('dashboard_mainpage_title'); ?></title>

  <!-- Custom fonts for this template-->
  <script src="https://kit.fontawesome.com/dd99fb3228.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="./css/sb-admin-2.min.css" rel="stylesheet">
  <link href="./css/main.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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
      <li class="nav-item active">
        <a class="nav-link" href="./dashboard">
          <i class="fas fa-fw fa-columns"></i>
          <span><?php echo $f3->get('main_page'); ?></span></a>
      </li>
      <?php
      if($roles[$role-1]['admin'] == true)
      {
        ?>

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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span><?php echo $f3->get('users'); ?></span>
        </a>
        <div id="users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="./list_users"><i class="fas fa-list-alt fa-fw"></i> <?php echo $f3->get('list'); ?></a>
            <a class="collapse-item" href="./add_user"><i class="fas fa-user-plus fa-fw"></i> <?php echo $f3->get('add'); ?></a>
            <a class="collapse-item" href="./roles"><i class="fas fa-user-shield fa-fw"></i> <?php echo $f3->get('roles'); ?></a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#settings" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span><?php echo $f3->get('settings_lang'); ?></span>
        </a>
        <div id="settings" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
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
        <?php
      }
    ?>



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

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 text-gray-800"><?php echo $f3->get('summary'); ?></h1>
            <a href="./generate_report" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
              <i class="fas fa-download fa-sm text-white-50"></i> <?php echo $f3->get('generate_report') ?>
            </a>
          </div>
          <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php echo $f3->get('sum_driven') ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $user_trips[0]['sum_driven'].' '.$global_settings[4]['value'];  ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-truck fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><?php echo $f3->get('fuel_used_by_u') ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $user_trips[0]['fuel_used'].' '.$global_settings[5]['value'];  ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-gas-pump fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-12 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo $f3->get('sum_trips1'); ?></div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php if($user_trips[0]['sum_trips'] == 1) echo $user_trips[0]['sum_trips'].' '.$f3->get('sum_trips2_one'); else echo $user_trips[0]['sum_trips'].' '.$f3->get('sum_trips2_multi'); ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $f3->get('top10_drivers'); ?></h6>
                </div>
                <div class="card-body">
                  <b><?php echo $f3->get('sum_trips_top10'); ?></b>
                  <div class="chart-bar">
                    <canvas id="sum_trips_top10"></canvas>
                  </div>
                  <b><?php echo $f3->get('fuel_economy'); ?></b>
                  <div class="chart-bar">
                    <canvas id="fuel_economy"></canvas>
                  </div>
                  <b><?php echo $f3->get('sum_driven_distance'); ?></b>
                  <div class="chart-bar">
                    <canvas id="sum_distance"></canvas>
                  </div>
                </div>
              </div>
        <!-- /.container-fluid -->

        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Made with <3 by <a href="https://arkadiusz-fatyga.eu" target="_blank">Arkadiusz Fatyga</a> | <a href="https://github.com/arusf2011/tachograph" target="_blank">Version 1.0</a></span><br>
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
  <script src="./js/Chart.bundle.min.js"></script>
  <script>
    var canvas_sum_trips = document.getElementById('sum_trips_top10').getContext('2d');
    var chart_sum_trips = new Chart(canvas_sum_trips, {
      type: 'bar',
      data: {
        labels: <?php if(count($arr_nicknames_count) > 0) echo json_encode($arr_nicknames_count); else echo '"&nbsp;"'; ?>,
        datasets: [{
          label: <?php if(count($arr_nicknames_count) > 0) echo '"'.$f3->get('sum_trips_top10').'"'; else echo '"&nbsp;"'; ?>,
          backgroundColor: '#4e73df',
          data: <?php if(count($arr_trips_count) > 0) echo json_encode($arr_trips_count); else echo '"&nbsp;"'; ?>
        }]
      },
      options: {
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 10,
              right: 25,
              top: 25,
              bottom: 0
            }
          },
          scales: {
            xAxes: [{
              time: {
                unit: 'user'
              },
              gridLines: {
                display: false,
                drawBorder: false
              },
              ticks: {
                maxTicksLimit: 6
              },
              maxBarThickness: 25,
            }],
            yAxes: [{
              ticks: {
                min: 0,
                max: <?php if(count($arr_trips_count) > 0) echo max($arr_trips_count); else echo '"&nbsp;"'; ?>,
                maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function(value, index, values) {
                  return value;
                }
              },
              gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
              }
            }],
          },
          legend: {
            display: false
          },
          tooltips: {
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10
          },
        }
     });
     var canvas_fuel_economy = document.getElementById('fuel_economy').getContext('2d');
      var chart_fuel_economy = new Chart(fuel_economy, {
        type: 'bar',
        data: {
          labels: <?php if(count($arr_nicknames_fuel) > 0) echo json_encode($arr_nicknames_fuel); else echo '"&nbsp;"'; ?>,
          datasets: [{
            label: <?php if(count($arr_nicknames_fuel) > 0) echo '"'.$f3->get('amount').' '.$global_settings[5]['value'].' '.$f3->get('per_100').' '.$global_settings[4]['value'].'"'; else echo '"&nbsp;"'; ?>,
            backgroundColor: '#4e73df',
            data: <?php if(count($arr_fuel) > 0) echo json_encode($arr_fuel); else echo '"&nbsp;"'; ?>
          }]
        },
        options: {
            maintainAspectRatio: false,
            layout: {
              padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
              }
            },
            scales: {
              xAxes: [{
                time: {
                  unit: 'user'
                },
                gridLines: {
                  display: false,
                  drawBorder: false
                },
                ticks: {
                  maxTicksLimit: 6
                },
                maxBarThickness: 25,
              }],
              yAxes: [{
                ticks: {
                  min: 0,
                  max: <?php if(count($arr_fuel) > 0) echo max($arr_fuel); else echo '"&nbsp;"'; ?>,
                  maxTicksLimit: 5,
                  padding: 10,
                  // Include a dollar sign in the ticks
                  callback: function(value, index, values) {
                    return value;
                  }
                },
                gridLines: {
                  color: "rgb(234, 236, 244)",
                  zeroLineColor: "rgb(234, 236, 244)",
                  drawBorder: false,
                  borderDash: [2],
                  zeroLineBorderDash: [2]
                }
              }],
            },
            legend: {
              display: false
            },
            tooltips: {
              titleMarginBottom: 10,
              titleFontColor: '#6e707e',
              titleFontSize: 14,
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              caretPadding: 10
            },
          }
      });
      var canvas_sum_distance = document.getElementById('sum_distance').getContext('2d');
      var chart_sum_distance = new Chart(sum_distance, {
        type: 'bar',
        data: {
          labels: <?php if(count($arr_nicknames_distance) > 0) echo json_encode($arr_nicknames_distance); else echo '"&nbsp;"'; ?>,
          datasets: [{
            label: <?php if(count($arr_nicknames_distance) > 0) echo '"'.$f3->get('amount').' '.$f3->get('driven').' '.$global_settings[4]['value'].'"'; else echo '"&nbsp;"'; ?>,
            backgroundColor: '#4e73df',
            data: <?php if(count($arr_distance) > 0) echo json_encode($arr_distance); else echo '"&nbsp;"'; ?>
          }]
        },
        options: {
            maintainAspectRatio: false,
            layout: {
              padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
              }
            },
            scales: {
              xAxes: [{
                time: {
                  unit: 'user'
                },
                gridLines: {
                  display: false,
                  drawBorder: false
                },
                ticks: {
                  maxTicksLimit: 6
                },
                maxBarThickness: 25,
              }],
              yAxes: [{
                ticks: {
                  min: 0,
                  max: <?php if(count($arr_distance) > 0) echo max($arr_distance); else echo '"&nbsp;"'; ?>,
                  maxTicksLimit: 5,
                  padding: 10,
                  // Include a dollar sign in the ticks
                  callback: function(value, index, values) {
                    return value;
                  }
                },
                gridLines: {
                  color: "rgb(234, 236, 244)",
                  zeroLineColor: "rgb(234, 236, 244)",
                  drawBorder: false,
                  borderDash: [2],
                  zeroLineBorderDash: [2]
                }
              }],
            },
            legend: {
              display: false
            },
            tooltips: {
              titleMarginBottom: 10,
              titleFontColor: '#6e707e',
              titleFontSize: 14,
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              caretPadding: 10
            },
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
