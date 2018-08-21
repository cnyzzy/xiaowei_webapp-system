<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>我-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/self.css"/>
        <script>(function (doc, win) {
          var docEl = doc.documentElement,
            resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
            recalc = function () {
              var clientWidth = docEl.clientWidth;
              if (!clientWidth) return;
              docEl.style.fontSize = 20 * (clientWidth / 320) + 'px';
            };

          if (!doc.addEventListener) return;
          win.addEventListener(resizeEvt, recalc, false);
          doc.addEventListener('DOMContentLoaded', recalc, false);
        })(document, window);</script>
				<STYLE>
		.head-box .head-icon-outer .head-icon{
	position: absolute;
	width: 5.4rem;
	height: 5.4rem;
	border-radius: 50%;
	top: 0.175rem;
	left: 0.175rem;
}
.image{ 
width: 5.4rem;height: 5.4rem;  position: absolute;border-radius: 50% 50% 50% 50%;top: 0rem;
	left: 0rem;
}
		</STYLE>
    </head>
    <body>
        <header>
            <div class="head-box">
               <h3>我</h3>
               <div class="head-icon-outer">
                    <div class="head-icon"><img class="image updateimg" src="<?php if(!EMPTY($_SESSION['zid']['img'])) { ?><?php echo $_SESSION['zid']['img'];?><?php } else { ?><?php echo $arrInfo['url'];?>/temp/img.jpg<?php } ?>" /> </div>
               </div>
               <h5><?php echo $_SESSION['zid']['name'];?>(<?php echo $_SESSION['zid']['number'];?>)</h5>
			      
            </div>
        </header>
        <article style="padding-bottom: 54px;">
            <div class="weui_cells weui_cells_access">
                <a class="weui_cell" href="/<?php echo $AppName;?>/person_info">
                    <div class="weui_cell_bd weui_cell_primary">
                        <p>个人资料</p>
                    </div>
                <i class="iconfont">&#xe661;</i>
                </a>
            </div>
           <div class="weui_cells weui_cells_access">
                <a class="weui_cell" href="/<?php echo $AppName;?>/bdgl">
                    <div class="weui_cell_bd weui_cell_primary">
                        <p>绑定管理</p>
                    </div>
                  <i class="iconfont">&#xe661;</i>
                </a>
            </div>
			<?php if($_SESSION['zid']['type']==1) { ?> <div class="weui_cells weui_cells_access">
                <a class="weui_cell" href="/<?php echo $AppName;?>/update">
                    <div class="weui_cell_bd weui_cell_primary">
                        <p>更新数据</p>
                    </div>
                <i class="iconfont">&#xe661;</i>
                </a>
            </div>
			<div class="weui_cells weui_cells_access">
                <a class="weui_cell" href="/<?php echo $AppName;?>/chpass">
                    <div class="weui_cell_bd weui_cell_primary">
                        <p>修改密码</p>
                    </div>
                <i class="iconfont">&#xe661;</i>
                </a>
            </div>
			<?php } ?>
					<?php if(isset($_SESSION['isadmin'])&&$_SESSION['isadmin']==1) { ?>	<?php if($_SESSION['zid']['type']==1&&$_SESSION['zid']['number']='15223232'&&$_SESSION['zid']['name']='仲原') { ?> <div class="weui_cells weui_cells_access">
                <a class="weui_cell" onClick="return admin();">
                    <div class="weui_cell_bd weui_cell_primary">
                        <p>超级权限</p>
                    </div>
                <i class="iconfont">&#xe661;</i>
                </a>
            </div><?php } ?>
								<?php if(isset($_SESSION['isclear'])&&$_SESSION['isclear']==1) { ?> <div class="weui_cells weui_cells_access">
                <a class="weui_cell" href="/<?php echo $AppName;?>/do/clear">
                    <div class="weui_cell_bd weui_cell_primary">
                        <p>清理缓存</p>
                    </div>
                <i class="iconfont">&#xe661;</i>
                </a>
            </div><?php } ?><?php } ?>
        <div class="weui_cells weui_cells_access">
                <a class="weui_cell" href="javascript:;"onclick='return aboutme();' >
                    <div class="weui_cell_bd weui_cell_primary">
                        <p>关于</p>
                    </div>
                   <i class="iconfont">&#xe661;</i>
                </a>
           </div>
 <div id="updatelog" class="weui-popup-container">
  <div class="weui-popup-overlay"></div>
  <div ID="updatelogdiv" class="weui-popup-modal">
     <header>
		
         <div class="titlebar reverse">
             <a class="close-popup">
                    <i class="iconfont">&#xe620;</i>
                </a>
                <h1>更新日志</h1>
            </div>
        </header>
		<style>
		.weui_media_box .weui_media_desc {
    color: #424141;
    font-size: 13px;
    line-height: 1.6;
    overflow: hidden;
    /* text-overflow: ellipsis; */
    display: grid;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    word-break: normal;
    white-space: pre-warp;
    word-wrapL: break-word;
}
</style>
        <article style="bottom: 0;">
		<div  class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">小薇平台|V2</div>
  <div ID='loglog' class="weui_panel_bd">
