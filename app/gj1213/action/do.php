<?php
if(is_file(ZSystem.'/data/app/gj1213/time.php')){
				$arr1 = SetRead( '/system/data/app/gj1213/time.php');
			}else{
			$arr1['times']=0;	
			}

$arr1['times']=$arr1['times']+1;
SetWrite($arr1,'/system/data/app/gj1213/time.php');

