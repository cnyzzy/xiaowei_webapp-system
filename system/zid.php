<?php
/**
 * 身份识别（微信/QQ环境)
 * @copyright (c) ZY All Rights Reserved
 */

	//微信环境中
if(ZYCodeing=='1')
{
	//开发模式直接写入
	$_SESSION['wx']['openid']="olRBys2FcBtw7HarwSnIOdiqotPc";
	//$_SESSION['wx']['openid']="olRBys286nEj1DxeXgF1lT1fnyBA";
	$_SESSION['wx']['nickname']="开发者模式";
	$_SESSION['wx']['img']="http://127.0.0.1/xw.jpg";
}
	if(is_weixin())
{
	//检查是否登录
	if(empty($_SESSION['wx'])||empty($_SESSION['wx']['openid']))
	{
		//登录
		//登录
	//$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2c645b02db7bbe5a&redirect_uri=http://weixin.yctu.edu.cn/back&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
 $_SESSION['backurl']='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $url = "/back";
	header("Location:".$url); 
	}else{
		$_SESSION['my']='WX';
		//检查绑定
		if(empty($_SESSION['zid'])||empty($_SESSION['zid']['number'])||empty($_SESSION['mobiles'])){	
		 $sql = "SELECT * FROM wxid WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
		if(empty($row)){
			//没有绑定
			
			 IF($AppAction!="login"&&$AppAction!="zzjb"&&$AppAction!="qlogin"&&$AppAction!="tlogin"&&$AppAction!="zijbdo")header("Location:/home/login"); 	}else{
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
	IF($AppAction!="mobile"&&$AppAction!="mdo")header("Location:".$url); 	
		}
	}	
			}
			
		}
	}
		}ELSE IF($_SESSION['zid']['stop']=='1')ECHO'该微信号或身份被停用!';
}
}      

	if(is_qq()||is_tim())
{
	//检查是否登录
	if(empty($_SESSION['wx'])||empty($_SESSION['wx']['openid']))
	{
		//登录

	//$url = "https://api.uni.qq.com/connect/oauth2/authorize?appid=200484713&redirect_uri=http://weixin.yctu.edu.cn/qqback&response_type=code&state=zy970127005";
   $url = "/qqback";
 $_SESSION['backurl']='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 	header("Location:".$url); 
	}else{
		$_SESSION['my']='QQ';
		//检查绑定
		if(empty($_SESSION['zid'])||empty($_SESSION['zid']['number'])||empty($_SESSION['mobiles'])){	
		 $sql = "SELECT * FROM qqid WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
		if(empty($row)){
			//没有绑定
			
			 IF($AppAction!="login"&&$AppAction!="zzjb"&&$AppAction!="qlogin"&&$AppAction!="tlogin"&&$AppAction!="zijbdo")header("Location:/home/qlogin"); 
	}else{
		if($row['stop']==1){ECHO'该微信号或身份被停用';}else{
			$_SESSION['zid']=$row;
			//ok
			$needmysql=0;
//比对头像是否更新
if($_SESSION['zid']['img']!=$_SESSION['wx']['img']&&!empty($_SESSION['wx']['img']))
{$needmysql=1;
	$_SESSION['zid']['img']=$_SESSION['wx']['img'];
$_SESSION['wx']['img']=str_replace("&s=40&","&s=140&",$info['headimgurl']);

}
//比对昵称
if($_SESSION['zid']['nickname']!=$info['nickname']&&!empty($info['nickname']))
{$needmysql=1;
	$_SESSION['zid']['nickname']=$info['nickname'];
		$_SESSION['wx']['nickname']=$info['nickname'];
}

$newarr=array(
 'nickname'=>$_SESSION['zid']['nickname'],
 'img'=>$_SESSION['zid']['img'],
 );
 if($needmysql==1)$row = $DB->updateArr('qqid',$newarr,"where openid ='{$openid}' and isok='1'");	

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
	IF($AppAction!="mobile"&&$AppAction!="mdo")header("Location:".$url); 	
		}
	}	
			}
			
		}
	}
		}ELSE IF($_SESSION['zid']['stop']=='1')ECHO'该微信号或身份被停用!';
}
}  

