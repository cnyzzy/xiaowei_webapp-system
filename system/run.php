<?php
/**
 * 运算件 通用加载头
 * @copyright (c) ZY All Rights Reserved
 */
defined('ZRoot') or die('Access Denied.'); 
require(ZSystem."/zsafe.php");//安全器
require(ZSystem."/zview.php");//页面通用头

$Now = ZInclude.'/run/'.$Operate.'.php';
if(is_file($Now))
	{
	require_once($Now);
	}
else
	{
	include_once ZInclude.'/view/nexist.php' ;
	}
	