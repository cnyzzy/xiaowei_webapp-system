<?php
define('AROOT',ZSystem.'/data/app/xjxg/'.$openid);
define('RROOT',AROOT.'/load/');

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
$qarr = $DB->fetch_all_array($sql);
SSetWrite($qarr ,'q.php');
if(is_file(AROOT.'/load/o.php'))unlink(AROOT.'/load/o.php');
			}else{
	$qarr = SetRead('/system/data/app/xjxg/'.$openid.'/load/q.php');			
			}
if(is_file(AROOT.'/load/o.php'))unlink(AROOT.'/load/o.php');
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
	printjson("ok",'1');	
function printjson($type,$msg)
{
	ob_flush();
ob_clean();

			$Errormsg=array (
  'type' => urlencode ($type),
  'msg' => urlencode ($msg),
); 
$php_json = json_encode($Errormsg); 
echo urldecode($php_json); 
exit;
}	
function SSetWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}			