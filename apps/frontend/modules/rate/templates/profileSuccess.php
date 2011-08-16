
nombre: <?php echo $nombreUsuario?><br>
numero de intercambios: <?php echo $numIntercambios?> <br>
miembro desde: <?php echo gmstrftime('%Y-%m-%d', $fechaRegistro); ?><br>
reputacion: <?php echo $reputation?><br>



Feedback recibido:
<br>
<?php

	foreach($rated as $r){
		?>
		Comentario: <?php echo $r->getText() ?>
		<br>
		De:  <?php echo $r->getUserRaterId() ?>
		<br>
		Satisfaccion:  <?php echo $r->getSatisfaction()?>
		<?php
	}
	?>

<div>
<div>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
<tr>
<td width="100%" style="padding-top:5px;padding-bottom:10px;">
<span class="titleMainParenYukon" style="font-family:Trebuchet Ms; color:#333; font-size:16px; font-weight:bold">feedback reciente</span> <span class="titleParenYukon" style="font-family:Verdana; color:#333; font-size:10px;">(last 12 months)</span>
</td><td valign="top" align="right" class="helpBtnYukon" style="padding-top:5px;padding-bottom:5px;">
<div class="bubblePosn" style="text-align:left;display:inline">
<span style="text-align:left;display:inline">
<a href="javascript:;" id="BUBbubble_1av4-21" class="bh-La">

<b class="bh-hlp"></b>
</a><div style="display:none">
<div id="cnbubble_1av4-21_oly" class="bh-pad">
<div class="bh-bcnt">
<div>This table shows the number of positive, neutral, and negative overall Feedback ratings the member has received in the last 12 months.</div>
</div>
<div class="bh-fc"><div>
<div class="lb-w">
<b class="hl-nv lb-bo">
<a href="http://pages.ebay.com/help/feedback/contextual/recent-feedback-ratings.html" target="HelpWindow" onclick="return window.open(this.href,this.target,'toolbar=no, menubar=no, status=0,height=500,width=500,scrollbars=yes'); return false">More help<b class="g-hdn">&nbsp;about Feedback Rating- opens in a new window or tab</b></a></b></div></div></div><b id="bubble_1av4-21_olyARROW" class="bh-hc_lb"></b></div></div><div id="bubble_1av4-21_olyOly_Outer" class="g-hdn" style="visibility : hidden;width:300px"><div id="cnbubble_1av4-21_oly"><div></div><a id="bubble_1av4-21_oly_stA" href="javascript:;" class="g-hdn">BubbleHelp Opens Start of layer</a><a id="bubble_1av4-21_oly_enA" href="javascript:;" class="g-hdn">BubbleHelp End of layer</a></div></div></span></div></td></tr></tbody></table><div><div><table border="0" cellpadding="0" cellspacing="0" width="100%" class="fbsContent"><tbody><tr bgcolor="#EFEFEF" class="rfMainBorderYukon"><th colspan="1" valign="top" width="30%">&nbsp;</th><th align="right" valign="top" class="fbsSubtitles">1 month</th><th align="right" valign="top" class="fbsSubtitles">6 months</th><th align="right" valign="top" class="fbsSubtitles">12 months</th><th valign="middle" width="2%"><img src="http://q.ebaystatic.com/aw/pics/s.gif" width="1" alt=""></th></tr></tbody></table><div class="frp"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr class="fbsSmallYukon"><td valign="middle" width="5%"><img alt="Positive feedback rating" src="http://q.ebaystatic.com/aw/pics/icon/iconPos_16x16.gif" width="16px"></td><td valign="top" width="16%" class="fbsNormal">Positive</td><td id="RFRId" align="right" valign="middle" width="20%"><span class="fbsNeutralYukon">0</span></td><td id="RFRId" align="right" valign="middle" width="20%"><a href="http://feedback.ebay.com/ws/eBayISAPI.dll?ViewFeedback2&amp;userid=john_fullenkamp&amp;iid=-1&amp;de=off&amp;items=25&amp;which=positive&amp;interval=180" class="fbsNeutralYukon" id="RFRId" _sp="p3692.c30.m151.l1580;positive_180">2</a></td><td id="RFRId" align="right" valign="middle" width="20%"><a href="http://feedback.ebay.com/ws/eBayISAPI.dll?ViewFeedback2&amp;userid=john_fullenkamp&amp;iid=-1&amp;de=off&amp;items=25&amp;which=positive&amp;interval=365" class="fbsNeutralYukon" id="RFRId" _sp="p3692.c30.m151.l1580;positive_365">2</a></td></tr><tr class="fbsSmallYukon"><td valign="middle" width="5%"><img alt="Neutral feedback rating" src="http://p.ebaystatic.com/aw/pics/icon/iconNeu_16x16.gif" width="16px"></td><td valign="top" width="16%" class="fbsNormal">Neutral</td><td id="RFRId" align="right" valign="middle" width="20%"><span class="fbsNeutralYukon">0</span></td><td id="RFRId" align="right" valign="middle" width="20%"><span class="fbsNeutralYukon">0</span></td><td id="RFRId" align="right" valign="middle" width="20%"><span class="fbsNeutralYukon">0</span></td></tr><tr class="fbsSmallYukon"><td valign="middle" width="5%"><img alt="Negative feedback rating" src="http://q.ebaystatic.com/aw/pics/icon/iconNeg_16x16.gif" width="16px"></td><td valign="top" width="16%" class="fbsNormal">Negative</td><td id="RFRId" align="right" valign="middle" width="20%"><span class="fbsNeutralYukon">0</span></td><td id="RFRId" align="right" valign="middle" width="20%"><span class="fbsNeutralYukon">0</span></td><td id="RFRId" align="right" valign="middle" width="20%"><span class="fbsNeutralYukon">0</span></td></tr></tbody></table></div></div></div></div></div>