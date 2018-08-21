<?php
if(!is_dir(ZSystem.'/data/app/pingk') )mkdir(ZSystem.'/data/app/pingk');


if($AppAction!='login'&&$AppAction!='qlogin'&&$AppAction!='wbback'){
	
	if(empty($_SESSION['wx'])||empty($_SESSION['wx']['openid'])){
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
	if((empty($_SESSION['zid'])||empty($_SESSION['zid']['number']))&&!empty($_SESSION['wx']['openid']))
	{
	$openid=$_SESSION['wx']['openid'];
	$_SESSION['zid']['openid']=$openid;
			$_SESSION['zid']['number']='no'.$openid;
			$_SESSION['zid']['type']='3';
			$_SESSION['zid']['name']=$_SESSION['zid']['name'];
			$_SESSION['zid']['img']=$_SESSION['wx']['img']; 	
		$_SESSION['zid']['nobd']='1';
	}
	$number=$_SESSION['zid']['number'];
	$type=$_SESSION['zid']['type'];
	$img=$_SESSION['zid']['img'];
	$name=$_SESSION['zid']['name'];
	$openid=$_SESSION['wx']['openid'];

}
}
