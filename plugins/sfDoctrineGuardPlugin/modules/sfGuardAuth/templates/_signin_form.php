<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <table style="margin:10px;">
    <tbody>
      <tr>
        <th style="vertical-align: middle;" height="40" width="100"><?php echo $form['username']->renderLabel('Username') ?></th>
        <td height="40"><?php echo $form['username']->render() ?></td>
      </tr>
      <tr>
        <th height="40" style="vertical-align: middle;" width="100"><?php echo $form['password']->renderLabel('Password') ?></th>
        <td height="40"><?php echo $form['password']->render() ?></td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form['_csrf_token']->render() ?>
          <input style="margin:15px;margin-left:80px;" type="submit" value="<?php echo __('Login', null, 'sf_guard') ?>" />
          
          <?php $routes = $sf_context->getRouting()->getRoutes() ?>
          <?php if (isset($routes['sf_guard_forgot_password'])): ?>
            <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
          <?php endif; ?>

          <?php if (isset($routes['sf_guard_register'])): ?>
            &nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
          <?php endif; ?>
        </td>
      </tr>
    </tfoot>
  </table>
</form>
