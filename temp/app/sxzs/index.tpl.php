<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>实训助手</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/mui.min.css">
		<style type="text/css">
			    html, body{  
            height: 100%;  
            padding: 0;  
            margin: 0;  
        }  
			.mui-content>.mui-table-view:first-child {
				margin-top: -1px;
			}
		
			.mui-control-content {
				background-color: white;

			}
			.mui-control-content .mui-loading {
				margin-top: 50px;
			}
			.mui-btn-block {
    font-size: 18px;
    width: 90%;
    position: RELATIVE;
    margin-bottom: 10px;
    padding: 20px 0;
	left:5%;
}
	
		</style>
	</head>

	<body>

<nav class="mui-bar mui-bar-tab">
			<a id='yuyue' class="mui-tab-item">
				<span class="mui-icon mui-icon-star-filled"></span>
				<span class="mui-tab-label">预约</span>
			</a>
			<a id='index1' class="mui-tab-item mui-active">
				<span class="mui-icon mui-icon-flag"><?php if(!empty($nownum)&&$nownum!=0) { ?><span class="mui-badge"><?php echo $nownum;?></span><?php } else { ?><span class="mui-badge mui-badge-primary">0</span><?php } ?></span>
				<span class="mui-tab-label">安排</span>
			</a>
			<a id='wo' class="mui-tab-item">
				<span class="mui-icon mui-icon-gear"></span>
				<span class="mui-tab-label">我</span>
			</a>

		</nav>

		<div class="mui-content">

			<div id="tabbar-with-home" class="mui-control-content mui-active">
				<div id="slider" class="mui-slider">
						<div id="sliderSegmentedControl" class="mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
					<a class="mui-control-item" href="#item1mobile">
				当前安排
			</a>
					<a class="mui-control-item" href="#item2mobile">
				未来安排
			</a>
					<a class="mui-control-item" href="#item3mobile">
				历史安排
			</a>
				</div>
				<div id="sliderProgressBar" class="mui-slider-progress-bar mui-col-xs-4"></div>
				<div class="mui-slider-group">
					<div id="item1mobile" class="mui-slider-item mui-control-content mui-active">
						<div id="scroll1" class="mui-scroll-wrapper">
							
								
											<?php if(!empty($Arr1)) { ?>
											<div class="mui-scroll">
											<ul class="mui-table-view">
			<?php foreach((array)$Arr1 as $key=>$loopChild) {?><div id="<?php echo $loopChild['id'];?>" class="mui-card">
				<div class="mui-card-header"><h3><?php echo $loopChild['room'];?></h3><?php echo $loopChild['name'];?></div>
				<div class="mui-card-content">
					<div class="mui-card-content-inner">
						<b>预约时间 </b> <?php if(!empty($loopChild['yuyuetime'])) { ?><?php ECHO(date('Y-m-j G:i',$loopChild['yuyuetime']))?><?php } else { ?>-<?php } ?></br>
					    <b>预约时长 </b> <span class="mui-badge mui-badge-success"><?php ECHO(secToTime($loopChild['shichangtime']))?></span><br>
						<b>人数 </b> <span class="mui-badge"><?php echo $loopChild['number'];?></span>
    <button type="button" style="float:right" class="mui-btn mui-btn-primary mui-btn-outlined"><?php if(!empty($loopChild['nowtype'])) { ?>
		   <?php if($loopChild['nowtype']=='1') { ?>已预约<?php } ?>
		   <?php if($loopChild['nowtype']=='2') { ?>预约保留<?php } ?>
		   <?php if($loopChild['nowtype']=='3') { ?>预约过期<?php } ?>
		   	<?php if($loopChild['nowtype']=='4') { ?>已签到<?php } ?>
		   <?php if($loopChild['nowtype']=='5') { ?>自动签退<?php } ?>
		   <?php if($loopChild['nowtype']=='6') { ?>已签退<?php } ?>
		  <?php if($loopChild['nowtype']=='7') { ?>已上传<?php } ?>
		   <?php if($loopChild['nowtype']=='8') { ?>已评价<?php } ?>
		   <?php if($loopChild['nowtype']=='9') { ?>撤销<?php } ?>
		   <?php } else { ?>-<?php } ?></button>
					</div>

	
       
     
    </div>
				<div class="mui-card-footer"> 
 <div>
<span class="mui-badge mui-badge-primary">提示</span><?php if(!empty($loopChild['nowtype'])) { ?>
		   <?php if($loopChild['nowtype']=='1') { ?>请注意及时签到<?php } ?>
		   <?php if($loopChild['nowtype']=='2') { ?>已经超过预约时间请立即签到<?php } ?>
		   <?php if($loopChild['nowtype']=='3') { ?>您未在指定时间签到 预约已失效<?php } ?>
		   	<?php if($loopChild['nowtype']=='4') { ?>请注意及时签退哦<?php } ?>
		   <?php if($loopChild['nowtype']=='5') { ?>系统已自动签退<?php } ?>
		   <?php if($loopChild['nowtype']=='6') { ?>感谢您的使用<?php } ?>
		  <?php if($loopChild['nowtype']=='7') { ?>请等待教师评价<?php } ?>
		   <?php if($loopChild['nowtype']=='8') { ?>请查看评价<?php } ?>
		   <?php if($loopChild['nowtype']=='9') { ?>该预约已撤销<?php } ?>
		   <?php } else { ?>-<?php } ?></div>
    </div>			
				
				</div>
			<?php }?>
			</ul>
			</div>
					<?php } else { ?>
					<div style="text-align:center;margin: auto;
    position: absolute;
    top: 20%;
    left: 0;
    right: 0;
    bottom: 0;">
					<span  class="mui-icon mui-icon-paperplane" style="font-size: 120px;"></span>
	<h5>空空如也</h5>
	<h5>今天还没有安排</h5>
	  <button  id='yuyue2' type="button" class="mui-btn mui-btn-block mui-btn-outlined">前去预约</button>
	  </div>
					<?php } ?>
												
				
								
							
						</div>
					</div>
					<div id="item2mobile" class="mui-slider-item mui-control-content">
						<div id="scroll2" class="mui-scroll-wrapper">
													<?php if(!empty($Arr3)) { ?>
														<div class="mui-scroll">
						<ul class="mui-table-view">
			<?php foreach((array)$Arr3 as $key=>$loopChild) {?><div id="<?php echo $loopChild['id'];?>" class="mui-card">
				<div class="mui-card-header"><h3><?php echo $loopChild['room'];?></h3><?php echo $loopChild['name'];?></div>
				<div class="mui-card-content">
					<div class="mui-card-content-inner">
						<b>预约时间 </b> <?php if(!empty($loopChild['yuyuetime'])) { ?><?php ECHO(date('Y-m-j G:i',$loopChild['yuyuetime']))?><?php } else { ?>-<?php } ?></br>
					    <b>预约时长 </b> <span class="mui-badge mui-badge-success"><?php ECHO(secToTime($loopChild['shichangtime']))?></span><br>
						<b>人数 </b> <span class="mui-badge"><?php echo $loopChild['number'];?></span>
 <button type="button" style="float:right" class="mui-btn mui-btn-primary mui-btn-outlined"><?php if(!empty($loopChild['nowtype'])) { ?>
		   <?php if($loopChild['nowtype']=='1') { ?>已预约<?php } ?>
		   <?php if($loopChild['nowtype']=='2') { ?>预约保留<?php } ?>
		   <?php if($loopChild['nowtype']=='3') { ?>预约过期<?php } ?>
		   	<?php if($loopChild['nowtype']=='4') { ?>已签到<?php } ?>
		   <?php if($loopChild['nowtype']=='5') { ?>自动签退<?php } ?>
		   <?php if($loopChild['nowtype']=='6') { ?>已签退<?php } ?>
		  <?php if($loopChild['nowtype']=='7') { ?>已上传<?php } ?>
		   <?php if($loopChild['nowtype']=='8') { ?>已评价<?php } ?>
		   <?php if($loopChild['nowtype']=='9') { ?>撤销<?php } ?>
		   <?php } else { ?>-<?php } ?></button>
					</div>

	
          
     
    </div>
				<div class="mui-card-footer"> 
 <div>
<span class="mui-badge mui-badge-primary">提示</span><?php if(!empty($loopChild['nowtype'])) { ?>
		   <?php if($loopChild['nowtype']=='1') { ?>请注意及时签到<?php } ?>
		   <?php if($loopChild['nowtype']=='2') { ?>已经超过预约时间请立即签到<?php } ?>
		   <?php if($loopChild['nowtype']=='3') { ?>您未在指定时间签到 预约已失效<?php } ?>
		   	<?php if($loopChild['nowtype']=='4') { ?>请注意及时签退哦<?php } ?>
		   <?php if($loopChild['nowtype']=='5') { ?>系统已自动签退<?php } ?>
		   <?php if($loopChild['nowtype']=='6') { ?>感谢您的使用<?php } ?>
		  <?php if($loopChild['nowtype']=='7') { ?>请等待教师评价<?php } ?>
		   <?php if($loopChild['nowtype']=='8') { ?>请查看评价<?php } ?>
		   <?php if($loopChild['nowtype']=='9') { ?>该预约已撤销<?php } ?>
		   <?php } else { ?>-<?php } ?></div>
    </div>			
				
				</div>
			<?php }?>
			</ul>
							</div>
					<?php } else { ?>
					<div style="text-align:center;margin: auto;
    position: absolute;
    top: 20%;
    left: 0;
    right: 0;
    bottom: 0;">
					<span  class="mui-icon mui-icon-paperplane" style="font-size: 120px;"></span>
	<h5>空空如也</h5>
		<h5>未来还没有安排</h5>
	  <button  id='yuyue2' type="button" class="mui-btn mui-btn-block mui-btn-outlined">前去预约</button>
	  </div>
					<?php } ?>
								
						</div>

					</div>
					<div id="item3mobile" class="mui-slider-item mui-control-content">
						<div id="scroll3" class="mui-scroll-wrapper">
						
													<?php if(!empty($Arr2)) { ?>
														<div class="mui-scroll">
									<ul class="mui-table-view">
			<?php foreach((array)$Arr2 as $key=>$loopChild) {?><div id="<?php echo $loopChild['id'];?>" class="mui-card">
				<div class="mui-card-header"><h3><?php echo $loopChild['room'];?></h3><?php echo $loopChild['name'];?></div>
				<div class="mui-card-content">
					<div class="mui-card-content-inner">
						<b>预约时间 </b> <?php if(!empty($loopChild['yuyuetime'])) { ?><?php ECHO(date('Y-m-j G:i',$loopChild['yuyuetime']))?><?php } else { ?>-<?php } ?></br>
					    <b>预约时长 </b> <span class="mui-badge mui-badge-success"><?php ECHO(secToTime($loopChild['shichangtime']))?></span><br>
						<b>人数 </b> <span class="mui-badge"><?php echo $loopChild['number'];?></span>
    <button type="button" style="float:right" class="mui-btn mui-btn-primary mui-btn-outlined"><?php if(!empty($loopChild['nowtype'])) { ?>
		   <?php if($loopChild['nowtype']=='1') { ?>已预约<?php } ?>
		   <?php if($loopChild['nowtype']=='2') { ?>预约保留<?php } ?>
		   <?php if($loopChild['nowtype']=='3') { ?>预约过期<?php } ?>
		   	<?php if($loopChild['nowtype']=='4') { ?>已签到<?php } ?>
		   <?php if($loopChild['nowtype']=='5') { ?>自动签退<?php } ?>
		   <?php if($loopChild['nowtype']=='6') { ?>已签退<?php } ?>
		  <?php if($loopChild['nowtype']=='7') { ?>已上传<?php } ?>
		   <?php if($loopChild['nowtype']=='8') { ?>已评价<?php } ?>
		   <?php if($loopChild['nowtype']=='9') { ?>撤销<?php } ?>
		   <?php } else { ?>-<?php } ?></button>
					</div>

	
       
     
    </div>
				<div class="mui-card-footer"> 
 <div>
<span class="mui-badge mui-badge-primary">提示</span><?php if(!empty($loopChild['nowtype'])) { ?>
		   <?php if($loopChild['nowtype']=='1') { ?>请注意及时签到<?php } ?>
		   <?php if($loopChild['nowtype']=='2') { ?>已经超过预约时间请立即签到<?php } ?>
		   <?php if($loopChild['nowtype']=='3') { ?>您未在指定时间签到 预约已失效<?php } ?>
		   	<?php if($loopChild['nowtype']=='4') { ?>请注意及时签退哦<?php } ?>
		   <?php if($loopChild['nowtype']=='5') { ?>系统已自动签退<?php } ?>
		   <?php if($loopChild['nowtype']=='6') { ?>感谢您的使用<?php } ?>
		  <?php if($loopChild['nowtype']=='7') { ?>请等待教师评价<?php } ?>
		   <?php if($loopChild['nowtype']=='8') { ?>请查看评价<?php } ?>
		   <?php if($loopChild['nowtype']=='9') { ?>该预约已撤销<?php } ?>
		   <?php } else { ?>-<?php } ?></div>
    </div>			
				
				</div>
			<?php }?>
				</ul>
							</div>
					<?php } else { ?>
							<div style="text-align:center;margin: auto;
    position: absolute;
    top: 20%;
    left: 0;
    right: 0;
    bottom: 0;">
					<span  class="mui-icon mui-icon-paperplane" style="font-size: 120px;"></span>
	<h5>没有历史安排</h5>
	<h5>过期安排也会在这里</h5>
	  </div>
					<?php } ?>
							
						</div>

					</div>
				</div>
			</div>
				
			</div>

		</div>

		<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
		<script>
			mui.init({
		swipeBack: false
			});
			(function($) {
				$('.mui-scroll-wrapper').scroll({
					indicators: true //是否显示滚动条
				});



			})(mui);
	document.getElementById('yuyue').addEventListener('tap', function() {
  mui.openWindow({
    url: '<?php echo $arrInfo['url'];?>/sxzs/yuyue', 
    id:'yy'
  });
});
<?php if(empty($Arr1)||empty($Arr2)||empty($Arr3)) { ?>
	document.getElementById('yuyue2').addEventListener('tap', function() {
  mui.openWindow({
    url: '<?php echo $arrInfo['url'];?>/sxzs/yuyue', 
    id:'yy'
  });
});
<?php } ?>
	document.getElementById('wo').addEventListener('tap', function() {
  mui.openWindow({
    url: '<?php echo $arrInfo['url'];?>/sxzs/wo', 
    id:'wo'
  });
});
	document.getElementById('index1').addEventListener('tap', function() {
  mui.openWindow({
    url: '<?php echo $arrInfo['url'];?>/sxzs/index', 
    id:'yy'
  });
});

