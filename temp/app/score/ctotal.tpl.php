<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>学分绩点-<?php echo $arrInfo['name'];?></title>
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
		 
    </head>
    <body>
        <header>
		
         <div class="titlebar reverse">
             <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>学分绩点总计</h1>
            </div>
        </header>
        <article style="bottom: 0;">
            <ul class="xunjia-tab clearfix">
			 
				
            </ul>           <ul class="xunjia-box">
			
<div class="weui_cells">

	  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p><b>我的</b></p>
    </div>
    <div class="weui_cell_ft">
    </div>
  </div>

   <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>最高学分</p>
    </div>
    <div class="weui_cell_ft">
      <?php if(empty($arr1['maxxf'])) { ?>【无】<?php } else { ?><?php echo $arr1['maxxf'];?><?php } ?>
    </div>
  </div>
   <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>平均学分</p>
    </div>
    <div class="weui_cell_ft">
      <?php if(empty($arr1['xf'])) { ?>【无】<?php } else { ?><?php echo $arr1['xf'];?><?php } ?>
    </div>
  </div>
     <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>总学分</p>
    </div>
    <div class="weui_cell_ft">
      <?php if(empty($arr1['sxf'])) { ?>【无】<?php } else { ?><?php echo $arr1['sxf'];?><?php } ?>
    </div>
  </div>
    	  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>最高绩点</p>
    </div>
    <div class="weui_cell_ft">
    <?php if(empty($arr1['maxjd'])) { ?>【无】<?php } else { ?><?php echo $arr1['maxjd'];?><?php } ?>
    </div>
  </div>
     <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>平均绩点</p>
    </div>
    <div class="weui_cell_ft">
      <?php if(empty($arr1['jd'])) { ?>【无】<?php } else { ?><?php echo $arr1['jd'];?><?php } ?>
    </div>
  </div>
     <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>总绩点</p>
    </div>
    <div class="weui_cell_ft">
      <?php if(empty($arr1['sjd'])) { ?>【无】<?php } else { ?><?php echo $arr1['sjd'];?><?php } ?>
    </div>
  </div>
   <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>GPA</p>
    </div>
    <div class="weui_cell_ft">
      <?php if(empty($arrgpa['gpa'])) { ?>【无】<?php } else { ?><?php echo(round($arrgpa['gpa'],2))?><?php } ?>
    </div>
  </div>

  
  

	  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p><b>平均学分</b></p>
    </div>
    <div class="weui_cell_ft">
    </div>
  </div>
    <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>我的学分</p>
    </div>
    <div class="weui_cell_ft">
      <?php if(empty($arr1['xf'])) { ?>【无】<?php } else { ?><?php echo $arr1['xf'];?><?php } ?>
    </div>
  </div>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>班级最高平均</p>
    </div>
    <div class="weui_cell_ft">
     <?php if(empty($arr3f['xf2'])) { ?>【无】<?php } else { ?><?php echo $arr3f['xf2'];?><?php } ?>
    </div>
  </div>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>年级最高平均</p>
    </div>
    <div class="weui_cell_ft">
     <?php if(empty($arr5f['xf2'])) { ?>【无】<?php } else { ?><?php echo $arr5f['xf2'];?><?php } ?>
    </div>
  </div>
