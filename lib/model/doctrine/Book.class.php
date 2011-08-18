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
  private $name;
  private $authors;
  private $thumbnail;
  private $attrib = array();
    
  public function printAuthors($size = 2)
  {
    $final = "";
    $cant = 0;
    $autor = explode(",", $this->getAuthors());
    foreach($autor as $a)
    {
      if($cant < $size)
          $final .= $a.", ";
      else
        break;
      $cant++;
    }
    return substr($final, 0, -2);
  }
  
  /** METODOS MAGICOS **/
  public function __call($method, $args)
  {
    $methodType = substr($method, 0, 3);
    $attribName = ucfirst(substr($method, 3));

    if($methodType == "set")
    {
     $this->setAttrib($attribName, $args[0]);
    }

    if( $methodType == "get" )
    {
     return $this->getAttrib($attribName);
    }
  }

  private function setAttrib($attribName, $value)
  {
    $this->attrib[$attribName] = $value;
  }

  private function getAttrib($attribName)
  {
    return $this->attrib[$attribName];
  }
}
?>