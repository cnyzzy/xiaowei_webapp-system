<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>校历-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/xunjia_detail.css"/>
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
    </head>
	
    <body>
	<style>
	.xunjia-tab {

    z-index: 0;

}
</style>    
    <header>
         <div class="titlebar reverse">
             <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>校历</h1>
            </div>
        </header>
        <article style="bottom: 0;">
            <ul class="xunjia-tab clearfix">
                <li class="green">2019</li>
            </ul>
            <ul class="xunjia-box">
			<a id="pb1"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/2019mini.png" style="vertical-align:middle;width:100%;height:100%;"/>      </ul>
             </a>
        </article>
        
        <footer>
           
        </footer>
		
    <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
				   			<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/fastclick.js"></script>

	<script type='text/javascript' src='<?php echo $arrInfo['url'];?>/app/home/model/js/swiper.js' charset='utf-8'></script>
<script>
function preloadimages(arr){
    var newimages=[]
    var arr=(typeof arr!="object")? [arr] : arr  //确保参数总是数组
    for (var i=0; i<arr.length; i++){
        newimages[i]=new Image()
        newimages[i].src=arr[i]
    }
}
 preloadimages(['<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/2019.png','<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/2018.png','<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/2017.jpg']);

  $(function() {
    FastClick.attach(document.body);

 var pb1 = $.photoBrowser({
        items: [
    {
       image: "<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/2019.png",
      caption: "2018-2019学年"
    },{
       image: "<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/2018.png",
      caption: "2017-2018学年"
    },{
       image: "<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/2017.jpg",
      caption: "2016-2017学年"
    },
        ]
        ,

        onSlideChange: function(index) {
          console.log(this, index);
        },

        onOpen: function() {
          console.log("onOpen", this);
        },
        onClose: function() {
          console.log("onClose", this);
        }
      });
      $("#pb1").click(function() {
        pb1.open();
      });
  
  });
</script>
		<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>
</html>