<?php
$isok=0;
		$queryQ = $DB->query("select * from mobiles where openid='{$_SESSION['wx']['openid']}' and number='{$_SESSION['zid']['number']}' and isok='1'");
		$NumQ = $DB->num_rows($queryQ);

		if($NumQ != 0){
					$sql2Q ="select * from mobiles where openid='{$_SESSION['wx']['openid']}'and number='{$_SESSION['zid']['number']}' and isok='1'";
		$result2Q = $DB->query($sql2Q);
		$row2Q= $DB->fetch_array($result2Q);
			$isok=1;
		}