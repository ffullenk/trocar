<?php

/**
 * wantlist actions.
 *
 * @package    trocar
 * @subpackage wantlist
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wantlistActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
  public function executeAdd(sfWebRequest $request)
  {
  	$this->forward404Unless($request->hasParameter('id'));
  	
  	$idProducto    = $request->getParameter('id');
  	$idUsuario     = $this->getUser()->getGuardUser()->getId();
  	
  	$nuevoWantList = new Wantlist();
  	$nuevoWantList->setProductoId($idProducto);
  	$nuevoWantList->setUserId($idUsuario);
  	$nuevoWantList->save();
  }
}
