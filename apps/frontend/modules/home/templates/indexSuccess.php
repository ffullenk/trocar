<?php use_javascript('cloud-carousel.min.js') ?>
<script type="text/javascript">
$(document).ready(function(){	
	$('.info-tip').qtip({
	   content: {
	      attr: 'title'
	   },
	   style: {
	      width: 170
	   }
	});
	
	$("#carousel1").CloudCarousel(		
		{			
			xPos: 260,
			yPos: 40,
			buttonLeft: $("#left-but"),
			buttonRight: $("#right-but"),
			altBox: $("#alt-text")
		}
	);
});
</script>
<div class="grid_12">
  <div class="corner-all highlight-info" style="padding: 0 .7em;">
    <p>
      <span class="ui-icon ui-icon-info"></span>
      <strong>Bienvenido!</strong>
      <span id="highlight-phrase">Comienza a disfrutar de nuestros servicios agregando 
      productos a tu <a href="#" class="info-tip" 
      title="Tu want list es una lista donde puedes agregar todos los productos que desees tener mediante un intercambio con productos que ya poseas.">
      <b>Want</b></a> y <a href="#" class="info-tip" 
      title="Tu have list es blabla bla">
      <b>Have</b></a> list.</span>
    </p>		
  </div> 
</div>
	
<div class="grid_12 separator"></div>

<!-- first row -->
<div class="grid_4">
  <div class="content-title border-silver-diner">
    <h4>Como funciona</h4>		
  </div>
  
  <div class="content-data content-data-first-row">
    <ul class="arrow-list">
      <li>Dinos que productos quieres</li>
      <li>Ingresa a la plataforma los productos que tengas</li>
      <li>Nosotros nos encargaremos del resto</li>
    </ul>		
    <p id="como-funciona-p"><strong>As&iacute; de sencillo es usar trocar.cl!</strong></p>
  </div>
</div>

<div class="grid_4">
  <div class="content-title border-silver-diner">
    <h4>Tu Want List</h4>		
  </div>
  
  <div class="content-data content-data-first-row">
    <p class="sin-productos">
      <?php echo image_tag('attention.png','alt="Atencion"');?><br>
      Al parecer a&uacute;n no haz agregado ning&uacute;n producto a tu Want list.<br>
      <a href="#" class="info-tip" 
      title="Puedes encontrar productos utilizando el buscador en la parte superior de la p&aacute;gina o directamente desde el cat&aacute;logo.">
      Agregar Productos</a> &nbsp; - &nbsp;
      <a href="#">Ir al cat&aacute;logo</a>
    </p>
  </div>
</div>

<div class="grid_4">
  <div class="content-title border-silver-diner">
    <h4>Tu Have List</h4>		
  </div>
  
  <div class="content-data content-data-first-row">
    <p class="sin-productos">
      <?php echo image_tag('attention.png','alt="Atencion"');?><br>
      Al parecer a&uacute;n no haz agregado ning&uacute;n producto a tu Want list.<br>
      <a href="#" class="info-tip" 
      title="Puedes encontrar productos utilizando el buscador en la parte superior de la p&aacute;gina o directamente desde el cat&aacute;logo.">
      Agregar Productos</a> &nbsp; - &nbsp;
      <a href="#">Ir al cat&aacute;logo</a>
    </p>
  </div>
</div>
<!-- end first row -->

<div class="grid_12 separator"></div>

<!-- second row -->
<div class="grid_8" id="usas-facebook">
  <div class="corner-all other-info">
    <p> <span>¿Usas Facebook?</span>
      <?php echo image_tag('facebook_polaroid.png','alt="Usas facebook"');?>
      Trocar.cl posee una excelente integraci&oacute;n con esta red social, solo debes ingresar a la plataforma
      utilizando el inicio de sesi&oacute; con facebook y ya puedes hacer uso de todas las excelentes funcionalidades
      que hemos creado para ti. <strong>Algunas de ellas son:</strong><br>&nbsp;
    </p>
    <ul>
      <li><a href="#" class="info-tip" 
      title="Puedes recibir ofertas de intercambios seg&uacute;n tus gustos en m&uacute;sica, pel&iacute;culas, libros etc. que hallas agregado a tu perfil de facebook.">
      Reconocemos autom&aacute;ticamente tus gustos, por lo que recibiras ofertas que se adecuen a estos</a></li>
      <li><a href="#" class="info-tip" 
      title="Puedes comentar en nuestros productos, publicar ofertas y art&iacute;culos de tu Want y Have List en tu muro, conocer la actividad de tus amigos y mucho m&aacute;s.">
      Se a&uacute;n m&aacute;s social: comenta, intercambia y sigue lo que hacen tus amigos en trocar.cl</a></li>
      <li><a href="#" class="info-tip"
      title="Estamos trabajando arduamente para cada d&iacute;a ofrecer a ti y a tus amigos nuevos servicios.">
      Y mucho m&aacute;s...</a></li>
    </ul>		
  </div>
</div>

<div class="grid_4">
  <div class="content-title border-silver-diner">
    <h4>Art&iacute;culos recientes</h4>		
  </div>
  
  <div class="content-data" style="height:169px;">
    <p class="sin-productos">
      <?php echo image_tag('attention.png','alt="Atencion"');?><br>
      Al parecer a&uacute;n no haz agregado ning&uacute;n producto a tu Want list.<br>
      <a href="#" class="info-tip" 
      title="Puedes encontrar productos utilizando el buscador en la parte superior de la p&aacute;gina o directamente desde el cat&aacute;logo.">
      Agregar Productos</a> &nbsp; - &nbsp;
      <a href="#">Ir al cat&aacute;logo</a>
    </p>
  </div>
