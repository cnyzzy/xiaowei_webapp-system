<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>消息详情-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/xunjia_wuliao_detail.css"/>
		        <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
	

        <script>
		$(document).ready(function(){  
		  $('#p1z').each(function () {
  this.setAttribute('style', 'height:' + (this.scrollHeight+40) + 'px;overflow-y:hidden;');
}).on('input', function () {
  this.style.height = 'auto';
  this.style.height = (this.scrollHeight) + 'px';
});

 });

		(function (doc, win) {
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
$.confirm("确认删除么？", function() {
 $.showLoading();
     $.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/msgdelete/<?php echo $MsgArr['id'];?>",
		data:"&do=isdetele",
		beforeSend:function(){},
		success:function(result){
			$.hideLoading();
			$.toast("删除成功");
			 setTimeout(function() {
          window.location.reload(true);
        }, 800)
				 
			
		}
	})
  }, function() {
  $.toast("取消操作", "cancel");
  return false;
  });

		
}</script>
    </head>
    <body>
        <header>
            <div class="titlebar reverse">
             <a href="<?php if($MsgArr['isview']==0) { ?>/<?php echo $AppName;?><?php } else { ?>javascript:history.go(-1);<?php } ?>">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>消息详情</h1>
            </div>
        </header>
        <article style="bottom: 0;">
		<div class="weui_panel">
  <div class="weui_panel_hd">信息</div>
  <div class="weui_panel_bd">
		<div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>发信人</p>
    </div>
    <div class="weui_cell_ft">
      <?php echo $MsgArr['fromname'];?>
    </div>
  </div>
   <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>时间</p>
    </div>
    <div class="weui_cell_ft">
     <?php ECHO(date('Y-m-j G:i:s',$MsgArr['addtime']))?>
    </div>
  </div>
   <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>标题</p>
    </div>
    <div class="weui_cell_ft">
     <?php echo $MsgArr['title'];?>
    </div>
  </div>
  </div>
</div>  </div>

<div class="weui_panel">
  <div class="weui_panel_hd">内容</div>
  <div class="weui_panel_bd">
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title"></h4>
      <p id="pz" style=""><?php if(!empty($MsgArr['content'])) { ?> <?php echo $MsgArr['content'];?><?php } ?></p>
      <ul class="weui_media_info">

      </ul>
    </div>
  </div>
</div>
<div class="weui_panel">
  <div class="weui_cell">
  <div class="weui_cell_bd weui_cell_primary">
      <p>操作</p>
    </div>
    <div class="weui_cell_primary">
	<a onClick='return confirm1();' class="weui_btn weui_btn_warn">删除</a>
  
    </div> </div></div>

          
        </article>
        
        <footer>
           
        </footer>


        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
		<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>
</html>