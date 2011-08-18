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
    
    twitterOAuthPlugin::sendTweet("Listando productos");
  }
  
   public function executeSearch(sfWebRequest $request)
  {
    $this->forwardUnless($query = $request->getParameter('query'), 'products', 'index');
 
    //busco con zend lucene
    $this->products = ProductTable::getInstance()->getForLuceneQuery($query);
    
    $q = $this->buildQuery("books", $query);
    $test = file_get_contents($q);
    $respuesta = json_decode($test,true);

      if(isset($respuesta['kind'])){
        $books_parse = $respuesta['items'];
        $this->books = array();
        foreach($books_parse as $book){
          array_push($this->books, $this->getBook($book));
        }
      }else{
        $this->getUser()->setFlash('resultados', 'No se encontraron resultados de busqueda');
      }
    
    if ($request->isXmlHttpRequest())
  {
    if ('*' == $query || !$this->products)
    {
      return $this->renderText('Sin resultados');
    }
 
    return $this->renderText('Con resultados');
  }
    
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
  
  private function getBook($book)
  {
    $newBook = new Book();
    $newBook->setName($book['volumeInfo']['title']);
    $newBook->setThumbnail(isset($book['volumeInfo']['imageLinks']) ? $book['volumeInfo']['imageLinks']['thumbnail'] : 'no-product.jpg');
    $autores = $book['volumeInfo']['authors'];
    $autor_tmp = "";
    foreach($autores as $autor)
    {
      //he observado que a veces un solo autor contiene a varios (separados por ,)
      if(strpos($autor, ",") !== false)
      {
        $autor_especial = explode(",", $autor);
        foreach($autor_especial as $a)
          $autor_tmp .= $a.", ";
      }
      else
      {
        $autor_tmp .= $autor.", ";
      }
    }
    $newBook->setAuthors(substr($autor_tmp, 0, -2));
    
    return $newBook;
  }
  
  private function buildQuery($type, $search_term)
  {
    switch($type)
    {
      case "books":
          $query = 'https://www.googleapis.com/books/v1/volumes?';
          $query .= 'q='.urlencode($search_term);
          $query .= '&maxResults=10';
          return $query;
        break;
      case "music":
          $query = 'http://ws.audioscrobbler.com/2.0/?method=album.search&format=json&api_key=b25b959554ed76058ac220b7b2e0a026';
          $query .= '&album='.urlencode($search_term);
          return $query;
        break;
      case "movies":
          $query = 'http://api.rottentomatoes.com/api/public/v1.0/movies.json?apikey=vgpq8cvgfs6m5gsfnrypzqup&page_limit=10';
          $query .= '&q='.urlencode($search_term);
          return $query;
        break;
      default:
        return null;
    }
  }
}
