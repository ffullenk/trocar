<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());
$browser->loadData();
$browser->get('/')->click('Signin', array( 'signin' => array(
	                 'username' => 'admin@trocar.cl', 
					 'password' => 'admin'
				 )))
	  ->info(' 1 - Lista todo los productos')
  ->get('/')->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '/Dell Vostro/')->
  end()
;
 
