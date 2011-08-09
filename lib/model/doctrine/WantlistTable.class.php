<?php

/**
 * WantlistTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class WantlistTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object WantlistTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Wantlist');
    }
    
    /**
     * M�todo para verificar si un usuario posee cierto producto en su wantlist
     * @param integer $userId
     * @param integer $productId
     * @return boolean
     * @author ffullenk
     */
    public function usuarioHasWantedProduct($userId,$productId)
    {
    	$q = $this->getInstance()
    	->createQuery('c')
    	->where('c.user_id = ?', $userId)
    	->andWhere('c.product_id = ?',  $productId);
    
    	$resultado = $q->execute();
    
    	if($resultado->count() == 0)return false;
    	else return true;
    
    }
    public function getWantForProduct($productId)
    {
    	$q = $this->getInstance()
    	->createQuery('c')
    	->select()
    	->where('c.product_id = ?', $productId());
    	
    	return $q->execute();	
    }
    
}