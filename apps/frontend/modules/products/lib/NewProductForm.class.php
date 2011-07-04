<?php
/**
* RegisterForm maneja los widget y validacion del formulario de registro de 
* usuarios
*
* @author  ffullenk <francisco000@gmail.com>
* @version 1.0 2011-06-12 18:45
*/
class NewProductForm extends ProductForm
{
  /**
  * Inicializa el formulario de creacion de un producto basado en el formulario
  * de un ProductForm
  *
  */
  public function configure()
  {
    //estos campos no se ocuparan en el registro de usuarios
    unset(
      
      $this['updated_at'],
      $this['created_at']
    
    );

    //se cambia el formato de los input del formulario, a uno mas semantico
    $this->widgetSchema->setNameFormat('product[%s]');

   
  }
}

