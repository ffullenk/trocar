<h1>Products List</h1>

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
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $product): ?>
    <tr>
      <td><a href="<?php echo url_for('products/show?id='.$product->getId()) ?>"><?php echo $product->getId() ?></a></td>
      <td><?php echo $product->getName() ?></td>
      <td><?php echo $product->getDescription() ?></td>
      <td><?php echo $product->getPicture() ?></td>
      <td><?php echo $product->getLink() ?></td>
      <td><?php echo $product->getBrand() ?></td>
      <td><?php echo $product->getModel() ?></td>
      <td><?php echo $product->getCreatedAt() ?></td>
      <td><?php echo $product->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('products/new') ?>">New</a>
