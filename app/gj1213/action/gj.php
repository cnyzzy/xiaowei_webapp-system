<?php
if(is_file(ZSystem.'/data/app/gj1213/time.php')){
				$arr1 = SetRead( '/system/data/app/gj1213/time.php');
			}else{
			$arr1['times']=0;	
			}


SetWrite($arr1,'/system/data/app/gj1213/time.php');
$Wx = new Wx();
$signPackage=$Wx->getSignPackage();
