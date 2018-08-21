<?php
define('RROOT',ZRoot.'/system/data/app/home/login/');

define('RRrrOOT',ZRoot.'/system/data/app/score/');
define('RRrrROOT',ZRoot.'/system/data/app/pyjh/');
define('RRrrRrOOT',ZRoot.'/system/data/app/djks/');
define('CROOT',ZRoot.'/system/data/app/img/cookies/');

	define('URL',$arrInfo['jwurl']);
	if(empty($_SESSION['zid']['number'])){
		$Errormsg=array (
  'error_type' => '提示',
  'msg' => '您还没有绑定，请绑定后再次操作',
); 
ErrorMsg($Errormsg);
	}	if(empty($_SESSION['res'])){
			$idd=session_id();
			$_SESSION['idd']=$idd;
			$res = Readcode($idd);
			IF(empty($res)){ECHO"10";EXIT();}
	}ELSE{$res = $_SESSION['res'];}
empty($params[0]) ? $LId = '1' : $LId = $params[0];
	
	$username=$_SESSION['zid']['number'];
	IF($LId == 'clear'){
session_destroy(); header("Location:/");EXIT;
}
IF($LId == 'aaa'){
	empty($_POST['isis']) ? $isis = '8' : $isis = trim($_POST['isis']);
	//个人信息
	if($isis!='8'){
		ECHO (jwinfo($username,$res,$DB));
	}else{
	echo '1';}
}
IF($LId == 'bbb'){
		if(file_exists(ZSystem.'/data/app/timetables/now.php'))
{$aarr4 = SetRead('/system/data/app/timetables/now.php');
if(!empty($aarr4['year'])&&!empty($aarr4['team'])){
	if(is_file(ZRoot.'/system/data/app/timetables/'.$aarr4['year'].$aarr4['team'].'/'.$username.".php")) 
	{
		if(filemtime(ZRoot.'/system/data/app/timetables/'.$aarr4['year'].$aarr4['team'].'/'.$username.".php")>time()-60){
			echo"3";EXIT;
		}
	}
}
}
	empty($_POST['isis']) ? $isis = '8' : $isis = trim($_POST['isis']);
	//课程
		if($isis!='8'){
	$arrayk=kcinfo($username,$res,$DB);
	;


	IF($arrayk==2){
		echo '2';EXIT;
	}
	IF($arrayk==5){
		echo '5';EXIT;
	}
	$SQ="";
	foreach ($arrayk as $key=>$arr) { 
		foreach ($arr as $key2=>$arr2) {
			if(!empty($arr2['testtime']))unset($arr2['testtime']);
						if(!empty($arr2['testroom']))unset($arr2['testroom']);

  if (count($arr2) == count($arr2, 1)) {
	  IF(!empty($arr2['coursename']))$SQ.="('".$username."','".$key."','".$key2."','".implode("','",$arr2)."','3','".KCBDATE."'),";
} else {
   //单双周情况
   if(!empty($arr2[1])&&!empty($arr2[1]['coursename'])){
	   IF(ISSET($arr2[1]['coursesingle']))UNSET($arr2[1]['coursesingle']);
	   $SQ.="('".$username."','".$key."','".$key2."','".implode("','",$arr2[1])."','2','".KCBDATE."'),";}
	   
   if(!empty($arr2[0])&&!empty($arr2[0]['coursename'])){ 
   IF(ISSET($arr2[0]['coursesingle']))UNSET($arr2[0]['coursesingle']);
   $SQ.="('".$username."','".$key."','".$key2."','".implode("','",$arr2[0])."','1','".KCBDATE."'),";
   }
	
	}}}
	if(!EMPTY($SQ))
	{$SQ="INSERT INTO `kcb` ( `number`, `cday`, `cnum`, `cname`, `cweek`, `ctype`, `cplace`, `cteacher`, `cduring`, `cdsz`, `cteam`) VALUES ".rtrim($SQ,",").";";
	
	$sql2 = "SELECT id FROM kcb WHERE number ='{$username}' AND cteam='".KCBDATE."'";
	$NUMM = $DB->once_num_rows($sql2);
	if($NUMM!=0){
		//删除
		$sql = "DELETE FROM kcb WHERE number ='{$username}' AND cteam='".KCBDATE."'";
		$row = $DB->query($sql);
	}
	if($DB->query($SQ)){echo"1";}ELSE{ECHO"2";}
	}ELSE{ECHO"4";}
	}else{
	echo '1';}
}
IF($LId == 'ccc'){
	if(is_file(RRrrOOT.'table1/'.$username.".php")) 
	{
		if(filemtime(RRrrOOT.'table1/'.$username.".php")>time()-600){
			echo"3";EXIT;
		}
	}
	empty($_POST['isis']) ? $isis = '8' : $isis = trim($_POST['isis']);

		if($isis!='8'){
	$arrayk=cjinfo($username,$res,$DB);
	IF($arrayk==2){
		echo '4';EXIT;
	}
		IF($arrayk==5){
		echo '5';EXIT;
	}
	$SQ="";
			$tgpa=0;
			$txf=0;
	foreach ($arrayk as $key=>$arr2) {
		if($key!=0){
	//print_R($arr2);
	IF(empty($arr2['17'])&&((!empty($arr2['10'])&&$arraytable1[0][7]=='期中成绩')||($arraytable1[0][7]!='期中成绩'))){
			$arr2[17]=1;
	}
	IF(empty($arr2['16'])&&((!empty($arr2['10'])&&$arraytable1[0][7]=='期中成绩')||($arraytable1[0][7]!='期中成绩'&&empty($arr2['7'])))){
			$arr2[17]=1;
			if(is_numeric($arr2[10]) ){
		if($arr2[10]==100)$arr2[16]='5';
		if(($arr2[10]<=100&&$arr2[10]>=90))$arr2[16]='4';
		if(($arr2[10]<=89&&$arr2[10]>=80))$arr2[16]='3';
		if(($arr2[10]<=79&&$arr2[10]>=70))$arr2[16]='2';
		if(($arr2[10]<=69&&$arr2[10]>=60))$arr2[16]='1';
		if(($arr2[10]<=59&&$arr2[10]>=0))$arr2[16]='0';

		
		if($arr2[10]<100&&$arr2[10]>=60)
		{
			$str = 0;
			$str = substr($arr2[10],-1);
			$arr2[16]+=$str*0.1;
		}

/**
if($arr2[10]<=100&&$arr2[10]>=96) $arraytable1[$key][16]='4.8';
if($arr2[10]<96&&$arr2[10]>=93) $arraytable1[$key][16]='4.5';
if($arr2[10]<93&&$arr2[10]>=90) $arraytable1[$key][16]='4.0';
if($arr2[10]<90&&$arr2[10]>=86) $arraytable1[$key][16]='3.8';
if($arr2[10]<86&&$arr2[10]>=83) $arraytable1[$key][16]='3.5';
if($arr2[10]<83&&$arr2[10]>=80) $arraytable1[$key][16]='3.0';
if($arr2[10]<80&&$arr2[10]>=76) $arraytable1[$key][16]='2.8';
if($arr2[10]<76&&$arr2[10]>=73) $arraytable1[$key][16]='2.5';
if($arr2[10]<73&&$arr2[10]>=70) $arraytable1[$key][16]='2.0';
if($arr2[10]<70&&$arr2[10]>=66) $arraytable1[$key][16]='1.8';
if($arr2[10]<66&&$arr2[10]>=63) $arraytable1[$key][16]='1.5';
if($arr2[10]<63&&$arr2[10]>=60) $arraytable1[$key][16]='1.0';
if(($arr2[10]<=59&&$arr2[10]>=0))$arraytable1[$key][16]='0';**/
		
		}else{
				/**if($arr2[10]=='优秀')$arraytable1[$key][17]='4';
		if($arr2[10]=='良好')$arraytable1[$key][17]='3';
		if($arr2[10]=='中等')$arraytable1[$key][17]='2';
		if($arr2[10]=='及格')$arraytable1[$key][17]='1';
		if($arr2[10]=='不及格')$arraytable1[$key][17]='0';	
			**/
		if($arr2[10]=='优秀')$arr2[16]='4.0';
		if($arr2[10]=='良好')$arr2[16]='3.0';
		if($arr2[10]=='中等')$arr2[16]='2.0';
		if($arr2[10]=='及格')$arr2[16]='1.0';
		if($arr2[10]=='不及格')$arr2[16]='0';
		
		}
	}
	  IF((!empty($arr2['3']))&&(empty($arr2['16'])&&(empty($arr2['17']))))
	  {
$SQ.="('".$username."','".$arr2[0]."','".$arr2[1]."','".$arr2[2]."','".$arr2[3]."','".$arr2[4]."','".$arr2[5]."','".$arr2[6]."','".$arr2[7]."','".$arr2[8]."','','".$arr2[10]."','".$arr2[11]."','".$arr2[13]."','".$arr2[14]."','".$arr2[12]."','','".$arr2[7]."','".$arr2[8]."','1'),";
  
  $tgpa+=$arr2['6']*$arr2['7'];
  $txf+=$arr2['6'];
	  }
	  IF((!empty($arr2['3']))&&!empty($arr2['16'])&&$arr2['16']!='0'||!empty($arr2['17'])){
		  if($arr2['16']=='p')$arr2['16']='0';
$SQ.="('".$username."','".$arr2[0]."','".$arr2[1]."','".$arr2[2]."','".$arr2[3]."','".$arr2[4]."','".$arr2[5]."','".$arr2[6]."','".$arr2[16]."','".$arr2[10]."','','".$arr2[11]."','','".$arr2[13]."','".$arr2[14]."','".$arr2[12]."','','".$arr2[7]."','".$arr2[8]."','1'),";
  $tgpa+=$arr2['6']*$arr2['16'];
  $txf+=$arr2['6'];
	  }
		  }}
	$SQ="INSERT INTO `cjinfo`(`number`, `xn`, `xq`, `kcdm`, `kcmc`, `kcxz`, `kcgs`, `xf`, `jd`, `cj`, `fxbj`, `bkcj`, `cxcj`, `xymc`, `bz`, `cxbj`, `kcywmc`, `qzcj`, `sycj`, `isok`)  VALUES ".rtrim($SQ,",").";";

	$sql2 = "SELECT id FROM cjinfo WHERE number ='{$username}'";
	$NUMM = $DB->once_num_rows($sql2);
	if($NUMM!=0){
		//删除
		$sql = "DELETE FROM cjinfo WHERE number ='{$username}'";
		$row = $DB->query($sql);
	}
	if($DB->query($SQ)){
			$sql2 = "SELECT id FROM gpainfo WHERE number ='{$username}'";
	$NUMM2 = $DB->once_num_rows($sql2);
	if($NUMM2!=0){
		//删除
		$sql = "DELETE FROM gpainfo WHERE number ='{$username}'";
		$row = $DB->query($sql);
	}
	$gpa=0;
	if($txf!=0)$gpa=$tgpa/$txf;
		$SQ="INSERT INTO `gpainfo` (`number`, `txf`, `tgpa`, `gpa`, `isok`) VALUES ('{$username}', '{$txf}', '{$tgpa}', '{$gpa}', 1);";
		$DB->query($SQ);
		echo"1";
	}ELSE{ECHO"2";}
	}else{
	echo '1';}
}
IF($LId == 'ddd'){
	if(is_file(RRrrROOT.$username.".php")) 
	{
		if(filemtime(RRrrROOT.$username.".php")>time()-600){
			echo"3";EXIT;
		}
	}
	empty($_POST['isis']) ? $isis = '8' : $isis = trim($_POST['isis']);

		if($isis!='8'){
	$arrayk=pyjhinfo($username,$res,$DB);
	IF($arrayk==2){
		echo '2';EXIT;
	}
	IF($arrayk==5){
		echo '5';EXIT;
	}
	echo '1';
}}
IF($LId == 'eee'){
	if(is_file(RRrrRrOOT.$username.".php")) 
	{
		if(filemtime(RRrrRrOOT.$username.".php")>time()-600){
			echo"3";EXIT;
		}
	}
	empty($_POST['isis']) ? $isis = '8' : $isis = trim($_POST['isis']);

		if($isis!='8'){
	$arrayk=djksinfo($username,$res,$DB);
	IF($arrayk==2){
		echo '2';EXIT;
	}
	IF($arrayk==5){
		echo '5';EXIT;
	}
	echo '1';
}}
function djksinfo($user,$res,&$DB){
	 $curl3=curl_init();
    curl_setopt ($curl3,CURLOPT_REFERER,"http://".URL."/(".$res[1].")/xs_main.aspx?xh=".$user.'#a'); 
	 curl_setopt($curl3, CURLOPT_HEADER, false); 
     curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true); 
     curl_setopt($curl3, CURLOPT_TIMEOUT, 8); 
     curl_setopt($curl3, CURLOPT_AUTOREFERER, true); 
     curl_setopt($curl3, CURLOPT_FOLLOWLOCATION, true); 
     curl_setopt($curl3, CURLOPT_URL, "http://".URL."/(".$res[1].")/xsdjkscx.aspx?xh=".$user."&xm=&gnmkdm=N121607");//登陆后要从哪个页面获取信息
