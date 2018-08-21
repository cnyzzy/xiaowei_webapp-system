<?php  
$j=date("H");
if($j>=6){
$timee=date("Y-m-d");
}else{$timee=date("Y-m-d",strtotime("-1 day"));}
 $sql = "SELECT * FROM stepzc WHERE number ='{$number}' and data='{$timee}'";
		$result =  $DB->once_fetch_array($sql);
		if(!empty($result)){
		header("Location:{$arrInfo[url]}/{$AppName}/zcq");  
		}
?>