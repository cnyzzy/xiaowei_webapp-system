<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>动态详情-<?php echo $arrInfo['name'];?></title>
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
    max-width: 100%;
    max-height: 100%;margin: 0 auto
}

p[style] {
white-space: normal !important;
}
span[style] {
white-space: normal !important;
}
i, span[style]{
  display:unset;
    vertical-align: middle;
}
p span[style] {
    vertical-align: unset;
}
</style>
    </head>
    <body>
	
        <header>
            <div class="titlebar reverse">
                <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>详情</h1>
            </div>
        </header>
        <article>
            <div class="weui_cells">
                <div class="weui_cell">
                    <div class="weui_cell_bd weui_cell_primary">
                        <p><?php echo $NoticeArray['title'];?></p>
                    </div>
                </div>
                <div class="weui_cell no-padding">
                    <div class="weui_cell_bd weui_cell_primary">
                        <span><?php echo $NoticeArray['editor'];?> <?php ECHO(date('Y-m-j',$NoticeArray['addtime']))?></span>
                    </div>
                </div>
            </div>
        </article>
        <article class="weui_article">
            <?php echo $NoticeArray['content'];?>
        </article>
                <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>

<?php if(isset($arrInfo['tjcode60'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode60'];?></div><?php } ?> 
    </body>
</html>