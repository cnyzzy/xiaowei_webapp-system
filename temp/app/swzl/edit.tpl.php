<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<link rel="stylesheet" type="text/css" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/style.css" />
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
				<script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>
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
var idid = <?php echo $Array['id'];?>;
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
    interval = setInterval("doProgress()",3);//1000为1秒钟    
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
 function deleteq()  {  
$.confirm({
  title: '删除',
  text: '是否删除此失物招领',
  onOK: function () {
  		$.ajax({
		   type: "POST",
		   url: "<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/delete",
		   data:"id="+idid,
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
                window.location.href = zurl+"/swzl/my/";
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
  function over()  {  
$.confirm({
  title: '完结',
  text: '是否完结此失物招领',
  onOK: function () {
  		$.ajax({
		   type: "POST",
		   url: "<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/over",
		   data:"id="+idid,
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
                window.location.href = zurl+"/swzl/my/";
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
	 if (validate_required(tname,"物品名称为空")==false)
    {tname.focus();return false}
	 if (validate_required(swhere,"地点范围为空")==false)
    {swhere.focus();return false}
	 if (validate_required(mwhere,"详细地点为空")==false)
    {mwhere.focus();return false}
	 if (validate_required(content,"描述为空")==false)
    {content.focus();return false}
	
		 if (validate_required(qq,"qq为空")==false)
    {qq.focus();return false}
	 if (validate_required(mobile,"手机为空")==false)
    {mobile.focus();return false}
	if (qq.length<5)
    {qq.focus();$.toast("QQ错误","forbidden");return false}
	 if (mobile.length<11||mobile.length>11)
    {mobile.focus();$.toast("手机号码错误","forbidden");return false}
  }
  		$.ajax({
		   type: "POST",
		   url: "<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/update",
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
                window.location.href = zurl+"/swzl/my/";
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
}
</script>
<script>

$(document).ready(function(e) {
$("#upstep1").hide(); 
$("#upstep2").hide(); 
$("#upstep22").hide(); 
$("#upstep223").hide(); 
 
$("#upstep3").attr("style","background-image:url(<?php echo $Array['img'];?>);background-size:cover;");
	$("#upstep3").show(); 			
   $('#uploadphoto').localResizeIMG({
      width: 800,
      quality: 0.5,
      success: function (result) {  
	  
		  var submitData={
				base64_string:result.clearBase64, 
			};  

$("#upstep2").attr("style","background: url(data:image/jpge;base64,"+result.clearBase64+");background-size:cover;");
$("#upstep3").attr("style","background: url(data:image/jpge;base64,"+result.clearBase64+");background-size:cover;");
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
<title>编辑-失物招领</title>
</head>

<body>



	<div id="header" class="head">
		<div class="wrap">
			<i class="menu_back"><a href="javascript:history.go(-1);"></a></i>
			<div class="title">
				<span class="title_d"><p>编辑:失物招领</p></span>
				<div class="clear"></div>
			</div>
			
		</div>
	</div>
	
	<div id="container">
		<div id="content">
						<div style="height:1px"></div>
			<form id="upform">
			 <input type="number" id="id" name="id" style="display:none" value="<?php echo $Array['id'];?>">
<div class="weui_cells weui_cells_form">
  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">标题</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" type="text" name="title" id="title" placeholder="请输入标题" value="<?php echo $Array['title'];?>"<?php if($Array['isok']!=0) { ?>disabled="true"<?php } ?>>
    </div>
  </div>
    <div class="weui_cell">
	 <div class="weui_cell_hd"><label class="weui_label">类型</label></div>
    <div class="weui_cell_bd weui_cell_primary">
<input class="weui_input" type="text" id='styp' name="styp" data-values="<?php echo $Array['stype'];?>" value="<?php if($Array['stype']=='sw') { ?>失物<?php } else { ?>招领<?php } ?>"<?php if($Array['isok']!=0) { ?>disabled="true"<?php } ?>/>
<input  type="text" id='stype' name="stype" style="display:none" value="<?php echo $Array['stype'];?>"/>
<script>
$("#styp").select({
  title: "选择类型",
  items: [
    {
      title: "失物",
      value: "sw",
    },
    {
      title: "招领",
      value: "zl",
    }
  ],
   onChange: function(d) {
          $("#stype").attr("value",d.values);
        }
  
});
</script>
    </div>
  </div>
    <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">物品名称</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" type="text" name="tname" id="tname" value="<?php echo $Array['tname'];?>" placeholder="请输入物品名称(如：手机)"<?php if($Array['isok']!=0) { ?>disabled="true"<?php } ?>>
    </div>
  </div>

    <div class="weui_cell">
	 <div class="weui_cell_hd"><label class="weui_label">地点范围</label></div>
    <div class="weui_cell_bd weui_cell_primary">
<input class="weui_input" type="text" id='swher' name="swher" data-values="<?php echo $Array['swhere'];?>" <?php if($Array['isok']!=0) { ?>disabled="true"<?php } ?>/>
<input type="text" id='swhere' name="swhere" style="display:none" value="<?php echo $Array['swhere'];?>"<?php if($Array['isok']!=0) { ?>disabled="true"<?php } ?>/>
<script>
$("#swher").select({
  title: "请选择地点范围",
    items: [
    
{ title: '==新长校区==', value: '2'}
,{ title: '公共教学楼', value: '21'}
,{ title: '操场/体育馆', value: '22'}
,{ title: '食堂', value: '23'}
,{ title: '其他教学楼', value: '24'}
,{ title: '实验楼', value: '25'}
,{ title: '图书馆', value: '26'}
,{ title: '道路', value: '27'}
,{ title: '商业街/创业园', value: '28'}
,{ title: '其他', value: '29'}
,{ title: '==通榆校区==', value: '3'}
,{ title: '主楼', value: '31'}
,{ title: '图书馆', value: '32'}
,{ title: '操场/体育馆', value: '33'}
,{ title: '食堂', value: '34'}
,{ title: '其他教学楼', value: '35'}
,{ title: '道路', value: '36'}
,{ title: '其他', value: '37'}
,{ title: '==附近==', value: '4'}
,{ title: '育才路', value: '41'}
,{ title: '宝龙', value: '42'}
,{ title: '金鹰', value: '43'}
,{ title: '盐城工学院', value: '44'}
,{ title: '中南城', value: '45'}
,{ title: '其他', value: '46'}
,{ title: '==交通工具==', value: '5'}
,{ title: '公交', value: '51'}
,{ title: '出租车', value: '52'}
,{ title: '长途客车/火车', value: '53'}
,{ title: '公共自行车', value: '54'}
,{ title: '其他', value: '55'}
,{ title: '==其他==', value: '6'}

	
  ],   onChange: function(d) {
           $("#swhere").attr("value",d.values);
        }
});
</script>
    </div>
  </div>
  <div class="weui_cell"> <div class="weui_cell_hd"><label class="weui_label">详细地点</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <textarea class="weui_textarea" placeholder="请输入详细地点描述" rows="1" name="mwhere" <?php if($Array['isok']!=0) { ?>disabled="true"<?php } ?>><?php echo $Array['mwhere'];?></textarea>
      <div class="weui_textarea_counter"></div>
    </div>

  </div>	
</div>
<div class="weui_cell weui_cell_warn">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <div class="weui_uploader">
        <div class="weui_uploader_hd weui_cell">
          <div class="weui_cell_bd weui_cell_primary">图片上传</div>
          <div class="weui_cell_ft" id="uptext">1/1</div>
        </div>
        <div class="weui_uploader_bd">
          <ul class="weui_uploader_files">
            <li class="weui_uploader_file" id="upstep3" <?php if($Array['isok']==0) { ?>onclick="againup();"<?php } ?> style="" <?php if($Array['isok']!=0) { ?>disabled="true"<?php } ?>></li>
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
<div class="weui_cells_title">详细描述</div>
<div class="weui_cells weui_cells_form">
  <div class="weui_cell">
    <div class="weui_cell_bd weui_cell_primary">
      <textarea class="weui_textarea" placeholder="请输入详细描述" rows="3" name="content" <?php if($Array['isok']!=0) { ?>disabled="true"<?php } ?>><?php echo $Array['content'];?></textarea>
      <div class="weui_textarea_counter"></div>
    </div>
  </div>
</div>
<div class="weui_cells_title">联系方式</div>	
 <div class="weui_cells weui_cells_form">
  <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">QQ</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" type="number" name="qq" id="qq" value="<?php echo $Array['qq'];?>" <?php if($Array['isok']!=0) { ?>disabled="true"<?php } ?> placeholder="请输入QQ">
    </div>
  </div>
    <div class="weui_cell">
    <div class="weui_cell_hd"><label class="weui_label">手机号码</label></div>
    <div class="weui_cell_bd weui_cell_primary">
      <input class="weui_input" type="number" name="mobile" id="mobile" <?php if($Array['isok']!=0) { ?>disabled="true"<?php } ?> value="<?php echo $Array['mobile'];?>" placeholder="请输入手机号码">
    </div>
  </div>


</div>

</form>	
</div><?php if($Array['isok']==0) { ?>
<a href="javascript:void(0);" onclick="validate_form()" class="weui_btn weui_btn_primary">修改</a>
<a href="javascript:void(0);" onclick="deleteq()"  class="weui_btn weui_btn_warn">删除</a><?php } ?>
<?php if($Array['isok']==1) { ?>
<a href="javascript:void(0);" onclick="over()" class="weui_btn weui_btn_primary">完结</a>
<?php } ?>
<?php if($Array['isok']==2) { ?>
<a href="javascript:void(0);" onclick="deleteq()"  class="weui_btn weui_btn_warn">删除</a><?php } ?>
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
	<script language="javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/zepto.min.js"></script>
	<script language="javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/fx.js"></script>
	<script language="javascript" src="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/js/script.js"></script>

</body>
</html>