<?php
if($_SESSION['admin']['rightint']<5){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 
$Msg = new Msg($DB);
if($_SESSION['admin']['rightint']<7&&$Action !=  $_SESSION['admin']['rightapp']){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],62,6,$appname,$_SESSION['admin']['rightint']);
switch($ch){
	case "delete":
	$id = $_POST['id'];
		$Msg->DMsg($id);
		echo '1';	
		break;
	case "isopen":
	$id = $_POST['id'];
	$isok = $_POST['isok'];
		$Msg->IsokMsg($id,$isok);
		echo '1';	
		break;
	case "edit":

		$id = $_POST['id'];
		if($id){
			$array = array(
				'title'	=> $_POST['title'],
			);
			if(isset($_POST['msgtype']))$array['msgtype']=$_POST['msgtype'];
			if(isset($_POST['fromnumber']))$array['fromnumber']=$_POST['fromnumber'];
					if(isset($_POST['tonumber']))$array['tonumber']=$_POST['tonumber'];
			if(isset($_POST['fromname']))$array['fromname']=$_POST['fromname'];
			if(isset($_POST['content']))$array['content']=$_POST['content'];
			if(isset($_POST['tourl']))$array['tourl']=$_POST['tourl'];
			$array['isok']=0;
			$array['isview']=0;
			if(isset($_POST['isok']))$array['isok']=1;
			if(isset($_POST['isview']))$array['isview']=1;
			$Msg->EditMsg($id, $array);
			//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],41,3,$id,$_SESSION['admin']['rightint']);
		}
		 header("Location:/admin/msg/edit/$id/1");
break;

	case "send":
	$title= $_POST['title'];
	$tourl='';
			if(isset($_POST['msgtype']))$msgtype=$_POST['msgtype'];
			if(isset($_POST['fromnumber']))$fromnumber=$_POST['fromnumber'];
			if(isset($_POST['tonumber']))$tonumber=$_POST['tonumber'];
			if(isset($_POST['fromname']))$fromname=$_POST['fromname'];
			if(isset($_POST['content']))$content=$_POST['content'];
			if(isset($_POST['tourl']))$tourl=$_POST['tourl'];
			$isok=0;
			$isview=0;
			if(isset($_POST['isok']))$isok=1;
			if(isset($_POST['isview']))$isview=1;
		$Msg->SendMsg($msgtype,$groupid,$fromnumber,$fromname,$tonumber,$title,$content,$tourl);
		header("Location:/admin/msg/");
break;	}
?>