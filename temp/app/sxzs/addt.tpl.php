<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>实训助手</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/mui.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/mui.picker.min.css" />
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
			<h1 class="mui-title">新增预约</h1>
		</header>
		<div class="mui-content">
								<div class="mui-card">
				<div class="mui-card-header">概况</div>
				<div class="mui-card-content">
			
					<div class="mui-card-content-inner">
				<ul class="mui-table-view">
						<li class="mui-table-view-cell">
						类型
						<button type="button" class="mui-btn">
<?php if(!empty($Array['type'])) { ?><?php echo $Array['type'];?><?php } else { ?>-<?php } ?>						</button>
					</li>
						
					<a href="#nowp"><li class="mui-table-view-cell">
						门牌
						</a><button type="button" class="mui-btn mui-btn-primary">
								<?php if(!empty($Array['room'])) { ?><?php echo $Array['room'];?><?php } else { ?>-<?php } ?>
						</button>
					</li></a>
	<li class="mui-table-view-cell">
						名称
						<button type="button" class="mui-btn">
						<?php if(!empty($Array['name'])) { ?><?php echo $Array['name'];?><?php } else { ?>-<?php } ?>
						</button>
					</li>
						<li class="mui-table-view-cell">
						当前占用率
						<button type="button" class="mui-btn">
						<?php if(!empty($ZYBFB)) { ?><?php echo $ZYBFB;?>%<?php } else { ?>0%<?php } ?>
						</button>
					</li>
						
					
				</ul>
	
					</div>
													
				</div>
			
			</div>
			
							<div class="mui-card">
				<div class="mui-card-header">时间</div>
				<div class="mui-card-content">
				
					 <input id="sc"  type="hidden" value="">
					<div class="mui-card-content-inner">
			
				<h5 class="mui-content-padded">预约时长</h5>
				<button id='scxz'  class="btn mui-btn mui-btn-block">选择时长 ...</button>

					 <input id="postsc"   type="hidden" value="">
					  <input id="postnumber"   type="hidden" value="">
				<ul class="mui-table-view">
	
	
						<li class="mui-table-view-cell">
						此时段可预约人数
						<button id='loadtime' type="button" class="mui-btn mui-btn-success loadtime">
							未知
						</button>
					</li>
						
			
				</ul>
								<ul class="mui-table-view mui-table-view-chevron">
			
					<li class="mui-table-view-cell mui-collapse"><a class="mui-navigate-right" href="#">详细</a>
						<ul class="mui-table-view mui-table-view-chevron">
											<li class="mui-table-view-cell">
						当天不开放时间
						<button type="button" class="mui-btn">
							无
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
							 <input id="wlx"  type="hidden" value="">
						预约类型
						<button type="button" class="mui-btn mui-btn-primary">
														<?php if(!empty($Array['yytype'])) { ?><?php if($Array['yytype']=='1') { ?>个人预约<?php } ?><?php if($Array['yytype']=='2') { ?>小组预约<?php } ?><?php if($Array['yytype']=='3') { ?>班级预约<?php } ?><?php } else { ?>-<?php } ?>
						</button>
					</li>

				<div class="mui-input-row">
							<label>预约人数</label>
<?php if($Array['yytype']=='1') { ?><div  class="mui-numbox"  data-numbox-min='1' data-numbox-max='1'><?php } ?>
<?php if($Array['yytype']=='2') { ?><div class="mui-numbox"  data-numbox-min='1' data-numbox-max='<?php echo $Array['number'];?>'><?php } ?>
<?php if($Array['yytype']=='3') { ?><div  class="mui-numbox"  data-numbox-min='1' data-numbox-max='<?php echo $Array['number'];?>'><?php } ?>

								<button class="mui-btn mui-btn-numbox-minus" type="button">-</button>
								<input id="box" class="mui-input-numbox" type="number">
								<button class="mui-btn mui-btn-numbox-plus" type="button">+</button>
							</div>
						</div>
				</ul>
								<?php if($Array['yytype']!='1') { ?><ul class="mui-table-view mui-table-view-chevron">
					<li class="mui-table-view-cell mui-collapse"><a class="mui-navigate-right" href="#">详细</a>
						<ul class="mui-table-view mui-table-view-chevron">
											<li class="mui-table-view-cell">
						负责人
						<button type="button" class="mui-btn">
							<?php echo $name;?>
						</button>
					</li>
	<li class="mui-table-view-cell">
						成员
						<button type="button" class="mui-btn">
						暂未开放选择
						</button>
					</li>
				
						
						</ul>
					</li>
					
				</ul><?php } ?>
					</div>
													
				</div>
				
			</div>
	
