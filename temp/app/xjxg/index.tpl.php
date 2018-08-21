<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>盐城师范学院校纪校规测试</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'/>

<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/swiper.min.css">
<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/animate.min.css">
<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/swiper.min.js"></script>
<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/swiper.animate.min.js"></script>
<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery-1.8.3.min.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script> 

<style>
*{
	margin:0;
	padding:0;
}
html,body{
	height:100%;
}
body{
	font-family:"microsoft yahei";
}
.swiper-container {
  /*  width: 320px;
    height: 480px;*/
	width: 100%;
    height: 100%;
	top:-20px;
	background:#000;

  
}  

.swiper-slide{
	width:100%;
	height:100%;
}
.swiper-slide1{
  background:url(<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/upload/bg.png) no-repeat left top;
  background-size:100% 100%;
}
.swiper-slide2{
  background:url(<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/upload/bg2.png) no-repeat left top;
  background-size:100% 100%;
}
img{
	display:block;
}
.swiper-pagination-bullet {
width: 6px;
height: 6px;
background: #fff;
opacity: .4;
}
.swiper-pagination-bullet-active {
opacity: 1;
}
@-webkit-keyframes start {
	0%,30% {opacity: 0;-webkit-transform: translate(0,10px);}
	60% {opacity: 1;-webkit-transform: translate(0,0);}
	100% {opacity: 0;-webkit-transform: translate(0,-8px);}
}
@-moz-keyframes start {
	0%,30% {opacity: 0;-moz-transform: translate(0,10px);}
	60% {opacity: 1;-moz-transform: translate(0,0);}
	100% {opacity: 0;-moz-transform: translate(0,-8px);}
}
@keyframes start {
	0%,30% {opacity: 0;transform: translate(0,10px);}
	60% {opacity: 1;transform: translate(0,0);}
	100% {opacity: 0;transform: translate(0,-8px);}
}
.ani{
	position:absolute;
	}
.txt{
	position:absolute;
}
#array{
	position:absolute;z-index:999;-webkit-animation: start 1.5s infinite ease-in-out;
}
</style>
</head>

<body>

<div class="swiper-container" style="-webkit-user-select:none;-webkit-touch-callout:none;">
    <div class="swiper-wrapper">
    
      <section class="swiper-slide swiper-slide1">
        <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/upload/nan.png" class="ani resize" style="width:136.8px;height:118px;left:60px;top:10px;z-index:3;" swiper-animate-effect="bounceInLeft" swiper-animate-duration="1.5s" swiper-animate-delay="0s"  > 

        <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/upload/nv.png" class="ani resize" style="width:112px;height:114.8px;right:60px;top:30px;z-index:3;" swiper-animate-effect="bounceInRight" swiper-animate-duration="1s" swiper-animate-delay="1.5s"  > 

        <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/upload/pangbai.png" class="ani resize" style="width:142.33px;height:220.66px;left:90px;top:120px;z-index:2;" swiper-animate-effect="zoomInUp" swiper-animate-duration="0.5s" swiper-animate-delay="2.5s"   > 

       <div  class="ani resize" style="width:250px;height:31.5px;left:55px;top:350px;z-index:5;color:#555555; font-size:100%" swiper-animate-effect="bounceInUp" swiper-animate-duration="0.5s" swiper-animate-delay="3s"  >
       校纪校规测试，题库随机抽题，共20题
        </div>

        <a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/wenjuan"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/upload/button.png"  class="ani resize" style="width:125px;height:34px;left:95px;top:385px;z-index:1;" swiper-animate-effect="bounceInUp" swiper-animate-duration="1.5s" swiper-animate-delay="3.5s"  ></a>

      </section>

    </div>
</div>


<script>
$(document).ready(function() {
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/xjxg/doloading",
		data:"&name=zy",
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   
	if(result.type!='ok'){
	$.hideLoading();
	
	}

		},
		error:function(result){
 $.hideLoading();


	}

		
	});
  });
  wx.config({
    appId: "<?php echo $signPackage['appId'];?>",
    timestamp: "<?php echo $signPackage['timestamp'];?>",
    nonceStr: "<?php echo $signPackage['nonceStr'];?>",
    signature: "<?php echo $signPackage['signature'];?>",
    jsApiList: [
      'onMenuShareTimeline',
	  'onMenuShareAppMessage',
'onMenuShareQQ',
'onMenuShareWeibo',
'onMenuShareQZone'
    ]
  });
  wx.ready(function () {
     
  
  });
scaleW=window.innerWidth/320;
scaleH=window.innerHeight/480;
var resizes = document.querySelectorAll('.resize');
          for (var j=0; j<resizes.length; j++) {
           resizes[j].style.width=parseInt(resizes[j].style.width)*scaleW+'px';
		   resizes[j].style.height=parseInt(resizes[j].style.height)*scaleH+'px';
		   resizes[j].style.top=parseInt(resizes[j].style.top)*scaleH+'px';
		   resizes[j].style.left=parseInt(resizes[j].style.left)*scaleW+'px'; 
          }
		  
  var mySwiper = new Swiper ('.swiper-container', {
   direction : 'vertical',
   pagination: '.swiper-pagination',
  //virtualTranslate : true,
   mousewheelControl : true,
   onInit: function(swiper){
   swiperAnimateCache(swiper);
   swiperAnimate(swiper);
	  },
   onSlideChangeEnd: function(swiper){
	swiperAnimate(swiper);
    },
	onTransitionEnd: function(swiper){
	swiperAnimate(swiper);
    },
	
	
	watchSlidesProgress: true,

      onProgress: function(swiper){
        for (var i = 0; i < swiper.slides.length; i++){
          var slide = swiper.slides[i];
          var progress = slide.progress;
          var translate = progress*swiper.height/4;  
		  scale = 1 - Math.min(Math.abs(progress * 0.5), 1);
          var opacity = 1 - Math.min(Math.abs(progress/2),0.5);
          slide.style.opacity = opacity;
		  es = slide.style;
		  es.webkitTransform = es.MsTransform = es.msTransform = es.MozTransform = es.OTransform = es.transform = 'translate3d(0,'+translate+'px,-'+translate+'px) scaleY(' + scale + ')';

        }
      },
	
	   onSetTransition: function(swiper, speed) {
        for (var i = 0; i < swiper.slides.length; i++){
          es = swiper.slides[i].style;
		  es.webkitTransitionDuration = es.MsTransitionDuration = es.msTransitionDuration = es.MozTransitionDuration = es.OTransitionDuration = es.transitionDuration = speed + 'ms';

        }
      },
	
	
	
	   }) 
  </script>
<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
</body>
</html>
