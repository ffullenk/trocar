<?php

/**
 * Product
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    trocar
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Product extends BaseProduct
{
	
	public function usuarioHasWantedProduct($userId)
	{
		$q = Doctrine_Core::getTable('WantList')
		->createQuery('c')
		->where('c.user_id = ?', $userId)
		->andWhere('c.product_id = ?',  $this->getId());
		
		$resultado = $q->execute();
		
		if($resultado->count() == 0)return false;
		else return true;
		
	}
}
