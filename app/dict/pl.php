<?php
/*
 * Tachograph v2 by Arkadiusz Fatyga
 * Polish Language Pack (v1.1)
 * In order to translate the language pack into another language, please copy that and rename to your language's initials.
 * Remember about sending to me via e-mail or publishing on GitHub with the same license!
 * GPL v3
 */
// Don't edit below!
include_once './app/dict/load_pl.php';
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
$months = array('Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień');
$days = array('Poniedziałek','Wtorek','Środa','Czwartek','Piątek','Sobota','Niedziela');

$lang_arr = array(
		'accept_recruit_firstpart'=>'Cześć.'.$newline.'
									 Mamy przyjemność ogłosić, że Twoja aplikacja została przyjęta!'.$newline.'
									 Poniżej jest Twoja nazwa użytkownika.'.$newline.'
									 Proszę ustawić swoje hasło z użyciem linku, który również znajduje się poniżej.'.$newline.'
									 Link straci ważność po 8 godzinach, jeśli tak się stanie, możesz sobie go zresetować samodzielnie.'.$newline.'
									 Teraz czas na wiadomość od firmy...'.$newline,
		'accept_recruit_secondpart'=>$newline."Życzymy miłego dnia i szerokości!".$newline.$start_strong."
											   Nie odpowiadaj na tą wiadomość!".$end_strong,
		'accept'=>'Zaakceptuj',
		'accepted_trip'=>'Akceptacja trasy zakończyło się powodzeniem!',
		'accepted'=>'Zaakceptowany',
		'actions'=>'Czynności',
		'add_city'=>'Dodaj miasto',
		'add_company'=>'Dodaj firmę',
		'add_dlc'=>'Dodaj DLC/mod',
		'add_load'=>'Dodaj ładunek',
		'add_role'=>'Dodaj rangę',
		'add_trip'=>'Dodaj trasę',
		'add_truck'=>'Dodaj ciężarówkę',
		'add'=>'Dodaj',
		'addcity_success'=>'Dodanie miasta zakończyło się sukcesem!',
		'addcompany_success'=>'Dodanie firmy zakończyło się sukcesem!',
		'addconvoy'=>'Dodaj konwój',
		'addconvoy_success'=>'Dodanie konwoju zakończyło się sukcesem!',
		'adddlc_success'=>'Dodanie DLC/moda zakończyło się sukcesem!',
		'addload_success'=>'Dodanie ładunku zakończyło się sukcesem! Pamiętaj o dodaniu pełnej nazwy w <code>load_pl.php</code> !',
		'addrole_success'=>'Dodanie rangi zakończyło się sukcesem!',
		'addtrip_success'=>'Dodanie trasy zakończyło się sukcesem!',
		'addtruck_success'=>'Dodanie ciężarówki zakończyło się sukcesem!',
		'adduser'=>'Dodaj użytkownika',
		'adduser_disclaimer'=>$newline.$start_strong.'Informacja (przekaż ją użytkownikowi!)'.$end_strong.$newline.'
							  Poniższe dane są wymagane do działania poniższych usług'.
							  $start_ulist.
							   $start_li.'podejrzenia lokalizacji użytkownika na serwerze TruckersMP (tylko ETS2)'.$end_li.
							   $start_li.'podejrzenia banów użytkownika na TruckersMP'.$end_li.
							  $end_ulist,
		'adduser_success'=>'Dodanie użytkownika zakończyło się sukcesem!',
		'administration'=>'Administracja',
		'age'=>'Wiek',
		'alert_users'=>'Proszę poinformować użytkowników, że podczas aktualizacji skryptu '.$start_strong.'niezapisane dane zostaną odrzucone!'.$end_strong.$newline.'
						Jeśli jesteś gotów, by kontynuować - kliknij na przycisk poniżej.',
		'amount_of_bans'=>'Ilość banów',
		'amount'=>'Ilość',
		'application_added'=>'Aplikacja została wysłana!',
		'are_u_sure_delconvoy'=>'Czy na pewno chcesz usunąć ten konwój?',
		'areu_on_tmp'=>'Czy jesteś na TruckersMP?',
		'ats_owner'=>'Czy posiada ATS?',
		'avatar_upload'=>'Wstaw awatar',
		'average_use_of_fuel'=>'Średnie zużycie paliwa',
		'back_dashboard'=>'Powrót do strony głównej',
		'blocked_checkban'=>'Użytkownik zablokował możliwość sprawdzenia banów',
		'blue'=>'Niebieski',
		'cancel'=>'Odrzuć',
		'change_password'=>'Zmiana hasła',
		'change_role'=>'Zmień rangę',
		'change_setting'=>'Zmień ustawienie',
		'changed_truck'=>'Ciężarówka została zmieniona!',
		'check_application'=>'Sprawdź aplikację',
		'choose_image'=>'Wybierz obrazek',
		'cities'=>'Miasta',
		'click_resetpass'=>'Kliknij tutaj, aby ustawić nowe hasło',
		'closed'=>'Zamknięta',
		'color_of_role'=>'Kolor rangi',
		'companies'=>'Firmy',
		'connect_voip'=>'Połącz się z VoIP',
		'convoys'=>'Konwoje',
		'convoy_is_private'=>'Czy konwój jest prywatny?',
		'convoy_public'=>'Konwój jest publiczny.',
		'convoy_private'=>'Konwój jest prywatny.',
		'damage'=>'Uszkodzenia',
		'dark_mode'=>'Tryb Ciemny',
		'dark_mode_on'=>'Tryb ciemny został włączony!',
		'dark_mode_off'=>'Tryb ciemny został wyłączony!',
		'dashboard_addtrip_title'=>'Panel VS - Dodawanie trasy',
		'dashboard_adduser_title'=>'Panel VS - Dodaj użytkownika',
		'dashboard_cities_title'=>'Panel VS - Miasta',
		'dashboard_companies_title'=>'Panel VS - Firmy',
		'dashboard_dlcs_title'=>'Panel VS - DLC',
		'dashboard_error_title'=>'Panel VS - Błąd',
		'dashboard_generate_report'=>'Panel VS - Generowanie raportu',
		'dashboard_global_settings_title'=>'Panel VS - Globalne ustawienia',
		'dashboard_listconvoys_title'=>'Panel VS - Lista konwojów',
		'dashboard_listusers_title'=>'Panel VS - Lista użytkowników',
		'dashboard_loads_title'=>'Panel VS - Ładunki',
		'dashboard_mainpage_title'=>'Panel VS - Strona główna',
		'dashboard_recrutation_title'=>'Panel VS - Rekrutacja',
		'dashboard_roles_title'=>'Panel VS - Rangi',
		'dashboard_trips_title'=>'Panel VS - Trasy',
		'dashboard_trucks_title'=>'Panel VS - Ciężarówki',
		'database'=>'Baza danych',
		'date_beg_report'=>'Od daty',
		'date_end_report'=>'Do daty',
		'date_format'=>'Format daty',
		'date'=>'Data',
		'datetime_beg'=>'Data i czas rozpoczęcia',
		'datetime_end'=>'Data i czas zakończenia',
		'db_host'=>'Host bazy danych',
		'db_name'=>'Nazwa bazy danych',
		'db_nickname'=>'Nazwa użytkownika do bazy danych',
		'db_pass'=>'Hasło do bazy danych',
		'default'=>'Podstawowy',
		'delcity_success'=>'Usunięcie miasta zakończyło się sukcesem!',
		'delcompany_success'=>'Usunięcie firmy zakończyło się sukcesem!',
		'delconvoy_success'=>'Usunięcie konwoju zakończyło się sukcesem!',
		'deldlc_success'=>'Usunięcie DLC/moda zakończyło się sukcesem!',
		'delete'=>'Usuń',
		'delload_success'=>'Usunięcie ładunku zakończyło się sukcesem!',
		'delrole_success'=>'Usunięcie rangi zakończyło się sukcesem!',
		'deltruck_success'=>'Usunięcie ciężarówki zakończyło się sukcesem!',
		'deluser_firstpart'=>'Witaj.'.$newline.'
							  Niestety, ale musimy ogłosić, że Twoje konto zostało usunięte!'.$newline.'
							  Oto powód jego usunięcia...'.$newline,
		'deluser_secondpart'=>$newline."Życzymy Tobie wszystkiego dobrego!".$newline."
							  Życzymy miłego dnia i szerokości!".$newline.$start_strong."
							  Nie odpowiadaj na tą wiadomość!".$end_strong,
		'deluser_success'=>'Usunięcie użytkownika zakończyło się sukcesem!',
		'disc_lookup_user'=>'Jeśli chcesz wyrzucić użytkownika, zmienić rangę lub hasło, zamknij te okno.',
		'disclaimer_steam'=>"Uwaga - Ta strona nie jest powiązana ani ze Steamem, ani z Valve",
		'distance'=>'Dystans',
		'dlcs_owned'=>'Posiadane DLC',
		'dlcs'=>'DLC',
		'distance_driven'=>'Przejechany dystans',
		'driven'=>'przejechanych',
		'driven_distance'=>'Przejechany dystans',
		'edit_user'=>'Może edytować użytkowników',
		'edit'=>'Edytuj',
		'email_address'=>'Adres e-mail',
		'email_clarification'=>'Na ten email zostanie wysłany link do ustalenia hasła.',
		'email_pass'=>'Hasło do adresu email',
		'email'=>'Adres e-mail',
		'empty_data'=>'Brak danych',
		'end_convoy'=>'Koniec konwoju',
		'error_db'=>'Błąd bazy danych! Proszę to zgłosić jako błąd na GitHubie lub wysłać maila na adres '.$email_dev,
		'error_import_data'=>'Błąd przy imporcie danych! Proszę to zgłosić jako błąd na GitHubie lub wysłać maila na adres '.$email_dev,
		'error_info'=>'Wygląda na to, że znalazłeś glitcha w matrixie',
		'error_inserting_data'=>'Błąd przy dodawaniu danych! Proszę to zgłosić jako błąd na GitHubie lub wysłać maila na adres '.$email_dev,
		'expired_url'=>'Link stracił ważność',
		'file_not_uploaded'=>'Plik nie został wrzucony',
		'follow'=>'Zobacz na mapie',
		'forgotpass_login'=>'Zapomniałeś hasła?',
		'from_date'=>'od',
		'from'=>'Z',
		'fuel_economy'=>'Ekonomia paliwa',
		'fuel_used_by_u'=>'Zużyto łącznie',
		'fuel_used_trip'=>'Zużyte paliwo',
		'gained_money'=>'Zdobyte pieniądze',
		'game'=>'Gra',
		'generate_report'=>'Wygeneruj raport',
		'generated_with'=>'Wygenerowano przy pomocy',
		'global_settings_desc'=>'Tutaj możesz ustawić niektóre z globalnych ustawień, które są potrzebne do działania skryptu.'.$newline."
								 Jest tego dużo, zatem pamiętaj o kolejności!",
		'global_settings'=>'Globalne ustawienia',
		'go_homepage'=>'Przejdź na stronę główną',
		'green'=>'Zielony',
		'grey'=>'Szary',
		'have_u_ats'=>'Czy posiadasz ATS?',
		'homepage_isuser'=>'Jesteś użytkownikiem?',
		'homepage_recruit'=>'Jesteś zainteresowany naszą VSką?',
		'homepage_recruit_but'=>'Skontaktuj się z nami!',
		'homepage_title'=>'Tachograf - Strona główna',
		'homepage_welcome'=>'Witaj w tachografie!',
		'i_own_ats'=>'Posiadam ATS',
		'image_end'=>'Zdjęcie z zakończenia trasy',
		'information_from_company'=>'Informacja od firmy',
		'install_now'=>'Zainstaluj teraz!',
		'installer_desc1'=>'Dziękuję za wybranie mojego skryptu.'.$newline.'
							Mam nadzieję, że wszystko zadziała od pierwszego uruchomienia.'.$newline.'
							Spędziłem na pracy nad tym dziesiątki godzin, ale wszystko może się zdarzyć.'.$newline."
							Jeśli coś nie działa, proszę się skontaktować za pośrednictwem sociali, które są prezentowane na stronie GitHub.".$newline."
							Bez żadnego zatrzymywania Ciebie - wskoczmy do instalacji!",
		'installer_desc2'=>"To wszystko.".$newline.'
							Proszę pamiętać o tym, że powinieneś przestrzegać licencji (możesz zawsze ją zobaczyć na GitHubie).'.$newline.'
							Dodatkowo wrzucanie zdjęć/generowanie raportów nie naruszają licencji!'.$newline."
							Jeśli wszystko jest już gotowe, kliknij ten przycisk.".$newline."
							Uwaga - Aktualizacja plików może zająć chwilkę, dlatego bądź cierpliwy!",
		'installer_password'=>'Hasło zostanie wysłane na Twój adres mailowy',
		'installer_title'=>'Panel VS - Instalator',
		'is_admin'=>'Czy jest adminem?',
		'is_in_game'=>'Czy jest w grze?',
		'is_on_tmp'=>'Czy jest na TruckersMP?',
		'list_convoys'=>'Lista konwojów',
		'list_users'=>'Lista użytkowników',
		'list'=>'Lista',
		'load'=>'Ładunek',
		'loads'=>'Ładunki',
		'login_title'=>'Tachograf - Logowanie do systemu',
		'login_with_steam'=>'Zaloguj się przy użyciu Steama',
		'logout_popup_content'=>'Wybierz "Wyloguj się" jeśli jesteś gotowy do zakończenia swojej sesji.',
		'logout_popup_title'=>'Gotowy do opuszczenia?',
		'logout'=>'Wyloguj się',
		'lookup'=>'Sprawdź',
		'made_by'=>'Zrobione przez',
		'mail_server_host'=>'Adres serwera SMTP',
		'mail_server'=>'Serwer pocztowy',
		'main_page'=>'Strona główna',
		'main_user_desc'=>'Tutaj możesz wpisać swoje dane logowania, które potem będziesz używać do logowania się na konto.'.$newline."
						   Tutaj nie skonfigurujesz ustawień VSki!",
		'main_user'=>'Główny użytkownik',
		'message_to_user'=>'Wiadomość do użytkownika',
		'method_connection'=>'Metoda połączenia z SMTP',
		'modconvoy'=>'Edycja konwoju',
		'modconvoy_success'=>'Edycja konwoju zakończyła się sukcesem!',
		'moddlcs_success'=>'Lista posiadanych DLC została zmieniona!',
		'modify_dlcs'=>'Zmień listę posiadanych DLC',
		'modrole_success'=>'Ranga została poprawnie zmieniona!',
		'modsetting_success'=>'Zmiana ustawienia zakończyła się sukcesem!',
		'money'=>'Pieniądze',
		'more_details'=>'Szczegóły',
		'name'=>'Nazwa',
		'near_city'=>'W pobliżu',
		'new_pass_success'=>'Nowe hasło zostało ustawione!',
		'new_password_firstpart'=>'Cześć.'.$newline.'
								   Zleciłeś/-aś zmianę hasła.'.$newline.'
								   Poniżej jest link do zmiany hasła.'.$newline.'
								   Proszę się go użyć.'.$newline.'
								   Link jest ważny przez 8 godzin.'.$newline,
		'new_password_secondpart'=>$newline."Miłego dnia i szerokości!".$newline.$start_strong."
								   Nie odpowiadaj na tą wiadomość!".$end_strong,
		'new_password'=>'Nowe hasło',
		'new'=>'Nowy',
		'news'=>'Wiadomości',
		'nickname'=>'Nazwa użytkownika',
		'no_notifications'=>'Nie ma żadnych powiadomień',
		'no'=>'Nie',
		'none_recruits'=>'Nie ma żadnych kandydatów',
		'none'=>'Brak',
		'notifications'=>'Powiadomienia',
		'on_tmp_from'=>'Użytkownik jest na TruckersMP od ',
		'open'=>'Otwarta',
		'own_ats'=>'Jeśli posiadasz ATS, kliknij w ten przycisk',
		'ownats_success'=>'Posiadasz teraz ATS!',
		'participated_convoy'=>'Brałem udział w konwoju...',
		'password_reset_email'=>'Proszę wpisać swój email poniżej.',
		'password_too_short'=>'Hasło jest za krótkie',
		'password'=>'Hasło',
		'per_100'=>'na 100',
		'period_of_time'=>'Przedział czasowy',
		'port_number_smtp'=>"Numer portu SMTP",
		'post_url_image'=>'Wpisz link do obrazka',
		'post_url_voip'=>'Wpisz link do serwera VoIP',
		'profile'=>'Profil',
		'read_more'=>'Czytaj więcej...',
		'ready_to_recruit'=>'Pasujesz do wymagań?'.$newline.'
							 Przeczytałeś regulamin?'.$newline.'
						     W takim razie kliknij przycisk poniżej i wyślij swoją aplikację!',
		'recrutation'=>'Rekrutacja',
		'red'=>'Czerwony',
		'register_title'=>'Panel VS - Rejestracja',
		'reject_recruit_firstpart'=>'Cześć.'.$newline.'
									 Niestety, ale musimy oglosić, że Twoja aplikacja została odrzucona!'.$newline.'
									 Poniżej jest wiadomość od firmy...'.$newline,
		'reject_recruit_secondpart'=>$newline."Życzymy Ci dużo szczęścia!".$newline."
									 Życzymy miłego dnia i szerokości!".$newline.$start_strong."
	   								 Nie odpowiadaj na tą wiadomość!".$end_strong,
		'reject'=>'Odrzuć',
		'rejected_trip'=>'Odrzucenie trasy zakończyło się powodzeniem!',
		'rejected'=>'Odrzucony',
		'remove_user'=>'Usuń użytkownika',
		'remove_convoy'=>'Usuń konwój',
		'report_user'=>"Raport użytkownika",
		'report'=>'Raport',
		'requirements'=>'Wymagania',
		'reset_pass'=>'Zresetuj hasło',
		'reset_pass_success_email'=>'Hasło zostało zresetowane!'.$newline.'
									 Przeszukaj skrzynkę pocztową pod kątem maila.',
		'role_unremovable'=>'Ranga nieusuwalna',
		'role'=>'Ranga',
		'roles'=>'Rangi',
		'route'=>'Trasa',
		'rules_accepted'=>'Regulamin został zaakceptowany przez użytkownika',
		'rules_not_accepted'=>'Regulamin nie został zaakceptowany!',
		'rules'=>'Regulamin',
		'select_game'=>'Wybierz grę',
		'select_option'=>'Wybierz jedną z opcji',
		'select_owned_dlcs'=>'Wybierz posiadane DLC',
		'select_truck_ats'=>"Wybierz ciężarówkę, którą będziesz używać w ATS",
		'select_truck_ets2'=>'Wybierz ciężarówkę, którą będziesz używać w ETS2',
		'select_user'=>'Wybierz użytkownika',
		'select_version'=>'Wybierz wersję, z której aktualizujesz',
		'send_application'=>'Wyślij aplikację',
		'server'=>'Serwer',
		'server_game'=>'Serwer gry',
		'server_voip'=>'Serwer VoIP (TS3, Discord)',
		'set_password1'=>'Ustaw nowe hasło',
		'set_password2'=>'Pamiętaj, że hasło musi mieć co najmniej:'.$newline.$start_strong.'
						- 8 znaków,'.$newline.'
						- jedną wielką literę,'.$newline.'
						- jedną cyfrę,'.$newline.'
						- jeden znak alfanumeryczny.'.$end_strong,
		'settings_lang'=>'Ustawienia',
		'settings'=>'Ustawienia',
		'short_name'=>'Krótka nazwa',
		'sidebar_color'=>'Kolor paska',
		'sign_out'=>'Wyloguj się',
		'signin'=>'Zaloguj się',
		'soon_reply'=>'Wkrótce ktoś z zespołu naszej VSki wyśle Tobie wiadomość na Twojego emaila.'.$newline."
					   Sprawdzaj swoją skrzynkę mailową (może będzie w Spamie?)".$newline.'
					   W międzyczasie możesz zajrzeć na nasze media społecznościowe, które masz poniżej'.$newline.'
					   Póki co - szerokości! :)',
		'start_convoy'=>'Początek konwoju',
		'stats_alltime'=>'Statystyki - Od początku',
		'status'=>'Status',
		'steam_api_desc'=>'Potrzebujemy go, aby dać użytkownikom możliwość rejestracji przy użyciu Steama.'.$newline.'
						   Proszę przejść do '.$start_url_sapi.'tej strony'.$end_url_sapi.' i pobrać swój klucz API.',
		'steam_api_key'=>'Klucz API dla Steama',
		'steam_profile'=>'Profil Steam',
		'success_install'=>'Skrypt został zainstalowany pomyślnie! Proszę przejdź do swojego emaila i ustaw swoje hasło!',
		'success_upgrade'=>'Skrypt został pomyślnie zaktualizowany! Możesz teraz się zalogować.',
		'sum_driven_distance'=>'Suma przejechanego dystansu',
		'sum_driven'=>'Przejechałeś łącznie',
		'sum_trips_top10'=>'Ilość zleceń',
		'sum_trips1'=>'Wykonano łącznie',
		'sum_trips2_multi'=>'zleceń',
		'sum_trips2_one'=>'zlecenie',
		'summary'=>'Podsumowanie - '.$months[date('n',time())-1],
		'tachograph'=>'Tachograf',
		'time_beg_convoy'=>'Czas rozpoczęcia konwoju',
		'time_format'=>'Format czasu',
		'time_groupup'=>'Czas zgrupowania',
		'time_of_trip'=>'Czas podróży',
		'to_date'=>'do',
		'to'=>'Do',
		'tonnage'=>'Tonaż',
		'top10_drivers'=>'Top 10 kierowców',
		'trip_accepted_firstpart'=>'Trasa numer',
		'trip_accepted_secondpart'=>'została zaakceptowana!',
		'trip_no'=>'Trasa numer',
		'trip_rejected_firstpart'=>'Trasa numer',
		'trip_rejected_secondpart'=>'została odrzucona!',
		'trip'=>'Trasa',
		'trips_done'=>'Wykonane trasy',
		'trips'=>'Trasy',
		'truck_ats'=>'Jaką ciężarówkę w ATS będzie używać?',
		'truck_ets2'=>'Jaką ciężarówkę w ETS2 będzie używać?',
		'trucks'=>'Ciężarówki',
		'turned_off'=>'Wyłączony',
		'turned_on'=>'Włączony',
		'turquoise'=>'Turkusowy',
		'u_are_about_del'=>'Masz zamiar usunąć',
		'undefined'=>'Nieokreślony',
		'unit_distance'=>'Jednostka dystansu',
		'unit_fuel'=>'Jednostka paliwa',
		'unit_money'=>'Jednostka pieniędzy',
		'unit_tonnage'=>'Jednostka tonażu',
		'upavatar_success'=>'Awatar został wrzucony!',
		'upgrade_now'=>'Aktualizuj teraz!',
		'upgrader_desc'=>'Dziękuję za używanie mojego skryptu.'.$newline.'
						  Tutaj możesz zaktualizować swój skrypt do nowej wersji.'.$newline.'
						  Jeśli coś nie pójdzie po Twojej myśli, proszę się skontaktować za pośrednictwem sociali, które są prezentowane na stronie GitHub.'.$newline."
						  Bez żadnego zatrzymywania Ciebie - wskoczmy do aktualizacji!",
		'upgrader_title'=>'Panel VS - Aktualizator',
		'upload_image_end'=>'Wrzuć zdjęcie z zakończenia trasy',
		'used_truck_ats'=>'Używana ciężarówka (ATS)',
		'used_truck_ets2'=>'Używana ciężarówka (ETS2)',
		'used_truck'=>'Używana ciężarówka',
		'user'=>'Użytkownik',
		'users'=>'Użytkownicy',
		'valid_tonnage'=>'prawidłowy tonaż',
		'vtc_logo'=>'Logo VSki',
		'vtc_logo_desc'=>'Musisz podać lokalizację, np. <code>./images/truck.png</code>'.$newline.'
						  Logo powinno być kwadratowe.',
		'vtc_name'=>'Nazwa VSki',
		'vtc_settings'=>'Ustawienia VSki',
		'vtc_slogan'=>'Slogan Wirtualnej Spedycji',
		'vtc_tmpid'=>'ID VS w systemie TruckersMP VTC',
		'welcome'=>'Witaj!',
		'welcome_message'=>'Witaj w naszej firmie!'.$newline.'
							Ustawiliśmy parę rzeczy dla Ciebie.'.$newline.'
							Jeśli potrzebujesz je zmienić, kliknij na swoją nazwę użytkownika i z listy wybierz "Ustawienia".'.$newline."
							Jeśli będziesz potrzebować jakiejś pomocy, spytaj się naszych kierowców lub managerów.".$newline.'
							Szerokości!',
		'welcome_to_company'=>'Witaj w firmie!',
		'which_dlcs_u_own'=>'Jakie DLC posiadasz?',
		'why_u'=>'Dlaczego Ty?',
		'why_us'=>'Dlaczego my?',
		'why_we'=>'Dlaczego my?',
		'why_you'=>'Dlaczego Ty?',
		'write_here'=>'Wpisz tutaj',
		'wrong_email'=>'Nieprawidłowy adres e-mail',
		'wrong_nickname' => 'Nieprawidłowa nazwa użytkownika',
		'wrong_pass'=>'Nieprawidłowe hasło',
		'years_old'=>'lat',
		'yellow'=>'Żółty',
		'yes'=>'Tak',
		'you'=>'Ty',
);
//Don't edit the lines below
$array_LP = array_merge($lang_arr,(array)$load);
return $array_LP;