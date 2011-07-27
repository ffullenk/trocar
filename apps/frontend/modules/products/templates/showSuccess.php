<div class="grid_10 suffix_1 omega">
  <div class="menu-title">
      <p>Detalle de producto</p>
  </div>
  
  <div class="container" style="background:#fff;">  
      
      <div class="left" style="margin:15px;">
        <?php echo image_tag($product->getPicture(),'size=124x124') ?>
      </div>
      
      <div class="left" style="margin:15px;margin-left:10px;margin-bottom:0px;">
        <h3 style="margin-bottom:0px;"><?php echo $product->getName() ?></h3>
        <p style="margin-bottom:0px;"><?php echo $product->getDescription() ?></p>
        <p style="margin-bottom:0px;">
          Marca: <?php echo $product->getBrand() ?><br/>
          Modelo: <?php echo $product->getModel() ?>
        </p>
      </div>

      <hr style="margin-bottom:10px;" />
      
      <div style="margin-left:15px;">
        
        <div style="width:100%;">
          <?php  
            if($wantList)
              echo jq_link_to_remote('Ya no lo quiero', array('url'=> 'wantlist/remove?id='.$product->getId()));
            else 
              echo jq_link_to_remote('Lo quiero', array('url'=> 'wantlist/add?id='.$product->getId()));
          ?>

          &nbsp;
          <a href="<?php echo url_for('products/index') ?>">Volver al indice de productos</a>
        </div>

        <p style="margin-bottom:0px;">Usuarios que quieren este producto:</p>
          <ul style="margin-bottom:10px;">
          <?php 
            foreach ($product->getWantlist() as $want):
              echo '<li>'.$want->getUser()->getUsername().'</li>';
            endforeach;
          ?>
          </ul>
        
        
        <p style="margin-bottom:0px;">Usuarios que tienen este producto:</p>
          <ul style="margin-bottom:10px;">
          <?php 
            foreach ($product->getHavelist() as $have):
              echo '<li>'.$have->getUser()->getUsername().'</li>';
            endforeach;
          ?>
          </ul>
        
      </div>
  </div>
  
</div>
