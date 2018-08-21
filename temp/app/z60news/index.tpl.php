<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>校庆新闻</title>
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery.min.js"></script>
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
		   .aui-header-back {
  float: left;
    padding-top: 10px;

} 
.aui-header-back span i {
    color: #fff;
    font-size: 18px;
    font-weight: 600;
}
	</style>
</head>
<body>

	<div class="container">

		<!-- 头部信息 begin -->
			<header class="aui-bar aui-bar-nav aui-bar-light">
		<a href="javascript:" onclick="history.back(); " class="aui-pull-left aui-btn" >
			<span class="aui-iconfont aui-icon-left">  </span>
		</a>
		<div class="aui-title"><a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>">
							<img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/logo/logo.png" alt="">
						</a></div>
		<a  href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/search" class="aui-pull-right aui-btn ">
<span><i class="aui-iconfont aui-icon-search"></i></span>		</a>
	</header>
			
		<!-- 头部信息 end -->

		<!-- 内容信息 begin -->
		<div style="padding-top:45px; padding-bottom:49px;">
		 	  <?php if(isset($Array1)) { ?>	
				  <?php foreach((array)$Array1 as $key=>$loopChild) {?>	  
				  <?php UNSET($Acimg);?>
				  <?php if($key==0) { ?>
			<div class="aui-card-list">
							<a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/details/<?php echo $loopChild['id'];?>"class="aui-middle-dome-a">
				<div class="aui-card-list-header aui-card-list-user">
					<div class="aui-card-list-user-avatar">
						<img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/yctu.png" class="aui-img-round">
					</div>
					<div class="aui-card-list-user-name">
						<div class="aui-text-info"><?php if(empty($loopChild['editor'])) { ?>盐城师范学院<?php } else { ?>盐城师范学院<?php } ?></div>
						<div class="aui-font-size-12 text-light"><?php if(empty($loopChild['editor'])) { ?>小薇<?php } else { ?><?php echo $loopChild['editor'];?><?php } ?>
						</div>
					</div>
					<div class="aui-card-list-user-info text-light"><?php echo(smartDate($loopChild['addtime'], 'Y-m-d H:i'))?></div>
				</div>
				<div class="aui-card-list-content-padded aui-padded-t-5 aui-padded-b-5">
<?php echo $loopChild['dcontent'];?>				</div>
				<div class="aui-card-list-content" style="padding:0 10px;">
					<div class="aui-row aui-row-padded">
						<div class="aui-col-xs-12">
	<?php if(!empty($loopChild['img'])) { ?>
										<?php $cimg=json_decode($loopChild['img'],true);?><?php foreach((array)$cimg as $key=>$loopChild2) {?><?php $Acimg[]=$loopChild2;?>
<?php }?><?php } ?>
                      
					<?php if(!empty($Acimg[0])) { ?><img src="<?php echo $Acimg[0];?>"><?php } else { ?><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/top2.jpg">
<?php } ?>

						
						</div>
					</div>
				</div>
				<div class="aui-card-list-footer text-light size-color">
					<div>
						<i class="aui-iconfont aui-icon-display"><?php if(empty($loopChild['view'])) { ?>0<?php } else { ?><?php echo $loopChild['view'];?><?php } ?></i>
					</div>
					
					<div>
						<i class="aui-iconfont aui-icon-laud"><?php if(empty($loopChild['liku'])) { ?>0<?php } else { ?><?php echo $loopChild['liku'];?><?php } ?></i>
					</div>
				</div></a>
			</div><?php } ?>
			 <?php if($key!=0) { ?>
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
			</section><?php } ?><?php } ?>
 <?php }?>
		</div>

		<!-- 内容信息 end -->
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
					<div class="aui-card-list-user-info text-light">刚刚</div>
				</div>
				<div class="aui-card-list-content-padded aui-padded-t-5 aui-padded-b-5">
现在还没有新闻 请等待管理人员上传新闻			</div>
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


	<footer class="aui-bar aui-bar-tab" id="footer" style="border-top:1px solid #ddd; background:#efefef">
		<div class="aui-bar-tab-item  aui-active" tapmode>
			<a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/index">
				<i class="aui-iconfont aui-icon-paper"></i>
				<div class="aui-bar-tab-label">校庆新闻</div>
			</a>
		</div>
		<div class="aui-bar-tab-item" tapmode>
			<a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/news">
				<i class="aui-iconfont aui-icon-like"></i>
				<div class="aui-bar-tab-label">媒体关注</div>
			</a>
		</div>
	</footer>
<?php if(isset($arrInfo['tjcode60'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode60'];?></div><?php } ?> 


</body>
</html>