$result2= curl_exec($curl3);
curl_close($curl3);
$result2 = iconv('gbk', 'utf-8', $result2);
  preg_match_all('/<table class="datelist"[\w\W]*?>([\w\W]*?)<\/table>/',$result2,$out);
     $table = $out[0][0]; 
	   if(EMPTY( $table)){
		 if(mb_strpos($result3,"评价", 0, 'utf-8')!==false) 
		 {RETURN "5";}else{
		 RETURN "2";}
		 exit;}
	 $arraytable=get_td_array(mytrim2($table));
	SssSSsetWrite($arraytable,$user. '.php');
	RETURN $arraytable;
}
function pyjhinfo($user,$res,&$DB){
	$curl3=curl_init();
    curl_setopt ($curl3,CURLOPT_REFERER,"http://".URL."/(".$res[1].")/xs_main.aspx?xh=".$user.'#a'); 
	 curl_setopt($curl3, CURLOPT_HEADER, false); 
     curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true); 
     curl_setopt($curl3, CURLOPT_TIMEOUT, 8); 
     curl_setopt($curl3, CURLOPT_AUTOREFERER, true); 
     curl_setopt($curl3, CURLOPT_FOLLOWLOCATION, true); 
     curl_setopt($curl3, CURLOPT_URL, "http://".URL."/(".$res[1].")/pyjh.aspx?xh=".$user."&xm=&gnmkdm=N121607");//登陆后要从哪个页面获取信息
