<?php
empty($params[0]) ? $LId = '1' : $LId = $params[0];
$mysqlname='wxid';
if(is_qq()||is_tim())$mysqlname='qqid';
if(is_wb())$mysqlname='wbid';
IF($LId == 'fimg'){
	empty($_POST['id']) ? $id = '0' : $id = mysql_real_escape_string (trim($_POST['id']));
if($id == '0'){$openidD=$_SESSION['wx']['openid'];
$nowimg=$_SESSION['zid']['img'];
$id =$_SESSION['zid']['number'];
}
if($id != '0'){
			 $sql = "SELECT * FROM ".$mysqlname." WHERE number ='{$id}' and isok=1  order by id desc limit 1";
	$row = @$DB->once_fetch_array($sql);
	if(!empty($row['openid']))$openidD=$row['openid'];
	$nowimg=$row['img'];
}
if(!empty($openidD)){
if($mysqlname=='wxid'){$Wx = new Wx();
$arrWx = $Wx->GetUserInfo($openidD);}
if($mysqlname=='qqid'){
	$Qquni = new Qquni();
$access_token=$Qquni->zGetAtoken();
$info = getJson('https://api.uni.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$openidD.'&lang=zh_CN');
if(!isset($info['errcode'])&&!empty($info))
{
	$arrWx['headimgurl']=str_replace("&s=40&","&s=640&",$info['headimgurl']);

}

}
if($mysqlname=='wbid'){
	define('RROOT',ZSystem.'/data/app/Wblogin/');
	$number=$id;
 $wbsid= @$_SESSION['wbsid'];

if(!empty($wbsid)){
			if(is_file(RROOT.'temp/'.$wbsid.'.php')&&!empty($number))
{
copyf(RROOT.'temp/'.$wbsid.'.php',ZSystem.'/data/app/Wblogin/'.$number.'.php'); 
unlink(RROOT.'temp/'.$wbsid.'.php'); 
 }
			if(is_file(RROOT.'temp/'.$wbsid.'l.php')&&!empty($number))
{
copyf(RROOT.'temp/'.$wbsid.'l.php',ZSystem.'/data/app/Wblogin/'.$number.'l.php'); 
unlink(RROOT.'temp/'.$wbsid.'l.php'); 
 }
}	
			if(is_file(RROOT.$number.'.php')&&!empty($number))
{	
$access_token= SSetRead($number.".php");

 }else{
	 EXIT('NO ATOKEN FILE');


 }
if(!empty($access_token['error'])||empty($access_token['uid']))
	{
		 PRINT_R($access_token);
		 EXIT('ERROR ATOKEN FILE');
	}

$openid=$access_token['uid'];

if(!empty($openid)){

@$str ='https://api.weibo.com/2/users/show.json?access_token='.$access_token['access_token'].'&uid='.$openid;
$Tinfo = getJson($str);
if(!empty($Tinfo['error']))
{print_r($Tinfo);
if($Tinfo['error']=='10006')unlink(RROOT.$number.'.php'); 
EXIT;
}
SSWrite($Tinfo,$number."l.php");


	$arrWx=$Tinfo;
$arrWx['nickname']= $Tinfo['name'];
$arrWx['headimgurl']=$Tinfo['avatar_hd'];
	
	
}}
if($_SESSION['zid']['nickname']!=$arrWx['nickname']&&!empty($arrWx['nickname']))
{
	$_SESSION['zid']['nickname']=$arrWx['nickname'];
		$_SESSION['wx']['nickname']=$arrWx['nickname'];
}
if(!empty($arrWx['nickname']))	$_SESSION['wx']['nickname']=$arrWx['nickname'];

	if($nowimg!=$arrWx['headimgurl']&&!empty($arrWx['headimgurl']))
	{
		$newarr=array(
 'nickname'=>$_SESSION['zid']['nickname'],
 'img'=>$arrWx['headimgurl'],
 );
		$DB->updateArr($mysqlname,$newarr,"where openid ='{$openidD}'");
				$array=array(
		'img'=>$arrWx['headimgurl']
		);
		
		echojson($array);
	}ELSE{
			$array=array(
		'isok'=>'NOCHANGE',	'img'=>$arrWx['headimgurl']
		);
		
		echojson($array);
	}


}
}
function deleteAll($path) {
    $op = dir($path);
    while(false != ($item = $op->read())) {
        if($item == '.' || $item == '..') {
            continue;
        }
        if(is_dir($op->path.'/'.$item)) {
            deleteAll($op->path.'/'.$item);
            rmdir($op->path.'/'.$item);
        } else {
            unlink($op->path.'/'.$item);
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
function echojson($ARRAR)
{
	ob_flush();
ob_clean();
echo json_encode($ARRAR); EXIT;
}
	function copyf($file1,$file2){ 
 $contentx =@file_get_contents($file1); 
  $openedfile = fopen($file2, "w"); 
  fwrite($openedfile, $contentx); 
  fclose($openedfile); 
   if ($contentx === FALSE) { 
   $status=false; 
   }else $status=true; 
   return $status; 
  } 
  function SSWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}
function SSetRead($Dir){
	$arrData = require_once RROOT.$Dir;
	return $arrData;
}
       