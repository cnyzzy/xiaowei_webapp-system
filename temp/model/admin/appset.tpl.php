<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APP管理-小薇平台管理后台</title>
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
 <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/amazeui.min.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/app.js"></script>
<script>
function deleteapp(appname){
	
	alert("不允许进行删除操作");
		
}
function install(appname){

	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/admin/doappset",
		data:"&do=install&appname="+appname,
		beforeSend:function(){},
		success:function(result){
			if(result == '1'){
				window.location.reload(true); 
			}
		}
	})
}
function uninstall(sss,appname){
if(sss=='1'){
alert("启用的APP不可以卸载!");
return;
}else{
if(confirm("确定要卸载APP么？")){
	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/admin/doappset",
		data:"&do=uninstall&appname="+appname,
		beforeSend:function(){},
		success:function(result){
			if(result == '1'){
				window.location.reload(true); 
			}
		}
	})}
}}
function isopen(appname){
 if(confirm("确定要修改APP的运行状态么？")){
    $.post('<?php echo $arrInfo['url'];?>/admin/doappset',{'do':'isopen','appname':appname},function(rs){
        if(rs==1){
            window.location.reload(true);
        }
    })}
}

function admin(appname){
var newTab=window.open('<?php echo $arrInfo['url'];?>/admin/'+appname);
	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/admin/doappset",
		data:"&do=admin&appname="+appname,
		beforeSend:function(){},
		success:function(result){
			if(result == '1'){
			       newTab.location.href='<?php echo $arrInfo['url'];?>/admin/'+appname;
			}
		}
	})
    
        
    }
</script>

        <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                APP管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="/admin" class="am-icon-home">首页</a></li>
                <li><a>系统管理</a></li>
                <li class="am-active">APP管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 微网站APP管理
                    </div>


                </div>
                <div class="tpl-block">
                    <div class="am-g">
                        <div class="am-u-sm-12 am-u-md-6">
                            <div class="am-btn-toolbar">
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
                                            <th class="table-title">名称</th>
                                            <th class="table-type">作者</th>
                                            <th class="table-author am-hide-sm-only">版本</th>
                                            <th class="table-date am-hide-sm-only">描述</th>
                                            <th class="table-set">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>	<?php foreach((array)$AppList as $key=>$loopChild) {?>
                                      <?php if($_SESSION['admin']['rightint']>6||($_SESSION['admin']['rightint']=5&&(strtolower(substr($loopChild['name'], 0, strlen($_SESSION['admin']['rightapp']))) ===strtolower($_SESSION['admin']['rightapp'])))) { ?>  <tr>
                                          
                                            <td><?php echo $key;?></td>
                                            <td><a href="#"><?php echo $loopChild['info']['name'];?></a></td>
                                            <td><?php echo $loopChild['info']['author'];?></td>
                                            <td class="am-hide-sm-only"><?php echo $loopChild['info']['ver'];?></td>
                                            <td class="am-hide-sm-only"><?php echo $loopChild['info']['desc'];?></td>
                                            <td>
                                                <div class="am-btn-toolbar">
                                                    <div class="am-btn-group am-btn-group-xs">
                                                       <?php if($loopChild['info']['install']=='1'&&$loopChild['config']['isinstall']=='0') { ?>  <button class="am-btn am-btn-default am-btn-xs am-text-secondary" onclick="install('<?php echo $loopChild['name'];?>');"><span class="am-icon-pencil-square-o"></span> 安装</button><?php } ?>
													     <?php if($loopChild['info']['install']!='1'||$loopChild['config']['isinstall']=='1') { ?>  <button class="am-btn am-btn-default am-btn-xs am-text-secondary" onclick="isopen('<?php echo $loopChild['name'];?>');"><span class="am-icon-pencil-square-o"></span><?php if(@$loopChild['open']['isopen']=='1') { ?> 停用<?php } else { ?> 启用<?php } ?></button><?php } ?>
                                                        <button onclick="admin('<?php echo $loopChild['name'];?>');" class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> 管理</button>
                                                       <?php if($loopChild['info']['system']!=1&&$loopChild['config']['isinstall']=='1') { ?> <button onclick="uninstall('<?php echo $loopChild['open']['isopen'];?>','<?php echo $loopChild['name'];?>');" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 卸载</button><?php } ?>
													    <?php if($loopChild['info']['system']!=1&&$loopChild['config']['isinstall']=='0') { ?> <button onclick="deleteapp('<?php echo $loopChild['name'];?>');" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button><?php } ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr><?php } ?>
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



	
</body>
</html>