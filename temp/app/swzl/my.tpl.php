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

<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<script>
var logined = 1;
var zurl = "<?php echo $arrInfo['url'];?>";
var idnumber = <?php echo $number;?>;
var idimg = '<?php echo $img;?>';
var idname = '<?php echo $name;?>';
</script>
<script>
var now_page = <?php echo $d;?>,
now_pagee = <?php echo $d;?>;
function ttt(id){
$.modal({
  title: "选择",
  text: "请选择您将进行的操作",
  buttons: [
    { text: "查看", onClick: function(){ 
	  $('html').addClass('loading');
            setTimeout(function() {
                window.location.href = zurl+"/swzl/detail/"+id;
            },
            400);
	} },
    { text: "编辑", onClick: function(){ 
	  $('html').addClass('loading');
            setTimeout(function() {
                window.location.href = zurl+"/swzl/edit/"+id;
            },
            400);
	} },
    { text: "取消", className: "default", onClick: function(){ 
	$.toast("取消操作", "cancel");
	} },
  ]
});
}
</script>
<title>我的发布-失物招领</title>
</head>
<body>



	<div id="header" class="head">
		<div class="wrap">
			<i class="menu_back"><a href="javascript:history.go(-1);"></a></i>
			<div class="title">
				<span class="title_d"><p>我的发布</p></span>
				<div class="clear"></div>
			</div>
			
		</div>
	</div>
	
	<div id="container">
		<div id="content">
						<div style="height:1px"></div>
						
	<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">我发布的失物招领信息</div>
  <div class="weui_panel_bd"> <?php if(!empty($Array)) { ?>	  	<?php foreach((array)$Array as $key=>$loopChild) {?>
    <a onclick="ttt('<?php echo $loopChild['id'];?>');"   class="weui_media_box weui_media_appmsg">
      <div class="weui_media_hd">
        <img class="weui_media_appmsg_thumb" src="<?php echo $loopChild['img'];?>" alt="">
      </div>
      <div class="weui_media_bd">
        <h4 class="weui_media_title"><?php if($loopChild['isok']=='0') { ?><font color='red'>[待审核]</font><?php } ?><?php if($loopChild['isok']=='2') { ?><font color='green'>[已完结]</font><?php } ?><?php if($loopChild['isok']=='9') { ?><font color='red'>[被隐藏]</font><?php } ?><?php echo $loopChild['title'];?></h4>
        <p class="weui_media_desc"><?php echo $loopChild['content'];?></p>
	
      </div>
    </a>
   <?php }?>
             <?php } ?>
  </div>
  <a class="weui_panel_ft" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/myfeed">查看对我的动态</a>
</div>

									<div id="comment">
				<div class="pd5">	<h5> &nbsp;</h5>
									</div>	<h5> &nbsp;</h5>
			</div>
		</div>

	</div>
	
	

	
	<div id="us_panel2">
		<table width="100%" height="100%" cellspacing="0" border="0">
			<div class="button_sp_area" style="min-height:60px;max-height:70px; text-align: center;">
	<?php if(!empty($Array)&&$pagemax!=1) { ?><div <?php if($d>1&&$d<=$pagemax) { ?>onclick="urlpage('<?php echo $arrInfo['url'];?>/swzl/mygx/<?php echo $qpage;?>');" <?php } ?> class="weui_btn weui_btn_primary weui_btn_inline<?php if($d<=1) { ?> weui_btn_disabled<?php } ?> divhref" style="width:20%;">上页</div>
		<div class="weui_btn weui_btn_default weui_btn_inline" style="width:20%;" id="picker" value="3">第<?php echo $d;?>页</div>
	<div <?php if($d<$pagemax) { ?>onclick="urlpage('<?php echo $arrInfo['url'];?>/swzl/mygx/<?php echo $hpage;?>');" <?php } ?>class="weui_btn weui_btn_primary weui_btn_inline<?php if($d>=$pagemax) { ?> weui_btn_disabled<?php } ?> divhref" style="width:20%;">下页</div>
<?php } ?>
		</div>
	<script type="text/javascript"> 
	$("#picker").picker({
  title: "跳转的页码",
  cols: [
    {
textAlign: 'center',
 values: [<?php for($y=1; $y<=$pagemax; $y++) {?>'<?php echo $y;?>',<?php } ?>],
}],

onClose: function (result) {  
if(result['value'][0]!=now_pagee){
  $('html').addClass('loading');
            setTimeout(function() {
               window.location.href = zurl+"/swzl/mygx/"+result['value'][0];
            },
            400);
            }}  
});
 function urlpage(url)  {  
 $('html').addClass('loading');
            setTimeout(function() {
                window.location.href = url;
            },
            400);
 }
</script>  
		</table>
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