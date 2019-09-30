<?php
 	$f3=Base::instance();
  	session_start();
	$game = intval($_SESSION['game_id']);
	if(!isset($_SESSION['nickname']))
    {
      header('Location: ./login');
      exit();
    }
	if($game == 0)
	{
		$f3->set('loads',$db->exec('SELECT id, short_name FROM load_tonnage WHERE game = 0'));
		$loads = $f3->get('loads');
		
		for($i = 0; $i < count($loads); $i++)
		{
			$loads[$i]['lang_title'] = $f3->get($loads[$i]['short_name']);
		}
		function sort_by_lang($a,$b)
		{
			return strcmp($a['lang_title'],$b['lang_title']);
		}

		usort($loads,'sort_by_lang');

		echo '<option>'.$f3->get('select_option').'</option>';
		
		foreach($loads as $load)
		{
			echo '<option value="'.$load['short_name'].'">'.$load['lang_title'].'</option>';
		}
	}
	else if($game == 1)
	{
		$f3->set('loads',$db->exec('SELECT short_name FROM load_tonnage WHERE game = 1'));
		$loads = $f3->get('loads');
		
		echo '<option>'.$f3->get('select_option').'</option>';

		for($i = 0; $i < count($loads); $i++)
		{
			$loads[$i]['lang_title'] = $f3->get($loads[$i]['short_name']);
		}
		
		function sort_by_lang($a,$b)
		{
			return strcmp($a['lang_title'],$b['lang_title']);
		}

		usort($loads,'sort_by_lang');
		
		foreach($loads as $load)
		{
			echo '<option value="'.$load['short_name'].'">'.$f3->get($load['short_name']).'</option>';
		}
	}
	
	