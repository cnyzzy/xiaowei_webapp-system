<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<title>早锻炼排行榜</title>
<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/normalize3.0.2.min.css" />
<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/css.css?v=15" />
</head>
<body>
<div>
<b><?php if($data!="all") { ?><?php echo $data;?>
<?php } else { ?>总<?php } ?>排行榜</b></span>
<section id="ranking"> <span id="ranking_title">我的排行：<?php echo (empty($result2['No'])? '?':$result2['No'])?></span>
  <section id="ranking_list">

  
<?php if($Rnum==0) { ?>
 <section class="box cur">
 <section class="col_1"title="0">0</section>
<section class="col_2"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/assets/images/profile.png"  /></section>
 <section class="col_3">无数据</section>
  <section class="col_4">0步</section>
</section><?php } else { ?>
	<?php foreach((array)$RR as $key=>$row) {?>
	
 <section class="box<?php if($row['No']==(empty($result2['No'])? '?':$result2['No'])) { ?> cur<?php } ?> ">
 <section class="col_1" <?php if($row['No']=='1'||$row['No']=='2'||$row['No']=='3') { ?>title="<?php echo $row['No'];?>"<?php } ?>><?php echo $row['No'];?></section>
<section class="col_2"><img src="<?php echo $row['userimg'];?>"  /></section>
 <section class="col_3"><?php echo $row['name'];?>(<?php echo $row['nickname'];?>)</section>
  <section class="col_4"><?php echo $row['step2'];?>步</section>
</section>
   
 <?php }?>
<?php } ?>

<?php if($data!="all") { ?>

  <div style="clear:both;">
<div style="float:left;"><a  href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/zcqlist/<?php ECHO(date('Y-m-d',(strtotime($data) - 3600*24)))?>" title="前日">前一天</a> </div>
<div style="float:right;"><a  href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/zcqlist/<?php ECHO(date('Y-m-d',(strtotime($data) + 3600*24)))?>" title="后日">后一天</a></div>
</div>
  <a id="play_game" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/zcqlist/all" title="总榜">总榜</a> </section>
<?php } else { ?>

	  <a id="play_game" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/zcqlist" title="今日榜">今日榜单</a> </section>
<?php } ?>

<a id="return_back" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/zcq/" title="返回">返回</a>
</body>
</html>
