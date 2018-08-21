<?php
header("Cache-control:private");
$number=$_SESSION['zid']['number'];
$postn=@urldecode($_POST['id']);
$postn = isset($_GET['id']) ? @urldecode($_GET['id']) : @urldecode($_POST['id']);
empty($params[0]) ? $LId = '' : $LId = $params[0];
if(empty($postn))
{printjson("error",'非法数值');
}
if($_SESSION['zid']['number']!='15223232')
{header("Location:/"); printjson("error",'非法');
		
	}else{
	
	$sql = "SELECT * FROM wxid WHERE number ='{$postn}' AND isok='1' ";
	$NUMM = $DB->once_num_rows($sql);
	if($NUMM==0){
	printjson("no",'ID不存在或解绑');		
	}else{
		$result =$DB->once_fetch_array($sql);
		if(empty($result))
{
	printjson("error",'数据库异常');
}ELSE{

	$_SESSION['zid']=$result;
	$_SESSION['wx']['openid']=$result['openid'];
$_SESSION['wx']['nickname']=$result['nickname'];
$_SESSION['wx']['img']=$result['img'];
$_SESSION['isclear']=1;

	if($LId=='go'){header("Location:/");EXIT; }	
	printjson("ok",$result['name']);
}
	}
}	
function printjson($type,$msg)
{
	ob_flush();
ob_clean();
IF(is_array($msg)){
	$Errormsg=array (
  'type' => urlencode ($type),
  'msg' => array_urlencode ($msg),
); 
}ELSE
	
	{$Errormsg=array (
  'type' => urlencode ($type),
  'msg' => urlencode ($msg),
); }
$php_json = json_encode($Errormsg); 
echo urldecode($php_json); 
exit;
}