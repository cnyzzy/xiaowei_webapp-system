<?php
$number=$_SESSION['zid']['number'];
if(is_file(ZSystem.'/data/app/pyjh/'.$number.'c.php')){
				$arr1 = SetRead( '/system/data/app/pyjh/'.$number.'c.php');
		$title= $arr1[0];
				unset($arr1[0]);
				$array = array();
				$array = $arr1;
				
			}		