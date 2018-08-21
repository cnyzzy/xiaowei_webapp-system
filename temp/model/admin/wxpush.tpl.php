<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>微信推送-小薇平台管理后台</title>
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
function del(sid){

if(confirm("确定要清空"+sid+"的统计数据么")){
	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/admin/dowxpush",
		data:"&do=del&sid="+sid,
		beforeSend:function(){},
		success:function(result){

				window.location.reload(true); 
			
		}
	})}
}
function update(sid,y,m){
 if(confirm("更新需要一段时间，请勿刷新页面")){
var ok=0;
var okk=0;
for(i=1;i<=31;i++)
{
	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/admin/dowxpush",
		data:"&do=update&data="+y+"-"+m+"-"+i,
		async:true,
		complete:function(XMLHttpRequest, textStatus){
			okk=okk+1;
			if(okk==31) {
			 $("#"+sid).text("100%");
			if(confirm(sid+"统计已更新完毕"))
			{   window.location.reload(true);  }
		}
		},
		success:function(result){
		ok=ok+1;
            $("#"+sid).text(Math.round(ok / 31 * 10000) / 100.00 + "%"); 

		}
	});

 
}}
}

</script>

        <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                微信推送
            </div>
            <ol class="am-breadcrumb">
                <li><a href="/admin" class="am-icon-home">首页</a></li>
                <li><a>公众号管理</a></li>
                <li class="am-active">微信推送</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 微信推送
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
                                    <a href="<?php echo $arrInfo['url'];?>/admin/wxpushd/all"><button type="button" class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-save"></span> 下载全部</button></a>
             
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
                                           

                                            <th class="table-title">分类</th>
                                            <th class="table-type">更新条数</th>
                                            <th class="table-author am-hide-sm-only">更新时间</th>
                                            <th class="table-date am-hide-sm-only">状态</th>
                                            <th class="table-set">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach((array)$Array as $key=>$loopChild) {?>
                                        <tr>
                                           
         
                                            <td><?php if($loopChild['number']!='0') { ?><a href="<?php echo $arrInfo['url'];?>/admin/wxpushy/<?php echo $loopChild['sid'];?>"><?php } ?><?php echo $loopChild['y'];?>年<?php echo $loopChild['m'];?>月推送统计汇总<?php if($loopChild['number']!='0') { ?></a><?php } ?></td>
                                            <td class="am-hide-sm-only"><?php echo $loopChild['number'];?></td>
                                            <td class="am-hide-sm-only"><?php if($loopChild['time']!=0) { ?><?php ECHO(date('Y-m-j G:i:s',$loopChild['time']))?><?php } else { ?>-<?php } ?></td>
                                            <td id="<?php echo $loopChild['sid'];?>" class="am-hide-sm-only"><?php if($loopChild['type']=='0') { ?>未更新<?php } ?><?php if($loopChild['type']=='1') { ?>已更新<?php } ?><?php if($loopChild['type']=='2') { ?>可更新<?php } ?></td>
                                            <td>
                                                <div class="am-btn-toolbar">
                                                    <div class="am-btn-group am-btn-group-xs">
                                                 <?php if($loopChild['type']=='0') { ?>       <button type="button"  onclick="update('<?php echo $loopChild['sid'];?>','<?php echo $loopChild['y'];?>','<?php echo $loopChild['m'];?>');" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 更新</button><?php } ?>
                                             <?php if($loopChild['type']!='0') { ?>  <a href="<?php echo $arrInfo['url'];?>/admin/wxpushd/<?php echo $loopChild['sid'];?>"> <button type="button" class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> 下载</button></a><?php } ?>
                                               <?php if($loopChild['type']!='0') { ?><button type="button" onclick="del('<?php echo $loopChild['sid'];?>');" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 清空</button><?php } ?>
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
               
 <div class="tpl-alert"></div>
            </div>










        </div>

    </div>


    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/amazeui.min.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/app.js"></script>
	
</body>
</html>