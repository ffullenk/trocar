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
	public function executeProfile(sfWebRequest $request)
	{
	
		$this->forward404Unless($user = sfGuardUserTable::getInstance()->find(array($request->getParameter('uid'))), $request->getParameter('uid'));
		$reputation = $user->getReputation();
		
		$this->numIntercambios = count($reputation->getNumTrades());
		$this->reputation = $reputation->getReputation();
		$this->fechaRegistro = $user->getDateTimeObject('created_at')->format('U');
		$this->nombreUsuario = $user->getProfile()->getFirstName()." ".$user->getProfile()->getLastName();
		
		$this->trades = $user->getTrades();
		
		$this->rated = $user->getRated();
		
	}
	
	public function executePending(sfWebRequest $request){
		
		$user = $this->getUser();
		$tradesAccepted = TradeTable::getAcceptedTrades($user);
		$tradesPorRatear = array();
		
 		$i = 0;
 		foreach($trades as $t){
			
 			$rates = $t->getRates();
 			$flag = 0;
			
 			foreach ($rates as $r)if($r->getUserRaterId() == $user->getId())$flag=1;
			if($flag == 0)$tradesPorRatear[$i] = $t;
			$i = $i +1;
 		}
		
		$this->trades = RateTable::getAcceptedUnRatedTrades($user);
		
		//$this->trades = RateTable::getAcceptedUnRatedTrades($user);
		
		$this->trade1 = $this->trades[0]->getId();
		
		
	}
	
	public function executeRateTrade(sfWebRequest $request)
  {
  		$this->forward404Unless($trade = TradeTable::getInstance()->find(array($request->getParameter('tid'))), $request->getParameter('tid'));
		
    	$user = $this->getUser();
    	
    	$this->trade = $trade;
    	   
  }
  public function executeShowrates(sfWebRequest $request)
  {
  	
  	$user = $this->getUser()->getGuardUser();
  	$this->rates = $user->getRates();
  
  }
	
	
	
	
	public function executeIndex(sfWebRequest $request)
  {
    $this->rates = Doctrine_Core::getTable('Rate')
      ->createQuery('a')
      ->execute();
    
    
    
    
    
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->rate = Doctrine_Core::getTable('Rate')->find(array($request->getParameter('intercambio_id'),
                                                         $request->getParameter('user_rated_id'),
                                                         $request->getParameter('user_rater_id')));
    $this->forward404Unless($this->rate);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RateForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RateForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($rate = Doctrine_Core::getTable('Rate')->find(array($request->getParameter('intercambio_id'),
                                   $request->getParameter('user_rated_id'),
                                   $request->getParameter('user_rater_id'))), sprintf('Object rate does not exist (%s).', $request->getParameter('intercambio_id'),
                                   $request->getParameter('user_rated_id'),
                                   $request->getParameter('user_rater_id')));
    $this->form = new RateForm($rate);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($rate = Doctrine_Core::getTable('Rate')->find(array($request->getParameter('intercambio_id'),
                                   $request->getParameter('user_rated_id'),
                                   $request->getParameter('user_rater_id'))), sprintf('Object rate does not exist (%s).', $request->getParameter('intercambio_id'),
                                   $request->getParameter('user_rated_id'),
                                   $request->getParameter('user_rater_id')));
    $this->form = new RateForm($rate);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($rate = Doctrine_Core::getTable('Rate')->find(array($request->getParameter('intercambio_id'),
                                   $request->getParameter('user_rated_id'),
                                   $request->getParameter('user_rater_id'))), sprintf('Object rate does not exist (%s).', $request->getParameter('intercambio_id'),
                                   $request->getParameter('user_rated_id'),
                                   $request->getParameter('user_rater_id')));
    $rate->delete();

    $this->redirect('rate/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $rate = $form->save();

      $this->redirect('rate/edit?intercambio_id='.$rate->getIntercambioId().'&user_rated_id='.$rate->getUserRatedId().'&user_rater_id='.$rate->getUserRaterId());
    }
  }
}
