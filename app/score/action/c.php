<?php
set_time_limit(0);
$sql = "select number from cjinfo where cj =  '' group by number";
$arr =$DB->fetch_all_array($sql);

	foreach ($arr as $key=>$a) {
	$sql2 = "SELECT id FROM gpainfo WHERE number ='{$a['number']}'";
	$NUMM2 = $DB->once_num_rows($sql2);
	

		$sq3 = "SELECT *FROM cjinfo WHERE number ='{$a['number']}'  and isok='1' and  cj =  ''";
$arr8f =  $DB->fetch_all_array($sq3);
			$tgpa=0;
			$txf=0;
	foreach ($arr8f as $key2=>$arr2) {
		if(empty($arr2['cj'])&&!empty($arr2['sycj']))$arr2['cj']=$arr2['sycj'];
			if(empty($arr2['cj'])&&!empty($arr2['jd']) ){
				if($arr2['jd']=='4.5')$arr2['cj']=='优秀';
		if($arr2['jd']=='3.5')$arr2['cj']=='良好';
		if($arr2['jd']=='2.5')$arr2['cj']=='中等';
		if($arr2['jd']=='1.5')$arr2['cj']=='及格';
		if($arr2['jd']=='0')$arr2['cj']=='不及格';	
			}
			if(is_numeric($arr2['cj']) ){
		if($arr2['cj']==100)$jd='5';
		if(($arr2['cj']<=100&&$arr2['cj']>=90))$jd='4';
		if(($arr2['cj']<=89&&$arr2['cj']>=80))$jd='3';
		if(($arr2['cj']<=79&&$arr2['cj']>=70))$jd='2';
		if(($arr2['cj']<=69&&$arr2['cj']>=60))$jd='1';
		if(($arr2['cj']<=59&&$arr2['cj']>=0))$jd='0';

		
		if($arr2['cj']<100&&$arr2['cj']>=60)
		{
			$str = 0;
			$str = substr($arr2['cj'],-1);
		$jd+=$str*0.1;}
		}else{
		if($arr2['cj']=='优秀')$jd='4.5';
		if($arr2['cj']=='良好')$jd='3.5';
		if($arr2['cj']=='中等')$jd='2.5';
		if($arr2['cj']=='及格')$jd='1.5';
		if($arr2['cj']=='不及格')$jd='0';	
		}
		if(empty($arr2['jd'])||!empty($arr2['jd'])&&$arr2['jd']!=$jd&&!empty($jd)){
		$arr2['jd']=$jd;
		$Arr = array(
				'jd'	=> $jd,
				'cj'=>$arr2['cj'],
			);
		}else{
			$Arr = array(
				'cj'=>$arr2['cj'],
			);

		}
				$row = $DB->updateArr('cjinfo',$Arr,"where id ='{$arr2['id']}'");
if((is_numeric($arr2['cj'])&&@$arr2['cj']>59||(!is_numeric($arr2['cj']))&&@$arr2['cj']!="不及格")){
  $tgpa+=($arr2['xf']*$arr2['jd']);
  $txf+=$arr2['xf'];
}
if((is_numeric($arr2['cj'])&&@$arr2['cj']<60||(!is_numeric($arr2['cj']))&&@$arr2['cj']=="不及格")){
  
  $txf+=@$arr2['xf'];
}	 
		  }
		  $gpa=0;
		   $jd=0;
	if($txf!=0)$gpa=$tgpa/$txf;
		$SQ="INSERT INTO `gpainfo` (`number`, `txf`, `tgpa`, `gpa`, `isok`) VALUES ('{$a['number']}', '{$txf}', '{$tgpa}', '{$gpa}', 1);";
	
	    $DDD = "DELETE FROM gpainfo WHERE number ='{$a['number']}'";
		$DB->query($DDD);
	
		$DB->query($SQ);
			ECHO'1<BR>';			
	
	}
	