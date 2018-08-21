<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>添加-拾集</title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/lib/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/60app/model/css/jquery-weui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/pages/notice.css"/>

        <script>(function (doc, win) {
          var docEl = doc.documentElement,
            resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
            recalc = function () {
              var clientWidth = docEl.clientWidth;
              if (!clientWidth) return;
              docEl.style.fontSize = 20 * (clientWidth / 320) + 'px';
            };

          if (!doc.addEventListener) return;
          win.addEventListener(resizeEvt, recalc, false);
          doc.addEventListener('DOMContentLoaded', recalc, false);
        })(document, window);</script>
		<style>
	.titlebar.reverse {
   /* background-color: #df4d26;*/
    border-color: #000;
}

header, footer {

    z-index: 999;
}
i, span {
    display: inline-block;
    vertical-align: initial;
}

@font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: url(<?php echo $arrInfo['url'];?>/app/<?php echo $AppName;?>/model/css/flUhRq6tzZclQEJ-Vdg-IuiaDsNc.woff2) format('woff2');
}
.weui-actionsheet__title .weui-actionsheet__title-text {
    color: #888;
}
.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 34px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -webkit-font-feature-settings: 'liga';
  -webkit-font-smoothing: antialiased;
}
.weui-btn_primary {
    background-color: #3c6080;
	width:90%;
}
</style>
    </head>
    <body ontouchstart>
        <header>
            <div class="titlebar reverse">
			 <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>添加</h1>
            </div>

         
        </header>
<article style="bottom: 0;">
     <div class="weui-cells__title">添加</div>
	 <div class="weui-cells weui-cells_form">
  <div class="weui-cell">
    <div class="weui-cell__hd"><label class="weui-label">来源</label></div>
    <div class="weui-cell__bd">
      <input id="fromdata" class="weui-input" type="text" pattern="" placeholder="请输入来源 不必加书名号">
    </div>
  </div>
	 </div>
    <div class="weui-cells__title">文字</div>
    <div class="weui-cells weui-cells_form">
      <div class="weui-cell">
        <div class="weui-cell__bd">
          <textarea id="contentdata" class="weui-textarea" maxlength="200" placeholder="请输入文本 尽量不要超过80字" rows="1"></textarea>
          <div class="weui-textarea-counter"><span id='anum'>0</span>/200
      </div>
    </div></div>
    </div>   <div class="weui-cells weui-cells_form">
	<div class="weui-cell weui-cell_select weui-cell_select-after">
        <div class="weui-cell__hd">
          <label for="" class="weui-label">类型</label>
        </div>
        <div class="weui-cell__bd">
          <select id="typedata" class="weui-select" name="select2">
            <option value="a">动漫</option>
            <option value="b">影视</option>
            <option value="c">游戏</option>
			<option value="d">书籍</option>
            <option value="e">原创</option>
            <option value="f">网络</option>
			 <option value="g">其他</option>
          </select>
        </div>
      </div>  </div>
	  <br>
	    <a href="javascript:;" id="loginA" onclick="add()" class="weui-btn weui-btn_primary">提交</a>

    </div>
    <div class="weui-cells__tips">提示:提交内容需要审核才能上线<br>您可以在"我的提交"中查看审核情况<br></div> </article>
		        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/60app/model/js/jquery-weui.js"></script>
		  <script src="<?php echo $arrInfo['url'];?>/app/60app/model/lib/fastclick.js"></script>
		  <script>
							
	<?php if($isstop==1) { ?>		 $(document).ready(function() {
        $.modal({
  title: "提示",
  text: "您未绑定实名身份<br>无法提交内容<br>您可以选择重新绑定或退出此页面",
  buttons: [
    { text: "退出", className: "default",
	onClick: function(){ 
	  $.showLoading("即将退出...","cancel");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>";
        }, 800)	
	} },
    { text: "重新绑定", 
	onClick: function(){
		  $.showLoading("即将跳转...","cancel");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>/home/bdgl";
        }, 800)	
	} },
  ]
});	
});	
<?php } ?>  
		  
		  
$(function () {
    // 为每一个textarea绑定事件使其高度自适应
    $.each($("textarea"), function(i, n){
        autoTextarea($(n)[0]);
    });
})

