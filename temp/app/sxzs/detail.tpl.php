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
	
		</style>
		<style type="text/css">
		.demo{
			padding: 2em;
			background: #fff;
		}
		.progress{
                  width: 150px;
                  height: 150px;
                  line-height: 150px;
                  background: none;
                  margin: 0 auto;
                  box-shadow: none;
                  position: relative;
              }
              .progress:after{
                  content: "";
                  width: 100%;
                  height: 100%;
                  border-radius: 50%;
                  border: 2px solid #fff;
                  position: absolute;
                  top: 0;
                  left: 0;
              }
              .progress > span{
                  width: 50%;
                  height: 100%;
                  overflow: hidden;
                  position: absolute;
                  top: 0;
                  z-index: 1;
              }
              .progress .progress-left{
                  left: 0;
              }
              .progress .progress-bar{
                  width: 100%;
                  height: 100%;
                  background: none;
                  border-width: 2px;
                  border-style: solid;
                  position: absolute;
                  top: 0;
              }
              .progress .progress-left .progress-bar{
                  left: 100%;
                  border-top-right-radius: 80px;
                  border-bottom-right-radius: 80px;
                  border-left: 0;
                  -webkit-transform-origin: center left;
                  transform-origin: center left;
              }
              .progress .progress-right{
                  right: 0;
              }
              .progress .progress-right .progress-bar{
                  left: -100%;
                  border-top-left-radius: 80px;
                  border-bottom-left-radius: 80px;
                  border-right: 0;
                  -webkit-transform-origin: center right;
                  transform-origin: center right;
				  
                  animation: loading-1 1.8s linear forwards;
              }
              .progress .progress-value{
                  width: 85%;
                  height: 85%;
                  border-radius: 50%;
                  border: 2px solid #ebebeb;
                  font-size: 32px;
                  line-height: 125px;
                  text-align: center;
                  position: absolute;
                  top: 7.5%;
                  left: 7.5%;
              }
              .progress.blue .progress-bar{
                  border-color: #049dff;
              }
              .progress.blue .progress-value{
                  color: #049dff;
              }
              .progress.blue .progress-left .progress-bar{
                  animation: loading-2 1.5s linear forwards 1.8s;
              }
              .progress.yellow .progress-bar{
                  border-color: #fdba04;
              }
              .progress.yellow .progress-value{
                  color: #fdba04;
              }
              .progress.yellow .progress-left .progress-bar{
                  animation: loading-3 1s linear forwards 1.8s;
              }
              .progress.pink .progress-bar{
                  border-color: #ed687c;
              }
              .progress.pink .progress-value{
                  color: #ed687c;
              }
              .progress.pink .progress-left .progress-bar{
                  animation: loading-4 0.4s linear forwards 1.8s;
              }
              .progress.green .progress-bar{
                  border-color: #1abc9c;
              }
              .progress.green .progress-value{
                  color: #1abc9c;
              }
              .progress.green .progress-left .progress-bar{
                  animation: loading-5 1.2s linear forwards 1.8s;
              }
              @keyframes loading-1{
                  0%{
                      -webkit-transform: rotate(0deg);
                      transform: rotate(0deg);
                  }
                  100%{
                      -webkit-transform: rotate(<?php if($ZYBFB<50) { ?><?php ECHO(3.6*$ZYBFB)?><?php } else { ?>180<?php } ?>deg);
                      transform: rotate(<?php if($ZYBFB<50) { ?><?php ECHO(3.6*$ZYBFB)?><?php } else { ?>180<?php } ?>deg);
                  }
              }
              @keyframes loading-2{
                  0%{
                      -webkit-transform: rotate(0deg);
                      transform: rotate(0deg);
                  }
                  100%{
                      -webkit-transform: rotate(<?php if($ZYBFB>50) { ?><?php ECHO(3.6*($ZYBFB-50))?><?php } else { ?>0<?php } ?>deg);
                      transform: rotate(<?php if($ZYBFB>50) { ?><?php ECHO(3.6*($ZYBFB-50))?><?php } else { ?>0<?php } ?>deg);
                  }
              }
              @keyframes loading-3{
                  0%{
                      -webkit-transform: rotate(0deg);
                      transform: rotate(0deg);
                  }
                  100%{
                      -webkit-transform: rotate(90deg);
                      transform: rotate(90deg);
                  }
              }
              @keyframes loading-4{
                  0%{
                      -webkit-transform: rotate(0deg);
                      transform: rotate(0deg);
                  }
                  100%{
                      -webkit-transform: rotate(36deg);
                      transform: rotate(36deg);
                  }
              }
              @keyframes loading-5{
                  0%{
                      -webkit-transform: rotate(0deg);
                      transform: rotate(0deg);
                  }
                  100%{
                      -webkit-transform: rotate(126deg);
                      transform: rotate(126deg);
                  }
              }
              @media only screen and (max-width: 990px){
                  .progress{ margin-bottom: 20px; }
              }
	</style>

		<style>
			.chart {
				height: 200px;
				margin: 0px;
				padding: 0px;
			}
			h5 {
				margin-top: 30px;
				font-weight: bold;
			}
			h5:first-child {
				margin-top: 15px;
			}
			.mui-card2 {

text-align: center;
}
		</style>
	</head>

	<body>

