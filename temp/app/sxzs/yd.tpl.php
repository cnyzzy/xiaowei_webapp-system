<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>实训助手</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/mui.min.css">
		<style>
			html,
			body {
				background-color: #efeff4;
			}
			p {
				text-indent: 22px;
			}
			span.mui-icon {
				font-size: 14px;
				color: #007aff;
				margin-left: -15px;
				padding-right: 10px;
			}
			.mui-off-canvas-left {
				color: #fff;
			}
			.title {
				margin: 35px 15px 10px;
			}
			.azy {
				
			}
			.title+.content {
				margin: 10px 15px 5px;
				color: #fff;
				text-indent: 1em;
				font-size: 14px;
				line-height: 24px;
			}
			input {
				color: #000;
			}
					.mui-card .mui-control-content {
				padding: 10px;
			}
			
			.mui-control-content {
				height: 350px;
			}
			.mui-table-view {

background-color: #333;
}
 .mui-table-view-cell.mui-collapse .mui-collapse-content {
background: #333; 
}
.mui-table-view-cell.mui-active {
background-color: #332;
}
.mui-table-view-cell.mui-collapse .mui-table-view {
margin-top: -11px;

}
		.mui-card2 {
font-size: 14px;
position: relative;
overflow: hidden;
margin: 10px;
border-radius: 2px;
background-color: #fff;
background-clip: padding-box;
box-shadow: 0 1px 2px rgba(0,0,0,.3);
text-align: center;
}
.mui-row{margin-left: auto; margin-right: auto;}
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
	
		<div id="offCanvasWrapper" class="mui-off-canvas-wrap mui-scalable">
			<!--侧滑菜单部分-->
			<aside id="offCanvasSide" class="mui-off-canvas-left">
				<div id="offCanvasSideScroll" class="mui-scroll-wrapper">
					<div class="mui-scroll">
						<div class="title">导航</div>
						<div class="content">

							<p style="margin: 10px 15px;">
								<button id="offCanvasHide" type="button" class="mui-btn mui-btn-danger mui-btn-block" style="padding: 5px 20px;">关闭</button>
							</p>
<div style="padding: 10px 10px;"><?php if(!empty($A)) { ?>
	<div id="segmentedControl" class="mui-segmented-control">
			<?php foreach((array)$A as $key=>$loopChild) {?>
					<a class="mui-control-item<?php if($xq==$loopChild['text']) { ?> mui-active<?php } ?>" href="#item<?php echo $loopChild['value'];?>"><?php echo $loopChild['text'];?></a>
				<?php }?></div>

					<?php } ?>
				
			</div>
			<div><?php if(!empty($A)) { ?>
			<?php foreach((array)$A as $key=>$loopChild) {?>
			
				<div id="item<?php echo $loopChild['value'];?>" class="mui-control-content<?php if($xq==$loopChild['text']) { ?> mui-active<?php } ?>">
					<div id="scroll" class="mui-scroll-wrapper">
						<div class="mui-scroll">
	<ul class="mui-table-view"> 
	<?php if(!empty($loopChild['children'])) { ?>
	<?php foreach((array)$loopChild['children'] as $key=>$loopChild2) {?>
        <li class="mui-table-view-cell mui-collapse<?php if($dept==$loopChild2['text']) { ?> mui-active<?php } ?>">
            <a class="mui-navigate-right" href="#"><?php echo $loopChild2['text'];?></a>
            <div class="mui-collapse-content">
               <ul class="mui-table-view">
			   	<?php if(!empty($loopChild2['children'])) { ?>
	<?php foreach((array)$loopChild2['children'] as $key=>$loopChild3) {?>
    <li class="mui-table-view-cell">
        <a id="<?php echo $loopChild3['value'];?>" class="mui-navigate-right azy"><?php echo $loopChild3['text'];?></a>
    </li>
	<?php }?>
        <?php } ?>
</ul>
            </div>
        </li>
		<?php }?>
        <?php } ?>
	

    </ul>
						</div>
					</div>
				</div>
					<?php }?>
				<?php } ?>


			</div>


						</div>
