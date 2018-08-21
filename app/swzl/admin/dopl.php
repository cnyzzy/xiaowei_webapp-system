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
	 $AR=$Swzl->ReceiveSwzlRL($id);
	$ARR=$Swzl->ReceiveSwzlL($AR['sid']);
		if(!empty($ARR))$Msg->SendMsg('3','335','335','失物招领',$AR['number'],"您在[".$ARR['title']."]中的评论被删除","很遗憾的通知您，您在失物招领信息: [".$ARR['title']."] 中所发的一条评论已被管理员删除。请遵守相关评论规则，多次违规可能导致账号封禁。您可以联系公众号申诉或者重新评论。");		
		if(!empty($ARR))$Msg->SendMsg('3','335','335','失物招领',$ARR['number'],"[".$ARR['title']."]中的评论被删除","很遗憾的通知您，您失物招领信息: [".$ARR['title']."] 中 ".$AR['name']." 所发的一条评论已被管理员删除。请注意管理自己信息下的评论，多次异常可能导致整个失物招领信息被删除。您可以联系公众号申诉。");		
		$Swzl->DeleteSwzlRe($id);
		
		echo '1';	
		break;
	case "isopen":
	$id = $_POST['id'];
	$isok = $_POST['isok'];
		$Swzl->OkSwzlR($id,$isok);
			 $AR=$Swzl->ReceiveSwzlRL($id);
	$ARR=$Swzl->ReceiveSwzlL($AR['sid']);
		if(!empty($ARR)&&$ARR['isok']==1)$Msg->SendMsg('3','335','335','失物招领',$ARR['number'],"[".$ARR['title']."]中的评论通过审核","您的失物招领信息: [".$ARR['title']."] 中 ".$AR['name']." 所发的一条评论已被管理员审核通过，请及时查看哦");		
		if(!empty($ARR)&&$ARR['isok']==0)$Msg->SendMsg('3','335','335','失物招领',$ARR['number'],"[".$ARR['title']."]中的评论被设置为隐藏","您的失物招领信息: [".$ARR['title']."] 中 ".$AR['name']." 所发的一条评论已被管理员设置为隐藏，请注意管理自己信息下的评论，有任何问题可以联系公众号。");
		if(!empty($ARR)&&$ARR['isok']==0)$Msg->SendMsg('3','335','335','失物招领',$AR['number'],"您在[".$ARR['title']."]中的评论被隐藏","很遗憾的通知您，您在失物招领信息: [".$ARR['title']."] 中所发的一条评论已被管理员隐藏。请遵守相关评论规则。您可以联系公众号申诉或者重新评论。");		
		if(!empty($ARR)&&$ARR['isok']==1)$Msg->SendMsg('3','335','335','失物招领',$AR['number'],"您在[".$ARR['title']."]中的评论审核通过","您在失物招领信息: [".$ARR['title']."] 中所发的一条评论已被管理员审核通过，感谢您的参与。");		

		echo '1';	
		break;
	case "edit":

$id = $_POST['id'];
	if($id){
			$array = array(
				'id'	=> $id,
			);
	}
			if(isset($_POST['sid']))$array['sid']=$_POST['sid'];
			if(isset($_POST['name']))$array['name']=$_POST['name'];
			if(isset($_POST['number']))$array['number']=$_POST['number'];
			if(isset($_POST['img']))$array['img']=$_POST['img'];
			if(isset($_POST['reply']))$array['reply']=$_POST['reply'];
			if(isset($_POST['editreply']))$array['editreply']=$_POST['editreply'];

			$array['isok']=0;
			if(isset($_POST['isok']))$array['isok']=1;
			$Swzl->EditReply($id, $array);
			//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],41,3,$id,$_SESSION['admin']['rightint']);
		
		 header("Location:/admin/swzl/editpl/$id/1");
break;

		}
?>