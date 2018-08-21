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
			}ELSE{

 printjson("error",'缓存不存在');
	}

if(is_file(ZSystem.'/data/app/woa/cookies/'.$number.'.php')){
	//检测是否有效
	if(isloginq($number))
	{
		$islogin=1;
		if(!empty($arr['Attachments'])&&!empty($arr['Attachmentnames']))
{
	$Attach1 = explode(', ',$arr['Attachmentnames']); 
	$url=$arr['AttachPath'].urlencode($Attach1[$file]);

	$filename=md5($url).".".pathinfo($url, PATHINFO_EXTENSION);
	if(pathinfo($url, PATHINFO_EXTENSION)=='php'||pathinfo($url, PATHINFO_EXTENSION)=="PHP")$filename.=".txt";
	if(is_file(ZSystem.'/data/app/woa/attach/'.$filename)){
		$filesize=abs(filesize(ZSystem.'/data/app/woa/attach/'.$filename)); 
		if($filesize<5120){ //小于5K 
		
		$d=file_get_contents(ZSystem.'/data/app/woa/attach/'.$filename); 
		if(strpos($d,"!DOCTYPE")!==false)
		{attachdown($arr,$file);	}ELSE{printjson("ok",'/system/data/app/woa/attach/'.$filename);}
		}else{ 
			printjson("ok",'/system/data/app/woa/attach/'.$filename);
		} 
	

	}else{

$ch = curl_init();
  curl_setopt ($ch,CURLOPT_REFERER,"http://oa.yctu.edu.cn/oasys/index.nsf/index?readform");
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);        
curl_setopt($ch, CURLOPT_COOKIEFILE, ZSystem.'/data/app/woa/cookies/'.$number.'.php');
file_put_contents(ZSystem.'/data/app/woa/attach/'.$filename, curl_exec($ch));
  curl_close($ch);
  		$filesize=abs(filesize(ZSystem.'/data/app/woa/attach/'.$filename)); 
		if($filesize<5120){ //小于5K 
		
		$d=file_get_contents(ZSystem.'/data/app/woa/attach/'.$filename); 
		if(strpos($d,"!DOCTYPE")!==false)
		{
	
			attachdown($arr,$file);	}ELSE{printjson("ok",'/system/data/app/woa/attach/'.$filename);}
		}else{ 
			printjson("ok",'/system/data/app/woa/attach/'.$filename);
		} 
	
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
function attachdown($data,$key)
{
GLOBAL $number,$filename;
IF(empty($data['attaurl'][$key]))
{printjson("error",'读取失败');}else{
	 $url=$data['attaurl'][$key];
$ch = curl_init();
  curl_setopt ($ch,CURLOPT_REFERER,"http://oa.yctu.edu.cn/oasys/index.nsf/index?readform");
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);        
curl_setopt($ch, CURLOPT_COOKIEFILE, ZSystem.'/data/app/woa/cookies/'.$number.'.php');
file_put_contents(ZSystem.'/data/app/woa/attach/'.$filename, curl_exec($ch));
  curl_close($ch);
  		$filesize=abs(filesize(ZSystem.'/data/app/woa/attach/'.$filename)); 
		if($filesize<5120){ //小于5K 
		
		$d=file_get_contents(ZSystem.'/data/app/woa/attach/'.$filename); 
		if(strpos($d,"!DOCTYPE")!==false)
		{
	
			printjson("error",'附件读取失败');	}ELSE{printjson("ok",'/system/data/app/woa/attach/'.$filename);}
		}else{ 
			printjson("ok",'/system/data/app/woa/attach/'.$filename);
		} 	
}
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
function hasstring($source,$target){
     preg_match_all("/$target/sim", $source, $strResult, PREG_PATTERN_ORDER);
     return !empty($strResult[0]);
}