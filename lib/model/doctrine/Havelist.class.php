<?php

/**
 * Havelist
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    trocar
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Havelist extends BaseHavelist
{
	static public function getUserHaveList($userId)
	{
		$q = Doctrine_Core::getTable('HaveList')
			->createQuery('q')
			->select('q.*')
			->where('q.user_id = ?',$userId);
		return $q->execute();
	}
}
