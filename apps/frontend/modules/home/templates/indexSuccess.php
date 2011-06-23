<?php use_helper('I18N') ?>
<?php if (!$sf_user->isAuthenticated()): ?>
<fb:login-button perms="email"></fb:login-button>
<?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)); 
      echo link_to('Registrar', 'register/index');
endif ?>
<?php if ($sf_user->isAuthenticated()): ?>
Hola <?php echo $sf_user->getProfile()->getFirstName() ?>
<?php
	echo '<br><br><br><br>';
echo "ultimos productos en el sistema";

foreach ($productos as $producto) 
{
echo '<br>';
    echo $producto['name'];
}
?>
<?php echo link_to('Salir','@sf_guard_signout') ?>
<?php endif ?>