<?php

		$limit ="LIMIT 0, 200" ;
		$res1 =  $DB->query("select * from game order by maxs desc");
		$users = array();
		while($row =  $DB->fetch_array($res1))
			{
			$users[] = $row;
			}
$Array = $users; 
header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename=".$bbb.$ccc.".xls");

echo   "序号"."\t"; 
echo   "编号"."\t"; 
echo   "姓名"."\t";
echo   "分数"."\t";
echo   "时间"."\t"; 
echo   "身份"."\t"; 
echo   "校区"."\t"; 
echo   "学院"."\t"; 
echo   "行政班"."\t"; 
echo   "总排名"."\t"; 
echo   "IP"."\t"; 

foreach((array)$Array as $key=>$loopChild)
 {
	echo   "\n"; 
echo   $loopChild['id']."\t"; 
echo   $loopChild['number']."\t"; 
echo   $loopChild['name']."\t"; 
echo   $loopChild['maxs']."\t"; 
echo  date('Y-m-j G:i:s',$loopChild['addtime'])."\t"; 
		$query = $DB->query("SELECT * FROM wxid WHERE number='". $loopChild['number']."' and isok='1'");
		$row = $DB->fetch_array($query);	
		if(!empty($row)) {
			
			$type1=$row['type'];
			if($type1==1){$type="学生";
			echo   $type."\t"; 
			$res =  $DB->query("select * from jwinfo where number='". $loopChild['number']."' and isok='1'");
			$isinfo = $DB->num_rows($res);
			if($isinfo== 0){
				echo   "\t"; 
				echo   "\t"; 
				echo   "\t"; 
			}else{
				$row = $DB->fetch_array($res);	
			$collage = $row['xy'];	
			$xzb = $row['xzb'];	
			$zone=0;
			if($collage=="城市与规划学院"||$collage=="法政学院"||$collage=="公共管理学院"||$collage=="海洋与生物工程学院"||$collage=="化学与环境工程学院"||$collage=="商学院"||$collage=="美术与设计学院"||$collage=="新能源与电子工程学院"||$collage=="药学院"||$collage=="音乐学院")$zone=1;
			if($collage=="教育科学学院"||$collage=="体育学院"||$collage=="数学与统计学院"||$collage=="外国语学院"||$collage=="文学院"||$collage=="信息工程学院")$zone=2;
			if( $zone=='1')echo"新长校区\t";
			if( $zone=='2')echo"通榆校区\t"; 
			if( $zone=='0')echo"未知校区\t"; 
			echo $collage."\t"; 
			echo $xzb."\t"; 
			}
			}
			if($type1==2){$type="教职工";
				echo   $type."\t";
			$res =  $DB->query("select * from ghzl where number='". $loopChild['number']."'");
			$isinfo = $DB->num_rows($res);
			if($isinfo== 0){
				echo   "\t"; 
				echo   "\t"; 
				echo   "\t"; 
			}else{
				$row = $DB->fetch_array($res);	
			$collage = $row['dname'];	
			$xzb = $row['dnumber'];	
			$zone=0;
			if($collage=="城市与规划学院"||$collage=="法政学院"||$collage=="公共管理学院"||$collage=="海洋与生物工程学院"||$collage=="化学与环境工程学院"||$collage=="商学院"||$collage=="美术与设计学院"||$collage=="新能源与电子工程学院"||$collage=="药学院"||$collage=="音乐学院")$zone=1;
			if($collage=="教育科学学院"||$collage=="体育学院"||$collage=="数学与统计学院"||$collage=="外国语学院"||$collage=="文学院"||$collage=="信息工程学院")$zone=2;
			if( $zone=='1')echo"新长校区\t";
			if( $zone=='2')echo"通榆校区\t"; 
			if( $zone=='0')echo"未知校区\t"; 
			echo $collage."\t"; 
			echo $xzb."\t"; 
			}
			}
			if($type1==3){$type="访客";
		
	echo   $type."\t";
	echo   "\t"; 
				echo   "\t"; 
				echo   "\t";  
	}
			}else{
echo   "未绑定\t"; 
				echo   "\t"; 
				echo   "\t"; 
			}
echo "\t"; 
echo   $loopChild['ip']."\t"; 


 }
