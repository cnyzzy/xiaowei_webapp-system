<?php defined('ZRoot') or die('Access Denied.'); ?><?php if($LId==1) { ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>教务密码修改-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/xunjia_detail.css"/>
		<style>
		.weui_label {

    text-align: center;
    border-right: solid 1px #f5f0f0;
}
</style>
		    <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
									<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>	
		<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/kcb/model/js/mui.min.js"></script>
		 <script>
						$(document).ready(function() {
	<?php if($isstop==1) { ?>		 
  $.toast("仅学生用户可用","cancel");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>";
        }, 2500)	
		<?php } ?>
<?php if($islogin==1) { ?>
       //window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/oa";
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
		url:"<?php echo $arrInfo['url'];?>/home/chpass/change",
		data:"&pass="+$("#Npass").val()+"&pass2="+$("#Npass2").val(),
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   	$.hideLoading();
	if(result.type!='ok'){

	$.toast(result.msg, "forbidden");
				 setTimeout(function() {
				 
          if(result.msg=='验证码错误')window.location.reload(true);
        }, 1000)
	}
	if(result.type=='ok'){
	$.toast(result.msg);
	$("#newpass").val($("#Npass").val()),
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
         window.location.reload(true);
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
		url:"<?php echo $arrInfo['url'];?>/home/chpass/login",
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
         window.location.reload(true);
        }, 1000)
	}

		
	});
	}
		 function login() {
	
		        if($("#yzm").val()==""){
               $.alert("验证码为空", "警告", function() {
$("#yzm").focus();

});                    
    return;          
         } 
				$.showLoading();
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/home/chpass/login",
		data:"&yanzm="+$("#yzm").val(),
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   	$.hideLoading();
	if(result.type!='ok'){

	$.toast(result.msg, "forbidden");
				 setTimeout(function() {
				 
          if(result.msg=='验证码错误')window.location.reload(true);
		   if(result.msg=='用户名或者密码错误'||result.msg=='密码错误'){
					$("#zycode_img2").attr("src",'<?php echo $arrInfo['url'];?>/code/'+Math.random());
$("#s1").hide();
$("#s11").show();
			}
		  
		  
        }, 1000)
		   
      
	}
	if(result.type=='ok'){
	$.toast(result.msg);
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
         </script>
	   </head>
    <body>
        <header>
		
         <div class="titlebar reverse">
             <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>教务系统密码修改</h1>
            </div>
        </header>
        <article style="bottom: 0;">
		<?php if(EMPTY($step)) { ?>
		<div id='s1'>
		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">Step1</div>
  <div class="weui_panel_bd">
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title">身份验证</h4>
      <p class="weui_media_desc">此步骤将验证您的原密码是否正确</p>
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
      <input class="weui_input"  type="text" placeholder="请输入账号" disabled="disabled" value="<?php if(!empty($number)) { ?><?php echo $number;?><?php } ?>">
    </div>
  </div>
		  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">密码</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input"  type="text" placeholder="请输入密码" disabled="disabled" value="<?php if(!empty($pass)) { ?><?php echo $pass;?><?php } ?>">
    </div>
  </div>
  <div class="weui_cell weui_vcode">
    <div class="weui_cell_hd readcode"><label class="weui_label">验证码</label></div>
    <div class="weui_cell_bd weui_cell_primary">
<input class="weui_input" id="yzm" type="text" placeholder="请输入验证码">    </div>
    <div class="weui_cell_ft">
      	<img  id="zycode_img" title="验证码" href="javascript:void(0)" onclick="document.getElementById('zycode_img').src='<?php echo $arrInfo['url'];?>/code/'+Math.random()"src="<?php echo $arrInfo['url'];?>/code/+Math.random()" align="absbottom" class="validate-code">

    </div>
  </div>
  <br>
  <a href="javascript:;" id="loginA" onclick="login()" class="weui_btn weui_btn_primary">验证</a>
   		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">说明</div>
  <div class="weui_panel_bd">

    <div class="weui_media_box weui_media_text">
    
      <p class="weui_media_desc" style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;">本页面将会修改教务系统(jwgl.yctu.edu.cn)的密码,并同步至小薇平台。避免使用VPN修改以及再次绑定小薇平台的麻烦。</p>
    </div>
  </div>
</div>
    </div></div>
	<div id='s11' style='display:none'>
		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">Step1</div>
  <div class="weui_panel_bd">
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title">身份验证</h4>
      <p class="weui_media_desc">此步骤将验证您的当前密码<br><B>请输入您当前的教务密码</B></p>
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
      <input class="weui_input" id="name" type="text" placeholder="请输入账号" disabled="disabled" value="<?php if(!empty($number)) { ?><?php echo $number;?><?php } ?>">
    </div>
  </div>
		  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">密码</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" id="pass"  maxlength="16" type="text" placeholder="请输入密码" ">
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
    </div></div></div>
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
      <input class="weui_input" id="name" type="text" placeholder="请输入账号" disabled="disabled" value="<?php if(!empty($number)) { ?><?php echo $number;?><?php } ?>">
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
      <input class="weui_input" id="Npass"  maxlength="16" type="password" placeholder="请输入密码" >
    </div>
  </div>
	  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">确认密码</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" id="Npass2" maxlength="16" type="password" placeholder="请输入密码" >
    </div>
  </div>
 <br>
  <a href="javascript:;" id="loginA" onclick="relogin()" class="weui_btn weui_btn_primary">验证</a>
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
      <p class="weui_media_desc"  style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;">请牢记您的新密码<br>
小薇平台已同步新密码 请放心使用</p>
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
      <input class="weui_input" id="name" type="text" placeholder="请输入账号" disabled="disabled" value="<?php if(!empty($number)) { ?><?php echo $number;?><?php } ?>">
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
      <input class="weui_input" id="newpass"  maxlength="16" type="text" placeholder="请输入密码" disabled="disabled" >
    </div>
  </div>

  <br>
  <a href="javascript:;" id="loginA" onclick="backxw()" class="weui_btn weui_btn_primary">返回小薇平台</a>

    </div></div>
   </article>
	
		<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>        <footer>
           
        </footer>
<?php } ?>		
</html>