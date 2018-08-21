<?php
define('RROOT',ZSystem.'/data/app/pth/');
	if(empty($_SESSION['zid']['number'])){

 printjson("error",'您还没有绑定，请绑定后再次操作');
	}
 $LId = empty($params[0]) ? '0':($params[0]);
IF($LId == 'exit'){
	if(is_file(RROOT.$number.'.php')){
	unlink( RROOT.$number.".php");
			}
	if(is_file(RROOT."temp/".$number.'.php')){
	unlink( RROOT."temp/".$number.".php");
	 printjson("ok",'请再次查询');
			}
}
IF($LId == 'zs'){
	$zsh1 = 0 ;
	$zjh1 = 0 ;


$zjh = "";
$zsh = "";
		empty($_POST['zjh']) ? $zjh1 = 1 : $zjh = trim($_POST['zjh']);
		empty($_POST['zsh']) ? $zsh1 = 1 : $zsh = trim($_POST['zsh']);	
		$cookie_jar =RROOT."/temp/".$number.".php";

if(($zjh1+$zsh1)<2)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://js.cltt.org/Web/Login/PSCP01001.aspx");
 curl_setopt ($ch,CURLOPT_REFERER,"http://js.cltt.org");
  curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_jar);
$content=curl_exec($ch);
$content = htmlspecialchars_decode($content);
curl_close($ch);

		if(preg_match_all('/input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="(.*?)"/ims',$content ,$str)){

		$post =  "__VIEWSTATE=".urlencode($str[1][0])."&txtStuID=&txtName=&txtIDCard=&txtCertificateNO=".urlencode($zsh)."&txtCardNO=".urlencode($zjh)."&btnSearch=%E6%9F%A5++%E8%AF%A2";

		}
		$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://js.cltt.org/Web/Login/PSCP01001.aspx");
  curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);
$content=curl_exec($ch);
$content = htmlspecialchars_decode($content);
curl_close($ch);

if(preg_match('/<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#FFFFFF\" class=\"tbcss22\"(?:.*?)>(.*?)<\/table>/ims', $content, $block)){
	$conten =  $block[1];
		
	if(preg_match_all('/<td(?:.*?)>(.*?)<\/td>/ims',myTrim($conten),$str_block1))
	{
		$arr=ARRAY();
		$arr['name']=urlencode(@$str_block1[1][2]);
		$arr['zjh']=@$str_block1[1][4];
		$arr['zkzh']=@$str_block1[1][7];
		$arr['csrq']=urlencode(@$str_block1[1][9]);
		$arr['kssj']=@$str_block1[1][11];
		
		$arr['zzf']=@$str_block1[1][13];
		$arr['dj']=urlencode(@$str_block1[1][15]);
		$arr['zsbh']=@$str_block1[1][17];
		
		$arr['sf']=urlencode(@$str_block1[1][19]);
		$arr['cszd']=urlencode(@$str_block1[1][21]);
	
	}
}

if(!empty($arr['name'])&&!empty($arr['dj'])){
	$arr['type']="ok";
	$arr['msg']=urlencode("查询成功");
	echo urldecode(json_encode($arr)); EXIT;
}else{
	 printjson("error",'数据提交有误');
}
}else{
	 printjson("error",'提交不全.');
}
}
IF($LId == 'cj'){
	$xm12 = 0 ;
	$zjh12 = 0 ;
	$zkz12 = 0 ;
 $xm = "";
$zjh = "";
$zkz = "";
		empty($_POST['xm']) ? $xm12 = 1 : $xm = trim($_POST['xm']);
		empty($_POST['zjh']) ? $zjh12 = 1 : $zjh = trim($_POST['zjh']);
		empty($_POST['zkz']) ? $zkz12 = 1 : $zkz = trim($_POST['zkz']);	
		$cookie_jar =RROOT."/temp/".$number.".php";
	
if(($xm12+$zjh12+$zkz12)<2)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://js.cltt.org/Web/Login/PSCP01001.aspx");
 curl_setopt ($ch,CURLOPT_REFERER,"http://js.cltt.org");
  curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_jar);
$content=curl_exec($ch);
$content = htmlspecialchars_decode($content);
curl_close($ch);

		if(preg_match_all('/input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="(.*?)"/ims',$content ,$str)){

		$post =  "__VIEWSTATE=".urlencode($str[1][0])."&txtStuID=".urlencode($zkz)."&txtName=".urlencode($xm)."&txtIDCard=".urlencode($zjh)."&btnLogin=%E6%9F%A5++%E8%AF%A2&txtCertificateNO&txtCardNO";

		}
		$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://js.cltt.org/Web/Login/PSCP01001.aspx");
  curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);
$content=curl_exec($ch);
$content = htmlspecialchars_decode($content);
curl_close($ch);

if(preg_match('/<table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#FFFFFF\" class=\"tbcss22\"(?:.*?)>(.*?)<\/table>/ims', $content, $block)){
	$conten =  $block[1];
	if(preg_match_all('/<td(?:.*?)>(.*?)<\/td>/ims',myTrim($conten),$str_block1))
	{
		$arr=ARRAY();
		$arr['name']=urlencode(@$str_block1[1][2]);
		$arr['zjh']=@$str_block1[1][4];
		$arr['zkzh']=@$str_block1[1][7];
		$arr['csrq']=urlencode(@$str_block1[1][9]);
		$arr['kssj']=@$str_block1[1][11];
		
		$arr['zzf']=@$str_block1[1][13];
		$arr['dj']=urlencode(@$str_block1[1][15]);
		$arr['zsbh']=@$str_block1[1][17];
		
		$arr['sf']=urlencode(@$str_block1[1][19]);
		$arr['cszd']=urlencode(@$str_block1[1][21]);
		SSWrite($arr,$number.".php");
	}
}

if(!empty($arr['name'])&&!empty($arr['dj'])){
	$arr['type']="ok";
	$arr['msg']=urlencode("查询成功");
	echo urldecode(json_encode($arr)); EXIT;
}else{
	 printjson("error",'数据提交有误');
}
}else{
	 printjson("error",'提交不全'.$xm.$zjh);
}}
function SSWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}
function myTrim($str)
{
 $search = array(" ","　","\n","\r","\t");
 $replace = array("","","","","");
 return str_replace($search, $replace, $str);
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