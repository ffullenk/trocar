<?php

/**
 * home actions.
 *
 * @package    trocar
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
    $this->mensaje = "Este es el mensaje de bienvenida";
    
	if($this->getUser()->isAuthenticated())
	{
		$this->usuario = $this->getUser();
		//$this->username = $this->getUser()->getAttribute('username');
		
		 $this->username = $this->getUser()->getAttribute('username', 'Anonymous');
	  //$this->id = $this->getUser()->getId();
	 
	   $this->username =  $this->getUser()->getUsername();
	   
	   $this->profile =  $this->getUser()->getProfile();
		
      $this->mensaje = "usuario logueado";
	  }
	  else
	  {
	  $this->mensaje = "usuario sin loguear";
	  }
	 
	  
	
  }
}
