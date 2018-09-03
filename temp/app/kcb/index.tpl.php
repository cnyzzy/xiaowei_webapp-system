<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>课程表-<?php echo $arrInfo['name'];?></title>
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
		<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/kcb/model/js/mui.min.js"></script>
        <script>(function (doc, win) {
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
		 function login(form) {
					
				$.showLoading("正在更新...");
				$.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/home/do/bbb",
		 async:true, 
		 timeout : 5000,
		 data:"&isis=1",
        success:function(result){ 
      re=result.replace(/[^0-9]/ig,"");
	  $.hideLoading();
		if( re== '1'){$.hideLoading();
				$.toast("更新成功<br>请刷新");
				document.getElementById('sjj1').innerHTML = "已完成";
					 setTimeout(function() {
        window.location.reload(true);
        }, 1000);
			}else if( re== '3'){
		$.hideLoading();
				$.toast("操作过快<br>十分钟后重试", "forbidden");
					
			}else if( re== '5'){
		$.hideLoading();
				$.toast("未评课<br>无法读取数据", "forbidden");
					
			}else if( re== '4'){
		$.hideLoading();
				$.toast("教务系统无数据");
					
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
							 
    	function downkcb(){
		<?php if($iskcbdown==1) { ?>	$.confirm({
  title: '提示',
  text: '请长按图片保存课表',
  onOK: function () {
$.showLoading("请稍等");
	 setTimeout(function() {
		
            window.location.href="<?php echo $arrInfo['url'];?>/kcb/print";
        }, 800)	
  },
  onCancel: function () {

  }
});
	<?php } else { ?>
$.confirm({
  title: '提示',
  text: '请更新数据',
  onOK: function () {
$.showLoading("请稍等");

	 setTimeout(function() {
		
            window.location.href="<?php echo $arrInfo['url'];?>/home/update";
        }, 800)	
  },
  onCancel: function () {

  }
});
<?php } ?>	} 
         </script>
		 <script type="text/javascript">
function _w_table_rowspan(_w_table_id,_w_table_colnum){
    _w_table_firsttd = "";
    _w_table_currenttd = "";
    _w_table_SpanNum = 0;
    _w_table_Obj = $(_w_table_id + " tr td:nth-child(" + _w_table_colnum + ")");
    _w_table_Obj.each(function(i){
        if(i==0){
            _w_table_firsttd = $(this);
            _w_table_SpanNum = 1;
        }else{
            _w_table_currenttd = $(this);
            if(_w_table_firsttd.text()==_w_table_currenttd.text()){
                _w_table_SpanNum++;
                _w_table_currenttd.hide(); //remove();
                _w_table_firsttd.attr("rowSpan",_w_table_SpanNum);
            }else{
                _w_table_firsttd = $(this);
                _w_table_SpanNum = 1;
            }
        }
    }); 
}

function _w_table_colspan(_w_table_id,_w_table_rownum,_w_table_maxcolnum){
    if(_w_table_maxcolnum == void 0){_w_table_maxcolnum=0;}
    _w_table_firsttd = "";
    _w_table_currenttd = "";
    _w_table_SpanNum = 0;
    $(_w_table_id + " tr:nth-child(" + _w_table_rownum + ")").each(function(i){
        _w_table_Obj = $(this).children();
        _w_table_Obj.each(function(i){
            if(i==0){
                _w_table_firsttd = $(this);
                _w_table_SpanNum = 1;
            }else if((_w_table_maxcolnum>0)&&(i>_w_table_maxcolnum)){
                return "";
            }else{
                _w_table_currenttd = $(this);
                if(_w_table_firsttd.text()==_w_table_currenttd.text()){
                    _w_table_SpanNum++;
                    _w_table_currenttd.hide(); //remove();
                    _w_table_firsttd.attr("colSpan",_w_table_SpanNum);
                }else{
                    _w_table_firsttd = $(this);
                    _w_table_SpanNum = 1;
                }
            }
        });
    });
}
$(document).ready(function(){  
 var h=0;
   var hh=0;
  for (var y=1;y<11;y++)
{
  for (var x=1;x<8;x++)
{

    hh=$("#"+x+y).height();
	
    if(h<hh)h=hh;
}
}
  for (var y=1;y<11;y++)
{
  for (var x=1;x<8;x++)
{

   $("#"+x+y).height(h);  

}
}

  _w_table_rowspan("#timeTable",2);
  _w_table_rowspan("#timeTable",3);
    _w_table_rowspan("#timeTable",4);
  _w_table_rowspan("#timeTable",5);
  _w_table_rowspan("#timeTable",6);
   _w_table_rowspan("#timeTable",7);
  _w_table_rowspan("#timeTable",8);
 


  if(<?php echo $_SESSION['zid']['type'];?>!=1){
  $.toast("非学生<br>不可使用","cancel");
			 setTimeout(function() {
          window.location.reload(true);
        }, 3000)}
 });

    </script>
    </head>
    <body>
        <header>
		<script type="text/javascript">
		window.onload = function(){
			$('.timetable-course').each(function() {
				if ($(this).text() != '') {
					$(this).css({"background-color":"#3c6080", "color":"#ffffff"});
					$(this).on('click', function(event){
						var id = $(this).attr("id");
						$('#search_bar').hide();
						$('#D'+id).show();
 
					});
				}
			});
			$('.exit').on('click', function(event) {
				$('.cover_table').hide();
				$('#search_bar').show();
			});
		}
	</script>
	<!-- <script type="text/javascript">
		window.onload = function(){
			$('.timetable-course').each(function() {
				if ($(this).text() != '') {
				var getRandomColor = function() {
				return '#' +
					(function(color) {
						return(color += '012340123407812a' [Math.floor(Math.random() * 16)]) &&
							(color.length == 6) ? color : arguments.callee(color);
					})('');
			}
					$(this).css({"background-color": getRandomColor, "color":"#ffffff"});
					$(this).on('click', function(event){
						var id = $(this).attr("id");
						$('#D'+id).show();
 
					});
				}
			});
			$('.exit').on('click', function(event) {
				$('.cover_table').hide();
			});
		}


	</script> -->
         <div class="titlebar reverse">
             <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>课程表</h1>
            </div>
        </header>
        <article style="bottom: 0;">
            <ul class="xunjia-tab clearfix">
			 <?php if($_SESSION['zid']['type']==1) { ?> <a  id="sjj1" href='javascript:login();'> <li class="green"> 更新数据</li> </a>
			 <a href='<?php echo $arrInfo['url'];?>/home/update/1' id="GOGOGO3" style= "display:none"> <li class="green"> 教务验证</li> </a><?php } ?>
               
				
            </ul>           <ul class="xunjia-box">
			
            <a href='javascript:downkcb();' class="weui_btn weui_btn_plain_default">一键保存::教务课表</a>
			<table id="timeTable" class="content" style="table-layout:fixed;">
			
				<tr>
					<th style="width:5%;"></th>
					<th style="height:3%;">周一</th>
					<th style="height:3%;">周二️</th>
					<th style="height:3%;">周三</th>
					<th style="height:3%;">周四</th>
					<th style="height:3%;">周五</th>
					<th style="height:3%;">周六</th>
					<th style="height:3%;">周日</th>
				</tr><?php for($y=1; $y<11; $y++) {?>
				<tr>
					<td><?php echo $y;?></td><?php for($x=1; $x<8; $x++) {?>
					<td class="timetable-course"<?php if(!EMPTY($arrKCB[$x][$y])) { ?> id="<?php echo $x;?><?php echo $y;?>"<?php } ?>><?php if(!EMPTY($arrKCB[$x][$y][0])) { ?><?php echo @$arrKCB[$x][$y][0]['coursename'];?><?php if(!EMPTY($arrKCB[$x][$y][0]['coursesingle'])) { ?><?php if($arrKCB[$x][$y][0]['coursesingle']=='1') { ?>(单周)<?php } else { ?>(双周)<?php } ?><?php } ?><br><?php if(@$arrKCB[$x][$y][0]['courseplace']) { ?>@<?php echo @$arrKCB[$x][$y][0]['courseplace'];?><?php } ?><?php } ?><?php if(!EMPTY($arrKCB[$x][$y][1])) { ?><?php echo @$arrKCB[$x][$y][1]['coursename'];?><?php if(!EMPTY($arrKCB[$x][$y][1]['coursesingle'])) { ?><?php if($arrKCB[$x][$y][1]['coursesingle']=='1') { ?>(单周)<?php } else { ?>(双周)<?php } ?><?php } ?><br><?php if(@$arrKCB[$x][$y][1]['courseplace']) { ?>@<?php echo @$arrKCB[$x][$y][1]['courseplace'];?><?php } ?><?php } ?><?php if(!EMPTY($arrKCB[$x][$y])) { ?><?php echo @$arrKCB[$x][$y]['coursename'];?><br><?php if(@$arrKCB[$x][$y]['courseplace']) { ?>@<?php echo @$arrKCB[$x][$y]['courseplace'];?><?php } ?><?php } ?></td>
					<?php } ?>
				</tr><?php } ?>

			</table>
	
	 <p align="right"><?php echo $arrT['year'];?>学年 第<?php echo $arrT['team'];?>学期</p>
   </ul>                  
   </article>
		<?php for($y=1; $y<11; $y++) {?>
	<?php for($x=1; $x<8; $x++) {?><?php if(!EMPTY($arrKCB[$x][$y])||!EMPTY($arrKCB[$x][$y][1])||!EMPTY($arrKCB[$x][$y][0])) { ?>
			  <div class="cover_table" id="D<?php echo $x;?><?php echo $y;?>" style="max-weight:60%;overflow-x:scroll;">		<div class="exit">
			<img src="<?php echo $arrInfo['url'];?>/app/kcb/model/img/exit.png" height="50" width="50">
		</div>
		<table>	
		<tr>
				<th>科目</th>
				<th>地点</th>
				<th>教师</th>
				<th>类型</th>
				<th>课周</th>
			</tr>
<?php if(!EMPTY($arrKCB[$x][$y][0])) { ?>
  <?php foreach((array)$arrKCB[$x][$y] as $key=>$loopChild) {?>
  <?php if(!EMPTY($loopChild['coursename'])&&$loopChild['coursename']!='') { ?>
			<tr>
				<td><?php if(!EMPTY($loopChild['coursename'])) { ?><a href="<?php echo $arrInfo['url'];?>/kcb/c/<?php echo(urlencode($loopChild['coursename']))?>"><?php echo $loopChild['coursename'];?></a><?php } else { ?>[无数据]<?php } ?></td>
					<td><?php if(!EMPTY($loopChild['courseplace'])) { ?><a href="<?php echo $arrInfo['url'];?>/kcb/room/<?php echo(urlencode($loopChild['courseplace']))?>"><?php echo $loopChild['courseplace'];?></a><?php } else { ?>[无数据]<?php } ?></td>
						<td><?php if(!EMPTY($loopChild['courseteacher'])) { ?><a href="<?php echo $arrInfo['url'];?>/kcb/teacher/<?php echo(urlencode($loopChild['courseteacher']))?>"><?php echo $loopChild['courseteacher'];?></a><?php } else { ?>[无数据]<?php } ?></td>
					<td><?php if(!EMPTY($loopChild['coursetype'])) { ?><?php echo $loopChild['coursetype'];?><?php } else { ?>[无数据]<?php } ?></td>
						<td><?php if(!EMPTY($loopChild['courseweek'])) { ?><?php echo $loopChild['courseweek'];?>
						<?php if(!EMPTY($loopChild['coursesingle'])) { ?><?php if($loopChild['coursesingle']=='1') { ?>(单周)<?php } else { ?>(双周)<?php } ?><?php } ?>
						<?php } else { ?>[无数据]<?php } ?></td>
			</tr>
<?php } ?>
 <?php }?>
 <?php } else { ?>
<tr>
				<td><?php if(!EMPTY($arrKCB[$x][$y]['coursename'])) { ?><a href="<?php echo $arrInfo['url'];?>/kcb/c/<?php echo(urlencode($arrKCB[$x][$y]['coursename']))?>"><?php echo $arrKCB[$x][$y]['coursename'];?></a><?php } else { ?>[无数据]<?php } ?></td>
					<td><?php if(!EMPTY($arrKCB[$x][$y]['courseplace'])) { ?><a href="<?php echo $arrInfo['url'];?>/kcb/room/<?php echo(urlencode($arrKCB[$x][$y]['courseplace']))?>"><?php echo $arrKCB[$x][$y]['courseplace'];?></a><?php } else { ?>[无数据]<?php } ?></td>
						<td><?php if(!EMPTY($arrKCB[$x][$y]['courseteacher'])) { ?><a href="<?php echo $arrInfo['url'];?>/kcb/teacher/<?php echo(urlencode($arrKCB[$x][$y]['courseteacher']))?>"><?php echo $arrKCB[$x][$y]['courseteacher'];?></a><?php } else { ?>[无数据]<?php } ?></td>
					<td><?php if(!EMPTY($arrKCB[$x][$y]['coursetype'])) { ?><?php echo $arrKCB[$x][$y]['coursetype'];?><?php } else { ?>[无数据]<?php } ?></td>
						<td><?php if(!EMPTY($arrKCB[$x][$y]['courseweek'])) { ?><?php echo $arrKCB[$x][$y]['courseweek'];?>
						<?php if(!EMPTY($arrKCB[$x][$y]['coursesingle'])) { ?><?php if($arrKCB[$x][$y]['coursesingle']=='1') { ?>(单周)<?php } else { ?>(双周)<?php } ?><?php } ?>
						<?php } else { ?>[无数据]<?php } ?></td>
			</tr>
<?php } ?>
					<?php } ?>
					
					</table>
	</div>
				<?php } ?>
      <?php } ?>
 


     
 


<div class="weui_search_bar" id="search_bar" style="height: AUTO; position:relative; z-index:0;">
  <form action="<?php echo $arrInfo['url'];?>/kcb/s" method="post" class="weui_search_outer">
    <div class="weui_search_inner">
      <i class="weui_icon_search"></i>
      <input type="search" class="weui_search_input" id="search_input" name="searchpost" placeholder="搜索教室或教师的课表" required/>
      <a href="javascript:" class="weui_icon_clear" id="search_clear"></a>
    </div>
    <label for="search_input" class="weui_search_text" id="search_text">
      <i class="weui_icon_search"></i>
      <span>搜索</span>
    </label>
  </form>
  <a href="javascript:" class="weui_search_cancel" id="search_cancel">取消</a>
</div>


		<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>        <footer>
           
        </footer>
		
</html>