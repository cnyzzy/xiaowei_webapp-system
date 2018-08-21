<?php
$type=@$_SESSION['zid']['type'];
$isstop=0;
		if(empty($type)||($type!='1'&&$type!='2')){
		$isstop=1;
	}
$Wx = new Wx();
$signPackage=$Wx->getSignPackage();

function SSetWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}			