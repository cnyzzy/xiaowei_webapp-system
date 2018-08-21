<?php
/**
 * 时间类
 *
 * @copyright (c) ZY All Rights Reserved
 */
 	class Time {
function getTime($btime, $etime){
	
		if ($btime < $etime) {
			$stime = $btime;
			$endtime = $etime;
		}else {
			$stime = $etime;
			$endtime = $btime;
		}
		$timec = $endtime - $stime;
		$days = intval($timec / 86400);
		$rtime = $timec % 86400;
		$hours = intval($rtime / 3600);
		$rtime = $rtime % 3600;
		$mins = intval($rtime / 60);
		$secs = $rtime % 60;
		if($days>=1){
			return $days.' 天前';
		}
		if($hours>=1){
			return $hours.' 小时前';
		}

		if($mins>=1){
			return $mins.' 分钟前';
		}
		if($secs>=1){
			return $secs.' 秒前';
		}
	 
	}
	}