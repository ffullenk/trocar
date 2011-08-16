<?php

/**
 * trade actions.
 *
 * @package    trocar
 * @subpackage trade
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tradeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->trades = Doctrine_Core::getTable('Trade')
      ->getWaitingTrades($this->getUser()->getGuardUser()->getId());
  }
  public function executeConfirm(sfWebRequest $request)
  {
  	$this->forward404Unless($this->yourhave = HavelistTable::getInstance()->find($request->getParameter('fid')),sprintf('Error in your object'));
  	$this->forward404Unless($this->wanthave = HavelistTable::getInstance()->find($request->getParameter('tid')),sprintf('Error in object to trade'));
  	
  	$this->forward404Unless($this->yourhave->getUserId() == $this->getUser()->getGuardUser()->getId(),'You dont have access here');
  	
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($yourHave = HavelistTable::getInstance()->find($request->getParameter('fid')),sprintf('Error in your object'));
  	$this->forward404Unless($wantHave = HavelistTable::getInstance()->find($request->getParameter('tid')),sprintf('Error in object to trade'));
  	
  	$trade = new Trade();
  	$trade->setHaveFromId($yourHave->getId());
  	$trade->setHaveToId($wantHave->getId());
  	$trade->setState('waiting');
  	$trade->save();
  
  }
  
  public function executeAccept(sfWebRequest $request)
  {
  	$this->forward404Unless($yourHave = HavelistTable::getInstance()->find($request->getParameter('fid')),sprintf('Error in your object'));
  	$this->forward404Unless($wantHave = HavelistTable::getInstance()->find($request->getParameter('tid')),sprintf('Error in object to trade'));
  	
  	$this->forward404Unless($trade = TradeTable::getInstance()->getTradeFor($yourHave->getId(), $wantHave->getId()));
  	$html = $this->getPartial("trade/successMail");
  	$message = Trade::ComposeMail($yourHave->getUser()->getUsername(),$html);
  	$this->forward404Unless($this->getMailer()->send($message),"There is some problems with our mail server");
  	
  	$rep1 = $yourHave->getUser()->getReputation();
  	$rep2 = $wantHave->getUser()->getReputation();
  	if(!$rep1){
  			$rep1 = new Reputation();
  			$rep1->setUser($yourHave->getUser());
  			$rep1->setIntercambios(1);
  	}
  	else $rep1->setIntercambios($rep1->getIntercambios + 1);
  	if(!$rep2){
  			$rep2 = new Reputation();
  			$rep2->setUser($wantHave->getUser());
  			$rep2->setIntercambios(1);
  	}
   	else $rep2->setIntercambios($rep1->getIntercambios + 1);
   	
  	$rep1->save();
  	$rep2->save();
  	
  	$trade->setState('accepted');
  	$trade->save();
  	
  	
  }
  
  public function executeReject(sfWebRequest $request)
  {
  	$this->forward404Unless($yourHave = HavelistTable::getInstance()->find($request->getParameter('fid')),sprintf('Error in your object'));
  	$this->forward404Unless($wantHave = HavelistTable::getInstance()->find($request->getParameter('tid')),sprintf('Error in object to trade'));
  	
  	$this->forward404Unless($trade = TradeTable::getInstance()->getTradeFor($yourHave->getId(), $wantHave->getId()));
  	
  	$html = $this->getPartial("trade/rejectMail");
  	$message = Trade::ComposeMail($yourHave->getUser()->getUsername(),$html);
  	$this->forward404Unless($this->getMailer()->send($message),"There is some problems with our mail server");
  	
  	$trade->setState('rejected');
  	$trade->save();
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($trade = Doctrine_Core::getTable('Trade')->find(array($request->getParameter('id'),
                                 $request->getParameter('have_from_id'),
                                 $request->getParameter('have_to_id'))), sprintf('Object trade does not exist (%s).', $request->getParameter('id'),
                                 $request->getParameter('have_from_id'),
                                 $request->getParameter('have_to_id')));
    $this->form = new TradeForm($trade);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($trade = Doctrine_Core::getTable('Trade')->find(array($request->getParameter('id'),
                                 $request->getParameter('have_1_id'),
                                 $request->getParameter('have_2_id'))), sprintf('Object trade does not exist (%s).', $request->getParameter('id'),
                                 $request->getParameter('have_1_id'),
                                 $request->getParameter('have_2_id')));
    $this->form = new TradeForm($trade);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

}
