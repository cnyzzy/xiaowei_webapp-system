<?php
define('RRXOOT',ZSystem.'/data/app/shiji/'.$number.'/');
empty($params[0]) ? $LId = '1' : $LId = $params[0];
$Shiji = new Shiji($DB);

IF($LId == 'delete'){
$id = $_POST['id'];
$Array = $Shiji-> ReceiveShiji($id);
if($Array['number']!=$number||empty($Array))
{
			$arr['status']=0; 
$arr['content']="非法操作"; 
echo json_encode($arr);	
exit();
}
			$ID=$Shiji->DeleteShiji($id);
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
			if(isset($_POST['typedata']))$typedata=mysql_real_escape_string ($_POST['typedata']);
			if(isset($_POST['content']))$content=mysql_real_escape_string ($_POST['content']);
			if(isset($_POST['from']))$from=mysql_real_escape_string ($_POST['from']);
	
			if(empty($content)||empty($from)||empty($typedata))
			{
			$arr['type']='error'; 
$arr['msg']="填写错误"; 
echo json_encode($arr);	
exit();
			}
		if(strlen($content)>200){
			$arr['type']='error'; 
$arr['msg']="文字过多"; 
echo json_encode($arr);	
exit();
			}
if(strlen($from)>200){
			$arr['type']='error'; 
$arr['msg']="来源过多"; 
echo json_encode($arr);	
exit();
			}
			$typemode = array("a", "b", "c", "d","e","f","g","h");

if (!in_array($typedata, $typemode))
	 {
			$arr['type']='error'; 
$arr['msg']="类型错误"; 
echo json_encode($arr);	
exit();
			}

			$ID=$Shiji->SendShijiMY($content,$typedata,$from,$nickname,$number);
			if(!empty($ID)){
		
		  $arr['type']='ok'; 
$arr['msg']="提交成功"; 
$arr['id']=$ID; 
echo json_encode($arr);	
exit(); 
	  
 }else{
$arr['status']='error'; 
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
		$Shiji->AddReply($sid,$name,$number,$img,$content);
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
		$Shiji->EditReply($id,$array2);
		$loopChild=$Shiji->ReceiveShiji($id);
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
$Shiji->DeleteShijiRe($id);	
echo '1';
}
}

