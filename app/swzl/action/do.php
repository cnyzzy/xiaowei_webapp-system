<?php
empty($params[0]) ? $LId = '1' : $LId = $params[0];
$Swzl = new Swzl($DB);
IF($LId == 'delete'){
$id = $_POST['id'];
$Array = $Swzl-> ReceiveSwzl($id);
if($Array['number']!=$number||empty($Array))
{
			$arr['status']=0; 
$arr['content']="非法操作"; 
echo json_encode($arr);	
exit();
}
			$ID=$Swzl->DeleteSwzl($id);
			if(!empty($ID)){
				if(!empty($photo)) deleteAll($dir);
		  $arr['status']=1; 
$arr['content']="删除成功"; 
$arr['id']=$ID; 
echo json_encode($arr);	
exit(); 
	  
 }else{
$arr['status']=0; 
$arr['content']="数据库故障"; 
echo json_encode($arr);	
exit(); 
 }
}
IF($LId == 'over'){
$id = $_POST['id'];
$Array = $Swzl-> ReceiveSwzl($id);
if($Array['number']!=$number||empty($Array))
{
			$arr['status']=0; 
$arr['content']="非法操作"; 
echo json_encode($arr);	
exit();
}
			$ID=$Swzl->OkSwzl($id,'2');
			if(!empty($ID)){
				if(!empty($photo)) deleteAll($dir);
		  $arr['status']=1; 
$arr['content']="完结成功"; 
$arr['id']=$ID; 
echo json_encode($arr);	
exit(); 
	  
 }else{
$arr['status']=0; 
$arr['content']="数据库故障"; 
echo json_encode($arr);	
exit(); 
 }
}
IF($LId == 'update'){
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
			$ip=getIP();

	switch ($type)
{
case 1:
$sql2 = "SELECT * FROM jwinfo WHERE number ='{$number}' and isok=1";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
		$xy=$info['xy'];
		$xzb=$info['xzb'];
break;
case 2://无数据
$sql2 = "SELECT * FROM ghzl WHERE  number ='{$number}'";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
				$xy=$info['dname'];
				$xzb=$info['dnumber'];
break;
}
			if(empty($xy)||empty($xzb)){
			$arr['status']=0; 
$arr['content']="资料登记错误"; 
echo json_encode($arr);	
exit();
			}
			if(!empty($photo)){
							$dir=ZRoot.'/temp/uploadimg/'.$number.'/';
			    $savepath = $dir.$photo; 
 if(file_exists($savepath)) {
	 $dir2=ZSystem.'/data/app/swzl/';
if (!is_dir($dir2)) mkdir($dir2);
	 $dir2=ZSystem.'/data/app/swzl/uploadimg/';
	 if (!is_dir($dir2)) mkdir($dir2);
	 $dir2=ZSystem.'/data/app/swzl/uploadimg/'.$number.'/';
	 if (!is_dir($dir2)) mkdir($dir2);
	 $photonew=md5($number.TIME()).'.jpge';
	 copy($savepath,$dir2.$photonew);
	  if(file_exists($dir2.$photonew)) {
	  unlink($savepath);
	  $array['img']=$arrInfo['url']."/system/data/app/swzl/uploadimg/".$number."/".$photonew;
			}

	else{
		  $arr['status']=0; 
$arr['content']="图片转移失败"; 
echo json_encode($arr);	
exit(); 
	  }
 }else{
$arr['status']=0; 
$arr['content']="上传图片丢失"; 
echo json_encode($arr);	
exit(); 
			}}
			$ID=$Swzl->EditSwzl($id, $array);
			if(!empty($ID)){
				if(!empty($photo)) deleteAll($dir);
		  $arr['status']=1; 
$arr['content']="提交成功"; 
$arr['id']=$ID; 
echo json_encode($arr);	
exit(); 
	  
 }else{
$arr['status']=0; 
$arr['content']="数据库故障"; 
echo json_encode($arr);	
exit(); 
 }
}
IF($LId == 'add'){
			if(isset($_POST['title']))$title=$_POST['title'];
			if(isset($_POST['stype']))$stype=$_POST['stype'];
			if(isset($_POST['swhere']))$swhere=$_POST['swhere'];
			if(isset($_POST['mwhere']))$mwhere=$_POST['mwhere'];
			if(isset($_POST['tname']))$tname=$_POST['tname'];
			if(isset($_POST['photo']))$photo=$_POST['photo'];
			if(isset($_POST['content']))$content=$_POST['content'];
			if(isset($_POST['qq']))$qq=$_POST['qq'];
			if(isset($_POST['mobile']))$mobile=$_POST['mobile'];
			$ip=getIP();
			if(empty($title)||empty($name)||empty($number)||empty($tname)||empty($stype)||empty($swhere)||empty($mwhere)||empty($photo)||empty($content)||empty($qq)||empty($mobile)||empty($ip))
			{
			$arr['status']=0; 
$arr['content']="填写错误"; 
echo json_encode($arr);	
exit();
			}
	switch ($type)
{
case 1:
$sql2 = "SELECT * FROM jwinfo WHERE number ='{$number}' and isok=1";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
		$xy=$info['xy'];
		$xzb=$info['xzb'];
break;
case 2://无数据
$sql2 = "SELECT * FROM ghzl WHERE  number ='{$number}'";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
				$xy=$info['dname'];
				$xzb=$info['dnumber'];
break;
}
			if(empty($xy)||empty($xzb)){
			$arr['status']=0; 
$arr['content']="资料登记错误"; 
echo json_encode($arr);	
exit();
			}
			$dir=ZRoot.'/temp/uploadimg/'.$number.'/';
			    $savepath = $dir.$photo; 
 if(file_exists($savepath)) {
	 $dir2=ZSystem.'/data/app/swzl/';
if (!is_dir($dir2)) mkdir($dir2);
	 $dir2=ZSystem.'/data/app/swzl/uploadimg/';
	 if (!is_dir($dir2)) mkdir($dir2);
	 $dir2=ZSystem.'/data/app/swzl/uploadimg/'.$number.'/';
	 if (!is_dir($dir2)) mkdir($dir2);
	 $photonew=md5($number.TIME()).'.jpge';
	 copy($savepath,$dir2.$photonew);
	  if(file_exists($dir2.$photonew)) {
	  unlink($savepath);
	  $photo=$arrInfo['url']."/system/data/app/swzl/uploadimg/".$number."/".$photonew;
	 
	  }else{
		  $arr['status']=0; 
$arr['content']="图片转移失败"; 
echo json_encode($arr);	
exit(); 
	  }
 }else{
$arr['status']=0; 
$arr['content']="上传图片丢失"; 
echo json_encode($arr);	
exit(); 
 }
			$ID=$Swzl->SendSwzl($title,$xy,$xzb,$name,$number,$tname,$stype,$swhere,$mwhere,$photo,$content,$qq,$mobile,$ip);
			if(!empty($ID)){
				 deleteAll($dir);
		  $arr['status']=1; 
$arr['content']="提交成功"; 
$arr['id']=$ID; 
echo json_encode($arr);	
exit(); 
	  
 }else{
$arr['status']=0; 
$arr['content']="数据库故障"; 
echo json_encode($arr);	
exit(); 
 }
}

