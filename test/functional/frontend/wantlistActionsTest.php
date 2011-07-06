<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser->
  get('/wantlist/index')->

  with('request')->begin()->
    isParameter('module', 'wantlist')->
    isParameter('action', 'index')->
  end()->

  with('response')->begin()->
    //el codigo 401 es unauthorized, es decir si un usuario no logeado ingresa a 
    //la direccion /wantlist entonces se muestra el formulario de login (code 401)
    isStatusCode(401)->
    checkElement('body', '!/This is a temporary page/')->
  end()
;
