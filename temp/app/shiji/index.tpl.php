<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>拾集</title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/lib/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/css/jquery-weui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/notice.css"/>
				    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style.css">

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
		<style>
	.titlebar.reverse {
   /* background-color: #df4d26;*/
    border-color: #000;
}
.weui-media-box__title {
    white-space: normal;
}

.weui-media-box__title {
    line-height: 1.8;
    font-size: 16px;
}
.weui-tab__bd .weui-tab__bd-item.weui-tab__bd-item--active {
    display: block;
    background-color: #f5f4f4;
}
.weui_cell {
    padding: 15px 5px;
}
.weui-media-box {
    padding: 20px;
    position: relative;
    background-color: white;
    /* background: cadetblue; */
    border: 0.05px solid #7b7b7b;
    box-shadow: #cac6c6 1px 1px 1px 1px;
    border-top: 4.5px solid #f12b2b;
    border-radius: 0.32em;
}
a {
    text-decoration: none;
    outline: none;
    cursor: pointer;
    display: block;
}
.weui-media-box__info__meta {
    
    color: #ada9a9
	}
.weui-media-box__info__meta2 {
        float: right;
    color: #636161;
    padding-right: 0.1em;
}
.weui-navbar__item.weui-bar__item--on {
    color: #2f2f2f;
    background-color: #e9e8ec;
}
.weui-tab__bd-item.weui-pull-to-refresh {
    position: inherit;
    top: 50px;
}
.weui-tab__bd .weui-tab__bd-item {
    /*height: auto;*/
}

header, footer {

    z-index: 999;
}

