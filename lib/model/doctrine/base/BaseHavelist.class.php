<?php

/**
 * BaseHavelist
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $id_product
 * @property integer $id_object
 * @property integer $user_id
 * @property Product $Product
 * @property Object $Object
 * @property sfGuardUser $User
 * 
 * @method integer     getId()         Returns the current record's "id" value
 * @method integer     getIdProduct()  Returns the current record's "id_product" value
 * @method integer     getIdObject()   Returns the current record's "id_object" value
 * @method integer     getUserId()     Returns the current record's "user_id" value
 * @method Product     getProduct()    Returns the current record's "Product" value
 * @method Object      getObject()     Returns the current record's "Object" value
 * @method sfGuardUser getUser()       Returns the current record's "User" value
 * @method Havelist    setId()         Sets the current record's "id" value
 * @method Havelist    setIdProduct()  Sets the current record's "id_product" value
 * @method Havelist    setIdObject()   Sets the current record's "id_object" value
 * @method Havelist    setUserId()     Sets the current record's "user_id" value
 * @method Havelist    setProduct()    Sets the current record's "Product" value
 * @method Havelist    setObject()     Sets the current record's "Object" value
 * @method Havelist    setUser()       Sets the current record's "User" value
 * 
 * @package    trocar
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseHavelist extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('havelist');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('id_product', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('id_object', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Product', array(
             'local' => 'id_product',
             'foreign' => 'id'));

        $this->hasOne('Object', array(
             'local' => 'id_object',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}