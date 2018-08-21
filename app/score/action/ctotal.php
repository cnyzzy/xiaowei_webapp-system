<?php
$number=$_SESSION['zid']['number'];
$bjnumber=substr($number ,0,6);
$njnumber=substr($number ,0,4);
$sql = "select COUNT(distinct(number)) as num,count(cj) as cnum,TRUNCATE(avg(xf),3) as xf2,TRUNCATE(avg(jd),3) as jd2 from cjinfo where isok='1'";
$result = $DB->query($sql);
$arr6 = $DB->fetch_array($result);
//平均
if(!empty($number)){
$sql = "select sum(xf) as sxf,sum(jd) as sjd,max(xf) as maxxf,max(jd) as maxjd,TRUNCATE(avg(xf),3) as xf,count(cj) as cnum,TRUNCATE(avg(jd),3) as jd from cjinfo where number ='{$number}'  AND isok='1'";
$result = $DB->query($sql);
$arr1 = $DB->fetch_array($result);
//我的



$sql = "select COUNT(distinct(number)) as num,count(cj) as cnum,TRUNCATE(avg(xf),3) as xf,TRUNCATE(avg(jd),3) as jd from cjinfo where number  like '{$bjnumber}%'  AND isok='1'";
$result = $DB->query($sql);
$arr2 = $DB->fetch_array($result);
//班级平均
$sql = "select (TRUNCATE(avg(jd),3)) as jd2 from cjinfo where number LIKE '{$bjnumber}%'  AND isok='1' group by number order by jd2 desc limit 1";
$result = $DB->query($sql);
$arr3 = $DB->fetch_array($result);
//班级最高绩点
$sql = "select (TRUNCATE(avg(xf),3)) as xf2 from cjinfo where number LIKE '{$bjnumber}%'  AND isok='1' group by number order by xf2 desc limit 1";
$result = $DB->query($sql);
$arr3f = $DB->fetch_array($result);
//班级最高学分

$sql = "select COUNT(distinct(number)) as num,count(cj) as cnum,TRUNCATE(avg(xf),3) as xf,TRUNCATE(avg(jd),3) as jd from cjinfo where number  like '{$njnumber}%'  AND isok='1'";
$result = $DB->query($sql);
$arr4 = $DB->fetch_array($result);
//年级平均

$sql = "select (TRUNCATE(avg(jd),3)) as jd2 from cjinfo where number LIKE '{$njnumber}%'  AND isok='1' group by number order by jd2 desc limit 1";
$result = $DB->query($sql);
$arr5 = $DB->fetch_array($result);
//年级最高绩点
$sql = "select (TRUNCATE(avg(xf),3)) as xf2 from cjinfo where number LIKE '{$njnumber}%'  AND isok='1' group by number order by xf2 desc limit 1";
$result = $DB->query($sql);
$arr5f = $DB->fetch_array($result);
//年级最高



$sql = "select sum(jd) as jd2 from cjinfo where number LIKE '{$bjnumber}%'  AND isok='1' group by number order by jd2 desc limit 1";
$result = $DB->query($sql);
$arr7 = $DB->fetch_array($result);
//班级总最高绩点
$sql = "select sum(xf) as xf2 from cjinfo where number LIKE '{$bjnumber}%'  AND isok='1' group by number order by xf2 desc limit 1";
$result = $DB->query($sql);
$arr7f = $DB->fetch_array($result);
//班级总最高学分
$sql = "select sum(jd) as jd2 from cjinfo where number LIKE '{$njnumber}%'  AND isok='1' group by number order by jd2 desc limit 1";
$result = $DB->query($sql);
$arr8 = $DB->fetch_array($result);
//年级最高绩点
$sql = "select sum(xf) as xf2 from cjinfo where number LIKE '{$njnumber}%'  AND isok='1' group by number order by xf2 desc limit 1";
$result = $DB->query($sql);
$arr8f = $DB->fetch_array($result);
//年级最高


//GPA运算
	$sql2 = "SELECT id FROM gpainfo WHERE number ='{$number}' and isok='1'";
	$NUMM2 = $DB->once_num_rows($sql2);
			$sq3 = "SELECT *FROM gpainfo WHERE number ='{$number}' and isok='1'";
$arrgpaa =$DB->once_fetch_array($sq3);
if($NUMM2==1&&$arrgpaa['gpa']<5){

$arrgpa =$arrgpaa;
	}else{
		$sq3 = "SELECT *FROM cjinfo WHERE number ='{$number}'";
$arr8ff =  $DB->fetch_all_array($sq3);
			$tgpa=0;
			$txf=0;
	foreach ($arr8ff as $key=>$arr22) {
		if(is_numeric($arr22['jd'])&&$arr22['jd']>5&&!empty($arr22['jd'])||!is_numeric($arr22['jd']) )$arr22['jd']=-1;
		
			if(is_numeric($arr22['cj']) ){
		if($arr22['cj']==100)$jd='5';
		if(($arr22['cj']<=100&&$arr22['cj']>=90))$jd='4';
		if(($arr22['cj']<=89&&$arr22['cj']>=80))$jd='3';
		if(($arr22['cj']<=79&&$arr22['cj']>=70))$jd='2';
		if(($arr22['cj']<=69&&$arr22['cj']>=60))$jd='1';
		if(($arr22['cj']<=59&&$arr22['cj']>=0))$jd='0';

		
		if($arr22['cj']<100&&$arr22['cj']>=60)
		{
			$str = 0;
			$str = substr($arr22['cj'],-1);
		$jd+=$str*0.1;}
		}else{
		if($arr22['cj']=='优秀')$jd='4.0';
		if($arr22['cj']=='良好')$jd='3.0';
		if($arr22['cj']=='中等')$jd='2.0';
		if($arr22['cj']=='及格')$jd='1.0';
		if($arr22['cj']=='不及格')$jd='0';	
		}
		if(!empty($arr22['cj'])&&$arr22['jd']!=$jd&&$jd!=-1){
			$arr22['jd']=$jd;
			$Arr = array(
				'jd'	=> $jd,
			);
		$row = $DB->updateArr('cjinfo',$Arr,"where id ='{$arr22['id']}'");
		}
if((is_numeric($arr22['cj'])&&@$arr22['cj']>59||(!is_numeric($arr22['cj']))&&@$arr22['cj']!="不及格")){
  $tgpa+=($arr22['xf']*($arr22['jd']));
  $txf+=$arr22['xf'];
}
if((is_numeric($arr22['cj'])&&@$arr22['cj']<60||(!is_numeric($arr22['cj']))&&@$arr22['cj']=="不及格")){
  
  $txf+=@$arr22['xf'];
}	
		  }
		  $gpa=0;
	if($txf!=0)$gpa=$tgpa/$txf;
		if($NUMM2!=0){
				$Arr = array(
				'isok'	=> '0',
			);
		$row = $DB->updateArr('gpainfo',$Arr,"where number ='{$number}' and isok = '1'");}
		$SQ="INSERT INTO `gpainfo` (`number`, `txf`, `tgpa`, `gpa`, `isok`) VALUES ('{$number}', '{$txf}', '{$tgpa}', '{$gpa}', 1);";
		$DB->query($SQ);
		$sq3 = "SELECT *FROM gpainfo WHERE number ='{$number}'";
$arrgpa =$DB->once_fetch_array($sq3);
	}
	
	$sql = "select TRUNCATE(avg(gpa),3) as gpa from gpainfo where number like '{$bjnumber}%'  AND isok='1'";
$result = $DB->query($sql);
$bjgpa = $DB->fetch_array($result);
//班级平均GPA
	$sql = "select TRUNCATE(avg(gpa),3) as gpa from gpainfo where number like '{$njnumber}%'  AND isok='1'";
$result = $DB->query($sql);
$njgpa = $DB->fetch_array($result);
//年平均GPA
$sql = "select gpa from gpainfo where number LIKE '{$bjnumber}%'  AND isok='1' order by gpa desc limit 1";
$result = $DB->query($sql);
$bjgpaarr = $DB->fetch_array($result);
$sql = "select gpa from gpainfo where number LIKE '{$njnumber}%'  AND isok='1' order by gpa desc limit 1";
$result = $DB->query($sql);
$njgpaarr = $DB->fetch_array($result);}
$sql = "select TRUNCATE(avg(gpa),3) as gpa from gpainfo where isok='1'";
$result = $DB->query($sql);
$gpaa = $DB->fetch_array($result);
//平均