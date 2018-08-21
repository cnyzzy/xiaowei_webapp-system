<?php
if(!is_dir(ZSystem.'/data/app/dfcx') )mkdir(ZSystem.'/data/app/dfcx');
if(!is_dir(ZSystem.'/data/app/dfcx/temp') )mkdir(ZSystem.'/data/app/dfcx/temp');
	$number=$_SESSION['zid']['number'];
	$type=$_SESSION['zid']['type'];
	$img=$_SESSION['zid']['img'];
	$name=$_SESSION['zid']['name'];