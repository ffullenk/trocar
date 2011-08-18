<div class="grid_10 suffix_1 omega">

  <div style="width:100%;border:1px solid #6a6a6a;">
    <h4 style="color:#044D70;margin:10px;margin-bottom:0px;">Resultados de la b&uacute;squeda</h4>
    <p style="margin:10px;margin-top:0px;padding-top:0px;padding-bottom:0px;">
      Para los productos listados a continuaci&oacute;n tienes la posibilidad de 
      agregarlos ya sea a tu wantlist o a tu havelist, de esta forma nosotros te
      informaremos de intercambios que te sean favorables.</p>
  </div>
  
  <div class="clear" style="margin:10px;"></div>

   <div style="margin:10px;">    
     
	<?php foreach ($resultados as $product): ?>
     
          
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
                      if(method_exists($product, "usuarioHasWantedProduct") && $product->usuarioHasWantedProduct($sf_user->getGuardUser()->getId())){
                      	?>
                      			<a href="#" onclick="javascript:wantlist(<?php echo $product->getId() ?>,true)">Ya no lo quiero</a>
                           	 <?php  
                                 } else{ 
                      			?>
                      			<a href="#" onclick="javascript:wantlist(<?php echo $product->getId() ?>,false)">Lo quiero</a>
                              <?php  
                                 }
                      ?> 
                      </div>  </div>
                                   
                      &mdash;
                          
                          <?php echo link_to_unless($product->usuarioHasProduct($sf_user->getGuardUser()->getId()),
                                      'Lo tengo', 'oferto/add?id='.$product->getId()); 
                          ?>
                    
                    </td>
                  </tr>
                </table>
                
              </div>
      
            <?php endforeach; ?>



 
</div></div>
