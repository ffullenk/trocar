
Calificaciones que realice:
<br>
<?php

foreach($rates as $r){
	
	echo 'Usuario rateado: '.$r->getUserRated();
	?>
	<br>
	<?php echo 'Satisfaction reportada: '.$r->getSatisfaction();
	?>
		<br>
	<?php echo 'comentario: '.$r->getSatisfaction();
	?>
			<br>
<?php
}
?>


