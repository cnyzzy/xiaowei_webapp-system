<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title>通讯录</title>
<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/style.css">
</head>
<body>

	<header class="fixed">
		<div class="header">
			通讯录
		</div>
	</header>

	<div id="letter" ></div>
	<div class="sort_box"><?php foreach((array)$arr1 as $key=>$Child) {?>
			<div class="sort_list">
			<div class="num_logo">
				<img src="<?php echo $arrInfo['url'];?>/app/jsdh/model/img/img.png" alt="">
			</div>
			<a href="<?php echo $arrInfo['url'];?>/jsdh/detail/<?php echo $Child['sx'];?>/<?php echo(urlencode($Child['name']))?>"><div class="num_name"><?php echo $Child['name'];?></div></a>
		</div>

  <?php }?>

		
	</div>
	<div class="initials">
		<ul>
			<li><img src="<?php echo $arrInfo['url'];?>/app/jsdh/model/img/068.png"></li>
		</ul>
	</div>

	<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/jquery.charfirst.pinyin.js"></script>
	<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/sort.js"></script>
</body>
</html>