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
		
         <div class="titlebar reverse">
             <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1><?php echo $number;?>的课程表</h1>
            </div>
        </header>
        <article style="bottom: 0;">
		                  <div class="weui_search_bar" id="search_bar" style="position:relative; z-index:0;">
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
            <ul class="xunjia-tab clearfix">

				
            </ul>           <ul class="xunjia-box">
			
           
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
					<td class="timetable-course"<?php if(!EMPTY($arr[$x][$y])) { ?> id="<?php echo $x;?><?php echo $y;?>"<?php } ?>><?php if(!EMPTY($arr[$x][$y][0])) { ?><?php echo @$arr[$x][$y][0]['coursename'];?><?php if(!EMPTY($arr[$x][$y][0]['coursesingle'])) { ?><?php if($arr[$x][$y][0]['coursesingle']=='1') { ?>(单周)<?php } else { ?>(双周)<?php } ?><?php } ?><br><?php if(@$arr[$x][$y][0]['courseplace']) { ?>@<?php echo @$arr[$x][$y][0]['courseplace'];?><?php } ?><?php } ?><?php if(!EMPTY($arr[$x][$y][1])) { ?><?php echo @$arr[$x][$y][1]['coursename'];?><?php if(!EMPTY($arr[$x][$y][1]['coursesingle'])) { ?><?php if($arr[$x][$y][1]['coursesingle']=='1') { ?>(单周)<?php } else { ?>(双周)<?php } ?><?php } ?><br><?php if(@$arr[$x][$y][1]['courseplace']) { ?>@<?php echo @$arr[$x][$y][1]['courseplace'];?><?php } ?><?php } ?><?php if(!EMPTY($arr[$x][$y])) { ?><?php echo @$arr[$x][$y]['coursename'];?><br><?php if(@$arr[$x][$y]['courseplace']) { ?>@<?php echo @$arr[$x][$y]['courseplace'];?><?php } ?><?php } ?></td>
					<?php } ?>
				</tr><?php } ?>
				
			</table>
	
	
   </ul>
