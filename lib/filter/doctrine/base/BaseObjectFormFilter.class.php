<?php

/**
 * Object filter form base class.
 *
 * @package    trocar
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseObjectFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'status'     => new sfWidgetFormFilterInput(),
      'detail'     => new sfWidgetFormFilterInput(),
      'picture'    => new sfWidgetFormFilterInput(),
      'weight'     => new sfWidgetFormFilterInput(),
      'height'     => new sfWidgetFormFilterInput(),
      'width'      => new sfWidgetFormFilterInput(),
      'lenght'     => new sfWidgetFormFilterInput(),
      'is_new'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'color'      => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'status'     => new sfValidatorPass(array('required' => false)),
      'detail'     => new sfValidatorPass(array('required' => false)),
      'picture'    => new sfValidatorPass(array('required' => false)),
      'weight'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'height'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'width'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lenght'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_new'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'color'      => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('object_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Object';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'status'     => 'Text',
      'detail'     => 'Text',
      'picture'    => 'Text',
      'weight'     => 'Number',
      'height'     => 'Number',
      'width'      => 'Number',
      'lenght'     => 'Number',
      'is_new'     => 'Boolean',
      'color'      => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
