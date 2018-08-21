<?php

	if(empty($_SESSION['wx']['openid'])){
 printjson("error",'您还没有绑定');
	}
//开始是否符合要求

$result =$_POST;
 if(empty($result))printjson("error",'空数据');	

empty($params[0]) ? $LId = '1' : $LId = $params[0];

IF($LId == 'save'){
		empty($_POST['usetime']) ? $usetime = '0' : $usetime = trim($_POST['usetime']);
			empty($_POST['score']) ? $score = '0' : $score = trim($_POST['score']);


if( $usetime == '0'||eregi ( 'select|inert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|UNION|into|load_file|outfile', $score )||eregi ( 'select|inert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|UNION|into|load_file|outfile', $usetime )){  
printjson("error",'数据有误');
}
$nickname=@$_SESSION['wx']['nickname'];

$number2=@$number;
	
if($number2&&$nickname&&$score&&$usetime&&$openid){
 $NICKNAMEE=@$_SESSION['wx']['nickname'];
		$ip=getIP();
			$id = $DB->create('sjd_save',array(
				'number'       => @$number,
				'openid'       => @$openid,
				'nickname'=>@$nickname,
				'usetime'=>$usetime,
				'sroce'       => @$score,
				'addtime'	=> time(),
				'ip'	=> @$ip,
			));
	printjson("ok",'登记成功');	
			}else{
			printjson("error",'数据验证有误');	
}
}else{
	printjson("NO",'访问非法');	
}

function printjson($type,$msg)
{
	ob_flush();
ob_clean();

			$Errormsg=array (
  'type' => urlencode ($type),
  'msg' => urlencode ($msg),
); 
$php_json = json_encode($Errormsg); 
echo urldecode($php_json); 
exit;
}
