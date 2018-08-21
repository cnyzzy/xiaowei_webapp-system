<?php
if(!is_dir(ZSystem.'/data/app/code') )mkdir(ZSystem.'/data/app/code');
if(!is_dir(ZSystem.'/data/app/code/temp') )mkdir(ZSystem.'/data/app/code/temp');
if(!is_dir(ZSystem.'/data/app/code/temp/'.date("Y-m-d")) )mkdir(ZSystem.'/data/app/code/temp/'.date("Y-m-d"));
if(date("H")>22){
	if(!is_dir(ZSystem.'/data/app/code/temp/'.date("Y-m-d",strtotime("+1 day"))) )mkdir(ZSystem.'/data/app/code/temp/'.date("Y-m-d",strtotime("+1 day")));

}
ob_clean();
header('Content-Type:image/gif');
session_start();
$res=  $_SESSION['res'];

     $iii = ($res[1]);  
	    $authcode_url='http://'.$arrInfo['jwurl'].'/('.$iii.')/CheckCode.aspx';
   //ECHO  $authcode_url;
   $curl   = curl_init();  
   curl_setopt($curl, CURLOPT_URL, $authcode_url);
	curl_setopt($curl, CURLOPT_REFERER, 'http://'.$arrInfo['jwurl'].'/('.$iii.')/default2.aspx');
    curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,4); 
	curl_setopt($curl, CURLOPT_TIMEOUT,5); 
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
   $data = curl_exec($curl);        //得到图片数据 
   $codename=md5(time().$iii);
   curl_close($curl);  
 if(!empty($data)){saveFile(ZSystem.'/data/app/code/temp/'.date("Y-m-d").'/'.$codename.".gif", $data);
  if(date("H")>22){saveFile(ZSystem.'/data/app/code/temp/'.date("Y-m-d",strtotime("+1 day")).'/'.$codename.".gif", $data);}
 $_SESSION['codename']=$codename;
 }
   if(empty($data)){$data=readfile(ZApp.'/home/model/images/loading.gif');} 

print_r($data);

 function saveFile($fileName, $text) {
         if (!$fileName || !$text)
             return false;

         if (makeDir(dirname($fileName))) {
             if ($fp = fopen($fileName, "a")) {
                 if (@fwrite($fp, $text)) {
                     fclose($fp);
                     return true;
                 } else {
                     fclose($fp);
                     return false;
                 } 
             } 
         } 
         return false;
     } 



 

	?>