<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style.css" />
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
				<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
<script type='text/javascript' src='<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/LocalResizeIMG.js'></script>
<script type='text/javascript' src='<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/patch/mobileBUGFix.mini.js'></script>
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<style>

</style>
<script>
var logined = 1;
var zurl = "<?php echo $arrInfo['url'];?>";
var idnumber = <?php echo $number;?>;
var idimg = '<?php echo $img;?>';
var idname = '<?php echo $name;?>';
</script>
<title>提交成功</title>
</head>

<body>



	<div id="header" class="head">
		<div class="wrap">
			<i class="menu_back"><a href="javascript:history.go(-1);"></a></i>
			<div class="title">
				<span class="title_d"><p>提交<?php if(!empty($Array)) { ?>成功<?php } else { ?>失败<?php } ?></p></span>
				<div class="clear"></div>
			</div>
			
		</div>
	</div>
	
	<div id="container">
		<div id="content">
						<div style="height:1px"></div>
						<div class="weui_msg">
  <div class="weui_icon_area"><i class="<?php if(!empty($Array)) { ?>weui_icon_success<?php } else { ?>weui_icon_warn<?php } ?> weui_icon_msg"></i></div>
  <div class="weui_text_area">
    <h2 class="weui_msg_title">提交<?php if(!empty($Array)) { ?>成功<?php } else { ?>失败<?php } ?></h2>
    <p class="weui_msg_desc"><?php if(!empty($Array)) { ?>您提交的成果将会呈现给相应教师<?php } else { ?>未提交至数据库<?php } ?></p>
  </div>
  <div class="weui_opr_area">
    <p class="weui_btn_area">
      <?php if(!empty($Array)) { ?><a href="<?php echo $arrInfo['url'];?>/sxzs/idetail/<?php echo $Array['aid'];?>" class="weui_btn weui_btn_primary">确定</a><?php } else { ?><a href="javascript:history.go(-1);" class="weui_btn weui_btn_primary">返回</a><?php } ?>
      <a href="<?php echo $arrInfo['url'];?>/sxzs" class="weui_btn weui_btn_default">首页</a>
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
	<script language="javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/zepto.min.js"></script>
	<script language="javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/fx.js"></script>
	<script language="javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/script.js"></script>

</body>
</html>