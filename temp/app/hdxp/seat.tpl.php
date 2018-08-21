<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>选择座位</title>
<link href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/seat.css" type="text/css" rel="stylesheet" />
<link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/layer-v3.0.3/layer/mobile/need/layer.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/layer-v3.0.3/layer/mobile/need/layer.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/phone.js" ></script>
<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/layer-v3.0.3/layer/mobile/layer.js"></script>
<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery-1.11.0.min.js"></script>
<script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/jquery.seat-charts.min.js"></script>
        <style type="text/css">

            .front{width: 95%;height: 60px;line-height:60px;margin: 5px 32px 45px 32px;background-color: #f0f0f0;	color: #666;text-align: center;padding: 3px;border-radius: 5px;}

            .booking_area {float: right;position: relative;width:200px;height: 450px; }

            .booking_area h3 {margin: 5px 5px 0 0;font-size: 16px;}

            .booking_area p{line-height:26px; font-size:16px; color:#999}

            .booking_area p span{color:#666}

            div.seatCharts-cell {display:inline-block;

float:left;color: #182C4E;height: 25px;width: 25px;line-height: 25px;margin: 3px;float: left;text-align: center;outline: none;}

            div.seatCharts-seat {color: #fff;cursor: pointer;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;}

            div.seatCharts-row {height: 35px; float:left;white-spacing:nowrap;float: left;overflow-x :auto;margin:0 10px 0 10px}

            div.seatCharts-seat.available {background-color: #B9DEA0;}

            div.seatCharts-seat.focused {background-color: #76B474;border: none;}

            div.seatCharts-seat.selected {background-color: #3c6080;}

            div.seatCharts-seat.unavailable {background-color: #df4d26;cursor: not-allowed;}

            div.seatCharts-container {border-right: 1px dotted #adadad;width: 1000px;padding: 20px;float: left;overflow-x :auto;margin:0 10px 0 10px}

            div.seatCharts-legend {padding-left: 0px;position: absolute;bottom: 16px;}

            ul.seatCharts-legendList {padding-left: 0px;}

            .seatCharts-legendItem{float:left; width:90px;margin-top: 10px;line-height: 2;}

            span.seatCharts-legendDescription {margin-left: 5px;line-height: 30px;}

            .checkout-button {display: block;width:80px; height:24px; line-height:20px;margin: 10px auto;border:1px solid #999;font-size: 14px; cursor:pointer}

            #seats_chose {z-index:1;position: absolute;	top:25%;float: left;overflow-x:auto;margin:0 10px 0 10px;overflow-y: auto;width: 95%;}

            #seats_chose2 li{    position: relative;
    right: -25%;float:left; width:50%; height:80px; line-height:80px; border:4px solid #d3d3d3; background:#f7f7f7; margin:6px; font-size:40px; font-weight:bold; text-align:center}

        </style>

</head>

<body>
<div class="whole">
<input type="hidden" id="x" value="0" />
<input type="hidden" id="y" value="0" />
	<header class="header">
        <a href="javascript:history.back(-1)" class="fa fa-angle-left"></a>
        <span class="names"><?php if($Arr['title']) { ?><?php echo $Arr['title'];?><?php } ?></span>
    </header>
    
    <div class="seat_head">
    	<h3><?php if($Arr['place']) { ?><?php echo $Arr['place'];?><?php } ?></h3>
        <span>
        	<a><?php if($Arr['time']) { ?><?php echo $Arr['time'];?><?php } ?></a>
        </span>
    </div>
    
    <div class="seat_show">
    	<ul>
        	<li>
            	<i></i>
                <span>可选</span>
            </li>
            <li>
            	<i></i>
                <span>已售</span>
            </li>
            <li>
            	<i></i>
                <span>已选</span>
            </li>
            <li>
            	<i></i>
                <span>最佳区域</span>
            </li>
        </ul>
    </div> </div><div id="seat">
<div id="seat_choose">

	<div id="seats_chose">	<ul class="touchs" id="touchs" >
                    <div class="front">屏幕</div>	</ul>
					  </div>

                </div>
  </div>
<div id="seat_end">
                    <div id="seats_chose2"></div>

                    <p>票数：<span id="tickects_num">0</span></p>

                    <p>总价：<b>￥<span id="total_price">0</span></b></p>
    <div class="buttons" id="okok" onClick='wait();'>确认选择</div>

 </div>
<?php echo $seatjs;?>

<?php if(!empty($unseat)) { ?>
 sc.get(<?php echo $unseat;?>).status('unavailable');
 <?php } else { ?>
  sc.get([]).status('unavailable');
<?php } ?>




            });



            function getTotalPrice(sc) { //计算票价总额

                var total = 0;

                sc.find('selected').each(function() {

                    total += price;

                });

                return total;

            }

        </script>




        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>	
<script>
$(function(){


	
})
		 function wait(form) {
		 			      var x = $('#x').val();
            var y = $('#y').val();
		 if(x==0||y==0) 
		 {$.toast("未选择座位","cancel");}else{
				$.showLoading("正在提交数据...");
				            $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/addseat/<?php echo $id;?>',
                dataType: 'json',
                type: 'POST',
				data:"&x="+x+"&y="+y+"&time=<?php if($Arr['time']) { ?><?php echo $Arr['time'];?><?php } ?>",
				async:false,
				timeout : 5000,
                success: function (data) {
				$.hideLoading();
    if(data.ok==0){
                        console.log(data);
 $.toast("该位置已被抢走","cancel");

                        }else if(data.ok==2){


 $.toast("已经有票","cancel");
 				setTimeout(function() {
        $.hideLoading();
		window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/read";
        }, 1000);
	}else if(data.ok==3){


 $.toast("请5分钟后再试","cancel");
 				setTimeout(function() {
        $.hideLoading();
		window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/read";
        }, 1000);
	}else if(data.ok==5){


 $.toast("不在开放订票的时间段","cancel");
 				setTimeout(function() {
        $.hideLoading();
		window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/read";
        }, 1000);
	}else if(data.ok==1){


 $.toast("订票成功");
 				setTimeout(function() {
        $.hideLoading();
		window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/read";
        }, 1000);
	}
                 
                },
                error : function(e) {
				$.hideLoading();
                   $.toast("网络故障","forbidden"); 
					//window.location.href=location.href;
                }
            });
	
}
	
}
	//公用弹出层
	function popu(content){
		layer.open({
			content: content
			,skin: "msg"
			,time: 3
		});	
	}
</script>

<!---拖拽js--->
<script>
$(function(){
$(".seatCharts-row").height(65);
$(".seatCharts-cell").height(55);
$(".seatCharts-cell").width(55);
$(".seatCharts-cell").css("line-height","55px");
$("#seats_chose").css("width",(<?php echo $seatnum;?>*65)+"px");
$("#seats_chose").css("height", (<?php echo $seatrow;?>*90+280)+"px");
$("#seats_chose").css("float","left");

    var flag = false;
    var cur = {
        x:0,
        y:0
    }
    var nx,ny,dx,dy,x,y ;
    function down(){
        flag = true;
        var touch ;
        if(event.touches){
            touch = event.touches[0];
        }else {
            touch = event;
        }
        cur.x = touch.clientX;
        cur.y = touch.clientY;
        dx = div2.offsetLeft;
        dy = div2.offsetTop;
    }
    function move(){
        if(flag){
            var touch ;
            if(event.touches){
                touch = event.touches[0];
            }else {
                touch = event;
            }
            nx = touch.clientX - cur.x;
            ny = touch.clientY - cur.y;
            x = dx+nx;
            y = dy+ny;
            div2.style.left = x+"px";
           //div2.style.top = y +"px";

			
            //阻止页面的滑动默认事件
            document.addEventListener("touchmove",function(){
                //event.preventDefault();
            },false);
        }
    }
    //鼠标释放时候的函数
    function end(){
        flag = false;
    }
    var div2 = document.getElementById("touchs");
    div2.addEventListener("mousedown",function(){
        down();
    },false);
    div2.addEventListener("touchstart",function(){
        down();
    },false)
    div2.addEventListener("mousemove",function(){
        move();
    },false);
    div2.addEventListener("touchmove",function(){
        move();
    },false)
    document.body.addEventListener("mouseup",function(){
        end();
    },false);
    div2.addEventListener("touchend",function(){
        end();
    },false);
	
});
</script>

</body>
</html>
