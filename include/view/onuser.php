<?php
header("Content-Type:text/html;charset=utf-8");
$arrWxapi = SetRead('/system/config/Public/Wxaapi.php');
define("WxAppid", $arrWxapi['APPID']);
define("WxAppsecret", $arrWxapi['SECRET']);
if(!is_dir(ZSystem.'/data/app/WxApp') )mkdir(ZSystem.'/data/app/WxApp');
session_start();
 if(isset($_GET['session3rd'])){
 $session3rd=$_GET['session3rd'];
}
 	if(is_file(ZSystem.'/data/app/WxApp/'.$session3rd.'.php')){
				$arr = SetRead( '/system/data/app/WxApp/'.$session3rd.'.php');
	$sessionKey=$arr['sessionKey'];
	 $openid=$arr['openid'];
			}else{
				$rarr['is3key']=0;
				   ECHO json_encode($rarr);EXIT;
			}
$rarr=array();
		 $sql = "SELECT * FROM wxappid WHERE openid ='{$openid}' and isok=1 order by id desc limit 1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
		if(empty($row)){
$rarr['isbd']=3;
		}ELSE{
		$rarr['isbd']=1;
		$rarr['data']=$row;
		$type=$row['type'];
		$number=$row['number'];
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
case 3://无数据
$info = array();
break;
}
$rarr['info']=$info;
		
		
		
		}

   ECHO json_encode($rarr);
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
