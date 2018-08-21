<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title><?php echo $row['name'];?>电话详情-<?php echo $arrInfo['name'];?></title>
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
  $.toast("非教职工<br>不可使用","cancel");
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
                <h1>电话详情</h1>
            </div>
        </header>
        <article style="bottom: 0;">
		<div class="weui_search_bar" id="search_bar" style="position:relative; z-index:0;">
  <form action="<?php echo $arrInfo['url'];?>/jsdh/s" method="post" class="weui_search_outer">
    <div class="weui_search_inner">
      <i class="weui_icon_search"></i>
      <input type="search" class="weui_search_input" id="search_input" name="searchpost" placeholder="搜索姓名或部门" required/>
      <a href="javascript:" class="weui_icon_clear" id="search_clear"></a>
    </div>
    <label for="search_input" class="weui_search_text" id="search_text">
      <i class="weui_icon_search"></i>
      <span>搜索</span>
    </label>
  </form>
  <a href="javascript:" class="weui_search_cancel" id="search_cancel">取消</a>
</div> 
            <ul class="xunjia-tab clearfix">

				
            </ul>           <ul class="xunjia-box">


<div class="weui_cells">
<?php if(!empty($row)) { ?>
<div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>部门</p>
    </div>
    <div class="weui_cell_ft" style="max-width:70%;">
       <p style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php if(!empty($row['bm'])) { ?><?php echo $row['bm'];?><?php } ?></p>
    </div></div><div class="weui_cell">
	    <div class="weui_cell_bd weui_cell_primary">
      <p>姓名</p>
    </div>
	 <div class="weui_cell_ft" style="max-width:70%;">
       <p style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php if(!empty($row['name'])) { ?><?php echo $row['name'];?><?php } ?></p>
    </div>
  </div>  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
<div class="weui_cell_ft" style="max-width:70%;">
       <p style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"></p>
    </div></div>
 
<?php if(!empty($row['bgdh2'])||!empty($row['bgdh1'])) { ?>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">办公电话</p>
    </div>
    <div class="weui_cell_ft" style="max-width:70%;">
       <p style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php if(!empty($row['bgdh1'])&&!is_numeric($row['bgdh1'])) { ?><?php echo $row['bgdh1'];?><?php } ?><?php if(!empty($row['bgdh1'])&&is_numeric($row['bgdh1'])) { ?><a href="tel:<?php echo $row['bgdh1'];?>"><?php echo $row['bgdh1'];?></a><?php } ?></p>
    </div>
  </div>  
  <?php if(!empty($row['bgdh2'])) { ?>  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft" style="max-width:95%;">
       <p style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php if(!empty($row['bgdh2'])&&!is_numeric($row['bgdh2'])) { ?><?php echo $row['bgdh2'];?><?php } ?><?php if(!empty($row['bgdh2'])&&is_numeric($row['bgdh2'])) { ?><a href="tel:<?php echo $row['bgdh2'];?>"><?php echo $row['bgdh2'];?></a><?php } ?></p>
    </div>
  </div>  <?php } ?>
  <?php } ?>
  <?php if(!empty($row['zd'])) { ?>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">宅电</p>
    </div>
    <div class="weui_cell_ft" style="max-width:70%;">
       <p style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php if(!empty($row['zd'])&&!is_numeric($row['zd'])) { ?><?php echo $row['zd'];?><?php } ?><?php if(!empty($row['zd'])&&is_numeric($row['zd'])) { ?><a href="tel:<?php echo $row['zd'];?>"><?php echo $row['zd'];?></a><?php } ?></p>
    </div>
  </div>  

  <?php } ?>
  <?php if(!empty($row['sjhm2'])||!empty($row['sjhm1'])) { ?>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">手机号码</p>
    </div>
    <div class="weui_cell_ft" style="max-width:70%;">
       <p style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php if(!empty($row['sjhm1'])&&!is_numeric($row['sjhm1'])) { ?><?php echo $row['sjhm1'];?><?php } ?><?php if(!empty($row['sjhm1'])&&is_numeric($row['sjhm1'])) { ?><a href="tel:<?php echo $row['sjhm1'];?>"><?php echo $row['sjhm1'];?></a><?php } ?></p>
    </div>
  </div>  
  <?php if(!empty($row['sjhm2'])) { ?>  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft" style="max-width:95%;">
       <p style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php if(!empty($row['sjhm2'])&&!is_numeric($row['sjhm2'])) { ?><?php echo $row['sjhm2'];?><?php } ?><?php if(!empty($row['sjhm2'])&&is_numeric($row['sjhm2'])) { ?><a href="tel:<?php echo $row['sjhm2'];?>"><?php echo $row['sjhm2'];?></a><?php } ?></p>
    </div>
  </div>  <?php } ?>
  <?php } ?>
    <?php if(!empty($row['jtdh'])) { ?>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">集团短号</p>
    </div>
    <div class="weui_cell_ft" style="max-width:70%;">
       <p style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php if(!empty($row['jtdh'])&&!is_numeric($row['jtdh'])) { ?><?php echo $row['jtdh'];?><?php } ?><?php if(!empty($row['jtdh'])&&is_numeric($row['jtdh'])) { ?><a href="tel:<?php echo $row['jtdh'];?>"><?php echo $row['jtdh'];?></a><?php } ?></p>
    </div>
  </div>  

  <?php } ?>
  <?php } ?>
</div>
	
	
   </ul>
        </article>
<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>        <footer>
           
        </footer>
		
</html>