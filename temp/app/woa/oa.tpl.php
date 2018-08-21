<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>OA-<?php echo $arrInfo['name'];?></title>
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
		<script>$(document).ready(function() {
			<?php if($isstop==1) { ?>		 
  $.toast("非教职工<br>不可使用","cancel");
			 setTimeout(function() {
          window.location.href="<?php echo $arrInfo['url'];?>";
        }, 2500);	
		<?php } ?>
		<?php for($i = 1; $i <= 7; $i++ ) {?>
	 $.ajax({  
          type:"POST", 
	url:"<?php echo $arrInfo['url'];?>/woa/listdo/<?php echo $i;?>/1/1",
		data:"&by=ZY",
		dataType: "json", 
		 async:true, 
		 timeout : 5000,
		 data:"&isis=1",
		
        success:function(result){ 


	}, 
         error:function (result) {   
         }, 
  });	
	<?php } ?>	
		
		});
		 function exitt() {
					        $.confirm("确认解除OA绑定么？", function() {
 $.showLoading();
     $.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/woa/do/exit",
		data:"&user=<?php echo $arr['user'];?>",
		dataType: "json", 
		beforeSend:function(){},
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   
	if(result.type!='ok'){
	$.hideLoading();
	$.toast(result.msg, "forbidden");
				 setTimeout(function() {
          window.location.reload(true);
        }, 1000)
	}
	if(result.type=='ok'){
		$.hideLoading();
	$.toast(result.msg);
				 setTimeout(function() {
        window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>";
        }, 1000)
	}
		},
		error:function(result){
 $.hideLoading();
	$.toast("网络故障", "forbidden");
				 setTimeout(function() {
         window.location.reload(true);
        }, 1000)
	}

		
	});
  }, function() {
  $.toast("取消操作", "cancel");
  return false;
  });
	}
							 
     
         </script>
         </head>
    <body>
        <header>
		
         <div class="titlebar reverse">
             <a href="<?php echo $arrInfo['url'];?>">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>OA</h1>
            </div>
        </header>
        <article style="bottom: 0;">
		   <div class="weui_panel">
  <div class="weui_panel_hd">公文处理</div>
  <div class="weui_panel_bd">
    <div class="weui_media_box weui_media_small_appmsg">
      <div class="weui_cells weui_cells_access">
        <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/list/1">
          <div class="weui_cell_hd"></div>
          <div class="weui_cell_bd weui_cell_primary">
            <p>发文管理</p>
          </div>
          <span class="weui_cell_ft"></span>
        </a>
      </div>
    </div>
	
	    <div class="weui_media_box weui_media_small_appmsg">
      <div class="weui_cells weui_cells_access">
        <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/list/2">
          <div class="weui_cell_hd"></div>
          <div class="weui_cell_bd weui_cell_primary">
            <p>收文管理</p>
          </div>
          <span class="weui_cell_ft"></span>
        </a>
      </div>
    </div>
  </div>
</div>

  <div class="weui_panel">
  <div class="weui_panel_hd">发文传阅</div>
  <div class="weui_panel_bd">
    <div class="weui_media_box weui_media_small_appmsg">
      <div class="weui_cells weui_cells_access">
        <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/list/3">
          <div class="weui_cell_hd"><img src=""></div>
          <div class="weui_cell_bd weui_cell_primary">
            <p>党委文件</p>
          </div>
          <span class="weui_cell_ft"></span>
        </a>
      </div>
    </div>
	
	    <div class="weui_media_box weui_media_small_appmsg">
      <div class="weui_cells weui_cells_access">
        <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/list/4">
          <div class="weui_cell_hd"><img src=""></div>
          <div class="weui_cell_bd weui_cell_primary">
            <p>行政文件</p>
          </div>
          <span class="weui_cell_ft"></span>
        </a>
      </div>
    </div>
	
	    <div class="weui_media_box weui_media_small_appmsg">
      <div class="weui_cells weui_cells_access">
        <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/list/5">
          <div class="weui_cell_hd"><img src=""></div>
          <div class="weui_cell_bd weui_cell_primary">
            <p>党办文件</p>
          </div>
          <span class="weui_cell_ft"></span>
        </a>
      </div>
    </div>
	
	    <div class="weui_media_box weui_media_small_appmsg">
      <div class="weui_cells weui_cells_access">
        <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/list/6">
          <div class="weui_cell_hd"><img src=""></div>
          <div class="weui_cell_bd weui_cell_primary">
            <p>校办文件</p>
          </div>
          <span class="weui_cell_ft"></span>
        </a>
      </div>
    </div>
	
	    <div class="weui_media_box weui_media_small_appmsg">
      <div class="weui_cells weui_cells_access">
        <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/list/7">
          <div class="weui_cell_hd"><img src=""></div>
          <div class="weui_cell_bd weui_cell_primary">
            <p>部门文件</p>
          </div>
          <span class="weui_cell_ft"></span>
        </a>
      </div>
    </div>
  </div>
</div>

<div class="weui_panel">
  <div class="weui_panel_hd">状态</div>
  <div class="weui_panel_bd"><a href="javascript:;"  onclick="exitt()">
  	
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title">用户名:<?php if(!empty($arr['user'])) { ?><?php echo $arr['user'];?><?php } else { ?>[未知]<?php } ?></h4>
      <p class="weui_media_desc">微信版OA只提供查看功能</p>
      <ul class="weui_media_info">
        <li class="weui_media_info_meta">点击这里</li>
        <li class="weui_media_info_meta">更换身份</li>
        <li class="weui_media_info_meta weui_media_info_meta_extra">正常使用直接退出即可</li>
      </ul>
    </div>

  </div>	</a>
</div>
</article>
		
		<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>        <footer>
           
        </footer>
		
</html>