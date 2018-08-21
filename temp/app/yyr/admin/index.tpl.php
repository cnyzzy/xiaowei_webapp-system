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
               校纪校规测试管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="<?php echo $arrInfo['url'];?>/admin" class="am-icon-home">首页</a></li>
                <li><a>APP管理</a></li>
                <li class="am-active">校纪校规测试管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 校纪校规测试管理-成绩
                    </div>


                </div>
                              <div class="tpl-block">
           
                    <div class="am-g">
						   <div class="am-u-sm-12 am-u-md-6">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
		 <a href="<?php echo $arrInfo['url'];?>/admin/xjxg/tk"><button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 查看题库</button></a>

		   <a href="<?php echo $arrInfo['url'];?>/admin/xjxg/jp"><button type="button" class="am-btn am-btn-default am-btn-warning"><span class="am-icon-archive"></span> 奖品记录</button></a>

                                    <a href="<?php echo $arrInfo['url'];?>/admin/xjxg/excel"><button type="button" class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-save"></span> 保存表格</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="am-u-sm-12">
                            <form class="am-form">
                              <div class="am-cf">

                              <table class="am-table am-table-striped am-table-hover table-main">
                                    <thead>
                                        <tr>
                                            <th class="table-id">ID</th>
                                            <th class="table-title">姓名</th>
 <th class="table-title">昵称</th>
                                            <th class="table-author am-hide-sm-only"><a href="<?php echo $arrInfo['url'];?>/admin/xjxg/index/sroce/1">分数</a></th>
                                            <th class="table-date am-hide-sm-only"><a href="<?php echo $arrInfo['url'];?>/admin/xjxg/index/addtime/1">记录时间</a></th>
                                            <th class="table-set">IP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach((array)$Array as $key=>$loopChild) {?>
                                        <tr>                                          
                                            <td><?php echo $loopChild['id'];?></td>
                                            <td><a href="<?php echo $arrInfo['url'];?>/admin/mwxiddd/<?php echo $loopChild['number'];?>"><?php echo $loopChild['name'];?></a></td>
										<td class="am-hide-sm-only"> <?php echo $loopChild['nickname'];?></td>
                                            <td class="am-hide-sm-only"> <?php echo $loopChild['sroce'];?></td>
											<td><a href="<?php echo $arrInfo['url'];?>/admin/xjxg/detail/<?php echo $loopChild['id'];?>"><?php ECHO(date('Y-m-j G:i:s',$loopChild['addtime']))?></a></td>
											<td class="am-hide-sm-only"><?php echo $loopChild['ip'];?></td>
                                        </tr>
                                         	<?php }?>
                                    </tbody>
                                </table>
								                                <div class="am-cf">

                                       <div class="am-fr">
                                        <ul class="am-pagination tpl-pagination">
										共 <?php echo $TotalNum;?> 条记录
										  <?php if($prePageNum) { ?>
                  <li <?php if($NOW==1) { ?>class="am-disabled"<?php } ?>><a href="<?php echo $arrInfo['url'];?>/admin/xjxg/index/<?php echo $bbb;?>/1">«</a></li>
				          <?php if($NOWLLLL>0) { ?> <li><a href="<?php echo $arrInfo['url'];?>/admin/xjxg/index/<?php echo $bbb;?>/<?php echo $NOWLLLL;?>"><?php echo $NOWLLLL;?></a></li><?php } ?>
      <?php if($NOWLLL>0) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/xjxg/index/<?php echo $bbb;?>/<?php echo $NOWLLL;?>"><?php echo $NOWLLL;?></a></li><?php } ?>
        <?php if($NOWLL>0) { ?> <li><a href="<?php echo $arrInfo['url'];?>/admin/xjxg/index/<?php echo $bbb;?>/<?php echo $NOWLL;?>"><?php echo $NOWLL;?></a></li><?php } ?>
      <?php if($NOWL>0) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/xjxg/index/<?php echo $bbb;?>/<?php echo $NOWL;?>"><?php echo $NOWL;?></a></li><?php } ?>
      <li class="am-active"><a href="<?php echo $arrInfo['url'];?>/admin/xjxg/index/<?php echo $bbb;?>/<?php echo $NOW;?>" ><?php echo $NOW;?></a></li>
          <?php if($NOWR<=$prePageNum) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/xjxg/index/<?php echo $bbb;?>/<?php echo $NOWR;?>"><?php echo $NOWR;?></a></li><?php } ?>
        <?php if($NOWRR<=$prePageNum) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/xjxg/index/<?php echo $bbb;?>/<?php echo $NOWRR;?>"><?php echo $NOWRR;?></a></li><?php } ?>
		<?php if($NOWRRR<=$prePageNum) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/xjxg/index/<?php echo $bbb;?>/<?php echo $NOWRRR;?>"><?php echo $NOWRRR;?></a></li><?php } ?>
        <?php if($NOWRRRR<=$prePageNum) { ?><li><a href="<?php echo $arrInfo['url'];?>/admin/xjxg/index/<?php echo $bbb;?>/<?php echo $NOWRRRR;?>"><?php echo $NOWRRRR;?></a></li><?php } ?>
      <li <?php if($NOW==$prePageNum) { ?>class="am-disabled"<?php } ?>><a href="<?php echo $arrInfo['url'];?>/admin/xjxg/index/<?php echo $bbb;?>/<?php echo $prePageNum;?>">»</a></li>
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