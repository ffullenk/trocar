<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new TrocarTestFunctional(new sfBrowser());
$browser->loadData();

$browser->signin('admin@trocar.cl','admin')->
  get('/products')->
  click('Lo tengo')->
  info(' 1 - AL clickear boton de have list del producto, se envia la id de la nueva have list')->
  with('request')->begin()->
    isParameter('module', 'have_list')->
    isParameter('action', 'add')->
    isParameter('id','1')->
  end()->followRedirect()->
  info(' 1.1 - El modulo have list reenvia al object/new con la id del nuevo have_list')->
  with('request')->begin()->
    isParameter('module', 'object')->
    isParameter('action', 'new')->
    isParameter('hid',$id = Doctrine_Core::getTable('HaveList')->
    					createQuery('u')
    					->select('u.id')
    					->limit(1)
    					->fetchOne()->getId())->
    end()->
    info(' 2 - Guardar objeto con informacion de la haveList recien ingresada ')->
    click('Save', array('object' => array(
    			'detail' => 'Nuevo Objeto de Prueba',
    			'status' => 'Nuevo')))->
    with('request')->begin()->
    isParameter('module', 'object')->
    isParameter('action', 'create')->
    isParameter('hid', $id)->
    end()->
    with('response')->begin()->
    isStatusCode(200)->
    info('2.1 - El objeto es guardado correctamente' )->
    end();
    $browser->
    test()->is('Nuevo Objeto de Prueba',Doctrine_Core::getTable('Object')->
    								createQuery('o')
    								->select('o.detail')
    								->limit(1)
    								->orderBy('id DESC')
    								->fetchOne()
    								->getDetail(),'El objeto se guardo correctamente');
    $browser->
    info('2.2 - La have_list es actualizada con la id del objeto correctamente')->
    test()->is(Doctrine_Core::getTable('HaveList')->
    					createQuery('u')
    					->select('u.object_id')
    					->limit(1)
    					->fetchOne()->getObjectId(),
    			Doctrine_Core::getTable('Object')->
    								createQuery('o')
    								->select('o.id')
    								->limit(1)
    								->orderBy('id DESC')
    								->fetchOne()
    								->getId(), ' El have_list fue actualizado correctamente');