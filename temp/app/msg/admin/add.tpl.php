<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>消息发送-小薇平台管理后台</title>
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
                发送-消息管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="<?php echo $arrInfo['url'];?>/admin" class="am-icon-home">首页</a></li>
                <li><a>APP</a></li>
                <li class="am-active">发送-消息管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 发送消息
                    </div>



                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-9">
                            <form id="formid"  name= "myform" method = 'post'  action = '<?php echo $arrInfo['url'];?>/admin/msg/do' class="am-form am-form-horizontal">
							<input type="hidden" name="do"  value="send">
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">标题 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="title" placeholder="标题" value="">
                                    </div>
                                </div>
								
									<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">信息类型 </label>
                                    <div class="am-u-sm-9">
									<select name="msgtype" data-am-selected="{searchBox: 1}">
  <option value="1">用户</option>
    <option value="2">系统</option>
	  <option value="3">应用</option>
</select>
                                      
                                    </div>
                                </div>                         
								<div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">内容</label>
                                    <div class="am-u-sm-9">
                                        <textarea class="" rows="6" id="user-intro" placeholder="内容" name="content"></textarea>
                                    </div>
                                </div>
 <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">链接 </label>
                                    <div class="am-u-sm-9">
									<input type="text" name="tourl" placeholder="链接" value="">
                                        <small>可以留空，填写链接则自动跳转</small>
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">组别ID </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="groupid" placeholder="groupid" value="">
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">发信人昵称 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="fromname" value="">
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">发信人号码 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="fromnumber" value="">
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">收信人号码 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="tonumber" value="">
                                    </div>
                                </div>
								
                                   <div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">启用(删除)</label>
                                    <div class="am-u-sm-9">
                                        <div class="tpl-switch">
                                            <input type="checkbox" name="isok" class="ios-switch bigswitch tpl-switch-btn" checked />
                                            <div class="tpl-switch-btn-view">
                                                <div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                   <div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">已读(未读)</label>
                                    <div class="am-u-sm-9">
                                        <div class="tpl-switch">
                                            <input type="checkbox" name="isview" class="ios-switch bigswitch tpl-switch-btn"/>
                                            <div class="tpl-switch-btn-view">
                                                <div>
                                                </div>
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