<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>应用-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/font.css?123"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/app.css"/>

					<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
					
								<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
        <script>
		
        (function (doc, win) {
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
		
		$(document).ready(function(){  
		 <?php if(!EMPTY($NoticeNum)&&($NoticeNum!=0)) { ?>
   $.notification({
  title: "公告通知",
  text: "有最新置顶公告，不来看看么？",//
   media: "<img src='http://weixin.yctu.edu.cn/xw.jpg'>",
  data: "123",
  onClick: function(data) {
window.location.href = 'http://weixin.yctu.edu.cn/notice';
  },
  onClose: function(data) {

  }
});<?php } ?>

 <?php if(!EMPTY($MsgNum)&&($MsgNum!=0)) { ?>
   $.notification({
  title: "消息通知",
  text: "您有<?php echo $MsgNum;?>条未读消息，请注意查收",//
   media: "<img src='http://weixin.yctu.edu.cn/xw.jpg'>",
  data: "123",
  onClick: function(data) {
window.location.href = 'http://weixin.yctu.edu.cn/msg';
  },
  onClose: function(data) {

  }
});<?php } ?>

 <?php if(isset($params[0])&&!EMPTY($params[0])&&$_SESSION['my']=='QQ') { ?>
  $.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/home/qwait",
		 async:true, 
		 timeout : 5000,
		 data:"&isis=1",
		
        success:function(result){ 


	}, 
         error:function (result) {   

         }, 
  });
<?php } ?>
<?php if(isset($params[0])&&!EMPTY($params[0])&&$_SESSION['my']=='WB') { ?>
  $.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/home/twait",
		 async:true, 
		 timeout : 5000,
		 data:"&isis=1",
		
        success:function(result){ 


	}, 
         error:function (result) {   

         }, 
  });
<?php } ?>
 });
    </script>
    </head>
    <body>
        <header>
            <div class="titlebar reverse">
                <h1>应用</h1>
            </div>
        </header>
        <article style="line-height:auto!import;padding-bottom: 54px;padding-top:44px;">
		  	<?php foreach((array)$Group as $key=>$loopChild) {?>
            <div class="list-wrap">
                <h4><?php echo $loopChild['groupname'];?></h4>
                <ul class="app-list">
            
				  	<?php foreach((array)$List[$loopChild['groupid']] as $key2=>$Child) {?> <li>
                        <div class="app-wrap">
                            <a href="<?php echo $Child['url'];?>">
                                <i class="iconfont"><?php echo $Child['ico'];?></i>
                                <span class="sss"><?php echo $Child['name'];?></span>
                            </a>
                        </div>
                        
                    </li><?php }?>
                    
                   
                    
                </ul>
            </div>
<?php }?>
           
        </article>
<?php include template('footer'); ?>