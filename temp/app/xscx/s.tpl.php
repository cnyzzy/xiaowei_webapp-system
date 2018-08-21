<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html>
<head>
	<title>盐城师范学院新生信息查询::YCTU-1958</title>
	<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style.css">
	<link href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/popup-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
-->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Sign In And Sign Up Forms  Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
	</script><script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery.min.js"></script>
			<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
<script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery.magnific-popup.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/modernizr.custom.53451.js"></script> 
 <script>
						$(document).ready(function() {
	
							<?php if(empty($row)) { ?>

$.alert("查询不到信息", function() {
     window.location.href = '<?php echo $arrInfo['url'];?>/xscx';
});


<?php } ?>															
						});
</script>	
		
</head>
<body>
	<h1><B>新生信息查询</B></h1>
	<div class="w3layouts">
		<div class="signin-agile">
			<h2>查询
</h2>


 <div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>姓名</p>
    </div>
    <div class="weui_cell_ft">
      <?php if(!empty($row['xm'])) { ?><?php echo $row['xm'];?><?php } else { ?>未知<?php } ?>
    </div>
  </div>
    <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>年级</p>
    </div>
    <div class="weui_cell_ft">
       <?php if(!empty($row['xq'])) { ?><?php echo $row['xq'];?><?php } else { ?>未知<?php } ?>
    </div>
  </div>
    <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>所在学院</p>
    </div>
    <div class="weui_cell_ft">
       <?php if(!empty($row['szxy'])) { ?><?php echo $row['szxy'];?><?php } else { ?>未知<?php } ?>
    </div>
  </div>
    <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>所在专业</p>
    </div>
    <div class="weui_cell_ft">
           <?php if(!empty($row['lqzy'])) { ?><?php echo $row['lqzy'];?><?php } else { ?>未知<?php } ?>
    </div>
  </div>  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>所在班级</p>
    </div>
    <div class="weui_cell_ft">
      <?php if(!empty($row['xzb'])) { ?><?php echo $row['xzb'];?><?php } else { ?>尚未分班<?php } ?>
    </div>
  </div>  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>学号</p>
    </div>
    <div class="weui_cell_ft">
       <?php if(!empty($row['xh'])) { ?><?php echo $row['xh'];?><?php } else { ?>尚未分班<?php } ?>
    </div>
  </div>
</div>
				<form action="#" method="post">
	<a class="button-isi zoomIn animated" href="<?php echo $arrInfo['url'];?>/xscx">遇到问题?</a><br>	
  	<div class="clear"></div>
			</form>	</div>
		<div class="signup-agileinfo">
			<h3>介绍</h3>
			<p>    本页面由"盐城师范学院"官方公众号创建，为新生提供学号、学院、班级等信息的查询服务。当前还没有学号数据。</p>
			<div class="more">
				<a class="book popup-with-zoom-anim button-isi zoomIn animated" data-wow-delay=".5s" href="#small-dialog">遇到问题</a>				
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="footer-w3l">
		<p class="agileinfo"> 小薇工作室 仲原 
 </p>
	</div>
	<div class="pop-up"> 
	<div id="small-dialog" class="mfp-hide book-form">
		<h3>遇到问题怎么办 </h3>
			<h3>1.查询不了</h3>
			<p>请检查姓名和身份证号是否有误，本系统忽略身份证号末尾x的大小写问题。</p><br>
			<h3>2.查询数据不显示</h3>
			<p>清除手机缓存或更换手机再次重试，多次重试无效请查看第4条。</p><br>
			<h3>3.查询数据有误</h3>
			<p>数据来源于招生办和教务处，数据应当准确，若确实有误请看第4条</p><br>
			<h3>4.联系方式</h3>
			<p>微信公众号：盐城师范学院<br>微博：盐城师范学院<br>开发人员QQ：970127005</p>
	</div>
</div>
	<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
</body>
</html>