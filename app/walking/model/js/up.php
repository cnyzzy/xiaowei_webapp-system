<?php  
  session_start();
if(empty($_SESSION['openid'])||empty($_SESSION['nickname']))header("Location:http://weixin.yctu.edu.cn/login.php");  
date_default_timezone_set('PRC');
$j=date("H");
if($j>=22){
$timee=date("Y-m-d");
}else{$timee=date("Y-m-d",strtotime("-1 day"));}

?>  
<!DOCTYPE HTML>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1 maximum-scale=2, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-title" content="Add to Home">
		<meta name="format-detection" content="telephone=no">
		<meta http-equiv="x-rim-auto-match" content="none">
		<title>步数提交—小薇工作室</title>
		<link href="css/publi.css" rel="stylesheet" type="text/css">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<script type='text/javascript' src='js/jquery-2.0.3.min.js'></script>
<script src="../lib/mobileFix.mini.js?v=ad62f13"></script>
<script src="../lib/exif.js?v=dd609b9"></script>
<script src="../lrz.js?v=3d33fcf"></script>
		<!--[if lt IE 9]>
			<script src="js/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
		<style>
*{margin:0;padding:0;border:0; list-style:none}
body{background:white;}
.event{ width:442px;height:90px;  margin:5px; clear:both; border:1px white solid; }
.event .pic{ float:left;margin:5px; width:80px; height:80px; margin-right:20px;}
.event .title{float:left;margin:5px;line-height:16px;width:300px;}
.d_over{background:#deeaf8;border:1px solid #aaccee}
.d_out{background:white;border:1px solid  white;}
h2{ font-size:14px; font-weight:bolder; color:#444444;}
p{ font-size:12px; color:#666666; margin-top:4px; line-height:19px;}

</style>
<style>
.upload_box{width:100%; margin:1em auto;}
.upload_main{border-width:1px 1px 2px; border-style:solid; border-color:#ccc #ccc #ddd; background-color:#fbfbfb;}
.upload_choose{padding:1em;}
.upload_drag_area{display:inline-block; width:60%; padding:4em 0; margin-left:.5em; border:1px dashed #ddd; background:#fff url(http://rescdn.qqmail.com/zh_CN/htmledition/images/func/dragfile07bf38.gif) no-repeat 20px center; color:#999; text-align:center; vertical-align:middle;}
.upload_drag_hover{border-color:#069; box-shadow:inset 2px 2px 4px rgba(0, 0, 0, .5); color:#333;}
.upload_preview{border-top:1px solid #bbb; border-bottom:1px solid #bbb; background-color:#fff; overflow:hidden; _zoom:1;}
.upload_append_list{height:300px; padding:0 1em; float:left; position:relative;}
.upload_delete{margin-left:2em;}
.upload_image{max-height:250px; padding:5px;}
.upload_submit{padding-top:1em; padding-left:1em;}
.upload_submit_btn{display:none; height:32px; font-size:14px;}
.upload_loading{height:250px; background:url(http://www.zhangxinxu.com/study/image/loading.gif) no-repeat center;}
.upload_progress{display:none; padding:5px; border-radius:10px; color:#fff; background-color:rgba(0,0,0,.6); position:absolute; left:25px; top:45px;}
</style>
	</head>

	<body>
		<!-- ====================================loading -->
		<section id="loading"></section>
		<!-- ====================================页面开始 -->
		<!--登录-->
		<header class="acc_head">
			<div class="clearfix">
				<h1 class="tc">步数提交</h1>

			</div>
			<div class="clearfix">
			<div class="event" onmouseover="this.className='d_over event'" onmouseout="this.className='d_out event'">      
<div class="pic"><img src="<?php echo $_SESSION['imgurl']?>" height="64px" width="64px" border="0" /></div>     
<div class="title">
	<p>亲爱的<?php echo $_SESSION['nickname']?>,感谢参加本次活动</p>
</div>
</div>



			</div>
		</header>
		<section class="acc_apply">
			<ul>
				<li class="clearfix">
					<label class="tl">今日步数：</label>
					<input autocomplete="off" placeholder="请输入今天的步数" class="" type="text" />
				</li>
				
				<li class="clearfix" >
					<label class="tl acc_four fl">图片截图：</label>
				</li>
			<li style="border-top: 0; margin-bottom: 60px;">
					<div class="acc_img">
						<p class="tc" id="ppp" >参考样例</p>
						<div id="sss">
							<img class="acc_imgin" src="img/acc_img.png" id="img0">
						</div>

						<div style="margin:10px auto; border:solid 1px #ddd; overflow:hidden; ">

</div>
<div id="main">
    <div id="body" class="light">
    	<div id="content" class="show">
            <div class="demo">
            	<form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="upload_box">
                        <div class="upload_main">
                            <div class="upload_choose">
                                <input id="fileImage" type="file" size="30" name="fileselect[]" multiple class="ph08" />
                                
                            </div>
                            <div id="preview" class="upload_preview"></div>
                        </div>
                        <div class="upload_submit">
                            <button type="button" id="fileSubmit" class="upload_submit_btn">确认上传图片</button>
                        </div>
                        <div id="uploadInf" class="upload_inf"></div>
                    </div>
                </form>
            </div>
        </div>       
    </div>
</div>

<script src="http://libs.baidu.com/jquery/1.4.4/jquery.js"></script>
<script src="./js/zxxFile.js"></script>
<script>
var params = {
	fileInput: $("#fileImage").get(0),
	dragDrop: $("#fileDragArea").get(0),
	upButton: $("#fileSubmit").get(0),
	url: $("#uploadForm").attr("action"),
	filter: function(files) {
		var arrFiles = [];
		for (var i = 0, file; file = files[i]; i++) {
			
			if (file.type.indexOf("image") == 0) {
				   lrz(this.files[0], {width: 400}, function (results) {
            console.log(results);
				if (results.size >= 51200) {
					
					alert('您这张"'+ file.name +'"图片大小过大');	
				} else {
					arrFiles.push(results);	
				   }}			
			} else {
				alert('文件"' + file.name + '"不是图片。');	
			   }
			   
		}
		return arrFiles;
	},
	onSelect: function(files) {
		var html = '', i = 0;
		$("#preview").html('<div class="upload_loading"></div>');
		var funAppendImage = function() {
			file = files[i];
			if (file) {
				var reader = new FileReader()
				reader.onload = function(e) {
					html = html + '<div id="uploadList_'+ i +'" class="upload_append_list"><p><strong>' + file.name + '</strong>'+ 
						'<a href="javascript:" class="upload_delete" title="删除" data-index="'+ i +'">删除</a><br />' +
						'<img id="uploadImage_' + i + '" src="' + e.target.result + '" class="upload_image" /></p>'+ 
						'<span id="uploadProgress_' + i + '" class="upload_progress"></span>' +
					'</div>';
					
					i++;
					funAppendImage();
				}
				reader.readAsDataURL(file);
			} else {
				$("#preview").html(html);
				if (html) {
					//删除方法
					$(".upload_delete").click(function() {
						ZXXFILE.funDeleteFile(files[parseInt($(this).attr("data-index"))]);
						return false;	
					});
					//提交按钮显示
					$("#fileSubmit").show();	
				} else {
					//提交按钮隐藏
					$("#fileSubmit").hide();	
				}
			}
		};
		funAppendImage();		
	},
	onDelete: function(file) {
		$("#uploadList_" + file.index).fadeOut();
	},
	onDragOver: function() {
		$(this).addClass("upload_drag_hover");
	},
	onDragLeave: function() {
		$(this).removeClass("upload_drag_hover");
	},
	onProgress: function(file, loaded, total) {
		var eleProgress = $("#uploadProgress_" + file.index), percent = (loaded / total * 100).toFixed(2) + '%';
		eleProgress.show().html(percent);
	},
	onSuccess: function(file, response) {
		$("#uploadInf").append("<p>上传成功</p>");
		$("#img0").attr("src",response);
		$("#ppp").html("上传预览"); 
	},
	onFailure: function(file) {
		$("#uploadInf").append("<p>图片" + file.name + "上传失败！</p>");	
		$("#uploadImage_" + file.index).css("opacity", 0.2);
	},
	onComplete: function() {
		//提交按钮隐藏
		$("#fileSubmit").hide();
		//file控件value置空
		$("#fileImage").val("");
		$("#uploadInf").append("<p>当前图片上传完毕，可再次上传，将会覆盖当天数据。</p>");
	}
};
ZXXFILE = $.extend(ZXXFILE, params);
ZXXFILE.init();
</script>

						<p class="ph09 " id="iii">注：当日运动数据提交时间为晚十点后。当前提交的日期为：<?php echo $timee?>。支持jpg、jpeg、bmp、gif格式照片。大小不超过5M</p>
					</div>
				</li>
			</ul>
		</section>
		<footer class="acc_foot clearfix">
			<a href="#" class="fl tc acc_cancel">取消</a>
			<a onclick="uploadphoto.click()" class="fl tc acc_sure">提交</a>
		</footer>
		<!--弹出层-->
		<article id="tip">
			<div class="pack">
				<h1 class="tc">提交成功</h1>
				<p class="tc"></p>
				<a href="#">确定</a>
			</div>
		</article>
		<!-- 网站要用到的一些类库 -->
		<script src="js/jquery1.8.3.min.js"></script>
		<script src="js/script.js"></script>

		<script type="text/javascript">
			$(function() {
var progress = $(".progress"); 
   var progress_bar = $(".progress-bar");
   var percent = $('.percent');
				$(window).on("load", function() {
						$("#loading").fadeOut();
					})
					// ========================================浮层控制
				$("#tip .pack a").on("click", function() {
					$("#tip").fadeOut()
					$("#tip .pack p").html("")
					return false;
				})

				function alerths(str) {
					$("#tip").fadeIn()
					$("#tip .pack p").html(str)
					return false;
				}
				  
				$(".acc_sure").on("click", function() {
  	
					alerths("请等待审核！")
					return false;
				 });
				
							$("#file0").click(function(e) {
								$("#img0").attr("src", objUrl);
								
							});
						} else {
							//IE下，使用滤镜
							this.select();
							var imgSrc = document.selection.createRange().text;
							var localImagId = document.getElementById("sss");
							//图片异常的捕捉，防止用户修改后缀来伪造图片
							try {
								preload.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = data;
							} catch (e) {
								this._error("filter error");
								return;
							}
							this.img.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src=\"" + data + "\")";
						}
					}
				});
				//建立一個可存取到該file的url
				function getObjectURL(file) {
					var url = null;
					if (window.createObjectURL != undefined) { // basic
						url = window.createObjectURL(file);
					} else if (window.URL != undefined) { // mozilla(firefox)
						url = window.URL.createObjectURL(file);
					} else if (window.webkitURL != undefined) { // webkit or chrome
						url = window.webkitURL.createObjectURL(file);
					}
					return url;
				}
			})
		</script>
	</body>

