<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>媒体关注</title>
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/swiper-3.4.0.jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/swiper-3.2.7.min.css"/>
	<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/home.css"/>
	<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/aui.css"/>

	<style>
		body{
			margin:0;
			padding:0;
		}
		.container {
			width: 100%;
		}

		.swiper1 {
			width: 100%;
			background: #efefef;
		}

		.swiper1 .selected {
			color: #ec5566;
		}

		.swiper1 .swiper-slide {
			text-align: center;
			font-size: 14px;
			height: 40px;
			display: -webkit-box;
			display: -ms-flexbox;
			display: -webkit-flex;
			display: flex;
			-webkit-box-pack: center;
			-ms-flex-pack: center;
			-webkit-justify-content: center;
			justify-content: center;
			-webkit-box-align: center;
			-ms-flex-align: center;
			-webkit-align-items: center;
			align-items: center;
			cursor: pointer;
		}

		.swiper2 {
			width: 100%;
		}

		.swiper2 .swiper-slide {
			height: calc(100vh - 50px);
			color: #fff;
			text-align: center;
			box-sizing: border-box !important;
			overflow-x: hidden !important;
		}
	</style>
</head>
<body>

	<div class="container">

		<!-- 头部信息 begin -->
	
			<div class="aui-header clearfix aui-bar aui-bar-nav aui-bar-light">
				<div class="aui-header-box">
			<a href="javascript:" onclick="history.back(); " class="aui-pull-left aui-btn" >
			<span class="aui-iconfont aui-icon-left">  </span>
		</a>
		<div class="aui-title"><a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>">
							<img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/logo/logo.png" alt="">
						</a></div>
		<a  href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/search" class="aui-pull-right aui-btn ">
