<?php
if(!is_dir(ZSystem.'/data/app/code') )mkdir(ZSystem.'/data/app/code');
if(!is_dir(ZSystem.'/data/app/code/temp') )mkdir(ZSystem.'/data/app/code/temp');
if(!is_dir(ZSystem.'/data/app/code/temp/'.date("Y-m-d")) )mkdir(ZSystem.'/data/app/code/temp/'.date("Y-m-d"));
if(date("H")>22){
	if(!is_dir(ZSystem.'/data/app/code/temp/'.date("Y-m-d",strtotime("+1 day"))) )mkdir(ZSystem.'/data/app/code/temp/'.date("Y-m-d",strtotime("+1 day")));

}
if(!is_dir(ZSystem.'/data/app/code/right') )mkdir(ZSystem.'/data/app/code/right');
if(!is_dir(ZSystem.'/data/app/code/right/'.date("Y-m-d")) )mkdir(ZSystem.'/data/app/code/right/'.date("Y-m-d"));
if(date("H")>22){
	if(!is_dir(ZSystem.'/data/app/code/right/'.date("Y-m-d",strtotime("+1 day"))) )mkdir(ZSystem.'/data/app/code/right/'.date("Y-m-d",strtotime("+1 day")));

}
if(is_dir(ZSystem.'/data/app/code/right/'.date("Y-m-d",strtotime("-1 day"))) )deldir(ZSystem.'/data/app/code/right/'.date("Y-m-d",strtotime("-1 day")));
if(is_dir(ZSystem.'/data/app/code/right/'.date("Y-m-d",strtotime("-2 day"))) )deldir(ZSystem.'/data/app/code/right/'.date("Y-m-d",strtotime("-2 day")));
if(is_dir(ZSystem.'/data/app/code/right/'.date("Y-m-d",strtotime("-3 day"))) )deldir(ZSystem.'/data/app/code/right/'.date("Y-m-d",strtotime("-3 day")));


session_start();
$codename=  @$_SESSION['codename'];
if(empty($codename)){ 	printjson("error","数据未缓存");	}
$file=ZSystem.'/data/app/code/temp/'.date("Y-m-d").'/'.$codename.".gif";
     if(!is_file($file)){ 	printjson("error","验证码未保存");	}

$valite = new ReadCode();



$valite->setImage($file);
$valite->getHec();

$result=$valite->filterInfo();
   if(!empty($result)&&strlen($result)==4){
	   	printjson("ok",$result);	
   }else{
	  	printjson("no",$result);	
   }
function printjson($type,$msg,$text='')
{
	ob_flush();
ob_clean();

			$Errormsg=array (
  'type' => urlencode ($type),
  'msg' => urlencode ($msg),
); 
if(!empty($text))$Errormsg['text']=$text;
$php_json = json_encode($Errormsg); 
echo urldecode($php_json); 
exit;
}
function deldir($dir) {  
    //先删除目录下的文件：  
    $dh = opendir($dir);  
    while ($file = readdir($dh)) {  
        if($file != "." && $file!="..") {  
        $fullpath = $dir."/".$file;  
        if(!is_dir($fullpath)) {  
            unlink($fullpath);  
        } else {  
            deldir($fullpath);  
        }  
        }  
    }  
    closedir($dh);  
       
    //删除当前文件夹：  
    if(rmdir($dir)) {  
        return true;  
    } else {  
        return false;  
    }  
}
	?>