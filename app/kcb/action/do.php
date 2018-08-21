<?php
define('RROOT',ZRoot.'/system/data/app/timetables/'.KCBDATE.'/room/');
define('RRrOOT',ZRoot.'/system/data/app/timetables/'.KCBDATE.'/teacher/');
define('RRrrOOT',ZRoot.'/system/data/app/timetables/'.KCBDATE.'/c/');
	if(empty($_SESSION['zid']['number'])){
		$Errormsg=array (
  'error_type' => '提示',
  'msg' => '您还没有绑定，请绑定后再次操作',
); 
ErrorMsg($Errormsg);
	}	
empty($params[0]) ? $LId = '1' : $LId = $params[0];
	
	$number=$_SESSION['zid']['number'];

IF($LId == 'room'){
	empty($_POST['isis']) ? $isis = '8' : $isis = trim($_POST['isis']);
	empty($_POST['r']) ? $r = '8' : $r = urldecode($_POST['r']);
	$room=iconv('UTF-8', 'GBK', $r);
	if($isis!='8'&&$r!='8'){
				if(is_file(RROOT.$room.".php")) 
	{
		if(filectime(RROOT.$room.".php")>time()-60){
			echo"3";EXIT;
		}
	}
		ECHO (roominfo($r,$DB));
	}else{
	echo '8';}
}
IF($LId == 'teacher'){

empty($_POST['isis']) ? $isis = '8' : $isis = trim($_POST['isis']);
	empty($_POST['t']) ? $t = '8' : $t = urldecode($_POST['t']);
	$room=iconv('UTF-8', 'GBK', $t);


	//个人信息
	if($isis!='8'&&$t!='8'){
				if(is_file(RRrOOT.$room.".php")) 
	{
		if(filectime(RRrOOT.$room.".php")>time()-60){
			echo"3";EXIT;
		}
	}
		ECHO (teacherinfo($t,$DB));
	}else{
	echo '1';}
}
IF($LId == 'c'){

empty($_POST['isis']) ? $isis = '8' : $isis = trim($_POST['isis']);
	empty($_POST['t']) ? $t = '8' : $t = urldecode($_POST['t']);
	$room=iconv('UTF-8', 'GBK', $t);


	//个人信息
	if($isis!='8'&&$t!='8'){
				if(is_file(RRrrOOT.$room.".php")) 
	{
		if(filectime(RRrrOOT.$room.".php")>time()-60){
			echo"3";EXIT;
		}
	}
		ECHO (cinfo($t,$DB));
	}else{
	echo '1';}
}
function roominfo($user,&$DB){
	 if(is_file(ZSystem.'/data/app/timetables/'.KCBDATE.'/room/'.$user.'.php')){
				unlink( '/system/data/app/timetables/'.KCBDATE.'/room/'.$user.'.php');
				 }
			$arrtemp=ARRAY();	 
	$sql = "SELECT * FROM kcb WHERE  cteam='".KCBDATE."' and cplace ='{$user}'";
		$array = $DB->fetch_all_array($sql);
		$placeroom=$user;
		 $placeroom=iconv('UTF-8', 'GBK', $placeroom);
		 
					 foreach($array as $key=>$arrq)  {
				 if(!EMPTY($arrq)&&!EMPTY($arrq['cplace'])) {
$mytempinfo=ARRAY();
		$sql2 = "SELECT * FROM jwinfo WHERE number ='{$arrq['number']}'";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
				$mytempinfo= array (
        'coursename' => $arrq['cname'],
        'courseweek' => $arrq['cweek'],
        'coursetype' => $arrq['ctype'],
        'courseplace' => $arrq['cplace'],
        'courseteacher' => $arrq['cteacher'],
        'courseduring' => $arrq['cduring'],
      );   if($arrq['cdsz']!=3)$mytempinfo['coursesingle'] =$arrq['cdsz'];
				  $mytempinfo['xy']=$info['xy'];
				  $mytempinfo['xzb']=$info['xzb'];
				 $x=$arrq['cday'];
				 $y=$arrq['cnum'];
				 if(empty( $arrtemp[$x][$y]))
				 {
					 $arrtemp[$x][$y][0]=$mytempinfo;
					 
				 }else{
					array_push($arrtemp[$x][$y],$mytempinfo); 
					$arrtemp[$x][$y]=array_unique_fb($arrtemp[$x][$y]);
				 }
				 }  unset($mytempinfo);
	}
				 if(!empty($placeroom))SSetWrite( $arrtemp ,$placeroom. '.php');
	
				 unset($arrtemp);
				 unset($placeroom);
			
				  	return 1;				

	
}
function teacherinfo($user,&$DB){
		 if(is_file(ZSystem.'/data/app/timetables/'.KCBDATE.'/teacher/'.$user.'.php')){
				unlink( '/system/data/app/timetables/'.KCBDATE.'/teacher/'.$user.'.php');
				 }
			$arrtemp=ARRAY();	 
	$sql = "SELECT * FROM kcb WHERE  cteam='".KCBDATE."' and cteacher ='{$user}'";
		$array = $DB->fetch_all_array($sql);
		$placeroom=$user;
		 $placeroom=iconv('UTF-8', 'GBK', $placeroom);
		 
					 foreach((array)$array as $key=>$arrq)  {
				 if(!EMPTY($arrq)&&!EMPTY($arrq['cteacher'])) {
	$sql2 = "SELECT * FROM jwinfo WHERE number ='{$arrq['number']}'";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
				$mytempinfo= array (
        'coursename' => $arrq['cname'],
        'courseweek' => $arrq['cweek'],
        'coursetype' => $arrq['ctype'],
        'courseplace' => $arrq['cplace'],
        'courseteacher' => $arrq['cteacher'],
        'courseduring' => $arrq['cduring'],
      );   if($arrq['cdsz']!=3)$mytempinfo['coursesingle'] =$arrq['cdsz'];
				  $mytempinfo['xy']=$info['xy'];
				  $mytempinfo['xzb']=$info['xzb'];
				 $x=$arrq['cday'];$y=$arrq['cnum'];
				 if(empty( $arrtemp[$x][$y]))
				 {
					 $arrtemp[$x][$y][0]=$mytempinfo;
					 
				 }else{
					array_push($arrtemp[$x][$y],$mytempinfo); 
					$arrtemp[$x][$y]=array_unique_fb($arrtemp[$x][$y]);
				 }
				 }  unset($mytempinfo);
	}
				 if(!empty($placeroom))SSsetWrite( $arrtemp ,$placeroom. '.php');
	
				 unset($arrtemp);
				 unset($placeroom);
			
				  	return 1;				

}
function cinfo($user,&$DB){
		 if(is_file(ZSystem.'/data/app/timetables/'.KCBDATE.'/c/'.$user.'.php')){
				unlink( '/system/data/app/timetables/'.KCBDATE.'/c/'.$user.'.php');
				 }
			$arrtemp=ARRAY();	 
	$sql = "SELECT * FROM kcb WHERE cteam='".KCBDATE."' and cname ='{$user}'";
		$array = $DB->fetch_all_array($sql);
		$placeroom=$user;
		 $placeroom=iconv('UTF-8', 'GBK', $placeroom);
		 
					 foreach((array)$array as $key=>$arrq)  {
				 if(!EMPTY($arrq)&&!EMPTY($arrq['cname'])) {
	$sql2 = "SELECT * FROM jwinfo WHERE number ='{$arrq['number']}'";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
				$mytempinfo= array (
        'coursename' => $arrq['cname'],
        'courseweek' => $arrq['cweek'],
        'coursetype' => $arrq['ctype'],
        'courseplace' => $arrq['cplace'],
        'courseteacher' => $arrq['cteacher'],
        'courseduring' => $arrq['cduring'],
      );   if($arrq['cdsz']!=3)$mytempinfo['coursesingle'] =$arrq['cdsz'];
				  $mytempinfo['xy']=$info['xy'];
				  $mytempinfo['xzb']=$info['xzb'];
				 $x=$arrq['cday'];$y=$arrq['cnum'];
				 if(empty( $arrtemp[$x][$y]))
				 {
					 $arrtemp[$x][$y][0]=$mytempinfo;
					 
				 }else{
					array_push($arrtemp[$x][$y],$mytempinfo); 
					$arrtemp[$x][$y]=array_unique_fb($arrtemp[$x][$y]);
				 }
				 }  unset($mytempinfo);
	}
				 if(!empty($placeroom))SsSsetWrite( $arrtemp ,$placeroom. '.php');
	
				 unset($arrtemp);
				 unset($placeroom);
			
				  	return 1;				

}
function array_unique_fb($array2D,$stkeep=false,$ndformat=true)  
{
    if($stkeep) $stArr = array_keys($array2D);  
   
    if($ndformat) $ndArr = array_keys(end($array2D));  
 
    foreach ($array2D as $v){  
        $v = join(",",$v);   
        $temp[] = $v;  
    }  

    $temp = array_unique($temp);   

    foreach ($temp as $k => $v)  
    {  
        if($stkeep) $k = $stArr[$k];  
        if($ndformat)  
        {  
            $tempArr = explode(",",$v);   
            foreach($tempArr as $ndkey => $ndval) $output[$k][$ndArr[$ndkey]] = $ndval;  
        }  
        else $output[$k] = explode(",",$v);   
    }  
  
    return $output;  
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
function SsSsetWrite($Data,$Dir){
	$File = RRrrOOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}