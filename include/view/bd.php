<?php
define('RROOT',ZRoot.'/system/data/app/home/login/');
empty($Operate) ? $CHO = '1' : $CHO = $Operate;
session_start();
$idd=session_id();

	if(empty($_SESSION['wx'])||empty($_SESSION['wx']['openid']))
	{
		//登录
	//$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2c645b02db7bbe5a&redirect_uri=http://weixin.yctu.edu.cn/back&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
 $url = $arrInfo['url']."/back";
	header("Location:".$url); }
	define('URL',$arrInfo['jwurl']);
	$time = time();
		$openid=$_SESSION['wx']['openid'];
		$nickname=mysql_real_escape_string($_SESSION['wx']['nickname']);
		$img=$_SESSION['wx']['img'];
if($CHO=='exit')
{
//解除绑定
		$number=$_SESSION['zid']['number'];
 $sql = "SELECT * FROM wxid WHERE openid ='{$openid}' and isok=1";
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
$sql = "update wxid SET isok = 0 ,deletetime = '{$time}'  where openid = '{$openid}' and isok = 1" ;

	if($DB->query($sql))
	{
		if($_SESSION['my']=='WX')unset($_SESSION['zid']);
ECHO"1";
			}else{ECHO"0";}	
}else{
	if($_SESSION['my']=='WX')unset($_SESSION['zid']);
	ECHO"3";
}}
if($CHO=='1'&&$idd!='0')
{
	//教务绑定
	empty($_POST['username']) ? $username = '' : $username = trim($_POST['username']);
	empty($_POST['passwd']) ? $passwd = '' : $passwd = trim($_POST['passwd']);
	empty($_POST['yanzm']) ? $yanzm = '' : $yanzm = trim($_POST['yanzm']);
	
	if(strlen($username)>7&&strlen($yanzm)==4&&strlen($passwd)!=0)
	{
		//post验证
		
		//开始连接教务系统
$_SESSION['idd']=$idd;
$res = Readcode($idd);
if(isset($res['status'])){
$Errormsg=array (
  'error_type' => '提示',
  'msg' => $res['message'],
); 
ErrorMsg($Errormsg,'点击返回>>','/home/login/1');}
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
      $targetUrl = "http://".URL."/(".$res[1].")/default2.aspx"; 
	  //PRINT_R($targetUrl);
      $r=curl_request($targetUrl,$loginParams);
	  $r= iconv('gbk', 'utf-8', trim($r));
	  $re=9;
	  if(EMPTY($r))$re=0;
	   if(mb_strpos($r,"document.getElementById('txtUserName').focus()", 0, 'utf-8')!==false)$re=2;
	     if(mb_strpos($r,"密码错误", 0, 'utf-8')!==false)$re=3;
	     if(mb_strpos($r,"document.getElementById('TextBox2').focus()", 0, 'utf-8')!==false)$re=4;
	   if(mb_strpos($r,"window.opener=null;window.close()", 0, 'utf-8')!==false)$re=5;
if(mb_strpos($r,"__doPostBack('likTc','')", 0, 'utf-8')!==FALSE)$re=1;
if($re!=1){
	  $res = Readcode($idd,1);
	  $_SESSION['res']=$res;
	  }
	  $Errormsg=array (
  'error_type' => '提示',
  'msg' => '',
);
switch ($re)
{
case 0://无数据
  $Errormsg['msg']="教务网没有返回任何数据，可能是网络故障";
ErrorMsg($Errormsg,'点击返回>>','/home/login/1');
  break;
case 1://成功
 preg_match_all('/<span id="xhxm">([^<>]+)/', $r, $xm);   //正则出的数据存到$xm数组中
	 if(EMPTY($xm[1][0]))$xm[1][0]='匿名000000';
$name=substr($xm[1][0],0,-6); 
 $sql = "SELECT * FROM wxid WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
			if(empty($row)){
				//写入绑定
		$sql11 = "SELECT * FROM wxid WHERE number ='{$username}' and isok=1";
		$result11 = $DB->query($sql11);
		$row11 = $DB->fetch_array($result11);
		if(!empty($row11)){
				if(@$row11['openid']!=$_SESSION['wx']['openid']){
			$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该身份被绑定',
); 
ErrorMsg($Errormsg,'点击返回>>','/home/login/1');}

		if(@$row11['stop']==1){
			$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该微信号被停用',
); 
ErrorMsg($Errormsg,'点击返回>>','/home/login/1');
}}else{
	 		 $sql = "INSERT INTO `jwpass` ( `number`, `pass`, `isok`) VALUES ( '{$username}', '{$passwd}',  1);";
			if(!$DB->query($sql)){
				$Errormsg=array (
  'error_type' => '提示',
  'msg' => '数据库故障',
); 
			ErrorMsg($Errormsg,'点击返回>>','/home/login/1');}
$sql2 = "SELECT * FROM jwinfo WHERE number ='{$username}' and isok=1";
		$result2 = $DB->query($sql2);
		$row2 = $DB->fetch_array($result2);
		if(empty($row2)||(isset($row2)&&time()-$row2['addtime']>7*24*3600)){
  $curl3=curl_init();
    curl_setopt ($curl3,CURLOPT_REFERER,"http://".URL."/(".$res[1].")/xs_main.aspx?xh=".$username.'#a'); 
	 curl_setopt($curl3, CURLOPT_HEADER, false); 
     curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true); 
     curl_setopt($curl3, CURLOPT_TIMEOUT, 20); 
     curl_setopt($curl3, CURLOPT_AUTOREFERER, true); 
     curl_setopt($curl3, CURLOPT_FOLLOWLOCATION, true); 
     curl_setopt($curl3, CURLOPT_URL, "http://".URL."/(".$res[1].")/xsgrxx.aspx?xh=".$username."&gnmkdm=N121501?");//登陆后要从哪个页面获取信息
$result2= curl_exec($curl3);
curl_close($curl3);
$result = iconv('gbk', 'utf-8', $result2);
preg_match('/value="(.*?)" id="byzx" \/>/',  $result, $temp_info);
     $info['gzxx']   =    $temp_info[1];
preg_match('/value="(.*?)" id="lxdh" \/>/',  $result, $temp_info);
     $info['lxdh']   =    $temp_info[1];
	preg_match('/value="(.*?)" id="yzbm" \/>/',  $result, $temp_info);
     $info['yb']   =    $temp_info[1];
		preg_match('/value="(.*?)" id="jtszd" \/>/',  $result, $temp_info);
     $info['jtzz']   =    $temp_info[1];
	preg_match('/\"xh\">(.*)<\/span>/',  $result, $temp_info);
     $info['number']= $temp_info[1];
	preg_match('/\"xm\">(.*)<\/span>/',  $result, $temp_info);
     $info['xm']= $temp_info[1];
	preg_match('/\"lbl_xb\">(.*)<\/span>/',  $result, $temp_info);
     $info['xb']= $temp_info[1];
	 preg_match('/\"lbl_rxrq\">(.*)<\/span>/',  $result, $temp_info);
     $info['rxsj']  =  $temp_info[1];
	preg_match('/\"lbl_mz\">(.*)<\/span>/',  $result, $temp_info);
     $info['mz']  =  $temp_info[1];
	preg_match('/\"lbl_lydq\">(.*)<\/span>/',  $result, $temp_info);
     $info['lydq']  =  $temp_info[1];
	preg_match('/\"lbl_lys\">(.*)<\/span>/',  $result, $temp_info);
     $info['lys']  =  $temp_info[1];
	preg_match('/\"lbl_xy\">(.*)<\/span>/', $result, $temp_info);
     $info['xy'] = $temp_info[1];
	 preg_match('/\"lbl_zymc\">(.*)<\/span>/', $result, $temp_info);
     $info['zy'] = $temp_info[1];
	preg_match('/\"lbl_xzb\">(.*)<\/span/', $result,$temp_info);
     $info['xzb'] = $temp_info[1];
	preg_match('/\"lbl_sfzh\">(.*)<\/span/', $result,$temp_info);
     $info['sfz'] = $temp_info[1];
	preg_match('/\"lbl_dqszj\">(.*)<\/span/', $result,$temp_info);
     $info['szj'] = $temp_info[1];
	preg_match('/\"lbl_ksh\">(.*)<\/span/', $result,$temp_info);
     $info['kh'] = $temp_info[1];    
	$info['addtime'] = time();
	$info['isok'] = 1; 
  if(empty($info)||empty( $info['number'])){
	 $Errormsg['msg']="教务网网络故障";
	 if(mb_strpos($r,"评价", 0, 'utf-8')!==false) $Errormsg['msg']="因有需要评价的课程，教务系统被锁定，请登录教务系统评课";
ErrorMsg($Errormsg,'点击返回>>','/home/login/1');
  }
foreach($info as $k=>$v){  
     $k1[] = '`'.$k.'`';  
     $v1[] = '"'.$v.'"';   
  
}  
   $strv.=implode(',',$v1);     
   $strk.=implode(",",$k1);   
$sql3 = "insert into jwinfo ($strk) values ($strv)"; 
 	$DB->query($sql3);
	
			}
			 $sql = "INSERT INTO `wxid` ( `type`, `number`, `name`, `openid`, `nickname`, `img`,  `addtime`, `deletetime`, `isok`, `islock`, `stop`) VALUES ( 1, '{$username}', '{$name}', '{$openid}', '{$nickname}', '{$img}', '{$time}', NULL, 1, 0, 0);";
			if(!$DB->query($sql)){
				$Errormsg=array (
  'error_type' => '提示',
  'msg' => '数据库故障',
); 
ErrorMsg($Errormsg,'点击返回>>','/home/login/1');
}
			}
			}else{
				IF($row['number']!=$username){
					//该账号已被绑定
					$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该身份已被绑定',
); 
ErrorMsg($Errormsg,'点击返回>>','/home/login/1');
				}else{
					//已经绑定过
						if($row['stop']==1){
							$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该微信号被停用',
); 
ErrorMsg($Errormsg,'点击返回>>','/home/login/1');}else{
	$_SESSION['zid']=$row;
	}
				}
			}
 
	
	//ok
	header("Location:".$arrInfo['url']."/home/loading/".mt_rand(1111,99999));
  break;
