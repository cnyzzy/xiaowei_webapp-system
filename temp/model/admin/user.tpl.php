<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>权限管理-小薇平台管理后台</title>
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
function add(){

if(confirm("请注意权限设置")){
 window.open('<?php echo $arrInfo['url'];?>/admin/usera/');}
}
function isdelete(id){
 if(confirm("确定要删除此用户么？")){
    $.post('<?php echo $arrInfo['url'];?>/admin/douser',{'do':'isdelete','id':id},function(rs){
        if(rs==1){
            window.location.reload(true);
        }
    })}
}

function edit(id){
 if(confirm("请谨慎操作")){
           window.open('<?php echo $arrInfo['url'];?>/admin/userd/'+id);
        }
    }


</script>
        <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                权限管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="/admin" class="am-icon-home">首页</a></li>
                <li><a>系统管理</a></li>
                <li class="am-active">权限管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 权限管理
                    </div>


                </div>
                <div class="tpl-block">
                    <div class="am-g">
                        <div class="am-u-sm-12 am-u-md-6">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button type="button"  onclick="add();" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 添加</button>                                
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
                                            <th class="table-title">账号名/姓名</th>
                                            <th class="table-type">权限</th>
                                            <th class="table-author am-hide-sm-only">分管</th>
                                            <th class="table-date am-hide-sm-only">最近登录时间</th>
                                            <th class="table-set">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                       <?php foreach((array)$Array as $key=>$loopChild) {?>
                                            <td><?php echo $loopChild['id'];?></td>
                                            <td><a onclick="edit('<?php echo $loopChild['id'];?>');" ><?php echo $loopChild['username'];?>/<?php echo $loopChild['name'];?></a></td>
                                            <td><?php if($loopChild['rightint']==9) { ?>超级管理员<?php } ?><?php if($loopChild['rightint']==8) { ?>平台管理员<?php } ?><?php if($loopChild['rightint']==7) { ?>管理员<?php } ?><?php if($loopChild['rightint']==6) { ?>应用管理员<?php } ?><?php if($loopChild['rightint']==5) { ?>应用维护员<?php } ?><?php if($loopChild['rightint']==4) { ?>审查账号<?php } ?>(<?php echo $loopChild['rightint'];?>级)</td>
                                            <td class="am-hide-sm-only"><?php if($loopChild['rightint']==9) { ?>完全管理<?php } ?>
											<?php if($loopChild['rightint']==8) { ?>完全管理<?php } ?>
											<?php if($loopChild['rightint']==7) { ?>不可新建账号<?php } ?>
											<?php if($loopChild['rightint']==6) { ?>【<?php echo $loopChild['rightapp'];?>】管理<?php } ?>
											<?php if($loopChild['rightint']==5) { ?>【<?php echo $loopChild['rightapp'];?>】维护<?php } ?>
											<?php if($loopChild['rightint']==4) { ?>不可操作账号<?php } ?></td>
                                            <td class="am-hide-sm-only"><?php ECHO(date('Y-m-j G:i:s',$loopChild['nowtime']))?></td>
                                            <td>
                                                <div class="am-btn-toolbar">
                                                    <div class="am-btn-group am-btn-group-xs">
                                                        <button  onclick="edit('<?php echo $loopChild['id'];?>');" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                                                
                                                        <button  onclick="isdelete('<?php echo $loopChild['id'];?>');" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                                <div class="am-cf">

                                     <div class="am-fr">
                                        <ul class="am-pagination tpl-pagination">
										共 <?php echo $TotalNum;?> 条记录
										  <?php if($prePageNum) { ?>
                  <li <?php if($NOW==1) { ?>class="am-disabled"<?php } ?>><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/1">«</a></li>
				          <?php if($NOWLLLL>0) { ?> <li><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $NOWLLLL;?>"><?php echo $NOWLLLL;?></a></li><?php } ?>
      <?php if($NOWLLL>0) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $NOWLLL;?>"><?php echo $NOWLLL;?></a></li><?php } ?>
        <?php if($NOWLL>0) { ?> <li><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $NOWLL;?>"><?php echo $NOWLL;?></a></li><?php } ?>
      <?php if($NOWL>0) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $NOWL;?>"><?php echo $NOWL;?></a></li><?php } ?>
      <li class="am-active"><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $NOW;?>" ><?php echo $NOW;?></a></li>
          <?php if($NOWR<=$prePageNum) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $NOWR;?>"><?php echo $NOWR;?></a></li><?php } ?>
        <?php if($NOWRR<=$prePageNum) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $NOWRR;?>"><?php echo $NOWRR;?></a></li><?php } ?>
		<?php if($NOWRRR<=$prePageNum) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $NOWRRR;?>"><?php echo $NOWRRR;?></a></li><?php } ?>
        <?php if($NOWRRRR<=$prePageNum) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $NOWRRRR;?>"><?php echo $NOWRRRR;?></a></li><?php } ?>
      <li <?php if($NOW==$prePageNum) { ?>class="am-disabled"<?php } ?>><a href="<?php echo $arrInfo['url'];?>/admin/<?php echo $Operate;?>/<?php echo $prePageNum;?>">»</a></li>
											<?php } ?>
                                        </ul>
                                    </div>
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