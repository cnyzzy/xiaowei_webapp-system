<?php defined('ZRoot') or die('Access Denied.'); ?>    <?php if($MsgAllNum=='0'||($MsgNum=='0'&&$choose=='1')) { ?><?php include template('nomsg'); ?><?php } else { ?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title> <?php if($choose=='1') { ?>已读<?php } ?><?php if($choose=='0') { ?>未读<?php } ?>消息-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/tasks.css"/>
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
                <h1><?php if($choose=='1') { ?>已读<?php } ?><?php if($choose=='0') { ?>未读<?php } ?>消息</h1>
            </div>
        </header>
        <article style="bottom: 54px;">
            <div class="weui_cells weui_cells_access animated fadeInRight">
				  <?php if(isset($MsgArray)) { ?>	  	<?php foreach((array)$MsgArray as $key=>$loopChild) {?>
              <a class="weui_cell" href="/<?php echo $AppName;?>/msgG/<?php echo $loopChild['groupid'];?><?php if($choose=='1') { ?>/1<?php } ?>">
                <div class="weui_cell_bd weui_cell_primary"> 
                    <p><i class="iconfont">&#xe61f;</i><strong><?php echo $loopChild['num'];?></strong>条  <?php if($loopChild['msgtype']=='1') { ?>私人消息<?php } ?> <?php if($loopChild['msgtype']=='2') { ?>系统消息<?php } ?> <?php if($loopChild['msgtype']=='3') { ?>【<?php echo $loopChild['fromname'];?>】APP消息<?php } ?></p>
                </div>
                <div class="iconfont">&#xe661;</div>
              </a>
           		<?php }?>
             <?php } ?>
             <?php if($choose=='0') { ?>  <a class="weui_cell" href="/<?php echo $AppName;?>/index/1">
                <div class="weui_cell_bd weui_cell_primary">
                    <p><i class="iconfont">&#xe630;</i><strong>查看已读消息</strong></p>

                </div>
                <div class="iconfont">&#xe661;</div>
              </a><?php } ?>
               <?php if($choose=='1') { ?>  <a class="weui_cell" href="/<?php echo $AppName;?>">
                <div class="weui_cell_bd weui_cell_primary">
                    <p><i class="iconfont">&#xe61f;</i><strong>查看未读消息</strong></p>

                </div>
                <div class="iconfont">&#xe661;</div>
              </a><?php } ?>
            </div>
        </article>
      <?php include template('footer'); ?><?php } ?>