<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>校庆新闻 - 盐师六十周年</title>
	<meta name="viewport" content="width=100%; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
	<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/swiper-3.4.0.jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/swiper-3.2.7.min.css"/>
	<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/home.css"/>
	<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/aui.css"/>

</head>
<body>
<style>
.aui-search-box ul li {
    /* overflow: hidden; */
    /* text-overflow: ellipsis; */
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
    line-height: 38px;
    /* width: 95%; */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
<div class="aui-searchbar" id="search" style="border-bottom:1px solid #ddd">
	<a href="javascript:" onclick="history.back(); " class="aui-pull-left aui-btn" style="background:none; padding-right:0">
		<span class="aui-iconfont aui-icon-left" style="font-weight:600;">  </span>
	</a>
	<div class="aui-searchbar-input aui-border-radius" tapmode onclick="doSearch()">

		<i class="aui-iconfont aui-icon-search"></i>
		<form  id ="SSS" method="post"  action="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/search">
			<input type="search" placeholder="请输入关键字..." name="searchpost" id="search-input"<?php if(!empty($postn)) { ?> value="<?php echo $postn;?>"<?php } ?>>
		</form>
	</div>
	<div class="aui-searchbar-cancel" onclick="document.getElementById('SSS').submit()" tapmod style="color:#FF5E53; font-size:14px; padding-right:10px;">搜索</div>
</div>
		<div style="padding-top:45px; padding-bottom:49px;">
		 	  <?php if(isset($Array2)&&!empty($postn)) { ?>	
				  <?php foreach((array)$Array2 as $key=>$loopChild) {?>	  
				  <?php UNSET($Acimg);?>

			 <?php if(!empty($loopChild['img'])) { ?>
										<?php $cimg=json_decode($loopChild['img'],true);?><?php foreach((array)$cimg as $key=>$loopChild2) {?><?php $Acimg[]=$loopChild2;?>
<?php }?><?php } ?>
 <?php if(count($Acimg)==1) { ?>
			<section class="aui-middle-dome">
				<a href="details/<?php echo $loopChild['id'];?>" data-action-label="click-a" data-tag="news" class="aui-middle-dome-a">
					<div class="aui-middle-dome-title">
						<h3><?php if(empty($loopChild['title'])) { ?>空标题<?php } else { ?><?php echo $loopChild['title'];?><?php } ?></h3>
						<div class="aui-middle-dome-text">
							<div class="clearfix">
								<?php if($loopChild['istop']=='1') { ?><span class="aui-top box-line">置顶</span><?php } ?>
<?php if($loopChild['istop']=='2') { ?><span class="aui-top box-line">广告</span><?php } ?>

								<span class="aui-title"><?php if($loopChild['groupid']=='1') { ?>庆典新闻<?php } ?>
						<?php if($loopChild['groupid']=='2') { ?>学院活动<?php } ?>
						<?php if($loopChild['groupid']=='3') { ?>传媒报道<?php } ?>
						<?php if($loopChild['groupid']=='4') { ?>校友新闻<?php } ?>
						<?php if($loopChild['groupid']=='5') { ?>专栏文章<?php } ?>
						<?php if($loopChild['groupid']=='6') { ?>其他新闻<?php } ?></span>
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
				<a href="details/<?php echo $loopChild['id'];?>" data-action-label="click-a" data-tag="news" class="aui-middle-dome-a">
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
								<span class="aui-title"><?php if($loopChild['groupid']=='1') { ?>庆典新闻<?php } ?>
						<?php if($loopChild['groupid']=='2') { ?>学院活动<?php } ?>
						<?php if($loopChild['groupid']=='3') { ?>传媒报道<?php } ?>
						<?php if($loopChild['groupid']=='4') { ?>校友新闻<?php } ?>
						<?php if($loopChild['groupid']=='5') { ?>专栏文章<?php } ?>
						<?php if($loopChild['groupid']=='6') { ?>其他新闻<?php } ?></span>
								<span class="aui-title">浏览 <?php if(empty($loopChild['view'])) { ?>0<?php } else { ?><?php echo $loopChild['view'];?><?php } ?></span>
							</div>
						</div>
					</div>
				</a>
			</section><?php } ?>
 <?php }?>
		</div>

		<!-- 内容信息 end -->
		<?php } else { ?>
	<div class="aui-search">
		<div class="aui-search-box">
			<h3 class="b-line">热门</h3>
			<ul>
			  <?php if(isset($Array1)) { ?>	
				  <?php foreach((array)$Array1 as $key=>$loopChild) {?>	  
				  
				<li class="b-line"><em <?php if($key<3) { ?>style="color:<?php if($key==0) { ?>#FF5E53<?php } ?><?php if($key==1) { ?>#FF8D20<?php } ?><?php if($key==2) { ?>#3CC51E<?php } ?>"<?php } ?>><?php echo($key+1)?>.</em><a href="details/<?php echo $loopChild['id'];?>"><?php if(empty($loopChild['title'])) { ?>空标题<?php } else { ?><?php echo $loopChild['title'];?><?php } ?></a></li>
						<?php }?><?php } ?>
				</ul>
		</div>
	</div>
<?php } ?>
	<footer class="aui-bar aui-bar-tab" id="footer" style="border-top:1px solid #ddd; background:#efefef">
		<div class="aui-bar-tab-item" tapmode>
			<a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/index">
				<i class="aui-iconfont aui-icon-paper"></i>
				<div class="aui-bar-tab-label">头条</div>
			</a>
		</div>
		<div class="aui-bar-tab-item  aui-active" tapmode>
			<a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/news">
				<i class="aui-iconfont aui-icon-like"></i>
				<div class="aui-bar-tab-label">新闻</div>
			</a>
		</div>
	</footer>
</body>
</html>
