<?php
$type=@$_SESSION['zid']['type'];
$isstop=0;
		if(empty($type)||($type!='1')){
		$isstop=1;
	}
	switch ($type)
{
case 1:
$sql2 = "SELECT * FROM jwinfo WHERE number ='{$number}' and isok=1";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
		 $nianji=date('Y')-$info['szj'];
		 if(date('m')>=9)$nianji++;
		 switch ($nianji)
{
case 1:
  $info['sznj']="大一";
  break;
case 2:
  $info['sznj']="大二";
  break;
case 3:
 $info['sznj']="大三";
  break;
case 4:
 $info['sznj']="大四";
  break;  
default:
  $info['sznj']="离校";
}
		$isupdate = 0 ;
		if(empty($info)||(isset($info)&&$info['addtime']-time()>30*24*3600)){
			$isupdate = 1;
		}
break;
case 2://无数据
$sql2 = "SELECT * FROM ghzl WHERE  number ='{$number}'";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
break;
}