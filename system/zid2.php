<?php
/**
 * 身份识别（微信/QQ环境)
 * @copyright (c) ZY All Rights Reserved
 */
if(is_weixin())
{
	//微信环境中

	//检查是否登录
	if(empty($_SESSION['wx'])||empty($_SESSION['wx']['openid']))
	{
		$arrWxapi = SetRead('/system/config/Public/Wxapi.php');
		//登录
$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$arrWxapi['APPID']."&redirect_uri=http://weixin.yctu.edu.cn/back&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
 //$url = "/back";
	header("Location:".$url); 
	}else{
		//检查绑定
		if(empty($_SESSION['zid'])||empty($_SESSION['zid']['number'])){	
		 $sql = "SELECT * FROM wxid WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
		if(empty($row)){
			//没有绑定
			
			 IF($AppAction!="login")header("Location:/home/login"); 
	}else{
		if($row['stop']==1){ECHO'该微信号或身份被停用';}else{
			//ok
			
			$_SESSION['zid']=$row;
		}
	}
		}ELSE IF($_SESSION['zid']['stop']=='1')ECHO'该微信号或身份被停用!';
}
}ELSE{EXIT("NO WECHAT");}      