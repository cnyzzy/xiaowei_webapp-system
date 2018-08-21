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
			.mui-views,
			.mui-view,
			.mui-pages,
			.mui-page,
			.mui-page-content {
				position: absolute;
				left: 0;
				right: 0;
				top: 0;
				bottom: 0;
				width: 100%;
				height: 100%;
				background-color: #efeff4;
			}
			.mui-pages {
				top: 46px;
				height: auto;
			}
			.mui-scroll-wrapper,
			.mui-scroll {
				background-color: #efeff4;
			}
			.mui-page.mui-transitioning {
				-webkit-transition: -webkit-transform 300ms ease;
				transition: transform 300ms ease;
			}
			.mui-page-left {
				-webkit-transform: translate3d(0, 0, 0);
				transform: translate3d(0, 0, 0);
			}
			.mui-ios .mui-page-left {
				-webkit-transform: translate3d(-20%, 0, 0);
				transform: translate3d(-20%, 0, 0);
			}
			.mui-navbar {
				position: fixed;
				right: 0;
				left: 0;
				z-index: 10;
				height: 44px;
				background-color: #f7f7f8;
			}
			.mui-navbar .mui-bar {
				position: absolute;
				background: transparent;
				text-align: center;
			}
			.mui-android .mui-navbar-inner.mui-navbar-left {
				opacity: 0;
			}
			.mui-ios .mui-navbar-left .mui-left,
			.mui-ios .mui-navbar-left .mui-center,
			.mui-ios .mui-navbar-left .mui-right {
				opacity: 0;
			}
			.mui-navbar .mui-btn-nav {
				-webkit-transition: none;
				transition: none;
				-webkit-transition-duration: .0s;
				transition-duration: .0s;
			}
			.mui-navbar .mui-bar .mui-title {
				display: inline-block;
				width: auto;
			}
			.mui-page-shadow {
				position: absolute;
				right: 100%;
				top: 0;
				width: 16px;
				height: 100%;
				z-index: -1;
				content: '';
			}
			.mui-page-shadow {
				background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0) 0, rgba(0, 0, 0, 0) 10%, rgba(0, 0, 0, .01) 50%, rgba(0, 0, 0, .2) 100%);
				background: linear-gradient(to right, rgba(0, 0, 0, 0) 0, rgba(0, 0, 0, 0) 10%, rgba(0, 0, 0, .01) 50%, rgba(0, 0, 0, .2) 100%);
			}
			.mui-navbar-inner.mui-transitioning,
			.mui-navbar-inner .mui-transitioning {
				-webkit-transition: opacity 300ms ease, -webkit-transform 300ms ease;
				transition: opacity 300ms ease, transform 300ms ease;
			}
			.mui-page {
				display: none;
			}
			.mui-pages .mui-page {
				display: block;
			}
			.mui-page .mui-table-view:first-child {
				margin-top: 15px;
			}
			.mui-page .mui-table-view:last-child {
				margin-bottom: 30px;
			}
			.mui-table-view {
				margin-top: 20px;
			}
			
			.mui-table-view span.mui-pull-right {
				color: #999;
			}
			.mui-table-view-divider {
				background-color: #efeff4;
				font-size: 14px;
			}
			.mui-table-view-divider:before,
			.mui-table-view-divider:after {
				height: 0;
			}
			.head {
				height: 40px;
			}
			#head {
				line-height: 40px;
			}
			.head-img {
				width: 40px;
				height: 40px;
			}
			#head-img1 {
				position: absolute;
				bottom: 10px;
				right: 40px;
				width: 40px;
				height: 40px;
			}
			.update {
				font-style: normal;
				color: #999999;
				margin-right: -25px;
				font-size: 15px
			}
			.mui-fullscreen {
				position: fixed;
				z-index: 20;
				background-color: #000;
			}
			.mui-ios .mui-navbar .mui-bar .mui-title {
				position: static;
			}
			/*问题反馈在setting页面单独的css*/
			#feedback .mui-popover{
				position: fixed;
			}
			#feedback .mui-table-view:last-child {
			    margin-bottom: 0px;
			}
			#feedback .mui-table-view:first-child {
			    margin-top: 0px;
			}
			
			.mui-plus.mui-plus-stream .mui-stream-hidden{
				display: none !important;
			}
			
			/*问题反馈在setting页面单独的css==end*/
			
		</style>
		<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/feedback.css" />
	</head>

	<body class="mui-fullscreen">
		<!--页面主结构开始-->
		<div id="app" class="mui-views">
			<div class="mui-view">
				<div class="mui-navbar">
				</div>
				<div class="mui-pages">
				</div>
			</div>
		</div>
		<!--页面主结构结束-->
		<!--单页面开始-->
		<div id="wo" class="mui-page">
			<!--页面标题栏开始-->
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>
				</button>
				<h1 class="mui-center mui-title">我</h1>
			</div>
			<!--页面标题栏结束-->
			<!--页面主内容区开始-->
			<div class="mui-page-content">
				<div class="mui-scroll-wrapper">
					<div class="mui-scroll">
						<ul class="mui-table-view mui-table-view-chevron">
							<li class="mui-table-view-cell mui-media">
								<a class="mui-navigate-right" href="#account">
									<img class="mui-media-object mui-pull-left head-img" id="head-img" src="<?php echo $img;?>">
									<div class="mui-media-body">
