<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>校庆动态</title>
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
.weui-media-box__title {
    white-space: normal;
}</style>
    </head>
    <body ontouchstart>
        <header>
            <div class="titlebar reverse">
			 <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>校庆动态</h1>
            </div>

         
        </header>
		   <div class="weui-tab" style=" top: 44px;">
      <div class="weui-navbar">
        <a class="weui-navbar__item<?php if($NoticeW=='1') { ?> weui-bar__item--on<?php } ?>" href="#tab1">
          通知公告
        </a>
        <a class="weui-navbar__item<?php if($NoticeW=='2') { ?> weui-bar__item--on<?php } ?>" href="#tab2">
          大会安排
        </a>
   
      </div>
      <div class="weui-tab__bd">
        <div id="tab1" class="weui-tab__bd-item<?php if($NoticeW=='1') { ?> weui-tab__bd-item--active<?php } ?>">
         	  <?php if(isset($NoticeArray1)) { ?>	 
		    <div class="weui-panel">
        <div class="weui-panel__hd">内容</div>
		  <?php foreach((array)$NoticeArray1 as $key=>$loopChild) {?>
		
        <div class="weui-panel__bd"> 
		<a style="color:#000" class="weui_cell" href="/<?php echo $AppName;?>/noticeD/<?php echo $loopChild['id'];?>">
          <div class="weui-media-box weui-media-box_text">
            <h4 class="weui-media-box__title"><?php echo $loopChild['title'];?><?php if($loopChild['istop']==1) { ?><font color="red">[置顶]</font><?php } ?></h4>
            <p class="weui-media-box__desc"><?php if($loopChild['dcontent']!='URL') { ?><?php echo $loopChild['dcontent'];?><?php } ?></p>
            <ul class="weui-media-box__info">
              <li class="weui-media-box__info__meta">时间</li>
              <li class="weui-media-box__info__meta"><?php ECHO(date('Y-m-j',$loopChild['addtime']))?></li>
              <li class="weui-media-box__info__meta weui-media-box__info__meta_extra"><?php echo $loopChild['editor'];?></li>
            </ul>
          </div></a>
        </div>
 
		  
	
              <?php }?></div>
           		  <?php } else { ?>
			   <div class="weui-msg">
      <div class="weui-msg__icon-area"><i class="weui-icon-info weui-icon_msg"></i></div>
      <div class="weui-msg__text-area">
        <h2 class="weui-msg__title">敬请期待</h2>
        <p class="weui-msg__desc">我们正在为您准备丰富的内容</p>
      </div> </div>
             <?php } ?>
        </div> 
        <div id="tab2" class="weui-tab__bd-item<?php if($NoticeW=='2') { ?> weui-tab__bd-item--active<?php } ?>">
         	  <?php if(isset($NoticeArray2)) { ?>	 
		    <div class="weui-panel">
        <div class="weui-panel__hd">内容</div>
		  <?php foreach((array)$NoticeArray2 as $key=>$loopChild) {?>
		
        <div class="weui-panel__bd"> 
		<a  style="color:#000" class="weui_cell" href="/<?php echo $AppName;?>/noticeD/<?php echo $loopChild['id'];?>">
          <div class="weui-media-box weui-media-box_text">
            <h4 class="weui-media-box__title"><?php echo $loopChild['title'];?><?php if($loopChild['istop']==1) { ?><font color="red">[置顶]</font><?php } ?></h4>
            <p class="weui-media-box__desc"><?php if($loopChild['dcontent']!='URL') { ?><?php echo $loopChild['dcontent'];?><?php } ?></p>
            <ul class="weui-media-box__info">
              <li class="weui-media-box__info__meta">时间</li>
              <li class="weui-media-box__info__meta"><?php ECHO(date('Y-m-j',$loopChild['addtime']))?></li>
              <li class="weui-media-box__info__meta weui-media-box__info__meta_extra"><?php echo $loopChild['editor'];?></li>
            </ul>
          </div></a>
        </div>
 
		  
	
              <?php }?> </div>
			  <?php } else { ?>
			   <div class="weui-msg">
      <div class="weui-msg__icon-area"><i class="weui-icon-info weui-icon_msg"></i></div>
      <div class="weui-msg__text-area">
        <h2 class="weui-msg__title">敬请期待</h2>
        <p class="weui-msg__desc">我们正在为您准备丰富的内容</p>
      </div> </div>
             <?php } ?>
        </div> 
    
      </div>
    </div>
   

		        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/js/jquery-weui.js"></script>
		  <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/fastclick.js"></script>
		  <script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>
       <?php include template('footer'); ?>