<?php

define('RRXOOT',ZSystem.'/data/app/shiji/'.$number.'/');

srand((float) microtime() * 10000000);
$colorarray = array ("#e0eee8","#f9906f","#a4e2c6","#1685a9","#88ada6","#ef7a82","#808080");


$isloading=0;	
$Shiji = new Shiji($DB);


	$sql = "SELECT sid,addtime FROM `shiji_like` where number='{$number}' order by addtime desc LIMIT 0,10";
		$row = $DB->fetch_all_array($sql);

if($row){$arrtop=array();
	foreach ($row as $key=>$arr) { 
$array=$Shiji->ReceiveShiji($arr['sid']);
	   if(is_numeric($array['id'])){
			$array['iszan']=1;
			$array['liketime']=$arr['addtime'];
			$arrtop[]=$array;
			   }
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

