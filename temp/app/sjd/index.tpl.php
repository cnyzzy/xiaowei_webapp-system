<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html style="font-size: 32px;">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=640,user-scalable=no">
	<meta name="format-detection" content="telephone=no,email=no" />
	<title>@全体师生:来自十九大的一份考卷，请查收</title>

	<script>
		document.addEventListener("touchmove",function(e){e.preventDefault();});
		document.getElementsByTagName('html')[0].style.fontSize = document.documentElement.clientWidth/10+'px';
	</script>

		<?php if($isstop==1) { ?>	
		     <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
			<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
		<script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
		<?php } ?>	<?php if($isstop==1) { ?>	
		  <script>	
							$(document).ready(function() {   
								   $.notification({
  title: "活动通知",
  text: "第一期奖品已发放，点此查看。",//
   media: "<img src='http://weixin.yctu.edu.cn/xw.jpg'>",
  data: "123",
  onClick: function(data) {
window.location.href = 'http://mp.weixin.qq.com/s?__biz=MzAxMDU5NzAxMw==&mid=506710738&idx=2&sn=1934681217efeec7d112cc609cb9cd28&chksm=008a8d2837fd043e144c15ad1e00229d6ffa2ff8befcf954678b1c9d292461637e988af613fa#rd';
  },
  onClose: function(data) {

  }
});		
 			

 			 setTimeout(function() {
         $.modal({
  title: "提示",
  text: "当前您未绑定小薇平台因此无法记录成绩<br>您可以选择绑定身份或直接参与",
  buttons: [
    { text: "直接参与", className: "default",
	onClick: function(){ 
	  $.showLoading("你将不能获得奖品","cancel");
			 setTimeout(function() {
           $.hideLoading();
        }, 2000)	
	} },
    { text: "绑定身份", 
	onClick: function(){
		  $.showLoading("即将跳转...","cancel");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>/home/modify";
        }, 800)	
	} },
  ]
});
        }, 2600)	

		
	
		}); </script>	 	<?php } ?>  
	<style>
	body{
		font-family: "Helvetica Neue", 'Helvetica', "Microsoft YaHei", '微软雅黑', arial, sans-serif;
	}
	.zmiti-loadin-text{
		position: absolute;
		width:100%;
		text-align: center;
		top: 50%;
	}
	.zmiti-back{
		width: 80px;
		height: 80px;
		position: fixed;
		right: 50px;
		bottom: 50px;
		display: none;
		z-index: 10000;
	}
</style>
</head>
<body style="overflow: hidden;">
	<div id="fly-main-ui">
		<span class='zmiti-loadin-text'>正在进入...</span>
	</div>
	<div class="zmiti-back" id="zmiti-back">
		<a href='http://weixin.yctu.edu.cn'>
			<img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/assets/images/back.png">
		</a>
	</div>

	<script src='https://res.wx.qq.com/open/js/jweixin-1.2.0.js'></script>
	<script src='<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/assets/js/vendor.js'></script>
	<script type="text/javascript">
		window.PointerEvent = void 0;
		function onError(){
			var script  = document.createElement('script');
			script.src = '<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/assets/js/index.js?aa='+new Date().getTime();
			document.body.appendChild(script);
		}

		window.subTitle = '是学霸还是学神，测试下你有多强？';

		window.formTitle = '请输入你的姓名和电话';
			//学习十九大报告，你超过了××%的人，达到＊＊＊＊水平。
			window.share  = {
				title:'学习十九大报告，我答对了<?php echo $word1;?>题，超过了<?php echo $word2;?>%的人，达到“<?php echo $word3;?>”水平',
				desc:'是学霸还是学神   测试一下你有多强？'
			}

			window.h5name = 'qa19da';
			window.config = {
				server:'zhongguowangshi',
				appId:'<?php echo $signPackage["appId"];?>',
				worksid:'9185180370',
				protocol:'https'
			};

			function loadScript(src){
				var script  = document.createElement('script');
				script.src = src+'?aa='+new Date().getTime();
				document.body.appendChild(script);
			}

			loadScript('<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/assets/js/index.js')


			function getQueryString(name) {
				var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
				var r = window.location.search.substr(1).match(reg);
				if (r != null) return (r[2]);
				return null;
			}

			var key = getQueryString('zmiti'),
				href = getQueryString('href');
			if(key === 'zmiti'){
				var back = document.getElementById('zmiti-back');
				back.href = href+'?zmiti=zmiti' || 'http://weixin.yctu.edu.cn';
				back.style.display = 'block';
			}
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
  wx.ready(function () {
     
  
   wx.onMenuShareTimeline({
      title: '@全体师生:来自十九大的一份考卷，请查收',
      link: 'http://weixin.yctu.edu.cn/sjd',
      imgUrl: 'http://weixin.yctu.edu.cn/app/sjd/model/assets/images/300.png',
      trigger: function (res) {
      },
      success: function (res) {
        alert('已分享');
      },
      cancel: function (res) {
        alert('已取消');
      },
      fail: function (res) {
        alert(JSON.stringify(res));
      }
    });
   wx.onMenuShareTimeline({
      title: '@全体师生:来自十九大的一份考卷，请查收',
      link: 'http://weixin.yctu.edu.cn/sjd',
      imgUrl: 'http://weixin.yctu.edu.cn/app/sjd/model/assets/images/300.png',
      trigger: function (res) {
      },
      success: function (res) {
        alert('已分享');
      },
      cancel: function (res) {
        alert('已取消分享');
      },
      fail: function (res) {
        alert(JSON.stringify(res));
      }
    });
	wx.onMenuShareAppMessage({
      title: '@全体师生:来自十九大的一份考卷，请查收',
      link: 'http://weixin.yctu.edu.cn/sjd',
      imgUrl: 'http://weixin.yctu.edu.cn/app/sjd/model/assets/images/300.png',
    desc: "答题可参与抽奖哦", // 分享描述
    type: '', // 
    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
    success: function () { 
        // 用户确认分享后执行的回调函数
    },
    cancel: function () { 
        // 用户取消分享后执行的回调函数
    }
});
  });    
		</script>

		
<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
</body>
</html>
