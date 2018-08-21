<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>查看奖品-<?php echo $arrInfo['name'];?></title>
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
		<script>

         </script>
         </head>
    <body>
        <header>
		
         <div class="titlebar reverse">
           <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>查看</h1>
            </div>
        </header>
        <article style="bottom: 0;">
 <div class="weui_tab">
  <div class="weui_navbar">
    <a href='#tab1' class="weui_navbar_item weui_bar_item_on">
拥有奖品
    </a>
    <a href='#tab2' class="weui_navbar_item">
联系小薇
    </a>

  </div>
  <div class="weui_tab_bd">
    <div id="tab1" class="weui_tab_bd_item weui_tab_bd_item_active">
	<?php if(!empty($ARRNOW)) { ?>
						<?php foreach((array)$ARRNOW as $key=>$loopChild) {?>
							<?php if(empty($array[$loopChild['sid']])) { ?>
                                          <div class="weui_panel">
  <div class="weui_panel_hd">该活动已被删除<?php if(!empty($loopChild['isopen'])&&$loopChild['isopen']=='0') { ?><font color='#df4d26' style=" float:right; ">【已结束】</font><?php } ?></div>
  <div class="weui_panel_bd">
  	
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title"><?php ECHO(date('Y-m-j G:i:s',$loopChild['addtime']))?></h4>
      <p class="weui_media_desc">截止:<?php ECHO(date('Y-m-j G:i:s',$loopChild['endtime']))?></p>
      <ul class="weui_media_info">
      </ul>
    </div>

  </div>
</div> 
<?php } else { ?>
                                        <div class="weui_panel">
  <div class="weui_panel_hd"><?php echo $array[$loopChild['sid']]['time'];?></div>
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title"><?php echo $array[$loopChild['sid']]['title'];?><?php if(!empty($loopChild['isopen'])&&$loopChild['isopen']=='0') { ?><font color='#df4d26'style=" float:right; ">【已结束】</font><?php } ?></h4>
      <p class="weui_media_desc"><?php ECHO(date('Y-m-j G:i:s',$loopChild['addtime']))?></p>
      <ul class="weui_media_info">
      </ul>
    </div>
</div> 
<?php } ?>
<?php }?>                                         
<?php } else { ?>
		   <div class="weui_panel">
  <div class="weui_panel_hd">空空如也</div>
  <div class="weui_panel_bd">
 
  </div>
</div>
<?php } ?>

                                         	


    </div>
    <div id="tab2" class="weui_tab_bd_item">
  	<?php if(!empty($ARRH)) { ?>
						<?php foreach((array)$ARRH as $key=>$loopChild) {?>
							<?php if(empty($array[$loopChild['sid']])) { ?>
                                          <div class="weui_panel">
  <div class="weui_panel_hd">该活动已被删除<?php if($loopChild['isok']==0) { ?><font color='#df4d26'style=" float:right; ">【已结束】</font><?php } ?></div>
  <div class="weui_panel_bd">
  	


  </div>
</div> 
<?php } else { ?>
                                        <div class="weui_panel">
  <div class="weui_panel_hd"><?php echo $array[$loopChild['sid']]['title'];?><?php if($loopChild['isok']==0) { ?><font color='#df4d26'style=" float:right; ">【已结束】</font><?php } ?></div>
  <div class="weui_panel_bd">
  	
    <div class="weui_media_box weui_media_text">

      <ul class="weui_media_info">

      </ul>
    </div>

  </div>	
</div> 
<?php } ?>
<?php }?>                                         
<?php } else { ?>
		   <div class="weui_panel">
  <div class="weui_panel_hd">0515-88233265</div>
  <div class="weui_panel_hd">宣传部 房新侠老师</div>
  <div class="weui_panel_bd">
 
  </div>
</div>
<?php } ?>
    </div>

  </div>
</div>



</article>
		
		<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
    </body>        <footer>
           
        </footer>
		
</html>