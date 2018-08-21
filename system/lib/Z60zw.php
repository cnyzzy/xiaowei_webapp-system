<?php
defined('ZRoot') or die('Access Denied.');
//必须继承MySql Class
class Z60Zw{
	var $conn;

function Z60Zw(&$DB){
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
		function GetZ60ZwA($id){
	    $sql = "SELECT  * FROM Z60Zw WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
		function ReceiveZ60ZwA($TotalNum,$PerNum=1,$NowNum){
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from Z60Zw order by groupid,id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }		
			function Z60ZwNumA(){
	    $sql = "SELECT id FROM Z60Zw";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
	function Z60ZwNum($isok='1'){
	    $sql = "SELECT id FROM Z60Zw WHERE isok={$isok}";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
	function Z60ZwGroupNum($group,$isok='1'){
	    $sql = "SELECT id FROM Z60Zw WHERE isok=$isok and groupid='{$group}'";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;  
    }    
	function ReceiveZ60Zw($id){
	    $sql = "SELECT  * FROM Z60Zw WHERE id ='{$id}' and isok=1";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	function DeleteZ60Zw($id){
		$Arr = array(
				'isok'	=> 0,
				'deletetime'	=>time(),
			);
		$row = $this->conn->updateArr('Z60Zw',$Arr,"where id ='{$id}'");
        return $row;  
    }
function EditZ60Zw($id,$Arr){
		$row = $this->conn->updateArr('Z60Zw',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function IsokZ60Zw($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('Z60Zw',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function DZ60Zw($id){
	    $sql = "DELETE FROM Z60Zw WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
	 function ReceiveGruopList($group,$isok='1'){
	    $sql = "SELECT * FROM Z60Zw WHERE groupid='{$group}' and isok={$isok} order by istop desc,addtime desc";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
	function SendZ60Zw($groupid,$title,$editor,$dcontent,$content,$istop){
		$groupid = intval($groupid);
		$titlt = addslashes(trim($title));
		$dcontent = addslashes(trim($dcontent));
		$content = trim($content);
		$istop = intval($istop);
		if($groupid && $content&& $title){
			$id = $this->conn->create('Z60Zw',array(
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