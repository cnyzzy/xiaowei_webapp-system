<?php
$j=date("H");
if($j>=6){
$timee=date("Y-m-d");
}else{$timee=date("Y-m-d",strtotime("-1 day"));}
 $sql = "SELECT * FROM stepzc WHERE number ='{$number}' and data='{$timee}'";
		$row = $DB->once_fetch_array($sql);
		if(empty($row)){
		$wei=1; 
		}else{$wei=0; 
	 
	 $sq2 = "select count(1) as No from stepzc where step >= (select step from stepzc where stepzc.number = '{$number}' and  data='{$timee}')and  data='{$timee}' and isok=1;";
	 if($row['isok']==0)	 $sq2 = "select count(1) as No from stepzc where step >= (select step from stepzc where stepzc.number = '{$number}' and  data='{$timee}')and  data='{$timee}';";

$result2 =$DB->once_fetch_array($sq2);	}