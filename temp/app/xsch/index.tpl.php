<?php defined('ZRoot') or die('Access Denied.'); ?><?php $arrInfo['cdnurl']="http://wx.echo1.top";?>
<?php if($LId==1) { ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>新生教务密码修改-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['cdnurl'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['cdnurl'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['cdnurl'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['cdnurl'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['cdnurl'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['cdnurl'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['cdnurl'];?>/app/<?php echo $AppName;?>/model/css/pages/xunjia_detail.css"/>
		<style>
		.weui_label {

    text-align: center;
    border-right: solid 1px #f5f0f0;
}
</style>
		    <script src="<?php echo $arrInfo['cdnurl'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
									<script src="<?php echo $arrInfo['cdnurl'];?>/app/home/model/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>
        <script src="<?php echo $arrInfo['cdnurl'];?>/app/home/model/js/jquery-weui.js"></script>	
		<script type="text/javascript" src="<?php echo $arrInfo['cdnurl'];?>/app/kcb/model/js/mui.min.js"></script>
		 <script>
						$(document).ready(function() {
	<?php if($isstop==1) { ?>		 
        $.modal({
  title: "提示",
  text: "您已经绑定了实名身份<br>本页面只为新生修改默认密码所用<br>您可以选择重新绑定或退出此页面",
  buttons: [
    { text: "退出", className: "default",
	onClick: function(){ 
	  $.showLoading("即将退出...","cancel");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>";
        }, 800)	
	} },
    { text: "重新绑定", 
	onClick: function(){
		  $.showLoading("即将跳转...","cancel");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>/home/bdgl";
        }, 800)	
	} },
  ]
});	
<?php } else { ?>
       $.modal({
  title: "提示",
  text: "本页面为新生修改默认密码所用<br>如果您想绑定老生身份请选择退出<br>默认密码为身份证号",
  buttons: [
    { text: "退出", className: "default",
	onClick: function(){ 
	  $.showLoading("即将跳回...","cancel");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>";
        }, 800)	
	} },
    { text: "我是新生", 
	onClick: function(){
$.toast("欢迎使用");
	} },
  ]
});	
		<?php } ?>

	 $(".readcode").click(function() {
 $.showLoading("识别中");
 var that=$(this);
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/readcode",
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   	$.hideLoading();
	if(result.type=='no'){

	$.toast(result.msg, "cancel");

	}
		if(result.type=='error'){

	$.toast(result.msg, "forbidden");

	}

	if(result.type=='ok'){

that.next().children(".weui_input").val(result.msg);

$.toast("识别成功");

	}
		},
		error:function(result){
 $.hideLoading();
	$.toast("网络故障", "forbidden");
				 setTimeout(function() {
       
        }, 1000)
	}

		
	});
 });

 
						});

