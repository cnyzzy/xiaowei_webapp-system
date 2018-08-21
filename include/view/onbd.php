<?php
header("Content-Type:text/html;charset=utf-8");
$arrWxapi = SetRead('/system/config/Public/Wxaapi.php');
define("WxAppid", $arrWxapi['APPID']);
define("WxAppsecret", $arrWxapi['SECRET']);
if(!is_dir(ZSystem.'/data/app/WxApp') )mkdir(ZSystem.'/data/app/WxApp');
define('RROOT',ZRoot.'/system/data/app/home/login/');
define('URL',$arrInfo['jwurl']);
$time = time();
empty($Operate) ? $CHO = '1' : $CHO = $Operate;
if($Operate=="exit"){
	
//解除绑定
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
	 $idd=$openid;
			}else{
$rarr['isok']	='2';
  ECHO json_encode($rarr);
  EXIT;
}
		 $sql = "SELECT * FROM wxappid WHERE openid ='{$openid}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);	
				if(empty($row)){
								$Arr['isok']=3;
								$Arr['msg']='尚未绑定';
			    echo trim(json_encode($Arr));
				exit;
		}ELSE{
			$number=$row['number'];
		}

 $sql = "SELECT * FROM wxappid WHERE openid ='{$openid}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
			if(!empty($row)){
				IF($row['islock']==1){
					$rarr['isok']	=2;
					$Arr['msg']='禁止解除绑定';
  ECHO json_encode($rarr);
  EXIT;
					}
				IF($row['type']==1){
$sql2 = "update jwpass SET isok = 0 where number = '{$number}' and isok = 1";
				if(!($DB->query($sql2))){
										$rarr['isok']	=2;
					$Arr['msg']='缓存删除失败';
  ECHO json_encode($rarr);
  EXIT;
					
				}	
			
}
$sql3 = "update mobiles SET isok = 0 where number = '{$number}'";
				if(!($DB->query($sql3))){
										$rarr['isok']	=2;
					$Arr['msg']='手机解除失败';
  ECHO json_encode($rarr);
  EXIT;
				}
				
$sql = "update wxappid SET isok = 0 ,deletetime = '{$time}'  where openid = '{$openid}' and isok = 1" ;

	if($DB->query($sql))
	{
					$rarr['isok']	=1;
					$Arr['msg']='成功解绑';
  ECHO json_encode($rarr);
  EXIT;
			}else{
						$rarr['isok']	=2;
					$Arr['msg']='数据库故障';
  ECHO json_encode($rarr);
  EXIT;			
			}	
}else{
					$rarr['isok']	=1;
					$Arr['msg']='已经解绑';
  ECHO json_encode($rarr);
  EXIT;
}	
	
}else{
$rarr=array();
 if(isset($_GET['session3rd'])&&isset($_GET['id'])&&isset($_GET['passwd'])&&isset($_GET['yanz'])){
 $session3rd=mysql_real_escape_string($_GET['session3rd']);
  $username=mysql_real_escape_string($_GET['id']);
   $passwd=mysql_real_escape_string($_GET['passwd']);
   $yzm=mysql_real_escape_string($_GET['yanz']);
      $nickname=mysql_real_escape_string($_GET['nick']);   
   $img=mysql_real_escape_string($_GET['img']);
}else{
$rarr['isok']	='3';
  ECHO json_encode($rarr);
  EXIT;
}
 	if(is_file(ZSystem.'/data/app/WxApp/'.$session3rd.'.php')){
				$arr = SetRead( '/system/data/app/WxApp/'.$session3rd.'.php');
	$sessionKey=$arr['sessionKey'];
	 $openid=$arr['openid'];
	 $idd=$openid;
			}else{
$rarr['isok']	='2';
  ECHO json_encode($rarr);
  EXIT;
}
if(strlen($username)==8)$CHO=1;
if(strlen($username)<=5)$CHO=2;
if(strlen($username)>5&&strlen($username)!=8)$CHO=3;
		 $sql = "SELECT * FROM wxappid WHERE openid ='{$openid}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
		if(empty($row)){
if($CHO=='1'&&$idd!='0')
{
	//教务绑定

	
	if(strlen($username)==8&&strlen($yzm)==4&&strlen($passwd)!=0)
	{
		//post验证
		
		//开始连接教务系统

$res = Readcode($idd);
if(isset($res['status'])){
$rarr['error']=array (
  'error_type' => '提示',
  'msg' => $res['message'],
); 
$rarr['isok']	='2';
  ECHO json_encode($rarr);
EXIT;}
 $code = iconv('utf-8', 'gbk', $yzm);       
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
 $rarr['error']=array (
  'error_type' => '提示',
  'msg' => '',
);
$rarr['isok']	='2';

	  }

switch ($re)
{
case 0://无数据
  $Errormsg['msg']="教务网没有返回任何数据，可能是网络故障";
 $rarr['error']=array (
  'error_type' => '提示',
  'msg' =>  $Errormsg['msg'],
);
$rarr['isok']	='2';
  ECHO json_encode($rarr);
  EXIT;
  break;
case 1://成功
 preg_match_all('/<span id="xhxm">([^<>]+)/', $r, $xm);   //正则出的数据存到$xm数组中
	 if(EMPTY($xm[1][0]))$xm[1][0]='匿名000000';
$name=substr($xm[1][0],0,-6); 
 $sql = "SELECT * FROM wxappid WHERE openid ='{$openid}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
			if(empty($row)){
				//写入绑定
		$sql11 = "SELECT * FROM wxappid WHERE number ='{$username}' and isok=1";
		$result11 = $DB->query($sql11);
		$row11 = $DB->fetch_array($result11);
		if(!empty($row11)){
				if(@$row11['openid']!=$openid){
			$rarr['error']=array (
  'error_type' => '提示',
  'msg' => '该身份被绑定',
); 

$rarr['isok']	='2';
  ECHO json_encode($rarr);
  EXIT;}

		if(@$row11['stop']==1){
			$rarr['error']=array (
  'error_type' => '提示',
  'msg' => '该微信号被停用',
); 

$rarr['isok']	='2';
  ECHO json_encode($rarr);
  EXIT;
}}else{
	 		 $sql = "INSERT INTO `jwpass` ( `number`, `pass`, `isok`) VALUES ( '{$username}', '{$passwd}',  1);";
			if(!$DB->query($sql)){

$rarr['error']=array (
  'error_type' => '提示',
  'msg' => '数据库故障',
); 

$rarr['isok']	='2';
  ECHO json_encode($rarr);
  EXIT;
  
  }
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
	   			$rarr['error']=array (
  'error_type' => '提示',
  'msg' => '教务网故障',
); 

$rarr['isok']	='2';
  ECHO json_encode($rarr);
  EXIT;
  }
foreach($info as $k=>$v){  
     $k1[] = '`'.$k.'`';  
     $v1[] = '"'.$v.'"';   
  
}  
$strv='';
   $strk='';
   $strv.=@implode(',',$v1);     
   $strk.=@implode(",",$k1);   
$sql3 = "insert into jwinfo ($strk) values ($strv)"; 
 	$DB->query($sql3);
	
			}
			 $sql = "INSERT INTO `wxappid` ( `type`, `number`, `name`, `openid`, `unionid`, `nickname`, `img`,  `addtime`, `deletetime`, `isok`, `islock`, `stop`) VALUES ( 1, '{$username}', '{$name}', '{$openid}','0', '{$nickname}', '{$img}', '{$time}', NULL, 1, 0, 0);";
			if(!$DB->query($sql)){
$rarr['error']=array (
  'error_type' => '提示',
  'msg' => '数据库故障',
); 

$rarr['isok']	='2';
  ECHO json_encode($rarr);
  EXIT;
}
			}
			}else{
				IF($row['number']!=$username){
					//该账号已被绑定
$rarr['error']=array (
  'error_type' => '提示',
  'msg' => '已被绑定',
); 

$rarr['isok']	='2';
  ECHO json_encode($rarr);
  EXIT;
				}else{
					//已经绑定过
						if($row['stop']==1){
$rarr['error']=array (
  'error_type' => '提示',
  'msg' => '已停用',
); 

$rarr['isok']	='2';
  ECHO json_encode($rarr);
  EXIT;}else{

	$rarr['data']=$row; 

$rarr['isok']	='1';
  ECHO json_encode($rarr);
  EXIT;
	}
				}
			}
 	$rarr['data']=$row; 

$rarr['isok']	='1';
  ECHO json_encode($rarr);
  EXIT;
	
	//ok

  break;
case 2://用户名或者密码错误
  $rarr['error']['msg']="用户名或密码错误";
$rarr['isok']	='2';
  ECHO json_encode($rarr);
  EXIT;
  break;
case 3://密码错误
   $rarr['error']['msg']="密码错误";
 
$rarr['isok']	='2';
  ECHO json_encode($rarr);
  EXIT;
  break;
case 4://验证码错误
   $rarr['error']['msg']="验证码错误";

$rarr['isok']	='2';
  ECHO json_encode($rarr);
  EXIT;
  break; 
case 5://系统忙
   $rarr['error']['msg']="教务网系统忙";
$rarr['isok']	='2';
  ECHO json_encode($rarr);
  EXIT;
  break; 
case 9://未知的返回
   $rarr['error']['msg']="教务网返回未知数据";
$rarr['error']= $Errormsg['msg']; 
$rarr['isok']	='2';
  ECHO json_encode($rarr);
  EXIT;
  break;
default://理论上不可能出现的返回
    $rarr['error']['msg']="出现了理论上不存在的问题";
$rarr['error']= $Errormsg['msg']; 
$rarr['isok']	='2';
  ECHO json_encode($rarr);
  EXIT;
}
}ELSE{$Errormsg=array (
  'error_type' => '提示',
  'msg' => '提交数据异常',
); 
$rarr['error']= $Errormsg['msg']; 
$rarr['isok']	='2';
  ECHO json_encode($rarr);
  EXIT;}
}
if($CHO=='2')
{
//教工
	$number = $username;
 $username = $passwd;
	if(isset($username)&&isset($number))	
	{  $sql = "SELECT * FROM wxappid WHERE openid ='{$openid}' and isok=1";
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
			error($Errormsg);
		}
		$sql22 = "SELECT * FROM wxappid WHERE number ='{$number}' and isok=1";
		$result22 = $DB->query($sql22);
		$row2Q = $DB->fetch_array($result22);
		if(!empty($row2Q)){
				if(@$row2Q['openid']!=$openid){
					//该账号已被绑定
					$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该身份已被绑定',
); 
error($Errormsg);
				}else{
					//已经绑定过
						if($row['stop']==1){
							$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该微信号被停用',
); 
error($Errormsg);}else{
	$rarr['data']=$row; 

$rarr['isok']	='1';
  ECHO json_encode($rarr);
  EXIT;
	}
				}
	}
		
			if(empty($row)){
				//写入绑定
		

	 	
			 $sql = "INSERT INTO `wxappid` ( `type`, `number`, `name`, `openid`, `unionid`,`nickname`, `img`,  `addtime`, `deletetime`, `isok`, `islock`, `stop`) VALUES ( 2, '{$number}', '{$row2['name']}', '{$openid}','0','{$nickname}', '{$img}', '{$time}', NULL, 1, 0, 0);";
			if(!$DB->query($sql)){
				$Errormsg=array (
  'error_type' => '提示',
  'msg' => '数据库故障',
); 
			error($Errormsg);
			}else{//绑定成功
			 $sql = "SELECT * FROM wxappid WHERE openid ='{$openid}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
			$rarr['data']=$row; 

$rarr['isok']	='1';
  ECHO json_encode($rarr);
  EXIT;
	}
	}else{
				IF($row['number']!=$number){
					//该账号已被绑定
					$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该身份已被绑定',
); 
error($Errormsg);
				}else{			//已经绑定过
	if($row['stop']==1){
							$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该微信号被停用',
); 
error($Errormsg);}else{
	$rarr['data']=$row; 

$rarr['isok']	='1';
  ECHO json_encode($rarr);
  EXIT;
	}
				}
	}
	}ELSE{$Errormsg=array (
  'error_type' => '提示',
  'msg' => '提交数据异常',
); 
error($Errormsg);}
	

}
 if($CHO=='3')
{
//访客
	$number = $username;
 $username = $passwd;
	if(isset($username)&&strlen($number)==11)
	{ 
		 $sql = "SELECT * FROM wxappid WHERE openid ='{$openid}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
			if(empty($row)){
				//写入绑定
		$sql11 = "SELECT * FROM wxappid WHERE number ='{$number}' and isok=1";
		$result11 = $DB->query($sql11);
		$row11 = $DB->fetch_array($result11);
		if($row11['stop']==1){
			$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该微信号被停用',
); 
error($Errormsg);
}else{
	 	
			 $sql = "INSERT INTO `wxappid` ( `type`, `number`, `name`, `openid`, `unionid`, `nickname`, `img`,  `addtime`, `deletetime`, `isok`, `islock`, `stop`) VALUES ( 3, '{$number}', '{$username}', '{$openid}','0', '{$nickname}', '{$img}', '{$time}', NULL, 1, 0, 0);";
			if(!$DB->query($sql)){
				$Errormsg=array (
  'error_type' => '提示',
  'msg' => '数据库故障',
); 
			error($Errormsg);
			}else{//绑定成功


$rarr['isok']	='1';
	}
	}}else{
				IF($row['number']!=$number){
					//该账号已被绑定
					$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该身份已被绑定',
); 
error($Errormsg);
				}					//已经绑定过
	if($row['stop']==1){
							$Errormsg=array (
  'error_type' => '提示',
  'msg' => '该微信号被停用',
); 
error($Errormsg);}else{
	$rarr['data']=$row; 

$rarr['isok']	='1';
  ECHO json_encode($rarr);
  EXIT;
	}
	
	}
	}ELSE{$Errormsg=array (
  'error_type' => '提示',
  'msg' => '提交数据异常',
); 
error($Errormsg);}
	

} 
		}ELSE{
//已绑定
		$rarr['data']=$row; 

$rarr['isok']	='1';
  ECHO json_encode($rarr);
  EXIT;	
		}

   ECHO json_encode($rarr);
}
  //$signature2 = sha1($rawData . $sessionKey);
   // if ($signature2 !== $signature) return ret_message("signNotMatch");

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
fclose($fp);}
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
	function error($id){ 
	$rarr['error']=$id; 

$rarr['isok']	='2';
  ECHO json_encode($rarr);
  EXIT;
	}
	function Writecode($id){ 
//开启读取身份码
     $url               = 'http://'.URL;
     $result            = curl_request($url);
     if (empty($result)) {
     return array(
            'status'    => "0",
            'message'   => "模拟登陆失败，网址可能以改变",
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
