<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>编辑资料-小薇平台管理后台</title>
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
                编辑-教务系统资料管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="/admin" class="am-icon-home">首页</a></li>
                <li><a>微网站管理</a></li>
                <li class="am-active">编辑-资料管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 编辑资料
                    </div>



                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-9">
                            <form id="formid"  name= "myform" method = 'post'  action = '../dominfo' class="am-form am-form-horizontal">
							<input type="hidden" name="do"  value="edit">
								<input type="hidden" name="id"  value="<?php echo $Array['id'];?>">
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">姓名 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="xm" placeholder="姓名" value="<?php echo $Array['xm'];?>">
                                     
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">性别 </label>
                                    <div class="am-u-sm-9">
                                         <input type="text" name="xb"  value="<?php echo $Array['xb'];?>">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-email" class="am-u-sm-3 am-form-label">号码 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="number" placeholder="号码" value="<?php echo $Array['number'];?>">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">所在年级 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="szj"  value="<?php echo $Array['szj'];?>">
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">学院</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="xy"  value="<?php echo $Array['xy'];?>">
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">专业</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="zy"  value="<?php echo $Array['zy'];?>">
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">行政班</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="xzb"  value="<?php echo $Array['xzb'];?>">
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">入学时间</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="rxsj"  value="<?php echo $Array['rxsj'];?>" data-am-datepicker="" />
                                    </div>
                                </div>
									<?php if(@$_SESSION['admin']['ysquan']=='1') { ?>
								<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">高中学校</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="gzxx"  value="<?php echo $Array['gzxx'];?>">
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">联系电话</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="lxdh"  value="<?php echo $Array['lxdh'];?>">
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">家庭住址</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="jtzz"  value="<?php echo $Array['jtzz'];?>">
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">邮编</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="yb"  value="<?php echo $Array['yb'];?>">
                                    </div>
                                </div>
							<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">身份证</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="sfz"  value="<?php echo $Array['sfz'];?>">
                                    </div>
                                </div>
								<?php } ?>
                                <div class="am-form-group">
                                    <label for="user-QQ" class="am-u-sm-3 am-form-label">添加时间 </label>
                                    <div class="am-u-sm-9">
                                         <input type="text" class="tpl-form-input" id="time" placeholder="<?php ECHO(date('Y-m-j G:i:s',$Array['addtime']))?>" disabled="true">
                                    </div>
                                </div>
								
                           

                                   <div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">启用(停用)</label>
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