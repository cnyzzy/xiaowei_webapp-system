<?php
$Wx = new Wx();
$signPackage=$Wx->getSignPackage();
$isstop=0;
$type=@$_SESSION['zid']['type'];
	if(empty($number))$number=$_SESSION['zid']['number'];
		if($type=='3'&&$number=='no'){
		$isstop=1;
	}
$arrURL = parse_url($arrInfo['url']); 