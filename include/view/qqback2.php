<?php  
header("Content-Type:text/html;charset=utf-8");

session_start();
UNSET($_SESSION['wx']);

 if(isset($_GET['code'])){
	 $codes=$_GET['code'];
$arrWxapi = SetRead('/system/config/Public/Qquniapi.php');
@$str ='https://api.uni.qq.com/sns/oauth2/access_token?appid='.$arrWxapi['APPID'].'&secret='.$arrWxapi['APPKEY'].'&code='.$codes.'&grant_type=authorization_code';
$oauth2 = getJson($str);

@$openid = $oauth2['openid'];
@$access_token2 = $oauth2['access_token'];
$_SESSION['wx']['openid']=$openid;
		$Qquni = new Qquni();
$access_token=$Qquni->zGetAtoken();
$info = getJson('https://api.uni.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN');
print_R($info);EXIT();
//检查绑定
		 $sql = "SELECT * FROM qqid WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
		if(empty($row)){
			//没有绑定

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


}

$_SESSION['wxsub']='2';
	header("Location:./qqwait");
	exit;
}
$_SESSION['wx']['nickname']= $info['nickname'];
$_SESSION['wx']['img']=str_replace("&s=40&","&s=140&",$info['headimgurl']);
$_SESSION['my']='QQ';

		header("Location:/home/qlogin"); EXIT; }ELSE{
		if($row['stop']==1){ECHO'该微信号或身份被停用';EXIT;}else{
			//ok
			$_SESSION['zid']=$row;
			$info = getJson('https://api.uni.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN');

if(!is_array($access_token['errcode']))
{
$_SESSION['wx']['nickname']= $info['nickname'];
$_SESSION['wx']['img']=str_replace("&s=40&","&s=140&",$info['headimgurl']);
$_SESSION['my']='QQ';
$needmysql=0;
//比对头像是否更新
if($_SESSION['zid']['img']!=$_SESSION['wx']['img']&&!empty($_SESSION['wx']['img']))
{$needmysql=1;
	$_SESSION['zid']['img']=$_SESSION['wx']['img'];

}
//比对昵称
if($_SESSION['zid']['nickname']!=$info['nickname']&&!empty($info['nickname']))
{$needmysql=1;
	$_SESSION['zid']['nickname']=$info['nickname'];
		$_SESSION['wx']['nickname']=$info['nickname'];
}

$newarr=array(
 'nickname'=>$_SESSION['zid']['nickname'],
 'img'=>$_SESSION['zid']['img'],
 );
 if($needmysql==1)$row = $DB->updateArr('qqid',$newarr,"where openid ='{$openid}' and isok='1'");	
		header("Location:".$arrInfo['url']."/home/index/".mt_rand(1111,99999));EXIT;
		}}
		}


  }ELSE{
		if(empty($_SESSION['wx'])||empty($_SESSION['wx']['openid']))
	{
		//登录
	$url = "https://api.uni.qq.com/connect/oauth2/authorize?appid=200484713&redirect_uri=http://weixin.yctu.edu.cn/qqback2&response_type=code&state=zy970127005";
//	$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2c645b02db7bbe5a&redirect_uri=".$arrInfo['url']."/back&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
if(is_https())$url = str_replace("http://","https://",$url);

	header("Location:".$url);}else{
		if(isset( $_SESSION['backurl']))
{ echo($_SESSION['backurl']);
$URLL=$_SESSION['backurl'];

unset($_SESSION['backurl']);
if (strpos($URLL, $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) === false&&strpos( 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],$URLL) === false ) {
	if(is_https())$URLL = str_replace("http://","https://",$URLL);
	header("Location:".$URLL);}ELSE{
	header("Location:".$arrInfo['url']."/home/index/".mt_rand(1111,9999999));
}
}ELSE{
	header("Location:".$arrInfo['url']."/home/index/".mt_rand(1111,9999999));
}
	}  
  }
   
function getJson($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ( $ch, CURLOPT_TIMEOUT,5);  
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output, true);
}

?>  