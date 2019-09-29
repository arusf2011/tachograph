<?php
    $f3 = Base::instance();
    $f3->set('trips_list',$db->exec('SELECT * FROM trips WHERE id_user = ? AND date_beg >= ? AND date_end <= ?',array($user_id,$_SESSION['date_beg_report'],$_SESSION['date_end_report'])));
    $trips = $f3->get('trips_list');
    $f3->set('global_settings',$db->exec('SELECT * FROM settings'));
    $global_settings = $f3->get('global_settings');
    $trips_body = '';
    if(count($trips) > 0)
    {
        foreach($trips as $trip)
        {
            $f3->set('city_start',$db->exec('SELECT name FROM cities WHERE short_name = "'.$trip['city_from'].'"'));
            $city_start = $f3->get('city_start');
            $f3->set('city_end',$db->exec('SELECT name FROM cities WHERE short_name = "'.$trip['city_to'].'"'));
            $city_end = $f3->get('city_end');
            $f3->set('comp_from',$db->exec('SELECT name FROM companies WHERE short_name = "'.$trip['comp_from'].'"'));
            $comp_from = $f3->get('comp_from');
            $f3->set('comp_to',$db->exec('SELECT name FROM companies WHERE short_name = "'.$trip['comp_to'].'"'));
            $comp_to = $f3->get('comp_to');
            
            $trips_body .= '<tr>';
            $trips_body .= '<td>'.$trip['id'].'</td>';
            $trips_body .= '<td>'.$city_start[0]['name'].' - '.$comp_from[0]['name'].'</td>';
            $trips_body .= '<td>'.$city_end[0]['name'].' - '.$comp_to[0]['name'].'</td>';
            $trips_body .= '<td>'.$f3->get($trip['load_type']).' - '.$trip['tonnage'].' '.$global_settings[6]['value'].'</td>';
            $trips_body .= '<td>'.$trip['fuel_used'].' '.$global_settings[5]['value'].'</td>';
            $trips_body .= '<td>'.$trip['distance'].' '.$global_settings[4]['value'].'</td>';
            $trips_body .= '<td>'.$trip['money'].' '.$global_settings[7]['value'].'</td>';
            switch($trip['status'])
            {
                case 2:
                    $trips_body .= '<td>'.$f3->get('rejected').'</td> ';
                    break;
                case 3:
                    $trips_body .= '<td>'.$f3->get('accepted').'</td> ';
                    break;
                default:
                    $trips_body .= '<td>'.$f3->get('new').'</td>';
            }
            $trips_body .= '</tr>';
        }
    }
    else
    {
        $trips_body = 0;
    }
    return $trips_body;