<?php
/*
 * Tachograph v2 by Arkadiusz Fatyga
 * Polish Language Pack (v2.0)
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
$email_dev = 'kontakt@arkadiusz-fatyga.eu';
$start_url_sapi = '<a href="https://steamcommunity.com/dev/apikey" target="_blank">';
$end_url_sapi = '</a>';
// Don't edit above!
$months = array('Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień');
$days = array('Poniedziałek','Wtorek','Środa','Czwartek','Piątek','Sobota','Niedziela');

$lang_arr = array(
		'email'=>'Adres e-mail',
		'password'=>'Hasło',
		'signin'=>'Zaloguj się',
		'forgotpass_login'=>'Zapomniałeś hasła?',
		'wrong_pass'=>'Nieprawidłowe hasło',
		'wrong_nickname' => 'Nieprawidłowa nazwa użytkownika',
		'login_title'=>'Tachograf - Logowanie do systemu',
		'homepage_title'=>'Tachograf - Strona główna',
		'homepage_welcome'=>'Witaj w tachografie!',
		'homepage_isuser'=>'Jesteś użytkownikiem?',
		'homepage_recruit'=>'Jesteś zainteresowany naszą VSką?',
		'homepage_recruit_but'=>'Skontaktuj się z nami!',
		'dashboard_mainpage_title'=>'Panel VS - Strona główna',
		'main_page'=>'Strona główna',
		'profile'=>'Profil',
		'settings'=>'Ustawienia',
		'sign_out'=>'Wyloguj się',
		'summary'=>'Podsumowanie - '.$months[date('n',time())-1],
		'nickname'=>'Nazwa użytkownika',
		'sum_driven'=>'Przejechałeś łącznie',
		'generate_report'=>'Wygeneruj raport',
		'fuel_used_by_u'=>'Zużyto łącznie',
		'sum_trips1'=>'Wykonano łącznie',
		'sum_trips2_multi'=>'zleceń',
		'sum_trips2_one'=>'zlecenie',
		'logout_popup_title'=>'Gotowy do opuszczenia?',
		'logout_popup_content'=>'Wybierz "Wyloguj się" jeśli jesteś gotowy do zakończenia swojej sesji.',
		'cancel'=>'Odrzuć',
		'logout'=>'Wyloguj się',
		'administration'=>'Administracja',
		'users'=>'Użytkownicy',
		'list'=>'Lista',
		'add'=>'Dodaj',
		'delete'=>'Usuń',
		'recrutation'=>'Rekrutacja',
		'trips'=>'Trasy',
		'top10_drivers'=>'Top 10 kierowców',
		'sum_driven_distance'=>'Suma przejechanego dystansu',
		'driven'=>'przejechanych',
		'fuel_economy'=>'Ekonomia paliwa',
		'amount'=>'Ilość',
		'per_100'=>'na 100',
		'sum_trips_top10'=>'Ilość zleceń',
		'dashboard_adduser_title'=>'Panel VS - Dodaj użytkownika',
		'adduser'=>'Dodaj użytkownika',
		'adduser_disclaimer'=>$newline.$start_strong.'Informacja (przekaż ją użytkownikowi!)'.$end_strong.$newline.'
							   Poniższe dane są wymagane do działania poniższych usług'.
							   $start_ulist.
								   $start_li.'podejrzenia lokalizacji użytkownika na serwerze TruckersMP (tylko ETS2)'.$end_li.
								   $start_li.'podejrzenia banów użytkownika na TruckersMP'.$end_li.
							   $end_ulist,
		'email_clarification'=>'Na ten email zostanie wysłany link do ustalenia hasła.',
		'rules_accepted'=>'Regulamin został zaakceptowany przez użytkownika',
		'select_option'=>'Wybierz jedną z opcji',
		'yes'=>'Tak',
		'no'=>'Nie',
		'dlcs_owned'=>'Posiadane DLC',
		'ats_owner'=>'Czy posiada ATS?',
		'truck_ets2'=>'Jaką ciężarówkę w ETS2 będzie używać?',
		'truck_ats'=>'Jaką ciężarówkę w ATS będzie używać?',
		'rules_not_accepted'=>'Regulamin nie został zaakceptowany!',
		'error_db'=>'Błąd bazy danych! Proszę to zgłosić jako błąd na GitHubie lub wysłać maila na adres '.$email_dev,
		'dashboard_listusers_title'=>'Panel VS - Lista użytkowników',
		'list_users'=>'Lista użytkowników',
		'used_truck_ets2'=>'Używana ciężarówka (ETS2)',
		'used_truck_ats'=>'Używana ciężarówka (ATS)',
		'none'=>'Brak',
		'adduser_success'=>'Dodanie użytkownika zakończyło się sukcesem!',
		'deluser_success'=>'Usunięcie użytkownika zakończyło się sukcesem!',
		'roles'=>'Rangi',
		'settings_lang'=>'Ustawienia',
		'cities'=>'Miasta',
		'dlcs'=>'DLC',
		'trucks'=>'Ciężarówki',
		'global_settings'=>'Globalne ustawienia',
		'companies'=>'Firmy',
		'dashboard_dlcs_title'=>'Panel VS - DLC',
		'name'=>'Nazwa',
		'short_name'=>'Krótka nazwa',
		'actions'=>'Czynności',
		'add_dlc'=>'Dodaj DLC/mod',
		'adddlc_success'=>'Dodanie DLC/moda zakończyło się sukcesem!',
		'deldlc_success'=>'Usunięcie DLC/moda zakończyło się sukcesem!',
		'dashboard_cities_title'=>'Panel VS - Miasta',
		'add_city'=>'Dodaj miasto',
		'addcity_success'=>'Dodanie miasta zakończyło się sukcesem!',
		'delcity_success'=>'Usunięcie miasta zakończyło się sukcesem!',
		'game'=>'Gra',
		'dashboard_companies_title'=>'Panel VS - Firmy',
		'add_company'=>'Dodaj firmę',
		'addcompany_success'=>'Dodanie firmy zakończyło się sukcesem!',
		'delcompany_success'=>'Usunięcie firmy zakończyło się sukcesem!',
		'dashboard_trucks_title'=>'Panel VS - Ciężarówki',
		'add_truck'=>'Dodaj ciężarówkę',
		'addtruck_success'=>'Dodanie ciężarówki zakończyło się sukcesem!',
		'deltruck_success'=>'Usunięcie ciężarówki zakończyło się sukcesem!',
		'dashboard_global_settings_title'=>'Panel VS - Globalne ustawienia',
		'change_setting'=>'Zmień ustawienie',
		'modsetting_success'=>'Zmiana ustawienia zakończyła się sukcesem!',
		'vtc_name'=>'Nazwa VSki',
		'vtc_logo'=>'Logo VSki',
		'unit_distance'=>'Jednostka dystansu',
		'unit_fuel'=>'Jednostka paliwa',
		'open'=>'Otwarta',
		'closed'=>'Zamknięta',
		'is_admin'=>'Czy jest adminem?',
		'dashboard_roles_title'=>'Panel VS - Rangi',
		'role_unremovable'=>'Ranga nieusuwalna',
		'add_role'=>'Dodaj rangę',
		'default'=>'Podstawowy',
		'blue'=>'Niebieski',
		'grey'=>'Szary',
		'red'=>'Czerwony',
		'green'=>'Zielony',
		'turquoise'=>'Turkusowy',
		'yellow'=>'Żółty',
		'addrole_success'=>'Dodanie rangi zakończyło się sukcesem!',
		'delrole_success'=>'Usunięcie rangi zakończyło się sukcesem!',
		'dashboard_error_title'=>'Panel VS - Błąd',
		'error_info'=>'Wygląda na to, że znalazłeś glitcha w matrixie',
		'back_dashboard'=>'Powrót do strony głównej',
		'dashboard_recrutation_title'=>'Panel VS - Rekrutacja',
		'none_recruits'=>'Nie ma żadnych kandydatów',
		'check_application'=>'Sprawdź aplikację',
		'steam_profile'=>'Profil Steam',
		'years_old'=>'lat',
		'is_on_tmp'=>'Czy jest na TruckersMP?',
		'age'=>'Wiek',
		'why_you'=>'Dlaczego Ty?',
		'why_us'=>'Dlaczego my?',
		'blocked_checkban'=>'Użytkownik zablokował możliwość sprawdzenia banów',
		'on_tmp_from'=>'Użytkownik jest na TruckersMP od ',
		'date_format'=>'Format daty',
		'accept'=>'Zaakceptuj',
		'reject'=>'Odrzuć',
		'message_to_user'=>'Wiadomość do użytkownika',
		'amount_of_bans'=>'Ilość banów',
		'time_format'=>'Format czasu',
		'time_of_trip'=>'Czas podróży',
		'from'=>'Z',
		'to'=>'Do',
		'load'=>'Ładunek',
		'made_by'=>'Zrobione przez',
		'unit_tonnage'=>'Jednostka tonażu',
		'lookup'=>'Sprawdź',
		'trip_no'=>'Trasa numer',
		'datetime_beg'=>'Data i czas rozpoczęcia',
		'datetime_end'=>'Data i czas zakończenia',
		'tonnage'=>'Tonaż',
		'valid_tonnage'=>'prawidłowy tonaż',
		'driven_distance'=>'Przejechany dystans',
		'fuel_used_trip'=>'Zużyte paliwo',
		'average_use_of_fuel'=>'Średnie zużycie paliwa',
		'image_end'=>'Zdjęcie z zakończenia trasy',
		'dashboard_trips_title'=>'Panel VS - Trasy',
		'you'=>'Ty',
		'add_trip'=>'Dodaj trasę',
		'trip'=>'Trasa',
		'select_game'=>'Wybierz grę',
		'report_user'=>"Raport użytkownika",
		'used_truck'=>'Używana ciężarówka',
		'distance'=>'Dystans',
		'upload_image_end'=>'Wrzuć zdjęcie z zakończenia trasy',
		'choose_image'=>'Wybierz obrazek',
		'damage'=>'Uszkodzenia',
		'money'=>'Pieniądze',
		'file_not_uploaded'=>'Plik nie został wrzucony',
		'addtrip_success'=>'Dodanie trasy zakończyło się sukcesem!',
		'status'=>'Status',
		'new'=>'Nowy',
		'rejected'=>'Odrzucony',
		'accepted'=>'Zaakceptowany',
		'gained_money'=>'Zdobyte pieniądze',
		'tachograph'=>'Tachograf',
		'user'=>'Użytkownik',
		'rules'=>'Regulamin',
		'requirements'=>'Wymagania',
		'ready_to_recruit'=>'Pasujesz do wymagań?'.$newline.'
							 Przeczytałeś regulamin?'.$newline.'
						     W takim razie kliknij przycisk poniżej i wyślij swoją aplikację!',
		'disclaimer_steam'=>"Uwaga - Ta strona nie jest powiązana ani ze Steamem, ani z Valve",
		'areu_on_tmp'=>'Czy jesteś na TruckersMP?',
		'have_u_ats'=>'Czy posiadasz ATS?',
		'which_dlcs_u_own'=>'Jakie DLC posiadasz?',
		'why_u'=>'Dlaczego Ty?',
		'why_we'=>'Dlaczego my?',
		'send_application'=>'Wyślij aplikację',
		'login_with_steam'=>'Zaloguj się przy użyciu Steama',
		'application_added'=>'Aplikacja została wysłana!',
		'soon_reply'=>'Wkrótce ktoś z zespołu naszej VSki wyśle Tobie wiadomość na Twojego emaila.'.$newline."
					   Sprawdzaj swoją skrzynkę mailową (może będzie w Spamie?)".$newline.'
					   W międzyczasie możesz zajrzeć na nasze media społecznościowe, które masz poniżej'.$newline.'
					   Póki co - szerokości! :)',
		'register_title'=>'Panel VS - Rejestracja',
		'password_reset_email'=>'Proszę wpisać swój email poniżej.',
		'reset_pass'=>'Zresetuj hasło',
		'new_password'=>'Nowe hasło',
		'new_password_firstpart'=>'Cześć.'.$newline.'
								   Zleciłeś/-aś zmianę hasła.'.$newline.'
								   Poniżej jest link do zmiany hasła.'.$newline.'
								   Proszę się go użyć.'.$newline.'
								   Link jest ważny przez 8 godzin.'.$newline,
		'new_password_secondpart'=>$newline."Miłego dnia i szerokości!".$newline.$start_strong."
									Nie odpowiadaj na tą wiadomość!".$end_strong,
		'reset_pass_success_email'=>'Hasło zostało zresetowane!'.$newline.'
									 Przeszukaj skrzynkę pocztową pod kątem maila.',
		'wrong_email'=>'Nieprawidłowy adres e-mail',
		'email_address'=>'Adres email',
		'email_pass'=>'Hasło do adresu email',
		'mail_server'=>'Serwer pocztowy',
		'method_connection'=>'Metoda połączenia z SMTP',
		'port_number_smtp'=>"Numer portu SMTP",
		'unit_money'=>'Jednostka pieniędzy',
		'vtc_slogan'=>'Slogan Wirtualnej Spedycji',
		'vtc_tmpid'=>'ID VS w systemie TruckersMP VTC',
		'accepted_trip'=>'Akceptacja trasy zakończyło się powodzeniem!',
		'rejected_trip'=>'Odrzucenie trasy zakończyło się powodzeniemThe trip has been successfully rejected!',
		'steam_api_key'=>'Klucz API dla Steama',
		'welcome_message'=>'Witaj w naszej firmie!'.$newline.'
							Ustawiliśmy parę rzeczy dla Ciebie.'.$newline.'
							Jeśli potrzebujesz je zmienić, kliknij na swoją nazwę użytkownika i z listy wybierz "Ustawienia".'.$newline."
							Jeśli będziesz potrzebować jakiejś pomocy, spytaj się naszych kierowców lub managerów.".$newline.'
							Szerokości!',
		'welcome_to_company'=>'Witaj w firmie!',
		'accept_recruit_firstpart'=>'Cześć.'.$newline.'
									 Mamy przyjemność ogłosić, że Twoja aplikacja została przyjęta!'.$newline.'
									 Poniżej są Twoje dane do logowania.'.$newline.'
									 Proszę się zalogować z ich użyciem do naszego systemu.'.$newline.'
									 Po zalogowaniu, proszę zmienić hasło tak szybko jak tylko to możliwe.'.$newline.'
									 Teraz czas na wiadomość od firmy...'.$newline,
		'accept_recruit_secondpart'=>$newline."Życzymy miłego dnia i szerokości!".$newline.$start_strong."
									 Nie odpowiadaj na tą wiadomość!".$end_strong,
		'reject_recruit_firstpart'=>'Cześć.'.$newline.'
									 Niestety, ale musimy oglosić, że Twoja aplikacja została odrzucona!'.$newline.'
									 Poniżej jest wiadomość od firmy...'.$newline,
		'reject_recruit_secondpart'=>$newline."Życzymy Ci dużo szczęścia!".$newline."
									 Życzymy miłego dnia i szerokości!".$newline.$start_strong."
									 Nie odpowiadaj na tą wiadomość!".$end_strong,
		'information_from_company'=>'Informacja od firmy',
		'is_in_game'=>'Czy jest w grze?',
		'follow'=>'Zobacz na mapie',
		'server'=>'Serwer',
		'near_city'=>'W pobliżu',
		'role'=>'Ranga',
		'stats_alltime'=>'Statystyki - Od początku',
		'trips_done'=>'Wykonane trasy',
		'distance_driven'=>'Przejechany dystans',
		'color_of_role'=>'Kolor rangi',
		'edit_user'=>'Może edytować użytkowników',
		'no_notifications'=>'Nie ma żadnych powiadomień',
		'notifications'=>'Powiadomienia',
		'trip_accepted_firstpart'=>'Trasa numer',
		'trip_accepted_secondpart'=>'została zaakceptowana!',
		'welcome'=>'Witaj!',
		'trip_rejected_firstpart'=>'Trasa numer',
		'trip_rejected_secondpart'=>'została odrzucona!',
		'modrole_success'=>'Ranga została poprawnie zmieniona!',
		'select_truck_ets2'=>'Wybierz ciężarówkę, którą będziesz używać w ETS2',
		'select_truck_ats'=>"Wybierz ciężarówkę, którą będziesz używać w ATS",
		'own_ats'=>'Jeśli posiadasz ATS, kliknij w ten przycisk',
		'i_own_ats'=>'Posiadam ATS',
		'changed_truck'=>'Ciężarówka została zmieniona!',
		'ownats_success'=>'Posiadasz teraz ATS!',
		'select_owned_dlcs'=>'Wybierz posiadane DLC',
		'modify_dlcs'=>'Zmień listę posiadanych DLC',
		'moddlcs_success'=>'Lista posiadanych DLC została zmieniona has been modified!',
		'report'=>'Raport',
		'period_of_time'=>'Przedział czasowy',
		'empty_data'=>'Brak danych',
		'select_user'=>'Wybierz użytkownika',
		'date_beg_report'=>'Od daty',
		'date_end_report'=>'Do daty',
		'from_date'=>'od',
		'to_date'=>'do',
		'generated_with'=>'Wygenerowano przy pomocy',
		'installer_title'=>'Panel VS - Instalator',
		'installer_desc1'=>'Dziękuję za wybranie mojego skryptu.'.$newline.'
							Mam nadzieję, że wszystko zadziała od pierwszego uruchomienia.'.$newline.'
							Spędziłem na pracy nad tym dziesiątki godzin, ale wszystko może się zdarzyć.'.$newline."
							Jeśli coś nie działa, proszę się skontaktować za pośrednictwem sociali, które są prezentowane na stronie GitHub.".$newline."
							Bez żadnego zatrzymywania Ciebie - wskoczmy do instalacji!",
		'main_user'=>'Główny użytkownik',
		'main_user_desc'=>'Tutaj możesz wpisać swoje dane logowania, które potem będziesz używać do logowania się na konto.'.$newline."
						   Tutaj nie skonfigurujesz ustawień VSki!",
		'installer_password'=>'Hasło zostanie wysłane na Twój adres mailowy',
		'global_settings_desc'=>'Tutaj możesz ustawić niektóre z globalnych ustawień, które są potrzebne do działania skryptu.'.$newline."
								 Jest tego dużo, zatem pamiętaj o kolejności!",
		'database'=>'Baza danych',
		'db_name'=>'Nazwa bazy danych',
		'db_nickname'=>'Nazwa użytkownika do bazy danych',
		'db_pass'=>'Hasło do bazy danych',
		'db_host'=>'Host bazy danych',
		'mail_server_host'=>'Adres serwera SMTP',
		'vtc_settings'=>'Ustawienia VSki',
		'vtc_logo_desc'=>'Musisz podać lokalizację, np. <code>./images/truck.png</code>'.$newline.'
						  Logo powinno być kwadratowe.',
		'write_here'=>'Wpisz tutaj',
		'steam_api_desc'=>'Potrzebujemy go, aby dać użytkownikom możliwość rejestracji przy użyciu Steama.'.$newline.'
						   Proszę przejść do '.$start_url_sapi.'tej strony'.$end_url_sapi.' i pobrać swój klucz API.',
		'installer_desc2'=>"To wszystko.".$newline.'
							Proszę pamiętać o tym, że powinieneś przestrzegać licencji (możesz zawsze ją zobaczyć na GitHubie).'.$newline.'
							Dodatkowo wrzucanie zdjęć/generowanie raportów nie naruszają licencji!'.$newline."
							Jeśli wszystko jest już gotowe, kliknij ten przycisk.".$newline."
							Uwaga - Aktualizacja plików może zająć chwilkę, dlatego bądź cierpliwy!",
		'install_now'=>'Zainstaluj teraz!',
		'dashboard_addtrip_title'=>'Panel VS - Dodawanie trasy',
		'loads'=>'Ładunki',
		'dashboard_loads_title'=>'Panel VS - Ładunki',
		'add_load'=>'Dodaj ładunek',
		'addload_success'=>'Dodanie ładunku zakończyło się sukcesem! Pamiętaj o dodaniu pełnej nazwy w <code>load_pl.php</code> !',
		'delload_success'=>'Usunięcie ładunku zakończyło się sukcesem!',
		'error_import_data'=>'Błąd przy imporcie danych! Proszę to zgłosić jako błąd na GitHubie lub wysłać maila na adres '.$email_dev,
		'error_inserting_data'=>'Błąd przy dodawaniu danych! Proszę to zgłosić jako błąd na GitHubie lub wysłać maila na adres '.$email_dev,
		'change_role'=>'Zmień rangę',
		'disc_lookup_user'=>'Jeśli chcesz wyrzucić użytkownika, zmienić rangę lub hasło, zamknij te okno.',
		'avatar_upload'=>'Wstaw awatar',
		'upavatar_success'=>'Awatar został wrzucony!',
);
//Don't edit the lines below
$array_LP = array_merge($lang_arr,(array)$load);
return $array_LP;