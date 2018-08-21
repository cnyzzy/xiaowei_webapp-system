<?php
define('RRqOOT',ZRoot.'/system/data/app/jsdh/teacher/');
empty($params[0]) ? $id = '0' : $id =urldecode($params[0]);
$bmname = "";
if($id!='0'){
	$ida=iconv('UTF-8', 'GBK', $id);
	if(is_file(ZSystem.'/data/app/jsdh/teacher/'.$ida.'.php')){
				$arr1 = SetRead( '/system/data/app/jsdh/teacher/'.$ida.'.php');
				  $sql = "SELECT * FROM teacherphone WHERE sx='{$id}' order by id asc";
		$row = $DB->once_fetch_array($sql);
		$bmname = $row['bm']; 
		$bmsx = $row['sx']; 
			}else{
	    $sql = "SELECT * FROM teacherphone WHERE sx='{$id}' order by id asc";
		$row = $DB->fetch_all_array($sql);
		$bmname = $row[0]['bm']; 
		$bmsx = $row[0]['sx']; 
		       $Res = array();  
           foreach ($row as $sett) {  
			
              $sname = $sett['name'];  
            $sett['sx2']=getfirstchar(mb_substr($sett['name'],0,1,'utf-8')).getfirstchar(mb_substr($sett['name'],1,1,'utf-8')).mb_strlen($sett['name'],'utf-8');
               $snameFirstChar = getfirstchar($sname);

			   if(isset($Res[$snameFirstChar][0])){
				   array_push($Res[$snameFirstChar],$sett);
			   }ELSE{$Res[$snameFirstChar][0]=$sett;}
            
           }              
          ksort($Res);
		SSetWrite($Res,$ida.'.php');
			$arr1 = $Res;	
}
}	
function SSqetWrite($Data,$Dir){
	$File = RRqOOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}
