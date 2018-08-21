<?php
if($_SESSION['admin']['rightint']<5){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 
$Walking = new Walking($DB);
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
	$ARR=$Walking->ReceiveWalkingHDQ($id);
		if(!empty($ARR))$Msg->SendMsg('3','225','225','健步走-活动区',$ARR['number'],$ARR['data']."的步数被删除","很遗憾的通知您，您上传的步数:[".$ARR['step']."]已被管理员删除，请遵守相关活动规则。您可以联系公众号申诉或者重新参与活动。");		
		$Walking->DeleteWalkingHDQ($id);
		
		echo '1';	
		break;
	case "isopen":
	$id = $_POST['id'];
	$isok = $_POST['isok'];
		$Walking->OkWalkingHDQ($id,$isok);
		$ARR=$Walking->ReceiveWalkingHDQ($id);
		if(!empty($ARR)&&$ARR['isok']==1)$Msg->SendMsg('3','225','225','健步走-活动区',$ARR['number'],$ARR['data']."的步数审核通过啦","您上传的步数:[".$ARR['step']."]已被管理员审核通过，可以在".$ARR['data']."排行榜上看到自己啦，还不赶紧去看看？");
		if(!empty($ARR)&&$ARR['isok']==0)$Msg->SendMsg('3','225','225','健步走-活动区',$ARR['number'],$ARR['data']."的步数审核通过被取消","很遗憾，您上传的步数:[".$ARR['step']."]已被管理员修改为审核不通过，此成绩将在".$ARR['data']."排行榜上隐藏，您可以删除成绩再次提交。");
		echo '1';	
		break;
	case "edit":

		$id = $_POST['id'];
		if($id){
			$array = array(
				'number'	=> $_POST['number'],
			);
			if(isset($_POST['nickname']))$array['nickname']=$_POST['nickname'];
			if(isset($_POST['step']))$array['step']=$_POST['step'];
					if(isset($_POST['img']))$array['img']=$_POST['img'];
			if(isset($_POST['userimg']))$array['userimg']=$_POST['userimg'];
			if(isset($_POST['data']))$array['data']=$_POST['data'];
	
			$array['isok']=0;
			if(isset($_POST['isok']))$array['isok']=1;
			$Walking->EditWalkingHDQ($id, $array);
			//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],41,3,$id,$_SESSION['admin']['rightint']);
		}
		 header("Location:/admin/walking/edit/$id/1");
break;

		}
?>