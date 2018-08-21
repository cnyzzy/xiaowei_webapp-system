<?php
$Wx = new Wx();
$openid=$_SESSION['zid']['openid'];
if(!empty($openid)){
	$arrWx = $Wx->GetUserInfo($openid);
	PRINT_r($arrWx);}