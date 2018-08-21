<?php defined('ZRoot') or die('Access Denied.'); ?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>活动编辑-小薇平台管理后台</title>
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
                编辑-活动管理
            </div>
            <ol class="am-breadcrumb">
                <li><a href="<?php echo $arrInfo['url'];?>/admin" class="am-icon-home">首页</a></li>
                <li><a>APP</a></li>
                <li class="am-active">编辑-活动管理</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 编辑活动
                    </div>



                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-9">
                            <form id="formid"  name= "myform" method = 'post'  action = '<?php echo $arrInfo['url'];?>/admin/hdxp/do' class="am-form am-form-horizontal">
							<input type="hidden" name="do"  value="edit">
								<input type="hidden" name="id"  value="<?php echo $Array['id'];?>">



	<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">标题 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="title" placeholder="标题" value="<?php echo $Array['title'];?>">
                                    </div>
                                </div>
				
									<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">活动类型 </label>
                                    <div class="am-u-sm-9">
<input type="text" name="stype" placeholder="" value="<?php echo $Array['stype'];?>">
                                      
                                    </div>
                                </div> 
																	<div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">地点类型 </label>
                                    <div class="am-u-sm-9">
<input type="text" name="swhere" placeholder="" value="<?php echo $Array['swhere'];?>">  
                                    </div>
                                </div>  
                                 				                                <div class="am-form-group">
                                    <label for="user-email" class="am-u-sm-3 am-form-label">活动日期</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="time" value="<?php echo $Array['time'];?>" class="am-form-field tpl-form-no-bg" placeholder="日期" data-am-datepicker="" readonly/>
                                        <small>时间为必填</small>
                                    </div>
                                </div>  
								<div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">描述内容</label>
                                    <div class="am-u-sm-9">
                                        <textarea class="" rows="6" id="user-intro" placeholder="内容" name="content"><?php echo $Array['content'];?></textarea>
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">领票方式</label>
                                    <div class="am-u-sm-9">
                                        <textarea class="" rows="6" id="user-intro" placeholder="内容" name="lcontent"><?php echo $Array['lcontent'];?></textarea>
                                    </div>
                                </div><div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">视频地址 </label>
                                    <div class="am-u-sm-9">
									<input type="text" name="video" placeholder="视频" value="<?php echo $Array['video'];?>">
                                       
                                    </div>
                                </div>
 <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">地点 </label>
                                    <div class="am-u-sm-9">
									<input type="text" name="place" placeholder="地点" value="<?php echo $Array['place'];?>">
                                       
                                    </div>
                                </div>
								 <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">详细地点 </label>
                                    <div class="am-u-sm-9">
									<input type="text" name="xwhere" placeholder="详细地点" value="<?php echo $Array['xwhere'];?>">
                                       
                                    </div>
                                </div>
								 <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">详细时间 </label>
                                    <div class="am-u-sm-9">
									<input type="text" name="xtime" placeholder="详细时间" value="<?php echo $Array['xtime'];?>">
                                       
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">主办方 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="owner" placeholder="主办方" value="<?php echo $Array['owner'];?>">
                                    </div>
                                </div>

								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">订票开始时间 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="opentime" value="<?php ECHO(date('Y-m-j G:i:s',$Array['opentime']))?>">
                                    </div>
                                </div>
								<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">订票结束时间 </label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="endtime" value="<?php ECHO(date('Y-m-j G:i:s',$Array['endtime']))?>">
                                    </div>
                                </div>
									<div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">座位描述</label>
                                    <div class="am-u-sm-9">
                                        <textarea class="" rows="6" id="user-intro" placeholder="内容" name="seat"><?php if(!empty($Array['seat'])) { ?><?php $seat1=json_decode($Array['seat'],true);?><?php foreach((array)$seat1 as $key=>$loopChild) {?><?php echo $loopChild;?>

<?php }?><?php } ?></textarea>
                                    </div>
                                </div>
									<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">封面图 </label>
                                        <div class="am-form-group am-form-file">
                                            <div class="tpl-form-file-img">
                                                <img src="<?php echo $Array['firstimg'];?>" alt="" id="img0">
                                            </div>

                                              <a href="javascript:void(0);" onclick="ufirstimg.click()" class="uploadbtn"><button type="button" class="am-btn am-btn-danger am-btn-sm">
    <i class="am-icon-cloud-upload"></i> 添加封面图片</button></a>
                                                 <input type="text" name="firstimg" id="firstimg" placeholder="图片链接" value="<?php echo $Array['firstimg'];?>">
											<input type="file" id="ufirstimg" name="ufirstimg" value="请点击上传图片"   style="display:none;" /> 
                                </div>  </div>
																<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">封面小图 </label>
                                        <div class="am-form-group am-form-file">
                                                   <div class="tpl-form-file-img">
                                                <img src="<?php echo $Array['smallimg'];?>" alt="" id="img1">
                                            </div>

                                              <a href="javascript:void(0);" onclick="usmallimg.click()" class="uploadbtn"><button type="button" class="am-btn am-btn-danger am-btn-sm">
    <i class="am-icon-cloud-upload"></i> 添加封面小图片</button></a>
                                                 <input type="text" name="smallimg" id="smallimg" placeholder="图片链接" value="<?php echo $Array['smallimg'];?>">
											<input type="file" id="usmallimg" name="usmallimg" value="请点击上传图片"   style="display:none;" /> 
                                </div>  </div>
																<div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">介绍图 </label>
                                        <div class="am-form-group am-form-file">
										<?php if(!empty($Array['cimg'])) { ?>
										<?php $cimg=json_decode($Array['cimg'],true);?><?php foreach((array)$cimg as $key=>$loopChild) {?><?php $Acimg[]=$loopChild;?>
<?php }?><?php } ?>
                             <?php for($i=1;$i<7;$i++) {?>
							 <input type="text" name="cimg<?php echo $i;?>" id="cimg<?php echo $i;?>" placeholder="图片链接" value="<?php if(!empty($Acimg[$i-1])) { ?><?php echo $Acimg[$i-1];?><?php } ?>">
<?php } ?>
                                           <a href="javascript:void(0);" onclick="ucimg.click()" class="uploadbtn"><button type="button" class="am-btn am-btn-danger am-btn-sm">
    <i class="am-icon-cloud-upload"></i> 添加封面图片</button></a>
                                                 
											<input type="file" id="ucimg" name="ucimg" value="请点击上传图片"   style="display:none;" /> 
                                </div>  </div>
                                   <div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">显示(隐藏)</label>
                                    <div class="am-u-sm-9">
                                        <div class="tpl-switch">
                                            <input type="checkbox" name="isshow" class="ios-switch bigswitch tpl-switch-btn" <?php if($Array['isshow']==1) { ?> checked <?php } ?> />
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
				<script type='text/javascript' src='<?php echo $arrInfo['url'];?>/app/hdxp/model/js/jquery-2.0.3.min.js'></script>
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
		   url: "<?php echo $arrInfo['url'];?>/admin/hdxp/do",
		   data: submitData,
		   dataType:"json",
		   success: function(data){
			 if (0 == data.status) {
				alert(data.content);
		
				return false;
			 }else{
				alert(data.content);
		$("#img0").attr("src","<?php echo $arrInfo['url'];?>/system/data/app/hdxp/"+data.url+"?"+Math.random());
		$("#firstimg").attr("value","<?php echo $arrInfo['url'];?>/system/data/app/hdxp/"+data.url);
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
		   url: "<?php echo $arrInfo['url'];?>/admin/hdxp/do",
		   data: submitData,
		   dataType:"json",
		   success: function(data){
			 if (0 == data.status) {
				alert(data.content);
		
				return false;
			 }else{
				alert(data.content);

		$("#cimg"+cimgnum).attr("value","<?php echo $arrInfo['url'];?>/system/data/app/hdxp/"+data.url);
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
		   url: "<?php echo $arrInfo['url'];?>/admin/hdxp/do",
		   data: submitData,
		   dataType:"json",
		   success: function(data){
			 if (0 == data.status) {
				alert(data.content);
		
				return false;
			 }else{
				alert(data.content);
		$("#img1").attr("src","<?php echo $arrInfo['url'];?>/system/data/app/hdxp/"+data.url+"?"+Math.random());
		$("#smallimg").attr("value","<?php echo $arrInfo['url'];?>/system/data/app/hdxp/"+data.url);
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
	
<script type='text/javascript' src='<?php echo $arrInfo['url'];?>/app/hdxp/model/js/LocalResizeIMG.js'></script>
<script type='text/javascript' src='<?php echo $arrInfo['url'];?>/app/hdxp/model/js/patch/mobileBUGFix.mini.js'></script>
</body>

</html>