</div>
				</div>
			</aside>
			
			<!--主界面部分-->
			<div id='yy' class="mui-inner-wrap">
				<header class="mui-bar mui-bar-nav">
					<a href="#offCanvasSide" class="mui-icon mui-action-menu mui-icon-bars mui-pull-left"></a>
					
					<h1 class="mui-title">预约</h1>
					<a class="mui-action-back mui-btn mui-btn-link mui-pull-right">返回</a>
				</header>
				<div id="offCanvasContentScroll" class="mui-content mui-scroll-wrapper">
					<div class="mui-scroll">
						<div class="mui-content-padded">

					
						<div class="mui-content">
			<div ID='show' class="mui-card mui-card2">
				<div class="mui-card-content">
					<div class="mui-card-content-inner">
						<?php if(!empty($xq)&&!empty($dept)&&!empty($ground)) { ?><?php echo $xq;?>-<?php echo $dept;?>-<?php echo $ground;?><?php } else { ?>未知<?php } ?>
					</div>
				</div>
			</div>		
			<?php if(!empty($WArrsy)) { ?>
			<?php foreach((array)$WArrsy as $key=>$loopChild) {?><div id="<?php echo $loopChild['id'];?>" class="mui-card">
				<div class="mui-card-header"><h3><?php echo $loopChild['room'];?></h3><?php echo $loopChild['name'];?></div>
				<div class="mui-card-content">
					<div class="mui-card-content-inner">
						<?php echo $loopChild['description'];?>
					</div>
				</div>
				<div class="mui-card-content">
     <div class="mui-row"> 
           <button type="button" style="float:right;right: 6px;bottom: 5px;" class="mui-btn mui-btn-primary mui-btn-outlined"><?php if(!empty($loopChild['yytype'])) { ?><?php if($loopChild['yytype']=='1') { ?>个人预约<?php } ?><?php if($loopChild['yytype']=='2') { ?>小组预约<?php } ?><?php if($loopChild['yytype']=='3') { ?>班级预约<?php } ?><?php } else { ?>-<?php } ?></button>
       </div>
    </div>
				<div class="mui-card-footer"> 
 <div class="mui-row">        <div class="mui-col-sm-14" style="padding-right: 50px;">
当前 <span class="mui-badge mui-badge-primary"><?php if(!empty($loopChild['now']['nownumber'])) { ?><?php echo $loopChild['now']['nownumber'];?><?php } else { ?>0<?php } ?></span>
 </li>
        </div>
        <div class="mui-col-sm-14" style="padding-right: 50px;">
 占用 <span class="mui-badge mui-badge-danger"><?php if(!empty($loopChild['now']['zynumber'])) { ?><?php echo $loopChild['now']['zynumber'];?><?php } else { ?>0<?php } ?></span>
</li>
        </div>
        <div class="mui-col-sm-14">
    总数 <span class="mui-badge mui-badge-success"><?php echo $loopChild['number'];?></span> </div>
    </div>			
				
				</div>
			</div><?php }?>
					<?php } else { ?>
											<div style="text-align:center;margin: auto;
    position: absolute;
    top: 180%;
    left: 0;
    right: 0;
    bottom: 0;">
					<span  class="mui-icon mui-icon-paperplane" style="font-size: 120px;"></span>
	<h5>空空如也</h5>
	<h5>这个楼层没有教室</h5>
	  <button  id='yuyue2' type="button" class="mui-btn mui-btn-block mui-btn-outlined">返回</button>
	  </div>
					<?php } ?>

						</div>
						</div>
					</div>
				</div>
				<!-- off-canvas backdrop -->
				<div class="mui-off-canvas-backdrop"></div>
			</div>	
		</div>
		<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/mui.min.js"></script>
		<script>
			mui.init();
		
			 //侧滑容器父节点
			var offCanvasWrapper = mui('#offCanvasWrapper');
			 //主界面容器
			

			 //菜单界面，‘关闭侧滑菜单’按钮的点击事件
			document.getElementById('offCanvasHide').addEventListener('tap', function() {
				offCanvasWrapper.offCanvas('close');
			});
			 //主界面和侧滑菜单界面均支持区域滚动；
			mui('#offCanvasSideScroll').scroll();
			mui('#offCanvasContentScroll').scroll();


			 //实现ios平台原生侧滑关闭页面；
			if (mui.os.plus && mui.os.ios) {
				mui.plusReady(function() { //5+ iOS暂时无法屏蔽popGesture时传递touch事件，故该demo直接屏蔽popGesture功能
					plus.webview.currentWebview().setStyle({
						'popGesture': 'none'
					});
				});
			}
			  (function($) {
				$('#scroll').scroll({
					indicators: true //是否显示滚动条
				});
				var segmentedControl = document.getElementById('segmentedControl');
				$('.mui-input-group').on('change', 'input', function() {
					if (this.checked) {
						var styleEl = document.querySelector('input[name="style"]:checked');
						var colorEl = document.querySelector('input[name="color"]:checked');
						if (styleEl && colorEl) {
							var style = styleEl.value;
							var color = colorEl.value;
							segmentedControl.className = 'mui-segmented-control' + (style ? (' mui-segmented-control-' + style) : '') + ' mui-segmented-control-' + color;
						}
					}
				});
			})(mui);  
			mui(".mui-content").on('tap','.mui-card',function(){
  //获取id
  var id = this.getAttribute("id");
  if(id=="show")
  {offCanvasWrapper.offCanvas('show');}else
  {
  //传值给详情页面，通知加载新数据
  //mui.fire(detail,'getDetail',{id:id});
  //打开新闻详情
  mui.openWindow({
    id:'detail',
    url:'<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/detail/'+id
  });
  }
}); 
			mui(".mui-table-view").on('tap','.azy',function(){
  //获取id
  var id = this.getAttribute("id");

  //传值给详情页面，通知加载新数据
  //mui.fire(detail,'getDetail',{id:id});
  //打开新闻详情
  mui.openWindow({
    id:'detail',
    url:'<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/yd/'+id
  });
 
});		<?php if(empty($WArrsy)) { ?>
	document.getElementById('yuyue2').addEventListener('tap', function() {
  mui.openWindow({
    url: '<?php echo $arrInfo['url'];?>/sxzs/yuyue', 
    id:'yy'
  });
});
<?php } ?>
			mui.ready(function (){

  				document.getElementById("item1").style.height=document.body.clientHeight *0.55+ "px"; 
					<?php if(!empty($WArrsy)) { ?>
			<?php foreach((array)$WArrsy as $key=>$loopChild) {?>
			<?php if(empty($loopChild['now'])) { ?>
	mui.ajax('<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/upnumber/<?php echo $loopChild['rid'];?>',{
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
					<?php } ?>
		<?php }?>
					<?php } ?>


});
		</script>
	</body>

</html>