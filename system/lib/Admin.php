<?php
defined('ZRoot') or die('Access Denied.');
//必须继承MySql Class
class Admin{
	var $conn;

function Admin(&$DB){
		if (!$this->conn = $DB){
				$this->posterror("连接数据库失败");
			}
	}
function posterror($msg){
			$Errormsg = 
array (
  'error_type' => 'MySql',
  'sql' => $sql,
  'msg' => $msg,
);
ErrorMsg($Errormsg);
		}
	function OkUser($u,$p){
		$p=addslashes(trim($p));
		$pp=md5(md5($p));
	    $sql = "SELECT id FROM admin WHERE username='{$u}' and password='{$pp}'";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
	
	function LoginUser($u,$p){
		$p=addslashes(trim($p));
		$pp=md5(md5($p));
	    $sql = "SELECT * FROM admin WHERE username='{$u}' and password='{$pp}'";
		$row = $this->conn->once_fetch_array($sql);
		
		IF($row){
		$row['latetime'] = $row['nowtime'];
		$row['nowtime']=time();
		$row['lateip'] = $row['nowip'];
		$row['nowip']=  
		
		$row1['latetime'] = $row['latetime'];
		$row1['nowtime']=$row['nowtime'];
		$row1['lateip'] = $row['lateip'];
		$row1['nowip']=$row['nowip'];
		$rowW = $this->conn->updateArr('admin',$row1,"where id ='{$row['id']}'");}
        return $row;  
    }
		function GetRight($id){
		
	    $sql = "SELECT rightint,rightapp FROM admin WHERE id=$id";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
			function GetUser($id){
		
	    $sql = "SELECT * FROM admin WHERE id=$id";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	function EditUser($id,$Arr){
		if(!empty($Arr['password']))$Arr['password']=md5(md5($Arr['password']));
		if($Arr['rightint']!=9)$row = $this->conn->updateArr('admin',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function UserNum(){
	    $sql = "SELECT id FROM admin";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
		function ReceiveUser($TotalNum,$PerNum=1,$NowNum){	
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from admin order by rightint desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
	function AddUser($username,$password,$name,$img='',$rightint,$rightapp=''){
		
		$rightint = intval($rightint);
		$username = addslashes(trim($username));
		$name = addslashes(trim($name));
		$password = addslashes(trim($password));
		 $sql1 = "SELECT id FROM admin WHERE username='{$username}' or name='{$name}'";
		$row1 = $this->conn->query($sql1);
		$num1 = $this->conn->num_rows($row1);
		PRINT_r($num1);
		print_R(array(
				'username'		=> $username,
				'password'       => md5(md5($password)),
				'name'		=> $name,
				'img'		=> $img,
				'rightint'		=> $rightint,
				'rightapp'		=> $rightapp,
				'latetime'	=> time(),
                'nowtime'=>time(),
				'lateip'	=> '0.0.0.0',
				'nowip'	=> '0.0.0.0',
			));
		if($password && $name && $rightint<9 &&$num1 == 0 && $username&&$rightint){
			$mid = $this->conn->create('admin',array(
				'username'		=> $username,
				'password'       => md5(md5($password)),
				'name'		=> $name,
				'img'		=> $img,
				'rightint'		=> $rightint,
				'rightapp'		=> $rightapp,
				'latetime'	=> time(),
                'nowtime'=>time(),
				'lateip'	=> '0.0.0.0',
				'nowip'	=> '0.0.0.0',
			));
		return 	$mid;
		}
	}
	function DeleteUser($id){//最高权限用户不能删除
	    $sql = "DELETE FROM admin WHERE id ='{$id}' and rightint<>9";
		$row = $this->conn->query($sql);
        return $row;  
    }
		function ReadAppNum(){
	   $dirs = array_filter(glob(ZApp . '/' . '*'), 'is_dir');
	   foreach ($dirs as $key => $item) {
		$y = explode('/', $item);
		$arrDirs[] = array_pop($y);
	}$arrApps=0;
			foreach($arrDirs as $key=>$item){
			if(is_file(ZApp.'/'.$item.'/info.php')){
				$arrApps++;
				
		}
       
		} return $arrApps;}
	function ReadAppList(){
	   $dirs = array_filter(glob(ZApp . '/' . '*'), 'is_dir');
	   foreach ($dirs as $key => $item) {
		$y = explode('/', $item);
		$arrDirs[] = array_pop($y);
	}
			foreach($arrDirs as $key=>$item){
			if(is_file(ZApp.'/'.$item.'/info.php')){
				$arrApps[$key]['name'] = $item;
				$arrApps[$key]['info'] = SetRead( '/app/'.$item.'/info.php');
			}
						if(is_file(ZApp.'/'.$item.'/config.php')){
				$arrApps[$key]['config'] = SetRead( '/app/'.$item.'/config.php');
			}
				if(is_file(ZConfig.'/App/' .$item. '.php')){
				$arrApps[$key]['open'] = SetRead('/system/config/App/' .$item . '.php');
			}ELSE{$arrOpen['isopen']=0;

		SetWrite($arrOpen,'/system/config/App/' .$item. '.php');
		$arrConfig = SetRead( '/app/'.$item.'/config.php');
		$arrConfig['isinstall']=0;
		SetWrite($arrConfig,'/app/'.$item.'/config.php');
		$arrApps[$key]['config'] = SetRead( '/app/'.$item.'/config.php');
			}}
        return $arrApps;
    }
		function OpenApp($item){
		$appInfo=ARRAY();
	if(is_file(ZConfig.'/App/' .$item. '.php')){
	$arrOpen = SetRead('/system/config/App/' .$item. '.php');}ELSE{$arrOpen['isopen']=0;}
($arrOpen['isopen']==0)?$arrOpen['isopen']=1:$arrOpen['isopen']=0;
		SetWrite($arrOpen,'/system/config/App/' .$item. '.php');
	
	}
      
	function AdminAppUrl($item){
		$appInfo=ARRAY();
	if(is_file(ZApp.'/'.$item.'/info.php')){
		$appInfo = SetRead( '/app/'.$item.'/info.php');
	if($appInfo['install']==1)	{
		//需要安装
		$arrConfig = SetRead( '/app/'.$item.'/config.php');
		if($appInfo['admin']==1)$this->AddAppNav($item,$appInfo['name']);
		if($arrConfig['isinstall']==1&&$appInfo['admin']==1)return '1';
	}else{return '0';}
	}else{return '0';}
    }   
	function InstallApp($item,&$Mapp){
		$appInfo=ARRAY();
	if(is_file(ZApp.'/'.$item.'/info.php')){
		$appInfo = SetRead( '/app/'.$item.'/info.php');
	if($appInfo['install']==1)	{
		//需要安装
		
		//安装Lib
		if(is_file(ZApp.'/'.$item.'/lib.php'))copy(ZApp.'/'.$item.'/lib.php',ZSystem.'/lib/'.ucfirst($item).'.php');
		//写入设置
		$arrConfig = SetRead( '/app/'.$item.'/config.php');
		$arrConfig['isinstall']=1;
		SetWrite($arrConfig,'/app/'.$item.'/config.php');
		//初始化启用设置
		$arrOpen=array (
					'name' => $item,
					'isopen' => 0,
					);
		SetWrite($arrOpen,'/system/config/App/' .$item. '.php');
		//写入APP展示
		if($appInfo['show']==1)$Mapp->AddMapp(9,"默认",$appInfo['name'],$appInfo['ico'],"/".$item,0);
		//写入后台管理
		if($appInfo['admin']==1)$this->AddAppNav($item,$appInfo['name']);
	}
	}
    }   
	function UnInstallApp($item,&$Mapp){
	if(is_file(ZApp.'/'.$item.'/info.php')){
		$arrInfo = SetRead( '/app/'.$item.'/info.php');
	if($arrInfo['install']==1)	{
		//需要安装
		
		//移除Lib
		if(is_file(ZSystem.'/lib/'.ucfirst($item).'.php'))
		{
			copy(ZSystem.'/lib/'.ucfirst($item).'.php',ZApp.'/'.$item.'/lib.php');
			@unlink (ZSystem.'/lib/'.ucfirst($item).'.php');
	}
		//移除设置
		$arrConfig = SetRead( '/app/'.$item.'/config.php');
		$arrConfig['isinstall']=0;
		SetWrite($arrConfig,'/app/'.$item.'/config.php');
		//删除启用设置
		@unlink('/system/config/App/' .$item. '.php');
		//删除APP展示
		if($arrInfo['show']==1)$Mapp->DMapp($arrInfo['name']);
		//删除后台
		if($appInfo['admin']==1)$this->DeleteAppNav($item);
	}
	}
    }   
	function AppNum(){
	    $sql = "SELECT id FROM mapp WHERE isok=1 and sortid=0";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }   
	function SelfNum($id){
		 $sql = "SELECT id FROM jwinfo WHERE number = {$id} and addtime >".(time()+30*24*3600);
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
	function AppNavList(){
		$arrNav = SetRead( '/system/config/Public/Appnav.php');
		
		if(is_array($arrNav)){
		 return 	$arrNav;
		}

	}
	function AddAppNav($appkey,$appname){
		$arrNav = SetRead( '/system/config/Public/Appnav.php');
		
		if(is_array($arrNav)){
			$arrNav[$appkey] = $appname;
		}else{
			$arrNav = array(
				$appkey=>$appname,
			);
		}
		
		foreach($arrNav as $key=>$item){ 
		
			if(!is_dir(ZApp.'/'.$key)){
				unset($arrNav[$key]);
			}
		}
		
		SetWrite($arrNav,'/system/config/Public/Appnav.php');
	}
	function DeleteAppNav($appkey){
		$arrNav = $arrInfo = SetRead( '/system/config/Public/Appnav.php');	
		if(isset($arrNav[$appkey])){
				unset($arrNav[$key]);
		}
		SetWrite($arrNav,'/system/config/Public/Appnav.php');
	}
	
	function RChart($isok){	
		$sql =  "SELECT FROM_UNIXTIME(addtime,'%Y-%m-%d') as time , count(*) as count FROM wxid where isok=$isok GROUP BY time order by time desc limit 14 ";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
}