<?php
if($_SESSION['admin']['rightint']<5){$Errormsg=array (
  'error_type' => '��ʾ',
  'msg' => 'Ȩ�޲���',
); 
ErrorMsg($Errormsg);	}
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 


if($_SESSION['admin']['rightint']<7&&$Action !=  $_SESSION['admin']['rightapp']){$Errormsg=array (
  'error_type' => '��ʾ',
  'msg' => 'Ȩ�޲���',
); 
ErrorMsg($Errormsg);	}
//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],62,6,$appname,$_SESSION['admin']['rightint']);
switch($ch){
	case "deletet":
	$id = $_POST['id'];
$sql = "DELETE FROM rg_question WHERE id ='{$id}'";
		$row = $DB->query($sql);
		echo '1';	
		break;
	case "deleteo":
	$id = $_POST['id'];
$sql = "DELETE FROM rg_option WHERE id ='{$id}'";
		$row = $DB->query($sql);
		echo '1';	
		break;
case "editt":
	$id = $_POST['id'];
	$name = $_POST['name'];
$Arr = array(
				'title'	=> $name,
			);
		$row = $DB->updateArr('rg_question',$Arr,"WHERE id ='{$id}'");
		 echo '1';
break;
case "edito":
	$id = $_POST['id'];
	$name = $_POST['name'];
$Arr = array(
				'content'	=> $name,
			);
		$row = $DB->updateArr('rg_option',$Arr,"WHERE id ='{$id}'");
		 echo '1';
break;
	case "addt":
	
			$name	= $_POST['name'];
		if($name){
			$messageid = $DB->create('rg_question',array(

				'title'		=> $name,
				'appid'	=> '1',
			));

		} echo '1';
break;	
	case "addo":
	
			$name	= $_POST['name'];
			$pid	= $_POST['id'];
		if($name){
			$messageid = $DB->create('rg_option',array(
'pid'		=> $pid,
				'content'		=> $name,
				'appid'	=> '1',
			));

		} echo '1';
break;
}
?>