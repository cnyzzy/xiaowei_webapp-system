<?php
define('RROOT',ZRoot.'/system/data/app/home/qlogin/');
if(is_weixin()){
 $url = "/home/login";
	header("Location:".$url); 
exit;
	}
	if(is_wb()){
 $url = "/home/tlogin";
	header("Location:".$url); 
exit;
	}	
		if(!is_qq()&&!is_tim()&&!is_weixin()&&!is_wb())
{
			$url = "/noh/";
		$_SESSION['backurl']='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
header("Location:".$url.$_SESSION['backurl']); 	}


	if(isset($_SESSION['zid']['number'])&&ISSET($_SESSION['wx']['openid'])){
			 $sql = "SELECT * FROM qqid WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
		if(!empty($row))header("Location:/home"); 
	}	
	//print_r($_SESSION['wx']);
empty($params[0]) ? $LId = '1' : $LId = $params[0];
if($LId == '1'){
define('URL',$arrInfo['jwurl']);
 $idd=session_id();
    $_SESSION['idd']=$idd;
$res = Readcode($idd);
if(isset($res['status'])){
$Errormsg=array (
  'error_type' => '提示',
  'msg' => $res['message'],
); 
ErrorMsg($Errormsg);}
$_SESSION['res']=$res;
}
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