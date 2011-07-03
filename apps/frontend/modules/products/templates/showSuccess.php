<?php use_helper('jQuery'); ?>
<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $product->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $product->getName() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $product->getDescription() ?></td>
    </tr>
    <tr>
      <th>Picture:</th>
      <td><?php echo $product->getPicture() ?></td>
    </tr>
    <tr>
      <th>Link:</th>
      <td><?php echo $product->getLink() ?></td>
    </tr>
    <tr>
      <th>Brand:</th>
      <td><?php echo $product->getBrand() ?></td>
    </tr>
    <tr>
      <th>Model:</th>
      <td><?php echo $product->getModel() ?></td>
    </tr>

  </tbody>
</table>

<hr />
<?php echo jq_link_to_remote('agregar a WantList', array(
      		 
             'url'       => 'wantlist/add?id='.$product->getId()
              )) ?>
&nbsp;
<a href="<?php echo url_for('products/edit?id='.$product->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('products/index') ?>">List</a>
