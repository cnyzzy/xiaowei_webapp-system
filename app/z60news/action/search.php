<?php
header("Cache-control: no-cache");
$number=$_SESSION['zid']['number'];
$postn=urldecode(@$_POST['searchpost']);

if(!empty($postn)){
	$sql1="SELECT  * FROM z60news where title like '%{$postn}%' or dcontent like '%{$postn}%' or content like '%{$postn}%'  order by id desc";
	$Array2 = @$DB->fetch_all_array($sql1);

}else{
	$Z60news = new Z60news($DB);
$NEWSNum=$Z60news->Z60newsNumA();
if($NEWSNum!=0){
$Array1=$Z60news->ReceiveZ60newsA10();

}

}
		