<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>全局检索详情-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/jsdh/model/css/pages/xunjia_detail.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/jsdh/model/css/style.css">
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
              $(document).ready(function(){  

  if(<?php echo $yunxu;?>==0){
  $.toast("不可使用","cancel");
			 setTimeout(function() {
          window.location.reload(true);
        }, 2000)}
 });
         </script>
		 
    </head>
    <body>
        <header>
		
         <div class="titlebar reverse">
             <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>全局检索</h1>
            </div>
        </header>  
        <article style="bottom: 0;"><div class="weui_search_bar" id="search_bar" style="position:relative; z-index:0;">
  <form action="<?php echo $arrInfo['url'];?>/home/zys/s" method="post" class="weui_search_outer">
    <div class="weui_search_inner">
      <i class="weui_icon_search"></i>
      <input type="search" class="weui_search_input" id="search_input" name="s" placeholder="搜索" value="<?php if(!empty($postn)) { ?><?php echo $postn;?><?php } ?>" required/>
      <a href="javascript:" class="weui_icon_clear" id="search_clear"></a>
    </div>
    <label for="search_input" class="weui_search_text" id="search_text">
      <i class="weui_icon_search"></i>
      <span><?php if(empty($postn)) { ?>搜索<?php } else { ?><?php echo $postn;?><?php } ?></span>
    </label>
  </form>
  <a href="javascript:" class="weui_search_cancel" id="search_cancel">取消</a>
</div> 
            <ul class="xunjia-tab clearfix">

				
            </ul>       <ul class="xunjia-box">
			<?php if(!empty($row1)) { ?><div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">详细</div>
  <div class="weui_panel_bd"><?php foreach((array)$row1 as $key=>$Child) {?>
    <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
	
      <div class="weui_media_bd">
        <h4 class="weui_media_title"><?php echo @$key;?></h4>
        <p class="weui_media_desc"><?php echo @$Child;?></p>
      </div>
    </a>
<?php }?>
  </div>
 
</div><?php } ?>
			<div class="weui_cells weui_cells_access">

<?php if(empty($row1)&&!empty($postn)) { ?>
	<div class="weui_cell"><div class="weui_cell"><div class="weui_cell_bd weui_cell_primary">
      <p><b>无结果，请重新搜索</b></p>
    </div>
    <div class="weui_cell_ft">
      <b></b>
    </div></div></div><?php } ?>
<?php if(empty($row1)&&empty($postn)) { ?>
	<div class="weui_cell"><div class="weui_cell"><div class="weui_cell_bd weui_cell_primary">
      <p><b>欢迎使用全局检索</b></p>
    </div>
    <div class="weui_cell_ft">
      <b></b>
    </div></div></div>
		<div class="weui_cell"><div class="weui_cell"><div class="weui_cell_bd weui_cell_primary">
      <p><b></b></p>
    </div>
    <div class="weui_cell_ft">
      <b>小薇平台超级权限</b>
    </div></div></div>
	<div class="weui_cell"><div class="weui_cell"><div class="weui_cell_bd weui_cell_primary">
      <p><b></b></p>
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