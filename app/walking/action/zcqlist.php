<?php  
$j=date("H");
if($j>=6){
$timee=date("Y-m-d");
}else{$timee=date("Y-m-d",strtotime("-1 day"));}
  empty($params[0]) ? $data = $timee : $data = $params[0];
  $dsql=" and data='".$data."' ";
  IF($data=='all')$dsql="";
 $sql = "SELECT * FROM stepzc WHERE number ='{$number}'".$dsql;

		$row = $DB->once_fetch_array($sql);
		if(empty($row)){
		//header("Location:up.php");  
		}

	 $sq2 = "select count(1) as No from stepzc where step >= (select step from stepzc where stepzc.number = '{$number}' ".$dsql.")".$dsql." and isok = 1 ;";
IF($dsql=="")$sq2="SELECT * FROM  (  SELECT A.*,@rank:=@rank+1 as No  FROM (  SELECT  DISTINCT name,nickname,userimg,number,MAX(step) AS step2 FROM stepzc where isok =1 GROUP BY nickname ORDER BY step2 DESC)A ,(SELECT @rank:=0) B   
 ) M where number = '{$number}'";
	 $result2 =$DB->once_fetch_array($sq2);	
		$dsql=" WHERE data='".$data."' ";
  IF($data=='all')$dsql="";
$sql3="Select id,step AS step2,nickname,name,userimg,(@rowNum:=@rowNum+1)  as No From stepzc ,(Select (@rowNum :=0) ) b ".$dsql." Order by step2  desc  limit 40";

IF($dsql=="")$sql3="SELECT * FROM  (  SELECT A.*,@rank:=@rank+1 as No  FROM (  SELECT  DISTINCT name,nickname,userimg,MAX(step) AS step2 FROM stepzc where isok =1 GROUP BY nickname ORDER BY step2 DESC limit 40)A ,(SELECT @rank:=0) B   
 ) M ";$R =$DB->query($sql3);
$Rnum=$DB->num_rows($R);
if($Rnum!=0)$RR =$DB->fetch_all_array($sql3);
 ?> 