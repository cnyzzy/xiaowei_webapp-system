<?php

	
		$arr=$DB->fetch_all_array("select * from gcdxy order by sroce desc limit 100");
		$users = array();
		foreach((array)$arr as $key=>$row)
			{
		
			$a=array();
$a['Name']	=	$row['nickname'];	
$a['Score']	=	$row['sroce'];
			$users[] = $a;
			}
ob_flush();
ob_clean();
echo json_encode($users); EXIT;