<?php
define('RROOT',ZRoot.'/system/data/app/jsdh/');
if(!is_dir(ZSystem.'/data/app/jsdh') )mkdir(ZSystem.'/data/app/jsdh');
if(!is_dir(ZSystem.'/data/app/jsdh/teacher') )mkdir(ZSystem.'/data/app/jsdh/teacher');
if(!is_file(ZRoot.'/system/data/app/jsdh/title.php'))
{
	    $sql = "SELECT  bm, sx,count(id) AS num FROM teacherphone GROUP BY bm ORDER BY id ASC";
	
		$row = $DB->fetch_all_array($sql);
		       $Res = array();  
           foreach ($row as $sett) {  

              $sname = $sett['bm'];  
            $sett['sx']=getfirstchar(mb_substr($sett['bm'],0,1,'utf-8')).getfirstchar(mb_substr($sett['bm'],1,1,'utf-8')).mb_strlen($sett['bm'],'utf-8');
               $snameFirstChar = getfirstchar($sname);
			  $Arr = array( 
				'sx'	=> $sett['sx'],
			);
		$row = $DB->updateArr('teacherphone',$Arr,"where bm ='{$sett['bm']}'");
			   if(isset($Res[$snameFirstChar][0])){
				   array_push($Res[$snameFirstChar],$sett);
			   }ELSE{$Res[$snameFirstChar][0]=$sett;}
            
           }              
          ksort($Res);
		SSetWrite($Res,'title.php');
}
function SSetWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}
function getfirstchar($s0){ 
$firstchar_ord=ord(strtoupper($s0{0})); 
if (($firstchar_ord>=65 and $firstchar_ord<=91)or($firstchar_ord>=48 and $firstchar_ord<=57)) return $s0{0}; 
$s=@iconv("UTF-8","gb2312", $s0); 
$asc=@ord($s{0})*256+@ord($s{1})-65536; 
if($asc>=-20319 and $asc<=-20284)return "a"; 
if($asc>=-20283 and $asc<=-19776)return "b"; 
if($asc>=-19775 and $asc<=-19219)return "c"; 
if($asc>=-19218 and $asc<=-18711)return "d"; 
if($asc>=-18710 and $asc<=-18527)return "e"; 
if($asc>=-18526 and $asc<=-18240)return "f"; 
 if($asc >= -18239 and $asc <= -17760) return "g"; 
    if($asc >= -17759 and $asc <= -17248) return "h"; 
    if($asc >= -17247 and $asc <= -17418) return "i"; 
if($asc>=-17417 and $asc<=-16475)return "j"; 
if($asc>=-16474 and $asc<=-16213)return "k"; 
if($asc>=-16212 and $asc<=-15641)return "l"; 
if($asc>=-15640 and $asc<=-15166)return "m"; 
if($asc>=-15165 and $asc<=-14923)return "n"; 
if($asc>=-14922 and $asc<=-14915)return "o"; 
if($asc>=-14914 and $asc<=-14631)return "p"; 
if($asc>=-14630 and $asc<=-14150)return "q"; 
if($asc>=-14149 and $asc<=-14091)return "r"; 
if($asc>=-14090 and $asc<=-13319)return "s"; 
if($asc>=-13318 and $asc<=-12839)return "t"; 
if($asc>=-12838 and $asc<=-12557)return "w"; 
if($asc>=-12556 and $asc<=-11848)return "x"; 
if($asc>=-11847 and $asc<=-11056)return "y"; 
if($asc>=-11055 and $asc<=-10247)return "z"; 
return null; 
} 