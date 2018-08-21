<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>步数编辑-小薇平台管理后台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="<?php echo $arrInfo['url'];?>/include/model/admin/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $arrInfo['url'];?>/include/model/admin/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="XIAOWEI Admin" />
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/include/model/admin/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/include/model/admin/assets/css/admin.css">
    <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/include/model/admin/assets/css/app.css">
    <script src="<?php echo $arrInfo['url'];?>/include/model/admin/assets/js/echarts.min.js"></script>
</head>

<body data-type="generalComponents">
<?php include template('header'); ?>
        <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                编辑-健步走管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="<?php echo $arrInfo['url'];?>/admin" class="am-icon-home">首页</a></li>
                <li><a>APP</a></li>
                <li class="am-active">编辑-健步走管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 编辑步数
                    </div>



                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-9">
                            <form id="formid"  name= "myform" method = 'post'  action = '<?php echo $arrInfo['url'];?>/admin/walking/do' class="am-form am-form-horizontal">
							<input type="hidden" name="do"  value="edit">
								<input type="hidden" name="id"  value="<?php echo $Array['id'];?>">
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">号码 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="number" placeholder="号码" value="<?php echo $Array['number'];?>">
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">昵称 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="nickname" placeholder="昵称" value="<?php echo $Array['nickname'];?>">
                                    </div>
                                </div>
									<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">步数 </label>
                                    <div class="am-u-sm-9">
                                        <input type="number" name="step" placeholder="步数" value="<?php echo $Array['step'];?>">
                                    </div>
                                </div>
									                
								<div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">所属日期</label>
                                    <div class="am-u-sm-9">
                                       <input type="text" placeholder="日期" name="data" value="<?php echo $Array['data'];?>">
                                    </div>
                                </div>
 <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">头像链接 </label>
                                    <div class="am-u-sm-9">
									<input type="text" name="userimg" placeholder="链接" value="<?php echo $Array['userimg'];?>">
                                      
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">截图链接 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="img" value="<?php echo $Array['img'];?>">
                                    </div>
                                </div>
								
								<?php if($Array['addtime']) { ?>
								<div class="am-form-group">
                                    <label for="user-QQ" class="am-u-sm-3 am-form-label">添加时间</label>
                                    <div class="am-u-sm-9">
                                         <input type="text" class="tpl-form-input" id="time2" placeholder="<?php ECHO(date('Y-m-j G:i:s',$Array['addtime']))?>" disabled="true">
                                    </div>
                                </div><?php } ?>
									<?php if($Array['ip']) { ?>
								<div class="am-form-group">
                                    <label for="user-QQ" class="am-u-sm-3 am-form-label">IP</label>
                                    <div class="am-u-sm-9">
                                         <input type="text" class="tpl-form-input" id="time2" placeholder="<?php echo $Array['ip'];?>" disabled="true">
                                    </div>
                                </div><?php } ?>
								

                                   <div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">通过(未过)</label>
                                    <div class="am-u-sm-9">
                                        <div class="tpl-switch">
                                            <input type="checkbox" name="isok" class="ios-switch bigswitch tpl-switch-btn"<?php if($Array['isok']==1) { ?> checked <?php } ?>/>
                                            <div class="tpl-switch-btn-view">
                                                <div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                   
                                 
                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                         <?php if($ok==0) { ?> <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
										<?php } ?>  <?php if($ok==1) { ?><small>数据已更新</small><?php } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>










        </div>

    </div>


    <script src="<?php echo $arrInfo['url'];?>/include/model/admin/assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/include/model/admin/assets/js/amazeui.min.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/include/model/admin/assets/js/app.js"></script>
</body>

</html>