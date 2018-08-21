<?php
if($_SESSION['admin']['rightint']<7){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 
$Mjw = new Mjw($DB);

switch($ch){
	case "isok":
		$okok = $_POST['okok'];
		$id = $_POST['id'];
		if($id)$Mjw-> OkJwinfo($id, $okok);
		echo '1';	
		break;
	case "isdelete":
		$id = $_POST['id'];
		if($id)$Mjw-> DeleteJwinfo($id);
		$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],43,2,$id,$_SESSION['admin']['rightint']);
		echo '1';	
		break;
	case "edit":
		$id = $_POST['id'];
		if($id){
			$array = array(
				'xm'	=> $_POST['xm'],
			);
			if(isset($_POST['xb']))$array['xb']=$_POST['xb'];
			if(isset($_POST['number']))$array['number']=$_POST['number'];
			if(isset($_POST['szj']))$array['szj']=$_POST['szj'];
			if(isset($_POST['xy']))$array['xy']=$_POST['xy'];
			if(isset($_POST['zy']))$array['zy']=$_POST['zy'];
			if(isset($_POST['xzy']))$array['xzy']=$_POST['xzy'];
			if(isset($_POST['rxsj']))$array['rxsj']=$_POST['rxsj'];
			$array['isok']=0;
			if(isset($_POST['isok']))$array['isok']=1;
		unset($array['id']);
			unset($array['do']);
			$Mjw-> EditJwinfo($id, $array);
			$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],43,3,$id,$_SESSION['admin']['rightint']);
		}
		header("Location:./minfod/".$id."/1");
		break;
	}
?>