$result2= curl_exec($curl3);

$result2 = iconv('gbk', 'utf-8', $result2);
$pattern           = '/input type="hidden" name="__VIEWSTATE" value="(.*?)"/is';
     preg_match_all($pattern, $result2, $matches);
     $res1[0]            = $matches[1][0];
	 $pattern2           = '/<input type="hidden" name="__EVENTARGUMENT" value="(.*?)" \/>/is';
     preg_match_all($pattern2, $result2, $matches2);
     $res1[1]            = $matches2[1][0];
	   curl_close($curl3);
 $curl3=curl_init();
    curl_setopt ($curl3,CURLOPT_REFERER,"http://".URL."/(".$res[1].")/pyjh.aspx.aspx?xh=".$user."&gnmkdm=N121605"); 
   curl_setopt($curl3, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)');
        curl_setopt($curl3, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl3, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl3, CURLOPT_HEADER, 1);
        curl_setopt($curl3, CURLOPT_TIMEOUT, 8);
        curl_setopt($curl3, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($curl3, CURLOPT_URL, "http://".URL."/(".$res[1].")/pyjh.aspx?xh=".$user."&xm=&gnmkdm=N121607");//登陆后要从哪个页面获取信息
curl_setopt($curl3, CURLOPT_POST, 1);
$post['__EVENTTARGET'] ='dpDBGrid:txtPageSize';
$post['__EVENTARGUMENT'] ='';
$post['__VIEWSTATE'] =$res1[0];
$post['xq'] =urlencode(iconv("utf-8","gbk","全部"));;
$post['kcxz'] =urlencode(iconv("utf-8","gbk","全部"));;
$post['dpDBGrid:txtChoosePage'] =urlencode(iconv("utf-8","gbk","1"));
$post['dpDBGrid:txtPageSize'] =urlencode(iconv("utf-8","gbk","10000"));
//iconv('UTF-8','GB2312',' 查  询 ');
//pRINT_R($post);
  curl_setopt($curl3, CURLOPT_POSTFIELDS, http_build_query($post));
$result2= curl_exec($curl3);
	 	 $result2 = iconv('gbk', 'utf-8', $result2);
//print_r($result2); 
  curl_close($curl3);
  preg_match_all('/<table class="datelist "[\w\W]*?>([\w\W]*?)<\/table>/',$result2,$out);
     $table = $out[0][0]; 
	 if(EMPTY( $table)){
		 if(mb_strpos($result3,"评价", 0, 'utf-8')!==false) 
		 {RETURN "5";}else{
		 RETURN "2";}
		 exit;}
	 $arraytable1=get_td_array(mytrim2($table));
	SssSSetWrite( $arraytable1,$user. '.php');
	  preg_match_all('/<table class="datelist"[\w\W]*?>([\w\W]*?)<\/table>/',$result2,$out2);
      $table2 = $out2[1][1]; 
	 $arraytable2=get_td_array(mytrim2($table2));
	 	SssSSetWrite( $arraytable2,$user. 'b.php');

      $table3 = $out2[1][2]; 
	 $arraytable3=get_td_array(mytrim2($table3));
	 	SssSSetWrite( $arraytable3,$user. 'c.php');

	RETURN $arraytable1;
}
function kcinfo($user,$res,&$DB){
	            $curl2=curl_init();
    curl_setopt ($curl2,CURLOPT_REFERER,"http://".URL."/(".$res[1].")/xs_main.aspx?xh=".$user.'#a'); 
	 curl_setopt($curl2, CURLOPT_HEADER, false); 
     curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true); 
     curl_setopt($curl2, CURLOPT_TIMEOUT, 10); 
     curl_setopt($curl2, CURLOPT_AUTOREFERER, true); 
     curl_setopt($curl2, CURLOPT_FOLLOWLOCATION, true); 
     curl_setopt($curl2, CURLOPT_URL, "http://".URL."/(".$res[1].")/xskbcx.aspx?xh=".$user);//登陆后要从哪个页面获取信息
