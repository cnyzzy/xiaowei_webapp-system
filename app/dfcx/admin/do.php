<?php
if($_SESSION['admin']['rightint']<5){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 
$Notice = new Notice($DB);
if($_SESSION['admin']['rightint']<7&&$Action !=  $_SESSION['admin']['rightapp']){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],62,6,$appname,$_SESSION['admin']['rightint']);
switch($ch){
	case "delete":
	$id = $_POST['id'];
		$Notice->DNotice($id);
		echo '1';	
		break;
	case "isopen":
	$id = $_POST['id'];
	$isok = $_POST['isok'];
		$Notice->IsokNotice($id,$isok);
		echo '1';	
		break;
	case "edit":

		$id = $_POST['id'];
		if($id){
			$array = array(
				'title'	=> $_POST['title'],
			);
			if(isset($_POST['groupid']))$array['groupid']=$_POST['groupid'];
			if(isset($_POST['editor']))$array['editor']=$_POST['editor'];
			if(isset($_POST['dcontent']))$array['dcontent']=$_POST['dcontent'];
			if(isset($_POST['content']))$array['content']=$_POST['content'];
			$array['isok']=0;
			$array['istop']=0;
			if(isset($_POST['isok']))$array['isok']=1;
			if(isset($_POST['istop']))$array['istop']=1;
			$Notice->EditNotice($id, $array);
			//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],41,3,$id,$_SESSION['admin']['rightint']);
		}
		 header("Location:/admin/notice/edit/$id/1");
break;

	case "send":
			if(isset($_POST['groupid']))$groupid=$_POST['groupid'];
			if(isset($_POST['title']))$title=$_POST['title'];
			if(isset($_POST['editor']))$editor=$_POST['editor'];
			if(isset($_POST['dcontent']))$dcontent=$_POST['dcontent'];
			if(isset($_POST['content']))$content=$_POST['content'];
			if(isset($_POST['istop']))$istop=1;
		$Notice->SendNotice($groupid,$title,$editor,$dcontent,$content,$istop);
		header("Location:/admin/notice/");
break;	}
?>