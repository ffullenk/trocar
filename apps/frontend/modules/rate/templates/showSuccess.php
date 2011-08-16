<table>
  <tbody>
    <tr>
      <th>Intercambio:</th>
      <td><?php echo $rate->getIntercambioId() ?></td>
    </tr>
    <tr>
      <th>User rated:</th>
      <td><?php echo $rate->getUserRatedId() ?></td>
    </tr>
    <tr>
      <th>User rater:</th>
      <td><?php echo $rate->getUserRaterId() ?></td>
    </tr>
    <tr>
      <th>Feedback:</th>
      <td><?php echo $rate->getFeedback() ?></td>
    </tr>
    <tr>
      <th>Satisfaction:</th>
      <td><?php echo $rate->getSatisfaction() ?></td>
    </tr>
    <tr>
      <th>Credibility:</th>
      <td><?php echo $rate->getCredibility() ?></td>
    </tr>
    <tr>
      <th>Text:</th>
      <td><?php echo $rate->getText() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $rate->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $rate->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('rate/edit?intercambio_id='.$rate->getIntercambioId().'&user_rated_id='.$rate->getUserRatedId().'&user_rater_id='.$rate->getUserRaterId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('rate/index') ?>">List</a>
