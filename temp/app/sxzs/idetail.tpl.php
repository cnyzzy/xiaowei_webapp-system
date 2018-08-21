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
	*{margin:0;padding:0;list-style:none;}
img{border:0;}
input{outline:none;}
ul,ol,li{list-style:none;}
table{border-collapse:collapse;border-spacing:0;}
label, label input,button{vertical-align:middle;}
blr:expression(this.onFocus=this.blur()); /* IE Opera去掉点击链接时的虚线外框 */
outline:none; /* FF Opera去掉点击链接时的虚线外框 */
area {blr:expression(this.onFocus=this.blur()); } /* 图片热点去掉点击链接时的虚线外框 */
a:focus{-moz-outline-style: none;}
a.hidefocus  { outline:none; }
/* FF去掉点击链接时的虚线外框 */
.clear{clear:both; font-size:0; height:0; line-height:0;}

h1, h2, h3, h4, h5, h6{font-weight:normal;font-size:100%;}
a{color:#444444;text-decoration:none;}
.clearfix:after {visibility: hidden;display: block; font-size: 0;content: " ";clear: both;height: 0;}



.ztb_nav{ background:#f1eded; position: absolute; left: 0px;right: 0px;top: 0px;bottom: 0px; width:235px;_height: expression(document.documentElement.clientHeight-0+"px");overflow: hidden;}

.ztb_up{  height:19px; width:100%; margin-top:10px; }
.ztb_down{  height:19px; width:100%; position:absolute; bottom:10px; }
.ztb_up a{ display:block;cursor:pointer; width:32px; height:19px; margin:0 auto }
.ztb_down a{ display:block;cursor:pointer; width:32px; height:19px; margin:0 auto }
.ztb_content{   position: absolute; left: 0px;right: 0px;top: 29px;bottom: 29px; width:235px;_height: expression(document.documentElement.clientHeight-58+"px");overflow: hidden; }
.online{ width:1px; position:absolute; left: 20px;right: 0px;top:0px;bottom: 0px;_height: expression(document.documentElement.clientHeight-0+"px");overflow: hidden;  border-left:1px solid #ccc; z-index:100}
.ztb_main_01{position:relative; z-index:1000}
.ztb_content_01{ padding:20px 0px 20px 10px; z-index:1000}
.ztb_content_01 .ztb_con_text{ font-size:14px; color:#404040; background:url(../images/ztb_lc.png) no-repeat; padding-left:40px; display:block; height:24px; margin-bottom:20px}
.ztb_content_01 .ztb_content_02 li {margin-bottom:10px; background:url(../images/ztb_gx2.png) left center no-repeat; padding-left:35px; margin-left:5px}
.ztb_content_01 li{ margin-bottom:40px}
.ztb_over .ztb_con_text{ font-size:14px; color:#404040; background:url(../images/ztb_gx.png) no-repeat; padding-left:40px; display:block; height:24px; margin-bottom:20px}
.ztb_content_01 .ztb_content_02 li.ztb_end{background:url(../images/ztb_gx1.png) left center no-repeat;}
.ztb_on .ztb_con_text{ font-size:14px; color:#404040; background:url(../images/ztb_active-6.png) no-repeat; padding-left:40px; display:block; height:24px; margin-bottom:20px}
.ztb_content_01 .ztb_content_02 li.ztb_active{background:url(../images/ztb_active.png) left center no-repeat;}
.ztb_content_01 .ztb_content_02 li.ztb_active a{ color:#2285d3; font-weight:bold}
.ztb_content_01 .ztb_content_02 li a:hover{ text-decoration:underline}
.ztb_content_01 li a{ display:block}
.ztb_content_01 .ztb_content_02 li.ztb_active a{  }

.ztb_content_01 .ztb_content_02 li.ztb_online a{background:url(../images/ztb_sel.png) right center no-repeat;}
.ztb_content_01 .ztb_content_02 li.ztb_online a:hover{ text-decoration:underline}
.ztb_con_text{font-weight: bold;}
		</style>
	</head>

	<body>

<nav class="mui-bar mui-bar-tab">
			<a id='yuyue' class="mui-tab-item">
				<span class="mui-icon mui-icon-home"></span>
				<span class="mui-tab-label">预约</span>
			</a>
			<a id='index1' class="mui-tab-item mui-active">
				<span class="mui-icon mui-icon-flag"></span>
				<span class="mui-tab-label">安排</span>
			</a>
			<a id='wo' class="mui-tab-item">
				<span class="mui-icon mui-icon-gear"></span>
				<span class="mui-tab-label">我</span>
			</a>

		</nav>
<header id="header" class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">安排详情</h1>
			<button class="mui-btn mui-btn-blue mui-btn-link mui-pull-right"></button>
		</header>
		<div class="mui-content">
								<div class="mui-card">
				<div class="mui-card-header">概况</div>
				<div class="mui-card-content">
		<div class="mui-card-content-inner" style="text-align: center;">
							<?php if(!empty($Array2['description'])) { ?><?php echo $Array2['description'];?><?php } else { ?>-<?php } ?>
					</div>
					<div class="mui-card-content-inner">
				<ul class="mui-table-view">
						<li class="mui-table-view-cell">
						类型
						<button type="button" class="mui-btn">
													<?php if(!empty($Array['type'])) { ?><?php echo $Array['type'];?><?php } else { ?>-<?php } ?>
						</button>
					</li>
						
					<li class="mui-table-view-cell">
						状态
						<button type="button" class="mui-btn mui-btn-primary">
									   <?php if($Array['nowtype']=='1') { ?>已预约<?php } ?>
		   <?php if($Array['nowtype']=='2') { ?>预约保留<?php } ?>
		   <?php if($Array['nowtype']=='3') { ?>预约过期<?php } ?>
		   	<?php if($Array['nowtype']=='4') { ?>已签到<?php } ?>
		   <?php if($Array['nowtype']=='5') { ?>自动签退<?php } ?>
		   <?php if($Array['nowtype']=='6') { ?>已签退<?php } ?>
		  <?php if($Array['nowtype']=='7') { ?>已上传<?php } ?>
		   <?php if($Array['nowtype']=='8') { ?>已评价<?php } ?>
		   <?php if($Array['nowtype']=='9') { ?>撤销<?php } ?>
						</button>
					</li>

						<li class="mui-table-view-cell">
						时间
						<button type="button" class="mui-btn">
							<?php ECHO(date('Y-m-j G:i',$Array['yuyuetime']))?>
						</button>
					</li>
						<li class="mui-table-view-cell">
						预约时长
						<button type="button" class="mui-btn mui-btn-success">
							<?php ECHO(secToTime($Array['shichangtime']))?>
						</button>
					</li>
				</ul>
	
					</div>
													
				</div>
	
			</div>
		<div class="mui-card">
				<div class="mui-card-header">进度</div>
				<div class="mui-card-content">
					<div class="mui-card-content-inner">
<ul class="mui-table-view"> 
        <li class="mui-table-view-cell mui-collapse<?php if($Array['nowtype']=='9') { ?> mui-active<?php } ?>">
            <a class="mui-navigate-right" href="#"><?php if($Array['nowtype']!='9') { ?><span class="mui-badge mui-icon mui-icon-checkmarkempty mui-spin"></span><?php } else { ?><span class="mui-badge mui-badge-danger mui-icon mui-icon-closeempty mui-spin"></span><?php } ?>Step1:预约</a>
            <div class="mui-collapse-content">
                <p><?php if($Array['nowtype']!='9') { ?>预约成功<br>请及时签到哦<?php } else { ?>已经成功撤销预约</span><?php } ?></p>
            </div>
			
        </li>
		    <li class="mui-table-view-cell mui-collapse<?php if($Array['nowtype']=='1'||$Array['nowtype']=='2'||$Array['nowtype']=='3') { ?> mui-active<?php } ?>">
            <a class="mui-navigate-right" href="#"><?php if($Array['nowtype']!='1'&&$Array['nowtype']!='2'&&$Array['nowtype']!='3'&&$Array['nowtype']!='9') { ?><span class="mui-badge mui-icon mui-icon-checkmarkempty mui-spin"></span><?php } ?>
			<?php if($Array['nowtype']=='1'||$Array['nowtype']=='2') { ?><span class="mui-badge mui-badge-primary mui-icon mui-icon-navigate"><?php } ?>
			<?php if($Array['nowtype']=='3') { ?><span class="mui-badge mui-badge-danger mui-icon mui-icon-closeempty mui-spin"><?php } ?></span>Step2:签到</a>
            <div class="mui-collapse-content">
                <p>
				<?php if($Array['nowtype']!='1'&&$Array['nowtype']!='2'&&$Array['nowtype']!='3'&&$Array['nowtype']!='9') { ?>您已在	<?php if(!empty($Array['realstarttime'])) { ?><?php ECHO(date('Y-m-j G:i:s',$Array['realstarttime']))?>
<?php } else { ?>未知<?php } ?>签到<br>签退时间自动更新为	<?php if(!empty($Array['iendtime'])) { ?><?php ECHO(date('Y-m-j G:i:s',$Array['iendtime']))?>
<?php } else { ?>未知<?php } ?><br>系统将在签退时间后自动签退<br>提前离开请手动签退<?php } ?>
				<?php if($Array['nowtype']=='1'||$Array['nowtype']=='2') { ?>如果您已到达请及时签到<br><?php if(!empty($djs)) { ?>距离签到最后期限还有: <b><?php echo $djs;?></B><br>     <button id='qiandao' type="button" class="mui-btn mui-btn-primary mui-btn-block">签到</button><?php } ?><?php } ?>
				<?php if($Array['nowtype']=='3') { ?>您未能在规定时间签到<br>已被系统判断为放弃使用<br>本次预约已失效<?php } ?></p>
            </div>
			
        </li>
		<li class="mui-table-view-cell mui-collapse<?php if($Array['nowtype']=='4') { ?> mui-active<?php } ?>">
            <a class="mui-navigate-right" href="#"><?php if($Array['nowtype']!='1'&&$Array['nowtype']!='9'&&$Array['nowtype']!='2'&&$Array['nowtype']!='3'&&$Array['nowtype']!='4'&&$Array['nowtype']!='5') { ?><span class="mui-badge mui-icon mui-icon-checkmarkempty mui-spin"></span><?php } ?>
			<?php if($Array['nowtype']=='5') { ?><span class="mui-badge mui-icon mui-icon-spinner mui-spin"></span><?php } ?>
			<?php if($Array['nowtype']=='4') { ?><span class="mui-badge mui-badge-primary mui-icon mui-icon-navigate"></span><?php } ?>
			Step3:签退</a>
            <div class="mui-collapse-content">
                <p>
								<?php if($Array['nowtype']=='1'||$Array['nowtype']=='2') { ?>尚未签到 不可签退<?php } ?>
					<?php if($Array['nowtype']=='3') { ?>已经过期 不可签退<?php } ?>

				<?php if($Array['nowtype']!='1'&&$Array['nowtype']!='9'&&$Array['nowtype']!='2'&&$Array['nowtype']!='3'&&$Array['nowtype']!='4'&&$Array['nowtype']!='5') { ?>
				签退时间：<?php if(!empty($Array['realendtime'])) { ?><?php ECHO(date('Y-m-j G:i:s',$Array['realendtime']))?>
<?php } else { ?>未知<?php } ?><br>感谢您的使用
				<?php } ?>
	<?php if($Array['nowtype']=='5') { ?>系统已自动签退<?php } ?>
			<?php if($Array['nowtype']=='4') { ?>签退时间为	<?php if(!empty($Array['iendtime'])) { ?><?php ECHO(date('Y-m-j G:i:s',$Array['iendtime']))?>
<?php } else { ?>未知<?php } ?><br>系统将在签退时间后自动签退<br>提前离开请手动签退<br>     <button id='qiantui' type="button" class="mui-btn mui-btn-primary mui-btn-block">签退</button><?php } ?>
</p>
            </div>
			
        </li>
		<li class="mui-table-view-cell mui-collapse"<?php if($Array['nowtype']=='5'||$Array['nowtype']=='6') { ?> mui-active<?php } ?>>
            <a class="mui-navigate-right" href="#">
						<?php if($Array['nowtype']=='5'||$Array['nowtype']=='6') { ?><span class="mui-badge mui-badge-primary mui-icon mui-icon-navigate"></span><?php } ?>
			<?php if($Array['nowtype']=='7'||$Array['nowtype']=='8') { ?><span class="mui-badge mui-icon mui-icon-checkmarkempty mui-spin"></span><?php } ?>
	Step4:上传</a>
            <div class="mui-collapse-content">
                <p><?php if($Array['nowtype']!='7'&&$Array['nowtype']!='8'&&$Array['nowtype']!='6') { ?>未完成签退 无法上传<?php } ?>
				<?php if($Array['nowtype']=='6') { ?>请准备照片以供上传 只有一次机会无法修改<br>     <button id='sc' type="button" class="mui-btn mui-btn-primary mui-btn-block">上传</button><?php } ?>
				<?php if($Array['nowtype']=='7'||$Array['nowtype']=='8') { ?>已经上传 请等待教师评价<?php } ?>
				</p>
            </div>
			
        </li>
				<li class="mui-table-view-cell mui-collapse<?php if($Array['nowtype']=='7'||$Array['nowtype']=='8') { ?> mui-active<?php } ?>">
            <a class="mui-navigate-right" href="#">
									<?php if($Array['nowtype']=='7') { ?><span class="mui-badge mui-badge-primary mui-icon mui-icon-navigate"></span><?php } ?>
			<?php if($Array['nowtype']=='8') { ?><span class="mui-badge mui-icon mui-icon-checkmarkempty mui-spin"></span><?php } ?>

			Step5:评价</a>
            <div class="mui-collapse-content">
                <p>暂未开放功能</p>
            </div>
			
        </li>
    </ul>
					</div>
													
				</div>
				
			</div>
						<div class="mui-card">
				<div class="mui-card-header">地点</div>
				<div class="mui-card-content">
					<div class="mui-card-content-inner">
				<ul class="mui-table-view">
	
			
					<li class="mui-table-view-cell">
						门牌
						<button type="button" class="mui-btn mui-btn-primary">
								<?php if(!empty($Array['room'])) { ?><?php echo $Array['room'];?><?php } else { ?>-<?php } ?>
						</button>
					</li>

				<li class="mui-table-view-cell">
						名称
						<button type="button" class="mui-btn">
						<?php if(!empty($Array['name'])) { ?><?php echo $Array['name'];?><?php } else { ?>-<?php } ?>
						</button>
					</li>
				</ul>
								<ul class="mui-table-view mui-table-view-chevron">
			
					<li class="mui-table-view-cell mui-collapse"><a class="mui-navigate-right" href="#">详细地点</a>
						<ul class="mui-table-view mui-table-view-chevron">
											<li class="mui-table-view-cell">
						校区
						<button type="button" class="mui-btn">
								<?php if(!empty($Array2['xq'])) { ?><?php echo $Array2['xq'];?><?php } else { ?>-<?php } ?>
						</button>
					</li>
	<li class="mui-table-view-cell">
						机构名
						<button type="button" class="mui-btn">
					<?php if(!empty($Array2['dept'])) { ?><?php echo $Array2['dept'];?><?php } else { ?>-<?php } ?>
						</button>
					</li>
						<li class="mui-table-view-cell">
						所在楼号
						<button type="button" class="mui-btn">
					<?php if(!empty($Array2['build'])) { ?><?php echo $Array2['build'];?><?php } else { ?>-<?php } ?>
						</button>
					</li>
						<li class="mui-table-view-cell">
						所在楼层
						<button type="button" class="mui-btn">
						<?php if(!empty($Array2['ground'])) { ?><?php echo $Array2['ground'];?><?php } else { ?>-<?php } ?>
						</button>
					</li>
						</ul>
					</li>
					
				</ul>
					</div>
													
				</div>
				
			</div>
	

				<div class="mui-card">
				<div class="mui-card-header">时间</div>
				<div class="mui-card-content">
					<div class="mui-card-content-inner">
				<ul class="mui-table-view">
	

						<li class="mui-table-view-cell">
						预约时间
						<button type="button" class="mui-btn mui-btn-success">
								<?php ECHO(date('Y-m-j G:i',$Array['yuyuetime']))?>
						</button>
					</li>
						<li class="mui-table-view-cell">
						预约时长
						<button type="button" class="mui-btn mui-btn-success">
							<?php ECHO(secToTime($Array['shichangtime']))?>
						</button>
					</li>
					<li class="mui-table-view-cell">
						登记时间
						<button type="button" class="mui-btn">
						<?php ECHO(date('Y-m-j G:i',$Array['addtime']))?>
						</button>
					</li>
				</ul>
								<ul class="mui-table-view mui-table-view-chevron">
			
					<li class="mui-table-view-cell mui-collapse"><a class="mui-navigate-right" href="#">详细时间</a>
						<ul class="mui-table-view mui-table-view-chevron">
											<li class="mui-table-view-cell">
						签到时间
						<button type="button" class="mui-btn">
							<?php if(!empty($Array['realstarttime'])) { ?><?php ECHO(date('Y-m-j G:i:s',$Array['realstarttime']))?>
<?php } else { ?>未知<?php } ?>
						</button>
					</li>
	<li class="mui-table-view-cell">
						签退时间
						<button type="button" class="mui-btn">
							<?php if(!empty($Array['realendtime'])) { ?><?php ECHO(date('Y-m-j G:i:s',$Array['realendtime']))?>
<?php } else { ?>未知<?php } ?>						</button>
					</li>
						<li class="mui-table-view-cell">
						使用时长
						<button type="button" class="mui-btn">
					<?php if(!empty($Array['realstarttime'])&&!empty($Array['realendtime'])) { ?><?php ECHO(secToTime($Array['realendtime']-$Array['realstarttime']))?>
<?php } else { ?>					<?php if(!empty($Array['realstarttime'])&&!empty($Array['iendtime'])) { ?><?php ECHO(secToTime($Array['iendtime']-$Array['realstarttime']))?>
<?php } else { ?>未知<?php } ?><?php } ?>
						</button>
					</li>
						<li class="mui-table-view-cell">
						上传成果时间
						<button type="button" class="mui-btn">
							<?php if(!empty($Array['sctime'])) { ?><?php ECHO(date('Y-m-j G:i:s',$Array['sctime']))?>
<?php } else { ?>未知<?php } ?>
						</button>
					</li>
						<li class="mui-table-view-cell">
						点评时间
						<button type="button" class="mui-btn">
						<?php if(!empty($Array['dptime'])) { ?><?php ECHO(date('Y-m-j G:i:s',$Array['dptime']))?>
<?php } else { ?>未知<?php } ?>
						</button>
					</li>
						</ul>
					</li>
					
				</ul>
					</div>
													
				</div>
				
			</div>
							<div class="mui-card">
				<div class="mui-card-header">人数</div>
				<div class="mui-card-content">
					<div class="mui-card-content-inner">
				<ul class="mui-table-view">
	
			
					<li class="mui-table-view-cell">
							 <input id="wlx"  type="hidden" value="">
						预约类型
						<button id="yylx" type="button" class="mui-btn mui-btn-primary">
														<?php if(!empty($Array2['yytype'])) { ?><?php if($Array2['yytype']=='1') { ?>个人预约<?php } ?><?php if($Array2['yytype']=='2') { ?>小组预约<?php } ?><?php if($Array2['yytype']=='3') { ?>班级预约<?php } ?><?php } else { ?>-<?php } ?>
						</button>
					</li>

				<li class="mui-table-view-cell">
							预约人数
						<span class="mui-badge mui-badge-primary"><?php echo $Array['number'];?></span>
						</li>
				</ul>
								<ul class="mui-table-view mui-table-view-chevron">
					<li class="mui-table-view-cell mui-collapse"><a class="mui-navigate-right" href="#">详细</a>
						<ul class="mui-table-view mui-table-view-chevron">
											<li class="mui-table-view-cell">
						负责人
						<button type="button" class="mui-btn">
							<?php echo $Array['sname'];?>
						</button>
					</li>
	<li class="mui-table-view-cell">
						成员
						<button type="button" class="mui-btn">
							暂未开放功能
						</button>
					</li>
					
						
						</ul>
					</li>
					
				</ul>
					</div>
													
				</div>
				
			</div>

<div class="mui-card">
				<div class="mui-card-content">
					<div class="mui-card-content-inner">
						<?php if($Array['nowtype']=='1') { ?>
			
						<button id='chexiao' type="button" class="mui-btn mui-btn-danger mui-btn-block">撤销</button>
						<?php } else { ?>
					
						<button type="button" class="mui-btn mui-btn-block mui-btn-outlined">	<?php if($Array['nowtype']=='9') { ?>已经撤销<?php } else { ?>已经无法撤销<?php } ?></button>
						<?php } ?>
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
    url: '/sxzs/yuyue', 
    id:'yy'
  });
});
	document.getElementById('wo').addEventListener('tap', function() {
  mui.openWindow({
    url: '/sxzs/wo', 
    id:'wo'
  });
});
	document.getElementById('index1').addEventListener('tap', function() {
  mui.openWindow({
    url: '/sxzs/index', 
    id:'yy'
  });
});

mui(".mui-table-view").on('tap','.mui-card',function(){
  //获取id
  var id = this.getAttribute("id");
  //传值给详情页面，通知加载新数据
  //mui.fire(detail,'getDetail',{id:id});
  //打开新闻详情

}) 
<?php if($Array['nowtype']=='1'||$Array['nowtype']=='2') { ?>
	document.getElementById('qiandao').addEventListener('tap', function() {
				var btnArray = ['否', '是'];
				mui.confirm('您已经到达教室，确认签到？', '实训助手', btnArray, function(e) {
					if (e.index == 1) {
								mui.ajax('<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/qiandao/<?php echo $Array['id'];?>',{
	data:{
		time:<?php ECHO(time())?>,

	},
	dataType:'json',//服务器返回json格式数据
	type:'post',//HTTP请求类型
	timeout:10000,//超时时间设置为10秒；	              
	success:function(data){
		//服务器返回响应，根据响应结果，分析是否登录成功；
	if(data.status==0)mui.alert(data.content);   
	if(data.status==1){
  mui.openWindow({
    id:'detail',
    url:'<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/idetail/<?php echo $Array['id'];?>'
  });
	}

	},
	error:function(xhr,type,errorThrown){
		//异常处理；
		console.log(type);mui.alert("网络故障");  
	}
});
					} else {
						mui.toast('请到达后签到',{ duration:'short', type:'div' }) 
					}
				})


});
<?php } ?>
<?php if($Array['nowtype']=='4') { ?>
	document.getElementById('qiantui').addEventListener('tap', function() {

				var btnArray = ['否', '是'];
				mui.confirm('您已经结束使用，确认签退？', '实训助手', btnArray, function(e) {
					if (e.index == 1) {
										mui.ajax('<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/qiantui/<?php echo $Array['id'];?>',{
	data:{
		time:<?php ECHO(time())?>,

	},
	dataType:'json',//服务器返回json格式数据
	type:'post',//HTTP请求类型
	timeout:10000,//超时时间设置为10秒；	              
	success:function(data){
		//服务器返回响应，根据响应结果，分析是否登录成功；
	if(data.status==0)mui.alert(data.content);   
	if(data.status==1){
  mui.openWindow({
    id:'detail',
    url:'<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/idetail/<?php echo $Array['id'];?>'
  });
	}

	},
	error:function(xhr,type,errorThrown){
		//异常处理；
		console.log(type);mui.alert("网络故障");  
	}
});
					} else {
						mui.toast('您取消了签退',{ duration:'short', type:'div' }) 
					}
				})
});
<?php } ?>
<?php if($Array['nowtype']=='6') { ?>
	document.getElementById('sc').addEventListener('tap', function() {

				var btnArray = ['否', '是'];
				mui.confirm('您已准备好照片，确认上传？', '实训助手', btnArray, function(e) {
					if (e.index == 1) {
  mui.openWindow({
    id:'detail',
    url:'<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/cgadd/<?php echo $Array['id'];?>'
  });
					} else {
						mui.toast('您取消了上传',{ duration:'short', type:'div' }) 
					}
				})
});
<?php } ?>
				<?php if($Array['nowtype']=='1') { ?>
				document.getElementById('chexiao').addEventListener('tap', function() {

				var btnArray = ['否', '是'];
				mui.confirm('频繁撤销将会影响信用分，确认？', '实训助手', btnArray, function(e) {
					if (e.index == 1) {
										mui.ajax('<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/chexiao/<?php echo $Array['id'];?>',{
	data:{
		time:<?php ECHO(time())?>,

	},
	dataType:'json',//服务器返回json格式数据
	type:'post',//HTTP请求类型
	timeout:10000,//超时时间设置为10秒；	              
	success:function(data){
		//服务器返回响应，根据响应结果，分析是否登录成功；
	if(data.status==0)mui.alert(data.content);   
	if(data.status==1){
  mui.openWindow({
    id:'detail',
    url:'<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/idetail/<?php echo $Array['id'];?>'
  });
	}

	},
	error:function(xhr,type,errorThrown){
		//异常处理；
		console.log(type);mui.alert("网络故障");  
	}
});
					} else {
						mui.toast('您取消了签退',{ duration:'short', type:'div' }) 
					}
				})
});
						
						<?php } ?>
		</script> 
	</body>

</html>