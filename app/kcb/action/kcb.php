<?php
empty($params[0]) ? $roomm = '0' : $roomm = $params[0];
$number=$roomm;
if(is_file(ZSystem.'/data/app/timetables/'.KCBDATE.'/'.$number.'.php')){
				$arr = SetRead( '/system/data/app/timetables/'.KCBDATE.'/'.$number.'.php');
			}
			
			if(is_file(ZSystem.'/data/app/timetables/'.KCBDATE.'/'.$number.'.php')){
		if(filemtime(ZSystem.'/data/app/timetables/'.KCBDATE.'/'.$number.'.php')>time()-60){
			$isneed=0;			
		}else{
			$isneed=1;	
		}}else{
			$isneed=1;	
		}