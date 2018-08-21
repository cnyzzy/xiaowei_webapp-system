<?php
define('AROOT',ZSystem.'/data/app/rgcs');
define('RROOT',AROOT.'/wx/');
empty($params[0]) ? $LId = '1' : $LId = $params[0];
IF($LId == 'ok'){
	empty($params[1]) ? $Id = '0' : $Id = $params[1];

		 	if(is_file(ZSystem.'/data/app/rgcs/wx/'.$Id.'.php')){
		if(filemtime(ZSystem.'/data/app/rgcs/wx/'.$Id.'.php')<time()-600){
		unlink(ZSystem.'/data/app/rgcs/wx/'.$Id.'.php');
			printjson("no",'失效');	
			}else{
				
				$oarr = SetRead('/system/data/app/rgcs/wx/'.$Id.'.php');
			
if(isset($oarr['isok'])){
	if($oarr['isok']==1){
$_SESSION['wx']=$oarr['wx'];
$_SESSION['zid']=$oarr['zid'];
unlink(ZSystem.'/data/app/rgcs/wx/'.$Id.'.php');
		printjson("ok",'登录成功');
		
	}
	if($oarr['isok']==0)printjson("re",'1');
}else{
		printjson("no",'文件失效');	
}
			}
			
			}else{
				printjson("no",'初始化失败');
			}
	$array['isok']=0;
}
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