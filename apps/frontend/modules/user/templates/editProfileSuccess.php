<h1>Editar perfil</h1>

<?php echo $form->renderFormTag(url_for('user/editProfile'), array('name' => 'edit_form')); ?>
  <table>
    <?php echo $form;?>
  </table>

  <input type="submit" name="editar" value="Editar datos" />
 </form>
