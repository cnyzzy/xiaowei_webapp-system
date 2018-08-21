<?php
if($_SESSION['admin']['rightint']<5){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 
$Shiji = new Shiji($DB);
if($_SESSION['admin']['rightint']<7&&(strtolower(substr($Action, 0, strlen($_SESSION['admin']['rightapp']))) !==strtolower($_SESSION['admin']['rightapp']))){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}

//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],62,6,$appname,$_SESSION['admin']['rightint']);
switch($ch){
	case "delete":
	$id = $_POST['id'];
		$Shiji->DShijiMY($id);
		echo '1';	
		break;
	case "isopen":
	$id = $_POST['id'];
	$isok = $_POST['isok'];
		$Shiji->IsokShijiMY($id,$isok);
		if($isok=='1'){
		$Msg = new Msg($DB);
		$sql = "SELECT  * FROM Shiji_my WHERE id ='{$id}'";
		$row = $DB->once_fetch_array($sql);
					if(!empty($row['number'])&&!empty($row['from']))$Msg->SendMsg('3','401','401',"拾集",$row['number'],"[审核通过]您提交的内容已上线","您提交的内容(来自:".$row['from'].")已审核通过<br>感谢您的添砖加瓦<BR>请进入应用查看吧.<br><a href='".$arrInfo['url']."/shiji/my'>点我跳转</a>");		
		}
		echo '1';	
		break;
			case "isnono":
	$id = $_POST['id'];

		$Shiji->IsnoShijiMY($id,$isok);
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
			$Shiji->EditShiji($id, $array);
			//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],41,3,$id,$_SESSION['admin']['rightint']);
		}
		 header("Location:/admin/Shiji/edit/$id/1");
break;

	case "add":
			if(isset($_POST['groupid']))$groupid=$_POST['groupid'];
			if(isset($_POST['title']))$title=$_POST['title'];
			if(isset($_POST['editor']))$editor=$_POST['editor'];
			if(isset($_POST['dcontent']))$dcontent=$_POST['dcontent'];
			if(isset($_POST['content']))$content=$_POST['content'];
			if(isset($_POST['istop']))$istop=1;
		$Shiji->SendShiji($groupid,$title,$editor,$dcontent,$content,$istop);
		header("Location:/admin/Shiji/");
break;	}
?>