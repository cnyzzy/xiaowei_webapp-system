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

.placeholder
{
    border: dotted;
    border-color: #FFF;
    border-width: 3px;}
img {

    width: 100%;
    overflow: hidden;
    background-color: #FFF;

}	
.weui-photo-browser-modal.weui-photo-browser-modal-visible {
    z-index: 2;
}
</style>
    </head>
    <body ontouchstart>
        <header>
            <div class="titlebar reverse">
			 <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1><?php if($NoticeArray['groupid']==3) { ?>校园风光<?php } ?><?php if($NoticeArray['groupid']==4) { ?>毕业存照<?php } ?><?php if($NoticeArray['groupid']!=4&&$NoticeArray['groupid']!=3) { ?>盐师相册<?php } ?></h1>
            </div>

         
        </header>
	 <?php if(isset($NoticeArray)) { ?>	 
		   
			<div class="weui-panel">
        <div class="weui-panel__hd">相册信息</div>
        <div class="weui-panel__bd">
          <div class="weui-media-box weui-media-box_text">
            <h4 class="weui-media-box__title"><?php echo $NoticeArray['title'];?></h4>
            <p class="weui-media-box__desc"><?php if($NoticeArray['dcontent']!='URL') { ?><?php echo $NoticeArray['dcontent'];?><?php } ?></p>
            <ul class="weui-media-box__info">
              <li class="weui-media-box__info__meta">时间</li>
              <li class="weui-media-box__info__meta"><?php ECHO(date('Y-m-j',$NoticeArray['addtime']))?></li>
              <li class="weui-media-box__info__meta weui-media-box__info__meta_extra"><?php echo $NoticeArray['editor'];?></li>
           </ul>
          </div>
        </div>
      </div>
	   <div class="weui-panel__hd">相册图片</div>	
 <div class="weui-flex">

      <?php if(!empty($NoticeArray['content'])) { ?><?php $seat1=json_decode($NoticeArray['content'],true);?>
	  <?php $num=count($seat1)-1;?>
	  <?php foreach((array)$seat1 as $key=>$loopChild2) {?>
	
      <div class="weui-flex__item"><div class="placeholder">            <a href="javascript:;">
              
                    <img class="imgdj" src="<?php echo $loopChild2;?>" dateurl='<?php echo $key;?>'>
         
                
            </a></div></div>

   <?php if($num==$key) { ?> </div><?php } ?>
  <?php if($num>$key&&$key%2==1) { ?> </div> <div class="weui-flex"><?php } ?>

<?php }?><?php } ?>
 

           		  <?php } else { ?>
			   <div class="weui-msg">
      <div class="weui-msg__icon-area"><i class="weui-icon-info weui-icon_msg"></i></div>
      <div class="weui-msg__text-area">
        <h2 class="weui-msg__title">敬请期待</h2>
        <p class="weui-msg__desc">暂时还没有内容哦 请去别处看看</p>
      </div> </div>
             <?php } ?>
		        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/js/jquery-weui.js"></script>
		  <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>
  <?php if(!empty($NoticeArray['content'])) { ?><?php $seat1=json_decode($NoticeArray['content'],true);?>
    <script src="<?php echo $arrInfo['url'];?>/app/60app/model/js/swiper.js"></script>

    <script>

      var pb1 = $.photoBrowser({
        items: [
			  <?php foreach((array)$seat1 as $key=>$loopChild2) {?>"<?php echo $loopChild2;?>",<?php }?>
        ],

        onSlideChange: function(index) {
          console.log(this, index);
        },

        onOpen: function() {
          console.log("onOpen", this);
        },
        onClose: function() {
          console.log("onClose", this);
        }
      });

	window.onload = function(){
			$('.imgdj').each(function() {
				if ($(this).attr("dateurl") != '') {
	
					$(this).on('click', function(event){
						var id = $(this).attr("dateurl");
		
					  pb1.open(id);
 
					});
				}
			});

		}
    </script>
<?php } ?>
 


       <?php include template('footer'); ?>