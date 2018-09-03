<?php
header("Content-Type: text/html; charset=utf-8");
//open session
session_start(); 
require_once dirname(__FILE__)."/CAS/CAS.php";  
//指定log文件
phpCAS::setDebug('./log.log');

//指定cas地址，最后一个true表示是否cas服务器为https，第二个参数为域名或是ip，第三个参数为服务器端口号，第四个参数为上下文路径
phpCAS::client(CAS_VERSION_2_0,'authserver.yctu.edu.cn',80,'authserver',false);

//设置no ssl，即忽略证书检查.如果需要ssl，请用 phpCAS::setCasServerCACert()设置
//setCasServerCACert方法设置ssl证书，
phpCAS::setNoCasServerValidation();
phpCAS::handleLogoutRequests();
phpCAS::forceAuthentication();
IF(EMPTY($_SESSION['my']))
{
		if(is_weixin())$_SESSION['my']='WX';
		if(is_qq()||is_tim())$_SESSION['my']='QQ';
		if(is_wb())$_SESSION['my']='WB';
}
IF($_SESSION['my']=='WX')$bdname='wxid';
IF($_SESSION['my']=='QQ')$bdname='qqid';
IF($_SESSION['my']=='WB')$bdname='wbid';
IF(EMPTY($bdname)){
						$Errormsg=array (
  'error_type' => '提示',
  'msg' => '您不在客户端内访问',
); 
ErrorMsg($Errormsg,'点击返回>>','/home/login');}
if(isset($_GET['logout'])){
	if($_GET['logout']=='zc')
	{
	$number=$_SESSION['zid']['number'];
 $sql = "SELECT * FROM {$bdname} WHERE openid ='{$openid}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
			if(!empty($row)){
				IF($row['islock']==1){echo"2";}
				IF($row['type']==1){
$sql2 = "update jwpass SET isok = 0 where number = '{$number}' and isok = 1";
				$DB->query($sql2);	
			
}
$sql3 = "update mobiles SET isok = 0 where number = '{$number}'";
				$DB->query($sql3);
				if(isset($_SESSION['mobiles']))unset($_SESSION['mobiles']);	
$sql = "update {$bdname} SET isok = 0 ,deletetime = '{$time}'  where openid = '{$openid}' and isok = 1" ;

	if($DB->query($sql))
	{
		if($_SESSION['my']=='WX')unset($_SESSION['zid']);
ECHO"1";
			}else{ECHO"0";}	
}else{
	if($_SESSION['my']=='WX')unset($_SESSION['zid']);
	ECHO"3";
}
	}
	$param = array('service'=>'http://weixin.yctu.edu.cn');
	phpCAS::logout($param);
	exit;
}

	$time = time();
		$openid=$_SESSION['wx']['openid'];
		$nickname=mysql_real_escape_string($_SESSION['wx']['nickname']);
		$img=$_SESSION['wx']['img'];

$QINFO=phpCAS::getAttributes();
$xm=	$QINFO['userName'];
$type=0;
$username=$QINFO['uid'];
IF(strlen($QINFO['uid'])==8||strlen($QINFO['uid'])==10){
$type=1;	

 $sql = "SELECT * FROM {$bdname} WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
			if(empty($row)){
				//写入绑定
		$sql11 = "SELECT * FROM {$bdname} WHERE number ='{$username}' and isok=1";
		$result11 = $DB->query($sql11);
		$row11 = $DB->fetch_array($result11);
		if(!empty($row11)){
				if(@$row11['openid']!=$_SESSION['wx']['openid']){
				//该账号已被绑定
					$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该身份已被其他用户绑定',
); 
ErrorMsg($Errormsg,'点击返回>>','/teacherlogin?logout');}

		if(@$row11['stop']==1){
			$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该微信号被停用',
); 
ErrorMsg($Errormsg,'点击返回>>','/home/login/2');
}}else{


		/*	 $sql = "INSERT INTO `{$bdname}` ( `type`, `number`, `name`, `openid`, `nickname`, `img`,  `addtime`, `deletetime`, `isok`, `islock`, `stop`) VALUES ( 1, '{$username}', '{$name}', '{$openid}', '{$nickname}', '{$img}', '{$time}', NULL, 1, 0, 0);";
			if(!$DB->query($sql)){
				$Errormsg=array (
  'error_type' => '提示',
  'msg' => '数据库故障',
); 
ErrorMsg($Errormsg,'点击返回>>','/home/login/2');
}
	*/		}
			}else{
				IF($row['number']!=$username){
					//该账号已被绑定
					$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该微信已绑定身份',
); 
ErrorMsg($Errormsg,'点击返回>>','/home/login/2');
				}else{
					//已经绑定过
						if($row['stop']==1){
							$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该微信号被停用',
); 
ErrorMsg($Errormsg,'点击返回>>','/home/login/2');

}else{
	$_SESSION['zid']=$row;
	$isbd=1;
	}
				}
			}
 
	
	//ok
