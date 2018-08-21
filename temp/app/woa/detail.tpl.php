<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>查看-OA-<?php echo $arrInfo['name'];?></title>
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
					$('#pz').removeAttr('-webkit-line-clamp');
							<?php if($isstop==1) { ?>		 
  $.toast("非教职工<br>不可使用","cancel");
			 setTimeout(function() {
          window.location.href="<?php echo $arrInfo['url'];?>";
        }, 2500);	
		<?php } ?>	
		 <?php if(!empty($Attach1)) { ?>
 <?php foreach((array)$Attach1 as $key=>$loopChild) {?>
 $.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/woa/adown/<?php echo $ttt;?>/<?php echo $idid;?>/"+<?php echo $key;?>,
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
 

 <?php }?>
<?php } ?>
<?php if($isneed==1) { ?>
       //window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/oa";

    
		 $.showLoading("正在同步数据");
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/woa/detaildo/<?php echo $ttt;?>/<?php echo $idid;?>",
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
		if(result.type=='no'){
			$.hideLoading();
	$.toast(result.msg);
				 setTimeout(function() {
				   window.history.go(-1);
        
        }, 1000)
	}
		if(result.type!='ok'&&result.type!='login'&&result.type!='no'){
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
				 window.location.reload(true);
        
        }, 1000)
	}
		},
		error:function(result){
 $.hideLoading();
	$.toast("网络故障", "forbidden");
				 setTimeout(function() {
       window.history.go(-1);
        }, 1000)
	}

		
	});
		 
<?php } ?>
	

 
						});
function downdoc(){	
	$.toast("尚未开放功能", "cancel");
}					
function downattach(file){
$.showLoading("正在加载附件");
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/woa/adown/<?php echo $ttt;?>/<?php echo $idid;?>/"+file,
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
         window.location.reload(true);
        }, 1000)
	}
	if(result.type=='ok'){
		$.hideLoading();
	$.toast("即将开始下载");
				 setTimeout(function() {
				 window.location.href="<?php echo $arrInfo['url'];?>/oadown?url="+result.msg;
        
        }, 1000)
	}
		},
		error:function(result){
 $.hideLoading();
	$.toast("网络故障", "forbidden");
				 setTimeout(function() {
       window.history.go(-1);
        }, 1000)
	}

		
	});
}
</script>	
         </head>
    <body>
        <header>
		
         <div class="titlebar reverse">
             <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>OA查看</h1>
            </div>
        </header>
        <article style="bottom: 0;">
		   <div class="weui_panel">
  <div class="weui_panel_hd">文件信息</div>
  <div class="weui_panel_bd">
<div class="weui_cells">
  <div class="weui_cell"style="height:auto;">
    <div class="weui_cell_bd weui_cell_primary">
      <p>标题</p>
    </div>
    <div style="width:80%;word-wrap:break-word;line-height:100%;" class="weui_cell_ft">
     <?php if(!empty($arr['wjbt'])) { ?> <?php echo $arr['wjbt'];?><?php } else { ?>......<?php } ?>
    </div>
  </div>
