<?php
ECHO'1';
define('RROOT',ZSystem.'/data/app/Wblogin/');
if(is_wb()){
session_start();
$number=$_SESSION['zid']['number'];
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
if(!empty($access_token['error'])||empty($access_token))
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
	$type=$_SESSION['zid']['type'];


	switch ($type)
{
case 1:
$sql2 = "SELECT * FROM jwinfo WHERE number ='{$number}' and isok=1";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);

break;
case 2://无数据
$sql2 = "SELECT * FROM ghzl WHERE  number ='{$number}'";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
break;
}

//PRINT_R($arrWx);
$needmysql=0;
//比对头像是否更新
if($_SESSION['zid']['img']!=$arrWx['headimgurl']&&!empty($arrWx['headimgurl']))
{$needmysql=1;
	$_SESSION['zid']['img']=$arrWx['headimgurl'];

$_SESSION['wx']['img']=$arrWx['headimgurl'];
	
}
if(!empty($arrWx['headimgurl']))$_SESSION['wx']['img']=$arrWx['headimgurl'];
//比对昵称
if($_SESSION['zid']['nickname']!=$arrWx['nickname']&&!empty($arrWx['nickname']))
{$needmysql=1;
	$_SESSION['zid']['nickname']=$arrWx['nickname'];
		$_SESSION['wx']['nickname']=$arrWx['nickname'];
}
if(!empty($arrWx['nickname']))	$_SESSION['wx']['nickname']=$arrWx['nickname'];

$newarr=array(
 'nickname'=>$_SESSION['zid']['nickname'],
 'img'=>$_SESSION['zid']['img'],
 );
if($needmysql==1)$row = $DB->updateArr('wbid',$newarr,"where openid ='{$openid}' and isok='1'");	
/*
//检查备注
if($type==1){

PRINT_R(UpdateRemark($access_token['access_token'],mb_substr($info['xy'],0,6,'utf-8').','.mb_substr($info['xzb'],0,6,'utf-8').','.mb_substr($info['xm'],0,6,'utf-8').','.$info['number']));
}
//检查备注
if($type==2)
{
	UpdateRemark($access_token['access_token'],mb_substr($info['dname'],0,6,'utf-8').','.mb_substr($info['name'],0,6,'utf-8'));


}
//检查备注
if($type==3){
	UpdateRemark($access_token['access_token'],mb_substr($_SESSION['zid']['name'],0,6,'utf-8').','.$number);

}


*/



}

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
function SSetRead($Dir){
	$arrData = require_once RROOT.$Dir;
	return $arrData;
}
         function UpdateRemark($a,$mark){ 

    if ($a) {
$p['access_token']=$a;
$p['tags']=$mark;
    $url = "https://api.weibo.com/2/tags/create.json";
    $res = getJson($url,$p);
     return  $res;

	}
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