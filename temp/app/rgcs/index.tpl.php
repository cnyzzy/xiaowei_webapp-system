<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>人格测试</title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
		<style>

		.weui_input{

    text-align: center;
    border-right: solid 1px #f5f0f0;
}
#ie{background:#000;border:1px solid #CCC;height:900px;}
#ie-body{color:#ccc;font-family:'Microsoft YaHei',arial,serif,Geneva,sans-serif;font-size:30px;opacity:0.5;text-align:center;}
#ie-body p:hover{color:#fff;opacity:1;}
.titlebar.reverse {
    background-color: #1d1e72;
    border-color: #36acf4;
}
.weui_btn_primary {
    background: #1d1e72;
    width: 95%;
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
		<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script> 
		<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/kcb/model/js/mui.min.js"></script>
		 <script>
						$(document).ready(function() {
						
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/rgcs/doloading",
		data:"&name=zy",
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   
	if(result.type!='ok'){
	$.hideLoading();
	
	}

		},
		error:function(result){
 $.hideLoading();


	}

		
	});
  
  <?php if(!empty($signPackage)) { ?>	
  wx.config({
    appId: "<?php echo $signPackage['appId'];?>",
    timestamp: "<?php echo $signPackage['timestamp'];?>",
    nonceStr: "<?php echo $signPackage['nonceStr'];?>",
    signature: "<?php echo $signPackage['signature'];?>",
    jsApiList: [
      'onMenuShareTimeline',
	  'onMenuShareAppMessage',
'onMenuShareQQ',
'onMenuShareWeibo',
'onMenuShareQZone'
    ]
  });
  wx.ready(function () {
     
  
  });
  <?php } ?>
	<?php if($isstop==1) { ?>		 
      $.modal({
  title: "提示",
  text: "未进行微信验证<br>微信验证后 您可以多次查看测试结果<br>点击【微信验证】在电脑端使用微信扫码验证<br>点击【手机打开】在手机微信端扫码直接参与测试<br>点击【直接开始】立刻进入测试 只查看一次结果",
  buttons: [
    { text: "直接开始", className: "default",
	onClick: function(){ 
	  $.showLoading("请稍后");
			 setTimeout(function() {
           	$.hideLoading();

        }, 800)	
	} },
   <?php if($ismobile==0) { ?> { text: "微信验证", 
	onClick: function(){
		  $.showLoading("正在加载","cancel");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>/rgcs/pcwx";
        }, 800)	
	} },<?php } ?>
	  { text: "手机打开", 
	onClick: function(){
		  $.showLoading("请稍后","cancel");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>/rgcs/noh";
        }, 800)	
	} },
  ]
});	
		<?php } ?>




 
						});

</script>	
        <script>
	
	 function login() {
	
		        if($("#gonghao").val()==""){
               $.alert("工号为空", "警告", function() {
$("#gonghao").focus();

});                    
    return;          
         } 
		 	        if($("#nl").val()==""){
               $.alert("年龄为空", "警告", function() {
$("#nl").focus();

});                    
    return;          
         }
 	        if($("#jz").val()==""){
               $.alert("警种为空", "警告", function() {
$("#jz").focus();

});                    
    return;          
         } 		
 	        if($("#xb").val()==""){
               $.alert("性别为空", "警告", function() {
$("#xb").focus();

});                    
    return;          
         } 	
  if($("#rzny").val()==""){
               $.alert("入职年月为空", "警告", function() {
$("#rzny").focus();

});                    
    return;          
         } 		 
				$.showLoading();
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/rgcs/logindo/zy",
		data:$('#form1').serialize(),
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
            window.location.href="<?php echo $arrInfo['url'];?>/rgcs/wenjuan";

        }, 800)
	}
		},
		error:function(result){
 $.hideLoading();
	$.toast("网络故障", "forbidden");
		
	}

		
	});
	}
						 
     function backxw(){
	$.showLoading("正在跳转");
				 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>/home/loading/<?php echo $number;?>";

        }, 1000)
	}
         </script>
	   </head>
    <body>

	<!--[if lt IE 9]> <script src="<?php echo $arrInfo['url'];?>/app/rgcs/model/js/html5.js"></script><![endif]-->

<!--[if lt IE 9]>
<style type="text/css">
#container{display:none;} //隐藏页面其他元素
#ie{display:block;}     //对IE显示特定模块
</style>
<div id="ie">
  <div id="ie-body">
      <p><br /><br /><br />正在访问人格测试页面</p>
      <p>您正在使用一个落后的浏览器浏览网页</p>
      <p>页面无法在 IE 9 及以下版本的 IE 系列浏览器中正常访问。</p>
      <p>为了获得更好的浏览体验, 请升级到更高级的浏览器</p>
      <p>请使用360浏览器-极速模式等以Chrome为核心的浏览器或使用手机访问</p>
      <p>本站推荐使用以下浏览器：Firefox, Chrome, Opera, Safari </p>
      <p><br>Copyright &copy; 2018. ZY . All Rights Reserved.</p>
  </div>
