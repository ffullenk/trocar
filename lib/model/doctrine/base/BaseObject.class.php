<?php

/**
 * BaseObject
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $status
 * @property string $detail
 * @property string $picture
 * @property integer $weight
 * @property integer $height
 * @property integer $width
 * @property integer $lenght
 * @property boolean $is_new
 * @property string $color
 * @property Havelist $Havelist
 * 
 * @method integer  getId()       Returns the current record's "id" value
 * @method string   getStatus()   Returns the current record's "status" value
 * @method string   getDetail()   Returns the current record's "detail" value
 * @method string   getPicture()  Returns the current record's "picture" value
 * @method integer  getWeight()   Returns the current record's "weight" value
 * @method integer  getHeight()   Returns the current record's "height" value
 * @method integer  getWidth()    Returns the current record's "width" value
 * @method integer  getLenght()   Returns the current record's "lenght" value
 * @method boolean  getIsNew()    Returns the current record's "is_new" value
 * @method string   getColor()    Returns the current record's "color" value
 * @method Havelist getHavelist() Returns the current record's "Havelist" value
 * @method Object   setId()       Sets the current record's "id" value
 * @method Object   setStatus()   Sets the current record's "status" value
 * @method Object   setDetail()   Sets the current record's "detail" value
 * @method Object   setPicture()  Sets the current record's "picture" value
 * @method Object   setWeight()   Sets the current record's "weight" value
 * @method Object   setHeight()   Sets the current record's "height" value
 * @method Object   setWidth()    Sets the current record's "width" value
 * @method Object   setLenght()   Sets the current record's "lenght" value
 * @method Object   setIsNew()    Sets the current record's "is_new" value
 * @method Object   setColor()    Sets the current record's "color" value
 * @method Object   setHavelist() Sets the current record's "Havelist" value
 * 
 * @package    trocar
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseObject extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('object');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('status', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
             ));
        $this->hasColumn('detail', 'string', 150, array(
             'type' => 'string',
             'length' => 150,
             ));
        $this->hasColumn('picture', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             ));
        $this->hasColumn('weight', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('height', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('width', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('lenght', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('is_new', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('color', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Havelist', array(
             'local' => 'id',
             'foreign' => 'id_object'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}