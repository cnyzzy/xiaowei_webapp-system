<?php
$Sxzs = new Sxzs($DB);
empty($params[0]) ? $id = '1' : $id = $params[0];
if(!is_numeric($id))$id=1;
$type=@$_SESSION['zid']['type'];
$isstop=0;
		if(empty($type)||($type!='1'&&$type!='2')){
		$isstop=1;
	}

$Array = $Sxzs->GetSxzsAPon($id);
if($Array['snumber']!=$number||empty($Array))
{
	 header("Location:".$arrInfo['url']."/sxzs/");
	
}
$Array2 = $Sxzs->GetSxzsRid($Array['rid']);
$djs=left_time($Array['limittime'], time(),2);
function left_time($big, $small, $type=1){

 
     $return = $re = abs($big-$small);
 
     $return = '';
     if ($d = floor($re/3600/24)) $return .= $d.'天';
     if ($h = floor(($re-3600*24*$d)/3600)) $return .= $h.'小时';
     if ( $type == 2 ) {
         $i = floor(($re-3600*24*$d-3600*$h)/60);
         $return .= $i.'分钟';
     }
     if ( $type == 3 ) {
         $i = floor(($re-3600*24*$d-3600*$h)/60);
         $return .= $i.'分';
         $s = floor($re-3600*24*$d-3600*$h-60*$i);
         $return .= $s.'秒';
     }
 
     return $return;
 }


?>