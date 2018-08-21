<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>添加活动-小薇平台管理后台</title>
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
                添加-抽奖活动管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="<?php echo $arrInfo['url'];?>/admin" class="am-icon-home">首页</a></li>
                <li><a>APP</a></li>
                <li class="am-active">添加-抽奖活动管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 添加
                    </div>



                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-9">
                            <form id="formid"  name= "myform" method = 'post'  action = '<?php echo $arrInfo['url'];?>/admin/cjhd/do' class="am-form am-form-horizontal">
							<input type="hidden" name="do"  value="add">
	<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">标题 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="title" placeholder="标题" value="">
                                    </div>
                                </div>
				
                                 				                                <div class="am-form-group">
                                    <label for="user-email" class="am-u-sm-3 am-form-label">活动日期</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="time" value="" class="am-form-field tpl-form-no-bg" placeholder="日期" data-am-datepicker="" readonly/>
                                        <small>时间为必填</small>
                                    </div>
                                </div>  
								<div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">描述内容</label>
                                    <div class="am-u-sm-9">
                                        <textarea class="" rows="6" id="user-intro" placeholder="内容" name="content"></textarea>
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">领奖方式</label>
                                    <div class="am-u-sm-9">
                                        <textarea class="" rows="6" id="user-intro" placeholder="内容" name="lcontent"></textarea>
                                    </div>
                                </div>
 <div class="am-form-group">


								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">结束时间 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="endtime" value="">
                                    </div>
                                </div>
									<div class="am-form-group">


 
	
                                 
                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                         <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>










        </div>

    </div>

	<script type='text/javascript' src='<?php echo $arrInfo['url'];?>/app/cjhd/model/js/jquery-2.0.3.min.js'></script>
		  <script type="text/javascript">
		  var cimgnum=1;
$(document).ready(function(e) {

   $('#ufirstimg').localResizeIMG({
      quality:1,
      success: function (result) {  
		  var submitData={
				'do':'updateimg',
				'base64_string':result.clearBase64, 
			}; 
		$.ajax({
		   type: "POST",
		   url: "<?php echo $arrInfo['url'];?>/admin/cjhd/do",
		   data: submitData,
		   dataType:"json",
		   success: function(data){
			 if (0 == data.status) {
				alert(data.content);
		
				return false;
			 }else{
				alert(data.content);
		$("#img0").attr("src","<?php echo $arrInfo['url'];?>/system/data/app/cjhd/"+data.url+"?"+Math.random());
		$("#firstimg").attr("value","<?php echo $arrInfo['url'];?>/system/data/app/cjhd/"+data.url);
				return false;
			 }
		   }, 
			complete :function(XMLHttpRequest, textStatus){
			},
			error:function(XMLHttpRequest, textStatus, errorThrown){ //上传失败 
			   alert(XMLHttpRequest.status);
			   alert(XMLHttpRequest.readyState);
			   alert(textStatus);
			}
		}); 
      }
  });
  
     $('#ucimg').localResizeIMG({
      quality:1,
      success: function (result) {  
		  var submitData={
				'do':'updateimg',
				'base64_string':result.clearBase64, 
			}; 
		$.ajax({
		   type: "POST",
		   url: "<?php echo $arrInfo['url'];?>/admin/cjhd/do",
		   data: submitData,
		   dataType:"json",
		   success: function(data){
			 if (0 == data.status) {
				alert(data.content);
		
				return false;
			 }else{
				alert(data.content);

		$("#cimg"+cimgnum).attr("value","<?php echo $arrInfo['url'];?>/system/data/app/cjhd/"+data.url);
		if(cimgnum==6)cimgnum=1;
		else
		cimgnum=cimgnum+1;
				return false;
			 }
		   }, 
			complete :function(XMLHttpRequest, textStatus){
			},
			error:function(XMLHttpRequest, textStatus, errorThrown){ //上传失败 
			   alert(XMLHttpRequest.status);
			   alert(XMLHttpRequest.readyState);
			   alert(textStatus);
			}
		}); 
      }
  });
  
       $('#usmallimg').localResizeIMG({
      quality:1,
      success: function (result) {  
		  var submitData={
				'do':'updateimg',
				'base64_string':result.clearBase64, 
			}; 
		$.ajax({
		   type: "POST",
		   url: "<?php echo $arrInfo['url'];?>/admin/cjhd/do",
		   data: submitData,
		   dataType:"json",
		   success: function(data){
			 if (0 == data.status) {
				alert(data.content);
		
				return false;
			 }else{
				alert(data.content);
		$("#img1").attr("src","<?php echo $arrInfo['url'];?>/system/data/app/cjhd/"+data.url+"?"+Math.random());
		$("#smallimg").attr("value","<?php echo $arrInfo['url'];?>/system/data/app/cjhd/"+data.url);
				return false;
			 }
		   }, 
			complete :function(XMLHttpRequest, textStatus){
			},
			error:function(XMLHttpRequest, textStatus, errorThrown){ //上传失败 
			   alert(XMLHttpRequest.status);
			   alert(XMLHttpRequest.readyState);
			   alert(textStatus);
			}
		}); 
      }
  });
  }); 
</script>







        </div>

    </div>


    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/amazeui.min.js"></script>
    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/app.js"></script>
	
<script type='text/javascript' src='<?php echo $arrInfo['url'];?>/app/cjhd/model/js/LocalResizeIMG.js'></script>
<script type='text/javascript' src='<?php echo $arrInfo['url'];?>/app/cjhd/model/js/patch/mobileBUGFix.mini.js'></script>
</body>

</html>