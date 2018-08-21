<?php
define('RROOT',ZRoot.'/system/data/app/woa/');
define('RRrOOT',ZRoot.'/system/data/app/woa/cookies/');
define('RRrrOOT',ZRoot.'/system/data/app/woa/password/');
	if(empty($_SESSION['zid']['number'])){

 printjson("error",'您还没有绑定，请绑定后再次操作');
	}
		if($_SESSION['zid']['type']!='2'&&$_SESSION['zid']['number']!='15223232'){
printjson("error",'权限不足');
	}	
empty($params[0]) ? $LId = '1' : $LId = $params[0];
	
	$number=$_SESSION['zid']['number'];
IF($LId == 'exit'){

if(is_file(ZSystem.'/data/app/woa/password/'.$number.'.php')){
				$arr = SetRead('/system/data/app/woa/password/'.$number.'.php');
	empty($_POST['user']) ? $user = '0' : $user = trim($_POST['user']);
	if($user == '0'||$user!=$arr['user'])printjson("error",'非法操作');	
	unlink(RRrrOOT."/".$number.".php");
	printjson("ok",'绑定解除');	
			}else{
			printjson("ok",'绑定早已清除');	
}
}
IF($LId == 'relogin'){

if(is_file(ZSystem.'/data/app/woa/password/'.$number.'.php')){
				$arr = SetRead('/system/data/app/woa/password/'.$number.'.php');
			}else{
			printjson("error",'请输入账号与密码');	
			}

	if(!empty($arr['user'])&&!empty($arr['pass'])){
				if(login($arr['user'],$arr['pass'],$number)){
				printjson("ok",'登录成功');	
				}else{
						 if(is_file(RRrOOT."/".$number.".php")){
				unlink(RRrOOT."/".$number.".php");
				 }
				 	 if(is_file(RRrrOOT."/".$number.".php")){
				unlink(RRrrOOT."/".$number.".php");
				 }
				printjson("error",'登录失败');	
				}
			}else{
			printjson("error",'请输入账号与密码');	
			}
	
}
IF($LId == 'login'){

empty($_POST['user']) ? $user = '0' : $user = trim($_POST['user']);
	empty($_POST['pass']) ? $pass = '0' : $pass = trim($_POST['pass']);

	if($user!='0'&&$pass!='0'){
	if(login($user,$pass,$number)){
				printjson("ok",'登录成功');	
				}else{
						 if(is_file(RRrOOT."/".$number.".php")){
				unlink(RRrOOT."/".$number.".php");
				 }
				 
				printjson("error",'登录失败');	
				}
	}else{
	printjson("error",'参数非法');	
	}
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
function login($user,$pass,$number){
	 if(is_file(RRrOOT."/".$number.".php")){
				unlink(RRrOOT."/".$number.".php");
				 }
$cookie_jar = RRrOOT."/".$number.".php";


$post = "%25%25ModDate=0000000000004021&Username=".$user."&Password=".$pass."&%25%25Surrogate_SaveNameAndPassword=1&RedirectTo=%2Foasys%2Findex.nsf%2Findex%3Freadform&%24PublicAccess=1&ReasonType=0";
/* array( 
'%%ModDate'=>'0000000000004021',
'Username'=>'yctu0066',
'Password'=>'fxx780604',
'%%Surrogate_SaveNameAndPassword'=>1,
'&RedirectTo'=>'/oasys/index.nsf/index?readform',
'&$PublicAccess'=>1,
'ReasonType'=>0);    */
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://oa.yctu.edu.cn/names.nsf?Login");
 curl_setopt ($ch,CURLOPT_REFERER,"http://oa.yctu.edu.cn/");
  curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_jar);
$result=curl_exec($ch);
curl_close($ch);

if(strpos($result,"Location:")){
	//OK
	$info= array (
        'user' => $user,
        'pass' => $pass
      );  
	  SsSsetWrite($info,$number.".php");
	RETURN TRUE;
}else{
	RETURN FALSE;
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
function SsSetWrite($Data,$Dir){
	$File = RRrOOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}
function SsSsetWrite($Data,$Dir){
	$File = RRrrOOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}