<nav class="mui-bar mui-bar-tab">
			<a id='yuyue' class="mui-tab-item mui-active">
				<span class="mui-icon mui-icon-home"></span>
				<span class="mui-tab-label">预约</span>
			</a>
			<a id='index1' class="mui-tab-item">
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
			<h1 class="mui-title">预约详情</h1>
		</header>
		<div class="mui-content">
								<div class="mui-card">
				<div class="mui-card-header">概况</div>
				<div class="mui-card-content">
				<div class="mui-card-content-inner" style="text-align: center;">
							<?php if(!empty($Array['description'])) { ?><?php echo $Array['description'];?><?php } else { ?>-<?php } ?>
					</div>
					<div class="mui-card-content-inner">
				<ul class="mui-table-view">
						<li class="mui-table-view-cell">
						类型
						<button type="button" class="mui-btn">
						<?php if(!empty($Array['type'])) { ?><?php echo $Array['type'];?><?php } else { ?>-<?php } ?>
						</button>
					</li>
						
					<a href="#nowp"><li class="mui-table-view-cell">
						状态
						</a><button type="button" class="mui-btn mui-btn-primary">
							<?php if(!empty($ZYBFB)||@$ZYBFB==0) { ?><?php if(@$ZYBFB<35) { ?>空闲<?php } ?><?php if(@$ZYBFB<60&&@$ZYBFB>35) { ?>正常<?php } ?><?php if(@$ZYBFB<85&&@$ZYBFB>60) { ?>忙碌<?php } ?><?php if(@$ZYBFB<100&&@$ZYBFB>85) { ?>爆满<?php } ?><?php } else { ?>-<?php } ?>
						</button>
					</li></a>

						<li class="mui-table-view-cell">
						当前使用率
						<button type="button" class="mui-btn">
						<?php if(!empty($Array2['nownumber'])) { ?><?php echo $Array2['nownumber'];?><?php } else { ?>0<?php } ?>/<?php if(!empty($Array['number'])) { ?><?php echo $Array['number'];?><?php } else { ?>0<?php } ?>
						</button>
					</li>
						<li class="mui-table-view-cell">
						当天预约总数
						<span class="mui-badge mui-badge-primary"><?php if(!empty($Array2['ayynumber'])) { ?><?php echo $Array2['ayynumber'];?><?php } else { ?>0<?php } ?></span>
					</li>
					<li class="mui-table-view-cell">
						当天到场数
						<span class="mui-badge mui-badge-primary"><?php if(!empty($Array2['qdnumber'])) { ?><?php echo $Array2['qdnumber'];?><?php } else { ?>0<?php } ?></span>
					</li>
					
				</ul>
	
					</div>
													
				</div>
						<div class="mui-card2 mui-card-footer">
					当前占用百分比
				</div>	
			<div class="demo">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-3 col-sm-6">
		                    <div class="progress blue">
		                        <span class="progress-left">
		                            <span class="progress-bar"></span>
		                        </span>
		                        <span class="progress-right">
		                            <span class="progress-bar"></span>
		                        </span>
		                        <div class="progress-value"><?php if(!empty($ZYBFB)) { ?><?php echo $ZYBFB;?>%<?php } else { ?>0%<?php } ?></div>
		                    </div>
		                </div>


		            </div>
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
								<?php if(!empty($Array['xq'])) { ?><?php echo $Array['xq'];?><?php } else { ?>-<?php } ?>
						</button>
					</li>
	<li class="mui-table-view-cell">
						机构名
						<button type="button" class="mui-btn">
					<?php if(!empty($Array['dept'])) { ?><?php echo $Array['dept'];?><?php } else { ?>-<?php } ?>
						</button>
					</li>
						<li class="mui-table-view-cell">
						所在楼号
						<button type="button" class="mui-btn">
					<?php if(!empty($Array['build'])) { ?><?php echo $Array['build'];?><?php } else { ?>-<?php } ?>
						</button>
					</li>
						<li class="mui-table-view-cell">
						所在楼层
						<button type="button" class="mui-btn">
						<?php if(!empty($Array['ground'])) { ?><?php echo $Array['ground'];?><?php } else { ?>-<?php } ?>
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
						开始预约时间
						<button type="button" class="mui-btn mui-btn-success">
								<?php if(!empty($Array['opentime'])) { ?><?php ECHO(date('G:i',$Array['opentime']))?><?php } else { ?>-<?php } ?>
						</button>
					</li>
						<li class="mui-table-view-cell">
						结束预约时间
						<button type="button" class="mui-btn mui-btn-success">
								<?php if(!empty($Array['endtime'])) { ?><?php ECHO(date('G:i',$Array['endtime']))?><?php } else { ?>-<?php } ?> 
						</button>
					</li>
					<li class="mui-table-view-cell">
						预约最大时长
						<button type="button" class="mui-btn">
					<?php if(!empty($Array['maxtime'])) { ?><?php ECHO(date('G:i',$Array['maxtime']))?><?php } else { ?>-<?php } ?> 
						</button>
					</li>
				</ul>
								<ul class="mui-table-view mui-table-view-chevron">
			
					<li class="mui-table-view-cell mui-collapse"><a class="mui-navigate-right" href="#">详细</a>
						<ul class="mui-table-view mui-table-view-chevron">
											<li class="mui-table-view-cell">
						当天不开放时间
						<button type="button" class="mui-btn">
							暂无
						</button>
					</li>
	<li class="mui-table-view-cell">
						迟到保留时间
						<button type="button" class="mui-btn">
					<?php if(!empty($Array['limittime'])) { ?><?php ECHO(date('G:i:s',$Array['limittime']))?><?php } else { ?>-<?php } ?> 

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
							总可用人数
						<span class="mui-badge mui-badge-primary"><?php if(!empty($Array['number'])) { ?><?php echo $Array['number'];?><?php } else { ?>0<?php } ?></span>
						</li>
				
						<li class="mui-table-view-cell">
						当前使用人数
					<span class="mui-badge mui-badge-primary"><?php if(!empty($Array2['nownumber'])) { ?><?php echo $Array2['nownumber'];?><?php } else { ?>0<?php } ?>
