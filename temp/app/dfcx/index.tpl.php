<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>电费查询-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/xunjia_detail.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style.css">
		    <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
						<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>	
       
    </head>
    <body>
        <header>
		
         <div class="titlebar reverse">
             <a href="<?php echo $arrInfo['url'];?>">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>电费查询</h1>
            </div>
        </header>
        <article style="bottom: 0;">
            <ul class="xunjia-tab clearfix">
			 <?php if($cecha==1) { ?> <a  id="sjj1" href='javascript:login();'> <li class="green"> 更新数据</li> </a>
			<?php } ?>
	
            </ul>          <div class="weui_text_area">
    <h2 class="weui_msg_title"></h2>
    <p class="weui_msg_desc"><?php if(empty($timei)) { ?>数据准实时更新<?php } else { ?>缓存数据:<?php ECHO(date('Y-m-j G:i',$timei))?><?php } ?></p>
  </div> <ul class="xunjia-box">
<input type="hidden" id="xq" value="<?php if(!empty($info['xq'])) { ?><?php echo $info['xq'];?><?php } ?>" />
<input type="hidden" id="lh" value="<?php if(!empty($info['lh'])) { ?><?php echo $info['lh'];?><?php } ?>" />
<input type="hidden" id="lc" value="<?php if(!empty($info['lc'])) { ?><?php echo $info['lc'];?><?php } ?>" />
<input type="hidden" id="ab" value="<?php if(!empty($info['abl'])) { ?><?php echo $info['abl'];?><?php } ?>" />
<input type="hidden" id="fj" value="<?php if(!empty($info['fj'])) { ?><?php echo $info['fj'];?><?php } ?>" />
	
	<div id="sr" class="weui_cells weui_cells_form">
      <div class="weui_cell">
        <div class="weui_cell_hd"><label for="name" class="weui_label">校区</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" id="wxq" type="text" value="">
        </div>
      </div>
      <div class="weui_cell">
        <div class="weui_cell_hd"><label for="name" class="weui_label">楼号</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" id="wlh" type="text" value="">
        </div>
      </div>
	     <div class="weui_cell">
        <div class="weui_cell_hd"><label for="name" class="weui_label">A/B</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" id="wab" type="text" value="">
        </div>
      </div>
	  	     <div class="weui_cell">
        <div class="weui_cell_hd"><label for="name" class="weui_label">楼层</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" id="wlc" type="text" value="">
        </div>
      </div>	     <div class="weui_cell">
        <div class="weui_cell_hd"><label for="name" class="weui_label">房间</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" id="wfj" type="text" value="">
        </div>
      </div> 
	  <div class="weui_cells_title"></div>
	  <div class="weui_cells_title">提示：选择完毕自动查询</div>
<div class="weui_cell_ft">小薇工作室出品</div></div>
 <div id="show1" style="display:none">
 <div class="weui_cells weui_cells_access animated fadeInRight" >
   

  <a class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>宿舍</p>
    </div>
    <div class="weui_cell_ft" id="room"></div>
  </a>   
      <a href="http://weixin.yctu.edu.cn/turl?url=http://ecard.yctu.edu.cn&isjsurl=1" class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>学付宝房间号</p>
    </div>
    <div class="weui_cell_ft" ><font id="xfbroom" color='red'><?php if($xfbroom) { ?><?php echo $xfbroom;?><?php } ?></font></div>
  </a> 
  
	<a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>已用总电数</p>
    </div>
    <div class="weui_cell_ft" id='yy'></div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>剩余总电数</p>
    </div>
    <div class="weui_cell_ft" id='sy'></div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>补助电数</p>
    </div>
    <div class="weui_cell_ft" id='bz'></div>
  </a>
  <a class="weui_cell" >
    <div class="weui_cell_bd weui_cell_primary">
      <p>购买电数</p>
    </div>
    <div class="weui_cell_ft" id='gm'></div>
  </a>
  
     <a href="http://weixin.yctu.edu.cn/turl?url=http://ecard.yctu.edu.cn&isjsurl=1" class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p><font color='red'>点此前往一卡通大厅</font></p>
    </div>
    <div class="weui_cell_ft">充值需要房间号</div>
  </a>  
               </div>
			     <div class="weui_cells">
				 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p><B>最近10天用电情况</b></p>
    </div>

  </div>	</div> <div class="weui_cells" id="yongdian">
 
