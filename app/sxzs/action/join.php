<?php  
header("Content-Type:text/html;charset=utf-8");

$sxzs = new sxzs($DB);

empty($params[0]) ? (empty($_SESSION['backid'])?$id = '0': $_SESSION['backid']) : $id = $params[0];

if($id!=0)$Array = $sxzs ->GetsxzsA($id);
if(EMPTY($Array)){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '没有这条数据',
); 
ErrorMsg($Errormsg);	}
session_start();
$_SESSION['backid']=$id;
if(empty($_SESSION['wx']['img'])||empty($_SESSION['zid']['type'])){
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
		 $sql = "SELECT * FROM wxid WHERE openid ='{$openid}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
		if(empty($row)){
			//没有绑定
			$_SESSION['zid']['number']='no';
			$_SESSION['zid']['type']='3';
			$_SESSION['zid']['name']=$info['nickname'];
			$_SESSION['zid']['img']=$info['headimgurl'];
}ELSE{
		if($row['stop']==1){ECHO'该微信号或身份被停用';}else{
			//ok
			$_SESSION['zid']=$row;

		}}
	

 }ELSE{

		//登录
	$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2c645b02db7bbe5a&redirect_uri=".$arrInfo['url']."/sxzs/join/".$id."&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
//	$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2c645b02db7bbe5a&redirect_uri=".$arrInfo['url']."/back&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";

	header("Location:".$url); 
}
}
  
   $Wx = new Wx();
$signPackage=$Wx->getSignPackage();
$isstop=0;
$type=@$_SESSION['zid']['type'];
	if(empty($number))$number=$_SESSION['zid']['number'];
	//print_r($_SESSION['zid']);
		if($type=='3'&&$number=='no'){
		//$isstop=1;
	}
	$ok=0; 
	    $sql = "SELECT  id FROM sxzs_on WHERE wxid ='{$_SESSION['wx']['openid']}' and sid='$id'";
		$row = $DB->once_fetch_array($sql);
		if(!empty($row))
		{
			$ok=1; 

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