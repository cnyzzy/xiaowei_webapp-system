<?php
defined('ZRoot') or die('Access Denied.');
//必须继承MySql Class
class gcdxy{
	var $conn;

function gcdxy(&$DB){
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
		function GetgcdxyA($id){
	    $sql = "SELECT  * FROM gcdxy WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
		function ReceivegcdxyA($TotalNum,$PerNum=1,$NowNum){
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from gcdxy order by groupid,id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }		
			function gcdxyNumA(){
	    $sql = "SELECT id FROM gcdxy";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
	function gcdxyNum($isok='1'){
	    $sql = "SELECT id FROM gcdxy WHERE isok={$isok}";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
	function gcdxyGroupNum($group,$isok='1'){
	    $sql = "SELECT id FROM gcdxy WHERE isok=$isok and groupid='{$group}'";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;  
    }    
	function Receivegcdxy($id){
	    $sql = "SELECT  * FROM gcdxy WHERE id ='{$id}' and isok=1";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	function Deletegcdxy($id){
		$Arr = array(
				'isok'	=> 0,
				'deletetime'	=>time(),
			);
		$row = $this->conn->updateArr('gcdxy',$Arr,"where id ='{$id}'");
        return $row;  
    }
function Editgcdxy($id,$Arr){
		$row = $this->conn->updateArr('gcdxy',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function Isokgcdxy($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('gcdxy',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function Dgcdxy($id){
	    $sql = "DELETE FROM gcdxy WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
	 function ReceiveGruopList($group,$isok='1'){
	    $sql = "SELECT * FROM gcdxy WHERE groupid='{$group}' and isok={$isok} order by istop desc,addtime desc";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
	function Sendgcdxy($groupid,$title,$editor,$dcontent,$content,$istop){
		$groupid = intval($groupid);
		$titlt = addslashes(trim($title));
		$dcontent = addslashes(trim($dcontent));
		$content = trim($content);
		$istop = intval($istop);
		if($groupid && $content&& $title){
			$id = $this->conn->create('gcdxy',array(
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