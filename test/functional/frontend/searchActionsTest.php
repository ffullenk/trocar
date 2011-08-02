<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser->
  get('/search/index')->

  with('request')->begin()->
    isParameter('module', 'search')->
    isParameter('action', 'index')->
  end()->

  with('response')->begin()->
   //llamada directa debe ser 404 puesto que solo admite llamadas por POST
	 isStatusCode(404)->
  end()
;
