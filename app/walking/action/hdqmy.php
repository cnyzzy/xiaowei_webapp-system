<?php
empty($params[0]) ? $roomm = $number : $roomm = urldecode($params[0]);
$j=date("H");
$timee=date("Y-m-d",strtotime("-1 day"));
$time2=date("Y-m-d",strtotime("-2 day"));
$time3=date("Y-m-d",strtotime("-3 day"));
$time4=date("Y-m-d",strtotime("-4 day"));
$time5=date("Y-m-d",strtotime("-5 day"));
$time6=date("Y-m-d",strtotime("-6 day"));
		$sql11 = "SELECT * FROM wxid WHERE number ='{$roomm}' and isok=1";
		$result11 = $DB->query($sql11);
		$row11 = $DB->fetch_array($result11);
		$cname=$row11['name'];
		$ctype=$row11['type'];
 $sql = "SELECT * FROM step WHERE number ='{$roomm}' and data='{$timee}'";
		$row = $DB->once_fetch_array($sql);
$sql2 = "Select id,step AS step2,nickname,userimg From step  WHERE isok=1 and data='".$timee."' Order by step2  desc  limit 1";
$RRR = $DB->once_fetch_array($sql2);
 $sqlc = "SELECT * FROM step WHERE number ='{$roomm}' and isok=1";
$Rc =$DB->query($sqlc);
$Rnum=$DB->num_rows($Rc);
$sql22 = "Select id,step AS step2,nickname,userimg From step  WHERE number ='{$roomm}' and isok=1  Order by step2  desc  limit 1";
$Rstep = $DB->once_fetch_array($sql22);
		if(empty($row)){
		$wei=1; 
		}else{
		$wei=0; 
}
 $sql3 ="SELECT  * FROM step where number ='{$roomm}' ORDER BY step.data DESC limit 20";
 $array=array(
 '0'	=> NULL,
 '1'	=> NULL,
 '2'	=> NULL,
 '3'	=> NULL,
 '4'	=> NULL,
 '5'	=> NULL,
 );
$RR =@$DB->fetch_all_array($sql3);
if(!empty($RR)){ 
foreach ($RR as $se) {
	  if($se['data']==$timee)$array[5]=$se;
	  if($se['data']==$time2)$array[4]=$se;
	  if($se['data']==$time3)$array[3]=$se;
	  if($se['data']==$time4)$array[2]=$se;
	  if($se['data']==$time5)$array[1]=$se;
	  if($se['data']==$time6)$array[0]=$se;
  }
  $RR =array_reverse($RR);
  }
