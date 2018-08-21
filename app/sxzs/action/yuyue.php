<?php
if(!is_dir(ZSystem.'/data/app/sxzs/roomindex') )mkdir(ZSystem.'/data/app/sxzs/roomindex');
define('RROOT',ZSystem.'/data/app/sxzs/roomindex/');
if(is_file(ZSystem.'/data/app/sxzs/roomindex/xq.php')){
				$xq = SetRead( '/system/data/app/sxzs/roomindex/xq.php');
			}
			ELSE
			{
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
				$xq = SetRead( '/system/data/app/sxzs/roomindex/xq.php');
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