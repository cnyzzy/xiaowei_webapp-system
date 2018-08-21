<?php
	define('AOOT',ZSystem.'/data/app/rgcs/wx/');

	 	 $Id=session_id();
		 if(empty($Id))$Id=getRandStr();
if(!is_dir(ZSystem.'/data/app/rgcs') )mkdir(ZSystem.'/data/app/rgcs');
if(!is_dir(ZSystem.'/data/app/rgcs/wx') )mkdir(ZSystem.'/data/app/rgcs/wx');
 if(ismobile()){
$url=$arrInfo['url'].'/rgcs';
 if(is_weixin())
{header("Location:". $url);
exit;}else{
	$url=$arrInfo['url'].'/rgcs/noh';
header("Location:". $url);
exit;	
}
 }else{

		 	if(is_file(ZSystem.'/data/app/rgcs/wx/'.$Id.'.php')){
		if(filemtime(ZSystem.'/data/app/rgcs/wx/'.$Id.'.php')<time()-600){
		unlink(ZSystem.'/data/app/rgcs/wx/'.$Id.'.php');
			}}
	$array['isok']=0;
	SSetWrite($array,$Id.'.php');
	$url=$arrInfo['url'].'/rgcs/wx/'.$Id; 

 }

function SSetWrite($Data,$Dir){
	$File = AOOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}	
 
 
	