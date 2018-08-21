<?php
////$Wx = new Wx();
//$/signPackage=$Wx->getSignPackage();
$isstop=0;
$type=@$_SESSION['zid']['type'];
	if(empty($number))$number=$_SESSION['zid']['number'];
		if($type=='3'&&$number=='no'){
		$isstop=1;
	}
$arrURL = parse_url($arrInfo['url']); 
 $sql3 = "SELECT  * FROM shixun_ap WHERE nowtype!='9' and snumber='".$number."'	AND date='".$timee."' and isok='1'";

$Arr1=array();
$Arr1 =  $DB->fetch_all_array($sql3);
		$row = $DB->query( $sql3);
		$nownum = $DB->num_rows($row);
 $sql3 = "SELECT  * FROM shixun_ap WHERE nowtype='9' and snumber='".$number."' or  snumber='".$number."'AND date<'".$timee."'"; 

$Arr2=array();
$Arr2 =  $DB->fetch_all_array($sql3);
 $sql3 = "SELECT  * FROM shixun_ap WHERE nowtype!='9' and snumber='".$number."'	AND date>'".$timee."'"; 

$Arr3=array();
$Arr3 =  $DB->fetch_all_array($sql3);

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
