<?php
empty($params[0]) ? $LId = '1' : $LId = $params[0];
empty($params[1]) ? $id = '1' : $id = $params[1];
IF($LId == 'noseat'){

$hdtime = $_POST['time'];
	    $sql = "SELECT  * FROM hdxp_seat WHERE isok ='1' and id='$id'";
		$row = $DB->once_fetch_array($sql);
		if(empty($row))
		{
			$arr['ok']=0; 
$arr['content']="失败"; 
echo json_encode($arr);	
		exit;
		}
			if($row['number']!=$number||$row['hdtime']!=$hdtime)
		{
			$arr['ok']=2; 
$arr['content']="失败"; 
echo json_encode($arr);	
		exit;
		}

$Hdxp = new Hdxp($DB);

$Arr = $Hdxp->Okhdxp_seat($id,'0');

if(empty($Arr))
{
			$arr['ok']=2; 
$arr['content']="失败"; 
echo json_encode($arr);	
exit();
}else{
			
		  $arr['ok']=1; 
echo json_encode($arr);	
exit(); 
	  
 }
}
IF($LId == 'addseat'){
$x = $_POST['x'];
$y = $_POST['y'];
$hdtime = $_POST['time'];
	    $sql = "SELECT  id FROM hdxp_seat WHERE number ='{$number}' and sid='$id' and isok='1'";
		$row = $DB->once_fetch_array($sql);
		if(!empty($row))
		{
			$arr['ok']=2; 
$arr['content']="失败"; 
echo json_encode($arr);	
		exit;
		}
		
		$sql = "SELECT  addtime FROM hdxp_seat WHERE number ='{$number}' and sid='$id'  order by addtime desc";
		$row = $DB->once_fetch_array($sql);
		if(($row['addtime']+300)>time())
		{	
			$arr['ok']=3; 
$arr['content']="失败"; 
echo json_encode($arr);	
		exit;
		}	
			$sql = "SELECT  opentime,endtime FROM hdxp WHERE sid='$id'";
		$row = $DB->once_fetch_array($sql);
		if($row['opentime']>time()||$row['endtime']<time())
		{	
			$arr['ok']=5; 
$arr['content']="失败"; 
echo json_encode($arr);	
		exit;
		}	
			    $sql = "SELECT  * FROM hdxp_seat WHERE x ='{$x}' and y ='{$y}' and sid='$id'";
		$row = $DB->once_fetch_array($sql);
		if(!empty($row))
		{
			$arr['ok']=0; 
$arr['content']="失败"; 
echo json_encode($arr);	
		exit;
		}

$Hdxp = new Hdxp($DB);

$Arr = $Hdxp->AddHdxp_seat($id,$name,$x."_".$y,$number,$type,$img,$x,$y,$x."排".$y."座",$hdtime);

if(empty($Arr))
{
			$arr['ok']=0; 
$arr['content']="失败"; 
echo json_encode($arr);	
exit();
}else{
			
		  $arr['ok']=1; 
echo json_encode($arr);	
exit(); 
	  
 }
}
