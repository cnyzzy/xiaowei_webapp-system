<?php
if(!is_dir(ZSystem.'/data/app/sxzs/whereid') )mkdir(ZSystem.'/data/app/sxzs/whereid');
define('RROOT',ZSystem.'/data/app/sxzs/whereid/');
define('RROOTT',ZSystem.'/data/app/sxzs/now/'.$timee.'/');
header("Cache-control: private");
$postn=urldecode($_POST['searchpost']);
empty($params[0]) ? $LId = '1' : $LId = intval($params[0]);


			
		 $sql = "SELECT  * FROM shixun_room WHERE name like '%{$postn}%'  or description like '%{$postn}%' or room like '%{$postn}%' or dept like '%{$postn}%' or xq like '%{$postn}%'  and isok='1' order by rid DESC ";
		$WArrsy=array();
		$WArrsy =  $DB->fetch_all_array($sql);
		
						foreach((array)$WArrsy as $key=>$row)
			{	
if(is_file(RROOTT.$row['rid'].'.php')&&(filectime(RROOTT.$row['rid'].'.php')>time()-60)){
	$QWArrsy = SetRead( '/system/data/app/sxzs/now/'.$timee.'/'.$row['rid'].'.php');
		if(!empty($QWArrsy))$WArrsy[$key]['now']=$QWArrsy;
			}
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
				  $sql2 = "SELECT  buildid,build FROM shixun_room  WHERE isok='1' AND xqid='".$row['xqid']."' group by build";
			$Arr2=array();

		$Arr2 =  $DB->fetch_all_array($sql2);
			foreach((array)$Arr2 as $key=>$row2)
			{
		
			$temparray2=array();
				$temparray2['value']=$row2['buildid'];
				$temparray2['text']=$row2['build'];
				$temparray2['children']=array();
							  $sql3 = "SELECT  whereid,ground FROM shixun_room WHERE buildid='".$row2['buildid']."' and isok='1' group by ground";
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