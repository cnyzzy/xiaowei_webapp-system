<?php
/**
 * 前端页面加载
 * @copyright (c) ZY All Rights Reserved
 */
defined('ZRoot') or die('Access Denied.');


if($arrSystem['mysqlcache'] == 1)
{
//加载缓存
}else{
//加载mysql
require(ZConfig.'/Public/MySql.php');
$DB	= new MySql(DB_HOST,DB_USER,DB_PASSWD,DB_NAME);
}
define("TemplateROOT",ZInclude.'/model/'.$arrSystem['model'].'/');
define("TemplateObj",ZRoot.'/temp/model/'.$arrSystem['model'].'/');

$Now = ZInclude.'/view/'.$Controller.'.php';
if(is_file($Now))
	{
		
header('Content-Type: text/html; charset=UTF-8');

	require_once($Now);
	}
else
	{
	include_once ZInclude.'/view/nexist.php' ;
	}
	
	if($arrSystem['cache'] == 1){
	
	}else{
		
		if(is_file(TemplateROOT.$Controller.".html"))
	{

	  include template($Controller); 
	}
else
	{
	  include template("nexist"); 
	}

}