$result= curl_exec($curl2);
	 preg_match_all('/<span id="Label6">([^<>]+)/', $result, $xm);   //正则出的数据存到$xm数组中
	 if(EMPTY($xm[1][0])){RETURN "2";exit;}
$name=substr(mb_convert_encoding($xm[1][0], "UTF-8", "GBK"),9); 

     curl_close($curl2);
	 $arrayk=analyse(iconv('GB2312','UTF-8',$result));
	SsSetWrite( $arrayk,$user. '.php');
	
	RETURN $arrayk;

}
function cjinfo($user,$res,&$DB)
{
$curl3=curl_init();
    curl_setopt ($curl3,CURLOPT_REFERER,"http://".URL."/(".$res[1].")/xs_main.aspx?xh=".$user.'#a'); 
	 curl_setopt($curl3, CURLOPT_HEADER, false); 
     curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true); 
     curl_setopt($curl3, CURLOPT_TIMEOUT, 8); 
     curl_setopt($curl3, CURLOPT_AUTOREFERER, true); 
     curl_setopt($curl3, CURLOPT_FOLLOWLOCATION, true); 
     curl_setopt($curl3, CURLOPT_URL, "http://".URL."/(".$res[1].")/xscj_gc.aspx?xh=".$user."&amp;xm=&amp;gnmkdm=N121605");//登陆后要从哪个页面获取信息
$result2= curl_exec($curl3);

$result2 = iconv('gbk', 'utf-8', $result2);
	     if(mb_strpos($result2,"reloadcode()", 0, 'utf-8')!==false){
	$curl3=curl_init();

    curl_setopt ($curl3,CURLOPT_REFERER,"http://".URL."/(".$res[1].")/xs_main.aspx?xh=".$user.'#a'); 
	 curl_setopt($curl3, CURLOPT_HEADER, false); 
     curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true); 
     curl_setopt($curl3, CURLOPT_TIMEOUT, 8); 
     curl_setopt($curl3, CURLOPT_AUTOREFERER, true); 
     curl_setopt($curl3, CURLOPT_FOLLOWLOCATION, true); 
     curl_setopt($curl3, CURLOPT_URL, "http://".URL."/(".$res[1].")/xscjcx_dq.aspx?xh=".$user."&amp;xm=&amp;gnmkdm=N121605");//登陆后要从哪个页面获取信息
$result2= curl_exec($curl3);

