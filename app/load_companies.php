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
		$f3->set('companies',$db->exec('SELECT short_name, name FROM companies WHERE game = 0'));
		$companies = $f3->get('companies');
		
		echo '<option>'.$f3->get('select_option').'</option>';
		
		foreach($companies as $company)
		{
			echo '<option value="'.$company['short_name'].'">'.$company['name'].'</option>';
		}
	}
	else if($game == 1)
	{
		$f3->set('companies',$db->exec('SELECT short_name, name FROM companies WHERE game = 1'));
		$companies = $f3->get('companies');
		
		echo '<option>'.$f3->get('select_option').'</option>';
		
		foreach($companies as $company)
		{
			echo '<option value="'.$company['short_name'].'">'.$company['name'].'</option>';
		}
	}
	
	