</div> <?php if(!empty($arr['fwzt'])&&!empty($arr['nf'])&&!empty($arr['xh'])) { ?>
<div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>发文字号</p>
    </div>
    <div class="weui_cell_ft">
     <?php echo $arr['fwzt'];?>(<?php echo $arr['nf'];?>)<?php echo $arr['xh'];?>号
    </div>
  </div>
</div>	<?php } ?>
<?php if(!empty($arr['lwdw'])) { ?>
<div class="weui_cells">
  <div class="weui_cell"style="height:auto;">
    <div class="weui_cell_bd weui_cell_primary">
      <p>来文单位</p>
    </div>
    <div class="weui_cell_ft">
     <?php echo $arr['lwdw'];?>
    </div>
  </div>
</div>	<?php } ?>   
<?php if(!empty($arr['ywbh'])) { ?>
<div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>来文字号</p>
    </div>
    <div class="weui_cell_ft">
     <?php echo $arr['ywbh'];?>
    </div>
  </div>
</div>	<?php } ?>  
 <?php if(!empty($arr['swlb'])&&!empty($arr['nf'])&&!empty($arr['xh'])) { ?>
<div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>收文号</p>
    </div>
    <div class="weui_cell_ft">
     <?php echo $arr['swlb'];?>(<?php echo $arr['nf'];?>)<?php echo $arr['xh'];?>号
    </div>
  </div>
</div>	<?php } ?>
<?php if(!empty($arr['swfs'])) { ?>
<div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>份数</p>
    </div>
    <div class="weui_cell_ft">
     <?php echo $arr['swfs'];?>
    </div>
  </div>
</div>	<?php } ?>  
<?php if(!empty($arr['ys'])) { ?>
<div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>页数</p>
    </div>
    <div class="weui_cell_ft">
     <?php echo $arr['ys'];?>
    </div>
  </div>
</div>	<?php } ?>  
<?php if(!empty($arr['lwrq'])) { ?>
<div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>来文日期</p>
    </div>
    <div class="weui_cell_ft">
     <?php echo $arr['lwrq'];?>
    </div>
  </div>
</div>	<?php } ?>  
<?php if(!empty($arr['swrq'])) { ?>
<div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>收文日期</p>
    </div>
    <div class="weui_cell_ft">
     <?php echo $arr['swrq'];?>
    </div>
  </div>
</div>	<?php } ?>  
<?php if(!empty($arr['blqx'])) { ?>
<div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>办理期限</p>
    </div>
    <div class="weui_cell_ft">
     <?php echo $arr['blqx'];?>
    </div>
  </div>
</div>	<?php } ?>  
<?php if(!empty($arr['qsr'])) { ?>
<div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>签收人</p>
    </div>
    <div class="weui_cell_ft">
     <?php echo $arr['qsr'];?>
    </div>
  </div>
</div>	<?php } ?> 
 <?php if(!empty($arr['wz'])) { ?>
<div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>文种</p>
    </div>
    <div class="weui_cell_ft">
    <?php echo $arr['wz'];?>
    </div>
  </div>
</div>
<?php } ?><?php if(!empty($arr['ngdw'])) { ?>
<div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>部门</p>
    </div>
    <div style="width:80%;word-wrap:break-word;line-height:100%;" class="weui_cell_ft">
        <?php echo $arr['ngdw'];?>
    </div>
  </div>
</div> 
<?php } ?>
<?php if(!empty($arr['ngr'])) { ?>
<div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>拟稿人</p>
    </div>
    <div class="weui_cell_ft">
       <?php echo $arr['ngr'];?>
    </div>
  </div>
</div>
<?php } ?> <?php if(!empty($arr['ngrq'])) { ?>
<div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>拟稿日期</p>
    </div>
    <div class="weui_cell_ft">
       <?php echo $arr['ngrq'];?>
    </div>
  </div>
</div><?php } ?><?php if(!empty($arr['lxdh'])) { ?>
<div class="weui_cells">
 <div class="weui_cell"style="height:auto;">
    <div class="weui_cell_bd weui_cell_primary">
      <p>联系电话</p>
    </div>
    <div class="weui_cell_ft">
        <?php echo $arr['lxdh'];?>
    </div>
  </div>
</div><?php } ?>
  </div>
</div>  

  </div>
</div>
 <?php if(!empty($arr['Dep_idea_show'])||!empty($arr['Disposal_idea_show'])) { ?>
<div class="weui_panel">
  <div class="weui_panel_hd">批示</div>
  <div class="weui_panel_bd">
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title"></h4>
      <p id="pz" style="font-size: 0.7rem!important;float:right!important;"><?php if(!empty($arr['Dep_idea_show'])) { ?> <?php echo $arr['Dep_idea_show'];?><?php } ?><?php if(!empty($arr['Disposal_idea_show'])) { ?><br><?php echo $arr['Disposal_idea_show'];?><?php } ?> <?php if(!empty($arr['Off_idea_show'])) { ?><br><?php echo $arr['Off_idea_show'];?><?php } ?></p>
      <ul class="weui_media_info">

      </ul>
    </div>
  </div>
</div>
<?php } ?>
		   <div class="weui_panel">
  <div class="weui_panel_hd">文件查阅</div>
  <div class="weui_panel_bd">
