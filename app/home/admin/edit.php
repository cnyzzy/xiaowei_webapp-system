<?php
empty($params[2]) ? $ok = '0' : $ok = $params[2];
$Mapp = new Mapp($DB);
$id = empty($bbb) ? 0:($bbb);
if($id!=0)$Array = $Mapp->ReceiveMapp($id);
if($id!=0)$ArrayG = $Mapp->ReceiveGroupA();
if(EMPTY($Array)){$Errormsg=array (
  'error_type' => '��ʾ',
  'msg' => 'û����������',
); 
ErrorMsg($Errormsg);	}
if($_SESSION['admin']['rightint']<7&&$Action !=  $_SESSION['admin']['rightapp']){$Errormsg=array (
  'error_type' => '��ʾ',
  'msg' => 'Ȩ�޲���',
); 
ErrorMsg($Errormsg);	}