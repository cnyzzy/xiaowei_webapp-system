<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title><?php echo $titlename;?>-OA-<?php echo $arrInfo['name'];?></title>
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
						$(document).ready(function() {
					<?php if($isstop==1) { ?>		 
  $.toast("非教职工<br>不可使用","cancel");
			 setTimeout(function() {
          window.location.href="<?php echo $arrInfo['url'];?>";
        }, 2500);


		<?php } ?>	
 $.ajax({  
          type:"POST", 
	url:"<?php echo $arrInfo['url'];?>/woa/listdo/<?php echo $ttt;?>/<?php echo $zt;?>/<?php echo($page+1)?>",
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

	
<?php if($isneed==1) { ?>
       //window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/oa";

    
		 $.showLoading("正在同步数据");
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/woa/listdo/<?php echo $ttt;?>/<?php echo $zt;?>/<?php echo $page;?>",
		data:"&by=ZY",
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
      	if(result.type=='login'){
	$.hideLoading();
	$.toast(result.msg, "forbidden");
				 setTimeout(function() {
           window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>";
        }, 1000)
	}
	if(result.type!='ok'&&result.type!='login'){
	$.hideLoading();
	$.toast(result.msg, "forbidden");
				 setTimeout(function() {
          window.history.go(-1);
        }, 1000)
	}
	if(result.type=='ok'){
		$.hideLoading();
	$.toast(result.msg);
				 setTimeout(function() {
				 window.location.reload(true);
        
        }, 1000)
	}
		},
		error:function(result){
 $.hideLoading();
	$.toast("网络故障", "forbidden");
				 setTimeout(function() {
          window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/oa";
        }, 1000)
	}

		
	});
		 
<?php } ?>
	

 
						});

</script>	
         </head>
    <body>
        <header>
		
         <div class="titlebar reverse">
             <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1><?php echo $titlename;?><?php if($ttt=='1'||$ttt=='2') { ?>-<?php if($zt=='1') { ?>在办<?php } ?><?php if($zt=='2') { ?>待办<?php } ?><?php if($zt=='3') { ?>办结<?php } ?>文件<?php } ?></h1>
            </div>
        </header>
        <article style="bottom: 0;">
<div class="weui_panel">
  <div class="weui_panel_hd"><?php echo $titlename;?><?php if($ttt=='1'||$ttt=='2') { ?>-<?php if($zt=='1') { ?>在办<?php } ?><?php if($zt=='2') { ?>待办<?php } ?><?php if($zt=='3') { ?>办结<?php } ?>文件<?php } ?></div>
  <div class="weui_panel_bd">
  <?php if((!EMPTY($ARR))) { ?>
  	<?php foreach((array)$ARR as $key=>$Child) {?>
	<a href="<?php echo $arrInfo['url'];?>/woa/detail/<?php echo $ttt;?>/<?php echo $Child[5];?>" class="weui_media_box weui_media_appmsg">
 <div class="weui_media_box weui_media_text">
        <?php if($zt=='1'||$zt=='2') { ?> <h4 class="weui_media_title" style="white-space: normal;"><?php echo $Child[2];?></h4>
      <p class="weui_media_desc">部门：<?php echo $Child[4];?><br>时间：<?php echo $Child[3];?></p>
      <ul class="weui_media_info">
        <li class="weui_media_info_meta">处理人</li>
        <li class="weui_media_info_meta"><?php echo $Child[0];?></li>
        <li class="weui_media_info_meta weui_media_info_meta_extra"><?php echo $Child[1];?></li>
    </ul>  <?php } ?>
	        <?php if($zt=='3') { ?> <h4 class="weui_media_title" style="white-space: normal;"><?php echo $Child[2];?></h4>
      <p class="weui_media_desc">字号：<?php echo $Child[0];?><br>时间：<?php echo $Child[3];?></p>
      <ul class="weui_media_info">
        <li class="weui_media_info_meta">部门</li>
        <li class="weui_media_info_meta"><?php echo $Child[4];?></li>

    </ul>  <?php } ?>
    </div>
	</a>
	  	<?php }?>
	<?php } ?>
	  <?php if((!EMPTY($ARR2))) { ?>
  	<?php foreach((array)$ARR2 as $key=>$Child) {?>

	        <?php if($zt=='1'||$zt=='2') { ?>	<a href="<?php echo $arrInfo['url'];?>/woa/detail/<?php echo $ttt;?>/<?php echo $Child[5];?>" class="weui_media_box weui_media_appmsg"><div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title" style="white-space: normal;"><?php echo $Child[2];?></h4>
      <p class="weui_media_desc">办理期限：<?php echo $Child[4];?><br>拟稿时间：<?php echo $Child[3];?></p>
      <ul class="weui_media_info">
        <li class="weui_media_info_meta">处理人</li>
        <li class="weui_media_info_meta"><?php echo $Child[0];?></li>
        <li class="weui_media_info_meta weui_media_info_meta_extra"><?php echo $Child[1];?></li>
      </ul>
    </div>  <?php } ?>
		        <?php if($zt=='3') { ?>	<a href="<?php echo $arrInfo['url'];?>/woa/detail/<?php echo $ttt;?>/<?php echo $Child[3];?>" class="weui_media_box weui_media_appmsg"><div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title" style="white-space: normal;"><?php echo $Child[0];?></h4>
      <p class="weui_media_desc">拟稿时间：<?php echo $Child[1];?></p>
      <ul class="weui_media_info">
        <li class="weui_media_info_meta">部门</li>
        <li class="weui_media_info_meta"><?php echo $Child[2];?></li>

      </ul>
    </div>  <?php } ?>
    </a>
	  	<?php }?>
	<?php } ?>
		  <?php if((!EMPTY($ARR3))) { ?>
  	<?php foreach((array)$ARR3 as $key=>$Child) {?>


		      	<a href="<?php echo $arrInfo['url'];?>/woa/detail/<?php echo $ttt;?>/<?php echo $Child[3];?>" class="weui_media_box weui_media_appmsg"><div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title" style="white-space: normal;"><?php echo $Child[0];?></h4>
      <p class="weui_media_desc">文件编号：<?php echo $Child[2];?></p>
      <ul class="weui_media_info">
        <li class="weui_media_info_meta">发文时间</li>
        <li class="weui_media_info_meta"><?php echo $Child[1];?></li>

      </ul>
    </div>  
    </a>
	  	<?php }?>
	<?php } ?>
  </div>