$result2 = iconv('gbk', 'utf-8', $result2);		 
$pattern           = '/input type="hidden" name="__VIEWSTATE" value="(.*?)"/is';
     preg_match_all($pattern, $result2, $matches);
     $res1[0]            = $matches[1][0];
	 $pattern2           = '/<input type="hidden" name="__VIEWSTATEGENERATOR" value="(.*?)" \/>/is';
     preg_match_all($pattern2, $result2, $matches2);
     $res1[1]            = $matches2[1][0];
	   curl_close($curl3);
 $curl3=curl_init();
    curl_setopt ($curl3,CURLOPT_REFERER,"http://".URL."/(".$res[1].")/xscjcx_dq.aspx?xh=".$user."&xm=&gnmkdm=N121605"); 
   curl_setopt($curl3, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)');

        curl_setopt($curl3, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl3, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl3, CURLOPT_HEADER, 1);
        curl_setopt($curl3, CURLOPT_TIMEOUT, 8);
        curl_setopt($curl3, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($curl3, CURLOPT_URL, "http://".URL."/(".$res[1].")/xscjcx_dq.aspx?xh=".$user."&xm=&gnmkdm=N121605");//登陆后要从哪个页面获取信息
   curl_setopt($curl3, CURLOPT_POST, 1);
$post['__EVENTTARGET'] ='ddlxn';
$post['__EVENTARGUMENT'] ='';
$post['__VIEWSTATE'] =$res1[0];
$post['__VIEWSTATEGENERATOR'] =$res1[1];
$post['btnCx'] = urlencode(iconv("utf-8","gbk"," 查  询 "));
$post['ddlxn'] =urlencode(iconv("utf-8","gbk","全部"));
$post['ddlxq'] =urlencode(iconv("utf-8","gbk","全部"));

  curl_setopt($curl3, CURLOPT_POSTFIELDS, http_build_query($post));
$result3= curl_exec($curl3);
	 $result3 = iconv('gbk', 'utf-8', $result3);
  curl_close($curl3);

    preg_match_all('/<table class="datelist"[\w\W]*?>([\w\W]*?)<\/table>/',$result3,$out);
  
     @$table = @$out[0][0]; 
	 if(EMPTY( $table)){
		 if(mb_strpos($result3,"评价", 0, 'utf-8')!==false) 
		 {RETURN "5";}else{
		 RETURN "2";}
		 exit;}
	 $table1 = @$out[0][1]; 
	 $table2 = @$out[0][2]; 
  // print_r($out);
$arraytable1=get_td_array(mytrim2($table));
$arraytable2=get_td_array(mytrim2($table1));
$arraytable3=get_td_array(mytrim2($table2));	

 foreach((array)$arraytable1 as $key=>$Child)
 {
	if($key==0)$arraytable1[0][16]='绩点';
	
	if($key!=0){
		if(is_numeric($Child[10])&&$arraytable1[0][7]=='期中成绩'){
			$arraytable1[$key][17]=1;
		if($Child[10]==100)$arraytable1[$key][16]='5';
		if(($Child[10]<=100&&$Child[10]>=90))$arraytable1[$key][16]='4';
		if(($Child[10]<=89&&$Child[10]>=80))$arraytable1[$key][16]='3';
		if(($Child[10]<=79&&$Child[10]>=70))$arraytable1[$key][16]='2';
		if(($Child[10]<=69&&$Child[10]>=60))$arraytable1[$key][16]='1';
		if(($Child[10]<=59&&$Child[10]>=0))$arraytable1[$key][16]='0';
		
		if($Child[10]<100&&$Child[10]>=60)
		{
			$str = 0;
			$str = substr($Child[10],-1);
			$arraytable1[$key][16]+=$str*0.1;
		}

		
		}else{
			
	
		if($Child[10]=='优秀')$arraytable1[$key][16]='4.0';
		if($Child[10]=='良好')$arraytable1[$key][16]='3.0';
		if($Child[10]=='中等')$arraytable1[$key][16]='2.0';
		if($Child[10]=='及格')$arraytable1[$key][16]='1.0';
		if($Child[10]=='不及格')$arraytable1[$key][16]='0';
		
		}
	}
 }
	SssSetWrite( $arraytable1,'table1/'.$user. '.php');
	SssSetWrite( $arraytable2,'table2/'.$user. '.php');
	SssSetWrite( $arraytable3,'table3/'.$user. '.php');
		RETURN $arraytable1;
		 }else{
///////////////////////////////////////////////////////////////////
$pattern           = '/input type="hidden" name="__VIEWSTATE" value="(.*?)"/is';
     preg_match_all($pattern, $result2, $matches);
     $res1[0]            = $matches[1][0];
	 $pattern2           = '/<input type="hidden" name="__VIEWSTATEGENERATOR" value="(.*?)" \/>/is';
     preg_match_all($pattern2, $result2, $matches2);
     $res1[1]            = $matches2[1][0];
	   curl_close($curl3);
 $curl3=curl_init();
    curl_setopt ($curl3,CURLOPT_REFERER,"http://".URL."/(".$res[1].")/xscj_gc.aspx?xh=".$user."&gnmkdm=N121605"); 
   curl_setopt($curl3, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)');
        curl_setopt($curl3, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl3, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl3, CURLOPT_HEADER, 1);
        curl_setopt($curl3, CURLOPT_TIMEOUT, 8);
        curl_setopt($curl3, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($curl3, CURLOPT_URL, "http://".URL."/(".$res[1].")/xscj_gc.aspx?xh=".$user."&amp;xm=&amp;gnmkdm=N121605");//登陆后要从哪个页面获取信息
curl_setopt($curl3, CURLOPT_POST, 1);
$post['__EVENTTARGET'] ='';
$post['__EVENTARGUMENT'] ='';
$post['__VIEWSTATE'] =$res1[0];
$post['__VIEWSTATEGENERATOR'] =$res1[1];
$post['Button1'] = urlencode(iconv("utf-8","gbk","按学期查询"));
$post['ddlxn'] =urlencode(iconv("utf-8","gbk",""));
$post['ddlxq'] =urlencode(iconv("utf-8","gbk",""));
  curl_setopt($curl3, CURLOPT_POSTFIELDS, http_build_query($post));
$result2= curl_exec($curl3);
	 $result2 = iconv('gbk', 'utf-8', $result2);
  curl_close($curl3);
  
  preg_match_all('/<table class="datelist"[\w\W]*?>([\w\W]*?)<\/table>/',$result2,$out);
  
     @$table = $out[0][0]; 
	 if(EMPTY( $table)){
		 if(mb_strpos($result3,"评价", 0, 'utf-8')!==false) 
		 {RETURN "5";}else{
		 RETURN "2";}
		 exit;}
	 $table1 = $out[0][1]; 
	 $table2 = $out[0][2]; 
 
$arraytable1=get_td_array(mytrim2($table));
$arraytable2=get_td_array(mytrim2($table1));
$arraytable3=get_td_array(mytrim2($table2));	
	SssSetWrite( $arraytable1,'table1/'.$user. '.php');
	SssSetWrite( $arraytable2,'table2/'.$user. '.php');
	SssSetWrite( $arraytable3,'table3/'.$user. '.php');
	
	RETURN $arraytable1;
		 }
}
function mytrim($string) { 
			$qian=array(" ","　","\t","\n","\r","&nbsp;");
			$hou=array("","","","","","");
			return strip_tags(str_replace($qian,$hou,$string));
		}