<div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>班级平均</p>
    </div>
    <div class="weui_cell_ft">
      <?php if(empty($arr2['xf'])) { ?>【无】<?php } else { ?><?php echo $arr2['xf'];?><?php } ?>
    </div>
  </div>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>年级平均</p>
    </div>
    <div class="weui_cell_ft">
      <?php if(empty($arr4['xf'])) { ?>【无】<?php } else { ?><?php echo $arr4['xf'];?><?php } ?>
    </div>
  </div>
     

  
  
	  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p><b>平均绩点</b></p>
    </div>
    <div class="weui_cell_ft">
    </div>
  </div>
    <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>我的绩点</p>
    </div>
    <div class="weui_cell_ft">
 <?php if(empty($arr1['jd'])) { ?>【无】<?php } else { ?><?php echo $arr1['jd'];?><?php } ?>
    </div>
  </div>
 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>班级最高平均</p>
    </div>
    <div class="weui_cell_ft">
       <?php if(empty($arr3['jd2'])) { ?>【无】<?php } else { ?><?php echo $arr3['jd2'];?><?php } ?>
    </div>
  </div>
      <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>年级最高平均</p>
    </div>
    <div class="weui_cell_ft">
       <?php if(empty($arr5['jd2'])) { ?>【无】<?php } else { ?><?php echo $arr5['jd2'];?><?php } ?>
    </div>
  </div>
  
    	  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>班级平均</p>
    </div>
    <div class="weui_cell_ft">
     <?php if(empty($arr2['jd'])) { ?>【无】<?php } else { ?><?php echo $arr2['jd'];?><?php } ?>
    </div>
  </div>
  	  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>年级平均</p>
    </div>
    <div class="weui_cell_ft">
     <?php if(empty($arr4['jd'])) { ?>【无】<?php } else { ?><?php echo $arr4['jd'];?><?php } ?>
    </div>
  </div>
  
  
  	  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p><b>总计学分</b></p>
    </div>
    <div class="weui_cell_ft">
    </div>
  </div>
    <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>我的学分</p>
    </div>
    <div class="weui_cell_ft">
      <?php if(empty($arr1['sxf'])) { ?>【无】<?php } else { ?><?php echo $arr1['sxf'];?><?php } ?>
    </div>
  </div>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>班级最高</p>
    </div>
    <div class="weui_cell_ft">
     <?php if(empty($arr7f['xf2'])) { ?>【无】<?php } else { ?><?php echo $arr7f['xf2'];?><?php } ?>
    </div>
  </div>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>年级最高</p>
    </div>
    <div class="weui_cell_ft">
     <?php if(empty($arr8f['xf2'])) { ?>【无】<?php } else { ?><?php echo $arr8f['xf2'];?><?php } ?>
    </div>
  </div>
<div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>班级平均</p>
    </div>
    <div class="weui_cell_ft">
      <?php if(empty($arr2['xf'])||empty($arr2['cnum'])) { ?>【无】<?php } else { ?><?php echo(round($arr2['xf']*$arr2['cnum']/$arr2['num'],2))?><?php } ?>
    </div>
  </div>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>年级平均</p>
    </div>
    <div class="weui_cell_ft">
       <?php if(empty($arr4['xf'])||empty($arr4['cnum'])) { ?>【无】<?php } else { ?><?php echo(round($arr4['xf']*$arr4['cnum']/$arr4['num'],2))?><?php } ?>
    </div>
  </div>
     
   	  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p><b>总计绩点</b></p>
    </div>
    <div class="weui_cell_ft">
    </div>
  </div>
    <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>我的绩点</p>
    </div>
    <div class="weui_cell_ft">
      <?php if(empty($arr1['sjd'])) { ?>【无】<?php } else { ?><?php echo $arr1['sjd'];?><?php } ?>
    </div>
  </div>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>班级最高</p>
    </div>
    <div class="weui_cell_ft">
     <?php if(empty($arr7['jd2'])) { ?>【无】<?php } else { ?><?php echo $arr7['jd2'];?><?php } ?>
    </div>
  </div>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>年级最高</p>
    </div>
    <div class="weui_cell_ft">
     <?php if(empty($arr8['jd2'])) { ?>【无】<?php } else { ?><?php echo $arr8['jd2'];?><?php } ?>
    </div>
  </div>
<div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>班级平均</p>
    </div>
    <div class="weui_cell_ft">
      <?php if(empty($arr2['jd'])||empty($arr2['cnum'])) { ?>【无】<?php } else { ?><?php echo(round($arr2['jd']*$arr2['cnum']/$arr2['num'],2))?><?php } ?>
    </div>
  </div>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>年级平均</p>
    </div>
    <div class="weui_cell_ft">
       <?php if(empty($arr4['jd'])||empty($arr4['cnum'])) { ?>【无】<?php } else { ?><?php echo(round($arr4['jd']*$arr4['cnum']/$arr4['num'],2))?><?php } ?>
    </div>
  </div>
	 

   	  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p><b>GPA</b></p>
    </div>
    <div class="weui_cell_ft">
    </div>
  </div>
    <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>我的GPA</p>
    </div>
    <div class="weui_cell_ft">
   <?php if(empty($arrgpa['gpa'])) { ?>【无】<?php } else { ?><?php echo(round($arrgpa['gpa'],2))?><?php } ?>
    </div>
  </div>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>班级最高</p>
    </div>
    <div class="weui_cell_ft">
     <?php if(empty($bjgpaarr['gpa'])) { ?>【无】<?php } else { ?><?php echo(round($bjgpaarr['gpa'],2))?><?php } ?>
    </div>
  </div>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>年级最高</p>
    </div>
    <div class="weui_cell_ft">
     <?php if(empty($njgpaarr['gpa'])) { ?>【无】<?php } else { ?><?php echo(round($njgpaarr['gpa'],2))?><?php } ?>
    </div>
  </div>
