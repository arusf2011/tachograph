<?php
  session_start();
  /* Main function */
  $f3->set('ONERROR',
  function($f3) {
    if(file_exists('./LOCK'))
    {
      $_SESSION['error'] = $f3->get('ERROR.code');
      $_SESSION['error_text'] = $f3->get('ERROR.status');
      $view = new View;
      echo $view->render('./app/ui/error.html');
    }
    else
    {
      echo $f3->get('ERROR.code').' - '.$f3->get('ERROR.status');
    }
  }
);
  $f3->route('GET /',
    function() {
      $view = new View;
      echo $view->render('./app/ui/welcome.html');
    }
  );
  $f3->route('GET /login',
    function () {
      $view = new View;
      echo $view->render('./app/ui/login.php');
    }
  );
  $f3->route('GET /logout',
    function($f3) {
      session_destroy();
      $f3->reroute('/login');
    }
  );
  $f3->route('GET /login/@error',
    function ($f3) {
      $_SESSION['error'] = $f3->get('PARAMS.error');
      $f3->reroute('/login');
    }
  );
  $f3->route('POST /signin',
    function ($f3) {
      $nickname = $f3->get('POST.nickname');
      $pass = $f3->get('POST.pass');
      $f3->set('nickname',$nickname);
      $f3->set('pass',$pass);
      $view = new View;
      echo $view->render('./app/signin.php');
    }
  );
  $f3->route('GET /contact_us',
    function () {
      $view = new View;
      echo $view->render('./app/ui/register.html');
    }
  );
  $f3->route('GET /dashboard',
    function() {
      $view = new View;
      echo $view->render('./app/ui/dashboard.php');
    }
  );
  /* Adding new user */
  $f3->route('GET /add_user',
    function() {
      $view = new View;
      echo $view->render('./app/ui/adduser.php');
    }
  );
  $f3->route('GET /add_user/@error',
    function($f3) {
      $_SESSION['error'] = $f3->get('PARAMS.error');
      $f3->reroute('/adduser');
    }
  );
  $f3->route('GET /adduser_success',
    function($f3) {
      $_SESSION['success'] = 'add_user';
      $f3->reroute('/list_users');
    }
  );
  $f3->route('POST /new_user_add',
    function($f3) {
      $_SESSION['nick_new'] = $f3->get('POST.nickname');
      $_SESSION['email'] = $f3->get('POST.email');
      $str_dlcs = substr($f3->get('BODY'),strpos($f3->get('BODY'),'dlcs')+5,strpos($f3->get('BODY'),'&rules')-strpos($f3->get('BODY'),'dlcs')-5);
      $count_dlcs = substr_count($dlcs,'dlcs=');
      $arr_dlcs = explode('&dlcs=',$str_dlcs);
      $_SESSION['dlcs'] = $arr_dlcs;
      $_SESSION['truck_ets2'] = $f3->get('POST.truck_ets2');
      $_SESSION['truck_ats'] = $f3->get('POST.truck_ats');
      $_SESSION['rules'] = $f3->get('POST.rules');
      $_SESSION['ats'] = $f3->get('POST.ats');
      $_SESSION['tmpid'] = $f3->get('POST.tmpid');
      $view = new View;
      echo $view->render('./app/new_user_add.php');
    }
  );
  /* Listing users */
  $f3->route('GET /list_users',
    function() {
      $view = new View;
      echo $view->render('./app/ui/list_users.php');
    }
  );
  $f3->route('GET /user/@id',
    function($f3) {
      $_SESSION['user_id'] = $f3->get('PARAMS.id');
      $view = new View;
      echo $view->render('./app/single_user.php');
    }
  );
  $f3->route('GET /delete_user/@id',
    function($f3) {
      $_SESSION['user_id'] = $f3->get('PARAMS.id');
      $view = new View;
      echo $view->render('./app/delete_user.php');
    }
  );
  $f3->route('POST /deluser/@id',
    function($f3) {
      $_SESSION['user_id'] = $f3->get('PARAMS.id');
      $_SESSION['reason'] = $f3->get('POST.reason');
      $view = new View;
      echo $view->render('./app/deluser.php');
    }
  );
  $f3->route('GET /deluser_success',
    function($f3) {
      $_SESSION['success'] = 'deleted_user';
      $f3->reroute('/list_users');
    }
  );
  $f3->route('GET /change_role/@user_id/@role_id',
    function($f3) {
      $_SESSION['user_id'] = $f3->get('PARAMS.user_id');
      $_SESSION['role_id'] = $f3->get('PARAMS.role_id');
      $view = new View;
      echo $view->render('./app/change_role.php');
    }
  );
  $f3->route('GET /modrole_success',
    function($f3) {
      $_SESSION['success'] = 'mod_role';
      $f3->reroute('/list_users');
    }
  );
  $f3->route('POST /pass_reset_admin',
    function($f3) {
      $_SESSION['email'] = $f3->get('POST.email');
      $view = new View;
      echo $view->render('./app/pass_reset_admin.php');
    }
  );
  $f3->route('GET /list_users/reset_pass',
    function($f3) {
      $_SESSION['success'] = 'reset_pass';
      $f3->reroute('/list_users');
    }
  );
  /* DLCs */
  $f3->route('GET /dlcs',
    function() {
      $view = new View;
      echo $view->render('./app/ui/dlcs.php');
    }
  );
  $f3->route('GET /dlcs/@error',
    function($f3) {
      $_SESSION['error'] = $f3->get('PARAMS.error');
      $f3->reroute('/dlcs');
    }
  );
  $f3->route('POST /new_dlc',
    function($f3) {
      $_SESSION['dlc_name'] = $f3->get('POST.name');
      $_SESSION['dlc_shortname'] = $f3->get('POST.short_name');
      $view = new View;
      echo $view->render('./app/new_dlc.php');
    }
  );
  $f3->route('GET /delete_dlc/@id',
    function($f3) {
      $_SESSION['dlc_id'] = $f3->get('PARAMS.id');
      $view = new View;
      echo $view->render('./app/delete_dlc.php');
    }
  );
  $f3->route('GET /adddlc_success',
    function($f3) {
      $_SESSION['success'] = 'add_dlc';
      $f3->reroute('/dlcs');
    }
  );
  $f3->route('GET /deldlc_success',
    function($f3) {
      $_SESSION['success'] = 'del_dlc';
      $f3->reroute('/dlcs');
    }
  );
  /* Cities */
  $f3->route('GET /cities',
    function() {
      $view = new View;
      echo $view->render('./app/ui/cities.php');
    }
  );
  $f3->route('POST /new_city',
    function($f3) {
      $_SESSION['city_name'] = $f3->get('POST.name');
      $_SESSION['city_shortname'] = $f3->get('POST.short_name');
      $_SESSION['city_game'] = $f3->get('POST.game');
      $_SESSION['city_dlc'] = $f3->get('POST.dlc');
      $view = new View;
      echo $view->render('./app/new_city.php');
    }
  );
  $f3->route('GET /delete_city/@id',
    function($f3) {
      $_SESSION['city_id'] = $f3->get('PARAMS.id');
      $view = new View;
      echo $view->render('./app/delete_city.php');
    }
  );
  $f3->route('GET /addcity_success',
    function($f3) {
      $_SESSION['success'] = 'add_city';
      $f3->reroute('/cities');
    }
  );
  $f3->route('GET /delcity_success',
    function($f3) {
      $_SESSION['success'] = 'del_city';
      $f3->reroute('/cities');
    }
  );
  /* Companies */
  $f3->route('GET /companies',
    function() {
      $view = new View;
      echo $view->render('./app/ui/companies.php');
    }
  );
  $f3->route('POST /new_company',
    function($f3) {
      $_SESSION['company_name'] = $f3->get('POST.name');
      $_SESSION['company_shortname'] = $f3->get('POST.short_name');
      $_SESSION['company_game'] = $f3->get('POST.game');
      $view = new View;
      echo $view->render('./app/new_company.php');
    }
  );
  $f3->route('GET /companies/@error',
    function($f3) {
      $_SESSION['error'] = $f3->get('PARAMS.error');
      $f3->reroute('/dlcs');
    }
  );
  $f3->route('GET /addcompany_success',
    function($f3) {
      $_SESSION['success'] = 'add_company';
      $f3->reroute('/companies');
    }
  );
  $f3->route('GET /delete_company/@id',
    function($f3) {
      $_SESSION['company_id'] = $f3->get('PARAMS.id');
      $view = new View;
      echo $view->render('./app/delete_company.php');
    }
  );
  $f3->route('GET /delcompany_success',
    function($f3) {
      $_SESSION['success'] = 'del_company';
      $f3->reroute('/companies');
    }
  );
  /* Trucks */
  $f3->route('GET /trucks',
    function() {
      $view = new View;
      echo $view->render('./app/ui/trucks.php');
    }
  );
  $f3->route('GET /trucks/@error',
    function($f3) {
      $_SESSION['error'] = $f3->get('PARAMS.error');
      $f3->reroute('/trucks');
    }
  );
  $f3->route('POST /new_truck',
    function($f3) {
      $_SESSION['truck_name'] = $f3->get('POST.name');
      $_SESSION['truck_shortname'] = $f3->get('POST.short_name');
      $_SESSION['truck_game'] = $f3->get('POST.game');
      $view = new View;
      echo $view->render('./app/new_truck.php');
    }
  );
  $f3->route('GET /delete_truck/@id',
    function($f3) {
      $_SESSION['truck_id'] = $f3->get('PARAMS.id');
      $view = new View;
      echo $view->render('./app/delete_truck.php');
    }
  );
  $f3->route('GET /addtruck_success',
    function($f3) {
      $_SESSION['success'] = 'add_truck';
      $f3->reroute('/trucks');
    }
  );
  $f3->route('GET /deltruck_success',
    function($f3) {
      $_SESSION['success'] = 'del_truck';
      $f3->reroute('/trucks');
    }
  );
  /* Global settings */
  $f3->route('GET /global_settings',
    function() {
      $view = new View;
      echo $view->render('./app/ui/global_settings.php');
    }
  );
  $f3->route('POST /change_setting/@id',
    function($f3) {
      $_SESSION['setting_id'] = $f3->get('PARAMS.id');
      $_SESSION['setting_value'] = $f3->get('POST.value');
      $view = new View;
      echo $view->render('./app/change_setting.php');
    }
  );
  $f3->route('GET /modsetting_success',
    function($f3) {
      $_SESSION['success'] = 'mod_setting';
      $f3->reroute('/global_settings');
    }
  );
  $f3->route('GET /global_settings/@error',
    function($f3) {
      $_SESSION['error'] = $f3->get('PARAMS.error');
      $f3->reroute('/global_settings');
    }
  );
  /* Roles */
  $f3->route('GET /roles',
    function() {
      $view = new View;
      echo $view->render('./app/ui/roles.php');
    }
  );
  $f3->route('GET /roles/@error',
    function($f3) {
      $_SESSION['error'] = $f3->get('PARAMS.error');
      $f3->reroute('/roles');
    }
  );
  $f3->route('POST /new_role',
    function($f3) {
      $_SESSION['role_name'] = $f3->get('POST.name');
      $_SESSION['role_shortname'] = $f3->get('POST.short_name');
      $_SESSION['role_admin'] = $f3->get('POST.admin');
      $_SESSION['role_edit_user'] = $f3->get('POST.edit_user');
      $_SESSION['role_color'] = $f3->get('POST.color');
      $view = new View;
      echo $view->render('./app/new_role.php');
    }
  );
  $f3->route('GET /delete_role/@id',
    function($f3) {
      $_SESSION['role_id'] = $f3->get('PARAMS.id');
      $view = new View;
      echo $view->render('./app/delete_role.php');
    }
  );
  $f3->route('GET /addrole_success',
    function($f3) {
      $_SESSION['success'] = 'add_role';
      $f3->reroute('/roles');
    }
  );
  $f3->route('GET /delrole_success',
    function($f3) {
      $_SESSION['success'] = 'del_role';
      $f3->reroute('/roles');
    }
  );
  /* Recrutation */
  $f3->route('GET /recrutation',
    function() {
      $view = new View;
      echo $view->render('./app/ui/recrutation.php');
    }
  );
  $f3->route('GET /recruit/@id',
    function($f3) {
      $_SESSION['recruit_id'] = $f3->get('PARAMS.id');
      $view = new view;
      echo $view->render('./app/recruit.php');
    }
  );
  /* Trips (admin) */
  $f3->route('GET /trips_admin',
    function() {
      $view = new View;
      echo $view->render('./app/ui/trips_admin.php');
    }
  );
  $f3->route('GET /trip_admin/@id',
    function($f3) {
      $_SESSION['trip_id'] = $f3->get('PARAMS.id');
      $view = new view;
      echo $view->render('./app/trip_admin.php');
    }
  );
  $f3->route('POST /accept_trip/@id',
    function($f3) {
      $_SESSION['trip_id'] = $f3->get('PARAMS.id');
      $_SESSION['user_id'] = $f3->get('POST.user_id');
      $_SESSION['message'] = $f3->get('POST.message');
      $view = new View;
      echo $view->render('./app/accept_trip.php');
    }
  );
  $f3->route('GET /accepted_trip',
    function($f3) {
      $_SESSION['success'] = 'accepted_trip';
      $f3->reroute('/trips_admin');
    }
  );
  $f3->route('GET /rejected_trip',
    function($f3) {
      $_SESSION['success'] = 'rejected_trip';
      $f3->reroute('/trips_admin');
    }
  );
  $f3->route('POST /reject_trip/@id',
    function($f3) {
      $_SESSION['trip_id'] = $f3->get('PARAMS.id');
      $_SESSION['user_id'] = $f3->get('POST.user_id');
      $_SESSION['message'] = $f3->get('POST.message');
      $view = new View;
      echo $view->render('./app/reject_trip.php');
    }
  );
  /* Trips (user) */
  $f3->route('GET /add_trip',
    function() {
      $view = new View;
      echo $view->render('./app/ui/addtrip.php');
    }
  );
  $f3->route('GET /load_cities/@game',
    function($f3) {
      $_SESSION['game_id'] = $f3->get('PARAMS.game');
      $view = new View;
      echo $view->render('./app/load_cities.php');
    }
  );
  $f3->route('GET /load_companies/@game',
    function($f3) {
      $_SESSION['game_id'] = $f3->get('PARAMS.game');
      $view = new View;
      echo $view->render('./app/load_companies.php');
    }
  );
  $f3->route('GET /load_loads/@game',
    function($f3) {
      $_SESSION['game_id'] = $f3->get('PARAMS.game');
      $view = new View;
      echo $view->render('./app/load_loads.php');
    }
  );
  $f3->route('POST /new_trip_add',
    function($f3) {
      $f3->set('UPLOADS','./uploads/trips/');
      $overwrite = false;
      $slug = true;
      $file = $f3->get('FILES');
      $web = \Web::instance();
      $files = $web->receive(function($file,$image_end) {
          if($file['size'] > (5 * 1024 * 1024))
              return false;
          return true;
      },
      $overwrite,
      $slug);
      $_SESSION['game'] = $f3->get('POST.game');
      $_SESSION['from_city'] = $f3->get('POST.from_city');
      $_SESSION['from_company'] = $f3->get('POST.from_company');
      $_SESSION['to_city'] = $f3->get('POST.to_city');
      $_SESSION['to_company'] = $f3->get('POST.to_company');
      $_SESSION['load'] = $f3->get('POST.load');
      $_SESSION['tonnage'] = $f3->get('POST.tonnage');
      $_SESSION['used_truck'] = $f3->get('POST.used_truck');
      $_SESSION['distance'] = $f3->get('POST.distance');
      $_SESSION['fuel_used'] = $f3->get('POST.fuel_used');
      $_SESSION['damage'] = $f3->get('POST.damage');
      $_SESSION['money'] = $f3->get('POST.money');
      $_SESSION['datetime_beg'] = $f3->get('POST.datetime_beg');
      $_SESSION['datetime_end'] = $f3->get('POST.datetime_end');
      $_SESSION['participate_convoy'] = $f3->get('POST.participate_convoy');
      $_SESSION['files'] = $files;
      $view = new View;
      echo $view->render('./app/new_trip_add.php');
    }
  );
  $f3->route('GET /addtrip_success',
    function($f3) {
      $_SESSION['success'] = 'add_trip';
      $f3->reroute('/trips_user');
    }
  );
  $f3->route('GET /add_trip/@error',
    function($f3) {
      $_SESSION['error'] = $f3->get('PARAMS.error');
      $f3->reroute('/add_trip');
    }
  );
  $f3->route('GET /trips_user',
    function() {
      $view = new View;
      echo $view->render('./app/ui/trips_user.php');
    }
  );
  $f3->route('GET /trip_user/@id',
    function($f3) {
      $_SESSION['trip_id'] = $f3->get('PARAMS.id');
      $view = new view;
      echo $view->render('./app/trip_user.php');
    }
  );
  /* Recrutation system */
  $f3->route('GET /register',
    function() {
      $view = new View;
      echo $view->render('./app/ui/register.php');
    }
  );
  $f3->route('GET /login_steam',
    function() {
      $view = new View;
      echo $view->render('./app/login_steam.php');
    }
  );
  $f3->route('GET /create_application',
    function() {
      $view = new View;
      echo $view->render('./app/ui/create_application.php');
    }
  );
  $f3->route('GET /create_application/@error',
    function($f3) {
      $_SESSION['error'] = $f3->get('PARAMS.error');
      $f3->reroute('/create_application');
    }
  );
  $f3->route('POST /new_application',
    function($f3) {
      $_SESSION['recruit_nickname'] = $f3->get('POST.nickname');
      $_SESSION['recruit_steam_id'] = $f3->get('POST.steam_id');
      $_SESSION['recruit_steam_link'] = $f3->get('POST.steam_link');
      $_SESSION['recruit_on_tmp'] = $f3->get('POST.on_tmp');
      $_SESSION['recruit_ats'] = $f3->get('POST.ats');
      $str_dlcs = substr($f3->get('BODY'),strpos($f3->get('BODY'),'dlcs')+5,strpos($f3->get('BODY'),'&age')-strpos($f3->get('BODY'),'dlcs')-5);
      $count_dlcs = substr_count($dlcs,'dlcs=');
      $arr_dlcs = explode('&dlcs=',$str_dlcs);
      $_SESSION['recruit_dlcs'] = $arr_dlcs;
      $_SESSION['recruit_age'] = $f3->get('POST.age');
      $_SESSION['recruit_email'] = $f3->get('POST.email');
      $_SESSION['recruit_why_u'] = $f3->get('POST.why_u');
      $_SESSION['recruit_why_we'] = $f3->get('POST.why_we');
      $view = new View;
      echo $view->render('./app/new_application.php');
    }
  );
  $f3->route('GET /addrecruit_success',
    function($f3) {
      $f3->reroute('/application_sent');
    }
  );
  $f3->route('GET /application_sent',
    function() {
      $view = new View;
      echo $view->render('./app/ui/application_sent.php');
    }
  );
  $f3->route('POST /accept_recruit/@id',
    function($f3) {
      $_SESSION['recruit_id'] = $f3->get('PARAMS.id');
      $_SESSION['user_id'] = $f3->get('POST.user_id');
      $_SESSION['message'] = $f3->get('POST.message');
      $view = new View;
      echo $view->render('./app/accept_recruit.php');
    }
  );
  $f3->route('GET /accepted_recruit',
    function($f3) {
      $_SESSION['success'] = 'accepted_recruit';
      $f3->reroute('/recrutation');
    }
  );
  $f3->route('POST /reject_recruit/@id',
    function($f3) {
      $_SESSION['recruit_id'] = $f3->get('PARAMS.id');
      $_SESSION['message'] = $f3->get('POST.message');
      $view = new View;
      echo $view->render('./app/reject_recruit.php');
    }
  );
  /* Password reset */
  $f3->route('GET /reset_password',
    function() {
      $view = new View;
      echo $view->render('./app/ui/reset_pass.php');
    }
  );
  $f3->route('POST /pass_reset',
    function($f3) {
      $_SESSION['email'] = $f3->get('POST.email');
      $view = new View;
      echo $view->render('./app/pass_reset.php');
    }
  );
  $f3->route('GET /login/reset_pass',
    function($f3) {
      $_SESSION['success'] = 'reset_pass';
      $f3->reroute('/login');
    }
  );
  $f3->route('GET /reset_password/@error',
    function($f3) {
      $_SESSION['error'] = $f3->get('PARAMS.error');
      $f3->reroute('/reset_password');
    }
  );
  $f3->route('GET /set_password/@hash',
    function($f3) {
      $_SESSION['hash'] = $f3->get('PARAMS.hash');
      $view = new View;
      echo $view->render('./app/ui/set_pass.php');
    }
  );
  $f3->route('POST /pass_setup',
    function($f3) {
      $_SESSION['new_pass'] = $f3->get('POST.pass');
      $_SESSION['hash'] = $f3->get('POST.hash');
      $view = new View;
      echo $view->render('./app/pass_setup.php');
    }
  );
  $f3->route('GET /set_password/@hash/@error',
    function($f3) {
      $hash = $f3->get('PARAMS.hash');
      $_SESSION['error'] = $f3->get('PARAMS.error');
      $f3->reroute('/set_password/'.$hash);
    }
  );
  $f3->route('GET /login/new_pass',
    function($f3) {
      $_SESSION['success'] = 'new_pass';
      $f3->reroute('/login');
    }
  );
  /* Settings (user) */
  $f3->route('GET /settings',
    function() {
      $view = new View;
      echo $view->render('./app/ui/local_settings.php');
    }
  );
  $f3->route('POST /change_truck/@game',
    function($f3) {
      $_SESSION['game'] = $f3->get('PARAMS.game');
      $_SESSION['truck'] = $f3->get('POST.truck');
      $view = new View;
      echo $view->render('./app/change_truck.php');
    }
  );
  $f3->route('GET /settings/@error',
    function($f3) {
      $_SESSION['error'] = $f3->get('PARAMS.error');
      $f3->reroute('/settings');
    }
  );
  $f3->route('GET /modtruck_success',
    function($f3) {
      $_SESSION['success'] = 'changed_truck';
      $f3->reroute('/settings');
    }
  );
  $f3->route('POST /own_ats',
    function() {
      $view = new View;
      echo $view->render('./app/own_ats.php');
    }
  );
  $f3->route('GET /ownats_success',
    function($f3) {
      $_SESSION['success'] = 'own_ats';
      $f3->reroute('/settings');
    }
  );
  $f3->route('POST /mod_dlcs',
    function($f3) {
      $str_dlcs = explode('&dlcs=',$f3->get('BODY'));
      $str_dlcs[0] = substr($str_dlcs[0],5);
      $_SESSION['dlcs'] = $str_dlcs;
      $view = new View;
      echo $view->render('./app/mod_dlcs.php');
    }
  );
  $f3->route('GET /moddlcs_success',
    function($f3) {
      $_SESSION['success'] = 'mod_dlcs';
      $f3->reroute('/settings');
    }
  );
  $f3->route('POST /upload_avatar',
    function($f3) {
      $f3->set('UPLOADS','./uploads/avatars/');
      $overwrite = false;
      $slug = true;
      $file = $f3->get('FILES');
      $web = \Web::instance();
      $files = $web->receive(function($file,$image_avatar) {
          if($file['size'] > (5 * 1024 * 1024))
              return false;
          return true;
      },
      $overwrite,
      $slug);
      $_SESSION['files'] = $files;
      $view = new View;
      echo $view->render('./app/upload_avatar.php');
    }
  );
  $f3->route('GET /upavatar_success',
    function($f3) {
      $_SESSION['success'] = 'up_avatar';
      $f3->reroute('/settings');
    }
  );
  /* Notifications (marked as read) */
  $f3->route('GET /notifications_read',
    function() {
      $view = new View;
      echo $view->render('./app/notifications_read.php');
    }
  );
  /* Report of user */
  $f3->route('POST /generate_report_user',
    function($f3) {
      $_SESSION['user_id'] = $f3->get('POST.user_id');
      $_SESSION['date_beg_report'] = $f3->get('POST.date_beg');
      $_SESSION['date_end_report'] = $f3->get('POST.date_end');
      $view = new View;
      echo $view->render('./app/generate_report_user.php');
    }
  );
  $f3->route('GET /generate_report',
    function() {
      $view = new View;
      echo $view->render('./app/ui/generate_report.php');
    }
  );
  /* Installer & Upgrader */
  $f3->route('GET /installer',
    function($f3) {
      if(file_exists('./LOCK'))
      {
        $f3->reroute('/');
      }
      else
      {
        $view = new View;
        echo $view->render('./app/ui/installer.php');
      }
    }
  );
  $f3->route('POST /install',
    function($f3) {
      $_SESSION['admin_nickname'] = $f3->get('POST.nickname');
      $_SESSION['admin_email'] = $f3->get('POST.email');
      $_SESSION['db_name'] = $f3->get('POST.db_name');
      $_SESSION['db_nickname'] = $f3->get('POST.db_nickname');
      $_SESSION['db_pass'] = $f3->get('POST.db_pass');
      $_SESSION['db_host'] = $f3->get('POST.db_host');
      $_SESSION['smtp_email'] = $f3->get('POST.smtp_email');
      $_SESSION['smtp_pass'] = $f3->get('POST.smtp_pass');
      $_SESSION['smtp_method'] = $f3->get('POST.smtp_method');
      $_SESSION['smtp_port'] = $f3->get('POST.smtp_port');
      $_SESSION['smtp_host'] = $f3->get('POST.smtp_host');
      $_SESSION['vtc_name'] = $f3->get('POST.vtc_name');
      $_SESSION['vtc_logo'] = $f3->get('POST.vtc_logo');
      $_SESSION['vtc_slogan'] = $f3->get('POST.vtc_slogan');
      $_SESSION['vtc_tmpid'] = $f3->get('POST.vtc_tmpid');
      $_SESSION['api_key'] = $f3->get('POST.api_key');
      $view = new View;
      echo $view->render('./app/install.php');
    }
  );
  $f3->route('GET /installer/success',
    function($f3){
      $_SESSION['success_install'] = true;
      $f3->reroute('/');
    }
  );
  $f3->route('GET /upgrader',
    function($f3) {
      if(file_exists('./LOCK'))
      {
        $f3->reroute('/');
      }
      else
      {
        $view = new View;
        echo $view->render('./app/ui/upgrader.php');
      }
    }
  );
  $f3->route('POST /upgrade',
    function($f3) {
      $_SESSION['version'] = $f3->get('POST.version');
      $view = new View;
      echo $view->render('./app/upgrade.php');
    }
  );
  $f3->route('GET /upgrader/success',
    function($f3){
      $_SESSION['success_upgrade'] = true;
      $f3->reroute('/');
    }
  );
  /* Loads */
  $f3->route('GET /loads',
    function() {
      $view = new View;
      echo $view->render('./app/ui/loads.php');
    }
  );
  $f3->route('GET /addload_success',
    function($f3) {
      $_SESSION['success'] = 'add_load';
      $f3->reroute('/loads');
    }
  );
  $f3->route('GET /delload_success',
    function($f3) {
      $_SESSION['success'] = 'del_load';
      $f3->reroute('/loads');
    }
  );
  $f3->route('POST /new_load',
    function($f3) {
      $_SESSION['load_shortname'] = $f3->get('POST.short_name');
      $_SESSION['load_game'] = $f3->get('POST.game');
      $_SESSION['load_tonnage'] = $f3->get('POST.tonnage');
      $view = new View;
      echo $view->render('./app/new_load.php');
    }
  );
  $f3->route('GET /loads/@error',
    function($f3) {
      $_SESSION['error'] = $f3->get('PARAMS.error');
      $f3->reroute('/loads');
    }
  );
  $f3->route('GET /delete_load/@id',
    function($f3) {
      $_SESSION['load_id'] = $f3->get('PARAMS.id');
      $view = new View;
      echo $view->render('./app/delete_load.php');
    }
  );
  /* Convoy system */
  $f3->route('GET /list_convoys',
    function($f3){
      $view = new View;
      echo $view->render('./app/ui/list_convoys.php');
    }
  );
  $f3->route('GET /delete_convoy/@id',
    function($f3){
      $_SESSION['convoy_id'] = $f3->get('PARAMS.id');
      $view = new View;
      echo $view->render('./app/delete_convoy.php');
    }
  );
  $f3->route('GET /convoy/@id',
    function($f3){
      $_SESSION['convoy_id'] = $f3->get('PARAMS.id');
      $view = new View;
      echo $view->render('./app/single_convoy.php');
    }
  );
  $f3->route('GET /add_convoy',
    function($f3){
      $view = new View;
      echo $view->render('./app/ui/addconvoy.php');
    }
  );
  $f3->route('POST /new_convoy_add',
    function($f3) {
      $_SESSION['name'] = $f3->get('POST.name');
      $_SESSION['date'] = $f3->get('POST.date');
      $_SESSION['time_beg'] = $f3->get('POST.time_beg');
      $_SESSION['time_groupup'] = $f3->get('POST.time_groupup');
      $_SESSION['game'] = $f3->get('POST.game');
      $_SESSION['from_city'] = $f3->get('POST.from_city');
      $_SESSION['from_company'] = $f3->get('POST.from_company');
      $_SESSION['to_city'] = $f3->get('POST.to_city');
      $_SESSION['to_company'] = $f3->get('POST.to_company');
      $_SESSION['server_game'] = $f3->get('POST.server_game');
      $_SESSION['server_voip'] = $f3->get('POST.server_voip');
      $_SESSION['route'] = $f3->get('POST.route');
      $_SESSION['image_start'] = $f3->get('POST.image_start');
      $_SESSION['image_end'] = $f3->get('POST.image_end');
      $_SESSION['rules'] = $f3->get('POST.rules');
      $_SESSION['private'] = $f3->get('POST.private');
      $view = new View;
      echo $view->render('./app/new_convoy_add.php');
    }
  );
  $f3->route('GET /add_convoy/@error',
    function($f3){
      $_SESSION['error'] = $f3->get('PARAMS.error');
      $f3->reroute('/add_convoy');
    }
  );
  $f3->route('GET /addconvoy_success',
    function($f3) {
      $_SESSION['success'] = 'add_convoy';
      $f3->reroute('/list_convoys');
    }
  );
  $f3->route('GET /delconvoy_success',
    function($f3) {
      $_SESSION['success'] = 'del_convoy';
      $f3->reroute('/list_convoys');
    }
  );
  $f3->route('GET /modconvoy_success',
    function($f3) {
      $_SESSION['success'] = 'mod_convoy';
      $f3->reroute('/list_convoys');
    }
  );
  $f3->route('GET /edit_convoy/@id',
    function($f3) {
      $_SESSION['convoy_id'] = $f3->get('PARAMS.id');
      $view = new View;
      echo $view->render('./app/ui/editconvoy.php');
    }
  );
  $f3->route('POST /mod_convoy',
    function($f3) {
      $_SESSION['convoy_id'] = $f3->get('POST.id');
      $_SESSION['server_game'] = $f3->get('POST.server_game');
      $_SESSION['server_voip'] = $f3->get('POST.server_voip');
      $_SESSION['route'] = $f3->get('POST.route');
      $_SESSION['image_start'] = $f3->get('POST.image_start');
      $_SESSION['image_end'] = $f3->get('POST.image_end');
      $_SESSION['rules'] = $f3->get('POST.rules');
      $_SESSION['private'] = $f3->get('POST.private');
      $view = new View;
      echo $view->render('./app/mod_convoy.php');
    }
  );
  $f3->route('GET /mod_convoy/@id/@error',
    function($f3){
      $_SESSION['error'] = $f3->get('PARAMS.error');
      $id = $_SESSION['convoy_id'] = $f3->get('PARAMS.id');
      $f3->reroute('/edit_convoy/'.$id);
    }
  );
  $f3->route('GET /convoys',
    function($f3){
      if(isset($_SESSION['nickname']))
      {
        $view = new View;
        echo $view->render('./app/ui/convoys_user.php');
      }
      else
      {
        $view = new View;
        echo $view->render('./app/ui/convoys_nonuser.php');
      }
    }
  );