</div>  
 <div class="weui_cells">
			 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">
     
    </div>
  </div>  <a href='javascript:exitt();' class="weui_btn weui_btn_plain_default">查询其他宿舍</a>
  			 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">
     
    </div>
  </div>
</div>          
 </div>   
   </ul>                  
   </article>


<script>
function yongdian() {
  $("#sr").hide();
  
	$.showLoading("加载基础数据...");
	 $("#show1").show();
	  $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/e/2',
                dataType: 'json',
                type: 'GET',
				timeout : 5000,
                success: function (data) {
                    if(data.ok==1){
					 
					$('#yy').text(data.yy);
					$('#gm').text(data.gm);
					$('#bz').text(data.bz);
					$('#sy').text(data.sy);
	

if(data.xfb){
$('#xfbroom').text(data.xfb);
}
					
						$.hideLoading();
					loadyongdian();
					}else if(data.ok==0){
					$.hideLoading();
					 $.toast("获取超时","cancel");
					   <?php if($a!='3') { ?>window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/index/3";<?php } ?>

                        console.log(data);
                      //完蛋
                        }
                 
                },
                error : function(e) {
				$.hideLoading();
                    $.toast("网络故障","forbidden");
                    //window.location.href=location.href;
                }
            });
}
function loadyongdian() {
$.showLoading("加载详细数据...");
	  $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/e/3',
                dataType: 'json',
                type: 'GET',
				timeout : 5000,
                success: function (data) {
                 $('#room').text(data[1][1]);
				$('#yongdian').empty();
					for (var i = 0; i < data.length; i++) {
					
                        $('#yongdian').prepend(' <a class="weui_cell"> <div class="weui_cell_bd weui_cell_primary"> <p>'+data[i][0]+'</p></div><div class="weui_cell_ft">'+data[i][2]+'</div></a>   ');
                      
					  
 }
					$.hideLoading();

					
                   console.log(data[0]);
                },
                error : function(e) {
				$.hideLoading();
                    $.toast("网络故障","forbidden");
                    window.location.href=location.href;
                }
            });
}
function getJson(type,id) {
            var xq = $('#xq').val();
            var lh = $('#lh').val();
			var ab = $('#ab').val();
            var lc = $('#lc').val();
            var fj = $('#fj').val();
$.showLoading("加载数据...");
            $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/e/'+type+'/'+xq+'/'+lh+'/'+ab+'/'+lc+'/'+fj,
                dataType: 'json',
                type: 'GET',
				timeout : 5000,
                success: function (data) {
				$.hideLoading();
                    if(data.ok==1){
//接收到数据

var tArr = new Array();              
                       for (var i = 0; i < data.value.length; i++) {
					    var jsonArr = new Array(); 
					   jsonArr['value'] = data.value[i];
                      jsonArr['title']   = data.name[i];
					  tArr[i]=new Array();
						tArr[i]=jsonArr; 
 }
						  $("#"+id).select("update", { items: tArr })
                       
                     console.log(tArr);
                    }else if(data.ok==0){
                        console.log(data);
 $.toast("获取超时","cancel");
                        }else if(data.ok==2){
						if(type=='1'&&id=='show'){

//清洗选择框
yongdian();
			
			

}
						}
                 
                },
                error : function(e) {
                   $.toast("网络故障","forbidden"); 
					window.location.href=location.href;
                }
            });
        }
