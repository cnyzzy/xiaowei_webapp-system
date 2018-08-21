<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>新闻编辑-小薇平台管理后台</title>
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
	<link href="<?php echo $arrInfo['url'];?>/app/Z60news/admin/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">

    <style type="text/css">
        h1{
            font-family: "微软雅黑";
            font-weight: normal;
        }
        .btn {
            display: inline-block;
            *display: inline;
            padding: 4px 12px;
            margin-bottom: 0;
            *margin-left: .3em;
            font-size: 14px;
            line-height: 20px;
            color: #333333;
            text-align: center;
            text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
            vertical-align: middle;
            cursor: pointer;
            background-color: #f5f5f5;
            *background-color: #e6e6e6;
            background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
            background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
            background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
            background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
            background-repeat: repeat-x;
            border: 1px solid #cccccc;
            *border: 0;
            border-color: #e6e6e6 #e6e6e6 #bfbfbf;
            border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
            border-bottom-color: #b3b3b3;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#ffe6e6e6', GradientType=0);
            filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
            *zoom: 1;
            -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .btn:hover,
        .btn:focus,
        .btn:active,
        .btn.active,
        .btn.disabled,
        .btn[disabled] {
            color: #333333;
            background-color: #e6e6e6;
            *background-color: #d9d9d9;
        }

        .btn:active,
        .btn.active {
            background-color: #cccccc \9;
        }

        .btn:first-child {
            *margin-left: 0;
        }

        .btn:hover,
        .btn:focus {
            color: #333333;
            text-decoration: none;
            background-position: 0 -15px;
            -webkit-transition: background-position 0.1s linear;
            -moz-transition: background-position 0.1s linear;
            -o-transition: background-position 0.1s linear;
            transition: background-position 0.1s linear;
        }

        .btn:focus {
            outline: thin dotted #333;
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px;
        }

        .btn.active,
        .btn:active {
            background-image: none;
            outline: 0;
            -webkit-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .btn.disabled,
        .btn[disabled] {
            cursor: default;
            background-image: none;
            opacity: 0.65;
            filter: alpha(opacity=65);
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
        }
    </style>
</head>

<body data-type="generalComponents">
<?php include template('header'); ?>
        <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
                编辑-校庆新闻管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="<?php echo $arrInfo['url'];?>/admin" class="am-icon-home">首页</a></li>
                <li><a>APP</a></li>
                <li class="am-active">编辑-校庆新闻管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 编辑新闻
                    </div>



                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-9">
                            <form id="formid"  name= "myform" method = 'post'  action = '<?php echo $arrInfo['url'];?>/admin/Z60news/do' onsubmit="return zform(this)" class="am-form am-form-horizontal">
							<input type="hidden" name="do"  value="edit">
								<input type="hidden" name="id"  value="<?php echo $Array['id'];?>">
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">标题 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="title" placeholder="标题" value="<?php echo $Array['title'];?>">
                                    </div>
                                </div>
								
									<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">类别 </label>
                                    <div class="am-u-sm-9">
									<select name="groupid" data-am-selected="{searchBox: 1}">
  <option value="1"<?php if($Array['groupid']=='1') { ?>selected="selected"<?php } ?>>庆典</option>
    <option value="2"<?php if($Array['groupid']=='2') { ?>selected="selected"<?php } ?>>学院</option>
	  <option value="3"<?php if($Array['groupid']=='3') { ?>selected="selected"<?php } ?>>传媒</option>
	  <option value="4"<?php if($Array['groupid']=='4') { ?>selected="selected"<?php } ?>>校友</option>
    <option value="5"<?php if($Array['groupid']=='5') { ?>selected="selected"<?php } ?>>专栏</option>
	  <option value="6"<?php if($Array['groupid']=='6') { ?>selected="selected"<?php } ?>>其他</option>

	
</select>
                                      
                                    </div>
                                </div> 
										<div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">内容</label>
                                    <div class="am-u-sm-9">
									   <script type="text/plain" id="myEditor" style="width:560px;height:240px;">
    <p><?php echo $Array['content'];?></p>
</script>

                                    </div>
                                </div>
<input type="text" name="content" id="editor1" value="" style="display:none">
								<div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">简介</label>
                                    <div class="am-u-sm-9">
                                        <textarea class="" rows="2" id="user-intro" placeholder="简介" name="dcontent"><?php echo $Array['dcontent'];?></textarea>
                                    </div>
                                </div>
 <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">作者 </label>
                                    <div class="am-u-sm-9">
									<input type="text" name="editor" placeholder="作者" value="<?php echo $Array['editor'];?>">
                                        <small></small>
                                    </div>
                                </div> <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">封面图 (留空自动取图)</label>
                                        <div class="am-form-group am-form-file">
										<?php if(!empty($Array['img'])) { ?>
										<?php $cimg=json_decode($Array['img'],true);?><?php foreach((array)$cimg as $key=>$loopChild) {?><?php $Acimg[]=$loopChild;?>
<?php }?><?php } ?>
                             <?php for($i=1;$i<4;$i++) {?>
							 <input type="text" name="cimg<?php echo $i;?>" id="cimg<?php echo $i;?>" placeholder="图片链接" value="<?php if(!empty($Acimg[$i-1])) { ?><?php echo $Acimg[$i-1];?><?php } ?>">
<?php } ?>
                          
                                </div>  </div>								
								<?php if($Array['addtime']) { ?>
								<div class="am-form-group">
                                    <label for="user-QQ" class="am-u-sm-3 am-form-label">添加时间</label>
                                    <div class="am-u-sm-9">
                                         <input type="text" class="tpl-form-input" id="time2" placeholder="<?php ECHO(date('Y-m-j G:i:s',$Array['addtime']))?>" disabled="true">
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
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">置顶(普通)</label>
                                    <div class="am-u-sm-9">
                                        <div class="tpl-switch">
                                            <input type="checkbox" name="istop" class="ios-switch bigswitch tpl-switch-btn"<?php if($Array['istop']==1) { ?> checked <?php } ?>/>
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
	    <script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/Z60news/admin/third-party/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/Z60news/admin/third-party/template.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo $arrInfo['url'];?>/app/Z60news/admin/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo $arrInfo['url'];?>/app/Z60news/admin/umeditor.min.js"></script>
    <script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/Z60news/admin/lang/zh-cn/zh-cn.js"></script>
	<script type="text/javascript">
       var um = UM.getEditor('myEditor');
		function zform(thisform)

  {
  $('#editor1').val(UM.getEditor('myEditor').getContent());
  return true;
  }
  

    </script>
</body>

</html>