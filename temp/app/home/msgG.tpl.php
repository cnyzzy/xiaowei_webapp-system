<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>分组<?php if($choose=='1') { ?>已读<?php } ?><?php if($choose=='0') { ?>未读<?php } ?>消息-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/xunjia_wuliao.css"/>
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
    </head>
    <body>
        <header>
            <div class="titlebar reverse">
                 <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe640;</i>
                </a>
                <h1><?php if($choose=='1') { ?>已读<?php } ?><?php if($choose=='0') { ?>未读<?php } ?>分组消息</h1>
            </div>
        </header>
        <article style="bottom: 0;">
           <div class="weui_cells weui_cells_access">
		   					  	<?php foreach((array)$GruopListArray as $key=>$loopChild) {?>
			                  <a class="weui_cell" href="/home/msgD/<?php echo $loopChild['id'];?>">
                    <div class="weui_cell_bd weui_cell_primary">
                        <div class="wuliao-title">
                            <label><?php echo $loopChild['title'];?></label>
                            <span>-<?php echo $loopChild['id'];?></span>
                        </div>
                        <div class="detail clearfix">
                            <span class="date">时间：<?php ECHO(date('Y-m-j G:i:s',$loopChild['addtime']))?></span>
                            <span class="require">发信人：<label><?php echo $loopChild['fromname'];?></label></span>
                            <span class="result">状态：<label><?php if($loopChild['isview']=='1') { ?>已读<?php } ?><?php if($loopChild['isview']=='0') { ?>未读<?php } ?></label></span>
                        </div>
                        <div class="org">
                            <span>内容：<?php ECHO(mb_substr($loopChild['addtime'],0,16,'utf-8'))?></span>
                            <?php if($loopChild['msgtype']=='1') { ?><label class="gray">用户</label><?php } ?> <?php if($loopChild['msgtype']=='2') { ?><label class="green">系统</label><?php } ?> <?php if($loopChild['msgtype']=='3') { ?><label class="yellow">应用</label><?php } ?> 
                        </div>
                    </div>
                </a>
           		<?php }?>

              
            </div>
        </article>
        
        <footer>
           
        </footer>

        <script src="lib/jquery-2.1.4.js"></script>
        <script src="js/jquery-weui.js"></script>
    </body>
</html>