<?php 
include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new UserTestFunctional(new sfBrowser());

$user = $browser->getValidUser();

$browser->info('1 - Login de usuario valido');
$browser->get('/')->click('Signin', array( 'signin' => array(
	                 'username' => $user->getUsername(), 
					 'password' => 'admin'
				 )))
	      ->get('/')
          ->with('user')->begin()
		  ->isAuthenticated()
		  ->end()
		  ;
$browser->info('2 - Login de usuario valido, remember');
$browser->get('/')->click('Salir')
	     ->get('/')
	     ->click('Signin', array( 'signin' => array(
	                 'username' => $user->getUsername(), 
					 'password' => 'admin',
					 'remember' => true
				 )))
	      ->get('/')
          ->with('request')->begin()
		  ->hasCookie('sfRemember')
		  ->end()
		  ;