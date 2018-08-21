<?php
defined('ZRoot') or die('Access Denied.');
//必须继承MySql Class
class Z60ys{
	var $conn;

function Z60ys(&$DB){
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
		function GetZ60ysA($id){
	    $sql = "SELECT  * FROM Z60ys WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
		function ReceiveZ60ysA($TotalNum,$PerNum=1,$NowNum){
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from Z60ys order by groupid,id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }		
			function Z60ysNumA(){
	    $sql = "SELECT id FROM Z60ys";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
	function Z60ysNum($isok='1'){
	    $sql = "SELECT id FROM Z60ys WHERE isok={$isok}";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
	function Z60ysGroupNum($group,$isok='1'){
	    $sql = "SELECT id FROM Z60ys WHERE isok=$isok and groupid='{$group}'";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;  
    }    
	function ReceiveZ60ys($id){
	    $sql = "SELECT  * FROM Z60ys WHERE id ='{$id}' and isok=1";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
		function ReceiveZ60ysG($id){
	    $sql = "SELECT  * FROM Z60ys WHERE groupid ='{$id}' and isok=1 order by id desc limit 1";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	function DeleteZ60ys($id){
		$Arr = array(
				'isok'	=> 0,
				'deletetime'	=>time(),
			);
		$row = $this->conn->updateArr('Z60ys',$Arr,"where id ='{$id}'");
        return $row;  
    }
function EditZ60ys($id,$Arr){
		$row = $this->conn->updateArr('Z60ys',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function IsokZ60ys($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('Z60ys',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function DZ60ys($id){
	    $sql = "DELETE FROM Z60ys WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
	 function ReceiveGruopList($group,$isok='1'){
	    $sql = "SELECT * FROM Z60ys WHERE groupid='{$group}' and isok={$isok} order by istop desc,addtime desc";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
		 function ReceiveGruopListIMG($group,$isok='1'){
	    $sql = "SELECT id,title,dcontent,editor,istop FROM Z60ys WHERE groupid='{$group}' and isok={$isok} order by istop desc,addtime desc";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
	function SendZ60ys($groupid,$title,$editor,$dcontent,$content,$istop){
		$groupid = intval($groupid);
		$titlt = addslashes(trim($title));
		$dcontent = trim($dcontent);
		$content = trim($content);
		$istop = intval($istop);
		if($groupid && $content&& $title){
			$id = $this->conn->create('Z60ys',array(
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