function mytrim2($string) { 
			$qian=array(" ","　","\t","\n","\r","&nbsp;");
			$hou=array("","","","","","");
			return str_replace($qian,$hou,$string);
		}		
	function analyse($content){
		if(file_exists(ZSystem.'/data/app/timetables/now.php'))
{$aarr3 = SetRead('/system/data/app/timetables/now.php');
}
	$aarr2=array (
  'year' => '2017',
  'team' => '01',
);
			if(preg_match('/<table class=\"formlist noprint\" id=\"Table2\"(.*?)>(.*?)<\/table>/ims', $content, $block)){
			$info = $block[2];
			if(preg_match_all('/<option selected=\"selected\" (?:.*?)?>(.*?)<\/option>/ims',$info,$_block)){
					$aarr=array (
  'year' => $_block[1][0],
  'team' => $_block[1][1],
);


			}
	}
	if(empty($aarr['year'])||empty($aarr['team'])){
	if(empty($aarr3['year'])||empty($aarr3['team'])){

	$aarr=$aarr2;}else{
	$aarr=$aarr3;	
	}
	
}
	SetWrite($aarr,'/system/data/app/timetables/now.php');
		define("KCBDATE",$aarr['year'].$aarr['team']);
define('RRrOOT',ZRoot.'/system/data/app/timetables/'.$aarr['year'].$aarr['team'].'/');
if(!is_dir(ZSystem.'/data/app/timetables/'.$aarr['year'].$aarr['team'])) mkdir(ZSystem.'/data/app/timetables/'.$aarr['year'].$aarr['team']);
if(!is_dir(ZSystem.'/data/app/timetables/'.$aarr['year'].$aarr['team'].'/room') )mkdir(ZSystem.'/data/app/timetables/'.$aarr['year'].$aarr['team'].'/room');
if(!is_dir(ZSystem.'/data/app/timetables/'.$aarr['year'].$aarr['team'].'/teacher') )mkdir(ZSystem.'/data/app/timetables/'.$aarr['year'].$aarr['team'].'/teacher');
if(!is_dir(ZSystem.'/data/app/timetables/'.$aarr['year'].$aarr['team'].'/c') )mkdir(ZSystem.'/data/app/timetables/'.$aarr['year'].$aarr['team'].'/c');
		if(preg_match('/<table id=\"Table1\" class=\"blacktab\"(.*?)>(.*?)<\/table>/ims', $content, $block)){
			$kebiao = $block[2];
			
			if(preg_match_all('/<tr(?:.*?)?>(.*?)<\/tr>/ims',$kebiao,$_block)){
				$kb_course = array();
				$i = 1;
				foreach($_block[0] as $c=>$v){
					preg_match_all('/<td(.*?)>(.*?)<\/td>/ims',$v,$str_block);
					$flag = 0;
					//print_r($str_block[2]);
					foreach($str_block[2] as $x=>$y1){
						$ys=preg_split("#<br><br><font.+?<\/font><br><br>#ims",$y1);
						//print_r($ys);
						foreach($ys as $y){
							$course1 = explode("<br>",$y);
							

								$coursedata = array();
							$coursedatakey=0;
							foreach($course1 as $x2=>$courseE){
								if(!empty($course1[0])){
								if(empty($courseE)||$courseE==''){
									$coursedatakey++;}
									ELSE{
								$coursedata[$coursedatakey][]=$courseE;}
							}}
							//print_r($coursedata);ECHO("C".$c."X".$x."I".$i);

								foreach($coursedata as $x3=>$course){
							
							$data = array();

							$data['coursename'] = mytrim($course[0]);
							if(!empty($data['coursename'])){
								
								
								
							$_temp = @preg_replace( '/周(.*)第(.*)节/', '' ,$course[2]);
							$_temp = str_replace("}","",$_temp);
							$_temp = str_replace("{","",$_temp);
							$_temp2 =  @preg_replace('{'.$_temp .'}', '', $course[2]);;
							$_temp2 =  @preg_replace('/\D/s', '',$_temp2);;
							
							$data['courseweek'] = $_temp;
							if(strpos($data['courseweek'],"单")>0){
								$data['coursesingle']=1;
							}elseif(strpos($data['courseweek'],"双")>0){
								$data['coursesingle']=0;
							}
						
							$data['courseweek'] = @preg_replace('#\|.*?周#ims',"",$data['courseweek']);
							$data['coursetype'] = @$course[1];
							$data['courseplace'] = @$course[4];
							$data['courseteacher'] = @$course[3];
							$data['courseduring']=@str_replace('周','',str_replace('第','',$data['courseweek']));
									if(!empty($course[5])&&empty($course[7])&&!empty($course[6])){
							$data['testtime'] = mytrim($course[5]);
							$data['testroom'] = mytrim($course[6]);

							}
							}else{
								$data['courseweek'] = '';
							$data['coursetype'] = '';
							$data['courseplace'] = '';
							$data['courseteacher'] = '';
							$data['courseduring']='';
							}
						//	print_r($data);ECHO($x3."C".$c."X".$x."I".$i);

					
							if(($c == 2 || $c == 6 || $c == 10) && $x > 1){
								$flag = 1;
								
							if(isset($data['coursesingle'])||count($coursedata)>1){
									
									$kb_course[$x-1][2*$i-1][] = $data;
									if(strlen($_temp2)!=1)$kb_course[$x-1][2*$i][] = $data;
										if(!empty($kb_course[$x-1][2*$i-1]['coursename']))
									{
							$tdata['coursename'] = $kb_course[$x-1][2*$i-1]['coursename'];	
							$tdata['courseweek'] = $kb_course[$x-1][2*$i-1]['courseweek'];			
							$tdata['coursetype'] = $kb_course[$x-1][2*$i-1]['coursetype'];
							$tdata['courseplace'] = $kb_course[$x-1][2*$i-1]['courseplace'];
							$tdata['courseteacher'] = $kb_course[$x-1][2*$i-1]['courseteacher'];
							$tdata['courseduring']=$kb_course[$x-1][2*$i-1]['courseduring'];
							$tdata['coursesingle']=$kb_course[$x-1][2*$i-1]['coursesingle'];
unset($kb_course[$x-1][2*$i-1]['coursename']);
unset($kb_course[$x-1][2*$i-1]['courseweek']);
unset($kb_course[$x-1][2*$i-1]['coursetype']);
unset($kb_course[$x-1][2*$i-1]['courseplace']);
unset($kb_course[$x-1][2*$i-1]['coursesingle']);
unset($kb_course[$x-1][2*$i-1]['courseteacher']);
unset($kb_course[$x-1][2*$i-1]['courseduring']);
									}
											if(!empty($kb_course[$x-1][2*$i]['coursename']))
									{
							$tdata['coursename'] = $kb_course[$x-1][2*$i]['coursename'];	
							$tdata['courseweek'] = $kb_course[$x-1][2*$i]['courseweek'];			
							$tdata['coursetype'] = $kb_course[$x-1][2*$i]['coursetype'];
							$tdata['courseplace'] = $kb_course[$x-1][2*$i]['courseplace'];
							$tdata['courseteacher'] = $kb_course[$x-1][2*$i]['courseteacher'];
							$tdata['courseduring']=$kb_course[$x-1][2*$i]['courseduring'];
							$tdata['coursesingle']=$kb_course[$x-1][2*$i]['coursesingle'];
unset($kb_course[$x-1][2*$i]['coursename']);
unset($kb_course[$x-1][2*$i]['courseweek']);
unset($kb_course[$x-1][2*$i]['coursetype']);
unset($kb_course[$x-1][2*$i]['courseplace']);
unset($kb_course[$x-1][2*$i]['coursesingle']);
unset($kb_course[$x-1][2*$i]['courseteacher']);
unset($kb_course[$x-1][2*$i]['courseduring']);
									}
									
								}else{
									$kb_course[$x-1][2*$i-1] = $data;
									if(strlen($_temp2)!=1)$kb_course[$x-1][2*$i] = $data;
								}
							}
							else if(($c == 4 || $c == 8) && $x){
								$flag = 1;
								
							if(isset($data['coursesingle'])||count($coursedata)>1){
									$kb_course[$x][2*$i-1][] = $data;
										if(strlen($_temp2)!=1)$kb_course[$x][2*$i][] = $data;
									if(!empty($kb_course[$x][2*$i]['coursename']))
									{
							$tdata['coursename'] = $kb_course[$x][2*$i]['coursename'];	
							$tdata['courseweek'] = $kb_course[$x][2*$i]['courseweek'];			
							$tdata['coursetype'] = $kb_course[$x][2*$i]['coursetype'];
							$tdata['courseplace'] = $kb_course[$x][2*$i]['courseplace'];
							$tdata['courseteacher'] = $kb_course[$x][2*$i]['courseteacher'];
							$tdata['courseduring']=$kb_course[$x][2*$i]['courseduring'];
							$tdata['coursesingle']=$kb_course[$x][2*$i]['coursesingle'];
unset($kb_course[$x][2*$i]['coursename']);
unset($kb_course[$x][2*$i]['courseweek']);
unset($kb_course[$x][2*$i]['coursetype']);
unset($kb_course[$x][2*$i]['courseplace']);
unset($kb_course[$x][2*$i]['coursesingle']);
unset($kb_course[$x][2*$i]['courseteacher']);
unset($kb_course[$x][2*$i]['courseduring']);
									}
							
									if(!empty($kb_course[$x][2*$i]['coursename']))
									{
							$tdata['coursename'] = $kb_course[$x][2*$i]['coursename'];	
							$tdata['courseweek'] = $kb_course[$x][2*$i]['courseweek'];			
							$tdata['coursetype'] = $kb_course[$x][2*$i]['coursetype'];
							$tdata['courseplace'] = $kb_course[$x][2*$i]['courseplace'];
							$tdata['courseteacher'] = $kb_course[$x][2*$i]['courseteacher'];
							$tdata['courseduring']=$kb_course[$x][2*$i]['courseduring'];
							$tdata['coursesingle']=$kb_course[$x][2*$i]['coursesingle'];
unset($kb_course[$x][2*$i]['coursename']);
unset($kb_course[$x][2*$i]['courseweek']);
unset($kb_course[$x][2*$i]['coursetype']);
unset($kb_course[$x][2*$i]['courseplace']);
unset($kb_course[$x][2*$i]['coursesingle']);
unset($kb_course[$x][2*$i]['courseteacher']);
unset($kb_course[$x][2*$i]['courseduring']);
									}
								
								}else{
									$kb_course[$x][2*$i-1] = $data;
									if(strlen($_temp2)!=1)$kb_course[$x][2*$i] = $data;
								}
								
							}
								
								}
							
						}

					}
					if($flag){
						$i++;
					}
					
				}
			}
		}

		
		return $kb_course;
	}
	




