<?php
if($_SESSION['admin']['rightint']<4){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
empty($_POST['do']) ? $ch = '0' : $ch = $_POST['do']; 
switch($ch){
	case "update":
	$nowym=date('Ym');
	
	$data = date('Y-m-d',strtotime($_POST['data']));
	if(strtotime($data)>time())
	{
	echo '1';	
break;	
	}
$Wx = new Wx();
	$arrWx = $Wx->  GetArticleTotal($data);
	if(isset($arrWx['errcode']))
	{echo'error';
PRINT_R($arrWx['errcode']);}
elseif(isset($arrWx['list'])&&empty($arrWx['list'][0])){
	echo'0';
}
else{

foreach ( $arrWx['list'] as $k => $arr ) {
$arrList=$arr['details'];
$arrA=end($arrList);;
$arrA['msgid']=$arr['msgid'];
$arrA['title']=$arr['title'];
$arrA['sendid']=($k+1);
$arrA['data']=$data;
$arrA['sid']=date('Ym',strtotime($data));
$arrA['time']=time();
$arrA['url']="";
$arrA['user_source']=$arr['user_source'];
	    $sql = "SELECT id FROM wxarticle WHERE msgid='".$arrA['msgid']."'";
		$row = $DB->query($sql);
		$num = $DB->num_rows($row);
		if($num!=0)
		{
		$sql = "Delete FROM wxarticle WHERE msgid='".$arrA['msgid']."'";
		$row = $DB->query($sql);	
		}
    $DB->create('wxarticle',$arrA);
		    $sql = "SELECT id FROM wxarticlet WHERE msgid='".$arrA['msgid']."'";
		$row = $DB->query($sql);
		$num = $DB->num_rows($row);
		if($num!=0)
		{
		$sql = "Delete FROM wxarticlet WHERE msgid='".$arrA['msgid']."'";
		$row = $DB->query($sql);	
		}
foreach ( $arrList as $k => $v ) {
$p=$v;
$p['msgid']=$arrA['msgid'];
$DB->create('wxarticlet',$p);
}	
}

echo '1';	
}
		
break;
case "del":
	$nowym=date('Ym');
	$ym=date('Ym',strtotime($_POST['sid']."01"));
		$ypm=date('Y-m',strtotime($_POST['sid']."01"));
  $sql = "SELECT id FROM wxarticle WHERE sid='".$ym."'";
		$row = $DB->query($sql);
		$num = $DB->num_rows($row);
		if($num!=0)
		{
		$sql = "Delete FROM wxarticle WHERE sid='".$ym."'";
		$row = $DB->query($sql);	
		}
		  $sql = "SELECT id FROM wxarticlet WHERE stat_date like'".$ypm."%'";
		$row = $DB->query($sql);
		$num = $DB->num_rows($row);
		if($num!=0)
		{
		$sql = "Delete FROM wxarticlet WHERE stat_date like'".$ypm."%'";
		$row = $DB->query($sql);	
		}
	echo '1';	

	break;
default:
print_R($_POST);
}
?>