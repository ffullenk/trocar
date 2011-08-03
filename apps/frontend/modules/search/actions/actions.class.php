<?php

/**
 * search actions.
 *
 * @package    trocar
 * @subpackage search
 * @author     dacuna
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class searchActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $buscar = $request->getParameter('buscar');
    $type = $this->type = $request->getParameter('search_type');
    
    if($type == 'books'){
      $query = $this->buildQuery($type, $buscar);
      $test = file_get_contents($query);
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
    }
    elseif($type == 'music')
    {
      $query = $this->buildQuery($type, $buscar);
      $test = file_get_contents($query);
      $respuesta = json_decode($test,true);

      if($respuesta['results']['opensearch:totalResults'] != '0')
        $this->albums = $respuesta['results']['albummatches']['album'];
      else
        $this->getUser()->setFlash('resultados', 'No se encontraron resultados de busqueda');
    } 
    else
    {
      //se busco por peliculas
      $query = $this->buildQuery($type, $buscar);
      $test = file_get_contents($query);
      $respuesta = json_decode($test,true);
   
      if(isset($respuesta['movies']))
        $this->movies = $respuesta['movies'];
      else
        $this->getUser()->setFlash('resultados', 'No se encontraron resultados de busqueda');
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
