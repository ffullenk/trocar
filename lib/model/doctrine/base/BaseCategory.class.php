<?php

/**
 * BaseCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $id_root
 * @property string $name
 * @property Category $Category
 * @property Product $Products
 * 
 * @method integer  getId()       Returns the current record's "id" value
 * @method integer  getIdRoot()   Returns the current record's "id_root" value
 * @method string   getName()     Returns the current record's "name" value
 * @method Category getCategory() Returns the current record's "Category" value
 * @method Product  getProducts() Returns the current record's "Products" value
 * @method Category setId()       Sets the current record's "id" value
 * @method Category setIdRoot()   Sets the current record's "id_root" value
 * @method Category setName()     Sets the current record's "name" value
 * @method Category setCategory() Sets the current record's "Category" value
 * @method Category setProducts() Sets the current record's "Products" value
 * 
 * @package    trocar
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('category');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('id_root', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Category', array(
             'local' => 'id_root',
             'foreign' => 'id'));

        $this->hasOne('Product as Products', array(
             'local' => 'id',
             'foreign' => 'id_category'));
    }
}