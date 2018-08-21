<?php
defined('ZRoot') or die('Access Denied.');
//必须继承MySql Class
class Z60Notice{
	var $conn;

function Z60Notice(&$DB){
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
		function GetZ60NoticeA($id){
	    $sql = "SELECT  * FROM Z60Notice WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
		function ReceiveZ60NoticeA($TotalNum,$PerNum=1,$NowNum){
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from Z60Notice order by groupid,id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }		
			function Z60NoticeNumA(){
	    $sql = "SELECT id FROM Z60Notice";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
	function Z60NoticeNum($isok='1'){
	    $sql = "SELECT id FROM Z60Notice WHERE isok={$isok}";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
	function Z60NoticeGroupNum($group,$isok='1'){
	    $sql = "SELECT id FROM Z60Notice WHERE isok=$isok and groupid='{$group}'";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;  
    }    
	function ReceiveZ60Notice($id){
	    $sql = "SELECT  * FROM Z60Notice WHERE id ='{$id}' and isok=1";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	function DeleteZ60Notice($id){
		$Arr = array(
				'isok'	=> 0,
				'deletetime'	=>time(),
			);
		$row = $this->conn->updateArr('Z60Notice',$Arr,"where id ='{$id}'");
        return $row;  
    }
function EditZ60Notice($id,$Arr){
		$row = $this->conn->updateArr('Z60Notice',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function IsokZ60Notice($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('Z60Notice',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function DZ60Notice($id){
	    $sql = "DELETE FROM Z60Notice WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
	 function ReceiveGruopList($group,$isok='1'){
	    $sql = "SELECT * FROM Z60Notice WHERE groupid='{$group}' and isok={$isok} order by istop desc,addtime desc";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
	function SendZ60Notice($groupid,$title,$editor,$dcontent,$content,$istop){
		$groupid = intval($groupid);
		$titlt = addslashes(trim($title));
		$dcontent = addslashes(trim($dcontent));
		$content = trim($content);
		$istop = intval($istop);
		if($groupid && $content&& $title){
			$id = $this->conn->create('Z60Notice',array(
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