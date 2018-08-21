<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>校庆新闻——盐师六十周年</title>
	<meta name="viewport" content="width=100%; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
	<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery.min.js"></script>
	
	<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/home.css"/>
	<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/aui.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/default.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style.css"/>
<style>
.article {
    /* padding-top: 15px; */
    position: relative;
    overflow: hidden;
    background-color: #ffffff;
}
.aui-share-line h2 {
    font-size: 12px;
    position: absolute;
    left: 28%;
    top: -10px;
    background: #fff;
     padding: 0 0px; 
    color: #999;
}
h1 {
    font-size: 2em;
    margin: 0.07em 0;
}
.aui-main {
    padding-top: 45px;
    padding-bottom: 5px;
}
</style>
</head>
<body>

	<header class="aui-bar aui-bar-nav aui-bar-light">
		<a href="javascript:" onclick="history.back(); " class="aui-pull-left aui-btn" >
			<span class="aui-iconfont aui-icon-left">  </span>
		</a>
		<div class="aui-title">详情</div>
		<a class="aui-pull-right aui-btn ">
			<span class="aui-iconfont aui-icon-more">  </span>
		</a>
	</header>
	<div class="aui-main">
		<article class="article padding-side">
			<div>
				<h1 class="article-title"><?php if(empty($Array['title'])) { ?>空标题<?php } else { ?><?php echo $Array['title'];?><?php } ?></h1>
			</div>
			<div class="article-content">
				<?php if(empty($Array['content'])) { ?>空标题<?php } else { ?><?php echo $Array['content'];?><?php } ?>
			</div>
		</article>
	</div>
	<div class="aui-card-list-content">
		<div class="aui-bg-like"> <div class="heart <?php if($LikeNum>0) { ?>heartAnimation<?php } ?>" id="like1" rel="<?php if($LikeNum>0) { ?>unlike<?php } else { ?>like<?php } ?>"></div><div class="likeCount" id="likeCount1"><?php echo $Array['liku'];?></div>  喜欢</div>
		<div class="aui-share-icon clearfix">
			<div class="aui-share-line b-line clearfix">
				<h2>欢迎分享至</h2>
			</div>
			<ul class="clearfix" style="padding-top:15px; padding-bottom:10px;">
				<li><i  onclick="getWX();" class="aui-iconfont aui-icon-wechat"></i></li>
				<li><i onclick="getWXQ();" class="aui-iconfont aui-icon-wechat-circle"></i></li>
				<li><i onclick="getWB();" class="aui-iconfont aui-icon-weibo" style="color:#ff6178"></i></li>
			</ul>
		</div>

		
		<ul class="aui-list aui-media-list">
			<li class="aui-list-item aui-list-item-middle">
				<div class="aui-media-list-item-inner">
					<div class="aui-list-item-media">
						<img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/img/yctu.png" class="aui-img-round aui-list-img-sm">
					</div>
					<div class="aui-list-item-inner ">
						<div class="aui-list-item-text">
							<div class="aui-list-item-title"><?php if(empty($Array['editor'])) { ?>匿名作者<?php } else { ?><?php echo $Array['editor'];?><?php } ?></div>
																<div class="aui-card-list-user-info text-light"><?php echo(smartDate($Array['addtime'], 'Y-m-d H:i'))?></div>

						</div>
						<div class="aui-list-item-text">
							<?php echo $Array['dcontent'];?>

					</div></div>	
				</div>
			</li>
	
			</li>

		</ul>
	</div>
	<div class="aui-card-list-footer aui-text-center aui-list-item-arrow">
		Copyright © 2018 盐城师范学院小薇工作室
	</div>
	</div>
 <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/jquery-2.1.4.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script>
	$(document).ready(function()
	{
    
	$('body').on("click",'.heart',function()
    {
    	
    	var A=$(this).attr("id");
    	var B=A.split("like");
        var messageID=B[1];
        var C=parseInt($("#likeCount"+messageID).html());
    	$(this).css("background-position","")
        var D=$(this).attr("rel");
       
        if(D === 'like') 
        {      
      
      $("#likeCount"+messageID).html(C+1);
 $(this).addClass("heartAnimation").attr("rel","unlike");
        	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/z60news/do/like",
		data:"&id="+<?php echo $Array['id'];?>,
		beforeSend:function(){ 	},
		success:function(result){

		},
		error: function (XMLHttpRequest, textStatus, errorThrown) {
   $("#likeCount"+messageID).html(C-1);
        $(this).removeClass("heartAnimation").attr("rel","like");
        $(this).css("background-position","left");
        }
	})
        }
        else
        {
		 $("#likeCount"+messageID).html(C-1);
        $(this).removeClass("heartAnimation").attr("rel","like");
        $(this).css("background-position","left");
		  	$.ajax({
		type:"POST",async:true,
		url:"<?php echo $arrInfo['url'];?>/z60news/do/unlike",
		data:"&id="+<?php echo $Array['id'];?>,
		beforeSend:function(){  },
		success:function(result){

		},
		error: function (XMLHttpRequest, textStatus, errorThrown) {
  $("#likeCount"+messageID).html(C+1);
 $(this).addClass("heartAnimation").attr("rel","unlike");
        }
	})
     
        }


    });


	});
	</script>
<script>

  var share = {
            imgUrl: '<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/top2.png',
            link: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/details/<?php echo $Array['id'];?>',
            title: '<?php echo $Array['title'];?>',
            desc: '<?php echo $Array['dcontent'];?>'
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

function  getWX() {
WeixinJSBridge.invoke('sendAppMessage',{
"appid": "<?php echo $signPackage['appId'];?>",
"img_url": '<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/top2.png',
"img_width": "200",
"img_height": "200",
"link":'<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/details/<?php echo $Array['id'];?>',
"desc": '<?php echo $Array['dcontent'];?>',
"title": '<?php echo $Array['title'];?>'
}, function(res) {
//_report('send_msg', res.err_msg);
})
}
function  getWXQ() {
WeixinJSBridge.invoke('shareTimeline',{
"img_url": '<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/top2.png',
"img_width": "200",
"img_height": "200",
"link": '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/details/<?php echo $Array['id'];?>',
"desc": '<?php echo $Array['dcontent'];?>',
"title": '<?php echo $Array['title'];?>'
}, function(res) {
//_report('timeline', res.err_msg);
});
}
function getWB() {
WeixinJSBridge.invoke('shareWeibo',{
"content": '<?php echo $Array['dcontent'];?>',
"url":'<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/details/<?php echo $Array['id'];?>',
}, function(res) {
//_report('weibo', res.err_msg);
});
}

</script>
<?php if(isset($arrInfo['tjcode60'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode60'];?></div><?php } ?> 

</body>
</html>
