<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>盐城师范学院勤工助学管理中心招新系统</title>

  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="<?php echo $arrInfo['url'];?>/include/model/yuan/assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo $arrInfo['url'];?>/include/model/yuan/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/include/model/yuan/assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/include/model/yuan/assets/css/admin.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar admin-header">
  <div class="am-topbar-brand">
    <strong>勤管招新</strong> <small>后台管理系统</small>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">

      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-users"></span> <?php if($zone==1) { ?>新校区管理员<?php } ?><?php if($zone==2) { ?>老校区管理员<?php } ?><?php if($admin==1) { ?>超级管理员<?php } ?> <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">

          <li><a href="<?php echo $arrInfo['url'];?>/login/out"><span class="am-icon-power-off"></span> 退出</a></li>
        </ul>
      </li>
      <li><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>
</header>

<div class="am-cf admin-main">
  <!-- sidebar start -->
  <div class="admin-sidebar">
    <ul class="am-list admin-sidebar-list">
      <li><a href="<?php echo $arrInfo['url'];?>/zzz"><span class="am-icon-home"></span> 首页</a></li>
      <li class="admin-parent">
        <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 部门分类<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
        <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
		          <li><a href="<?php echo $arrInfo['url'];?>/table/1"><span class="am-icon-th <?php if($type==1) { ?>admin-icon-yellow<?php } ?>"></span> 管理部<span class="am-badge am-badge-secondary am-margin-right am-fr"><?php echo $Ntype1;?></span></a></li>
<li><a href="<?php echo $arrInfo['url'];?>/table/2"><span class="am-icon-th <?php if($type==2) { ?>admin-icon-yellow<?php } ?>"></span> 家教部<span class="am-badge am-badge-secondary am-margin-right am-fr"><?php echo $Ntype2;?></span></a></li>
		          <li><a href="<?php echo $arrInfo['url'];?>/table/3"><span class="am-icon-th <?php if($type==3) { ?>admin-icon-yellow<?php } ?>"></span> 贷款部<span class="am-badge am-badge-secondary am-margin-right am-fr"><?php echo $Ntype3;?></span></a></li>
<li><a href="<?php echo $arrInfo['url'];?>/table/4"><span class="am-icon-th <?php if($type==4) { ?>admin-icon-yellow<?php } ?>"></span> 勤工助学部<span class="am-badge am-badge-secondary am-margin-right am-fr"><?php echo $Ntype4;?></span></a></li>
		          <li><a href="<?php echo $arrInfo['url'];?>/table/5"><span class="am-icon-th <?php if($type==5) { ?>admin-icon-yellow<?php } ?>"></span> 宣传部<span class="am-badge am-badge-secondary am-margin-right am-fr"><?php echo $Ntype5;?></span></a></li>
<li><a href="<?php echo $arrInfo['url'];?>/table/6"><span class="am-icon-th <?php if($type==6) { ?>admin-icon-yellow<?php } ?>"></span> 监管部<span class="am-badge am-badge-secondary am-margin-right am-fr"><?php echo $Ntype6;?></span></a></li>
		          <li><a href="<?php echo $arrInfo['url'];?>/table/7"><span class="am-icon-th <?php if($type==7) { ?>admin-icon-yellow<?php } ?>"></span> 网络部<span class="am-badge am-badge-secondary am-margin-right am-fr"><?php echo $Ntype7;?></span></a></li>
<li><a href="<?php echo $arrInfo['url'];?>/table/8"><span class="am-icon-th <?php if($type==8) { ?>admin-icon-yellow<?php } ?>"></span> 编辑部<span class="am-badge am-badge-secondary am-margin-right am-fr"><?php echo $Ntype8;?></span></a></li>
		          <li><a href="<?php echo $arrInfo['url'];?>/table/9"><span class="am-icon-th <?php if($type==9) { ?>admin-icon-yellow<?php } ?>"></span> 人力资源部<span class="am-badge am-badge-secondary am-margin-right am-fr"><?php echo $Ntype9;?></span></a></li>

        </ul>
      </li>
      <li><a href="<?php echo $arrInfo['url'];?>/help"><span class="am-icon-pencil-square-o"></span> 帮助</a></li>
		<li><a href="<?php echo $arrInfo['url'];?>/log"><span class="am-icon-calendar"></span> 系统日志</a></li>
      <li><a href="<?php echo $arrInfo['url'];?>/login/out"><span class="am-icon-sign-out"></span> 注销</a></li>
    </ul>

    <div class="am-panel am-panel-default admin-sidebar-panel">
      <div class="am-panel-bd">
        <p><span class="am-icon-bookmark"></span> 寄语</p>
        <p><?php echo $arrInfo['jiyu'];?></p>
      </div>
    </div>

    <div class="am-panel am-panel-default admin-sidebar-panel">
      <div class="am-panel-bd">
        <p><span class="am-icon-tag"></span> 提示</p>
        <p><?php echo $arrInfo['tip'];?></p>
      </div>
    </div>
  </div>
  <!-- sidebar end -->

  <!-- content start -->
  <div class="admin-content">
    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">报名资料</strong> / <small>Registration information</small></div>
    </div>

    <hr/>

    <div class="am-g">

      <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
        <div class="am-panel am-panel-default">
          <div class="am-panel-bd">
           
