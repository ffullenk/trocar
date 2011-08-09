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
      ->createQuery('a')
      ->execute();
  }
  public function executeConfirm(sfWebRequest $request)
  {
  	$this->forward404Unless($have1 = HavelistTable::getInstance()->find($request->getParameter('fid')),sprintf('Error in your object'));
  	$this->forward404Unless($have2 = HavelistTable::getInstance()->find($request->getParameter('tid')),sprintf('Error in object to trade'));
  	
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TradeForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TradeForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($trade = Doctrine_Core::getTable('Trade')->find(array($request->getParameter('id'),
                                 $request->getParameter('have_1_id'),
                                 $request->getParameter('have_2_id'))), sprintf('Object trade does not exist (%s).', $request->getParameter('id'),
                                 $request->getParameter('have_1_id'),
                                 $request->getParameter('have_2_id')));
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

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($trade = Doctrine_Core::getTable('Trade')->find(array($request->getParameter('id'),
                                 $request->getParameter('have_1_id'),
                                 $request->getParameter('have_2_id'))), sprintf('Object trade does not exist (%s).', $request->getParameter('id'),
                                 $request->getParameter('have_1_id'),
                                 $request->getParameter('have_2_id')));
    $trade->delete();

    $this->redirect('trade/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $trade = $form->save();

      $this->redirect('trade/edit?id='.$trade->getId().'&have_1_id='.$trade->getHave1Id().'&have_2_id='.$trade->getHave2Id());
    }
  }
}
