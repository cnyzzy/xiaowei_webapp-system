<?php
defined('ZRoot') or die('Access Denied.');

class Wx {

function zGetAtoken(){ 
$x=1; 
do {
  $atoken=$this->GetAtoken();
  $x++;
} while ((!$atoken||EMPTY($atoken))&&$x<4);
return  $atoken;
}
  public function getSignPackage() {
	  $arrWxapi = SetRead('/system/config/Public/Wxapi.php');
    $jsapiTicket = $this->GetJsApiTicket();

    // 注意 URL 一定要动态获取，不能 hardcode.
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $timestamp = time();
    $nonceStr = $this->createNonceStr();

    // 这里参数的顺序要按照 key 值 ASCII 码升序排序
    $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

    $signature = sha1($string);

    $signPackage = array(
      "appId"     => $arrWxapi['APPID'],
      "nonceStr"  => $nonceStr,
      "timestamp" => $timestamp,
      "url"       => $url,
      "signature" => $signature,
      "rawString" => $string
    );
    return $signPackage; 
  }
  public function getSignPackageU($url) {
	  $arrWxapi = SetRead('/system/config/Public/Wxapi.php');
    $jsapiTicket = $this->GetJsApiTicket();

    // 注意 URL 一定要动态获取，不能 hardcode.


    $timestamp = time();
    $nonceStr = $this->createNonceStr();

    // 这里参数的顺序要按照 key 值 ASCII 码升序排序
    $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

    $signature = sha1($string);

    $signPackage = array(
      "appId"     => $arrWxapi['APPID'],
      "nonceStr"  => $nonceStr,
      "timestamp" => $timestamp,
      "url"       => $url,
      "signature" => $signature,
      "rawString" => $string
    );
    return $signPackage; 
  }
  private function createNonceStr($length = 16) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
  }
function GetJsApiTicket(){ 
$Atokenid = $this->zGetAtoken();
    if ($Atokenid) {
$atoken = SetRead('/system/config/Public/jsatoken.php');
IF(!$atoken['time']||!$atoken['pertime']){
	unset($atoken);
	$atoken=array (
  'ticket' => 0,
  'time' => 0,
  'pertime' => 0,
);}
    if ($atoken['time']+$atoken['pertime'] < time()||EMPTY($atoken['time'])||EMPTY( $atoken['ticket'])) {
    $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=".$Atokenid;
    $res = $this->getJson($url);
    $ticket = $res['ticket'];
	$expires_in = $res['expires_in'];
      if($ticket&&$expires_in) {
        $atoken['time'] = time();
        $atoken['ticket'] = $ticket;
		if($expires_in<$atoken['pertime']||$atoken['pertime']<846||!$atoken['pertime'])$atoken['pertime']=$expires_in;
		
		SetWrite( $atoken,'/system/config/Public/jsatoken.php');
      }ELSE{ $ticket = FALSE;}
    } else {
      $ticket = $atoken['ticket'];
    }
     return $ticket;
}}
function ReGetAtoken(){ 
$arrWxapi = SetRead('/system/config/Public/Wxapi.php');

	$atoken=array (
  'atoken' => 0,
  'time' => 0,
  'pertime' => 0,
);
 
    $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$arrWxapi['APPID']."&secret=".$arrWxapi['SECRET'];
    $res = $this->getJson($url);
    $access_token = $res['access_token'];
	$expires_in = $res['expires_in'];
      if($access_token&&$expires_in) {
        $atoken['time'] = time();
        $atoken['atoken'] = $access_token;
		if($expires_in<$atoken['pertime']||$atoken['pertime']<846||!$atoken['pertime'])$atoken['pertime']=$expires_in;
		
		SetWrite( $atoken,'/system/config/Public/atoken.php');
      }ELSE{ $access_token = FALSE;}
  
     return $access_token;
  }
