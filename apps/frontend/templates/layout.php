<!DOCTYPE html>
<html>
<head>
  <?php use_javascript('search.js') ?>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
  <?php include_stylesheets() ?>
  <?php include_javascripts() ?>
  
<script type="text/javascript">
$(document).ready(function(){
	$('#menu-nav li').click(function(){
		$('.selected').removeClass('selected');
		$(this).addClass('selected');
		var selector = '#submenu-'+$(this).attr('id')+'-data';
		$(selector).fadeIn('slow').siblings().hide();
	});
});
</script>
</head>

<body>

<!-- header -->
<div class="container_16">
	<div id="header" class="grid_16">
		<ul id="menu-user">
			<li><a href="#">Home</a></li>
			<li><strong>LOGIN</strong></li>
		</ul>
		
		<ul id="menu-social">
			<li><a href="#"><?php echo image_tag('facebook.png','size=24x24 alt="facebook"');?></a></li>
			<li><a href="#"><?php echo image_tag('twitter.png','size=24x24 alt="twitter"');?></a></li>
			<li><a href="#"><?php echo image_tag('rss.png','size=24x24 alt="rss"');?></a></li>
		</ul>
	</div>
	
	<div class="grid_9 container-utils">
		<p id="logo"><?php echo image_tag('logo.png','alt="Trocar.cl"');?></p>
	</div>
	
	<div class="grid_7 container-utils">
		<?php echo image_tag('twitter_bird.png','id="twitter-bird" alt="Siguenos en twitter"');?>
    <?php echo image_tag('user.png','id="user-img" alt="Usuarios trocando"');?>
    <?php echo image_tag('testimonial.png','id="testimonial-img" alt="Danos tu opinion"');?>
	</div>
	
	<div class="grid_1 omega menu-nav-border"></div>
	
	<div class="grid_5 alpha omega">
		<ul id="menu-nav">
			<li class="selected" id="menu1">Want List</li>
			<li id="menu2">Have List</li>
			<li id="menu3" class="last-child">Intercambios</li>
		</ul>
		<div id="complete-border"></div>
	</div>
	
	<div class="grid_10 alpha menu-nav-border" style="width:610px;">
		<p>
			<a href="#">Siguenos en twitter</a>
			<a href="#" id="usuarios-trocando">25 usuarios trocando</a>
			<a href="#" id="dar-opinion">Danos tu opini&oacute;n</a>
		</p>
	</div>
	
	<div class="grid_16" id="submenu-nav">
		<div id="submenu-data">
			<ul id="submenu-menu1-data">
				<li>Agregar Productos</li>
				<li>Ver mis productos</li>
				<li>Explorar otros usuarios</li>
			</ul>
			
			<ul id="submenu-menu2-data">
				<li>Agregar productos</li>
				<li>Editar mi have list</li>
				<li>Explorar otros usuarios</li>
			</ul>
	
			<ul id="submenu-menu3-data">
				<li>En espera</li>
				<li>Realizados</li>
				<li>Posibles intercambios</li>
			</ul>
		</div>
		
		<form>
			<input type="text" name="param" style="width:300px;">
			<select>
				<option>Categorias</option>
			</select>
			<input type="submit" name="buscar" value="Buscar">
		</form>
	</div>
</div>
<!-- end header -->

<!-- content -->
<div class="container_16">
	<div class="grid_16 separator"></div>
  
  	<!-- Menu lateral -->
	<div class="grid_4">
	
		<div class="sidebar-title">
			<h3>M&aacute;s popular</h3>
		</div>
		
		<div class="sidebar-content">
		
			<div class="popular-element" id="element-first">
				<div class="popular-element-image">
          <?php echo image_tag('catalogo.png','id="img-first" alt="catalogo"');?>
				</div>
				<div class="popular-element-content">
					<h4 id="content-first">Cat&aacute;logo</h4>
					<p>Revisa todos los art&iacute;culos a tu disposici&oacute;n</p>
				</div>
			</div>
			
			<div class="lines"><p>-------------------------------------------</p></div>
			
			<div class="popular-element">
				<div class="popular-element-image">
					<?php echo image_tag('libros.png','alt="libros"');?>
				</div>
				<div class="popular-element-content">
					<h4>Cat&aacute;logo</h4>
					<p>Revisa todos los art&iacute;culos a tu disposici&oacute;n</p>
				</div>
			</div>
			
			<div class="lines"><p>-------------------------------------------</p></div>

			<div class="popular-element">
				<div class="popular-element-image">
          <?php echo image_tag('musica.png','alt="musica"');?>
				</div>
				<div class="popular-element-content">
					<h4>Cat&aacute;logo</h4>
					<p>Revisa todos los art&iacute;culos a tu disposici&oacute;n</p>
				</div>
			</div>
			
			<div class="lines"><p>-------------------------------------------</p></div>

			<div class="popular-element" id="element-last">
				<div class="popular-element-image">
          <?php echo image_tag('peliculas.png','alt="peliculas"');?>
				</div>
				<div class="popular-element-content">
					<h4>Cat&aacute;logo</h4>
					<p>Revisa todos los art&iacute;culos a tu disposici&oacute;n</p>
				</div>
			</div>

		</div>
		
		<div class="separator"></div>
		
		<div class="sidebar-title">
			<h3>Comunidad</h3>
		</div>
		
		<div class="sidebar-content">	
			<ul id="comunidad" class="arrow-list">
				<li><a href="#">Noticias</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">Grupos</a></li>
				<li><a href="#">Feedback</a></li>
			</ul>			
		</div>
		
		<div class="separator"></div>
		
		<div class="sidebar-title">
			<h3>Ayuda</h3>
		</div>
		
		<div class="sidebar-content">	
			<ul id="comunidad" class="arrow-list">
				<li><a href="#">FAQ</a></li>
				<li><a href="#">¿Como funciona?</a></li>
				<li><a href="#">Gu&iacute;a del usuario</a></li>
			</ul>			
		</div>

	</div>
	<!-- Fin Menu lateral -->
  
  <?php echo $sf_content ?>
  
</div>
<!-- fin footer -->

<!-- footer -->
<div class="container_16">
	 <div class="grid_16 separator"></div>
	<div id="footer" class="grid_16">
		<ul>
			<li><a href="#">dRIM</a></li>
			<li>|</li>
			<li><a href="#">Blog</a></li>
			<li>|</li>
			<li><a href="#">FAQ</a></li>
			<li>|</li>
			<li><a href="#">Gu&iacute;a del usuario</a></li>
			<li>|</li>
			<li><a href="#">Cont&aacute;ctanos</a></li>
			<li>|</li>
			<li><a href="#">Twitter</a></li>
			<li>|</li>
			<li><a href="#">Facebook</a></li>
			<li>|</li>
			<li><a href="#">Rss</a></li>
		</ul>
		<p style="text-align:center;">Copyright &copy; Trocar.cl 2011. Todos los derechos reservados.</p>
	</div>
</div>
<!-- fin footer -->

<form method="post" action="<?php echo url_for('search/index');?>">
<input type="text" name="query" size="50" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords"/>
<img id="loader" src="/images/loader.gif" style="vertical-align: middle; display: none" />
<select name="search_type">
<option value="books">Libros</option>
<option value="music">M&uacute;sica</option>
<option value="movies">Pel&iacute;culas</option>
<option value="movies">Otras categor&iacute;as...</option>
</select>
<input type="submit" name="enviar" id="submit" value="BUSCAR">
</form>

</body>
</html>
