<?php use_helper('jQuery'); ?>
<a>WantList de usuario</a>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Description</th>
      <th>Picture</th>
      <th>Link</th>
      <th>Brand</th>
      <th>Model</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($wantlist as $want): ?>
    <?php $product = $want->getProduct()?>
    <tr>
      <td><a href="<?php echo url_for('products/show?id='.$product->getId()) ?>"><?php echo $product->getId() ?></a></td>
      <td><?php echo $product->getName() ?></td>
      <td><?php echo $product->getDescription() ?></td>
      
      <td><?php echo image_tag($product->getPicture(),'size=60x60') ?></td>
      <td><?php echo $product->getLink() ?></td>
      <td><?php echo $product->getBrand() ?></td>
      <td><?php echo $product->getModel() ?></td> 
      <td> <?php  if($product->usuarioHasWantedProduct($sf_user->getGuardUser()->getId()))
      					echo jq_link_to_remote('remover de WantList', array('url'=> 'wantlist/remove?id='.$product->getId()));
						
		  ?>
      </td> 


      
     
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>