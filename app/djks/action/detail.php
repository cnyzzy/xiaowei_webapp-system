<?php
$number=$_SESSION['zid']['number'];
empty($params[0]) ? $id = '0' : $id = $params[0];
if(is_file(ZSystem.'/data/app/djks/'.$number.'.php')){
				$arr1 = SetRead( '/system/data/app/djks/'.$number.'.php');
				$title= $arr1[0];
				unset($arr1[0]);
				$array = array();
				if(!empty($arr1[$id]))$array = $arr1[$id];
				
			}		