<?php
/**
 * Books
 * 
 * Representa un libro (producto)
 * 
 * @package    trocar
 * @subpackage model
 * @author     dacuna
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Book extends BaseProduct
{
  //se construye el objeto a partir de la respuesta JSON parseada a un array devuelta por
  //la API de google books
  public function createBook($book)
  {
    $this->setId(1);
    $this->setName($book['volumeInfo']['title']);
    $this->setPicture(isset($book['volumeInfo']['imageLinks']) ? $book['volumeInfo']['imageLinks']['thumbnail'] : 'no-product.jpg');
    
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
        $autor_tmp .= $autor.", ";
    }
    
    $this->setAuthors(substr($autor_tmp, 0, -2));
  }
  
  //Usare el atributo 'model' de la clase Producto para almacenar los autores
  //lo siguiente es solo un poco de magia ;)
  public function setAuthors($autor)
  {
    $this->model = $autor;
  }
  
  public function getAuthors()
  {
    return $this->model;
  }
  
  public function printAuthors($size = 2)
  {
    $final = "";
    $autor = explode(",", $this->getAuthors());
    foreach($autor as $key => $a)
    {
      if($key < $size)
          $final .= $a.", ";
      else
        break;
    }
    return substr($final, 0, -2);
  }

}
?>
