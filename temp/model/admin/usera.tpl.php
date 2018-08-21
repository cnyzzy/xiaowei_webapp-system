<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>新增用户-小薇平台管理后台</title>
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
                新增-权限用户管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="<?php echo $arrInfo['url'];?>/admin" class="am-icon-home">首页</a></li>
                <li><a>系统管理</a></li>
                <li class="am-active">新增-权限管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 新增用户
                    </div>



                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-9">
                            <form id="formid"  name= "myform" method = 'post'  action = '<?php echo $arrInfo['url'];?>/admin/douser' class="am-form am-form-horizontal">
							<input type="hidden" name="do"  value="add">
								
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">用户名 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="username" placeholder="用户名">
                                     
                                    </div>
                                </div>
									<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">密码 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="password" placeholder="" value="">
                                     
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">再次输入密码 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="apassword" placeholder="" value="">
                                     
                                    </div>
                                </div>
								                                <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">权限 </label>
                                    <div class="am-u-sm-9">
									<select name="rightint" data-am-selected="{searchBox: 1}">
 <option value="8">平台管理员</option>
  <option value="7">管理员</option>
    <option value="6">应用管理员</option>
	  <option value="5">应用维护员</option>
	    <option value="4">审查账号</option>
</select>
                                      
                                    </div>
                                </div>
 <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">分管 </label>
                                    <div class="am-u-sm-9">
									<input type="text" name="rightapp" placeholder="分管APP" >
                                        <small>应用管理账号填写应用名，为小写英文(如msg)</small>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">姓名 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="name" placeholder="姓名">
                                     
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">IMG URL </label>
                                    <div class="am-u-sm-9">
                                         <input type="text" name="img" >
                                    </div>
                                </div>

                                

                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                       <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
								
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