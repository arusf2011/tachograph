<?php
    $f3 = Base::instance();
    session_start();
    $f3->set('global_settings',$db->exec('SELECT * FROM settings'));
    $global_settings = $f3->get('global_settings');
    require_once './vendor/autoload.php';

    if(!isset($_SESSION['user_id']))
    {
        $nickname = $_SESSION['nickname'];
        $f3->set('user_id',$db->exec('SELECT id FROM users WHERE nickname = ?',$nickname));
        $user_id = $f3->get('user_id');
        $user_id = $user_id[0]['id'];
    }
    else
    {
        $user_id = $_SESSION['user_id'];
        $f3->set('nickname_user',$db->exec('SELECT nickname FROM users WHERE id = ?',$user_id));
        $nickname = $f3->get('nickname_user');
        $nickname = $nickname[0]['nickname'];
    }
    require_once './app/get_trips_user.php';
    $mpdf = new \Mpdf\Mpdf([
                            'orientation' => 'L',
                            'tempDir' => './tmp/',
                            'default_font' => 'Open Sans']);
    $mpdf->setTitle($f3->get('report').' - '.$nickname);
    $header = '<head>
                <meta charset="utf-8">
                <style>
                    table, td
                    {
                        border: 1px solid black;
                    }
                </style>
               </head>
               <header style="background-color: #4e73df; color:white;">
                <h1 style="padding: 20px 50px; margin: 0; font-size: 6rem; font-weight: 300; line-height: 0.8;"><img src="'.$global_settings[1]['value'].'" style="width: 64px;"> '.$global_settings[0]['value'].'</h1>
                <h3 style="padding: 0 50px;">'.$f3->get('report').' - '.$nickname.'</h3>
               </header>';
    if($trips_body === 0)
    {
        $trips_header = '<p><b>'.$f3->get('empty_data').'</b></p>';
        $trips_body = NULL;
    }
    else
    {
        $trips_header = '<table style="border-collapse: collapse; width: 100%;"><thead><tr>';
        $trips_header .= '<td><b>ID</b></td>';
        $trips_header .= '<td><b>'.$f3->get('from').'</b></td>';
        $trips_header .= '<td><b>'.$f3->get('to').'</b></td>';
        $trips_header .= '<td><b>'.$f3->get('load').'</b></td>';
        $trips_header .= '<td><b>'.$f3->get('fuel_used_trip').'</b></td>';
        $trips_header .= '<td><b>'.$f3->get('driven_distance').'</b></td>';
        $trips_header .= '<td><b>'.$f3->get('gained_money').'</b></td>';
        $trips_header .= '<td><b>'.$f3->get('status').'</b></td>';
        $trips_header .= '</tr></thead><tbody>';
    }
    $body = '<p><b>'.$f3->get('period_of_time').' -</b> '.$f3->get('from_date').' '.date($global_settings[8]['value'],strtotime($_SESSION['date_beg_report'])).' '.$f3->get('to_date').' '.date($global_settings[8]['value'],strtotime($_SESSION['date_end_report'])).'
             <div>'.$trips_header.$trips_body.'</tbody></table></div>';
    $footer = '<footer style="background-color: #343a40; color:white; margin-top: 2rem; text-align: center">
                <p>
                 '.$f3->get('generated_with').' mPDF<br>
                 <span id="copyright">&copy; Copyright '.date('Y').'</span>
                </p>
               </footer>';
    $html = '<html>'.$header.$body.$footer.'</html>';
    $mpdf->WriteHTML($html);
    $mpdf->Output();
?>