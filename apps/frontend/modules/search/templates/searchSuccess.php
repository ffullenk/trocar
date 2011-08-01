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
      foreach($books as $book){
				echo $book['volumeInfo']['title'].' - ';
				if(isset($book['volumeInfo']['authors'])){
					foreach($book['volumeInfo']['authors'] as $author){
						echo $author.',';
					}
				}
				if(isset($book['volumeInfo']['imageLinks']['thumbnail']))
					echo '<img src="'.$book['volumeInfo']['imageLinks']['thumbnail'].'"/>';
				echo "<br>";
			}
    }
    elseif($type == 'music' && !$sf_user->hasFlash('resultados')){
       foreach($albums as $album){
          echo $album['artist']. ' - '.$album['name'];
          echo '<img src="'.$album['image'][1]['#text'].'"><br>';
        }
    }
    elseif($type == 'movies' && !$sf_user->hasFlash('resultados')){
       foreach($movies as $movie){
          echo $movie['title']. ' - '.$movie['year'].'<br>';
        }
    }else{
      echo $sf_user->getFlash('resultados');
    } ?>
</div>
