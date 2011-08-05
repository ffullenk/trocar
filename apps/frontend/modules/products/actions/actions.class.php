<?php

/**
 * products actions.
 *
 * @package    trocar
 * @subpackage products
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class productsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->products = ProductTable::getInstance()
      ->createQuery('a')
      ->execute();
    
    
  }
  
   public function executeSearch(sfWebRequest $request)
  {
    $this->forwardUnless($query = $request->getParameter('query'), 'product', 'index');
 
    $this->products = Doctrine_Core::getTable('Product') ->getForLuceneQuery($query);
  }
  
  public function executeShow(sfWebRequest $request)
  {
    $this->product = ProductTable::getInstance()->find(array($request->getParameter('id')));
    $this->forward404Unless($this->product);
    $this->userId = $this->getUser()->getGuardUser()->getId();
   
    $tablaWantlist = WantlistTable::getInstance();
    $this->wantList = $tablaWantlist->usuarioHasWantedProduct($this->userId,$this->product->getId());
    
    
  
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new NewProductForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new NewProductForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($product = ProductTable::getInstance()->find(array($request->getParameter('id'))), sprintf('Object product does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProductForm($product);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($product = ProductTable::getInstance()->find(array($request->getParameter('id'))), sprintf('Object product does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProductForm($product);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }
  
  public function executeAddreview(sfWebRequest $request)
  {
  	$this->forward404Unless($request->isMethod(sfRequest::POST));
  	
  	$review = new Review();
  	$review->setText($request->getParameter('review'));
  	$review->setProductId($request->getParameter('productid'));
  	$review->setUserId($this->getUser()->getGuardUser()->getId());
  	$review->save();
  	
  	$this->username = $this->getUser()->getUsername();
  	$this->text = $review->getText();
  	
  	
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($product = ProductTable::getInstance()->find(array($request->getParameter('id'))), sprintf('Object product does not exist (%s).', $request->getParameter('id')));
    $product->delete();

    $this->redirect('products/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $product = $form->save();

      $this->redirect('products/edit?id='.$product->getId());
    }
  }
}
