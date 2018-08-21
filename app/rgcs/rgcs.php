<?php
if(!is_dir(ZSystem.'/data/app/rgcs') )mkdir(ZSystem.'/data/app/rgcs');
if(ismobile()||!empty($_SESSION['wx'])){
if($AppAction!='login'&&$AppAction!='qlogin'&&$AppAction!='wbback'&&$AppAction!='noh'){
	if(empty($_SESSION['wx'])||empty($_SESSION['wx']['openid'])||empty($_SESSION['zid'])){
				$_SESSION['backurl']='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

		if(is_weixin())$url =  $arrInfo['url']."/".$AppName."/login";
		if(is_qq()||is_tim())$url =  $arrInfo['url']."/".$AppName."/qlogin";
		if(is_wb())$url =  $arrInfo['url']."/".$AppName."/wbback";
			if(ismobile()){
		if(!is_qq()&&!is_tim()&&!is_weixin()&&!is_wb())
		{$url =   $arrInfo['url'].'/rgcs/noh?url=';
		$_SESSION['backurl']='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$url.=$_SESSION['backurl'];

		}
					header("Location:".$url); 	
	exit;}


}else{
$number=$_SESSION['zid']['number'];
	$type=$_SESSION['zid']['type'];
	$img=$_SESSION['zid']['img'];
	$name=$_SESSION['zid']['name'];
	$openid=$_SESSION['wx']['openid'];
	if(!is_dir(ZSystem.'/data/app/rgcs/'.$openid) )mkdir(ZSystem.'/data/app/rgcs/'.$openid);
	if(!is_dir(ZSystem.'/data/app/rgcs/'.$openid.'/load') )mkdir(ZSystem.'/data/app/rgcs/'.$openid.'/load');
	if(!is_dir(ZSystem.'/data/app/rgcs/'.$openid.'/ok') )mkdir(ZSystem.'/data/app/rgcs/'.$openid.'/ok');
	if(!is_dir(ZSystem.'/data/app/rgcs/'.$openid.'/result') )mkdir(ZSystem.'/data/app/rgcs/'.$openid.'/result');

}
}
}
function ismobile() {
	    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
	    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
	        return true;
	    
	    //此条摘自TPM智能切换模板引擎，适合TPM开发
	    if(isset ($_SERVER['HTTP_CLIENT']) &&'PhoneClient'==$_SERVER['HTTP_CLIENT'])
	        return true;
	    //如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
	    if (isset ($_SERVER['HTTP_VIA']))
	        //找不到为flase,否则为true
	        return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;
	    //判断手机发送的客户端标志,兼容性有待提高
	    if (isset ($_SERVER['HTTP_USER_AGENT'])) {
	        $clientkeywords = array(
	            'nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile'
	        );
	        //从HTTP_USER_AGENT中查找手机浏览器的关键字
	        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
	            return true;
	        }
	    }
	    //协议法，因为有可能不准确，放到最后判断
	    if (isset ($_SERVER['HTTP_ACCEPT'])) {
	        // 如果只支持wml并且不支持html那一定是移动设备
	        // 如果支持wml和html但是wml在html之前则是移动设备
	        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
	            return true;
	        }
	    }
	    return false;
	 }