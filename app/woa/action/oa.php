<?php
$number=$_SESSION['zid']['number'];
$type=$_SESSION['zid']['type'];
		if($type!='2'&&$number!='15223232'){
$isstop=1;
	}else{
		$isstop=0;
	}
if(is_file(ZSystem.'/data/app/woa/password/'.$number.'.php')){
				$arr = SetRead('/system/data/app/woa/password/'.$number.'.php');
			}ELSE{
					header("Location:/woa"); 
			}
