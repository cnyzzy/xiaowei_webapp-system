<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $arrInfo['name'];?></title>
<meta name="keywords" content="<?php echo $arrInfo['keywords'];?>" />
<meta name="description" content="<?php echo $arrInfo['description'];?>" />
<meta name="generator" content="<?php echo $arrInfo['generator'];?>" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo $arrInfo['url'];?>/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo $arrInfo['url'];?>/wlwmanifest.xml" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo $arrInfo['url'];?>/rss.php" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="<?php echo $arrInfo['url'];?>/system/html/yuan/style.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $arrInfo['url'];?>/system/html/yuan/jquery.min.js"></script>
<script src="<?php echo $arrInfo['url'];?>/system/html/yuan/theme.js"></script>
<script src="<?php echo $arrInfo['url'];?>/system/html/yuan/common_tpl.js"></script>
<script src="<?php echo $arrInfo['url'];?>/system/html/yuan/jquery-1.7.1.js" type="text/javascript"></script><link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/content/plugins/lastRSS/css/lastRSS.css" />
</head>