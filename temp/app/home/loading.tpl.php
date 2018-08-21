<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">     
        <title>数据初始化-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/self.css"/>
       <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
		}
		.content {
			position: fixed;
			top: 45%;
			left: 50%;
			margin: -120px 0 0 -120px;
			width: 240px;
			transform-style: preserve-3d;
			transform: rotateX(45deg) rotateZ(45deg);
		}
		.n1{
			float: left;
			position: relative;
			width: 80px;
			height: 80px;
			transform-style: preserve-3d;
			animation: test 1s infinite;
			box-shadow: 400px 400px 20px rgba(0,0,0,0.2)
		}
		.a1,
		.a2,
		.a3{
			position: absolute;
			width: 80px;
			height: 80px;
		}
		.a1 {
			background-color: #0498a1;
		}
		.a2 {
			background-color: #037fa1;
			transform:translate3d(40px,0,-40px) rotateY(90deg);
		}
		.a3 {
			background-color: #008e97;
			transform:translate3d(0px,40px,-40px) rotateX(90deg);
		}
		.n1:nth-child(2) {
			animation-delay : 0.05s;
		}
		.n1:nth-child(3) {
			animation-delay : 0.1s;
		}
		.n1:nth-child(4) {
			animation-delay : 0.15s;
		}
		.n1:nth-child(5) {
			animation-delay : 0.2s;
		}
		.n1:nth-child(6) {
			animation-delay : 0.25s;
		}
		.n1:nth-child(7) {
			animation-delay : 0.3s;
		}
		.n1:nth-child(8) {
			animation-delay : 0.35s;
		}
		.n1:nth-child(9) {
			animation-delay : 0.4s;
		}
		@keyframes test {
			0%{
				transform: translateZ(0px);
			}
			50%{
				transform: translateZ(170px);
			}
			100%{
				transform: translateZ(0px);
			}

		}
	</style>
<script>
$(document).ready(function(){ 
 $.showLoading();
 function okok(i)
{

	if(i==6){
			$.hideLoading();
			$.toast("初始化成功");
			 setTimeout(function() {
        window.location.href = '<?php echo $arrInfo['url'];?>/home/index/'+((new Date()).getTime());
        }, 800)
			}}	 
var iii=0;
	$.hideLoading();
	$.showLoading("更新数据("+iii+"/6)");
 $.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/home/do/aaa",
		 async:true, 
		 timeout : 5000,
		 data:"&isis=1",
		
        success:function(result){ 

	iii+= 1;
	$.showLoading("更新数据("+iii+"/6)");
	okok(iii);
	}, 
         error:function (result) {   
	iii+= 1;
	$.showLoading("更新数据("+iii+"/6)");
		okok(iii);
         }, 
  });
   $.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/home/wait",
		 async:true, 
		 timeout : 5000,
		 data:"&isis=1",
		
        success:function(result){ 

	iii+= 1;
	$.showLoading("更新数据("+iii+"/6)");
	okok(iii);
	}, 
         error:function (result) {   
	iii+= 1;
	$.showLoading("更新数据("+iii+"/6)");
		okok(iii);
         }, 
  });
   $.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/home/do/bbb",
		 async:true, 
		 timeout : 5000,
		 data:"&isis=1",
		
        success:function(result){ 
	iii+= 1;
	$.showLoading("更新数据("+iii+"/6)");
	okok(iii);
	}, 
         error:function (result) {   
	iii+= 1;
	$.showLoading("更新数据("+iii+"/6)");
		okok(iii);
         }, 
  });
   $.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/home/do/ccc",
		 async:true, 
		 timeout : 5000,
		 data:"&isis=1",
		
        success:function(result){ 
      
	iii+= 1;
	$.showLoading("更新数据("+iii+"/6)");
	okok(iii);
	}, 
         error:function (result) {   
	iii+= 1;
	$.showLoading("更新数据("+iii+"/6)");
		okok(iii);
         }, 
  });
   $.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/home/do/ddd",
		 async:true, 
		 timeout : 5000,
		 data:"&isis=1",
		
        success:function(result){ 
     
	iii+= 1;
	$.showLoading("更新数据("+iii+"/6)");
	okok(iii);
	}, 
         error:function (result) {   
	iii+= 1;
	$.showLoading("更新数据("+iii+"/6)");
		okok(iii);
         }, 
  });
   $.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/home/do/eee",
		 async:true, 
		 timeout : 5000,
		 data:"&isis=1",
		
        success:function(result){ 
     
	iii+= 1;
	$.showLoading("更新数据("+iii+"/6)");
	okok(iii);
	}, 
         error:function (result) {   
	iii+= 1;
	$.showLoading("更新数据("+iii+"/6)");
		okok(iii);
         }, 
  });
 });

 </script>
    </head>
    <body>
        <header>
          <div class="content">
		<div class="n1">
			<div class="a1"></div>
			<div class="a2"></div>
			<div class="a3"></div>
		</div>
		<div class="n1">
			<div class="a1"></div>
			<div class="a2"></div>
			<div class="a3"></div>
		</div>
		<div class="n1">
			<div class="a1"></div>
			<div class="a2"></div>
			<div class="a3"></div>
		</div>
		<div class="n1">
			<div class="a1"></div>
			<div class="a2"></div>
			<div class="a3"></div>
		</div>
		<div class="n1">
			<div class="a1"></div>
			<div class="a2"></div>
			<div class="a3"></div>
		</div>
		<div class="n1">
			<div class="a1"></div>
			<div class="a2"></div>
			<div class="a3"></div>
		</div>
		<div class="n1">
			<div class="a1"></div>
			<div class="a2"></div>
			<div class="a3"></div>
		</div>
		<div class="n1">
			<div class="a1"></div>
			<div class="a2"></div>
			<div class="a3"></div>
		</div>
		<div class="n1">
			<div class="a1"></div>
			<div class="a2"></div>
			<div class="a3"></div>
		</div>
	</div>
        </header>

	</body>
	</HTML>
     