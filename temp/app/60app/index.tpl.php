<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>盐城师范学院甲子校庆</title>
<meta name="keywords" content="盐城师范,盐城师范学院,校庆,60,六十周年">
<meta name="description" content="盐城师范学院建校六十周年">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">
   <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/lib/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/css/jquery-weui.css"/>
<link href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/iscroll.js"></script>
<script type="text/javascript">
var myScroll;
function loaded() {
	myScroll = new iScroll('wrapper', {
		snap: true,
		momentum: false,
		hScrollbar: false,
		onScrollEnd: function () {
			document.querySelector('#indicator > li.active').className = '';
			document.querySelector('#indicator > li:nth-child(' + (this.currPageX+1) + ')').className = 'active';
		}
	 });
}
document.addEventListener('DOMContentLoaded', loaded, false);
function preloadimages(arr){
    var newimages=[]
    var arr=(typeof arr!="object")? [arr] : arr  //确保参数总是数组
    for (var i=0; i<arr.length; i++){
        newimages[i]=new Image()
        newimages[i].src=arr[i]
    }
}
 preloadimages(['<?php echo $arrInfo['url'];?>/app/z60ys/model/images/1.jpg', '<?php echo $arrInfo['url'];?>/app/z60ys/model/images/2.jpg', '<?php echo $arrInfo['url'];?>/app/z60ys/model/images/3.jpg','<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ico/2.png','<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ico/1.png'])
function wait(form) {
				$.showLoading("正在加载...");
				setTimeout(function() {
        $.hideLoading();
			return true;
        }, 500)};
</script>

</head>
<body id="cate5">
<div id='content'>
<div class="banner">
	<div id="wrapper">
		<div id="scroller">
			<ul id="thelist">
				<li><p>盐城师范学院建校六十周年:还有[<?php echo $VarTime;?>]天</p><a href="#"> <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/djs/<?php echo $VarTime;?>.jpg"  onerror="this.src='<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/top3.jpg'"style="width: 1583px;"></a></li>
				<li><p>盐城师范学院建校六十周年</p><a href="#"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/top1.jpg" style="width: 1583px;"></a></li>
				<li><p>盐城师范学院建校六十周年</p><a href="#"> <img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/top2.jpg" style="width: 1583px;"></a></li>

			</ul>
		</div>
	</div>
	<div id="nav">
		<ul id="indicator"> 
			<li class="active">1</li> 
			<li>2</li> 
			<li>3</li> 
		</ul>
	</div>
	<div class="clr"></div>
</div>

<ul class="mainmenu">
	<li>
		<a href="<?php echo $arrInfo['url'];?>/Z60notice">
			<div class="menubtn">
				<div class="menumesg">
					<div class="menuimg"><div class="menuimg2"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/gonggao.png"></div></div>
					<div class="menutitle">校庆动态</div>
					<div class="menutext">通知公告</div>
				</div>
			</div>
		</a>
	</li>
	<li>
			<a href="<?php echo $arrInfo['url'];?>/z60zw">
			<div class="menubtn">
				<div class="menumesg">
					<div class="menuimg"><div class="menuimg2"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/zhengwen.png"></div></div>
					<div class="menutitle">征文专栏</div>
					<div class="menutext">在盐师精神引领下</div>
				</div>
			</div>
		</a>
	</li>
	<li>
		<a href="<?php echo $arrInfo['url'];?>/Z60Feed">
			<div class="menubtn">
				<div class="menumesg">
					<div class="menuimg"><div class="menuimg2"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/huodong.png"></div></div>
					<div class="menutitle">活动一览</div>
					<div class="menutext">发展论坛、院系、校友活动</div>
				</div>
			</div>
		</a>
	</li>
	
		<li>
			<a href="<?php echo $arrInfo['url'];?>/z60ys">
			<div class="menubtn">
				<div class="menumesg">
					<div class="menuimg"><div class="menuimg2"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/lishi.png"></div></div>
					<div class="menutitle">盐师春秋</div>
					<div class="menutext">光影回忆</div>
				</div>
			</div>
		</a>
	</li>
	<li>
		<a href="<?php echo $arrInfo['url'];?>/z60news">
			<div class="menubtn">
				<div class="menumesg">
					<div class="menuimg"><div class="menuimg2"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/xinwen.png"></div></div>
					<div class="menutitle">媒体聚焦</div>
					<div class="menutext">各类活动新闻</div>
				</div>
			</div>
		</a>
	</li>
	<li>
		<a href="<?php echo $arrInfo['url'];?>/z60love">
			<div class="menubtn">
				<div class="menumesg">
					<div class="menuimg"><div class="menuimg2"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/zhufu.png"></div></div>
					<div class="menutitle">祝福盐师</div>
					<div class="menutext">快来看看</div>
				</div>
			</div>
		</a>
	</li>
	<li>
		<a href="javascript:;" data-target="#half" class="open-popup">
			<div class="menubtn">
				<div class="menumesg">
					<div class="menuimg"><div class="menuimg2"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/juanzeng.png"></div></div>
					<div class="menutitle">校友捐赠</div>
					<div class="menutext">教育发展基金会</div>
				</div>
			</div>
		</a>
	</li>
	<li>
		<a href="https://h5.sosho.cn/community/detail.html?id=882">
			<div class="menubtn">
				<div class="menumesg">
					<div class="menuimg"><div class="menuimg2"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/xiaoyou.png"></div></div>
					<div class="menutitle">校友之家</div>
					<div class="menutext">加入地方校友会</div>
				</div>
			</div>
		</a>
	</li>
	<li>
		<a href="javascript:;"onclick='$.alert("暂未开放<br>敬请期待", "提示");'>
			<div class="menubtn">
				<div class="menumesg">
					<div class="menuimg"><div class="menuimg2"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/jinianpin.png"></div></div>
					<div class="menutitle">纪念品店</div>
					<div class="menutext">暂未开放</div>
				</div>
			</div>
		</a>
	</li>
