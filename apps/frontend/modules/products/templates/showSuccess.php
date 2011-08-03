<div class="grid_10 suffix_1 omega">
  <div class="menu-title">
      <p>Detalle de producto</p>
  </div>
  <div class="container" style="background:#fff;">  
    <a href="http://twitter.com/share" class="twitter-share-button" data-text="Míralo en Trocar.cl!" data-count="none" data-via="trocarcl" data-lang="es">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>  
     <g:plusone size="medium"></g:plusone>
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
        <div id="flash2"></div>
        <div id="wantlist" style="width:100%;">
          <?php  
            if($wantList){
			?>
			<a href="#" onclick="javascript:wantlist(<?php echo $product->getId() ?>,true)">Ya no lo quiero</a>
     	 <?php  
           } else{ 
			?>
			<a href="#" onclick="javascript:wantlist(<?php echo $product->getId() ?>,false)">Lo quiero</a>
        <?php  
           }
?>
          &nbsp;
          
        </div>
<a href="<?php echo url_for('products/index') ?>">Volver al indice de productos</a>
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
          
        <p style="margin-bottom:0px;">Reviews:</p>
         
			<div >
			<form action="#" method="post">
			<textarea id="review"></textarea><br />
			<input type="submit" class="submit" value=" Enviar review " />
			</form>
			</div>
			<div id="flash"></div>
			<ol class="box" id="update">
			</ol>
			
          <ul style="margin-bottom:10px;">
          <?php 
            foreach ($product->getReview() as $review):
				?>
				<li class="box">
					
				<?php echo $review->getUser()->getUsername() ?>
				<?php echo $review->getText()?><br />

				</li>
				<?php 
            endforeach;
          ?>
          </ul>
        
      </div>
  </div>
  
</div>


<script type="text/javascript" >
$(function() {
$(".submit").click(function() 
{
var review = $("#review").val();
var dataString = 'review='+ review + '&productid=' + <?php echo $product->getId() ?>;
$("#flash").show();
$("#flash").fadeIn(400).html('<img src="../../../../images/loader.gif" />Cargando comentario...');
$.ajax({
type: "POST",
url: '../../addreview',
data: dataString,
cache: false,
success: function(html){
$("ol#update").append(html);
$("ol#update li:last").fadeIn("slow");
$("#flash").hide();
}
});
return false;
}); });
</script>




<script type="text/javascript">
function wantlist(idproduct,valor) {
	
	if(valor){
		direccion= "../../../wantlist/remove"
	}
	else{
		direccion= "../../../wantlist/add"
	}
	var dataString = 'idproduct='+ idproduct;
	$("#flash2").show();
	$("#flash2").fadeIn(400).html('<img src="../../../../images/loader.gif" />Cargando...');
$.ajax({
type: "POST",
url: direccion,
data: dataString,

cache: false,

success: function(html) {
     $("#wantlist").html(html)
    .fadeIn(1500, function() {
    	 $("#flash2").hide("slow");
    });
    
  }
});

return false;
	}
</script> 

<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {lang: 'es-419'}
</script>
