<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title><?php if($_SESSION['zid']['type']=='1') { ?>教务系统绑定<?php } ?><?php if($_SESSION['zid']['type']!='1') { ?>平台绑定<?php } ?>-<?php echo $arrInfo['name'];?></title>
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
		url:"<?php if($bdtype=='1') { ?><?php echo $arrInfo['url'];?>/bd/exit<?php } ?><?php if($bdtype=='2') { ?><?php echo $arrInfo['url'];?>/bda/exit<?php } ?><?php if($bdtype=='3') { ?><?php echo $arrInfo['url'];?>/bdq/exit<?php } ?><?php if($bdtype=='4') { ?><?php echo $arrInfo['url'];?>/bdt/exit<?php } ?>",
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
                <h1><?php if($bdtype=='1') { ?>微信<?php } ?><?php if($bdtype=='2') { ?>微信小程序<?php } ?><?php if($bdtype=='3') { ?>QQ智慧平台<?php } ?><?php if($bdtype=='4') { ?>新浪微博<?php } ?>绑定管理</h1>
            </div>
        </header>
        <article style="padding-bottom: 54px;">
 
				<?php if(!empty($infoO)) { ?>       <div class="weui_cells animated fadeInRight">
                    <div class="weui_cell tip">
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>绑定账号</p>
                        </div>
                    </div> <div class="weui_cell password">
                <div class="weui_cell_bd weui_cell_primary password">
                    <input class="weui_input" type="number" placeholder="<?php if(!empty($infoO['nickname'])) { ?><?php echo $infoO['nickname'];?><?php } else { ?>无<?php } ?>"disabled="disabled">
                </div>
            </div>
            </div>
           
		
		            <div class="weui_cells animated fadeInRight">
                    <div class="weui_cell tip">
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>绑定身份</p>
                        </div>
                    </div> <div class="weui_cell password">
                <div class="weui_cell_bd weui_cell_primary password">
                    <input class="weui_input" type="number" placeholder="<?php if($_SESSION['zid']['type']=='1') { ?>学生<?php } ?><?php if($_SESSION['zid']['type']=='2') { ?>教职工<?php } ?><?php if($_SESSION['zid']['type']=='3') { ?>访客<?php } ?>"disabled="disabled">
                </div>
            </div>
            </div>
           
            <div class="weui_cells animated fadeInRight">
                    <div class="weui_cell tip">
                        <div class="weui_cell_bd weui_cell_primary">
                            <p><?php if($_SESSION['zid']['type']=='1') { ?>学号<?php } ?><?php if($_SESSION['zid']['type']=='2') { ?>工号<?php } ?><?php if($_SESSION['zid']['type']=='3') { ?>手机号<?php } ?></p>
                        </div>
                    </div>
           
            <div class="weui_cell password">
                <div class="weui_cell_bd weui_cell_primary password">
                    <input class="weui_input" type="number" placeholder="<?php echo $_SESSION['zid']['number'];?>"disabled="disabled">
                </div>
            </div> </div>
            <div class="weui_cells animated fadeInRight">
                    <div class="weui_cell tip">
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>姓名</p>
                        </div>
                    </div>
            

            <div class="weui_cell password">
                <div class="weui_cell_bd weui_cell_primary password">
                    <input class="weui_input" type="text" placeholder="<?php echo $_SESSION['zid']['name'];?>"disabled="disabled">
                </div>
            </div> </div><div class="weui_cells animated fadeInRight">
                    <div class="weui_cell tip">
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>绑定时间</p>
                        </div>
                    </div>
            
            <div class="weui_cell password">
                <div class="weui_cell_bd weui_cell_primary password">
                    <input class="weui_input" type="text" placeholder="<?php echo $dtime;?>"disabled="disabled">
                </div>
            </div></div>
			<?php } else { ?>
		<div id="container">
		<div id="content">
						<div style="height:1px"></div>
						<div class="weui_msg">
  <div class="weui_icon_area"><i class="weui_icon_msg weui_icon_info weui_icon_msg"></i></div>
  <div class="weui_text_area">
    <h2 class="weui_msg_title">该类型未绑定</h2>
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
			<?php } ?><?php if(!empty($infoO['openid'])) { ?>
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