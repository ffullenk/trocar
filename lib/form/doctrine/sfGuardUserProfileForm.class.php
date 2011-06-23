<?php

/**
 * sfGuardUserProfile form.
 *
 * @package    trocar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserProfileForm extends BasesfGuardUserProfileForm
{
  public function configure()
  {
    unset(
      $this['user_id'],
      $this['token'],
      $this['facebook_uid'],
      $this['created_at'],
      $this['updated_at']
    );
    
    $this->widgetSchema->setNameFormat('edit[%s]');
  }
}
