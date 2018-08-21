<?php

	$MediaID = $_POST['MediaID'];
	$imgurl =  urldecode($_POST['Url']);
	$score = $_POST['Score'];
		ob_flush();
ob_clean();
	if(!empty($MediaID)&&!empty($imgurl)&&!empty($score))
	{
	
if($number&&$score&&$imgurl&&$openid){
 $NICKNAMEE=@$_SESSION['wx']['nickname'];
		$ip=getIP();
			$id = $DB->create('gcdxy',array(
				'number'       => @$number,
				'openid'       => @$openid,
				'nickname'=>@ $NICKNAMEE,
				'imgurl'=>$imgurl,
				'sroce'       => @$score,
				'mediaid'=>$MediaID,
				'amr'=>'0',
				'mp3'=>'0',
				'addtime'	=> time(),
				'ip'	=> @$ip,
			));
	 $sql = "SELECT id FROM gcdxy WHERE openid='$openid' order by addtime desc LIMIT 1";
		$row = $DB->once_fetch_array($sql);		
	printjson($row['id']);	
			}else{
			echo("error");	 EXIT;
}


 }ELSE
		{
	echo'-1';		
		}
 EXIT;
 //HTTP get 请求

function printjson($type)
{
	ob_flush();
ob_clean();

			$Errormsg=array (
  'ID' => urlencode ($type),
); 
$php_json = json_encode($Errormsg); 
echo urldecode($php_json); 
exit;
}