</script>	
        <script>
	
         //测试某个字符是属于哪一类. 
  function CharMode(iN) {
    if (iN >= 48 && iN <= 57) //数字 
      return 1;
    if (iN >= 65 && iN <= 90) //大写字母 
      return 2;
    if (iN >= 97 && iN <= 122) //小写 
      return 4;
    else
      return 8; //特殊字符 
  }
  //bitTotal函数 
  //计算出当前密码当中一共有多少种模式 
  function bitTotal(num) {
    var modes = 0;
    for (i = 0; i < 4; i++) {
      if (num & 1)
        modes++;
      num >>>= 1;
    }
    return modes;
  }
  //checkStrong函数 
  //返回密码的强度级别 
  function checkPasswdRate(sPW) {
    if (sPW.length < 6)
      return 0; //密码太短 
    var Modes = 0;
    for (i = 0; i < sPW.length; i++) {
      //测试每一个字符的类别并统计一共有多少种模式. 
      Modes |= CharMode(sPW.charCodeAt(i));
    }
    che=Modes;
    return bitTotal(Modes);
  }

	   	 function relogin() {
		
		   if($("#Npass2").val()=="") {
	
               $.alert("确认密码为空", "警告", function() {
$("#Npass2").focus();

});                
     return;       
           }
       if($("#Npass").val()==""){
               $.alert("密码为空", "警告", function() {
$("#Npass").focus();

});                    
    return;          
         } 
		       var obj=document.getElementById("Npass")
			       var obj1=document.getElementById("Npass2")
		

		 if (obj.value.length<6 || obj1.value.length<6){
$.alert("密码不能小于6位", "警告", function() {
$("#Npass").focus();

});                    
    return; 
			       }
					 if (obj.value.length>16 || obj1.value.length>16){
$.alert("密码不能大于16位", "警告", function() {
$("#Npass").focus();

});                    
    return; 
			       }       

		        if(checkPasswdRate($("#Npass").val())<2){
               $.alert("密码强度不够", "警告", function() {
$("#Npass").focus();

});                    
    return;          
         } 
		 		        if($("#Npass").val()=='<?php echo $number;?>'){
               $.alert("密码不能为学号", "警告", function() {
$("#Npass").focus();

});                    
    return;          
         } 
		 		 		        if($("#Npass").val()!=$("#Npass2").val()){
               $.alert("两次密码不同", "警告", function() {
$("#Npass").focus();

});                    
    return;          
         }
	 $.showLoading();
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/xsch/do/change",
		data:"&pass="+$("#Npass").val()+"&pass2="+$("#Npass2").val()+"&rname="+$("#uname").val()+"&rpass="+$("#pass").val()+"&number="+$("#cname").val(),
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   	$.hideLoading();
	if(result.type!='ok'&& result.msg!='原密码错误'){

	$.toast(result.msg, "forbidden");
				 setTimeout(function() {
				 
          if(result.msg=='验证码错误')window.location.reload(true);
        }, 1000)
	}
		if(result.type!='ok'&& result.msg=='原密码错误'){
			$("#newpass").val($("#Npass").val());
$("#s2").hide();

$("#s3").show();
		}

	if(result.type=='ok'){
	$.toast(result.msg);


	$("#newpass").val($("#Npass").val());
				 setTimeout(function() {
$("#s2").hide();

$("#s3").show();
        }, 1000)
	}
		},
		error:function(result){
 $.hideLoading();
	$.toast("网络故障", "forbidden");
				 setTimeout(function() {
       
        }, 1000)
	}

		
	});
		 }
	<?php if(empty($step)) { ?>
		 function login2() {
					          if($("#name").val()=="") {
	
               $.alert("账号为空请检查绑定", "警告", function() {
$("#name").focus();

});                
     return;       
           }
       if($("#pass").val()==""){
               $.alert("密码为空请检查绑定", "警告", function() {
$("#pass").focus();

});                    
    return;          
         } 
		        if($("#yzmm").val()==""){
               $.alert("验证码为空", "警告", function() {
$("#yzmm").focus();

});                    
    return;          
         } 
				$.showLoading();
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/xsch/do/login",
		data:"&number="+$("#name").val()+"&pass="+$("#pass").val()+"&yanzm="+$("#yzmm").val(),
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   	$.hideLoading();
	if(result.type!='ok'){

	$.toast(result.msg, "forbidden");
				 setTimeout(function() {
				 $("#pass").val("");
				  $("#yzmm").val("");
     					$("#zycode_img2").attr("src",'<?php echo $arrInfo['url'];?>/code/'+Math.random());

        }, 1000)
	}
	if(result.type=='ok'){
	$.toast(result.msg);
		if($("#uname").val()==result.text)$("#rname").val(result.text);
	if($("#uname").val()!=result.text&&$("#uname").val()!='')$("#rname").val($("#uname").val());
				 setTimeout(function() {
$("#s1").hide();
$("#s2").show();
$("#s11").hide();
        }, 1000)
	}
		},
		error:function(result){
 $.hideLoading();
	$.toast("网络故障", "forbidden");
				 setTimeout(function() {
        
        }, 1000)
	}

		
	});
	}
		 function login() {
	       if($("#jwnum").val()==""){
               $.alert("学号为空", "警告", function() {
$("#jwnum").focus();

});                    
    return;          
         } 
	
				$.showLoading("请稍后");
				 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/xsch/do/num",
		data:"&number="+$("#jwnum").val(),
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   	$.hideLoading();
	if(result.type!='ok'){

	$.toast(result.msg, "forbidden");
				 setTimeout(function() {
				$("#jwnum").val("");

        }, 1000)
	}
	if(result.type=='ok'){
	$.toast(result.msg);
	$("#name").val($("#jwnum").val());
	$("#cname").val($("#jwnum").val());
	$("#uname").val(result.text);
	$("#zycode_img2").attr("src",'<?php echo $arrInfo['url'];?>/code/'+Math.random());
				 setTimeout(function() {
$.hideLoading();
$("#s1").hide();
$("#s11").show();

		  
        }, 800)
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
		
		
	}
		<?php } ?>					 
     function backxw(){
	$.showLoading("正在跳转");
				 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>/home/loading/<?php echo $number;?>";

        }, 1000)
	}
	     function clean(){

	$.showLoading("正在清除");
				 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/xsch/do/clean",
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   	$.hideLoading();
	if(result.type!='ok'){

	$.toast(result.msg, "forbidden");

	}
	if(result.type=='ok'){
	$.toast(result.msg);
					 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>/xsch/index";

        }, 1000)
	}
		},
		error:function(result){
 $.hideLoading();
	$.toast("网络故障", "forbidden");
				 setTimeout(function() {

        }, 1000)
	}

		
	});

	}
         </script>
	   </head>
    <body>
        <header>
		
         <div class="titlebar reverse">
             <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>新生教务系统密码修改</h1>
            </div>
        </header>
        <article style="bottom: 0;">
		<?php if(EMPTY($step)) { ?>
		<div id='s1'>
		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">Welcome</div>
  <div class="weui_panel_bd">
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title">欢迎使用</h4>
      <p class="weui_media_desc"   style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;">
	  本页面将帮助您修改教务系统的默认密码<br>请准备好您的学号和默认密码<br></p>
    </div>
	
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title"></h4>
    </div>
  </div>
</div>
         <div class="weui_cells weui_cells_form">
  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">学号</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" ID='jwnum' type="text" placeholder="请输入学号">
    </div>
  </div> <br></div>
 

 
  <a href="javascript:;" id="loginA" onclick="login()" class="weui_btn weui_btn_primary">开始</a>
   <br>
	<div class="weui_cells weui_cells_access">
  <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/xscx">
    <div class="weui_cell_hd">
      <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/what.png" alt="icon" style="width:20px;margin-right:5px;display:block">
    </div>
    <div class="weui_cell_bd weui_cell_primary">
      <p>忘记学号</p>
    </div>
    <div class="weui_cell_ft">
      点击这里查询
    </div>
  </a>

</div>
   		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">说明</div>
  <div class="weui_panel_bd">

    <div class="weui_media_box weui_media_text">
    
      <p class="weui_media_desc" style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;">本页面将会修改盐城师范学院教务系统(jwgl.yctu.edu.cn)的密码,并同步绑定至小薇平台。避免使用VPN登录教务系统的麻烦。</p>
    </div>

	 <div class="weui_media_box weui_media_text">
    
      <p class="weui_media_desc" style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;"><b>小薇平台是什么?</b><br>小薇平台是言是传媒小薇工作室建设并管理的盐城师范学院官方微平台<br>平台支持QQ/微博/微信登录<br>提供成绩、课表、等级考试、办公电话、电费、男女生比例等十多种查询功能<br>提供学校主页、图书馆、校报、一卡通大厅、报修、全景图等多种便捷链接<br>开展步数排行榜、失物招领、十九大测试、活动选座、国家公祭等多种在线活动。</p>
    </div>
	 <div class="weui_media_box weui_media_text">
    
      <p class="weui_media_desc" style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;"><b>小薇工作室是什么?</b><br>言是传媒小薇工作室是隶属于学校党委宣传部的学生组织<br>负责学校官方微信公众号、微博、QQ智慧平台的运营和管理<br>欢迎加入我们</p>
    </div>
  </div>
</div>
    </div>
	<div id='s11' style='display:none'>
		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">Step1</div>
  <div class="weui_panel_bd">
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title">身份验证</h4>
      <p class="weui_media_desc"  style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;" >此步骤将验证您的默认密码<br><B>您当前的默认教务密码一般为身份证号</B><br></p>
    </div>
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title"></h4>
    </div>
  </div>
</div>
         <div class="weui_cells weui_cells_form">
  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">学号</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" id="name" type="text" placeholder="请输入学号"  value="">
    </div>
  </div>
		  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">密码</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" id="pass"  maxlength="19" type="text" placeholder="请输入密码" ">
    </div>
  </div>
  <div class="weui_cell weui_vcode">
    <div class="weui_cell_hd readcode"><label class="weui_label">验证码</label></div>
    <div class="weui_cell_bd weui_cell_primary">
<input class="weui_input" id="yzmm" type="text" placeholder="请输入验证码">    </div>
    <div class="weui_cell_ft">
      	<img  id="zycode_img2" title="验证码" href="javascript:void(0)" onclick="document.getElementById('zycode_img2').src='<?php echo $arrInfo['url'];?>/code/'+Math.random()"src="" align="absbottom" class="validate-code">

    </div>
  </div>
  <br>
  <a href="javascript:;" id="loginA" onclick="login2()" class="weui_btn weui_btn_primary">验证</a>
   		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">说明</div>
  <div class="weui_panel_bd">

    <div class="weui_media_box weui_media_text">
    
      <p class="weui_media_desc" style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;">本页面将会修改教务系统(jwgl.yctu.edu.cn)的密码,并同步至小薇平台。避免使用VPN修改以及再次绑定小薇平台的麻烦。</p>
    </div>
  </div>
</div>
    </div></div>
	<?php } ?>
	
		<div id='s2' <?php if(EMPTY($step)) { ?>style='display:none'<?php } ?>>
		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">Step2</div>
  <div class="weui_panel_bd">
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title">输入新密码</h4>
      <p class="weui_media_desc"  style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;">1.密码长度为6~16位，至少包含数字、字母、特殊符号中的两类，字母区分大小写<br>