function jwinfo($username,$res,&$DB){
	if(!is_dir(ZSystem.'/data/app/img/cookies') )mkdir(ZSystem.'/data/app/img/cookies');

$sql2 = "SELECT * FROM jwinfo WHERE number ='{$username}' and isok=1";
		$result2 = $DB->query($sql2);
		$row2 = $DB->fetch_array($result2);
			 if(is_file(CROOT."/".$username.".php")){
				unlink(CROOT."/".$username.".php");
				 }
		$cookie_jar = CROOT."/".$username.".php";
  $curl3=curl_init();
    curl_setopt ($curl3,CURLOPT_REFERER,"http://".URL."/(".$res[1].")/xs_main.aspx?xh=".$username.'#a'); 
	 curl_setopt($curl3, CURLOPT_HEADER, false); 
     curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true); 
     curl_setopt($curl3, CURLOPT_TIMEOUT, 10); 
	

     curl_setopt($curl3, CURLOPT_AUTOREFERER, true); 
     curl_setopt($curl3, CURLOPT_FOLLOWLOCATION, true); 
     curl_setopt($curl3, CURLOPT_URL, "http://".URL."/(".$res[1].")/xsgrxx.aspx?xh=".$username."&gnmkdm=N121501?");//登陆后要从哪个页面获取信息
 //curl_setopt($curl3, CURLOPT_COOKIEJAR, $cookie_jar);
	 $result2= curl_exec($curl3);
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
  curl_close($curl3);
  preg_match_all('/img id="xszp" src="(.*)"/iUs', $result, $out);

