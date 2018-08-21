<?php  
$j=date("H");
if($j>=22){
$timee=date("Y-m-d");
}else{$timee=date("Y-m-d",strtotime("-1 day"));}
  empty($params[0]) ? $data = $timee : $data = $params[0];
  $dsql=" and data='".$data."' ";
  IF($data=='all')$dsql="";
 $sql = "SELECT * FROM step WHERE number ='{$number}'".$dsql;

		$row = $DB->once_fetch_array($sql);
		if(empty($row)){
		//header("Location:up.php");  
		}
	 $sq2 = "select count(1) as No from step where step >= (select step from step where step.number = '{$number}' and isok = 1 ".$dsql.")".$dsql." and isok = 1 ;";
IF($dsql=="")$sq2="SELECT * FROM  (  SELECT A.*,@rank:=@rank+1 as No  FROM (  SELECT  DISTINCT nickname,number,userimg,MAX(step.step) AS step2 FROM step where isok =1 GROUP BY number ORDER BY step2 DESC)A ,(SELECT @rank:=0) B   
 ) M where number = '{$number}'";

	 $result2 =$DB->once_fetch_array($sq2);	
$sql3="Select id,step AS step2,nickname,number,userimg,(@rowNum:=@rowNum+1)  as No From step ,(Select (@rowNum :=0) ) b WHERE isok=1 ".$dsql." Order by step2  desc  limit 20";

IF($dsql=="")$sql3="SELECT * FROM  (  SELECT A.*,@rank:=@rank+1 as No  FROM (  SELECT  DISTINCT nickname,userimg,number,MAX(step.step) AS step2 FROM step where isok =1 GROUP BY number ORDER BY step2 DESC limit 40)A ,(SELECT @rank:=0) B   
 ) M ";
$R =$DB->query($sql3);
$Rnum=$DB->num_rows($R);
if($Rnum!=0)$RR =$DB->fetch_all_array($sql3);
 ?> 