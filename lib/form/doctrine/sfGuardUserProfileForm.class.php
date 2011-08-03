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
    
    $this->widgetSchema['picture'] = new sfWidgetFormInputFileEditable(array(
      'file_src'  => sfConfig::get('sf_upload_dir').'/avatars/'.$this->getObject()->getPicture(),
      'is_image'  => true,
      'edit_mode' => !$this->isNew()
    ));
    
    $this->validatorSchema['picture'] = new sfValidatorFile(array(
				'required'   =>  false,
				'path'		   =>	 sfConfig::get('sf_upload_dir').'/avatars/',
				'mime_types' =>	 'web_images'
				), array('mime_types' => 'The file only accepts pdf format'));
  }
  
  public function generatePictureFilename($file = null)
  {
    if (null === $file) {
      return null;
    }

    if (file_exists($file->getpath().$file->getOriginalName())) {
       return $this->appendToName($file);
    }

    return $file->getOriginalName();
  }

  public function appendToName($file, $index = 0)
  {
      $newname = pathinfo($file->getOriginalName(), PATHINFO_FILENAME).$index.$file->getExtension();

      if (file_exists($file->getpath().$newname)) {
         return $this->appendToName($file, ++$index);
      } else {
         return $newname;
      }
   }

}
