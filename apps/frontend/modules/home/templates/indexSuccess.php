
<fb:login-button perms="email"></fb:login-button>
<?php 
echo $mensaje;
 ?>
<br>
<?php 
echo link_to('Registrar', 'register/index');
echo link_to('loguear', '@sf_guard_signin');

if(isset($username))
{
	echo $username;
	echo link_to('desloguear', '@sf_guard_signout');
	}


 ?>