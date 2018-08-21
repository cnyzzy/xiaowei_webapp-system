<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>成绩-<?php echo $arrInfo['name'];?></title>
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
		url:"<?php echo $arrInfo['url'];?>/home/do/ccc",
		 async:true, 
		 timeout : 5000,
		 data:"&isis=1",
        success:function(result){ 
      re=result.replace(/[^0-9]/ig,"");
	  $.hideLoading();
		if( re== '1'){$.hideLoading();
				$.toast("更新成功<br>请刷新");
				document.getElementById('sjj1').innerHTML = "<li class='red'>已完成</li>";
					 setTimeout(function() {
       window.location.href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/index/"+Math.random();
        }, 1000);
			}else if( re== '3'){
		$.hideLoading();
				$.toast("操作过快<br>十分钟后重试", "forbidden");
					
			}else if( re== '2'){
		$.hideLoading();
				$.toast("数据库异常", "forbidden");
					document.getElementById("GOGOGO3").style.display = "block";
				document.getElementById("sjj1").style.display = "none";
			}else if( re== '4'){$.hideLoading();
				$.toast("需要验证<br>请重试", "cancel");
				document.getElementById("GOGOGO3").style.display = "block";
				document.getElementById("sjj1").style.display = "none";
			}else{$.hideLoading();$.toast("未知错误", "forbidden");
			document.getElementById("GOGOGO3").style.display = "block";
				document.getElementById("sjj1").style.display = "none";}
        }, 
         error:function (result) {   
			$.toast("未知错误", "forbidden");
			document.getElementById("sjj1").style.display = "none";
			document.getElementById("GOGOGO3").style.display = "block";
         }, 
  });}
							 
     $(document).ready(function(){  

  if(<?php echo $_SESSION['zid']['type'];?>!=1){
  $.toast("非学生<br>不可使用","cancel");
			 setTimeout(function() {
      window.location.href="<?php echo $arrInfo['url'];?>/home/index/cj/"+Math.random();
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
                <h1>成绩</h1>
            </div>
        </header>
        <article style="bottom: 0;">
            <ul class="xunjia-tab clearfix">
			 <?php if($_SESSION['zid']['type']==1) { ?> <a  id="sjj1" href='javascript:login();'> <li class="green"> 更新数据</li> </a>
			 <a href='<?php echo $arrInfo['url'];?>/home/update/1' id="GOGOGO3" style= "display:none"> <li class="green"> 教务验证</li> </a><?php } ?>
               
				
            </ul>           <ul class="xunjia-box">
			
<div class="weui_cells weui_cells_access">
<?php if((!EMPTY($arr2))||(!EMPTY($arr3))||(!EMPTY($arrgpa))) { ?>
  <div class="weui_cell"><div class="weui_cell"><div class="weui_cell_bd weui_cell_primary">
      <p><b>总体统计</b></p>
    </div>
    <div class="weui_cell_ft">
      <b>概况</b>
    </div></div></div><?php if((!EMPTY($arr2))) { ?>
  <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/atotal">
    <div class="weui_cell_bd weui_cell_primary">
      <p>学分</p>
    </div>
    <div class="weui_cell_ft"><b><?php echo $arr2[5][2];?></b></div>
  </a><?php } ?>
  <?php if((!EMPTY($arr3))) { ?>
    <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/btotal">
    <div class="weui_cell_bd weui_cell_primary">
      <p>校选课学分</p>
    </div>
    <div class="weui_cell_ft"><b><?php echo $arr3[7][2];?></b></div>
  </a> <?php } ?>  <?php if((!EMPTY($arr4))) { ?>
    <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/ctotal">
    <div class="weui_cell_bd weui_cell_primary">
      <p>平均绩点</p>
    </div>
    <div class="weui_cell_ft"><b><?php echo $arr4['jd'];?></b></div>
  </a> <?php } ?><?php if((!EMPTY($arrgpa))) { ?>
    <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/ctotal">
    <div class="weui_cell_bd weui_cell_primary">
      <p>GPA</p>
    </div>
    <div class="weui_cell_ft"><b><?php echo(round($arrgpa['gpa'],2))?></b></div>
  </a> <?php } ?>
  <?php } ?>
<?php if((!EMPTY($arr1))) { ?>
<?php $isbr= $arr1[0][1];$isbr2= $arr1[0][0];?>
<?php if($arr1CJ=='成绩') { ?>
<div class="weui_cell"><div class="weui_cell"><div class="weui_cell_bd weui_cell_primary">
      <p><b><?php echo $arr1[0][0];?></b></p>
    </div>
    <div class="weui_cell_ft">
      <b>第<?php echo $arr1[0][1];?>学期</b>
    </div></div></div>
	<?php foreach((array)$arr1 as $key=>$Child) {?>
<?php if($isbr!=$Child[1]||$isbr2!=$Child[0]) { ?><div class="weui_cell"><div class="weui_cell"><div class="weui_cell_bd weui_cell_primary">
      <p><b><?php echo $Child[0];?></b></p>
    </div>
    <div class="weui_cell_ft">
      <b>第<?php echo $Child[1];?>学期</b>
    </div></div></div><?php } ?>
  <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/detail/<?php echo $key;?>">
    <div class="weui_cell_bd weui_cell_primary"style="max-width:75%;">
      <p style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php echo $Child[3];?></p>
    </div>
    <div class="weui_cell_ft"><b><?php if($Child[10]=="不及格"||($Child[10]<60&&is_numeric($Child[10]))) { ?><font color="red"><?php echo $Child[10];?></font><?php } ?><?php if($Child[10]=="优秀"||$Child[10]=="良好"||($Child[10]>=80&&is_numeric($Child[10]))) { ?><font color="green"><?php echo $Child[10];?></font><?php } ?><?php if(($Child[10]!="不及格"&&$Child[10]!="优秀"&&$Child[10]!="良好"&&!is_numeric($Child[10]))||($Child[10]<80&&is_numeric($Child[10])&&$Child[10]>=60)) { ?><?php echo $Child[10];?><?php } ?></b></div>
  </a>
  <?php $isbr= $Child[1];$isbr2=$Child[0];?>
  <?php }?>
  <?php } else { ?>
  <div class="weui_cell"><div class="weui_cell"><div class="weui_cell_bd weui_cell_primary">
      <p><b><?php echo $arr1[0][0];?></b></p>
    </div>
    <div class="weui_cell_ft">
      <b>第<?php echo $arr1[0][1];?>学期</b>
    </div></div></div>
	<?php foreach((array)$arr1 as $key=>$Child) {?>
<?php if($isbr!=$Child[1]) { ?><div class="weui_cell"><div class="weui_cell"><div class="weui_cell_bd weui_cell_primary">
      <p><b><?php echo $Child[0];?></b></p>
    </div>
    <div class="weui_cell_ft">
      <b>第<?php echo $Child[1];?>学期</b>
    </div></div></div><?php } ?>
  <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/detail/<?php echo $key;?>">
    <div class="weui_cell_bd weui_cell_primary"style="max-width:75%;">
      <p style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php echo $Child[3];?></p>
    </div>
    <div class="weui_cell_ft"><b><?php if($Child[8]=="不及格"||($Child[8]<60&&is_numeric($Child[8]))) { ?><font color="red"><?php echo $Child[8];?></font><?php } ?><?php if($Child[8]=="优秀"||$Child[8]=="良好"||($Child[8]>=80&&is_numeric($Child[8]))) { ?><font color="green"><?php echo $Child[8];?></font><?php } ?><?php if(($Child[8]!="不及格"&&$Child[8]!="优秀"&&$Child[8]!="良好"&&!is_numeric($Child[8]))||($Child[8]<80&&is_numeric($Child[8])&&$Child[8]>=60)) { ?><?php echo $Child[8];?><?php } ?></b></div>
  </a>
  <?php $isbr= $Child[1];?>
  <?php }?>
  <?php } ?>
  
  <?php } else { ?>请更新数据<?php } ?>
</div>
	
	
   </ul>
        </article>
<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>        <footer>
           
        </footer>
		
</html>