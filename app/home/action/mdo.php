<?php
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 
define("MobileDir",ZRoot.'/temp/mobile/');
$number = $_POST['mobile'];

//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],62,6,$appname,$_SESSION['admin']['rightint']);
switch($ch){
	
		case "nocode":
		$mobile = $_POST['mobile'];
		$openid=$_SESSION['zid']['openid'];
		$query = $DB->query("select * from mobiles where mobile = '$mobile' and number='{$_SESSION['zid']['number']}' and openid='$openid' and isok='1'");

		$Num = $DB->num_rows($query);
		if($Num == 0){
			echo '2';
			$sql2Q ="select * from mobiles where openid='{$_SESSION['wx']['openid']}' and number='{$_SESSION['zid']['number']}' and isok='1'";
		$result2Q = $DB->query($sql2Q);
		$row2Q= $DB->fetch_array($result2Q);
			$_SESSION['mobiles']=$row2Q;
			exit();
		}
	    $sql = "DELETE FROM mobiles where openid='$openid' and isok='1'";
		$row = $DB->query($sql);
			echo '1';
			break;
	case "mobile":
	$mobile = $_POST['mobile'];
$openid=$_SESSION['zid']['openid'];
	$name = addslashes(trim($_SESSION['zid']['name']));
		$query = $DB->query("select * from mobiles where  mobile='$mobile' and number='{$_SESSION['zid']['number']}' and openid='$openid' and isok='1'");
		$Num = $DB->num_rows($query);
		if($Num != 0){
			echo '2';
			exit();
		}
		$query = $DB->query("select * from mobiles where mobile='$mobile' and number='{$_SESSION['zid']['number']}' and openid='$openid' and isok='0'");
		$Num = $DB->num_rows($query);
		if($Num == 0) {
	$type = $_SESSION['zid']['type'];
	$number = $_SESSION['zid']['number'];
	
		if($type && $number){
			$id = $DB->create('mobiles',array(
				'type'		=> $type,
				'number'		=> $number,
				'openid'       => $openid,				
				'mobile'		=> $mobile,
				'name'	=> $name,
				'addtime'	=> time(),
				'vtime'	=> NULL,
				'isok'	=> 0,
		));}}
					$code=ReadTime($mobile);
			if($code){

$array = array(
            'name'=>  $name,
            'code' =>  strval(Readcode($mobile)),
			);
$alisms = new AliSms("23652763","07abfa3eb48638a0e0917e22aa68a4f0");
$result = $alisms->sign('盐城师范学院')->data($array)->code("SMS_49320109")->send($mobile);
if($result['status'] !='1'){
	WriteLog($mobile,$result);
	echo "4";exit();}
			}else{echo "3";exit();}

		echo '1';	
		break;
		case "vcode":
		$mobile = $_POST['mobile'];
		$code = $_POST['code'];
		$openid=$_SESSION['zid']['openid'];
	$name = addslashes(trim($_SESSION['zid']['name']));
		$query = $DB->query("select * from mobiles where openid='$openid' and number='{$_SESSION['zid']['number']}' and mobile='$mobile' and isok='1'");
		$Num = $DB->num_rows($query);
		if($Num != 0){
			echo '2';//已绑定
			exit();
		}
		$query = $DB->query("select * from mobiles where mobile='$mobile' and number='{$_SESSION['zid']['number']}' and openid='$openid' and isok='0'");
		$Num = $DB->num_rows($query);
		if($Num != 0&&is_file(MobileDir.$mobile.".php")) {
			$Info= SetRead('/temp/mobile/'.$mobile.".php");	
			if($Info['time']<(time()-600)){
				echo '4';//超时
			exit();	
				}else{
					if($Info['zcode'])
	{
		if($code==$Info['zcode']){
		$DB->query("UPDATE mobiles SET isok = '1' where mobile='$mobile' and number='{$_SESSION['zid']['number']}' and openid='$openid'");	
		$DB->query("UPDATE mobiles SET vtime = '".time()."' where mobile='$mobile' and number='{$_SESSION['zid']['number']}' and openid='$openid'");	
	echo"1";
	exit();
		}else{echo '5';//验证码不正确
			exit();	}
	}
				}
		}else{
		echo '3';//非法
			exit();	
		}
		default:
		echo '0';
		break;
	}
function ReadTime($mobile){ 
		if(is_file(MobileDir.$mobile."s.php"))
	{
			$Info= SetRead('/temp/mobile/'.$mobile.'s.php');	
			if($Info['time']<(time()-60)){
				return WriteTime($mobile);
				}else{
				return false;
				}
		}else{
				return	WriteTime($mobile);
			}
}

	function WriteTime($mobile){ 

	$array = 
	array (
		'time' => time(),
		);
	SetWrite($array,'/temp/mobile/'.$mobile.'s.php');
	return true;
}
	function WriteLog($mobile,$r){ 
if(!is_dir(ZRoot.'/temp/mobile/log') )mkdir(ZRoot.'/temp/mobile/log');
	$array =$r;
	SetWrite($array,'/temp/mobile/log/'.$mobile.'s'.time().'.php');
	return true;
}
function Readcode($mobile= ''){ 
		if(is_file(MobileDir.$mobile.".php"))
	{
			$Info= SetRead('/temp/mobile/'.$mobile.".php");	
			if($Info['time']<(time()-600)){
				return WriteZcode($mobile);
				}else{
				return $Info['zcode'];
				}
		}else{
				return	WriteZcode($mobile);
			}
}

	function WriteZcode($mobile= ''){ 
	$zcode = rand(1000,9999);
	$array = 
	array (
		'zcode' => $zcode,
		'time' => time(),
		);
	SetWrite($array,'/temp/mobile/'.$mobile.".php");
	return $zcode;
}	
?>