IF($LId == 'addreply'){
	empty($_POST['sid']) ? $sid = '0' : $sid = trim($_POST['sid']);
	empty($_POST['content']) ? $content = '0' : $content = trim($_POST['content']);
	if($sid!='0'){
		$array=array(
		'content'=>$content,
		);
		$Swzl->AddReply($sid,$name,$number,$img,$content);
		ECHO (json_encode($array));
	}else{
	$array=array(
		'content'=>'[NO SEND]',
		);ECHO (json_encode($array));}
}
IF($LId == 'reply'){
	empty($_POST['id']) ? $id = '0' : $id = trim($_POST['id']);
	empty($_POST['content']) ? $content = '0' : $content = trim($_POST['content']);
	if($id!='0'){
		$array2=array(
		'editreply'=>$content,
		);
		$Swzl->EditReply($id,$array2);
		$loopChild=$Swzl->ReceiveSwzl($id);
		$array=array(
		'reply'=>$content,
		'time'=>smartDate($loopChild['addtime'], 'y-m-d H:i'),
		);
		
		ECHO (json_encode($array));
	}else{
	$array=array(
		'content'=>'[NO SEND]',
		);ECHO (json_encode($array));}
}
IF($LId == 'dereply'){
	empty($_POST['id']) ? $id = '0' : $id = trim($_POST['id']);
if($id!='0'){
$Swzl->DeleteSwzlRe($id);	
echo '1';
}
}
IF($LId == 'like'){
	empty($_POST['id']) ? $id = '0' : $id = trim($_POST['id']);
	$num = $Swzl->SwzlLikeNumA($id,$number);
if($id!='0'&&$num==0){
$Swzl->AddGxSwzlRe($id,$number);	
echo '1';
}
}
IF($LId == 'relike'){
	empty($_POST['id']) ? $id = '0' : $id = trim($_POST['id']);
if($id!='0'){
$Swzl->DGxSwzlRe($id,$number);	
echo '1';
}
}
function deleteAll($path) {
    $op = dir($path);
    while(false != ($item = $op->read())) {
        if($item == '.' || $item == '..') {
            continue;
        }
        if(is_dir($op->path.'/'.$item)) {
            deleteAll($op->path.'/'.$item);
            rmdir($op->path.'/'.$item);
        } else {
            unlink($op->path.'/'.$item);
        }
    
    }   
}