<div class="weui_cells">
  <div class="weui_cell"style="height:auto;">
    <div class="weui_cell_bd weui_cell_primary">
      <p>文件</p>
    </div>
    <div style="width:80%;word-wrap:break-word;line-height:100%;" class="weui_cell_ft">
   <a href="javascript:;"  onclick="downdoc()">    <?php if(!empty($arr['wjbt'])) { ?> <?php echo $arr['wjbt'];?><?php } else { ?>空<?php } ?></a>
    </div>
  </div>
</div>
	
 <?php if(!empty($Attach1)) { ?>
 <?php foreach((array)$Attach1 as $key=>$loopChild) {?>
<div class="weui_cells">
 <div class="weui_cell"style="height:auto;">
  
    <div class="weui_cell_bd weui_cell_primary">
      <p>附件</p>
    </div>
    <div style="width:80%;word-wrap:break-word;line-height:100%;" class="weui_cell_ft">
     <a href="javascript:;"  onclick="downattach('<?php echo $key;?>')">  <?php if(!empty($loopChild)) { ?> <?php echo $loopChild;?><?php } ?></a>
    </div>
  </div>
</div>
 <?php }?>
<?php } ?>

  </div>
</div>
 
 		   <div class="weui_panel">
  <div class="weui_panel_hd">相关信息</div>
  <div class="weui_panel_bd">
  <?php if(!empty($arr['ztc'])) { ?> 
<div class="weui_cells">
 <div class="weui_cell"style="height:auto;">
    <div class="weui_cell_bd weui_cell_primary">
      <p>主题词</p>
    </div>
    <div class="weui_cell_ft">
     <?php echo $arr['ztc'];?>
    </div>
  </div>
</div>
	<?php } ?>

  <?php if(!empty($arr['zsdw'])) { ?> 
<div class="weui_cells">
 <div class="weui_cell"style="height:auto;">
    <div class="weui_cell_bd weui_cell_primary">
      <p>主送单位</p>
    </div>
    <div class="weui_cell_ft">
     <?php echo $arr['zsdw'];?>
    </div>
  </div>
</div>
	<?php } ?>
	
	  <?php if(!empty($arr['csdw'])) { ?> 
<div class="weui_cells">
 <div class="weui_cell"style="height:auto;">
    <div class="weui_cell_bd weui_cell_primary">
      <p>抄送单位</p>
    </div>
    <div class="weui_cell_ft">
     <?php echo $arr['csdw'];?>
    </div>
  </div>
</div>
	<?php } ?>
	
		  <?php if(!empty($arr['cwrq'])) { ?> 
<div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>成文日期</p>
    </div>
    <div class="weui_cell_ft">
     <?php echo $arr['cwrq'];?>
    </div>
  </div>
</div>
	<?php } ?>
	
			  <?php if(!empty($arr['fs'])) { ?> 
<div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>印发份数</p>
    </div>
    <div class="weui_cell_ft">
     <?php echo $arr['fs'];?>
    </div>
  </div>
</div>
	<?php } ?>
	
			  <?php if(!empty($arr['jjcd'])) { ?> 
<div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>紧急程度</p>
    </div>
    <div class="weui_cell_ft">
     <?php echo $arr['jjcd'];?>
    </div>
  </div>
</div>
	<?php } ?>
				  <?php if(!empty($arr['hj'])) { ?> 
<div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>紧急程度</p>
    </div>
    <div class="weui_cell_ft">
     <?php echo $arr['hj'];?>
    </div>
  </div>
</div>
	<?php } ?>
	 <?php if(!empty($arr['remark'])) { ?> 
<div class="weui_cells">
 <div class="weui_cell"style="height:auto;">
    <div class="weui_cell_bd weui_cell_primary">
      <p>备注</p>
    </div>
    <div class="weui_cell_ft">
     <?php echo $arr['remark'];?>
    </div>
  </div>
</div>
	<?php } ?>
  </div>
</div>

</article>
		
		<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>        <footer>
           
        </footer>
		
</html>