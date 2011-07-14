<?php 
class UserTestFunctional extends TrocarTestFunctional
{
	public function getValidUser()
	{
		$q = Doctrine_Core::getTable('sfGuardUser')
			            ->createQuery('u')
                        ->select('u.username, u.password')
                        ->limit(1); 
        $user = $q->fetchOne();
        return $user;
	}
	public function getAdminUser()
	{
		$q = Doctrine_Core::getTable('sfGuardUser')
			            ->createQuery('u')
                        ->select('u.*')
                        ->where('u.username = ?', 'admin@trocar.cl')
                        ->limit(1); 
         $user = $q->fetchOne();
         return $user;
	}
}

 
