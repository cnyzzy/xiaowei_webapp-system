<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>校纪校规测试管理-小薇平台管理后台</title>
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
               校纪校规测试题库管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="<?php echo $arrInfo['url'];?>/admin" class="am-icon-home">首页</a></li>
                <li><a>APP管理</a></li>
                <li class="am-active">校纪校规测试题库管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 校纪校规测试管理-查看
                    </div>


                </div>
                              <div class="tpl-block">
           
                    <div class="am-g">
						   <div class="am-u-sm-12 am-u-md-6">
                            <div class="am-btn-toolbar">
                   
                            </div>
                        </div>
                        <div class="am-u-sm-12">
                            <form class="am-form">
                              <div class="am-cf">

                              <table class="am-table am-table-striped am-table-hover table-main">
                                    <thead>
                                        <tr>
                                          
                                            <th class="table-title">题目</th>
											 <th class="table-title">选项</th>
											  <th class="table-title">得分</th>
                                            
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach((array)$result as $key=>$loopChild) {?>
                                        <tr>                                          
                                      
                                            <td><?php echo $loopChild['title'];?></td>
			 <td><?php echo $loopChild['option'];?></td> <td><?php echo $loopChild['score'];?></td>
                                        </tr>
                                         	<?php }?>
                                    </tbody>
                                </table>

                                <hr>

                            </form>
                        </div>

                    </div>
                </div>
                 
          
                <div class="tpl-alert"></div>
            </div>
        </div>

    </div>


 <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/amazeui.min.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/app.js"></script>
	
</body>
</html>