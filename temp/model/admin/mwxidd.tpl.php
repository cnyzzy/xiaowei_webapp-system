<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>编辑绑定-小薇平台管理后台</title>
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
                编辑-微信绑定管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="/admin" class="am-icon-home">首页</a></li>
                <li><a>微网站管理</a></li>
                <li class="am-active">编辑-绑定管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 编辑绑定
                    </div>



                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">
 <?php if($Array['type']=='1') { ?><a href="<?php echo $arrInfo['url'];?>/admin/minfodd/<?php echo $Array['number'];?>"><button  type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 教务信息</button> </a><?php } ?>

                        <div class="am-u-sm-12 am-u-md-9">
                            <form id="formid"  name= "myform" method = 'post'  action = '../dowxid' class="am-form am-form-horizontal">
							<input type="hidden" name="do"  value="edit">
								<input type="hidden" name="id"  value="<?php echo $Array['id'];?>">
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">姓名 / Name</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="name" placeholder="姓名" value="<?php echo $Array['name'];?>">
                                     
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">身份 <span class="tpl-form-line-small-title">Type</span></label>
                                    <div class="am-u-sm-9">
                                        <select name="type" data-am-selected="{searchBox: 1}">
  <option value="1"<?php if($Array['type']=='1') { ?>selected="selected"<?php } ?>>学生</option>
  <option value="2"<?php if($Array['type']=='2') { ?>selected="selected"<?php } ?>>教职工</option>
  <option value="3"<?php if($Array['type']=='3') { ?>selected="selected"<?php } ?>>访客</option>
</select>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-email" class="am-u-sm-3 am-form-label">号码 / Number</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="number" placeholder="号码" value="<?php echo $Array['number'];?>">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">昵称 / Nickname</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="nickname" placeholder="昵称"  value="<?php echo $Array['nickname'];?>">
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">微信用户识别码 / OPENID</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="openid" placeholder="微信OPENID"  value="<?php echo $Array['openid'];?>">
                                    </div>
                                </div>
								     <div class="am-form-group">
                                    <label for="user-weibo" class="am-u-sm-3 am-form-label">头像 / Img Url</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="img" placeholder="IMG URL"  value="<?php echo $Array['img'];?>">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-QQ" class="am-u-sm-3 am-form-label">绑定时间 / Addtime</label>
                                    <div class="am-u-sm-9">
                                         <input type="text" class="tpl-form-input" id="time" placeholder="<?php ECHO(date('Y-m-j G:i:s',$Array['addtime']))?>" disabled="true">
                                    </div>
                                </div>
								<?php if($Array['deletetime']) { ?>
								<div class="am-form-group">
                                    <label for="user-QQ" class="am-u-sm-3 am-form-label">删除时间 / Deletetime</label>
                                    <div class="am-u-sm-9">
                                         <input type="text" class="tpl-form-input" id="time2" placeholder="<?php ECHO(date('Y-m-j G:i:s',$Array['deletetime']))?>" disabled="true">
                                    </div>
                                </div><?php } ?>
                           

                                   <div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">启用(删除)</label>
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
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">锁定</label>
                                    <div class="am-u-sm-9">
                                        <div class="tpl-switch">
                                            <input type="checkbox" name="lock" class="ios-switch bigswitch tpl-switch-btn"<?php if($Array['islock']==1) { ?> checked <?php } ?>/>
                                            <div class="tpl-switch-btn-view">
                                                <div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
								
                                   <div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">封禁</label>
                                    <div class="am-u-sm-9">
                                        <div class="tpl-switch">
                                            <input type="checkbox" name="stop" class="ios-switch bigswitch tpl-switch-btn"<?php if($Array['stop']==1) { ?> checked <?php } ?>/>
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


    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/amazeui.min.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/app.js"></script>
</body>

</html>