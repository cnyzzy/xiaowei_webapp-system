<?php
$Cjhd = new Cjhd($DB);
$id = empty($bbb) ? 0:($bbb);
if($id!="do"){
if($id!=0)$Array = $Cjhd ->GetCjhdA($id);
if(EMPTY($Array)){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '没有这条数据',
); 
ErrorMsg($Errormsg);	}
$onarray=$Cjhd ->ReceiveCjhdon($id);
if($_SESSION['admin']['rightint']<7&&$Action !=  $_SESSION['admin']['rightapp']){$Errormsg=array (
  'error_type' => '提示',
  'msg' => '权限不足',
); 
ErrorMsg($Errormsg);	}
}else
{
$id = $_POST['id'];
$cj = $_POST['cj'];

$array=$Cjhd->GetCjhdon($id);

$Cjhd->Okcjhd_on($id,'0');
$nickname=@$array['nickname'];
$name=@$array['name'];
$sid=@$array['sid'];
$number=@$array['number'];

$wxid=@$array['wxid'];
$sq3 = "SELECT * FROM  cjhd_re WHERE wxid = '".$wxid."' order by addtime ASC LIMIT 1";
$result3 =$DB->once_fetch_array($sq3);
	
 if(!empty($result3))printjson("ok",'已登记');	
if($sid&&$number&&$nickname&&$name&&$wxid){
	$ip=getIP();
			$id = $DB->create('cjhd_re',array(
				'sid'       => @$sid,
				'onid'       => @$id,
				'name'       => @$name,
				'nickname'       => @$nickname,
				'wxid'       => @$wxid,
				'number'       => @$number,
				'cj'  => @$cj,		
				'ip'	=> @$ip,
				'addtime'	=> time(),
				'stime'	=> '',
			));
	printjson("ok",'登记成功');	
			}else{
			printjson("error",'数据验证有误');	
}

		 echo '1';
	
}
function printjson($type,$msg)
{
	ob_flush();
ob_clean();

			$Errormsg=array (
  'type' => urlencode ($type),
  'msg' => urlencode ($msg),
); 
$php_json = json_encode($Errormsg); 
echo urldecode($php_json); 
exit;
}