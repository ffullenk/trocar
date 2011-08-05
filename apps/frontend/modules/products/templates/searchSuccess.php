<?php echo $products->count() ?>

<div id="products">
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
                      
                      
                      <div id="flash2"></div>
                      <div id="wantlist" style="width:100%;">
                      <?php
                      if($product->usuarioHasWantedProduct($sf_user->getGuardUser()->getId())){
                      	?>
                      			<a href="#" onclick="javascript:wantlist(<?php echo $product->getId() ?>,true)">Ya no lo quiero</a>
                           	 <?php  
                                 } else{ 
                      			?>
                      			<a href="#" onclick="javascript:wantlist(<?php echo $product->getId() ?>,false)">Lo quiero</a>
                              <?php  
                                 }
                      ?> 
                      </div>
                                   
                      &mdash;
                          
                          
                          
                          
                          
                          <?php echo link_to_unless($product->usuarioHasProduct($sf_user->getGuardUser()->getId()),
                                      'Lo tengo', 'have_list/add?id='.$product->getId()); 
                          ?>
                    
                    
                    
                    
                    
                    
                    </td>
                  </tr>
                </table>
                
              </div>
        </div>
            <?php endforeach; ?>



 
</div>