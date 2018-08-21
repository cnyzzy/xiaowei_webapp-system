<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>门票详情-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/xunjia_detail.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style.css">
		    <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
									<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });	
</script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>	
		<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/kcb/model/js/mui.min.js"></script>
		<script>

         </script>
         </head>
    <body>
        <header>
		
         <div class="titlebar reverse">
               <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>门票详情</h1>
            </div>
        </header>
        <article style="bottom: 0;">
 <div class="weui_tab">
  <div class="weui_navbar">
    <a href='#tab1' class="weui_navbar_item weui_bar_item_on">
门票
    </a>
    <a href='#tab2' class="weui_navbar_item">
活动
    </a>
    <a href='#tab3' class="weui_navbar_item">
详情
    </a>
  </div>
  <div class="weui_tab_bd">
    <div id="tab1" class="weui_tab_bd_item weui_tab_bd_item_active">
	<?php if(!empty($Arr)) { ?>
	<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd"></div>
  <div class="weui_panel_bd">
  
    <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
	
      <div class="weui_media_bd">
        <h4 class="weui_media_title">座位</h4>
        <p class="weui_media_desc"><?php if(!empty($Arr['seatid'])) { ?><?php echo $Arr['seatid'];?><?php } else { ?>无数据<?php } ?></p>
      </div>
    </a>
	    <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
	
      <div class="weui_media_bd">
        <h4 class="weui_media_title">类型</h4>
        <p class="weui_media_desc"><?php if(!empty($Arr['type'])) { ?><?php echo $Arr['type'];?><?php } else { ?>无数据<?php } ?></p>
      </div>
    </a>
		    <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
	
      <div class="weui_media_bd">
        <h4 class="weui_media_title">审核状态</h4>
        <p class="weui_media_desc"><?php if($Arr['isok']==1) { ?><font color='green'>有效</font><?php } else { ?><font color='#df4d26'>未生效</font><?php } ?></p>
      </div>
    </a>
			    <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
	
      <div class="weui_media_bd">
        <h4 class="weui_media_title">时效状态</h4>
        <p class="weui_media_desc">	<?php if(!empty($ArrH)) { ?>
	<?php if(!empty($Arr['isok'])&&$Arr['isok']=='1'&&strtotime($Arr['hdtime'])>=time()) { ?>
<font color='green'>有效</font><?php } else { ?><font color='#df4d26'>过期</font><?php } ?><?php } else { ?><font color='#df4d26'>活动失效</font><?php } ?> 
  

      </div>
    </a>
	    <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
	
      <div class="weui_media_bd">
        <h4 class="weui_media_title">活动时间</h4>
        <p class="weui_media_desc"><?php if(!empty($Arr['hdtime'])) { ?><?php echo $Arr['hdtime'];?><?php } else { ?>无数据<?php } ?></p>
      </div>
    </a>
    <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
	
      <div class="weui_media_bd">
        <h4 class="weui_media_title">获得时间</h4>
        <p class="weui_media_desc"><?php if(!empty($Arr['addtime'])) { ?><?php ECHO(date('Y-m-j G:i:s',$Arr['addtime']))?><?php } else { ?>无数据<?php } ?></p>
      </div>
    </a>
  </div>
 
</div>
	<?php if(!empty($ArrH)) { ?>
	<?php if(!empty($Arr['isok'])&&($Arr['isok']=='1')&&($ArrH['endtime']>time())) { ?>
	    <a  class="weui_btn weui_btn_primary" onClick='return iwantcanel();'>放弃此张门票</a><?php } ?>  

          <?php } ?>                                
<?php } else { ?>
		   <div class="weui_panel">
  <div class="weui_panel_hd">空空如也</div>
  <div class="weui_panel_bd">
 
  </div>
</div>
<?php } ?>

                                         	


    </div>
    <div id="tab2" class="weui_tab_bd_item">
	<?php if(!empty($ArrH)) { ?>
	<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd"></div>
  <div class="weui_panel_bd">
  
    <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
	
      <div class="weui_media_bd">
        <h4 class="weui_media_title">活动名称</h4>
        <p class="weui_media_desc"><?php if(!empty($ArrH['title'])) { ?><?php echo $ArrH['title'];?><?php } else { ?>无数据<?php } ?></p>
      </div>
    </a>
	    <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
	
      <div class="weui_media_bd">
        <h4 class="weui_media_title">活动类型</h4>
        <p class="weui_media_desc"><?php if(!empty($ArrH['stype'])) { ?><?php echo @$ArrH['swhere'];?>|<?php echo @$ArrH['stype'];?><?php } else { ?>无数据<?php } ?></p>
      </div>
    </a>
	    <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
	
      <div class="weui_media_bd">
        <h4 class="weui_media_title">活动日期</h4>
        <p class="weui_media_desc"><?php if(!empty($ArrH['time'])) { ?><?php echo $ArrH['time'];?><?php } else { ?>无数据<?php } ?></p>
      </div>
    </a>
	    <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
	
      <div class="weui_media_bd">
        <h4 class="weui_media_title">活动地点</h4>
        <p class="weui_media_desc"><?php if(!empty($ArrH['place'])) { ?><?php echo $ArrH['place'];?><?php } else { ?>无数据<?php } ?></p>
      </div>
    </a>
    <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
	
      <div class="weui_media_bd">
        <h4 class="weui_media_title">订票开始时间</h4>
        <p class="weui_media_desc"><?php if(!empty($ArrH['opentime'])) { ?><?php ECHO(date('Y-m-j G:i:s',$ArrH['opentime']))?><?php } else { ?>无数据<?php } ?></p>
      </div>
    </a>
	    <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
	
      <div class="weui_media_bd">
        <h4 class="weui_media_title">订票结束时间</h4>
        <p class="weui_media_desc"><?php if(!empty($ArrH['endtime'])) { ?><?php ECHO(date('Y-m-j G:i:s',$ArrH['endtime']))?><?php } else { ?>无数据<?php } ?></p>
      </div>
    </a>
		    <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
	
      <div class="weui_media_bd">
        <h4 class="weui_media_title">简介</h4>
        <p class="weui_media_desc"><?php if(!empty($ArrH['content'])) { ?><?php echo $ArrH['content'];?><?php } else { ?>无数据<?php } ?></p>
      </div>
    </a>
			    <a href="<?php echo $arrInfo['url'];?>/hdxp/details/<?php echo $ArrH['id'];?>" class="weui_media_box weui_media_appmsg">
	
      <div class="weui_media_bd">
        <h4 class="weui_media_title">查看活动展示</h4>
        <p class="weui_media_desc"></p>
      </div>
    </a>
  </div>
 
</div>
	
		
                                        
<?php } else { ?>
		   <div class="weui_panel">
  <div class="weui_panel_hd">空空如也</div>
  <div class="weui_panel_bd">
 
  </div>
</div>
<?php } ?>
    </div>
  <div id="tab3" class="weui_tab_bd_item">
	<?php if(!empty($ArrH)) { ?>
	<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd"> </div>
  <div class="weui_panel_bd">
  
    <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
	
      <div class="weui_media_bd">
        <h4 class="weui_media_title">详细地址</h4>
        <p class="weui_media_desc"><?php if(!empty($ArrH['xwhere'])) { ?><?php echo $ArrH['xwhere'];?><?php } else { ?>无数据<?php } ?></p>
      </div>
    </a>
	    <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
	
      <div class="weui_media_bd">
        <h4 class="weui_media_title">详细时间</h4>
        <p class="weui_media_desc"><?php if(!empty($ArrH['xtime'])) { ?><?php echo $ArrH['xtime'];?><?php } else { ?>无数据<?php } ?></p>
      </div>
    </a>
	    <a href="javascript:void(0);" class="weui_media_box weui_media_appmsg">
	
      <div class="weui_media_bd">
        <h4 class="weui_media_title">领取说明</h4>
        <p class="weui_media_desc"><?php if(!empty($ArrH['lcontent'])) { ?><?php echo $ArrH['lcontent'];?><?php } else { ?>无数据<?php } ?></p>
      </div>
    </a>
	   
 
</div>
	
		
                                        
<?php } else { ?>
		   <div class="weui_panel">
  <div class="weui_panel_hd">空空如也</div>
  <div class="weui_panel_bd">
 
  </div>
</div>
<?php } ?>
    </div>

  </div>
</div>


<script>
  		function iwantcanel(){
			$.confirm({
  title: '退票',
  text: '您即将放弃这张门票，一旦确定不能撤回',
  onOK: function () {
$.showLoading("正在同步");
				            $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/noseat/<?php echo $tid;?>',
                dataType: 'json',
                type: 'POST',
				data:"&time=<?php if($Arr['hdtime']) { ?><?php echo $Arr['hdtime'];?><?php } ?>",
				async:false,
				timeout : 5000,
                success: function (data) {
				$.hideLoading();
    if(data.ok==0){
                        console.log(data);
 $.toast("已放弃过","cancel");

                        }else if(data.ok==2){


 $.toast("失败","cancel");
 
	}else if(data.ok==1){


 $.toast("成功");
 				setTimeout(function() {
        $.hideLoading();
		window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/read";
        }, 1000);
	}
                 
                },
                error : function(e) {
				$.hideLoading();
                   $.toast("网络故障","forbidden"); 
					//window.location.href=location.href;
                }
            });
	
  },
  onCancel: function () {
  $.toast("取消操作", "cancel");
  }
});
		}
</script>
</article>
		
		<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>        <footer>
           
        </footer>
		
</html>