</span>

					</li>
											<li class="mui-table-view-cell">
						当前占用人数
					<span class="mui-badge mui-badge-primary"><?php if(!empty($Array2['zynumber'])) { ?><?php echo $Array2['zynumber'];?><?php } else { ?>0<?php } ?>
</span>

					</li>
						<li class="mui-table-view-cell">
						预约类型
						<button type="button" class="mui-btn mui-btn-success">
							<?php if(!empty($Array['yytype'])) { ?><?php if($Array['yytype']=='1') { ?>个人预约<?php } ?><?php if($Array['yytype']=='2') { ?>小组预约<?php } ?><?php if($Array['yytype']=='3') { ?>班级预约<?php } ?><?php } else { ?>-<?php } ?>
						</button>
					</li>
					
				</ul>
								<ul class="mui-table-view mui-table-view-chevron">
			
					<li class="mui-table-view-cell mui-collapse"><a class="mui-navigate-right" href="#">详细</a>
						<ul class="mui-table-view mui-table-view-chevron">
									<?php if($Array['yytype']=='2') { ?>		<li class="mui-table-view-cell">
						最大小组数
						<span class="mui-badge mui-badge-danger"><?php if(!empty($Array['teamnumber'])) { ?><?php echo $Array['teamnumber'];?><?php } else { ?>0<?php } ?></span>
					</li><?php } ?><?php if($Array['yytype']=='3') { ?>	
	<li class="mui-table-view-cell">
						班级最大人数
						<span class="mui-badge mui-badge-danger"><?php if(!empty($Array['classnumber'])) { ?><?php echo $Array['classnumber'];?><?php } else { ?>0<?php } ?></span>
					</li><?php } ?>
						
						</ul>
					</li>
					
				</ul>
					</div>
													
				</div>
				
			</div>
	
	<div class="mui-card">
		<a name="nowp"></a>
				<div class="mui-card-header">今日预约情况</div>
				<div class="mui-card-content">
					<div class="mui-card-content-inner">
				<div class="chart" id="lineChart"></div>
					</div>
													
				</div>
				<div class="mui-card-footer">实时刷新</div>
			</div>
