<?php 
empty($params[0]) ? $LId = '1' : $LId = intval($params[0]);
$Sxzs = new Sxzs($DB);
$Array = $Sxzs->GetSxzsRid($LId);
if(empty($Array))EXIT('NO ROOM');

	 $sql3 = "SELECT  * FROM shixun_ap WHERE rid='".$Array['rid']."' and isok='1'";
	 
			$Arr3=array();

		$Arr3 =  $DB->fetch_all_array($sql3);
		if(!emPty($Arr3)){
			foreach((array)$Arr3 as $key=>$row3)
			{
				
$time=time();		
$yuyuetime= $row3['yuyuetime'];
$iendtime= $row3['iendtime'] ;
$limittime= $row3['limittime'] ;
$nowtype=0;
IF($yuyuetime>$time)$nowtype=1;
//未到
//1:预约	

IF($yuyuetime<=$time){
	if(!empty($row3['realendtime']))
{
if(!empty($row3['sctime'])$nowtype=7;		
if(empty($row3['sctime'])$nowtype=6;		
}ELSE{
if(!empty($row3['realstarttime']))
{
	//签到了
	if($iendtime>$time)
	{//正在//4:签到了

$nowtype=4;	
$qdnumber+= $row3['number'];
$nowarray['number']+= $row3['number'];$nowarray['zynumber']+= $row3['number'];
}else{
//5:自动签退		
$qtnumber+= $row3['number'];
		
$nowtype=5;

	}
}else{
	//未

	if($limittime>$time)
	{
//2:保留
$nowtype=2;	
	$nowarray['zynumber']++;
	}else{
//3:超时		
	$nowtype=3;	
	}	
}	
}	
}

			}
$Arr = array(
				'nowtype'	=> $nowtype,
			);
		$row = $DB->updateArr('shixun_ap',$Arr,"WHERE id ='{$row3[id]}'");
			
		}else{
		ECHO'EMPTY';	
		}

			


?>