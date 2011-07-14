<?php use_helper('jQuery'); ?>

<div class="grid_10 suffix_1 omega">
  <div class="grid_10 alpha" style="border: 1px solid #a3a3a3;">
    <h3 style="margin:10px;">Productos</h3>

      <?php foreach ($products as $product): ?>
          <div style="margin:10px;">
              <div class="menu-title">
                  <p><a style="color:#fff;" href="<?php echo url_for('products/show?id='.$product->getId()) ?>"><?php echo $product->getName() ?></a></p>
              </div>
              
              <div class="container">
                <table style="margin-bottom:0px;">
                  <tr>
                    <td><?php echo image_tag($product->getPicture(),'size=124x124 style="margin:10px;border:1px solid #a3a3a3;"') ?></td>
                    <td>
                      <p>
                        <?php echo $product->getDescription() ?><br>
                        <?php echo $product->getBrand() ?> <?php echo $product->getModel() ?>
                        <br><a href="<?php echo url_for('products/show?id='.$product->getId()) ?>">Ver m&aacute;s</a> &nbsp; &mdash; &nbsp; 
                            <a href="<?php echo $product->getLink(); ?>">P&aacute;gina oficial</a> 
                      </p>
                      
                      <p style="margin:0px;">
                        <?php  if($product->usuarioHasWantedProduct($sf_user->getGuardUser()->getId()))
                                  echo jq_link_to_remote('Ya no lo quiero', 
                                    array('url'   => 'wantlist/remove?id='.$product->getId()
                                    ));
                                else 
                                  echo jq_link_to_remote('Lo quiero', array('url'=> 'wantlist/add?id='.$product->getId()));
                          ?>   &mdash;
                          <?php echo link_to_unless($product->usuarioHasProduct($sf_user->getGuardUser()->getId()),
                                      'Lo tengo', 'have_list/add?id='.$product->getId()); 
                          ?>
                      </p>
                    </td>
                  </tr>
                </table>
                
              </div>
        </div>
            <?php endforeach; ?>

        <a href="<?php echo url_for('products/new') ?>">New</a>
      
  </div>
</div>
