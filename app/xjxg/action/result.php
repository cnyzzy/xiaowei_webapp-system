<?php
define('AROOT',ZSystem.'/data/app/xjxg/'.$openid);
define('RROOT',AROOT.'/result/');
$Wx = new Wx();
$signPackage=$Wx->getSignPackage();
$nonono=1;	
if(is_file(AROOT.'/result/s.php')){
	 $sarr = SetRead('/system/data/app/xjxg/'.$openid.'/result/s.php');	
	
	  if(count($sarr,0)<20)
{
 $nonono=1;	
}else{
$nonono=0;	


}
}
$is100=0;
$sql = "SELECT * FROM  ks_result WHERE appid = '1' and openid = '".$openid."' order by addtime desc";
$row = $DB->fetch_all_array($sql);
$sq = "SELECT * FROM  ks_result WHERE openid = '".$openid."' and sroce='100' order by addtime ASC LIMIT 1";
$result =$DB->once_fetch_array($sq);	
 if(!empty($result))$is100=1;
 $sq2 = "SELECT * FROM  ks_cj WHERE openid = '".$openid."'";
	 $result2 =$DB->once_fetch_array($sq2);	
	 if(empty($result2))
	 {$nodj=1;
 $nocj=1;}ELSE{
		$nodj=0;
		 if(empty($result2['cj']))
		 {
		 $nocj=1;}ELSE{
			$nocj=0; 
		 }
		 
	 }
function SSetWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}			