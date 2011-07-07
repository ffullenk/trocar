<?php
class TrocarTestFunctional extends sfTestFunctional
{
	public function loadData()
	{
		Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures');
		return $this;
	}
	public function signin($username, $password)
	{
		
		return $this->info(sprintf('Signin user using username "%s"', $username))
			->get('/')->click('Signin', array( 'signin' => array(
	                 'username' => $username, 
					 'password' => 'admin'
				 )));
			
	}
}