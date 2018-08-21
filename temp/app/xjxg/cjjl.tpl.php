<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="viewport" content="initial-scale=1, maximum-scale=1,user-scalable=no">
<title>抽奖记录</title>
<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style-cj.css">
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
    <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
       <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){

});
</script>	
</head>
<body>

<div class="main">
  <div class="banner"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/banner-cj.jpg"/></div>

       <div class="title2">抽奖记录</div>
       <div class="list1">
    	  
<?php if($nocj==1) { ?>		  <div class="l1">
             <p>暂无记录</p>
            </div><?php } else { ?>
			<?php if($result2) { ?>
           <div class="l1">
                <div class="p1"><?php if($result2['cj']) { ?><?php echo $result2['cj'];?><?php } ?></div>
                <div class="p2"><?php if($result2['stime']) { ?><?php ECHO(date('Y-m-j G:i:s',$result2['stime']))?><?php } ?></div>   
            </div>
<?php } ?>
  <?php } ?>
        </div>
        <div class="title3">*温馨提示：奖品领取请关注公众号“盐城师范学院”</div>
        <a href="cj" class="bt1">返&nbsp;回</a>
    </div>
     
     
     
  </div>  
 


 	
</body>
</html>