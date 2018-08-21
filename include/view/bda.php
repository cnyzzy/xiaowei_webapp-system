<?php
define('RROOT',ZRoot.'/system/data/app/home/alogin/');
empty($Operate) ? $CHO = '1' : $CHO = $Operate;
session_start();

	if(empty($_SESSION['wx'])||empty($_SESSION['wx']['openid']))
	{
ECHO'0';

exit; }
	define('URL',$arrInfo['jwurl']);
	$time = time();
		$openid=$_SESSION['wx']['openid'];
		$nickname=mysql_real_escape_string($_SESSION['wx']['nickname']);

if($CHO=='exit')
{
//解除绑定
		$number=$_SESSION['zid']['number'];
 $sql = "SELECT * FROM wxappid WHERE number ='{$number}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
			if(!empty($row)){
				IF($row['islock']==1){echo"2";EXIT();}
				IF($row['type']==1){
$sql2 = "update jwpass SET isok = 0 where number = '{$number}' and isok = 1";
				if(!($DB->query($sql2)))EXIT("0");	
			
}
$sql3 = "update mobiles SET isok = 0 where number = '{$number}'";
				if(!($DB->query($sql3)))EXIT("0");
				if(isset($_SESSION['mobiles']))unset($_SESSION['mobiles']);	
$sql = "update wxappid SET isok = 0 ,deletetime = '{$time}'  where openid = '{$row['openid']}' and isok = 1" ;

	if($DB->query($sql))
	{
		if($_SESSION['my']=='WXAPP')unset($_SESSION['zid']);
ECHO"1";EXIT;
			}else{ECHO"0";EXIT;}	
}else{
	if($_SESSION['my']=='WXAPP')unset($_SESSION['zid']);
	ECHO"3";EXIT;
}}
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
fclose($fp);}function Readcode($id,$y='0'){ 
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
            'message'   => "模拟登陆失败，网址可能已改变",
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

?>