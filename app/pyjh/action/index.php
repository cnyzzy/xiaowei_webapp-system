<?php
$number=$_SESSION['zid']['number'];
if(is_file(ZSystem.'/data/app/pyjh/'.$number.'.php')){
				$arr1 = SetRead( '/system/data/app/pyjh/'.$number.'.php');
				unset($arr1[0]);
			}
			
if(is_file(ZSystem.'/data/app/pyjh/'.$number.'b.php')){
				$arr2 = SetRead( '/system/data/app/pyjh/'.$number.'b.php');
			}
if(is_file(ZSystem.'/data/app/pyjh/'.$number.'c.php')){
				$arr3 = SetRead( '/system/data/app/pyjh/'.$number.'c.php');
			}			