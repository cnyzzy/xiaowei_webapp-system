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
	$ARR=$Walking->ReceiveWalkingZCQ($id);
		if(!empty($ARR))$Msg->SendMsg('3','225','225','健步走-早操区',$ARR['number'],$ARR['data']."的步数被删除","很遗憾的通知您，您上传的步数:[".$ARR['step']."]已被管理员删除，请遵守相关活动规则。您可以联系公众号申诉或者重新参与活动。");		
		$Walking->DeleteWalkingZCQ($id);
		
		echo '1';	
		break;
	case "isopen":
	$id = $_POST['id'];
	$isok = $_POST['isok'];
		$Walking->OkWalkingZCQ($id,$isok);
		$ARR=$Walking->ReceiveWalkingZCQ($id);
		if(!empty($ARR)&&$ARR['isok']==1)$Msg->SendMsg('3','225','225','健步走-早操区',$ARR['number'],$ARR['data']."的步数审核通过啦","您上传的步数:[".$ARR['step']."]已被管理员设置为审核通过，可以在".$ARR['data']."排行榜上看到自己啦，还不赶紧去看看？");
		if(!empty($ARR)&&$ARR['isok']==0)$Msg->SendMsg('3','225','225','健步走-早操区',$ARR['number'],$ARR['data']."的步数审核不通过","很遗憾，您上传的步数:[".$ARR['step']."]已被管理员修改为审核不通过，此成绩将在".$ARR['data']."排行榜上隐藏，您可以删除成绩再次提交。请遵守相关活动规定。");
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
			if(isset($_POST['szj']))$array['szj']=$_POST['szj'];
			if(isset($_POST['xy']))$array['xy']=$_POST['xy'];
			if(isset($_POST['xzy']))$array['xzy']=$_POST['xzy'];
			if(isset($_POST['name']))$array['name']=$_POST['name'];
			$array['isok']=0;
			if(isset($_POST['isok']))$array['isok']=1;
			$Walking->EditWalkingZCQ($id, $array);
			//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],41,3,$id,$_SESSION['admin']['rightint']);
		}
		 header("Location:/admin/walkingzc/edit/$id/1");
break;

		}
?>