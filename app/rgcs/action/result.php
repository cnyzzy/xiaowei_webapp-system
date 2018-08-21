<?php
define('AROOT',ZSystem.'/data/app/rgcs/'.$openid);
define('RROOT',AROOT.'/result/');
$Wx = new Wx();
//$signPackage=$Wx->getSignPackage();
$nonono=1;	
if(is_file(AROOT.'/result/s.php')){
	 $sarr = SetRead('/system/data/app/rgcs/'.$openid.'/result/s.php');	
	
	  if(count($sarr,0)<144)
{
 $nonono=1;	
}else{
$nonono=0;	


}
if(!empty($sarr['total'])){
$total=json_decode($sarr['total'],true);
	foreach($total as $key=>$a)
{
    $tarray[] = array(
	'type'=>$key,
	'num'=>$a,
	);
}
  $tarray = my_sort($tarray,'num',SORT_DESC); 
//print_r($tarray);
}
}
$is100=0;
$sql = "SELECT * FROM  rg_result WHERE appid = '1' and openid = '".$openid."' order by addtime desc";
$row = $DB->fetch_all_array($sql);

 $sq2 = "SELECT * FROM  rg_cj WHERE openid = '".$openid."'";
	 $result2 =$DB->once_fetch_array($sq2);	
	 if(empty($result2))
	 {$nodj=1;
 $nocj=1;}ELSE{
		$nodj=0;
		 if(empty($result2['cj']))
		 {
		 $nocj=1;}ELSE{
			$nocj=0; 
		 }
		 
	 }
	 function my_sort($arrays,$sort_key,$sort_order=SORT_ASC,$sort_type=SORT_NUMERIC ){  
        if(is_array($arrays)){  
            foreach ($arrays as $array){  
                if(is_array($array)){  
                    $key_arrays[] = $array[$sort_key];  
                }else{  
                    return false;  
                }  
            }  
        }else{  
            return false;  
        } 
        array_multisort($key_arrays,$sort_order,$sort_type,$arrays);  
        return $arrays;  
    } 
function SSetWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}			