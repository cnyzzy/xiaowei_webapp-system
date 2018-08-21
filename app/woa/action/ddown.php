<?php
define('RROOT',ZRoot.'/system/data/app/woa/cache/'.$number.'/');
	if(empty($number)){

 printjson("error",'您还没有绑定，请绑定后再次操作');
	}
		if($_SESSION['zid']['type']!='3'&&$number!='15223232'){
printjson("error",'权限不足');
	}	
empty($params[0]) ? $ttt = '1' : $ttt = $params[0];
empty($params[1]) ? $idid = '1' : $idid = $params[1];
empty($params[2]) ? $file = '0' : $file = $params[2];
$number=$_SESSION['zid']['number'];

if(is_file(ZSystem.'/data/app/woa/cache/'.$number.'/'.$ttt.'-'.$idid.'-detail.php')){
		$arr = SetRead('/system/data/app/woa/cache/'.$number.'/'.$ttt.'-'.$idid.'-detail.php');
			}

if(is_file(ZSystem.'/data/app/woa/cookies/'.$number.'.php')){
	//检测是否有效
	if(isloginq($number))
	{
		$islogin=1;
		if(!empty($arr['RecordID'])&&!empty($arr['wjbt'])&&!empty($arr['CurrentDBPath']))
{

	$url="http://oa.yctu.edu.cn/".$arr['CurrentDBPath'].'/DocumentEdit?openform&EditType=4&RecordID='.$arr['RecordID']."&FileType=.doc&FileName=".$arr['RecordID'].".doc&wjbt=".urlencode($arr['wjbt']);
$filename=md5($url).".doc";
	if(is_file(ZSystem.'/data/app/woa/doc/'.$filename)){
		printjson("ok",'/system/data/app/woa/doc/'.$filename);

	}else{

$ch = curl_init();
  curl_setopt ($ch,CURLOPT_REFERER,"http://oa.yctu.edu.cn/oasys/index.nsf/index?readform");
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);        
curl_setopt($ch, CURLOPT_COOKIEFILE, ZSystem.'/data/app/woa/cookies/'.$number.'.php');
file_put_contents(ZSystem.'/data/app/woa/doc/'.$filename, curl_exec($ch));
  curl_close($ch);
	printjson("ok",'/system/data/app/woa/doc/'.$filename);
	}
}else{
	printjson("error",'附件不存在');	
		$islogin=0;
	}
	}else{
	printjson("login",'请重新登录');	
		$islogin=0;
	}
}else{
	printjson("login",'请登录');	
		$islogin=0;
	}

function SSetWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}
	function isloginq($number)
	{
$ch = curl_init();
 curl_setopt ($ch,CURLOPT_REFERER,"http://oa.yctu.edu.cn/oasys/index.nsf/index?readform");
curl_setopt($ch, CURLOPT_URL, "http://oa.yctu.edu.cn/oasys/index.nsf/topbelow?openform");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);        
curl_setopt($ch, CURLOPT_COOKIEFILE, ZSystem.'/data/app/woa/cookies/'.$number.'.php');
$html=curl_exec($ch);

curl_close($ch);	
	if(strpos($html,"LoginLog=1"))
	{return true;}ELSE
		{RETURN false;}
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