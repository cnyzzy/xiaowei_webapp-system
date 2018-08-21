<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>绑定管理-<?php echo $arrInfo['name'];?></title>
       <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/modify.css"/>
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
$.confirm("确认解除绑定么？", function() {
 $.showLoading();
     $.ajax({
		type:"POST",
		url:"<?php if($bdtype=='1') { ?><?php echo $arrInfo['url'];?>/bd/exit<?php } ?><?php if($bdtype=='2') { ?><?php echo $arrInfo['url'];?>/bda/exit<?php } ?><?php if($bdtype=='3') { ?><?php echo $arrInfo['url'];?>/bdq/exit<?php } ?><?php if($bdtype=='4') { ?><?php echo $arrInfo['url'];?>/bdx/exit<?php } ?>",
		data:"&do=isdetele",
		beforeSend:function(){},
		success:function(result){
		if(result.replace(/[^0-9]/ig,"")=="1"){
			$.hideLoading();
			$.toast("解绑成功");
			 setTimeout(function() {
          window.location.reload(true);
        }, 800)
			}	 
		else if(result.replace(/[^0-9]/ig,"")=="2"){
			$.hideLoading();
			$.toast("已被锁定<br>不可解绑","cancel");
			 setTimeout(function() {
          window.location.reload(true);
        }, 800)
			}	 
		else if(result.replace(/[^0-9]/ig,"")=="3"){
			$.hideLoading();
			$.toast("尚未绑定", "forbidden");
			 setTimeout(function() {
          window.location.reload(true);
        }, 800)
			}	
		else {
			$.hideLoading();
			$.toast("发生错误", "forbidden");
			 setTimeout(function() {
          window.location.reload(true);
        }, 800)
			}
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
                <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>平台绑定管理</h1>
            </div>
        </header>
        <article style="padding-bottom: 54px;">
 
				<?php if(!empty($info1)||!empty($info2)||!empty($info3)) { ?>     
				<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">微信绑定</div>
  <div class="weui_panel_bd">
    <a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/modify/1" class="weui_media_box weui_media_appmsg">
      <div class="weui_media_hd">
        <img class="weui_media_appmsg_thumb" src="<?php if(!empty($info1['img'])) { ?><?php echo $info1['img'];?><?php } else { ?><?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/WX.png<?php } ?>" alt="">
      </div>
      <div class="weui_media_bd">
        <h4 class="weui_media_title"><?php if(!empty($info1['nickname'])) { ?><?php echo $info1['nickname'];?><?php } else { ?><?php if(empty($info1)) { ?>未绑定<?php } else { ?>无<?php } ?><?php } ?></h4>
        <p class="weui_media_desc">绑定时间:<?php if(!empty($info1['addtime'])) { ?><?php echo(date('Y-m-j G:i:s',$info1['addtime']))?><?php } else { ?>未知<?php } ?></p>
      </div>
    </a>

  </div>
  <a class="weui_panel_ft" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/modify/1">查看更多</a>
</div>
					<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">微信小程序绑定</div>
  <div class="weui_panel_bd">
    <a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/modify/2" class="weui_media_box weui_media_appmsg">
      <div class="weui_media_hd">
        <img class="weui_media_appmsg_thumb" src="<?php if(!empty($info2['img'])) { ?><?php echo $info2['img'];?><?php } else { ?><?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/WXAPP.png<?php } ?>" alt="">
      </div>
      <div class="weui_media_bd">
        <h4 class="weui_media_title"><?php if(!empty($info2['nickname'])) { ?><?php echo $info2['nickname'];?><?php } else { ?><?php if(empty($info2)) { ?>未绑定<?php } else { ?>无<?php } ?><?php } ?></h4>
        <p class="weui_media_desc">绑定时间:<?php if(!empty($info2['addtime'])) { ?><?php echo(date('Y-m-j G:i:s',$info2['addtime']))?><?php } else { ?>未知<?php } ?></p>
      </div>
    </a>

  </div>
  <a class="weui_panel_ft" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/modify/2">查看更多</a>
</div>
				<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">QQ绑定</div>
  <div class="weui_panel_bd">
    <a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/modify/3" class="weui_media_box weui_media_appmsg">
      <div class="weui_media_hd">
        <img class="weui_media_appmsg_thumb" src="<?php if(!empty($info3['img'])) { ?><?php echo $info3['img'];?><?php } else { ?><?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/QQ.png<?php } ?>" alt="">
      </div>
      <div class="weui_media_bd">
        <h4 class="weui_media_title"><?php if(!empty($info3['nickname'])) { ?><?php echo $info3['nickname'];?><?php } else { ?><?php if(empty($info3)) { ?>未绑定<?php } else { ?>无<?php } ?><?php } ?></h4>
        <p class="weui_media_desc">绑定时间:<?php if(!empty($info3['addtime'])) { ?><?php echo(date('Y-m-j G:i:s',$info3['addtime']))?><?php } else { ?>未知<?php } ?></p>
      </div>
    </a>

  </div>
  <a class="weui_panel_ft" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/modify/3">查看更多</a>
</div>
					<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">微博绑定</div>
  <div class="weui_panel_bd">
    <a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/modify/4" class="weui_media_box weui_media_appmsg">
      <div class="weui_media_hd">
        <img class="weui_media_appmsg_thumb" src="<?php if(!empty($info4['img'])) { ?><?php echo $info4['img'];?><?php } else { ?><?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/WB.png<?php } ?>" alt="">
      </div>
      <div class="weui_media_bd">
        <h4 class="weui_media_title"><?php if(!empty($info4['nickname'])) { ?><?php echo $info4['nickname'];?><?php } else { ?><?php if(empty($info4)) { ?>未绑定<?php } else { ?>无<?php } ?><?php } ?></h4>
        <p class="weui_media_desc">绑定时间:<?php if(!empty($info4['addtime'])) { ?><?php echo(date('Y-m-j G:i:s',$info4['addtime']))?><?php } else { ?>未知<?php } ?></p>
      </div>
    </a>

  </div>
  <a class="weui_panel_ft" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/modify/4">查看更多</a>
</div>

	<?php } else { ?>
		<div id="container">
		<div id="content">
						<div style="height:1px"></div>
						<div class="weui_msg">
  <div class="weui_icon_area"><i class="weui_icon_msg weui_icon_info weui_icon_msg"></i></div>
  <div class="weui_text_area">
    <h2 class="weui_msg_title">您尚未绑定</h2>
    <p class="weui_msg_desc">如需绑定请在客户端中打开小薇平台</p>
  </div>
  <div class="weui_opr_area">
    <p class="weui_btn_area">

      <a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/bdgl
" class="weui_btn weui_btn_default">返回</a>
    </p>
  </div>

</div>
</div>

									<div id="comment">
				<div class="pd5">	<h5> &nbsp;</h5>
									</div>	<h5> &nbsp;</h5>
			</div>
		</div>
			<?php } ?><?php if(!empty($info['openid'])) { ?>
             <div class="button">
                <div class="bd">
                    <a class="weui_btn weui_btn_primary" onClick='return confirm1();'>解除绑定</a>
                </div>
            </div>
           <?php } ?>

        </article>
		       <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
			   			<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
         <?php include template('footer'); ?>
<script type="text/javascript">
    function back(){

    }
</script>