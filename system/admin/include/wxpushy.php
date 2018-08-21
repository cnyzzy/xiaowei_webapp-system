<?php
if($_SESSION['admin']['rightint']<4){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
$NOW = empty($params[0]) ? 1:($params[0]);
$ym=date('Ym',strtotime($NOW."01"));
$y=date('Y',strtotime($NOW."01"));
$m=date('m',strtotime($NOW."01"));
 if($y<2015){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '参数非法',
 ); }
$Array=array();
	    $sql = "SELECT * FROM wxarticle where sid='".$ym."' order by data desc";
		$Array = $DB->fetch_all_array($sql);