2.密码不可与账号相同<br>
3.密码不可以与身份证号后几位相同</p>
    </div>
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title"></h4>
    </div>
  </div>
</div>
         <div class="weui_cells weui_cells_form">
  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">账户</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" id="cname" type="text" placeholder="请输入账号" disabled="disabled" value="<?php if(!empty($_SESSION['zid']['number'])) { ?><?php echo $_SESSION['zid']['number'];?><?php } ?>">
	   <input class="weui_input" id="rname" type="hidden" placeholder="请输入账号"  value="">

    </div>
  </div>
    <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">姓名</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" id="uname" type="text" placeholder="" disabled="disabled" value="<?php if(!empty($_SESSION['zid']['name'])) { ?><?php echo $_SESSION['zid']['name'];?><?php } ?>">
    </div>
  </div>
		  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">新密码</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" id="Npass"  maxlength="18" type="password" placeholder="请输入密码" >
    </div>
  </div>
	  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">确认密码</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" id="Npass2" maxlength="18" type="password" placeholder="请输入密码" >
    </div>
  </div>
 <br>
  <a href="javascript:;" id="loginA" onclick="relogin()" class="weui_btn weui_btn_primary">修改密码</a>
  <br>
    <a href="javascript:;" id="loginA" onclick="clean()" class="weui_btn weui_btn_plain_default">清除验证</a>

   		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">说明</div>
  <div class="weui_panel_bd">

    <div class="weui_media_box weui_media_text">
    
      <p class="weui_media_desc" style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;">本页面将会修改教务系统(jwgl.yctu.edu.cn)的密码,并同步至小薇平台。避免使用VPN修改以及再次绑定小薇平台的麻烦。</p>
    </div>
  </div>
</div>
    </div></div>
		<div id='s3' <?php if(EMPTY($step)||$step!=3) { ?>style='display:none'<?php } ?>>
		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">Step3</div>
  <div class="weui_panel_bd">
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title">修改成功</h4>
      <p class="weui_media_desc"  style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;">密码已成功修改<br>请牢记您的新密码<br>
小薇平台已同步新密码 欢迎使用</p>
    </div>
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title"></h4>
    </div>
  </div>
</div>
         <div class="weui_cells weui_cells_form">

		  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">新密码</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" id="newpass"  maxlength="18" type="text" placeholder="请输入密码" disabled="disabled" >
    </div>
  </div>

  <br>
  <a href="javascript:;" id="loginA" onclick="backxw()" class="weui_btn weui_btn_primary">进入小薇平台</a>

    </div></div>
   </article>
	
		<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>        <footer>
           
        </footer>
<?php } ?>		
</html>