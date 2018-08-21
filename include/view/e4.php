<?PHP
$sql2 = "SELECT * FROM jwinfo WHERE number LIKE '1522323%'";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
		print_r($info);