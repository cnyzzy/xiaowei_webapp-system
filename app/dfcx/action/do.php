<?php
define('RROOT',ZSystem.'/data/app/dfcx/');
empty($params[0]) ? $LId = '1' : $LId = $params[0];
	$Dfcx = new Dfcx($DB);
IF($LId == 'exit'){
 $info=$Dfcx->GetRoomInfo($number);
		if(is_file(RROOT.$number.".php")){
				unlink( RROOT.$number.".php");
				 }
			 if(is_file(RROOT.$number."d.php")){
				unlink( RROOT.$number."d.php");
				 }
		 if(!EMPTY($info)){
		 $Dfcx->DInfo($info['id']);
		 
		 }
	echo'1';
	
}
