<?php
$number=$_SESSION['zid']['number'];
if(is_file(ZSystem.'/data/app/score/table1/'.$number.'.php')){
				$arr1 = SetRead( '/system/data/app/score/table1/'.$number.'.php');
				$arr1CJ=$arr1[0][10];
				unset($arr1[0]);
				$arr1 =array_reverse($arr1);
			}
if(is_file(ZSystem.'/data/app/score/table2/'.$number.'.php')){
				$arr2 = SetRead( '/system/data/app/score/table2/'.$number.'.php');
			}
if(is_file(ZSystem.'/data/app/score/table3/'.$number.'.php')){
				$arr3 = SetRead( '/system/data/app/score/table3/'.$number.'.php');
			}	
	if(!is_file(ZSystem.'/data/app/score/table3/'.$number.'.php')||empty($arr3)){
		$sql = "select TRUNCATE(avg(jd),3) as jd from cjinfo where number = '{$number}'  AND isok='1'";
$result = $DB->query($sql);
$arr4 = $DB->fetch_array($result);			
//GPA运算
	$sql2 = "SELECT id FROM gpainfo WHERE number ='{$number}' AND isok='1'";
	$NUMM2 = $DB->once_num_rows($sql2);
	
	if($NUMM2!=0){
				$sq3 = "SELECT *FROM gpainfo WHERE number ='{$number}' AND isok='1'";
$arrgpa =$DB->once_fetch_array($sq3);
	}else{
		$sq3 = "SELECT *FROM cjinfo WHERE number ='{$number}' AND isok='1'";
$arr8f =  $DB->fetch_all_array($sq3);
			$tgpa=0;
			$txf=0;
	foreach ($arr8f as $key=>$arr22) {
				if(empty($arr22['cj'])&&!empty($arr22['sycj'])&&empty($arr22['jd'])&&!empty($arr22['qzcj'])){
			$arr22['jd']=$arr22['qzcj'];
			$arr22['cj']=$arr22['sycj'];
			if(is_numeric($arr22['jd'])&&$arr22['jd']>5&&!empty($arr22['jd'])||!is_numeric($arr22['jd']) )$arr22['jd']=0;

			$Arr = array(
				'jd'	=> $arr22['jd'],
				'cj'	=> $arr22['cj'],
			);
		$row = $DB->updateArr('cjinfo',$Arr,"where id ='{$arr22['id']}'");
		}
				if(is_numeric($arr22['jd'])&&$arr22['jd']>5&&!empty($arr22['jd'])||!is_numeric($arr22['jd']) )$arr22['jd']=0;

			if(is_numeric($arr22['cj'])&&(empty($arr22['jd'])||$arr22['jd']==0) ){
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
		if(empty($arr22['cj'])||!empty($arr22['cj'])&&$arr22['jd']!=$jd){
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
		$SQ="INSERT INTO `gpainfo` (`number`, `txf`, `tgpa`, `gpa`, `isok`) VALUES ('{$number}', '{$txf}', '{$tgpa}', '{$gpa}', 1);";
		$DB->query($SQ);
						$sq3 = "SELECT *FROM gpainfo WHERE number ='{$number}' AND isok='1'";
$arrgpa =$DB->once_fetch_array($sq3);
	}	

			
		}			
