<?php

/**
 * TradeTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TradeTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object TradeTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Trade');
    }
    
    public static function getWaitingTrades($user)
    {
    	$q =  Doctrine_Core::getTable('Trade')
    	->createQuery('u')
    	->select('Trade.*')
    	->from('Trade,sfGuardUser,Havelist')
    	->where('sfGuardUser.id = ?',$user)
    	->andWhere('Havelist.user_id = sfGuardUser.id')
    	->andWhere('Trade.have_to_id = Havelist.id')
    	->andWhere('Trade.state = ?','waiting');
    	return $q->execute(); 
    }
    
    public static function getTradeFor($havefrom, $haveto)
    {
    	$q = Doctrine_Core::getTable('Trade')
    	->createQuery('u')
    	->select('Trade.*')
    	->from('Trade')
    	->where('Trade.have_from_id = ?',$havefrom)
    	->andWhere('Trade.have_to_id = ?',$haveto);
    	return $q->fetchOne();
    }
    
}