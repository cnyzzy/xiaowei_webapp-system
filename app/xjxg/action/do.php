<?php

	if(empty($_SESSION['wx']['openid'])){
 printjson("error",'您还没有绑定');
	}
//开始是否符合要求
$sq = "SELECT * FROM  ks_result WHERE openid = '".$openid."' and sroce='100' order by addtime ASC LIMIT 1";
$result =$DB->once_fetch_array($sq);
	
 if(empty($result))printjson("error",'不能抽奖');	

empty($params[0]) ? $LId = '1' : $LId = $params[0];
IF($LId == 'post'){
		empty($_POST['jp']) ? $jp = '0' : $jp = intval($_POST['jp']);
		switch ( $jp)
{
case 1:
  $jp2="1号奖品";
  break;  
case 2:
$jp2="2号奖品";
  break;
  case 3:
$jp2="3号奖品";
  break;
  case 4:
$jp2="4号奖品";
  break;
  
default:
$jp2="";

}
		$sq3 = "SELECT * FROM  ks_cj WHERE openid = '".$openid."' order by addtime ASC LIMIT 1";
$result3 =$DB->once_fetch_array($sq3);
 if(empty($result3))printjson("no",'未登记');	
  if(!empty($result3['jp']))printjson("no",'已抽过');	
  $Arr = array(
				'cj'	=> $jp2,
				'stime'	=> time(),
			);
			$ip=getIP();
			if($ip!=$result3['ip'])$Arr['ip']=$result3['ip'].'@'.$ip;
		$row = $DB->updateArr('ks_cj',$Arr,"WHERE id ='{$result3['id']}'");
		if($row){
			printjson("ok",'OK');
		}else{
			printjson("no",'数据库异常');	
			
		}
}
IF($LId == 'cjdj'){
		empty($_POST['name']) ? $name2 = '0' : $name2 = trim($_POST['name']);
			empty($_POST['mobile']) ? $mobile = '0' : $mobile = trim($_POST['mobile']);
			$mname=$name2;
			$mmobile=$mobile;
			if(!preg_match("/^1[34578]{1}\d{9}$/",$mobile)){  
printjson("error",'手机号码错误');
}

if( $name2 == '0'||eregi ( 'select|inert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|UNION|into|load_file|outfile', $name2 )){  
printjson("error",'姓名数据有误');
}
$nickname=@$_SESSION['wx']['nickname'];
$rid=@$result['id'];
$number2=@$result['number'];
$score=@$result['sroce'];
$sq3 = "SELECT * FROM  ks_cj WHERE openid = '".$openid."' order by addtime ASC LIMIT 1";
$result3 =$DB->once_fetch_array($sq3);
	
 if(!empty($result3))printjson("ok",'已登记');	
if($rid&&$number2&&$nickname&&$score&&$mmobile&&$mname&&$openid){
	$ip=getIP();
			$id = $DB->create('ks_cj',array(
				'rid'       => @$rid,
				'appid'       => '1',
				'name'       => @$mname,
				'nickname'       => @$nickname,
				'openid'       => @$openid,
				'mobile'       => @$mmobile,
				'number'       => @$number2,
				'score'       => @$score,
				'cj'  => '',		
				'ip'	=> @$ip,
				'addtime'	=> time(),
				'stime'	=> '',
			));
	printjson("ok",'登记成功');	
			}else{
			printjson("error",'数据验证有误');	
}
}else{
	printjson("NO",'访问非法');	
}


