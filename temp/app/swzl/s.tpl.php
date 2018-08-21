<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style.css" />
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
		<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
		<script language="javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/zepto.min.js"></script>
<script>
var logined = 1
,a='<?php echo $a;?>';
</script>
<title>搜索-失物招领-<?php echo $arrInfo['name'];?></title>
</head>

<body>
<script>
var now_page = <?php echo $d;?>,
now_pagee = <?php echo $d;?>,
search_value = '';
var zurl = "<?php echo $arrInfo['url'];?>";
</script>

		<div id="menu">
		<div class="search_wrap">
			<form action="<?php echo $arrInfo['url'];?>/swzl/s" method="post">
				<input type="text" name="search" class="search_input" placeholder="关键字查找" />
				<i class="reset_input"><i></i></i>
			</form>
		</div>
		<ul>
<li class="nav_index menu_cur"><a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>"><i></i><span>首页</span><b></b><div class="clear"></div></a></li>
			<li class="nav_about"><a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/add"><i></i><span>发布失物招领</span><b></b><div class="clear"></div></a></li>
			<li class="nav_help"><a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/my/feed"><i></i><span>查看我的动态</span><b></b><div class="clear"></div></a></li>
			<li class="nav_site"><a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/my"><i></i><span>查看我的发布</span><b></b><div class="clear"></div></a></li>
		</ul>
	</div>
		<div id="user">
					<div class="account">
				<div class="login_b_t">
					<div class="pd10">
						<div class="fl">您的概况</div><div class="fr"><br><a id="reg_now" href="" onclick="return false;">使用说明</a></div><div class="clear"></div>
					</div>
				</div>
			</div>
			<div class="pd10">
					<div class="login_b_i">
						<div class="login_input"><div class="weui_cells">
							 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>总发布数</p>
    </div>
    <div class="weui_cell_ft">
      <?php echo $NumNumber;?>
    </div>
  </div>
   <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>被关心数</p>
    </div>
    <div class="weui_cell_ft">
      <?php echo $NumArray['gxnum'];?>
    </div>
  </div>
     <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>被评论数</p>
    </div>
    <div class="weui_cell_ft">
      <?php echo $NumArray['plnum'];?>
    </div>
  </div>     <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>被浏览数</p>
    </div>
    <div class="weui_cell_ft">
      <?php echo $NumArray['llnum'];?>
    </div>
  </div></div>
  						<div class="weui_cells">
						 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>关心数</p>
    </div>
    <div class="weui_cell_ft">
      <?php echo $LikeNum;?>
    </div>
  </div>
						<div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>评论数</p>
    </div>
    <div class="weui_cell_ft">
       <?php echo $ReplyNum;?> 
    </div>
  </div> </div>
						</div>
					</div>
					
				<div class="login_quick">
					<p>查看</p>
					<a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/mygx" id="weibo_app"><span>我的关心</span></a>
					<a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/mypl" id="qq_connect"><span>我的评论</span></a>
				</div>
			</div> 
			</div>	
	<div id="header">
		<div class="wrap">
			<i class="menu_open"></i>
			<div class="logo"><a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>" title="失物招领"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/logo.png" /></a></div>
			<i class="search_open"></i>
		</div>
		<div class="logo_msk"></div>
	</div>
	<div id="container">

	<div id="content">	
			<div id="list">
				<ul> <?php if(!empty($Array)) { ?>	  	<?php foreach((array)$Array as $key=>$loopChild) {?>
										<li>
						<div class="wrap">
							<a class="alist" vhref="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/detail/<?php echo $loopChild['id'];?>">
								<div class="list_litpic fl"><img src="<?php echo $loopChild['img'];?>" /></div>
								<div class="list_info">
									<h4> [<?php if($loopChild['stype']=='zl') { ?>招领<?php } else { ?>失物<?php } ?>] <?php echo $loopChild['title'];?></h4>
									<h5><span><li class="home_profile_local"><i></i><?php if(!empty($wherea[$loopChild['id']])) { ?><?php echo $wherea[$loopChild['id']];?><?php } ?><?php if(!empty($whereb[$loopChild['id']])) { ?> - <?php echo $whereb[$loopChild['id']];?><?php } ?></li></span></h5>
									<div class="list_info_i">
										<dl class="list_info_views">
											<dt></dt>
											<dd><?php echo $loopChild['ll'];?></dd>
											<div class="clear"></div>
										</dl>
										<dl class="list_info_comment">
											<dt></dt>
											<dd><?php echo $loopChild['pl'];?></dd>
											<div class="clear"></div>
										</dl>
										<dl class="list_info_like">
											<dt></dt>
											<dd><?php echo $loopChild['gx'];?></dd>
											<div class="clear"></div>
										</dl>
										<dl class="list_info_time">
											<dt></dt>
											<dd><?php echo(smartDate($loopChild['addtime'], 'y-m-d H:i'))?></dd>
											<div class="clear"></div>
										</dl>
										<div class="clear"></div>
									</div>
								</div>
								<div class="clear"></div>
							</a>
						</div>
					</li><?php }?>
					<?php } else { ?>
											<div class="weui_msg">
  <div class="weui_icon_area"><i class="weui_icon_info weui_icon_msg"></i></div>
  <div class="weui_text_area">
    <h2 class="weui_msg_title">搜索结果为空</h2>
    <p class="weui_msg_desc">您搜索的内容为空，可能该信息未通过审核或已完结，亦或者是不存在。</p>
  </div>
  <div class="weui_opr_area">
    <p class="weui_btn_area">
      <a href="<?php echo $arrInfo['url'];?>/swzl" class="weui_btn weui_btn_primary">确定</a>
    </p>
  </div>
  <div class="weui_extra_area">
    <a href="<?php echo $arrInfo['url'];?>/swzl/myfeed">查看我的动态</a>
  </div>
</div>
             <?php } ?>
											</ul>	
				

			</div>	
		</div>
										<div class="button_sp_area" style="min-height:60px;max-height:70px; text-align: center;">
	<?php if(!empty($Array)&&$pagemax!=1) { ?><div <?php if($d>1&&$d<=$pagemax) { ?>onclick="urlpage('<?php echo $arrInfo['url'];?>/swzl/s/<?php echo $a;?>/<?php echo $qpage;?>');" <?php } ?> class="weui_btn weui_btn_primary weui_btn_inline<?php if($d<=1) { ?> weui_btn_disabled<?php } ?> divhref" style="width:30%;">上页</div>
		<div class="weui_btn weui_btn_default weui_btn_inline" style="width:20%;" id="picker" value="<?php echo $d;?>">第<?php echo $d;?>页</div>
	<div <?php if($d<$pagemax) { ?>onclick="urlpage('<?php echo $arrInfo['url'];?>/swzl/s/<?php echo $a;?>/<?php echo $hpage;?>');" <?php } ?>class="weui_btn weui_btn_primary weui_btn_inline<?php if($d>=$pagemax) { ?> weui_btn_disabled<?php } ?> divhref" style="width:30%;">下页</div>

		</div>
	<script type="text/javascript"> 
	$("#picker").picker({
  title: "跳转的页码",
  cols: [
    {
textAlign: 'center',
 values: [<?php for($y=1; $y<=$pagemax; $y++) {?>'<?php echo $y;?>',<?php } ?>],
}],

onClose: function (result) {  
if(result['value'][0]!=now_pagee){
  $('html').addClass('loading');
            setTimeout(function() {
               window.location.href = zurl+"/swzl/s/"+a+"/"+result['value'][0];
            },
            400);
            }}  
});
 function urlpage(url)  {  
 $('html').addClass('loading');
            setTimeout(function() {
                window.location.href = url;
            },
            400);
 }
</script>  <?php } ?>
		<div class="push_msk"></div>
	</div>

	</div>
	<div id="newwrap_t" class="newwrap">
		<div class="newwrap_msk"></div>
		<iframe id="newwrap" frameborder="0" width="100%" height="100%"></iframe>
	</div>
	<div id="reg_index">
		<div class="reg_bar">
			<div class="wrap">
				<span class="fl"><i></i>使用说明</span>
				<i class="reg_bar_close fr"></i>
				<div class="clear"></div>
			</div>
		</div>
		<div class="wrap reg_ct">
			<p>您可以发布失物招领信息，但是必须经过审核才能显示。<br />审核过后的信息将不能被编辑。</p>
			<span><i></i>重要物品或较多关心的信息我们将通过微信公众号、QQ智慧校园等渠道进行推送</span>
			<span><i></i>有任何问题均可咨询微信公众号:YCTU-1958</span>
		</div><div class="weui_cells">

</div>
	</div>
	<div class="loading_dark"></div>
	<div id="loading_mask">
		<div class="loading_mask">
			<ul class="anm">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
	</div>
	
	<script language="javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/fx.js"></script>
	<script language="javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/script.js"></script>
	
</body>
</html>