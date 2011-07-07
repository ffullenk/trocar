<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $have_list->getId() ?></td>
    </tr>
    <tr>
      <th>Product:</th>
      <td><?php echo $have_list->getProductId() ?></td>
    </tr>
    <tr>
      <th>Object:</th>
      <td><?php echo $have_list->getObjectId() ?></td>
    </tr>
    <tr>
      <th>User:</th>
      <td><?php echo $have_list->getUserId() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $have_list->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $have_list->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('have_list/edit?id='.$have_list->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('have_list/index') ?>">List</a>
