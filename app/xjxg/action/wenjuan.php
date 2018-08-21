<?php
define('AROOT',ZSystem.'/data/app/xjxg/'.$openid);
define('RROOT',AROOT.'/ok/');
$nonono=0;
$again=0;
if(is_file(AROOT.'/result/s.php'))$again=1;
if(is_file(AROOT.'/ok/o.php'))	unlink(AROOT.'/ok/o.php'); 
if(is_file(AROOT.'/load/o.php'))
{
$oarr = SetRead('/system/data/app/xjxg/'.$openid.'/load/o.php');	
unlink(AROOT.'/load/o.php'); 
unlink(AROOT.'/load/q.php'); 
SSetWrite($oarr,'o.php');
if(count($oarr,0)!=20)
{
	$nonono=1;
	unlink(AROOT.'/ok/o.php'); 
}


}else{
if(is_file(AROOT.'/load/q.php'))
{$qarr = SetRead('/system/data/app/xjxg/'.$openid.'/load/q.php');	
	$oarr = makeoarr($qarr);
}else{
$sql = "SELECT * FROM  ks_question WHERE appid = '1' order by rand() LIMIT 20";
$row = $DB->fetch_all_array($sql);
$oarr = makeoarr($row);
}	

	

	
}
$time=time();
function SSetWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}		
function makeoarr($qarr)
	{
	global $DB;				
$sjarr=array();			
foreach((array)$qarr as $key=>$loopChild)
 {
$sjarr[$key]['title']=	 $loopChild['title'];
$sjarr[$key]['pid']=	 $loopChild['id'];
$sjarr[$key]['option']=array();
$sql = "SELECT id,content,score FROM  ks_option WHERE pid = '".$loopChild['id']."' AND appid = '1' order by rand()";
$oarr = $DB->fetch_all_array($sql);
foreach((array)$oarr as $key2=>$Child)
 {
$sjarr[$key]['option'][$key2]['id']=$Child['id'];
$sjarr[$key]['option'][$key2]['content']=$Child['content'];
$sjarr[$key]['option'][$key2]['score']=$Child['score'];
 }
 }	

SSetWrite($sjarr ,'o.php');
return $sjarr;
	}
	