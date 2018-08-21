<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE HTML>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1 maximum-scale=2, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-title" content="Add to Home">
		<meta name="format-detection" content="telephone=no">
		<meta http-equiv="x-rim-auto-match" content="none">
		<title>步数提交—健步走活动区</title>
		<script>
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
		WeixinJSBridge.call('hideOptionMenu');
		});
</script>
		<link href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/publi.css" rel="stylesheet" type="text/css">
		<link href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style.css" rel="stylesheet" type="text/css">
		<script type='text/javascript' src='<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery-2.0.3.min.js'></script>


		<!--[if lt IE 9]>
			<script src="js/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
body{font-family:"微软雅黑"}
.uploadbtn{ display:block;height:40px; line-height:40px; color:#333; text-align:center; width:100%; background:#f2f2f2; text-decoration:none; }
.imglist{min-height:200px;margin:10px;}
.imglist img{width:100%;}
</style>
		<style>
*{margin:0;padding:0;border:0; list-style:none}
body{background:white;}
.event{ width:350px;height:90px;  margin:5px; clear:both; border:1px white solid; }
.event .pic{ float:left;margin:5px; width:66px; height:66px; margin-right:10px;}
.event .title{float:left;margin:5px;line-height:16px;width:255px;}
.d_over{background:#deeaf8;border:1px solid #aaccee}
.d_out{background:white;border:1px solid  white;}
h2{ font-size:14px; font-weight:bolder; color:#444444;}
p{ font-size:12px; color:#666666; margin-top:4px; line-height:19px;}

</style>
<script type='text/javascript' src='<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery-2.0.3.min.js'></script>
<script type='text/javascript' src='<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/LocalResizeIMG.js'></script>
<script type='text/javascript' src='<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/patch/mobileBUGFix.mini.js'></script>


			  
	</head>

	<body>
		<!-- ====================================loading -->
		<section id="loading"></section>
		<!-- ====================================页面开始 -->
		<!--登录-->
		<header class="acc_head">
			<div class="clearfix">
				<h1 class="tc">步数提交</h1>

			</div>
			<div class="clearfix">
			<div class="event" onmouseover="this.className='d_over event'" onmouseout="this.className='d_out event'">      
<div class="pic"><img src="<?php echo $_SESSION['zid']['img'];?>" height="64px" width="64px" border="0" /></div>     
<div class="title">
	<p>亲爱的<?php echo $_SESSION['zid']['name'];?>,感谢参加本次活动</p>
	<P>当前提交的数据属于：<?php echo $timee;?><br>每日提交时间为当日晚上十点至次日晚上十点。
</div>
</div>



			</div>
		</header>
		<section class="acc_apply">
			<ul>
				<li class="clearfix">
					<label class="tl">今日步数：</label>
					<input autocomplete="off" placeholder="请输入今天的步数" class="" type="number" id="step"/>
				</li>
				
				<li class="clearfix" >
					<label class="tl acc_four fl">图片截图：</label>
				</li>
			<li style="border-top: 0; margin-bottom: 60px;">
					<div class="acc_img">
						<p class="tc" id="ppp" >参考样例</p>
						<div id="sss">
							<img class="acc_imgin" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/acc_img.png" id="img0">
						</div>

<div style="width:AUTO;margin:10px auto; border:solid 1px #ddd; overflow:hidden; ">  
  <input type="file" id="uploadphoto" name="uploadfile" value="请点击上传图片"   style="display:none;" /> 
  <a href="javascript:void(0);" onclick="uploadphoto.click()" class="uploadbtn">点击上传文件</a>
</div>

						<p class="ph09 " id="iii">注：当前提交的日期为：<?php echo $timee;?>。<br>支持jpg、jpeg、bmp、gif格式照片。大小不超过5M</p>
					</div>
				</li>
			</ul>
		</section>
		<footer class="acc_foot clearfix">
			<a href="#" class="fl tc acc_cancel">取消</a>
			<a href="#" class="fl tc acc_sure">提交</a>
		</footer>
		<!--弹出层-->
		<article id="tip">
			<div class="pack">
				<h1 class="tc">提示</h1>
				<p class="tc"></p>
				<a id='aa' href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/hdqup">确定</a>
				
			</div>
		</article>
		<!-- 网站要用到的一些类库 -->

		<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/script.js"></script>
		  <script type="text/javascript">
$(document).ready(function(e) {
	$(window).on("load", function() {
						$("#loading").fadeOut();
					})
					// ========================================浮层控制
				$("#tip .pack a").on("click", function() {
				top.location.href = "<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/hdqup"; 
				ttt=$("#tip .pack p").html(); 
				
					if(ttt=="您今天的数据已经提交!"||ttt=="上传成功，请等待审核"||ttt=="未知原因，提交失败，请重新尝试")
					{
						$("#tip .pack p").html("正在加载请稍候");
						$("#tip .pack a").fadeOut();
					top.location.href = "<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/hdq"; 

				}
					$("#tip").fadeOut();
					
					return false;
				})

				function alerths(str) {
					$("#tip").fadeIn();
					
					$("#tip .pack p").html(str);

				}
				  
				$(".acc_sure").on("click", function() {
					
ssss=$("#step").val(); 
if(ssss==null||ssss.length==0)
{ 
alert('请填写步数!')
return false;}
$.post("<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/hdqok",{
         step:  ssss,
     },function(data,status){
    alerths(data);
  }).error(function(){
        alert('提交错误')
    });
				 });
				
   $('#uploadphoto').localResizeIMG({
      width: 400,
      quality: 0.5,
      success: function (result) {  
		  var submitData={
				base64_string:result.clearBase64, 
			}; 
		$.ajax({
		   type: "POST",
		   url: "<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/hdqupload",
		   data: submitData,
		   dataType:"json",
		   success: function(data){
			 if (0 == data.status) {
				alert(data.content);
		
				return false;
			 }else{
				alert(data.content);
		$("#img0").attr("src",data.url+"?"+Math.random());
		$("#ppp").html("上传预览"); 
				return false;
			 }
		   }, 
			complete :function(XMLHttpRequest, textStatus){
			},
			error:function(XMLHttpRequest, textStatus, errorThrown){ //上传失败 
			   alert(XMLHttpRequest.status);
			   alert(XMLHttpRequest.readyState);
			   alert(textStatus);
			}
		}); 
      }
  });

}); 
</script>

<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
	</body>

</html>