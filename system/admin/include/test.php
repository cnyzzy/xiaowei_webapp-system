<?php
$Wx = new Wx();
	$arrWx = $Wx->  GetArticleTotal("2017-11-20");
	foreach ( $arrWx['list'] as $k => $arr ) {
$arrList=$arr['details'];
$arrA=end($arrList);;
$arrA['msgid']=$arr['msgid'];
$arrA['title']=$arr['title'];
$arrA['sendid']=($k+1);
	print_r($arrA);
}