</div>
<![endif]-->
        <header>
		
         <div class="titlebar reverse">
            
                <h1>人格测试</h1>
            </div>
        </header>
        <article style="bottom: 0;">

		<div id='s1'>
		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">测试</div>
  <div class="weui_panel_bd">
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title">指导语</h4>
      <p class="weui_media_desc"  style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;">
	  这份测试可以帮助你更好的了解自己，并有助于你对自己的人生做出更加合理的安排。</br>
测试包含了144道2选1的题目。在此测试中，答案没有正确与错误之分，它反映的只是你的个性和你的世界观。</br>
请仔细阅读每一道题中的两个选项，并根据你自己的行为习惯和自然偏好做出选择。</br>
在答题时，可能你觉得两个选项都不适合你，或两个选项都适合你。无论哪种情况，请选择其中你最倾向的答案。如果漏选或多选，将影响你的测试结果。
<br>
<br>
特别说明：本测试使用量表是专业量表，仅供专业人士使用或参考，可以为被试提供测试后咨询服务。
</p>
    </div>

  </div>
</div>
       <form id='form1'>   <div class="weui_cells weui_cells_form">   <div class="weui_media_box weui_media_text">
		       <h4 class="weui_media_title">基本信息</h4>
</div>
  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">工号</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" name="gonghao" id="gonghao" type="text" placeholder="请输入工号" value="<?php if(!empty($_SESSION['csxx']['gonghao'])) { ?><?php echo $_SESSION['csxx']['gonghao'];?><?php } ?>">
    </div>
  </div>
    <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">性别</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" name="xingbie" id='xb' type="text" placeholder="请选择性别" value="<?php if(!empty($_SESSION['csxx']['xingbie'])) { ?><?php echo $_SESSION['csxx']['xingbie'];?><?php } ?>">
    </div>
  </div>
		  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">年龄</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" name="nianling" id='nl' type="text" placeholder="请选择年龄" value="<?php if(!empty($_SESSION['csxx']['nianling'])) { ?><?php echo $_SESSION['csxx']['nianling'];?><?php } ?>">
    </div>
  </div>
  	  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">警种</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" name="jz" id='jz' type="text" placeholder="请选择警种" value="<?php if(!empty($_SESSION['csxx']['jz'])) { ?><?php echo $_SESSION['csxx']['jz'];?><?php } ?>">
    </div>
  </div>
  	  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">入职年月</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" name="rzny" id='rzny' type="text" placeholder="请选择年月" value="<?php if(!empty($_SESSION['csxx']['rzny'])) { ?><?php echo $_SESSION['csxx']['rzny'];?><?php } ?>">
    </div>
  </div>

  <br>
  <a href="javascript:;" id="loginA" onclick="login()" class="weui_btn weui_btn_primary">开始测试</a>
   		<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">说明</div>
  <div class="weui_panel_bd">

    <div class="weui_media_box weui_media_text">
    
      <p class="weui_media_desc" style="overflow: inherit;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: inherit;-webkit-line-clamp: 3; word-wrap: break-word;">本页面推荐使用微信客户端访问，也可以使用电脑访问。<br>但浏览器应当使用非IE系列浏览器<br>如360浏览器-极速模式等以Chrome为核心的浏览器</p>
    </div>
  </div>
</div>
    </div></form></div>
   </article>
	<script>
$("#xb").picker({
  title: "请选择您的性别",
  cols: [
    {
      textAlign: 'center',
      values: ['男', '女']
    }
  ]
});
$("#nl").picker({
  title: "请选择您的年龄",
  cols: [
    {
      textAlign: 'center',
      values: [<?php for($i=16;$i<110;$i++) {?>'<?php echo $i;?>',<?php } ?>]
    }
  ]
});

$("#jz").picker({
  title: "请选择您的警种",
  cols: [
    {
      textAlign: 'center',
      values: ['户籍','交通','巡逻','网络','禁毒','督查','专业技术','法医','特种','治安','消防','刑事','司法','铁路','港务','航运','森林','经济','外事','边防','武装','劳改、劳教']
    }
  ]
});
  $("#rzny").picker({
  title: "请选择您的入职日期",
  cols: [
    {
      textAlign: 'center',
      values: [<?php for($i=2018;$i>1949;$i--) {?>'<?php echo $i;?>',<?php } ?>]
      //如果你希望显示文案和实际值不同，可以在这里加一个displayValues: [.....]
    },
	 {
      textAlign: 'center',
      values: ['-'],
    displayValues: ['年'],
    },
    {
      textAlign: 'center',
      values: ['01','02','03','04','05','06','07','08','09','10','11','12'],
	    displayValues: ['1','2','3','4','5','6','7','8','9','10','11','12'],
    },{
      textAlign: 'center',
      values: [''],
    displayValues: ['月'],
    },
    
  ]
});
</script>
		<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>        <footer>
           
        </footer>
		
</html>