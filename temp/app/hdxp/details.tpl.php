<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php if($Arr['title']) { ?><?php echo $Arr['title'];?><?php } ?></title>
<link href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/details.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/layer-v3.0.3/layer/mobile/need/layer.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/phone.js" ></script>
<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/layer-v3.0.3/layer/layer.js"></script>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>

		    <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>	
</head>

<body>
<div class="whole">
<?php if(!empty($Arr['firstimg'])) { ?>
	<div class="movie">
    	<div class="back"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/image/back.png" /></div>
    	<img src="<?php echo $Arr['firstimg'];?>" />
        <span>
        	<?php if(!empty($Arr['video'])) { ?><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/image/start.png" /><?php } ?>
        </span>
    </div><?php } ?>
    <div class="detail">
    	<div class="bol"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/image/bg-bg.png" /></div>
        <div class="det-con">
        	<div class="common det-c">
            		<?php if(!empty($Arr['smallimg'])) { ?><div class="jz-pic">
                	<img src="<?php echo $Arr['smallimg'];?>" />
                </div><?php } ?>
                <div class="det-inf">
                	<p class="det-titles">
                    	<span><?php if($Arr['title']) { ?><?php echo $Arr['title'];?><?php } ?></span>
            <p class="eng"><?php if($Arr['owner']) { ?><?php echo $Arr['owner'];?><?php } ?> 主办</p>
                            <p class="tim">活动地点 <span><?php if($Arr['place']) { ?><?php echo $Arr['place'];?><?php } ?></span></p>
                            <p class="tim">活动时间 <span><?php if($Arr['time']) { ?><?php echo $Arr['time'];?><?php } ?></span></p>
						
							 <p class="tim">总座位数 <span><?php if($totalnum) { ?><?php echo $totalnum;?><?php } ?></span></p>
                           <?php if($totalnum>0) { ?> <p class="tim">剩余座位 <span><?php if($seatnum) { ?><?php echo $seatnum;?><?php } ?></span></p><?php } ?>
                    </p>
                    <ul class="stars">
                    	<li><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/image/stars.png" /></li>
                        <li><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/image/stars.png" /></li>
                        <li><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/image/stars.png" /></li>
                        <li><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/image/stars.png" /></li>
                        <li><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/image/stars.png" /></li>
                    </ul>
                   
                    
                </div>
            </div>
            
            <div class="common parti">
            	<span><?php if($Arr['content']) { ?><?php echo $Arr['content'];?><?php } ?></span>
            </div>
            <?php if(!empty($Arr['cimg'])) { ?>
			         <div class="common stage-photo">
            	<h3>照片</h3>
                <ul>
<?php $cimg=json_decode($Arr['cimg'],true);?><?php foreach((array)$cimg as $key=>$loopChild) {?>	<li><img src="<?php echo $loopChild;?>" /></li>
<?php }?>
                </ul>
            </div>
										<?php } ?>
                           
   
            
        </div>
    </div>
	<?php if($Arr['endtime']<time()) { ?> <a class="footer">结束订票</a><?php } else { ?>
	<?php if($seatnum&&$seatnum>0) { ?>  <a class="footer" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/seat/<?php echo $id;?>">立即订票</a><?php } else { ?><a class="footer">无票</a><?php } ?><?php } ?>

</div>
<script type="text/javascript">

$(document).ready(function() {
			 				<?php if($isstop==1) { ?>		
			
 			 setTimeout(function() {
         $.modal({
  title: "提示",
  text: "当前绑定的用户身份不能进行选票<br>您可以选择重新绑定或退出",
  buttons: [
    { text: "取消", className: "default",
	onClick: function(){ 
	  $.showLoading("即将跳回...","cancel");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>";
        }, 800)	
	} },
    { text: "重新绑定", 
	onClick: function(){
		  $.showLoading("即将跳转...","cancel");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>/home/modify";
        }, 800)	
	} },
  ]
});
        }, 2600)	

		<?php } ?>	
	$(".movie").click(function(){
		movie();
	});
	        	<?php if(!empty($Arr['video'])) { ?>
	function movie(){
		layer.open({
		  type: 2,
		  title: false,
		  area: ["630px", "360px"],
		  shade: 0.8,
		  closeBtn: 1,
		  shadeClose: true,
		  content: "<?php echo $Arr['video'];?>"
		});	
	}
<?php } ?>
	$(".back").on("click",function(){
		window.history.go(-1);
	});
	
});
</script>
</body>
</html>
