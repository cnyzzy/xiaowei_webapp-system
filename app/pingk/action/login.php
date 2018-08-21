<?php  
header("Content-Type:text/html;charset=utf-8");
session_start();
 if(isset($_GET['code'])){
	 $codes=$_GET['code'];
$arrWxapi = SetRead('/system/config/Public/Wxapi.php');
@$str ='https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$arrWxapi['APPID'].'&secret='.$arrWxapi['SECRET'].'&code='.$codes.'&grant_type=authorization_code';
$oauth2 = getJson($str);
@$openid = $oauth2['openid'];
@$access_token2 = $oauth2['access_token'];
$_SESSION['wx']['openid']=$openid;
$info = getJson('https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token2.'&openid='.$openid.'&lang=zh_CN');
$_SESSION['wx']['nickname']=$info['nickname'];
$_SESSION['wx']['img']=$info['headimgurl'];

//检查绑定
		 $sql = "SELECT * FROM wxid WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
		if(empty($row)){
			//没有绑定
					$_SESSION['zid']['nobd']='1';

			$_SESSION['zid']['number']='no';
			$_SESSION['zid']['type']='3';
			$_SESSION['zid']['name']=$info['nickname'];
			$_SESSION['zid']['img']=$info['headimgurl'];
					if(isset( $_SESSION['backurl']))
{ echo($_SESSION['backurl']);
$URLL=$_SESSION['backurl'];

unset($_SESSION['backurl']);
if (strpos($URLL, $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) === false&&strpos( 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],$URLL) === false ) {
	if(is_https())$URLL = str_replace("http://","https://",$URLL);
	header("Location:".$URLL);}ELSE{
		header("Location:".$arrInfo['url']."/".$AppName);
}
}ELSE{
		header("Location:".$arrInfo['url']."/".$AppName);
}
 }ELSE{
		if($row['stop']==1){ECHO'该微信号或身份被停用';}else{
			//ok
			$_SESSION['zid']=$row;
						if(isset( $_SESSION['backurl']))
{ echo($_SESSION['backurl']);
$URLL=$_SESSION['backurl'];

unset($_SESSION['backurl']);
if (strpos($URLL, $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) === false&&strpos( 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],$URLL) === false ) {
	if(is_https())$URLL = str_replace("http://","https://",$URLL);
	header("Location:".$URLL);}ELSE{
		header("Location:".$arrInfo['url']."/".$AppName);
}
}ELSE{
		header("Location:".$arrInfo['url']."/".$AppName);
}

		}}
	


  }ELSE{
		if(empty($_SESSION['wx'])||empty($_SESSION['zid']))
	{
		//登录
	$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2c645b02db7bbe5a&redirect_uri=".$arrInfo['url']."/".$AppName."/login&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
//	$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2c645b02db7bbe5a&redirect_uri=".$arrInfo['url']."/back&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
if(is_https())$url = str_replace("http://","https://",$url);
	header("Location:".$url); }  else{
		if(isset( $_SESSION['backurl']))
{ echo($_SESSION['backurl']);
$URLL=$_SESSION['backurl'];

unset($_SESSION['backurl']);
if (strpos($URLL, $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) === false&&strpos( 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],$URLL) === false ) {
	if(is_https())$URLL = str_replace("http://","https://",$URLL);
	header("Location:".$URLL);}ELSE{
		header("Location:".$arrInfo['url']."/".$AppName);
}
}ELSE{
		header("Location:".$arrInfo['url']."/".$AppName);
}
	}
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