<span><i class="aui-iconfont aui-icon-search"></i></span>		</a>
				</div>
				<div class="swiper-container swiper1 b-line">
					<div class="swiper-wrapper">
						<div class="swiper-slide selected">媒体关注</div>
					<!-- 	<div class="swiper-slide">学院</div>
						<div class="swiper-slide">传媒</div>
						<div class="swiper-slide">校友</div>
						<div class="swiper-slide">专栏</div>
						<div class="swiper-slide">其他</div>-->

					</div>
				</div>
			</div>
		<!-- 头部信息 end -->

		<!-- 内容信息 begin -->
			<div class="swiper-container swiper2" style="padding-top:85px; padding-bottom:49px;">
				<div class="swiper-wrapper">
				
					<div class="swiper-slide swiper-no-swiping">
					<?php if(isset($Array1)) { ?>
					  <?php foreach((array)$Array1 as $key=>$loopChild) {?>	  
				  <?php UNSET($Acimg);?>
				  			 <?php if(!empty($loopChild['img'])) { ?>
										<?php $cimg=json_decode($loopChild['img'],true);?><?php foreach((array)$cimg as $key=>$loopChild2) {?><?php $Acimg[]=$loopChild2;?>
<?php }?><?php } ?>
 <?php if(count($Acimg)==1) { ?>
 <section class="aui-middle-dome">
				<a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/details/<?php echo $loopChild['id'];?>"class="aui-middle-dome-a">
					<div class="aui-middle-dome-title">
						<h3><?php if(empty($loopChild['title'])) { ?>空标题<?php } else { ?><?php echo $loopChild['title'];?><?php } ?></h3>
						<div class="aui-middle-dome-text">
							<div class="clearfix">
								<?php if($loopChild['istop']=='1') { ?><span class="aui-top box-line">置顶</span><?php } ?>
<?php if($loopChild['istop']=='2') { ?><span class="aui-top box-line">广告</span><?php } ?>

								<span class="aui-title" STYLE='color: #b8b8b8;'><?php if(empty($loopChild['editor'])) { ?>小薇<?php } else { ?><?php echo $loopChild['editor'];?><?php } ?></span>
								<span class="aui-comment">浏览 <?php if(empty($loopChild['view'])) { ?>0<?php } else { ?><?php echo $loopChild['view'];?><?php } ?></span>
							</div>
						</div>
					</div>
					<div class="aui-middle-dome-img">
					<?php if(!empty($Acimg[0])) { ?><img src="<?php echo $Acimg[0];?>"><?php } else { ?><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/top2.jpg"><?php } ?>
					</div>
				</a>
			</section>
<?php } else { ?>
				<section class="aui-middle-dome">
				<a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/details/<?php echo $loopChild['id'];?>"class="aui-middle-dome-a">
					<div class="aui-middle-dome-list-box">
						<h3><?php if(empty($loopChild['title'])) { ?>空标题<?php } else { ?><?php echo $loopChild['title'];?><?php } ?></h3>
						<div class="aui-middle-dome-list">
							<ul class="clearfix">
							 <?php for($i=1;$i<4;$i++) {?>
							 <li>
									<img src="<?php if(!empty($Acimg[$i-1])) { ?><?php echo $Acimg[$i-1];?><?php } ?>" alt="">
								</li>
<?php } ?>

							</ul>
						</div>
						<div class="aui-middle-dome-text">
							<div class="clearfix">
								<span class="aui-title" STYLE='color: #b8b8b8;'><?php if(empty($loopChild['editor'])) { ?>小薇<?php } else { ?><?php echo $loopChild['editor'];?><?php } ?></span>
								<span class="aui-title">浏览 <?php if(empty($loopChild['view'])) { ?>0<?php } else { ?><?php echo $loopChild['view'];?><?php } ?></span>
							</div>
						</div>
					</div>
				</a>
			</section><?php } ?>				
				<?php }?>	
				<?php } else { ?>
				<div class="aui-card-list">
				<div class="aui-card-list-header aui-card-list-user">
					<div class="aui-card-list-user-avatar">
						<img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/yctu.png" class="aui-img-round">
					</div>
					<div class="aui-card-list-user-name">
						<div class="aui-text-info">盐城师范学院</div>
						<div class="aui-font-size-12 text-light">ZY</div>
					</div>
				</div>
				<div class="aui-card-list-content-padded aui-padded-t-5 aui-padded-b-5">
现在此栏目下还没有新闻 请等待更新		</div>
				<div class="aui-card-list-content" style="padding:0 10px;">
					<div class="aui-row aui-row-padded">
						<div class="aui-col-xs-12">
							<img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/top2.jpg">
						</div>
					</div>
				</div>

			</div>
				<?php } ?>
						
					</div>
					
		</div>
			</div>
		<!-- 内容信息 end -->
	</div>


	<footer class="aui-bar aui-bar-tab" id="footer" style="border-top:1px solid #ddd; background:#efefef">
		<div class="aui-bar-tab-item " tapmode>
			<a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/index">
				<i class="aui-iconfont aui-icon-paper"></i>
				<div class="aui-bar-tab-label">校庆新闻</div>
			</a>
		</div>
		<div class="aui-bar-tab-item aui-active" tapmode>
			<a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/news">
				<i class="aui-iconfont aui-icon-like"></i>
				<div class="aui-bar-tab-label">媒体关注</div>
			</a>
		</div>
	</footer>


	<script type="text/javascript">
	    $(function() {
	        function setCurrentSlide(ele, index) {
	            $(".swiper1 .swiper-slide").removeClass("selected");
	            ele.addClass("selected");
	        }

	        var swiper1 = new Swiper('.swiper1',{

	            slidesPerView: 1,
	            paginationClickable: true,
	            spaceBetween: 1,
	            freeMode: true,
	            loop: false,
	            onTab: function(swiper) {
	                var n = swiper1.clickedIndex;
	            }
	        });
	        swiper1.slides.each(function(index, val) {
	            var ele = $(this);
	            ele.on("click", function() {
	                setCurrentSlide(ele, index);
	                swiper2.slideTo(index, 500, false);
	            });
	        });

	        var swiper2 = new Swiper('.swiper2',{
	            direction: 'horizontal',
	            loop: false,
	          //				effect : 'fade',//淡入
	           //effect : 'cube',//方块
	          effect : 'coverflow',//3D流
	           //				effect : 'flip',//3D翻转
	            autoHeight: true,
	            onSlideChangeEnd: function(swiper) {
	                //回调函数，swiper从一个slide过渡到另一个slide结束时执行。
	                var n = swiper.activeIndex;
	                setCurrentSlide($(".swiper1 .swiper-slide").eq(n), n);
	                swiper1.slideTo(n, 500, false);
	            }
	        });
	    });
	</script>
	<?php if(isset($arrInfo['tjcode60'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode60'];?></div><?php } ?> 

</body>
</html>
