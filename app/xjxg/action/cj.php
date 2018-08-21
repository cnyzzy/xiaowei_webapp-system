<?php
$nodj=0;
$nocj=0;
$is100=0;
$sq = "SELECT * FROM  ks_result WHERE openid = '".$openid."' and sroce='100' order by addtime ASC LIMIT 1";
$result =$DB->once_fetch_array($sq);	
 if(!empty($result))$is100=1;
	 
$Wx = new Wx();
$signPackage=$Wx->getSignPackage();
$sq2 = "SELECT * FROM  ks_cj WHERE openid = '".$openid."'";
	 $result2 =$DB->once_fetch_array($sq2);	
	 if(empty($result2))
	 {$nodj=1;$nocj=1;}ELSE{
		$nodj=0;
		 if(empty($result2['cj']))
		 {
		 $nocj=1;}ELSE{
			$nocj=0; 
		 }
		 
	 }
			
	