</div>
<!-- end second row -->

<div class="grid_12">
  <div id="prueba-como-funciona">
    <p><strong>Prueba como funciona!</strong>, agrega alguno de los siguientes 
    <a href="#" class="info-tip"
    title="O puedes usar el buscador en la parte superior de la p&aacute;gina para encontrar una gran cantidad de productos a elegir. Tambi&eacute;n puedes mirar nuestro cat&aacute;logo.">
    productos</a> a tu Want o Have list y vive la experiencia trocar.</p>
  </div>
  
  <div id="arrow-left">
    <input id="left-but"  type="image" src="images/left.png" value="Left">
  </div>
  
  <div id="carousel1">            
    <img class = "cloudcarousel" src="images/carousel/1.png" alt="Flag 1 Description">
    <img class = "cloudcarousel" src="images/carousel/2.png" alt="Flag 2 Description">
    <img class = "cloudcarousel" src="images/carousel/3.png" alt="Flag 3 Description">
    <img class = "cloudcarousel" src="images/carousel/4.png" alt="Flag 4 Description">
    <img class = "cloudcarousel" src="images/carousel/5.png" alt="Flag 4 Description">
    <img class = "cloudcarousel" src="images/carousel/6.png" alt="Flag 4 Description">
    <img class = "cloudcarousel" src="images/carousel/7.png" alt="Flag 4 Description">
    <img class = "cloudcarousel" src="images/carousel/8.png" alt="Flag 4 Description">
      </div>
      
      <div id="arrow-right">
    <input id="right-but" type="image" src="images/right.png" value="Right">
  </div>
</div>

<div class="grid_12 prefix_4">
        <p id="alt-text" style="text-align:center;padding-top:8px;"></p>
  </div>
  
  <div class="grid_12 separator"></div>
  
  <div class="grid_8 prefix_4">

      <div id="noticias">
    <p><strong>Noticias Trocar.cl</strong>.</p>
  </div>
  
  <div class="noticia">
    <h4>Titulo de la noticia</h4>
    <div class="imagen-noticia">
      <?php echo image_tag('facebook_polaroid.png','alt="imagen noticia"');?>
    </div>
    <div class="texto-noticia">
      <p>
        Texto de la noticia lads adsf kasdhfj asdakjdsf kafh asjdfh akdfh akfak hdsfhjas dhfkjasdf kasdf 
        asdfjasdf asdjsdfj aus d hola me nomrbe uansc  hola me llamo diego y esta es una noticia creada 
        para llenar espacio en el sitio t de trocar.cl. Siguiendo con todos los locos bla y una vez mas 
        todo esto es para llenar por todos lados no ma hola. <a href="#">Leer m&aacute;s...</a>				
      </p>
    </div>
    <div class="lines">
      <p>-----------------------------------------------------------------------------------------</p>
    </div>

  </div>
      
  <div class="noticia">
    <h4>Titulo de la noticia</h4>
    <div class="imagen-noticia">
      <?php echo image_tag('facebook_polaroid.png','alt="imagen noticia"');?>
    </div>
    <div class="texto-noticia">
      <p>
        Texto de la noticia lads adsf kasdhfj asdakjdsf kafh asjdfh akdfh akfak hdsfhjas dhfkjasdf kasdf 
        asdfjasdf asdjsdfj aus d hola me nomrbe uansc  hola me llamo diego y esta es una noticia creada 
        para llenar espacio en el sitio t de trocar.cl.  <a href="#">Leer m&aacute;s...</a>				
      </p>
    </div>
    <div class="lines">
      <p>-----------------------------------------------------------------------------------------</p>
    </div>

  </div>

  </div>
  
<div class="grid_4">
  <div class="content-title border-silver-diner">
    <h4>
      <?php echo image_tag('twitter_box.png','size=24x24 alt="twitter box" style="margin-right:5px;"');?>Twitter</h4>		
  </div>
  
  <div class="content-data">
    <div id="img-twitter-follow-us">
      <?php echo image_tag('twitter_trocar.jpg','alt="Siguenos en twitter"');?>
    </div>
    <div id="twitter-follow-us">
      Sigue a trocar.cl en Twitter!
    </div>
    
    <div class="tweet-box">
      <p>
        Tweet de prueba para el diseno de la pagina que se esta haciendo. Este es un tweet.
        <a href="#">15 min. atr&aacute;s</a><br>
        <span style="color:#CACACA;">-------------------------------------------------</span>
      </p>	
    </div>
    
    <div class="tweet-box">
      <p>
        Tweet de prueba para el diseno de la pagina que se esta haciendo. Este es un tweet.
        <a href="#">15 min. atr&aacute;s</a><br>
        <span style="color:#CACACA;">-------------------------------------------------</span>
      </p>	
    </div>
    
    <div class="tweet-box">
      <p>
        Tweet de prueba para el diseno de la pagina que se esta haciendo. Este es un tweet.
        <a href="#">15 min. atr&aacute;s</a><br>
        <span style="color:#CACACA;">-------------------------------------------------</span>
      </p>	
    </div>
  </div>
  
</div>
