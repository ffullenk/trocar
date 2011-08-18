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

}
