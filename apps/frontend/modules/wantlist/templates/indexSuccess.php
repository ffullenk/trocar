<div class="grid_10 suffix_1 omega">

  <div style="width:100%;border:1px solid #6a6a6a;">
    <h4 style="color:#044D70;margin:10px;margin-bottom:0px;">Tu wantlist</h4>
    <p style="margin:10px;margin-top:0px;padding-top:0px;padding-bottom:0px;">Estos son los productos que tu deseas tener, nosotros nos encargaremos
    de ofrecerte intercambios entre otros usuarios que tengan estos productos
    y que deseen alguno de los productos que tu posees.</p>
  </div>
  
  <div class="clear" style="margin:10px;"></div>
  
  <?php foreach ($wantlist as $want): ?>
    <?php $product = $want->getProduct()?>
    <div class="grid_2 alpha" style="border:1px solid #6a6a6a;">
      <p style="text-align:center;margin-bottom:0px;">
        <a href="<?php echo url_for('products/show?id='.$product->getId()) ?>" style="font-size:16px;"><b><?php echo $product->getName() ?></b></a><br/>
        <?php echo image_tag($product->getPicture(),'size=60x60 style="margin:5px;margin-bottom:10px;"') ?><br/>
        <?php  if($product->usuarioHasWantedProduct($sf_user->getGuardUser()->getId()))
                    echo jq_link_to_remote('Remover de WantList', array(
                      'url'=> 'wantlist/remove?id='.$product->getId()),
                      array('style' => ''
                    ));
          ?>
      </p>
    </div>
  <?php endforeach; ?>

</div>
