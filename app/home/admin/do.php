<?php
if($_SESSION['admin']['rightint']<5){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 
$Mapp = new Mapp($DB);

if($_SESSION['admin']['rightint']<7&&$Action !=  $_SESSION['admin']['rightapp']){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],62,6,$appname,$_SESSION['admin']['rightint']);
switch($ch){
	case "delete":
	$appid = $_POST['appid'];
		$Mapp->DeleteMapp($appid);
		echo '1';	
		break;
	case "isopen":
	$appid = $_POST['appid'];
	$isok = $_POST['isok'];
		$Mapp->ViewMapp($appid,$isok);
		echo '1';	
		break;
	case "edit":
	
			$id = $_POST['id'];
		if($id){
			$array = array(
				'name'	=> $_POST['name'],
			);
			if(isset($_POST['groupid']))$array['groupid']=$_POST['groupid'];
			$arraygroup=$Mapp->ReceiveMappG($array['groupid']);
			$array['groupname']=$arraygroup['groupname'];
			if(isset($_POST['ico']))$array['ico']=$_POST['ico'];
			if(isset($_POST['url']))$array['url']=$_POST['url'];
			if(isset($_POST['sortid']))$array['sortid']=$_POST['sortid'];
		$Mapp->EditMapp($id,$array);}
		 header("Location:/admin/home/");
break;
case "editg":
	$appid = $_POST['appid'];
	$name = $_POST['appname'];
		$Mapp->EditMappGroupA($appid,$name);
		 echo '1';
break;
	case "add":
	
			$name	= $_POST['name'];
			if(isset($_POST['groupname']))$groupname=$_POST['groupname'];
			$arraygroup=$Mapp->ReceiveMappGa($groupname);
			if(empty($arraygroup['groupname'])){
				$groupid=$Mapp->MappGroupNumA()+1;
			}else{
			$groupid=$arraygroup['groupid'];}
			if(isset($_POST['ico']))$ico=$_POST['ico'];
			if(isset($_POST['url']))$url=$_POST['url'];
			if(isset($_POST['sortid']))$sortid=$_POST['sortid'];
		$Mapp->AddMapp($groupid,$groupname,$name,$ico,$url,$sortid,'0');
		header("Location:/admin/home/");
break;	}
?>