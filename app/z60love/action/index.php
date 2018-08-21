<?php
$Z60Love = new Z60Love($DB);
$NoticeNum=$Z60Love->Z60LoveGroupNum();

if($NoticeNum!=0){
$NoticeArray1=$Z60Love->ReceiveHot();

}