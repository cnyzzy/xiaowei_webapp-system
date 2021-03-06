<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title><?php echo $NoticeArray['title'];?>-<?php echo $arrInfo['name'];?></title>
     <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/lib/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/css/jquery-weui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/notice_detail.css"/>
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
        })(document, window);</script>
				<style>
	.titlebar.reverse {
    background-color: #df4d26;
    border-color: #000;
}
img {
    max-width: 95%;
    max-height: 100%;
}
</style>
    </head>
    <body>
			
        <header>
            <div class="titlebar reverse">
                <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1><?php echo $NoticeArray['title'];?></</h1>
            </div>
        </header>
        <article>

        </article>
        <article class="weui_article">
		<video id="video" controls=""  src="<?php echo $NoticeArray['content'];?>"preload="auto" mediagroup="myVideoGroup" poster="<?php echo $NoticeArray['smallimg'];?>"webkit-playsinline="true"  playsinline="true"  x-webkit-airplay="allow" x5-video-player-type="h5" x5-video-player-fullscreen="true" x5-video-orientation="landscape" style="object-fit:fill;width:100%">
      <source id="mp4" type="video"> 

      <p>Your user agent does not support the HTML5 Video element.</p> 
</video> 
<!-- 必须加在微信api资源 --> 
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script> 
<script> 

</script> 
            
        </article>
                <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
<?php if(isset($arrInfo['tjcode60'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode60'];?></div><?php } ?> 
    </body>
</html>