mui(".mui-table-view").on('tap','.mui-card',function(){
  //获取id
  var id = this.getAttribute("id");
  //传值给详情页面，通知加载新数据
  //mui.fire(detail,'getDetail',{id:id});
  //打开新闻详情
  var id = this.getAttribute("id");

  //传值给详情页面，通知加载新数据
  //mui.fire(detail,'getDetail',{id:id});
  //打开新闻详情
  mui.openWindow({
    id:'detail',
    url:'<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/idetail/'+id
  });
}) 
			<?php if(!empty($Arr1)) { ?><?php foreach((array)$Arr1 as $key=>$loopChild) {?>
	mui.ajax('<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/upnumber3/<?php echo $loopChild['rid'];?>',{
	data:{
		ZY:'970127',
	},
	async:true,
	dataType:'text',
	type:'post',//HTTP请求类型
	timeout:10000,//超时时间设置为10秒；              
	success:function(data){

	},
	error:function(xhr,type,errorThrown){
		//异常处理；
		console.log(type);
	}
});			
		<?php }?>
					<?php } ?>
				<?php if(!empty($Arr2)) { ?><?php foreach((array)$Arr2 as $key=>$loopChild) {?>
	mui.ajax('<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/upnumber3/<?php echo $loopChild['rid'];?>',{
	data:{
		ZY:'970127',
	},
	async:true,
	dataType:'text',
	type:'post',//HTTP请求类型
	timeout:10000,//超时时间设置为10秒；              
	success:function(data){

	},
	error:function(xhr,type,errorThrown){
		//异常处理；
		console.log(type);
	}
});			
		<?php }?>
					<?php } ?>
				<?php if(!empty($Arr3)) { ?><?php foreach((array)$Arr3 as $key=>$loopChild) {?>
	mui.ajax('<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/upnumber3/<?php echo $loopChild['rid'];?>',{
	data:{
		ZY:'970127',
	},
	async:true,
	dataType:'text',
	type:'post',//HTTP请求类型
	timeout:10000,//超时时间设置为10秒；              
	success:function(data){

	},
	error:function(xhr,type,errorThrown){
		//异常处理；
		console.log(type);
	}
});			
		<?php }?>
					<?php } ?>				
			mui.ready(function (){

  				document.getElementById("tabbar-with-home").style.height=document.body.clientHeight *0.9+ "px"; 
  				document.getElementById("item1mobile").style.height=document.body.clientHeight *0.83+ "px"; 
  				document.getElementById("item2mobile").style.height=document.body.clientHeight *0.83+ "px"; 
  				document.getElementById("item3mobile").style.height=document.body.clientHeight *0.83+ "px"; 


});
		</script>
	</body>

</html>