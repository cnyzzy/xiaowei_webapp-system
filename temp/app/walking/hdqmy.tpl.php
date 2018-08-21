<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>个人记录-健步走-活动区</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/my/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/my/css/htmleaf-demo.css">
	       <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
	<!--[if IE]>
		<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/my/js/html5shiv.min.js"></script>
	<![endif]-->
</head>
<body>
	<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/my/js/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script>window.jQuery || document.write('<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/my/js/jquery-2.1.1.min.js"><\/script>')</script>
	<script>$(document).ready(function(){


})</script>  <article style="bottom: 54px;">
	<div class="htmleaf-container">
		<div class="htmleaf-header">
			<h1>个人步数记录<span>活动区</span></h1>
		</div>          
		<h1></h1>
                <div class="weui_cell_bd weui_cell_primary">
                    <div class="weui-row weui-no-gutter">
                        </div>
                </div>
              <div class="weui_cell_bd weui_cell_primary">
                    <div class="weui-row weui-no-gutter">
                        </div>
                </div>
		<div class="circles" style="top:30%">
			<div class="circle" id='C'> 
				<canvas id='wcMotion' style="width:912px; height:515px; -webkit-tap-highlight-color: rgba(0,0,0,0);"></canvas>
			</div>
		</div>
	</div>
	        
            <div class="weui_cells weui_cells_access animated fadeInRight">
          <a class="weui_cell" >
                <div class="weui_cell_bd weui_cell_primary">
                    <div class="weui-row weui-no-gutter">
                        <div class="label weui-col-20">姓名:</div>
                        <div class="weui-col-60"><?php echo $cname;?></div>
                        <div class="weui_btn weui_btn_mini weui_btn_primary"><?php if($ctype=='1') { ?>学生<?php } ?><?php if($ctype=='2') { ?>教职工<?php } ?><?php if($ctype=='3') { ?>访客<?php } ?></div>
                    </div>
                </div>
              </a>
	<a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>参与次数</p>
    </div>
    <div class="weui_cell_ft"><?php if(!empty($Rnum)) { ?><?php echo $Rnum;?><?php } else { ?>0<?php } ?>次</div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>最高步数</p>
    </div>
    <div class="weui_cell_ft"><?php if(!empty($Rstep)) { ?><?php echo $Rstep['step2'];?><?php } else { ?>0<?php } ?>步</div>
  </a>
               </div><?php if(!empty($RR)) { ?>
			     <div class="weui_cells">
				 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>最近20次记录</p>
    </div>
    <div class="weui_cell_ft">
      *未审核
    </div>
  </div>	</div> <div class="weui_cells weui_cells_access"> <?php foreach((array)$RR as $key=>$row) {?>
  <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/hdqlist/<?php echo $row['data'];?>">
    <div class="weui_cell_bd weui_cell_primary">
      <p><?php echo $row['data'];?></p>
    </div>
    <div class="weui_cell_ft"><?php echo $row['step'];?><?php if($row['isok']==0) { ?>*<?php } ?></div>
  </a>   
 <?php }?></div>   <div class="weui_cells">
			 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">
     
    </div>
  </div>  <a href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/hdq" class="weui_btn weui_btn_plain_default">返回活动区</a>
  			 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">
     
    </div>
  </div>
</div>          
  <?php } ?>
 
       </article>
	<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/my/dist/wc-motion-chart.js"></script>
	<script>
	 $("#C").width($(window).width()); 
 $("#wcMotion").width($(window).width()); 
  $("#C").height($(window).width()/912*515); 
 $("#wcMotion").height($(window).width()/912*515); 
/* load image*/
var avatarImg = new Image();
avatarImg.src = "<?php echo $arrInfo['url'];?>/zy.jpg";

/* init chart */
var today = new Date();
$('#wcMotion').wcChart({
	fill: {gradient: [["#21B881",.1], ["#0E8FA2",.9]], gradientAngle: Math.PI * -45/180},
});

/* do something, may be you need get data with ajax */
window.setTimeout(function() {

	/* change height for rank */
	var zyy = 125*($('#wcMotion').height()/515);
	var height = $('#wcMotion').height() + zyy;
	$('#wcMotion').height(height);

	/* load data */
	today.setDate(today.getDate() - 1);
	$('#wcMotion').wcChart({
		height: height,	// width and height must be set if change
		day: today,
		data: [ 	<?php foreach((array)$array as $key=>$row) {?><?php if(!empty($row)&&!empty($row['step'])) { ?><?php echo $row['step'];?><?php } else { ?>0<?php } ?>,<?php }?>],
		rankRef : {height: zyy*1.1, avatar: avatarImg, title: "夺得昨日排行榜冠军", url: "<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/hdqlist"},
	});
}, 1000);

/* change image url and you can see redraw later */
window.setTimeout(function() {
	avatarImg.src = "<?php if(!empty($RRR['userimg'])) { ?><?php echo $RRR['userimg'];?><?php } ?>";
}, 2000);
 $("#C").width($(window).width()); 
 $("#wcMotion").width($(window).width()); 
  $("#C").height($(window).width()/912*515); 
 $("#wcMotion").height($(window).width()/912*515); </script>
</body>
</html>