<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>参与抽奖活动-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/xunjia_detail.css"/>
		    <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>	
			<script src='https://res.wx.qq.com/open/js/jweixin-1.2.0.js'></script>
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
		 wx.config({
    appId: "<?php echo $signPackage['appId'];?>",
    timestamp: "<?php echo $signPackage['timestamp'];?>",
    nonceStr: "<?php echo $signPackage['nonceStr'];?>",
    signature: "<?php echo $signPackage['signature'];?>",
    jsApiList: [
      'onMenuShareTimeline',
	  'onMenuShareAppMessage',
'onMenuShareQQ',
'onMenuShareWeibo',
'onMenuShareQZone'
    ]
  });
			 function wait2(form) {
	$.showLoading("正在提交数据...");
				            $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/addon/<?php echo $id;?>',
                dataType: 'json',
                type: 'POST',
				data:"",
				async:false,
				timeout : 5000,
                success: function (data) {
				$.hideLoading();
    if(data.ok==2){
                        console.log(data);
 $.toast("已经确认","cancel");
 
				setTimeout(function() {
        $.hideLoading();
		window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/join/<?php echo $id;?>";
        }, 1000);
                        }else if(data.ok==5){


 $.toast("不在开放的时间段","cancel");

	}else if(data.ok==1){


 $.toast("确认成功");
 				setTimeout(function() {
        $.hideLoading();

		window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/join/<?php echo $id;?>/<?php echo(time())?>";
       
        }, 1000);
	}
                 
                },
                error : function(e) {
				$.hideLoading();
                   $.toast("网络故障","forbidden"); 
					//window.location.href=location.href;
                }
            });
			 }
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
  text: "当前绑定的用户身份未实名<br>您可以选择重新绑定或参加活动",
  buttons: [
    { text: "取消", className: "default",
	onClick: function(){ 

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
             <a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>参与抽奖活动</h1>
            </div>
        </header>
        <article style="bottom: 0;">
            <ul class="xunjia-tab clearfix">
 <li class="green"> 参与确认</li> 
               		
            </ul>           <ul class="xunjia-box">
			
 <div class="weui_msg">
  <div class="weui_icon_area"> <?php if($ok=='0') { ?><i id="icon" class="weui_icon_msg weui_icon_download"></i><?php } else { ?>
   <i id="icon" class="weui_icon_msg weui_icon_success"></i><?php } ?></i></div>
  <div class="weui_text_area">
    <h2 class="weui_msg_title">欢迎参与抽奖</h2>
    <p class="weui_msg_desc">您正在参与抽奖活动:<br><?php echo $Array['title'];?></p><br>
  <?php if($ok=='0') { ?><p class="weui_msg_desc">请及时确认参与!!!</p><?php } else { ?>
     请等待现场抽奖<?php } ?>
  </div>
  <div class="weui_opr_area">
    <p class="weui_btn_area">
 <?php if($ok=='0') { ?>	<a class="weui_btn weui_btn_warn" onClick='return wait2();'>确认参与</a><?php } else { ?>
      <a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/read" class="weui_btn weui_btn_primary" onClick='return wait();'>查看结果</a><?php } ?>
    </p>
  </div>
  	  <?php if($type=='3') { ?><p class="weui_msg_desc">您是访客身份，获奖请及时联系现场工作人员</p>
  </div>
  <div class="weui_btn_area">
	 <a href="<?php echo $arrInfo['url'];?>/home/modify" class="weui_btn weui_btn_plain_default">查看绑定信息</a>
  </div><?php } ?>
  <div class="weui_btn_area">
    <a href="<?php echo $arrInfo['url'];?>/home/person_info" class="weui_btn weui_btn_plain_primary">查看个人资料</a></br>
  </div>
</div>
	 <div class="weui_msg">
	  <p class="weui_msg_desc">
   小薇工作室提供技术支持
  </p>  </div>
   </ul>
        </article>
		<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
		
    </body>        <footer>
           
        </footer>
		
</html>