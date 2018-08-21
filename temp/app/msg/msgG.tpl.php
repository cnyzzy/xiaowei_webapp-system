<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>分组<?php if($choose=='1') { ?>已读<?php } ?><?php if($choose=='0') { ?>未读<?php } ?>消息-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
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
        })(document, window);
		</script>
    </head>
    <body>
        <header>
            <div class="titlebar reverse">
                 <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1><?php if($choose=='1') { ?>已读<?php } ?><?php if($choose=='0') { ?>未读<?php } ?>分组消息</h1>
            </div>
        </header>
        <article style="bottom: 0;">
           <div class="weui_cells weui_cells_access">
		   					  	<?php foreach((array)$GruopListArray as $key=>$loopChild) {?>
			                  <a class="weui_cell" href="/<?php echo $AppName;?>/msgD/<?php echo $loopChild['id'];?>">
                    <div class="weui_cell_bd weui_cell_primary">
                        <div class="wuliao-title">
                            <label><?php echo $loopChild['title'];?></label>
                            <span>-<?php echo $loopChild['id'];?></span>
                        </div>
                        <div class="detail clearfix">
                            <span class="date">时间：<?php ECHO(date('y-m-j G:i',$loopChild['addtime']))?></span>
                            <span class="require">来自：<FONT color="#3c6080"><?php echo $loopChild['fromname'];?></font></span>
                        </div>
                        <div class="org">
                            <span style="    width: 85%;">内容：<?php ECHO(mb_substr($loopChild['content'],0,24,'utf-8'))?></span>
                            <?php if($loopChild['msgtype']=='1') { ?><label class="gray">用户</label><?php } ?> <?php if($loopChild['msgtype']=='2') { ?><label class="green">系统</label><?php } ?> <?php if($loopChild['msgtype']=='3') { ?><label class="yellow">应用</label><?php } ?> 
                        </div>
                    </div>
                </a>
           		<?php }?>

              
            </div>
        </article>
        
        <footer>
           
        </footer>

        <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
		<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>
</html>