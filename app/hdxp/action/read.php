<?php
$Hdxp = new Hdxp($DB);

$Arr = $Hdxp->ReceiveHdxpticker($number);

if($Arr){
	
	 foreach((array)$Arr as $key=>$loopChild) {
		 $array[$loopChild['sid']]=$Hdxp->GetHdxpA($loopChild['sid']);
		if(strtotime($loopChild['hdtime'])<strtotime("today")||$loopChild['isok']=='0')
		{
			$ARRH[]=$loopChild;
		}else{
			$ARRNOW[]=$loopChild;
		}			
	 }
}

?>