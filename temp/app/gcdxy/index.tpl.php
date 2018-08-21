<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="filetype" content="1"> 
    <meta name="publishedtype" content="1">
    <meta name="pagetype" content="2"> 
    <meta name="catalogs" content="dugongchandang"> 	
    <title>书记领读  品味真理的味道</title>
   <script>
    var deviceWidth = parseInt(window.screen.width); //获取当前设备的屏幕宽度
    var deviceScale = deviceWidth / 640;
    //得到当前设备屏幕与640之间的比例，之后我们就可以将网页宽度固定为640px
    // alert(deviceScale)
    var ua = navigator.userAgent;
    //获取当前设备类型（安卓或苹果）
    if (/Android (\d+\.\d+)/.test(ua)) {
        var version = parseFloat(RegExp.$1);
        if (version > 2.3) {
            document.write('<meta name="viewport" content="width=640,initial-scale=' + deviceScale + ', minimum-scale = ' + deviceScale + ', maximum-scale = ' + deviceScale + ', target-densitydpi=device-dpi">');
        } else {
            document.write('<meta name="viewport" content="width=640,initial-scale=0.75,maximum-scale=0.75,minimum-scale=0.75,target-densitydpi=device-dpi" />');
        }
    } else {
        document.write('<meta name="viewport" content="width=640, user-scalable=no,minimum-scale = ' + deviceScale + '">');
    }
    </script>
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style.css">
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/animate.css">
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/index.css?v=5">
     <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery-1.10.2.min.js"></script>
</head>
<body>
    <div style="display: none"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/icon.jpg" alt="" /></div>
    <div id="loader" ontouchmove="return !1" class="loader">
      <!--   <div class="loader-graph">
        </div> -->
        <div id="progress" class="loader-progress">
            4%</div>
        <div class="loader-text"></div>
    </div>

    <div class="swiper-container wh hide " id="wrap">
        <div class="swiper-wrapper wh">
            <div class="swiper-slide page1">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/1-1.png" alt="" class="animate img1">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/1-2.png" alt="" class="animate img2">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/1-3.png" alt="" class="animate img3">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/1-4.png" alt="" class="animate img4">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/1-5.png" alt="" class="animate img5">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/1-6.png" alt="" class="animate img6">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/1-7.png" alt="" class="animate img7">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/1-8.png" alt="" class="animate img8">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/1-9.png" alt="" class="animate img9">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/1-10.png" alt="" class="animate img10">
                <div class="page_arrow_bottom"></div>
            </div>
            <div class="swiper-slide page2">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/17-1.png" alt="" class="animate img01">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/17-2.png" alt="" class="animate img02">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/17-3.png" alt="" class="animate img03">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/17-4.png" alt="" class="animate img04">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/17-5.png" alt="" class="animate img05">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/17-6.png" alt="" class="animate img06">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/17-7.png" alt="" class="animate img07">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/17-8.png" alt="" class="animate img08">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/2-1.png" alt="" class="animate img1">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/2-2.png" alt="" class="animate img2 ">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/2-3.png" alt="" class="animate img3">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/2-4.png" alt="" class="animate img4">
                <div class="page_arrow_bottom"></div>

            </div>
            <div class="swiper-slide page4">
             <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/17-1.png" alt="" class="animate img01">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/17-2.png" alt="" class="animate img02">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/17-3.png" alt="" class="animate img03">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/17-4.png" alt="" class="animate img04">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/17-5.png" alt="" class="animate img05">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/17-6.png" alt="" class="animate img06">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/17-7.png" alt="" class="animate img07">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/17-8.png" alt="" class="animate img08">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/4-1.png" alt="" class="animate img1">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/4-2.png" alt="" class="animate img2">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/4-3.png" alt="" class="animate img3">
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/btn-1.png" alt="" class="animate btn-go">
            </div>
        </div>
    </div>
    <div id="three"></div>
    <div id="main" class="hide"></div>
    <div class="page page5  hide">
        <img src="" alt="" class="pos person">
        <img src="" alt="" class="pos personHead">
        <div class="bar-box ">
            <span class="stime">00:00</span>
            <div class="pro-bar">
               <i class="bar-bg"></i>
               <i class="bar-pro"></i>
                <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/6-1-4.png" alt="" class="bj">
            </div>
            <span  class="totalTime">00:00</span>
        </div>
         <div class="pos"></div>
        <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/btn-3.png" alt="" class="btn btn-listen" >
        <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/btn-9.png" alt="" class="btn btn-close hide" >
        <div class="btn-box1">
            <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/circle.png" alt="" class="btn circle">
            <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/btn-2.png" alt="" class="btn  btn-record">
        </div>
        <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/btn-4.png" alt="" class="btn  btn-back">
    </div>
    <div class="page page6 hide">
        <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/6-21.png" alt="" class="tip tip1">
        <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/6-21-1.png" alt="" class="tip tip2">
         <div class="wave-box">
         <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/6-22-1.png" alt="" class="wave">
        </div>
         <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/6-22.png" alt="" class="pos img1">
         <img src="" alt="" class="pos word">
         <div class="pos"></div>
         <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/btn-12.png" alt="" class="btn btn-start">
          <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/btn-17.png" alt="" class="btn btn-stop hide">
         <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/btn-13.png" alt="" class="btn btn-submit">
         <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/btn-14.png" alt="" class="btn btn-st">
         <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/btn-15.png" alt="" class="btn  btn-back1">
    </div>
    <div class="page page7 hide">
        <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/7.jpg" alt="" class="pos">
        <canvas id="headcanvas"  ></canvas>
        <p class="lname"></p>
        <p class="score"></p>
        <div id="qrcodeTable" class="qrcodeTable"></div>

    </div>
    <div class="load">
            <p>正在生成中<br/>请耐心等待</p>
            <div></div>
        </div>
    <div id="picShow" class="picShow">
        <span class="picmes" style="">长按保存分享</span>
         <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/btn-11.png" alt="" class="btn  btn-rank">
    </div>
    <div class="page page8 hide">
            <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/8-2.png" class="topimg">
    <div class="list_wrap" id="wrapper">
        <div class="list_con" id="scroller">
        </div>
    </div>
      <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/btn-15.png" class="btn btn-back2">
       <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/btn-19.png" class="btn btn-join2">
    </div>
    <div class="page page11 hide">
      <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/11.jpg" class="pos">
         <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/btn-15.png" class="btn btn-back3"> 
    </div>
    <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/audio.js"></script>

    <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/common.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/resLoader.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/three.min.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/components.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/main.js?v=5"></script>
    <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/swiper.min.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery.qrcode.js"></script>
         <!-- 滚动js -->
    <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/iscroll.js"></script>
    <script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/html2canvas.min.js"></script>
	<script>
    $(function() {

  wx.config({
    appId: "<?php echo $signPackage['appId'];?>",
    timestamp: "<?php echo $signPackage['timestamp'];?>",
    nonceStr: "<?php echo $signPackage['nonceStr'];?>",
    signature: "<?php echo $signPackage['signature'];?>",
            jsApiList: ["onMenuShareTimeline", "onMenuShareAppMessage", "hideMenuItems", "startRecord", "stopRecord","uploadVoice","playVoice","downloadVoice","translateVoice","onVoicePlayEnd","onVoiceRecordEnd","stopVoice"] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2

  });
});


