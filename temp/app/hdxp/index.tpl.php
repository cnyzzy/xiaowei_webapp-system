<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>活动订票-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/xunjia_detail.css"/>
		    <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>	
        <script>(function (doc, win) {
          var docEl = doc.documentElement,
            resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
            recalc = function () {
              var clientWidth = docEl.clientWidth;
              if (!clientWidth) return;
              docEl.style.fontSize = 20 * (clientWidth / 320) + 'px';
            };

          if (!doc.addEventListener) return;
          win.addEventListener(resizeEvt, recalc, false);
          doc.addEventListener('DOMContentLoaded', recalc, false);
        })(document, window);
		 function wait(form) {
				$.showLoading("正在进入...");
				setTimeout(function() {
        $.hideLoading();
			return true;
        }, 1000);
	
}
		 				<?php if($isstop==1) { ?>		
							$(document).ready(function() {
 			 setTimeout(function() {
         $.modal({
  title: "提示",
  text: "当前绑定的用户身份不能进行选票<br>您可以选择重新绑定或退出",
  buttons: [
    { text: "取消", className: "default",
	onClick: function(){ 
	  $.showLoading("即将跳回...","cancel");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>";
        }, 800)	
	} },
    { text: "重新绑定", 
	onClick: function(){
		  $.showLoading("即将跳转...","cancel");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>/home/modify";
        }, 800)	
	} },
  ]
});
        }, 2600)	

		});
		<?php } ?>					 
     
         </script>
		
    </head>
    <body>
        <header>
		
         <div class="titlebar reverse">
             <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>活动订票</h1>
            </div>
        </header>
        <article style="bottom: 0;">
            <ul class="xunjia-tab clearfix">
 <li class="green"> 区域选择</li> 
               		
            </ul>           <ul class="xunjia-box">
			
 <div class="weui_msg">
  <div class="weui_icon_area"><i class="weui_icon_msg weui_icon_download"></i></i></div>
  <div class="weui_text_area">
    <h2 class="weui_msg_title">欢迎进行在线订票</h2>
    <p class="weui_msg_desc">分为订票区和查看区，为我校所有学生、教职工参与活动提供在线订票服务。</p><br>
  <?php if($type!='3') { ?><p class="weui_msg_desc">您可以选择如下区域</p>
  </div>
  <div class="weui_opr_area">
    <p class="weui_btn_area">
	<a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/main" class="weui_btn weui_btn_warn" onClick='return wait();'>订票区</a>
      <a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/read" class="weui_btn weui_btn_primary" onClick='return wait();'>查看区</a>
    </p>
  </div><?php } ?>
  	  <?php if($type=='3') { ?><p class="weui_msg_desc">您是访客身份，不能参与本活动</p>
  </div>
  <div class="weui_btn_area">
	 <a href="<?php echo $arrInfo['url'];?>/home/modify" class="weui_btn weui_btn_plain_default">查看绑定信息</a>
  </div><?php } ?>
  <div class="weui_btn_area">
    <a href="<?php echo $arrInfo['url'];?>/home/person_info" class="weui_btn weui_btn_plain_primary">查看个人资料</a></br>
  </div>
</div>
	
	
   </ul>
        </article>
		<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
		
    </body>        <footer>
           
        </footer>
		
</html>