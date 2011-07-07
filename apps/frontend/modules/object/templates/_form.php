<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_helper('jQuery') ?>

<script type="text/javascript" >
var hiden = false;
function showorhide(){
	if (hiden == false ){
	  $("#hidden_fields").removeClass("hide");
	  $("#hide_button").text('-');
	}
	else{
	  $("#hidden_fields").addClass("hide");
	  $("#hide_button").text('+');
	}
	hiden = !hiden;
}
</script>

<form action="<?php echo url_for('object/'.($form->getObject()->isNew() ? 'create?hid='.$sf_request->getParameter('hid') : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <tr>
      <td><?php echo $form['detail']->renderLabel('Descripcion:');?>
      <td><?php echo $form['detail']->render(); ?></td>
      </tr>
      <tr>
      <td><?php echo $form['status']->renderLabel('Estado:');?>
      <td><?php echo $form['status']->render();; ?></td>
      </tr>
      <tr><td>
      Detalles <a id="hide_button" href="#" onclick="showorhide(); return false;">+</a>
      </td></tr>
      <tr id="hidden_fields" class="hide">
      <td><?php echo $form['weight']->renderLabel('Peso:');?>
      <?php echo $form['weight']->render();?></td>
      <td><?php echo $form['height']->renderLabel('Alto:');?>
      <?php echo $form['height']->render();?></td>
      <td><?php echo $form['width']->renderLabel('Ancho:');?>
      <?php echo $form['width']->render();?></td>
      <td><?php echo $form['lenght']->renderLabel('Largo:');?>
      <?php echo $form['lenght']->render();?></td>
      <td><?php echo $form['color']->renderLabel('color:');?>
      <?php echo $form['color']->render();?></td>
      </tr>
      <?php echo $form->renderHiddenFields(); ?>
    </tbody>
  </table>
</form>
