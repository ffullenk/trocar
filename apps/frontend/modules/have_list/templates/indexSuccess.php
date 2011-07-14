<h1>Have lists List</h1>

<table class="product">
  <thead>
    <tr>
      <th>Id</th>
      <th>Product</th>
      <th>Object</th>
      <th>User</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($have_lists as $have_list): ?>
    <tr>
      <td><a href="<?php echo url_for('have_list/show?id='.$have_list->getId()) ?>"><?php echo $have_list->getId() ?></a></td>
      <td><?php echo $have_list->getProductId() ?></td>
      <td><?php echo $have_list->getObjectId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('have_list/new') ?>">New</a>
