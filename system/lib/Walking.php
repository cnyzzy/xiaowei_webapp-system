<?php
defined('ZRoot') or die('Access Denied.');
//必须继承MySql Class
class Walking{
	var $conn;

function Walking(&$DB){
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
		function WalkingNumHDQ(){
	    $sql = "SELECT  id FROM step ";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;  
    }    
			 function WalkingNumHDQA($bbb,$ccc){
		 $WHERE='';
		 if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
	    $sql = "SELECT id FROM step $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
		function EditWalkingHDQ($id,$Arr){
		$row = $this->conn->updateArr('step',$Arr,"where id ='{$id}'");
        return $row;  
    }
    function WalkingHDQAllNum($isok='1'){
	    $sql = "SELECT id FROM step WHERE isok=$isok";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }

	
	function ReceiveWalkingHDQ($id){
	    $sql = "SELECT  * FROM step WHERE id ='{$id}'";
		
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	function ReceiveWalkingHDQA($TotalNum,$PerNum=1,$NowNum,$bbb,$ccc){
	$WHERE='';
if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from step $WHERE order by id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
	function ReceiveWalkingHDQE($bbb,$ccc){
	$WHERE='';
if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
		$res1 =  $this->conn->query("select * from step $WHERE order by id desc");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }		
	function DeleteWalkingHDQ($id){
	    $sql = "Delete FROM step WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
	function DWalking($name){
	    $sql = "DELETE FROM step WHERE number ='{$name}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
	function OkWalkingHDQ($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('step',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function ViewWalkingHDQ($id,$isok){
		$Arr = array(
				'issheng'	=> $isok,
			);
		$row = $this->conn->updateArr('step',$Arr,"where id ='{$id}'");
        return $row;  
    }

	
	
	function WalkingNumZCQ(){
	    $sql = "SELECT  id FROM stepzc ";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;  
    }    
			 function WalkingNumZCQA($bbb,$ccc){
		 $WHERE='';
		 if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
	    $sql = "SELECT id FROM stepzc $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
		function EditWalkingZCQ($id,$Arr){
		$row = $this->conn->updateArr('stepzc',$Arr,"where id ='{$id}'");
        return $row;  
    }
    function WalkingZCQAllNum($isok='1'){
	    $sql = "SELECT id FROM stepzc WHERE isok=$isok";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }

	
	function ReceiveWalkingZCQ($id){
	    $sql = "SELECT  * FROM stepzc WHERE id ='{$id}'";
		
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	function ReceiveWalkingZCQA($TotalNum,$PerNum=1,$NowNum,$bbb,$ccc){
	$WHERE='';
if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from stepzc $WHERE order by id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
	function ReceiveWalkingZCQE($bbb,$ccc){
	$WHERE='';
if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
		$res1 =  $this->conn->query("select * from stepzc $WHERE order by id desc");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }		
	function DeleteWalkingZCQ($id){
	    $sql = "Delete FROM stepzc WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
	function DWalkingZCQ($name){
	    $sql = "DELETE FROM stepzc WHERE number ='{$name}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
	function OkWalkingZCQ($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('stepzc',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function ViewWalkingZCQ($id,$isok){
		$Arr = array(
				'issheng'	=> $isok,
			);
		$row = $this->conn->updateArr('stepzc',$Arr,"where id ='{$id}'");
        return $row;  
    }
}