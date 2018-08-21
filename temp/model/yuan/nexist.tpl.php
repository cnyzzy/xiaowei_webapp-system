<?php defined('ZRoot') or die('Access Denied.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>404错误 :: 您访问了不存在的页面</title>
<style type="text/css">
body {
	margin: 0 0 0 0;
	padding: 0 0 0 0;
	background: #FFF;
	color: #fff;
}
#container {
	width: 600px;
	height: auto;
	position: absolute;
	left: 170px;
	bottom: 10px;
}
div#container h1 {
	font-size: 42px;
	height: 45px;
	margin: 0 0 0 0;
}
div#container h2 {
	font-size: 36px;
	text-transform: lowercase;
	margin: 0 0 0 0;
}
div#container #footer p {
	font-size: 24px;
}


*{
  margin: 0;
  padding: 0;
}
body{
  background-color: #102037;
  overflow: hidden;
}
@-webkit-keyframes snow {
  0% { opacity: 0; -webkit-transform: translateY(0px); transform: translateY(0px); }
  20%{ opacity: 1;}
  100% { opacity: 1; -webkit-transform: translateY(850px); transform: translateY(850px); }
}
@keyframes snow {
  0% { opacity: 0; -webkit-transform: translateY(0px); transform: translateY(0px); }
  20%{ opacity: 1;}
  100% { opacity: 1; -webkit-transform: translateY(1250px); transform: translateY(1250px); }
}
@-webkit-keyframes astronaut{
  0%{
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
  }
  100%{
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}
.box-of-star1,
.box-of-star2,
.box-of-star3,
.box-of-star4,
.box-of-star5,
.box-of-star6,
.box-of-star7,
.box-of-star8{
  width: 100%;
  position: absolute;
  z-index: 10;
  left: 0;
  -webkit-transform: translateY(750px);
          transform: translateY(750px);
}
.box-of-star1{
  -webkit-animation: snow 6s linear infinite;
}
.box-of-star2{
  -webkit-animation: snow 7s -1.64s linear infinite;
}
.box-of-star3{
  -webkit-animation: snow 3s -2.30s linear infinite;
}
.box-of-star4{
  -webkit-animation: snow 9s -3.30s linear infinite;
}
.box-of-star5{
  -webkit-animation: snow 7s -10.8s linear infinite;
}
.box-of-star6{
  -webkit-animation: snow 10s -19.14s linear infinite;
}
.box-of-star7{
  -webkit-animation: snow 17s -22.80s linear infinite;
}
.box-of-star8{
  -webkit-animation: snow 8s -13.90s linear infinite;
}
.star{
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background-color: #FFF;
  position: absolute;
  z-index: 10;
  opacity: .7;
}
.star:before{
  content: "";
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background-color: #FFF;
  position: absolute;
  z-index: 10;
  top: 720px;
  left: 70px;
  opacity: .8;
}
.star:after{
  content: "";
  width: 13px;
  height: 13px;
  border-radius: 50%;
  background-color: #FFF;
  position: absolute;
  z-index: 10;
  top: 8px;
  left: 270px;
  opacity: .9;
}
.star-position1{
  top: 30px;
  left: 20px;
}
.star-position2{
  top: 110px;
  left: 250px;
}
.star-position3{
  top: 60px;
  left: 570px;
}
.star-position4{
  top: 120px;
  left: 900px;
}
.star-position5{
  top: 20px;
  left: 1120px;
}
.star-position6{
  top: 90px;
  left: 1280px;
}
.star-position7{
  top: 30px;
  left: 1480px;
}
.astronaut{
  width: 250px;
  height: 300px;
  position: absolute;
  z-index: 11;
  top: calc(50% - 180px);
  left: calc(50% + 375px);
  -webkit-animation: astronaut 5s linear infinite;
}
.schoolbag{
  width: 100px;
  height: 150px;
  position: absolute;
  z-index: 1;
  top: calc(50% - 75px);
  left: calc(50% - 50px);
  background-color: #94b7ca;
  border-radius: 50px 50px 0 0 / 30px 30px 0 0;
}
.head{
  width: 97px;
  height: 80px;
  position: absolute;
  z-index: 3;
  background: -webkit-linear-gradient(left, #e3e8eb 0%, #e3e8eb 50%, #fbfdfa 50%, #fbfdfa 100%);
  border-radius: 50%;
  top: 34px;
  left: calc(50% - 47.5px);
}
.head:after{
  content: "";
  width: 60px;
  height: 50px;
  position: absolute;
  top: calc(50% - 25px);
  left: calc(50% - 30px);
  background: -webkit-linear-gradient(top, #15aece 0%, #15aece 50%, #0391bf 50%, #0391bf 100%);
  border-radius: 15px;
}
.head:before{
  content: "";
  width: 12px;
  height: 25px;
  position: absolute;
  top: calc(50% - 12.5px);
  left: -4px;
  background-color: #618095;
  border-radius: 5px;
  box-shadow: 92px 0px 0px #618095;
}
.body{
  width: 85px;
  height: 100px;
  position: absolute;
  z-index: 2;
  background-color: #fffbff;
  border-radius: 40px / 20px;
  top: 105px;
  left: calc(50% - 41px);
  background: -webkit-linear-gradient(left, #e3e8eb 0%, #e3e8eb 50%, #fbfdfa 50%, #fbfdfa 100%);
}
.panel{
  width: 60px;
  height: 40px;
  position: absolute;
  top: 20px;
  left: calc(50% - 30px);
  background-color: #b7cceb;
}
.panel:before{
  content: "";
  width: 30px;
  height: 5px;
  position: absolute;
  top: 9px;
  left: 7px;
  background-color: #fbfdfa;
  box-shadow: 0px 9px 0px #fbfdfa, 0px 18px 0px #fbfdfa;
}
.panel:after{
  content: "";
  width: 8px;
  height: 8px;
  position: absolute;
  top: 9px;
  right: 7px;
  background-color: #fbfdfa;
  border-radius: 50%;
  box-shadow: 0px 14px 0px 2px #fbfdfa;
}
.arm{
  width: 80px;
  height: 30px;
  position: absolute;
  top: 121px;
  z-index: 2;
}
.arm-left{
  left: 30px;
  background-color: #e3e8eb;
  border-radius: 0 0 0 39px;
}
.arm-right{
  right: 30px;
  background-color: #fbfdfa;
  border-radius: 0 0 39px 0;
}
.arm-left:before,
.arm-right:before{
  content: "";
  width: 30px;
  height: 70px;
  position: absolute;
  top: -40px;
}
.arm-left:before{
  border-radius: 50px 50px 0px 120px / 50px 50px 0 110px;
  left: 0;
  background-color: #e3e8eb;
}
.arm-right:before{
  border-radius: 50px 50px 120px 0 / 50px 50px 110px 0;
  right: 0;
  background-color: #fbfdfa;
}
.arm-left:after,
.arm-right:after{
  content: "";
  width: 30px;
  height: 10px;
  position: absolute;
  top: -24px;
}
.arm-left:after{
  background-color: #6e91a4;
  left: 0;
}
.arm-right:after{
  right: 0;
  background-color: #b6d2e0;
}
.leg{
  width: 30px;
  height: 40px;
  position: absolute;
  z-index: 2;
  bottom: 70px;
}
.leg-left{
  left: 76px;
  background-color: #e3e8eb;
  -webkit-transform: rotate(20deg);
          transform: rotate(20deg);
}
.leg-right{
  right: 73px;
  background-color: #fbfdfa;
  -webkit-transform: rotate(-20deg);
          transform: rotate(-20deg);
}
.leg-left:before,
.leg-right:before{
  content: "";
  width: 50px;
  height: 25px;
  position: absolute;
  bottom: -26px;
}
.leg-left:before{
  left: -20px;
  background-color: #e3e8eb;
  border-radius: 30px 0 0 0;
  border-bottom: 10px solid #6d96ac;
}
.leg-right:before{
  right: -20px;
  background-color: #fbfdfa;
  border-radius: 0 30px 0 0;
  border-bottom: 10px solid #b0cfe4;
}</style>
</head>
<body>

<div class="box-of-star1">

    <div class="star star-position2"></div>
    <div class="star star-position6"></div>
    <div class="star star-position7"></div>
  </div>
  <div class="box-of-star2">
    <div class="star star-position1"></div>
    <div class="star star-position3"></div>    
	<div class="star star-position5"></div>
    <div class="star star-position6"></div>

  </div>
  <div class="box-of-star3">
    <div class="star star-position1"></div>
    <div class="star star-position4"></div>
    <div class="star star-position7"></div>
  </div>
  <div class="box-of-star4">
    <div class="star star-position1"></div>
    <div class="star star-position3"></div>
    <div class="star star-position4"></div>

  </div>
  <div class="box-of-star5">
    <div class="star star-position4"></div>
    <div class="star star-position5"></div>

    <div class="star star-position7"></div>
  </div>
  <div class="box-of-star6">
    <div class="star star-position2"></div>

   <div class="star star-position4"></div>

    <div class="star star-position6"></div>

  </div>
  <div class="box-of-star7">
    <div class="star star-position1"></div>
    <div class="star star-position4"></div>
    <div class="star star-position5"></div>

    <div class="star star-position7"></div>
  </div>
  <div class="box-of-star8">
    <div class="star star-position1"></div>
    <div class="star star-position2"></div>
    <div class="star star-position6"></div>
    <div class="star star-position7"></div>
  </div>
  <div class="astronaut" data-js="astro">
    <div class="head"></div>
    <div class="arm arm-left"></div>
    <div class="arm arm-right"></div>
    <div class="body">
      <div class="panel"></div>
    </div>
    <div class="leg leg-left"></div>
    <div class="leg leg-right"></div>
    <div class="schoolbag"></div>
  </div>

<div id="container">
	<div id="header">
		<h1><script type="text/javascript">document.write(window.location.host);</script><noscript></noscript></h1>
		<br>
		<h2>不存在的东西</h2>
    	<h2>在这个世界 总是存在</h2>
    </div>
    <div id="footer">
    	<p>&copy; By:ZY</p>
    </div>
</div>
<?php if(isset($arrInfo['tjcode'])) { ?><div style="display:none"><?php echo $arrInfo['tjcode'];?></div><?php } ?> 
</body>
</html>