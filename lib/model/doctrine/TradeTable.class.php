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
    
    public static function getAcceptedTrades($user)
    {
    	$q =  Doctrine_Core::getTable('Trade')
    	->createQuery('u')
    	->select('Trade.*')
    	->from('Trade,sfGuardUser,Havelist')
    	->where('sfGuardUser.id = ?',$user->getProfile()->getUserId())
    	->andWhere('Havelist.user_id = sfGuardUser.id')
    	->andWhere('Trade.have_to_id = Havelist.id')
    	->orWhere('Trade.have_from_id = Havelist.id')
    	->andWhere('Trade.state = ?','accepted')
    	->groupBy('Trade.id');
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
    public static function getNumTrades(){
    	
    	$q = Doctrine_Query::create()
    	->select('COUNT(t.id) AS num_trades')
    	->from('Trade t');
    	
    	$result = $q->execute();
    	
    	return $result[0]['num_trades'];
    	
    }
    
    public function getAcceptedUnRatedTrades($user)
    {
    	$sql = 'SELECT * FROM trade WHERE NOT EXISTS (SELECT * FROM rate WHERE rate.trade_id = trade.id)
    	 AND (trade.user_1_id = '.$user->getProfile()->getUserId().' OR trade.user_2_id = '.$user->getProfile()->getUserId().')';
    	$q = Doctrine_Manager::getInstance()->getCurrentConnection();
    	$result = $q->execute($sql);
    	//$result = $result->setFetchMode(Doctrine_Core::FETCH_OBJ);
    	$result = $result->fetchAll();
    	//return $result;
    	
    	
    	
    	//$PDO = Doctrine_Manager::getInstance()->connection()->getDbh();
    	//return $PDO->prepare($sql)->execute();
    	
    	
//      	$conn = Doctrine_Manager::connection();
//      	$pdo = $conn->execute($sql);
//      	$pdo->setFetchMode(Doctrine_Core::FETCH_OBJ);
//      	$result = $pdo->fetchAll();


     	$i = 0;
      	foreach($result as $t){
      		$id = $result[$i]['id'];
      		$trade = TradeTable::getInstance()->find(array($id));
      		$arrayTrades[$i] = $trade;
      		$i = $i + 1;  		
    		
      	}
    	
    	
      	return $arrayTrades;
    	 
    }
    
    
    
}