提示
           
          </div>
        </div>

        <div class="am-panel am-panel-default">
          <div class="am-panel-bd">
            <div class="user-info">
               请勿随意修改信息。
            </div>
            <div class="user-info">
            后台拥有极大权限，认真校对后才可保存，以免造成数据紊乱! 
            </div>
          </div>
        </div>

      </div>
        <form class="am-form am-form-horizontal" name="info"  method="post" action="">  
      <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">

          <div class="am-form-group">
            <label for="user-name" class="am-u-sm-3 am-form-label">姓名 / Name</label>
            <div class="am-u-sm-9">
              <input type="text" name="name" placeholder="姓名 / Name" VALUE="<?php echo $row['name'];?>">
              <small>后台没有数据库自动验证，请人工校对</small>
            </div>
          </div>

          <div class="am-form-group">
            <label for="user-email" class="am-u-sm-3 am-form-label">学号 / Number</label>
            <div class="am-u-sm-9">
              <input type="text" name="number" placeholder="输入学号 / Number" VALUE="<?php echo $row['number'];?>">
              <small>人工校对...</small>
            </div>
          </div>
		            <div class="am-form-group">
            <label for="user-email" class="am-u-sm-3 am-form-label">性别 / Gender</label>
            <div class="am-u-sm-9">
  	<select name="gender">
								<option value="0" selected disabled>性别</option>
								<option value="1" <?php if($row['gender']==1) { ?>selected = "selected"<?php } ?>>男生</option>
								<option value="2" <?php if($row['gender']==2) { ?>selected = "selected"<?php } ?>>女生</option>
							</select>
            </div>
          </div>

    <div class="am-form-group">
            <label for="user-name" class="am-u-sm-3 am-form-label">校区 / Zone</label>
            <div class="am-u-sm-9">
             <label class="select">
								<select name="zone">
								<option value="0" selected disabled>校区</option>
								<option value="1" <?php if($row['zone']==1) { ?>selected = "selected"<?php } ?>>新长校区</option>
								<option value="2" <?php if($row['zone']==2) { ?>selected = "selected"<?php } ?>>通榆校区</option>
							</select>
            </div>
          </div>
  <div class="am-form-group">
            <label for="user-email" class="am-u-sm-3 am-form-label">学院 / Collage</label>
            <div class="am-u-sm-9">
              <input type="text" name="collage" placeholder="输入学院 / Collage" VALUE="<?php echo $row['collage'];?>">
              
            </div>
          </div>
		    <div class="am-form-group">
            <label for="user-email" class="am-u-sm-3 am-form-label">班级 / Class</label>
            <div class="am-u-sm-9">
              <input type="text" name="class" placeholder="输入班级 / Class" VALUE="<?php echo $row['class'];?>">
              
            </div>
          </div>
		  		    <div class="am-form-group">
            <label for="user-email" class="am-u-sm-3 am-form-label">部门 / Type</label>
            <div class="am-u-sm-9">
             	<label class="select">
								<select name="type">
								<option value="0" selected disabled>部门</option>
								<option value="1" <?php if($type==1) { ?>selected = "selected"<?php } ?>>管理部</option>
								<option value="2" <?php if($type==2) { ?>selected = "selected"<?php } ?>>家教部</option>
								<option value="3" <?php if($type==3) { ?>selected = "selected"<?php } ?>>贷款部</option>
								<option value="4" <?php if($type==4) { ?>selected = "selected"<?php } ?>>勤工助学部</option>
								<option value="5" <?php if($type==5) { ?>selected = "selected"<?php } ?>>宣传部</option>
								<option value="6" <?php if($type==6) { ?>selected = "selected"<?php } ?>>监管部</option>
								<option value="7" <?php if($type==7) { ?>selected = "selected"<?php } ?>>网络部</option>
								<option value="8" <?php if($type==8) { ?>selected = "selected"<?php } ?>>编辑部</option>
								<option value="9" <?php if($type==9) { ?>selected = "selected"<?php } ?>>人力资源部</option>
								
							</select>
							<i></i>
						</label>
              
            </div>
          </div>
		  		    <div class="am-form-group">
            <label for="user-email" class="am-u-sm-3 am-form-label">手机 / Mobile</label>
            <div class="am-u-sm-9">
              <input type="text" name="mobile" placeholder="输入手机 / Mobile" VALUE="<?php echo $row['mobile'];?>">
              
            </div>
          </div>
		  		  		    <div class="am-form-group">
            <label for="user-email" class="am-u-sm-3 am-form-label">手机验证 / Validation</label>
            <div class="am-u-sm-9">
             <BR> <input type="checkbox" id="isok" name="isok"  <?php if($row['isok']=='1') { ?>checked="checked"<?php } ?>>已验证<BR>
               <small>慎重操作</small>
            </div>
          </div>
          <div class="am-form-group">
            <div class="am-u-sm-9 am-u-sm-push-3">
              <button type="submit" class="am-btn am-btn-primary" >保存修改</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- content end -->

</div>

<footer>
  <hr>
  <p class="am-padding-left">© 2016  盐城师范学院勤工助学管理中心.网络部. <a href="http://www.zy945.com" target="_blank">仲原</a></p>
</footer>

<!--[if lt IE 9]>
<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/assets/js/jquery1.11.1.min.js"></script>
<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/assets/js/modernizr.js"></script>
<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/assets/js/polyfill/rem.min.js"></script>
<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/assets/js/polyfill/respond.min.js"></script>
<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/assets/js/amazeui.legacy.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/assets/js/jquery.min.js"></script>
<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/assets/js/amazeui.min.js"></script>
<!--<![endif]-->
<script src="<?php echo $arrInfo['url'];?>/include/model/yuan/assets/js/app.js"></script>
</body>
</html>
