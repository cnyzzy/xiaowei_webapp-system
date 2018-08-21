<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>公告-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/animate.css"/>
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
    </head>
    <body>
        <header>
            <div class="titlebar reverse">
                <h1>公告</h1>
            </div>
            <ul class="tabbar animate-slide width-full" data-col="7" id="tabbar">
               <a class="cell" href="/<?php echo $AppName;?>/notice/1"> <li class="tab<?php if($NoticeW=='1') { ?> active<?php } ?>">
                    <label class="tab-label">平台公告</label>
                </li></a>
                 <a class="cell" href="/<?php echo $AppName;?>/notice/2">  <li class="tab<?php if($NoticeW=='2') { ?> active<?php } ?>">
                    <label class="tab-label">微信推送</label></hr>
                </li></a>
                 <a class="cell" href="/<?php echo $AppName;?>/notice/3">  <li class="tab<?php if($NoticeW=='3') { ?> active<?php } ?>">
                    <label class="tab-label">学校通知</label>
                </li></a>
                  <a class="cell" href="/<?php echo $AppName;?>/notice/4"> <li class="tab<?php if($NoticeW=='4') { ?> active<?php } ?>">
                    <label class="tab-label">活动相关</label>
                </li></a>
        
            </ul>
        </header>
        <article style="padding-bottom: 54px;padding-top:70px;">
		  <?php if(isset($NoticeArray )) { ?>	  	<?php foreach((array)$NoticeArray as $key=>$loopChild) {?>
            <div class="weui_cells weui_cells_access animated fadeInRight">
              <a class="weui_cell" href="/<?php echo $AppName;?>/noticeD/<?php echo $loopChild['id'];?>">
                <div class="weui_cell_bd weui_cell_primary">
                    <p class="title<?php if($key==0||$loopChild['addtime']-time()<48*3600) { ?> new<?php } ?>"><?php echo $loopChild['title'];?><?php if($loopChild['istop']==1) { ?> [置顶]<?php } ?></p>
                    <p class="date"><?php echo $loopChild['editor'];?> <?php ECHO(date('Y-m-j',$loopChild['addtime']))?></p>
                    <p class="info"><?php echo $loopChild['dcontent'];?></p>
                </div>
              </a>
              <?php }?>
             <?php } ?>
            </div>
        </article>
       <?php include template('footer'); ?>