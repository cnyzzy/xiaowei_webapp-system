<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>操作记录-小薇平台管理后台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="<?php echo $arrInfo['url'];?>/system/admin/model/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $arrInfo['url'];?>/system/admin/model/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="XIAOWEI Admin" />
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/system/admin/model/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/system/admin/model/assets/css/admin.css">
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/system/admin/model/assets/css/app.css">
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/echarts.min.js"></script>
</head>


<body data-type="generalComponents">
<?php include template('header'); ?>


        <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                管理员操作记录
            </div>
            <ol class="am-breadcrumb">
                <li><a href="/admin" class="am-icon-home">首页</a></li>
                <li><a>系统管理</a></li>
                <li class="am-active">操作记录</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 操作记录
                    </div>
               


                </div>
                <div class="tpl-block">
                   

                    <ul class="tpl-task-list tpl-task-remind">
					<?php foreach((array)$LogArray as $key=>$loopChild) {?>
                                    <li>   
									<div class="cosB"><?php ECHO(smartDate($loopChild['time']))?></div>
                                      <?php $type=0;?>
                                        <div class="task-title">
                                           <?php if($loopChild['type']=='64'||($loopChild['type']=='43'&&$loopChild['dotype']=='5')) { ?><?php $type=1;?> <span class="label label-sm label-danger">重要</span><?php } ?>
											<?php if($loopChild['type']=='61'||$loopChild['type']=='62'||$loopChild['type']=='31') { ?><?php $type=2;?> <span class="label label-sm label-warning">系统</span><?php } ?>
											<?php if($loopChild['type']=='41'||($loopChild['type']=='43'&&$loopChild['dotype']!='5')||$loopChild['type']=='42') { ?><?php $type=3;?> <span class="label label-sm label-success">操作</span><?php } ?>
											<?php if($loopChild['type']=='11'||$loopChild['type']=='12') { ?><?php $type=4;?> <span class="label label-sm label-default">记录</span><?php } ?>
											 <div class="cosA">
											<a href="<?php echo $arrInfo['url'];?>/admin/userd/<?php echo $loopChild['uid'];?>"><?php echo $loopChild['name'];?></a><?php if($type==4) { ?><?php if($loopChild['type']=='11') { ?>登入<?php } ?><?php if($loopChild['type']=='12') { ?>登出<?php } ?>IP:<?php echo $loopChild['ip'];?><?php } ?>
											<?php if($type==3) { ?>在<?php if($loopChild['type']=='41') { ?>绑定管理<?php } ?><?php if($loopChild['type']=='42') { ?>绑定管理回收站<?php } ?><?php if($loopChild['type']=='43') { ?>教务系统资料管理<?php } ?>中，对编号为<?php echo $loopChild['toid'];?>的用户进行了一次<?php if($loopChild['dotype']=='2') { ?>删除<?php } ?><?php if($loopChild['dotype']=='3') { ?>修改<?php } ?><?php if($loopChild['dotype']=='4') { ?>新建<?php } ?><?php if($loopChild['dotype']=='5') { ?>查询<?php } ?><?php if($loopChild['dotype']=='6') { ?>权限<?php } ?>操作<?php } ?>
											<?php if($type==2) { ?>在<?php if($loopChild['type']=='61') { ?>基本配置管理<?php } ?><?php if($loopChild['type']=='62') { ?>APP管理<?php } ?><?php if($loopChild['type']=='31') { ?>微信API配置管理<?php } ?>中，以<?php if($loopChild['rightint']==9) { ?>超级管理员<?php } ?><?php if($loopChild['rightint']==8) { ?>平台管理员<?php } ?><?php if($loopChild['rightint']==7) { ?>管理员<?php } ?><?php if($loopChild['rightint']==6) { ?>应用管理员<?php } ?><?php if($loopChild['rightint']==5) { ?>应用维护员<?php } ?><?php if($loopChild['rightint']==4) { ?>审查账号<?php } ?>(<?php echo $loopChild['rightint'];?>级)身份进行了<?php if($loopChild['dotype']=='2') { ?>删除<?php } ?><?php if($loopChild['dotype']=='3') { ?>修改<?php } ?><?php if($loopChild['dotype']=='4') { ?>新建<?php } ?><?php if($loopChild['dotype']=='5') { ?>查询<?php } ?><?php if($loopChild['dotype']=='2') { ?>权限<?php } ?>操作<?php } ?>
											<?php if($type==1) { ?>在<?php if($loopChild['type']=='64') { ?>权限管理<?php } ?><?php if($loopChild['type']=='43'&&$loopChild['dotype']=='5') { ?>教务系统资料隐私管理<?php } ?>中，对<?php if($loopChild['type']=='43'&&$loopChild['dotype']=='5') { ?>编号为<?php echo $loopChild['toid'];?>的用户<?php } else { ?><?php echo $loopChild['toid'];?><?php } ?>进行了一次<?php if($loopChild['dotype']=='2') { ?>删除<?php } ?><?php if($loopChild['dotype']=='3') { ?>修改<?php } ?><?php if($loopChild['dotype']=='4') { ?>新建<?php } ?><?php if($loopChild['dotype']=='5') { ?>查询<?php } ?><?php if($loopChild['dotype']=='6') { ?>权限<?php } ?>操作<?php } ?>

											</span>    
										
                                        </div>
                                           
                                      
                                    </li>
<?php }?>
                      
                       
                    </ul>
                </div>

            </div>

 <div class="am-cf">

                                       <div class="am-fr">
                                        <ul class="am-pagination tpl-pagination">
										共 <?php echo $TotalNum;?> 条记录
										  <?php if($prePageNum) { ?>
                  <li <?php if($NOW==1) { ?>class="am-disabled"<?php } ?>><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/1">«</a></li>
				          <?php if($NOWLLLL>0) { ?> <li><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $NOWLLLL;?>"><?php echo $NOWLLLL;?></a></li><?php } ?>
      <?php if($NOWLLL>0) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $NOWLLL;?>"><?php echo $NOWLLL;?></a></li><?php } ?>
        <?php if($NOWLL>0) { ?> <li><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $NOWLL;?>"><?php echo $NOWLL;?></a></li><?php } ?>
      <?php if($NOWL>0) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $NOWL;?>"><?php echo $NOWL;?></a></li><?php } ?>
      <li class="am-active"><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $NOW;?>" ><?php echo $NOW;?></a></li>
          <?php if($NOWR<=$prePageNum) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $NOWR;?>"><?php echo $NOWR;?></a></li><?php } ?>
        <?php if($NOWRR<=$prePageNum) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $NOWRR;?>"><?php echo $NOWRR;?></a></li><?php } ?>
		<?php if($NOWRRR<=$prePageNum) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $NOWRRR;?>"><?php echo $NOWRRR;?></a></li><?php } ?>
        <?php if($NOWRRRR<=$prePageNum) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $NOWRRRR;?>"><?php echo $NOWRRRR;?></a></li><?php } ?>
      <li <?php if($NOW==$prePageNum) { ?>class="am-disabled"<?php } ?>><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $prePageNum;?>">»</a></li>
											<?php } ?>
                                        </ul>
                                    </div>
                                </div>








        </div>

    </div>


 <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/amazeui.min.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/app.js"></script>
	
</body>
</html>