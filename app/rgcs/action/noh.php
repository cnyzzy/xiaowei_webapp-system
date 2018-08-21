<?php
empty($params[0]) ? $LId = '1' : $LId = $params[0];

 if(isset($_GET['url'])){
	 $url=$_GET['url'];
	 $domain=parse_url( $url);
	 if(strpos($domain['host'],'yctu.edu.cn')==false)$url=$arrInfo['url'];
 if(is_weixin()||is_qq()||is_tim()||is_wb())
{header("Location:". $url);
exit;}
 }else{
	$url=$arrInfo['url'].'/rgcs'; 
	 
 }

IF($LId == 'ok'){
	if(empty($_SESSION['wx']['openid'])){$_SESSION['wx']['openid']=session_id();}
		if(empty($_SESSION['zid']['openid'])){$_SESSION['zid']['openid']=session_id();}
	header("Location:".$url); 	
	exit;
}