var autoTextarea = function (elem, extra, maxHeight) {
    extra = extra || 0;
    var isFirefox = !!document.getBoxObjectFor || 'mozInnerScreenX' in window,
    isOpera = !!window.opera && !!window.opera.toString().indexOf('Opera'),
        addEvent = function (type, callback) {
            elem.addEventListener ?
                elem.addEventListener(type, callback, false) :
                elem.attachEvent('on' + type, callback);
        },
        getStyle = elem.currentStyle ? 
        function (name) {
            var val = elem.currentStyle[name];
            if (name === 'height' && val.search(/px/i) !== 1) {
                var rect = elem.getBoundingClientRect();
                return rect.bottom - rect.top -
                       parseFloat(getStyle('paddingTop')) -
                       parseFloat(getStyle('paddingBottom')) + 'px';       
            };
            return val;
        } : function (name) {
            return getComputedStyle(elem, null)[name];
        },
    minHeight = parseFloat(getStyle('height'));
    elem.style.resize = 'both';//如果不希望使用者可以自由的伸展textarea的高宽可以设置其他值

    var change = function () {
        var scrollTop, height,
            padding = 0,
            style = elem.style;

        if (elem._length === elem.value.length) return;
        elem._length = elem.value.length;

        if (!isFirefox && !isOpera) {
            padding = parseInt(getStyle('paddingTop')) + parseInt(getStyle('paddingBottom'));
        };
        scrollTop = document.body.scrollTop || document.documentElement.scrollTop;

        elem.style.height = minHeight + 'px';
        if (elem.scrollHeight > minHeight) {
            if (maxHeight && elem.scrollHeight > maxHeight) {
                height = maxHeight - padding;
                style.overflowY = 'auto';
            } else {
                height = elem.scrollHeight - padding;
                style.overflowY = 'hidden';
            };
            style.height = height + extra + 'px';
            scrollTop += parseInt(style.height) - elem.currHeight;
            document.body.scrollTop = scrollTop;
            document.documentElement.scrollTop = scrollTop;
            elem.currHeight = parseInt(style.height);
        };
    };

    addEvent('propertychange', change);
    addEvent('input', change);
    addEvent('focus', change);
    change();
};
</script>
		  <script>
	
  $(function() {
    FastClick.attach(document.body);
  });
    
 function add() {
	       if($("#fromdata").val()==""){
               $.alert("来源为空", "警告", function() {
$("#fromdata").focus();

});                    
    return;          
         } 
		   if($("#typedata").val()==""){
               $.alert("类型为空", "警告", function() {
$("#typedata").focus();

});                    
    return;          
         } 
		
		   if($("#contentdata").val()==""){
               $.alert("文字为空", "警告", function() {
$("#contentdata").focus();

});                    
    return;          
         } 
		    if($("#contentdata").val().length>200){
               $.alert("文字过多", "警告", function() {
$("#contentdata").focus();

});                    
    return;          
         } 
		     if($("#fromdata").val().length>24){
               $.alert("来源文字过多", "警告", function() {
$("#fromdata").focus();

});                    
    return;          
         }
	
				$.showLoading("正在提交");
				 	$.ajax({
		type:"POST",
		url:"<?php echo $arrInfo['url'];?>/shiji/do/add",
		data:"&from="+$("#fromdata").val()+"&content="+$("#contentdata").val()+"&typedata="+$("#typedata").val(),
		dataType: "json", 
		async:true,		
		complete:function(XMLHttpRequest, textStatus){

		},
		success:function(result){
   	$.hideLoading();
	if(result.type!='ok'){

	$.toast(result.msg, "forbidden");
			
	}
	if(result.type=='ok'){
	$.toast(result.msg);

				 setTimeout(function() {

 window.location.href="<?php echo $arrInfo['url'];?>/shiji/my";
		  
        }, 1000)
	}
		},
		error:function(result){
 $.hideLoading();
	$.toast("网络故障", "forbidden");
				 setTimeout(function() {
        
        }, 1000)
	}

		
	});
		
		
	}
</script>
<script>
$(document).ready(function(){

   $(".weui-textarea").keyup(function(){
         var length = 100;
         var content_len = $(".weui-textarea").val().length;
         var in_len = length-content_len;
        
         // 当用户输入的字数大于制定的数时，让提交按钮失效
         // 小于制定的字数，就可以提交
         if(in_len >=0){
            $("#anum").html(content_len);
            $("#btn").attr("disabled",false);
            // 可以继续执行其他操作
         }else{
          $("#anum").html("<font color='red'>"+content_len+"</font>");
            $("#btn").attr("disabled",true);
            return false;
         }
        
    });
   });
 
</script>
       <?php include template('footer'); ?>