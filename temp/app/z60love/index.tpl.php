<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>校庆祝福广场</title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/lib/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/css/jquery-weui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/notice.css"/>
		 <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style.css"/>

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
        })(document, window);		 function wait(form) {
				$.showLoading("正在加载...");
				setTimeout(function() {
					return true;
        $.hideLoading();
		
        }, 400)};

		</script>

		<style>
		.polaroid {   
  
  background-color: white;   
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);   
  margin-bottom: 15px;   
}  
	.titlebar.reverse {
    background-color: #df4d26;
    border-color: #000;
	
}
.weui-btn_default2 {
    color: #FFF;
    background-color: #f8f8f8;
    BORDER-COLOR: #fff;
    border-radius: 25px;
    border-style: solid;
    border-width: 1px;
    background-color: rgba(208, 11, 11, 0.4);
}
.weui-btn_default3 {
    color: #FFF;
    background-color: #f8f8f8;
    BORDER-COLOR: #fff;
    border-radius: 25px;
    border-style: solid;
    border-width: 1px;
    background-color: rgba(0, 15, 37, 0.4);
}
.weui-btn:after {
    background-color: rgba(0,0,0,0.08);
}
.weui-cell {
    padding: 15px 10px;
    position: relative;
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    align-items: center;
}

</style>
 <!--[if lte IE 9]>
  <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery-1.11.0.min.js"></script>
  <!--[if gt IE 9]><!-->
  <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery-2.1.0.min.js"></script>
  <![endif]-->
  <style>
    * {margin: 0; padding: 0;}
    body {font: normal 14px/1.5 Arial,STHeiti, Microsoft YaHei, simsun, Helvetica, sans-serif; color: #343434;}
    ul li {list-style: none;}
    body > div {width: 340px; margin: 0 auto;}
    div.artical_wrap {position: relative; overflow: hidden; height: 500px;}
    ul.artical_list {position: absolute; top: 0; width: 340px; height: 300px;}
    ul.artical_list li {padding: 10px 0;  border-bottom: 1px dashed #e7e7e7; overflow: hidden;  background-color:rgba(255,255,255,0.08);}
    ul.artical_list li div.user_img {position: relative; float: left; padding-top: 3px; width: 56px; height: 56px;    LEFT: 3PX;
} 
    ul.artical_list li div.user_img img {width: 56px; height: 56px;} 
    ul.artical_list li div.user_img span {position: absolute; left: 0; top: 3px; width: 56px; height: 56px; background: url(/app/z60love/model/images/img4.png) no-repeat left top;} 
    ul.artical_list li div.con {margin-left: 65px;} 
    ul.artical_list li div.con a {color: #f5f2c8; text-decoration: none;} 
    ul.artical_list li div.con a:hover {color: #666666;}
    ul.artical_list li div.con p.user_name {padding-bottom: 5px;}
    ul.artical_list li div.con p.user_name a {color: #f4f1f5; border-bottom: 1px dashed #eaaaaa; text-decoration: none;}
	p{color: #FFF;}
	.demos-content-padded {
    padding: 15px;
}
.weui-mask{
    width: 100%; 
    margin: 0 auto;
}
  </style>
  <script>
    $(function(){
      var scrollWrap = $('div.artical_wrap'),
          scrollInner = $('ul.artical_list'),
          scrollItems = scrollInner.find('li'),
          Iheight = 0;

      addHeight = function(targets){
        $.each(targets, function(i, v){
          if($(v).index() < 6) {
            Iheight = Iheight + $(v).height();
          }
        })
        scrollWrap.css('height', Iheight + 126); 
        Iheight = 0;
      }

      addHeight(scrollItems);

      scrollText = function() {
        var  scrollItemsR = scrollInner.find('li'),
             item = scrollItemsR[scrollItemsR.length - 1];
          scrollInner.css('top', -$(item).height());
          scrollInner.prepend(item);

          addHeight(scrollItemsR);

          $(item).css('opacity', 0);
          scrollInner.animate({
            top: 0
          }, 400);
          $(item).animate({
            opacity: 1
          }, 3500);

      };
          
      setInterval(scrollText, 5000);
    });

    
  </script>
    </head>
    <body ontouchstart>
        <header>
            <div class="titlebar reverse">
			 <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1 STYLE="padding:auto">祝福广场</h1>
            </div>

         
        </header>
		 
		 


<div>
 <div id='stars'>
        </div>
		 <div id='stars2'>
        </div>
		 <div id='stars3'>
        </div>
    
        <div id='title'>
            祝福盐师
          </div> <div class='demos-content-padded'><a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/add" onClick='return wait();' class="weui-btn weui-btn_default weui-btn_default2" style="color: #FFF;">我要祝福</a>
      <a  href="javascript:;" data-target="#half" class="weui-btn weui-btn_default weui-btn_default3 open-popup" style=" color: #FFF;">查看更多...<br>(题词贺信|领导致辞|校友祝福)</a>  </div> 
    <div class="artical_wrap">
      <ul class="artical_list">
	   <?php if(isset($NoticeArray1)) { ?>	 
		  

	  		  <?php foreach((array)$NoticeArray1 as $key=>$loopChild) {?>
		        <li>
          <div class="user_img"><img src="<?php if(!empty($loopChild['headimg'])) { ?><?php echo $loopChild['headimg'];?><?php } else { ?><?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/img1.jpg<?php } ?>" alt=""><span></span></div>
          <div class="con">
            <p class="user_name"><a href=""><?php if(!empty($loopChild['name'])) { ?><?php echo $loopChild['name'];?><?php } else { ?>匿名<?php } ?></a> 在<?php echo(smartDate($loopChild['addtime'], 'y-m-d H:i'))?>祝福盐师</p>
            <p><a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/love"><?php echo $loopChild['content'];?></a></p>
          </div>
        </li>
              <?php }?>
<?php } else { ?>
        <li>
          <div class="user_img"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/yctu.png" alt=""><span></span></div>
          <div class="con">
            <p class="user_name"><a href="">盐城师范学院</a> 在刚刚说</p>
            <p><a href="">春秋一甲子 我终于迎来了第六十个生日</a></p>
          </div>
        </li>
        <li>
          <div class="user_img"><img src="<?php echo $arrInfo['url'];?>/xw.jpg" alt=""><span></span></div>
          <div class="con">
            <p class="user_name"><a href="">小薇工作室</a> 在刚刚祝福盐师</p>
            <p><a href="">漫漫甲子路，笃行求真铺就；殷殷学子情，灵魂园丁浇铸！</a></p>
          </div>
        </li>
        <li>
          <div class="user_img"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/img4.jpg" alt=""><span></span></div>
          <div class="con">
            <p><a href="">匿名</a> 在刚刚祝福盐师</p>
            <p><a href="">盐师加油</a></p>
          </div>
        </li>
        

             <?php } ?>
     </ul>
    </div>

  </div>
   
</div>
    <div id="half" class='weui-popup__container popup-bottom'>
      <div class="weui-popup__overlay"></div>
      <div class="weui-popup__modal">
        <div class="toolbar">
          <div class="toolbar-inner">
            <a href="javascript:;" class="picker-button close-popup">关闭</a>
            <h1 class="title">祝福</h1>
          </div>
        </div>
        <div class="modal-content">
		  <div class="weui-panel">
        <div class="weui-panel__bd">
          <div class="weui-media-box weui-media-box_small-appmsg">
            <div class="weui-cells">
              <a class="weui-cell weui-cell_access polaroid" href="javascript:;" onclick='$.alert("暂未开放<br>敬请期待", "提示");'>
                <div class="weui-cell__hd"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ico/1.png" alt="" style="width:100px;margin-right:5px;display:block"></div>
                <div class="weui-cell__bd weui-cell_primary">
                  <p style="COLOR:#000;text-align: center;">题词贺信</p>
                </div>
                <span class="weui-cell__ft"></span>
              </a>
              <a class="weui-cell weui-cell_access polaroid" href="javascript:;" onclick='$.alert("暂未开放<br>敬请期待", "提示");'>
                <div class="weui-cell__hd"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ico/2.png" alt="" style="width:100px;margin-right:5px;display:block"></div>
                <div class="weui-cell__bd weui-cell_primary">
                  <p style="COLOR:#000;text-align: center;">领导致辞</p>
                </div>
                <span class="weui-cell__ft"></span>
              </a>
			      <a class="weui-cell weui-cell_access polaroid" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/love" onClick='return wait();'>
                <div class="weui-cell__hd"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ico/3.png" alt="" style="width:100px;margin-right:5px;display:block"></div>
                <div class="weui-cell__bd weui-cell_primary">
                  <p style="COLOR:#000;text-align: center;">校友祝福</p>
                </div>
                <span class="weui-cell__ft"></span>
              </a>
            </div>
          </div>
        </div>
      </div>

        </div>
      </div>
    </div>
		        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/js/jquery-weui.js"></script>
		  <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/fastclick.js"></script>
       <?php include template('footer'); ?>