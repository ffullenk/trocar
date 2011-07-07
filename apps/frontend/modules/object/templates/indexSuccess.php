<h1>Objects List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Status</th>
      <th>Detail</th>
      <th>Picture</th>
      <th>Weight</th>
      <th>Height</th>
      <th>Width</th>
      <th>Lenght</th>
      <th>Is new</th>
      <th>Color</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($objects as $object): ?>
    <tr>
      <td><a href="<?php echo url_for('object/show?id='.$object->getId()) ?>"><?php echo $object->getId() ?></a></td>
      <td><?php echo $object->getStatus() ?></td>
      <td><?php echo $object->getDetail() ?></td>
      <td><?php echo $object->getPicture() ?></td>
      <td><?php echo $object->getWeight() ?></td>
      <td><?php echo $object->getHeight() ?></td>
      <td><?php echo $object->getWidth() ?></td>
      <td><?php echo $object->getLenght() ?></td>
      <td><?php echo $object->getIsNew() ?></td>
      <td><?php echo $object->getColor() ?></td>
      <td><?php echo $object->getCreatedAt() ?></td>
      <td><?php echo $object->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('object/new') ?>">New</a>
