<?php defined('ZRoot') or die('Access Denied.'); ?><?php $arrInfo['cdnurl']=$arrInfo['url'];?>
<?php if($LId==1) { ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>未绑定用户教务评课-<?php echo $arrInfo['name'];?></title>
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
.weui_input {
    text-align: center;
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
	<?php if($isstop==0||@$_SESSION['zid'][nobd]!='1') { ?>		

        $.modal({
  title: "提示",
  text: "您并非未绑定用户<br>本页面为未绑定用户进行教务评课所用<br>您可以选择重新绑定或退出此页面",
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
 loading();
      $(".ZY_input").select({
        title: "评价",
		items: ["优秀", "良好", "中等", "及格", "不及格"],

        onChange: function(d) {

     
        },
        onClose: function() {
      
        },
         onOpen: function(d) {

        },
      }); 	
		<?php } ?>

	

 
						});

</script>	
        <script>
		var classnum=0;
		var totalnum=1;
		var classdata;
			 function saveclass() {
	
	 $.showLoading("完成中");
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/pingk/doi/save",
		data:"jid="+classnum+"&w1="+$("#w1").val()+"&w2="+$("#w2").val()+"&w3="+$("#w3").val()+"&w4="+$("#w4").val()+"&w5="+$("#w5").val(),
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   	$.hideLoading();
	if(result.type!='ok'){

	$.toast(result.msg, "forbidden");
				 setTimeout(function() {
				 


        }, 500)
	}
	

	if(result.type=='ok'){



$.toast("评课完成");
				 setTimeout(function() {
				  $("#s1").hide();
				   $("#s11").hide();
				   		   $("#s12").hide();
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
		
			 function postclass() {
	
	 $.showLoading("提交中");
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/pingk/doi/postjw",
		data:"jid="+classnum+"&w1="+$("#w1").val()+"&w2="+$("#w2").val()+"&w3="+$("#w3").val()+"&w4="+$("#w4").val()+"&w5="+$("#w5").val(),
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   	$.hideLoading();
	if(result.type!='ok'&&result.type!='okok'){

	$.toast(result.msg, "forbidden");
				 setTimeout(function() {
				 


        }, 500)
	}
				if(result.type=='okok'){
			$.alert("所有课程已评价,即将保存", "提示", function() {
 saveclass();
});

			}

	if(result.type=='ok'){

	 $("#loadingjwb").hide();

if(classnum+1<totalnum)classnum++;
$("#pkn").text(classnum+1);
if(result.text[0]==classdata[classnum]){
$("#w1").attr("value",result.text[1]);
$("#w2").attr("value",result.text[2]);
$("#w3").attr("value",result.text[3]);
$("#w4").attr("value",result.text[4]);
$("#w5").attr("value",result.text[5]);
}
$("#teachername").text(result.msg);
$("#classname").text(classdata[classnum]);

				 setTimeout(function() {

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
	 
		 function loadingclass() {
	
	 $.showLoading();
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/pingk/doi/readjw",
		data:"jid="+classnum,
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   	$.hideLoading();
	if(result.type!='ok'&&result.type!='okok'){

	$.toast(result.msg, "forbidden");
				 setTimeout(function() {
				 
          $("#loadingjwb").show();

        }, 500)
	}
			if(result.type=='okok'){
			$.alert("所有课程已评价,即将保存", "提示", function() {
 saveclass();
});

			}

	if(result.type=='ok'){
	$.toast("成功");
	 $("#loadingjwb").hide();
$("#teachername").text(result.msg);
$("#classname").text(classdata[classnum]);
$("#pkn").text(classnum+1);
if(result.text[0]==classdata[classnum]){
$("#w1").attr("value",result.text[1]);
$("#w2").attr("value",result.text[2]);
$("#w3").attr("value",result.text[3]);
$("#w4").attr("value",result.text[4]);
$("#w5").attr("value",result.text[5]);

}
				 setTimeout(function() {

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
		   	 function loadingjw() {
		$.hideLoading();
	 $.showLoading("加载评课数据");
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/pingk/doi/jw",
		data:"0",
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   
	if(result.type!='ok'){
		$.hideLoading();
				if(result.msg=='没有评课项目'){
			$.alert("没有评课项目<br>即将退出", "提示", function() {
backxw();
});

			}if(result.msg!='没有评课项目'){
				$.hideLoading();
	$.toast(result.msg, "forbidden");
				 setTimeout(function() {
				 
          $("#loadingjwb").show();

        }, 500)
	}
		}

	if(result.type=='ok'){

	 $("#loadingjwb").hide();

totalnum=result.msg;
$("#pknum").text(totalnum);
$("#pkn").text(classnum+1);

$("#loadingjwb").hide();
$("#showjw").show();
classdata=result.text;
$("#classname").text(classdata[classnum]);
loadingclass();
       
	}
		},
		error:function(result){
 $.hideLoading();
	$.toast("网络故障", "forbidden");
				 setTimeout(function() {
                 $("#loadingjwb").show();

        }, 1000)
	}

		
	});
		 }
      

	   	 function loading() {
	
	 $.showLoading();
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/pingk/doi/loading",
		data:"0",
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   	$.hideLoading();
	if(result.type!='ok'){

	$.toast(result.msg, "forbidden");
				 setTimeout(function() {
				 
          
        }, 500)
	}
		

	if(result.type=='ok'){
	$.toast(result.msg);
	 
	    $("#zycode_img2").attr("src",'<?php echo $arrInfo['url'];?>/code/'+Math.random());


				 setTimeout(function() {
 	$("#s1").hide();
				 

$("#s12").show();
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

		 function login2() {
					          if($("#name").val()=="") {
	
               $.alert("账号为空请检查绑定", "警告", function() {
$("#name").focus();

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
		url:"<?php echo $arrInfo['url'];?>/pingk/doi/login",
		data:"&yanzm="+$("#yzmm").val(),
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   	$.hideLoading();
	if(result.type!='ok'){

	$.toast(result.msg, "forbidden");
	
				 setTimeout(function() {
				if(result.msg=='验证码错误')
	{
	 $("#yzmm").val("");
    $("#zycode_img").attr("src",'<?php echo $arrInfo['url'];?>/code/'+Math.random());}
		   if(result.msg=='用户名或者密码错误'||result.msg=='密码错误'){
					$("#zycode_img2").attr("src",'<?php echo $arrInfo['url'];?>/code/'+Math.random());
$("#s11").hide();
$("#s12").show();
			}

        }, 1000)
	}
	if(result.type=='ok'){
	$.toast(result.msg);
				 setTimeout(function() {
$("#s12").hide();

$("#s11").hide();
$("#s2").show();
loadingjw();
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
	     if($("#name2").val()=="") {
	
               $.alert("账号为空请检查绑定", "警告", function() {
$("#name2").focus();

});                
     return;       
           }
	        if($("#pass2").val()==""){
               $.alert("密码为空", "警告", function() {
$("#pass2").focus();

});                    
    return;          
         } 
		        if($("#yzmm2").val()==""){
               $.alert("验证码为空", "警告", function() {
$("#yzmm2").focus();

});                    
    return;          
         } 
				$.showLoading();
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/pingk/doi/login",
		data:"&number="+$("#name2").val()+"&pass="+$("#pass2").val()+"&yanzm="+$("#yzmm2").val(),
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   	$.hideLoading();
	if(result.type!='ok'){

	$.toast(result.msg, "forbidden");
	
				 setTimeout(function() {
				if(result.msg=='验证码错误')
	{
	 $("#yzmm2").val("");
    $("#zycode_img2").attr("src",'<?php echo $arrInfo['url'];?>/code/'+Math.random());}
		   if(result.msg=='用户名或者密码错误'||result.msg=='密码错误'){
					$("#zycode_img2").attr("src",'<?php echo $arrInfo['url'];?>/code/'+Math.random());
	 $("#yzmm2").val("");
	 	 $("#pass2").val("");
			}

        }, 1000)
	}
	if(result.type=='ok'){
	$.toast(result.msg);
				 setTimeout(function() {
$("#s12").hide();

$("#s11").hide();
$("#s2").show();loadingjw();

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
				 
     function backxw(){
	$.showLoading("正在跳转");
				 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>/home/";

        }, 1000)
	}
	     function clean(){

	$.showLoading("正在清除");
				 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/pingk/doi/clean",
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
            window.location.href="<?php echo $arrInfo['url'];?>/pingk/index";

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
                <h1>教务评课</h1>
            </div>
        </header>
        <article style="bottom: 0;">
	
		<div id='s1'>
		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">Welcome</div>
  <div class="weui_panel_bd">
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title">欢迎使用</h4>
      <p class="weui_media_desc"   style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;">
	  本页面将帮助您进行教务系统的课程评价<br>当前正在加载必要的数据<br></p>
    </div>
	
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title"></h4>
    </div>
  </div>
</div>
       
 

 
  <a href="javascript:;" id="loginA" onclick="loading()" class="weui_btn weui_btn_primary">初始化</a>
   <br>
	
   		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">说明</div>
  <div class="weui_panel_bd">

    <div class="weui_media_box weui_media_text">
    
      <p class="weui_media_desc" style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;">本页面将会在盐城师范学院教务系统(jwgl.yctu.edu.cn)进行评课。避免使用VPN登录教务系统的麻烦。</p>
    </div>

  </div>
</div>
    </div>
	<div id='s11' style='display:none'>
		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">Step1</div>
  <div class="weui_panel_bd">
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title">验证</h4>
      <p class="weui_media_desc"  style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;" >此步骤将验证您的教务密码<br><B>请输入验证码即可</B></p>
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
      <input class="weui_input" id="name" type="text" placeholder="请输入学号" disabled="disabled" value="<?php if(!empty($number)) { ?><?php echo $number;?><?php } ?>">
    </div>
  </div>
	
  <div class="weui_cell weui_vcode">
    <div class="weui_cell_hd"><label class="weui_label">验证码</label></div>
    <div class="weui_cell_bd weui_cell_primary">
<input class="weui_input" id="yzmm" type="text" placeholder="请输入验证码">    </div>
    <div class="weui_cell_ft">
      	<img  id="zycode_img" title="验证码" href="javascript:void(0)" onclick="document.getElementById('zycode_img').src='<?php echo $arrInfo['url'];?>/code/'+Math.random()"src="" align="absbottom" class="validate-code">

    </div>
  </div>
  <br>
  <a href="javascript:;" id="loginA" onclick="login2()" class="weui_btn weui_btn_primary">验证</a>
   		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">说明</div>
  <div class="weui_panel_bd">

    <div class="weui_media_box weui_media_text">
    
      <p class="weui_media_desc" style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;">本页面将会验证教务系统(jwgl.yctu.edu.cn)的密码。避免使用VPN登录的麻烦。</p>
    </div>
  </div>
</div>
    </div></div>

		<div id='s12' style='display:none'>
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
      <input class="weui_input" id="name2" type="text" placeholder="请输入账号">
    </div>
  </div>
		  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">密码</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" id="pass2"  maxlength="16" type="text" placeholder="请输入密码" ">
    </div>
  </div>
  <div class="weui_cell weui_vcode">
    <div class="weui_cell_hd"><label class="weui_label">验证码</label></div>
    <div class="weui_cell_bd weui_cell_primary">
<input class="weui_input" id="yzmm2" type="text" placeholder="请输入验证码">    </div>
    <div class="weui_cell_ft">
      	<img  id="zycode_img2" title="验证码" href="javascript:void(0)" onclick="document.getElementById('zycode_img2').src='<?php echo $arrInfo['url'];?>/code/'+Math.random()"src="" align="absbottom" class="validate-code">

    </div>
  </div>
  <br>
  <a href="javascript:;" id="loginA" onclick="login()" class="weui_btn weui_btn_primary">验证</a>
   		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">说明</div>
  <div class="weui_panel_bd">

    <div class="weui_media_box weui_media_text">
    
      <p class="weui_media_desc" style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;">本页面将会验证教务系统(jwgl.yctu.edu.cn)的密码,并同步至小薇平台。避免使用VPN登录的麻烦。</p>
    </div>
  </div>
</div>
    </div></div></div>
		<div id='s2' style='display:none'>
		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">Step2</div>
  <div class="weui_panel_bd">
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title">评课课程:<span id='pkn'>1</span>/<span id='pknum'>1</span></h4>    </div>
	  <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title"><b id="classname"></b></h4>
      <p  class="weui_media_desc"><b id="teachername"></b></p>
    </div>
  </div>
</div>

         <div class="weui_cells weui_cells_form">
		 <input type="hidden" id="ww1" value="" />
<input type="hidden" id="ww2" value="" />
<input type="hidden" id="ww3" value="" />
<input type="hidden" id="ww4" value="" />
<input type="hidden" id="ww5" value="" />
   <div class="weui_cell">
        <div class="weui_cell_hd"><label for="name" class="weui_label">内容熟谙</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input ZY_input" id="w1" type="text" value="优秀">
        </div>
      </div>
      <div class="weui_cell">
        <div class="weui_cell_hd"><label for="name" class="weui_label">重点突出</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input  ZY_input" id="w2" type="text" value="优秀">
        </div>
      </div>
	     <div class="weui_cell">
        <div class="weui_cell_hd"><label for="name" class="weui_label">启发思维</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input  ZY_input" id="w3" type="text" value="优秀">
        </div>
      </div>
	  	     <div class="weui_cell">
        <div class="weui_cell_hd"><label for="name" class="weui_label">条理清楚</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input  ZY_input" id="w4" type="text" value="优秀">
        </div>
      </div>	     <div class="weui_cell">
        <div class="weui_cell_hd"><label for="name" class="weui_label">语言生动</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input  ZY_input" id="w5" type="text" value="优秀">
        </div>
      </div> 
 
 <br>
  <a href="javascript:;" id="loginA" onclick="postclass()" class="weui_btn weui_btn_primary">提交</a>
  <br>
    <a href="javascript:;" id="loadingjwb" onclick="loadingjw()" class="weui_btn weui_btn_plain_default">加载评课数据</a>

   		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">说明</div>
  <div class="weui_panel_bd">

    <div class="weui_media_box weui_media_text">
    
      <p class="weui_media_desc" style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;">本页面将会在教务系统(jwgl.yctu.edu.cn)评课。避免使用VPN登录的麻烦。</p>
    </div>
  </div>
</div>
    </div></div>
		<div id='s3' <?php if(EMPTY($step)||$step!=3) { ?>style='display:none'<?php } ?>>
		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">Step3</div>
  <div class="weui_panel_bd">
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title">评课成功</h4>
      <p class="weui_media_desc"  style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;">所有课程已成功评价<br>
感谢您的使用</p>
    </div>
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title"></h4>
    </div>
  </div>
</div>
         <div class="weui_cells weui_cells_form">


  <br>
  <a href="javascript:;" id="loginA" onclick="backxw()" class="weui_btn weui_btn_primary">进入小薇平台</a>

    </div></div>
   </article>
	
		<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>        <footer>
           
        </footer>
<?php } ?>		
</html>