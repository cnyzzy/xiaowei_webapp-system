<?php
defined('ZRoot') or die('Access Denied.');
//必须继承MySql Class
class Msg{
	var $conn;

function Msg(&$DB){
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
		function EditMsg($id,$Arr){
		$row = $this->conn->updateArr('msg',$Arr,"where id ='{$id}'");
        return $row;  
    }
	 function MsgAllNumA($bbb,$ccc){
		 $WHERE='';
		 if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
	    $sql = "SELECT id FROM msg $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
    function MsgAllNum($number){
	    $sql = "SELECT id FROM msg WHERE tonumber ='{$number}' and isok=1";
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
	function MsgGroupNum($number,$group,$isview='0'){
	    $sql = "SELECT id FROM msg WHERE tonumber ='{$number}' and isok=1 and groupid='{$group}' and isview={$isview}";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;  
    }    
	function ReceiveMsg($id){
	    $sql = "SELECT  * FROM msg WHERE id ='{$id}' and isok=1";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }	
	function GetMsgA($id){
	    $sql = "SELECT  * FROM msg WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	function ViewMsg($id){
		$Arr = array(
				'isview'	=> 1,
				'viewtime'	=>time(),
			);
	    $sql = "SELECT  * FROM msg WHERE id ='{$id}' and isok=1";
		$row = $this->conn->updateArr('msg',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function DeleteMsg($id){
		$Arr = array(
				'isok'	=> 0,
				'deletetime'	=>time(),
			);
	    $sql = "SELECT  * FROM msg WHERE id ='{$id}' and isok=1";
		$row = $this->conn->updateArr('msg',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function IsokMsg($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('msg',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function DMsg($id){
	    $sql = "DELETE FROM msg WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
    function ReceiveGruop($number,$isview='0'){
	    $sql = "SELECT  msgtype,groupid,fromnumber,fromname, count(id) AS num FROM msg WHERE tonumber ='{$number}' and isok=1 and isview={$isview} group by groupid order by groupid desc";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
	 function ReceiveGruopList($number,$group,$isview='0'){
	    $sql = "SELECT * FROM msg WHERE tonumber ='{$number}' and isok=1 and groupid='{$group}' and isview={$isview}";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
function ReceiveMsgA($TotalNum,$PerNum=1,$NowNum,$bbb,$ccc){
	$WHERE='';
if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from msg $WHERE order by id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }		
	function SendMsg($msgtype,$groupid,$fromnumber,$fromname,$tonumber,$title,$content,$tourl=''){
		$msgtype = intval($msgtype);
		$groupid = intval($groupid);
		$fromnumber = intval($fromnumber);
		$tonumber = intval($tonumber);
		$titlt = addslashes(trim($title));
		$content = addslashes(trim($content));
		if($tonumber && $content){
			$messageid = $this->conn->create('msg',array(
				'msgtype'		=> $msgtype,
				'groupid'       => $groupid,
				'fromnumber'		=> $fromnumber,
				'fromname'		=> $fromname,
				'tonumber'		=> $tonumber,
				'title'		=> $title,
				'content'	=> $content,
                'tourl'=>$tourl,
				'isview'	=> 0,
				'addtime'	=> time(),
				'deletetime'	=> NULL,
				'isok'	=> 1,
				'viewtime'	=> NULL,
			));
		return 	$messageid;
		}
	}
}