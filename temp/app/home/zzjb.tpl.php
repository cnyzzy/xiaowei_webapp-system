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
       <script>
		function confirm1()
{
         $.modal({
  title: "提示",
  text: "请选择你要解绑的身份",
  buttons: [
    { text: "学生",
	onClick: function(){ 
stu();
	} },
	    { text: "教职工", 
	onClick: function(){ 
tea();
	} },  
	{ text: "访客", className: "default",
	onClick: function(){ 
gue();
	} },
  ]
});}
		function stu()
{
$.login({
  title: '解绑',
  text: '填写绑定时的学号与教务密码',
  username: '',  // 默认用户名
  password: '',  // 默认密码
  onOK: function (username, password) {
  	$.showLoading("加载数据...");

           $.ajax({
                url: '<?php echo $arrInfo['url'];?>/home/zijbdo/stu',
                dataType: 'json',
                type: 'POST',
				data:"&username="+username+"&password="+password,
				async:true,
				timeout : 5000,
                success: function (data) {
				$.hideLoading();
    if(data.isok=='0'){
 console.log(data);
 $.toast(data.msg,"cancel");
                        }else if(data.isok=='2'){
 console.log(data);
 $.toast(data.msg,"forbidden");
                        }else if(data.isok=='1'){
						$.toast(data.msg);
	$.confirm({
  title: '开始绑定',
  text: '即将开始绑定',
  onOK: function () {
window.location.href="<?php echo $arrInfo['url'];?>/home/login/1";
  },
  onCancel: function () {
    $.toast("取消", "cancel");
  }
});
	}
                 
                },
                error : function(e) {

				$.hideLoading();
                   $.toast("网络故障","forbidden"); 
					//window.location.href=location.href;
                }
            });
  },
  onCancel: function () {
    //点击取消
  }
});
}
   
 		function tea()
{
$.prompt({
  title: '解绑',
  text: '请输入您的姓名',
  input: '',
  empty: false, // 是否允许为空
  onOK: function (password) {
$.prompt({
  title: '解绑',
  text: '请输入您的工号',
  input: '',
  empty: false, // 是否允许为空
  onOK: function (username) {
  $.prompt({
  title: '解绑',
  text: '请输入您的手机号',
  input: '',
  empty: false, // 是否允许为空
  onOK: function (m) {
  	$.showLoading("加载数据...");

           $.ajax({
                url: '<?php echo $arrInfo['url'];?>/home/zijbdo/tea',
                dataType: 'json',
                type: 'POST',
				data:"&username="+username+"&password="+password+"&m="+m,
				async:true,
				timeout : 5000,
                success: function (data) {
				$.hideLoading();
    if(data.isok=='0'){
 console.log(data);
 $.toast(data.msg,"cancel");
                        }else if(data.isok=='2'){
 console.log(data);
 $.toast(data.msg,"forbidden");
                        }else if(data.isok=='1'){
						$.toast(data.msg);
	$.confirm({
  title: '开始绑定',
  text: '即将开始绑定',
  onOK: function () {
window.location.href="<?php echo $arrInfo['url'];?>/home/login/1";
  },
  onCancel: function () {
    $.toast("取消", "cancel");
  }
});
	}
                 
                },
                error : function(e) {

				$.hideLoading();
                   $.toast("网络故障","forbidden"); 
					//window.location.href=location.href;
                }
            });  },
  onCancel: function () {
    //点击取消
  }
});
  },
 
  
  onCancel: function () {
    //点击取消
  }
});
  },
  onCancel: function () {
    //点击取消
  }
});

}
 		function gue()
{
$.prompt({
  title: '解绑',
  text: '请输入您的姓名',
  input: '',
  empty: false, // 是否允许为空
  onOK: function (password) {
$.prompt({
  title: '解绑',
  text: '请输入您的手机',
  input: '',
  empty: false, // 是否允许为空
  onOK: function (username) {

  	$.showLoading("加载数据...");

           $.ajax({
                url: '<?php echo $arrInfo['url'];?>/home/zijbdo/gue',
                dataType: 'json',
                type: 'POST',
				data:"&username="+username+"&password="+password,
				async:true,
				timeout : 5000,
                success: function (data) {
				$.hideLoading();
    if(data.isok=='0'){
 console.log(data);
 $.toast(data.msg,"cancel");
                        }else if(data.isok=='2'){
 console.log(data);
 $.toast(data.msg,"forbidden");
                        }else if(data.isok=='1'){
						$.toast(data.msg);
	$.confirm({
  title: '开始绑定',
  text: '即将开始绑定',
  onOK: function () {
window.location.href="<?php echo $arrInfo['url'];?>/home/login/1";
  },
  onCancel: function () {
    $.toast("取消", "cancel");
  }
});
	}
                 
                },
                error : function(e) {

				$.hideLoading();
                   $.toast("网络故障","forbidden"); 
					//window.location.href=location.href;
                }
            });  },
  onCancel: function () {
    //点击取消
  }
});
  },
 
  
  onCancel: function () {
    //点击取消
  }
});
  }
   
   </script>
<title>自助解绑</title>
</script>
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
  <div class="weui_icon_area"><i class="weui_icon_success weui_icon_msg"></i></div>
  <div class="weui_text_area">
    <h2 class="weui_msg_title">欢迎使用自助解绑</h2>
    <p class="weui_msg_desc">如果您更换了微信或QQ账号而无法绑定身份<br>则需要自助解绑以便重新绑定<br>本操作将解除在小薇平台的<?php if(!empty($bdname)) { ?><font color='red'><?php echo $bdname;?></font><?php } ?>绑定关系<br>请谨慎操作</p>
  </div>
  <div class="weui_opr_area">
    <p class="weui_btn_area">
      <a onClick='return confirm1();' class="weui_btn weui_btn_primary">开始解绑</a>
      <a onclick='$.alert("忘记密码请联系教务秘书。无法解绑请联系QQ:970127005或在公众号留言", "人工解绑");' class="weui_btn weui_btn_default">忘记资料</a>
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

<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
</body>
</html>