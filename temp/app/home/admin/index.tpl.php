<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APP展示管理-小薇平台管理后台</title>
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
function editG(app){
name = prompt("请输入新的组别名称:");
if (name != "" && name != undefined && name != null){
	 if(confirm("确定要更改为 "+name+" 么？")){
$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/admin/home/do",
		data:"&do=editg&appid="+app+"&appname="+name,
		beforeSend:function(){},
		success:function(result){
			if(result == '1'){
				window.location.reload(true); 
			}
		}
	})
	}	
}


}
function deleteapp(app){
	 if(confirm("确定要删除么？")){
$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/admin/home/do",
		data:"&do=delete&appid="+app,
		beforeSend:function(){},
		success:function(result){
			if(result == '1'){
				window.location.reload(true); 
			}
		}
	})
	}	
}
function isopen(appid,isok){
 if(confirm("确定要修改APP的显示状态么？")){
    $.post('<?php echo $arrInfo['url'];?>/admin/home/do',{'do':'isopen','appid':appid,'isok':isok},function(rs){
        if(rs==1){
            window.location.reload(true);
        }
    })}
}
function add(){
 if(confirm("请谨慎操作")){
           window.open('<?php echo $arrInfo['url'];?>/admin/home/add/');
        }
    }
function edit(id){
 if(confirm("请谨慎操作")){
           window.open('<?php echo $arrInfo['url'];?>/admin/home/edit/'+id);
        }
    }

</script>

        <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                应用展示
            </div>
            <ol class="am-breadcrumb">
                <li><a href="<?php echo $arrInfo['url'];?>/admin" class="am-icon-home">首页</a></li>
                <li><a>APP管理</a></li>
                <li class="am-active">微网站管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 微网站展示管理
                    </div>


                </div>
                <div class="tpl-block">
                   <div class="am-u-sm-12 am-u-md-6">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button onclick="add();" type="button" class="am-btn  am-btn-xs am-btn-default am-btn-danger tpl-am-btn-danger"><span class="am-icon-plus"></span> 添加内容</button>                                </div>
                            </div>
                        </div>
                    <div class="am-g">
                        <div class="am-u-sm-12">
                            <form class="am-form">
                               
                                  		<?php foreach((array)$Group as $key=>$loopChild) {?>
									 <table class="am-table am-table-striped am-table-hover table-main">
                                    <thead>
                                        <tr>
                                           
                                            <th class="table-id">ID</th>
                                            <th class="table-title">名称</th>
                                            <th class="table-title">组别ID</th>
                                            <th class="table-author am-hide-sm-only">组别</th>
                                            <th class="table-date am-hide-sm-only">排序</th>
                                            <th class="table-set">操作</th>
                                        </tr>
										  </thead>
									<tbody>

              <div class="am-u-sm-12 am-u-md-3"><?php echo $loopChild['groupname'];?>
                           <div class="am-btn-group am-btn-group-xs">
							<button onclick="editG('<?php echo $loopChild['groupid'];?>');" class="am-btn  am-btn-xs am-btn-default am-btn-success tpl-am-btn-success "><span class="am-icon-pencil-square-o"></span> 编辑</button>  
							
                        </div> </div>
				  	<?php foreach((array)$List[$loopChild['groupid']] as $key2=>$Child) {?> 
					                                       <tr>
                                            <td><?php echo $key2;?></td>
                                            <td><a href="#"><?php echo $Child['name'];?></a></td>
                                            <td><?php echo $Child['groupid'];?></td>
                                            <td class="am-hide-sm-only"><?php echo $Child['groupname'];?></td>
                                            <td><?php echo $Child['sortid'];?></td>
                                            <td>
                                                <div class="am-btn-toolbar">
                                                    <div class="am-btn-group am-btn-group-xs">
                                                        <button onclick="edit('<?php echo $Child['id'];?>');" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                                                        <button onclick="<?php if($Child['isok']=='1') { ?>isopen('<?php echo $Child['id'];?>','0');<?php } else { ?>isopen('<?php echo $Child['id'];?>','1');<?php } ?>" class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> <?php if($Child['isok']=='1') { ?> 隐藏<?php } else { ?> 显示<?php } ?></button>
                                                        <button onclick="deleteapp('<?php echo $Child['id'];?>');" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
					<?php }?>
        </tbody>
		   </table>
<?php }?>
                                  
                                   
                             
                                
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