<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new TrocarTestFunctional(new sfBrowser());
$browser->loadData();
$browser->get('/')->click('Login', array( 'signin' => array(
	                 'username' => 'admin@trocar.cl', 
					 'password' => 'admin'
				 )))
	  ->info(' 1 - Lista todo los productos')
  ->get('/products')->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '/Dell Vostro/')->
  end()
;
 
