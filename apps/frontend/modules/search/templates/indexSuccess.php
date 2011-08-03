<div class="grid_10 suffix_1 omega">

  <div style="width:100%;border:1px solid #6a6a6a;">
    <h4 style="color:#044D70;margin:10px;margin-bottom:0px;">Resultados de la b&uacute;squeda</h4>
    <p style="margin:10px;margin-top:0px;padding-top:0px;padding-bottom:0px;">
      Para los productos listados a continuaci&oacute;n tienes la posibilidad de 
      agregarlos ya sea a tu wantlist o a tu havelist, de esta forma nosotros te
      informaremos de intercambios que te sean favorables.</p>
  </div>
  
  <div class="clear" style="margin:10px;"></div>

  <?php 
    if($type == 'books' && !$sf_user->hasFlash('resultados')){
      $cant = 1;
      foreach($books as $book): ?>
        <div class="grid_3" style="border:1px solid #6a6a6a;height:340px;">
          <p style="text-align:center;margin-bottom:0px;">
            <a href="#" style="font-size:16px;">
            <b><?php echo $book->getName();?> &mdash; <?php	echo $book->printAuthors();?></b>
            </a>
          <?php 
            echo image_tag($book->getThumbnail(),'style="margin:5px;margin-bottom:10px;"');
          ?>
          Remover de wantlist
          </p>
        </div>
        
        <?php if($cant % 3 == 0){ ?>
          <div class="clear" style="margin:10px;"></div>
        
			<?php
        }
      $cant++;
      endforeach;
    }
    elseif($type == 'music' && !$sf_user->hasFlash('resultados')){
       $cant = 1;
       foreach($albums as $album): ?>
          <div class="grid_3" style="border:1px solid #6a6a6a;height:260px;">
          <p style="text-align:center;margin-bottom:0px;">
            <a href="#" style="font-size:16px;">
            <b><?php echo $album['artist'];?> &mdash; <?php	echo $album['name'];?></b>
            </a>
          <?php 
            echo image_tag($album['image'][2]['#text'],'size=126x126 style="margin:5px;margin-bottom:10px;"');
          ?>
          Remover de wantlist
          </p>
        </div>
        
        <?php if($cant % 3 == 0){ ?>
          <div class="clear" style="margin:10px;"></div>
          
        <?php }
          $cant++;
        endforeach;
    }
    elseif($type == 'movies' && !$sf_user->hasFlash('resultados')){
       $cant = 1;
       foreach($movies as $movie): ?>
          <div class="grid_3" style="border:1px solid #6a6a6a;height:300px;">
          <p style="text-align:center;margin-bottom:0px;">
            <a href="#" style="font-size:16px;">
            <b><?php echo $movie['title'];?> &mdash; <?php	echo $movie['year'];?></b>
            </a>
          <?php 
            echo image_tag($movie['posters']['profile'],'size=120x177 style="margin:5px;margin-bottom:10px;"');
          ?>
          Remover de wantlist
          </p>
        </div>
          
          <?php if($cant % 3 == 0){ ?>
          <div class="clear" style="margin:10px;"></div>
          
        <?php }
            $cant++;
          endforeach;
    }else{
      echo $sf_user->getFlash('resultados');
    } ?>
</div>
