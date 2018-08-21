<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>小程序API配置-小薇平台管理后台</title>
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
              小程序API配置
            </div>
            <ol class="am-breadcrumb">
                <li><a href="/admin" class="am-icon-home">首页</a></li>
                <li><a>微信管理</a></li>
                <li class="am-active">小程序API配置</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 小程序API的配置
                    </div>



                </div>

                <div class="tpl-block">

                    <div class="am-g">
                        <div class="tpl-form-body tpl-form-line">
                            <form id="formid"  name= "myform" method = 'post'  action = 'dowxaapi'  class="am-form tpl-form-line-form">
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">APPID <span class="tpl-form-line-small-title">小程序接口ID</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" name="APPID" placeholder="请输入APPID" value="<?php echo $arrWxapi['APPID'];?>">
                                        <small>请填写APPID</small>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">AppSecret <span class="tpl-form-line-small-title">小程序接口秘钥</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" name="AppSecret" placeholder="请输入AppSecret" value="<?php echo $arrWxapi['SECRET'];?>">
                                        <small>请填写AppSecret</small>
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">ApiTOKEN <span class="tpl-form-line-small-title">接口TOKEN</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" name="TOKEN" placeholder="请输入TOKEN" value="<?php echo $arrWxapi['TOKEN'];?>">
                                        <small>请填写TOKEN</small>
                                    </div>
                                </div>
                               
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">Time <span class="tpl-form-line-small-title">更新时间</span></label>
                                    <div class="am-u-sm-9">
                     
                                        <small><?php ECHO(date('Y-m-j G:i:s',$arrWxapi['time']))?></small>
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

    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/amazeui.min.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/app.js"></script>
</body>
</html>