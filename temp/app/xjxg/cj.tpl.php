<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="viewport" content="initial-scale=1, maximum-scale=1,user-scalable=no">
<title>抽奖界面——小薇平台</title>
 	
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style-cj.css"> 
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>

</head>
<body>
<div class="main">
  <div class="banner"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/banner-cj.jpg"/></div>
  <div class="main-header">
  <p><span>盐城师范学院校纪校规测试</span></p>
  <p class="p1">您有<span class="coud_num"><?php if($nodj==0&&$nocj==1&&$is100==1) { ?>1<?php } else { ?>0<?php } ?></span> 次机会</p>
  </div>
  <div class="main-body">
     <div id="zhuanpan">
          <img id="img" class="rotary-table" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/four_zhuanpan.png">
          <img id="tip" class="point i_cont" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/Pointer1.png" >
      </div>
  </div>  

  <div class="main-footer"><a href="cjjl" class="footer-a2">中奖记录>></a><a href="#" class="footer-a" data-toggle="modal" data-target="#myModal">活动规则>></a></div> 
  
</div>
	
			<div id="apply1" class="modal fade padding1" tabindex="-1" data-replace="true" data-backdrop="static" >
				<div class="modal-dialog modal-content">
					<div class="modal-body">
					   <div class="img1"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/1jiang.png"/></div>
                       <p><span>奖品发放通知将在公众号公布，请留意查看！</span></p>
                       <a href="#" class="colse1" data-dismiss="modal"></a>
                       <button type="button" class="but5" data-dismiss="modal" data-toggle="modal" >确定</button>
					</div>
				</div>
			</div>
            

			<div id="apply2" class="modal fade padding1" tabindex="-1" data-replace="true" data-backdrop="static">
				<div class="modal-dialog modal-content">
					<div class="modal-body">
					   <div class="img1"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/2jiang.png"/></div>
                        <p><span>奖品发放通知将在公众号公布，请留意查看！</span></p>
                       <a href="#" class="colse1" data-dismiss="modal"></a>
                       <button type="button" class="but5" data-dismiss="modal" data-toggle="modal" >确定</button>
					</div>
				</div>
			</div>
            

			<div id="apply3" class="modal fade padding1" tabindex="-1" data-replace="true" data-backdrop="static">
				<div class="modal-dialog modal-content">
					<div class="modal-body">
					   <div class="img1"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/3jiang.png"/></div>
                       <p><span>奖品发放通知将在公众号公布，请留意查看！</span></p>
                       <a href="#" class="colse1" data-dismiss="modal"></a>
                       <button type="button" class="but5" data-dismiss="modal" data-toggle="modal" >确定</button>
					</div>
				</div>
			</div>
            
            

			<div id="apply4" class="modal fade padding1" tabindex="-1" data-replace="true" data-backdrop="static">
				<div class="modal-dialog modal-content">
					<div class="modal-body">
					   <div class="img1"><img src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/4jiang.png"/></div>
                        <p><span>奖品发放通知将在公众号公布，请留意查看！</span></p>
                       <a href="#" class="colse1" data-dismiss="modal"></a>
                       <button type="button" class="but5" data-dismiss="modal" data-toggle="modal" >确定</button>
					</div>
				</div>
			</div>
<!--加载-->
	<div id="applyLoading" class="modal fade" tabindex="-1" data-replace="true"  data-backdrop="static" >
				<div class="modal-dialog modal-content">
					<div class="modal-body">
						<div class="loading-container" align="center">
							<img src="<?php echo $arrInfo['url'];?>/xw.jpg" alt="Loading" class="loading-gif">
						</div>
						<p align="center">后台在努力加载，稍等一jpg会儿哦~</p>
					</div>
				</div>
	</div>

<!-- 温馨提示 -->
<div id="myModal" class="modal fade s3" tabindex="-1" data-replace="true" data-backdrop="static">
  <div class="modal-dialog">
      <div class="hd-title"></div>
      <a href="#" class="close2"></a>
      <div class="modal-body" style="height: 250px; overflow: auto;">

      <p>1、活动时间：2017年9月1日——2017年9月31日。<br/>
      2、活动期间，校纪校规测试获得满分的将得到一次抽奖机会。<br/>
      3、活动抽奖机会次数只能获得一次。<br/>
      4、抽奖奖池：<br/>
      5、奖品发放时间和地点关注"盐城师范学院"官方公众号<br/>
       <span>备注：抽奖前必须进行信息登记，或者不发放抽奖机会 </span></p>
      
      </div>
  
  </div>
</div>

  <a href="result" class="bt1">返&nbsp;回</a>

 <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery.min.js"></script>
<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/bootstrap.min.js"></script>
     <?php if($is100!=1||$nocj!=1) { ?> <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
       <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script><?php } ?>

<script type="text/javascript">

