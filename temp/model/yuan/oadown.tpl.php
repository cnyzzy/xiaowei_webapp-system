<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=device-width,user-scalable=no" />          

    <title>下载</title>

	<style type="text/css">
body{background:#DDD url("<?php echo $arrInfo['url'];?>/img/oa.jpg") top center no-repeat !important;}body .avatar .img-circle{background:#333 !important}body form .btn{background:#333 !important;border-color:#fff !important}#header h1,#header p{background-size:100% auto !important}
#mcover {position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.7); display: none; z-index: 20000; }
#mcover img {position: fixed; right: 18px; top: 5px; width: 260px!important; height: 180px!important; z-index: 20001; }
   </style>
	    <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>	  
		<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
</head>
<body id="test1" class="test1">
    <div id="content">
        <div id="header_bar">
        </div>
        <!-- E header_bar -->
			
        <div class="container">
            <div id="header" class="text-center">
                <div style="height: 20px;"></div>
				
				 <div class="container">


            <!-- E bd -->
        </div>

<script type="text/javascript">
        $(window).on("load",function(){
		<?php if($isno==1) { ?>
		 $.toast("参数缺失","cancel");
			 setTimeout(function() {
          window.location.href="<?php echo $arrInfo['url'];?>";
        }, 2500);	
		<?php } ?>
	        var winHeight = $(window).height();
			function is_weixin() {
			    var ua = navigator.userAgent.toLowerCase();
			    if (ua.match(/MicroMessenger/i) == "micromessenger") {
			        return true;
			    } else {
			        return false;
			    }
			}
			var isWeixin = is_weixin();
			if(isWeixin){
			$('#mcover').show();
			}
        })

  
</script>
</div>


<div id="mcover"><img src="<?php echo $arrInfo['url'];?>/img/guide.png"></div>


    <!-- E pop_success -->

    <!-- E tip -->


    <div id="copy">
        <p class="text-center">
            &copy; <a target="_blank">By:ZY</a>
        </p>
    </div>
    <!-- E copy -->
    <div id="share_tips" class="sr-only">
        <div class="container text-right">
            点击右上角，在外部浏览器中打开 <i class="glyphicon glyphicon-hand-up element-animation"></i>
        </div>
        <!-- E container -->
    </div>
</body>
</html>