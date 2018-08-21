<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="zh-cmn-Hans">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="renderer" content="webkit">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="x5-orientation" content="portrait">
    <meta name="x5-fullscreen" content="false">
    <meta name="format-detection" content="telephone=no" />
    <title>国家公祭日在线悼念</title>
	       <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
  
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
			<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
						<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
    <style>
        html {
            font-size: 15.625vw !important;
        }
    </style>
    
<style>
    .content {
        position: absolute;
        top: 0;
        width: 100%;
        bottom: 0;
        background-image: url('<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/pray.png');
        background-size: 100% 100%;
        background-repeat: no-repeat;
        z-index: 1;
    }
    
    .pray-btn {
        position: absolute;
        z-index: 2;
        top: 65%;
        height: .9rem;
        width: 100%;
    }
</style>

</head>

<body>
    
<div class="content">
    <div class="pray-btn"></div>
</div>


    
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    $(function() {
        $('.pray-btn').click(function() {
				$.showLoading("正在点亮烛火");
            $.post('<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do', {
                tag: 'pray'
            }, function(ret) {
                if (ret) {
							 setTimeout(function() {
			 $.hideLoading();
   location.href = '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/gj';
        }, 800)	
                 
                }
            });
        });

        var share = {
            imgUrl: '<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/logo3.png',
            link: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>',
            title: '八十年，我们从未忘记你们！为大屠杀遇难同胞点亮烛光!',
            desc: '勿忘历史珍爱和平，让我们缅怀先烈寄托哀思!'
        };
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

            wx.ready(function() {
                wx.onMenuShareAppMessage(share);
                wx.onMenuShareTimeline(share);
                wx.onMenuShareQQ(share);
                wx.onMenuShareWeibo(share);
                wx.onMenuShareQZone(share);
            });



    });
</script>
<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
</body>

</html>