IF($LId == 'like'){
	empty($_POST['id']) ? $id = '0' : $id = trim($_POST['id']);
	$num = $Shiji->LikeNumA($id,$number);
if($id!='0'&&$num==0){
$Shiji->AddLike($id,$number);	
echo '1';
}
}
IF($LId == 'unlike'){
	empty($_POST['id']) ? $id = '0' : $id = trim($_POST['id']);
if($id!='0'){
$Shiji->DLike($id,$number);	
echo '1';
}}
IF($LId == 'unmyid'){
	empty($_POST['id']) ? $id = '0' : $id = trim($_POST['id']);
if($id!='0'&&is_numeric($id)){
	    $sql = "SELECT  * FROM Shiji_my WHERE id ='{$id}'";
		$row = $DB->once_fetch_array($sql);
		if(!empty($row)&&$row['number']==$number&&$row['isok']=='0'){
		$sql = "Delete FROM Shiji_my WHERE id ='{$id}'";
		$row = $DB->query($sql);
		}

echo '1';
}

}
IF($LId == 'unlikeid'){
	empty($_POST['id']) ? $id = '0' : $id = trim($_POST['id']);
if($id!='0'&&is_numeric($id)){
	$Shiji->DLike($id,$number);	
if(is_file(ZSystem.'/data/app/shiji/'.$number.'/list.php') ){
	$arrlistre = SetRead('/system/data/app/shiji/'.$number.'/list.php');
	$arrlist2=	$arrlistre;
	foreach(	$arrlistre  as $k=>$v) {
 if($id == $v) unset($arrlistre[$k]);
}
$arrlist = array_values($arrlistre);
}
	$arrfirst = SetRead('/system/data/app/shiji/'.$number.'/first.php');
	$arrfirst2=	$arrfirst;
	foreach(	$arrfirst  as $k=>$v) {
 if($id == $v['id']) unset($arrfirst[$k]);
}
if(count($arrlist2)-count($arrlist)==1){SSXetWrite($arrlist,'list.php');
SSXetWrite($arrfirst,'first.php');}

echo '1';
}

}
IF($LId == 'unid'){
	empty($_POST['id']) ? $id = '0' : $id = trim($_POST['id']);
if($id!='0'&&is_numeric($id)){
if(is_file(ZSystem.'/data/app/shiji/'.$number.'/list.php') ){
	$arrlistre = SetRead('/system/data/app/shiji/'.$number.'/list.php');
	$arrlist2=	$arrlistre;
	foreach(	$arrlistre  as $k=>$v) {
 if($id == $v) unset($arrlistre[$k]);
}
$arrlist = array_values($arrlistre);
}
	$arrfirst = SetRead('/system/data/app/shiji/'.$number.'/first.php');
	$arrfirst2=	$$arrfirst;
	foreach(	$arrfirst  as $k=>$v) {
 if($id == $v['id']) unset($arrfirst[$k]);
}
if(count($arrlist2)-count($arrlist)==1){SSXetWrite($arrlist,'list.php');
SSXetWrite($arrfirst,'first.php');}

echo '1';
}

}
IF($LId == 'addid'){
	empty($_POST['id']) ? $id = '0' : $id = trim($_POST['id']);
if($id!='0'&&is_numeric($id)){
if(is_file(ZSystem.'/data/app/shiji/'.$number.'/list.php') ){
	$arrlistre = SetRead('/system/data/app/shiji/'.$number.'/list.php');
	$arrlist2=	$arrlistre;
	foreach(	$arrlistre  as $k=>$v) {
 if($id == $v) unset($arrlistre[$k]);
}
$arrlist = array_values($arrlistre);
array_unshift($arrlist,$id);
}
	$arrfirst = SetRead('/system/data/app/shiji/'.$number.'/first.php');
	$arrfirst2=	$$arrfirst;
	foreach(	$arrfirst  as $k=>$v) {
 if($id == $v['id']) unset($arrfirst[$k]);
}
$data=ARRAY();
	   if(is_numeric($id)){ $sql = "SELECT  * FROM Shiji WHERE id ='{$id}'";
			   $row = $DB->once_fetch_array($sql);
			   $data[]=$row;
}
		if(!EMPTY($arrfirst)&&count($arrfirst)>0){$arrfirst=array_merge($data,$arrfirst);}
			else{$arrfirst=$data;}
		if(count($arrfirst)>20)$arrfirst=array_slice($arrfirst,0,20);
if($arrlist2!=$arrlist){SSXetWrite($arrlist,'list.php');
SSXetWrite($arrfirst,'first.php');}

echo '1';
}

}
IF($LId == 'view'){
	empty($_POST['id']) ? $id = '1' : $id = trim($_POST['id']);
					if(is_file(ZSystem.'/data/app/shiji/'.$number.'/list.php') ){
			$arrlist = SetRead('/system/data/app/shiji/'.$number.'/list.php');
		}else{
				printjson("error",'缓存不存在');
		}
		if((count($arrlist)+10)<$id)printjson("over",'没有数据了');
		$arrlist=array_slice($arrlist,$id,10);
	if((count($arrlist)<1))printjson("over",'没有数据了');

		$data=array();
	
		foreach ($arrlist as $key=>$arr) {
			   if(is_numeric($arr)){ $sql = "SELECT  * FROM Shiji WHERE id ='{$arr}'";
			   $row = $DB->once_fetch_array($sql);
			   	$num = $Shiji->LikeNumA($row['id'],$number);
if($row['id']!='0'&&$num!=0)$row['iszan']=1;
			   $data[]=$row;}
		}
		if(count($data)>0){
		$echo=array(
'type'=>'ok',
'data'=>$data,);
echojson($echo);
}else{
		printjson("error",'请再试一遍');
}
}
IF($LId == 'my'){
	empty($_POST['id']) ? $id = '1' : $id = trim($_POST['id']);
	if(!is_numeric($id)||$id<10)printjson("error",'数据错误');
	    $sql = "SELECT id FROM Shiji_my WHERE number ='{$number}' ";
		$row = $DB->query($sql);
		$num = $DB->num_rows($row);
		if(is_numeric($id)&&$id>($num+10))printjson("over",'没有数据了');
		$bnum=$id-10;
		$enum=$id-1;
		if($bnum>$enum||$bnum<0)printjson("error",'数据错误');
		$sql = "SELECT * FROM Shiji_my WHERE number = '{$number}' order by ctime desc LIMIT $bnum,$enum";
		$row = $DB->fetch_all_array($sql);

$arrlist=array();
if($row){
	foreach ($row as $key=>$arr) { 

	   if(is_numeric($arr['sid'])){
		   $row[$key]['ok']=$Shiji->ReceiveShiji($arr['sid']);

			
			   }
		
			$row[$key]['ctime2']=date('Y-m-j H:i:s',$arr['ctime']);
			   
			   $arrlist[]=$row[$key];
	}
			$arrlist=array_slice($arrlist,0,10);
	if((count($arrlist)<1))printjson("over",'没有数据了');
		if(count($arrlist)>0){
		$echo=array(
'type'=>'ok',
'data'=>$arrlist,);
echojson($echo);
}else{
		printjson("error",'请再试一遍');
}
}
}
IF($LId == 'love'){
	empty($_POST['id']) ? $id = '1' : $id = trim($_POST['id']);
	if(!is_numeric($id)||$id<10)printjson("error",'数据错误');
	    $sql = "SELECT id FROM Shiji_like WHERE number ='{$number}' ";
		$row = $DB->query($sql);
		$num = $DB->num_rows($row);
		if(is_numeric($id)&&$id>($num+10))printjson("over",'没有数据了');
		$bnum=$id-10;
		$enum=$id-1;
		if($bnum>$enum||$bnum<0)printjson("error",'数据错误');
		$sql = "SELECT * FROM Shiji_like WHERE number = '{$number}' order by addtime desc LIMIT $bnum,$enum";
		$row = $DB->fetch_all_array($sql);
		if(empty($row))printjson("over",'没有数据了');

$arrlist=array();
if($row){
	foreach ($row as $key=>$arr) { 
$array=$Shiji->ReceiveShiji($arr['sid']);
	   if(is_numeric($array['id'])){
			$array['iszan']=1;
			$array['liketime']=$arr['addtime'];
			$array['liketime2']=date('Y-m-j H:i:s',$arr['addtime']);
			$arrlist[]=$array;
			   }
	}
			$arrlist=array_slice($arrlist,0,10);
	if((count($arrlist)<1))printjson("over",'没有数据了');
		if(count($arrlist)>0){
		$echo=array(
'type'=>'ok',
'data'=>$arrlist,);
echojson($echo);
}else{
		printjson("error",'请再试一遍');
}
}
}
IF($LId == 'top'){
	empty($_POST['id']) ? $id = '1' : $id = trim($_POST['id']);
	if(!is_numeric($id)||$id<10)printjson("error",'数据错误');
		if(is_numeric($id)&&$id>40)printjson("over",'没有数据了');
		$bnum=$id-10;
		$enum=$id-1;
		if($bnum>$enum||$bnum<0)printjson("error",'数据错误');
		$sql = "SELECT * FROM `shiji` where isok='1' order by liked desc LIMIT $bnum,$enum";
		$row = $DB->fetch_all_array($sql);
	

	
	foreach ($row as $key=>$arr) { 
foreach ($arr as $key2=>$arr2) { 
if(is_numeric($key2))unset($row[$key][$key2]);
	}
	   if(is_numeric($arr['id'])){
			   	$num = $Shiji->LikeNumA($arr['id'],$number);
if($arr['id']!='0'&&$num!=0)$row[$key]['iszan']=1;
			   }
	}
			$arrlist=array_slice($row,0,10);
	if((count($arrlist)<1))printjson("over",'没有数据了');
		if(count($arrlist)>0){
		$echo=array(
'type'=>'ok',
'data'=>$arrlist,);
echojson($echo);
}else{
		printjson("error",'请再试一遍');
}
}
IF($LId == 'read'){
	//empty($_POST['id']) ? $id = '1' : $id = trim($_POST['id']);

$x=1; 
do {
  $row=getreaddata($DB);
  $x++;
} while ((count($row)<2||EMPTY($row))&&$x<4);
if(EMPTY($row)||count($row)<2){
	printjson("error",'数据不足');
}
	
foreach ($row as $key=>$arr) { 
foreach ($arr as $key2=>$arr2) { 
if(is_numeric($key2))unset($row[$key][$key2]);
}
	/*$num = $Shiji->LikeNumA($arr['id'],$number);
if($arr['id']!='0'&&$num!=0)$NoticeArray1[$key]['iszan']=1;
if(!empty($NoticeArray1[$key]['addtime'])&&empty($NoticeArray1[$key]['swhere']))$NoticeArray1[$key]['swhere']=smartDate($NoticeArray1[$key]['addtime'], 'Y-m-d H:i');
unset($NoticeArray1[$key]['openid']);*/
}
$arrlist = array();
	if(!is_dir(ZSystem.'/data/app/shiji/'.$number) )mkdir(ZSystem.'/data/app/shiji/'.$number);
				if(is_file(ZSystem.'/data/app/shiji/'.$number.'/list.php') ){
			$arrlist = SetRead('/system/data/app/shiji/'.$number.'/list.php');
 if(time()-filemtime(ZSystem.'/data/app/shiji/'.$number.'/list.php')<2)	printjson("no",'刷新太快');
		}
	
		$idarray1=array();
			foreach ($row as $key=>$arr) {
			$idarray1[]=$arr['id'];
		}

	if(!EMPTY($arrlist)&&count($arrlist)>0){
$noidarray=array_intersect($idarray1,$arrlist);
$idarray=array_diff($idarray1,$noidarray);
	}else{
	$idarray	=$idarray1;
	}

if(count($idarray)!=0){
	$data=array();
	$num=0;
	$iddata=array();
		foreach ($row as $key=>$arr) {
			if(in_array($arr['id'], $idarray)){$data[]=$row[$key];
			$iddata[]=$arr['id'];
			$num++;
			if($num>3)break;}
		}

		if(!empty($arrlist)&&count($arrlist)>0)$iddata=array_merge($iddata,$arrlist);

		SSXetWrite($iddata,'list.php');
			$arrfirst = array();
				if(is_file(ZSystem.'/data/app/shiji/'.$number.'/first.php') ){
			$arrfirst = SetRead('/system/data/app/shiji/'.$number.'/first.php');

		}
			if(!EMPTY($arrfirst)&&count($arrfirst)>0){$arrfirst=array_merge($data,$arrfirst);}
			else{$arrfirst=$data;}
		if(count($arrfirst)>20)$arrfirst=array_slice($arrfirst,0,20);
				SSXetWrite($arrfirst,'first.php');
					$Shiji = new Shiji($DB);
		foreach ($data as $key=>$arr) { 
	$num = $Shiji->LikeNumA($arr['id'],$number);
if($arr['id']!='0'&&$num!=0)$data[$key]['iszan']=1;
}
$echo=array(
'type'=>'ok',
'data'=>array_reverse($data),);
echojson($echo);
}else{
		printjson("no",'请再试一遍');
}
	
}
function getreaddata(&$DB){
		$numsql=date("w");
	$numsql2=($numsql+6)%9;
    $sql = "SELECT * FROM `shiji` where (id like '%".$numsql."' or id like '%".$numsql2."') AND isok='1' order by rand() LIMIT 3";
		$row1 = $DB->fetch_all_array($sql);
		$typearray1=array('a','b','c','d','e','f','g');
		$typearray2=array();
		foreach ($row1 as $key=>$arr) {
			$typearray2[]=$arr['type'];
		}
		$typearray=array_diff($typearray1,$typearray2);
		(!empty($typearray))?$typemysql= implode("','", $typearray):$typemysql= implode(",", $typearray1);

		
  $sql2 = "SELECT * FROM `shiji` where type in ('".$typemysql."') AND isok='1'  order by rand() LIMIT 7";
		$row2 = $DB->fetch_all_array($sql2);
	
		$row =array_merge($row1,$row2);
	
	
		return $row;
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
function printjson($type,$msg,$text='')
{
	ob_flush();
ob_clean();

			$Errormsg=array (
  'type' => urlencode ($type),
  'msg' => urlencode ($msg),
); 
if(!empty($text))$Errormsg['text']=$text;
$php_json = json_encode($Errormsg); 
echo urldecode($php_json); 
exit;
}
function SSXetWrite($Data,$Dir){
	$File = RRXOOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}