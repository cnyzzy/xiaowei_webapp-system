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
,a='<?php echo $a;?>'
,b='<?php echo $b;?>'
,c='<?php echo $c;?>';
</script>
<title>失物招领-<?php echo $arrInfo['name'];?></title>
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
			<li class="nav_help"><a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/myfeed"><i></i><span>查看我的动态</span><b></b><div class="clear"></div></a></li>
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
      <?php if(!EMPTY($NumArray['gxnum'])) { ?><?php echo $NumArray['gxnum'];?><?php } else { ?>0<?php } ?>
    </div>
  </div>
     <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>被评论数</p>
    </div>
    <div class="weui_cell_ft">
        <?php if(!EMPTY($NumArray['plnum'])) { ?><?php echo $NumArray['plnum'];?><?php } else { ?>0<?php } ?>
    </div>
  </div>     <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>被浏览数</p>
    </div>
    <div class="weui_cell_ft">
        <?php if(!EMPTY($NumArray['llnum'])) { ?><?php echo $NumArray['llnum'];?><?php } else { ?>0<?php } ?>
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
		<div id="sort">
			<table width="100%" border="0" cellspacing="0">
				<tr>
					<td class="sort_left">
						<div class="sort_cate">
							<div class="sort_b"><a href="#" onclick="return false;"><div class="sort_b_inner"><i class="cate_default"></i><span>全部地点</span><div class="clear"></div></div></a></div>
						</div>
					</td>
					<td>
						<div class="sort_sort">
							<div class="sort_b"><a href="#" onclick="return false;"><div class="sort_b_inner"><i class="cate_sort"></i><span>智能排序</span><div class="clear"></div></div></a></div>
						</div>
					</td>
					<td class="sort_right">
						<div class="sort_tag">
							<div class="sort_b"><a href="#" onclick="return false;"><div class="sort_b_inner"><i class="cate_tag"></i><span>全部</span><div class="clear"></div></div></a></div>
						</div>
					</td>
				</tr>
			</table>
		</div>
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
					</li><?php }?><?php } else { ?>
													<li>
						<div class="wrap">
						
								<div class="list_litpic fl"><img src="<?php echo $arrInfo['url'];?>/xw.jpg" /></div>
								<div class="list_info">
									<h4>欢迎使用小薇失物招领</h4>
									<h5><span><li class="home_profile_local"><i></i>无数据</li></span></h5>
									<div class="list_info_i">
										<dl class="list_info_views">
											<dt></dt>
											<dd>1</dd>
											<div class="clear"></div>
										</dl>
										<dl class="list_info_comment">
											<dt></dt>
											<dd>1</dd>
											<div class="clear"></div>
										</dl>
										<dl class="list_info_like">
											<dt></dt>
											<dd>1</dd>
											<div class="clear"></div>
										</dl>
										<dl class="list_info_time">
											<dt></dt>
											<dd><?php echo(smartDate(time(), 'y-m-d H:i'))?></dd>
											<div class="clear"></div>
										</dl>
										<div class="clear"></div>
									</div>
								</div>
								<div class="clear"></div>
							
						</div>
					</li>
             <?php } ?>
											</ul>	
				

			</div>	
		</div>
										<div class="button_sp_area" style="min-height:60px;max-height:70px; text-align: center;">
	<?php if(!empty($Array)&&$pagemax!=1) { ?><div <?php if($d>1&&$d<=$pagemax) { ?>onclick="urlpage('<?php echo $arrInfo['url'];?>/swzl/index/<?php echo $a;?>/<?php echo $b;?>/<?php echo $c;?>/<?php echo $qpage;?>');" <?php } ?> class="weui_btn weui_btn_primary weui_btn_inline<?php if($d<=1) { ?> weui_btn_disabled<?php } ?> divhref" style="width:30%;">上页</div>
		<div class="weui_btn weui_btn_default weui_btn_inline" style="width:20%;" id="picker" value="3">第<?php echo $d;?>页</div>
	<div <?php if($d<$pagemax) { ?>onclick="urlpage('<?php echo $arrInfo['url'];?>/swzl/index/<?php echo $a;?>/<?php echo $b;?>/<?php echo $c;?>/<?php echo $hpage;?>');" <?php } ?>class="weui_btn weui_btn_primary weui_btn_inline<?php if($d>=$pagemax) { ?> weui_btn_disabled<?php } ?> divhref" style="width:30%;">下页</div>
 <?php } ?>
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
               window.location.href = zurl+"/swzl/index/"+a+"/"+b+"/"+c+"/"+result['value'][0];
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
</script> 
		<div class="push_msk"></div>
	</div>

	<div id="sort_content">
		<div class="asort">
			<div class="hd">
				<div class="wrap">
					<div class="fl"><span>选择地点</span><div class="clear"></div></div>
					<div class="fr"></div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="ct">
				<div class="wrap">
					<ul class="choose_cate">
						<li <?php if($a=="index") { ?>class="a_selected"<?php } else { ?>c_data="index"<?php } ?> style="font-weight:700;"><i style="background:none;width:0;margin-right:0;" class="s"></i><span>全部地点</span><i class="e"></i></li>
													<li style="font-weight:700;" <?php if($a=="2") { ?>class="a_selected"<?php } else { ?>c_data="2"<?php } ?> style="background:#f7f7f7;"><i style="margin-right:0;background:none;width:0;" class="s"></i><span>新长校区</span><i class="e"></i></li>
															<li <?php if($a=="21") { ?>class="a_selected"<?php } else { ?>c_data="21"<?php } ?> ><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>公共教学楼</span><i class="e"></i></li>
															<li <?php if($a=="22") { ?>class="a_selected"<?php } else { ?>c_data="22"<?php } ?> ><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>操场/体育馆</span><i class="e"></i></li>
															<li <?php if($a=="23") { ?>class="a_selected"<?php } else { ?>c_data="23"<?php } ?> ><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>食堂</span><i class="e"></i></li>
															<li <?php if($a=="24") { ?>class="a_selected"<?php } else { ?>c_data="24"<?php } ?> ><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>其他教学楼</span><i class="e"></i></li>
															<li <?php if($a=="25") { ?>class="a_selected"<?php } else { ?>c_data="25"<?php } ?> ><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>实验楼</span><i class="e"></i></li>
															<li <?php if($a=="26") { ?>class="a_selected"<?php } else { ?>c_data="26"<?php } ?> ><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>图书馆</span><i class="e"></i></li>
															<li <?php if($a=="27") { ?>class="a_selected"<?php } else { ?>c_data="27"<?php } ?> ><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>道路</span><i class="e"></i></li>
															<li <?php if($a=="28") { ?>class="a_selected"<?php } else { ?>c_data="28"<?php } ?> ><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>商业街/创业园</span><i class="e"></i></li>
															<li <?php if($a=="29") { ?>class="a_selected"<?php } else { ?>c_data="29"<?php } ?> ><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>其他</span><i class="e"></i></li>

														<li style="font-weight:700;"  <?php if($a=="3") { ?>class="a_selected"<?php } else { ?>c_data="3"<?php } ?>style="background:#f7f7f7;"><i style="margin-right:0;background:none;width:0;" class="s"></i><span>通榆校区</span><i class="e"></i></li>
															<li <?php if($a=="31") { ?>class="a_selected"<?php } else { ?>c_data="31"<?php } ?>><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>主楼</span><i class="e"></i></li>
															<li <?php if($a=="32") { ?>class="a_selected"<?php } else { ?>c_data="32"<?php } ?>><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>图书馆</span><i class="e"></i></li>
															<li <?php if($a=="33") { ?>class="a_selected"<?php } else { ?>c_data="33"<?php } ?>><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>操场/体育馆</span><i class="e"></i></li>
															<li <?php if($a=="34") { ?>class="a_selected"<?php } else { ?>c_data="34"<?php } ?>><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>食堂</span><i class="e"></i></li>
															<li <?php if($a=="35") { ?>class="a_selected"<?php } else { ?>c_data="35"<?php } ?>><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>其他教学楼</span><i class="e"></i></li>
															<li <?php if($a=="36") { ?>class="a_selected"<?php } else { ?>c_data="36"<?php } ?>><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>道路</span><i class="e"></i></li>
															<li <?php if($a=="37") { ?>class="a_selected"<?php } else { ?>c_data="37"<?php } ?>><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>其他</span><i class="e"></i></li>

														<li style="font-weight:700;"  <?php if($a=="4") { ?>class="a_selected"<?php } else { ?>c_data="4"<?php } ?> style="background:#f7f7f7;"><i style="margin-right:0;background:none;width:0;" class="s"></i><span>附近</span><i class="e"></i></li>
															<li  <?php if($a=="41") { ?>class="a_selected"<?php } else { ?>c_data="41"<?php } ?>><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>育才路</span><i class="e"></i></li>
															<li  <?php if($a=="42") { ?>class="a_selected"<?php } else { ?>c_data="42"<?php } ?>><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>宝龙</span><i class="e"></i></li>
															<li  <?php if($a=="43") { ?>class="a_selected"<?php } else { ?>c_data="43"<?php } ?>><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>金鹰</span><i class="e"></i></li>
															<li  <?php if($a=="44") { ?>class="a_selected"<?php } else { ?>c_data="44"<?php } ?>><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>盐城工学院</span><i class="e"></i></li>
															<li  <?php if($a=="45") { ?>class="a_selected"<?php } else { ?>c_data="45"<?php } ?>><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>中南城</span><i class="e"></i></li>
															<li  <?php if($a=="46") { ?>class="a_selected"<?php } else { ?>c_data="46"<?php } ?>><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>其他</span><i class="e"></i></li>

																				<li style="font-weight:700;" <?php if($a=="5") { ?>class="a_selected"<?php } else { ?>c_data="5"<?php } ?> style="background:#f7f7f7;"><i style="margin-right:0;background:none;width:0;" class="s"></i><span>交通</span><i class="e"></i></li>
															<li  <?php if($a=="51") { ?>class="a_selected"<?php } else { ?>c_data="51"<?php } ?>><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>公交</span><i class="e"></i></li>
															<li  <?php if($a=="52") { ?>class="a_selected"<?php } else { ?>c_data="52"<?php } ?>><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>出租车</span><i class="e"></i></li>
															<li  <?php if($a=="53") { ?>class="a_selected"<?php } else { ?>c_data="53"<?php } ?>><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>长途客车/火车</span><i class="e"></i></li>
															<li  <?php if($a=="54") { ?>class="a_selected"<?php } else { ?>c_data="54"<?php } ?>><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>公共自行车</span><i class="e"></i></li>
															<li  <?php if($a=="55") { ?>class="a_selected"<?php } else { ?>c_data="55"<?php } ?>><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>其他</span><i class="e"></i></li>
															<li style="font-weight:700;" <?php if($a=="6") { ?>class="a_selected"<?php } else { ?>c_data="6"<?php } ?> style="background:#f7f7f7;"><i style="margin-right:0;background:none;width:0;" class="s"></i><span>其他</span><i class="e"></i></li>
															<li  <?php if($a=="61") { ?>class="a_selected"<?php } else { ?>c_data="61"<?php } ?>><i style="background:none;width:10px;margin-right:0;" class="s"></i><span>其他</span><i class="e"></i></li>
																		</ul>
					<div class="clear"></div>
				</div>
			</div>
		</div>
				
		<div class="asort">
			<div class="hd">
				<div class="wrap">
					<div class="fl"><span>选择排序</span><div class="clear"></div></div>
					<div class="fr"></div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="ct">
				<div class="wrap">
					<ul class="choose_sort">
													<li <?php if($b=="index") { ?>class="a_selected"<?php } else { ?>t_data="index"<?php } ?>><i class="s"></i><span>智能推荐</span><i class="e"></i></li>
													<li <?php if($b=="gx") { ?>class="a_selected"<?php } else { ?>t_data="gx"<?php } ?> ><i class="s"></i><span>最多关心</span><i class="e"></i></li>
													<li <?php if($b=="ll") { ?>class="a_selected"<?php } else { ?>t_data="ll"<?php } ?>><i class="s"></i><span>最多浏览</span><i class="e"></i></li>
													<li <?php if($b=="pl") { ?>class="a_selected"<?php } else { ?>t_data="pl"<?php } ?>><i class="s"></i><span>最多评论</span><i class="e"></i></li>
													<li <?php if($b=="fb") { ?>class="a_selected"<?php } else { ?>t_data="fb"<?php } ?>><i class="s"></i><span>最新发布</span><i class="e"></i></li>
											</ul>
					<div class="clear"></div>
				</div>
			</div>
		</div>

		<div class="asort">
			<div class="hd">
				<div class="wrap">
					<div class="fl"><i></i><span>类型</span><div class="clear"></div></div>
					<div class="fr"></div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="ct">
				<div class="wrap">
			
					<ul class="choose_sort">
												<li <?php if($c=="index") { ?>class="a_selected"<?php } else { ?>s_data="index"<?php } ?>><i class="s"></i><span>所有</span><i class="e"></i></li>
												<li <?php if($c=="sw") { ?>class="a_selected"<?php } else { ?>s_data="sw"<?php } ?>><i class="s"></i><span>失物</span><i class="e"></i></li>
												<li <?php if($c=="zl") { ?>class="a_selected"<?php } else { ?>s_data="zl"<?php } ?>><i class="s"></i><span>招领</span><i class="e"></i></li>
											</ul>
					<div class="clear"></div>
				</div>
			</div>
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
	<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
</body>
</html>