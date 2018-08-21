<?php
ECHO'1';
if(is_qq()||is_tim()){

$Qquni = new Qquni();
$access_token=$Qquni->zGetAtoken();

if(is_array($access_token['errcode']))
	{
		 PRINT_R($access_token);
PRINT_R('111111');
		 EXIT;
	}
$openid=$_SESSION['zid']['openid'];

if(!empty($openid)){

$info = getJson('https://api.uni.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN');

if((empty($info['subscribe'])||$info['subscribe']!='1')&&!empty($info)){
//读不到数据
if(isset($info['errcode']))
{echo $info['errmsg'];
PRINT_R('22');
exit;
}ECHO'3';
	exit;
}
if(empty($info)){

	exit;
}

$info['headimgurl']=str_replace("&s=40&","&s=640&",$info['headimgurl']);
	$arrWx=$info;
	
$number=$_SESSION['zid']['number'];

	$type=$_SESSION['zid']['type'];
		$a=$Qquni->GetUserGroupID($openid);
		print_R($a); 
	/*
	switch ($type)
{
case 1:
$sql2 = "SELECT * FROM jwinfo WHERE number ='{$number}' and isok=1";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
		 $nianji=date('Y')-$info['szj'];
		 if(date('m')>=9)$nianji++;
		 switch ($nianji)
{
case 1:
  $info['sznj']="大一";
  break;
case 2:
  $info['sznj']="大二";
  break;
case 3:
 $info['sznj']="大三";
  break;
case 4:
 $info['sznj']="大四";
  break;  
default:
  $info['sznj']="离校";
}

break;
case 2://无数据
$sql2 = "SELECT * FROM ghzl WHERE  number ='{$number}'";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
break;
}
*/
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
if($needmysql==1)$row = $DB->updateArr('qqid',$newarr,"where openid ='{$openid}' and isok='1'");	
/*
//检查备注
if($type==1){

$Wx->UpdateRemark($openid, $info['xzb'].$info['xm']);
}
//检查备注
if($type==2)
{
$Wx->UpdateRemark($openid,$info['dname'].$info['name'].$number);	
}
//检查备注
if($type==3){

$Wx->UpdateRemark($openid,$_SESSION['zid']['name'].$number);	
}


//检查标签
if($type==1){

	print_r($Wx->UpdateTagging($openid,'101'));
}

if($type==2){

	$Wx->UpdateTagging($openid,'102');
}

if($type==3){

$Wx->UpdateTagging($openid,'100');	
}

//关注检查
if((empty($arrWx['subscribe'])||$arrWx['subscribe']!='1')&&!empty($arrWx)){
//此处可写锁定账号
//弱守护
header("Location:".$arrInfo['url']."/wait/".$arrWx['subscribe'].'/'.mt_rand(1111,9999999));
}else{
//使用
if(isset( $_SESSION['backurl']))
{ echo($_SESSION['backurl']);
$URLL=$_SESSION['backurl'];
unset($_SESSION['backurl']);
if (strpos($URLL, $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) === false&&strpos( 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],$URLL) === false ) {header("Location:".$URLL);}ELSE{
	header("Location:".$arrInfo['url']."/home/index/".mt_rand(1111,9999999));
}
}ELSE{
	header("Location:".$arrInfo['url']."/home/index/".mt_rand(1111,9999999));
}

}

}ELSE{
	header("Location:".$arrInfo['url']."/wait/".mt_rand(1111,9999999));
}
*/
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