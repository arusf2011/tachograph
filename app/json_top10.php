<?php
$f3 = Base::instance();

$f3->set('result_counttop10',$db->exec("SELECT count(*) as amount_trips, nickname FROM trips JOIN users on users.id = trips.id_user WHERE status = 3 AND month(date_beg) = month(now()) GROUP BY nickname ORDER BY amount_trips DESC LIMIT 10"));
$result_counttop10 = $f3->get('result_counttop10');
$arr_nicknames_count = array();
$arr_trips_count = array();

for($i = 0; $i < sizeof($result_counttop10); $i++) {
    $arr_nicknames_count[$i] = $result_counttop10[$i]['nickname'];
    $arr_trips_count[$i] = $result_counttop10[$i]['amount_trips'];
}

$f3->set('result_fueltop10',$db->exec("SELECT ((sum(fuel_used)/sum(distance))*100) as fuel_economy, nickname FROM trips JOIN users on users.id = trips.id_user WHERE status = 3 AND month(date_beg) = month(now()) GROUP BY nickname ORDER BY fuel_economy DESC LIMIT 10"));
$result_fueltop10 = $f3->get('result_fueltop10');
$arr_nicknames_fuel = array();
$arr_fuel = array();

for($i = 0; $i < sizeof($result_fueltop10); $i++) {
    $arr_nicknames_fuel[$i] = $result_fueltop10[$i]['nickname'];
    $arr_fuel[$i] = round($result_fueltop10[$i]['fuel_economy'],1);
}

$f3->set('result_distancetop10',$db->exec("SELECT sum(distance) as driven_distance, nickname FROM trips JOIN users on users.id = trips.id_user WHERE status = 3 AND month(date_beg) = month(now()) GROUP BY nickname ORDER BY driven_distance DESC LIMIT 10"));
$result_distancetop10 = $f3->get('result_distancetop10');
$arr_nicknames_distance = array();
$arr_distance = array();

for($i = 0; $i < sizeof($result_distancetop10); $i++) {
    $arr_nicknames_distance[$i] = $result_distancetop10[$i]['nickname'];
    $arr_distance[$i] = $result_distancetop10[$i]['driven_distance'];
}