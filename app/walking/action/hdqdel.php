<?php
define("walkcecharoot",ZSystem."/data/app/walking/hdq");
$j=date("H");
if($j>=22){
$timee=date("Y-m-d");
}else{$timee=date("Y-m-d",strtotime("-1 day"));}
	$sql = "delete from step where number = '{$number}' and data = '{$timee}'" ;
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