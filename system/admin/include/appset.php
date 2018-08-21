<?php
if($_SESSION['admin']['rightint']<6){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
$Admin = new Admin($DB);
$AppList = $Admin->ReadAppList();