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
		function ReceiveShijiMYA($TotalNum,$PerNum=1,$NowNum){
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from Shiji_MY order by ctime,id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }	
		function ShijiNumMYA(){
	    $sql = "SELECT id FROM Shiji_MY";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
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
		function IsnoShijiMY($id,$isok){
			 $sql = "SELECT  * FROM Shiji_MY WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
			if(!empty($row['sid'])){
				
				$sql = "SELECT  * FROM Shiji WHERE id ='{$row['sid']}'";
		$row2 = $this->conn->once_fetch_array($sql);
				if(!empty($row2['id'])){
							$Arr = array(
				'isok'	=> '0',
			);
		$row = $this->conn->updateArr('Shiji',$Arr,"where id ='{$row['sid']}'");
					
				}
			}
		$Arr = array(
				'isok'	=> '2',
			);
		$row = $this->conn->updateArr('Shiji_MY',$Arr,"where id ='{$id}'");
			
        return $row;  
    }
		function IsokShijiMY($id,$isok){
			 $sql = "SELECT  * FROM Shiji_MY WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
		
		$Arr = array(
				'isok'	=> $isok,
			);
		$row1 = $this->conn->updateArr('Shiji_MY',$Arr,"where id ='{$id}'");
		if($isok==1){
				$Arr = array(
				'istime'	=> time(),
			);
		$row1 = $this->conn->updateArr('Shiji_MY',$Arr,"where id ='{$id}'");
			
		}
			if($isok==1){
			
			   
		$sid = $this->conn->create('Shiji',array(
			"content"=>$row['content'],
"type"	=>$row['type'],
"from"=>$row['from'],
"creator"=>$row['creator'],
"ctime"=>$row['ctime'],
"addtime"=>TIme(),
"liked"=>0,
"commented"=>0,
"resource"=>'用户新增',
"isok"=>'1',

			));
					$Arr = array(
				'sid'	=> $this->conn->insert_id(),
			);

		$row = $this->conn->updateArr('Shiji_MY',$Arr,"where id ='{$id}'");
		}
        return $row;  
    }
	function DShiji($id){
	    $sql = "DELETE FROM Shiji WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
		function DShijiMY($id){
	    $sql = "DELETE FROM Shiji_my WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
	 function ReceiveGruopList($group,$isok='1'){
	    $sql = "SELECT * FROM Shiji WHERE groupid='{$group}' and isok={$isok} order by istop desc,addtime desc";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
		function AddLike($id,$number){
	    $sql = "update Shiji  set liked=liked+1 WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
	
			$messageid = $this->conn->create('Shiji_like',array(
				'number'		=> $number,
				'sid'		=> $id,
				'addtime'		=> time(),
			));
		return 	$messageid;
		
	}
			function ShijiLikeNumA($id){
	     $sql = "SELECT  liked FROM Shiji WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row['liked'];
    }
   		function DLike($id,$number){
	    $sql = "update Shiji  set liked=liked-1 WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
		$sql = "Delete FROM Shiji_like WHERE number ='{$number}' and sid={$id}";
		$row = $this->conn->query($sql);
		return $row;
		
	}
	function LikeNumA($sid,$number){
		$WHERE='where sid = '.$sid.' and number = "'.$number.'"';
	    $sql = "SELECT id FROM Shiji_like $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
	function SendShijiMY($content,$type,$from,$creator,$number){
		$number = intval($number);
		$creator = addslashes(trim($creator));
		$from = addslashes(trim($from));
		$content = trim($content);

		if($content&& $number){
			$id = $this->conn->create('Shiji_my',array(
			'content'       => $content,
				'type'       => $type,
				'from'		=> $from,
				'creator'		=> $creator,
				'ctime'		=> time(),
				'istime'	=> NULL,
				'number'	=> $number,
				'sid'	=> NULL,
				'resource'	=> '用户添加',
				'isok'	=> 0,

			));
		return 	$id;
		}
	}
}