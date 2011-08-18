<div class="grid_10 suffix_1 omega">
  <div class="grid_10 alpha" style="border: 1px solid #a3a3a3;">
    <h3 style="margin:10px;">Lo que puedes obtener</h3>
    <div class="container">
    <table style="margin-bottom:0px;">
    <?php for ($i = 0; $i < $haves->count(); $i++): ?>
    <tr style="border-bottom:1px solid #a3a3a3;">
    <td colspan="2"><?php echo image_tag($haves[$i]->getProduct()->getPicture(),'size=50x50 style="margin:3px;border:1px solid #a3a3a3;"') ?></td>
    <td colspan="2"><?php echo $haves[$i]->getProduct()->getName()?></td>
    <td width="10%"><a href="<?php echo url_for('products/show?id='.$haves[$i]->getProduct()->getId()) ?>">Ver m&aacute;s</a></td>
    <?php $productId = $haves[$i]->getProductId()?>
    </tr>
    <?php while ( $haves[$i]->getProductId() == $productId ):?>
    <tr>
    <td width="10%"><?php echo $haves[$i]->getObject()->getStatus() ?></td>
    <td width="10%"><?php echo $haves[$i]->getUser()->getUsername()?></td>
    <td width="30%"><?php echo $haves[$i]->getUser()->getProfile()->getAddress()?></td>
    <td width="10%"><?php echo link_to('Mas Informacion','oferto/show?id='.$haves[$i]->getId())?></td>
    <td width="10%"><?php echo link_to('Obtener','intercambio/confirm?fid='.$youhave->getId().'&tid='.$haves[$i]->getId())?></td>
    </tr>
    <?php $i++; 
          if ($i == $haves->count()) break;?>
    <?php endwhile;?>
    <?php endfor;?>
    </table>
    </div>
  </div>  
</div>
