<?php
$sql = "SELECT id FROM wxid order by id desc limit 1";
		$row = $DB->once_fetch_array($sql);
		$max=$row['id'];
$Array = array();
for ($x=0; $x<=($max/30); $x++) {

$i=1;
$Array[$x]=
array (
  'id' => $x,
  'y' => $i+$x*30,
  'm' => 30*($x+1),

);
} 

