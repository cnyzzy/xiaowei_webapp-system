<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
 <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
<script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
 <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
 <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
<script type='text/javascript' src='<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/LocalResizeIMG.js'></script>
<script type='text/javascript' src='<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/patch/mobileBUGFix.mini.js'></script>
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<style>

</style>
<script>
var logined = 1;
var zurl = "<?php echo $arrInfo['url'];?>";
var idnumber = <?php echo $number;?>;
var idimg = '<?php echo $img;?>';
var idname = '<?php echo $name;?>';
<!--
//初始化判断页面是否存在没有清除掉的interval
if(typeof(interval)!="undefined")
{
    doClearInterval();
}
else
{
    interval = null;
}

 //进度条id $("#upstep22").html(j+"%");
var totalProgress_node_id = "upstep22";
 //进度条进度
var totalProgress = 0;
function beginProgress()
{
    totalProgress = 15;
    interval = setInterval("doProgress()",8);//1000为1秒钟    
}

//设置进度
function setProgress(node_id,progress) 
{ 
    if (node_id) 
    { 
        $("#" + node_id ).html(String(progress) + "%");

    }
} 
//进行循环获取进度阶段
function doProgress()
{       
        setProgress(totalProgress_node_id,totalProgress);
        totalProgress++;
        if(totalProgress == 90)
        {
            doClearInterval();
        }
        
}   
//清除延时器
function doClearInterval()
{
    clearInterval(interval);
}
 function againup()  {  
$.confirm({
  title: '删除',
  text: '是否删除此图片',
  onOK: function () {
  doClearInterval();
  $("#photo").attr("value","");
$("#upstep22").html("");
 $("#upstep2").hide(); 
$("#upstep22").hide(); 
$("#upstep223").hide();
  $("#uptext").html("0/1");
  	$("#upstep3").hide();
$("#upstep1").show(); 
  },
  onCancel: function () {
  $.toast("取消操作", "cancel");
  }
});
 }

function validate_required(field,alerttxt)
{
with (field)
  {
  if (value==null||value=="")
    {$.toast(alerttxt,"forbidden");return false}
  else {return true}
  }
}

function validate_form()
{ var thisform=document.getElementById("upform");
with (thisform)
  {
  if (validate_required(title,"标题为空")==false)
    {title.focus();return false}
	 if (validate_required(stype,"类型为空")==false)
    {stype.focus();return false}
	 if (validate_required(photo,"图片为空")==false)
    {photo.focus();return false}
	 if (validate_required(content,"描述为空")==false)
    {content.focus();return false}
}
$.confirm({
  title: '确认',
  text: '上传之后将不能修改',
  onOK: function () {
$.ajax({
		   type: "POST",
		   url: "<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/addcg/<?php echo $id;?>",
		   data : $("#upform").serializeArray(),
		   async: true,
		   dataType:"json",
		   success: function(data){
			 if (0 == data.status) {
$.toast(data.content,"cancel");
				return false;
			 }else{
$.toast(data.content);
            setTimeout(function() {
  $('html').addClass('loading');
            },
            1000);

            setTimeout(function() {
                window.location.href = zurl+"/sxzs/wait/"+data.id;
            },
            400);
			 }
		   }, 
			complete :function(XMLHttpRequest, textStatus){
			},
			error:function(XMLHttpRequest, textStatus, errorThrown){ //上传失败 

$.toast("网络故障","forbidden");
			}
		});
  },
  onCancel: function () {
  $.toast("取消操作", "cancel");
  }
});
  		
}
</script>
<script>

