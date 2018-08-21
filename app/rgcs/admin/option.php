<?php
$NOW = empty($bbb) ? 1:($bbb);

$sql = "SELECT id,content,score FROM  rg_option WHERE pid = '".$NOW."' AND appid = '1'";
$Array = $DB->fetch_all_array($sql);