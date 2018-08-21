<?php
	$number=$_SESSION['zid']['number'];
	$type=$_SESSION['zid']['type'];
	switch ($type)
{
case 1:
$sql2 = "SELECT * FROM jwinfo WHERE number ='{$number}' and isok=1";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
		 $nianji=date('Y')-$info['szj'];
		 if(date('m')>=9)$nianji++;
		 switch ($nianji)
{
case 1:
  $info['sznj']="大一";
  break;
case 2:
  $info['sznj']="大二";
  break;
case 3:
 $info['sznj']="大三";
  break;
case 4:
 $info['sznj']="大四";
  break;  
default:
  $info['sznj']="离校";
}
 $filelist=glob(ZSystem."/data/app/img/".$_SESSION['zid']['number']."/*.jpg");
 $filenow='';
 $filetime=1;
	 if(count($filelist)!=0){
       foreach ($filelist as $key => $file) {
		    if(file_exists($file)) {
$filesize=abs(filesize($file)); 
		   if(filemtime($file)> $filetime&&$filesize>1024) $filenow=$file;
			}
	 }}
	 //PRINT_r($filenow);
     if(file_exists($filenow)){ $src= $filenow;
$imgname=basename($src);
$imgfile= $arrInfo['url'].'/system/data/app/img/'.$number.'/'.$imgname;
	 }ELSE{
		

	 }
		$isupdate = 0 ;
		if(empty($info)||(isset($info)&&$info['addtime']-time()>30*24*3600)){
			$isupdate = 1;
		}
break;
case 2://无数据
$sql2 = "SELECT * FROM ghzl WHERE  number ='{$number}'";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
break;
}
 $isok=0;
		$queryQ = $DB->query("select * from mobiles where openid='{$_SESSION['zid']['openid']}' and number='{$_SESSION['zid']['number']}' and isok='1'");
		$NumQ = $DB->num_rows($queryQ);

		if($NumQ != 0){
					$sql2Q ="select * from mobiles where openid='{$_SESSION['zid']['openid']}' and number='{$_SESSION['zid']['number']}' and isok='1'";
		$result2Q = $DB->query($sql2Q);
		$row2Q= $DB->fetch_array($result2Q);

			$isok=1;
		}