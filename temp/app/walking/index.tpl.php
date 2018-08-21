<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>健步走-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/xunjia_detail.css"/>
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
		 function wait(form) {
				$.showLoading("正在进入...");
				setTimeout(function() {
        $.hideLoading();
			return true;
        }, 1000);
	
}
							 
     
         </script>
		
    </head>
    <body>
        <header>
		
         <div class="titlebar reverse">
             <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>健步走</h1>
            </div>
        </header>
        <article style="bottom: 0;">
            <ul class="xunjia-tab clearfix">
 <li class="green"> 区域选择</li> 
               		
            </ul>           <ul class="xunjia-box">
			
 <div class="weui_msg">
  <div class="weui_icon_area"><i class="weui_icon_msg weui_icon_download"></i></i></div>
  <div class="weui_text_area">
    <h2 class="weui_msg_title">欢迎参加健步走活动</h2>
    <p class="weui_msg_desc">分为早操区和活动区，早操区面向大一、大二的同学，活动区面向我校所有学生、教职工。</p><br>
	    <h2 class="weui_msg_title">身份资料</h2>
	            <div class="weui_cells weui_cells_access animated fadeInRight">
          <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_bd weui_cell_primary">
                    <div class="weui-row weui-no-gutter">
                        <div class="label weui-col-20">姓名:</div>
                        <div class="weui-col-80"><?php echo $_SESSION['zid']['name'];?>&nbsp;&nbsp;&nbsp;&nbsp; <font color="red">【<?php if($type=='1') { ?>学生<?php } ?><?php if($type=='2') { ?>教职工<?php } ?><?php if($type=='3') { ?>访客<?php } ?>】</font></div>

                    </div>
                </div>
              </a>
			  <?php if($type=='1') { ?>
              <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_bd weui_cell_primary">
                    <div class="weui-row weui-no-gutter">
                        <div class="label weui-col-20">级数:</div>
                        <div class="weui-col-80"><?php echo $info['szj'];?>&nbsp;&nbsp; &nbsp;&nbsp;<font color="green">【<?php echo $info['sznj'];?>】</font></div>
                    </div>
                </div>
              </a>
<?php } ?>
			  <?php if($type=='2') { ?>
			       <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_bd weui_cell_primary">
                    <div class="weui-row weui-no-gutter">
                        <div class="label weui-col-20">部门:</div>
                        <div class="weui-col-60"><?php echo $info['dname'];?></div>
 <div class="weui_btn weui_btn_mini weui_btn_warn"><?php echo $info['dnumber'];?></div>
                    </div>
                </div>
              </a>
<?php } ?>
			  <?php if($type=='3') { ?>  <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_bd weui_cell_primary">
                    <div class="weui-row weui-no-gutter">
					<div class="label weui-col-20">资料:</div>
                        <div class="label weui-col-80">访客无详细资料</div>
                 
                    </div>
                </div>
              </a><?php } ?>
            </div>
	  <?php if($type!='3') { ?><p class="weui_msg_desc">您可以选择如下区域参与活动</p>
  </div>
  <div class="weui_opr_area">
    <p class="weui_btn_area">
	<?php if($type=='1') { ?> <?php if($nianji<=2) { ?><a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/zcq" class="weui_btn weui_btn_warn" onClick='return wait();'>早操区</a><?php } ?><?php } ?>
      <a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/hdq" class="weui_btn weui_btn_primary" onClick='return wait();'>活动区</a>
    </p>
  </div><?php } ?>
  	  <?php if($type=='3') { ?><p class="weui_msg_desc">您是访客身份，不能参与本活动</p>
  </div>
  <div class="weui_btn_area">
	 <a href="<?php echo $arrInfo['url'];?>/home/modify" class="weui_btn weui_btn_plain_default">查看绑定信息</a>
  </div><?php } ?>
  <div class="weui_btn_area">
    <a href="<?php echo $arrInfo['url'];?>/home/person_info" class="weui_btn weui_btn_plain_primary">查看个人资料</a></br>
  </div>
</div>
	
	
   </ul>
        </article>
		<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
		
    </body>        <footer>
           
        </footer>
		
</html>