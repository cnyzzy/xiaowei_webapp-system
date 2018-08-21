<?php
$type=@$_SESSION['zid']['type'];
$isstop=0;
		if(empty($type)||($type!='1'&&$type!='2')){
		$isstop=1;
	}
