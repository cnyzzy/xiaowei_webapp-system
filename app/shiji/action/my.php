<?php

define('RRXOOT',ZSystem.'/data/app/shiji/'.$number.'/');

srand((float) microtime() * 10000000);
$colorarray = array ("#e0eee8","#f9906f","#a4e2c6","#1685a9","#88ada6","#ef7a82","#808080");


$isloading=0;	
$Shiji = new Shiji($DB);


	$sql = "SELECT * FROM `shiji_my` where number='{$number}' order by ctime desc LIMIT 0,10";
		$row = $DB->fetch_all_array($sql);

if($row){$arrtop=array();
	foreach ($row as $key=>$arr) { 

	   if(is_numeric($arr['sid'])){
		   $row[$key]['ok']=$Shiji->ReceiveShiji($arr['sid']);

		
			   }
			   	$arrtop[]=$row[$key];
	}

}
	function SSXetWrite($Data,$Dir){
	$File = RRXOOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}

