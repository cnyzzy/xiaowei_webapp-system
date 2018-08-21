<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>男女生比例查询-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/xunjia_detail.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style.css">
				 <script src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/hidpi-canvas.js"></script>

		    <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>	
		<link href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/stylesheet.css" rel="stylesheet" type="text/css" /> 
  </head>
    <body>
        <header><?php if($iscx==0) { ?>
<script>  
            //绘制饼图  
            function drawCircle(canvasId, data_arr, color_arr, text_arr)  
            {  
                var c = document.getElementById(canvasId);  
                var ctx = c.getContext("2d");  
  var getPixelRatio = function(context) {
        var backingStore = context.backingStorePixelRatio ||
            context.webkitBackingStorePixelRatio ||
            context.mozBackingStorePixelRatio ||
            context.msBackingStorePixelRatio ||
            context.oBackingStorePixelRatio ||
            context.backingStorePixelRatio || 1;
    
        return (window.devicePixelRatio || 1) / backingStore;
    };

    var ratio = getPixelRatio(ctx);
                var radius = c.height / (2*ratio) - 2; //半径  
                var ox = radius + 5, oy = radius ; //圆心  
  
                var width = 20, height = 20; //图例宽和高  
                var posX = ox * 2 + 45, posY = 60;   //  
                var textX = posX + width + 10, textY = posY + 15;  
  
                var startAngle = 0; //起始弧度  
                var endAngle = 0;   //结束弧度  
                for (var i = 0; i < data_arr.length; i++)  
                {  
                    //绘制饼图  
                    endAngle = endAngle + data_arr[i] * Math.PI * 2; //结束弧度  
                    ctx.fillStyle = color_arr[i];  
                    ctx.beginPath();  
                    ctx.moveTo(ox, oy); //移动到到圆心  
                    ctx.arc(ox, oy, radius, startAngle, endAngle, false);  
                    ctx.closePath();  
                    ctx.fill();  
                    startAngle = endAngle; //设置起始弧度  
  
                    //绘制比例图及文字  
                    ctx.fillStyle = color_arr[i];  
                    ctx.fillRect(posX, posY + 20 * i*ratio, width, height);  
                    ctx.moveTo(posX, posY + 20 * i*ratio);  
                    ctx.font = 'bold '+5*ratio+'px 微软雅黑';    //斜体 30像素 微软雅黑字体  
                    ctx.fillStyle = color_arr[i]; //"#000000";  
                    var percent = text_arr[i] + "：" + Math.round(100 * data_arr[i]) + "%";  
                    ctx.fillText(percent, textX, (textY + 20 * i*ratio));  
                }  
            }  
  
            function init() {  
                //绘制饼图  
                //比例数据和颜色  
                var data_arr = [<?php if(@$sarr['2017']['rbi']) { ?><?php echo $sarr['2017']['rbi'];?><?php } else { ?><?php if($sarr['rbi']) { ?><?php echo $sarr['rbi'];?><?php } ?><?php } ?>, <?php if(@$sarr['2017']['rbi']) { ?><?php echo(1-$sarr['2017']['rbi'])?><?php } else { ?><?php if($sarr['rbi']) { ?><?php echo(1-$sarr['rbi'])?><?php } ?><?php } ?>];  
                var color_arr = ["#009913","#00AABB"];  
                var text_arr = ["男生", "女生"];  
  
                drawCircle("canvas_circle<?php if($aaa=='xy') { ?>1<?php } ?>", data_arr, color_arr, text_arr);  
            }  
  
            //页面加载时执行init()函数  
            window.onload = init;  
        </script>  <?php } ?>
         <div class="titlebar reverse">
             <a href="<?php echo $arrInfo['url'];?>">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>男女生比例查询</h1>
            </div>
        </header>
        <article style="bottom: 0;">
            <ul class="xunjia-tab clearfix">
		 <a  id="sjj1"> <li class="green"> 17年数据</li> </a>
	
	
            </ul>          <div class="weui_text_area">
    <h2 class="weui_msg_title"></h2>
    <p class="weui_msg_desc"> </p>
  </div> <ul class="xunjia-box">
  <div class="weui_tab">
  <div class="weui_navbar">
    <a id="acj" href="<?php if(@$iscx==0&&$aaa=='bj') { ?>javascript:exitz();<?php } else { ?>#cj<?php } ?>" class="weui_navbar_item<?php if(@$iscx==0&&$aaa=='xy'||@$iscx==1) { ?> weui_bar_item_on<?php } ?>">
      学院查询
    </a>
    <a id="azs"  href="<?php if(@$iscx==0&&$aaa=='xy') { ?>javascript:exitt();<?php } else { ?>#zs<?php } ?>" class="weui_navbar_item<?php if(@$iscx==0&&$aaa=='bj') { ?> weui_bar_item_on<?php } ?>">
      班级查询
    </a>
  </div>
  <div class="weui_tab_bd">
  <div id="zs" class="weui_tab_bd_item <?php if($iscx==0&&$aaa=='bj') { ?>weui_tab_bd_item_active<?php } ?>">
 <div id="zscx">
  <div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">

    </div>
  </div>
