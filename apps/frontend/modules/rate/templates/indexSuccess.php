<h1>Rates List</h1>

<table>
  <thead>
    <tr>
      <th>Intercambio</th>
      <th>User rated</th>
      <th>User rater</th>
      <th>Feedback</th>
      <th>Satisfaction</th>
      <th>Credibility</th>
      <th>Text</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rates as $rate): ?>
    <tr>
      <td><a href="<?php echo url_for('rate/show?intercambio_id='.$rate->getIntercambioId().'&user_rated_id='.$rate->getUserRatedId().'&user_rater_id='.$rate->getUserRaterId()) ?>"><?php echo $rate->getIntercambioId() ?></a></td>
      <td><a href="<?php echo url_for('rate/show?intercambio_id='.$rate->getIntercambioId().'&user_rated_id='.$rate->getUserRatedId().'&user_rater_id='.$rate->getUserRaterId()) ?>"><?php echo $rate->getUserRatedId() ?></a></td>
      <td><a href="<?php echo url_for('rate/show?intercambio_id='.$rate->getIntercambioId().'&user_rated_id='.$rate->getUserRatedId().'&user_rater_id='.$rate->getUserRaterId()) ?>"><?php echo $rate->getUserRaterId() ?></a></td>
      <td><?php echo $rate->getFeedback() ?></td>
      <td><?php echo $rate->getSatisfaction() ?></td>
      <td><?php echo $rate->getCredibility() ?></td>
      <td><?php echo $rate->getText() ?></td>
      <td><?php echo $rate->getCreatedAt() ?></td>
      <td><?php echo $rate->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('rate/new') ?>">New</a>
