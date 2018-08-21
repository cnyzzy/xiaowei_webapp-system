<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">

<title>手机验证</title>
<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/supple/css/phone.css">
<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/supple/css/weui.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/supple/css/jquery-weui.css">
<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/supple/css/demos.css">
</head>

<body>

<form style="margin:8px" action="#" method="post" id="mobileform">
  <h3 class="demos-title" style="margin-bottom:40px; margin-top:40px">手机验证</h3>
  <div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p><i class="weui_icon_info"></i>为了确认身份，您需要进行手机验证操作</p>
    </div>
  
  </div>

  <div class="weui_cell">
    <div class="weui_cell_hd">
      <label class="weui_label">手机号：</label>
    </div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" type="number" id="telnum" name="telnum" min="11" max="11" placeholder="请输入手机号">
    </div>
  </div>
  <div class="weui_cell">
    <div class="weui_cell_hd">
      <label class="weui_label">验证码：</label>
    </div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" type="certifycode" id="certifycode" name="certifycode" placeholder="">
    </div>
    <div class="weui_cell_ft"> 
    
    <input style="width:117px;" type="button" class="weui_btn weui_btn weui_btn_mini weui_btn_primary" value="获取验证码"  onclick="clickButton(this)"/>  </div>
  </div>
   <div class="weui_cell"></div>   <div>
   
  <div class="weui_btn_area"> <a class="weui_btn weui_btn_primary" href='javascript:check(document.F);' type="submit">提交</a> </div>
    <div class="weui_btn_area" style="margin-top:40px"> <a class="weui_btn weui_btn_warn" onClick='return confirm1();'>解除身份绑定</a></div>              
  <div class="weui_btn_area"> <a href='javascript:bushiba();' class="weui_btn weui_btn_plain_default" type="submit">页面刷新了怎么办</a></div>
  </div>  
            </div>
  </form>
<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/supple/js/jquery-3.1.0.min.js"></script> 
<script type="text/javascript">
function clickButton(obj){

var moblienumber =document.getElementById("telnum").value;
 if (moblienumber.length==11) {
 				    var obj = $(obj);
    obj.attr("disabled","disabled");/*按钮倒计时*/
	document.getElementById("telnum").readOnly=true;
    var time = 60;
    var set=setInterval(function(){
    obj.val(--time+"(s)");
    }, 1000);/*等待时间*/
    setTimeout(function(){
    obj.attr("disabled",false).val("重新获取验证码");/*倒计时*/
    clearInterval(set);
    }, 60000);
 $.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/home/mdo",
		data:"&do=mobile&mobile="+moblienumber,
		beforeSend:function(){},
		success:function(result){
		
			if(result.replace(/[^0-9]/ig,"") == '1'){
				$.toast("发送成功");

			}else if(result.replace(/[^0-9]/ig,"") == '2'){$.toast("已绑定", "forbidden");
			}else if(result.replace(/[^0-9]/ig,"") == '3'){$.toast("操作频繁", "forbidden");
			}else if(result.replace(/[^0-9]/ig,"") == '4'){$.toast("短信接口报错", "forbidden");
			}else{
				$.toast("接口错误<br>联系管理员", "forbidden");}
		},
	error:function(){
	$.toast("网络故障<br>请重试", "cancel");
}
	
	})

	}else{
	document.getElementById("telnum").focus();
	$.toast("手机号填写错误", "forbidden");
}
}
  function bushiba() {
  $.alert("填写好手机和验证码直接提交即可，无需再次获取");
  }
  function check(form) {
					
				$.showLoading("正在提交...");
							  setTimeout(function() {
         $.hideLoading();
        }, 800);
		var moblienumber =document.getElementById("telnum").value;
		var mobliecode =document.getElementById("certifycode").value;
			 if (moblienumber.length==11&&mobliecode.length==4) {
			  $.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/home/mdo",
		data:"&do=vcode&mobile="+moblienumber+"&code="+mobliecode,
		beforeSend:function(){},
		success:function(result){
		
			if(result.replace(/[^0-9]/ig,"") == '1'){
				$.toast("验证成功");
window.location.href = '<?php echo $arrInfo['url'];?>';
			}else if(result.replace(/[^0-9]/ig,"") == '2'){$.toast("已绑定", "forbidden");
			}else if(result.replace(/[^0-9]/ig,"") == '3'){$.toast("非法操作", "forbidden");
			}else if(result.replace(/[^0-9]/ig,"") == '4'){$.toast("验证码已失效", "forbidden");
			}else if(result.replace(/[^0-9]/ig,"") == '5'){$.toast("验证码错误!", "forbidden");
		
			}else{
				$.toast("mdo接口错误<br>联系管理员", "forbidden");}
		},
	error:function(){
	$.toast("网络故障<br>请重试", "cancel");
}
	
	})
			 }else{
	document.getElementById("certifycode").focus();
	$.toast("验证码填写错误", "forbidden");
}	
		 return true; 
         }
function confirm1()
{
$.confirm("确认解除绑定而更换身份么？这不是验证所需的操作", function() {
 $.showLoading();
     $.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/bd/exit",
		data:"&do=isdetele",
		beforeSend:function(){},
		success:function(result){
		if(result.replace(/[^0-9]/ig,"")=="1"){
			$.hideLoading();
			$.toast("解绑成功");
			 setTimeout(function() {
          window.location.reload(true);
        }, 800)
			}	 
		else if(result.replace(/[^0-9]/ig,"")=="2"){
			$.hideLoading();
			$.toast("已被锁定<br>不可解绑","cancel");
			 setTimeout(function() {
          window.location.reload(true);
        }, 800)
			}	 
		else if(result.replace(/[^0-9]/ig,"")=="3"){
			$.hideLoading();
			$.toast("尚未绑定", "forbidden");
			 setTimeout(function() {
          window.location.reload(true);
        }, 800)
			}	
		else {
			$.hideLoading();
			$.toast("发生错误", "forbidden");
			 setTimeout(function() {
          window.location.reload(true);
        }, 800)
			}
		}
	})
  }, function() {
  $.toast("取消操作", "cancel");
  return false;
  });

		
}</script>
		       <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
			   			<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
  		 				<?php if($isok==1) { ?>		
							$(document).ready(function() {
 			 setTimeout(function() {
         $.modal({
  title: "提示",
  text: "已经绑定过手机号码，更换号码请清除后再绑定",
  buttons: [
    { text: "好的", className: "default",
	onClick: function(){ 
	  $.showLoading("即将跳回...","cancel");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>/home/person_info";
        }, 800)	
	} },
  ]
});
        }, 100)	

		});
		<?php } ?>
</script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>

		</body>
</html>
