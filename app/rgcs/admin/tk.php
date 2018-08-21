<?php

$PerNum=20;
$NOW = empty($ccc) ? 1:($ccc);
$NOWL = $NOW-1;
$NOWLL = $NOW-2;
$NOWLLL = $NOW-3;
$NOWLLLL = $NOW-4;
$NOWR = $NOW+1;
$NOWRR = $NOW+2;
$NOWRRR = $NOW+3;
$NOWRRRR = $NOW+4;
$TotalNum = NumA($bbb,$DB);
$prePageNum = $TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$Array = ReceiveA($TotalNum,$PerNum,$bbb,$NOW,$DB);
function NumA($bbb,$DB){
	    $sql = "SELECT  id FROM rg_question";
		$row = $DB->query($sql);
		$num = $DB->num_rows($row);
        return $num;  
    }
		function ReceiveA($TotalNum,$PerNum=1,$bbb,$NowNum,$DB){
	$WHERE='id';
if($bbb!='index')$WHERE=$bbb;
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $DB->query("select * from rg_question order by $WHERE desc $limit");
		$users = array();
		while($row =  $DB->fetch_array($res1))
			{
			
		$users[] = $row;
			}
        return $users;  
    }