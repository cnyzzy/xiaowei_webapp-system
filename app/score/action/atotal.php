<?php
$number=$_SESSION['zid']['number'];

if(is_file(ZSystem.'/data/app/score/table2/'.$number.'.php')){
				$arr1 = SetRead( '/system/data/app/score/table2/'.$number.'.php');
				$title= $arr1[0];
				unset($arr1[0]);
			}		