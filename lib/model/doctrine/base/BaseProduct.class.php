<?php

/**
 * BaseProduct
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $id_category
 * @property string $name
 * @property string $description
 * @property string $picture
 * @property string $link
 * @property string $brand
 * @property string $model
 * @property Doctrine_Collection $Havelist
 * @property Category $Category
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method integer             getIdCategory()  Returns the current record's "id_category" value
 * @method string              getName()        Returns the current record's "name" value
 * @method string              getDescription() Returns the current record's "description" value
 * @method string              getPicture()     Returns the current record's "picture" value
 * @method string              getLink()        Returns the current record's "link" value
 * @method string              getBrand()       Returns the current record's "brand" value
 * @method string              getModel()       Returns the current record's "model" value
 * @method Doctrine_Collection getHavelist()    Returns the current record's "Havelist" collection
 * @method Category            getCategory()    Returns the current record's "Category" value
 * @method Product             setId()          Sets the current record's "id" value
 * @method Product             setIdCategory()  Sets the current record's "id_category" value
 * @method Product             setName()        Sets the current record's "name" value
 * @method Product             setDescription() Sets the current record's "description" value
 * @method Product             setPicture()     Sets the current record's "picture" value
 * @method Product             setLink()        Sets the current record's "link" value
 * @method Product             setBrand()       Sets the current record's "brand" value
 * @method Product             setModel()       Sets the current record's "model" value
 * @method Product             setHavelist()    Sets the current record's "Havelist" collection
 * @method Product             setCategory()    Sets the current record's "Category" value
 * 
 * @package    trocar
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProduct extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('product');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('id_category', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('name', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
             ));
        $this->hasColumn('description', 'string', 150, array(
             'type' => 'string',
             'length' => 150,
             ));
        $this->hasColumn('picture', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             ));
        $this->hasColumn('link', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
             ));
        $this->hasColumn('brand', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
             ));
        $this->hasColumn('model', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Havelist', array(
             'local' => 'id',
             'foreign' => 'id_product'));

        $this->hasOne('Category', array(
             'local' => 'id_category',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}