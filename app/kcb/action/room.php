<?php
$number=$_SESSION['zid']['number'];
empty($params[0]) ? $roomm = '0' : $roomm = urldecode($params[0]);
$room=iconv('UTF-8', 'GBK', $roomm);
if(is_file(ZSystem.'/data/app/timetables/'.KCBDATE.'/room/'. $room.'.php')){
				$arr = SetRead( '/system/data/app/timetables/'.KCBDATE.'/room/'. $room.'.php');
			}
	if(is_file(ZSystem.'/data/app/timetables/'.KCBDATE.'/room/'. $room.'.php')){
		if(filemtime(ZSystem.'/data/app/timetables/'.KCBDATE.'/room/'. $room.'.php')>time()-60){
			$isneed=0;			
		}else{
			$isneed=1;	
		}}else{
			$isneed=1;	
		}