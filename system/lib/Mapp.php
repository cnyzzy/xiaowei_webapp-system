<?php
defined('ZRoot') or die('Access Denied.');
//必须继承MySql Class
class Mapp{
	var $conn;

function Mapp(&$DB){
		if (!$this->conn = $DB){
				$this->posterror("连接数据库失败");
			}
	}
function posterror($Mapp){
			$ErrorMapp = 
array (
  'error_type' => 'MySql',
  'sql' => $sql,
  'Msg' => $Mapp,
);
ErrorMsg($ErrorMapp);
		}
		function MappGroupNumA(){
	    $sql = "SELECT  groupid,groupname, count(id) AS num FROM mapp group by groupid order by sortid desc";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;  
    }    
		
		function EditMapp($id,$Arr){
		$row = $this->conn->updateArr('mapp',$Arr,"where id ='{$id}'");
        return $row;  
    }
    function MappAllNum($isok='1'){
	    $sql = "SELECT id FROM mapp WHERE isok=$isok";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }

	function MappGroupNum($group,$isok='1'){
	    $sql = "SELECT id FROM mapp WHERE groupid='{$group}' and isok=$isok";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;  
    }    
	function ReceiveMapp($id){
	    $sql = "SELECT  * FROM mapp WHERE id ='{$id}'";
		
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
		function ReceiveMappG($id){
	    $sql = "SELECT  * FROM mapp WHERE groupid ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	function ReceiveMappGa($id){
	    $sql = "SELECT  * FROM mapp WHERE groupname ='{$id}'";
		
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	function DeleteMapp($id){
	    $sql = "Delete FROM mapp WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
	function DMapp($name){
	    $sql = "DELETE FROM mapp WHERE name ='{$name}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
	function ViewMapp($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('Mapp',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function EditMappGroupA($id,$name){
		$Arr = array(
				'groupname'	=> $name,
			);
		$row = $this->conn->updateArr('Mapp',$Arr,"where groupid ='{$id}'");
        return $row;  
    }
    function ReceiveGroup($isok='1'){
	    $sql = "SELECT  groupid,groupname, count(id) AS num FROM mapp WHERE isok=$isok group by groupid order by sortid desc";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
	function ReceiveGroupA(){
	    $sql = "SELECT  groupid,groupname, count(id) AS num FROM mapp group by groupid order by sortid desc";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
	
	 function ReceiveGroupList($group,$isok='1'){
	    $sql = "SELECT * FROM mapp WHERE groupid='{$group}' and isok={$isok} order by sortid desc";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
		 function ReceiveGroupListA($group){
	    $sql = "SELECT * FROM mapp WHERE groupid='{$group}' order by sortid desc";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
	function AddMapp($groupid,$groupname,$name,$ico,$url,$sortid,$isok){

		$groupid = intval($groupid);
		$groupname = addslashes(trim($groupname));
		$name = addslashes(trim($name));
		if($name  && $groupid){
			$messageid = $this->conn->create('mapp',array(
				'groupid'       => $groupid,
				'groupname'		=> $groupname,
				'name'		=> $name,
				'ico'		=> $ico,
				'url'		=> $url,
				'sortid'		=> $sortid,
				'isok'	=> $isok,
			));
		return 	$messageid;
		}
	}
}