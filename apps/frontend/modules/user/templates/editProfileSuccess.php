  <div class="grid_10 suffix_1 omega">
  
  <div class="menu-title">
      <p>Editar perfil</p>
  </div>
  
  <div class="container">    
      
      <?php if($sf_user->hasFlash('edit')): ?>
        <?php echo $sf_user->getFlash('edit') ?>
      <?php endif; ?>
      
      <?php echo $form->renderFormTag(url_for('user/editProfile'), array('name' => 'edit_form')); ?>
      <table style="margin:10px;">
        <tr>
          <th style="vertical-align: middle;" width="90" height="40"><?php echo $form['first_name']->renderLabel('Nombre') ?></th>
          <td height="40" style="vertical-align: middle;"><?php echo $form['first_name']->render() ?></td>
        </tr>
        
        <tr>
          <th style="vertical-align: middle;" width="90" height="40"><?php echo $form['last_name']->renderLabel('Apellido') ?></th>
          <td height="40" style="vertical-align: middle;"><?php echo $form['last_name']->render() ?></td>
        </tr>
        
        <tr>
          <th style="vertical-align: middle;" width="90" height="40"><?php echo $form['address']->renderLabel('Direcci&oacute;n') ?></th>
          <td height="40" style="vertical-align: middle;"><?php echo $form['address']->render() ?></td>
        </tr>
        
        <tr>
          <th style="vertical-align: middle;" width="90" height="40">Avatar:</th>
          <td height="40" style="vertical-align: middle;">
            <?php echo image_tag('/uploads/avatars/'.$form['picture']->getValue(),'size=124x124') ?><br/>
            <input type="button" value="Cambiar imagen" id="cambiar-imagen"> 
            <p id="avatar" style="display:none;"><input id="<?php echo $form->getName().'_'.$form['picture']->getName(); ?>" type="file" 
            value="<?php echo $form['picture']->getValue();?>" name="<?php echo $form->getName().'['.$form['picture']->getName().']'; ?>">
            </p>
          </td>
        </tr>
      
        <?php echo $form['_csrf_token']->render() ?>
        
      </table>

      <p style="margin-left:130px;margin-bottom:10px;"><input type="submit" name="editar" value="Editar datos" /></p>
     </form>

  </div>
</div>
<script>
  $('#cambiar-imagen').click(function(){
    if($('#cambiar-imagen').val() == 'Cancelar'){
      $('#avatar').hide();
      $('#cambiar-imagen').val('Cambiar imagen');
    }
    else{
      $('#avatar').show();
      $('#cambiar-imagen').val('Cancelar');
    }
  });
</script>
