<?php
define("cecharoot",ZSystem."/data/app/z60news");
if($_SESSION['admin']['rightint']<7&&(strtolower(substr($Action, 0, strlen($_SESSION['admin']['rightapp']))) !==strtolower($_SESSION['admin']['rightapp']))){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 
$Z60news = new Z60news($DB);
if($_SESSION['admin']['rightint']<7&&(strtolower(substr($Action, 0, strlen($_SESSION['admin']['rightapp']))) !==strtolower($_SESSION['admin']['rightapp']))){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],62,6,$appname,$_SESSION['admin']['rightint']);
switch($ch){
	case "delete":
	$id = $_POST['id'];
		$Z60news->DZ60news($id);
		echo '1';	
		break;
	case "isopen":
	$id = $_POST['id'];
	$isok = $_POST['isok'];
		$Z60news->IsokZ60news($id,$isok);
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
			if(isset($_POST['content']))$array['content']=stripslashes($_POST['content']);
			$array['isok']=0;
			$array['istop']=0;
			if(isset($_POST['isok']))$array['isok']=1;
			if(isset($_POST['istop']))$array['istop']=1;
					$arrcimg=array();
			if(isset($_POST['cimg1'])&&!empty($_POST['cimg1']))$arrcimg[]=$_POST['cimg1'];
			if(isset($_POST['cimg2'])&&!empty($_POST['cimg2']))$arrcimg[]=$_POST['cimg2'];
			if(isset($_POST['cimg3'])&&!empty($_POST['cimg3']))$arrcimg[]=$_POST['cimg3'];

	if(!empty($arrcimg))
			{

				$imgjson=json_encode($arrcimg);
			}else{
			$img=array();

		@preg_match_all('/src="(.*)"/iUs', $array['content'], $out);
$imgARR=$out[1];

if (count($imgARR)) {
$imgnum=0;
foreach((array)$imgARR as $key=>$loopChild)
 {
	 UNSET($result);
	$result = @myGetImageSize($loopChild);
	if($result&&$result['width']>110&&$result['height']>10)
	{
		$imgnum++;
		$img[]=$loopChild;
	}
	if($imgnum>4)BREAK;
 }
}
if(count($img)==2) $img=array_slice($img, 0, 1);
if(count($img)>2) $img=array_slice($img, 0, 3);
if (count($img)==0)$img[]="/app/60app/model/images/top2.jpg";	



		$imgjson = addslashes(json_encode($img));
			}
		$array['img']=$imgjson;	
			$Z60news->EditZ60news($id, $array);
			//$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],41,3,$id,$_SESSION['admin']['rightint']);
		}
		header("Location:/admin/Z60news/edit/$id/1");
break;

	case "add":
			if(isset($_POST['groupid']))$groupid=$_POST['groupid'];
			if(isset($_POST['title']))$title=$_POST['title'];
			if(isset($_POST['editor']))$editor=$_POST['editor'];
			if(isset($_POST['dcontent']))$dcontent=$_POST['dcontent'];
			if(isset($_POST['content']))$content=$_POST['content'];
			if(isset($_POST['istop']))$istop=1;
		$Z60news->SendZ60news($groupid,$title,$editor,$dcontent,$content,$istop);
		header("Location:/admin/Z60news/");
break;
	}

?>