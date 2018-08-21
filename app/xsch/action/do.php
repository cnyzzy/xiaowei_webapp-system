<?php
define('RROOT',ZRoot.'/system/data/app/home/login/');
	if(empty($_SESSION['zid']['number'])){

printjson("error",'状态非法');
	}	

$type=$_SESSION['zid']['type'];
	if($type!=3){

printjson("error",'您已经绑定');
	}	
	$mysqlname='wxid';
if(is_qq()||is_tim())$mysqlname='qqid';
if(is_wb())$mysqlname='wbid';
empty($params[0]) ? $LId = '1' : $LId = $params[0];
define('URL',$arrInfo['jwurl']);
IF($LId == 'clean'){
	 $idd=session_id();
	 			if(is_file(RROOT.$idd.'.php'))
{
unlink(RROOT.$idd.'.php'); 
 }
 session_unset();
session_destroy();
 	 			if(is_file(RROOT.$idd.'.php')){ printjson('error','失败');}else{printjson('ok','清理成功');
}
}
IF($LId == 'num'){

	empty($_POST['number']) ? $number = '': $number =  mysql_real_escape_string (trim($_POST['number']));
	if(strlen($number)==8)
	{
		$sql3="SELECT  * FROM xssj1 where xh = '{$number}'";	
	$row = @$DB->once_fetch_array($sql3);
	if(!EMPTY($row['id']))
	{
		$_SESSION['zid']['number']=$number;
		$_SESSION['zid']['name']=$row['xm'];
	 printjson('ok','学号可用',$row['xm']);

}else{
		 printjson('error','无此新生学号');

	}
		
	}ELSE{printjson("error",'参数非法');	}
}
IF($LId == 'change'){
	 $idd=session_id();
    $_SESSION['idd']=$idd;
$res = $_SESSION['res'];
		//教务绑定
		$number=$_SESSION['zid']['number'];
		empty($_POST['rname']) ? $name = '匿名': $name = trim($_POST['rname']);
		empty($_POST['rpass']) ? $rpasswd = '': $rpasswd = trim($_POST['rpass']);
	empty($_POST['pass']) ? $passwd = '': $passwd = trim($_POST['pass']);
	empty($_POST['pass2']) ? $passwd2 = '': $passwd2 = trim($_POST['pass2']);
	if(strlen($passwd)>5&&strlen($passwd)<17&&$passwd!=$number&&$passwd == $passwd2&&!empty($rpasswd))
	{
		//post验证
		
		//开始连接教务系统

IF(EMPTY($res)){$res = Writecode($idd);$_SESSION['res']=$res;}
if(isset($res['status'])){
$re="9";}

$_SESSION['res']=$res;
$re=changepass($number,$res,$passwd,$DB,$rpasswd);

switch ($re)
{
case 0://无数据
$remsg='无数据';
  break;
case 1://成功
$remsg="成功";
  break;
case 2://
$remsg="原密码错误";
  break;
case 3://密码错误
$remsg="密码错误";
  break;
case 4://验证码错误
$remsg="未评课";
  break; 
case 5://系统忙
$remsg="系统忙";
  break; 
    case 6:

$remsg="新密码为弱密码";
  break;
  case 7:

$remsg="密码不相同";
  break; 
case 8:

$remsg="未知问题";
  break; 
case 9://未知的返回
$remsg="未知的返回";
  break;
default://理论上不可能出现的返回
$remsg="理论上的不可能";
}
	if($re==1){
			$time = time();
		$openid=$_SESSION['wx']['openid'];
		$nickname=mysql_real_escape_string($_SESSION['wx']['nickname']);
		$img=@$_SESSION['wx']['img'];
		$sql2 = "update jwpass SET isok = 0 where number = '{$number}' and isok = 1";
			$DB->query($sql2);	
		 $sql = "INSERT INTO `jwpass` ( `number`, `pass`, `isok`) VALUES ( '{$number}', '{$passwd}',  1);";
			$DB->query($sql);

 $sql = "SELECT * FROM ".$mysqlname." WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
			if(empty($row)){
				//写入绑定
		$sql11 = "SELECT * FROM ".$mysqlname." WHERE number ='{$number}' and isok=1";
		$result11 = $DB->query($sql11);
		$row11 = $DB->fetch_array($result11);
		if(!empty($row11)){
				if(@$row11['openid']!=$_SESSION['wx']['openid']){
		printjson("ok",'学号已被他人绑定');	}

		if(@$row11['stop']==1){
		printjson("ok",'微信号被停用');	
}
	printjson("ok",'您已绑定');}else{
$sql = "INSERT INTO `".$mysqlname."` ( `type`, `number`, `name`, `openid`, `nickname`, `img`,  `addtime`, `deletetime`, `isok`, `islock`, `stop`) VALUES ( 1, '{$username}', '{$name}', '{$openid}', '{$nickname}', '{$img}', '{$time}', NULL, 1, 0, 0);";
	$DB->query($sql);
	printjson("ok",'成功');	
			}
			}else{
				IF($row['type']!='3'){
					//该账号已被绑定
	printjson("ok",'已绑定实名身份');	
				}else{
					//已经绑定过
						if($row['stop']==1){
					printjson("ok",'微信号被停用');	}else{
$sql = "update ".$mysqlname." SET isok = 0 ,deletetime = '{$time}'  where openid = '{$openid}' and isok = 1" ;
$DB->query($sql);
$sql = "INSERT INTO `".$mysqlname."` ( `type`, `number`, `name`, `openid`, `nickname`, `img`,  `addtime`, `deletetime`, `isok`, `islock`, `stop`) VALUES ( 1, '{$username}', '{$name}', '{$openid}', '{$nickname}', '{$img}', '{$time}', NULL, 1, 0, 0);";
$DB->query($sql);	
		$step=3;
				printjson("ok",'成功');				
					
	}
				}
			}
 
			
				}else{

				printjson("error",$remsg);	
				}

}ELSE{printjson("error",'参数非法');	}
}
IF($LId == 'login'){
	 $idd=session_id();
    $_SESSION['idd']=$idd;
$res = $_SESSION['res'];
		//教务绑定
		 $sql2 = "SELECT * FROM jwpass WHERE number ='{$_SESSION['zid']['number']}' order by id desc limit 1";
		$result2 = $DB->query($sql2);
		$row2 = $DB->fetch_array($result2);
		empty($_POST['number']) ? empty($row2['number']) ? $username = '' : $username = trim($row2['number']) : $username = trim($_POST['number']);
	empty($_POST['pass']) ? empty($row2['pass']) ? $passwd = '' : $passwd = trim($row2['pass']) : $passwd = trim($_POST['pass']);

	empty($_POST['yanzm']) ? $yanzm = '' : $yanzm = trim($_POST['yanzm']);
if(strlen($username)==8&&strlen($yanzm)==4&&strlen($passwd)!=0)

	{
		//post验证
		
		//开始连接教务系统

IF(EMPTY($res)){$res = Writecode($idd);$_SESSION['res']=$res;}
if(isset($res['status'])){
$re="9";}

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
	 
      $r=curl_request($targetUrl,$loginParams,$targetUrl);
	  $r= iconv('gbk', 'utf-8', trim($r));
	  $re=9;
	  if(EMPTY($r))$re=0;

if(mb_strpos($r,"/fk_main.html", 0, 'utf-8')!==FALSE)$re=1;
	     if(mb_strpos($r,"document.getElementById('TextBox2').focus()", 0, 'utf-8')!==false)$re=4;
	   if(mb_strpos($r,"window.opener=null;window.close()", 0, 'utf-8')!==false)$re=5;
if(mb_strpos($r,"__doPostBack('likTc','')", 0, 'utf-8')!==FALSE)$re=1;
	     if(mb_strpos($r,"密码错误", 0, 'utf-8')!==false)$re=3;
		   if(mb_strpos($r,"document.getElementById('txtUserName').focus()", 0, 'utf-8')!==false)$re=2;
 if(mb_strpos($r,"评价完成后", 0, 'utf-8')!==false) $re=7;
 
if($re!=1){
	  $res = Readcode($idd,1);
	  $_SESSION['res']=$res;
	  }
	  $remsg="理论上不可能的错误";
switch ($re)
{
case 0://无数据
$remsg='无数据';
  break;
case 1://成功
$remsg="成功";
  preg_match_all('/<span id="xhxm">([^<>]+)/', $r, $xm);   //正则出的数据存到$xm数组中
	 if(EMPTY($xm[1][0]))$xm[1][0]='匿名000000';
$name=substr($xm[1][0],0,-6); 
  break;
case 2://用户名或者密码错误
$remsg="用户名或者密码错误";
  break;
case 3://密码错误
$remsg="密码错误";
  break;
case 4://验证码错误
$remsg="验证码错误";
  break; 
case 5://系统忙
$remsg="系统忙";
  break; 
case 10:

$remsg="系统忙";
  break; 
case 7:
$remsg="未评课";
  break; 
case 9://未知的返回
$remsg="未知的返回";
  break;
default://理论上不可能出现的返回
$remsg="理论上不可能";
}
	if($re==1){
			$sql2 = "update jwpass SET isok = 0 where number = '{$number}' and isok = 1";
			$DB->query($sql2);	
		 $sql = "INSERT INTO `jwpass` ( `number`, `pass`, `isok`) VALUES ( '{$number}', '{$passwd}',  1);";
			$DB->query($sql);
				printjson("ok",'验证成功',$name);	
				}else{

				printjson("error",$remsg);	
				}

}ELSE{printjson("error",'参数非法');	}
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
function printjson($type,$msg,$text='')
{
	ob_flush();
ob_clean();

			$Errormsg=array (
  'type' => urlencode ($type),
  'msg' => urlencode ($msg),
); 
if(!empty($text))$Errormsg['text']=$text;
$php_json = json_encode($Errormsg); 
echo urldecode($php_json); 
exit;
}
function changepass($user,$res,$pass,&$DB,$rpass)
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
     $res1[0]            = @$matches[1][0];
	 $repass=trim($rpass);
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
$re=0;
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