<?php

$number=$_SESSION['zid']['number'];

$sql2 = "SELECT * FROM wxid WHERE number ='{$number}' and isok=1 order by id desc limit 1";
$result2 = $DB->query($sql2);
$info1 = $DB->fetch_array($result2);

$sql22 = "SELECT * FROM wxappid WHERE number ='{$number}' and isok=1 order by id desc limit 1";
$result22 = $DB->query($sql22);
$info2 = $DB->fetch_array($result22);

$sql3 = "SELECT * FROM qqid WHERE number ='{$number}' and isok=1 order by id desc limit 1";
$result3 = $DB->query($sql3);
$info3 = $DB->fetch_array($result3);

$sql4 = "SELECT * FROM wbid WHERE number ='{$number}' and isok=1 order by id desc limit 1";
$result4 = $DB->query($sql4);
$info4 = $DB->fetch_array($result4);
