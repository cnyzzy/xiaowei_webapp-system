<?php
if($_SESSION['admin']['rightint']<5){$Errormsg=array (
  'error_type' => '��ʾ',
  'msg' => 'Ȩ�޲���',
); 
ErrorMsg($Errormsg);	}
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 
$Z60Zw = new Z60Zw($DB);
if($_SESSION['admin']['rightint']<7&&(strtolower(substr($Action, 0, strlen($_SESSION['admin']['rightapp']))) !==strtolower($_SESSION['admin']['rightapp']))){$Errormsg=array (
  'error_type' => '��ʾ',
  'msg' => 'Ȩ�޲���',
); 
ErrorMsg($Errormsg);	}

//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],62,6,$appname,$_SESSION['admin']['rightint']);
switch($ch){
	case "delete":
	$id = $_POST['id'];
		$Z60Zw->DZ60Zw($id);
		echo '1';	
		break;
	case "isopen":
	$id = $_POST['id'];
	$isok = $_POST['isok'];
		$Z60Zw->IsokZ60Zw($id,$isok);
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
			$Z60Zw->EditZ60Zw($id, $array);
			//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],41,3,$id,$_SESSION['admin']['rightint']);
		}
		 header("Location:/admin/Z60Zw/edit/$id/1");
break;

	case "add":
			if(isset($_POST['groupid']))$groupid=$_POST['groupid'];
			if(isset($_POST['title']))$title=$_POST['title'];
			if(isset($_POST['editor']))$editor=$_POST['editor'];
			if(isset($_POST['dcontent']))$dcontent=$_POST['dcontent'];
			if(isset($_POST['content']))$content=$_POST['content'];
			if(isset($_POST['istop']))$istop=1;
		$Z60Zw->SendZ60Zw($groupid,$title,$editor,$dcontent,$content,$istop);
		header("Location:/admin/Z60Zw/");
break;	}
?>>