function getJson2() {
	   	$.showLoading("同步数据...");
            var xq = $('#xq').val();
            var lh = $('#lh').val();
			var ab = $('#ab').val();
            var lc = $('#lc').val();
            var fj = $('#fj').val();

            $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/e/1'+'/'+xq+'/'+lh+'/'+ab+'/'+lc+'/'+fj,
                dataType: 'json',
                type: 'GET',
				async:false,
				timeout : 5000,
                success: function (data) {
				$.hideLoading();
    if(data.ok==0){
                        console.log(data);
 $.toast("同步超时","cancel");
  <?php if($a!='3') { ?>
  getJson2();
  window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/index/3";<?php } ?>
                        }else if(data.ok==2){


//清洗选择框
yongdian();
	}
                 
                },
                error : function(e) {
				$.hideLoading();
                   $.toast("网络故障","forbidden"); 
					//window.location.href=location.href;
                }
            });
        }		
      $("#wxq").select({
        title: "选择校区",
       items: [
    {
      title: "新长校区",
      value: "11",
    },
    {
      title: "通榆校区",
      value: "22",
    },
  ],

        onChange: function(d) {
		 $("#xq").attr("value",d.values);
		 $("#lh").attr("value",'');
		 $("#ab").attr("value",'');
		 $("#lc").attr("value",'');
		 $("#fj").attr("value",'');
     getJson(1,'wlh');
        },
        onClose: function() {
           
        },
        onOpen: function() {
       $.post('<?php echo $arrInfo['url'];?>/dfcx/e/1',{'do':'delete'},function(rs){
    });
	
        },
      });
        $("#wlh").select({
        title: "选择楼号",
       items: [
    {
	},
  ],

        onChange: function(d) {
		 $("#lh").attr("value",d.values);
		 $("#ab").attr("value",'');
		 $("#lc").attr("value",'');
		 $("#fj").attr("value",'');
   getJson(1,'wab');
		
     
        },
        onClose: function() {
       
        },
        onOpen: function(d) {
         if(!(d.config.items[0]['title']))
{$.toast("数据未加载", "cancel");
$("#wlh").select("close");
}
        },
      });   
        $("#wab").select({
        title: "选择A/B",
       items: [
    {
	},
  ],

        onChange: function(d) {
		 $("#lc").attr("value",'');
		 $("#fj").attr("value",'');

		 $("#ab").attr("value",d.values);
		     getJson(1,'wlc');
     
        },
        onClose: function() {
      
        },
         onOpen: function(d) {
         if(!(d.config.items[0]['title']))
{$.toast("数据未加载", "cancel");
$("#wab").select("close");
}
        },
      }); 	
	          $("#wlc").select({
        title: "选择楼层",
       items: [
    {
	},
  ],

        onChange: function(d) {
		 $("#fj").attr("value",'');

		 $("#lc").attr("value",d.values);
		 
       getJson(1,'wfj');
        },
        onClose: function() {
       
        },
              onOpen: function(d) {
         if(!(d.config.items[0]['title']))
{$.toast("数据未加载", "cancel");
$("#wlc").select("close");
}
        },
      });         $("#wfj").select({
        title: "选择房间",
       items: [
    {
	},
  ],

        onChange: function(d) {
		 $("#fj").attr("value",d.values);
		
        },
        onClose: function() {
           getJson(1,'show');
        },
               onOpen: function(d) {
         if(!(d.config.items[0]['title']))
{$.toast("数据未加载", "cancel");
$("#wfj").select("close");
}
        },
      }); 
    </script>
		 <script>(function (doc, win) {
		   $("#show1").hide();
<?php if($mysqll==0&&$chakan==0) { ?>
		   $.post('<?php echo $arrInfo['url'];?>/dfcx/e/1',{'do':'delete'},function(rs){
    });<?php } ?>
	<?php if($chakan==1) { ?>
		   yongdian();<?php } ?>
		   <?php if($mysqll==1) { ?>   
		   	$.showLoading("加载宿舍数据...");
		    var xq = $('#xq').val();
            var lh = $('#lh').val();
			var ab = $('#ab').val();
            var lc = $('#lc').val();
            var fj = $('#fj').val();
				  $.ajax({
                url:'<?php echo $arrInfo['url'];?>/dfcx/e/1/'+xq,
                dataType: 'json',
				async: false,
                type: 'GET',
				timeout : 5000,
                success: function (data) {
				
				
	  $.ajax({
                url:'<?php echo $arrInfo['url'];?>/dfcx/e/1/'+xq+'/'+lh,
                dataType: 'json',
				async: false,
                type: 'GET',
				timeout : 5000,
                success: function (data) {
	  $.ajax({
                url:'<?php echo $arrInfo['url'];?>/dfcx/e/1/'+xq+'/'+lh+'/'+ab,
                dataType: 'json',
				async: false,
                type: 'GET',
				timeout : 5000,
                success: function (data) {
  $.ajax({
                url:'<?php echo $arrInfo['url'];?>/dfcx/e/1/'+xq+'/'+lh+'/'+ab+'/'+lc,
                dataType: 'json',
				async: false,
                type: 'GET',
				timeout : 5000,
                success: function (data) {
						 setTimeout(function() {
        $.hideLoading();
getJson2();
getJson2();
        }, 2000)

                },
                error : function(e) {
				$.hideLoading();
                    $.toast("网络故障","forbidden");
                }
            });
                },
                error : function(e) {
				$.hideLoading();
                    $.toast("网络故障","forbidden");
                }
            });
                },
                error : function(e) {
				$.hideLoading();
                    $.toast("网络故障","forbidden");
                }
            });
                },
                error : function(e) {
				$.hideLoading();
                    $.toast("网络故障","forbidden");
                }
            });


  <?php } ?>
          var docEl = doc.documentElement,
            resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
            recalc = function () {
              var clientWidth = docEl.clientWidth;
              if (!clientWidth) return;
              docEl.style.fontSize = 20 * (clientWidth / 320) + 'px';
            };

          if (!doc.addEventListener) return;
          win.addEventListener(resizeEvt, recalc, false);
          doc.addEventListener('DOMContentLoaded', recalc, false);
        })(document, window);
		function exitt(){
			$.confirm({
  title: '退出',
  text: '这将清除您的宿舍位置和数据缓存，确认查询其他宿舍？',
  onOK: function () {
$.showLoading("清除数据...");
$.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/dfcx/do/exit",
		 async:true, 
		 timeout : 6000,
		 data:"&isis=1",
        success:function(result){ 
      re=result.replace(/[^0-9]/ig,"");
	  $.hideLoading();
		if( re== '1'){$.hideLoading();
				$.toast("成功");
					 setTimeout(function() {
        window.location.reload(true);
        }, 1000);
			}else{$.hideLoading();$.toast("未知错误", "forbidden");}
        }, 
         error:function (result) {   
			$.toast("未知错误", "forbidden");
			document.getElementById("sjj1").style.display = "none";
			document.getElementById("GOGOGO3").style.display = "block";
         }, 
  });
  },
  onCancel: function () {
  $.toast("取消操作", "cancel");
  }
});
		}
		 function login(form) {
					
				$.showLoading("正在更新...");
				$.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/dfcx/e/4",
		 async:true, 
		 timeout : 6000,
		 data:"&isis=1",
        success:function(result){ 
      re=result.replace(/[^0-9]/ig,"");
	  $.hideLoading();
		if( re== '1'){$.hideLoading();
				$.toast("更新成功<br>请刷新");
				document.getElementById('sjj1').innerHTML = "<li class='red'>已完成</li>";
					 setTimeout(function() {
        window.location.reload(true);
        }, 1000);
			}else if( re== '3'){
		$.hideLoading();
				$.toast("操作过快<br>十分钟后重试", "forbidden");
					
			}else if( re== '2'){$.hideLoading();
				$.toast("需要验证<br>请重试", "cancel");
				document.getElementById("GOGOGO3").style.display = "block";
				document.getElementById("sjj1").style.display = "none";
			}else{$.hideLoading();$.toast("未知错误", "forbidden");}
        }, 
         error:function (result) {   
			$.toast("未知错误", "forbidden");
			document.getElementById("sjj1").style.display = "none";
			document.getElementById("GOGOGO3").style.display = "block";
         }, 
  });}
							 
     
         </script>
		 
		 <?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>        <footer>
           
        </footer>
		
</html>