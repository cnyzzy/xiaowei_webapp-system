<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0;"/>
<title>活动订票</title>
<link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/phone.js" ></script>
<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/TouchSlide.1.1.js"></script>
<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/movie.js"></script>
</head>

<body>
<div class="whole">
	<!--头部轮播-->
	<?php if(!empty($ArriMG)) { ?>
    <div id="carousel" class="carousel">
	  	<div class="hd">
			<ul></ul>
      	</div>
      <div class="bd">
            <ul>
				<?php foreach((array)$ArriMG as $key=>$loopChild) {?>
<li><a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/details/<?php echo $loopChild['id'];?>"><img _src="<?php echo $loopChild['firstimg'];?>" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/image/blank.png" /></a></li>
          	<?php }?>    </ul>
      </div>
      <!--  <div class="search sear-show">
        	<img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/image/search.png" />
        </div>
        <div class="search-new">
        	<input type="text" value="" placeholder="请输入您要搜索的内容" />
            <div class="sear"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/image/search.png" /></div>
            <div class="close"><i class="fa fa-forward"></i></div>
        </div>-->
    </div><?php } ?>
    <!--头部轮播END-->
    
    <div class="movie">
      <ul>	<?php if(!empty($Arr)) { ?>
	  				<?php foreach((array)$Arr as $key=>$loopChild) {?>
              <li>
            	<a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/details/<?php echo $loopChild['id'];?>">
                    <span class="tag"><?php if($loopChild['endtime']<time()) { ?>停选<?php } else { ?>正在<?php } ?></span>
                    <div class="posters">
                        <img src="<?php echo $loopChild['smallimg'];?>" />
                    </div>
                    <div class="post-content">
                        <div class="left-con">
                            <p class="tit">
                            	<small><?php echo $loopChild['title'];?></small>
                                <span>
                                	<i><?php echo $loopChild['swhere'];?></i>
                                    <i><?php echo $loopChild['stype'];?></i>
                                </span>
                            </p>
                            <p class="eng"><?php echo $loopChild['owner'];?>主办</p>
                            <p class="tim">活动地点<span><?php echo $loopChild['place'];?></span></p>
                            <p class="tim">活动时间<span><?php echo $loopChild['time'];?></span></p>
                        </div>
                        <div class="right-btn">
                           
                        </div>
                    </div>
                 </a>
            </li>       	
			
			<?php }?> 
 <?php } ?>
  </ul>
    </div>
    
</div>
<script type="text/javascript">
	TouchSlide({ 
		slideCell:"#carousel",
		titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
		mainCell:".bd ul", 
		effect:"left", 
		autoPlay:true,//自动播放
		autoPage:true, //自动分页
		switchLoad:"_src" //切换加载，真实图片路径为"_src" 
	});
</script>
</body>
</html>
