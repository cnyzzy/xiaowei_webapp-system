<?php
$Walking = new Walking($DB);

$Array = $Walking->ReceiveWalkingHDQE($bbb,$ccc);
header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename=".$bbb.$ccc.".xls");

echo   "序号"."\t"; 
echo   "编号"."\t"; 
echo   "昵称"."\t";
echo   "步数"."\t";
 echo   "上传时间"."\t"; 
echo   "日期"."\t"; 
echo   "审核"."\t"; 
echo   "IP"."\t"; 

foreach((array)$Array as $key=>$loopChild)
 {
	echo   "\n"; 
echo   $loopChild['id']."\t"; 
echo   $loopChild['number']."\t"; 
echo   $loopChild['nickname']."\t"; 
echo   $loopChild['step']."\t"; 
echo  date('Y-m-j G:i:s',$loopChild['addtime'])."\t"; 
echo   $loopChild['data']."\t"; 
if( $loopChild['isok']=='1')echo"通过\t";
if( $loopChild['isok']=='0')echo"未通过\t"; 
echo   $loopChild['ip']."\t"; 


 }
