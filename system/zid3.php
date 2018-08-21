<?php
/**
 * 身份识别（微信/QQ环境)
 * @copyright (c) ZY All Rights Reserved
 */
//if(is_weixin())
//{
	//微信环境中
$_SESSION['wx']['openid']='8';
	//检查是否登录
	if(empty($_SESSION['wx'])||empty($_SESSION['wx']['openid']))
	{
		//登录
	//$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2c645b02db7bbe5a&redirect_uri=http://weixin.yctu.edu.cn/back&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
 $url = "/back";
	header("Location:".$url); 
	}else{
		//检查绑定
		if(empty($_SESSION['zid'])||empty($_SESSION['zid']['number'])||empty($_SESSION['mobiles'])){	
		 $sql = "SELECT * FROM wxid WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
		if(empty($row)){
			//没有绑定
			
			 IF($AppAction!="login")header("Location:/home/login"); 
	}else{
		if($row['stop']==1){ECHO'该微信号或身份被停用';}else{
			$_SESSION['zid']=$row;
			//ok
			if($row['type']==2){
				if((!empty($_SESSION['mobiles'])&&$_SESSION['mobiles']['isok']==0)||empty($_SESSION['mobiles']['openid']))
	{
					$queryQ = $DB->query("select * from mobiles where openid='{$_SESSION['wx']['openid']}' and number='{$_SESSION['zid']['number']}' and isok='1'");
		$NumQ = $DB->num_rows($queryQ);
		$sql2Q ="select * from mobiles where openid='{$_SESSION['wx']['openid']}'and number='{$_SESSION['zid']['number']}' and isok='1'";
		$result2Q = $DB->query($sql2Q);
		$row2Q= $DB->fetch_array($result2Q);
		if($NumQ != 0){
			$_SESSION['mobiles']=$row2Q;
		}else{
		 $url = $arrInfo['url']."/home/mobile";
	IF($AppAction!="mobile")header("Location:".$url); 	
		}
	}	
			}
			
		}
	}
		}ELSE IF($_SESSION['zid']['stop']=='1')ECHO'该微信号或身份被停用!';
}
//}      