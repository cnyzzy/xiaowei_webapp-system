<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>盐师春秋</title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/lib/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/css/jquery-weui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/notice.css"/>
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
.weui-msg {
    padding-top: 70px;
    text-align: center;
}
.weui-media-box_appmsg .weui-media-box__hd {
    margin-right: .8em;
    width: 120px;
    height: 100px;
    line-height: 180px;
    text-align: center;
}
</style>
    </head>
    <body ontouchstart>
        <header>
            <div class="titlebar reverse">
			 <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1><?php if($NoticeW==3) { ?>校园风光<?php } ?><?php if($NoticeW==4) { ?>毕业存照<?php } ?><?php if($NoticeW!=4&&$NoticeW!=3) { ?>盐师相册<?php } ?></h1>
            </div>

         
        </header>
	 <?php if(isset($NoticeArray1)) { ?>	 
		    <div class="weui-panel">
        <div class="weui-panel__hd">内容</div>
		  <?php foreach((array)$NoticeArray1 as $key=>$loopChild) {?>
		        <div class="weui-panel__bd"> 
				 
		<?php $d=json_decode($loopChild['dcontent'],true);?>
<?php $loopChild['dcontent2']=$d['dcontent'];?>
<?php $loopChild['smallimg']=$d['smallimg'];?>
<a href="/<?php echo $AppName;?>/imgD/<?php echo $loopChild['id'];?>" class="weui-media-box weui-media-box_appmsg">
            <div class="weui-media-box__hd">
              <img class="weui-media-box__thumb" src="<?php echo $loopChild['smallimg'];?>" alt="">
            </div>
            <div class="weui-media-box__bd">
              <h4 class="weui-media-box__title"><?php echo $loopChild['title'];?><?php if($loopChild['istop']==1) { ?><font color="red">[置顶]</font><?php } ?></h4>
              <p class="weui-media-box__desc"><?php if($loopChild['dcontent2']!='URL') { ?><?php echo $loopChild['dcontent2'];?><?php } ?></p>
            </div>
          </a>

        </div>

              <?php }?></div>
           		  <?php } else { ?>
			   <div class="weui-msg">
      <div class="weui-msg__icon-area"><i class="weui-icon-info weui-icon_msg"></i></div>
      <div class="weui-msg__text-area">
        <h2 class="weui-msg__title">空空如也</h2>
        <p class="weui-msg__desc">暂时还没有内容哦 请去别处看看</p>
      </div> </div>
             <?php } ?>
		        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/js/jquery-weui.js"></script>
		  <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/fastclick.js"></script>
       <?php include template('footer'); ?>