<div class="mui-card">
				<div class="mui-card-content">
					<div class="mui-card-content-inner">
					
					<a href="#yd" class="mui-btn mui-btn-primary mui-btn-block mui-btn-outlined" style="padding: 5px 20px;">预约</a>
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

<?php if(!empty($Array)) { ?>
	
			<?php if(!empty($isshuaxin)) { ?>
	mui.ajax('<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/upnumber/<?php echo $Array['rid'];?>',{
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
	
					<?php } ?>

			})(mui);
	document.getElementById('yuyue').addEventListener('tap', function() {
  mui.openWindow({
    url: '<?php echo $arrInfo['url'];?>/sxzs/yuyue', 
    id:'yy'
  });
});
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

		</script>
		<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/echarts-all.js"></script>
		<script>
			var getOption = function(chartType) {
				var chartOption = chartType == 'pie' ? {
					calculable: false,
					
				} : {
					legend: {
						data: ['实际', '占用']
					},
					grid: {
						x: 35,
						x2: 10,
						y: 30,
						y2: 25
					},
					toolbox: {
						show: false,
						feature: {
							mark: {
								show: true
							},
							dataView: {
								show: true,
								readOnly: false
							},
							magicType: {
								show: true,
								type: ['line', 'bar']
							},
							restore: {
								show: true
							},
							saveAsImage: {
								show: true
							}
						}
					},
					calculable: false,
					xAxis: [{
						type: 'category',
						data: [<?php if(!empty($aRRAY3)) { ?>
			<?php foreach((array)$aRRAY3 as $key=>$loopChild) {?>'<?php ECHO(date('G:i',$key))?>',<?php }?>
					<?php } ?>
					]
					}],
					yAxis: [{
						type: 'value',
						splitArea: {
							show: true
						}
					}],
					series: [{
						name: '实际',
						type: chartType,
						data: [<?php if(!empty($aRRAY3)) { ?>
			<?php foreach((array)$aRRAY3 as $key=>$loopChild) {?>'<?php echo $loopChild['nownumber'];?>',<?php }?>
					<?php } ?>]
					}, {
						name: '占用',
						type: chartType,
						data: [<?php if(!empty($aRRAY3)) { ?>
			<?php foreach((array)$aRRAY3 as $key=>$loopChild) {?>'<?php echo $loopChild['zynumber'];?>',<?php }?>
					<?php } ?>]
					}]
				};
				return chartOption;
			};
			var byId = function(id) {
				return document.getElementById(id);
			};
	
			var lineChart = echarts.init(byId('lineChart'));
			lineChart.setOption(getOption('line'));

	
		
		</script>
		<div id="yd" class="mui-popover mui-popover-action mui-popover-bottom">
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<a id="wyyy" href="#"><b>我要预约</b></a>
				</li>
				<li class="mui-table-view-cell">
					<a id="wydd" href="#">我已到达</a>
				</li>
				
			</ul>
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<a href="#yd"><b>取消</b></a>
				</li>
			</ul>
		</div>
		<script>
	
		mui('body').on('shown', '.mui-popover', function(e) {
			//console.log('shown', e.detail.id);//detail为当前popover元素
		});
		mui('body').on('hidden', '.mui-popover', function(e) {
			//console.log('hidden', e.detail.id);//detail为当前popover元素
		});
	
		mui('body').on('tap', '.mui-popover-action li>a', function() {
			var a = this,
				parent;
			//根据点击按钮，反推当前是哪个actionsheet
			for (parent = a.parentNode; parent != document.body; parent = parent.parentNode) {
				if (parent.classList.contains('mui-popover-action')) {
					break;
				}
			}
			//关闭actionsheet
			mui('#' + parent.id).popover('toggle');
			 var id = a.getAttribute("id");
			if(id=='wyyy'){
			  mui.openWindow({
    id:'detail',
    url:'<?php echo $arrInfo['url'];?>/sxzs/add/<?php echo $id;?>'
  });
			}
						if(id=='wydd'){
			  mui.openWindow({
    id:'detail',
    url:'<?php echo $arrInfo['url'];?>/sxzs/addt/<?php echo $id;?>'
  });
			}
			console.log("你刚点击了\"" + a.innerHTML + "\"按钮");
		})
	</script>
	</body>

</html>