$(document).ready(function(e) {
$("#upstep2").hide(); 
$("#upstep22").hide(); 
$("#upstep223").hide(); 
$("#upstep3").hide(); 
				
   $('#uploadphoto').localResizeIMG({
      width: 1000,
      quality: 0.5,
      success: function (result) {  
	  
		  var submitData={
				base64_string:result.clearBase64, 
			};  

$("#upstep2").attr("style","background: url(data:image/jpge;base64,"+result.clearBase64+");  background-size:cover;background-position:center;");
$("#upstep3").attr("style","background: url(data:image/jpge;base64,"+result.clearBase64+");background-size:cover;background-position:center;");
$("#upstep2").hide(); 
$("#upstep3").hide(); 
$("#upstep1").hide();
 $("#uptext").html("1/1");
$("#upstep2").show();
$("#upstep22").show();
		doClearInterval();
        beginProgress();
		$.ajax({
		   type: "POST",
		   url: "<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/upload",
		   data: submitData,
		   async: true,
		   dataType:"json",
		   success: function(data){
			 if (0 == data.status) {
			 	doClearInterval();
                 $("#upstep22").html("");
				$("#upstep223").show();
				$.toast(data.content,"forbidden");

				return false;
			 }else{
				doClearInterval();
                setProgress(totalProgress_node_id, 99);
				$.toast(data.content);
				$("#upstep2").hide();
				$("#upstep22").hide();
				
				$("#photo").attr("value",data.text);
				$("#upstep3").show();
		 //document.getElementById("uploadphoto").value=data.text;
				return false;
			 }
		   }, 
			complete :function(XMLHttpRequest, textStatus){
			},
			error:function(XMLHttpRequest, textStatus, errorThrown){ //上传失败 
			doClearInterval();
             $("#upstep22").html("");
				$("#upstep223").show();
$.toast("网络故障","forbidden");
			}
		});

      }
  });

}); 
</script>
     <div class="titlebar reverse">
             <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>上传成果</h1>
            </div>
</head>

<body>

	<div id="container">
		<div id="content">
						<div style="height:1px"></div>
			<form id="upform">
<div class="weui_cells weui_cells_form">
  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">标题</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" type="text" name="title" id="title" placeholder="请输入标题">
    </div>
  </div>
    <div class="weui_cell">
	 <div class="weui_cell_hd"><label class="weui_label">类型</label></div>
    <div class="weui_cell_bd weui_cell_primary">
<input class="weui_input" type="text" id='styp' name="styp"/>
<input  type="text" id='stype' name="stype" style="display:none"/>
<script>
$("#styp").select({
  title: "选择类型",
  items: [
    {
      title: "个人成果",
      value: "gr",
    },
    {
      title: "团队成果",
      value: "td",
    }
  ],
   onChange: function(d) {
          $("#stype").attr("value",d.values);
        }
  
});
</script>
    </div>
  </div>
	
</div>
<div class="weui_cell weui_cell_warn">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <div class="weui_uploader">
        <div class="weui_uploader_hd weui_cell">
          <div class="weui_cell_bd weui_cell_primary">图片上传</div>
          <div class="weui_cell_ft" id="uptext">0/1</div>
        </div>
        <div class="weui_uploader_bd">
          <ul class="weui_uploader_files">
            <li class="weui_uploader_file" id="upstep3" onclick="againup();" style=""></li>
            <li class="weui_uploader_file weui_uploader_status" id="upstep2" style="">
              <div class="weui_uploader_status_content" onclick="againup();" id="upstep22">0%</div>
			   <div class="weui_uploader_status_content" onclick="againup();" id="upstep223">
                <i class="weui_icon_warn"></i>
              </div>
            </li>
          </ul>
          <div class="weui_uploader_input_wrp" id="upstep1">
            <input class="weui_uploader_input" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" multiple="" id="uploadphoto" name="uploadphoto" >
			 

          </div> <input type="text" id="photo" name="photo" style="display:none">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="weui_cells_title">描述</div>
<div class="weui_cells weui_cells_form">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <textarea class="weui_textarea" placeholder="请输入描述" rows="3" name="content"></textarea>
      <div class="weui_textarea_counter"></div>
    </div>
  </div>
</div>


</form>	
</div>
<a href="javascript:void(0);" onclick="validate_form()" class="weui_btn weui_btn_primary">提交</a>
									<div id="comment">
				<div class="pd5">	<h5> &nbsp;</h5>
									</div>	<h5> &nbsp;</h5>
			</div>
		</div>

	</div>
	
	


	<div class="loading_dark"></div>
	<div id="loading_mask">
		<div class="loading_mask">
			<ul class="anm">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
	</div>

<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
</body>
</html>