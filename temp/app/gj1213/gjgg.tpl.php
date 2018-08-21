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
    <title>公共管理学院:国家公祭日在线悼念</title>
<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
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
		right:0;
        background-image: url('<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/pray_bg3g.gif');
        background-size: auto 100%;
        background-repeat: no-repeat;
        background-position-x: 50%;
        z-index: 1;
    }

    .pray-head {
        background-image: url('<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/pray-headg.png');
        width: 100%;
        height: 4.5rem;
        background-repeat: no-repeat;
        background-size: auto 100%;
        background-position-x: 50%;
    }
    
    .pray-count {
        margin-top: .3rem;
        height: .9rem;
        width: 100%;
        color: #3c6080;
        text-align: center;
        font-size: .8rem;
        line-height: .9rem;
        font-weight: bold;
    }
    
    .pray-word {
        position: relative;
        height: .5rem;
        background-image: url('<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/count_word.png');
        background-repeat: no-repeat;
        background-size: auto 100%;
        background-position-x: 50%;
    }
</style>

</head>

<body>
    
<div class="content">
    <div class="pray-head"></div>
    <div class="pray-count"><?php echo $arr1['times'];?></div>
    <div class="pray-word"></div>
</div>


    

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    $(function() {


        var share = {
            imgUrl: '<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/logo3.png',
            link: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/gg',
            title: '铭记历史，珍爱和平！让我们为大屠杀遇难同胞点亮烛光!',
            desc: '我是第<?php echo $arr1['times'];?>位在线悼念者'
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

</body>
<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
</html>