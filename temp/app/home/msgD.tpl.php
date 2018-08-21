<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>消息详情-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/xunjia_wuliao_detail.css"/>
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
		function confirm1()
{
	if(confirm("确定删除吗?"))
	  	return true;
	else
		return false;
}</script>
    </head>
    <body>
        <header>
            <div class="titlebar reverse">
             <a href="<?php if($MsgArr['isview']==0) { ?>/home/msg<?php } else { ?>javascript:history.go(-1);<?php } ?>">
                    <i class="iconfont">&#xe640;</i>
                </a>
                <h1>消息详情</h1>
            </div>
        </header>
        <article style="bottom: 0;">
            <ul class="xunjia-box">
                <li class="inner">
                    <div class="item-name">发信人：</div>
                    <div class="item-value"><?php echo $MsgArr['fromname'];?></div>
                </li>
                <li class="inner">
                    <div class="item-name">时间：</div>
                    <div class="item-value"><?php ECHO(date('Y-m-j G:i:s',$MsgArr['addtime']))?></div>
                </li>
                <li class="inner">
                    <div class="item-name">标题：</div>
                    <div class="item-value">
                        <?php echo $MsgArr['title'];?>
                    </div>
                </li>
              <li class="inner">
                    <div class="item-name">内容：</div>
                    <div class="item-value">
                        <p><?php echo $MsgArr['content'];?></p>
                    </div>
                </li>
                
                <li class="inner innerP">
                    <div class="item-name">操作：</div>
                    <div class="item-value green">
                        <A href="<?php if($MsgArr['isok']==1) { ?>/home/msgdelete/<?php echo $MsgArr['id'];?><?php } ?>" onClick='return confirm1();'>删除</A> 
                    </div>
					  
                </li>
            </ul>
        </article>
        
        <footer>
           
        </footer>

        <script src="lib/jquery-2.1.4.js"></script>
        <script src="js/jquery-weui.js"></script>
    </body>
</html>