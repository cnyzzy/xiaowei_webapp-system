<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>教师电话-<?php echo $arrInfo['name'];?></title>
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
			<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/slidernav.css" media="screen, projection" />
<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/slidernav.js"></script>



<script type="text/javascript">
$(document).ready(function(){
$(".xunjia-box").css("height", $("body").height()-44+"px");//;

	$('#slider').sliderNav();
});
</script>

        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>	
		<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/kcb/model/js/mui.min.js"></script>
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
        })(document, window);
		 
     $(document).ready(function(){  

  if(<?php echo $yunxu;?>==0){
  $.toast("非教职工<br>不可使用","cancel");
			 setTimeout(function() {
          window.location.reload(true);
        }, 2000)}
 });
         </script>
		 
    </head>
    <body>
        <header>
		
         <div class="titlebar reverse">
             <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>教师电话</h1>
            </div>
        </header>
		<style>
*{margin:0;padding:0;list-style-type:none;}
a,img{border:0;}

.demo{width:100%;margin:20px auto;}
</style>

        <article style="bottom: 0;">

                   <ul class="xunjia-box">

<div class="demo">

	<div id="slider">	

		<div class="slider-content">
			<ul>	
			<li id="0"><a name="0" class="title">搜索</a>
					<ul>
					<li><a href="<?php echo $arrInfo['url'];?>/jsdh/s">搜索(姓名、部门、号码、短号)</a></li>
					</ul>
				</li>
			<li id="0"><a name="0" class="title">置顶</a>
					<ul>
					<li><a href="<?php echo $arrInfo['url'];?>/jsdh/xld">校领导</a></li>
					</ul>
				</li><?php foreach((array)$arr1 as $key=>$Child) {?>
<li id="<?php echo $key;?>"><a name="<?php echo $key;?>" class="title"><?php echo $key;?></a>
					<ul>
					<?php foreach((array)$Child as $keyy=>$Childd) {?><li><a href="<?php echo $arrInfo['url'];?>/jsdh/bm/<?php echo $Childd['sx'];?>"><?php echo $Childd['bm'];?></a></li>  <?php }?>

					</ul>
				</li>
  <?php }?>
				
			</ul>
		</div>
	</div>

</div>

   </ul>
        </article>
<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>        <footer>
           
        </footer>
		
</html>