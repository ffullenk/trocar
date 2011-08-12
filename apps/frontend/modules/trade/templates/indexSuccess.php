<div class="grid_10 suffix_1 omega">
  <div class="grid_10 alpha" style="border: 1px solid #a3a3a3;">
     <h3 style="margin:10px;"> Confirma el ofrecimiento de intercambio </h3>
     <div class="container">
     <table style="margin-bottom:0px;">
     <tr>
     <td style="width:300px;">Lo que tu entregas</td>
     <td>Lo que recibes </td>
     <?php foreach ($trades as $trade):?>
     <tr>
     <td><?php echo image_tag($trade->getHave_to()->getProduct()->getPicture(),'size=124x124 style="margin:3px;border:1px solid #a3a3a3;"')?></td>
     <td><?php echo image_tag($trade->getHave_from()->getProduct()->getPicture(),'size=124x124 style="margin:3px;border:1px solid #a3a3a3;"')?></td>
     </tr>
     <tr>
     <td><?php echo $trade->getHave_to()->getProduct()->getName() ?></td>
     <td><?php echo $trade->getHave_from()->getProduct()->getName() ?> </td>
     </tr>
     <tr>
     <td>estado: <?php echo $trade->getHave_to()->getObject()->getStatus()?></td>
     <td>estado: <?php echo $trade->getHave_from()->getObject()->getStatus()?></td>
     </tr>
     <tr><td> <?php echo link_to('Confirmar Intercambio','trade/accept?fid='.$trade->getHave_from()->getId().'&tid='.$trade->getHave_to()->getId())?></br></td>
     &nbsp;&nbsp;<td> <?php echo link_to('Rechazar Intercambio','trade/reject?fid='.$trade->getHave_from()->getId().'&tid='.$trade->getHave_to()->getId())?></br></td></tr>
     <?php endforeach; 	?>
     </table>
     <table>
     <tr><td><p>
     <strong> Informacion de Envio </strong></br>
     Esta información será enviada al otro usuario, para completar la transacción</br>
     Nombre: <?php echo $sf_user->getProfile()->getFirstName().' '.$sf_user->getProfile()->getLastName()?></br>
     Direccion: <?php echo $sf_user->getProfile()->getAddress() ?></br>
     </p></td>
     </table>
     </div>
</div>
