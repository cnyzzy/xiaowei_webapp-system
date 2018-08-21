<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>基本配置-小薇平台管理后台</title>
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
               基本配置配置
            </div>
            <ol class="am-breadcrumb">
                <li><a href="/admin" class="am-icon-home">首页</a></li>
                <li><a>系统管理</a></li>
                <li class="am-active">基本配置</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 基本配置
                    </div>



                </div>

                <div class="tpl-block">

                    <div class="am-g">
                        <div class="tpl-form-body tpl-form-line">
                            <form id="formid"  name= "myform" method = 'post'  action = 'dobase'  class="am-form tpl-form-line-form">
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">平台名称 <span class="tpl-form-line-small-title">Name</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" name="name" placeholder="平台的名字" value="<?php echo $arrInfo['name'];?>">
                                 
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">地址 <span class="tpl-form-line-small-title">Url</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" name="url" placeholder="系统的地址，不要加/"	value="<?php echo $arrInfo['url'];?>">
        
                                    </div>
                                </div>
								                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">教务系统地址 <span class="tpl-form-line-small-title">JW Url</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" name="jwurl" placeholder="教务系统的地址，不要加http" value="<?php echo $arrInfo['jwurl'];?>">
        
                                    </div>
                                </div>
								                               <div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">启用平台</label>
                                    <div class="am-u-sm-9">
                                        <div class="tpl-switch">
                                            <input type="checkbox" name="open" class="ios-switch bigswitch tpl-switch-btn" <?php if($arrInfo['open']==1 ) { ?>checked<?php } ?> />
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
										 <?php if($ok==1) { ?><small>数据已更新</small><?php } ?>
                                    </div>
									
                                </div>
                            </form>

                        </div>
                    </div>
                </div>


            </div>










        </div>

    </div>

    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/amazeui.min.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/app.js"></script>
</body>
</html>