<!-- <li>
		<a href="<?php echo $arrInfo['url'];?>/60app/us">
			<div class="menubtn">
				<div class="menumesg">
					<div class="menuimg"><div class="menuimg2"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/lianxi.png"></div></div>
					<div class="menutitle">联系我们</div>
					<div class="menutext">相关负责单位</div>
				</div>
			</div>
		</a>
	</li> -->
	<li>
		<a href="<?php echo $arrInfo['url'];?>/60app/more">
			<div class="menubtn">
				<div class="menumesg">
					<div class="menuimg"><div class="menuimg2"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/more.png"></div></div>
					<div class="menutitle">更多</div>
					<div class="menutext">敬请期待</div>
				</div>
			</div>
		</a>
	</li>

	<div class="clr"></div>
</ul>

</div>     <div class="weui-footer footer">
<p class="weui-footer__text " style="COLOR:#F0EFEF">QQ970127005</p>
        <p class="weui-footer__links">
          <a href="http://weixin.yctu.edu.cn" class="weui-footer__link">小薇平台</a> |
		          <a href="http://www.yctu.edu.cn" class="weui-footer__link">学校官网</a> 
        </p>
        <p class="weui-footer__text">Copyright © 2018 盐城师范学院小薇工作室</p>
		        <p class="weui-footer__text">By ZY</p>

      </div>
	      <div id="half" class='weui-popup__container popup-bottom'>
      <div class="weui-popup__overlay"></div>
      <div class="weui-popup__modal">
        <div class="toolbar">
          <div class="toolbar-inner">
            <a href="javascript:;" class="picker-button close-popup">关闭</a>
            <h1 class="title">教育发展基金会</h1>
          </div>
        </div>
        <div class="modal-content">
		  <div class="weui-panel">
        <div class="weui-panel__bd">
          <div class="weui-media-box weui-media-box_small-appmsg">
            <div class="weui-cells">
   
			      <a class="weui-cell weui-cell_access polaroid" href="http://ef.yctu.edu.cn/wechatInterface/auth?wechatId=132&redirect_uri=http%3A%2F%2Fef.yctu.edu.cn%2Fdist%2Findex.html" onClick='return wait();'>
                <div class="weui-cell__hd"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ico/2.png" alt="" style="width:100px;margin-right:5px;display:block"></div>
                <div class="weui-cell__bd weui-cell_primary">
                  <p style="COLOR:#000;text-align: center;">在线捐赠</p>
                </div>
                <span class="weui-cell__ft"></span>
              </a>
			      <a class="weui-cell weui-cell_access polaroid" href="http://ef.yctu.edu.cn/dist/index.html#/news?id=3" onClick='return wait();'>
                <div class="weui-cell__hd"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/ico/1.png" alt="" style="width:100px;margin-right:5px;display:block"></div>
                <div class="weui-cell__bd weui-cell_primary">
                  <p style="COLOR:#000;text-align: center;">捐赠指南</p>
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
<script type="text/javascript">
var count = document.getElementById("thelist").getElementsByTagName("img").length;	

for(i=0;i<count;i++){
	document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+document.body.clientWidth+"px";
}

document.getElementById("scroller").style.cssText = " width:"+document.body.clientWidth*count+"px";

setInterval(function(){
	myScroll.scrollToPage('next', 0,400,count);
},3500 );

window.onresize = function(){ 
	for(i=0;i<count;i++){
		document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+document.body.clientWidth+"px";
	}
	document.getElementById("scroller").style.cssText = " width:"+document.body.clientWidth*count+"px";
} 
</script>
 <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/jquery-2.1.4.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    $(function() {


        var share = {
            imgUrl: '<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/top2.png',
            link: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>',
            title: '盐师甲子校庆',
            desc: '盐城师范学院建校六十周年'
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
 <?php if(isset($params[0])&&!EMPTY($params[0])&&$_SESSION['my']=='QQ') { ?>
  $.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/home/qwait",
		 async:true, 
		 timeout : 5000,
		 data:"&isis=1",
		
        success:function(result){ 


	}, 
         error:function (result) {   

         }, 
  });
<?php } ?>
<?php if(isset($params[0])&&!EMPTY($params[0])&&$_SESSION['my']=='WB') { ?>
  $.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/home/twait",
		 async:true, 
		 timeout : 5000,
		 data:"&isis=1",
		
        success:function(result){ 


	}, 
         error:function (result) {   

         }, 
  });
<?php } ?>


    });
</script>
	        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/js/jquery-weui.js"></script>
		  <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/fastclick.js"></script>
		  <script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>
<?php if(isset($arrInfo['tjcode60'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode60'];?></div><?php } ?> 


 
</body>
</html>