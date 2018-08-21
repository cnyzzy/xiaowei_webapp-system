<?php
$Cjhd = new Cjhd($DB);

$Arr = $Cjhd->ReceiveCjhdre($openid);

if($Arr){
	
	 foreach((array)$Arr as $key=>$loopChild) {
		 $array[$loopChild['sid']]=$Cjhd->GetCjhdA($loopChild['sid']);

			$ARRNOW[]=$loopChild;
					
	 }
}

?>