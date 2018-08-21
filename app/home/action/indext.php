<?php

$Mapp = new Mapp($DB);
$Group = $Mapp->ReceiveGroup("1");
foreach($Group as $key=>$value)
  {
 
	$List[$value['groupid']] = $Mapp->ReceiveGroupList($value['groupid']);
  }
