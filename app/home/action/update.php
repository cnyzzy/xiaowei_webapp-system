<?php
define('RROOT',ZRoot.'/system/data/app/home/login/');
	if(empty($_SESSION['zid']['number'])){
		$Errormsg=array (
  'error_type' => '提示',
  'msg' => '您还没有绑定，请绑定后再次操作',
); 
ErrorMsg($Errormsg);
	}	
empty($params[0]) ? $LId = '1' : $LId = $params[0];
define('URL',$arrInfo['jwurl']);

IF($LId == 'login'){
	 $idd=session_id();
    $_SESSION['idd']=$idd;
$res = $_SESSION['res'];
		//教务绑定
		 $sql2 = "SELECT * FROM jwpass WHERE number ='{$_SESSION['zid']['number']}' order by id desc limit 1";
		$result2 = $DB->query($sql2);
		$row2 = $DB->fetch_array($result2);
	empty($row2['number']) ? $username = '' : $username = trim($row2['number']);
	empty($row2['pass']) ? $passwd = '' : $passwd = trim($row2['pass']);
	empty($_POST['yanzm']) ? $yanzm = '' : $yanzm = trim($_POST['yanzm']);
	if(strlen($username)>7&&strlen($yanzm)==4&&strlen($passwd)!=0)
	{
		//post验证
		
		//开始连接教务系统

IF(EMPTY($res)){$res = Writecode($idd);$_SESSION['res']=$res;}
if(isset($res['status'])){
echo"9";}
$_SESSION['res']=$res;
 $code = iconv('utf-8', 'gbk', $yanzm);       
      // $loginParams为curl模拟登录时post的参数

	$loginParams['__VIEWSTATE']       =( iconv('utf-8', 'gbk', $res[0]));
	 //$loginParams['__VIEWSTATEGENERATOR']        = $res[3];
	 $loginParams['txtUserName'] = $username;
	 	  $loginParams['Textbox1'] = '';
      $loginParams['TextBox2'] =( iconv('utf-8', 'gbk', $passwd));
	  $loginParams['txtSecretCode'] = $code;   
	        $loginParams['RadioButtonList1'] =iconv('utf-8', 'gbk','学生');
      $loginParams['Button1'] = '';
      $loginParams['lbLanguage'] = '';
      $loginParams['hidPdrs'] = '';
      $loginParams['hidsc'] = '';
          
      // $targetUrl curl 提交的目标地址
      $targetUrl = "http://".URL."/(".$res[1].")/default.aspx"; 
	  //PRINT_R( $loginParams);
	  //  PRINT_R($targetUrl);
      $r=curl_request($targetUrl,$loginParams,$targetUrl);
	  $r= iconv('gbk', 'utf-8', trim($r));
	  $re=9;
	  if(EMPTY($r))$re=0;
	  //PRINT_R($r);
if(mb_strpos($r,"/fk_main.html", 0, 'utf-8')!==FALSE)$re=1;
	     if(mb_strpos($r,"document.getElementById('TextBox2').focus()", 0, 'utf-8')!==false)$re=4;
	   if(mb_strpos($r,"window.opener=null;window.close()", 0, 'utf-8')!==false)$re=5;
if(mb_strpos($r,"__doPostBack('likTc','')", 0, 'utf-8')!==FALSE)$re=1;
	     if(mb_strpos($r,"密码错误", 0, 'utf-8')!==false)$re=3;
		   if(mb_strpos($r,"document.getElementById('txtUserName').focus()", 0, 'utf-8')!==false)$re=2;

		 
if($re!=1){
	  $res = Readcode($idd,1);
	  $_SESSION['res']=$res;
	  }
	  
switch ($re)
{
case 0://无数据
echo"0";
  break;
case 1://成功
echo"1";
  break;
case 2://用户名或者密码错误
echo"2";
  break;
case 3://密码错误
echo"2";
  break;
case 4://验证码错误
echo"4";
  break; 
case 5://系统忙
echo"5";
  break; 
  case 10://系统忙
echo"10";
  break; 
case 9://未知的返回
echo"6";
  break;
default://理论上不可能出现的返回
echo"7";
}
}ELSE{echo"8";}
}

if($LId == '1'){
	//检查是否有上次的缓存
	 $idd=session_id();
    $_SESSION['idd']=$idd;
$res = Readcode($idd);
IF(empty($res)){
	
	//读都读不到，直接重来吧
	$res = Writecode($idd);
if(isset($res['status'])){
$Errormsg=array (
  'error_type' => '提示',
  'msg' => $res['message'],
); 
ErrorMsg($Errormsg);}
$_SESSION['res']=$res;
}else{
	//读到了，验证一遍
	$re=RresID($res[1],$_SESSION['zid']['number']);
	if(empty($re)||@$re!=1){
		$res = Writecode($idd);
if(isset($res['status'])){
$Errormsg=array (
  'error_type' => '提示',
  'msg' => $res['message'],
); 
ErrorMsg($Errormsg);}
$_SESSION['res']=$res;
	}else{//恭喜
	$step=2;
	}
}

}
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
            'message'   => "模拟登陆失败，教务系统网址可能改变",
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
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
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