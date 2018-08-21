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
<script type="text/javascript">
function disp_alert()
{
alert("删除功能被限制!")
}
</script>

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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg"><?php if($Operate==1) { ?>管理部<?php } ?><?php if($Operate==2) { ?>家教部<?php } ?><?php if($Operate==3) { ?>贷款部<?php } ?><?php if($Operate==4) { ?>勤工助学部<?php } ?><?php if($Operate==5) { ?>宣传部<?php } ?><?php if($Operate==6) { ?>监管部<?php } ?><?php if($Operate==7) { ?>网络部<?php } ?><?php if($Operate==8) { ?>编辑部<?php } ?><?php if($Operate==9) { ?>人力资源部<?php } ?></strong> / <small> <?php if($zone==1) { ?>新校区<?php } ?><?php if($zone==2) { ?>老校区<?php } ?><?php if($admin==1) { ?>全校<?php } ?></small></div>
    </div>

    <div class="am-g">
      <div class="am-u-md-6 am-cf">
        <div class="am-fl am-cf">
          <div class="am-btn-toolbar am-fl">
            <div class="am-btn-group am-btn-group-xs">
              <button type="button" onclick="window.location='<?php echo $arrInfo['url'];?>/s'" class="am-btn am-btn-default"><span class="am-icon-plus" ></span> 新增</button>
              <button type="button" onclick="window.location='<?php echo $arrInfo['url'];?>/excel/<?php echo $Operate;?>'" class="am-btn am-btn-default"><span class="am-icon-save"></span> 保存</button>
              <button type="button" onclick="window.location='<?php echo $arrInfo['url'];?>/sms/<?php echo $Operate;?>'" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 群发</button>
              <button type="button" onclick="disp_alert()" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
            </div>


          </div>
        </div>
      </div>
      <div class="am-u-md-3 am-cf">
        <div class="am-fr">
          <div class="am-input-group am-input-group-sm">
            <input type="text" class="am-form-field">
                <span class="am-input-group-btn">
                  <button class="am-btn am-btn-default" type="button">搜索</button>
                </span>
          </div>
        </div>
      </div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th>姓名</th><th>学号</th><th>性别</th><th>部门</th><th>校区</th><th>学院</th><th>班级</th><th>手机</th><th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
		  	<?php foreach((array)$users as $key=>$loopChild) {?>
           <tr>
              <td><input type="checkbox" /></td><td><?php echo $loopChild['id'];?></td><td><?php echo $loopChild['name'];?></td><td><?php echo $loopChild['number'];?></td><td><?php if($loopChild['gender']==1) { ?>男生<?php } ?><?php if($loopChild['gender']==2) { ?>女生<?php } ?></td><td><a href="<?php echo $arrInfo['url'];?>/table/<?php echo $loopChild['type'];?>"><span class="am-badge am-badge-success"><?php if($loopChild['type']==1) { ?>管理部<?php } ?><?php if($loopChild['type']==2) { ?>家教部<?php } ?><?php if($loopChild['type']==3) { ?>贷款部<?php } ?><?php if($loopChild['type']==4) { ?>勤工助学部<?php } ?><?php if($loopChild['type']==5) { ?>宣传部<?php } ?><?php if($loopChild['type']==6) { ?>监管部<?php } ?><?php if($loopChild['type']==7) { ?>网络部<?php } ?><?php if($loopChild['type']==8) { ?>编辑部<?php } ?><?php if($loopChild['type']==9) { ?>人力资源部<?php } ?></span></a></td><td><?php if($loopChild['zone']==1) { ?>新校区<?php } ?><?php if($loopChild['zone']==2) { ?>老校区<?php } ?></td> <td><?php echo $loopChild['collage'];?></td><td><?php echo $loopChild['class'];?></td><td><?php echo $loopChild['mobile'];?></td>
            <td>
              <div class="am-dropdown" data-am-dropdown>
                                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button  onclick="window.location='<?php echo $arrInfo['url'];?>/user/<?php echo $loopChild['id'];?>'" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                    <button onclick="window.location='<?php echo $arrInfo['url'];?>/sms/p/<?php echo $loopChild['id'];?>'" class="am-btn am-btn-default am-btn-xs"><span class="am-icon-copy"></span> 发信息</button>
                    <button onclick="disp_alert()" class="am-btn am-btn-default am-btn-xs am-text-danger"><span class="am-icon-trash-o"></span> 删除</button>
                  </div>
                </div>
              </div>
            </td>
          </tr>
		<?php }?>

          
       
          </tbody>
        </table>
          <div class="am-cf">
  共 <?php echo $Num;?> 条记录
  <?php if($prePageNum) { ?>
  <div class="am-fr">
    <ul class="am-pagination">
      <li <?php if($NOW==1) { ?>class="am-disabled"<?php } ?>><a href="<?php echo $arrInfo['url'];?>/table/<?php echo $Operate;?>/1">«</a></li>
        <?php if($NOWLL>0) { ?> <li><a href="<?php echo $arrInfo['url'];?>/table/<?php echo $Operate;?>/<?php echo $NOWLL;?>"><?php echo $NOWLL;?></a></li><?php } ?>
      <?php if($NOWL>0) { ?><li><a href="<?php echo $arrInfo['url'];?>/table/<?php echo $Operate;?>/<?php echo $NOWL;?>"><?php echo $NOWL;?></a></li><?php } ?>
      <li class="am-active"><a href="<?php echo $arrInfo['url'];?>/table/<?php echo $Operate;?>/<?php echo $NOW;?>" ><?php echo $NOW;?></a></li>
          <?php if($NOWR<$prePageNum) { ?><li><a href="<?php echo $arrInfo['url'];?>/table/<?php echo $Operate;?>/<?php echo $NOWR;?>"><?php echo $NOWR;?></a></li><?php } ?>
        <?php if($NOWRR<$prePageNum) { ?><li><a href="<?php echo $arrInfo['url'];?>/table/<?php echo $Operate;?>/<?php echo $NOWRR;?>"><?php echo $NOWRR;?></a></li><?php } ?>
      <li <?php if($NOW==$prePageNum) { ?>class="am-disabled"<?php } ?>><a href="<?php echo $arrInfo['url'];?>/table/<?php echo $Operate;?>/<?php echo $prePageNum;?>">»</a></li>
    </ul>
  </div>
</div>
<?php } ?>
          <hr />
          <p>注：.....</p>
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

