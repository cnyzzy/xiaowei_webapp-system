<?php
$number=$_SESSION['zid']['number'];
$type=$_SESSION['zid']['type'];
		if($type!='2'&&$number!='15223232'){
$isstop=1;
	}else{
		$isstop=0;
	}
if(is_file(ZSystem.'/data/app/woa/password/'.$number.'.php')){
				$arr = SetRead('/system/data/app/woa/password/'.$number.'.php');
				if(is_file(ZSystem.'/data/app/woa/cookies/'.$number.'.php')){
	//检测是否有效
	if(isloginq($number))
	{
		$islogin=1;
		header("Location:/woa/oa"); 
	}else{
		if(!empty($arr['user'])&&!empty($arr['pass']))
		{
			//自动登录
		$islogin=2;	
			}else{
		$islogin=0;}
	}
}
			}else{$islogin=0;}

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