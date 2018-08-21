<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>编辑用户-小薇平台管理后台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="<?php echo $arrInfo['url'];?>/include/model/admin/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $arrInfo['url'];?>/include/model/admin/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="XIAOWEI Admin" />
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/include/model/admin/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/include/model/admin/assets/css/admin.css">
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/include/model/admin/assets/css/app.css">
    <script src="<?php echo $arrInfo['url'];?>/include/model/admin/assets/js/echarts.min.js"></script>
</head>

<body data-type="generalComponents">
<?php include template('header'); ?>
        <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                编辑-权限用户管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="<?php echo $arrInfo['url'];?>/admin" class="am-icon-home">首页</a></li>
                <li><a>系统管理</a></li>
                <li class="am-active">编辑-权限管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 编辑用户
                    </div>



                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-9">
                            <form id="formid"  name= "myform" method = 'post'  action = '<?php echo $arrInfo['url'];?>/admin/douser' class="am-form am-form-horizontal">
							<input type="hidden" name="do"  value="edit">
								<input type="hidden" name="id"  value="<?php echo $Array['id'];?>">
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">用户名 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="username" placeholder="用户名" value="<?php echo $Array['username'];?>">
                                     
                                    </div>
                                </div>
									<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">密码 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="password" placeholder="不修改请留空" value="">
                                     
                                    </div>
                                </div>  <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">权限 </label>
                                    <div class="am-u-sm-9">
									<select name="rightint" data-am-selected="{searchBox: 1}">
  <option value="9"<?php if($Array['rightint']==9) { ?>selected="selected"<?php } ?>>超级管理员</option>
  <option value="8"<?php if($Array['rightint']==8) { ?>selected="selected"<?php } ?>>平台管理员</option>
  <option value="7"<?php if($Array['rightint']==7) { ?>selected="selected"<?php } ?>>管理员</option>
    <option value="6"<?php if($Array['rightint']==6) { ?>selected="selected"<?php } ?>>应用管理员</option>
	  <option value="5"<?php if($Array['rightint']==5) { ?>selected="selected"<?php } ?>>应用维护员</option>
	    <option value="4"<?php if($Array['rightint']==4) { ?>selected="selected"<?php } ?>>审查账号</option>
</select>
                                      
                                    </div>
                                </div>
 <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">分管 </label>
                                    <div class="am-u-sm-9">
									<input type="text" name="rightapp" placeholder="分管APP" value="<?php if(!empty($Array['rightapp'])) { ?><?php echo $Array['rightapp'];?><?php } ?>">
                                        <small>应用管理账号填写应用名，为小写英文(如msg)</small>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">姓名 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="name" placeholder="姓名" value="<?php echo $Array['name'];?>">
                                     
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">IMG URL </label>
                                    <div class="am-u-sm-9">
                                         <input type="text" name="img"  value="<?php echo $Array['img'];?>">
                                    </div>
                                </div>
                              
                                 <?php if(isset($Array['nowtime'])) { ?>
								<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">最近登录时间 </label>
                                    <div class="am-u-sm-9">
                                        <small><?php ECHO(date('Y-m-j G:i:s',$Array['nowtime']))?></small>
                                    </div>
                                </div><?php } ?> <?php if(iSSET($Array['nowip'])) { ?>
								 <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">最近登录IP </label>
                                    <div class="am-u-sm-9">
                                        <small><?php echo $Array['nowip'];?></small>
                                    </div>
                                </div><?php } ?> 

                                  <?php if(isset($Array['lasttime'])) { ?>
								<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">往次登录时间 </label>
                                    <div class="am-u-sm-9">
                                        <small><?php ECHO(date('Y-m-j G:i:s',$Array['lasttime']))?></small>
                                    </div>
                                </div><?php } ?> <?php if(iSSET($Array['lastip'])) { ?>
								 <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">往次登录IP </label>
                                    <div class="am-u-sm-9">
                                        <small><?php echo $Array['lastip'];?></small>
                                    </div>
                                </div><?php } ?> 


                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                         <?php if($ok==0) { ?> <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
										<?php } ?>  <?php if($ok==1) { ?><small>数据已更新</small><?php } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>










        </div>

    </div>


    <script src="<?php echo $arrInfo['url'];?>/include/model/admin/assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/include/model/admin/assets/js/amazeui.min.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/include/model/admin/assets/js/app.js"></script>
</body>

</html>