</article>
		<?php for($y=1; $y<11; $y++) {?>
	<?php for($x=1; $x<8; $x++) {?><?php if(!EMPTY($arr[$x][$y])||!EMPTY($arr[$x][$y][1])||!EMPTY($arr[$x][$y][0])) { ?>
			  <div class="cover_table" id="D<?php echo $x;?><?php echo $y;?>"style="table-layout:fixed;">
		<div class="exit">
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
<?php if(!EMPTY($arr[$x][$y][0])) { ?>
			<tr>
				<td><?php if(!EMPTY($arr[$x][$y][0]['coursename'])) { ?><a href="<?php echo $arrInfo['url'];?>/kcb/c/<?php echo(urlencode($arr[$x][$y][0]['coursename']))?>"><?php echo $arr[$x][$y][0]['coursename'];?></a><?php } else { ?>[无数据]<?php } ?></td>
					<td><?php if(!EMPTY($arr[$x][$y][0]['courseplace'])) { ?><a href="<?php echo $arrInfo['url'];?>/kcb/room/<?php echo(urlencode($arr[$x][$y][0]['courseplace']))?>"><?php echo $arr[$x][$y][0]['courseplace'];?></a><?php } else { ?>[无数据]<?php } ?></td>
						<td><?php if(!EMPTY($arr[$x][$y][0]['courseteacher'])) { ?><a href="<?php echo $arrInfo['url'];?>/kcb/teacher/<?php echo(urlencode($arr[$x][$y][0]['courseteacher']))?>"><?php echo $arr[$x][$y][0]['courseteacher'];?></a><?php } else { ?>[无数据]<?php } ?></td>
					<td><?php if(!EMPTY($arr[$x][$y][0]['coursetype'])) { ?><?php echo $arr[$x][$y][0]['coursetype'];?><?php } else { ?>[无数据]<?php } ?></td>
						<td><?php if(!EMPTY($arr[$x][$y][0]['courseweek'])) { ?><?php echo $arr[$x][$y][0]['courseweek'];?>
						<?php if(!EMPTY($arr[$x][$y][0]['coursesingle'])) { ?><?php if($arr[$x][$y][0]['coursesingle']=='1') { ?>(单周)<?php } else { ?>(双周)<?php } ?><?php } ?>
						<?php } else { ?>[无数据]<?php } ?></td>
			</tr>

<?php } ?>

<?php if(!EMPTY($arr[$x][$y][1])) { ?>
<tr>
				<td><?php if(!EMPTY($arr[$x][$y][1]['coursename'])) { ?><a href="<?php echo $arrInfo['url'];?>/kcb/c/<?php echo(urlencode($arr[$x][$y][1]['coursename']))?>"><?php echo $arr[$x][$y][1]['coursename'];?></a><?php } else { ?>[无数据]<?php } ?></td>
					<td><?php if(!EMPTY($arr[$x][$y][1]['courseplace'])) { ?><a href="<?php echo $arrInfo['url'];?>/kcb/room/<?php echo(urlencode($arr[$x][$y][1]['courseplace']))?>"><?php echo $arr[$x][$y][1]['courseplace'];?></a><?php } else { ?>[无数据]<?php } ?></td>
						<td><?php if(!EMPTY($arr[$x][$y][1]['courseteacher'])) { ?><a href="<?php echo $arrInfo['url'];?>/kcb/teacher/<?php echo(urlencode($arr[$x][$y][1]['courseteacher']))?>"><?php echo $arr[$x][$y][1]['courseteacher'];?></a><?php } else { ?>[无数据]<?php } ?></td>
					<td><?php if(!EMPTY($arr[$x][$y][1]['coursetype'])) { ?><?php echo $arr[$x][$y][1]['coursetype'];?><?php } else { ?>[无数据]<?php } ?></td>
						<td><?php if(!EMPTY($arr[$x][$y][1]['courseweek'])) { ?><?php echo $arr[$x][$y][1]['courseweek'];?>
						<?php if(!EMPTY($arr[$x][$y][1]['coursesingle'])) { ?><?php if($arr[$x][$y][1]['coursesingle']=='1') { ?>(单周)<?php } else { ?>(双周)<?php } ?><?php } ?>
						<?php } else { ?>[无数据]<?php } ?></td>
			</tr>
<?php } ?>

<?php if(!EMPTY($arr[$x][$y])&&(EMPTY($arr[$x][$y][1])&&EMPTY($arr[$x][$y][0]))) { ?>
<tr>
				<td><?php if(!EMPTY($arr[$x][$y]['coursename'])) { ?><a href="<?php echo $arrInfo['url'];?>/kcb/c/<?php echo(urlencode($arr[$x][$y]['coursename']))?>"><?php echo $arr[$x][$y]['coursename'];?></a><?php } else { ?>[无数据]<?php } ?></td>
					<td><?php if(!EMPTY($arr[$x][$y]['courseplace'])) { ?><a href="<?php echo $arrInfo['url'];?>/kcb/room/<?php echo(urlencode($arr[$x][$y]['courseplace']))?>"><?php echo $arr[$x][$y]['courseplace'];?></a><?php } else { ?>[无数据]<?php } ?></td>
						<td><?php if(!EMPTY($arr[$x][$y]['courseteacher'])) { ?><a href="<?php echo $arrInfo['url'];?>/kcb/teacher/<?php echo(urlencode($arr[$x][$y]['courseteacher']))?>"><?php echo $arr[$x][$y]['courseteacher'];?></a><?php } else { ?>[无数据]<?php } ?></td>
					<td><?php if(!EMPTY($arr[$x][$y]['coursetype'])) { ?><?php echo $arr[$x][$y]['coursetype'];?><?php } else { ?>[无数据]<?php } ?></td>
						<td><?php if(!EMPTY($arr[$x][$y]['courseweek'])) { ?><?php echo $arr[$x][$y]['courseweek'];?>
						<?php if(!EMPTY($arr[$x][$y]['coursesingle'])) { ?><?php if($arr[$x][$y]['coursesingle']=='1') { ?>(单周)<?php } else { ?>(双周)<?php } ?><?php } ?>
						<?php } else { ?>[无数据]<?php } ?></td>
			</tr>
<?php } ?>
					<?php } ?>
					</table>
	</div>
				<?php } ?>
      <?php } ?>
 


<script type="text/javascript">
		window.onload = function(){
			$('.timetable-course').each(function() {
				if ($(this).text() != '') {
					$(this).css({"background-color":"#5cb85c", "color":"#ffffff"});
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
		
    </body>        <footer>
           
        </footer>
		
</html>