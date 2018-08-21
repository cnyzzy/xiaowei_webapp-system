<?php
if($_SESSION['admin']['rightint']<5){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}

define("cecharoot",ZSystem."/data/app/cjhd");


if($_SESSION['admin']['rightint']<7&&$Action !=  $_SESSION['admin']['rightapp']){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
$Cjhd = new Cjhd($DB);
$id = empty($bbb) ? 0:($bbb);
if($id!=0)$Array = $Cjhd ->OnNumA($id);
if(EMPTY($Array)){$arr['no']='1'; 
echo json_encode($arr);	
exit();	}
$num=$Array;
$num=str_pad($num,4,"0",STR_PAD_LEFT);   
$arr['num']=$num; 
echo json_encode($arr);	
exit();
?>