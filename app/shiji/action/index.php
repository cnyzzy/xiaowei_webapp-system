<?php

define('RRXOOT',ZSystem.'/data/app/shiji/'.$number.'/');

srand((float) microtime() * 10000000);
$colorarray = array ("#e0eee8","#f9906f","#a4e2c6","#1685a9","#88ada6","#ef7a82","#808080");

empty($params[0]) ? $NoticeW = '1' : $NoticeW = $params[0];
	if(!is_dir(ZSystem.'/data/app/shiji/'.$number) )mkdir(ZSystem.'/data/app/shiji/'.$number);
	if(is_file(ZSystem.'/data/app/shiji/'.$number.'/first.php') )
			{$arrfirst = SetRead('/system/data/app/shiji/'.$number.'/first.php');
		
		$firstnum=count($arrfirst);
		
	
		}
else{
		if(is_file(ZSystem.'/data/app/shiji/'.$number.'/list.php') ){
			$arrlistre = SetRead('/system/data/app/shiji/'.$number.'/list.php');
			if(!empty($arrlistre)){
(count()>20)?$arrlist=array_slice($arrlistre,0,20):$arrlist=$arrlistre;
		$data=array();
		foreach ($arrlist as $key=>$arr) {
			   if(is_numeric($arr)){ $sql = "SELECT  * FROM Shiji WHERE id ='{$arr}' and isok='1'";
			   $row = $DB->once_fetch_array($sql);
			   $data[]=$row;}
		}
		foreach ($data as $key=>$arr) { 
foreach ($arr as $key2=>$arr2) { 
if(is_numeric($key2))unset($data[$key][$key2]);
}

}
		$arrfirst=$data;
		if(count($arrfirst)>20)$arrfirst=array_slice($arrfirst,0,20);
		SSXetWrite($arrfirst,'first.php');

}
	}

	
}
$isloading=0;	
$Shiji = new Shiji($DB);
if(!empty($arrfirst)){
	
		foreach ($arrfirst as $key=>$arr) { 
	$num = $Shiji->LikeNumA($arr['id'],$number);
	$liked=$Shiji->ShijiLikeNumA($arr['id']);
if($arr['id']!='0'&&$num!=0)$arrfirst[$key]['iszan']=1;
if(!empty($liked)&&$liked!=$arr['liked'])$arrfirst[$key]['liked']=$liked;
}
if(count($arrfirst)==20)$isloading=1;	

}
	$sql = "SELECT * FROM `shiji` where isok='1' order by liked desc LIMIT 0,10";
		$row = $DB->fetch_all_array($sql);

	foreach ($row as $key=>$arr) { 
foreach ($arr as $key2=>$arr2) { 
if(is_numeric($key2))unset($row[$key][$key2]);
	}
	   if(is_numeric($arr['id'])){
			   	$num = $Shiji->LikeNumA($arr['id'],$number);
if($arr['id']!='0'&&$num!=0)$row[$key]['iszan']=1;
			   }
	}
if(!empty($row))$arrtop=$row;

	function SSXetWrite($Data,$Dir){
	$File = RRXOOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}

