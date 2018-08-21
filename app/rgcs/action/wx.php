<?php
if(!is_dir(ZSystem.'/data/app/rgcs') )mkdir(ZSystem.'/data/app/rgcs');
if(!is_dir(ZSystem.'/data/app/rgcs/wx') )mkdir(ZSystem.'/data/app/rgcs/wx');
$error='';
if(empty($params[0])){$Id = '0';}else{$Id = $params[0];}

if($Id=='0')$error='二维码有误'.$Id;
	if($Id!='0'){
	define('AROOT',ZSystem.'/data/app/rgcs/wx/');
	if(is_file(ZSystem.'/data/app/rgcs/wx/'.$Id.'.php')){
		if(filemtime(ZSystem.'/data/app/rgcs/wx/'.$Id.'.php')<time()-600){
		unlink(ZSystem.'/data/app/rgcs/wx/'.$Id.'.php');
		$Id=0;
		$error='登录二维码已经过期';
	}else{
	$array['isok']=1;
	$array['wx']=$_SESSION['wx'];
	$array['zid']=$_SESSION['zid'];
	SSetWrite($array,$Id.'.php');
	
	}
	}else{
		$Id=0;
		$error='登录二维码已经失效';
	}
	}
	function SSetWrite($Data,$Dir){
	$File = AROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}	