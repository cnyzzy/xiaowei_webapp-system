<?php
$Home = new Home($DB);
$NoticeNum = $Home->NoticeNum();
$MsgNum = $Home->MsgNum($_SESSION['zid']['number']);
$AppNum = $Home->AppNum();
$SelfNum = $Home->SelfNum($_SESSION['zid']['number']);
$number=$_SESSION['zid']['number'];