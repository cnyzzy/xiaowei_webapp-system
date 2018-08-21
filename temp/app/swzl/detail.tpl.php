<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style.css" />
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>

<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<script>
var logined = 1;
var zurl = "<?php echo $arrInfo['url'];?>";
var idid = <?php echo $id;?>;
var idnumber = <?php echo $number;?>;
var idimg = '<?php echo $img;?>';
var idname = '<?php echo $name;?>';
function de(id){
$.confirm({
  title: '删除',
  text: '是否删除此评论',
  onOK: function () {
	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/swzl/do/dereply",
		data:"&id="+id,
		beforeSend:function(){},
		success:function(result){
 $('.us_panel_post').find('span em').html(parseInt($('.us_panel_post').find('span em').html()) - 1);
  $('#plnumpl').html(parseInt($('#plnumpl').html()) - 1);
				$("#"+id).remove();
			
		}
	})
  },
  onCancel: function () {
  $.toast("取消操作", "cancel");
  }
});

}
</script>
<title>[<?php if($Array['stype']=='zl') { ?>招领<?php } else { ?>失物<?php } ?>] <?php echo $Array['title'];?></title>
</head>

<body>
		<div id="menu">
		<div class="search_wrap">
			<form action="" method="get">
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

	<div id="header" class="head">
		<div class="wrap">
			<i class="menu_back"><a href="javascript:history.go(-1);"></a></i>
			<div class="title">
				<span class="title_d"><p>[<?php if($Array['stype']=='zl') { ?>招领<?php } else { ?>失物<?php } ?>] <?php echo $Array['title'];?></p></span>
				<div class="clear"></div>
			</div>
			<!-- <i class="menu_share"></i> -->
		</div>
	</div>
	
	<div id="container">
		<div id="content">
						<div style="height:1px"></div>
						
			<div id="works">
				<div class="pd5">
				
					<div class="list_info_i" style="margin-top:5px;">
						<dl class="list_info_views">
							<dt></dt>
							<dd><?php echo $Array['ll'];?></dd>
							<div class="clear"></div>
						</dl>
						<dl class="list_info_comment">
							<dt></dt>
							<dd><?php echo $ReplyNum;?></dd>
							<div class="clear"></div>
						</dl>
						<dl class="list_info_like">
							<dt></dt>
							<dd><?php echo $Array['gx'];?></dd>
							<div class="clear"></div>
						</dl>
						<dl class="works_view">
							<dt></dt>
							<dd><?php echo(smartDate($Array['addtime'], 'y-m-d H:i'))?></dd>
							<div class="clear"></div>
						</dl>
						<div class="clear"></div>
					</div>

										
										<div class="clear"></div>
											<div class="article_ct">
											<h4>物品名称: <?php echo $Array['tname'];?></h4>
											<h5> &nbsp;</h5>
											<h5>地点区域: <?php if(!empty($wa)) { ?><?php echo $wa;?><?php } ?><?php if(!empty($wb)) { ?> - <?php echo $wb;?><?php } ?></h5>
											<h5>详细地点: <?php echo $Array['mwhere'];?></h5>
											<h5> &nbsp;</h5>
												<div class="clear"></div>
												<p><img src="<?php echo $Array['img'];?>" /></p>	<div class="clear"></div>
												<p><?php echo $Array['content'];?></p>	<div class="clear"></div>
											<h5> &nbsp;</h5>
											<h4>联系方式</h4>
											<h5>姓名: <?php echo $Array['name'];?>(<?php echo $Array['xy'];?>)</h5>
											<h5>QQ: <?php echo $Array['qq'];?></h5>
											<h5>手机: <?php echo $Array['mobile'];?></h5>
											<h5> &nbsp;</h5>
						</div>
						<div class="clear"></div>
										
				</div>
			</div>
						<div id="more_about">
				<h4>相关信息</h4>
				<div class="more_about">
					<table width="100%" border="0" cellspacing="5">
						<tr> <?php if(!empty($ArrayXG)) { ?>	  	
						<?php foreach((array)$ArrayXG as $key=>$loopChildX) {?><td><a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/detail/<?php echo $loopChildX['id'];?>"><img class="list_litpic2 fl" src="<?php echo $loopChildX['img'];?>" /></a></td><?php }?>
             <?php } ?> 
						</tr>
					</table>
				</div>
			</div>
									<div id="comment">
				<div class="comment_other">
					<h4>全部评论: <td class="us_panel_post"> <span> <em id="plnumpl"><?php echo $ReplyNum;?></em> </span> </td>条</h4>
				</div>
				<ul>
					<?php if(!empty($ArrayReply)) { ?>	  	<?php foreach((array)$ArrayReply as $key=>$loopChild) {?>
					<a name="pl<?php echo $loopChild['id'];?>"></a>
					<li id="<?php echo $loopChild['id'];?>" sid="<?php echo $loopChild['sid'];?>">
						<div class="pd5">
							<a class="avt fl" target="_blank"><img src="<?php echo $loopChild['img'];?>" /></a>
							<div class="comment_content">
								<h5>
									<div class="fl"><a class="comment_name"><?php echo $loopChild['name'];?></a><span><?php echo(smartDate($loopChild['addtime'], 'y-m-d H:i'))?></span></div>
								<?php if($number==$Array['number']) { ?><div class="fr reply_this">[回复]</div><div onclick="de('<?php echo $loopChild['id'];?>');" class="fr de_this">[删除]</div><?php } ?>	<?php if($number==$loopChild['number']&&$number!=$Array['number']) { ?><div onclick="de('<?php echo $loopChild['id'];?>');" class="fr de_this">[删除]</div><?php } ?>
									<div class="clear"></div>
								</h5>
								<div class="comment_p">
								<div class="comment_pct"><?php echo $loopChild['reply'];?></div><?php if(!empty($loopChild['editreply'])) { ?><div class="quote"><div class="pd10"><font color="red"><?php echo $loopChild['name'];?></font>:<?php echo $loopChild['editreply'];?></div></div><?php } ?>
																</div>
							</div>
							<div class="clear"></div>
							<div class="comment_reply"></div>
						</div>
					</li><?php }?>
             <?php } ?>
										
			
									</ul>
				<div class="pd5">	<h5> &nbsp;</h5>
									</div>	<h5> &nbsp;</h5>
			</div>
		</div>

	</div>
	
	
	
	<div id="us_panel_menu">
		<div class="us_panel_msk"></div>
		<div class="us_panel_menu_t">
			<table width="100%" cellspacing="0">
				<tr>
					<td valign="top" class="us_panel_menu_index">
						<a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>"><i></i><span>首页</span></a>
					</td>
					<td valign="top" class="us_panel_menu_designer">
						<a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/my"><i></i><span>我的</span></a>
					</td>
					<td valign="top" class="us_panel_menu_help">
						<a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/add"><i></i><span>发布</span></a>
					</td>
					<td valign="top" class="us_panel_menu_about">
						<div onclick='$.alert("   小薇工作室出品   <br>By:ZY<br>2017.03", "关于");' ><i></i><span>关于</span></div>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<?php if($Array['isok']==1) { ?>
	<div id="us_panel2">
		<table width="100%" height="100%" cellspacing="0" border="0">
			<tr>
				<td class="us_panel_like <?php if(@$Array['gx']!=0) { ?>liked<?php } ?>"><i></i><span>关心(<em><?php echo $Array['gx'];?></em>)</span></td>
				<td class="us_panel_menu"><div class="arrow_top"></div><i></i><div class="us_panel_menu_left"></div><div class="us_panel_menu_right"></div></td>
				<td class="us_panel_post"><i></i><span>评论(<em><?php echo $ReplyNum;?></em>)</span></td>
			</tr>
		</table>
	</div>

	<div id="add_newpost">
		<div class="add_newpost">
			<table width="100%" height="100%" cellspacing="5">
				<tr>
					<td class="add_newpost_cancel">取消</td>
					<td class="add_newpost_post">评论</td>
				</tr>
			</table>
		</div>
		<div class="newpost_w">
			<div class="pd10">
				<div class="newpost_w_t">
					<textarea></textarea>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	
	
	<div id="share">
		<div class="share_msk"></div>
		<div class="share">
			<table width="100%" cellspacing="10" border="0">
				<tr>
					<td class="sina"><a href="http://www.htmlsucai.com" target="_blank"></a></td>
					<td class="guangbo"><a href="http://www.htmlsucai.com" target="_blank"></a></td>
					<td class="facebook"><a target="_blank" href="http://www.facebook.com/sharer.php?u=http://www.ke01.com/post/3377/&t=%E7%AE%80%E6%B4%81%E7%BD%91%E9%A1%B5%E5%8D%95%E9%A1%B5(%E5%90%ABPSD%E6%96%87%E4%BB%B6)&images=http://cdn.ke01.com/201401/1389608264889.jpg"></a></td>
					<td class="twitter"><a target="_blank" href="http://twitter.com/share?text=%E7%AE%80%E6%B4%81%E7%BD%91%E9%A1%B5%E5%8D%95%E9%A1%B5(%E5%90%ABPSD%E6%96%87%E4%BB%B6)&url=http://www.ke01.com/post/3377/&pic=http://cdn.ke01.com/201401/1389608264889.jpg"></a></td>
				</tr>
			</table>
			<div class="pd10">
				<div class="cancel_share"><a href="" onclick="return false;">取消分享</a></div>
			</div>
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

				<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
			<script language="javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/zepto.min.js"></script>
	<script language="javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/fx.js"></script>
	<script language="javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/script.js"></script>
</body>
</html>