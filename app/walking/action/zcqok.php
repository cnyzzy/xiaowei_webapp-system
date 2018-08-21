<?php
empty($_POST["step"]) ? $step = '' : $step = $_POST["step"];
$j=date("H");
if($j>=6){
$timee=date("Y-m-d");
}else{$timee=date("Y-m-d",strtotime("-1 day"));}
define("walkcecharoot",ZSystem."/data/app/walking/zcq");
$dir=walkcecharoot.'/'.$timee.'/';
  $fileName = $number.'.jpge';
    $savename = $dir.$fileName;
	if($j>=8||$j<6)
	{

		echo '只能在6点到8点之间操作';
exit;
	}	
IF(empty($_POST["step"])){echo '没有步数!';exit;}
 if(!file_exists($savename)) {echo '截图未登记，请重新上传';}else{
	   $savename = $arrInfo['url']."/system/data/app/walking/zcq/".$timee.'/'.$fileName;
	 $sql = "SELECT * FROM stepzc WHERE number ='{$number}' AND data='{$timee}'";
		$row = $DB->once_fetch_array($sql);
		if(!empty($row)){
		 echo '您今天的数据已经提交!';
		}else{
	 $ip=get_real_ip();
	 	$time = time();
		$sql2 = "SELECT * FROM jwinfo WHERE number ='{$number}' and isok=1";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
		if(empty($info)){
					echo '没有资料，请前往查看个人资料并进行更新';exit;
				}
	 $sql = "INSERT INTO `stepzc` ( `number`, `name`,`xy`,`xzb`, `szj`,`nickname`,`userimg`,`step`, `img`, `addtime`, `data`, `isok`, `ip`,`issheng`) VALUES ( '{$number}','{$_SESSION['zid']['name']}','{$info['xy']}','{$info['xzb']}','{$info['szj']}', '{$_SESSION['zid']['nickname']}', '{$_SESSION['zid']['img']}','{$step}', '{$savename}', '{$time}', '{$timee}',  '1' , '{$ip}' ,0)";

			if(!$DB->query($sql)){
					echo '未知原因，提交失败，请重新尝试';
				} else {
						 echo '上传成功';
		}}

 }
 function get_real_ip(){
$ip=false;
if(!empty($_SERVER["HTTP_CLIENT_IP"])){
$ip = $_SERVER["HTTP_CLIENT_IP"];
}
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
for ($i = 0; $i < count($ips); $i++) {
if (!eregi ("^(10|172\.16|192\.168)\.", $ips[$i])) {
$ip = $ips[$i];
break;
}
}
}
return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}
?>