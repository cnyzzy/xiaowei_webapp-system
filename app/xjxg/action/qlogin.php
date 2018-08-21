<?php  
header("Content-Type:text/html;charset=utf-8");

session_start();

 if(isset($_GET['code'])){
	 $codes=$_GET['code'];
$arrWxapi = SetRead('/system/config/Public/Qquniapi.php');
@$str ='https://api.uni.qq.com/sns/oauth2/access_token?appid='.$arrWxapi['APPID'].'&secret='.$arrWxapi['APPKEY'].'&code='.$codes.'&grant_type=authorization_code';
$oauth2 = getJson($str);

@$openid = $oauth2['openid'];
@$access_token2 = $oauth2['access_token'];


//检查绑定
		 $sql = "SELECT * FROM qqid WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
		if(empty($row)){
			//没有绑定
		$Qquni = new Qquni();
$access_token=$Qquni->zGetAtoken();
if(is_array($access_token['errcode']))
	{
		 PRINT_R($access_token);
PRINT_R('111111');
		 EXIT;
	}
$info = getJson('https://api.uni.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN');
if((empty($info['subscribe'])||$info['subscribe']!='1')&&!empty($info)){
//读不到数据
if(isset($info['errcode']))
{echo $info['errmsg'];
PRINT_R('22');

}$_SESSION['wxsub']==1;
	header("Location:".$arrInfo['url']."/qqwait");
	exit;
}
		//没有绑定
$_SESSION['wx']['openid']=$openid;
$_SESSION['wx']['nickname']= $info['nickname'];
$_SESSION['wx']['img']=str_replace("&s=40&","&s=640&",$info['headimgurl']);
$_SESSION['my']='QQ';
$_SESSION['zid']['openid']=$openid;
			$_SESSION['zid']['number']='no'.$openid;
			$_SESSION['zid']['type']='3';
			$_SESSION['zid']['name']=$info['nickname'];
			$_SESSION['zid']['img']=$_SESSION['wx']['img']; 
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
}EXIT;
			}ELSE{
		if($row['stop']==1){ECHO'该微信号或身份被停用';EXIT;}else{
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
}EXIT;
		}}
	


  }ELSE{
		if(empty($_SESSION['wx'])||empty($_SESSION['wx']['openid']))
	{
		//登录
	$url = "https://api.uni.qq.com/connect/oauth2/authorize?appid=200484713&redirect_uri=".$arrInfo['url']."/".$AppName."/qlogin&response_type=code&state=zy970127005";
//	$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2c645b02db7bbe5a&redirect_uri=".$arrInfo['url']."/back&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";

	header("Location:".$url);}  else{		if(isset( $_SESSION['backurl']))
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
}EXIT;}
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