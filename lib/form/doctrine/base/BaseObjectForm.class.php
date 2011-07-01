<?php

/**
 * Object form base class.
 *
 * @method Object getObject() Returns the current form's model object
 *
 * @package    trocar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseObjectForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'status'     => new sfWidgetFormInputText(),
      'detail'     => new sfWidgetFormInputText(),
      'picture'    => new sfWidgetFormInputText(),
      'weight'     => new sfWidgetFormInputText(),
      'height'     => new sfWidgetFormInputText(),
      'width'      => new sfWidgetFormInputText(),
      'lenght'     => new sfWidgetFormInputText(),
      'is_new'     => new sfWidgetFormInputCheckbox(),
      'color'      => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'status'     => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'detail'     => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'picture'    => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'weight'     => new sfValidatorInteger(array('required' => false)),
      'height'     => new sfValidatorInteger(array('required' => false)),
      'width'      => new sfValidatorInteger(array('required' => false)),
      'lenght'     => new sfValidatorInteger(array('required' => false)),
      'is_new'     => new sfValidatorBoolean(array('required' => false)),
      'color'      => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('object[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Object';
  }

}
