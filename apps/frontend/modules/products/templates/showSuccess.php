<?php use_helper('jQuery'); ?>
<table>
  <tbody>
    
    <tr>
      <th>Nombre del producto:</th>
      <td><?php echo $product->getName() ?></td>
    </tr>
    <tr>
      <th>Descripcion:</th>
      <td><?php echo $product->getDescription() ?></td>
    </tr>
    <tr>
      <th>Foto:</th>
       <td><?php echo image_tag($product->getPicture(),'size=60x60') ?></td>
      </tr>
    <tr>
      <th>Link:</th>
      <td><?php echo $product->getLink() ?></td>
    </tr>
    <tr>
      <th>Marca:</th>
      <td><?php echo $product->getBrand() ?></td>
    </tr>
    <tr>
      <th>Modelo:</th>
      <td><?php echo $product->getModel() ?></td>
    </tr>

  </tbody>
</table>

<hr />
<?php  if($wantList)
			echo jq_link_to_remote('Ya no lo quiero', array('url'=> 'wantlist/remove?id='.$product->getId()));
		else echo jq_link_to_remote('Lo quiero', array('url'=> 'wantlist/add?id='.$product->getId()));
		  ?>

&nbsp;
<a href="<?php echo url_for('products/index') ?>">Volver al indice de productos</a>

<br>
Usuarios que quieren este producto
<br>
    <?php 
		foreach ($product->getWantlist() as $want):
			echo $want->getUser()->getUsername();
			echo '<br>';
		endforeach;
    
    
    
    
    ?>
    
<br>
Usuarios que tienen este producto
<br>
    <?php 
		foreach ($product->getHavelist() as $have):
			echo $have->getUser()->getUsername();
			echo '<br>';
		endforeach;
    
    
    
    
    ?>
    	
