<?php

empty($params[0]) ? $LId = '1' : $LId = $params[0];

IF($LId == 'zy'){

		empty($_POST['gonghao']) ? $gonghao = '0' : $gonghao = trim($_POST['gonghao']);
		empty($_POST['xingbie']) ? $xingbie = '0' : $xingbie = trim($_POST['xingbie']);
		empty($_POST['nianling']) ? $nianling = '0' : $nianling = trim($_POST['nianling']);
		empty($_POST['jz']) ? $jz = '0' : $jz = trim($_POST['jz']);
		empty($_POST['rzny']) ? $rzny = '0' : $rzny = trim($_POST['rzny']);

		if($gonghao == '0'||$xingbie == '0' ||$nianling == '0'|| $jz=='0'||$rzny == '0')printjson("error",'提交数据有空');
		
			if(!is_numeric($gonghao)){  
printjson("error",'工号错误');
}
			if(!is_numeric($nianling)){  
printjson("error",'年龄错误');
}
			if($xingbie!='男'&&$xingbie!='女'){  
printjson("error",'性别错误');
}

if(!empty($_SESSION['csxx']))unset($_SESSION['csxx']);
	
 if(!empty($result3))printjson("ok",'已登记');	
if($gonghao&&$xingbie&&$nianling&&$jz&&$rzny){
$_SESSION['csxx']['gonghao']=$gonghao;
	$_SESSION['csxx']['xingbie']=$xingbie;
	$_SESSION['csxx']['nianling']=$nianling;
	$_SESSION['csxx']['jz']=$jz;
	$_SESSION['csxx']['rzny']=$rzny;
		if(empty($_SESSION['csxx'])){
			printjson("error",'SESSION有误');	

}else{
printjson("ok",'登记成功');	}
			}else{
			printjson("error",'数据验证有误');	
}
}else{
	printjson("NO",'访问非法');	
}

function printjson($type,$msg)
{
	ob_flush();
ob_clean();

			$Errormsg=array (
  'type' => urlencode ($type),
  'msg' => urlencode ($msg),
); 
$php_json = json_encode($Errormsg); 
echo urldecode($php_json); 
exit;
}	
function SSetWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}	