</script>
    <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/index.js?v=6"></script>
 
    <script>
                var Sound=(function createAudio(data){
                    var data={
                        Audio1:{
                            src:"<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/video/1.mp3",
                        },
                        Audio2:{
                            src:"<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/video/2.mp3"
                        },
                        Audio3:{
                            src:"<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/video/3.mp3"
                        },
                        Audio4:{
                            src:"<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/video/4.mp3",
                        },
                        Audio5:{
                            src:"<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/video/5.mp3",
                        },
                          Audio6:{
                            src:"<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/video/6.mp3",
                        },
                          Audio7:{
                            src:"<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/video/7.mp3",
                        },
                        Audio8:{
                            src:"<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/video/8.mp3",
                        }
                    }
                    var n;
                    var mediaObj={};
                    for(n in data){
                        var s = new Audio();
                        s.src = data[n].src;
                        s.load();
                        if(data[n].loop) s.loop=true;
                        mediaObj[n]=s;
                    };
                    return mediaObj
                })();

    //自动播放音乐
    document.addEventListener("WeixinJSBridgeReady", function() {
        for(var todo in Sound){
            Sound[todo].play();
            Sound[todo].pause();
        }
    }, false);
</script>
    
<script>
    $(window).on("resize", function (e) {
        var wWidth = document.documentElement.clientWidth || document.body.clientWidth;
        var size = (wWidth < 1600 ? wWidth : 1600) / 320 * 20;
        document.getElementsByTagName("html")[0].style.fontSize = size + "px";
    }).trigger("resize");
</script>
<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
</body>
</html>
