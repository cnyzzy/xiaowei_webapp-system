<?php
header("Cache-control: private");
$postnn=@$_POST['search'];
empty($params[0]) ? $a = $postnn : $a =$params[0];
if(	!empty($postnn))
{$postn=urldecode(@$_POST['search']);}
else{$postn=urldecode($a);}


empty($params[1]) ? $d = '1' : $d =$params[1];
$Swzl = new Swzl($DB);
$PerNum=20;
$qpage=$d-1;
$hpage=$d+1;
$TotalNum = $Swzl->SwzlNumS($postn,1);
$prePageNum = $TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$Array = $Swzl-> ReceiveSwzlAS($TotalNum,$PerNum,$d,$postn,'1');
$pagemax=$prePageNum;
foreach($Array as $key=>$value)
  {
$wa='';
$wb='';	  
 switch (substr($value['swhere'],0,1))
{
case '1':
 $wa='全部地点';
break; 
case '2':
 $wa='新长校区';
 	switch (substr($value['swhere'],1,1))
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
 	switch (substr($value['swhere'],1,1))
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
	$wherea[$value['id']] = $wa;
	$whereb[$value['id']] = $wb;
  }
  $NumArray = $Swzl-> SwzlSNum($number);
  $NumNumber = $Swzl->SwzlNuNum($number);
  $LikeNum = $Swzl->SwzlLikeNum($number);
  $ReplyNum = $Swzl->SwzlReplyNumA($number);