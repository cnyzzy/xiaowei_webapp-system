<?php defined('ZRoot') or die('Access Denied.'); ?>﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $Array['title'];?></title>
    <style type="text/css">
        body{
            margin: 0;
            padding: 0;
            font-size: 14px;
            background-color: #F6F6F6;
            font-weight: normal;
            font-family: "Microsoft YaHei";
            color: #333333;
        }
        .runNum{
            margin: 0 auto;
            padding: 0;
            overflow: hidden;
            height: 50px;
            line-height: 50px;
            border-top: #CCCCCC solid 1px;
            border-bottom: #CCCCCC solid 1px;
            text-align: center;
            font-weight: bold;
            position: relative;
        }
        .runNum>li{
            list-style: none;
            width: 40px;
            float: left;
            position: absolute;
        }
    </style>


<style type="text/css">
*{margin:0;padding:0;list-style-type:none;}
a,img{border:0;}
#testButton { color:rgb(255, 255, 255);font-size:21px;padding-top:16px;padding-bottom:16px;padding-left:41px;padding-right:41px;border-width:4px;border-color:rgb(167, 145, 227);border-style:solid;border-radius:23px;background-color:rgb(60, 96, 128);}#testButton:hover{color:#ffffff;background-color:#78c300;border-color:#c5e591;}
.demo{width:300px;margin:40px auto;}
.demo h2{font-size:18px;height:50px;text-align:center;}
</style>
</head>
<body>
<h2 style="text-align: center;font-size:54px;"><?php echo $Array['title'];?></h2>
<div style="margin: 20px auto;width:160PX;font-size:44px;">
   <ul class="runNum" id="test"></ul>
</div><h2 style="text-align: center;">现场观众扫码参与抽奖</h2>
<div class="demo">
	<div id="qrcodeTable"></div> 
	<p style="text-align: center;">小薇工作室提供技术支持</p>
</div>
	<div style="text-align:center;overflow:hidden;"><button onclick="window.location='<?php echo $arrInfo['url'];?>/admin/cjhd/cj/<?php echo $id;?>'"  id="testButton">开始抽奖</button></div>

    <script src="<?php echo $arrInfo['url'];?>/system/admin/model/assets/js/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/cjhd/admin/js/jquery.qrcode.js"></script> 
<script type="text/javascript" src="<?php echo $arrInfo['url'];?>/app/cjhd/admin/js/qrcode.js"></script> 
<script type="text/javascript">
$(document).ready(function(){

	$("#qrcodeTable").qrcode({
		render	: "table",
		text	: "<?php echo $arrInfo['url'];?>/cjhd/join/<?php echo $id;?>",
		width:"300",
		height:"300"
	});	
	
});
</script>

<script type="text/javascript">
    (function ($) {
    	/*jQuery对象添加  runNum  方法*/
        $.fn.extend({
        	/*
        		*	滚动数字
				*	@ val 值，	params 参数对象
				*	params{addMin(随机最小值),addMax(随机最大值),interval(动画间隔),speed(动画滚动速度),width(列宽),height(行高)}
        	*/
            runNum:function (val,params) {
                /*初始化动画参数*/
                var valString = val || '9999'
                var par= params || {};
                var runNumJson={
                    el:$(this),
                    value:valString,
                    valueStr:valString.toString(10),
                    width:par.width || 40,
                    height:par.height || 50,
                    addMin:par.addMin || 10000,
                    addMax:par.addMax || 99999,
                    interval:par.interval || 3000,
                    speed:par.speed || 1000,
                    width:par.width || 40,
                    length:valString.toString(10).length
                };
                $._runNum._list(runNumJson.el,runNumJson);
                $._runNum._interval(runNumJson.el.children("li"),runNumJson);
            }
        });
        /*jQuery对象添加  _runNum  属性*/
        $._runNum={
            /*初始化数字列表*/
            _list:function (el,json) {
                var str='';
                for(var i=0; i<json.length;i++){
                    var w=json.width*i;
                    var t=json.height*parseInt(json.valueStr[i]);
                    var h=json.height*10;
                    str +='<li style="width:'+json.width+'px;left:'+w+'px;top: '+-t+'px;height:'+h+'px;">';
                    for(var j=0;j<10;j++){
                        str+='<div style="height:'+json.height+'px;line-height:'+json.height+'px;">'+j+'</div>';
                    }
                    str+='</li>';
                }
                el.html(str);
            },
            /*生成随即数*/
            _random:function (json) {
 var num=9999;
				            $.ajax({
                url: "<?php echo $arrInfo['url'];?>/admin/cjhd/num/<?php echo $id;?>",
                dataType: 'json',
                type: 'POST',
				data:"",
				async:false,
				timeout : 5000,
                success: function (data) {

    if(data.no==1){
                        console.log(data);
 num='0000';


                        }else{

num=data.num;

	}
                 
                },
                error : function(e) {
	num='1000';

 
                }
            });
              return num;
			
            },
            /*执行动画效果*/
            _animate:function (el,value,json) {
                for(var x=0;x<json.length;x++){
                    var topPx=value[x]*json.height;
                    el.eq(x).animate({top:-topPx+'px'},json.speed);
                }
            },
            /*定期刷新动画列表*/
            _interval:function (el,json) {
                var val=json.value;
                setInterval(function () {
                    val= $._runNum._random(json);
		  console.log(val);
                    $._runNum._animate(el,val.toString(10),json);
                },json.interval);
            }
        }
    })(jQuery);
</script>
<script type="text/javascript">
	$("#test").runNum(0);
</script>
</body>
</html>