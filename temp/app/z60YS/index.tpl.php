<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html>
<html lang="zh-CN">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>盐师春秋</title>

<link rel="stylesheet" href="<?php echo $arrInfo['url'];?>/app/Z60ys/model/css/style.css">
<script src="<?php echo $arrInfo['url'];?>/app/Z60ys/model/js/jquery.min.js"></script>
<script src="<?php echo $arrInfo['url'];?>/app/Z60ys/model/js/supersized.3.2.7.min.js"></script>
<script src="<?php echo $arrInfo['url'];?>/app/Z60ys/model/js/supersized-init.js"></script>
<body>
<STYLE>
body .mainmenu {
    width: 100%;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}
a{
text-decoration: none;
}
ol, ul {
    list-style: none outside none;
    margin: 0;
    padding: 0;
}
body .mainmenu li {
    background-color: rgba(0, 0, 0, 0.3);
    border: 0px solid rgba(0, 0, 0, 0.15);
}
body .mainmenu li {
    float: left;
    margin-left: 6.6%;
    margin-top: 5%;
    width: 40%;
    border: 1px solid rgba(255, 255, 255, 0.4);
    #background-color: rgba(255, 255, 255, 0.3);
    border-radius: 7px;
}
body .mainmenu li a img {
    width: 42%;
}
img {
    border: 0;
}
body .mainmenu li a span {
color:#FFF;
    clear: both;
    display: block;
    padding: 0px 10px;
    line-height: 30px;
    font-size: 16px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    text-align: center;
}
.weui-footer {
    color: #999;
	line-height:0.9;
}
.weui-footer, .weui-grid__label {
    text-align: center;
    font-size: 14px;
}
.weui-footer_fixed-bottom {
    position: fixed;
    bottom: .52em;
    left: 0;
    right: 0;
}

.weui-footer__links {
    font-size: 0;
}
.weui-footer__text {
    padding: 0 .34em;
    font-size: 12px;
}
.weui-footer a {
    color: #586c94;
}

.weui-footer__link {
    display: inline-block;
    vertical-align: top;
    margin: 0 .62em;
    position: relative;
    font-size: 14px;
}


.weui-footer {
    margin: 25px 0 10px 0;
    line-height: 1.6;
    bottom: 0;
    left: 0;
    position: fixed;
    right: 0;
}
</STYLE>
<div class="login-container">
	<h1>盐师春秋</h1>
	
	<div class="connect">
		<p>1958-2018</p>
	</div>
	
<ul class="mainmenu">
	<li><a href="<?php echo $arrInfo['url'];?>/Z60ys/read/1"><p><img src="<?php echo $arrInfo['url'];?>/app/Z60ys/model/images/1.png"><span>盐师简介</span></p></a></li>
	<li><a href="<?php echo $arrInfo['url'];?>/Z60ys/read/2"><p><img src="<?php echo $arrInfo['url'];?>/app/Z60ys/model/images/2.png"><span>历史回眸</span></p></a></li>
		<li><a href="<?php echo $arrInfo['url'];?>/Z60ys/peo/6"><p><img src="<?php echo $arrInfo['url'];?>/app/Z60ys/model/images/6.png"><span>校友风采</span></p></a></li>  
	<li><a href="<?php echo $arrInfo['url'];?>/Z60ys/img/3"><p><img src="<?php echo $arrInfo['url'];?>/app/Z60ys/model/images/3.png"><span>校园风光</span></p></a></li>
	<li><a href="<?php echo $arrInfo['url'];?>/Z60ys/img/4"><p><img src="<?php echo $arrInfo['url'];?>/app/Z60ys/model/images/4.png"><span>毕业存照</span></p></a></li>
	<li><a href="<?php echo $arrInfo['url'];?>/Z60ys/video/5"><p><img src="<?php echo $arrInfo['url'];?>/app/Z60ys/model/images/5.png"><span>盐师影像</span></p></a></li>
</ul>

</div>
     <div class="weui-footer">
	         <p class="weui-footer__links"><br><br>
          </p>
        <p class="weui-footer__links">
          <a href="http://weixin.yctu.edu.cn" class="weui-footer__link">小薇平台</a> |
		          <a href="http://www.yctu.edu.cn" class="weui-footer__link">学校官网</a> 
        </p>
        <p class="weui-footer__text">Copyright © 2018 盐城师范学院小薇工作室</p>
		        <p class="weui-footer__text">By ZY</p>

      </div>

<script>
window.onload = function(){
	$(".connect p").eq(0).animate({"left":"0%"}, 600);
	$(".connect p").eq(1).animate({"left":"0%"}, 400);
};
function preloadimages(arr){
    var newimages=[]
    var arr=(typeof arr!="object")? [arr] : arr  //确保参数总是数组
    for (var i=0; i<arr.length; i++){
        newimages[i]=new Image()
        newimages[i].src=arr[i]
    }
}
 preloadimages([
 '<?php echo $arrInfo['url'];?>/app/z60ys/model/img/1.jpg', 
 '<?php echo $arrInfo['url'];?>/app/z60ys/model/img/2.jpg', 
 '<?php echo $arrInfo['url'];?>/app/z60ys/model/img/3.jpg', 
  '<?php echo $arrInfo['url'];?>/app/z60ys/model/img/4.jpg', 
 '<?php echo $arrInfo['url'];?>/app/z60ys/model/img/5.jpg', 
 '<?php echo $arrInfo['url'];?>/app/z60ys/model/img/6.jpg', 
  '<?php echo $arrInfo['url'];?>/app/z60ys/model/img/7.jpg', 
 '<?php echo $arrInfo['url'];?>/app/z60ys/model/img/8.jpg', 
 '<?php echo $arrInfo['url'];?>/app/z60ys/model/img/9.jpg', 
  '<?php echo $arrInfo['url'];?>/app/z60ys/model/img/10.jpg', 
 '<?php echo $arrInfo['url'];?>/app/z60ys/model/img/11.jpg', 
 '<?php echo $arrInfo['url'];?>/app/z60ys/model/img/12.jpg', 
  '<?php echo $arrInfo['url'];?>/app/z60ys/model/img/13.jpg', 
  '<?php echo $arrInfo['url'];?>/app/z60ys/model/img/14.jpg', 
 '<?php echo $arrInfo['url'];?>/app/z60ys/model/img/0.jpg',
 ])

</script>
</body>
</html>