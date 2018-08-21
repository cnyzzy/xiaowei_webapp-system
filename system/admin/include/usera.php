<?php
$Admin = new Admin($DB);
$nowright=$Admin->GetRight($_SESSION['admin']['id']);
IF($nowright<=7){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足。',
); 
ErrorMsg($Errormsg);	}