//	header("Location:".$arrInfo['url']."/home/loading/".mt_rand(1111,99999));
}
elseIF(strlen($QINFO['uid'])==6){
$type=2;
$numb=preg_replace('/^0+/','',$QINFO['uid']);


$sql = "SELECT * FROM {$bdname} WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
$sql2 = "SELECT * FROM ghzl WHERE name ='{$xm}' and number like '%{$numb}'";
		$row2 = $DB->once_fetch_array($sql2);
		if(empty($row2['id'])){//没有资料
$noghzl=1;
$row2['name']=$xm;
		}
		$sql22 = "SELECT * FROM {$bdname} WHERE number ='{$numb}' and isok=1";
		$result22 = $DB->query($sql22);
		$row2Q = $DB->fetch_array($result22);
		if(!empty($row2Q)){
				if(@$row2Q['openid']!=$_SESSION['wx']['openid']){
					//该账号已被绑定
					$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该身份已被其他用户绑定',
); 
ErrorMsg($Errormsg,'点击返回>>','/teacherlogin?logout');
				}else{
					//已经绑定过
						if($row['stop']==1){
							$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该微信号被停用',
); 
ErrorMsg($Errormsg,'点击返回>>','/home/login/2');}else{
	$_SESSION['zid']=$row;
	}
				}
	}
		
			if(empty($row)){
				//写入绑定
		

	 	
			 $sql = "INSERT INTO `{$bdname}` ( `type`, `number`, `name`, `openid`, `nickname`, `img`,  `addtime`, `deletetime`, `isok`, `islock`, `stop`) VALUES ( 2, '{$numb}', '{$row2['name']}', '{$openid}', '{$nickname}', '{$img}', '{$time}', NULL, 1, 0, 0);";
			if(!$DB->query($sql)){
				$Errormsg=array (
  'error_type' => '提示',
  'msg' => '数据库故障',
); 
			ErrorMsg($Errormsg);
			}else{//绑定成功
			$_SESSION['zid']=$row;
	}
	}else{
				IF($row['number']!=$numb){
					$_SESSION['zid']=$row;
					//该账号已被绑定
					$Errormsg=array (
  'error_type' => '提示',
  'msg' => '本微信账号已绑定身份',
); 

ErrorMsg($Errormsg);
				}else{			//已经绑定过
	if($row['stop']==1){
							$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该微信号被停用',
); 
ErrorMsg($Errormsg);}else{
	$_SESSION['zid']=$row;
	$isbd=1;
	}
				}
	}

	
if(isset( $_SESSION['backurl']))
{ 
$URLL=$_SESSION['backurl'];
unset($_SESSION['backurl']);
if (strpos($URLL, $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) === false&&strpos( 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],$URLL) === false ) {header("Location:".$URLL);}ELSE{
	$xurl=$arrInfo['url']."/home/index/".mt_rand(1111,9999999);
}
}ELSE{
	$xurl=$arrInfo['url']."/home/index/".mt_rand(1111,9999999);
}

}

?>