<?php

//echo $sf_user->getUsername();

foreach($trades as $t){?>
<br>
Id de trade: 				<?php echo $t->getId();?>
<br>
Nombre producto entregado: 	<?php echo $t->getHaveFrom()->getProduct()->getName();?>
<br>
Nombre producto recibido:   <?php echo $t->getHaveTo()->getProduct()->getName();?>
<br>
<?php
}

