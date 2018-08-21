<?php

$number0=@$number;
	IF(empty($number0))
	{
					$arr['status']=0; 
$arr['content']="身份识别失败"; 
echo json_encode($arr);	
exit();
	}
		$type=$_SESSION['zid']['type'];
	switch ($type)
{
case 1:
$sql2 = "SELECT * FROM jwinfo WHERE number ='{$number0}' and isok=1";
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
			$collage = $info['xy'];	
			$xzb = $info['xzb'];	
			$xname = $info['xm'];	
break;
case 2://无数据
$sql2 = "SELECT * FROM ghzl WHERE  number ='{$number0}'";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
			$collage = $info['dname'];	
			$xzb = $info['dnumber'];	
			$xname = $info['name'];	
break;
case 3://无数据
		$collage = '访客';	
			$xzb = '';	
			$xname ='';	
break;
}
