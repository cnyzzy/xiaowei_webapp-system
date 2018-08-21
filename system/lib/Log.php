<?php
defined('ZRoot') or die('Access Denied.');
//必须继承MySql Class
class Log{
	var $conn;

function Log(&$DB){
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

		function LogNum(){
	    $sql = "SELECT id FROM log";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
	
	function ReceiveLog($TotalNum,$PerNum=1,$NowNum){	
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from log order by id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }		
	function ReceiveMeLog($id){	

		$limit = "LIMIT 20" ;
		$sql =  "select * from log where uid = $id order by time desc $limit";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }		
		function OkUserLog($user){
		  $sql = "SELECT id FROM log WHERE toid='$user' and dotype=4 and type=64";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
	function DeleteLog($id){
	    $sql = "DELETE FROM log WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
		function GetLog($id){
	    $sql = "SELECT  * FROM log WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	function GetUserLog($user){
	    $sql = "SELECT  * FROM jwinfo WHERE uid ='{$user}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	function GetUserOK($user){
	    $sql = "SELECT  * FROM jwpass WHERE toid ='{$user}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	function AddLog($uid,$name,$type,$dotype,$toid,$right){
		$right = intval($right);
		$uid = intval($uid);
		$name = addslashes(trim($name));
		//$toid = intval($toid);
		$type = intval($type);
		$dotype = intval($dotype);
		if($uid  && $type){
			$id = $this->conn->create('log',array(
				'uid'       => $uid,
				'name'		=> $name,
				'type'		=> $type,
				'toid'		=> $toid,
				'dotype'		=> $dotype,
				'time'		=> time(),
				'ip'	=> getIP(),
				'rightint'	=> $right,
			));
		return 	$id;
		}
	}
	
}