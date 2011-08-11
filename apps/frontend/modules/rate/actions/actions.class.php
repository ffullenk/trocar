<?php

/**
 * rate actions.
 *
 * @package    trocar
 * @subpackage rate
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class rateActions extends sfActions
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
  
  /**
   * metodo que actualiza el valor del campo reputation en la clase sfGuardUserProfile
   * @param sfWebRequest $request
   */
  public function executeActualizaReputacionUsuario(sfWebRequest $request)
  {
  	$this->forward404Unless($request->hasParameter('iduser'));
  	$this->forward404Unless($request->hasParameter('idintercambio'));
  	
  	$idUser    = $request->getParameter('userid');
  	$user 	   = sfGuardUserTable::getInstance()->find(array($idUser));
  	
  	$cantIntercambios = 1000;  //cambiar cuando se agregue modulo/clase de intercambios
  	
  	$sumSatisfaction = $user->get
  	
  	
  	
  	
  }
  
 
  
  
  
  
}
