<?php
$arrWxapi = SetRead('/system/config/Public/Wxaapi.php');
define("WxAppid", $arrWxapi['APPID']);
define("WxAppsecret", $arrWxapi['SECRET']);
include_once "wxBizDataCrypt.php";
if(!is_dir(ZSystem.'/data/app/WxApp') )mkdir(ZSystem.'/data/app/WxApp');
empty($Operate) ? $CHO = '1' : $CHO = $Operate;
		$j=date("H");
if($j>=22){
$timee=date("Y-m-d");
}else{$timee=date("Y-m-d",strtotime("-1 day"));}
if($CHO=='read')
{
	$Arr=array();
 if(isset($_GET['session3rd'])){
 $session3rd=$_GET['session3rd'];
}else{EXIT;}
 	if(is_file(ZSystem.'/data/app/WxApp/'.$session3rd.'.php')){
				$arr = SetRead( '/system/data/app/WxApp/'.$session3rd.'.php');
	$sessionKey=$arr['sessionKey'];
	 $openid=$arr['openid'];
			}
		 $sql = "SELECT * FROM wxappid WHERE openid ='{$openid}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);	
				if(empty($row)){
$Arr['isok']='3';
$Arr['msg']='尚未绑定';
ob_flush();
ob_clean();
echo trim(json_encode($Arr));
exit;
		}ELSE{
			$number=$row['number'];
			$nickname=$row['nickname'];
			$img=$row['img'];
		}
 $sql = "SELECT * FROM step WHERE number ='{$number}' and data='{$timee}'";
		$row = $DB->once_fetch_array($sql);
		if(empty($row)){
	$Arr['isok']='2';
$Arr['timee']=$timee;
$Arr['msg']='当前尚未同步数据';
ob_flush();
ob_clean();
echo trim(json_encode($Arr));
				exit;
		}else{$wei=0; 
		 $sq2 = "select count(1) as No from step where step >= (select step from step where step.number = '{$number}' and  data='{$timee}')and  data='{$timee}' and isok = 1;";
	if($row['isok']==0) $sq2 = "select count(1) as No from step where step >= (select step from step where step.number = '{$number}' and  data='{$timee}')and  data='{$timee}';";
$result2 =$DB->once_fetch_array($sq2);	
	$Arr['isok']='1';
	$Arr['step']=$row['step'];
	$Arr['timee']=$timee;
$Arr['no']=$result2[0];
ob_flush();
ob_clean();
echo trim(json_encode($Arr));
exit;
}
}else{
 if(isset($_GET['session3rd'])&&isset($_GET['d'])){
 $session3rd=$_GET['session3rd'];
  $encryptedData=$_GET['d'];
 $iv=$_GET['iv'];}
 	if(is_file(ZSystem.'/data/app/WxApp/'.$session3rd.'.php')){
				$arr = SetRead( '/system/data/app/WxApp/'.$session3rd.'.php');
	$sessionKey=$arr['sessionKey'];
	 $openid=$arr['openid'];
			}
		 $sql = "SELECT * FROM wxappid WHERE openid ='{$openid}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
		if(empty($row)){
								$Arr['isok']='3';
								$Arr['msg']='尚未绑定';
									ob_flush();
ob_clean();
			    echo trim(json_encode($Arr));
				exit;
		}ELSE{
			$number=$row['number'];
			$nickname=$row['nickname'];
			$img=$row['img'];
		}
		$data='';
$pc = new WXBizDataCrypt(WxAppid, $sessionKey);
$errCode = $pc->decryptData($encryptedData, $iv, $data );

if ($errCode == 0) {
    $yarr=json_decode($data,true);
	$stepInfoList=$yarr['stepInfoList'];

	$ArrStep=array();
	for($i=0;$i<count($stepInfoList);$i++){        
	$ArrStep[date("Y-m-d",$stepInfoList[$i]['timestamp'])]=$stepInfoList[$i]['step'];   
	}
if(isset($ArrStep[$timee]))
{$Arr['step']=$ArrStep[$timee];
$step=$Arr['step'];
$Arr['timee']=$timee;
$Arr['isok']='1';
	 $sql = "SELECT * FROM step WHERE number ='{$number}' AND data='{$timee}'";
		$row = $DB->once_fetch_array($sql);
		if(!empty($row)){
$sql = "delete from step where number = '{$number}' and data = '{$timee}'" ;
	if(!$DB->query($sql)){$Arr['isok']='0';	$Arr['msg']="数据库重写步数";}
		}	
	 $ip=get_real_ip();
	 	$time = time();
	 $sql = "INSERT INTO `step` ( `number`, `nickname`,`userimg`,`step`, `img`, `addtime`, `data`, `isok`, `ip`,`issheng`) VALUES ( '{$number}', '{$nickname}', '{$img}','{$step}', '', '{$time}', '{$timee}',  '1' , '{$ip}' ,0)";

			if(!$DB->query($sql)){
					$Arr['isok']='0';
					$Arr['msg']="无法写入步数";
				} else {
					$Arr['isok']='1';
					$Arr['step']=$step;
		}

}else{
	$Arr['time']=$timee;
		$Arr['msg']="还没有当前步数";
$Arr['isok']='2';
}
	ob_flush();
ob_clean();
    echo trim(json_encode($Arr));
	exit();
} else {
 $errCod['code']=$errCode;
	 $errCod['session3rd']=$session3rd;
  $errCod['encryptedData']= $encryptedData;
 $errCod['iv']=$iv;
 
  $errCod['OPENID']=$openid;
  	ob_flush();
ob_clean();
     echo json_encode($errCod);

}
}
  //$signature2 = sha1($rawData . $sessionKey);
   // if ($signature2 !== $signature) return ret_message("signNotMatch");
