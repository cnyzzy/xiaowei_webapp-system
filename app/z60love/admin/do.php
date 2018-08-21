<?php
if($_SESSION['admin']['rightint']<5){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 
$Z60Love = new Z60Love($DB);
if($_SESSION['admin']['rightint']<7&&(strtolower(substr($Action, 0, strlen($_SESSION['admin']['rightapp']))) !==strtolower($_SESSION['admin']['rightapp']))){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],62,6,$appname,$_SESSION['admin']['rightint']);
switch($ch){
	case "delete":
	$id = $_POST['id'];
		$Z60Love->DZ60Love($id);
		echo '1';	
		break;
	case "isopen":
	$id = $_POST['id'];
	$isok = $_POST['isok'];
		$Z60Love->IsokZ60Love($id,$isok);
		echo '1';	
		break;
	case "edit":

		$id = $_POST['id'];
		if($id){
			
			if(isset($_POST['stype']))$array['stype']=$_POST['stype'];
			if(isset($_POST['xy']))$array['xy']=$_POST['xy'];
			if(isset($_POST['xzb']))$array['xzb']=$_POST['xzb'];
			if(isset($_POST['name']))$array['name']=$_POST['name'];
			if(isset($_POST['nickname']))$array['nickname']=$_POST['nickname'];
			if(isset($_POST['swhere']))$array['swhere']=$_POST['where'];
			if(isset($_POST['content']))$array['content']=$_POST['content'];
			$array['isok']=0;

			if(isset($_POST['isok']))$array['isok']=1;

			$Z60Love->EditZ60Love($id, $array);
			//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],41,3,$id,$_SESSION['admin']['rightint']);
		}
		 header("Location:/admin/Z60Love/edit/$id/1");
break;

	case "add":
			if(isset($_POST['groupid']))$groupid=$_POST['groupid'];
			if(isset($_POST['title']))$title=$_POST['title'];
			if(isset($_POST['editor']))$editor=$_POST['editor'];
			if(isset($_POST['dcontent']))$dcontent=$_POST['dcontent'];
			if(isset($_POST['content']))$content=$_POST['content'];
			if(isset($_POST['istop']))$istop=1;
		$Z60Love->SendZ60Love($groupid,$title,$editor,$dcontent,$content,$istop);
		header("Location:/admin/Z60Love/");
break;	}
?>