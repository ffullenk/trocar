<div class="grid_10 suffix_1 omega">
  <div class="grid_10 alpha" style="border: 1px solid #a3a3a3;">
     <h3 style="margin:10px;"> Confirma el ofrecimiento de intercambio </h3>
     <div class="container">
     <table style="margin-bottom:0px;">
     <tr>
     <td style="width:300px;">Lo que tu entregas</td>
     <td>Lo que recibes </td>
     <tr>
     <td><?php echo image_tag($yourhave->getProduct()->getPicture(),'size=124x124 style="margin:3px;border:1px solid #a3a3a3;"')?></td>
     <td><?php echo image_tag($wanthave->getProduct()->getPicture(),'size=124x124 style="margin:3px;border:1px solid #a3a3a3;"')?></td>
     </tr>
     <tr>
     <td><?php echo $yourhave->getProduct()->getName() ?></td>
     <td><?php echo $wanthave->getProduct()->getName() ?> </td>
     </tr>
     <tr>
     <td>estado: <?php echo $yourhave->getObject()->getStatus()?></td>
     <td>estado: <?php echo $wanthave->getObject()->getStatus()?></td>
     </tr>
     </table>
     <table>
     <tr><td><p>
     <strong> Informacion de Envio </strong></br>
     Esta información será enviada al otro usuario, para completar la transacción</br>
     Nombre: <?php echo $sf_user->getProfile()->getFirstName().' '.$sf_user->getProfile()->getLastName()?></br>
     Direccion: <?php echo $sf_user->getProfile()->getAddress() ?></br>
     <?php echo link_to('Confirmar Intercambio','intercambio/create?fid='.$yourhave->getId().'&tid='.$wanthave->getId())?></br>
     </p></td>
     </table>
     </div>
</div>