<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>培养计划-<?php echo $arrInfo['name'];?></title>
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
		 function login(form) {
					
				$.showLoading("正在更新...");
				$.ajax({  
          type:"POST", 
		url:"<?php echo $arrInfo['url'];?>/home/do/ddd",
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
					
			}else if( re== '2'){$.hideLoading();
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
                <h1>培养计划</h1>
            </div>
        </header>
        <article style="bottom: 0;">
            <ul class="xunjia-tab clearfix">
			 <?php if($_SESSION['zid']['type']==1) { ?> <a  id="sjj1" href='javascript:login();'> <li class="green"> 更新数据</li> </a>
			 <a href='<?php echo $arrInfo['url'];?>/home/update/1' id="GOGOGO3" style= "display:none"> <li class="green"> 教务验证</li> </a><?php } ?>
               
				
            </ul>           <ul class="xunjia-box">
			
<div class="weui_cells weui_cells_access">
<?php if((!EMPTY($arr2))) { ?>
  <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/detail2">
    <div class="weui_cell_bd weui_cell_primary"style="max-width:75%;">
     <b>毕业学分要求</b>
    </div>
    <div class="weui_cell_ft">查看</div>
  </a>	
<?php } ?>
<?php if((!EMPTY($arr3))) { ?>
  <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/detail3">
    <div class="weui_cell_bd weui_cell_primary"style="max-width:75%;">
     <b>公选课学分要求</b>
    </div>
    <div class="weui_cell_ft">查看</div>
  </a>	
  <div class="weui_cell"><div class="weui_cell"><div class="weui_cell_bd weui_cell_primary">

    </div>
</div></div>
<?php } ?>

<?php if((!EMPTY($arr1))) { ?>
<?php $isbr= $arr1[1][7];?>
<div class="weui_cell"><div class="weui_cell"><div class="weui_cell_bd weui_cell_primary">
      <p><b>第<?php echo $arr1[1][7];?>学期</b></p>
    </div>
    <div class="weui_cell_ft">
      <b>培养计划</b>
    </div></div></div>
	<?php foreach((array)$arr1 as $key=>$Child) {?>
<?php if($isbr!=$Child[7]) { ?><div class="weui_cell"><div class="weui_cell"><div class="weui_cell_bd weui_cell_primary">
      <p><b>第<?php echo $Child[7];?>学期</b></p>
    </div>
    <div class="weui_cell_ft">
      <b>培养计划</b>
    </div></div></div><?php } ?>
  <a class="weui_cell" href="<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/detail/<?php echo $key;?>">
    <div class="weui_cell_bd weui_cell_primary"style="max-width:75%;">
      <p style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?php echo $Child[1];?></p>
    </div>
    <div class="weui_cell_ft"><b><?php if($Child[4]=="考试") { ?><font color="red"><?php echo $Child[4];?></font><?php } ?><?php if($Child[4]=="考查") { ?><font color="green"><?php echo $Child[4];?></font><?php } ?><?php if($Child[4]!="考试"&&$Child[4]!="考查") { ?><?php echo $Child[4];?><?php } ?></b></div>
  </a>
  <?php $isbr= $Child[7];?>
  <?php }?><?php } else { ?>请更新数据<?php } ?>
  <div class="weui_cell"><div class="weui_cell"><div class="weui_cell_bd weui_cell_primary">
      <p><b>*</b></p>
    </div>
    <div class="weui_cell_ft">
      <b>培养计划仅供参考</b>
    </div></div></div>
    <div class="weui_cell_bd weui_cell_primary">
      <p></p>
    </div>
    <div class="weui_cell_ft">根据实际情况调整，以当学期安排为准</div>
	</div>
	
   </ul>
        </article>
<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>        <footer>
           
        </footer>
		
</html>