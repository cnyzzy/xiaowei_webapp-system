<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="viewport" content="width=device-width, initial-scale=0.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/lib/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/css/jquery-weui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
       <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/js/jquery-weui.js"></script>
		  <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/fastclick.js"></script>
		  <script src="http://ip.ws.126.net/ipquery"type="text/ecmascript"></script>
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<style>

</style>
<script>
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

	<?php if($type=='3') { ?> if (validate_required(stype,"身份未选择")==false)
    {stype.focus();return false}<?php } ?>

	 if (validate_required(content,"祝福为空")==false)
    {content.focus();return false}
	
  }
   if (lo&&lc)
   {document.getElementById("where").value = lo+lc};
  		$.ajax({
		   type: "POST",
		   url: "<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/add",
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
                window.location.href ="<?php echo $arrInfo['url'];?>/z60love/wait/"+data.id;
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
<title>祝福盐师</title>
</head>
		<style>
	.titlebar.reverse {
    background-color: #df4d26;
    border-color: #000;
	
}
.weui-btn_default2 {
    color: #FFF;
    background-color: #f8f8f8;
    BORDER-COLOR: #fff;
    border-radius: 25px;
    border-style: solid;
    border-width: 1px;
    background-color: rgba(208, 11, 11, 0.4);
}
.weui-btn_default3 {
    color: #FFF;
    background-color: #f8f8f8;
    BORDER-COLOR: #fff;
    border-radius: 25px;
    border-style: solid;
    border-width: 1px;
    background-color: rgba(0, 15, 37, 0.4);
}
.weui-btn:after {
    background-color: rgba(0,0,0,0.08);
}
.weui-media-box__info__meta {
    float: right;
    padding-right: 1em;
}
.weui-btn {
    width: 90%;
}
</style>
<body>



	        <header>
		
         <div class="titlebar reverse">
             <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>新建祝福</h1>
            </div>
        </header>
	
     <article style="bottom: 0;">
			<form id="upform">
			  <div class="weui-panel weui-panel_access">
        <div class="weui-panel__hd">当前身份</div>
        <div class="weui-panel__bd">
          <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
            <div class="weui-media-box__hd">
              <img class="weui-media-box__thumb" src="<?php echo $_SESSION['wx']['img'];?>" alt="">
            </div>
            <div class="weui-media-box__bd">
              <h4 class="weui-media-box__title"><?php echo $_SESSION['zid']['name'];?></h4>
              <p class="weui-media-box__desc"><?php if($type=='1') { ?>学生<?php } ?><?php if($type=='2') { ?>教职工<?php } ?><?php if($type=='3') { ?>访客<?php } ?><?php if($type=='1') { ?>(学号:<?php echo $_SESSION['zid']['number'];?>)<?php } ?><?php if($type=='2') { ?>(工号:<?php echo $_SESSION['zid']['number'];?>)<?php } ?><?php if($type=='3') { ?><BR>您可以选择具体身份:校友/家长/职工/访客<?php } ?></p>
            </div>
          </a>

        </div><ul class="weui-media-box__info">
         
              <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">小薇平台提供实名认证</li>
            </ul>

      </div><?php if($type=='3') { ?>
	  			  <div class="weui-cells__title">身份选择</div>

    <div class="weui-cells weui-cells_form">
      <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">访客类型</label></div>
        <div class="weui-cell__bd">
		<input  type="text" id='stype' name="stype" style="display:none">
          <input class="weui-input" type="text" id='styp' name="styp"  value='校友'>
        </div>
      </div>
	

<?php } ?>
	<input  type="text" id='where' name="where" style="display:none">
<script>
$("#styp").select({
  title: "选择类型",
  items: [
    {
      title: "访客",
      value: "3",
    },
    {
      title: "校友",
      value: "4",
    },
    {
      title: "职工",
      value: "5",
    },
    {
      title: "家长",
      value: "6",
    }
  ],
   onChange: function(d) {
          $("#stype").attr("value",d.values);
        }
  
});
</script>
       </div>

 <div class="weui-cells__title">祝福</div>
    <div class="weui-cells weui-cells_form">
      <div class="weui-cell">
        <div class="weui-cell__bd">
          <textarea class="weui-textarea" placeholder="请输入祝福" rows="6" name="content"></textarea>        </div>
      </div>
    </div>
    <label for="weuiAgree" class="weui-agree">
      <input id="weuiAgree" type="checkbox" class="weui-agree__checkbox" checked="checked" readonly="readonly" >  </input>
      <span class="weui-agree__text">
        我承诺不提交违规内容
      </span>
    </label>

</form>	

<a href="javascript:void(0);" onclick="validate_form()" class="weui-btn  weui-btn_primary">提交</a>
     </article>
	
	


	
<?php if(isset($arrInfo['tjcode60'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode60'];?></div><?php } ?> 
</body>
</html>