<?php if($is100==1) { ?>
   /* 获取抽奖机会值*/
    var nun1=$(".coud_num").html();
		// 转盘样式，a：旋转角度，p：概率（1代表100%），t：需要显示的其它信息（文案or分享）
		var result_angle = [{a:0,p:0.1,t:'1号奖品'},{a:45,p:0.1,t:'3号奖品'},{a:90,p:0.1,t:'2号奖品'},{a:135,p:0.3,t:'4号奖品'},{a:180,p:0.1,t:'1号奖品'},{a:225,p:0.1,t:'3号奖品'},{a:270,p:0.1,t:'2号奖品'},{a:315,p:0.1,t:'4号奖品'}];
		var rotate = {
			rotate_angle : 0, //起始位置为0
			flag_click : true, //转盘转动过程中不可再次触发
			calculate_result:function(type,during_time){//type:0,箭头转动,1,背景转动;during_time:持续时间(s)
				var self = this;
				type = type || 0; // 默认为箭头转动
				during_time = during_time || 1; // 默认为1s

				var rand_num = Math.ceil(Math.random() * 100); // 用来判断的随机数，1-100

				var result_index; // 最终要旋转到哪一块，对应result_angle的下标
				var start_pos = end_pos = 0; // 判断的角度值起始位置和结束位置

				for(var i in result_angle){
					start_pos = end_pos + 1; // 区块的起始值
					end_pos = end_pos + 100 * result_angle[i].p; // 区块的结束值

					if(rand_num >= start_pos && rand_num <= end_pos){ // 如果随机数落在当前区块，那么获取到最终要旋转到哪一块
						result_index = i;
						break;
					}
				}

				var rand_circle = Math.ceil(Math.random() * 2) + 1; // 附加多转几圈，2-3

				self.flag_click = false; // 旋转结束前，不允许再次触发
				if(type == 1){ // 转动盘子
					self.rotate_angle =  self.rotate_angle - rand_circle * 360 - result_angle[result_index].a - self.rotate_angle % 360;
					$('#img').css({
						'transform': 'rotate('+self.rotate_angle+'deg)',
						'-ms-transform': 'rotate('+self.rotate_angle+'deg)',
						'-webkit-transform': 'rotate('+self.rotate_angle+'deg)',
						'-moz-transform': 'rotate('+self.rotate_angle+'deg)',
						'-o-transform': 'rotate('+self.rotate_angle+'deg)',
						'transition': 'transform ease-out '+during_time+'s',
						'-moz-transition': '-moz-transform ease-out '+during_time+'s',
						'-webkit-transition': '-webkit-transform ease-out '+during_time+'s',
						'-o-transition': '-o-transform ease-out '+during_time+'s'
					});
				}else{ // 转动指针
					self.rotate_angle = self.rotate_angle + rand_circle * 360 + result_angle[result_index].a - self.rotate_angle % 360;
					$('.i_cont').css({
						'transform': 'rotate('+self.rotate_angle+'deg)',
						'-ms-transform': 'rotate('+self.rotate_angle+'deg)',
						'-webkit-transform': 'rotate('+self.rotate_angle+'deg)',
						'-moz-transform': 'rotate('+self.rotate_angle+'deg)',
						'-o-transform': 'rotate('+self.rotate_angle+'deg)',
						'transition': 'transform ease-out '+during_time+'s',
						'-moz-transition': '-moz-transform ease-out '+during_time+'s',
						'-webkit-transition': '-webkit-transform ease-out '+during_time+'s',
						'-o-transition': '-o-transform ease-out '+during_time+'s'
					});
				}
				// 旋转结束后，允许再次触发
				setTimeout(function(){ 
				var jp=0;
					self.flag_click = true;
					// 告诉结果
					if(result_angle[result_index].t=="1号奖品")
					{
					jp=1;
							$('#apply1').modal('show');
					}else if(result_angle[result_index].t=="2号奖品"){
					jp=2;
							$('#apply2').modal('show');
					}else if(result_angle[result_index].t=="3号奖品"){
					jp=3;
							$('#apply3').modal('show');
					}else{
					jp=4;
							$('#apply4').modal('show');
					}
					
					
					nun1--;
					$(".coud_num").html(nun1);
		 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/xjxg/do/post",
		data:"&jp="+jp,
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   
	if(result.type!='ok'){

	$.toast(result.msg, "forbidden");
				 setTimeout(function() {
          window.location.reload(true);
        }, 1000)
	}

		},
		error:function(result){

	$.toast("网络故障", "forbidden");
				 setTimeout(function() {
          window.location.reload(true);
        }, 1000)
	}

		
	});
					if(parseInt(nun1)<= 0){
						$("#tip").attr("src","<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/Pointer2.png");
			             return false;
		            }
					
				},during_time*1000);
			}
		}
		<?php } ?>
		$(document).ready(function(){
		<?php if($is100==0) { ?>	
		$.alert("您还未获得抽奖机会", "提示", function() {
     window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/result";
});<?php } else { ?>
			<?php if($nocj==0) { ?>	
		$.alert("已经抽奖，请查看中奖记录", "提示");<?php } ?><?php } ?>
		<?php if($is100==0||$nocj==0) { ?>	
		
		$("#tip").attr("src","<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/Pointer2.png");
			return false;
			<?php } ?>
			$('#tip').click(function(){
			if(parseInt(nun1)<= 0){
			$("#tip").attr("src","<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/images/Pointer2.png");
			return false;
		}
				if(rotate.flag_click){ // 旋转结束前，不允许再次触发
					rotate.calculate_result(1,1);
				}
			});
					
	 });
		
		
$(".close2").click(function(){
		 $('#myModal').modal('hide');
});



</script>  
	
</body>
</html>