<div class="mui-card">
				<div class="mui-card-content">
					<div class="mui-card-content-inner">
					<a href="#yd" class="mui-btn mui-btn-primary mui-btn-block mui-btn-outlined" style="padding: 5px 20px;">立刻预约</a>
					</div>
				</div>
				
			</div>

	
	</div>

		<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/mui.picker.min.js"></script>
		<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/mui.poppicker.js"></script>
	<script>
			mui.init({
		swipeBack: false
			});
					//扩展mui.showLoading
(function($, window) {
    //显示加载框
    $.showLoading = function(message,type) {
        if ($.os.plus && type !== 'div') {
            $.plusReady(function() {
                plus.nativeUI.showWaiting(message);
            });
        } else {
            var html = '';
            html += '<i class="mui-spinner mui-spinner-white"></i>';
            html += '<p class="text">' + (message || "数据加载中") + '</p>';

            //遮罩层
            var mask=document.getElementsByClassName("mui-show-loading-mask");
            if(mask.length==0){
                mask = document.createElement('div');
                mask.classList.add("mui-show-loading-mask");
                document.body.appendChild(mask);
                mask.addEventListener("touchmove", function(e){e.stopPropagation();e.preventDefault();});
            }else{
                mask[0].classList.remove("mui-show-loading-mask-hidden");
            }
            //加载框
            var toast=document.getElementsByClassName("mui-show-loading");
            if(toast.length==0){
                toast = document.createElement('div');
                toast.classList.add("mui-show-loading");
                toast.classList.add('loading-visible');
                document.body.appendChild(toast);
                toast.innerHTML = html;
                toast.addEventListener("touchmove", function(e){e.stopPropagation();e.preventDefault();});
            }else{
                toast[0].innerHTML = html;
                toast[0].classList.add("loading-visible");
            }
        }   
    };

    //隐藏加载框
      $.hideLoading = function(callback) {
        if ($.os.plus) {
            $.plusReady(function() {
                plus.nativeUI.closeWaiting();
            });
        } 
        var mask=document.getElementsByClassName("mui-show-loading-mask");
        var toast=document.getElementsByClassName("mui-show-loading");
        if(mask.length>0){
            mask[0].classList.add("mui-show-loading-mask-hidden");
        }
        if(toast.length>0){
            toast[0].classList.remove("loading-visible");
            callback && callback();
        }
      }
})(mui, window);
			mui.ready(function() {
				
					//普通示例
				/*	var xqPicker = new mui.PopPicker();
					xqPicker.setData([{
						value: '1',
						text: '个人'
					}, {
						value: '2',
						text: '小组'
					}, {
						value: '3',
						text: '班级'
					}]);
					var showUserPickerButton = document.getElementById('yylx');
					var userResult = document.getElementById('yylx');
					var wxq = document.getElementById('wlx');
			

					showUserPickerButton.addEventListener('tap', function(event) {
						xqPicker.show(function(items) {
							userResult.innerText = items[0].text;
							wxq.value=items[0].value;
							var nbox = mui('.mui-numbox').numbox();
						 console.log(items[0].value);
						if(items[0].value=="1")
						{
						 nbox.setOption('max',1);
						}
							if(items[0].value=="2")
						{
						 nbox.setOption('max',3);
						}
							if(items[0].value=="3")
						{
						 nbox.setOption('max',50);
						}
							//返回 false 可以阻止选择框的关闭
							//return false;
						});
						
					}, false);*/
					});
			(function($) {
				$('.mui-scroll-wrapper').scroll({
					indicators: true //是否显示滚动条
				});
				
       					document.getElementById('scxz').addEventListener("tap",function(){
//           
                var dtpicker = new mui.DtPicker({
                    type: "time",//设置日历初始视图模式    //真正的月份比写的多一个月。  type的类型你还是可以选择date, datetime month time  hour 
                    beginDate: new Date(2018,03,17,0, 30),//设置开始日期   
                    endDate: new Date(2018,03,17,01, 00),//设置结束日期    //真正的是10.21
                  "customData":{"i":[{"value":"0","text":"00"},{"value":"0","text":"15"},{"value":"30","text":"30"},{"value":"45","text":"45"}]}
                
                })
                dtpicker.show(function (e) {
                    console.log(e.y.text+"-"+e.m.text+"-"+e.d.text+" "+e.h.text+":"+e.i.text);  //这里是自己拼接的时间

document.getElementById("sc").value=e.h.text+"小时"+e.i.text+"分钟";
           document.getElementById("scxz").innerText=document.getElementById("sc").value;
		   document.getElementById("postsc").value=e.h.text+"Hour "+e.i.text+"Minute";

	var postnumber=9701;
			var postsc=  document.getElementById("postsc").value;
			mui('.loadtime').button('loading');
				mui.ajax('<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/upnumber2/<?php echo $Array['rid'];?>/<?php echo $number;?>/<?php echo $type;?>',{
	data:{
		number:postnumber,
		sc:postsc,
	},
	dataType:'json',//服务器返回json格式数据
	type:'post',//HTTP请求类型
	async:true,
	timeout:10000,//超时时间设置为10秒；	              
	success:function(data){
	   console.log(data);

mui('.loadtime').button('reset');
	if(data.status==0)mui.alert(data.content);   
	if(data.status==1)document.getElementById("loadtime").innerText=data.content;
		
	},
	error:function(xhr,type,errorThrown){
		//异常处理；
	mui('.loadtime').button('reset');
	mui.alert("通讯错误");
	}
});
			setTimeout(function() {
				mui('.loadtime').button('reset');
			}.bind(mui('.loadtime')), 2000);

	
                })

    });  
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
				
mui(".mui-table-view").on('tap','.mui-card',function(){
  //获取id
  var id = this.getAttribute("id");
  //传值给详情页面，通知加载新数据
  //mui.fire(detail,'getDetail',{id:id});
  //打开新闻详情
  mui.openWindow({
    id:'detail',
    url:'detail.html'
  });
}) 
mui(".header").on('tap','.zyyd',function(){
  //获取id
  var id = this.getAttribute("id");
  //传值给详情页面，通知加载新数据
  //mui.fire(detail,'getDetail',{id:id});
  //打开新闻详情
  mui.openWindow({
    id:'detail',
    url:'detail.html'
  });
}) 

		</script>

		<div id="yd" class="mui-popover mui-popover-action mui-popover-bottom">
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<a id="OKOK" href="#"><b>我承诺已经到达</b></a>
				</li>

			</ul>
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<a href="#yd">取消</a>
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
			console.log("你刚点击了\"" + a.innerHTML + "\"按钮");
			 var id = a.getAttribute("id");
			if(id=='OKOK'){
			document.getElementById("postnumber").value=document.getElementById("box").value;

  check = true;

if(!document.getElementById("postnumber").value || document.getElementById("postnumber").value.trim() == "") {
    mui.alert("预约人数不允许为空");
    check = false;
    return false;
}

if(!document.getElementById("postsc").value || document.getElementById("postsc").value.trim() == "") {
    mui.alert("时长不允许为空");
    check = false;
    return false;
}
if(check){
mui.showLoading("正在提交..","div");
			var postnumber=document.getElementById("postnumber").value;

			var postsc=  document.getElementById("postsc").value;
	mui.ajax('<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/add/<?php echo $Array['rid'];?>/<?php echo $number;?>/<?php echo $type;?>',{
	data:{
		number:postnumber,
addt:1,
		sc:postsc,
	},
	dataType:'json',//服务器返回json格式数据
	type:'post',//HTTP请求类型
	timeout:10000,//超时时间设置为10秒；	              
	success:function(data){
		//服务器返回响应，根据响应结果，分析是否登录成功；
		mui.hideLoading();
	if(data.status==0)mui.alert(data.content);   
	if(data.status==1){

	  mui.openWindow({
    url: '<?php echo $arrInfo['url'];?>/sxzs/index', 
    id:'yy'
  });
	}
	
	},
	error:function(xhr,type,errorThrown){
		//异常处理；
		console.log(type);mui.alert("网络故障");  
	}
});
}
			}
		})
		

	</script>
	</body>

</html>