<h1>Trades List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Have 1</th>
      <th>Have 2</th>
      <th>State</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($trades as $trade): ?>
    <tr>
      <td><a href="<?php echo url_for('trade/edit?id='.$trade->getId().'&have_1_id='.$trade->getHave1Id().'&have_2_id='.$trade->getHave2Id()) ?>"><?php echo $trade->getId() ?></a></td>
      <td><a href="<?php echo url_for('trade/edit?id='.$trade->getId().'&have_1_id='.$trade->getHave1Id().'&have_2_id='.$trade->getHave2Id()) ?>"><?php echo $trade->getHave1Id() ?></a></td>
      <td><a href="<?php echo url_for('trade/edit?id='.$trade->getId().'&have_1_id='.$trade->getHave1Id().'&have_2_id='.$trade->getHave2Id()) ?>"><?php echo $trade->getHave2Id() ?></a></td>
      <td><?php echo $trade->getState() ?></td>
      <td><?php echo $trade->getCreatedAt() ?></td>
      <td><?php echo $trade->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('trade/new') ?>">New</a>