function SSetWrite($Data,$Dir){
	$File = ZRoot.'/system/data/app/WxApp/'.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}	
 /**
 * 发起http请求
 * @param string $url 访问路径
 * @param array $params 参数，该数组多于1个，表示为POST
 * @param int $expire 请求超时时间
 * @param array $extend 请求伪造包头参数
 * @param string $hostIp HOST的地址
 * @return array    返回的为一个请求状态，一个内容
 */
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
function makeRequest($url, $params = array(), $expire = 0, $extend = array(), $hostIp = '')
{
    if (empty($url)) {
        return array('code' => '100');
    }

    $_curl = curl_init();
    $_header = array(
        'Accept-Language: zh-CN',
        'Connection: Keep-Alive',
        'Cache-Control: no-cache'
    );
    // 方便直接访问要设置host的地址
    if (!empty($hostIp)) {
        $urlInfo = parse_url($url);
        if (empty($urlInfo['host'])) {
            $urlInfo['host'] = substr(DOMAIN, 7, -1);
            $url = "http://{$hostIp}{$url}";
        } else {
            $url = str_replace($urlInfo['host'], $hostIp, $url);
        }
        $_header[] = "Host: {$urlInfo['host']}";
    }

    // 只要第二个参数传了值之后，就是POST的
    if (!empty($params)) {
        curl_setopt($_curl, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($_curl, CURLOPT_POST, true);
    }

    if (substr($url, 0, 8) == 'https://') {
        curl_setopt($_curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($_curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    }
    curl_setopt($_curl, CURLOPT_URL, $url);
    curl_setopt($_curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($_curl, CURLOPT_USERAGENT, 'API PHP CURL');
    curl_setopt($_curl, CURLOPT_HTTPHEADER, $_header);

    if ($expire > 0) {
        curl_setopt($_curl, CURLOPT_TIMEOUT, $expire); // 处理超时时间
        curl_setopt($_curl, CURLOPT_CONNECTTIMEOUT, $expire); // 建立连接超时时间
    }

    // 额外的配置
    if (!empty($extend)) {
        curl_setopt_array($_curl, $extend);
    }

    $result['result'] = curl_exec($_curl);
    $result['code'] = curl_getinfo($_curl, CURLINFO_HTTP_CODE);
    $result['info'] = curl_getinfo($_curl);
    if ($result['result'] === false) {
        $result['result'] = curl_error($_curl);
        $result['code'] = -curl_errno($_curl);
    }

    curl_close($_curl);
    return $result;
}  
function getJson($url,$post=''){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 if($post) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        }
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output, true);
	
}
function ret_message($message = "") {
    if ($message == "") return ['result'=>0, 'message'=>''];
    $ret = lang($message);

    if (count($ret) != 2) {
        return ['result'=>-1,'message'=>'未知错误'];
    }
    return array(
        'result'  => $ret[0],
        'message' => $ret[1]
    );
}
/**
 * 读取/dev/urandom获取随机数
 * @param $len
 * @return mixed|string
 */
function randomFromDev($len,$format='ALL') {
   $is_abc = $is_numer = 0;
$password = $tmp =''; 
switch($format){
case 'ALL':
$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
break;
case 'CHAR':
$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
break;
case 'NUMBER':
$chars='0123456789';
break;
default :
$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
break;
} 
mt_srand((double)microtime()*1000000*getmypid());
while(strlen($password)<$len){
$tmp =substr($chars,(mt_rand()%strlen($chars)),1);
if(($is_numer <> 1 && is_numeric($tmp) && $tmp > 0 )|| $format == 'CHAR'){
$is_numer = 1;
}
if(($is_abc <> 1 && preg_match('/[a-zA-Z]/',$tmp)) || $format == 'NUMBER'){
$is_abc = 1;
}
$password.= $tmp;
}
if($is_numer <> 1 || $is_abc <> 1 || empty($password) ){
$password = randpw($len,$format);
}
return $password;
}
?>