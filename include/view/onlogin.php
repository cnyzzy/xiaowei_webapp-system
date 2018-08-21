<?php
header("Content-Type:text/html;charset=utf-8");
$arrWxapi = SetRead('/system/config/Public/Wxaapi.php');
define("WxAppid", $arrWxapi['APPID']);
define("WxAppsecret", $arrWxapi['SECRET']);
if(!is_dir(ZSystem.'/data/app/WxApp') )mkdir(ZSystem.'/data/app/WxApp');
session_start();
 if(isset($_GET['code'])){
 $codes=$_GET['code'];}else{ECHO"NO";}
$params = array(
        'appid' => WxAppid,
        'secret' => WxAppsecret,
        'js_code' => @$codes,
        'grant_type' => 'authorization_code'
    );
    $res = makeRequest('https://api.weixin.qq.com/sns/jscode2session?appid='.WxAppid.'&secret='.WxAppsecret.'&js_code='.@$codes.'&grant_type=authorization_code');

    if ($res['code'] !== 200 || !isset($res['result']) || !isset($res['result'])) {
        echo json_encode(ret_message('requestTokenFailed'));
		
    }
    $reqData = json_decode($res['result'], true);
    if (!isset($reqData['session_key'])) {
		IF(@$reqData['errcode']=='40163'||@$reqData['errcode']=='40029')
		{
				$data['error'] = $reqData['errcode'];
		}
        echo json_encode(ret_message('FailedCode:'.$reqData['errcode']));
		
    }
    $sessionKey = @$reqData['session_key'];
 $openid = @$reqData['openid'];
 $data = json_decode(@$data, true);
    $session3rd = randomFromDev(16);
	$data['session3rd'] = $session3rd;
    $data2['session3rd'] = $session3rd;
	$data2['sessionKey'] = $sessionKey;
	$data2['openid'] = $openid;
	if(is_file(ZSystem.'/data/app/WxApp/'.$session3rd.'.php')){
				unlink( '/system/data/app/WxApp/'.$session3rd.'.php');
			}

SSetWrite( $data2 ,$session3rd.'.php');

   ECHO json_encode($data);
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


        return '未知错误';

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