.weui-navbar + .weui-tab__bd {
    padding-top: 40px;
}
.weui-tab__bd .weui-tab__bd-item.weui-tab__bd-item--active {
    padding-top: 55px;
}
.weui-navbar {

    top: 43px;
}
@font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: url(<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/flUhRq6tzZclQEJ-Vdg-IuiaDsNc.woff2) format('woff2');
}
.weui-actionsheet__title .weui-actionsheet__title-text {
    color: #888;
}
.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 34px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -webkit-font-feature-settings: 'liga';
  -webkit-font-smoothing: antialiased;
}
#top{position:fixed;bottom:0;left:10px;bottom: 10px;display:none;}
</style>
    </head>
    <body ontouchstart>
        <header>
            <div class="titlebar reverse">
			 <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>拾集</h1>
            </div>

         
        </header>

	
    <div class="weui-tab" style="">
      <div class="weui-navbar">
     
		<a class="weui-navbar__item<?php if($NoticeW=='1') { ?> weui-bar__item--on<?php } ?>" href="#tab1">
          拾取
        </a>
        <a class="weui-navbar__item<?php if($NoticeW=='2') { ?> weui-bar__item--on<?php } ?>" href="#tab2">
          热门
        </a>
   
      </div>
      <div class="weui-tab__bd">
        <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active weui-pull-to-refresh">
          <div class="weui-pull-to-refresh__layer">
            <div class='weui-pull-to-refresh__arrow'></div>
            <div class='weui-pull-to-refresh__preloader'></div>
            <div class="down">下拉刷新</div>
            <div class="up">释放刷新</div>
            <div class="refresh">正在刷新</div>
          </div>
     <div class="weui-panel" id="list">
              <?php if(isset($arrfirst)) { ?>	 
		 
    
		  <?php foreach((array)$arrfirst as $key=>$loopChild) {?>
		
        <div class="weui-panel__bd"> 
		<a style="color:#000" class="weui_cell">
          <div id="no<?php echo $loopChild['id'];?>" sid="<?php echo $loopChild['id'];?>" iszan="<?php if(!empty($loopChild['iszan'])) { ?>1<?php } else { ?>0<?php } ?>" class="weui-media-box weui-media-box_text" style="border-top: 4.5px solid <?php echo($colorarray[array_rand ($colorarray, 1)]);?>;">
            <h4 class="weui-media-box__title"><?php echo $loopChild['content'];?></h4>
            <p class="weui-media-box__desc"></p>
            <ul class="weui-media-box__info">
              <li class="weui-media-box__info__meta">来自</li>
              <li class="weui-media-box__info__meta"><?php echo $loopChild['from'];?></li>
	  <li class="weui-media-box__info__meta2 weui-media-box__info__meta_extra"><?php if(!empty($loopChild['iszan'])) { ?>已点赞<?php } else { ?>点赞<?php } ?><?php if(!empty($loopChild['liked'])) { ?><?php echo $loopChild['liked'];?><?php } else { ?>0<?php } ?></li>            </ul>
          </div></a>
		
        </div>

		  
	
              <?php }?>
           		  <?php } else { ?>
				  
			   <div class="weui-panel__bd"> 
			    <a style="color:#000" class="weui_cell">
          <div class="weui-media-box weui-media-box_text"  style="border-top: 4.5px solid <?php echo($colorarray[array_rand ($colorarray, 1)]);?>;">
            <h4 class="weui-media-box__title">快下拉拾取吧</font></h4>
            <p class="weui-media-box__desc"></p>
            <ul class="weui-media-box__info">
              <li class="weui-media-box__info__meta">来自</li>
              <li class="weui-media-box__info__meta">小薇</li>
            
			  <li class="weui-media-box__info__meta2 weui-media-box__info__meta_extra"></li>

            </ul>
          </div></a>   
		  
		  
          </div>
       
             <?php } ?></div>
			<?php if(!empty($firstnum)&&$isloading=='1') { ?> <div id="loadmore1" class="weui-loadmore">
     <i class="weui-loading"></i><span class="weui-loadmore__tips">正在加载</span>
    </div><?php } ?>
	<div class="ball">
		<a href="<?php echo $arrInfo['url'];?>/shiji/add"><i class="material-icons first">add_circle</i></a>
		<a href="<?php echo $arrInfo['url'];?>/shiji/love"><i class="material-icons second">favorite</i></a>
		<a href="<?php echo $arrInfo['url'];?>/shiji/my"><i class="material-icons third">description</i></a>
		<xml version="1.0" encoding="utf-8">
		<svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
		<polygon fill="#FFFFFF" points="30,14.5 15.5,14.5 15.5,0 14.5,0 14.5,14.5 0,14.5 0,15.5 14.5,15.5 14.5,30 15.5,30 15.5,15.5 
			30,15.5 "/>
		</svg>
	</div>	
        </div>
        <div id="tab2" class="weui-tab__bd-item weui-pull-to-refresh">
          <div class="weui-pull-to-refresh__layer">
            <div class='weui-pull-to-refresh__arrow'></div>
            <div class='weui-pull-to-refresh__preloader'></div>
            <div class="down">下拉刷新</div>
            <div class="up">释放刷新</div>
            <div class="refresh">正在刷新</div>
          </div>
        
          <div class="content-padded">
		      <div class="weui-panel" id="list2">
      <?php if(isset($arrtop)) { ?>	 
		
    
		  <?php foreach((array)$arrtop as $key=>$loopChild) {?>
		
        <div class="weui-panel__bd"> 
		<a style="color:#000" class="weui_cell">
          <div id="no<?php echo $loopChild['id'];?>" sid="<?php echo $loopChild['id'];?>" iszan="<?php if(!empty($loopChild['iszan'])) { ?>1<?php } else { ?>0<?php } ?>" top="1" class="weui-media-box weui-media-box_text" style="border-top: 4.5px solid <?php echo($colorarray[array_rand ($colorarray, 1)]);?>;">
            <h4 class="weui-media-box__title"><?php echo $loopChild['content'];?></h4>
            <p class="weui-media-box__desc"></p>
            <ul class="weui-media-box__info">
              <li class="weui-media-box__info__meta">来自</li>
              <li class="weui-media-box__info__meta"><?php echo $loopChild['from'];?></li>
	  <li class="weui-media-box__info__meta2 weui-media-box__info__meta_extra"><?php if(!empty($loopChild['iszan'])) { ?>已点赞<?php } else { ?>点赞<?php } ?><?php if(!empty($loopChild['liked'])) { ?><?php echo $loopChild['liked'];?><?php } else { ?>0<?php } ?></li>            </ul>
          </div></a>
		
        </div>

		  
	
              <?php }?>
           		  <?php } else { ?>
				  
			   <div class="weui-panel__bd"> 
			    <a style="color:#000" class="weui_cell">
          <div class="weui-media-box weui-media-box_text"  style="border-top: 4.5px solid <?php echo($colorarray[array_rand ($colorarray, 1)]);?>;">
            <h4 class="weui-media-box__title">没有数据</font></h4>
            <p class="weui-media-box__desc"></p>
            <ul class="weui-media-box__info">
              <li class="weui-media-box__info__meta">来自</li>
              <li class="weui-media-box__info__meta">小薇</li>
            
			  <li class="weui-media-box__info__meta2 weui-media-box__info__meta_extra"></li>

            </ul>
          </div></a>   
		  
		  
          </div>
       
             <?php } ?></div>
		 <div id="loadmore2" class="weui-loadmore">
     <i class="weui-loading"></i><span class="weui-loadmore__tips">正在加载</span>
    </div>
			  </div>
        </div>
 
      </div>
    </div>
 

		        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/js/jquery-weui.js"></script>
		  <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/fastclick.js"></script>
		      <script  src="<?php echo $arrInfo['url'];?>/app/shiji/model/js/index.js"></script>
		  <script>
	
  $(function() {
    FastClick.attach(document.body);


  });
     $(document).on("click", ".weui-media-box", function() {
	 var iszan='点赞';
	 var oid=$(this).attr("sid");
	 var that=$(this);
	 var iszancode='0';
	 var isdcode='0';
	 	 if( typeof(oid)=="undefined")return false;
	 if($(this).attr("iszan")=='1')iszan='取消赞';
	 	 if($(this).attr("iszan")=='1')iszancode='1';
		 var isd='删除';
if($(this).attr("top") )isd='拾取';
if($(this).attr("top") )isdcode='1';
        $.actions({
          title: "#"+oid+" 选择操作",
          onClose: function() {
            console.log("close");
          },
          actions: [
            {
              text: iszan,
              className: "color-primary",
              onClick: function() {
			if(iszancode=='0'){	$.ajax({
		type:"POST",async:true,
		url:"<?php echo $arrInfo['url'];?>/shiji/do/like",timeout : 5000,
		data:"&id="+oid,
		beforeSend:function(){  
var zantext=that.find(".weui-media-box__info__meta2").text();
var num = parseInt(zantext.replace(/[^0-9]/ig,""));
num++;
that.find(".weui-media-box__info__meta2").text("已点赞"+num);
that.attr("iszan",1);
		},
		success:function(result){
               $.toast("点赞成功", 800); 

		},
		error: function (XMLHttpRequest, textStatus, errorThrown) {
var zantext=that.find(".weui-media-box__info__meta2").text();
var num = parseInt(zantext.replace(/[^0-9]/ig,""));
num--;
that.find(".weui-media-box__info__meta2").text("点赞"+num);
that.attr("iszan",0);
$.toast("未成功", "text");
        }
	})
              }else{
			  $.ajax({
		type:"POST",async:true,
		url:"<?php echo $arrInfo['url'];?>/shiji/do/unlike",timeout : 5000,
		data:"&id="+oid,
		beforeSend:function(){  

		var zantext=that.find(".weui-media-box__info__meta2").text();
var num = parseInt(zantext.replace(/[^0-9]/ig,""));
num--;
that.find(".weui-media-box__info__meta2").text("点赞"+num);
that.attr("iszan",0);
},
		success:function(result){
              $.toast("取消赞成功", 800);  

		},
		error: function (XMLHttpRequest, textStatus, errorThrown) {
var zantext=that.find(".weui-media-box__info__meta2").text();
var num = parseInt(zantext.replace(/[^0-9]/ig,""));
num++;
that.find(".weui-media-box__info__meta2").text("已点赞"+num);
	that.attr("iszan",1);	
	$.toast("未成功", "text");
        }
	})
			  
			  }
            }},
            {
              text: "查看",
              className: "color-warning",
              onClick: function() {
 $.showLoading();
 window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/more/"+oid;
              }
            },
            {
              text: isd,
              className: 'color-danger',
              onClick: function() {
			  if(isdcode=='0'){
               $.confirm("确认删除?", function() {
 	  $.ajax({
		type:"POST",async:true,
		url:"<?php echo $arrInfo['url'];?>/shiji/do/unid",timeout : 5000,
		data:"&id="+oid,
		beforeSend:function(){  
$.showLoading("删除中");

      
 
},
		success:function(result){

  setTimeout(function() {
  that.parents('.weui-panel__bd').remove()
          $.hideLoading();
        }, 800);
		},
		error: function (XMLHttpRequest, textStatus, errorThrown) {
		$.hideLoading();
$.toast("失败","cancel");
        }
	})
  }, function() {
  //点击取消后的回调函数
  });
			  
			  
			  
			  
			  
			  
			  
			  }else{
		         $.confirm("确认拾取?", function() {
 	  $.ajax({
		type:"POST",async:true,
		url:"<?php echo $arrInfo['url'];?>/shiji/do/addid",timeout : 5000,
		data:"&id="+oid,
		beforeSend:function(){  
$.showLoading("拾取中");
},
		success:function(result){
			$("#list").prepend(that.clone());
		 setTimeout(function() {
		         $.hideLoading();
  $.toast("成功","text");
  
        }, 800)
	

		},
		error: function (XMLHttpRequest, textStatus, errorThrown) {
		        $.hideLoading();
$.toast("失败","cancel");
        }
	})
  }, function() {
  //点击取消后的回调函数
  });	  
			  
			  
			  
			  }}
              
            }
          ]
        });
      });

