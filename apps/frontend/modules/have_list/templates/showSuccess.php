<?php use_helper('jQuery')?>
<?php use_javascript('jquery.jcarousel.min.js')?>
<?php use_stylesheet('skins/ie7/skin.css')?>
<?php use_javascript('thickbox.js')?>
<?php use_stylesheet('thickbox.css')?>

<style type="text/css">
.jcarousel-skin-ie7 .jcarousel-container-horizontal {
    width: 400px;
}

.jcarousel-skin-ie7 .jcarousel-clip-horizontal {
    width: 400px;
}
</style>

<script type="text/javascript">
var carousel_itemList = [
                         {url: "http://static.flickr.com/66/199481236_dc98b5abb3_s.jpg", title: "Flower1"},
                         {url: "http://static.flickr.com/75/199481072_b4a0d09597_s.jpg", title: "Flower2"},
                         {url: "http://static.flickr.com/57/199481087_33ae73a8de_s.jpg", title: "Flower3"},
                         {url: "http://static.flickr.com/77/199481108_4359e6b971_s.jpg", title: "Flower4"},
                         {url: "http://static.flickr.com/58/199481143_3c148d9dd3_s.jpg", title: "Flower5"},
                         {url: "http://static.flickr.com/72/199481203_ad4cdcf109_s.jpg", title: "Flower6"},
                         {url: "http://static.flickr.com/58/199481218_264ce20da0_s.jpg", title: "Flower7"},
                         {url: "http://static.flickr.com/69/199481255_fdfe885f87_s.jpg", title: "Flower8"},
                         {url: "http://static.flickr.com/60/199480111_87d4cb3e38_s.jpg", title: "Flower9"},
                         {url: "http://static.flickr.com/70/229228324_08223b70fa_s.jpg", title: "Flower10"}
                     ];
function carousel_itemLoadCallback(carousel, state)
{
	for (var i = carousel.first; i <= carousel.last; i++) {
		if (carousel.has(i)){
			continue;
		}
		if (i > carousel_itemList.length){
			break;
		}
		var item = jQuery(carousel_getItemHTML(carousel_itemList[i-1])).get(0);
		//thickbox init
		tb_init(item);

		carousel.add(i, item);
	}
};

function carousel_getItemHTML(item)
{
	var url_m = item.url.replace(/_s.jpg/g,'_m.jpg');
	return '<a href="' + url_m + '" title="' + item.title + '"><img src="' + item.url + '"width="75" height="75" border="0" alt="' + item.title + '" /></a>'; 
};

jQuery(document).ready(function() {
	jQuery('#carousel').jcarousel({
		size: carousel_itemList.length,
		visible: 5,
		itemLoadCallback: {onBeforeAnimation: carousel_itemLoadCallback}
	});

});
                        
</script>                      

<div class="suffix_1 omega">
  <div class="alpha">
    <h3 style="margin:10px;"> Informacion del producto </h3>
    <div style="margin:10px;">
      
      <div >
        <table style="width:500px">
          <tr>
            <td><?php echo image_tag($have_list->getProduct()->getPicture(), 'size=124x124 style="margin:10px; border:1px solid #a3a3a3;"')?></td>
            <td style="padding-right:30px">
             <p>
               <?php echo $have_list->getProduct()->getName() ?><br>
               <?php echo $have_list->getProduct()->getDescription() ?><br>
               Marca: &nbsp;&nbsp;<?php echo $have_list->getProduct()->getBrand()?><br>
               Modelo: &nbsp;&nbsp;<?php echo $have_list->getProduct()->getModel()?>
             </p>
             </td>
             <td>
               <p>
               Estado: &nbsp;&nbsp; <?php echo $have_list->getObject()->getStatus() ?><br>
               Detalle: &nbsp;&nbsp; <?php echo $have_list->getObject()->getDetail() ?><br>
               Otra Informacion: <br>
               <?php if(!is_null($have_list->getObject()->getWeight())) echo 'Peso: '.$have_list->getObject()->getWeight()?><br>
               <?php if(!is_null($have_list->getObject()->getWidth()))  echo 'Largo: '.$have_list->getObject()->getWidth()?><br>
               <?php if(!is_null($have_list->getObject()->getHeight())) echo 'Ancho: '.$have_list->getObject()->getHeight()?><br>
               <?php if(!is_null($have_list->getObject()->getColor()))  echo 'Color: '.$have_list->getObject()->getColor()?><br>
               <?php if(!is_null($have_list->getObject()->getLenght())) echo 'Medida: '.$have_list->getObject()->getLenght()?><br>
               </p>
             </td>
             </tr>
             <tr>
               <td colspan="3" >
                 <ul id="carousel" class="jcarousel-skin-ie7">
                   <!-- The content will be dynamically loaded in here -->
                 </ul>
               </td>
             </tr>
             <tr>
                <td><?php echo link_to('Volver','oferto/index') ?></td>
             </tr>
         </table>
      </div>
    </div>
  </div>
</div>
