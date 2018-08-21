<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>我的点赞-拾集</title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/lib/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/css/jquery-weui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/notice.css"/>

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
</style>
    </head>
    <body ontouchstart>
        <header>
            <div class="titlebar reverse">
			 <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>我的点赞</h1>
            </div>

         
        </header>

         <div class="weui-tab" style=" top: 44px;"><div class="weui-tab__bd">
          <div id="tab2" class="content-padded">
		      <div class="weui-panel" id="list2">
      <?php if(isset($arrtop)) { ?>	 
		
    
		  <?php foreach((array)$arrtop as $key=>$loopChild) {?>
		
        <div class="weui-panel__bd"> 
		<a style="color:#000" class="weui_cell">
          <div id="no<?php echo $loopChild['id'];?>" sid="<?php echo $loopChild['id'];?>" iszan="<?php if(!empty($loopChild['iszan'])) { ?>1<?php } else { ?>0<?php } ?>" top="1" class="weui-media-box weui-media-box_text" style="border-top: 4.5px solid <?php echo($colorarray[array_rand ($colorarray, 1)]);?>;">
            <h4 class="weui-media-box__title"><?php echo $loopChild['content'];?></h4>
            <p class="weui-media-box__desc">点赞时间 <?php ECHO(date('Y-m-j H:i:s',$loopChild['liketime']))?></p>
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
		<?php if(isset($arrtop)) { ?>	 <div id="loadmore2" class="weui-loadmore">
     <i class="weui-loading"></i><span class="weui-loadmore__tips">正在加载</span>
    </div><?php } ?>
			  </div>
      
  </div>
 
  </div>
		        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/js/jquery-weui.js"></script>
		  <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/fastclick.js"></script>
		  <script>
	
  $(function() {
    FastClick.attach(document.body);
  });
     $(document).on("click", ".weui-media-box", function() {
	 var iszan='点赞';
	 var oid=$(this).attr("sid");
	 var that=$(this);

	 	 if( typeof(oid)=="undefined")return false;

        $.actions({
          title: "#"+oid+" 选择操作",
          onClose: function() {
            console.log("close");
          },
          actions: [
          
            {
              text: "查看",
              className: "color-warning",
              onClick: function() {
 $.showLoading();
 window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/more/"+oid;
              }
            },
            {
              text: "取消赞",
              className: 'color-danger',
              onClick: function() {
	
               $.confirm("确认取消赞?", function() {
 	  $.ajax({
		type:"POST",async:true,
		url:"<?php echo $arrInfo['url'];?>/shiji/do/unlikeid",timeout : 5000,
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
			  
			  
			  
			  
			  
			  
			  
		}
              
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
 function datetime(unixTime, isFull, timeZone){                  
if (typeof(timeZone) == 'number')                  
{                      
unixTime = parseInt(unixTime) + parseInt(timeZone) * 60 * 60;                  
} 
var time = new Date(unixTime*1000);                  
var ymdhis = ""; 
ymdhis += time.getUTCFullYear() + "-";                  
ymdhis += time.getUTCMonth() + "-";                  
ymdhis += time.getUTCDate(); 
if ( isFull === true )                  
{                      
ymdhis += " " + time.getUTCHours() + ":";                      
ymdhis += time.getUTCMinutes() + ":";                      
ymdhis += time.getUTCSeconds();                  
} 
return ymdhis;              
}          
  

	  var topnum=20;
	  var loading2 = false;
	  $(document.body).infinite(200);
     $(document.body).infinite().on("infinite", function() {
	
        if(loading2) return;
		$("#loadmore2").html('<i class="weui-loading"></i><span class="weui-loadmore__tips">正在加载</span>');
        loading2 = true;
		
	  $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/love',
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
					var timetext=data.data[i]['liketime2'];
					if (!data.data[i]['iszan']){iszanz='点赞';}  
if (!data.data[i]['iszan']){iszancode='0';} 					
		var colorarray = ["#e0eee8","#f9906f","#a4e2c6","#1685a9","#88ada6","#ef7a82","#808080"];


var color = colorarray[Math.floor(Math.random()*colorarray.length)];
	
            
        $('#list2').append('<div class="weui-panel__bd"><a style="color:#000" class="weui_cell"> <div id="no'+id+'" sid="'+id+'" iszan="'+iszancode+'" top="1" class="weui-media-box weui-media-box_text" style="border-top: 4.5px solid '+color+';"><h4 class="weui-media-box__title">'+content+'</h4><p class="weui-media-box__desc">点赞时间 '+timetext+'</p><ul class="weui-media-box__info"><li class="weui-media-box__info__meta">来自</li><li class="weui-media-box__info__meta">'+from2+'</li><li class="weui-media-box__info__meta2 weui-media-box__info__meta_extra">'+iszanz+liked+'</li> </ul></div></a> </div>');
					  
 }
topnum=topnum+10;
    }else{
	 $.toast("无数据","cancel");
	}}else{
  if( data.type&& data.type=='over' ){
   
				$("#loadmore2").html('<span class="weui-loadmore__tips">加载完毕</span>');
$("#loadmore2").addClass("weui-loadmore_line");
$(document.body).destroyInfinite();
  }else if( data.type&& data.type=='error' ){
   
				$("#loadmore2").html('');
 $.toast(data.msg,"cancel");
$(document.body).destroyInfinite();
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

    </script>
       <?php include template('footer'); ?>