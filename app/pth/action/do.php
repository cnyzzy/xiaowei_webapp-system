<?php
empty($params[0]) ? $LId = '1' : $LId = $params[0];

IF($LId == 'up'){
$maxs = $_POST['sss'];
	    $sql = "SELECT  * FROM game WHERE number ='{$number}' and gameid='1'";
		$row = $DB->once_fetch_array($sql);
		if(!empty($row))
		{
			$sss=@$row['maxs'];
			if($sss>$maxs)$maxs=$sss;
		$sql = "Delete FROM game WHERE number ='{$number}'";
		
		}
		$ip=getIP();
		$row = $DB->query($sql);
			$id = $DB->create('game',array(
				'number'       => @$number,
				'name'       => @$name,
				'maxs'       => @$maxs,
				'addtime'	=> time(),
				'ip'	=> @$ip,
				'gameid'	=> '1',
			));
	
		$sq2="select count(1) as No from game where maxs >= (select maxs from game where number = '{$number}' and gameid='1') and gameid='1' ;";
			 $result2 =$DB->once_fetch_array($sq2); 
			 $sql22 = "Select id,maxs AS maxss,name From game  WHERE  gameid='1'  Order by maxss desc  limit 1";
				$no1 = $DB->once_fetch_array($sql22);
if(empty($result2)||empty($no1))
{
			$arr['status']=0; 
$arr['content']="失败"; 
echo json_encode($arr);	
exit();
}else{
			
		  $arr['status']=1; 
$arr['paim']=$result2['No']; 
$arr['no1name']=$no1['name']; 
$arr['no1s']=$no1['maxss'];
echo json_encode($arr);	
exit(); 
	  
 }
}
