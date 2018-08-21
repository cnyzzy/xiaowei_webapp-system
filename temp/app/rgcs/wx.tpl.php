<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
				<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<style>

</style>

<title>微信登录认证</title>
</head>

<body>



	<div id="header" class="head">
		<div class="wrap">
			<i class="menu_back"><a href="javascript:history.go(-1);"></a></i>
			<div class="title">
				<span class="title_d"><p></p></span>
				<div class="clear"></div>
			</div>
			
		</div>
	</div>
	
	<div id="container">
		<div id="content">
						<div style="height:1px"></div>
						<div class="weui_msg">
  <div class="weui_icon_area"><i class="weui_icon_msg <?php if($Id=='0') { ?>weui_icon_warn<?php } else { ?>weui_icon_success<?php } ?> weui_icon_msg"></i></div>
  <div class="weui_text_area">
    <h2 class="weui_msg_title">微信登录<?php if($Id=='0') { ?>失败<?php } else { ?>成功<?php } ?></h2>
    <p class="weui_msg_desc"><?php if($Id=='0') { ?><?php echo $error;?><?php } else { ?>您已成功登录<?php } ?><br>请返回电脑端操作</p>

 </div>
  <div class="weui_opr_area">
    <p class="weui_btn_area">
	      <a href="javascript:WeixinJSBridge.call('closeWindow');" class="weui_btn weui_btn_default">关闭</a>

    </p>
  </div>

</div>
</div>

									<div id="comment">
				<div class="pd5">	<h5> &nbsp;</h5>
									</div>	<h5> &nbsp;</h5>
			</div>
		</div>

	</div>
	
	


	<div class="loading_dark"></div>
	<div id="loading_mask">
		<div class="loading_mask">
			<ul class="anm">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
	</div>
	
<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
</body>
</html>