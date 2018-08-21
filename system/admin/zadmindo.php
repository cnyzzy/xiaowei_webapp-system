<?php
/**
 * 后台执行 通用加载头
 * @copyright (c) ZY All Rights Reserved
 * 安全隔离
 */
defined('ZRoot') or die('Access Denied.'); 


//加载mysql
require(ZConfig.'/Public/MySql.php');
$DB	= new MySql(DB_HOST,DB_USER,DB_PASSWD,DB_NAME);



	 