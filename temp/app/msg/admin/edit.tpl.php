<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>消息编辑-小薇平台管理后台</title>
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
                编辑-消息管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="<?php echo $arrInfo['url'];?>/admin" class="am-icon-home">首页</a></li>
                <li><a>APP</a></li>
                <li class="am-active">编辑-消息管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 编辑消息
                    </div>



                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-9">
                            <form id="formid"  name= "myform" method = 'post'  action = '<?php echo $arrInfo['url'];?>/admin/msg/do' class="am-form am-form-horizontal">
							<input type="hidden" name="do"  value="edit">
								<input type="hidden" name="id"  value="<?php echo $Array['id'];?>">
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">标题 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="title" placeholder="标题" value="<?php echo $Array['title'];?>">
                                    </div>
                                </div>
								
									<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">信息类型 </label>
                                    <div class="am-u-sm-9">
									<select name="msgtype" data-am-selected="{searchBox: 1}">
  <option value="1"<?php if($Array['msgtype']=='1') { ?>selected="selected"<?php } ?>>用户</option>
    <option value="2"<?php if($Array['msgtype']=='2') { ?>selected="selected"<?php } ?>>系统</option>
	  <option value="3"<?php if($Array['msgtype']=='3') { ?>selected="selected"<?php } ?>>应用</option>
</select>
                                      
                                    </div>
                                </div>                         
								<div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">内容</label>
                                    <div class="am-u-sm-9">
                                        <textarea class="" rows="6" id="user-intro" placeholder="内容" name="content"><?php echo $Array['content'];?></textarea>
                                    </div>
                                </div>
 <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">链接 </label>
                                    <div class="am-u-sm-9">
									<input type="text" name="tourl" placeholder="链接" value="<?php if($Array['tourl']) { ?><?php echo $Array['tourl'];?><?php } ?>">
                                        <small>可以留空，填写链接则自动跳转</small>
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">组别ID </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="groupid" placeholder="groupid" value="<?php echo $Array['groupid'];?>">
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">发信人昵称 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="fromname" value="<?php echo $Array['fromname'];?>">
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">发信人号码 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="fromnumber" value="<?php echo $Array['fromnumber'];?>">
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">收信人号码 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="tonumber" value="<?php echo $Array['tonumber'];?>">
                                    </div>
                                </div>
								<?php if($Array['addtime']) { ?>
								<div class="am-form-group">
                                    <label for="user-QQ" class="am-u-sm-3 am-form-label">添加时间</label>
                                    <div class="am-u-sm-9">
                                         <input type="text" class="tpl-form-input" id="time2" placeholder="<?php ECHO(date('Y-m-j G:i:s',$Array['addtime']))?>" disabled="true">
                                    </div>
                                </div><?php } ?>
									<?php if($Array['viewtime']) { ?>
								<div class="am-form-group">
                                    <label for="user-QQ" class="am-u-sm-3 am-form-label">阅读时间</label>
                                    <div class="am-u-sm-9">
                                         <input type="text" class="tpl-form-input" id="time2" placeholder="<?php ECHO(date('Y-m-j G:i:s',$Array['viewtime']))?>" disabled="true">
                                    </div>
                                </div><?php } ?>
								<?php if($Array['deletetime']) { ?>
								<div class="am-form-group">
                                    <label for="user-QQ" class="am-u-sm-3 am-form-label">删除时间</label>
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
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">已读(未读)</label>
                                    <div class="am-u-sm-9">
                                        <div class="tpl-switch">
                                            <input type="checkbox" name="isview" class="ios-switch bigswitch tpl-switch-btn"<?php if($Array['isview']==1) { ?> checked <?php } ?>/>
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