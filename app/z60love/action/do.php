<?php
empty($params[0]) ? $LId = '1' : $LId = $params[0];
$Z60Love = new Z60Love($DB);
IF($LId == 'fimg'){
	empty($_POST['id']) ? $id = '0' : $id = trim($_POST['id']);
$Array = $Z60Love-> ReceiveZ60Love($id);
if(!empty($Array)){
$Wx = new Wx();
$openidD=$Array['openid'];
if(!empty($openidD)){
	$arrWx = $Wx->GetUserInfo($openidD);

	if($Array['headimg']!=$arrWx['headimgurl']&&!empty($arrWx['headimgurl']))
	{
		$newarr=array(

 'headimg'=>$arrWx['headimgurl'],
 );
		$DB->updateArr('z60love',$newarr,"where id ='{$id}'");
				$array=array(
		'img'=>$arrWx['headimgurl']
		);
		
		echojson($array);
	}ELSE{
			$array=array(
		'isok'=>'NOCHANGE',	'img'=>$arrWx['headimgurl']
		);
		
		echojson($array);
	}

}
}
}
IF($LId == 'delete'){
$id = $_POST['id'];
$Array = $Z60Love-> ReceiveZ60Love($id);
if($Array['number']!=$number||empty($Array))
{
			$arr['status']=0; 
$arr['content']="非法操作"; 
echo json_encode($arr);	
exit();
}
			$ID=$Z60Love->DeleteZ60Love($id);
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


IF($LId == 'add'){
$nickname=$_SESSION['wx']['nickname'];
		$openid=$_SESSION['wx']['openid'];
			if(isset($_POST['where']))$where=$_POST['where'];
			if(isset($_POST['content']))$content=$_POST['content'];
			$ip=getIP();
			if(empty($content)||empty($ip))
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
		$stype=1;
break;
case 2://无数据
$sql2 = "SELECT * FROM ghzl WHERE  number ='{$number}'";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
				$xy=$info['dname'];
				$xzb=$info['dnumber'];
				$stype=2;
break;
case 3:
	if(isset($_POST['stype']))$stype=$_POST['stype'];
			$xy='NO';
				$xzb='NO';
}
			if(empty($xy)||empty($xzb)){
			$arr['status']=0; 
$arr['content']="资料登记错误"; 
echo json_encode($arr);	
exit();
			}

	 

			$ID=$Z60Love->SendZ60Love($xy,$xzb,$name,$number,$nickname,$openid,$stype,$where,$ip,$img,$content);
			if(!empty($ID)){
		
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
		$Z60Love->AddReply($sid,$name,$number,$img,$content);
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
		$Z60Love->EditReply($id,$array2);
		$loopChild=$Z60Love->ReceiveZ60Love($id);
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
$Z60Love->DeleteZ60LoveRe($id);	
echo '1';
}
}

IF($LId == 'like'){
	empty($_POST['id']) ? $id = '0' : $id = trim($_POST['id']);
	$num = $Z60Love->LikeNumA($id,$number);
if($id!='0'&&$num==0){
$Z60Love->AddLike($id,$number);	
echo '1';
}
}
IF($LId == 'unlike'){
	empty($_POST['id']) ? $id = '0' : $id = trim($_POST['id']);
if($id!='0'){
$Z60Love->DLike($id,$number);	
echo '1';
}}
IF($LId == 'view'){
	empty($_POST['id']) ? $id = '1' : $id = trim($_POST['id']);
$NoticeNum=$Z60Love->Z60LoveGroupNum();

if($NoticeNum!=0){
$NoticeArray1=$Z60Love->ReceiveNewZ60loveA($NoticeNum,10,$id);
foreach ($NoticeArray1 as $key=>$arr) { 
foreach ($arr as $key2=>$arr2) { 
if(is_numeric($key2))unset($NoticeArray1[$key][$key2]);
}
	$num = $Z60Love->LikeNumA($arr['id'],$number);
if($arr['id']!='0'&&$num!=0)$NoticeArray1[$key]['iszan']=1;
if(!empty($NoticeArray1[$key]['addtime'])&&empty($NoticeArray1[$key]['swhere']))$NoticeArray1[$key]['swhere']=smartDate($NoticeArray1[$key]['addtime'], 'Y-m-d H:i');
unset($NoticeArray1[$key]['openid']);
}
}
if(empty($NoticeArray1))$NoticeArray1['zy']=9;
echojson($NoticeArray1);	
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

function echojson($ARRAR)
{
	ob_flush();
ob_clean();
echo json_encode($ARRAR); EXIT;
}