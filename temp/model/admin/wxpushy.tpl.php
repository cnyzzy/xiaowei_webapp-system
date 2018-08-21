<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $ym;?>微信推送-小薇平台管理后台</title>
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
                <?php echo $ym;?>微信推送
            </div>
            <ol class="am-breadcrumb">
                <li><a href="/admin" class="am-icon-home">首页</a></li>
                <li><a>公众号管理</a></li>
                <li class="am-active">微信推送</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> <?php echo $ym;?>微信推送
                    </div>
                    <div class="tpl-portlet-input tpl-fz-ml">
                        <div class="portlet-input input-small input-inline">
                        
                        </div>
                    </div>


                </div>  <div class="tpl-block">
                    <div class="am-g">
                        <div class="am-u-sm-12 am-u-md-6">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a href="<?php echo $arrInfo['url'];?>/admin/wxpushd/<?php echo $ym;?>"><button type="button" class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-save"></span> 下载表格</button></a>
             
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
                                           

                                            <th class="table-title">标题</th>
                                            <th class="table-type">推送时间</th>
                                            <th class="table-author am-hide-sm-only">阅读量/人</th>
											<th class="table-author am-hide-sm-only">分享量/人</th>
											<th class="table-author am-hide-sm-only">收藏量/人</th>
											<th class="table-author am-hide-sm-only">总数/比例</th>
											<th class="table-author am-hide-sm-only">打开</th>
                         
  
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach((array)$Array as $key=>$loopChild) {?>
                                        <tr>
                                           
         
                                            <td><a href="http://weixin.sogou.com/weixin?type=2&query=<?php echo $loopChild['title'];?>" target="_blank" ><?php echo $loopChild['title'];?></a></td>
                                            <td class="am-hide-sm-only"><?php echo $loopChild['data'];?></td>
                                            <td class="am-hide-sm-only"><?php echo $loopChild['int_page_read_count'];?>/<?php echo $loopChild['int_page_read_user'];?></td>
										   <td class="am-hide-sm-only"><?php echo $loopChild['share_count'];?>/<?php echo $loopChild['share_user'];?></td>
										   <td class="am-hide-sm-only"><?php echo $loopChild['add_to_fav_count'];?>/<?php echo $loopChild['add_to_fav_user'];?></td>
										    <td class="am-hide-sm-only"><?php echo $loopChild['target_user'];?>/<?php echo(round(($loopChild['int_page_read_user']/$loopChild['target_user'])*100))?>%</td>
										   <td class="am-hide-sm-only"><?php echo $loopChild['int_page_from_session_read_count'];?>/<?php echo $loopChild['int_page_from_hist_msg_read_count'];?></td>
                                          
                                            <td>

                                            </td>
                                        </tr>
                                        	<?php }?>
                                    </tbody>
                                </table>
                                <div class="am-cf">

                                    <div class="am-fr">
                   
                                    </div>
									


</div>

                                </div>
                                <hr>

                            </form>
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