</div>
 <div class="weui_cells weui_cells_form">
  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">学号</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" type="number" id='bjxh' placeholder="请输入对应学号">
    </div>
  </div>
 </div>

 <div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">
     通过学号查询对应班级的男女生比例
    </div>
  </div>
   <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">
  
    </div>
  </div>
</div>
 <div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">

    </div>
  </div>
</div>
 <a href="javascript:;" onclick="zscx1()" class="weui_btn weui_btn_primary">查询</a>
 </div>
 <div id="zsshow" <?php if(@$iscx!=0||$aaa!='bj') { ?>  style="display:none"<?php } ?>>
 <div class="weui_cells weui_cells_access animated fadeInRight" >
  <a class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>班级</p>
    </div>
    <div class="weui_cell_ft" id="xy"><?php if($sarr['bj']) { ?><?php echo $sarr['bj'];?><?php } ?> </div>
  </a>   

        
	<a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">以下数据仅供参考</div>
  </a>
 
               </div>
			     <div class="weui_cells">
				 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>年份</p>
    </div> <div class="weui_cell_ft">男女比例</div>

  </div>	</div> <div class="weui_cells">

                              <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p><?php if($sarr['nj']) { ?><?php echo $sarr['nj'];?><?php } ?>/<?php if($sarr['bj']) { ?><?php echo $sarr['bj'];?><?php } ?></p>
    </div>
    <div class="weui_cell_ft"><?php if($sarr['bi']) { ?><?php echo $sarr['bi'];?><?php } ?>:100</div>
  </a>         
                                         	

    <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft" id=''></div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>饼图(最新年份)</p>
    </div>
    <div class="weui_cell_ft" ></div>
  </a>
  <DIV style="text-align:center;border:2px">  
            <canvas id="canvas_circle"  style="border:2px" >  
                浏览器不支持canvas  
            </canvas>  
        </DIV>  
</div> 

<BR>
 <div class="weui_cells">
			 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">
     
    </div>
  </div>  <a href='javascript:exitz();' class="weui_btn weui_btn_plain_default">再次查询</a>
  			 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">
     
    </div>
  </div>
</div>          
 </div>   
  
 </div>

 <div id="cj" class="weui_tab_bd_item <?php if($aaa!='bj') { ?>weui_tab_bd_item_active<?php } ?>">
 <div id="cjcx"  <?php if(@$iscx==0||$aaa=='bj') { ?>  style="display:none"<?php } ?>>
  <div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">

    </div>
  </div>
</div>
 <div class="weui_cells weui_cells_form">
  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">学院</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" type="text" id='xycx' placeholder="请输入对应学院">
    </div>
  </div>
 </div>
 <div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">
数据可能由于转专业等情况造成误差
    </div>
  </div>
</div>
 <div class="weui_cells">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">

    </div>
  </div>
</div>
 <a href="javascript:;" onclick="cjcx1()" class="weui_btn weui_btn_primary">查询</a>
 </div>
<div id="cjshow"  <?php if(@$iscx!=0||$aaa!='xy') { ?>  style="display:none"<?php } ?>>
 <div class="weui_cells weui_cells_access animated fadeInRight" >
  <a class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>学院</p>
    </div>
    <div class="weui_cell_ft" id="xy"><?php echo $jp2;?></div>
  </a>   

        
	<a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">以下数据仅供参考</div>
  </a>
 
               </div>
			     <div class="weui_cells">
				 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>年份</p>
    </div> <div class="weui_cell_ft">男女比例</div>

  </div>	</div> <div class="weui_cells">
  <?php if($sarr) { ?>
  						<?php foreach((array)$sarr as $key=>$loopChild) {?>
                              <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p><?php echo $key;?></p>
    </div>
    <div class="weui_cell_ft"><?php echo $loopChild['bi'];?>:100</div>
  </a>         
                                         	<?php }?>
<?php } ?>
    <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft" id=''></div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>饼图(最新年份)</p>
    </div>
    <div class="weui_cell_ft" ></div>
  </a>  <DIV style="text-align:center;border:2px">  
            <canvas id="canvas_circle1"    style="border:2px" >  
                浏览器不支持canvas  
            </canvas>  
        </DIV>  
</div> 

<BR>
 <div class="weui_cells">
			 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">
     
    </div>
  </div>  <a href='javascript:exitt();' class="weui_btn weui_btn_plain_default">再次查询</a>
  			 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">
     
    </div>
  </div>
</div>          
 </div>   
  </DIV>
  </ul>                  
  
  </div>