if(is_wb())
{
	//检查是否登录
	if(empty($_SESSION['wx'])||empty($_SESSION['wx']['openid']))
	{
		//登录

	//$url = "https://api.uni.qq.com/connect/oauth2/authorize?appid=200484713&redirect_uri=http://weixin.yctu.edu.cn/qqback&response_type=code&state=zy970127005";
   $url = "/wbback";
 $_SESSION['backurl']='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 	header("Location:".$url); 
	}else{
		$_SESSION['my']='WB';
		//检查绑定
		if(empty($_SESSION['zid'])||empty($_SESSION['zid']['number'])||empty($_SESSION['mobiles'])){	
		 $sql = "SELECT * FROM wbid WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
		if(empty($row)){
			//没有绑定
			
			 IF($AppAction!="login"&&$AppAction!="zzjb"&&$AppAction!="qlogin"&&$AppAction!="tlogin"&&$AppAction!="zijbdo")header("Location:/home/tlogin"); 
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
	IF($AppAction!="mobile"&&$AppAction!="mdo")header("Location:".$url); 	
		}
	}	
			}
			
		}
	}
		}ELSE IF($_SESSION['zid']['stop']=='1')ECHO'该微信号或身份被停用!';
}
}  

	if(!is_qq()&&!is_tim()&&!is_weixin()&&!is_wb())
{
	if(!empty($_SESSION['wx']['openid'])&&!empty($_SESSION['my'])){
	if(!empty($_SESSION['my'])&&$_SESSION['my']=='WX')
{
		//检查绑定
		if(empty($_SESSION['zid'])||empty($_SESSION['zid']['number'])||empty($_SESSION['mobiles'])){	
		 $sql = "SELECT * FROM wxid WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
		if(empty($row)){
			//没有绑定
			
			 IF($AppAction!="login"&&$AppAction!="zzjb"&&$AppAction!="qlogin"&&$AppAction!="tlogin"&&$AppAction!="zijbdo")header("Location:/home/login"); 	}else{
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
	IF($AppAction!="mobile"&&$AppAction!="mdo")header("Location:".$url); 	
		}
	}	
			}
			
		}
	}
		}ELSE IF($_SESSION['zid']['stop']=='1')ECHO'该微信号或身份被停用!';
}
	if(!empty($_SESSION['my'])&&$_SESSION['my']=='QQ')
{
		//检查绑定
		if(empty($_SESSION['zid'])||empty($_SESSION['zid']['number'])||empty($_SESSION['mobiles'])){	
		 $sql = "SELECT * FROM qqid WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
		if(empty($row)){
			//没有绑定
			
			 IF($AppAction!="login"&&$AppAction!="zzjb"&&$AppAction!="qlogin"&&$AppAction!="tlogin"&&$AppAction!="zijbdo")header("Location:/home/qlogin"); 	}else{
		if($row['stop']==1){ECHO'该微信号或身份被停用';}else{
			$_SESSION['zid']=$row;
			//ok
			

			if($row['type']==2){
				if((!empty($_SESSION['mobiles'])&&$_SESSION['mobiles']['isok']==0)||empty($_SESSION['mobiles']['openid']))
	{
					$queryQ = $DB->query("select * from qqmobiles where openid='{$_SESSION['wx']['openid']}' and number='{$_SESSION['zid']['number']}' and isok='1'");
		$NumQ = $DB->num_rows($queryQ);
		$sql2Q ="select * from qqmobiles where openid='{$_SESSION['wx']['openid']}'and number='{$_SESSION['zid']['number']}' and isok='1'";
		$result2Q = $DB->query($sql2Q);
		$row2Q= $DB->fetch_array($result2Q);
		if($NumQ != 0){
			$_SESSION['mobiles']=$row2Q;
		}else{
		 $url = $arrInfo['url']."/home/mobile";
	IF($AppAction!="mobile"&&$AppAction!="mdo")header("Location:".$url); 	
		}
	}	
			}
			
		}
	}
		}ELSE IF($_SESSION['zid']['stop']=='1')ECHO'该微信号或身份被停用!';
}
if(!empty($_SESSION['my'])&&$_SESSION['my']=='WB')
{
		//检查绑定
		if(empty($_SESSION['zid'])||empty($_SESSION['zid']['number'])||empty($_SESSION['mobiles'])){	
		 $sql = "SELECT * FROM wbid WHERE openid ='{$_SESSION['wx']['openid']}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
		if(empty($row)){
			//没有绑定
			
			 IF($AppAction!="login"&&$AppAction!="zzjb"&&$AppAction!="qlogin"&&$AppAction!="tlogin"&&$AppAction!="zijbdo")header("Location:/home/tlogin"); 	}else{
		if($row['stop']==1){ECHO'该微信号或身份被停用';}else{
			$_SESSION['zid']=$row;
			//ok
			

			if($row['type']==2){
				if((!empty($_SESSION['mobiles'])&&$_SESSION['mobiles']['isok']==0)||empty($_SESSION['mobiles']['openid']))
	{
					$queryQ = $DB->query("select * from qqmobiles where openid='{$_SESSION['wx']['openid']}' and number='{$_SESSION['zid']['number']}' and isok='1'");
		$NumQ = $DB->num_rows($queryQ);
		$sql2Q ="select * from qqmobiles where openid='{$_SESSION['wx']['openid']}'and number='{$_SESSION['zid']['number']}' and isok='1'";
		$result2Q = $DB->query($sql2Q);
		$row2Q= $DB->fetch_array($result2Q);
		if($NumQ != 0){
			$_SESSION['mobiles']=$row2Q;
		}else{
		 $url = $arrInfo['url']."/home/mobile";
	IF($AppAction!="mobile"&&$AppAction!="mdo")header("Location:".$url); 	
		}
	}	
			}
			
		}
	}
		}ELSE IF($_SESSION['zid']['stop']=='1')ECHO'该微信号或身份被停用!';
}
	}else
	{
		$url = "/noh/?url=";
		$_SESSION['backurl']='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	header("Location:".$url.$_SESSION['backurl']); 	
	}		
}