<div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>班级平均</p>
    </div>
    <div class="weui_cell_ft">
     <?php if(empty($bjgpa['gpa'])) { ?>【无】<?php } else { ?><?php echo(round($bjgpa['gpa'],2))?><?php } ?>
    </div>
  </div>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>年级平均</p>
    </div>
    <div class="weui_cell_ft">
    <?php if(empty($njgpa['gpa'])) { ?>【无】<?php } else { ?><?php echo(round($njgpa['gpa'],2))?><?php } ?>
    </div>
  </div>
	
	 <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p><b>数据概况</b></p>
    </div>
    <div class="weui_cell_ft">
    </div>
  </div> 

    <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>我的统计(条数)</p>
    </div>
    <div class="weui_cell_ft">
    <?php if(empty($arr1['cnum'])) { ?>【无】<?php } else { ?><?php echo $arr1['cnum'];?><?php } ?>
    </div>
  </div>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>班级统计(人/条数)</p>
    </div>
    <div class="weui_cell_ft">
          <?php if(empty($arr2['num'])) { ?>0<?php } else { ?><?php echo $arr2['num'];?><?php } ?>/<?php if(empty($arr2['cnum'])) { ?>0<?php } else { ?><?php echo $arr2['cnum'];?><?php } ?>
    </div>
  </div>
    <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>年级统计(人/条数)</p>
    </div>
    <div class="weui_cell_ft">
     <?php if(empty($arr4['num'])) { ?>0<?php } else { ?><?php echo $arr4['num'];?><?php } ?>/<?php if(empty($arr4['cnum'])) { ?>0<?php } else { ?><?php echo $arr4['cnum'];?><?php } ?>
    </div>
  </div>
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>所有统计(人/条数)</p>
    </div>
    <div class="weui_cell_ft">
      <?php if(empty($arr6['num'])) { ?>0<?php } else { ?><?php echo $arr6['num'];?><?php } ?>/<?php if(empty($arr6['cnum'])) { ?>0<?php } else { ?><?php echo $arr6['cnum'];?><?php } ?>
    </div>
  </div>

    <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>总平均学分</p>
    </div>
    <div class="weui_cell_ft">
   <?php if(empty($arr6['xf2'])) { ?>【无】<?php } else { ?><?php echo $arr6['xf2'];?><?php } ?>
    </div>
  </div>
    <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>总平均绩点</p>
    </div>
    <div class="weui_cell_ft">
  <?php if(empty($arr6['jd2'])) { ?>【无】<?php } else { ?><?php echo $arr6['jd2'];?><?php } ?>
    </div>
  </div>
      <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>平均总学分</p>
    </div>
    <div class="weui_cell_ft">
   <?php if(empty($arr6['xf2'])||empty($arr6['cnum'])) { ?>【无】<?php } else { ?><?php echo(round($arr6['xf2']*$arr6['cnum']/$arr6['num'],2))?><?php } ?>
    </div>
  </div>
    <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>平均总绩点</p>
    </div>
    <div class="weui_cell_ft">
 <?php if(empty($arr6['jd2'])||empty($arr6['cnum'])) { ?>【无】<?php } else { ?><?php echo(round($arr6['jd2']*$arr6['cnum']/$arr6['num'],2))?><?php } ?>
    </div>
  </div>
    <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <p>平均GPA</p>
    </div>
    <div class="weui_cell_ft">
 <?php if(empty($gpaa['gpa'])) { ?>【无】<?php } else { ?><?php echo(round($gpaa['gpa'],2))?><?php } ?>
    </div>
  </div>
</div>
	
	
   </ul>
        </article>
<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>        <footer>
           
        </footer>
		
</html>