</script>
<script>
  /*document.body.addEventListener('touchmove', function (e) {
  e.preventDefault(); //阻止默认的处理方式(阻止下拉滑动的效果)
}, {passive: false});
document.body.addEventListener('touchmove', function(e) {
    if (!document.querySelector('.scroll').contains(e.target)) {
        e.preventDefault();
    }
}, {passive: false});
*/

</script>
  <script>
<?php if(!empty($firstnum)&&$isloading=='1') { ?>
var firstnum=<?php echo $firstnum;?>;
		
      var loading = false;
	  $("#tab1").infinite(400);
      $("#tab1").infinite().on("infinite", function() {
        if(loading) return;
		$("#loadmore1").html('<i class="weui-loading"></i><span class="weui-loadmore__tips">正在加载</span>');
        loading = true;
		
	  $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/view',
                dataType: 'json',
                type: 'POST',
				data:"&id="+firstnum,
				timeout : 5000,
                success: function (data) {
					
    if(data.type=='ok'){
if( data.data&& data.data[0].length!=0 ){
					for (var i = 0; i < data.data.length; i++) {
				var id=data.data[i]['id'];
					var content=data.data[i]['content'];
					var from2=data.data[i]['from'];
					var liked=data.data[i]['liked'];
							var iszanz='已点赞 ';
					var iszancode='1';
					if (!data.data[i]['iszan']){iszanz='点赞';}  
if (!data.data[i]['iszan']){iszancode='0';} 					
		var colorarray = ["#e0eee8","#f9906f","#a4e2c6","#1685a9","#88ada6","#ef7a82","#808080"];


var color = colorarray[Math.floor(Math.random()*colorarray.length)];
	
            
        $('#list').append('<div class="weui-panel__bd"><a style="color:#000" class="weui_cell"> <div id="no'+id+'" sid="'+id+'" iszan="'+iszancode+'" class="weui-media-box weui-media-box_text" style="border-top: 4.5px solid '+color+';"><h4 class="weui-media-box__title">'+content+'</h4><p class="weui-media-box__desc"></p><ul class="weui-media-box__info"><li class="weui-media-box__info__meta">来自</li><li class="weui-media-box__info__meta">'+from2+'</li><li class="weui-media-box__info__meta2 weui-media-box__info__meta_extra">'+iszanz+liked+'</li> </ul></div></a> </div>');
					  
 }
firstnum=firstnum+10;
    }else{
	 $.toast("无数据","cancel");
	}}else{
  if( data.type&& data.type=='over' ){
   
				$("#loadmore1").html('<span class="weui-loadmore__tips">加载完毕</span>');
$("#loadmore1").addClass("weui-loadmore_line");
$("#tab1").destroyInfinite();
  }else if( data.type&& data.type=='error' ){
   
				$("#loadmore1").html('');
 $.toast(data.msg,"cancel");
$("#tab1").destroyInfinite();
  }else{
      $.toast("服务器未反馈","forbidden");
	  		$("#loadmore1").html('');

    }	}		

					   loading = false;
                   console.log(data[0]);
                },
                error : function(e) {
			   loading = false;
                    $.toast("网络故障","forbidden");
							$("#loadmore1").html('');

                }
            });

      });
  

