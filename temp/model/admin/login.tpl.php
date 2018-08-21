<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>小薇平台管理登录</title>
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="<?php echo $arrInfo['url'];?>/system/admin/model/assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo $arrInfo['url'];?>/system/admin/model/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="XIAOWEI-Admin" />
  <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/system/admin/model/assets/css/amazeui.min.css" />
  <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/system/admin/model/assets/css/admin.css">
  <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/system/admin/model/assets/css/app.css">
</head>

<body data-type="login">

  <div class="am-g myapp-login">
	<div class="myapp-login-logo-block  tpl-login-max">
		<div class="myapp-login-logo-text">
			<div class="myapp-login-logo-text">
				小薇平台<span> 管理登录</span> <i class="am-icon-skyatlas"></i>
				
			</div>
		</div>

		
		<div class="am-u-sm-10 login-am-center">
			<form class="am-form" name= "myform" method = 'post'  action = ''>
				<fieldset>
					<div class="am-form-group">
						<input type="text" name="username" class="" id="doc-ipt-email-1" placeholder="输入用户名"<?php if(isset($username)) { ?>value="<?php echo $username;?>"<?php } ?>>
					</div>
					<div class="am-form-group">
						<input type="password" name="password" class="" id="doc-ipt-pwd-1" placeholder="输入密码">
					</div>
					<p><button type="submit" class="am-btn am-btn-default">登录</button></p>
				</fieldset>
			</form>
		</div>
		<div class="login-font">
			<i>盐城师范学院 </i>  <span> 小薇工作室</span><BR>Copyright&copy;2017&nbsp;&nbsp;  ZY  
		</div>
	</div>
</div>

    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/amazeui.min.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/app.js"></script>
  
</body>
</html>