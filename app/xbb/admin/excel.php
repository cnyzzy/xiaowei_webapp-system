<?php
header('Content-Type: application/vnd.ms-excel;charset=gb2312');
header("Content-Disposition:attachment;filename=2017.xls");
$sql = "SELECT * FROM  ks_result order by addtime desc";
$row = $DB->fetch_all_array($sql);
echo(iconv('UTF-8', 'GBK',  "序号"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "编号"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "昵称"))."\t";
echo(iconv('UTF-8', 'GBK',  "分数"))."\t";
 echo(iconv('UTF-8', 'GBK',  "时间"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "IP"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "身份"))."\t"; 
 echo(iconv('UTF-8', 'GBK',  "来源"))."\t";
echo(iconv('UTF-8', 'GBK',  "校区"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "学院"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "行政班"))."\t"; 
echo(iconv('UTF-8', 'GBK',  "姓名"))."\t";

$Array=arrayCv($row);
foreach((array)$Array as $key=>$loopChild)
 {
	echo   "\n"; 
echo   $loopChild['id']."\t"; 
echo   @$loopChild['number']."\t"; 
echo   $loopChild['nickname']."\t"; 
echo   $loopChild['sroce']."\t"; 
echo  date('Y-m-j G:i:s',$loopChild['addtime'])."\t"; 

echo   $loopChild['ip']."\t"; 
		$query = $DB->query("SELECT * FROM wxid WHERE number='". $loopChild['number']."'");
		$row = $DB->fetch_array($query);
		$row=arrayCv($row);
		$jointype="1";
		if(empty($row)){
			//小程序补充

		$jointype="2";
		}
		if(!empty($row)) {
			
			$type1=$row['type'];
			if($type1==1){$type="学生";
			echo(iconv('UTF-8', 'GBK',  $type)."\t");
			if( $jointype=='1')echo(iconv('UTF-8', 'GBK',  "绑定")."\t");
if( $jointype=='2')echo(iconv('UTF-8', 'GBK',  "非绑定")."\t");
			$res =  $DB->query("select * from jwinfo where number='". $loopChild['number']."' and isok='1'");
			$isinfo = $DB->num_rows($res);
			if($isinfo== 0){
				echo   "\t"; 
				echo   "\t"; 
				echo   "\t"; 
				echo   "\t";
			}else{
				$row = $DB->fetch_array($res);	
	
			$collage = $row['xy'];	
			$xzb = $row['xzb'];	
			$name = $row['xm'];	
			$zone=0;
			if($collage=="城市与规划学院"||$collage=="法政学院"||$collage=="公共管理学院"||$collage=="海洋与生物工程学院"||$collage=="化学与环境工程学院"||$collage=="商学院"||$collage=="美术与设计学院"||$collage=="新能源与电子工程学院"||$collage=="药学院"||$collage=="音乐学院")$zone=1;
			if($collage=="教育科学学院"||$collage=="体育学院"||$collage=="数学与统计学院"||$collage=="外国语学院"||$collage=="文学院"||$collage=="信息工程学院")$zone=2;
			if( $zone=='1')echo(iconv('UTF-8', 'GBK',  "新长校区")."\t");
			if( $zone=='2')echo(iconv('UTF-8', 'GBK',  "通榆校区")."\t");
			if( $zone=='0')echo(iconv('UTF-8', 'GBK',  "未知")."\t");
			echo(iconv('UTF-8', 'GBK',  $collage)."\t");
			echo(iconv('UTF-8', 'GBK',  $xzb)."\t");
			echo(iconv('UTF-8', 'GBK',  $name)."\t");
		
			}
			}
			if($type1==2){$type="教职工";
				echo(iconv('UTF-8', 'GBK',  $type)."\t");
				if( $jointype=='1')echo(iconv('UTF-8', 'GBK',  "绑定")."\t");
if( $jointype=='2')echo(iconv('UTF-8', 'GBK',  "非绑定")."\t");
			$res =  $DB->query("select * from ghzl where number='". $loopChild['number']."'");
			$isinfo = $DB->num_rows($res);
			if($isinfo== 0){
				echo   "\t"; 
				echo   "\t"; 
				echo   "\t"; echo   "\t";
			}else{
				$row = $DB->fetch_array($res);	
	
			$collage = $row['dname'];	
			$xzb = $row['dnumber'];	
			$name = $row['name'];	
			$zone=0;
			if($collage=="城市与规划学院"||$collage=="法政学院"||$collage=="公共管理学院"||$collage=="海洋与生物工程学院"||$collage=="化学与环境工程学院"||$collage=="商学院"||$collage=="美术与设计学院"||$collage=="新能源与电子工程学院"||$collage=="药学院"||$collage=="音乐学院")$zone=1;
			if($collage=="教育科学学院"||$collage=="体育学院"||$collage=="数学与统计学院"||$collage=="外国语学院"||$collage=="文学院"||$collage=="信息工程学院")$zone=2;
			if( $zone=='1')echo(iconv('UTF-8', 'GBK',  "新长校区")."\t");
			if( $zone=='2')echo(iconv('UTF-8', 'GBK',  "通榆校区")."\t");
			if( $zone=='0')echo(iconv('UTF-8', 'GBK',  "未知")."\t");
		echo(iconv('UTF-8', 'GBK',  $collage)."\t");
			echo(iconv('UTF-8', 'GBK',  $xzb)."\t");
			echo(iconv('UTF-8', 'GBK',  $name)."\t");

			}
			}
			if($type1==3){$type="访客";
		
echo(iconv('UTF-8', 'GBK',  $type)."\t");
if( $jointype=='1')echo(iconv('UTF-8', 'GBK',  "绑定")."\t");
if( $jointype=='2')echo(iconv('UTF-8', 'GBK',  "非绑定")."\t");
echo   "\t"; 
				echo   "\t"; 
				echo   "\t";  
				echo   "\t"; 
	}
			}else{
echo(iconv('UTF-8', 'GBK',  "未绑定")."\t");
				echo   "\t"; 
				echo   "\t"; 
				echo   "\t"; 
				echo   "\t"; 

			}

 }
function arrayCv($data) {
		if (is_array($data)) {
			
			foreach ($data as $key => $val) {
				if (!is_array($val)) {
					$arr[$key] = iconv('UTF-8', 'GBK',  $val);
				} else {

					$arr[$key] = arrayCv($val);
				}
			}
		} else {
			return iconv('UTF-8', 'GBK',  $data);
		}
		return $arr;

	}