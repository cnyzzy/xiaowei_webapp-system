<?php
$Hdxp = new Hdxp($DB);

$Arr = $Hdxp->ReceiveHdxpList("1");
$ArriMG = $Hdxp->ReceiveHdxpimgList("1");
if($ArriMG){
	
	 foreach((array)$ArriMG as $key=>$loopChild) {
		if(empty($loopChild['firstimg']))unset($ArriMG[$key]); 
	 }
}
?>