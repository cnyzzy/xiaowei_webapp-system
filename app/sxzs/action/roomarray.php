<?php
if(!is_dir(ZSystem.'/data/app/sxzs/roomindex') )mkdir(ZSystem.'/data/app/sxzs/roomindex');
define('RROOT',ZSystem.'/data/app/sxzs/roomindex/');
	    $sql = "SELECT  xq,xqid FROM shixun_room WHERE isok='1' group by xq";
		$Arr=array();
		$Arr =  $DB->fetch_all_array($sql);
			foreach((array)$Arr as $key=>$row)
			{
			$room[$row['xqid']] = $row['xq'];
			}
		SSWrite($room,'xq.php');
	    $sql = "SELECT  xqid,type,typeid FROM shixun_room WHERE isok='1'";
			$Arr=array();
			$type=array();
		$Arr =  $DB->fetch_all_array($sql);
			foreach((array)$Arr as $key=>$row)
			{
		
			$type[$row['xqid']][$row['typeid']] = $row['type'];
			}
		SSWrite($type,'type.php');
		    $sql = "SELECT  deptid,dept,typeid FROM shixun_room WHERE isok='1'";
			$Arr=array();
			$type=array();
		$Arr =  $DB->fetch_all_array($sql);
			foreach((array)$Arr as $key=>$row)
			{
		
			$type[$row['typeid']][$row['deptid']] = $row['dept'];
			}
		SSWrite($type,'dept.php');
		$sql = "SELECT  deptid,build,buildid FROM shixun_room WHERE isok='1'";
			$Arr=array();
			$type=array();
		$Arr =  $DB->fetch_all_array($sql);
			foreach((array)$Arr as $key=>$row)
			{
	
			$type[$row['deptid']][$row['buildid']] = $row['build'];
			}
		SSWrite($type,'build.php');
				$sql = "SELECT  groundid,ground,buildid FROM shixun_room WHERE isok='1'";
			$Arr=array();
			$type=array();
		$Arr =  $DB->fetch_all_array($sql);
			foreach((array)$Arr as $key=>$row)
			{
	
			$type[$row['buildid']][$row['groundid']] = $row['ground'];
			}
		SSWrite($type,'ground.php');
						$sql = "SELECT  groundid,room,roomid FROM shixun_room WHERE isok='1'";
			$Arr=array();
			$type=array();
		$Arr =  $DB->fetch_all_array($sql);
			foreach((array)$Arr as $key=>$row)
			{
	
			$type[$row['groundid']][$row['roomid']] = $row['room'];
			}
		SSWrite($type,'room.php');
function SSWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}