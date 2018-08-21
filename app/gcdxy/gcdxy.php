<?php
if(!is_dir(ZSystem.'/data/app/gcdxy') )mkdir(ZSystem.'/data/app/gcdxy');

if($AppAction!='login'&&$AppAction!='qlogin'&&$AppAction!='wbback'){
	if(empty($_SESSION['wx'])||empty($_SESSION['wx']['openid'])||empty($_SESSION['zid'])){
				$_SESSION['backurl']='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

		if(is_weixin())$url =  $arrInfo['url']."/".$AppName."/login";
		if(is_qq()||is_tim())$url =  $arrInfo['url']."/".$AppName."/qlogin";
		if(is_wb())$url =  $arrInfo['url']."/".$AppName."/wbback";

		if(!is_qq()&&!is_tim()&&!is_weixin()&&!is_wb())
		{$url =   "/noh/?url=";
		$_SESSION['backurl']='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$url.=$_SESSION['backurl'];}
	header("Location:".$url); 	
exit;
}else{
	$number=$_SESSION['zid']['number'];
	$type=$_SESSION['zid']['type'];
	$img=$_SESSION['zid']['img'];
	$name=$_SESSION['zid']['name'];
	$openid=$_SESSION['wx']['openid'];

}
}
