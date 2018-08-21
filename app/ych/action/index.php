<?php

if(is_file(ZSystem.'/data/app/ych/time.php')){
				$arr1 = SetRead( '/system/data/app/ych/time.php');
			}else{
			$arr1['times']=0;	
			}
$arr1['times']=$arr1['times']+1;
SetWrite($arr1,'/system/data/app/ych/time.php');
$Wx = new Wx();
$signPackage=$Wx->getSignPackage();
