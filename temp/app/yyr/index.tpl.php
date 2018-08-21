<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html><head>
	<meta charset="utf-8">
	<title>盐师|找朋友</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width,user-scalable=no">
	<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/styles/master.css">

        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
			<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>

			<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/fastclick.js"></script>
<script>
  $(function() {
  $.showLoading("正在加载");
    FastClick.attach(document.body);
  });
</script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>

		        <script>
			
 				<?php if($isstop==1) { ?>		
							$(document).ready(function() {
 			 setTimeout(function() {
         $.modal({
  title: "提示",
  text: "当前绑定的用户身份不能参与本活动<br>您可以选择重新绑定或退出活动",
  buttons: [
    { text: "取消", className: "default",
	onClick: function(){ 
	  $.showLoading("即将跳回...","cancel");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>";
        }, 800)	
	} },
    { text: "重新绑定", 
	onClick: function(){
		  $.showLoading("即将跳转...","cancel");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>/home/modify";
        }, 800)	
	} },
  ]
});
        }, 2600)	

		});
		<?php } ?>
		function tmcz()
{
$.prompt({
  title: '同名查询',
  text: '请输入您的姓名',
  input: '',
  empty: false, // 是否允许为空
  onOK: function (input) {
	$.showLoading("加载数据...");

           $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/tmcx',
                dataType: 'json',
                type: 'POST',
				data:"&post="+input,
				async:true,
				timeout : 5000,
                success: function (data) {
				$.hideLoading();
    if(data.type!='ok'){
 console.log(data);
 $.toast(data.msg,"cancel");
                        }else if(data.type=='ok'){
						$.toast("查询成功");
$("#showtitle").html("同名查询");
$("#show").html("");
     for(var o in data.msg){  
if(data.msg[o][1]&&data.msg[o][0]&&data.msg[o][2])
		$("#show").prepend('<div class="weui_cells"><a class="weui_cell" onClick="return detaild('+data.msg[o][1]+',1);"><div class="weui_cell_bd weui_cell_primary"> <p>'+data.msg[o][0]+'</p></div> <div class="weui_cell_ft" style="width:75%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">'+data.msg[o][2]+'</div></a></div>');
      }  
	  $("#about").popup();
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
    $.toast("查询取消", "cancel");
  }
});
}


	function detaild(id,type)
	{
		$.showLoading("加载个人数据...");

    

            $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/detaild',
                dataType: 'json',
                type: 'POST',
				data:"&post="+id+"&type="+type,
				async:true,
				timeout : 5000,
                success: function (data) {
				$.hideLoading();
    if(data.type!='ok'){
 console.log(data);
 $.toast(data.msg,"cancel");
                        }else if(data.type=='ok'){
			if(type=='1')	$.alert(data.msg[0]+","+data.msg[2]+",来自"+data.msg[3]+",<br>学院为"+data.msg[1],"详细资料" );
			if(type=='2')	$.alert(data.msg[0]+","+data.msg[2]+",学院为"+data.msg[1]+",<br>来自"+data.msg[5]+",<br>高中为"+data.msg[4],"详细资料" );
			if(type=='3')	$.alert(data.msg[0]+","+data.msg[2]+",学院为"+data.msg[1]+",<BR>来自"+data.msg[3]+",生日为"+data.msg[4],"详细资料" );
}
                 
                },
                error : function(e) {

				$.hideLoading();
                   $.toast("网络故障","forbidden"); 
					//window.location.href=location.href;
                }
            });
  
	}

	function txcz()
{
$.prompt({
  title: '同乡/同校查询',
  text: '请输入您的家乡或高中名称',
  input: '',
  empty: false, // 是否允许为空
  onOK: function (input) {
	$.showLoading("加载数据...");

           $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/txcx',
                dataType: 'json',
                type: 'POST',
				data:"&post="+input,
				async:true,
				timeout : 5000,
                success: function (data) {
				$.hideLoading();
    if(data.type!='ok'){
 console.log(data);
 $.toast(data.msg,"cancel");
                        }else if(data.type=='ok'){
						$.toast("查询成功");
$("#showtitle").html("同乡/同校查询");
$("#show").html("");
     for(var o in data.msg){  
if(data.msg[o][1]&&data.msg[o][0]&&data.msg[o][2])
		$("#show").prepend('<div class="weui_cells"><a class="weui_cell" onClick="return detaild('+data.msg[o][1]+',2);"><div class="weui_cell_bd weui_cell_primary"> <p>'+data.msg[o][0]+'</p></div> <div class="weui_cell_ft" style="width:80%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">'+data.msg[o][2]+'</div></a></div>');
      }  
	  $("#about").popup();
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
    $.toast("查询取消", "cancel");
  }
});
}

		function trcx()
{
$.prompt({
  title: '同日查询',
  text: '请输入您的生日(8位数字 如19970101)',
  input: '',
  empty: false, // 是否允许为空
  onOK: function (input) {
  
 if(input.toString().length!=8|| isNaN(input)){
$.toast("非生日信息", "forbidden");
return false;
}
$.showLoading("加载数据...");

           $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/cscx',
                dataType: 'json',
                type: 'POST',
				data:"&post="+input,
				async:false,
				timeout : 5000,
                success: function (data) {
				$.hideLoading();
    if(data.type!='ok'){
 console.log(data);
 $.toast(data.msg,"cancel");
                        }else if(data.type=='ok'){
						$.toast("查询成功");
$("#showtitle").html("同日出生查询");
$("#show").html("");
     for(var o in data.msg){  
if(data.msg[o][1]&&data.msg[o][0]&&data.msg[o][2])
		$("#show").prepend('<div class="weui_cells"><a class="weui_cell" onClick="return detaild('+data.msg[o][1]+',3);"><div class="weui_cell_bd weui_cell_primary"> <p>'+data.msg[o][0]+'</p></div> <div class="weui_cell_ft" style="width:80%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">'+data.msg[o][2]+'</div></a></div>');
      }  
	  $("#about").popup();
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
    $.toast("查询取消", "cancel");
  }
});
}
 </script>
</head>

<body id="teaser-page">
		        <script>
				window.onload=function(){
		 setTimeout(function() {
            $.hideLoading();
        }, 350)	
};


						$(document).ready(function() {
 
  				 setTimeout(function() {
            $.hideLoading();
        }, 8000)
 });</script>
<div class="l-stage"><main>
<div class="l-intro">
  <div class="intro-btn-skip"><a id="s_st" href="#">S_ST</a></div>
</div>
<div class="l-main">
	<div class="l-first">
		<div class="first-bg"></div>	
		<div class="first-flare-wrap">
			<div class="first-flare01"></div>
			<div class="first-flare02"></div>
		</div>	
		<div class="first-megumi-back"></div>
		<div class="first-megumi-front"></div>	
		<div class="first-text-wrap">
			<div class="first-text-main">
				<img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/teaser/main_text.png" width="416" height="442" class="pcv">
				<img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/teaser/main_text_sp.png" class="spv">
			</div>
			<div class="first-text">
				<span class="t1"></span>
				<span class="t2"></span>
				<span class="t3"></span>
				<span class="t4"></span>
				<span class="t5"></span>
				<span class="t6"></span>
				<span class="t7"></span>
				<span class="t8"></span>
				<span class="t9"></span>
				<span class="t10"></span>
				<span class="t11"></span>
				<span class="t12"></span>
				<span class="t13"></span>
				<span class="t14"></span>
				<span class="t15"></span>
				<span class="t16"></span>
				<span class="t17"></span>
				<span class="t18"></span>
				<span class="t19"></span>
				<span class="t20"></span>
				<span class="t21"></span>
				<span class="t22"></span>
				<span class="t23"></span>
				<span class="t24"></span>
				<span class="t25"></span>
				<span class="t26"></span>
				<span class="t27"></span>
				<span class="t28"></span>
				<span class="t29"></span>
				<span class="t30"></span>
				<span class="t31"></span>
			</div>
		</div>	
		<div class="sakura-front">
			<div class="sakura-front-l"></div>
			<div class="sakura-front-m"></div>
			<div class="sakura-front-s"></div>
		</div>
	</div>
	<div class="l-fix"></div>
	<div class="l-second">
		<div class="sakura-back">
			<div class="sakura-back-l"></div>
			<div class="sakura-back-m"></div>
			<div class="sakura-back-s"></div>
		</div>
		<div class="l-movie">
			<div class="movie-ss"></div>
			<div id="movie-player"></div>
			<div class="movie-btn">
				<div class="movie-btn-play">
					<a target="_blank" >
						<img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/teaser/main_movie_btn_play.png" width="401" height="257">
					</a>
				</div>
			</div>
		</div>
		<div class="l-news-wrap">
			<div class="l-news">
				<div class="news-btn-more">
					<a onClick='return tmcz();'>同名查找</a>
				</div>
			
			</div>
			<div class="l-twitter">
				<div class="twitter-btn-more">
					<a onClick='return txcz();'>同乡/同校</a>
				</div>
		
				<div class="link-btn-radio">
					<a onClick='return trcx();'>同日出生</a>
				</div>

			</div>
		</div>			     
		<footer class="l-footer">
		  <p class="footer-copy">小薇工作室出品<BR>BY 仲原</p>
		</footer>
	</div>
</div>
</main></div>

<div id="about" class="weui-popup-container">
  <div class="weui-popup-overlay"></div>
  <div class="weui-popup-modal">

        <article class="weui_article">
          <h1 ID='showtitle'></h1> <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_primary close-popup">返回</a>
		  <div id="show">
		  </div>
<div class="weui_cells">
<a class="weui_cell" href="javascript:;">

  </a>
</div>
<div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">说明</div>
  <div class="weui_panel_bd">
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title">查询规则</h4>
      <p class="weui_media_desc">模糊搜索查询相似目标 如果相似过多会随机取出数据</p>
    </div>
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title">数据相关</h4>
      <p class="weui_media_desc">仅有2017级新生的相关资料，来源招生就业处</p>
    </div>
	  <div class="weui_media_box weui_media_text">
<p class="weui_media_desc" style="text-align:center">小薇工作室出品</p>
    </div>
  </div>
  
</div>
 <BR>
 <h1 > </h1>
            <a href="javascript:;" class="weui_btn weui_btn_primary close-popup">关闭</a>
    
        </article>
  </div>
</div><script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/scripts/libs.min.js"></script><script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/scripts/functions.min.js"></script>
  <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
			<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?>
</body></html>
