<?php
$number=$_SESSION['zid']['number'];
if(is_file(ZSystem.'/data/app/djks/'.$number.'.php')){
				$arr1 = SetRead( '/system/data/app/djks/'.$number.'.php');
				unset($arr1[0]);
			}
