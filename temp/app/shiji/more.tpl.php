<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>拾集-<?php echo $arrInfo['name'];?></title>
     <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
         <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/lib/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/css/jquery-weui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/notice_detail.css"/>
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
    line-height: 2;
    font-size: 20px;

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
    box-shadow: #cac6c6 0px 0px 0px 0px;
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
.weui-media-box_text .weui-media-box__title {
    margin-bottom: 18px;
}
img {
    border: 0;
    vertical-align: middle;
    width: 100%;
}
</style>
    </head>
    <body>
	
        <header>
            <div class="titlebar reverse">
                <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>#<?php echo $ShijiId;?></h1>
            </div>
        </header>
        <article>
		 <div class="swiper-container">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide"><img src="https://api.i-meto.com/bing?color=Red" /></div>
        <div class="swiper-slide"><img src="https://api.i-meto.com/bing?color=Black" /></div>
        <div class="swiper-slide"><img src="https://api.i-meto.com/bing?color=White" /></div>
		   <div class="swiper-slide"><img src="https://api.i-meto.com/bing?cat=T" /></div>
        <div class="swiper-slide"><img src="https://api.i-meto.com/bing?cat=S" /></div>
        <div class="swiper-slide"><img src="https://api.i-meto.com/bing" /></div>
      </div>
      <!-- If we need pagination -->
      <div class="swiper-pagination"></div>
    </div>
           <div class="weui-panel__bd"> 
		<a style="color:#000" class="weui_cell">
          <div id="no<?php echo $Array['id'];?>" sid="<?php echo $Array['id'];?>" iszan="<?php if(!empty($Array['iszan'])) { ?>1<?php } else { ?>0<?php } ?>" top='1' class="weui-media-box weui-media-box_text" style="border-top: 4.5px solid #879192;">
            <h4 class="weui-media-box__title"><?php echo $Array['content'];?></h4>
            <p class="weui-media-box__desc">[类别]<?php if(!empty($Array['type'])) { ?>
			<?php if($Array['type']=='a') { ?>动漫<?php } ?>
			<?php if($Array['type']=='b') { ?>影视<?php } ?>
			<?php if($Array['type']=='c') { ?>游戏<?php } ?>
			<?php if($Array['type']=='d') { ?>书籍<?php } ?>
			<?php if($Array['type']=='e') { ?>原创<?php } ?>
			<?php if($Array['type']=='f') { ?>网络<?php } ?>
			<?php if($Array['type']=='g') { ?>其他<?php } ?>
			<?php if($Array['type']=='h') { ?>专有<?php } ?>
			<?php } else { ?>未知<?php } ?></p>
            <ul class="weui-media-box__info">
              <li class="weui-media-box__info__meta">来自</li>
              <li class="weui-media-box__info__meta"><?php echo $Array['from'];?></li>
	  <li class="weui-media-box__info__meta2 weui-media-box__info__meta_extra"><?php if(!empty($Array['iszan'])) { ?>已点赞<?php } else { ?>点赞<?php } ?><?php if(!empty($Array['liked'])) { ?><?php echo $Array['liked'];?><?php } else { ?>0<?php } ?></li>            </ul>
          </div></a>
		
        </div>
		<br>
		 <a href="<?php echo $arrInfo['url'];?>/shiji" class="weui-btn weui-btn_plain-default">回到 [拾集]</a>
        </article>
     
              <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/js/jquery-weui.js"></script>
		  <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/fastclick.js"></script>
		  <script src="<?php echo $arrInfo['url'];?>/app/60app/model/js/swiper.js"></script>

    <script>
      $(".swiper-container").swiper({
        loop: true,
        autoplay: 3000
      });
    </script>
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
		isd='拾取';
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
              text: isd,
              className: 'color-danger',
              onClick: function() {
		
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
			  
			  
			  
			  }
              
            }
          ]
        });
      });

</script>
<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>
</html>