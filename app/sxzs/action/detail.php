<?php
define('RROOTT',ZSystem.'/data/app/sxzs/now/'.$timee.'/');

$Sxzs = new Sxzs($DB);
empty($params[0]) ? $id = '1' : $id = $params[0];
if(!is_numeric($id))$id=1;
$type=@$_SESSION['zid']['type'];
$isstop=0;
		if(empty($type)||($type!='1'&&$type!='2')){
		$isstop=1;
	}

$Array = $Sxzs->GetSxzson($id);
if(is_file(RROOTT.$Array['rid'].'.php')){
	$QWArrsy = SetRead( '/system/data/app/sxzs/now/'.$timee.'/'.$Array['rid'].'.php');
		$aRRAY3 = SetRead( '/system/data/app/sxzs/now/'.$timee.'/'.$Array['rid'].'10.php');

	$ZYBFB=0;
		if(!empty($QWArrsy)){$Array2=$QWArrsy;
$ZYBFB=round($Array2['zynumber']/$Array2['number']*100,2);
		}
			}
			if(is_file(RROOTT.$Array['rid'].'.php')&&(filectime(RROOTT.$Array['rid'].'.php')>time()-60))$isshuaxin=1;

?>