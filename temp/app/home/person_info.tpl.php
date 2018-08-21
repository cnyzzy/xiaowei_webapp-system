<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>个人资料-<?php echo $arrInfo['name'];?></title>
       <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/person_info.css"/>
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
     <style>
	 .weui-photo-browser-modal {
  
    Z-INDEX: 99999;
}
.weui-photo-browser-modal .photo-container img {
    max-width: 100%;
    margin-top: -60px;
}
</style>
    </head>
    <body>
        <header>
            <div class="titlebar reverse">
                <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>个人资料</h1>
            </div>
        </header>
        <article style="bottom: 54px;">
            <div class="weui_cells weui_cells_access animated fadeInRight">
          <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_bd weui_cell_primary">
                    <div class="weui-row weui-no-gutter">
                        <div class="label weui-col-20">姓名:</div>
                        <div class="weui-col-60"><?php echo $_SESSION['zid']['name'];?></div>
                        <div class="weui_btn weui_btn_mini weui_btn_primary"><?php if($type=='1') { ?>学生<?php } ?><?php if($type=='2') { ?>教职工<?php } ?><?php if($type=='3') { ?>访客<?php } ?></div>
                    </div>
                </div>
              </a>
			               
              <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_bd weui_cell_primary">
                    <div class="weui-row weui-no-gutter">
                        <div class="label weui-col-20"><?php if($type=='1') { ?>学号<?php } ?><?php if($type=='2') { ?>工号<?php } ?><?php if($type=='3') { ?>手机号<?php } ?>:</div>
                        <div class="weui-col-80"><?php echo $_SESSION['zid']['number'];?></div>
                       
                    </div>
                </div>
              </a>
			  <?php if($type=='1') { ?>
              <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_bd weui_cell_primary">
                    <div class="weui-row weui-no-gutter">
                        <div class="label weui-col-20">级数:</div>
                        <div class="weui-col-60"><?php echo $info['szj'];?></div>
 <div class="weui_btn weui_btn_mini weui_btn_warn"><?php echo $info['sznj'];?></div>
                    </div>
                </div>
              </a>
              <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_bd weui_cell_primary">
                    <div class="weui-row weui-no-gutter">
                        <div class="label weui-col-20">学院:</div>
                        <div class="weui-col-80"><?php echo $info['xy'];?></div>
                    </div>
                </div>
              </a>              <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_bd weui_cell_primary">
                    <div class="weui-row weui-no-gutter">
                        <div class="label weui-col-20">专业:</div>
                        <div class="weui-col-80"><?php echo $info['zy'];?></div>
                    </div>
                </div>
              </a> <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_bd weui_cell_primary">
                    <div class="weui-row weui-no-gutter">
                        <div class="label weui-col-20">行政班:</div>
                        <div class="weui-col-80"><?php echo $info['xzb'];?></div>
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
			  <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_bd weui_cell_primary">
                    <div class="weui-row weui-no-gutter">
                        <div class="label weui-col-80">教职工资料库尚未完全对接</div>
                 
                    </div>
                </div>
              </a><?php } ?>
			  <?php if($type=='3') { ?>  <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_bd weui_cell_primary">
                    <div class="weui-row weui-no-gutter">
                        <div class="label weui-col-80">访客无详细资料</div>
                 
                    </div>
                </div>
              </a><?php } ?>
			  <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_bd weui_cell_primary">
                    <div class="weui-row weui-no-gutter">
                        <div class="label weui-col-20">手机号:</div>
<div class="weui-col-60"><?php if(!empty($row2Q['mobile'])) { ?><?php echo $row2Q['mobile'];?><?php } else { ?>无<?php } ?></div>
                  <?php if(!empty($row2Q['mobile'])) { ?><div onClick='return confirm1();' class="weui_btn weui_btn_mini weui_btn_warn">清除</div><?php } else { ?><div onClick='return go();' class="weui_btn weui_btn_mini weui_btn_primary">绑定</div><?php } ?>
				  </div>
                </div>
              </a>
			 <?php if($type=='1'&&!empty($imgfile)) { ?>  <br> 
			   <a href="javascript:;" class="weui_btn weui_btn_primary" id="pb1">查看图片</a>
<?php } ?>
			
            </div>
		   <script>
		 
		   		function go()
{
$.confirm("确认绑定手机么？", function() {
 $.showLoading();
			 setTimeout(function() {
  window.location.href="<?php echo $arrInfo['url'];?>/home/mobile";
        }, 800)
  }, function() {
  $.toast("取消操作", "cancel");
  return false;
  });

		
}
		function confirm1()
{
$.confirm("确认清除手机么？", function() {
 $.showLoading();
     $.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/home/mdo",
		data:"&do=nocode<?php if(!empty($row2Q['mobile'])) { ?>&mobile=<?php echo $row2Q['mobile'];?><?php } ?>",
		beforeSend:function(){},
		success:function(result){
		if(result.replace(/[^0-9]/ig,"")=="1"){
			$.hideLoading();
			$.toast("清除成功");
			 setTimeout(function() {
          window.location.reload(true);
        }, 800)
			}	 
		else if(result.replace(/[^0-9]/ig,"")=="2"){
			$.hideLoading();
			$.toast("不可解绑","cancel");
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
			console.log(result);
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
	       <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
		   <script type='text/javascript' src='<?php echo $arrInfo['url'];?>/app/home/model/js/swiper.js' charset='utf-8'></script>

			   			<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
	<?php if($type=='1'&&!empty($imgfile)) { ?>
 var pb1 = $.photoBrowser({
        items: [
    {
       image: "<?php echo $imgfile;?>",
      caption: "点击照片关闭"
    },
        ]
        ,

        onSlideChange: function(index) {
          console.log(this, index);
        },

        onOpen: function() {
          console.log("onOpen", this);
        },
        onClose: function() {
          console.log("onClose", this);
        }
      });
      $("#pb1").click(function() {
        pb1.open();
      });
<?php } ?>   
  });
</script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>	
        </article>
        
         <?php include template('footer'); ?>