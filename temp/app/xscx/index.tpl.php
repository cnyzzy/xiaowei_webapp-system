<?php defined('ZRoot') or die('Access Denied.'); ?><?php $arrInfo['cdnurl']="http://wx.echo1.top";?>
<!DOCTYPE html>
<html>
<head>
	<title>盐城师范学院新生信息查询::YCTU-1958</title>
	<link rel="stylesheet" href="<?php echo $arrInfo['cdnurl'];?>/app/<?php echo $AppName;?>/model/css/style.css">
	<link href="<?php echo $arrInfo['cdnurl'];?>/app/<?php echo $AppName;?>/model/css/popup-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
-->	 
   
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Sign In And Sign Up Forms  Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
        <link rel="stylesheet" href="<?php echo $arrInfo['cdnurl'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['cdnurl'];?>/app/home/model/css/jquery-weui.min.css"/>
	</script><script src="<?php echo $arrInfo['cdnurl'];?>/app/<?php echo $AppName;?>/model/js/jquery.min.js"></script>
			<script src="<?php echo $arrInfo['cdnurl'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
<script src="<?php echo $arrInfo['cdnurl'];?>/app/home/model/js/jquery-weui.js"></script>
<script src="<?php echo $arrInfo['cdnurl'];?>/app/<?php echo $AppName;?>/model/js/jquery.magnific-popup.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $arrInfo['cdnurl'];?>/app/<?php echo $AppName;?>/model/js/modernizr.custom.53451.js"></script> 
 
 <script>
						$(document).ready(function() {
					
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
							 $('#AAA').click(function() {
          if($("#name").val()=="") {
	
               $.alert("姓名不正确", "警告", function() {

});                
       return  false;        
           }
		   var regName =/^[\u4e00-\u9fa5]{2,10}$/;  
if(!regName.test($("#name").val())){  
	
               $.alert("姓名不正确", "警告", function() {

});                
       return  false;        
           }
       if($("#idid").val()==""){
               $.alert("身份证号不正确", "警告", function() {

});                    
        return  false;         
         } 
  	 

 });	
 $('#F').submit(function() {
$.showLoading();
	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/xscx/do/re",
		data:"&name="+$("#name").val()+"&idid="+$("#idid").val(),
		async:true,		
			dataType: "json", 
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
  	$.hideLoading();
	if(result.type!='ok'){

	$.toast(result.msg, "forbidden");

		   
   
	}
	if(result.type=='ok'){
	$.toast("查询成功");
	  if(result.msg[1])$('#rxm').html(result.msg[1]);
	     if(result.msg[5])$('#rxq').html(result.msg[5]);
		 if(result.msg[4]) $('#rxy').html(result.msg[4]); 
		 if(result.msg[3]) $('#rzy').html(result.msg[3]);
		    if(result.msg[6])$('#rbj').html(result.msg[6]);
			 if(result.msg[7]) $('#rxh').html(result.msg[7]);
				 setTimeout(function() {
$("#F").hide();
$("#re").show();

        }, 1000)
	}

		},
		error:function(result){
 $.hideLoading();
	$.toast("网络故障", "forbidden");
				 setTimeout(function() {
          window.location.reload(true);
        }, 1000)
	}

		
	});
  return false; 

});
 
						});

</script>	
	
</head>
<body>
	<h1><B>新生信息查询</B></h1>
	<div class="w3layouts">
		<div class="signin-agile">
			<h2>查询
</h2>
			<form id='F' method="post">
				<input type="text" id="name" class="name" placeholder="姓名" required="">
				<input type="text" id="idid" class="password" placeholder="身份证号" required="">
				<ul>
					<li>
						
					</li>
				</ul>
				<a class="popup-with-zoom-anim button-isi zoomIn animated" href="#small-dialog">遇到问题?</a><br>
				<div class="clear"></div>
				<input id='AAA' type="submit" value="查询">
			</form>
			 <div id="re" class="weui_cells" style='display:none'>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>姓名</p>
    </div>
    <div id='rxm' class="weui_cell_ft" style="width: 55%; word-wrap: break-word;">
未知
    </div>
  </div>
    <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>年级</p>
    </div>
    <div id="rxq" class="weui_cell_ft" style="width: 55%; word-wrap: break-word;">
未知    </div>
  </div>
    <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>所在学院</p>
    </div>
    <div  id='rxy' class="weui_cell_ft" style="width: 55%; word-wrap: break-word;">
未知    </div>
  </div>
    <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>所在专业</p>
    </div>
    <div id='rzy' class="weui_cell_ft" style="width: 55%; word-wrap: break-word;">
未知    </div>
  </div>  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>所在班级</p>
    </div>
    <div id='rbj' class="weui_cell_ft" style="width: 55%; word-wrap: break-word;">
未知    </div>
  </div>  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary" style="width: 55%; word-wrap: break-word;">
      <p>学号</p>
    </div>
    <div id='rxh' class="weui_cell_ft">
未知    </div>
  </div>
  				<a style="border-radius: 20px;" class="weui_btn weui_btn_primary"  href="https://mp.weixin.qq.com/mp/profile_ext?action=home&__biz=MzAxMDU5NzAxMw==&from=timeline&isappinstalled=0#wechat_redirect">关注盐师官方微信公众号</a>				

</div>
		</div>
		<div class="signup-agileinfo">
			<h3>介绍</h3>
			<p>    本页面由"盐城师范学院"官方公众号创建，为新生提供学号、学院、班级等信息的查询服务。<br>    当前数据为2017年新生数据。</p>
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
			<p>请检查姓名和身份证号是否有误，请勿忽略身份证号末尾x</p><br>
			<h3>2.查询数据不显示或超时</h3>
			<p>若提示查询成功却不显示，请更换手机再次重试。提示超时，请稍后再查询。多次重试无效请查看第4条。</p><br>
			<h3>3.查询数据有误</h3>
			<p>数据来源于教务处，部分专转本同学可能数据不全，请联系我们。</p><br>
			<h3>4.联系方式</h3>
			<p>微信公众号：盐城师范学院<br>微博：盐城师范学院<br>开发人员QQ：970127005</p>
	</div>
</div>	
<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
</body>


</html>