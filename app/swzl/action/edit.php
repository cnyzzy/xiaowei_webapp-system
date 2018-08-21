<?php
empty($params[0]) ? $id = '0' : $id = $params[0];
$Swzl = new Swzl($DB);
$Array = $Swzl-> ReceiveSwzlL($id);
if($Array['number']!=$number||empty($Array))
{
	 header("Location:".$arrInfo['url']."/swzl/");
	
}