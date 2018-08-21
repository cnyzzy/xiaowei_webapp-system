<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>微信自动回复-小薇平台管理后台</title>
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
<script>
function norun(){
	
	alert("不允许进行此操作");
		
}
function update(){

	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/admin/dowxre",
		data:"&do=update",
		beforeSend:function(){},
		success:function(result){
			if(result == '1'){
				window.location.reload(true); 
			}
		}
	})
}
</script>
        <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                微信自动回复
            </div>
            <ol class="am-breadcrumb">
                <li><a href="/admin" class="am-icon-home">首页</a></li>
                <li><a>公众号管理</a></li>
                <li class="am-active">微信自动回复</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 自动回复设置
                    </div>


                </div><SMALL>当前只能进行查看，请在微信公众平台进行修改</SMALL>
                <div class="tpl-block">
                    <div class="am-g">
                        <div class="am-u-sm-12 am-u-md-6">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button onclick="update();"   type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 更新数据</button>
             
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
                                            <th class="table-id">ID</th>
                                            <th class="table-title">规则名</th>
                                            <th class="table-type">添加时间</th>
                                            <th class="table-author am-hide-sm-only">关键词</th>
                                            <th class="table-date am-hide-sm-only">回复类型</th>
                                            <th class="table-set">回复</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php foreach((array)$arrWxre['keyword_autoreply_info']['list'] as $key=>$loopChild) {?>
                                        <tr>                                        
                                            <td><?php echo $key;?></td>
                                            <td><?php echo $loopChild['rule_name'];?></td>
                                            <td><?php ECHO(date('Y-m-j G:i:s',$loopChild['create_time']))?></td>
                                            <td class="am-hide-sm-only"><?php foreach((array)$loopChild['keyword_list_info'] as $keyY=>$loop) {?><?php echo $loop['content'];?> <?php }?></td>
                                            <td class="am-hide-sm-only"><?php foreach((array)$loopChild['reply_list_info'] as $keyYY=>$loopP) {?><?php echo $loopP['type'];?> <?php }?></td>
                                            <td>
                                                <div class="am-btn-toolbar">
                                                <?php foreach((array)$loopChild['reply_list_info'] as $keyYYy=>$loopPp) {?><?php ECHO(mb_substr($loopPp['content'] ,0,16,'utf-8'))?><?php }?>
                                                </div>
                                            </td>
                                        </tr>
                                       <?php }?>
                                    </tbody>
                                </table>
                                <div class="am-cf">

                     
                                </div>
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