<?php
$Home = new Home($DB);
$NoticeNum = $Home->NoticeNum();
$MsgNum = $Home->MsgNum($_SESSION['zid']['number']);
$AppNum = $Home->AppNum();
$SelfNum = $Home->SelfNum($_SESSION['zid']['number']);

if(!is_dir(ZSystem.'/data/app/timetables') )mkdir(ZSystem.'/data/app/timetables');
if(file_exists(ZSystem.'/data/app/timetables/now.php'))
{$arrT = SetRead('/system/data/app/timetables/now.php');
}

	$arr2=array (
  'year' => '2017',
  'team' => '01',
);
if(empty($arrT['year'])||empty($arrT['team'])){
	SetWrite($arr2,'/system/data/app/timetables/now.php');
	$arrT=$arr2;
}
define("KCBDATE",$arrT['year'].$arrT['team']);
if(!is_dir(ZSystem.'/data/app/timetables/'.KCBDATE)) mkdir(ZSystem.'/data/app/timetables/'.KCBDATE);
if(!is_dir(ZSystem.'/data/app/timetables/'.KCBDATE.'/room') )mkdir(ZSystem.'/data/app/timetables/'.KCBDATE.'/room');
if(!is_dir(ZSystem.'/data/app/timetables/'.KCBDATE.'/teacher') )mkdir(ZSystem.'/data/app/timetables/'.KCBDATE.'/teacher');
if(!is_dir(ZSystem.'/data/app/timetables/'.KCBDATE.'/c') )mkdir(ZSystem.'/data/app/timetables/'.KCBDATE.'/c');