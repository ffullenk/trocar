<?php
class TrocarTestFunctional extends sfTestFunctional
{
	public function loadData($type = 0)
	{
		if ( $type == 0 )
				Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures/fixtures.yml');
		elseif ( $type == 2 )
				Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures/fixtures_have.yml');
		return $this;
	}
	public function signin($username, $password)
	{
		
		return $this->info(sprintf('Signin user using username "%s"', $username))
			->get('/')->click('Login', array( 'signin' => array(
	                 'username' => $username, 
					 'password' => 'admin'
				 )));
			
	}
}
