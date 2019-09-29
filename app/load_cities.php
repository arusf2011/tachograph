<?php
 	$f3=Base::instance();
  	session_start();
	$game = $_SESSION['game_id'];
	
	if($game == 0)
	{
		$f3->set('cities',$db->exec('SELECT short_name, name FROM cities WHERE game = 0'));
		$cities = $f3->get('cities');
		
		echo '<option>'.$f3->get('select_option').'</option>';
		
		foreach($cities as $city)
		{
			echo '<option value="'.$city['short_name'].'">'.$city['name'].'</option>';
		}
	}
	else if($game == 1)
	{
		$f3->set('cities',$db->exec('SELECT short_name, name FROM cities WHERE game = 1'));
		$cities = $f3->get('cities');
		
		echo '<option>'.$f3->get('select_option').'</option>';
		
		foreach($cities as $city)
		{
			echo '<option value="'.$city['short_name'].'">'.$city['name'].'</option>';
		}
	}
	
	