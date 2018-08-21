<?php
if(!is_dir(ZSystem.'/data/app/sxzs/roomindex') )mkdir(ZSystem.'/data/app/sxzs/roomindex');
define('RROOT',ZSystem.'/data/app/sxzs/roomindex/');
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
				  $sql2 = "SELECT  deptid,dept FROM shixun_room  WHERE isok='1' AND xqid='".$row['xqid']."' group by dept";
			$Arr2=array();

		$Arr2 =  $DB->fetch_all_array($sql2);
			foreach((array)$Arr2 as $key=>$row2)
			{
		
			$temparray2=array();
				$temparray2['value']=$row2['deptid'];
				$temparray2['text']=$row2['dept'];
				$temparray2['children']=array();
							  $sql3 = "SELECT  whereid,ground FROM shixun_room WHERE deptid='".$row2['deptid']."' and isok='1' group by ground";
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
function SSWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}