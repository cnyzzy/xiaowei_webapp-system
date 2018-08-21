<?php


	   //$data=readfile(ZApp.'/home/model/images/loading.gif');

if(empty($_SESSION['zid']['number'])){

printjson("error",'非法数值');


	} 

 $filelist=glob(ZSystem."/data/app/img/".$_SESSION['zid']['number']."/*.jpg");
 $filenow='';
 $filetime=1;
	 if(count($filelist)!=0){
       foreach ($filelist as $key => $file) {
		    if(file_exists($file)) {
				$filesize=abs(filesize($file)); 
   if(filemtime($file)<time()-24*60*60*90||$filesize<1024)unlink($file);

		   if(filemtime($file)> $filetime&&$filesize>1024) $filenow=$file;
		   
			}
	 }}
	 //PRINT_r($filenow);
     if(file_exists($filenow)){ $src= $filenow;
	 printjson("ok",basename($src) );

	 }ELSE{
		 printjson("no",'没有图片');

	 }

function printjson($type,$msg)
{
	ob_flush();
ob_clean();
IF(is_array($msg)){
	$Errormsg=array (
  'type' => urlencode ($type),
  'msg' => array_urlencode ($msg),
); 
}ELSE
	
	{$Errormsg=array (
  'type' => urlencode ($type),
  'msg' => urlencode ($msg),
); }
$php_json = json_encode($Errormsg); 
echo urldecode($php_json); 
exit;
}