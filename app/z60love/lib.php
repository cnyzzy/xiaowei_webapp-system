<?php
defined('ZRoot') or die('Access Denied.');
//必须继承MySql Class
class Z60Love{
	var $conn;

function Z60Love(&$DB){
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
		function GetZ60LoveA($id){
	    $sql = "SELECT  * FROM Z60Love WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
		function ReceiveZ60LoveA($TotalNum,$PerNum=1,$NowNum){
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from Z60Love order by stype,id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }		
			function Z60LoveNumA(){
	    $sql = "SELECT id FROM Z60Love";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
	function Z60LoveNum($isok='1'){
	    $sql = "SELECT id FROM Z60Love WHERE isok={$isok}";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
	function Z60LoveGroupNum($group='all',$isok='1'){
	    $sql = "SELECT id FROM Z60Love WHERE isok=$isok";
		if($group!='all')$sql.=" and stype='{$group}'";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;  
    }    
	function ReceiveZ60Love($id,$isok='1'){
	    $sql = "SELECT  * FROM Z60Love WHERE id ='{$id}' and isok=$isok";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	function ReceiveZ60LoveAll($id){
	    $sql = "SELECT  * FROM Z60Love WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
	function DeleteZ60Love($id){
		$Arr = array(
				'isok'	=> 0,
				'deletetime'	=>time(),
			);
		$row = $this->conn->updateArr('Z60Love',$Arr,"where id ='{$id}'");
        return $row;  
    }
function EditZ60Love($id,$Arr){
		$row = $this->conn->updateArr('Z60Love',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function IsokZ60Love($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('Z60Love',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function DZ60Love($id){
	    $sql = "DELETE FROM Z60Love WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
	 function ReceiveGruopList($group='all',$isok='1'){
	    $sql = "SELECT * FROM Z60Love WHERE";
				if($group!='all')$sql.=" stype='{$group}' and ";
				    $sql .= "isok={$isok} order by istop desc,addtime desc";
	
				
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
	 function ReceiveHot($group='all',$isok='1',$num=10){
	    $sql = "SELECT * FROM Z60Love WHERE";
				if($group!='all')$sql.=" stype='{$group}' and ";
				    $sql .= " isok={$isok} order by liku desc,addtime desc limit $num";
	
				
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
		function DeleteZ60LoveRe($id){
	    $sql = "Delete FROM Z60Lovere WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
		$sql = "update Z60Love  set pl=pl-1 WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
		function AddGxZ60LoveRe($id,$number){
	    $sql = "update Z60Love  set gx=gx+1 WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
	
			$messageid = $this->conn->create('Z60Lovegx',array(
				'number'		=> $number,
				'sid'		=> $id,
				'addtime'		=> time(),
			));
		return 	$messageid;
		
	}
   		function DGxZ60LoveRe($id,$number){
	    $sql = "update Z60Love  set gx=gx-1 WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
		$sql = "Delete FROM Z60Lovegx WHERE number ='{$number}' and sid ='{$id}'";
		$row = $this->conn->query($sql);
		return $row;
		
	}

	function OkZ60Love($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('Z60Love',$Arr,"where id ='{$id}'");
        return $row;  
    }
		function OkZ60LoveR($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('Z60Lovere',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function AddReply($sid,$name,$number,$img,$reply,$editreply=''){
		$reply = addslashes(trim($reply));
		$editreply = addslashes(trim($editreply));
		if($number && $reply){
			$messageid = $this->conn->create('Z60Lovere',array(
				'sid'		=> $sid,
				'name'       => $name,
				'number'		=> $number,
				'img'		=> $img,
				'reply'		=> $reply,
				'editreply'		=> $editreply,
				'addtime'	=> time(),
				'isok'	=> 1,
			));
		$sql = "update Z60Love  set pl=pl+1 WHERE id ='{$sid}'";
		$row = $this->conn->query($sql);
		return 	$messageid;
		}
	}
	function EditReply($id,$Arr){
		$row = $this->conn->updateArr('Z60Lovere',$Arr,"where id ='{$id}'");
        return $row;  
    }
				function ReceiveNewZ60loveA($TotalNum,$PerNum=1,$NowNum,$isok='1'){
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from Z60love WHERE isok=$isok order by liku DEsc ,addtime DEsc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
			function AddLike($id,$number){
	    $sql = "update Z60love  set liku=liku+1 WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
	
			$messageid = $this->conn->create('Z60love_like',array(
				'number'		=> $number,
				'sid'		=> $id,
				'addtime'		=> time(),
			));
		return 	$messageid;
		
	}
   		function DLike($id,$number){
	    $sql = "update Z60love  set liku=liku-1 WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
		$sql = "Delete FROM Z60love_like WHERE number ='{$number}'";
		$row = $this->conn->query($sql);
		return $row;
		
	}
	function LikeNumA($sid,$number){
		$WHERE='where sid = '.$sid.' and number = '.$number;;
	    $sql = "SELECT id FROM Z60love_like $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
				function ReceiveZ60Lovefeed($TotalNum,$PerNum=1,$NowNum,$number){
		 	 $WHERE='where sid in(select id from Z60Love where number="'.$number.'") ';
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;
$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';

$res1 =  $this->conn->query("select * from Z60Lovere $WHERE order by addtime desc $limit");		

		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
		function Z60LoveFeedNum($number){
	    $sql = "select * from Z60Lovere where sid in(select id from Z60Love where number='".$number."')  order by addtime";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;  
    }
	function SendZ60Love($xy,$xzb,$name,$number,$nickname,$openid,$stype,$where,$ip,$headimg,$content){

		$content = addslashes(trim($content));
		if( $content){
			$id = $this->conn->create('Z60Love',array(
				
				'stype'       => $stype,
				'nickname'       => $nickname,
				'openid'       => $openid,
				'headimg'=> $headimg,
				'number'       => $number,
				'name'       => $name,
				'xy'       => $xy,
				'xzb'       => $xzb,
				'swhere'       => $where,
				'content'	=> $content,
				'img'=> '',
				'addtime'	=> time(),
				'isok'	=> '0',
				'ip'	=> $ip,
				'liku'	=> '0',
			));
		return 	$this->conn->insert_id();
	}}
}