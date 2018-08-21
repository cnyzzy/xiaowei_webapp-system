<?php
$Wx = new Wx();
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = "$protocol$arrInfo[url]"."/".$AppName;
$signPackage=$Wx->getSignPackageU($url);
	ob_flush();
ob_clean();
echo json_encode($signPackage); EXIT;