<?php
defined('ZRoot') or die('Access Denied.');
//必须继承MySql Class
class Shiji{
	var $conn;

function Shiji(&$DB){
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
		function GetShijiA($id){
	    $sql = "SELECT  * FROM Shiji WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
		function ReceiveShijiA($TotalNum,$PerNum=1,$NowNum){
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from Shiji order by addtime,id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }		
			function ShijiNumA(){
	    $sql = "SELECT id FROM Shiji";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
	function ShijiNum($isok='1'){
	    $sql = "SELECT id FROM Shiji WHERE isok={$isok}";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
	function ShijiGroupNum($group,$isok='1'){
	    $sql = "SELECT id FROM Shiji WHERE isok=$isok and groupid='{$group}'";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;  
    }    
	function ReceiveShiji($id){
	    $sql = "SELECT  * FROM Shiji WHERE id ='{$id}' and isok=1";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	function DeleteShiji($id){
		$Arr = array(
				'isok'	=> 0,
				'deletetime'	=>time(),
			);
		$row = $this->conn->updateArr('Shiji',$Arr,"where id ='{$id}'");
        return $row;  
    }
function EditShiji($id,$Arr){
		$row = $this->conn->updateArr('Shiji',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function IsokShiji($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('Shiji',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function DShiji($id){
	    $sql = "DELETE FROM Shiji WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
	 function ReceiveGruopList($group,$isok='1'){
	    $sql = "SELECT * FROM Shiji WHERE groupid='{$group}' and isok={$isok} order by istop desc,addtime desc";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
	function SendShiji($groupid,$title,$editor,$dcontent,$content,$istop){
		$groupid = intval($groupid);
		$titlt = addslashes(trim($title));
		$dcontent = addslashes(trim($dcontent));
		$content = trim($content);
		$istop = intval($istop);
		if($groupid && $content&& $title){
			$id = $this->conn->create('Shiji',array(
				'groupid'       => $groupid,
				'title'		=> $title,
				'editor'		=> $editor,
				'dcontent'		=> $dcontent,
				'content'	=> $content,
				'addtime'	=> time(),
				'istop'	=> $istop,
				'deletetime'	=> NULL,
				'isok'	=> 1,
			));
		return 	$id;
		}
	}
}