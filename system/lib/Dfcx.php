<?php
defined('ZRoot') or die('Access Denied.');
//必须继承MySql Class
class Dfcx{
	var $conn;

function Dfcx(&$DB){
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
			function GetRoomInfo($number){
	    $sql = "SELECT  * FROM dfcxinfo WHERE number ='{$number}' and isok='1'";
		$row = $this->conn->once_fetch_array($sql);

        return $row;  
    }
			function SendRoomInfo($number,$name,$xq,$lh,$ab,$lc,$fj,$room){
		
		if($number){
			$messageid = $this->conn->create('dfcxinfo',array(
				'number'		=> $number,
				'name'		=> $name,
				'xq'		=> $xq,
				'lh'		=> $lh,
				'abl'		=> $ab,
				'lc'		=> $lc,
				'fj'	=> $fj,
                'room'=>$room,
				 'isok'=>'1',
				'addtime'	=> time(),
				'uptime'	=> NULL,
			));
		return 	$messageid;
		}
	}
	
	function EditInfo($id,$Arr){
		$row = $this->conn->updateArr('dfcxinfo',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function Dinfo($id){
		$Arr = array(
				'isok'	=> '0',
			);
		$row = $this->conn->updateArr('dfcxinfo',$Arr,"where id ={$id}");
        return $row;  
    }
		function DEInfo($id){
	    $sql = "DELETE FROM dfcxinfo WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
        return $row;  
    }	
		
		
}