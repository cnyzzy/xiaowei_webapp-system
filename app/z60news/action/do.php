<?php
empty($params[0]) ? $LId = '1' : $LId = $params[0];
$Z60news = new Z60news($DB);

IF($LId == 'like'){
	empty($_POST['id']) ? $id = '0' : $id = trim($_POST['id']);
	$num = $Z60news->LikeNumA($id,$number);
if($id!='0'&&$num==0){
$Z60news->AddLike($id,$number);	
echo '1';
}
}
IF($LId == 'unlike'){
	empty($_POST['id']) ? $id = '0' : $id = trim($_POST['id']);
if($id!='0'){
$Z60news->DLike($id,$number);	
echo '1';
}
}
