<?php
if(!is_dir(ZSystem.'/data/app/ych') )mkdir(ZSystem.'/data/app/ych');
	if(isset($_SESSION['zid'])){
	$number=$_SESSION['zid']['number'];
	$type=$_SESSION['zid']['type'];
	$img=$_SESSION['zid']['img'];
	$name=$_SESSION['zid']['name'];
	}