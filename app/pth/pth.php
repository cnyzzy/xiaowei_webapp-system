<?php
if(!is_dir(ZSystem.'/data/app/pth') )mkdir(ZSystem.'/data/app/pth');
if(!is_dir(ZSystem.'/data/app/pth/temp') )mkdir(ZSystem.'/data/app/pth/temp');
	$number=$_SESSION['zid']['number'];
	$type=$_SESSION['zid']['type'];
	$img=$_SESSION['zid']['img'];
	$name=$_SESSION['zid']['name'];