case 2://用户名或者密码错误
  $Errormsg['msg']="用户名或密码错误";
 ErrorMsg($Errormsg,'点击返回>>','/home/login/1');
  break;
case 3://密码错误
   $Errormsg['msg']="密码错误";
  ErrorMsg($Errormsg,'点击返回>>','/home/login/1');
  break;
case 4://验证码错误
   $Errormsg['msg']="验证码错误";
  ErrorMsg($Errormsg,'点击返回>>','/home/login/1');
  break; 
case 5://系统忙
   $Errormsg['msg']="教务网系统忙";
 ErrorMsg($Errormsg,'点击返回>>','/home/login/1');
  break; 
case 9://未知的返回
   $Errormsg['msg']="教务网返回未知数据";
  ErrorMsg($Errormsg,'点击返回>>','/home/login/1');
  break;
default://理论上不可能出现的返回
    $Errormsg['msg']="出现了理论上不存在的问题";
  ErrorMsg($Errormsg,'点击返回>>','/home/login/1');
}
}ELSE{$Errormsg=array (
  'error_type' => '提示',
  'msg' => '提交数据异常',
); 
ErrorMsg($Errormsg,'点击返回>>','/home/login/1');}
}
if($CHO=='2')
{
//教工
	empty($_POST['username']) ? $username = '' : $username = mysql_real_escape_string(trim($_POST['username']));
	empty($_POST['number']) ? $number = '' : $number = mysql_real_escape_string(trim($_POST['number']));
	if(isset($username)&&isset($number))	
	{  $sql = "SELECT * FROM wxid WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
$sql2 = "SELECT * FROM ghzl WHERE name ='{$username}' and number ='{$number}'";
		$result2 = $DB->query($sql2);
		$row2 = $DB->fetch_array($result2);
		if(empty($row2['id'])){//没有资料
		$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该姓名和工号不对应，请检查输入或联系管理员',
); 
			ErrorMsg($Errormsg);
		}
		$sql22 = "SELECT * FROM wxid WHERE number ='{$number}' and isok=1";
		$result22 = $DB->query($sql22);
		$row2Q = $DB->fetch_array($result22);
		if(!empty($row2Q)){
				if(@$row2Q['openid']!=$_SESSION['wx']['openid']){
					//该账号已被绑定
					$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该身份已被绑定',
); 
ErrorMsg($Errormsg,'点击返回>>','/home/login/2');
				}else{
					//已经绑定过
						if($row['stop']==1){
							$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该微信号被停用',
); 
ErrorMsg($Errormsg,'点击返回>>','/home/login/2');}else{
	$_SESSION['zid']=$row;
	}
				}
	}
		
			if(empty($row)){
				//写入绑定
		

	 	
			 $sql = "INSERT INTO `wxid` ( `type`, `number`, `name`, `openid`, `nickname`, `img`,  `addtime`, `deletetime`, `isok`, `islock`, `stop`) VALUES ( 2, '{$number}', '{$row2['name']}', '{$openid}', '{$nickname}', '{$img}', '{$time}', NULL, 1, 0, 0);";
			if(!$DB->query($sql)){
				$Errormsg=array (
  'error_type' => '提示',
  'msg' => '数据库故障',
); 
			ErrorMsg($Errormsg);
			}else{//绑定成功
			$_SESSION['zid']=$row;
	}
	}else{
				IF($row['number']!=$number){
					//该账号已被绑定
					$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该身份已被绑定',
); 
ErrorMsg($Errormsg);
				}else{			//已经绑定过
	if($row['stop']==1){
							$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该微信号被停用',
); 
ErrorMsg($Errormsg);}else{
	$_SESSION['zid']=$row;
	}
				}
	}
	}ELSE{$Errormsg=array (
  'error_type' => '提示',
  'msg' => '提交数据异常',
); 
ErrorMsg($Errormsg);}
	
