<?php
if($_SESSION['admin']['rightint']<7){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 
$Mjw = new Mjw($DB);

switch($ch){
	case "islock":
		$lock = $_POST['lock'];
		$id = $_POST['id'];
		if($id)$Mjw-> LockWxid($id, $lock);
		echo '1';	
		break;
	case "isstop":
		$stop = $_POST['stop'];
		$id = $_POST['id'];
		if($id)$Mjw-> StopWxid($id, $lock);
		echo '1';	
		break;
	case "edit":
		$id = $_POST['id'];
		if($id){
			$array = array(
				'name'	=> $_POST['name'],
			);
			if(isset($_POST['type']))$array['type']=$_POST['type'];
			if(isset($_POST['number']))$array['number']=$_POST['number'];
			if(isset($_POST['nickname']))$array['nickname']=$_POST['nickname'];
			if(isset($_POST['openid']))$array['openid']=$_POST['openid'];
			if(isset($_POST['img']))$array['img']=$_POST['img'];
			$array['isok']=0;
			$array['islock']=0;
			$array['stop']=0;
			if(isset($_POST['isok']))$array['isok']=1;
			if(isset($_POST['lock']))$array['islock']=1;
			if(isset($_POST['stop']))$array['stop']=1;
			$Mjw-> EditWxid($id, $array);
			$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],41,3,$id,$_SESSION['admin']['rightint']);
		}
		header("Location:./mwxidd/".$id);
		break;
	}
?>