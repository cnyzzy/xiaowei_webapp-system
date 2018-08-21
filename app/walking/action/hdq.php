<?php
$j=date("H");
if($j>=22){
$timee=date("Y-m-d");
}else{$timee=date("Y-m-d",strtotime("-1 day"));}
 $sql = "SELECT * FROM step WHERE number ='{$number}' and data='{$timee}'";
		$row = $DB->once_fetch_array($sql);
		if(empty($row)){
		$wei=1; 
		}else{$wei=0; 
		 $sq2 = "select count(1) as No from step where step >= (select step from step where step.number = '{$number}' and  data='{$timee}')and  data='{$timee}' and isok = 1;";
	if($row['isok']==0) $sq2 = "select count(1) as No from step where step >= (select step from step where step.number = '{$number}' and  data='{$timee}')and  data='{$timee}';";
$result2 =$DB->once_fetch_array($sq2);	}