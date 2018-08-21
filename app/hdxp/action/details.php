<?php
$Hdxp = new Hdxp($DB);
empty($params[0]) ? $id = '1' : $id = $params[0];
if(!is_numeric($id))$id=1;
$type=@$_SESSION['zid']['type'];
$isstop=0;
		if(empty($type)||($type!='1'&&$type!='2')){
		$isstop=1;
	}

$Arr = $Hdxp->GetHdxpA($id);
$Arrseat = $Hdxp->ReceiveHdxpSeatMini($id,"1 or 0");
if($Arr){
	$isusenum = $Hdxp->SEATNumA($id,"1 or 0");
	
if(empty($Arr['seat']))$Arr['seat']="[ ]";
$totalnum=substr_count($Arr['seat'],'c');
if($totalnum>0)$seatnum=$totalnum-$isusenum;
if(!empty($Arrseat)){
$unseat= json_encode($Arrseat);
}
}else{

header("Location:{$arrInfo[url]}/hdxp/main"); 

}
?>