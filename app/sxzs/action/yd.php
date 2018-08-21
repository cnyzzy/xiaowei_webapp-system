<?php
if(!is_dir(ZSystem.'/data/app/sxzs/whereid') )mkdir(ZSystem.'/data/app/sxzs/whereid');
define('RROOT',ZSystem.'/data/app/sxzs/whereid/');
define('RROOTT',ZSystem.'/data/app/sxzs/now/'.$timee.'/');

empty($params[0]) ? $LId = '1' : $LId = intval($params[0]);
$xq='';
$dept='';
$ground='';
if(is_file(ZSystem.'/data/app/sxzs/whereid/'.$LId.'.php')&&(filectime(ZSystem.'/data/app/sxzs/whereid/'.$LId.'.php')>time()-600)){
				$WArrsy = SetRead( '/system/data/app/sxzs/whereid/'.$LId.'.php');
				foreach((array)$WArrsy as $key=>$row)
			{
			if(!empty($row['xq']))$xq=$row['xq'];
			if(!empty($row['build']))$dept=$row['build'];
			if(!empty($row['ground']))$ground=$row['ground'];
if(is_file(RROOTT.$row['rid'].'.php')&&(filectime(RROOTT.$row['rid'].'.php')>time()-60)){
				$QWArrsy = SetRead( '/system/data/app/sxzs/now/'.$timee.'/'.$row['rid'].'.php');
		if(!empty($QWArrsy))$WArrsy[$key]['now']=$QWArrsy;
			}

			}
}
			ELSE
			{
		 $sql = "SELECT  * FROM shixun_room WHERE whereid='".$LId."' and isok='1' order by rid DESC ";
		$Arr=array();
		$Arr =  $DB->fetch_all_array($sql);
			foreach((array)$Arr as $key=>$row)
			{
			
			$WArrsy[] = $row;
			if(!empty($row['xq']))$xq=$row['xq'];
			if(!empty($row['build']))$dept=$row['build'];
			if(!empty($row['ground']))$ground=$row['ground'];
			
			}
						foreach((array)$WArrsy as $key=>$row)
			{	
if(is_file(RROOTT.$row['rid'].'.php')&&(filectime(RROOTT.$row['rid'].'.php')>time()-60)){
	$QWArrsy = SetRead( '/system/data/app/sxzs/now/'.$timee.'/'.$row['rid'].'.php');
		if(!empty($QWArrsy))$WArrsy[$key]['now']=$QWArrsy;
			}
			}
		SSWrite($WArrsy,$LId.'.php');
	   
			}
			//PRINT_R($WArrsy);
if(is_file(ZSystem.'/data/app/sxzs/whereid/A.php')&&(filectime(ZSystem.'/data/app/sxzs/whereid/A.php')>time()-600)){
				$A = SetRead( '/system/data/app/sxzs/whereid/A.php');
				
			}
			ELSE
			{
			$A=array();
	    $sql = "SELECT  xq,xqid FROM shixun_room WHERE isok='1' group by xq";
		$Arr=array();
		$Arr =  $DB->fetch_all_array($sql);
			foreach((array)$Arr as $key=>$row)
			{
			$temparray=array();
				$temparray['value']=$row['xqid'];
				$temparray['text']=$row['xq'];
				$temparray['children']=array();
				  $sql2 = "SELECT  buildid,build FROM shixun_room  WHERE isok='1' AND xqid='".$row['xqid']."' group by build order by buildid DESC";
			$Arr2=array();

		$Arr2 =  $DB->fetch_all_array($sql2);
			foreach((array)$Arr2 as $key=>$row2)
			{
		
			$temparray2=array();
				$temparray2['value']=$row2['buildid'];
				$temparray2['text']=$row2['build'];
				$temparray2['children']=array();
							  $sql3 = "SELECT  whereid,ground FROM shixun_room WHERE buildid='".$row2['buildid']."' and isok='1' group by ground order by whereid DESC";
			$Arr3=array();

		$Arr3 =  $DB->fetch_all_array($sql3);
			foreach((array)$Arr3 as $key=>$row3)
			{
		
			$temparray3=array();
				$temparray3['value']=$row3['whereid'];
				$temparray3['text']=$row3['ground'];
		
				$temparray2['children'][]=$temparray3;
			}
				
				
				$temparray['children'][]=$temparray2;
			}
				$A[]=$temparray;
			}
		SSWrite($A,'A.php');	
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