<?php
$Admin = new Admin($DB);
$nowright=$Admin->GetRight($_SESSION['admin']['id']);
IF($nowright<=7){$Errormsg=array (
  'error_type' => '��ʾ',
  'msg' => 'Ȩ�޲��㡣',
); 
ErrorMsg($Errormsg);	}