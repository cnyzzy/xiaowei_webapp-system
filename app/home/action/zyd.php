<?php
header("Cache-control:private");
$number=$_SESSION['zid']['number'];
empty($params[0]) ? $LId = '' : $LId = $params[0];
empty($params[1]) ? $Id = '' : $Id = $params[1];
switch ($LId )
{
case 1:
$titlename="jwinfo";
break;
case 2:
$titlename="17xs";
break;
case 3:
$titlename="xszl";
break;
case 4:
$titlename="wxid";
break;
case 42:
$titlename="qqid";
break;
case 43:
$titlename="wbid";
break;
case 18:
$titlename="18xs";
break;
case 5:
$titlename="ghzl";
break;

default://无数据
$titlename="jwinfo";

break;
}
		$ss="SELECT  * FROM ".$titlename." where id = '{$Id}'";

	$row =$DB->once_fetch_array($ss);
	  $row1 = array();
    foreach($row as $key => $val){
        // 这里过滤mysql多余的数据
		if(!is_numeric($key)){
        $row1[($key)] = is_array($val) ? array_urlencode($val) : ($val);}
    }
if($_SESSION['zid']['number']!='15223232')
{header("Location:/");EXIT; }	