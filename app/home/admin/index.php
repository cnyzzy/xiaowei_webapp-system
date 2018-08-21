<?php
$Mapp = new Mapp($DB);
$Group = $Mapp->ReceiveGroupA();
foreach($Group as $key=>$value)
  {
 
	$List[$value['groupid']] = $Mapp->ReceiveGroupListA($value['groupid']);
  }
