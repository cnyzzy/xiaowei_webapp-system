<?php  
header("Content-Type:text/html;charset=utf-8");
define("WZ", "http://weixin.yctu.edu.cn");
define("OPENID", "weixinopenid");
session_start();

	
 if(isset($_GET['code'])){
	 $codes=$_GET['code'];
$arrWxapi = SetRead('/system/config/Public/Wxapi.php');
@$str ='https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$arrWxapi['APPID'].'&secret='.$arrWxapi['SECRET'].'&code='.$codes.'&grant_type=authorization_code';
$oauth2 = getJson($str);
//PRINT_r($oauth2);
@$openid = $oauth2['openid'];
@$access_token2 = $oauth2['access_token'];

$_SESSION['wx']['openid']=$openid;

$info = getJson('https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token2.'&openid='.$openid.'&lang=zh_CN');

$_SESSION['wx']['nickname']=$info['nickname'];
$_SESSION['wx']['img']=$info['headimgurl'];
$_SESSION['my']='WX';
//检查绑定
		 $sql = "SELECT * FROM wxid WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
		if(empty($row)){
			//没有绑定
		header("Location:/home/login");  }ELSE{
		if($row['stop']==1){ECHO'该微信号或身份被停用';}else{
			//ok
			$_SESSION['zid']=$row;
		header("Location:".$arrInfo['url']."/home/wait/".mt_rand(1111,99999));
		}}
	


  }ELSE{
		if(empty($_SESSION['wx'])||empty($_SESSION['wx']['openid']))
	{
		//登录
	$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2c645b02db7bbe5a&redirect_uri=http://weixin.yctu.edu.cn/back&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
//	$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2c645b02db7bbe5a&redirect_uri=".$arrInfo['url']."/back&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
if(is_https())$url = str_replace("http://","https://",$url);

	header("Location:".$url); }  
  }
   
function getJson($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output, true);
}

?>  