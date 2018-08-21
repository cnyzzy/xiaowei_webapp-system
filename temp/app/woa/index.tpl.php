<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>OA登录-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/xunjia_detail.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style.css">
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
  $.toast("非教职工<br>不可使用","cancel");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>";
        }, 2500)	
		<?php } ?>
<?php if($islogin==1) { ?>
       //window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/oa";
<?php } ?>
<?php if($islogin==2) { ?>
       relogin();
	   	 function relogin() {
		 $.showLoading();
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/woa/do/relogin",
		data:"&name="+$("#name").val(),
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   	$.hideLoading();
	if(result.type!='ok'){

	$.toast(result.msg, "forbidden");
				 setTimeout(function() {
          window.location.reload(true);
        }, 1000)
	}
	if(result.type=='ok'){
	$.toast(result.msg);
				 setTimeout(function() {
        window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/oa";
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
	

 
						});

</script>	
        <script>
		
		 function login() {
					          if($("#name").val()=="") {
	
               $.alert("账号为空", "警告", function() {
$("#name").focus();

});                
     return;       
           }
       if($("#pass").val()==""){
               $.alert("密码为空", "警告", function() {
$("#pass").focus();

});                    
    return;          
         } 
				$.showLoading();
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/woa/do/login",
		data:"&user="+$("#name").val()+"&pass="+$("#pass").val(),
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   	$.hideLoading();
	if(result.type!='ok'){

	$.toast(result.msg, "forbidden");
				 setTimeout(function() {
          window.location.reload(true);
        }, 1000)
	}
	if(result.type=='ok'){
	$.toast(result.msg);
				 setTimeout(function() {
        window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/oa";
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
							 
     
         </script>
	   </head>
    <body>
        <header>
		
         <div class="titlebar reverse">
             <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>OA登录</h1>
            </div>
        </header>
        <article style="bottom: 0;">
         <div class="weui_cells weui_cells_form">
  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">账户</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" id="name" type="text" placeholder="请输入账号" value="<?php if(!empty($arr['user'])) { ?><?php echo $arr['user'];?><?php } ?>">
    </div>
  </div>
		  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">密码</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" id="pass" type="password" placeholder="请输入密码"value="<?php if(!empty($arr['pass'])) { ?><?php echo $arr['pass'];?><?php } ?>">
    </div>
  </div>	
  <a href="javascript:;" id="loginA" onclick="login()" class="weui_btn weui_btn_primary">登录</a>
    </div>
	
   </article>
	
		<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>        <footer>
           
        </footer>
		
</html>