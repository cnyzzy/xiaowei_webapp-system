<?php
empty($params[0]) ? $bdtype = '1': $bdtype = $params[0];
$number=$_SESSION['zid']['number'];
switch ($bdtype)
{
case 1:
$sql2 = "SELECT * FROM wxid WHERE number ='{$number}' and isok=1 order by id desc limit 1";
$result2 = $DB->query($sql2);
$infoO = $DB->fetch_array($result2);
break;
case 2://无数据
$sql2 = "SELECT * FROM wxappid WHERE number ='{$number}' and isok=1 order by id desc limit 1";
$result2 = $DB->query($sql2);
$infoO = $DB->fetch_array($result2);
break;
case 3:
$sql2 = "SELECT * FROM qqid WHERE number ='{$number}' and isok=1 order by id desc limit 1";
$result2 = $DB->query($sql2);
$infoO = $DB->fetch_array($result2);
break;
case 4:
$sql2 = "SELECT * FROM wbid WHERE number ='{$number}' and isok=1 order by id desc limit 1";
$result2 = $DB->query($sql2);
$infoO = $DB->fetch_array($result2);
break;
default://无数据

break;
}


$dtime=date('Y-m-j G:i:s',$infoO['addtime']);
