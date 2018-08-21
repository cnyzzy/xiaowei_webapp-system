<?php
ob_clean();
header('Content-Type:image/gif');
define('RROOT',ZRoot.'/system/data/app/home/login/');
$rarr=array();
 if(isset($_GET['session3rd'])){
 $session3rd=$_GET['session3rd'];
}else{
$rarr['isok']	='3';
  ECHO json_encode($rarr);
  EXIT;
}
 	if(is_file(ZSystem.'/data/app/WxApp/'.$session3rd.'.php')){
				$arr = SetRead( '/system/data/app/WxApp/'.$session3rd.'.php');
	$sessionKey=$arr['sessionKey'];
	 $openid=$arr['openid'];
			}else{
$rarr['isok']	='2';
  ECHO json_encode($rarr);
  EXIT;
}

define('URL',$arrInfo['jwurl']);
 $idd=$openid;
$res = Readcode($idd);

if(isset($res['status'])){
	$rarr['isok']	='0';
$rarr['error']=array (
  'error_type' => '提示',
  'msg' => $res['message'],
); 
ECHO json_encode($rarr);
}




     $iii = ($res[1]);  
	    $authcode_url='http://'.$arrInfo['jwurl'].'/('.$iii.')/CheckCode.aspx';
   //ECHO  $authcode_url;
   $curl   = curl_init();  
   curl_setopt($curl, CURLOPT_URL, $authcode_url);
	curl_setopt($curl, CURLOPT_REFERER, 'http://'.$arrInfo['jwurl'].'/('.$iii.')/default2.aspx');
    curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,2); 
	curl_setopt($curl, CURLOPT_TIMEOUT,2); 
   $data = curl_exec($curl);        //得到图片数据 
   if(empty($data)){readfile(ZApp.'/home/model/images/vcode.jpg');} 
curl_close($curl);  
print_r($data);
function Readcode($id,$y='0'){ 
		if(is_file(RROOT.$id.".php"))
	{
			$Info= SSetRead($id.".php");	
			if($Info['time']<(time()-600)||$y==1){
				return Writecode($id);
				}else{
				return $Info['res'];
				}
		}else{
				return	Writecode($id);
			}
}

	function Writecode($id){ 
//开启读取身份码
     $url               = 'http://'.URL;
     $result            = curl_request($url);
     if (empty($result)) {
     return array(
            'status'    => "0",
            'message'   => "模拟登陆失败，教务系统网址可能改变",
         );    
     }
	 
     preg_match('/Location: \/\((.*)\)/', $result,$temp);
	     $url = 'http://'.URL.'/('.$temp[1].')/default2.aspx';
     $result            = curl_request($url);
     $pattern           = '/<input type="hidden" name="__VIEWSTATE" value="(.*?)" \/>/is';
     preg_match_all($pattern, $result, $matches);
     $res[0]            = $matches[1][0];
     $res[1]            = $temp[1];
	 $pattern2           = '/<input type="hidden" name="__VIEWSTATEGENERATOR" value="(.*?)" \/>/is';
     preg_match_all($pattern2, $result, $matches2);
     $res[3]            = $matches2[1][0];
	$array = 
	array (
		'res' => $res,
		'time' => time(),
		);
	SSetWrite($array,$id.".php");
	return $res;
}	 
   function curl_request($url,$post='',$referer=''){//$cookie='', $returnCookie=0,
        $curl   = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)');
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_REFERER, $referer);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        if($post) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
        }

        if ($referer) {
             curl_setopt($curl, CURLOPT_REFERER, $referer);
        }
        $data = curl_exec($curl);
        curl_close($curl);
        return $data;       
}
function SSetRead($Dir){
	$arrData = require_once RROOT.$Dir;
	return $arrData;
}
function SSetWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}