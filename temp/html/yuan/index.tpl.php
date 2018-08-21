<?php defined('ZRoot') or die('Access Denied.'); ?><?php include template('header'); ?>
<body>
<div id="wrap">
	
<div id="header">
    <div class="logo"><a href="<?php echo $arrInfo['url'];?>">点滴记忆</a><p>使用emlog搭建的站点</p></div>
    <div id="navigation">
	
		<ul id="nav">
			<li class="current"><a href="<?php echo $arrInfo['url'];?>" >首页</a></li>
			<li class="common"><a href="<?php echo $arrInfo['url'];?>/admin" >登录</a></li>
		</ul>
	
    <ul class="my">
        <li><a href="#"><i class="iconfont">&#260;</i>关注我</a>
            <ul>
                <li><a href="<?php echo $arrInfo['url'];?>/rss.php" rel="external nofollow" target="_blank"><i class="iconfont">&#483;</i>RSS订阅</a>
                    <ul>
                    <li><a href="<?php echo $arrInfo['url'];?>/rss.php" rel="external nofollow" target="_blank">RSS Feed</a></li>
                    <li><a href="http://mail.qq.com/cgi-bin/feed?u=<?php echo $arrInfo['url'];?>/rss.php" rel="external nofollow" target="_blank">订阅到 QQ邮箱</a></li>
                    <li><a href="http://reader.youdao.com/b.do?keyfrom=bookmarklet&url=<?php echo $arrInfo['url'];?>/rss.php" rel="external nofollow" target="_blank">订阅到 有道阅读</a></li>
                    <li><a href="http://xianguo.com/subscribe?url=<?php echo $arrInfo['url'];?>/rss.php" rel="external nofollow" target="_blank">订阅到 鲜果</a></li>
                    <li><a href="http://www.zhuaxia.com/add_channel.php?sourceid=102&url=<?php echo $arrInfo['url'];?>/rss.php" rel="external nofollow" target="_blank">订阅到 抓虾</a></li>
                    <li><a href="http://www.google.com/ig/add?feedurl=<?php echo $arrInfo['url'];?>/rss.php" rel="external nofollow" target="_blank">订阅到 iGoogle</a></li>
                    </ul>
                </li>
                <li><a href="http://t.qq.com/liuhaotian0520" rel="external nofollow" target="_blank"><i class="iconfont">&#468;</i>新浪微博</a></li>
                <li><a href="http://weibo.com/u/1597089980" rel="external nofollow" target="_blank"><i class="iconfont">&#469;</i>腾讯微博</a></li>
            </ul>
        </li>
    </ul>
    </div>
</div>
<div id="content"><div id="main">
<div id="lastRSS" class="lastRSS_loding"></div>		<div class="post_list">
			<h2><a href="<?php echo $arrInfo['url'];?>/?post=1">欢迎使用emlog</a></h2>
			<div class="info"><a href="<?php echo $arrInfo['url'];?>/?author=1" >ZY</a> | 	 | 2013-07-03</div>
			<div class="excerpt">
				恭喜您成功安装了emlog，这是系统自动生成的演示文章。编辑或者删除它，然后开始您的创作吧！								<span class="more">[<a href="<?php echo $arrInfo['url'];?>/?post=1" class="more-link" style="opacity: 1;">阅读全文</a>]</span>
							</div>
			<div class="meta">
				<span class="meat_span"><i class="iconfont">&#279;</i>0次浏览</span>
				<span class="meat_span"><i class="iconfont">&#54;</i><a href="<?php echo $arrInfo['url'];?>/?post=1#comments">0条评论</a></span>
				<span class="meat_span meat_max"><i class="iconfont">&#48;</i></span>
			</div>
		</div>
<div class="navigation">
	<div class="pagination">
			</div>
</div>
</div>
<div id="sidebar">
<div id="search">
		<form id="searchform" method="get" action="<?php echo $arrInfo['url'];?>/">
			<input type="text" value="" name="keyword" id="s" size="30" x-webkit-speech>
			<button type="submit" id="searchsubmit"><i class="iconfont">&#337;</i></button>
		</form>
</div>
<div class="sidebar">
	<div class="widget nowrap">
	<h3><span>存档</span></h3>
	<ul id="record">
		<li><a href="<?php echo $arrInfo['url'];?>/?record=201307">2013年7月(1)</a></li>
		</ul>
	</div>
	<div class="widget nowrap">
	<h3><span>最新评论</span></h3>
	<ul id="newcomment">
		</ul>
	</div>
	<div class="widget nowrap">
	<h3><span>链接</span></h3>
	<ul id="link">
		<li><a href="http://www.emlog.net" title="emlog官方主页" target="_blank">emlog</a></li>
		</ul>
	</div>
	<div class="widget">
	<div id="search">
	<h3><span>搜索</span></h3>
		<form id="searchform" method="get" action="<?php echo $arrInfo['url'];?>/">
			<input type="text" value="" name="keyword" id="s" size="30" x-webkit-speech>
			<button type="submit" id="searchsubmit"><i class="iconfont">&#337;</i></button>
		</form>
	</div>
	</div>
</div>
</div><!--end #siderbar-->
</div>
<div id="totop" class="totop"><i class="iconfont">&#404;</i>回顶部</div>
<script type="text/javascript">
	$(window).scroll(function () {
        var dt = $(document).scrollTop();
        var wt = $(window).height();
        if (dt <= 0) {
            $("#totop").hide();
            return;
        }
        $("#totop").show();
        if ($.browser.msie && $.browser.version == 6.0) {//IE6返回顶部
            $("#totop").css("top", wt + dt - 110 + "px");
        }
    });
    $("#totop").click(function () { $("html,body").animate({ scrollTop: 0 }, 200) });
</script>
</div>
<div style="clear:both;"></div>
<?php include template('footer'); ?>