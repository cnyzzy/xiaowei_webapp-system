<?php defined('ZRoot') or die('Access Denied.'); ?><?php if($LId==1) { ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>教务系统数据更新</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/jquery-weui.min.css"/>
      <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/style.css">
<meta name="viewport" content="width=device-width,user-scalable=no" />    
  <script src='<?php echo $arrInfo['url'];?>/app/home/model/js/jquery.min.js'></script>
<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>  
    			<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>
</head>

<body>
    <div class="container">
    <div class="wrapper">
      <ul class="steps">
        <li<?php if(EMPTY($step)) { ?> class="is-active"<?php } ?>>Step 1</li>
        <li<?php if(@$step==2) { ?> class="is-active"<?php } ?>>Step 2</li>
        <li>Step 3</li>
      </ul>
      <form class="form-wrapper">
         <fieldset class="section<?php if(EMPTY($step)) { ?> is-active<?php } ?>"><div class="box">
          <h3>教务系统登录验证</h3>
		           <div class="sss">
<img  id="zycode_img" title="验证码" href="javascript:void(0)" onclick="document.getElementById('zycode_img').src='<?php echo $arrInfo['url'];?>/code/'+Math.random()"src="<?php echo $arrInfo['url'];?>/code/+Math.random()" align="absbottom" class="validate-code">
                    </div> <a href="javascript:readcode()" class="weui_btn weui_btn_mini weui_btn_primary">识别</a>

          <BR><input type="text" name="yzm" id="yzm" placeholder="验证码">

        <a href='javascript:login(document.F);'><div class="button">验证</div></a> </div>
        </fieldset>
        <fieldset class="section<?php if(@$step==2) { ?> is-active<?php } ?>"><div class="box">
          <h3>更新项目</h3>
          <div class="row cf">
            <div class="four col">
              <input type="checkbox" name="r1" id="r1" value="1" checked>
              <label for="r1">
                <h4>个人资料</h4>
              </label>
            </div>
            <div class="four col">
              <input type="checkbox" name="r1" id="r2" value="2" checked>
			  <label for="r2">
                <h4>课程信息</h4>
              </label>
            </div>
            <div class="four col">
              <input type="checkbox" name="r1" id="r3" value="3" checked>
			  <label for="r3">
                <h4>考试数据</h4>
              </label>
            </div>
          </div>
         <a href='javascript:check(document.F);'><div id="GOGOGO" class="button" <?php if(@$step	!=2) { ?>style= "display:none"<?php } ?>>开始同步</div></a>
		 <a href='<?php echo $arrInfo['url'];?>/home/update/1'><div id="GOGOGO2" class="butto" style= "display:none">返回</div></a></div>
        </fieldset>
        <fieldset class="section">
          <h3>同步数据</h3>
          <div class="weui_cells weui_cells_access">
		  <div id="sj1" class="weui_cell" style= "display:none" >
    <div class="weui_cell_bd weui_cell_primary">
            <img id="ssj1" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/loading.gif" alt="icon" style="width:32px;float:left">个人资料 <div id="sjj1" style="float:right">
      等待
    </div>
    </div>
   </div>
 <div id="sj2" class="weui_cell" style= "display:none" >

    <div class="weui_cell_bd weui_cell_primary">
            <img id="ssj2" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/loading.gif" alt="icon" style="width:32px;float:left">课程信息 <div id="sjj2" style="float:right">
      等待
    </div>
    </div>
   
  </div>
<div id="sj3" class="weui_cell" style= "display:none" >

    <div class="weui_cell_bd weui_cell_primary">
           <img id="ssj3" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/loading.gif" alt="icon" style="width:32px;float:left">考试数据 <div id="sjj3" style="float:right">
      等待
    </div>
    </div>
   
   </div>
</div>
           <a href='javascript:qqq(document.F);'><div  class="button" id="GOGOGOF"  style= "display:none">完成</div></a>
		    <a href='<?php echo $arrInfo['url'];?>/home/update/1'><div id="GOGOGO3" class="butto" style= "display:none">重试</div></a>
        </fieldset>
        <fieldset class="section">
		<div class="box">
          <h3>恭喜！</h3>
          <p>小薇平台已经完成数据的更新工作，请继续使用吧</p>
           <a href='<?php echo $arrInfo['url'];?>'><div class="button">OK</div></a></div>
        </fieldset>
      </form>
    </div>
  </div>

        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/index.js"></script>
		 <script>
		 var t1=0;
		 var t2=0;
		 var t3=0;
		 var re=0;
		 var pk=0;
		 			         function login() {
						

				$.showLoading("正在验证...");
							  setTimeout(function() {
         $.hideLoading();
        }, 800);
				 		 $.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/home/update/login",
		 async:true, 
		 timeout : 6000,
		 data:"&yanzm="+document.getElementById("yzm").value,
		
        success:function(result){ 
	
        re=result.replace(/[^0-9]/ig,"");
		
		$.hideLoading();
		if( re== '1'){$.toast("验证成功");document.getElementById("GOGOGO").style.display = "block";
			}else if( re== '0'){$.toast("无数据", "cancel");
			}else if( re== '2'){$.toast("用户名或密码错误", "cancel");
			}else if( re== '3'){$.toast("密码错误", "cancel");
			}else if( re== '4'){$.toast("验证码错误", "cancel");
			}else if( re== '5'){$.toast("系统忙", "cancel");
			}else if( re== '6'){$.toast("未知错误", "cancel");
			}else if( re== '7'){$.toast("理论不存在的错误", "cancel");
			}else if( re== '8'){$.toast("记录有误", "cancel");
			}else if( re== '9'){$.toast("取不到认证码", "cancel");
			}else if( re== '10'){$.toast("未进行教学质量评价", "cancel");
			}
			else{$.toast("未知态", "forbidden");}
        }, 
         error:function (result) {   
			$.toast("发生错误", "forbidden");
         }, 
  });
  					  setTimeout(function() {
       if(re!= '1'){ $.alert("验证未通过", function() {
 document.getElementById("GOGOGO2").style.display = "block";
});
      }  }, 4000);

		}
					
	
         
		 
			         function check(form) {
					
				$.showLoading("正在加载...");
							  setTimeout(function() {
         $.hideLoading();
		 sss();
        }, 800);
					 var v1=document.getElementsByName("r1");			 
					 if(v1[0].checked){t1=1; document.getElementById("sj1").style.display = "block";}
					 	 if(v1[1].checked){t2=1;document.getElementById("sj2").style.display = "block";}
						 	 if(v1[2].checked){t3=1;document.getElementById("sj3").style.display = "block";}
							 
						sss(t1,t2,t3);
        // document.F.submit();
		 return true; 
         }
		 function sss(t11,t22,t33){
		 if(t11==1){
		 		 $.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/home/do/aaa",
		 async:true, 
		 timeout : 5000,
		 data:"&isis=1",
		beforeSend:function(){ document.getElementById('sjj1').innerHTML = "同步中";},
        success:function(result){ 
      var re1=result.replace(/[^0-9]/ig,"");
	  	if( re1== '1'){	document.getElementById('sjj1').innerHTML = "已完成";}
		if(re1 == '3'){document.getElementById('sjj1').innerHTML = "勿频繁同步";}
		if( re1== '1'||re1== '3'){
		t1=0;
		 $("#r1").attr("checked",false);
				document.getElementById("ssj1").src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/yes.png";if($("#GOGOGOF")){   $("#GOGOGOF").show();  } 
			}	if(re1 == '5'){document.getElementById('sjj1').innerHTML = "未评课"; pk=2;}
				if(re1 == '6'){document.getElementById('sjj1').innerHTML = "无数据"; }
		if(re1 != '1'&&re1 != '3'&&re1 != '6'){ t1=2;document.getElementById("ssj1").src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/what.png";ppp();}
	

		if(re1 != '1'&&re1 != '3'&&re1 != '5'&&re1 != '6'){document.getElementById('sjj1').innerHTML = "未知态";}
        }, 
         error:function (result) {   
			document.getElementById('sjj1').innerHTML = "已失败"; t1=2;
			document.getElementById("ssj1").src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/no.png";ppp();
         }, 
  });}
  if(t22==1){
   $.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/home/do/bbb",
		 async:true, 
		 timeout : 5000,
		 data:"&isis=1",
		beforeSend:function(){ document.getElementById('sjj2').innerHTML = "同步中";},
        success:function(result){ 
         var re1=result.replace(/[^0-9]/ig,"");
	  	if( re1== '1'){	document.getElementById('sjj2').innerHTML = "已完成";}
		  	if( re1== '4'){	document.getElementById('sjj2').innerHTML = "未公布";}
		if(re1 == '3'){document.getElementById('sjj2').innerHTML = "勿频繁同步";}
		if( re1== '1'||re1== '3'||re1== '4'){
		t2=0; 
		 $("#r2").attr("checked",false);
				
				document.getElementById("ssj2").src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/yes.png";if($("#GOGOGOF")){   $("#GOGOGOF").show();  } 
				}
		if(re1 == '5'){document.getElementById('sjj2').innerHTML = "未评课"; pk=2;}
		if(re1 != '1'&&re1 != '3'&&re1 != '5'&&re1 != '4'){document.getElementById('sjj2').innerHTML = "未知态";}
				if(re1 != '1'&&re1 != '3'&&re1 != '4'){t2=2;document.getElementById("ssj2").src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/what.png";ppp();}

}, 
         error:function (result) {   
			document.getElementById('sjj2').innerHTML = "已失败"; t2=2;
			document.getElementById("ssj2").src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/no.png";ppp();
         }, 
  });
     $.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/home/do/ddd",
		 async:true, 
		 timeout : 5000,
		 data:"&isis=1",
        success:function(result){ 
     var re1=result.replace(/[^0-9]/ig,"");
	  	if( re1== '1'){	document.getElementById('sjj2').innerHTML = "已完成";}
		  	if( re1== '4'){	document.getElementById('sjj2').innerHTML = "未公布";}
		if(re1 == '3'){document.getElementById('sjj2').innerHTML = "勿频繁同步";}
		if( re1== '1'||re1== '3'||re1== '4'){
		t2=0; 
		 $("#r2").attr("checked",false);
		
				document.getElementById("ssj2").src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/yes.png";if($("#GOGOGOF")){   $("#GOGOGOF").show();  } 
				}
		if(re1 == '5'){document.getElementById('sjj2').innerHTML = "未评课"; pk=2;}
			if(re1 != '1'&&re1 != '3'&&re1 != '5'&&re1 != '4'){document.getElementById('sjj2').innerHTML = "未知态";}
					if(re1 != '1'&&re1 != '3'&&re1 != '4'){ t2=2;document.getElementById("ssj2").src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/what.png";ppp();}
}, 
         error:function (result) {   
			document.getElementById('sjj2').innerHTML = "已失败"; t2=2;
			document.getElementById("ssj2").src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/no.png";ppp();
         }, 
  });
  }if(t33==1){
   $.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/home/do/ccc",
		 async:true, 
		 data:"&isis=1",
		 timeout : 5000,
		beforeSend:function(){ document.getElementById('sjj3').innerHTML = "同步中";},
        success:function(result){ 
   
     var re1=result.replace(/[^0-9]/ig,"");
	  	if( re1== '1'){	document.getElementById('sjj3').innerHTML = "已完成";}
		  	if( re1== '4'){	document.getElementById('sjj3').innerHTML = "未公布";}
		if(re1 == '3'){document.getElementById('sjj3').innerHTML = "勿频繁同步";}
		if( re1== '1'||re1== '3'||re1== '4'){
		t3=0; 
		 $("#r3").attr("checked",false);
				
				document.getElementById("ssj3").src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/yes.png";if($("#GOGOGOF")){   $("#GOGOGOF").show();  } 
				}
		if(re1 == '5'){document.getElementById('sjj3').innerHTML = "未评课"; pk=2;}
		if(re1 != '1'&&re1 != '3'&&re1 != '5'&&re1 != '4'){document.getElementById('sjj3').innerHTML = "未知态";}
				if(re1 != '1'&&re1 != '3'&&re1 != '4'){ t3=2;document.getElementById("ssj3").src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/what.png";ppp();}

        }, 
         error:function (result) {   
			document.getElementById('sjj3').innerHTML = "已失败"; t3=2;
			document.getElementById("ssj3").src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/no.png";ppp();
         }, 
  });
       $.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/home/do/eee",
		 async:true, 
		 timeout : 5000,
		 data:"&isis=1",
        success:function(result){ 
       var re1=result.replace(/[^0-9]/ig,"");
	  	if( re1== '1'){	document.getElementById('sjj3').innerHTML = "已完成";}
		  	if( re1== '4'){	document.getElementById('sjj3').innerHTML = "未公布";}
		if(re1 == '3'){document.getElementById('sjj3').innerHTML = "勿频繁同步";}
		if( re1== '1'||re1== '3'||re1== '4'){
		t3=0; 
		 $("#r3").attr("checked",false);
				
				document.getElementById("ssj3").src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/yes.png";if($("#GOGOGOF")){   $("#GOGOGOF").show();  } 
				}
		if(re1 == '5'){document.getElementById('sjj3').innerHTML = "未评课"; pk=2;}
			if(re1 != '1'&&re1 != '3'&&re1 != '5'&&re1 != '4'){document.getElementById('sjj3').innerHTML = "未知态";}
				if(re1 != '1'&&re1 != '3'&&re1 != '4'){ t3=2;document.getElementById("ssj3").src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/what.png";ppp();}
        }, 
         error:function (result) {   
			document.getElementById('sjj3').innerHTML = "已失败"; t2=2;
			document.getElementById("ssj3").src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/no.png";ppp();
         }, 
  });
}}
function ppp(){

if((t1==2||t2==2||t3==2)){ 
 if($("#GOGOGO3")){   $("#GOGOGO3").show();  } 


 if($("#GOGOGOF")){  document.getElementById('GOGOGOF').innerHTML=" "; $("#GOGOGOF").hide(); $("#GOGOGOF").attr({id:"b"}); } 

}else{
 if($("#GOGOGOF")){   $("#GOGOGOF").show();  } 
   if($("#GOGOGO3")){   $("#GOGOGO3").hide();  }  
}
if(pk==2){
document.getElementById('sjj3').innerHTML = "未评课"; 
document.getElementById('sjj2').innerHTML = "未评课"; 
document.getElementById('sjj1').innerHTML = "未评课"; 
document.getElementById("ssj3").src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/no.png";
document.getElementById("ssj2").src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/no.png";
document.getElementById("ssj1").src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/no.png";
}
}
function qqq(){ 
              if(t1==2||t2==2||t3==2)sss(); 
};
  function readcode()
  {
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

$("#yzm").val(result.msg);

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
  }
</script>
</body>
</html>
<?php } ?>