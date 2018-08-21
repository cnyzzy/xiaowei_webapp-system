<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
				<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<style>

</style>

<title>微信登录认证</title>
</head>

<body>



	<div id="header" class="head">
		<div class="wrap">
			<i class="menu_back"><a href="javascript:history.go(-1);"></a></i>
			<div class="title">
				<span class="title_d"><p></p></span>
				<div class="clear"></div>
			</div>
			
		</div>
	</div>
	
	<div id="container">
		<div id="content">
						<div style="height:1px"></div>
						<div class="weui_msg">
  <div class="weui_icon_area"><i class="weui_icon_msg weui_icon_info weui_icon_msg"></i></div>
  <div class="weui_text_area">
    <h2 class="weui_msg_title">请用微信扫码登录</h2>
    <p class="weui_msg_desc">需要根据微信识别身份<br>感谢您的支持<br>请使用微信客户端直接二维码<br>也可以保存下方二维码至微信识别</p>
 <div class="col-md-3" id="qr3">
				</div>
 </div>
  <div class="weui_opr_area">
    <p class="weui_btn_area">
	      <a href="https://mp.weixin.qq.com/mp/profile_ext?action=home&__biz=MzAxMDU5NzAxMw==&from=timeline&isappinstalled=0#wechat_redirect
" class="weui_btn weui_btn_default">微信公众号</a>
      <a href="https://post.mp.qq.com/tmpl/default/client/article/html/jump.html?action=accountCard&puin=2667073492&from=singlemessage
" class="weui_btn weui_btn_default">QQ校园公众号</a>
      <a href="https://weibo.com/ycsfxy
" class="weui_btn weui_btn_default">微博</a>
    </p>
  </div>

</div>
</div>

									<div id="comment">
				<div class="pd5">	<h5> &nbsp;</h5>
									</div>	<h5> &nbsp;</h5>
			</div>
		</div>

	</div>
	
	


	<div class="loading_dark"></div>
	<div id="loading_mask">
		<div class="loading_mask">
			<ul class="anm">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
	</div>
	<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/js/qrjs2.js"></script>
	<script type="text/javascript">
	
		var container3 = document.getElementById('qr3');
	
	
		var dataUriPngImage = document.createElement("img"),
		u = "<?php echo $url;?>",
		s = QRCode.generatePNG(u, {
				ecclevel: "L",
				format: "html",
				fillcolor: "#FFFFFF",
				textcolor: "#373737",
				margin: 4,
				modulesize: 8
			});
		dataUriPngImage.src = s;
		container3.appendChild(dataUriPngImage);
		var islast=1;
		 setTimeout(function() {
             Push();
           },
        200);

       var _send=setInterval(function() {
 
          if(islast==1)  Push();
 
    },
        1000);
 
/*请求函数的ajax*/
 
function Push() {
 
 
               $.ajax({
                url: "<?php echo $arrInfo['url'];?>/rgcs/wxdo/ok/<?php echo $Id;?>",
                dataType: 'json',
                type: 'POST',
				data:"",
				async:false,
				timeout : 5000,
                success: function (data) {

    if(data.type=='no'){
	window.clearInterval(_send);
	islast=0;
                        console.log(data);
 $.alert(data.msg, "警告", function() {
window.location.reload(true);

}); 


                        } 
						
						if(data.type=='re'){
                        console.log(data);

                        }
							if(data.type=='ok'){
							islast=0;
						window.clearInterval(_send);
                    $.alert(data.msg, "成功", function() {
            window.location.href="<?php echo $arrInfo['url'];?>/rgcs";


}); 

                        }
                 
                },
                error : function(e) {
							islast=0;
						window.clearInterval(_send);
                    $.alert("网络故障", "错误", function() {
            window.location.href="<?php echo $arrInfo['url'];?>/rgcs";


}); 

 
                }
            });
			}
	</script>
<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
</body>
</html>