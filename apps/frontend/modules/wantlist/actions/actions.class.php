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

  
  public function executeAdd(sfWebRequest $request)
  {
  	$this->forward404Unless($request->hasParameter('id'));
  	
  	$idProduct    = $request->getParameter('id');
  	$idUsuario     = $this->getUser()->getGuardUser()->getId();
  	
  	$nuevoWantList = new Wantlist();
  	$nuevoWantList->setProductId($idProduct);
  	$nuevoWantList->setUserId($idUsuario);
  	$nuevoWantList->save();
  }
  
  
  public function executeRemove(sfWebRequest $request)
  {
  	$this->forward404Unless($request->hasParameter('id'));
  	 
  	$idProduct    = $request->getParameter('id');
  	$idUsuario     = $this->getUser()->getGuardUser()->getId();

  	$tablaWantlist = WantlistTable::getInstance();
  	
  	if($tablaWantlist->usuarioHasWantedProduct($idUsuario,$idProduct))
  	{
  		 	$q = $tablaWantlist
		  	->createQuery('c')
		  	->delete()
		  	->where('c.user_id = ?',  $idUsuario)
		  	->andWhere('c.product_id = ?',  $idProduct );
		  	
		  	$resultado = $q->execute();
  	}
  }
  
  public function executeIndex(sfWebRequest $request)
  {
  	
  
  	$this->wantlist	= $this->getUser()->getGuardUser()->getWantlist();

  	 
  }
}
