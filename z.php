<?php
/**
 * 全局通用加载头
 * @copyright (c) ZY All Rights Reserved
 */
define("ZRoot",dirname(__FILE__)); 
define("ZSystem",dirname(__FILE__)."/system");
define("ZConfig",dirname(__FILE__)."/system/config");
define("ZInclude",dirname(__FILE__)."/include");
define("ZApp",dirname(__FILE__)."/app");
define("LOG_PATH",dirname(__FILE__)."/log/");
define("ZYCodeing",'1');//开发模式
date_default_timezone_set("Asia/Shanghai");
require(ZSystem."/function.base.php");
//error_reporting(0);
require(ZSystem."/zsafe.php");//安全器 
 

$arrSystem = SetRead('/system/config/Public/System.php');
$arrInfo= SetRead('/system/config/Public/Info.php');
if(is_https())$arrInfo['url']= str_replace("http://","https://",$arrInfo['url']);
/** 载入路由器支持 */
$Router = new Router(); 
$url = $Router->getRouter($arrSystem['urlmodel']); 
$Router->getHtaccess();
empty($url['Controller']) ? $Controller = 'index' : $Controller = $url['Controller'];
empty($url['Operate']) ? $Operate = '' : $Operate = $url['Operate'];
empty($url['params']) ? $params = '' : $params = $url['params'];
//开始分发
if ($Controller == "do") 
{
 require(ZSystem."/do.php"); 
} 
elseif ($Controller == "admin")
{
 require(ZSystem."/admin/zadmin.php"); 
}
elseif ($Controller == "admindo")
{
 require(ZSystem."/admin/zadmindo.php"); 
}
elseif ($Controller == "run")
{
 require(ZSystem."/run.php"); 
}elseif(is_file(ZApp.'/' . $Controller .'/' . $Controller . '.php')){
	if (is_file(ZConfig.'/App/' . $Controller . '.php'))
{
	 $APPis = SetRead('/system/config/App/' .$Controller . '.php');
    if (empty($APPis['isopen'])) {
$Errormsg=array (
  'error_type' => '提示',
  'msg' => $Controller . "应用尚未配置！",
);
ErrorMsg($Errormsg);
    }
    if ($APPis['isopen'] == '0' && $Operate != 'admin') {
$Errormsg=array (
  'error_type' => '提示',
  'msg' => $Controller . "应用关闭，请开启后访问！",
);
ErrorMsg($Errormsg);
   
}//加载APP配置
else{
		 require(ZSystem."/app.php"); 
	}
}else{$Errormsg=array (
  'error_type' => '提示',
  'msg' => $Controller . "应用尚未安装！",
);
ErrorMsg($Errormsg);}}
else
{
 require(ZSystem."/view.php"); 
}//加载APP配置

//分发结束