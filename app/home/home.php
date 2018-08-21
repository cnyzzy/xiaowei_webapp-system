<?php
if($Operate != 'login'&&$Operate != 'zzjb'&&$Operate != 'zzjbdo'&&$Operate != 'qlogin'){
$Home = new Home($DB);
$NoticeNum = $Home->NoticeNum();
$MsgNum = $Home->MsgNum($_SESSION['zid']['number']);
$AppNum = $Home->AppNum();
$SelfNum = $Home->SelfNum($_SESSION['zid']['number']);}

if($AppAction=='zzjb'||$Operate == 'zijbdo'){
	if(is_weixin()){
	if(empty($_SESSION['wx'])||empty($_SESSION['wx']['openid'])||empty($_SESSION['zid'])){
 $url = $arrInfo['url']."/back/";
 $_SESSION['backurl']='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	header("Location:".$url.$_SESSION['backurl']); 
exit;
}
	}
		if(is_qq()||is_tim()){
	if(empty($_SESSION['wx'])||empty($_SESSION['wx']['openid'])||empty($_SESSION['zid'])){
 $url = $arrInfo['url']."/qqback/";
 $_SESSION['backurl']='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	header("Location:".$url.$_SESSION['backurl']); 
exit;
}
	}
		if(!is_qq()&&!is_tim()&&!is_weixin())
{
			$url = $arrInfo['url']."/noh/";
		$_SESSION['backurl']='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
header("Location:".$url.$_SESSION['backurl']); 	}
}