<?php
define('RROOT',ZRoot.'/system/data/app/home/login/');
	if(empty($_SESSION['wx']['openid'])){
		$Errormsg=array (
  'error_type' => '提示',
  'msg' => '您还没有登录',
); 
ErrorMsg($Errormsg);
	}	
$number=$_SESSION['zid']['number'];
$type=$_SESSION['zid']['type'];
		if($type!='3'){
$isstop=1;
	}else{
		$isstop=0;
	}	
empty($params[0]) ? $LId = '1' : $LId = $params[0];
define('URL',$arrInfo['jwurl']);

function RresID($idid,$username){
	$curl3=curl_init();
    curl_setopt ($curl3,CURLOPT_REFERER,"http://".URL."/(".$idid.")/xs_main.aspx?xh=".$username.'#a'); 
	 curl_setopt($curl3, CURLOPT_HEADER, false); 
     curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true); 
     curl_setopt($curl3, CURLOPT_TIMEOUT, 8); 
     curl_setopt($curl3, CURLOPT_AUTOREFERER, true); 
     curl_setopt($curl3, CURLOPT_FOLLOWLOCATION, true); 
     curl_setopt($curl3, CURLOPT_URL, "http://".URL."/(".$idid.")/xsgrxx.aspx?xh=".$username."&gnmkdm=N121501?");//登陆后要从哪个页面获取信息
$result2= curl_exec($curl3);
$result2 = iconv('gbk', 'utf-8', $result2);
$re=4;
 if(EMPTY($result2))$re=0;
	   if(mb_strpos($result2,"lbxsgrxx_xm", 0, 'utf-8')!==false)$re=1;
	    if(mb_strpos($result2,"javascript:window.opener=null;window.close", 0, 'utf-8')!==false)$re=2;
return $re;
}
function Readcode($id){ 
		if(is_file(RROOT.$id.".php"))
	{
			$Info= SSetRead($id.".php");	
			
				return $Info['res'];
				
		}else{
				return	false;
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
	     $url = 'http://'.URL.'/('.$temp[1].')/default.aspx';
     $result            = curl_request($url);
	 if (empty($result)) {
     return array(
            'status'    => "0",
            'message'   => "教务系统服务器无法通讯,地址可能改变或过载",
         );    
     }
     $pattern           = '/<input type="hidden" name="__VIEWSTATE" value="(.*?)" \/>/is';
     preg_match_all($pattern, $result, $matches);
     $res[0]            = $matches[1][0];
     $res[1]            = $temp[1];
	 $pattern2           = '/<input type="hidden" name="__VIEWSTATEGENERATOR" value="(.*?)" \/>/is';
     @preg_match_all($pattern2, $result, $matches2);
     $res[3]            = @$matches2[1][0];
	//PRINT_R($result );
	//PRINT_R($res);
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
        curl_setopt($curl, CURLOPT_TIMEOUT, 5);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		      if ($referer) {
             curl_setopt($curl, CURLOPT_REFERER, $referer);
        }
        if($post) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
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
function printjson($type,$msg)
{
	ob_flush();
ob_clean();

			$Errormsg=array (
  'type' => urlencode ($type),
  'msg' => urlencode ($msg),
); 
$php_json = json_encode($Errormsg); 
echo urldecode($php_json); 
exit;
}
function changepass($user,$res,$pass,&$DB)
{
$curl3=curl_init();
    curl_setopt ($curl3,CURLOPT_REFERER,"http://".URL."/(".$res[1].")/xs_main.aspx?xh=".$user.'#a'); 
	 curl_setopt($curl3, CURLOPT_HEADER, false); 
     curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true); 
     curl_setopt($curl3, CURLOPT_TIMEOUT, 8); 
     curl_setopt($curl3, CURLOPT_AUTOREFERER, true); 
     curl_setopt($curl3, CURLOPT_FOLLOWLOCATION, true); 
     curl_setopt($curl3, CURLOPT_URL, "http://".URL."/(".$res[1].")/mmxg.aspx?xh=".$user."&amp;xm=&amp;gnmkdm=N121502");//登陆后要从哪个页面获取信息
$result2= curl_exec($curl3);
  curl_close($curl3);
$result2 = iconv('gbk', 'utf-8', $result2);

	$pattern           = '/input type="hidden" name="__VIEWSTATE" value="(.*?)"/is';
     preg_match_all($pattern, $result2, $matches);
     $res1[0]            = $matches[1][0];
	 $sql2 = "SELECT * FROM jwpass WHERE number ='{$user}' order by id desc limit 1";
		$result2 = $DB->query($sql2);
		$row2 = $DB->fetch_array($result2);
	 $repass=trim($row2['pass']);
 $curl3=curl_init();
    curl_setopt ($curl3,CURLOPT_REFERER,"http://".URL."/(".$res[1].")/mmxg.aspx?xh=".$user."&gnmkdm=N121502"); 
   curl_setopt($curl3, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)');
        curl_setopt($curl3, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl3, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl3, CURLOPT_HEADER, 1);
        curl_setopt($curl3, CURLOPT_TIMEOUT, 8);
        curl_setopt($curl3, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($curl3, CURLOPT_URL, "http://".URL."/(".$res[1].")/mmxg.aspx?xh=".$user."&amp;xm=&amp;gnmkdm=N121502");//登陆后要从哪个页面获取信息
curl_setopt($curl3, CURLOPT_POST, 1);

$post['__VIEWSTATE'] =$res1[0];
$post['TextBox2'] =(iconv("utf-8","gbk",$repass));
$post['TextBox3'] =(iconv("utf-8","gbk",$pass));
$post['TextBox4'] =(iconv("utf-8","gbk",$pass));
$post['Button1'] = urlencode(iconv("utf-8","gbk","修  改"));

  curl_setopt($curl3, CURLOPT_POSTFIELDS, http_build_query($post));
$result2= curl_exec($curl3);
	 $result2 = iconv('gbk', 'utf-8', $result2);
  curl_close($curl3);
 
 	     if(mb_strpos($result2,"修改成功", 0, 'utf-8')!==false)$re=1;

	 if($re!=1){
		 IF(empty($result2)) {$re= "0";}else{
		 if(mb_strpos($result2,"window.opener=null;window.close()", 0, 'utf-8')!==false)$re=5;
		 if(mb_strpos($result2,"评价完成后", 0, 'utf-8')!==false) 
		 {$re= "4";}
	  if(mb_strpos($result2,"旧密码不正确", 0, 'utf-8')!==false) 
		 {$re= "2";}
	 if(mb_strpos($result2,"两次输入的新密码不相同", 0, 'utf-8')!==false) 
		 {$re= "7";}
	 	 if(mb_strpos($result2,"您的新密码为弱密码", 0, 'utf-8')!==false) 
		 {$re= "6";}
	  if(mb_strpos($result2,"不能相同！请重新输入", 0, 'utf-8')!==false) 
		 {$re= "6";}
	if(empty($re))$re= "8";
		 }
		 }

	
	RETURN $re;
		 }
