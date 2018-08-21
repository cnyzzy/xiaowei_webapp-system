<?php
define('RROOT',ZRoot.'/system/data/app/home/login/');
	if(empty($_SESSION['zid']['number'])){

printjson("error",'状态非法');
	}	

$type=$_SESSION['zid']['type'];
	if($type!=1){

printjson("error",'您非学生');
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

if($LId == 'loading'){
	//检查是否有上次的缓存
	 $idd=session_id();
    $_SESSION['idd']=$idd;
$res = Readcode($idd);
IF(empty($res)){
	
	//读都读不到，直接重来吧
	$res = Writecode($idd);
if(isset($res['status'])){

printjson("error",$res['message']);

}
$_SESSION['res']=$res;
printjson("ok","加载成功");
}else{
	//读到了，验证一遍
	$re=RresID($res[1],$_SESSION['zid']['number']);
	if(empty($re)||@$re!=1){
		$res = Writecode($idd);
if(isset($res['status'])){
printjson("error",$res['message']);
}
$_SESSION['res']=$res;
printjson("ok","加载成功");

	}else{//恭喜
printjson("ok",'登录成功');

	}
}

}
IF($LId == 'jw'){
	 $idd=session_id();
    $_SESSION['idd']=$idd;
$res = $_SESSION['res'];
$re=jw($res[1],$_SESSION['zid']['number']);
$pattern = '/xkkh=(.*?)&xh=/i';
	preg_match_all($pattern, $re, $matches);	
$pattern2 = '/xkkh=[^<>]*?>(.*?)</i';
	preg_match_all($pattern2, $re, $matches2);	
	//print_R($matches2);
	if(empty($matches[1])||empty($matches2[1]))
	{
	printjson("error","没有评课项目");
	}else{
		 $_SESSION['jwpkdate']=$matches[1];
		printjson("ok",count($matches[1]),$matches2[1]);
	}


}
IF($LId == 'save'){
	 $idd=session_id();
    $_SESSION['idd']=$idd;
$res = $_SESSION['res'];
		 $jwpkdate=$_SESSION['jwpkdate'];
		 
	empty($_POST['jid']) ? $jid = '0' : $jid = trim($_POST['jid']);
		empty($_POST['w1']) ? $w['0'] = '优秀' : $w['0'] = trim($_POST['w1']);
	empty($_POST['w2']) ? $w['1'] = '优秀' : $w['1'] = trim($_POST['w2']);
			empty($_POST['w3']) ? $w['2'] = '优秀' : $w['2'] = trim($_POST['w3']);
	empty($_POST['w4']) ? $w['3'] = '优秀' : $w['3'] = trim($_POST['w4']);
			empty($_POST['w5']) ? $w['4'] = '优秀' : $w['4'] = trim($_POST['w5']);
			if(empty($jwpkdate)||empty($_SESSION['classselect'][$jid]))
	{
	printjson("error","没有评课数据");
	}
			$all ='';if(strlen($jid)!=0&&!empty($jwpkdate[$jid])&&is_numeric($jid)){
foreach($_SESSION['classselect'][$jid] as $key => $num){
	if(!empty($w[$key])&&($w[$key]=='优秀'||$w[$key]=='良好'||$w[$key]=='中等'||$w[$key]=='及格'||$w[$key]=='不及格')){
			$all .="&DataGrid1%3A".urlencode($num)."=".urlencode(iconv('UTF-8', 'GB2312', $w[$key]))."&DataGrid1%3A".urlencode($_SESSION['classinput'][$jid][$key])."=";


		}ELSE{
			$all .="&DataGrid1%3A".urlencode($num)."=".urlencode(iconv('UTF-8', 'GB2312', '优秀'))."&DataGrid1%3A".urlencode($_SESSION['classinput'][$jid][$key])."=";

		}
		
}
	
$alldata="__EVENTTARGET=&__EVENTARGUMENT=&__VIEWSTATE=".urlencode($_SESSION['classview'])."&pjkc=".urlencode($jwpkdate[$jid]).$all."&pjxx=&txt1=&TextBox1=0&Button2=+%CC%E1++%BD%BB+";
        		//PRINT_R($alldata);
				//PRINT_R("http://".URL."/(".$res[1].")/xsjxpj.aspx?xkkh=".$jwpkdate[$jid]."&xh=".$_SESSION['zid']['number']."&gnmkdm=N12141");
				$ch=curl_init("http://".URL."/(".$res[1].")/xsjxpj.aspx?xkkh=".$jwpkdate[$jid]."&xh=".$_SESSION['zid']['number']."&gnmkdm=N12141");
     	 curl_setopt($ch, CURLOPT_HEADER, 1); 
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
     curl_setopt($ch, CURLOPT_TIMEOUT, 8); 
     curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
        		curl_setopt($ch,CURLOPT_REFERER, "http://".URL."/(".$res[1].")/xs_main.aspx?xh=".$_SESSION['zid']['number']);
        		curl_setopt($ch, CURLOPT_POSTFIELDS, $alldata);
        	
        		$str2=curl_exec($ch);
        		$info=curl_getinfo($ch);
				
        		curl_close($ch);
				$result2 = iconv('gbk', 'utf-8',$str2);
				//print_R($result2);
			
					$pattern = '/<input type="hidden" name="__VIEWSTATE" value="(.*)" \/>/i';
		preg_match($pattern, $result2, $matcheaaas);
		
		$view1 = $matcheaaas[1];
		if(!empty($view1))$_SESSION['classview']=$view1;
	
					$pattern2= '/<option selected="selected" value="(.*?)">(.*?)</i';
		preg_match_all($pattern2, $result2 , $classname);
			$pattern22= '/<td valign="Middle">(.*?)</i';
		preg_match_all($pattern22, $result2, $name);
		$pattern = '/<select name="DataGrid1:(.*?)"/i';
		preg_match_all($pattern, $result2, $matcheaafas);
				$pattern3 = '/<input name="DataGrid1:(.*?)"/i';
		preg_match_all($pattern3, $result2, $matcheaafas3);
			}else{printjson("error",'提交有误');}

	
	
			//PRINT_R($jwpkdate[$jid]);

		if(mb_strpos($result2,"已完成评价", 0, 'utf-8')!==FALSE)
		{
			printjson("ok",'已完成');
		}
	
		
		else{

	if(empty($view1)||empty($matcheaafas[1]))
	{
	printjson("error","提交失败");
	}else{
	
		$_SESSION['classview']=$view1;
		$_SESSION['classselect'][$jid]=$matcheaafas[1];
		$_SESSION['classinput'][$jid]=$matcheaafas3[1];

		printjson("error","请再试一次");
	}

		}
}



IF($LId == 'postjw'){
	 $idd=session_id();
    $_SESSION['idd']=$idd;
$res = $_SESSION['res'];
		 $jwpkdate=$_SESSION['jwpkdate'];
		 
	empty($_POST['jid']) ? $jid = '0' : $jid = trim($_POST['jid']);
		empty($_POST['w1']) ? $w['0'] = '优秀' : $w['0'] = trim($_POST['w1']);
	empty($_POST['w2']) ? $w['1'] = '优秀' : $w['1'] = trim($_POST['w2']);
			empty($_POST['w3']) ? $w['2'] = '优秀' : $w['2'] = trim($_POST['w3']);
	empty($_POST['w4']) ? $w['3'] = '优秀' : $w['3'] = trim($_POST['w4']);
			empty($_POST['w5']) ? $w['4'] = '优秀' : $w['4'] = trim($_POST['w5']);
			if(empty($jwpkdate)||empty($_SESSION['classselect'][$jid]))
	{
	printjson("error","没有评课数据");
	}
			$all ='';if(strlen($jid)!=0&&!empty($jwpkdate[$jid])&&is_numeric($jid)){
foreach($_SESSION['classselect'][$jid] as $key => $num){
	if(!empty($w[$key])&&($w[$key]=='优秀'||$w[$key]=='良好'||$w[$key]=='中等'||$w[$key]=='及格'||$w[$key]=='不及格')){
			$all .="&DataGrid1%3A".urlencode($num)."=".urlencode(iconv('UTF-8', 'GB2312', $w[$key]))."&DataGrid1%3A".urlencode($_SESSION['classinput'][$jid][$key])."=";


		}ELSE{
			$all .="&DataGrid1%3A".urlencode($num)."=".urlencode(iconv('UTF-8', 'GB2312', '优秀'))."&DataGrid1%3A".urlencode($_SESSION['classinput'][$jid][$key])."=";

		}
		
}
	
$alldata="__EVENTTARGET=&__EVENTARGUMENT=&__VIEWSTATE=".urlencode($_SESSION['classview'])."&pjkc=".urlencode($jwpkdate[$jid]).$all."&pjxx=&txt1=&TextBox1=0&Button1=%B1%A3++%B4%E6";
        		//PRINT_R($alldata);
				//PRINT_R("http://".URL."/(".$res[1].")/xsjxpj.aspx?xkkh=".$jwpkdate[$jid]."&xh=".$_SESSION['zid']['number']."&gnmkdm=N12141");
				$ch=curl_init("http://".URL."/(".$res[1].")/xsjxpj.aspx?xkkh=".$jwpkdate[$jid]."&xh=".$_SESSION['zid']['number']."&gnmkdm=N12141");
     	 curl_setopt($ch, CURLOPT_HEADER, 1); 
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
     curl_setopt($ch, CURLOPT_TIMEOUT, 8); 
     curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
        		curl_setopt($ch,CURLOPT_REFERER, "http://".URL."/(".$res[1].")/xs_main.aspx?xh=".$_SESSION['zid']['number']);
        		curl_setopt($ch, CURLOPT_POSTFIELDS, $alldata);
        	
        		$str2=curl_exec($ch);
        		$info=curl_getinfo($ch);
				
        		curl_close($ch);
				$result2 = iconv('gbk', 'utf-8',$str2);
				
					$pattern = '/<input type="hidden" name="__VIEWSTATE" value="(.*)" \/>/i';
		preg_match($pattern, $result2, $matcheaaas);
		$view1 = $matcheaaas[1];
		if(!empty($view1))$_SESSION['classview']=$view1;
		if(mb_strpos($result2,"所有评价已完成，现在可以提交", 0, 'utf-8')!==FALSE)
		{
			printjson("okok",'所有评价已完成');
		}
					$pattern2= '/<option selected="selected" value="(.*?)">(.*?)</i';
		preg_match_all($pattern2, $result2 , $classname);
			$pattern22= '/<td valign="Middle">(.*?)</i';
		preg_match_all($pattern22, $result2, $name);
		//print_R($classname);
		
			}

	
	
			//PRINT_R($jwpkdate[$jid]);

if(!empty($classname[2][0])&&$classname[1][0]!=$jwpkdate[$jid])
{
	
		$jid++;
		if(strlen($jid)!=0&&!empty($jwpkdate[$jid])&&is_numeric($jid))

	{$re=readjw($res[1],$_SESSION['zid']['number'],$jwpkdate[$jid]);
			//PRINT_R($re);

	$pattern = '/<input type="hidden" name="__VIEWSTATE" value="(.*)" \/>/i';
		preg_match($pattern, $re, $matcheaaas);
		$view1 =$matcheaaas[1];
				if(!empty($view1))$_SESSION['classview']=$view1;

		if(mb_strpos($re,"所有评价已完成，现在可以提交", 0, 'utf-8')!==FALSE)
		{
			printjson("okok",'所有评价已完成');
		}
		$pattern = '/<select name="DataGrid1:(.*?)"/i';
		preg_match_all($pattern, $re, $matcheaafas);
				$pattern3 = '/<input name="DataGrid1:(.*?)"/i';
		preg_match_all($pattern3, $re, $matcheaafas3);
				$pattern2= '/<td valign="Middle">(.*?)</i';
		preg_match_all($pattern2, $re, $name);
		$pattern2= '/<option selected="selected" value="(.*?)">(.*?)</i';
		preg_match_all($pattern2, $re , $classname);
		$data=ARRAY();
		if(!empty($classname[1])&&count($classname[1])==6)$data=$classname[2];
		//PRINT_R($name);
		}ELSE{printjson("okok", "再提交一次保存");	}

	if(empty($view1)||empty($matcheaafas[1]))
	{
	printjson("error","下一条获取失败");
	}else{
	
		$_SESSION['classview']=$view1;
		$_SESSION['classselect'][$jid]=$matcheaafas[1];
		$_SESSION['classinput'][$jid]=$matcheaafas3[1];

		printjson("ok",$name[1][0],$data);
	}

		
}else{
	if(!empty($classname[2][0])&&$classname[1][0]==$jwpkdate[count($jwpkdate)-1])
	{
	printjson("okok", "再提交一次保存");}else{
		printjson("error", "未能保存");
		
	}
}


}
IF($LId == 'readjw'){
	 $idd=session_id();
    $_SESSION['idd']=$idd;
$res = $_SESSION['res'];
		 $jwpkdate=$_SESSION['jwpkdate'];
		 
	empty($_POST['jid']) ? $jid = '0' : $jid = trim($_POST['jid']);
	if(empty($jwpkdate))
	{
	printjson("error","没有评课数据");
	}
	
if(strlen($jid)!=0&&!empty($jwpkdate[$jid])&&is_numeric($jid))

	{$re=readjw($res[1],$_SESSION['zid']['number'],$jwpkdate[$jid]);
			//PRINT_R($re);

	$pattern = '/<input type="hidden" name="__VIEWSTATE" value="(.*)" \/>/i';
		preg_match($pattern, $re, $matcheaaas);
		if(mb_strpos($re,"所有评价已完成，现在可以提交", 0, 'utf-8')!==FALSE)
		{
			printjson("okok",'所有评价已完成');
		}

		$view1 =$matcheaaas[1];
		
		$pattern = '/<select name="DataGrid1:(.*?)"/i';
		preg_match_all($pattern, $re, $matcheaafas);
				$pattern3 = '/<input name="DataGrid1:(.*?)"/i';
		preg_match_all($pattern3, $re, $matcheaafas3);
				$pattern2= '/<td valign="Middle">(.*?)</i';
		preg_match_all($pattern2, $re, $name);
		$pattern2= '/<option selected="selected" value="(.*?)">(.*?)</i';
		preg_match_all($pattern2, $re , $classname);
		$data=ARRAY();
		if(!empty($classname[1])&&count($classname[1])==6)$data=$classname[2];
		//PRINT_R($name);
		}ELSE{printjson("error",'参数非法');	}

	if(empty($view1)||empty($matcheaafas[1]))
	{
	printjson("error","获取失败");
	}else{
	
		$_SESSION['classview']=$view1;
		$_SESSION['classselect'][$jid]=$matcheaafas[1];
		$_SESSION['classinput'][$jid]=$matcheaafas3[1];

		printjson("ok",$name[1][0],$data);
	}


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
 if(mb_strpos($r,"评价完成后", 0, 'utf-8')!==false) $re=1;
 
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
			$sql2 = "update jwpass SET isok = 0 where number = '{$username}' and isok = 1";
			$DB->query($sql2);	
		 $sql = "INSERT INTO `jwpass` ( `number`, `pass`, `isok`) VALUES ( '{$username}', '{$passwd}',  1);";
			$DB->query($sql);
				printjson("ok",'验证成功',$name);	
				}else{

				printjson("error",$remsg);	
				}

}ELSE{printjson("error",'参数非法');	}
}
function readjw($idid,$username,$jid){
	$curl3=curl_init();
    curl_setopt ($curl3,CURLOPT_REFERER,"http://".URL."/(".$idid.")/xs_main.aspx?xh=".$username.'#a'); 
	 curl_setopt($curl3, CURLOPT_HEADER, false); 
     curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true); 
     curl_setopt($curl3, CURLOPT_TIMEOUT, 8); 
     curl_setopt($curl3, CURLOPT_AUTOREFERER, true); 
     curl_setopt($curl3, CURLOPT_FOLLOWLOCATION, true); 
     curl_setopt($curl3, CURLOPT_URL, "http://".URL."/(".$idid.")/xsjxpj.aspx?xkkh=".$jid."&xh=".$username."&gnmkdm=N12141");//登陆后要从哪个页面获取信息
$result2= curl_exec($curl3);
$result2 = iconv('gbk', 'utf-8', $result2);

return $result2;
}
function jw($idid,$username){
	$curl3=curl_init();
    curl_setopt ($curl3,CURLOPT_REFERER,"http://".URL."/(".$idid.")/default2.aspx"); 
	 curl_setopt($curl3, CURLOPT_HEADER, false); 
     curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true); 
     curl_setopt($curl3, CURLOPT_TIMEOUT, 8); 
     curl_setopt($curl3, CURLOPT_AUTOREFERER, true); 
     curl_setopt($curl3, CURLOPT_FOLLOWLOCATION, true); 
     curl_setopt($curl3, CURLOPT_URL, "http://".URL."/(".$idid.")/xs_main.aspx?xh=".$username.'#a');//登陆后要从哪个页面获取信息
$result2= curl_exec($curl3);
$result2 = iconv('gbk', 'utf-8', $result2);

return $result2;
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
 if(EMPTY($result2))$re=0; if(mb_strpos($result2,"评价完成后", 0, 'utf-8')!==false) $re=1;
//PRINT_R($result2);
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
		 
	