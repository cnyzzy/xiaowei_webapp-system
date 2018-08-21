<?php

if(!is_dir(ZSystem.'/data/app/sxzs/now') )mkdir(ZSystem.'/data/app/sxzs/now');
if(!is_dir(ZSystem.'/data/app/sxzs/now/'.$timee) )mkdir(ZSystem.'/data/app/sxzs/now/'.$timee);
define('RROOT',ZSystem.'/data/app/sxzs/now/'.$timee.'/');
empty($params[0]) ? $LId = '1' : $LId = intval($params[0]);
$Sxzs = new Sxzs($DB);
$Array = $Sxzs->GetSxzsRid($LId);
if(empty($Array))EXIT('NO ROOM');
if(is_file(RROOT.$LId.'.php')&&(filectime(RROOT.$LId.'.php')>time()-60)){
				$WArrsy = SetRead( '/system/data/app/sxzs/now/'.$timee.'/'.$LId.'.php');
		
			}
			ELSE
			{
	    $sql = "SELECT  * FROM shixun_now WHERE rid ='{$LId}' and date = '".$timee."'";
		$row = $DB->once_fetch_array($sql);
		$ayynumber=0;
	$cyynumber=0;
	$qdnumber=0;
	$qtnumber=0;

	
	$nowarray=ARRAY(
	  'room'=>$Array['room'],
  'rid'=>$Array['rid'],
  'date'=>$timee,
  'zynumber'=>0,
  'nownumber'=>0,
  'ayynumber'=>0,
  'cyynumber'=>0,
  'qdnumber' =>0,
  'qtnumber'=>0,
  'number'=>$Array['number'],
  'uptime'=>0,
  'isok'=>'1'
  );
  $StartMonth   = date('G:i',$Array['opentime']); 
$EndMonth     = date('G:i',$Array['endtime']); 
$ToStartMonth = strtotime( $StartMonth ); 
$ToEndMonth   = strtotime( $EndMonth );
$i            = false;


$duringarray10=array();
while( $ToStartMonth < $ToEndMonth ) {
  $NewMonth = !$i ? strtotime('+0 Minute', $ToStartMonth) :strtotime('+30 Minute', $ToStartMonth);
  $ToStartMonth = $NewMonth;
  $i = true;
  $duringarray10[$NewMonth]=ARRAY(
  'ayynumber'=>0,
  'tyynumber'=>0,
  'nownumber'=>0,
  'zynumber'=>0);
}
	 $sql3 = "SELECT  * FROM shixun_ap WHERE rid='".$Array['rid']."' and date='".$timee."' and isok='1'";
	 
			$Arr3=array();

		$Arr3 =  $DB->fetch_all_array($sql3);
		if(!emPty($Arr3)){
			foreach((array)$Arr3 as $key=>$row3)
			{
				

	$row3['nowtype']=='9' ? $cyynumber+= $row3['number'] :$ayynumber+= $row3['number'];
$time=time();		
$yuyuetime= $row3['yuyuetime'];
$iendtime= $row3['iendtime'] ;
$limittime= $row3['limittime'] ;
$nowtype=0;
IF($yuyuetime>$time)$nowtype=1;
//未到
//1:预约	

IF($yuyuetime<=$time){
	
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
if(!empty($row3['realendtime']))	{//6		
$nowtype=6;

}ELSE{
		
$nowtype=5;
}
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
foreach((array)$duringarray10 as $key=>$r)
			{
						if($key<$row3['addtime']&&$row3['addtime']<($key+1800)){$duringarray10[$key]['ayynumber']+= $row3['number'];}	
if($row3['nowtype']=='9')
{
		if($key<$row3['realendtime']&&$row3['realendtime']<($key+1800)){$duringarray10[$key]['tyynumber']+= $row3['number'];}	
	break;
}

	if(!empty($row3['realstarttime']))
{
IF(!empty($row3['realendtime']))
{	if($key<$row3['realstarttime']&&$row3['realstarttime']<($key+1800)){$duringarray10[$key]['zynumber']+= $row3['number'];$duringarray10[$key]['nownumber']+= $row3['number'];}	
	if($key>$row3['realstarttime']&&$row3['realendtime']>$key){$duringarray10[$key]['zynumber']+= $row3['number'];$duringarray10[$key]['nownumber']+= $row3['number'];}	
}else{
	if($key<$row3['realstarttime']&&$row3['realstarttime']<($key+1800)){$duringarray10[$key]['zynumber']+= $row3['number'];$duringarray10[$key]['nownumber']+= $row3['number'];}	
	if($key>$row3['realstarttime']&&$row3['iendtime']>$key){$duringarray10[$key]['zynumber']+= $row3['number'];$duringarray10[$key]['nownumber']+= $row3['number'];}	

}}ELSE{
if($key<$row3['iendtime']&&$row3['iendtime']<($key+1800)){$duringarray10[$key]['zynumber']+= $row3['number'];}	
	if($row3['iendtime']>$key&&$yuyuetime<$key){$duringarray10[$key]['zynumber']+= $row3['number'];}	

}



			}

$Arr = array(
				'nowtype'	=> $nowtype,
			);
		$row = $DB->updateArr('shixun_ap',$Arr,"WHERE id ='{$row3[id]}'");
			}
		}else{
		ECHO'EMPTY';	
		}
		if(!EMPTY($row))
{
		$nowarray['uptime']=time();
		$nowarray['ayynumber']=	$ayynumber;
	$nowarray['cyynumber']=$cyynumber;
	$nowarray['qdnumber']=$qdnumber;
	$nowarray['qtnumber']=$qtnumber;
			$row = $DB->updateArr('shixun_now',$nowarray,"WHERE rid ='".$Array['rid']."'");
SSWrite($nowarray,$LId.'.php');
SSWrite($duringarray10,$LId.'10.php');
}else{
 	$nowarray['uptime']=time();
	$DB->create('shixun_now',$nowarray);
SSWrite($nowarray,$LId.'.php');
SSWrite($duringarray10,$LId.'10.php');
}   
			}

function SSWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}
?>