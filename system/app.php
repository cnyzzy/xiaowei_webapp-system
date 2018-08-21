<?php
/**
 * App加载
 * @copyright (c) ZY All Rights Reserved
 */
defined('ZRoot') or die('Access Denied.');
$AppName=$Controller;

if($arrSystem['mysqlcache'] == 1)
{
//加载缓存
}else{
//加载mysql
if(is_file(ZApp.'/' . $AppName . '/Mysql.php'))
{
	require(ZApp.'/' . $AppName . '/Mysql.php');
}else{
	require(ZConfig.'/Public/MySql.php');
	}
$DB	= new MySql(DB_HOST,DB_USER,DB_PASSWD,DB_NAME);
}
//加载config
session_start();
if(is_file(ZApp.'/' . $AppName . '/config.php'))
{
	 $APPConfig = SetRead('/app/' . $AppName . '/config.php');
}


empty($Operate) ? $AppAction = 'index' : $AppAction = $Operate;
if(empty($APPConfig['noid'])||$APPConfig['noid']==0)require(ZSystem."/zid.php");//身份识别 
$Now = ZApp.'/' . $AppName . '/action/'.$AppAction.'.php';
if(is_file($Now))
	{
		
		ob_start();
header('Content-Type: text/html; charset=UTF-8');
require(ZApp.'/' . $AppName . '/'.$AppName.'.php'); 
	require_once($Now);
	}
else
	{
	include_once ZInclude.'/view/nexist.php' ;
	}
	
	if($arrSystem['cache'] == 1){
	
	}else{
		
		if(is_file(ZApp.'/' . $AppName .'/model/'.$AppAction.".html"))
	{
define("TemplateROOT",ZApp.'/' . $AppName .'/model/');
define("TemplateObj",ZRoot.'/temp/app/' . $AppName .'/');
	  include template($AppAction); 
	}
else
	{
	define("TemplateROOT",ZInclude.'/model/'.$arrSystem['model'].'/');
define("TemplateObj",ZRoot.'/temp/model/'.$arrSystem['model'].'/');
	
	  include template("nexist"); 
	}

}