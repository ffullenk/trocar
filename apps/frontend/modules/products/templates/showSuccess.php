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
    <tr>
      <th>Created at:</th>
      <td><?php echo $product->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $product->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('products/edit?id='.$product->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('products/index') ?>">List</a>
