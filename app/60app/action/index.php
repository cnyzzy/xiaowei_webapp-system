<?php

$Wx = new Wx();
$signPackage=$Wx->getSignPackage();
$endTime = '2018-09-19';
$VarTime = ceil((strtotime($endTime)-time())/86400);