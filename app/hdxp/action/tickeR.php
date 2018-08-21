<?php
$Hdxp = new Hdxp($DB);
empty($params[0]) ? $tid = '1' : $tid = $params[0];
if(!is_numeric($tid))$tid=1;
$Arr = $Hdxp->GetHdxpSeat($tid);
if(EMPTY($Arr)||EMPTY($Arr['sid']))header("Location:{$arrInfo[url]}/hdxp/read"); 
if(EMPTY($Arr['number'])||$Arr['number']!=$_SESSION['zid']['number'])header("Location:{$arrInfo[url]}/hdxp/read"); 
$ArrH = $Hdxp->GetHdxpA($Arr['sid']);

		 switch ($Arr['type'])
{
case 1:
 $Arr['type']="学生票";
  break;
case 2:
$Arr['type']="教师票";
  break;
case 3:
$Arr['type']="访客票";
  break;
case 4:
$Arr['type']="VIP";
  break;  
default:
$Arr['type']="未知票";
}

?>