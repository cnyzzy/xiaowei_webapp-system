<?php
empty($params[0]) ? $d = '1' : $d =$params[0];
$Swzl = new Swzl($DB);
$PerNum=10;
$qpage=$d-1;
$hpage=$d+1;
$TotalNum = $Swzl->SwzlFeedNum($number);
$prePageNum = $TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$Array = $Swzl-> ReceiveSwzlFeed($TotalNum,$PerNum,$d,$number);
$pagemax=$prePageNum;
	foreach($Array as $key=>$value)
  {
	$list[$value['id']] =  $Swzl-> ReceiveSwzl($value['sid']);;
  }
