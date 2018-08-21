<?php
defined('ZRoot') or die('Access Denied.');
//必须继承MySql Class
class Home{
	var $conn;

function Home(&$DB){
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
	function NoticeNum($isok='1'){
	    $sql = "SELECT id FROM notice WHERE isok={$isok} and istop='1' and addtime>".(time()-48*3600);
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
	function MsgNum($number,$isview='0'){
	    $sql = "SELECT id FROM msg WHERE tonumber ='{$number}' and isok=1 and isview={$isview}";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }   
	function AppNum(){
	    $sql = "SELECT id FROM mapp WHERE isok=1 and sortid=0";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }   
	function SelfNum($id){
		 $sql = "SELECT id FROM jwinfo WHERE number = '{$id}' and addtime >".(time()+30*24*3600);
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }

	 
	
}