<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>办公电话详情-<?php echo $arrInfo['name'];?></title>
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
                <h1>办公电话详情</h1>
            </div>
        </header>
        <article style="bottom: 0;">
            <ul class="xunjia-tab clearfix">

				
            </ul>           <ul class="xunjia-box">


<div class="weui_cells">
<?php if(!empty($row)) { ?>
<div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>部门</p>
    </div>
    <div class="weui_cell_ft" style="max-width:70%;">
       <p style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php if(!empty($row[0]['dev'])) { ?><?php echo $row[0]['dev'];?><?php } ?></p>
    </div></div><div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
	<div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
  </div>  
	<?php foreach((array)$row as $key=>$Child) {?>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php echo @$Child['officename'];?></p>
    </div>
    <div class="weui_cell_ft" style="max-width:70%;">
       <p style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php if(!empty($Child['telphone1'])&&strlen($Child['telphone1'])!=8&&!is_numeric($Child['telphone1'])) { ?><?php echo $Child['telphone1'];?><?php } ?><?php if(!empty($Child['telphone1'])&&strlen($Child['telphone1'])==8&&is_numeric($Child['telphone1'])) { ?><a href="tel:<?php echo $Child['telphone1'];?>"><?php echo $Child['telphone1'];?></a><?php } ?></p>
    </div>
  </div>  
  <?php if(!empty($Child['telphone2'])) { ?>  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft" style="max-width:95%;">
      <p style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php if(!empty($Child['telphone2'])&&strlen($Child['telphone2'])!=8&&!is_numeric($Child['telphone1'])) { ?><?php echo $Child['telphone2'];?><?php } ?><?php if(!empty($Child['telphone2'])&&strlen($Child['telphone2'])==8&&is_numeric($Child['telphone2'])) { ?><a href="tel:<?php echo $Child['telphone2'];?>"><?php echo $Child['telphone2'];?></a><?php } ?></p>
    </div>
  </div>  <?php } ?><?php }?><?php } ?>
</div>
	
	
   </ul>
        </article>
<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>        <footer>
           
        </footer>
		
</html>