<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/lib/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/css/jquery-weui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
       <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/js/jquery-weui.js"></script>
		  <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/fastclick.js"></script>
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">

<title>祝福盐师</title>
</head>
		<style>
	.titlebar.reverse {
    background-color: #df4d26;
    border-color: #000;
	
}
.weui-btn_primary {
    background-color: #3c6080;
}
</style>
<body>



	        <header>
		
         <div class="titlebar reverse">
             <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>新建祝福</h1>
            </div>
        </header>
	
     <article style="bottom: 0;">
	
    <div class="weui-msg">
      <div class="weui-msg__icon-area"><i class="<?php if(!empty($Array)) { ?>weui-icon-success<?php } else { ?>weui-icon-warn<?php } ?> weui-icon_msg"></i></div>
      <div class="weui-msg__text-area">
        <h2 class="weui-msg__title">提交<?php if(!empty($Array)) { ?>成功<?php } else { ?>失败<?php } ?></h2>
        <p class="weui-msg__desc"><?php if(!empty($Array)) { ?>您提交的内容需要经过审核才能显示，感谢您的支持<?php } else { ?>未提交至数据库<?php } ?></p>
      </div>
      <div class="weui-msg__opr-area">
        <p class="weui-btn-area">
          <a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/love" class="weui-btn weui-btn_primary">确定</a>
          <a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/add" class="weui-btn weui-btn_default">再来一条</a>
        </p>
      </div>
      <div class="weui-msg__extra-area">
        <div class="weui-footer">
<p class="weui-footer__text " style="COLOR:#F0EFEF">QQ970127005</p>
        <p class="weui-footer__links">
          <a href="http://weixin.yctu.edu.cn" class="weui-footer__link">小薇平台</a> |
		          <a href="http://www.yctu.edu.cn" class="weui-footer__link">学校官网</a> 
        </p>
        <p class="weui-footer__text">Copyright © 2018 盐城师范学院小薇工作室</p>
		        <p class="weui-footer__text">By ZY</p>
        </div>
      </div>
    </div>
     </article>
	
	


	
<?php if(isset($arrInfo['tjcode60'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode60'];?></div><?php } ?> 
</body>
</html>