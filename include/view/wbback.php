<?php  
define('RROOT',ZSystem.'/data/app/Wblogin/temp/');
header("Content-Type:text/html;charset=utf-8");
session_start();
 $wbsid=session_id();
    $_SESSION['wbsid']=$wbsid;
$arrWxapi = SetRead('/system/config/Public/Wbapi.php');
 if(isset($_GET['code'])){
	 $codes=$_GET['code'];
@$str ='https://api.weibo.com/oauth2/access_token?';
$post=
array (
  'client_id' => $arrWxapi['APPID'],
 'client_secret'=> $arrWxapi['APPKEY'],
 'code'=>$codes,
 'grant_type'=>'authorization_code',
 'redirect_uri'=>'http://weixin.yctu.edu.cn',
);

$oauth2 = getJson($str,$post);


if(!empty($oauth2['error']))
{print_r($oauth2);EXIT;
}
@$openid = $oauth2['uid'];
@$access_token2 = $oauth2['access_token'];
$_SESSION['wx']['openid']=$openid;
SSWrite($oauth2,$wbsid.".php");

//检查绑定
		 $sql = "SELECT * FROM wbid WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
		PRINT_R($row);
		if(empty($row)){
			//没有绑定
@$str ='https://api.weibo.com/2/users/show.json?access_token='.$access_token2.'&uid='.$openid;
$info = getJson($str);
if(!empty($info['error']))
{print_r($info);EXIT;
}
SSWrite($info,$wbsid."l.php");
if(empty($info['name'])||empty($info['avatar_hd'])){
//读不到数据
if(isset($info['error']))
{echo $info['error'];

exit;
}
	echo '新浪微博API服务器未提供数据';
	exit;
}

$_SESSION['wx']['nickname']= $info['name'];
$_SESSION['wx']['img']=$info['avatar_hd'];
$_SESSION['my']='WB';

		header("Location:/home/tlogin"); EXIT; }ELSE{

		if($row['stop']==1){ECHO'该微信号或身份被停用';EXIT;}else{
			//ok
								PRINT_R("OK");

			if(is_file(RROOT.$wbsid.'.php')&&!empty($row['number']))
{
if(is_file(ZSystem.'/data/app/Wblogin/'.$row['number'].'.php'))unlink(ZSystem.'/data/app/Wblogin/'.$row['number'].'.php'); 
@copy(RROOT.$wbsid.'.php',ZSystem.'/data/app/Wblogin/'.$row['number'].'.php'); 
@unlink(RROOT.$wbsid.'.php'); 
 }
 if(is_file(RROOT.$wbsid.'l.php')&&!empty($row['number']))
{
	if(is_file(ZSystem.'/data/app/Wblogin/'.$row['number'].'l.php'))unlink(ZSystem.'/data/app/Wblogin/'.$row['number'].'l.php'); 
@copy(RROOT.$wbsid.'l.php',ZSystem.'/data/app/Wblogin/'.$row['number'].'l.php'); 
@unlink(RROOT.$wbsid.'l.php'); 
 }


			$_SESSION['zid']=$row;
	
if(isset( $_SESSION['backurl']))
{ echo($_SESSION['backurl']);
$URLL=$_SESSION['backurl'];
			

unset($_SESSION['backurl']);
if (strpos($URLL, $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) === false&&strpos( 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],$URLL) === false ) {
	if(is_https())$URLL = str_replace("http://","https://",$URLL);
	header("Location:".$URLL);}ELSE{
		header("Location:".$arrInfo['url']);
}
}ELSE{

	
		header("Location:".$arrInfo['url']);
}EXIT;		}}
	


  }ELSE{
		if(empty($_SESSION['wx'])||empty($_SESSION['wx']['openid']))
	{
		//登录
	$url = "https://api.weibo.com/oauth2/authorize?client_id=".$arrWxapi['APPID']."&redirect_uri=http://weixin.yctu.edu.cn/wbback&scope=follow_app_official_microblog&state=zy970127005&display=mobile";
//	$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2c645b02db7bbe5a&redirect_uri=".$arrInfo['url']."/back&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
if(is_https())$url = str_replace("http://","https://",$url);

	header("Location:".$url);
	}else{		if(isset( $_SESSION['backurl']))
{ echo($_SESSION['backurl']);
$URLL=$_SESSION['backurl'];

unset($_SESSION['backurl']);
if (strpos($URLL, $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) === false&&strpos( 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],$URLL) === false ) {
	if(is_https())$URLL = str_replace("http://","https://",$URLL);
	header("Location:".$URLL);}ELSE{
		header("Location:".$arrInfo['url']);
}
}ELSE{
		header("Location:".$arrInfo['url']);
}EXIT;}  
  }
   
function getJson($url,$post='',$json=''){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 if($post) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
			
        }
		 if($json) {
           curl_setopt($ch, CURLOPT_POSTFIELDS,$json);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($json))
);
        }
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output, true);
}
function SSWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}
?>  