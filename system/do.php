<?php
/**
 * 操作通用加载头
 * @copyright (c) ZY All Rights Reserved
 */
defined('ZRoot') or die('Access Denied.'); 


//加载mysql
require(ZConfig.'/Public/MySql.php');
$DB	= new MySql(DB_HOST,DB_USER,DB_PASSWD,DB_NAME);


$Now = ZInclude.'/do/'.$Operate.'.php';
if(is_file($Now))
	{
	require_once($Now);
	}
else
	{
	include_once ZInclude.'/view/nexist.php' ;
	}
	

	 