<?php
/**
 * 前端页面加载
 * @copyright (c) ZY All Rights Reserved
 */
require(ZSystem."/zsafe.php");//安全器
require(ZSystem."/config.php"); 
require(ZSystem."/zview.php");//页面通用头

include template('index'); 
