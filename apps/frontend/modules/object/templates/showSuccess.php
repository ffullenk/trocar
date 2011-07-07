<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $object->getId() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $object->getStatus() ?></td>
    </tr>
    <tr>
      <th>Detail:</th>
      <td><?php echo $object->getDetail() ?></td>
    </tr>
    <tr>
      <th>Picture:</th>
      <td><?php echo $object->getPicture() ?></td>
    </tr>
    <tr>
      <th>Weight:</th>
      <td><?php echo $object->getWeight() ?></td>
    </tr>
    <tr>
      <th>Height:</th>
      <td><?php echo $object->getHeight() ?></td>
    </tr>
    <tr>
      <th>Width:</th>
      <td><?php echo $object->getWidth() ?></td>
    </tr>
    <tr>
      <th>Lenght:</th>
      <td><?php echo $object->getLenght() ?></td>
    </tr>
    <tr>
      <th>Is new:</th>
      <td><?php echo $object->getIsNew() ?></td>
    </tr>
    <tr>
      <th>Color:</th>
      <td><?php echo $object->getColor() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $object->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $object->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('object/edit?id='.$object->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('object/index') ?>">List</a>
