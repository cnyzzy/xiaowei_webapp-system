<?php
$number=$_SESSION['zid']['number'];

$iskcbdown=0;
if(is_file(ZSystem.'/data/app/timetables/'.KCBDATE.'/'.$number.'.php')){
				$arrKCB = SetRead('/system/data/app/timetables/'.KCBDATE.'/'.$number.'.php');
			}
			if(is_file(ZSystem.'/data/app/timetables/'.KCBDATE.'/print/'.$number.'.php')){
$iskcbdown=1;			}
if(is_file(ZSystem.'/data/app/timetables/'.KCBDATE.'/'.$number.'1.php')){
	$sql2 = "SELECT * FROM jwinfo WHERE number ='{$number}' and isok=1";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
				$arrq = SetRead( '/system/data/app/timetables/'.KCBDATE.'/'.$number.'1.php');
				for($y=1; $y<11; $y++) {
				for($x=1; $x<8; $x++) {
				 if(!EMPTY($arrq[$x][$y])&&!EMPTY($arrq[$x][$y]['courseplace'])) {
					  $placeroom=$arrq[$x][$y]['courseplace'];
					
					  $placeroom=iconv('UTF-8', 'GBK', $placeroom);
					
				 if(is_file(ZSystem.'/data/app/timetables/'.KCBDATE.'/room/'.$placeroom.'.php')){
				 $arrtemp = SetRead( '/system/data/app/timetables/'.KCBDATE.'/room/'.$placeroom.'.php');
				 }else{$arrtemp =array();} 
				 $mytempinfo=$arrq[$x][$y];
				  $mytempinfo['xy']=$info['xy'];
				  $mytempinfo['xzb']=$info['xzb'];
				 if(empty( $arrtemp[$x][$y]))
				 {
					 $arrtemp[$x][$y][0]=$mytempinfo;
					 
				 }else{
					array_push($arrtemp[$x][$y],$mytempinfo); 
					$arrtemp[$x][$y]=array_unique_fb($arrtemp[$x][$y]);
				 }
				 } 
				 
				  if(!EMPTY($arrq[$x][$y][0])&&!EMPTY($arrq[$x][$y][0]['courseplace'])) { 
				  $placeroom=$arrq[$x][$y][0]['courseplace'];
				
				   $placeroom=iconv('UTF-8', 'GBK', $placeroom);
			
				 if(is_file(ZSystem.'/data/app/timetables/'.KCBDATE.'/room/'.$placeroom.'.php')){
				 $arrtemp = SetRead( '/system/data/app/timetables/'.KCBDATE.'/room/'.$placeroom.'.php');
				 }else{$arrtemp =array();} 
				 $mytempinfo=$arrq[$x][$y][0];
				  $mytempinfo['xy']=$info['xy'];
				  $mytempinfo['xzb']=$info['xzb'];
				 if(empty( $arrtemp[$x][$y]))
				 {
					 $arrtemp[$x][$y][0]=$mytempinfo;
					 
				 }else{
					array_push($arrtemp[$x][$y],$mytempinfo); 
					$arrtemp[$x][$y]=array_unique_fb($arrtemp[$x][$y]);
				 }
				 }

				   if(!EMPTY($arrq[$x][$y][1])&&!EMPTY($arrq[$x][$y][1]['courseplace'])) {
					    $placeroom=$arrq[$x][$y][1]['courseplace'];
				
						$placeroom=iconv('UTF-8', 'GBK', $placeroom);
					
				 if(is_file(ZSystem.'/data/app/timetables/'.KCBDATE.'/room/'.$placeroom.'.php')){
				 $arrtemp = SetRead( '/system/data/app/timetables/'.KCBDATE.'/room/'.$placeroom.'.php');
				 }else{$arrtemp =array();} 
				 $mytempinfo=$arrq[$x][$y][1];
				  $mytempinfo['xy']=$info['xy'];
				  $mytempinfo['xzb']=$info['xzb'];
				 if(empty( $arrtemp[$x][$y]))
				 {
					 $arrtemp[$x][$y][0]=$mytempinfo;
					 
				 }else{
					array_push($arrtemp[$x][$y],$mytempinfo); 
					$arrtemp[$x][$y]=array_unique_fb($arrtemp[$x][$y]);
				 }
				 }
				 if(!empty($placeroom))SSetWrite( $arrtemp ,$placeroom. '.php');
	
				 unset($arrtemp);
				 unset($placeroom);
			
				 } 					
}
for($y=1; $y<11; $y++) {
				for($x=1; $x<8; $x++) {
				 if(!EMPTY($arrq[$x][$y])&&!EMPTY($arrq[$x][$y]['courseteacher'])) {
					
					  $teacher=@$arrq[$x][$y]['courseteacher'];
				
					  $teacher=iconv('UTF-8', 'GBK', $teacher);
				 if(is_file(ZSystem.'/data/app/timetables/'.KCBDATE.'/teacher/'.$teacher.'.php')){
				 $arrtemp = SetRead( '/system/data/app/timetables/'.KCBDATE.'/teacher/'.$teacher.'.php');
				 }else{$arrtemp =array();} 
				 $mytempinfo=$arrq[$x][$y];
				  $mytempinfo['xy']=$info['xy'];
				  $mytempinfo['xzb']=$info['xzb'];
				 if(empty( $arrtemp[$x][$y]))
				 {
					 $arrtemp[$x][$y][0]=$mytempinfo;
					 
				 }else{
					array_push($arrtemp[$x][$y],$mytempinfo); 
					$arrtemp[$x][$y]=array_unique_fb($arrtemp[$x][$y]);
				 }
				 } 
				 
				  if(!EMPTY($arrq[$x][$y][0])&&!EMPTY($arrq[$x][$y][0]['courseplace'])) { 
				 
				  $teacher=@$arrq[$x][$y][0]['courseteacher'];
				
				 $teacher=iconv('UTF-8', 'GBK', $teacher);
				 if(is_file(ZSystem.'/data/app/timetables/'.KCBDATE.'/teacher/'.$teacher.'.php')){
				 $arrtemp = SetRead( '/system/data/app/timetables/'.KCBDATE.'/teacher/'.$teacher.'.php');
				 }else{$arrtemp =array();} 
				 $mytempinfo=$arrq[$x][$y][0];
				  $mytempinfo['xy']=$info['xy'];
				  $mytempinfo['xzb']=$info['xzb'];
				 if(empty( $arrtemp[$x][$y]))
				 {
					 $arrtemp[$x][$y][0]=$mytempinfo;
					 
				 }else{
					array_push($arrtemp[$x][$y],$mytempinfo); 
					$arrtemp[$x][$y]=array_unique_fb($arrtemp[$x][$y]);
				 }
				 }

				   if(!EMPTY($arrq[$x][$y][1])&&!EMPTY($arrq[$x][$y][1]['courseplace'])) {
					    
						$teacher=@$arrq[$x][$y][1]['courseteacher'];
					
						$teacher=iconv('UTF-8', 'GBK', $teacher);
				 if(is_file(ZSystem.'/data/app/timetables/'.KCBDATE.'/teacher/'.$teacher.'.php')){
				 $arrtemp = SetRead( '/system/data/app/timetables/'.KCBDATE.'/teacher/'.$teacher.'.php');
				 }else{$arrtemp =array();} 
				 $mytempinfo=$arrq[$x][$y][1];
				  $mytempinfo['xy']=$info['xy'];
				  $mytempinfo['xzb']=$info['xzb'];
				 if(empty( $arrtemp[$x][$y]))
				 {
					 $arrtemp[$x][$y][0]=$mytempinfo;
					 
				 }else{
					array_push($arrtemp[$x][$y],$mytempinfo); 
					$arrtemp[$x][$y]=array_unique_fb($arrtemp[$x][$y]);
				 }
				 }
			
				  if(!empty($teacher))SStetWrite( $arrtemp, $teacher. '.php');
				 unset($arrtemp);
			
				 unset($teacher);
				 } 					
}
  if(is_file(ZSystem.'/data/app/timetables/'.KCBDATE.'/'.$number.'1.php')) unlink(ZSystem.'/data/app/timetables/'.KCBDATE.'/'.$number.'1.php');
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
	$File = ZRoot.'/system/data/app/timetables/'.KCBDATE.'/room/'.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}
function SStetWrite($Data,$Dir){
	$File = ZRoot.'/system/data/app/timetables/'.KCBDATE.'/teacher/'.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}				
				