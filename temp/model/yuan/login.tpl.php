<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html lang="en" class="login-content" data-ng-app="materialAdmin">
 <head>
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>盐城师范学院勤工助学管理中心招新系统</title>

  <!-- Vendor CSS -->
  <link href="<?php echo $arrInfo['url'];?>/include/model/yuan/css/material-design-iconic-font/css/material-design-iconic-font.min.css" rel="stylesheet" type="text/css">
  <!-- CSS -->
  <link href="<?php echo $arrInfo['url'];?>/include/model/yuan/css/app.min.1.css" rel="stylesheet" type="text/css">
 </head>
 <body class="login-content" data-ng-controller="loginCtrl as lctrl">

    <div class="lc-block" id="l-login" data-ng-class="{'toggled':lctrl.login === 1}">
    	<h1 class="lean">后台登录</h1>
<form name="login"  method="post" action="">  
    	<div class="input-group m-b-20">
    		<span class="input-group-addon">
    			<i class="zmdi zmdi-account"></i>
    		</span>
    		<div class="fg-line">
    			<input type="text" name="username" class="form-control"  placeholder="用户名" value="<?php echo $username;?>" regex="^\w{3,16}$"/>
    		</div>
    	</div>

        <div class="input-group m-b-20">
    		<span class="input-group-addon">
    			<i class="zmdi zmdi-male"></i>
    		</span>
    		<div class="fg-line">
    			<input type="password" name="password" class="form-control"  value="<?php echo $password;?>" placeholder="密码" regex="^\w+"/>
    		</div>
    	</div>
	
    	<div class="clearfix"></div>
    	

        
    	<a href="javascript:login.submit();" class="btn btn-login btn-danger btn-float">
    		<i class="zmdi zmdi-arrow-forward"></i>
    	</a>
            </form>
        <ul class="login-navigation">
        	<li class="bgm-red" data-ng-click="lctrl.login = 0; lctrl.register = 1">注册</li>
        	<li data-block="#l-forget-password" class="bgm-orange" data-ng-click="lctrl.login = 0; lctrl.forgot = 1">忘记密码</li>
        </ul>
    </div>
    
    <div class="lc-block" id="l-register" data-ng-class="{ 'toggled': lctrl.register === 1 }" data-ng-if="lctrl.register === 1">
    	<h1 class="lean">注册</h1>
			<p class="text-left">本系统账号通用，不允许注册</p>
		
<!--
    	<div class="input-group m-b-20">
    		<span class="input-group-addon">
    			<i class="zmdi zmdi-account"></i>
    		</span>
    		<div class="fg-line">
    			<input type="text" class="form-control" placeholder="Username" regex="^\w{3,16}$"/>
    		</div>
    	</div>

        <div class="input-group m-b-20">
    		<span class="input-group-addon">
    			<i class="zmdi zmdi-email"></i>
    		</span>
    		<div class="fg-line">
    			<input type="text" class="form-control" placeholder="Email Address" regex="^\w+@\w+\.[a-zA-Z]+(\.[a-zA-Z]+)?$"/>
    		</div>
    	</div>

        <div class="input-group m-b-20">
    		<span class="input-group-addon">
    			<i class="zmdi zmdi-male"></i>
    		</span>
    		<div class="fg-line">
    			<input type="password" class="form-control" placeholder="Password" regex="^\w+"/>
    		</div>
    	</div>
    	
    	<div class="clearfix"></div>
    	
    	<div class="checkbox">
    		<label>
    			<input type="checkbox" value=""/>
    			<i class="input-helper"></i>
    			接受许可协议
    		</label>
    	</div>
    	
    	<a href="" class="btn btn-login btn-danger btn-float"><i class="zmdi zmdi-arrow-forward"></i></a>
    -->
    	<ul class="login-navigation">
	      <li data-block="#l-login" class="bgm-green" data-ng-click="lctrl.register = 0; lctrl.login = 1">登录</li>
	      <li data-block="#l-forget-password" class="bgm-orange" data-ng-click="lctrl.register = 0; lctrl.forgot = 1">忘记密码</li>
	    </ul>
    </div>

    <div class="lc-block" id="l-forget-password" data-ng-class="{ 'toggled': lctrl.forgot === 1 }" data-ng-if="lctrl.forgot === 1">
    	<h1 class="lean">忘记密码</h1>
    	<p class="text-left">本系统账号通用，忘记密码询问其他部长或主任室。如有问题联系QQ970127005</p>
    	<div class="input-group m-b-20">
	      <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
	      <div class="fg-line">

	      </div>
	    </div>
	

	
	    <ul class="login-navigation">
	      <li data-block="#l-login" class="bgm-green" data-ng-click="lctrl.forgot = 0; lctrl.login = 1">登录</li>
	      <li data-block="#l-register" class="bgm-red" data-ng-click="lctrl.forgot = 0; lctrl.register = 1">注册</li>
	    </ul>
    </div>
 </body>
 	
 	<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/log.js"></script>
	<!-- Angular -->
	<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/bower_components/angular/angular.min.js"></script>
	<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/bower_components/angular-resource/angular-resource.min.js"></script>
	<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/bower_components/angular-animate/angular-animate.min.js"></script>
	
	
	<!-- Angular Modules -->
	<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
	<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/bower_components/angular-loading-bar/src/loading-bar.js"></script>
	<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/bower_components/oclazyload/dist/ocLazyLoad.min.js"></script>
	<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
	
	<!-- Common js -->
	<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/bower_components/angular-nouislider/src/nouislider.min.js"></script>
	<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/bower_components/ng-table/dist/ng-table.min.js"></script>
	
	<!-- Placeholder for IE9 -->
	<!--[if IE 9 ]>
	    <script src="js/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
	<![endif]-->
	<!-- App level -->
	<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/app.js"></script>
	<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/controllers/main.js"></script>
	<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/controllers/ui-bootstrap.js"></script>
	
	
	<!-- Template Modules -->
	<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/modules/form.js"></script>
</html>