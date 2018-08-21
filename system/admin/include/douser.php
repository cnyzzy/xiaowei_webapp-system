<?php
if($_SESSION['admin']['rightint']<7){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 
switch($ch){
	case "issseX":
	$id = $_POST['id'];
		if(EMPTY($_SESSION['admin']['ysquan'])&&$id=='2'){
			IF($Admin->GetRight($_SESSION['admin']['id'])>7)$_SESSION['admin']['ysquan']=1;
			
		}
		else{
			unset($_SESSION['admin']['ysquan']);
		}
		echo '1';	
		break;

	case "isdelete":
		$id = $_POST['id'];
		if($id){
		IF($Admin->GetRight($_SESSION['admin']['id'])>$Admin->GetRight($id)){$Admin->DeleteUser($id);
		$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],64,2,$id,$_SESSION['admin']['rightint']);}
		}
		echo '1';	
		break;
	case "edit":
		$id = $_POST['id'];
		if($id){
			$array = array(
				'username'	=> $_POST['username'],
			);
			if(isset($_POST['password'])&&$_POST['password'])$array['password']=$_POST['password'];
			if(isset($_POST['rightapp']))$array['rightapp']=$_POST['rightapp'];
			if(isset($_POST['name']))$array['name']=$_POST['name'];
			if(isset($_POST['rightint']))$rightint=$_POST['rightint'];
			if(isset($_POST['img']))$array['img']=$_POST['img'];
			if(isset($rightint)){
			$nowright=$Admin->GetRight($_SESSION['admin']['id']);
			IF($nowright['rightint']>$rightint&&$nowright>7)$array['rightint']=$_POST['rightint'];;
			}
		
			$Admin -> EditUser($id, $array);
					$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],64,3,$id,$_SESSION['admin']['rightint']);}

		
		if($_SESSION['admin']['id']==$id){
			$_SESSION['admin']=$Admin->GetUser($id);
			header("Location:./self");}ELSE{
		header("Location:./userd/".$id."/1");}
		break;
	case "add":
	$rightapp='0';
		$username	=$_POST['username'];
			if(isset($_POST['password']))$password=$_POST['password'];
			if(isset($_POST['apassword']))$apassword=$_POST['apassword'];
			if(isset($_POST['rightapp']))$rightapp=$_POST['rightapp'];
			if(isset($_POST['name']))$name=$_POST['name'];
			if(isset($_POST['rightint']))$rightintT=$_POST['rightint'];
			if(isset($_POST['img']))$img=$_POST['img'];
			if($password!=$apassword){
					$Errormsg=array (
  'error_type' => '提示',
  'msg' => '密码错误。',
); 
ErrorMsg($Errormsg);
			}
			if(isset($rightintT)){
			$nowright=$Admin->GetRight($_SESSION['admin']['id']);
			IF($nowright['rightint']>$rightintT&&$nowright>7){$rightint=$rightintT;
			}else{
				$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足。',
); 
ErrorMsg($Errormsg);
				
			}
			$Admin ->  AddUser($username,$password,$name,$img,$rightint,$rightapp);
					$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],64,4,$username,$_SESSION['admin']['rightint']);

		}
			header("Location:./user");
		break;	}
	
?>