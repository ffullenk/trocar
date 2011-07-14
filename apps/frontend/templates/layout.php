<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
  <link rel="shortcut icon" href="/favicon.ico" />
  <?php include_stylesheets() ?>
  <?php include_javascripts() ?>
    
</head>
<body>
  <div id="fb-root"></div>
  <script>
    FB.init({
      appId  : '179663705425430',
      status : true, 
      cookie : true, 
      xfbml  : true  
    });
    
    FB.Event.subscribe('auth.sessionChange', function(response) {
      if (response.session) {
        // el usuario esta logeado, se procesa su login en la plataforma
        window.location="<?php echo url_for('@facebook_connect',true); ?>";
      } else {
        // no hay sesion de facebook, retornar al home
        window.location="<?php echo url_for('@sf_guard_signout',true); ?>";
      }
    });
  </script>
  
  <script type="text/javascript">
    $(document).ready(function(){
        $('#isesion').click(function(){
          if ($("#login").is(":hidden")){
            $("#login").slideDown("slow");
          }
          else{
            $("#login").slideUp("slow");
          }
        });        
    })
  </script>

  
  <div class="container_16">
    <div class="grid_16 alpha omega">
      <div class="grid_8 alpha">
        <div id="social-menu">
          <ul>
            <li><a href="http://www.facebook.com/pages/trocarcl/125428490873626"><?php echo image_tag('facebook.png');?></a></li>
            <li><a href="http://www.twitter.com/trocarcl"><?php echo image_tag('twitter.png');?></a></li>
            <li><?php echo image_tag('rss.png');?></li>
          </ul>
          <iframe src="http://www.facebook.com/plugins/like.php?app_id=241244122553572&amp;href=http%3A%2F%2Fwww.trocar.cl&amp;send=false&amp;layout=standard&amp;width=220&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:280px; height:30px;float:left;padding-top:4px;" allowTransparency="true"></iframe>
        </div>
      </div>
  
    <?php use_helper('I18N') ?>
    <?php if (!$sf_user->isAuthenticated()): ?>
      <div class="grid_8 omega" style="padding-top:6px;">
        <div id="social-menu">
          <ul>
            <li>Bienvenido!</li>
          </ul>
        </div>
        
        <div class="left"><fb:login-button perms="email"></fb:login-button></div>
    
        <div id="social-menu" class="left">
          <ul>
            <li><?php echo link_to('REGISTRARSE', 'register/index');?></li>
            <li>|</li>
            <li><a href="#" id="isesion">INICIAR SESI&Oacute;N</a></li>
          </ul>
        </div>
      </div>
      
      <div id="login" style="z-index:50000;position:absolute;top: 30px;left:650px;float:right;border: solid 1px #a2a2a2;background: #fff;display:none;">
        <?php echo get_partial('sfGuardAuth/signin_form', array('form' => new sfGuardFormSignin())); ?>
      </div>
      <?php endif ?>
      
      <?php if ($sf_user->isAuthenticated()): ?>
        <div class="grid_8 omega" style="padding-top:6px;">
        <div id="social-menu">
          <ul>
            <li>Bienvenido! 
            <b><?php
              $name = $sf_user->getProfile()->getFirstName(); 
              echo isset($name) ? $name : $sf_user->getUsername(); ?>
            </b>
            </li>
          </ul>
        </div>
    
        <div id="social-menu" class="left">
          <ul>
            <li><?php echo link_to('Tu WantList', 'wantlist/index'); ?></li>
            <li>&nbsp;</li>
            <li>&nbsp;</li>
            <li><?php echo link_to('SALIR','@sf_guard_signout'); ?></li>
          </ul>
        </div>
      </div>
      <?php endif ?>
  
    </div>
   
    <div class="clear" style="margin:20px;"></div>
    
    <div class="grid_16 alpha omega">
      <?php echo image_tag('cinta-logo.png');?>
    </div>
    
    <div class="clear" style="margin:10px;"></div>
    
    <div class="grid_1 alpha"><p>&nbsp;</p></div>
    
    <div class="grid_8">
      <form>
        <input type="text" name="buscar" size="50">
      </form>
    </div>
    
    <div class="grid_3">
      <form>
        <select name="buscar">
          <option>Todas las categorias</option>
          <option>Electronica</option>
          <option>blablabla</option>
        </select>
      </form>
    </div>
    
    <div class="grid_2">
      <form>
        <input type="submit" name="buscar" id="submit" value="BUSCAR">
      </form>
    </div>
    
    <div class="grid_2 omega"><p>&nbsp;</p></div>
    
    <!-- Menu lateral -->
    <div class="grid_1 second-line alpha"></div>
   
    <div class="grid_4">
      
      <div class="grid_4 alpha menu-title">
        <p>Menu principal</p>
      </div>
       
      <div class="grid_4 alpha container" id="sidebar">
         
        <div>
          <?php echo image_tag('catalogo.png','class="sidebar-image"');?>
          <p class="sidebar-text">
            <b>Catalogo</b><br><br>
            <span>Revisa todos los articulos a tu disposici&oacute;n</span>
          </p>
        </div>
        <?php echo image_tag('lines.png');?>
         
        <div>
          <?php echo image_tag('libros.png','class="sidebar-image"');?>
          <p class="sidebar-text">
            <b>Libros</b><br><br>
            <span>Buscas libros o deseas intercambiar alguno</span>
          </p>
        </div>
        <?php echo image_tag('lines.png');?>
         
        <div>
          <?php echo image_tag('musica.png','class="sidebar-image"');?>
          <p class="sidebar-text">
            <b>M&uacute;sica</b><br><br>
            <span>Intercambia tu m&uacute;sica favorita mediante trocar</span>
          </p>
        </div>
        <?php echo image_tag('lines.png');?>
         
        <div>
          <?php echo image_tag('peliculas.png','class="sidebar-image"');?>
          <p class="sidebar-text">
            <b>Pel&iacute;culas</b><br><br>
            <span>Busca e intercambia todo el cine que desees</span>
          </p>
        </div>
         
      </div>
       
    </div>
      
      
    <?php echo $sf_content ?>
      
    <div class="clear" style="margin:15px;"></div>
    
    <div class="grid_16 alpha omega" id="footer"><p></p></div>
    
  </div>

</body>
</html>
