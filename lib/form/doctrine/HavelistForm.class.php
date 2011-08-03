<?php

/**
 * Havelist form.
 *
 * @package    trocar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class HavelistForm extends BaseHavelistForm
{
  public function configure()
  {
  	unset(
  	  $this['created_at'],
  	  $this['updated_at'],
  	  $this['object_id'],
  	  $this['user_id'],
  	  $this['product_id']
  	  );
  	  $this->embedRelation('Object');
  }
  
}
