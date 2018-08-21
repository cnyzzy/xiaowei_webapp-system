<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,height=device-height,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>

    <title>植树版2048</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/2048.css"/>

    <!--<script type="text/javascript" src="http://libs.baidu.com/jquery/1.9.0/jquery.min.js"></script>-->
    <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/jquery-1.10.1.js"></script>
					<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
    <script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/support2048.js"></script>
    <script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/showAnimation.js"></script>
    <script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/main2048.js"></script>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
		
	
</head>
<body>
<div class="bg"></div>
<script type="text/javascript">
function ppover() {
	$(".bg").show();
	// alert("您最后培育到了： " + getNumberText(max) + "  阶段！"+ "\n 您的当前得分为：" + score + "分");
	$.closePopup();
$("#msgover").show();
}
	function upup(sss) {		
	$.ajax({
		   type: "POST",
		   url: "<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/up",
		   data:"&sss="+sss,
		   async: true,
		   dataType:"json",
		   success: function(data){
			 if (0 == data.status) {
			 	
				$.toast(data.content,"forbidden");

				return false;
			 }else{
			
			$('#paim2').text(data.paim);
			$('#paim1').text(data.no1name);
			$('#no1s').text(data.no1s);
		 //document.getElementById("uploadphoto").value=data.text;
				return false;
			 }
		   }, 
			complete :function(XMLHttpRequest, textStatus){
			},
			error:function(XMLHttpRequest, textStatus, errorThrown){ //上传失败 
	
            
$.toast("网络故障","forbidden");
			}
		});}
$(document).ready(function(){  
   $.notification({
  title: "活动通知",
  text: "活动已结束，点此查看获奖名单哦",//
   media: "<img src='http://weixin.yctu.edu.cn/xw.jpg'>",
  data: "123",
  onClick: function(data) {
window.location.href = 'http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=2654192361&idx=1&sn=4d113c07b0f403ce38ef2f2d3ba01924&chksm=808a8513b7fd0c0584050c6621d19364da6fae681a22d36116eec526d1bac33e4db5986223af&mpshare=1&scene=23&srcid=0320GZuJbq8pSssITBILnh26#rd';
  },
  onClose: function(data) {

  }
});
 });
    </script>
<!-- 绘制标题 -->
  <div class="container">
    <div class="heading">
      <h1>植树2048</h1>
	  <br>
      <div class="scores-container">
        <div class="score-container" id="score">0</div>
        <div class="best-container" id="score2"><?php if(!empty($msss)) { ?><?php echo $msss;?><?php } else { ?>0<?php } ?></div>
      </div>
	    <div class="above-game">
      <a class="restart-button" href="javascript:newgame();" id="newgamebutton">点我开始</a>
	  <a class="restart-button" href="javascript:gameoverr();" id="stopgamebutton">点我结束</a>
    </div>
    </div>

  

   

<!-- 绘制棋盘格 -->



 <div id="grid-container"> 
      <div class="grid-container game-message"  id="msgover">
	<div class="bg"></div>
        <p></p>
        <div class="lower">
		<h1>您最高培育到了</h1>
		<br>
	         <h1 class="title2"> <span id="peiyu"></span> </h1>
        
        </div>
      </div>
	        <div class="grid-container game-message" id="msg1" style="display: block;">
		<div class="bg"></div>
        <p>
       
	       <h1 class="title3">植树2048</h1><BR>
		   <div class="lower">
		     <h1>从种子到森林，你可以做到嘛</h1>
        
      </p></div>
      </div>
    <div class="grid-cell" id="grid-cell-0-0"></div>
    <div class="grid-cell" id="grid-cell-0-1"></div>
    <div class="grid-cell" id="grid-cell-0-2"></div>
    <div class="grid-cell" id="grid-cell-0-3"></div>

    <div class="grid-cell" id="grid-cell-1-0"></div>
    <div class="grid-cell" id="grid-cell-1-1"></div>
    <div class="grid-cell" id="grid-cell-1-2"></div>
    <div class="grid-cell" id="grid-cell-1-3"></div>

    <div class="grid-cell" id="grid-cell-2-0"></div>
    <div class="grid-cell" id="grid-cell-2-1"></div>
    <div class="grid-cell" id="grid-cell-2-2"></div>
    <div class="grid-cell" id="grid-cell-2-3"></div>

    <div class="grid-cell" id="grid-cell-3-0"></div>
    <div class="grid-cell" id="grid-cell-3-1"></div>
    <div class="grid-cell" id="grid-cell-3-2"></div>
    <div class="grid-cell" id="grid-cell-3-3"></div>
</div> <div class="tile-container">

      </div>
	  <div id="about" style="clear:both;" class="weui-popup-container">
  <div class="weui-popup-overlay"></div>
  <div class="weui-popup-modal">
  <div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">你知道吗</div>
  <div class="weui_panel_bd">
   <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
      <div class="weui_media_hd">
        <img class="weui_media_appmsg_thumb" src="<?php echo $arrInfo['url'];?>/app/zsj/model/tree.jpg" alt="">
      </div>
      <div class="weui_media_bd">
        <h4 class="weui_media_title">森林的形成极为不易</h4>
        <p class="weui_media_desc">至少几十年才能形成一片生态循环良好的森林，环保并非一日之功。</p>
      </div>
   </a>
   <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
      <div class="weui_media_hd">
        <img class="weui_media_appmsg_thumb" src="<?php echo $arrInfo['url'];?>/app/zsj/model/tree2.jpg" alt="">
      </div>
      <div class="weui_media_bd">
        <h4 class="weui_media_title">每天有4700颗树木消失</h4>
        <p class="weui_media_desc">每年消失约1700万公顷（约170亿颗树），其中35%用于造纸。节约，也是一种保护。</p>
      </div>
    </a>
  </div>
<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">游戏结果</div>
  <div class="weui_panel_bd">
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title">最高培育成果</h4>
      <p class="weui_media_desc">您培育到了 <span id="peiyu2">?</span> 。<br>在现实世界这需要付出更多时间、精力和关怀。</p>
    </div>
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title">成绩</h4>
      <p class="weui_media_desc">本次分数:  <span id="score3">0</span>
       <br>最高分数: <span id="score4">0</span></p>
    </div>
	   <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title">排名</h4>
      <p class="weui_media_desc">您的排名: 第 <span id="paim2">?</span> 名<br>第一名：<span id="paim1">?</span> [分数：<span id="no1s">?</span>]</p>
    </div>
  </div>
  <a class="weui_panel_ft">2017.3.12植树节</a>
</div>
<a href="javascript:ppover();"  class="weui_btn weui_btn_primary">关闭</a>
</div>
	
  </div>
</div>
    </div>

     
    <p><strong>人从众团团聚圆，木林森茂茂密密</strong></p>
	<p>小薇工作室 出品</p>
</div>
<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
</body>
</html>