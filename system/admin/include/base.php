<?php
if($_SESSION['admin']['rightint']<7){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
empty($params[0]) ? $ok = '0' : $ok = $params[0];
?>