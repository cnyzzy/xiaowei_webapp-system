<?php
$Sxzs = new Sxzs($DB);
empty($params[0]) ? $id = '1' : $id = $params[0];
if(!is_numeric($id))$id=1;
$Array = $Sxzs->GetSxzsAPon($id);
if($Array['snumber']!=$number||empty($Array))
{
	 header("Location:".$arrInfo['url']."/sxzs/");
	
}