<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APP展示编辑-小薇平台管理后台</title>
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
                编辑-APP展示管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="<?php echo $arrInfo['url'];?>/admin" class="am-icon-home">首页</a></li>
                <li><a>APP</a></li>
                <li class="am-active">编辑-APP展示管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 编辑APP展示
                    </div>



                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-9">
                            <form id="formid"  name= "myform" method = 'post'  action = '<?php echo $arrInfo['url'];?>/admin/home/do' class="am-form am-form-horizontal">
							<input type="hidden" name="do"  value="edit">
								<input type="hidden" name="id"  value="<?php echo $Array['id'];?>">
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">名称 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="name" placeholder="APP名称" value="<?php echo $Array['name'];?>">
                                     
                                    </div>
                                </div>
									<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">组别 </label>
                                    <div class="am-u-sm-9">
									<select name="groupid" data-am-selected="{searchBox: 1}">
										<?php foreach((array)$ArrayG as $key=>$loopChild) {?>
  <option value="<?php echo $loopChild['groupid'];?>"<?php if($Array['groupid']==$loopChild['groupid']) { ?>selected="selected"<?php } ?>><?php echo $loopChild['groupname'];?></option>
<?php }?>
</select>
                                      
                                    </div>
                                </div><div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">ico </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="ico" placeholder="ico" value="<?php echo $Array['ico'];?>">
                                     <small>ico标志由阿里巴巴图标库获取</small>
                                    </div>
                                </div>  
 <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">链接 </label>
                                    <div class="am-u-sm-9">
									<input type="text" name="url" placeholder="链接" value="<?php echo $Array['url'];?>">
                                        <small>可以为外部链接</small>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">排序id </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="sortid" placeholder="排序id" value="<?php echo $Array['sortid'];?>">
                                     
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