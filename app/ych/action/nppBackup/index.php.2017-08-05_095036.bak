<?php
$number=$_SESSION['zid']['number'];
if(is_file(ZSystem.'/data/app/zsj/'.$number.'.php')){
				$arr1 = SetRead( '/system/data/app/zsj/'.$number.'.php');
			}
$sql = "SELECT  * FROM game WHERE number ='{$number}' and gameid='1'";
		$row = $DB->once_fetch_array($sql);
		if(!empty($row))
		{
			$msss=@$row['maxs'];
		
		}