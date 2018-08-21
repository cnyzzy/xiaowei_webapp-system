<?php
/**
 * 后台页面通用加载头
 * @copyright (c) ZY All Rights Reserved
 * 安全隔离
 */
defined('ZRoot') or die('Access Denied.'); 

//加载mysql
require(ZConfig.'/Public/MySql.php');
$DB	= new MySql(DB_HOST,DB_USER,DB_PASSWD,DB_NAME);
session_start();
$Admin = new Admin($DB);
$Log = new Log($DB);
$Mjw = new Mjw($DB);
$HAppNavList = $Admin ->AppNavList();
$HWxidNum = $Mjw->WxidNum(1);
$HWxidNumH = $Mjw->WxidNum(0);
$HQqidNum = $Mjw->QqidNum(1);
$HQqidNumH = $Mjw->QqidNum(0);
$HWxxidNum = $Mjw->WxxidNum(1);
$HWxxidNumH = $Mjw->WxxidNum(0);
$HJwNum = $Mjw->JwinfoNum('0 or 1');
$HAppNum=$Admin-> ReadAppNum();
$HUserNum=$Admin-> UserNum();
$HLogNum=$Log-> LogNum();
define("TemplateROOT",ZSystem.'/admin/model/');
define("TemplateObj",ZRoot.'/temp/model/admin/');
empty($Operate) ? $Action = 'index' : $Action = $Operate;
$Now = ZSystem.'/admin/include/'.$Action.'.php';
if($Action!='login')
{
//权限审核
if(!empty($_SESSION['admin']['id'])){$adminright=$Admin-> GetRight($_SESSION['admin']['id']);$_SESSION['admin']['rightint']=$adminright['rightint'];}
if(empty($_SESSION['admin'])||$_SESSION['admin']['rightint']<4){header("Location:".$arrInfo[url]."/admin/login");}
//
}
if(is_file($Now))
	{
header('Content-Type: text/html; charset=UTF-8');
	require_once($Now);
		if(is_file(TemplateROOT.$Action.".html"))
	{

	  include template($Action); 
	}
	}elseif(is_file(ZApp.'/'.$Action.'/info.php')){
		$isapp=1;
		$appInfo = SetRead( '/app/'.$Action.'/info.php');
		if($appInfo['admin']==1){
			define("aTemplateROOT",ZApp.'/' . $Action .'/admin/');
			define("aTemplateObj",ZRoot.'/temp/app/' . $Action .'/admin/');
			require_once(ZApp.'/'.$Action.'/admin/admin.php');}
		}

	 