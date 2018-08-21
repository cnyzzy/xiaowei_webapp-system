<?php
if(!is_dir(ZSystem.'/data/app/hdxp') )mkdir(ZSystem.'/data/app/hdxp');
if(!is_dir(ZSystem.'/data/app/hdxp/temp') )mkdir(ZSystem.'/data/app/hdxp/temp');
	$number=$_SESSION['zid']['number'];
	$type=$_SESSION['zid']['type'];
	$img=$_SESSION['zid']['img'];
	$name=$_SESSION['zid']['name'];