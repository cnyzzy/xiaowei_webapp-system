<?php
IF(is_file(ZConfig.'/Public/wxre.php')){
$arrWxre = SetRead('/system/config/Public/wxre.php');
}ELSE{
	$Wx = new Wx();
	$arrWxre = $Wx-> GetReplyRule();
SetWrite($arrWxre ,'/system/config/Public/wxre.php');
}