function GetAtoken(){ 
$arrWxapi = SetRead('/system/config/Public/Wxapi.php');
$atoken = SetRead('/system/config/Public/atoken.php');
IF(!$atoken['time']||!$atoken['pertime']){
	unset($atoken);
	$atoken=array (
  'atoken' => 0,
  'time' => 0,
  'pertime' => 0,
);}
    if ($atoken['time']+$atoken['pertime'] < time()||EMPTY($atoken['time'])||EMPTY( $atoken['atoken'])) {
    $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$arrWxapi['APPID']."&secret=".$arrWxapi['SECRET'];
    $res = $this->getJson($url);
		if(empty($res['access_token']))
	{
		// PRINT_R( $res);
		 //EXIT;
	}
    $access_token = $res['access_token'];
	$expires_in = $res['expires_in'];
	
      if($access_token&&$expires_in) {
        $atoken['time'] = time();
        $atoken['atoken'] = $access_token;
		if($expires_in<$atoken['pertime']||$atoken['pertime']<846||!$atoken['pertime'])$atoken['pertime']=$expires_in;
		
		SetWrite( $atoken,'/system/config/Public/atoken.php');
      }ELSE{ $access_token = FALSE;}
    } else {
      $access_token = $atoken['atoken'];
    }
     return $access_token;
  }
   function GetReplyRule(){ 
$Atoken = $this->zGetAtoken();
    if ($Atoken) {
    $url = "https://api.weixin.qq.com/cgi-bin/get_current_autoreply_info?access_token=".$Atoken;
    $res = $this->getJson($url);
     return  $res;
   }
   }
    function GetTestCert(){ 
$arrWxapi = SetRead('/system/config/Public/Wxapi.php');

    if ($arrWxapi) {
    $url = "https://api2.weixin.qq.com/testcert?appid=".$arrWxapi['APPID'];
	  $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $output = curl_exec($ch);
    curl_close($ch);
    return $output;

   }
   }
  
      function GetArticleTotal($date){ 
$Atoken = $this->zGetAtoken();
    if ($Atoken) {
    $url = "https://api.weixin.qq.com/datacube/getarticletotal?access_token=".$Atoken;
	

		 $post["begin_date"] = strval($date);
		 $post["end_date"] = strval($date);
		$p= json_encode($post);
    $res = $this->getJson($url,'',$p);
     return  $res;
   }
   }
         function UpdateRemark($openid,$name){ 
$Atoken = $this->zGetAtoken();
    if ($Atoken) {
    $url = "https://api.weixin.qq.com/cgi-bin/user/info/updateremark?access_token=".$Atoken;
	

		 $post["openid"] = $openid;
		 $post["remark"] = $name;
		 	 
		$p= json_encode_ex($post);
    $res = $this->getJson($url,'',$p);
     return  $res;
   }
   }
   
            function UpdateTagging($openid,$name){ 
$Atoken = $this->zGetAtoken();
    if ($Atoken) {
    $url = "https://api.weixin.qq.com/cgi-bin/tags/members/batchtagging?access_token=".$Atoken;
	
$openid_list=ARRAY(
'0'=>$openid,);
		 $post["openid_list"] = $openid_list;
		 $post["tagid"] = $name;
	
		$p= json_encode($post);
    $res = $this->getJson($url,'',$p);
     return  $res;
   }
   }
         function GetUserInfo($date){ 
$Atoken = $this->zGetAtoken();
    if ($Atoken) {
    $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$Atoken."&openid=".$date."&lang=zh_CN";
	

    $res = $this->getJson($url);
     return  $res;
   }
   }
      function GetMaterialCount(){ 
$Atoken = $this->zGetAtoken();
    if ($Atoken) {
    $url = "https://api.weixin.qq.com/cgi-bin/material/get_materialcount?access_token=".$Atoken;
	
    $res = $this->getJson($url);
     return  $res;
   }
   }
         function GetMaterialList($type,$offset=0,$count=1){ 
$Atoken = $this->zGetAtoken();
    if ($Atoken) {
		 $post['type'] = $type;
		 $post['offset'] = $offset;
		 $post['count'] = $count;
    $url = "https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=".$Atoken;
    $res = $this->getJson($url,$post);
     return  $res;
   }
   }
            function GetMaterial($media_id){ 
$Atoken = $this->zGetAtoken();
    if ($Atoken) {
		 $post['media_id'] = $media_id;
    $url = "https://api.weixin.qq.com/cgi-bin/material/get_material?access_token=".$Atoken;
    $res = $this->getJson($url,$post);
     return  $res;
   }
   }
function getJson($url,$post='',$json=''){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 if($post) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
			
        }
		 if($json) {
           curl_setopt($ch, CURLOPT_POSTFIELDS,$json);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($json))
);
        }
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output, true);
}
	}
	if (version_compare(PHP_VERSION, '5.4.0') >= 0) {
function json_encode_ex($var) {
return json_encode($var, JSON_UNESCAPED_UNICODE);
}
} else {
function json_encode_ex($var) {
if ($var === null)
return 'null';
 
if ($var === true)
return 'true';
if ($var === false)
return 'false';
static $reps = array(
array("", "/", "n", "t", "r", "b", "f", '"', ),
array('', '/', 'n', 't', 'r', 'b', 'f', '"', ),
);
if (is_scalar($var))
return '"' . str_replace($reps[0], $reps[1], (string) $var) . '"';
if (!is_array($var))
throw new Exception('JSON encoder error!');
$isMap = false;
$i = 0;
foreach (array_keys($var) as $k) {
if (!is_int($k) || $i++ != $k) {
$isMap = true;
break;
}
}
$s = array();
if ($isMap) {
foreach ($var as $k => $v)
$s[] = '"' . $k . '":' . call_user_func(__FUNCTION__, $v);
return '{' . implode(',', $s) . '}';
} else {
foreach ($var as $v)
$s[] = call_user_func(__FUNCTION__, $v);
return '[' . implode(',', $s) . ']';
}
}
}