<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>微信用户-小薇平台管理后台</title>
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

function update(y,m){

var ok=0;
var okk=0;
for(i=y;i<=m;i++)
{
	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/admin/dowxuser",
		data:"&do=update&id="+i,
		async:true,
		complete:function(XMLHttpRequest, textStatus){
			okk=okk+1;
			if(okk==(m-y+1)) {
			 $("#"+y+"-"+m).text("100%");
			if(confirm(sid+"统计已更新完毕"))
			{   window.location.reload(true);  }
		}
		},
		success:function(result){
		ok=ok+1;
            $("#"+y+"-"+m).text(Math.round(ok / (m-y+1) * 10000) / 100.00 + "%"); 

		}
	});

 
}
}
function aupdate(y,m){

if(y<<?php echo $row['id'];?>){
var ok=0;
var okk=0;
for(i=y;i<=m;i++)
{
	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/admin/dowxuser",
		data:"&do=update&id="+i,
		async:true,
		complete:function(XMLHttpRequest, textStatus){
			okk=okk+1;
			if(okk==(m-y+1)) {
			 $("#"+y+"-"+m).text("100%");
			 aupdate(i,i+30-1)
		
		}
		},
		success:function(result){
		ok=ok+1;
          $("#"+y+"-"+m).text(Math.round(ok / 30 * 10000) / 100.00 + "%"); 

		}
	});

 
}
}}

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
                                   <button type="button"  onclick="aupdate('1','30');" class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-save"></span> 全部</button>
             
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
           
                                            <th class="table-date am-hide-sm-only">状态</th>
                                            <th class="table-set">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach((array)$Array as $key=>$loopChild) {?>
                                        <tr>
                                           
         
                                            <td><?php echo $loopChild['y'];?>——<?php echo $loopChild['m'];?></td>
                                            <td class="am-hide-sm-only">30</td>
                                            <td id="<?php echo $loopChild['y'];?>-<?php echo $loopChild['m'];?>" class="am-hide-sm-only">未更新</td>
                                            <td>
                                                <div class="am-btn-toolbar">
                                                    <div class="am-btn-group am-btn-group-xs">
                                            <button id='<?php echo $loopChild['y'];?>-<?php echo $loopChild['m'];?>' type="button"  onclick="update('<?php echo $loopChild['y'];?>','<?php echo $loopChild['m'];?>');" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 更新</button>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        	<?php }?>
                                    </tbody>
                                </table>
                                <div class="am-cf">


									


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