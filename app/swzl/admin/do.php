<?php
if($_SESSION['admin']['rightint']<5){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 
$Swzl = new Swzl($DB);
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
	$ARR=$Swzl->ReceiveSwzlL($id);
		if(!empty($ARR))$Msg->SendMsg('3','335','335','失物招领',$ARR['number'],"[".$ARR['title']."]被删除","很遗憾的通知您，您提交的失物招领信息:[".$ARR['title']."]已被管理员删除。请遵守相关规则。您可以联系公众号申诉或者重新提交。");		
		$Swzl->DeleteSwzl($id);
		
		echo '1';	
		break;
	case "isopen":
	$id = $_POST['id'];
	$isok = $_POST['isok'];
		$Swzl->OkSwzl($id,$isok);
		$ARR=$Swzl->ReceiveSwzlL($id);
		if(!empty($ARR)&&$ARR['isok']==1)$Msg->SendMsg('3','335','335','失物招领',$ARR['number'],"[".$ARR['title']."]通过审核","您提交的失物招领信息:[".$ARR['title']."]已被管理员审核通过，所有人已经可以看到这条失物招领信息，一旦有所回复您将收到提示。受关心多和人气高的信息会在更前的位置显示，重要物品需要尽快推送的可以联系公众号。");		
		if(!empty($ARR)&&$ARR['isok']==2)$Msg->SendMsg('3','335','335','失物招领',$ARR['number'],"[".$ARR['title']."]被设置为完结","您的失物招领信息:[".$ARR['title']."]已被管理员设置为完结，只有您才能看到这条失物招领信息，您可以删除或者继续保留它。感谢使用本平台，有任何问题可以联系公众号。");
		if(!empty($ARR)&&$ARR['isok']==9)$Msg->SendMsg('3','335','335','失物招领',$ARR['number'],"[".$ARR['title']."]被隐藏","您的失物招领信息:[".$ARR['title']."]已被管理员设置为隐藏，任何人都不能看到这条失物招领信息，感谢使用本平台，有任何问题可以联系公众号。");

		echo '1';	
		break;
	case "edit":

$id = $_POST['id'];
	if($id){
			$array = array(
				'id'	=> $id,
			);
	}
			if(isset($_POST['title']))$array['title']=$_POST['title'];
			if(isset($_POST['stype']))$array['stype']=$_POST['stype'];
			if(isset($_POST['swhere']))$array['swhere']=$_POST['swhere'];
			if(isset($_POST['mwhere']))$array['mwhere']=$_POST['mwhere'];
			if(isset($_POST['tname']))$array['tname']=$_POST['tname'];
			if(isset($_POST['photo']))$photo=$_POST['photo'];
			if(isset($_POST['content']))$array['content']=$_POST['content'];
			if(isset($_POST['qq']))$array['qq']=$_POST['qq'];
			if(isset($_POST['mobile']))$array['mobile']=$_POST['mobile'];
				if(isset($_POST['xy']))$array['xy']=$_POST['xy'];
			if(isset($_POST['xzb']))$array['xzb']=$_POST['xzb'];
			if(isset($_POST['ll']))$array['ll']=$_POST['ll'];
			if(isset($_POST['pl']))$array['pl']=$_POST['pl'];
		if(isset($_POST['gx']))$array['gx']=$_POST['gx'];


			$ip=getIP();

			$array['isok']=0;
			if(isset($_POST['isok']))$array['isok']=1;
			$ID=$Swzl->EditSwzl($id, $array);
			//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],41,3,$id,$_SESSION['admin']['rightint']);
		
		 header("Location:/admin/swzl/edit/$id/1");
break;

		}
?>