<?php if(!empty($name)) { ?><?php echo $name;?><?php } else { ?>-<?php } ?>
										<p class='mui-ellipsis'><?php if($type==1) { ?>学号:<?php if(!empty($number)) { ?><?php echo $number;?><?php } else { ?>-<?php } ?><?php } else { ?>编号:<?php if(!empty($number)) { ?><?php echo $number;?><?php } else { ?>-<?php } ?><?php } ?></p>
									</div>
								</a>
							</li>
						</ul>
						<ul class="mui-table-view mui-table-view-chevron">
							<li class="mui-table-view-cell">
								<a href="#account" class="mui-navigate-right">实名身份</a>
							</li>
						</ul>
						<ul class="mui-table-view mui-table-view-chevron">
						
								<!--<li class="mui-table-view-cell">
								<a href="#privacy" class="mui-navigate-right">隐私</a>
							</li>-->
							<li class="mui-table-view-cell">
								<a href="#general" class="mui-navigate-right">信用</a>
							</li>
						</ul>
						<ul class="mui-table-view mui-table-view-chevron">
							<li class="mui-table-view-cell">
								<a href="#about" class="mui-navigate-right">关于 <i class="mui-pull-right update">V1.0</i></a>
							</li>
						</ul>
						<ul class="mui-table-view">
							<li class="mui-table-view-cell" style="text-align: center;">
								<a>退出登录</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!--页面主内容区结束-->
		</div>
		<!--单页面结束-->
		<div id="account" class="mui-page">
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>我
				</button>
				<h1 class="mui-center mui-title">实名身份</h1>
			</div>
			<div class="mui-page-content">
				<div class="mui-scroll-wrapper">
					<div class="mui-scroll">
						<ul class="mui-table-view">
							<li class="mui-table-view-cell">
								<a id="head" class="mui-navigate-right">头像
								<span class="mui-pull-right head">
									<img class="head-img mui-action-preview" id="head-img1" src="<?php echo $img;?>"/>
								</span>
							</a>
							</li>
							<li class="mui-table-view-cell">
								<a>姓名<span class="mui-pull-right"><?php if(!empty($name)) { ?><?php echo $name;?><?php } else { ?>-<?php } ?></span></a>
							</li>
							<li class="mui-table-view-cell">
								<a><?php if($type==1) { ?>学号<?php } else { ?>编号<?php } ?><span class="mui-pull-right"><?php if(!empty($number)) { ?><?php echo $number;?><?php } else { ?>-<?php } ?></span></a>
							</li>
						</ul>
						<ul class="mui-table-view">
							<?php if($type==1) { ?><li class="mui-table-view-cell">
								<a>年级<span class="mui-pull-right"><?php if(!empty($info['sznj'])) { ?><?php echo $info['sznj'];?><?php } else { ?>-<?php } ?></span></a>
							</li><?php } ?>
							<li class="mui-table-view-cell">
								<a>学院<span class="mui-pull-right"><?php if(!empty($collage)) { ?><?php echo $collage;?><?php } else { ?>-<?php } ?></span></a>
							</li>
							<?php if($type==1) { ?><li class="mui-table-view-cell">
								<a>行政班<span class="mui-pull-right"><?php if(!empty($xzb)) { ?><?php echo $xzb;?><?php } else { ?>-<?php } ?></span></a>
							</li><?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div id="privacy" class="mui-page">
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>设置
				</button>
				<h1 class="mui-center mui-title">隐私</h1>
			</div>
			<div class="mui-page-content">
				<div class="mui-scroll-wrapper">
					<div class="mui-scroll">
						<ul class="mui-table-view">
							<li class="mui-table-view-divider">权限</li>
							<li class="mui-table-view-cell">
								与我组成团队时需要验证
								<div class="mui-switch mui-active mui-switch-mini">
									<div class="mui-switch-handle"></div>
								</div>
							</li>
						</ul>
						<ul class="mui-table-view">
							<li class="mui-table-view-cell">
								向我推荐同学
								<div class="mui-switch mui-switch-mini">
									<div class="mui-switch-handle"></div>
								</div>
							</li>
							<li class="mui-table-view-cell">
								通过姓名搜索到我
								<div class="mui-switch mui-switch-mini">
									<div class="mui-switch-handle"></div>
								</div>
							</li>
						</ul>
						<ul class="mui-table-view">
							<li class="mui-table-view-cell">
								可通过手机号搜索到我
								<div class="mui-switch mui-active mui-switch-mini">
									<div class="mui-switch-handle"></div>
								</div>
							</li>
							
							<li class="mui-table-view-divider">您需要在小薇平台进行手机验证</li>
						</ul>
						<ul class="mui-table-view">
							<li class="mui-table-view-cell">
								通过学号搜索到我
								<div class="mui-switch mui-active mui-switch-mini">
									<div class="mui-switch-handle"></div>
								</div>
							</li>
							<li class="mui-table-view-divider">关闭后，其他用户将不能通过学号搜索到你</li>
						</ul>

					</div>
				</div>
			</div>
		</div>
		<div id="general" class="mui-page">
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>我
				</button>
				<h1 class="mui-center mui-title">信用</h1>
			</div>
			<div class="mui-page-content">
				<div class="mui-scroll-wrapper">
					<div class="mui-scroll">
		<H1>功能尚未开放</H1>
					</div>
				</div>
			</div>
		</div>

		<div id="about" class="mui-page">
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>我
				</button>
				<h1 class="mui-center mui-title">关于</h1>
			</div>
			<div class="mui-page-content">
				<div class="mui-scroll-wrapper">
					<div class="mui-scroll">
						<ul class="mui-table-view">
							<li class="mui-table-view-cell mui-plus-visible mui-stream-hidden">
								<a id="rate" class="mui-navigate-right">评分鼓励</a>
							</li>
							<li class="mui-table-view-cell mui-plus-visible">
								<a id="welcome" class="mui-navigate-right">欢迎页</a>
							</li>
							<li class="mui-table-view-cell mui-plus-visible">
								<a id="share" class="mui-navigate-right">分享推荐</a>
							</li>
							<li class="mui-table-view-cell">
								<a id="tel" class="mui-navigate-right">客服电话</a>
							</li>
							<li class="mui-table-view-cell">
								<a id="feedback-btn" href="#feedback" class="mui-navigate-right">问题反馈</a>
							</li>
							<li id="check_update" class="mui-table-view-cell mui-plus-visible">
								<a id="update" class="mui-navigate-right">检查更新</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div id="feedback" class="mui-page feedback">
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>关于
				</button>
				<button id="submit" class="mui-btn mui-btn-blue mui-btn-link mui-pull-right">发送</button>
				<h1 class="mui-center mui-title">问题反馈</h1>
			</div>
			<div class="mui-page-content">
				<div class="mui-content-padded">
					<div class="mui-inline">问题和意见</div>
					<a class="mui-pull-right mui-inline" href="#popover">
						快捷输入
						<span class="mui-icon mui-icon-arrowdown"></span>
					</a>
					<!--快捷输入具体内容，开发者可自己替换常用语-->
					<div id="popover" class="mui-popover">
						<div class="mui-popover-arrow"></div>
						<div class="mui-scroll-wrapper">
							<div class="mui-scroll">
								<ul class="mui-table-view">
									<!--仅流应用环境下显示-->
									<li class="mui-table-view-cell stream">
										<a href="#">太复杂</a>
									</li>
									<li class="mui-table-view-cell"><a href="#">界面显示错乱</a></li>
									<li class="mui-table-view-cell"><a href="#">访问缓慢，卡出翔了</a></li>
									<li class="mui-table-view-cell"><a href="#">偶发性错误</a></li>
									<li class="mui-table-view-cell"><a href="#">UI无法直视，丑哭了</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row mui-input-row">
					<textarea id='question' class="mui-input-clear question" placeholder="请详细描述你的问题和意见..."></textarea>
				</div>
				<p>图片(选填,提供问题截图,总大小10M以下)</p>
				<div id='image-list' class="row image-list"></div>
				<p>QQ/邮箱</p>
				<div class="mui-input-row">
					<input id='contact' type="text" class="mui-input-clear contact" placeholder="(选填,方便我们联系你 )" />
				</div>
				<div class="mui-content-padded">
					<div class="mui-inline">应用评分</div>
					<div class="icons mui-inline" style="margin-left: 6px;">
						<i data-index="1" class="mui-icon mui-icon-star"></i>
						<i data-index="2" class="mui-icon mui-icon-star"></i>
						<i data-index="3" class="mui-icon mui-icon-star"></i>
						<i data-index="4" class="mui-icon mui-icon-star"></i>
						<i data-index="5" class="mui-icon mui-icon-star"></i>
					</div>
				</div><br />
			</div>
		</div>

	</body>
	<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/mui.min.js "></script>
	<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/mui.view.js "></script>
	<script src='<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/feedback.js'></script>
	<script>
		mui.init();
		//初始化单页view
		var viewApi = mui('#app').view({
			defaultPage: '#wo'
		});
		//初始化单页的区域滚动
		mui('.mui-scroll-wrapper').scroll();
		//分享操作
	
		



		//客服电话
		document.getElementById("tel").addEventListener('tap', function() {
			if(mui.os.plus){
				plus.device.dial("114");
			}else{
				location.href = 'tel:114';
			}
			
		});
		//检查更新
		document.getElementById("update").addEventListener('tap', function() {
			var server = "http://www.dcloud.io/check/update"; //获取升级描述文件服务器地址
			mui.getJSON(server, {
				"appid": plus.runtime.appid,
				"version": plus.runtime.version,
				"imei": plus.device.imei
			}, function(data) {
				if (data.status) {
					plus.ui.confirm(data.note, function(i) {
						if (0 == i) {
							plus.runtime.openURL(data.url);
						}
					}, data.title, ["立即更新", "取　　消"]);
				} else {
					mui.toast('已是最新版本~')
				}
			});
		});
		var view = viewApi.view;
		(function($) {
			//处理view的后退与webview后退
			var oldBack = $.back;
			$.back = function() {
				if (viewApi.canBack()) { //如果view可以后退，则执行view的后退
					viewApi.back();
				} else { //执行webview后退
					oldBack();
				}
			};
			//监听页面切换事件方案1,通过view元素监听所有页面切换事件，目前提供pageBeforeShow|pageShow|pageBeforeBack|pageBack四种事件(before事件为动画开始前触发)
			//第一个参数为事件名称，第二个参数为事件回调，其中e.detail.page为当前页面的html对象
			view.addEventListener('pageBeforeShow', function(e) {
				//				console.log(e.detail.page.id + ' beforeShow');
			});
			view.addEventListener('pageShow', function(e) {
				//				console.log(e.detail.page.id + ' show');
			});
			view.addEventListener('pageBeforeBack', function(e) {
				//				console.log(e.detail.page.id + ' beforeBack');
			});
			view.addEventListener('pageBack', function(e) {
				//				console.log(e.detail.page.id + ' back');
			});
		})(mui);
		//更换头像
	

		document.getElementById("welcome").addEventListener('tap', function(e) {
			//显示启动导航
			mui.openWindow({
				id: 'guide',
				url: 'guide.html',
				show: {
					aniShow: 'fade-in',
					duration: 300
				},
				waiting: {
					autoShow: false
				}
			});
		});

		function initImgPreview() {
			var imgs = document.querySelectorAll("img.mui-action-preview");
			imgs = mui.slice.call(imgs);
			if (imgs && imgs.length > 0) {
				var slider = document.createElement("div");
				slider.setAttribute("id", "__mui-imageview__");
				slider.classList.add("mui-slider");
				slider.classList.add("mui-fullscreen");
				slider.style.display = "none";
				slider.addEventListener("tap", function() {
					slider.style.display = "none";
				});
				slider.addEventListener("touchmove", function(event) {
					event.preventDefault();
				})
				var slider_group = document.createElement("div");
				slider_group.setAttribute("id", "__mui-imageview__group");
				slider_group.classList.add("mui-slider-group");
				imgs.forEach(function(value, index, array) {
					//给图片添加点击事件，触发预览显示；
					value.addEventListener('tap', function() {
						slider.style.display = "block";
						_slider.refresh();
						_slider.gotoItem(index, 0);
					})
					var item = document.createElement("div");
					item.classList.add("mui-slider-item");
					var a = document.createElement("a");
					var img = document.createElement("img");
					img.setAttribute("src", value.src);
					a.appendChild(img)
					item.appendChild(a);
					slider_group.appendChild(item);
				});
				slider.appendChild(slider_group);
				document.body.appendChild(slider);
				var _slider = mui(slider).slider();
			}
		}
		
		if(mui.os.stream){
			document.getElementById("check_update").display = "none";
		}
		
	</script>

</html>