<?php
/*
 * Tachograph v2 by Arkadiusz Fatyga
 * English Language Pack (v2.0)
 * In order to translate the language pack into another language, please copy that and rename to your language's initials.
 * Remember about sending to me via e-mail or publishing on GitHub with the same license!
 * GPL v3
 */
// Don't edit below!
include_once './app/dict/load_en.php';
$start_ulist = '<ul>';
$start_li = '<li>';
$start_strong = '<b>';
$end_ulist = '</ul>';
$end_li = '</li>';
$end_strong = '</b>';
$newline= '<br>';
$email_dev = 'kontakt@arkadiusz-fatyga.eu';
// Don't edit above!

$lang_arr = array(
		'email'=>'E-mail address',
		'password'=>'Password',
		'signin'=>'Sign in',
		'forgotpass_login'=>'Forgot password?',
		'wrong_pass' => 'Wrong password',
		'wrong_nickname' => 'Wrong nickname',
		'login_title'=>'Tachograph - Signing in to system',
		'homepage_title'=>'Tachograph - Home page',
		'homepage_welcome'=>'Welcome in tachograph!',
		'homepage_isuser'=>'Are you a user?',
		'homepage_recruit'=>'Are you interested in our VTC?',
		'homepage_recruit_but'=>'Contact us!',
		'dashboard_mainpage_title'=>'VTC Dashboard - Main page',
		'main_page'=>'Main page',
		'profile'=>'Profile',
		'settings'=>'Settings',
		'sign_out'=>'Logout',
		'summary'=>'Summary - '.date('F',time()),
		'nickname'=>'Nickname',
		'sum_driven'=>"You've driven",
		'generate_report'=>'Generate report',
		'fuel_used_by_u'=>"You've used",
		'sum_trips1'=>"You've done",
		'sum_trips2_multi'=>'trips',
		'sum_trips2_one'=>'trip',
		'logout_popup_title'=>'Ready to Leave?',
		'logout_popup_content'=>'Select "Logout" below if you are ready to end your current session.',
		'cancel'=>'Cancel',
		'logout'=>'Log out',
		'administration'=>'Administration',
		'users'=>'Users',
		'list'=>'List',
		'add'=>'Add',
		'delete'=>'Delete',
		'recrutation'=>'Recrutation',
		'trips'=>'Trips',
		'top10_drivers'=>'Top 10 drivers',
		'sum_driven_distance'=>'Sum of driven distance',
		'driven'=>'driven',
		'fuel_economy'=>'Fuel economy',
		'amount'=>'Amount of',
		'per_100'=>'per 100',
		'sum_trips_top10'=>'Amount of trips',
		'dashboard_adduser_title'=>'VTC Dashboard - Add user',
		'adduser'=>'Add user',
		'adduser_disclaimer'=>$newline.$start_strong.'Disclaimer (please inform the user!)'.$end_strong.$newline.'
							   The below data is needed in order to make below mentioned services working'.
							   $start_ulist.
								   $start_li.'lookup of location of the user on TruckersMP server (only ETS2)'.$end_li.
								   $start_li."lookup of user's bans on TruckersMP".$end_li.
							   $end_ulist,
		'email_clarification'=>'To this email will be sent a password with which he could be able to login.',
		'rules_accepted'=>'Rules has been accepted by user',
		'select_option'=>'Select one from the options',
		'yes'=>'Yes',
		'no'=>'No',
		'dlcs_owned'=>'Owned DLCs',
		'ats_owner'=>'Does he/she own ATS?',
		'truck_ets2'=>'Which truck in ETS2 will be this person using?',
		'truck_ats'=>'Which truck in ATS will be this person using?',
		'rules_not_accepted'=>'Rules has not been accepted!',
		'error_db'=>'Database error! Please report the issue on GitHub or send mail to '.$email_dev,
		'dashboard_listusers_title'=>'VTC Dashboard - List users',
		'list_users'=>'List of users',
		'used_truck_ets2'=>'Used truck (ETS2)',
		'used_truck_ats'=>'Used truck (ATS)',
		'none'=>'None',
		'adduser_success'=>'The user has been successfully added!',
		'deluser_success'=>'The user has been successfully deleted!',
		'roles'=>'Roles',
		'settings_lang'=>'Settings',
		'cities'=>'Cities',
		'dlcs'=>'DLCs',
		'trucks'=>'Trucks',
		'global_settings'=>'Global settings',
		'companies'=>'Companies',
		'dashboard_dlcs_title'=>'VTC Dashboard - DLCs',
		'name'=>'Name',
		'short_name'=>'Short name',
		'actions'=>'Actions',
		'add_dlc'=>'Add DLC/mod',
		'adddlc_success'=>'The DLC/mod has been successfully added!',
		'deldlc_success'=>'The DLC/mod has been successfully deleted!',
		'dashboard_cities_title'=>'VTC Dashboard - Cities',
		'add_city'=>'Add city',
		'addcity_success'=>'The city has been successfully added!',
		'delcity_success'=>'The city has been successfully deleted!',
		'game'=>'Game',
		'dashboard_companies_title'=>'VTC Dashboard - Companies',
		'add_company'=>'Add company',
		'addcompany_success'=>'The company has been successfully added!',
		'delcompany_success'=>'The company has been successfully deleted!',
		'dashboard_trucks_title'=>'VTC Dashboard - Trucks',
		'add_truck'=>'Add truck',
		'addtruck_success'=>'The truck has been successfully added!',
		'deltruck_success'=>'The truck has been successfully deleted!',
		'dashboard_global_settings_title'=>'VTC Dashboard - Global settings',
		'change_setting'=>'Change setting',
		'modsetting_success'=>'The setting has been successfully modified!',
		'vtc_name'=>'VTC Name',
		'vtc_logo'=>'VTC Logo',
		'unit_distance'=>'Unit of distance',
		'unit_fuel'=>'Unit of fuel',
		'open'=>'Open',
		'closed'=>'Closed',
		'is_admin'=>'Is admin?',
		'dashboard_roles_title'=>'VTC Dashboard - Roles',
		'role_unremovable'=>'Role unremovable',
		'add_role'=>'Add role',
		'default'=>'Default',
		'blue'=>'Blue',
		'grey'=>'Grey',
		'red'=>'Red',
		'green'=>'Green',
		'turquoise'=>'Turquoise',
		'yellow'=>'Yellow',
		'addrole_success'=>'The role has been successfully added!',
		'delrole_success'=>'The role has been successfully deleted!',
		'dashboard_error_title'=>'VTC Dashboard - Error',
		'error_info'=>'It looks like you found a glitch in the matrix...',
		'back_dashboard'=>'Back to main page',
		'dashboard_recrutation_title'=>'VTC Dashboard - Recrutation',
		'none_recruits'=>'There are no candidates',
		'check_application'=>'Check application',
		'steam_profile'=>'Steam Profile',
		'years_old'=>'years old',
		'is_on_tmp'=>'Is on TruckersMP?',
		'age'=>'Age',
		'why_you'=>'Why you?',
		'why_us'=>'Why us?',
		'blocked_checkban'=>'User has blocked ability to check bans',
		'on_tmp_from'=>'The user is on TruckersMP from ',
		'date_format'=>'Date format',
		'accept'=>'Accept',
		'reject'=>'Reject',
		'message_to_user'=>'Message to user',
		'amount_of_bans'=>'Amount of bans',
		'time_format'=>'Time format',
		'time_of_trip'=>'Time of trip',
		'from'=>'From',
		'to'=>'To',
		'load'=>'Load',
		'made_by'=>'Made by',
		'unit_tonnage'=>'Unit of tonnage',
		'lookup'=>'Look up',
		'trip_no'=>'Trip no.',
		'datetime_beg'=>'Date and time of beginning',
		'datetime_end'=>'Date and time of end',
		'tonnage'=>'Tonnage',
		'valid_tonnage'=>'valid tonnage',
		'driven_distance'=>'Driven distance',
		'fuel_used_trip'=>'Fuel used',
		'average_use_of_fuel'=>'Average use of fuel',
		'image_end'=>'Image from the end of trip',
		'dashboard_trips_title'=>'VTC Dashboard - Trips',
		'you'=>'You',
		'add_trip'=>'Add trip',
		'trip'=>'Trip',
		'select_game'=>'Select game',
		'report_user'=>"User's report",
		'used_truck'=>'Used truck',
		'distance'=>'Distance',
		'upload_image_end'=>'Upload image from the end of trip',
		'choose_image'=>'Choose image',
		'damage'=>'Damage',
		'money'=>'Money',
		'file_not_uploaded'=>'File has not been uploaded',
		'addtrip_success'=>'The trip has been successfully added!',
		'status'=>'Status',
		'new'=>'New',
		'rejected'=>'Rejected',
		'accepted'=>'Accepted',
		'gained_money'=>'Gained money',
		'tachograph'=>'Tachograph',
		'user'=>'User',
		'rules'=>'Rules',
		'requirements'=>'Requirements',
		'ready_to_recruit'=>'Fitting the requirements?'.$newline.'
							 Read the rules?'.$newline.'
							 Then click the button below and send your application!',
		'disclaimer_steam'=>"Disclaimer - This website isn't associated neither with Steam, neither with Valve",
		'areu_on_tmp'=>'Are you on TruckersMP?',
		'have_u_ats'=>'Do you have ATS?',
		'which_dlcs_u_own'=>'Which DLCs do you own?',
		'why_u'=>'Why you?',
		'why_we'=>'Why we?',
		'send_application'=>'Send application',
		'login_with_steam'=>'Login with Steam',
		'application_added'=>'Application has been sent!',
		'soon_reply'=>'Soon someone from our VTC crew will send you message to your email.'.$newline."
					   Check your mailbox (maybe mail will be in Spam?)".$newline.'
					   In the mean time you can also check out our social media, which are below.'.$newline.'
					   For now - happy trucking! :)',
		'register_title'=>'VTC Dashboard - Register',
		'password_reset_email'=>'Please write your email below.',
		'reset_pass'=>'Reset password',
		'new_password'=>'New password',
		'new_password_firstpart'=>'Hello.'.$newline.'
								   You requested for reset of password.'.$newline.'
								   Below there is a link to reset the password.'.$newline.'
								   Please use it.'.$newline."
								   The URL will expire in 8 hours.".$newline,
		'new_password_secondpart'=>$newline."Have a nice day and happy trucking!".$newline.$start_strong."
									Don't answer to this mail!".$end_strong,
		'reset_pass_success'=>'The password has been reset!'.$newline.'
									 Check mailbox for a mail.',
		'wrong_email'=>'Wrong email address',
		'email_address'=>'E-mail address',
		'email_pass'=>'Password to email address',
		'mail_server'=>'Mail server',
		'method_connection'=>'Method of connection with SMTP',
		'port_number_smtp'=>"SMTP's port number",
		'unit_money'=>'Unit of money',
		'vtc_slogan'=>'Slogan Wirtualnej Spedycji',
		'vtc_tmpid'=>'ID VS w systemie TruckersMP VTC',
		'accepted_trip'=>'The trip has been successfully accepted!',
		'rejected_trip'=>'The trip has been successfully rejected!',
		'steam_api_key'=>'API Key for Steam',
		'welcome_message'=>'Welcome to our company!'.$newline.'
							We have setup some things for you.'.$newline.'
							If you need to change settings, click on your nickname and from list pick "Settings".'.$newline."
							If you'll need any help, ask our drivers or management.".$newline.'
							Happy trucking!',
		'welcome_to_company'=>'Welcome to company!',
		'accept_recruit_firstpart'=>'Hello.'.$newline.'
									 We are pleased to announce that your application has been accepted!'.$newline.'
									 Below there is your nickname.'.$newline.'
									 Please set up your password with the link which is also down there.'.$newline.'
									 The URL will expire in 8 hours, if it will, you can reset it by your own.'.$newline.'
									 Now here is the message from company...'.$newline,
		'accept_recruit_secondpart'=>$newline."Have a nice day and happy trucking!".$newline.$start_strong."
									Don't answer to this mail!".$end_strong,
		'reject_recruit_firstpart'=>'Hello.'.$newline.'
									 Unfortunately we have to announce that your application has been rejected!'.$newline.'
									 Below is the message from company...'.$newline,
		'reject_recruit_secondpart'=>$newline."We wish you best of luck!".$newline."
									 Have a nice day and happy trucking!".$newline.$start_strong."
									 Don't answer to this mail!".$end_strong,
		'information_from_company'=>'Information from company',
		'is_in_game'=>'Is in game?',
		'follow'=>'Check on map',
		'server'=>'Server',
		'near_city'=>'Near by',
		'role'=>'Role',
		'stats_alltime'=>'Stats - From beginning',
		'trips_done'=>'Trips done',
		'distance_driven'=>'Driven distance',
		'disc_lookup_user'=>'If you would like to kick the user, change the rank or password, close this modal.',
		'change_role'=>'Change role',
		'u_are_about_del'=>'You are about to delete',
		'give_a_reason'=>'Give a reason of removal',
		'remove_user'=>'Remove user',
		'deluser_firstpart'=>'Hello.'.$newline.'
							  Unfortunately we have to announce that your account has been deleted!'.$newline.'
							  Below is the reason of removal...'.$newline,
		'deluser_secondpart'=>$newline."We wish you best of luck!".$newline."
							  Have a nice day and happy trucking!".$newline.$start_strong."
							  Don't answer to this mail!".$end_strong,
		'edit_user'=>'Can edit users',
		'color_of_role'=>'Color of role',
		'vtc_slogan'=>'Slogan of the VTC',
		'vtc_tmpid'=>'ID of VTC in TruckersMP VTC system',
		'no_notifications'=>'There are no notifications',
		'notifications'=>'Notifications',
		'trip_accepted_firstpart'=>'Trip number',
		'trip_accepted_secondpart'=>'has been accepted!',
		'welcome'=>'Welcome!',
		'trip_rejected_firstpart'=>'Trip number',
		'trip_rejected_secondpart'=>'has been rejected!',
		'modrole_success'=>'The role has been successfully modified!',
		'click_resetpass'=>'Click here to set new password',
		'change_password'=>'Change of password',
		'expired_url'=>'URL has expired',
		'set_password1'=>'Set a new password',
		'set_password2'=>'Keep in mind that password must have at least:'.$newline.$start_strong.'
						  - 8 characters,'.$newline.'
						  - one capital letter,'.$newline.'
						  - one number,'.$newline.'
						  - one alfanumeric character.'.$end_strong,
		'used_url'=>'URL has been used',
		'password_too_short'=>'Password is too short',
		'new_pass_success'=>'New password has been set up!',
		'select_truck_ets2'=>"Select truck which you'll be using in ETS2",
		'select_truck_ats'=>"Select truck which you'll be using in ATS",
		'own_ats'=>'If you now own ATS, click this button',
		'i_own_ats'=>'I own ATS',
		'changed_truck'=>'Truck has been changed!',
		'ownats_success'=>'You now own ATS!',
		'select_owned_dlcs'=>'Select owned DLCs',
		'modify_dlcs'=>'Modify list of owned DLCs',
		'moddlcs_success'=>'The list of owned DLCs has been modified!',
		'avatar_upload'=>'Upload avatar',
		'upavatar_success'=>'An avatar has been uploaded!',
		'mark_as_read'=>'Mark as read',
		'report'=>'Report',
		'period_of_time'=>'Period of time',
		'empty_data'=>'Empty data',
		'select_user'=>'Select user',
		'date_beg_report'=>'From date',
		'date_end_report'=>'To date',
		'from_date'=>'from',
		'to_date'=>'to',
		'generated_with'=>'Generated with',
		'installer_title'=>'VTC Panel - Installer',
		'installer_desc1'=>'Thank you for choosing my script.'.$newline.'
							I hope that everything will work from first run.'.$newline.'
							I spent tens of hours on working on it, but anything can happen.'.$newline."
							If something doesn't work, please contact me with use of socials that are presented on GitHub page.".$newline."
							Without further stopping you - let's jump into installing!",
		'main_user'=>'Main user',
		'main_user_desc'=>'Here you can input your credentials that you are gonna use to login to account.'.$newline."
						   Here you don't configure settings of VTC!",
		'installer_password'=>'Password will be sent to your e-mail address',
		'global_settings_desc'=>'Here you have to write some of global settings that are needed in order to run the script.'.$newline."
								 There is a lot, so stick with order!",
		'database'=>'Database',
		'db_name'=>'Name of database',
		'db_nickname'=>'Nickname to database',
		'db_pass'=>'Password to database',
		'db_host'=>'Host of database',
		'mail_server_host'=>'SMTP server address',
		'vtc_settings'=>'VTC Settings',
		'vtc_logo_desc'=>'You need to give a localisation, e.g. <code>./images/truck.png</code>'.$newline.'
						  Logo should be squared.',
		'steam_api_desc'=>'We need it in order to let users register with use of Steam.'.$newline.'
						   Please go to '.$start_url_sapi.'this website'.$end_url_sapi.' and get your API key.',
		'write_here'=>'Write it here',
		'installer_desc2'=>"That's it.".$newline.'
							Please remember that you need to follow the license (you can always check it on GitHub).'.$newline.'
							Also upload of images/generating reports does not violate the license!'.$newline."
							If everything is set up, click the button below.".$newline."
							Note - It can take somewhile to update some files, so be patient!",
		'install_now'=>'Install now!',
		'dashboard_addtrip_title'=>'VTC Dashboard - Add trip',
		'loads'=>'Loads',
		'dashboard_loads_title'=>'VTC Dashboard - Loads',
		'add_load'=>'Add load',
		'addload_success'=>'Load has been added successfully! Remember about giving the full name in <code>load_en.php</code>!',
		'delload_success'=>'Load has been deleted successfully!'
);
//Don't edit the lines below
$array_LP = array_merge($lang_arr,(array)$load);
return $array_LP;