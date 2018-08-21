<?php
if(empty($openid)){$openid=session_id();
if(!is_dir(ZSystem.'/data/app/rgcs/'.$openid) )mkdir(ZSystem.'/data/app/rgcs/'.$openid);
	if(!is_dir(ZSystem.'/data/app/rgcs/'.$openid.'/load') )mkdir(ZSystem.'/data/app/rgcs/'.$openid.'/load');
	if(!is_dir(ZSystem.'/data/app/rgcs/'.$openid.'/ok') )mkdir(ZSystem.'/data/app/rgcs/'.$openid.'/ok');
	if(!is_dir(ZSystem.'/data/app/rgcs/'.$openid.'/result') )mkdir(ZSystem.'/data/app/rgcs/'.$openid.'/result');

}
define('AROOT',ZSystem.'/data/app/rgcs/'.$openid);
define('RROOT',AROOT.'/load/');

$Wx = new Wx();
$signPackage=$Wx->getSignPackage();
if(is_file(AROOT.'/load/q.php')){
	if(filemtime(AROOT.'/load/q.php')<time()-60){
		unlink(AROOT.'/load/q.php');
		if(is_file(AROOT.'/load/o.php'))unlink(AROOT.'/load/o.php');
		$needmysql=1;
	}else{
		$needmysql=0;
	}
}else{
			$needmysql=1;	
			}
$ismobile=0;
if(ismobile())$ismobile=1;			
			if($needmysql==1){
$sql = "SELECT * FROM  rg_question WHERE appid = '1' order by id ASC LIMIT 144";
$row = $DB->fetch_all_array($sql);
foreach ($row as $key=>$arr) { 
foreach ($arr as $key2=>$arr2) { 
if(is_numeric($key2))unset($row[$key][$key2]);
	}
	}
SSetWrite($row,'q.php');
if(is_file(AROOT.'/load/o.php'))unlink(AROOT.'/load/o.php');
			}

		if(empty($_SESSION['zid']['openid'])){
$isstop=1;
	}else{
		$isstop=0;
	}	
function SSetWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}			
