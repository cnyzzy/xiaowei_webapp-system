<?php
define('AROOT',ZSystem.'/data/app/xjxg/'.$openid);
define('RROOT',AROOT.'/load/');
$Wx = new Wx();
$signPackage=$Wx->getSignPackage();
if(is_file(AROOT.'/load/q.php')){
	if(filemtime(AROOT.'/load/q.php')>time()-600){
		unlink(AROOT.'/load/q.php');
		if(is_file(AROOT.'/load/o.php'))unlink(AROOT.'/load/o.php');
		$needmysql=1;
	}else{
		$needmysql=0;
	}
}else{
			$needmysql=1;	
			}
			
			if($needmysql==1){
$sql = "SELECT * FROM  ks_question WHERE appid = '1' order by rand() LIMIT 20";
$row = $DB->fetch_all_array($sql);
SSetWrite($row ,'q.php');
if(is_file(AROOT.'/load/o.php'))unlink(AROOT.'/load/o.php');
			}
function SSetWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}			