<?php
  session_start();
if(empty($_SESSION['openid'])||empty($_SESSION['nickname']))header("Location:http://weixin.yctu.edu.cn/login.php");  
date_default_timezone_set('PRC');
$j=date("H");
if($j>=22){
$timee=date("Y-m-d");
}else{$timee=date("Y-m-d",strtotime("-1 day"));}
$hz=isset($_SERVER['HTTP_X_FILENAME']) ? end(explode('.', $_SERVER['HTTP_X_FILENAME'])): "jpg";
$fn = $timee.$_SESSION['openid']'.jpg';
if ($fn) {
    file_put_contents( 'uploads/' . $fn, base64_decode(file_get_contents('php://input')));
	//页面中输出上传路径并退出
    echo "http://weixin.yctu.edu.cn/uploads/$fn";
    exit();
}
?>