<?php 
class UserTestFunctional extends sfTestFunctional
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
	public function signin($username, $password)
	{
		return $this->info(sprintf('Signin user using username "%s"', $username))
			->post('/login',array('signin' => array(
				'username' => $username,
				'password' => $password,
			)))
			;
	}
}

 