</div>
										<div  style="min-height:60px;max-height:70px; text-align: center;">
	<?php if(!empty($nowpage)&&$tpage!=1) { ?><div <?php if($nowpage>1&&$nowpage<=$tpage) { ?>onclick="urlpage('<?php echo $arrInfo['url'];?>/woa/list/<?php echo $ttt;?>/<?php echo $zt;?>/<?php echo $qpage;?>');" <?php } ?> class="weui_btn weui_btn_primary weui_btn_inline<?php if($nowpage<=1) { ?> weui_btn_disabled<?php } ?> divhref" style="width:25%;">上页</div>
		<div class="weui_btn weui_btn_default weui_btn_inline" style="width:30%;" id="picker" value="<?php echo $nowpage;?>">第<?php echo $nowpage;?>页</div>
	<div <?php if($nowpage<$tpage) { ?>onclick="urlpage('<?php echo $arrInfo['url'];?>/woa/list/<?php echo $ttt;?>/<?php echo $zt;?>/<?php echo $hpage;?>');" <?php } ?>class="weui_btn weui_btn_primary weui_btn_inline<?php if($nowpage>=$tpage) { ?> weui_btn_disabled<?php } ?> divhref" style="width:25%;">下页</div>
 <?php } ?>
		</div>
		<?php if($ttt=='1'||$ttt=='2') { ?>	
<div class="weui_panel">
  <div class="weui_panel_hd">切换</div>
  <div class="weui_panel_bd">
    <div class="weui_media_box weui_media_small_appmsg">
      <div class="weui_cells weui_cells_access">
	<?php if($zt!='1') { ?>   <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/list/<?php echo $ttt;?>/1/1">
          <div class="weui_cell_hd"></div>
          <div class="weui_cell_bd weui_cell_primary">
            <p>在办文件</p>
          </div>
          <span class="weui_cell_ft"></span>
        </a>
		<?php } ?>
	<?php if($zt!='2') { ?> 
	<a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/list/<?php echo $ttt;?>/2/1">
          <div class="weui_cell_hd"></div>
          <div class="weui_cell_bd weui_cell_primary">
            <p>待办文件</p>
          </div>
          <span class="weui_cell_ft"></span>
        </a>
	  <?php } ?>
     <?php if($zt!='3') { ?>   
		<a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/list/<?php echo $ttt;?>/3/1">
          <div class="weui_cell_hd"></div>
          <div class="weui_cell_bd weui_cell_primary">
            <p>办结文件</p>
          </div>
          <span class="weui_cell_ft"></span>
        </a>
		<?php } ?>
      </div>
    </div>
  </div>
</div><?php } ?>
</article>
	<script type="text/javascript"> 
	$("#picker").picker({
  title: "跳转的页码",
  cols: [
    {
textAlign: 'center',
 values: [<?php for($y=1; $y<=$tpage; $y++) {?>'<?php echo $y;?>',<?php } ?>],
}],

onClose: function (result) {  
if(result['value'][0]!=<?php echo $nowpage;?>){
            setTimeout(function() {
               window.location.href = "<?php echo $arrInfo['url'];?>/woa/list/<?php echo $ttt;?>/<?php echo $zt;?>/"+result['value'][0];
            },
            10);
            }}  
});
 function urlpage(url)  {  
            setTimeout(function() {
                window.location.href = url;
            },
            10);
 }
</script> 	
	<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 	
    </body>        <footer>
           
        </footer>
		
</html>