$imgurl=htmlspecialchars_decode($out[1][0]);
if(!empty($imgurl)){
//	PRINT_R("http://".URL."/(".$res[1].")/".$imgurl);
 $curl3=curl_init();
	 curl_setopt($curl3, CURLOPT_HEADER, 0); 
	
     curl_setopt($curl3, CURLOPT_RETURNTRANSFER, 1); 
     curl_setopt($curl3, CURLOPT_TIMEOUT, 10); 
    curl_setopt ($curl3,CURLOPT_REFERER,"http://".URL."/(".$res[1].")/xs_main.aspx?xh=".$username.'#a'); 

     curl_setopt($curl3, CURLOPT_AUTOREFERER, true); 
     curl_setopt($curl3, CURLOPT_FOLLOWLOCATION, true); 
     curl_setopt($curl3, CURLOPT_URL, "http://".URL."/(".$res[1].")/".$imgurl);//登陆后要从哪个页面获取信息
	 	// curl_setopt($curl3, CURLOPT_COOKIEFILE,  CROOT."/".$username.".php");

$resultimg= curl_exec($curl3);

if ($result !== false){ 
 $statusCode = curl_getinfo($curl3, CURLINFO_HTTP_CODE); 
 curl_close($curl3);
 if ($statusCode == 404){ 
// echo "这个URL地址不存在"; 
 }else{ 
if(!is_dir(ZSystem.'/data/app/img') )mkdir(ZSystem.'/data/app/img');
if(!is_dir(ZSystem.'/data/app/img/'.$username) ){
mkdir(ZSystem.'/data/app/img/'.$username);}else{
	 $filelist=glob(ZSystem."/data/app/img/".$username."/*.jpg");
	 if(count($filelist)>3){
       foreach ($filelist as $key => $file) {
		    if(file_exists($file)) {
$filesize=abs(filesize($file));
		   if(filemtime($file)<time()-24*60*60*90||$filesize<1024)unlink($file);
			}
	 }}
}
        if ($fp = fopen(ZSystem."/data/app/img/".$username."/".md5(time().$username).".jpg", "a")) {
                 if (@fwrite($fp, $resultimg)) {
                     fclose($fp);
                     return true;
                 } else {
                     fclose($fp);
                     return false;
                 } 
             } 
 } 
}else{ 
// echo "这个URL地址不存在"; 
}
}
foreach($info as $k=>$v){  
     $k1[] = '`'.$k.'`';  //将字段作为一个数组；  
     $v1[] = '"'.$v.'"';  //将插入的值作为一个数组；   
  
}  	  $strv='';     
   $strk=""; 
   $strv.=implode(',',$v1);     
   $strk.=implode(",",$k1); 
   $EEE=0;
   $QQQ=0;
   if(!empty($row2)){  
    foreach ($info as $ZZZ){ 
      IF(EMPTY($ZZZ)) $QQQ++;
    } 
	IF($QQQ>5)$EEE=1;
	IF($EEE==0){
	if($row2['addtime']>time()-60*10)$EEE=2;}
   
IF($EEE==0){
	   $Arr = array(
				'isok'	=> 0,
			);
$DB->updateArr('jwinfo',$Arr,"where id ={$row2['id']}");}}
   
   IF($EEE==0){

	   $sql3 = "insert into jwinfo ($strk) values ($strv)"; 
 	$DB->query($sql3);
	
	
	RETURN 1;
   }ELSEIF($EEE==2){RETURN 1;
   }ELSEIF( mb_strpos($result,"评价完成后", 0, 'utf-8')!==false ){
		
		 RETURN "5";}
   else{RETURN 2;}

}
function Readcode($id){ 
		if(is_file(RROOT.$id.".php"))
	{
			$Info= SSetRead($id.".php");		
				return $Info['res'];	
		}else{
				return	 Writecode($id);
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
        curl_setopt($curl, CURLOPT_TIMEOUT, 5);
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
function get_td_array($table) {
  $table = preg_replace("'<table[^>]*?>'si","",$table);
  $table = preg_replace("'<tr[^>]*?>'si","",$table);
  $table = preg_replace("'<td[^>]*?>'si","",$table);
  $table = str_replace("</tr>","{tr}",$table);
  $table = str_replace("</td>","{td}",$table); 
  $table = preg_replace("'<[/!]*?[^<>]*?>'si","",$table); 
  $table = preg_replace("'([rn])[s]+'","",$table);
  $table = str_replace(" ","",$table);
  $table = str_replace(" ","",$table);
  $table = explode('{tr}', $table);
  array_pop($table);
  foreach ($table as $key=>$tr) {
    $td = explode('{td}', $tr);
    array_pop($td);
    $td_array[] = $td;
  }
  return $td_array;
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
function SsSetWrite($Data,$Dir){
	$File = RRrOOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}
function SssSetWrite($Data,$Dir){
	$File = RRrrOOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}
function SssSSetWrite($Data,$Dir){
	$File = RRrrROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}
function SssSSsetWrite($Data,$Dir){
	$File = RRrrRrOOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}