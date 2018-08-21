<?php
empty($params[0]) ? $id = '0' : $id = $params[0];
$Swzl = new Swzl($DB);

$Array = $Swzl-> ReceiveSwzl($id);
if(empty($Array)){
	 header("Location:".$arrInfo['url']."/swzl/");
}

$wa='';
$wb='';	  
 switch (substr($Array['swhere'],0,1))
{
case '1':
 $wa='全部地点';
break; 
case '2':
 $wa='新长校区';
 	switch (substr($Array['swhere'],1,1))
	{
	case '1':
	$wb='公共教学楼';
	break; 
	case '2':
	$wb='操场/体育馆';
	break; 
	case '3':
	$wb='食堂';
	break;
	case '4':
	$wb='其他教学楼';
	break;
	case '5':
	$wb='实验楼';
	break; 
	case '6':
	$wb='图书馆';
	break;   
	case '7':
	$wb='道路';
	break;  
	case '8':
	$wb='商业街/创业园';
	break;  
	case '9':
	$wb='其他';
	break;  
	default:
	$wb='未知';
	}
break; 
case '3':
 $wa='通榆校区';
 	switch (substr($Array['swhere'],1,1))
	{
	case '1':
	$wb='主楼';
	break; 
	case '2':
	$wb='图书馆';
	break; 
	case '3':
	$wb='操场/体育馆';
	break;
	case '4':
	$wb='食堂';
	break;
	case '5':
	$wb='其他教学楼';
	break; 
	case '6':
	$wb='道路';
	break;   
	case '7':
	$wb='其他';
	break;  
	default:
	$wb='未知';
	}
break;
case '4':
 $wa='附近';
 	switch (substr($value['swhere'],1,1))
	{
	case '1':
	$wb='育才路';
	break; 
	case '2':
	$wb='宝龙';
	break; 
	case '3':
	$wb='金鹰';
	break;
	case '4':
	$wb='盐城工学院';
	break;
	case '5':
	$wb='中南城';
	break; 
	case '6':
	$wb='其他';
	break;   
	default:
	$wb='未知';
	}
break;
case '5':
 $wa='交通';
 	switch (substr($value['swhere'],1,1))
	{
	case '1':
	$wb='公交';
	break; 
	case '2':
	$wb='出租车';
	break; 
	case '3':
	$wb='长途客车/火车';
	break;
	case '4':
	$wb='公共自行车';
	break;
	case '5':
	$wb='其他';
	break;  
	default:
	$wb='未知';
	}
break; 
case '6':
 $wa='其他';
break;   
default:
 $wa='未知';
 }
$ArrayXG = $Swzl->ReceiveSwzlXG($Array['swhere'],$Array['stype'],$Array['isok']);
$ReplyNum = $Swzl->SwzlReplyNum($Array['id'],1);
$LikeNum  = $Swzl->SwzlLikeNum($number);
$ArrayReply = $Swzl->ReceiveSwzlRE($Array['id'],1);