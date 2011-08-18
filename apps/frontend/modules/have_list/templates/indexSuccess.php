<div class="grid_10 suffix_1 omega">
  <div class="grid_10 alpha">
    <h3 style="margin:10px;"> Lo que tienes </h3>
    
    <?php foreach ( $have_lists as $have_list): ?>
    <div style="margin:10px;">
      
      <div class="container">
        <table style="margin-bottom:0px">
          <tr>
            <td><?php echo image_tag($have_list->getProduct()->getPicture(), 'size=124x124 style="margin:10px; border:1px solid #a3a3a3;"')?></td>
            <td style="padding-right:30px">
             <p>
               <?php echo $have_list->getProduct()->getName() ?><br>
               <?php echo $have_list->getProduct()->getDescription() ?><br>
               Marca: &nbsp;&nbsp;<?php echo $have_list->getProduct()->getBrand()?><br>
               Modelo: &nbsp;&nbsp;<?php echo $have_list->getProduct()->getModel()?>
             </p>
             <p style="margin-bottom:1px">
               <?php echo link_to('Ver mas', 'oferto/show?id='.$have_list->getId())?><br>
               <?php echo link_to('Editar/Eliminar', 'oferto/edit?id='.$have_list->getId()) ?><br>
               <?php echo link_to('Intercambiar', 'oferto/swaplist?id='.$have_list->getId()) ?>	
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
         </table>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
