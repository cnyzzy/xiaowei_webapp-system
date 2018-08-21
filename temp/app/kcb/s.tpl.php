<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>课程表搜索-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/xunjia_detail.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style.css">
		    <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>	
		<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/kcb/model/js/mui.min.js"></script>
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
                <h1>课程表搜索</h1>
            </div>
        </header>  
        <article style="bottom: 0;">
            <ul class="xunjia-tab clearfix">
<div class="weui_search_bar" id="search_bar" style="position:relative; z-index:0;">
  <form action="<?php echo $arrInfo['url'];?>/kcb/s" method="post" class="weui_search_outer">
    <div class="weui_search_inner">
      <i class="weui_icon_search"></i>
      <input type="search" class="weui_search_input" id="search_input" name="searchpost" placeholder="搜索教室或教师的课表" value="<?php if(!empty($postn)) { ?><?php echo $postn;?><?php } ?>" required/>
      <a href="javascript:" class="weui_icon_clear" id="search_clear"></a>
    </div>
    <label for="search_input" class="weui_search_text" id="search_text">
      <i class="weui_icon_search"></i>
      <span><?php if(empty($postn)) { ?>搜索<?php } else { ?><?php echo $postn;?><?php } ?></span>
    </label>
  </form>
  <a href="javascript:" class="weui_search_cancel" id="search_cancel">取消</a>
</div> 
				
            </ul>       <ul class="xunjia-box">
			<div class="weui_cells weui_cells_access"><?php if(!empty($row1)) { ?>
	<div class="weui_cell"><div class="weui_cell"><div class="weui_cell_bd weui_cell_primary">
      <p><b>教师</b></p>
    </div>
    <div class="weui_cell_ft">
      <b></b>
    </div></div></div>
	<?php foreach((array)$row1 as $key=>$Child) {?>
  <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/kcb/teacher/<?php echo(urlencode($Child['cteacher']))?>">
    <div class="weui_cell_bd weui_cell_primary"style="max-width:75%;">
      <p style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php echo @$Child['cteacher'];?></p>
    </div>
    <div class="weui_cell_ft"><b><?php echo @$Child['num'];?></b>节课</div>
  </a> 
<?php }?><?php } ?>
<?php if(!empty($row2)) { ?>
	<div class="weui_cell"><div class="weui_cell"><div class="weui_cell_bd weui_cell_primary">
      <p><b>教室</b></p>
    </div>
    <div class="weui_cell_ft">
      <b></b>
    </div></div></div>
	<?php foreach((array)$row2 as $key=>$Child) {?>
  <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/kcb/room/<?php echo(urlencode($Child['cplace']))?>">
    <div class="weui_cell_bd weui_cell_primary"style="max-width:75%;">
      <p style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php echo @$Child['cplace'];?></p>
    </div>
    <div class="weui_cell_ft"><b><?php echo @$Child['num'];?></b>节课</div>
  </a> 
<?php }?><?php } ?>
<?php if(!empty($row3)) { ?>
	<div class="weui_cell"><div class="weui_cell"><div class="weui_cell_bd weui_cell_primary">
      <p><b>学生</b></p>
    </div>
    <div class="weui_cell_ft">
      <b></b>
    </div></div></div>
	<?php foreach((array)$row3 as $key=>$Child) {?>
  <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/kcb/kcb/<?php echo(urlencode($Child['number']))?>">
    <div class="weui_cell_bd weui_cell_primary"style="max-width:75%;">
      <p style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php echo @$Child['number'];?></p>
    </div>
    <div class="weui_cell_ft"><b><?php echo @$Child['num'];?></b>节课</div>
  </a> 
<?php }?><?php } ?>
<?php if(!empty($row4)) { ?>
	<div class="weui_cell"><div class="weui_cell"><div class="weui_cell_bd weui_cell_primary">
      <p><b>课程</b></p>
    </div>
    <div class="weui_cell_ft">
      <b></b>
    </div></div></div>
	<?php foreach((array)$row4 as $key=>$Child) {?>
  <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/kcb/c/<?php echo(urlencode($Child['cname']))?>">
    <div class="weui_cell_bd weui_cell_primary"style="max-width:70%;">
      <p style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php echo @$Child['cname'];?></p>
    </div>
    <div class="weui_cell_ft"><b><?php echo @$Child['num'];?></b>节课</div>
  </a> 
<?php }?><?php } ?>
<?php if(empty($row3)&&empty($row1)&&empty($row2)&&empty($row4)&&!empty($postn)) { ?>
	<div class="weui_cell"><div class="weui_cell"><div class="weui_cell_bd weui_cell_primary">
      <p><b>无结果，请重新搜索</b></p>
    </div>
    <div class="weui_cell_ft">
      <b></b>
    </div></div></div><?php } ?>
<?php if(empty($postn)) { ?>
	<div class="weui_cell"><div class="weui_cell"><div class="weui_cell_bd weui_cell_primary">
      <p><b>欢迎使用课程表搜索</b></p>
    </div>
    <div class="weui_cell_ft">
      <b></b>
    </div></div></div><?php } ?>	
</div>
	

   </ul>
        </article>	 

    </body>        <footer>
           
        </footer>
		
</html>