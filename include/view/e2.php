<?php
//test页面
//$output='';
//IF(EMPTY($output))ECHO'0';
session_start();
	   $dirs = array_filter(glob(ZSystem.'/data/app/timetables/' . '*'), 'is_file');
	   foreach ($dirs as $key => $item) {
		$y = explode('/', $item);
		$arrDirs[] = array_pop($y);
	}
			foreach($arrDirs as $key=>$item){
			if(is_file(ZSystem.'/data/app/timetables/'.$item)){
				$filename = $item;
$houzhui = substr(strrchr($filename, '.'), 1);
$result = basename($filename,".".$houzhui);

			$sql2 = "SELECT * FROM jwinfo WHERE number ='{$result}' and isok=1";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
				$arrq = SetRead( '/system/data/app/timetables/'.$result.'.php');
				for($y=1; $y<11; $y++) {
				for($x=1; $x<8; $x++) {
					  $arrtemp='';
				 
			$placeroom='';
				
				 if(!EMPTY($arrq[$x][$y])&&!EMPTY($arrq[$x][$y]['courseplace'])) {
					  $placeroom=$arrq[$x][$y]['courseplace'];
					
					  $placeroom=iconv('UTF-8', 'GBK', $placeroom);
					
				 if(is_file(ZSystem.'/data/app/timetables/room/'.$placeroom.'.php')){
				 $arrtemp = SetRead( '/system/data/app/timetables/room/'.$placeroom.'.php');
				 }else{$arrtemp =array();} 
				 $mytempinfo=$arrq[$x][$y];
				  $mytempinfo['xy']=$info['xy'];
				  $mytempinfo['xzb']=$info['xzb'];
				 if(empty( $arrtemp[$x][$y][0]))
				 {
					 $arrtemp[$x][$y][0]=$mytempinfo;
					 
				 }else{
					 $temp=$arrtemp[$x][$y];array_push($temp,$mytempinfo); $arrtemp[$x][$y]=array_unique_fb($temp);
				 }
				 } 
				 
				  if(!EMPTY($arrq[$x][$y][0])&&!EMPTY($arrq[$x][$y][0]['courseplace'])) { 
				  $placeroom=$arrq[$x][$y][0]['courseplace'];
				
				   $placeroom=iconv('UTF-8', 'GBK', $placeroom);
			
				 if(is_file(ZSystem.'/data/app/timetables/room/'.$placeroom.'.php')){
				 $arrtemp = SetRead( '/system/data/app/timetables/room/'.$placeroom.'.php');
				 }else{$arrtemp =array();} 
				 $mytempinfo=$arrq[$x][$y][0];
				  $mytempinfo['xy']=$info['xy'];
				  $mytempinfo['xzb']=$info['xzb'];
				 if(empty( $arrtemp[$x][$y][0]))
				 {
					 $arrtemp[$x][$y][0]=$mytempinfo;
					 
				 }else{
						 $temp=$arrtemp[$x][$y];array_push($temp,$mytempinfo); $arrtemp[$x][$y]=array_unique_fb($temp);
				 }
				 }

				   if(!EMPTY($arrq[$x][$y][1])&&!EMPTY($arrq[$x][$y][1]['courseplace'])) {
					    $placeroom=$arrq[$x][$y][1]['courseplace'];
				
						$placeroom=iconv('UTF-8', 'GBK', $placeroom);
					
				 if(is_file(ZSystem.'/data/app/timetables/room/'.$placeroom.'.php')){
				 $arrtemp = SetRead( '/system/data/app/timetables/room/'.$placeroom.'.php');
				 }else{$arrtemp =array();} 
				 $mytempinfo=$arrq[$x][$y][1];
				  $mytempinfo['xy']=$info['xy'];
				  $mytempinfo['xzb']=$info['xzb'];
				 if(empty( $arrtemp[$x][$y][0]))
				 {
					 $arrtemp[$x][$y][0]=$mytempinfo;
					 
				 }else{
						 $temp=$arrtemp[$x][$y];array_push($temp,$mytempinfo); $arrtemp[$x][$y]=($temp);
				 }
				 }
				 if(!empty($placeroom))SSetWrite(($arrtemp) ,$placeroom. '.php');
	$arrtemp='';
				 unset($arrtemp);
				 $placeroom='';
				 unset($placeroom);
			
				 } 					
}
for($y=1; $y<11; $y++) {
				for($x=1; $x<8; $x++) {
					  $arrtemp='';
				 
			$teacher='';
				 if(!EMPTY($arrq[$x][$y])&&!EMPTY($arrq[$x][$y]['courseteacher'])) {
					
					  $teacher=@$arrq[$x][$y]['courseteacher'];
				
					  $teacher=iconv('UTF-8', 'GBK', $teacher);
				 if(is_file(ZSystem.'/data/app/timetables/teacher/'.$teacher.'.php')){
				 $arrtemp = SetRead( '/system/data/app/timetables/teacher/'.$teacher.'.php');
				 }else{$arrtemp =array();} 
				 $mytempinfo=$arrq[$x][$y];
				  $mytempinfo['xy']=$info['xy'];
				  $mytempinfo['xzb']=$info['xzb'];
				 if(empty( $arrtemp[$x][$y]))
				 {
					 $arrtemp[$x][$y][0]=$mytempinfo;
					 
				 }else{
						 $temp=$arrtemp[$x][$y];array_push($temp,$mytempinfo); $arrtemp[$x][$y]=array_unique_fb($temp);
				 }
				 } 
				 
				  if(!EMPTY($arrq[$x][$y][0])&&!EMPTY($arrq[$x][$y][0]['courseteacher'])) { 
				 
				  $teacher=@$arrq[$x][$y][0]['courseteacher'];
				
				 $teacher=iconv('UTF-8', 'GBK', $teacher);
				 if(is_file(ZSystem.'/data/app/timetables/teacher/'.$teacher.'.php')){
				 $arrtemp = SetRead( '/system/data/app/timetables/teacher/'.$teacher.'.php');
				 }else{$arrtemp =array();} 
				 $mytempinfo=$arrq[$x][$y][0];
				  $mytempinfo['xy']=$info['xy'];
				  $mytempinfo['xzb']=$info['xzb'];
				 if(empty( $arrtemp[$x][$y]))
				 {
					 $arrtemp[$x][$y][0]=$mytempinfo;
					 
				 }else{
						 $temp=$arrtemp[$x][$y];array_push($temp,$mytempinfo); $arrtemp[$x][$y]=array_unique_fb($temp);
				 }
				 }

				   if(!EMPTY($arrq[$x][$y][1])&&!EMPTY($arrq[$x][$y][1]['courseteacher'])) {
					    
						$teacher=@$arrq[$x][$y][1]['courseteacher'];
					
						$teacher=iconv('UTF-8', 'GBK', $teacher);
				 if(is_file(ZSystem.'/data/app/timetables/teacher/'.$teacher.'.php')){
				 $arrtemp = SetRead( '/system/data/app/timetables/teacher/'.$teacher.'.php');
				 }else{$arrtemp =array();} 
				 $mytempinfo=$arrq[$x][$y][1];
				  $mytempinfo['xy']=$info['xy'];
				  $mytempinfo['xzb']=$info['xzb'];
				 if(empty( $arrtemp[$x][$y]))
				 {
					 $arrtemp[$x][$y][0]=$mytempinfo;
					 
				 }else{
						 $temp=$arrtemp[$x][$y];array_push($temp,$mytempinfo); $arrtemp[$x][$y]=array_unique_fb($temp);
				 }
				 }
			
				  if(!empty($teacher))SStetWrite(($arrtemp), $teacher. '.php');
				  $arrtemp='';
				 unset($arrtemp);
			$teacher='';
				 unset($teacher);
				 } 					
}
} 
			}
function array_unique_fb($array2D,$stkeep=false,$ndformat=true)  
{  
    // 判断是否保留一级数组键 (一级数组键可以为非数字)  
    if($stkeep) $stArr = array_keys($array2D);  
  
    // 判断是否保留二级数组键 (所有二级数组键必须相同)  
    if($ndformat) $ndArr = array_keys(end($array2D));  
  
    //降维,也可以用implode,将一维数组转换为用逗号连接的字符串  
    foreach ($array2D as $v){  
        $v = join(",",$v);   
        $temp[] = $v;  
    }  
  
    //去掉重复的字符串,也就是重复的一维数组  
    $temp = array_unique($temp);   
  
    //再将拆开的数组重新组装  
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
	$File = ZRoot.'/system/data/app/timetables/room/'.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}
function SStetWrite($Data,$Dir){
	$File = ZRoot.'/system/data/app/timetables/teacher/'.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}			
?>