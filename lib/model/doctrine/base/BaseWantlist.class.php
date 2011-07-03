<?php

/**
 * BaseWantlist
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property integer $product_id
 * @property Product $Product
 * @property sfGuardUser $User
 * 
 * @method integer     getId()         Returns the current record's "id" value
 * @method integer     getUserId()     Returns the current record's "user_id" value
 * @method integer     getProductId()  Returns the current record's "product_id" value
 * @method Product     getProduct()    Returns the current record's "Product" value
 * @method sfGuardUser getUser()       Returns the current record's "User" value
 * @method Wantlist    setId()         Sets the current record's "id" value
 * @method Wantlist    setUserId()     Sets the current record's "user_id" value
 * @method Wantlist    setProductId()  Sets the current record's "product_id" value
 * @method Wantlist    setProduct()    Sets the current record's "Product" value
 * @method Wantlist    setUser()       Sets the current record's "User" value
 * 
 * @package    trocar
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseWantlist extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('want_list');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('product_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Product', array(
             'local' => 'product_id',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}