<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE HTML>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1 maximum-scale=2, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-title" content="Add to Home">
		<meta name="format-detection" content="telephone=no">
		<meta http-equiv="x-rim-auto-match" content="none">
		<title>步数提交—健步走活动区</title>		

        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
			  
	</head>

	<body>
		
<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
<script>

	$(document).ready(function() {
  
  $.modal({
  title: "选择",
  text: "您还可以利用小程序上传步数",
  buttons: [
    { text: "小程序", onClick: function(){		  $.showLoading("即将跳转...");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>/wxapp";
        }, 800)	}},
    
    { text: "不用了", className: "default",onClick: function(){	  $.showLoading("即将跳转...");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/hdqup";
        }, 800)	}},
  ]
});
  });</script>
<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
	</body>

</html>