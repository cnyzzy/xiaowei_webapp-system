<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0,user-scalable=0">
        <title>绑定-<?php echo $arrInfo['name'];?></title>
       <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/login.css"/>
		     <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/jquery-weui.min.css"/>
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
        }

		)(document, window);

	
</script><?php if($LId=='1') { ?>
<script>
$(document).ready(function(){  

 $.alert("感谢使用小薇平台。<br>在使用前您需要绑定身份。", "公告", function() {
        $.modal({
  title: "新生提示",
  text: "如果您是新生 请修改默认密码<br>默认密码为身份证号<br>此后您可以使用全部功能<br>已修改密码的用户请直接绑定",
  buttons: [
    { text: "我知道了", className: "default",
	onClick: function(){ 
        $.modal({
  title: "评课公告",
  text: "请确认已经完成所有课程的评价<br>否则将无法绑定身份和同步数据<br>如果您未完成请进行评课",
  buttons: [
    { text: "我知道了", className: "default",
	onClick: function(){ 
		$.alert("如果忘记教务密码请联系所在二级学院的教务秘书老师", "提示");

 }	
	},
    { text: "评课", 
	onClick: function(){
		$.showLoading("正在加载");
					 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>/pingk/i";

        }, 1000)
	} },
  ]
});
 }	
	},
    { text: "修改默认密码", 
	onClick: function(){
		$.showLoading("正在加载");
					 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>/xsch/index";

        }, 1000)
	} },
  ]
});	});	
	
 
 

 });
 </script><?php } ?>
    </head>
    <body>
	
        <div class="header">
           <img style="max-width:100%;" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/login_logo_w.png">
		   <?php if($LId=='1') { ?><?php include template('login1'); ?><?php } ?>
<?php if($LId=='2') { ?><?php include template('login2'); ?><?php } ?>        
<?php if($LId=='3') { ?><?php include template('login3'); ?><?php } ?>

            <a href='javascript:check(document.F);' class="weui_btn login-btn weui_btn_primary">绑定</a>
                <a href="<?php echo $arrInfo['url'];?>/home/zzjb" class="weui_btn weui_btn_plain_primary">自助解绑</a>     
        </div>
        <div class="footer">
            Copyright&nbsp;&copy;&nbsp;2017&nbsp;小薇工作室&nbsp;ZY
        </div>
    <?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> </body>
			  
</html>