<?php
empty($_POST["step"]) ? $step = '' : $step = $_POST["step"];
$j=date("H");
if($j>=22){
$timee=date("Y-m-d");
}else{$timee=date("Y-m-d",strtotime("-1 day"));}
define("walkcecharoot",ZSystem."/data/app/walking/hdq");
$dir=walkcecharoot.'/'.$timee.'/';
  $fileName = $number.'.jpge';
    $savename = $dir.$fileName;
IF(empty($_POST["step"])){echo '没有步数!';exit;}
 if(!file_exists($savename)) {echo '截图未登记，请重新上传';}else{
	   $savename = $arrInfo['url']."/system/data/app/walking/hdq/".$timee.'/'.$fileName;
	 $sql = "SELECT * FROM step WHERE number ='{$number}' AND data='{$timee}'";
		$row = $DB->once_fetch_array($sql);
		if(!empty($row)){
		 echo '您今天的数据已经提交!';
		}else{
	 $ip=get_real_ip();
	 	$time = time();
	 $sql = "INSERT INTO `step` ( `number`, `nickname`,`userimg`,`step`, `img`, `addtime`, `data`, `isok`, `ip`,`issheng`) VALUES ( '{$number}', '{$_SESSION['zid']['nickname']}', '{$_SESSION['zid']['img']}','{$step}', '{$savename}', '{$time}', '{$timee}',  '1' , '{$ip}' ,0)";

			if(!$DB->query($sql)){
					echo '未知原因，提交失败，请重新尝试';
				} else {
						 echo '上传成功，请等待审核';
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