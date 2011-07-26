<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('products/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table style="margin:10px;">
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('products/index') ?>">Volver al cat&aacute;logo</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Eliminar', 'products/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Crear" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <tr>
        <th style="vertical-align: middle;" width="90" height="40"><?php echo $form['id_category']->renderLabel('Categor&iacute;a') ?></th>
        <td height="40" style="vertical-align: middle;"><?php echo $form['id_category']->render() ?></td>
      </tr>
      
      <tr>
        <th style="vertical-align: middle;" width="90" height="40"><?php echo $form['name']->renderLabel('Nombre') ?></th>
        <td height="40" style="vertical-align: middle;"><?php echo $form['name']->render() ?></td>
      </tr>
      
      <tr>
        <th style="vertical-align: middle;" width="90" height="40"><?php echo $form['description']->renderLabel('Descripci&oacute;n') ?></th>
        <td height="40" style="vertical-align: middle;"><?php echo $form['description']->render() ?></td>
      </tr>
      
      <tr>
        <th style="vertical-align: middle;" width="90" height="40"><?php echo $form['picture']->renderLabel('Foto') ?></th>
        <td height="40" style="vertical-align: middle;"><?php echo $form['picture']->render() ?></td>
      </tr>
      
      <tr>
        <th style="vertical-align: middle;" width="90" height="40"><?php echo $form['link']->renderLabel('Sitio Oficial') ?></th>
        <td height="40" style="vertical-align: middle;"><?php echo $form['link']->render() ?></td>
      </tr>
      
      <tr>
        <th style="vertical-align: middle;" width="90" height="40"><?php echo $form['brand']->renderLabel('Marca') ?></th>
        <td height="40" style="vertical-align: middle;"><?php echo $form['brand']->render() ?></td>
      </tr>
      
      <tr>
        <th style="vertical-align: middle;" width="90" height="40"><?php echo $form['model']->renderLabel('Modelo') ?></th>
        <td height="40" style="vertical-align: middle;"><?php echo $form['model']->render() ?></td>
      </tr>
      
      <?php echo $form['_csrf_token']->render() ?>
    </tbody>
  </table>
</form>
