<?php
$PerNum=20;
$NOW = empty($params[0]) ? 1:($params[0]);
$NOWL = $NOW-1;
$NOWLL = $NOW-2;
$NOWLLL = $NOW-3;
$NOWLLLL = $NOW-4;
$NOWR = $NOW+1;
$NOWRR = $NOW+2;
$NOWRRR = $NOW+3;
$NOWRRRR = $NOW+4;
$Wx = new Wx();
$nowym=date('Ym');
$TotalNum = getMonthNum();
$prePageNum = $TotalNum>$PerNum?ceil($TotalNum/$PerNum):1;
$first= empty($NOW) ? 0:($NOW - 1) * $PerNum;
$firstym= date('Y-m-d',strtotime($nowym.'-'.$first.'month'));
$Array = array();
for ($x=0; $x<$PerNum; $x++) {
	$ym=date('Ym',strtotime("-".$x."months",strtotime($firstym)));
		$y=date('Y',strtotime("-".$x."months",strtotime($firstym)));
			$m=date('m',strtotime("-".$x."months",strtotime($firstym)));
			if($y<=2015&&$m<7)break;
				    $sql = "SELECT id FROM wxarticle WHERE sid='".$ym."'";
		$row = $DB->query($sql);
		$num = $DB->num_rows($row);
		$type=0;
		if($num>0)$type=1;
			    $sql = "SELECT time FROM wxarticle WHERE sid='".$ym."'order by time desc limit 1";
		
		$row = $DB->once_fetch_array($sql);
$Array[$x]=
array (
  'id' => $x,
  'sid' => $ym,
  'y' => $y,
  'm' => $m,
  'number' => $num,
  'type' => $type,
  'time' => $row['time'],
);
} 

function getMonthNum(){
    $date_1['y']=date('Y');
    $date_1['m']=date('m');
    return abs($date_1['y']-2015)*12 +$date_1['m']-7;
 }
  