</div>
 </article>


<script>
function cjcx1() {
  $("#cjshow").hide();
    $("#cjcx").show();
	$.showLoading("加载数据...");

            var xm= $('#xycx').attr("data-values");

            $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/xy',
                dataType: 'json',
                type: 'POST',
				data:"&xy="+xm,
				async:false,
				timeout : 5000,
                success: function (data) {
				$.hideLoading();
    if(data.type!='ok'){
 console.log(data);
 $.toast(data.msg,"cancel");
                        }else if(data.type=='ok'){
						$.toast(data.msg);
			 setTimeout(function() {
          window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/index/xy/"+xm;
        }, 500)

	}
                 
                },
                error : function(e) {

				$.hideLoading();
                   $.toast("网络故障","forbidden"); 
					//window.location.href=location.href;
                }
            });

}
function zscx1() {
  $("#zsshow").hide();
    $("#zscx").show();
	$.showLoading("加载数据...");
	 var xq = $('#bjxh').val();

            $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/bj',
                dataType: 'json',
                type: 'POST',
				data:"&xh="+xq,
				async:false,
				timeout : 5000,
                success: function (data) {
				$.hideLoading();
    if(data.type!='ok'){
 console.log(data);
 $.toast(data.msg,"cancel");
                        }else if(data.type=='ok'){
						$.toast(data.msg);
				 setTimeout(function() {
          window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/index/bj/"+xq;
        }, 500)

	}
                 
                },
                error : function(e) {
				$.hideLoading();
                   $.toast("网络故障","forbidden"); 
					//window.location.href=location.href;
                }
            });

}

  
    </script>
		 <script>	$(document).ready(function() {
  
<?php if(@$iserror==1) { ?>
  $("#cjcx").hide();
    $("#cjshow").hide();
		$.toast("参数错误", "forbidden");
				 setTimeout(function() {
          window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>";
        }, 100000)
 <?php } ?>

<?php if(@$iscx==1) { ?>

    $("#cjshow").hide();
		$("#xycx").select({
  title: "选择学院",
  items: [
                                     {
      title: "体育学院",
      value: "1",
    },
 	 
                                     {
      title: "信息工程学院",
      value: "2",
    },
 	 
                                     {
      title: "公共管理学院",
      value: "3",
    },
 	 
                                     {
      title: "化学与环境工程学院",
      value: "4",
    },
 	 
                                     {
      title: "商学院",
      value: "5",
    },
 	 
                                     {
      title: "城市与规划学院",
      value: "6",
    },
 	 
                                     {
      title: "外国语学院",
      value: "7",
    },
 	 
                                     {
      title: "教育科学学院",
      value: "8",
    },
 	 
                                     {
      title: "数学与统计学院",
      value: "9",
    },
 	 
                                     {
      title: "文学院",
      value: "10",
    },
 	 
                                     {
      title: "新能源与电子工程学院",
      value: "11",
    },
 	 
                                     {
      title: "法政学院",
      value: "12",
    },
 	 
                                     {
      title: "海洋与生物工程学院",
      value: "13",
    },
 	 
                                     {
      title: "美术与设计学院",
      value: "14",
    },
 	 
                                     {
      title: "药学院",
      value: "15",
    },
 	 
                                     {
      title: "音乐学院",
      value: "16",
    }
  
  ]
});	
 <?php } ?>
		   <?php if(@$iscx==0&&$aaa=='xy') { ?>
		
		   $("#cjcx").hide(); 
		    $("#cjshow").show();
		 <?php } ?>
		   
		   		   <?php if(@$iscx==0&&$aaa=='bj') { ?>
				     $("#zsshow").show();

		   $("#zscx").hide(); 
		    $("#zsshow").show();<?php } ?>

        });
				function exitz(){
			$.confirm({
  title: '退出',
  text: '您即将再次查询',
  onOK: function () {
$.showLoading("清除缓存...");
				 setTimeout(function() {
          window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/index#cj";
        }, 1000)
		

  },
  onCancel: function () {
  $.toast("取消操作", "cancel");
  }
});
				}
		function exitt(){
			$.confirm({
  title: '退出',
  text: '您即将再次查询',
  onOK: function () {
$.showLoading("清除缓存...");
				 setTimeout(function() {
          window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/index#zs";
        }, 1000)
		

  },
  onCancel: function () {
  $.toast("取消操作", "cancel");
  }
});
		}

	var query = location.href.split('#')[1]; 					 
     if(query=='zs')
	 {
	  $("#azs").addClass("weui_bar_item_on");
	   $("#acj").removeClass("weui_bar_item_on");
	    $("#zs").addClass("weui_tab_bd_item_active");
	   $("#cj").removeClass("weui_tab_bd_item_active");
	 
	 }
         </script>
		 <?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>        <footer>
           
        </footer>
		
</html>