</div>
</div>

<div id='loadmore' class="weui-infinite-scroll">
  <div class="infinite-preloader"></div>
  正在加载... 
</div>

<a href="javascript:;" class="weui_btn weui_btn_plain_primary close-popup">关闭</a>
<BR>


		 </article>
  </div>
</div>
        </article>
		<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
					<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
		  $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/log',
          async:true,
                type: 'POST',
				data:"&id=1",
				timeout : 5000,
                success: function (data) {
					data= JSON.parse(data.replace(/\s/g,''));
     console.log(data);
if( data.msg[0]&& data.msg[0].length!=0 ){
					for (var i = 0; i < data.msg.length; i++) {
				var ver=data.msg[i][0];
					var text=data.msg[i][1];
					   $("#loglog").append('<div class="weui_media_box weui_media_text"> <h4 class="weui_media_title">'+ver+'</h4><p class="weui_media_desc">'+text+'</div>');
					  
 }

    }else{
  if( data.msg&& data.type=='no' ){
   
				$("#loadmore").html('<span class="weui-loadmore__tips">加载完毕</span>');
$("#loadmore").addClass("weui-loadmore_line");
 $('#updatelogdiv').destroyInfinite();
  }else{
      $.toast("服务器未反馈","forbidden");
	  		$("#loadmore").html('');

    }	}		

					   loading = false;
                  
                },
                error : function(e) {
			   loading = false;
                    $.toast("网络故障","forbidden");
							$("#loadmore").html('');

                }
            });
	$(document).on('click', '.updateimg', function(){
		
			
		
						var mythis = $(this);
						mythis.attr('src','http://weixin.yctu.edu.cn/xw.jpg'); 
										  	$.ajax({
		type:"POST",async:true,
		url:"<?php echo $arrInfo['url'];?>/home/fimg/fimg",
		dataType: 'json',timeout : 2000,
		<?php if(isset($_SESSION['isadmin'])&&$_SESSION['isadmin']==1) { ?>data:"&id=<?php echo $number;?>",<?php } ?>
		beforeSend:function(){ 
	
},
		success:function(result){
		      $.toast("头像已刷新");

		 console.log(result);
		 
if( result['img']){
console.log(result['img']);
mythis.attr('src',result['img']); 
}
		},
		error: function (XMLHttpRequest, textStatus, errorThrown) {

        }
	})
 
				
				
			});

  }); 