<?php } ?>
   
      $('#tab1').pullToRefresh().on('pull-to-refresh', function (done) {
        var self = this
      
       		$.ajax({
		   type: "POST",
		   url: "<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/read",
		   data : '0',
		   async: true,
		   dataType:"json",
		   success: function(data){
			 if ('error' == data.type) {
			$(self).pullToRefreshDone(); 
$.toast(data.msg,"cancel");
				return false;
			 }else if ('no' == data.type) {
			 $(self).pullToRefreshDone();
$.toast(data.msg,"text");
				return false;
			 }else if ('ok' == data.type){
if( data.data[0]&& data.data[0].length!=0 ){
					for (var i = 0; i < data.data.length; i++) {
				var id=data.data[i]['id'];
					var content=data.data[i]['content'];
					var from2=data.data[i]['from'];
					var liked=data.data[i]['liked'];
		var colorarray = ["#e0eee8","#f9906f","#a4e2c6","#1685a9","#88ada6","#ef7a82","#808080"];
var iszanz='已点赞 ';
					var iszancode='1';
					if (!data.data[i]['iszan']){iszanz='点赞';}  
if (!data.data[i]['iszan']){iszancode='0';} 			

var color = colorarray[Math.floor(Math.random()*colorarray.length)];
	
            
        $('#list').prepend('<div class="weui-panel__bd"><a style="color:#000" class="weui_cell"> <div id="no'+id+'" sid="'+id+'" iszan="'+iszancode+'" class="weui-media-box weui-media-box_text" style="border-top: 4.5px solid '+color+';"><h4 class="weui-media-box__title">'+content+'</h4><p class="weui-media-box__desc"></p><ul class="weui-media-box__info"><li class="weui-media-box__info__meta">来自</li><li class="weui-media-box__info__meta">'+from2+'</li><li class="weui-media-box__info__meta2 weui-media-box__info__meta_extra">'+iszanz+liked+'</li> </ul></div></a> </div>');
			  
 }   
  $('#tab1').pullToRefreshDone();       
    }}
		   }, 
			complete :function(XMLHttpRequest, textStatus){
			
			},
			error:function(XMLHttpRequest, textStatus, errorThrown){ //上传失败 
$(self).pullToRefreshDone();
$.toast("网络故障","forbidden");
			}
		});
      })
	  
  
	  var topnum=20;
	  var loading2 = false;
	  $("#tab2").infinite(400);
      $("#tab2").infinite().on("infinite", function() {
        if(loading2) return;
		$("#loadmore2").html('<i class="weui-loading"></i><span class="weui-loadmore__tips">正在加载</span>');
        loading2 = true;
		
	  $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/top',
                dataType: 'json',
                type: 'POST',
				data:"&id="+topnum,
				timeout : 5000,
                success: function (data) {
					
    if(data.type=='ok'){
if( data.data&& data.data[0].length!=0 ){
					for (var i = 0; i < data.data.length; i++) {
				var id=data.data[i]['id'];
					var content=data.data[i]['content'];
					var from2=data.data[i]['from'];
					var liked=data.data[i]['liked'];
							var iszanz='已点赞 ';
					var iszancode='1';
					if (!data.data[i]['iszan']){iszanz='点赞';}  
if (!data.data[i]['iszan']){iszancode='0';} 					
		var colorarray = ["#e0eee8","#f9906f","#a4e2c6","#1685a9","#88ada6","#ef7a82","#808080"];


var color = colorarray[Math.floor(Math.random()*colorarray.length)];
	
            
        $('#list2').append('<div class="weui-panel__bd"><a style="color:#000" class="weui_cell"> <div id="no'+id+'" sid="'+id+'" iszan="'+iszancode+'" top="1" class="weui-media-box weui-media-box_text" style="border-top: 4.5px solid '+color+';"><h4 class="weui-media-box__title">'+content+'</h4><p class="weui-media-box__desc"></p><ul class="weui-media-box__info"><li class="weui-media-box__info__meta">来自</li><li class="weui-media-box__info__meta">'+from2+'</li><li class="weui-media-box__info__meta2 weui-media-box__info__meta_extra">'+iszanz+liked+'</li> </ul></div></a> </div>');
					  
 }
topnum=topnum+10;
    }else{
	 $.toast("无数据","cancel");
	}}else{
  if( data.type&& data.type=='over' ){
   
				$("#loadmore2").html('<span class="weui-loadmore__tips">加载完毕</span>');
$("#loadmore2").addClass("weui-loadmore_line");
$("#tab2").destroyInfinite();
  }else if( data.type&& data.type=='error' ){
   
				$("#loadmore2").html('');
 $.toast(data.msg,"cancel");
$("#tab2").destroyInfinite();
  }else{
      $.toast("服务器未反馈","forbidden");
	  		$("#loadmore2").html('');

    }	}		

					   loading2 = false;
                   console.log(data[0]);
                },
                error : function(e) {
			   loading2 = false;
                    $.toast("网络故障","forbidden");
							$("#loadmore2").html('');

                }
            });

      });
