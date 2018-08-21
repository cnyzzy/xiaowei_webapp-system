<?php
empty($params[0]) ? $LId = '1' : $LId = $params[0];
empty($params[1]) ? $id = '1' : $id = $params[1];
	$Cjhd = new Cjhd($DB);

IF($LId == 'addon'){


	    $sql = "SELECT  id FROM cjhd_on WHERE number ='{$number}' and sid='$id' and isok='1'";
		$row = $DB->once_fetch_array($sql);
		if(!empty($row))
		{
			$arr['ok']=2; 
$arr['content']="失败"; 
echo json_encode($arr);	
		exit;
		}
		
		

$Cjhd = new Cjhd($DB);
 $ip=get_real_ip();
$Arr = $Cjhd->AddCjhd_on($id,$_SESSION['zid']['name'],$_SESSION['zid']['number'],$_SESSION['wx']['nickname'],$_SESSION['wx']['openid'],$_SESSION['zid']['type'],$_SESSION['wx']['img'],$ip);

if(empty($Arr))
{
			$arr['ok']=0; 
$arr['content']="失败"; 
echo json_encode($arr);	
exit();
}else{
			
		  $arr['ok']=1; 
echo json_encode($arr);	
exit(); 
	  
 }
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