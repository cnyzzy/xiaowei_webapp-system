<?php
define("walkcecharoot",ZSystem."/data/app/walking/zcq");
$j=date("H");
if($j>=6){
$timee=date("Y-m-d");
}else{$timee=date("Y-m-d",strtotime("-1 day"));}
if($j>=12||$j<6)
	{
		echo '<script type="text/javascript">';
		echo 'alert("只能在6点到12点之间操作!");';
		echo 'self.location=document.referrer;';
		echo '</script>';
	}	
	$sql = "delete from stepzc where number = '{$number}' and data = '{$timee}'" ;
	 $fileName = $number.'.jpge';
	 $dir=walkcecharoot.'/'.$timee.'/';
    $savename = $dir.$fileName;
    $savepath = $savename; 
	 if(file_exists($savepath)) unlink($savepath);
	if($DB->query($sql))
	{
		echo '<script type="text/javascript">';
		echo 'alert("删除成功!");';
		echo 'self.location=document.referrer;';
		echo '</script>';
	}	