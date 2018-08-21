<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>QQ智慧平台绑定管理-小薇平台管理后台</title>
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
function isokokok(){

if(confirm("回收站中的数据仅供审查，请谨慎操作")){
           window.open('<?php echo $arrInfo['url'];?>/admin/mwxxidh');
        }
    
}
function isstop(id,stop){

if(confirm("确定要修改此绑定信息的使用权限么？如果禁用，此身份和微信都被禁用")){
	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/admin/doqqid",
		data:"&do=isstop&id="+id+"&stop="+stop,
		beforeSend:function(){},
		success:function(result){
			if(result == '1'){
				window.location.reload(true); 
			}
		}
	})}
}
function islock(id,Alock){
 if(confirm("确定要修改此绑定信息的变更权限么？")){
    $.post('<?php echo $arrInfo['url'];?>/admin/doqqid',{'do':'islock','id':id,'lock':Alock},function(rs){
        if(rs==1){
            window.location.reload(true);
        }
    })}
}

function edit(id){

           window.open('<?php echo $arrInfo['url'];?>/admin/mqqidd/'+id);
        
    }


</script>

        <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                QQ智慧平台绑定管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="/admin" class="am-icon-home">首页</a></li>
                <li><a>绑定管理</a></li>
                <li class="am-active">QQ智慧平台绑定管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> QQ智慧平台绑定管理
                    </div>


                </div>
                <div class="tpl-block">
                    <div class="am-g">
                        <div class="am-u-sm-12 am-u-md-6">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button type="button" class="am-btn am-btn-default am-btn-danger" onclick="isokokok();"><span class="am-icon-trash-o"></span> 回收站</button>
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
                                            <th class="table-title">昵称/姓名</th>
                                            <th class="table-type">号码</th>
                                            <th class="table-author am-hide-sm-only">身份</th>
                                            <th class="table-date am-hide-sm-only">修改日期</th>
                                            <th class="table-set">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach((array)$Array as $key=>$loopChild) {?>
                                        <tr>
                                           
                                            <td><?php echo $loopChild['id'];?></td>
                                            <td><a href="<?php echo $arrInfo['url'];?>/admin/mqqidd/<?php echo $loopChild['id'];?>"><?php echo $loopChild['nickname'];?>/<?php echo $loopChild['name'];?></a></td>
                                            <td><?php echo $loopChild['number'];?></td>
                                            <td class="am-hide-sm-only"><?php if($loopChild['type']=='1') { ?>学生<?php } ?><?php if($loopChild['type']=='2') { ?>教职工<?php } ?><?php if($loopChild['type']=='3') { ?>访客<?php } ?></td>
                                            <td class="am-hide-sm-only"><?php ECHO(date('Y-m-j G:i:s',$loopChild['addtime']))?></td>
                                            <td>
                                                <div class="am-btn-toolbar">
                                                    <div class="am-btn-group am-btn-group-xs">
                                                        <button onclick="edit('<?php echo $loopChild['id'];?>');" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                                                        <button onclick="islock('<?php echo $loopChild['id'];?>','<?php if($loopChild['islock']=='0') { ?>1<?php } ?><?php if($loopChild['islock']=='1') { ?>0<?php } ?>');" class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> <?php if($loopChild['islock']=='0') { ?>锁定<?php } ?><?php if($loopChild['islock']=='1') { ?>解锁<?php } ?></button>
                                                        <button onclick="isstop('<?php echo $loopChild['id'];?>','<?php if($loopChild['stop']=='0') { ?>1<?php } ?><?php if($loopChild['stop']=='1') { ?>0<?php } ?>');" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> <?php if($loopChild['stop']=='0') { ?>封禁<?php } ?><?php if($loopChild['stop']=='1') { ?>解禁<?php } ?></button>
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