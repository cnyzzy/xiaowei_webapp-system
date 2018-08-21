<?php
$Home = new Home($DB);
$NoticeNum = $Home->NoticeNum();
$MsgNum = $Home->MsgNum($_SESSION['zid']['number']);
$AppNum = $Home->AppNum();
$SelfNum = $Home->SelfNum($_SESSION['zid']['number']);
$number=$_SESSION['zid']['number'];
$type=$_SESSION['zid']['type'];
if(!is_dir(ZSystem.'/data/app/woa') )mkdir(ZSystem.'/data/app/woa');
if(!is_dir(ZSystem.'/data/app/woa/cache') )mkdir(ZSystem.'/data/app/woa/cache');
if(!is_dir(ZSystem.'/data/app/woa/doc') )mkdir(ZSystem.'/data/app/woa/doc');
if(!is_dir(ZSystem.'/data/app/woa/attach') )mkdir(ZSystem.'/data/app/woa/attach');
if(!is_dir(ZSystem.'/data/app/woa/cookies') )mkdir(ZSystem.'/data/app/woa/cookies');
if(!is_dir(ZSystem.'/data/app/woa/password') )mkdir(ZSystem.'/data/app/woa/password');
if(!is_dir(ZSystem.'/data/app/woa/cache/'.$number) )mkdir(ZSystem.'/data/app/woa/cache/'.$number);