if(isset( $_SESSION['backurl']))
{ echo($_SESSION['backurl']);
$URLL=$_SESSION['backurl'];
unset($_SESSION['backurl']);
if (strpos($URLL, $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) === false&&strpos( 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],$URLL) === false ) {header("Location:".$URLL);}ELSE{
	header("Location:".$arrInfo['url']."/home/index/".mt_rand(1111,9999999));
}
}ELSE{
	header("Location:".$arrInfo['url']."/home/index/".mt_rand(1111,9999999));
}
}
 if($CHO=='3')
{
//访客
	empty($_POST['username']) ? $username = '' : $username = mysql_real_escape_string(trim($_POST['username']));
	empty($_POST['number']) ? $number = '' : $number = mysql_real_escape_string(trim($_POST['number']));
	if(isset($username)&&strlen($number)==11)
	{ 
		 $sql = "SELECT * FROM wxid WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
			if(empty($row)){
				//写入绑定
		$sql11 = "SELECT * FROM wxid WHERE number ='{$number}' and isok=1";
		$result11 = $DB->query($sql11);
		$row11 = $DB->fetch_array($result11);
		if($row11['stop']==1){
			$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该微信号被停用',
); 
ErrorMsg($Errormsg);
}else{
	 	
			 $sql = "INSERT INTO `wxid` ( `type`, `number`, `name`, `openid`, `nickname`, `img`,  `addtime`, `deletetime`, `isok`, `islock`, `stop`) VALUES ( 3, '{$number}', '{$username}', '{$openid}', '{$nickname}', '{$img}', '{$time}', NULL, 1, 0, 0);";
			if(!$DB->query($sql)){
				$Errormsg=array (
  'error_type' => '提示',
  'msg' => '数据库故障',
); 
			ErrorMsg($Errormsg);
			}else{//绑定成功
			$_SESSION['zid']=$row;
	}
	}}else{
				IF($row['number']!=$number){
					//该账号已被绑定
					$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该身份已被绑定',
); 
ErrorMsg($Errormsg);
				}					//已经绑定过
	if($row['stop']==1){
							$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该微信号被停用',
); 
ErrorMsg($Errormsg);}else{
	$_SESSION['zid']=$row;
	}
	
	}
	}ELSE{$Errormsg=array (
  'error_type' => '提示',
  'msg' => '提交数据异常',
); 
ErrorMsg($Errormsg);}
	
if(isset( $_SESSION['backurl']))
{ echo($_SESSION['backurl']);
$URLL=$_SESSION['backurl'];
unset($_SESSION['backurl']);
if (strpos($URLL, $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) === false&&strpos( 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],$URLL) === false ) {header("Location:".$URLL);}ELSE{
	header("Location:".$arrInfo['url']."/home/index/".mt_rand(1111,9999999));
}
}ELSE{
	header("Location:".$arrInfo['url']."/home/index/".mt_rand(1111,9999999));
}
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