$(document).ready(function(e) {

//当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失

$(function () {

$('#tab1').scroll(function(){
console.log($('#tab1').scrollTop());
if ($('#tab1').scrollTop()>400){ //大于100行才出现跳转箭头

$("#top").fadeIn(1500);  //大于1500行时跳转箭头慢慢透明显示

}

else

{

$("#top").fadeOut(1500);  //大于1500行时跳转箭头慢慢透明消失

}

});
$('#tab2').scroll(function(){
console.log($('#tab2').scrollTop());
if ($('#tab2').scrollTop()>400){ //大于100行才出现跳转箭头

$("#top").fadeIn(1500);  //大于1500行时跳转箭头慢慢透明显示

}

else

{

$("#top").fadeOut(1500);  //大于1500行时跳转箭头慢慢透明消失

}

});
//当点击跳转链接后，回到页面顶部位置

$("#top").click(function(){

$('.weui-tab__bd-item--active').animate({scrollTop:0},1000);//1s完成回到顶部

return false;

});

});




});
$('#top').click(function(){$('.weui-tab__bd-item--active').animate({scrollTop: '0px'}, 800);});

    </script>
	<p id="top">

<a href="#top"><span style="top: unset;left: -9px;bottom: -10px;color: #586c94; " class="sidenav-link-icon">
<i class="material-icons" STYLE="font-size: 64px;">vertical_align_top</i>
</span></a>

</p>
       <?php include template('footer'); ?>