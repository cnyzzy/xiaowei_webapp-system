<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>社团报名-<?php echo $arrInfo['name'];?></title>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/fonts/iconfont.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/font.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/jquery-weui.min.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/mui.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/home/model/css/animate.css"/>
        <link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/walking/model/css/pages/xunjia_detail.css"/>
		    <script src="<?php echo $arrInfo['url'];?>/app/home/model/lib/jquery-2.1.4.js"></script>
        <script src="<?php echo $arrInfo['url'];?>/app/home/model/js/jquery-weui.js"></script>	
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
        })(document, window);
		 function wait(form) {
				$.showLoading("正在进入...");
				setTimeout(function() {
        $.hideLoading();
			return true;
        }, 1000);
	
}
	function isEmpty(obj) {
    // 本身为空直接返回true
    if (obj == null) return true;

    // 然后可以根据长度判断，在低版本的ie浏览器中无法这样判断。
    if (obj.length > 0)    return false;
    if (obj.length === 0)  return true;

    //最后通过属性长度判断。
    for (var key in obj) {
        if (hasOwnProperty.call(obj, key)) return false;
    }

    return true;
}						 
					
							$(document).ready(function() {
							
	   	    $("#xq").select({
        title: "选择校区",
       items: [
    {
      title: "新长校区",
      value: "1",
    },
    {
      title: "通榆校区",
      value: "2",
    },
  ],

        onChange: function(d) {
		 $("#xq").attr("value",d.values);
			xymc(d.values);
        },
        onClose: function() {
           
        },
        onOpen: function(d) {
if(!(d.config.items[0]['title']))$.toast("未选上一级选项", "cancel");        },
      });	
	  
		   	    $("#stxy").select({
        title: "选择社团所属学院",
       items: [ {
     
    },
	   ],

        onChange: function(d) {
		 $("#stxy").attr("value",d.values);
			xymc(d.values);
        },
        onClose: function() {
           
        },
        onOpen: function(d) { console.log(d);
if(!(d.config.items[0]['title']))
{$.toast("未选上一级选项", "cancel");
$("#stxy").select("close");
}
        },
      });  
  
 <?php if($isstop==1) { ?>		
$.modal({
  title: "提示",
  text: "当前绑定的用户身份不能参与本活动<br>您可以选择重新绑定或退出活动",
  buttons: [
    { text: "取消", className: "default",
	onClick: function(){ 
	  $.showLoading("即将跳回...","cancel");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>";
        }, 800)	
	} },
    { text: "重新绑定", 
	onClick: function(){
		  $.showLoading("即将跳转...","cancel");
			 setTimeout(function() {
            window.location.href="<?php echo $arrInfo['url'];?>/home/modify";
        }, 800)	
	} },
  ]
});	<?php } ?> 

		});
	 function xymc(p){
	 	$.showLoading("加载数据...");
            $.ajax({
                url: '<?php echo $arrInfo['url'];?>/<?php echo $AppName;?>/do/xy',
                dataType: 'json',
                type: 'POST',
				data:"&post="+p,
				timeout : 5000,
                success: function (data) {
								$.hideLoading();
    if(data.type!='ok'){
 console.log(data);
 $.toast(data.msg,"cancel");
                        }else if(data.type=='ok'){

					var tArr = new Array();              
                       for (var i = 0; i < data.value.length; i++) {
					    var jsonArr = new Array(); 
					   jsonArr['value'] = data.value[i];
                      jsonArr['title']   = data.name[i];
					  tArr[i]=new Array();
						tArr[i]=jsonArr; 
 }
						  $("#"+id).select("update", { items: tArr })
                       
	}

                 
                },
                error : function(e) {
                   $.toast("网络故障","forbidden"); 

                }
            });
			}	
         </script>
		
    </head>
    <body>
        <header>
		
         <div class="titlebar reverse">
             <a href="javascript:history.go(-1);">
                    <i class="iconfont">&#xe668;</i>
                </a>
                <h1>社团招新报名</h1>
            </div>
        </header>
        <article style="bottom: 0;">
            <ul class="xunjia-tab clearfix">
 <li class="green">报名社团</li> 
               		
            </ul>           <ul class="xunjia-box">
			<div class="weui_cells_title">社团</div>
	<div id="sr" class="weui_cells weui_cells_form">
	      <div class="weui_cell">
        <div class="weui_cell_hd"><label for="name" class="weui_label">社团所属校区</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" id="xq" type="text" value="">
        </div>
      </div>
      <div class="weui_cell">
        <div class="weui_cell_hd"><label for="name" class="weui_label">社团所属学院</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" id="stxy" type="text" value="">
        </div>
      </div>
      <div class="weui_cell">
        <div class="weui_cell_hd"><label for="name" class="weui_label">社团名称</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" id="stmc" type="text" value="">
        </div>
      </div>
	  <BR>
	  <div class="weui_cells_title">报名信息</div>
	     <div class="weui_cell">
        <div class="weui_cell_hd"><label for="name" class="weui_label">姓名</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" id="xm" type="text" value="<?php echo $_SESSION['zid']['name'];?>" disabled="true">
        </div>
      </div>
	  	     <div class="weui_cell">
        <div class="weui_cell_hd"><label for="name" class="weui_label">学院</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" id="xy" type="text" value="<?php if(!empty($info['xy'])) { ?><?php echo $info['xy'];?><?php } ?>"<?php if(!empty($info['xy'])) { ?> disabled="true"<?php } ?>>
        </div>
      </div>	     <div class="weui_cell">
        <div class="weui_cell_hd"><label for="name" class="weui_label">班级</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" id="bj" type="text" value="<?php if(!empty($info['xzb'])) { ?><?php echo $info['xzb'];?><?php } ?>"<?php if(!empty($info['xzb'])) { ?> disabled="true"<?php } ?>>
        </div>
      </div> 
	    <div class="weui_cell">
        <div class="weui_cell_hd"><label for="name" class="weui_label">学号</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" id="xh" type="text" value="<?php if(!empty($number)) { ?><?php echo $number;?><?php } ?>"<?php if(!empty($number)) { ?> disabled="true"<?php } ?>>
        </div>
      </div> 
	  	    <div class="weui_cell">
        <div class="weui_cell_hd"><label for="name" class="weui_label">手机号</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" id="mobile" type="text" value="<?php if(!empty($mobile)) { ?><?php echo $mobile;?><?php } ?>"<?php if(!empty($mobile)) { ?> disabled="true"<?php } ?>>
        </div>
      </div> 
       </div>
	   <BR>
<a href="javascript:;" class="weui_btn weui_btn_primary">报名</a>
   </ul>
        </article>
		<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
		
    </body>        <footer>
           
        </footer>
		
</html>