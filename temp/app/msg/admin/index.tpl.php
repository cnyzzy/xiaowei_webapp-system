<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>消息管理-小薇平台管理后台</title>
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
function deletem(id){
	 if(confirm("确定要删除么？")){
$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/admin/msg/do",
		data:"&do=delete&id="+id,
		beforeSend:function(){},
		success:function(result){
			if(result == '1'){
				window.location.reload(true); 
			}
		}
	})
	}	
}
function isokok(id,isok){
 if(confirm("确定要修改消息的显示状态么？")){
    $.post('<?php echo $arrInfo['url'];?>/admin/msg/do',{'do':'isopen','id':id,'isok':isok},function(rs){
        if(rs==1){
            window.location.reload(true);
        }
    })}
}
function add(){
 if(confirm("请谨慎操作")){
           window.open('<?php echo $arrInfo['url'];?>/admin/msg/add/');
        }
    }
function edit(id){
 if(confirm("请谨慎操作")){
           window.open('<?php echo $arrInfo['url'];?>/admin/msg/edit/'+id);
        }
    }

</script>

        <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                消息管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="<?php echo $arrInfo['url'];?>/admin" class="am-icon-home">首页</a></li>
                <li><a>APP管理</a></li>
                <li class="am-active">消息管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 消息管理
                    </div>


                </div>
                              <div class="tpl-block">
           
                    <div class="am-g">
                        <div class="am-u-sm-12">
							  <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                               <a href="<?php echo $arrInfo['url'];?>/admin/msg/add"> <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新建消息</button></a>
                                </div>
                            </div>
                            <form class="am-form">
                                <table class="am-table am-table-striped am-table-hover table-main">
                                    <thead>
                                        <tr>
                                            <th class="table-id">ID</th>
                                            <th class="table-title">发信人(组别ID)</th>
                                            <th class="table-type">接收人</th>
                                            <th class="table-author am-hide-sm-only">类型</th>
											 <th class="table-type">已读</th>
											  <th class="table-type">已删</th>
                                            <th class="table-date am-hide-sm-only">发送日期</th>
                                            <th class="table-set">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach((array)$Array as $key=>$loopChild) {?>
                                        <tr>                                          
                                            <td><?php echo $loopChild['id'];?></td>
                                            <td><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/fromnumber/<?php echo $loopChild['fromnumber'];?>"><?php echo $loopChild['fromname'];?></a>(<a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/groupid/<?php echo $loopChild['groupid'];?>"><?php echo $loopChild['groupid'];?></a>)</td>
                                            <td><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/tonumber/<?php echo $loopChild['tonumber'];?>"><?php echo $loopChild['tonumber'];?></a></td>
                                            <td class="am-hide-sm-only"> <?php if($loopChild['msgtype']=='1') { ?><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/msgtype/1">用户</a><?php } ?> <?php if($loopChild['msgtype']=='2') { ?><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/msgtype/2">系统</a><?php } ?> <?php if($loopChild['msgtype']=='3') { ?><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/msgtype/3">应用</a><?php } ?></td>
											<td><?php if($loopChild['isview']=='1') { ?><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/isview/1">已读</a><?php } ?><?php if($loopChild['isview']=='0') { ?><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/isview/0">未读</a><?php } ?></td>
                                            <td><?php if($loopChild['isok']=='1') { ?><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/isok/1">存在</a><?php } ?><?php if($loopChild['isok']=='0') { ?><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/isok/0">删除</a><?php } ?></td>

											<td class="am-hide-sm-only"><?php ECHO(date('Y-m-j G:i:s',$loopChild['addtime']))?></td>
                                            <td>
                                                <div class="am-btn-toolbar">
                                                    <div class="am-btn-group am-btn-group-xs">
                                                        <button onclick="edit('<?php echo $loopChild['id'];?>');" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                                                        <button onclick="isokok('<?php echo $loopChild['id'];?>','<?php if($loopChild['isok']=='0') { ?>1<?php } ?><?php if($loopChild['isok']=='1') { ?>0<?php } ?>');"  class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> <?php if($loopChild['isok']=='0') { ?>恢复<?php } ?><?php if($loopChild['isok']=='1') { ?>隐藏<?php } ?></button>
                                                        <button onclick="deletem('<?php echo $loopChild['id'];?>');" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
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
                  <li <?php if($NOW==1) { ?>class="am-disabled"<?php } ?>><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/<?php echo $bbb;?>/<?php echo $ccc;?>/1">«</a></li>
				          <?php if($NOWLLLL>0) { ?> <li><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/<?php echo $bbb;?>/<?php echo $ccc;?>/<?php echo $NOWLLLL;?>"><?php echo $NOWLLLL;?></a></li><?php } ?>
      <?php if($NOWLLL>0) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/<?php echo $bbb;?>/<?php echo $ccc;?>/<?php echo $NOWLLL;?>"><?php echo $NOWLLL;?></a></li><?php } ?>
        <?php if($NOWLL>0) { ?> <li><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/<?php echo $bbb;?>/<?php echo $ccc;?>/<?php echo $NOWLL;?>"><?php echo $NOWLL;?></a></li><?php } ?>
      <?php if($NOWL>0) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/<?php echo $bbb;?>/<?php echo $ccc;?>/<?php echo $NOWL;?>"><?php echo $NOWL;?></a></li><?php } ?>
      <li class="am-active"><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/<?php echo $bbb;?>/<?php echo $ccc;?>/<?php echo $NOW;?>" ><?php echo $NOW;?></a></li>
          <?php if($NOWR<=$prePageNum) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/<?php echo $bbb;?>/<?php echo $ccc;?>/<?php echo $NOWR;?>"><?php echo $NOWR;?></a></li><?php } ?>
        <?php if($NOWRR<=$prePageNum) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/<?php echo $bbb;?>/<?php echo $ccc;?>/<?php echo $NOWRR;?>"><?php echo $NOWRR;?></a></li><?php } ?>
		<?php if($NOWRRR<=$prePageNum) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/<?php echo $bbb;?>/<?php echo $ccc;?>/<?php echo $NOWRRR;?>"><?php echo $NOWRRR;?></a></li><?php } ?>
        <?php if($NOWRRRR<=$prePageNum) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/<?php echo $bbb;?>/<?php echo $ccc;?>/<?php echo $NOWRRRR;?>"><?php echo $NOWRRRR;?></a></li><?php } ?>
      <li <?php if($NOW==$prePageNum) { ?>class="am-disabled"<?php } ?>><a href="<?php echo $arrInfo['url'];?>/admin/msg/<?php echo $aaa;?>/<?php echo $bbb;?>/<?php echo $ccc;?>/<?php echo $prePageNum;?>">»</a></li>
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