<?php
/*
 * Tachograph v2 by Arkadiusz Fatyga
 * English Language Pack (v1.1)
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
$email_dev = 'arkadiuszfatyga@outlook.com';
$start_url_sapi = '<a href="https://steamcommunity.com/dev/apikey" target="_blank">';
$end_url_sapi = '</a>';
// Don't edit above!

$lang_arr = array(
		'accept_recruit_firstpart'=>'Hello.'.$newline.'
									 We are pleased to announce that your application has been accepted!'.$newline.'
									 Below there is your nickname.'.$newline.'
									 Please set up your password with the link which is also down there.'.$newline.'
									 The URL will expire in 8 hours, if it will, you can reset it by your own.'.$newline.'
									 Now here is the message from company...'.$newline,
		'accept_recruit_secondpart'=>$newline."Have a nice day and happy trucking!".$newline.$start_strong."
									 Don't answer to this mail!".$end_strong,
		'accept'=>'Accept',
		'accepted_trip'=>'The trip has been successfully accepted!',
		'accepted'=>'Accepted',
		'actions'=>'Actions',
		'add_city'=>'Add city',
		'add_company'=>'Add company',
		'add_dlc'=>'Add DLC/mod',
		'add_load'=>'Add load',
		'add_role'=>'Add role',
		'add_trip'=>'Add trip',
		'add_truck'=>'Add truck',
		'add'=>'Add',
		'addcity_success'=>'The city has been successfully added!',
		'addcompany_success'=>'The company has been successfully added!',
		'addconvoy'=>'Add convoy',
		'addconvoy_success'=>'The convoy has been successfully added!',
		'adddlc_success'=>'The DLC/mod has been successfully added!',
		'addload_success'=>'Load has been added successfully! Remember about giving the full name in <code>load_en.php</code>!',
		'addrole_success'=>'The role has been successfully added!',
		'addtrip_success'=>'The trip has been successfully added!',
		'addtruck_success'=>'The truck has been successfully added!',
		'adduser_disclaimer'=>$newline.$start_strong.'Disclaimer (please inform the user!)'.$end_strong.$newline.'
							  The below data is needed in order to make below mentioned services working'.
							  $start_ulist.
								$start_li.'lookup of location of the user on TruckersMP server (only ETS2)'.$end_li.
								$start_li."lookup of user's bans on TruckersMP".$end_li.
							  $end_ulist,
		'adduser_success'=>'The user has been successfully added!',
		'adduser'=>'Add user',
		'administration'=>'Administration',
		'age'=>'Age',
		'alert_users'=>'Please inform users that during upgrade of the script, '.$start_strong.'the unsaved data will be dismissed!'.$end_strong.$newline.'
						If you are ready to proceed, then click on the button below.',
		'amount_of_bans'=>'Amount of bans',
		'amount'=>'Amount of',
		'application_added'=>'Application has been sent!',
		'are_u_sure_delconvoy'=>'Are you sure you want to delete this convoy?',
		'areu_on_tmp'=>'Are you on TruckersMP?',
		'ats_owner'=>'Does he/she own ATS?',
		'avatar_upload'=>'Upload avatar',
		'average_use_of_fuel'=>'Average use of fuel',
		'back_dashboard'=>'Back to main page',
		'blocked_checkban'=>'User has blocked ability to check bans',
		'blue'=>'Blue',
		'cancel'=>'Cancel',
		'change_password'=>'Change of password',
		'change_role'=>'Change role',
		'change_setting'=>'Change setting',
		'changed_truck'=>'Truck has been changed!',
		'check_application'=>'Check application',
		'choose_image'=>'Choose image',
		'cities'=>'Cities',
		'click_resetpass'=>'Click here to set new password',
		'closed'=>'Closed',
		'color_of_role'=>'Color of role',
		'companies'=>'Companies',
		'connect_voip'=>'Connect to VoIP',
		'convoys'=>'Convoys',
		'convoy_is_private'=>'Is convoy private?',
		'convoy_public'=>'Convoy is public.',
		'convoy_private'=>'Convoy is private.',
		'damage'=>'Damage',
		'dashboard_addtrip_title'=>'VTC Dashboard - Add trip',
		'dashboard_adduser_title'=>'VTC Dashboard - Add user',
		'dashboard_cities_title'=>'VTC Dashboard - Cities',
		'dashboard_companies_title'=>'VTC Dashboard - Companies',
		'dashboard_dlcs_title'=>'VTC Dashboard - DLCs',
		'dashboard_error_title'=>'VTC Dashboard - Error',
		'dashboard_generate_report'=>'VTC Dashboard - Generate report',
		'dashboard_global_settings_title'=>'VTC Dashboard - Global settings',
		'dashboard_listconvoys_title'=>'VTC Dashboard - List convoys',
		'dashboard_listusers_title'=>'VTC Dashboard - List users',
		'dashboard_loads_title'=>'VTC Dashboard - Loads',
		'dashboard_mainpage_title'=>'VTC Dashboard - Main page',
		'dashboard_recrutation_title'=>'VTC Dashboard - Recrutation',
		'dashboard_roles_title'=>'VTC Dashboard - Roles',
		'dashboard_trips_title'=>'VTC Dashboard - Trips',
		'dashboard_trucks_title'=>'VTC Dashboard - Trucks',
		'database'=>'Database',
		'date_beg_report'=>'From date',
		'date_end_report'=>'To date',
		'date_format'=>'Date format',
		'date'=>'Date',
		'datetime_beg'=>'Date and time of beginning',
		'datetime_end'=>'Date and time of end',
		'db_host'=>'Host of database',
		'db_name'=>'Name of database',
		'db_nickname'=>'Nickname to database',
		'db_pass'=>'Password to database',
		'default'=>'Default',
		'delcity_success'=>'The city has been successfully deleted!',
		'delcompany_success'=>'The company has been successfully deleted!',
		'delconvoy_success'=>'The convoy has been successfully deleted!',
		'deldlc_success'=>'The DLC/mod has been successfully deleted!',
		'delete'=>'Delete',
		'delload_success'=>'Load has been deleted successfully!',
		'delrole_success'=>'The role has been successfully deleted!',
		'deltruck_success'=>'The truck has been successfully deleted!',
		'deluser_firstpart'=>'Hello.'.$newline.'
							  Unfortunately we have to announce that your account has been deleted!'.$newline.'
							  Below is the reason of removal...'.$newline,
		'deluser_secondpart'=>$newline."We wish you best of luck!".$newline."
							  Have a nice day and happy trucking!".$newline.$start_strong."
							  Don't answer to this mail!".$end_strong,
		'deluser_success'=>'The user has been successfully deleted!',
		'disc_lookup_user'=>'If you would like to kick the user, change the rank or password, close this modal.',
		'disclaimer_steam'=>"Disclaimer - This website isn't associated neither with Steam, neither with Valve",
		'distance_driven'=>'Driven distance',
		'distance'=>'Distance',
		'dlcs_owned'=>'Owned DLCs',
		'dlcs'=>'DLCs',
		'driven_distance'=>'Driven distance',
		'driven'=>'driven',
		'edit_user'=>'Can edit users',
		'edit'=>'Edit',
		'email_address'=>'E-mail address',
		'email_clarification'=>'To this email will be sent a password with which he could be able to login.',
		'email_pass'=>'Password to email address',
		'email'=>'E-mail address',
		'empty_data'=>'Empty data',
		'end_convoy'=>'End of the convoy',
		'error_db'=>'Database error! Please report the issue on GitHub or send mail to '.$email_dev,
		'error_import_data'=>'Error in importing data! Please report the issue on GitHub or send mail to '.$email_dev,
		'error_info'=>'It looks like you found a glitch in the matrix...',
		'error_inserting_data'=>'Error in inserting data! Please report the issue on GitHub or send mail to '.$email_dev,
		'expired_url'=>'URL has expired',
		'file_not_uploaded'=>'File has not been uploaded',
		'follow'=>'Check on map',
		'forgotpass_login'=>'Forgot password?',
		'from_date'=>'from',
		'from'=>'From',
		'fuel_economy'=>'Fuel economy',
		'fuel_used_by_u'=>"You've used",
		'fuel_used_trip'=>'Fuel used',
		'gained_money'=>'Gained money',
		'game'=>'Game',
		'generate_report'=>'Generate report',
		'generated_with'=>'Generated with',
		'give_a_reason'=>'Give a reason of removal',
		'global_settings_desc'=>'Here you have to write some of global settings that are needed in order to run the script.'.$newline."
								 There is a lot, so stick with order!",
		'global_settings'=>'Global settings',
		'go_homepage'=>'Go to homepage',
		'green'=>'Green',
		'grey'=>'Grey',
		'have_u_ats'=>'Do you have ATS?',
		'homepage_isuser'=>'Are you a user?',
		'homepage_recruit_but'=>'Contact us!',
		'homepage_recruit'=>'Are you interested in our VTC?',
		'homepage_title'=>'Tachograph - Home page',
		'homepage_welcome'=>'Welcome in tachograph!',
		'i_own_ats'=>'I own ATS',
		'image_end'=>'Image from the end of trip',
		'information_from_company'=>'Information from company',
		'install_now'=>'Install now!',
		'installer_desc1'=>'Thank you for choosing my script.'.$newline.'
							I hope that everything will work from first run.'.$newline.'
							I spent tens of hours on working on it, but anything can happen.'.$newline."
							If something doesn't work, please contact me with use of socials that are presented on GitHub page.".$newline."
							Without further stopping you - let's jump into installing!",
		'installer_desc2'=>"That's it.".$newline.'
							Please remember that you need to follow the license (you can always check it on GitHub).'.$newline.'
							Also upload of images/generating reports does not violate the license!'.$newline."
							If everything is set up, click the button below.".$newline."
							Note - It can take somewhile to update some files, so be patient!",
		'installer_password'=>'Password will be sent to your e-mail address',
		'installer_title'=>'VTC Panel - Installer',
		'is_admin'=>'Is admin?',
		'is_in_game'=>'Is in game?',
		'is_on_tmp'=>'Is on TruckersMP?',
		'list_convoys'=>'List of convoys',
		'list_users'=>'List of users',
		'list'=>'List',
		'load'=>'Load',
		'loads'=>'Loads',
		'login_title'=>'Tachograph - Signing in to system',
		'login_with_steam'=>'Login with Steam',
		'logout_popup_content'=>'Select "Logout" below if you are ready to end your current session.',
		'logout_popup_title'=>'Ready to Leave?',
		'logout'=>'Log out',
		'lookup'=>'Look up',
		'made_by'=>'Made by',
		'mail_server_host'=>'SMTP server address',
		'mail_server'=>'Mail server',
		'main_page'=>'Main page',
		'main_user_desc'=>'Here you can input your credentials that you are gonna use to login to account.'.$newline."
						   Here you don't configure settings of VTC!",
		'main_user'=>'Main user',
		'mark_as_read'=>'Mark as read',
		'message_to_user'=>'Message to user',
		'method_connection'=>'Method of connection with SMTP',
		'modconvoy'=>'Modify convoy',
		'modconvoy_success'=>'The convoy has been modified!',
		'moddlcs_success'=>'The list of owned DLCs has been modified!',
		'modify_dlcs'=>'Modify list of owned DLCs',
		'modrole_success'=>'The role has been successfully modified!',
		'modsetting_success'=>'The setting has been successfully modified!',
		'money'=>'Money',
		'more_details'=>'More details',
		'name'=>'Name',
		'near_city'=>'Near by',
		'new_pass_success'=>'New password has been set up!',
		'new_password_firstpart'=>'Hello.'.$newline.'
								   You requested for reset of password.'.$newline.'
								   Below there is a link to reset the password.'.$newline.'
								   Please use it.'.$newline."
								   The URL will expire in 8 hours.".$newline,
		'new_password_secondpart'=>$newline."Have a nice day and happy trucking!".$newline.$start_strong."
								   Don't answer to this mail!".$end_strong,
		'new_password'=>'New password',
		'new'=>'New',
		'news'=>'News',
		'nickname'=>'Nickname',
		'no_notifications'=>'There are no notifications',
		'no'=>'No',
		'none_recruits'=>'There are no candidates',
		'none'=>'None',
		'notifications'=>'Notifications',
		'on_tmp_from'=>'The user is on TruckersMP from ',
		'open'=>'Open',
		'own_ats'=>'If you now own ATS, click this button',
		'ownats_success'=>'You now own ATS!',
		'participated_convoy'=>'I participated in convoy...',
		'password_reset_email'=>'Please write your email below.',
		'password_too_short'=>'Password is too short',
		'password'=>'Password',
		'per_100'=>'per 100',
		'period_of_time'=>'Period of time',
		'port_number_smtp'=>"SMTP's port number",
		'post_url_image'=>'Post URL to image',
		'post_url_voip'=>'Post URL to VoIP server',
		'profile'=>'Profile',
		'read_more'=>'Read more...',
		'ready_to_recruit'=>'Fitting the requirements?'.$newline.'
							 Read the rules?'.$newline.'
							 Then click the button below and send your application!',
		'recrutation'=>'Recrutation',
		'red'=>'Red',
		'register_title'=>'VTC Dashboard - Register',
		'reject_recruit_firstpart'=>'Hello.'.$newline.'
									 Unfortunately we have to announce that your application has been rejected!'.$newline.'
									 Below is the message from company...'.$newline,
		'reject_recruit_secondpart'=>$newline."We wish you best of luck!".$newline."
									 Have a nice day and happy trucking!".$newline.$start_strong."
									 Don't answer to this mail!".$end_strong,
		'reject'=>'Reject',
		'rejected_trip'=>'The trip has been successfully rejected!',
		'rejected'=>'Rejected',
		'remove_user'=>'Remove user',
		'remove_convoy'=>'Remove convoy',
		'report_user'=>"User's report",
		'report'=>'Report',
		'requirements'=>'Requirements',
		'reset_pass_success'=>'The password has been reset!'.$newline.'
							   Check mailbox for a mail.',
		'reset_pass'=>'Reset password',
		'role_unremovable'=>'Role unremovable',
		'role'=>'Role',
		'roles'=>'Roles',
		'route'=>'Route',
		'rules_accepted'=>'Rules has been accepted by user',
		'rules_not_accepted'=>'Rules has not been accepted!',
		'rules'=>'Rules',
		'select_game'=>'Select game',
		'select_option'=>'Select one from the options',
		'select_owned_dlcs'=>'Select owned DLCs',
		'select_truck_ats'=>"Select truck which you'll be using in ATS",
		'select_truck_ets2'=>"Select truck which you'll be using in ETS2",
		'select_user'=>'Select user',
		'select_version'=>'Select version from which you are upgrading',
		'send_application'=>'Send application',
		'server'=>'Server',
		'server_game'=>'Game server',
		'server_voip'=>'Server VoIP (TS3, Discord)',
		'set_password1'=>'Set a new password',
		'set_password2'=>'Keep in mind that password must have at least:'.$newline.$start_strong.'
						- 8 characters,'.$newline.'
						- one capital letter,'.$newline.'
						- one number,'.$newline.'
						- one alfanumeric character.'.$end_strong,
		'settings_lang'=>'Settings',
		'settings'=>'Settings',
		'short_name'=>'Short name',
		'sign_out'=>'Logout',
		'signin'=>'Sign in',
		'soon_reply'=>'Soon someone from our VTC crew will send you message to your email.'.$newline."
					   Check your mailbox (maybe mail will be in Spam?)".$newline.'
					   In the mean time you can also check out our social media, which are below.'.$newline.'
					   For now - happy trucking! :)',
		'start_convoy'=>'Start of the convoy',
		'stats_alltime'=>'Stats - From beginning',
		'status'=>'Status',
		'steam_api_desc'=>'We need it in order to let users register with use of Steam.'.$newline.'
						   Please go to '.$start_url_sapi.'this website'.$end_url_sapi.' and get your API key.',
		'steam_api_key'=>'API Key for Steam',
		'steam_profile'=>'Steam Profile',
		'success_install'=>'Script has been installed successfully! Please go to your email account and setup your password!',
		'success_upgrade'=>'Script has been upgraded successfully! You can now login.',
		'sum_driven_distance'=>'Sum of driven distance',
		'sum_driven'=>"You've driven",
		'sum_trips_top10'=>'Amount of trips',
		'sum_trips1'=>"You've done",
		'sum_trips2_multi'=>'trips',
		'sum_trips2_one'=>'trip',
		'summary'=>'Summary - '.date('F',time()),
		'tachograph'=>'Tachograph',
		'time_beg_convoy'=>'Time of the beginnning of the convoy',
		'time_format'=>'Time format',
		'time_groupup'=>'Time of the group up',
		'time_of_trip'=>'Time of trip',
		'to_date'=>'to',
		'to'=>'To',
		'tonnage'=>'Tonnage',
		'top10_drivers'=>'Top 10 drivers',
		'trip_accepted_firstpart'=>'Trip number',
		'trip_accepted_secondpart'=>'has been accepted!',
		'trip_no'=>'Trip no.',
		'trip_rejected_firstpart'=>'Trip number',
		'trip_rejected_secondpart'=>'has been rejected!',
		'trip'=>'Trip',
		'trips_done'=>'Trips done',
		'trips'=>'Trips',
		'truck_ats'=>'Which truck in ATS will be this person using?',
		'truck_ets2'=>'Which truck in ETS2 will be this person using?',
		'trucks'=>'Trucks',
		'turquoise'=>'Turquoise',
		'u_are_about_del'=>'You are about to delete',
		'undefined'=>'Undefined',
		'unit_distance'=>'Unit of distance',
		'unit_fuel'=>'Unit of fuel',
		'unit_money'=>'Unit of money',
		'unit_tonnage'=>'Unit of tonnage',
		'upavatar_success'=>'An avatar has been uploaded!',
		'upgrade_now'=>'Upgrade now!',
		'upgrader_desc'=>'Thank you for using my script.'.$newline.'
						  Here you can upgrade your script to new version.'.$newline.'
						  If something will not work as expected, please contact me with use of socials that are presented on GitHub page.'.$newline."
						  Without further stopping you - let's jump into upgrading!",
		'upgrader_title'=>'VTC Panel - Upgrader',
		'upload_image_end'=>'Upload image from the end of trip',
		'used_truck_ats'=>'Used truck (ATS)',
		'used_truck_ets2'=>'Used truck (ETS2)',
		'used_truck'=>'Used truck',
		'used_url'=>'URL has been used',
		'user'=>'User',
		'users'=>'Users',
		'valid_tonnage'=>'valid tonnage',
		'vtc_logo_desc'=>'You need to give a localisation, e.g. <code>./images/truck.png</code>'.$newline.'
						  Logo should be squared.',
		'vtc_logo'=>'VTC Logo',
		'vtc_name'=>'VTC Name',
		'vtc_settings'=>'VTC Settings',
		'vtc_slogan'=>'Slogan of the VTC',
		'vtc_tmpid'=>'ID of VTC in TruckersMP VTC system',
		'welcome_message'=>'Welcome to our company!'.$newline.'
							We have setup some things for you.'.$newline.'
							If you need to change settings, click on your nickname and from list pick "Settings".'.$newline."
							If you'll need any help, ask our drivers or management.".$newline.'
							Happy trucking!',
		'welcome_to_company'=>'Welcome to company!',
		'welcome'=>'Welcome!',
		'which_dlcs_u_own'=>'Which DLCs do you own?',
		'why_u'=>'Why you?',
		'why_us'=>'Why us?',
		'why_we'=>'Why we?',
		'why_you'=>'Why you?',
		'write_here'=>'Write it here',
		'wrong_email'=>'Wrong email address',
		'wrong_nickname' => 'Wrong nickname',
		'wrong_pass' => 'Wrong password',
		'years_old'=>'years old',
		'yellow'=>'Yellow',
		'yes'=>'Yes',
		'you'=>'You',
);
//Don't edit the lines below
$array_LP = array_merge($lang_arr,(array)$load);
return $array_LP;