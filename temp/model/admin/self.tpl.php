<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>编辑账号信息-小薇平台管理后台</title>
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


    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/jquery-2.1.1.js"></script>
<script>
function issseX(id){

if(confirm("确定变更隐私权限么？请注意保护他人的隐私")){
 $.post('<?php echo $arrInfo['url'];?>/admin/douser',{'do':'issseX','id':id},function(rs){
if(rs==1){
            window.location.reload(true);
        }
        
    })}
    
}
</script><body data-type="generalComponents">
<?php include template('header'); ?>
        <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                编辑-账号管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="<?php echo $arrInfo['url'];?>/admin" class="am-icon-home">首页</a></li>
                <li><a>账号管理</a></li>
                <li class="am-active">编辑-账号管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 编辑
                    </div>



                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">
   

                        <div class="am-u-sm-12 am-u-md-9">
						 
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">               
                                   <?php if(@EMPTY($_SESSION['admin']['ysquan'])) { ?> <button onclick="issseX('2');" type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 获得隐私权限</button>  <?php } ?>   
									 <?php if(@$_SESSION['admin']['ysquan']=='1') { ?> <button onclick="issseX('1');" type="button" class="am-btn am-btn-default am-btn-warning"><span class="am-icon-archive"></span> 释放隐私权限</button><?php } ?> 
                                </div>
                            </div>
                        
                            <form id="formid"  name= "myform" method = 'post'  action = '<?php echo $arrInfo['url'];?>/admin/douser' class="am-form am-form-horizontal">
							<input type="hidden" name="do"  value="edit">
								<input type="hidden" name="id"  value="<?php echo $Array['id'];?>">
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">用户名 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="username" placeholder="用户名" value="<?php echo $Array['username'];?>">
                                     
                                    </div>
                                </div>
									<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">密码 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="password" placeholder="不修改请留空" value="">
                                     
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">姓名 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="name" placeholder="姓名" value="<?php echo $Array['name'];?>">
                                     
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">IMG URL </label>
                                    <div class="am-u-sm-9">
                                         <input type="text" name="img"  value="<?php echo $Array['img'];?>">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">权限 </label>
                                    <div class="am-u-sm-9">
                                        <small> <?php if($Array['rightint']==9) { ?>超级管理员<?php } ?><?php if($Array['rightint']==8) { ?>平台管理员<?php } ?><?php if($Array['rightint']==7) { ?>管理员<?php } ?><?php if($Array['rightint']==6) { ?>应用管理员<?php } ?><?php if($Array['rightint']==5) { ?>应用维护员<?php } ?><?php if($Array['rightint']==4) { ?>审查账号<?php } ?>(<?php echo $Array['rightint'];?>级)</small>
                                    </div>
                                </div>
 <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">分管 </label>
                                    <div class="am-u-sm-9">
                                        <small><?php if($Array['rightint']==9) { ?>完全管理<?php } ?>
											<?php if($Array['rightint']==8) { ?>完全管理<?php } ?>
											<?php if($Array['rightint']==7) { ?>不可新建账号<?php } ?>
											<?php if($Array['rightint']==6) { ?>【<?php echo $Array['rightapp'];?>】管理<?php } ?>
											<?php if($Array['rightint']==5) { ?>【<?php echo $Array['rightapp'];?>】维护<?php } ?>
											<?php if($Array['rightint']==4) { ?>不可操作账号<?php } ?></small>
                                    </div>
                                </div>
                                 <?php if(isset($Array['lasttime'])) { ?>
								<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">最近登录时间 </label>
                                    <div class="am-u-sm-9">
                                        <small><?php ECHO(date('Y-m-j G:i:s',$Array['lasttime']))?></small>
                                    </div>
                                </div><?php } ?> <?php if(iSSET($Array['lastip'])) { ?>
								 <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">最近登录IP </label>
                                    <div class="am-u-sm-9">
                                        <small><?php echo $Array['lastip'];?></small>
                                    </div>
                                </div><?php } ?> 
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



    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/amazeui.min.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/app.js"></script>
</body>

</html>