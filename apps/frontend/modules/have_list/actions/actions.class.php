<?php

/**
 * have_list actions.
 *
 * @package    trocar
 * @subpackage have_list
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class have_listActions extends sfActions
{
  public function executeAdd( sfWebRequest $request)
  {
  	$this->forward404Unless($request->hasParameter('id'));
  	
  	$idProduct   = $request->getParameter('id');
  	$idUser      = $this->getUser()->getGuardUser()->getId();
  	$have_list = new Havelist();

  	$have_list->setProductId($idProduct);
  	$have_list->setUserId($idUser);
 	$have_list->save();
  	$this->redirect('object/new?hid='.$have_list->getId());
  }
  public function executeIndex(sfWebRequest $request)
  {
    $this->have_lists = Doctrine_Core::getTable('HaveList')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->have_list = Doctrine_Core::getTable('HaveList')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->have_list);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new HaveListForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new HaveListForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($have_list = Doctrine_Core::getTable('HaveList')->find(array($request->getParameter('id'))), sprintf('Object have_list does not exist (%s).', $request->getParameter('id')));
    $this->form = new HaveListForm($have_list);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($have_list = Doctrine_Core::getTable('HaveList')->find(array($request->getParameter('id'))), sprintf('Object have_list does not exist (%s).', $request->getParameter('id')));
    $this->form = new HaveListForm($have_list);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($have_list = Doctrine_Core::getTable('HaveList')->find(array($request->getParameter('id'))), sprintf('Object have_list does not exist (%s).', $request->getParameter('id')));
    $have_list->delete();

    $this->redirect('have_list/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $have_list = $form->save();

      $this->redirect('have_list/edit?id='.$have_list->getId());
    }
  }
}