</script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
	 <script>
  $('#updatelogdiv').infinite(100);
  			  var page = 1;
      var loading = false;
         $('#updatelogdiv').infinite().on("infinite", function() {
        if(loading) return;
        loading = true;
				$("#loadmore").html('<div class="infinite-preloader"></div>正在加载... ');

		page++;
	  $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/log',
          
                type: 'POST',
				data:"&id="+page,
				timeout : 5000,
                success: function (data) {
					data= JSON.parse(data.replace(/\s/g,''));
     console.log(data);
if( data.msg[0]&& data.msg[0].length!=0 ){
					for (var i = 0; i < data.msg.length; i++) {
				var ver=data.msg[i][0];
					var text=data.msg[i][1];
					   $("#loglog").append('<div class="weui_media_box weui_media_text"> <h4 class="weui_media_title">'+ver+'</h4><p class="weui_media_desc">'+text+'</div>');
					  
 }

    }else{
  if( data.msg&& data.type=='no' ){
   
				$("#loadmore").html('<BR>');

 $('#updatelogdiv').destroyInfinite();
  }else{
      $.toast("服务器未反馈","forbidden");
	  		$("#loadmore").html('');

    }	}		

					   loading = false;
                  
                },
                error : function(e) {
			   loading = false;
                    $.toast("网络故障","forbidden");
							$("#loadmore").html('');

                }
            });
	
	
});
function show_date_time() {
    window.setTimeout("show_date_time()", 1000);
    BirthDay = new Date("1/25/2017 00:00:00");
    today = new Date();
    timeold = (today.getTime() - BirthDay.getTime());
    sectimeold = timeold / 1000;
    secondsold = Math.floor(sectimeold);
    msPerDay = 24 * 60 * 60 * 1000;
    e_daysold = timeold / msPerDay;
    daysold = Math.floor(e_daysold);
    e_hrsold = (e_daysold - daysold) * 24;
    hrsold = Math.floor(e_hrsold);
    e_minsold = (e_hrsold - hrsold) * 60;
    minsold = Math.floor((e_hrsold - hrsold) * 60);
    seconds = Math.floor((e_minsold - minsold) * 60);
    span_dt_dt.innerHTML = "已运行:" + daysold + "天" + hrsold + "小时" + minsold + "分" + seconds + "秒";
}
show_date_time();
</script>
       <?php include template('footer'); ?>
<script type="text/javascript">
	  function aboutme(){
	$.modal({
  title: "关于",
  text: "小薇平台V2<BR><span id='span_dt_dt'></span><BR>小薇工作室出品<br>By:ZY<br>2018.08",
  buttons: [
   
    { text: "更新日志", 
	onClick: function(){
//
	$("#updatelog").popup();	
	} },
	{ text: "我有建议", className: "default",
	onClick: function(){
$.alert("请在微博或微信留言哦", "关于");
	},} ,{ text: "知道了", className: "default",
	onClick: function(){ 
	  $.showLoading("谢谢使用","cancel");
			 setTimeout(function() {
			 $.hideLoading();
 $.closeModal();
        }, 800)	
	} }
  ]
});
	}
<?php if(isset($_SESSION['isadmin'])&&$_SESSION['isadmin']==1) { ?>
  	<?php if($_SESSION['zid']['type']==1&&$number='15223232'&&$_SESSION['zid']['name']='仲原') { ?>
	  function admin(){
	$.modal({
  title: "超级管理权限",
  text: "仲原，欢迎回来",
  buttons: [
    { text: "取消", className: "default",
	onClick: function(){ 
	  $.showLoading("即将关闭","cancel");
			 setTimeout(function() {
			 $.hideLoading();
 $.closeModal();
        }, 800)	
	} },
    { text: "全局检索", 
	onClick: function(){
	$.prompt({
  title: '检索',
  text: '请输入检索内容',
  input: '',
  empty: false, // 是否允许为空
  onOK: function (input) {
  $.showLoading("即将跳转...");
			 setTimeout(function() {
			 $.hideLoading();
            window.location.href="<?php echo $arrInfo['url'];?>/home/zys/?s="+input;
        }, 800)	


  },
  onCancel: function () {
    $.toast("查询取消", "cancel");
  }
});
		
	} },
	{ text: "身份切换", 
	onClick: function(){
	$.prompt({
  title: '切换',
  text: '请输入ID',
  input: '',
  empty: false, // 是否允许为空
  onOK: function (input) {
  $.showLoading("即将切换...");
  	$.showLoading("加载数据...");

           $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/zyq',
                dataType: 'json',
                type: 'POST',
				data:"&id="+input,
				async:true,
				timeout : 5000,
                success: function (data) {
				$.hideLoading();
    if(data.type!='ok'){
 console.log(data);
 $.toast(data.msg,"cancel");
                        }else if(data.type=='ok'){
						$.toast("成功");
						$.confirm({
  title: '确认',
  text: '切换为:'+data.msg,
  onOK: function () {
window.location.href="<?php echo $arrInfo['url'];?>/home/zyq/go/?id="+input;
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
    $.toast("取消", "cancel");
  }	
	}); },}
  ]
});
	}<?php } ?><?php } ?>
  function back(){

    }
</script>