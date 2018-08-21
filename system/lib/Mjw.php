<?php
defined('ZRoot') or die('Access Denied.');
//必须继承MySql Class
class Mjw{
	var $conn;

function Mjw(&$DB){
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
		function OkJwinfo($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('jwinfo',$Arr,"where id ={$id}");
        return $row;  
    }
	function DeleteJwinfo($id){
	    $sql = "DELETE FROM jwinfo WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
				function LockQqid($id,$lock){
		$Arr = array(
				'islock'	=> $lock,
			);
		$row = $this->conn->updateArr('qqid',$Arr,"where id ={$id}");
        return $row;  
    }
				function StopQqid($id,$lock){
		$Arr = array(
				'stop'	=> $stop,
			);
		$row = $this->conn->updateArr('qqid',$Arr,"where id ='{$id}'");
        return $row;  
    }
			function LockWxid($id,$lock){
		$Arr = array(
				'islock'	=> $lock,
			);
		$row = $this->conn->updateArr('wxid',$Arr,"where id ={$id}");
        return $row;  
    }
				function StopWxid($id,$lock){
		$Arr = array(
				'stop'	=> $stop,
			);
		$row = $this->conn->updateArr('wxid',$Arr,"where id ='{$id}'");
        return $row;  
    }
				function LockWxxid($id,$lock){
		$Arr = array(
				'islock'	=> $lock,
			);
		$row = $this->conn->updateArr('wxappid',$Arr,"where id ={$id}");
        return $row;  
    }
				function StopWxxid($id,$lock){
		$Arr = array(
				'stop'	=> $stop,
			);
		$row = $this->conn->updateArr('wxappid',$Arr,"where id ='{$id}'");
        return $row;  
    }
    function WxidNum($isok='1'){
	    $sql = "SELECT id FROM wxid WHERE isok=$isok";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
	    function QqidNum($isok='1'){
	    $sql = "SELECT id FROM qqid WHERE isok=$isok";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
	    function WxxidNum($isok='1'){
	    $sql = "SELECT id FROM wxappid WHERE isok=$isok";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
	
    function JwinfoNum($isok='1'){
	    $sql = "SELECT id FROM jwinfo WHERE isok=$isok";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }function JwinfoNumA(){
	    $sql = "SELECT id FROM jwinfo";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
	function JwpassNum($isok='1'){
	    $sql = "SELECT id FROM jwpass WHERE isok=$isok";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
 function EditWxid($id,$Arr){
		
		$row = $this->conn->updateArr('wxid',$Arr,"where id ='{$id}'");
        return $row;  
    }
	 function EditQqid($id,$Arr){
		
		$row = $this->conn->updateArr('qqid',$Arr,"where id ='{$id}'");
        return $row;  
    }
	 function EditWxxid($id,$Arr){
		
		$row = $this->conn->updateArr('wxappid',$Arr,"where id ='{$id}'");
        return $row;  
    }
	 function EditJwinfo($id,$Arr){
		
		$row = $this->conn->updateArr('jwinfo',$Arr,"where id ='{$id}'");
        return $row;  
    }
		function ReceiveWxxid($TotalNum,$PerNum=1,$NowNum,$isok='1'){	
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from wxappid where isok=$isok order by id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
			function ReceiveQqid($TotalNum,$PerNum=1,$NowNum,$isok='1'){	
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from qqid where isok=$isok order by id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
	function ReceiveWxid($TotalNum,$PerNum=1,$NowNum,$isok='1'){	
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from wxid where isok=$isok order by id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }	
	function ReceiveInfo($TotalNum,$PerNum=1,$NowNum,$isok='1'){	
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from jwinfo where isok=$isok order by id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }	
	function ReceiveInfoA($TotalNum,$PerNum=1,$NowNum){	
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from jwinfo order by id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
			function GetWxxid($id){
	    $sql = "SELECT  * FROM wxappid WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
		function GetWxid($id){
	    $sql = "SELECT  * FROM wxid WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	function GetJwinfo($id){
	    $sql = "SELECT  * FROM jwinfo WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
			function GetWxidA($id){
	    $sql = "SELECT  * FROM wxid WHERE number ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	function GetJwinfoA($id){
	    $sql = "SELECT  * FROM jwinfo WHERE number ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	function GetJwpass($id){
	    $sql = "SELECT  * FROM jwpass WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	
	
}