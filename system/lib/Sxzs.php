<?php
defined('ZRoot') or die('Access Denied.');
//必须继承MySql Class
class Sxzs{
	var $conn;

function Sxzs(&$DB){
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
				function GetSxzson($id){
	    $sql = "SELECT  * FROM shixun_room WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
					function GetSxzsCJ($id){
	    $sql = "SELECT  * FROM shixun_cj WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
		function GetSxzsAPon($id){
	    $sql = "SELECT  * FROM shixun_ap WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
		function GetSxzsRid($id){
	    $sql = "SELECT  * FROM shixun_room WHERE rid ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
		function EditSxzs($id,$Arr){
		$row = $this->conn->updateArr('shixun_room',$Arr,"where id ='{$id}'");
        return $row;
    }

		function SendCJ($id,$title,$xy,$xzb,$name,$number,$stype,$photo,$content,$ip){
		$titlt = addslashes(trim($title));
		$content = addslashes(trim($content));
		if($titlt && $photo&& $content){
			$id = $this->conn->create('shixun_cj',array(
			'aid'       => $id,
				'number'       => $number,
				'name'       => $name,
				'xy'       => $xy,
				'xzb'       => $xzb,
				'stype'       => $stype,
				'title'		=> $title,
				'content'	=> $content,
				'img'=> $photo,
				'addtime'	=> time(),
				'isok'	=> '1',
				'ip'	=> $ip,
			));
		return 	$this->conn->insert_id();
		}
	}

			function OnNumA($sid,$isok='1'){
					 $WHERE='where isok="'.$isok.'" and sid = '.$sid;
	    $sql = "select id from sxzs_on $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
		function ReceiveSxzsAAA($TotalNum,$PerNum=1,$NowNum,$bbb,$ccc){
	$WHERE='';
if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from sxzs $WHERE order by id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
				 function SxzsNumAAA($bbb,$ccc){
		 $WHERE='';
		 if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
	    $sql = "SELECT id FROM sxzs $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
			function ReceiveSxzsRAAA($TotalNum,$PerNum=1,$NowNum,$bbb,$ccc){
	$WHERE='';
if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from sxzs_on $WHERE order by id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
				 function SxzsNumRAAA($bbb,$ccc){
		 $WHERE='';
		 if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
	    $sql = "SELECT id FROM sxzs_on $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }

		function ReceiveSxzsresid($wxid){
		 $WHERE='where sid="'.$wxid.'"';


$res1 =  $this->conn->query("select * from sxzs_re $WHERE order by addtime desc");		

		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
	function ReceiveSxzsre($wxid){
		 $WHERE='where wxid="'.$wxid.'"';


$res1 =  $this->conn->query("select * from sxzs_re $WHERE order by addtime desc");		

		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }

	function DeleteSxzs($id){
	    $sql = "Delete FROM sxzs WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
		 $sql = "Delete FROM sxzs_on WHERE sid ='{$id}'";
		$row = $this->conn->query($sql);

        return $row;  
    }
		function DeleteSxzsRe($id){
	    $sql = "Delete FROM sxzs_on WHERE id ='{$id}'";
		$row = $this->conn->query($sql);

        return $row;  
    }

	function Dsxzs_on($name){
	    $sql = "DELETE FROM sxzs_on WHERE wxid ='{$name}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
	function Showsxzs($id,$isok){
		$Arr = array(
				'isopen'	=> $isok,
			);
		$row = $this->conn->updateArr('sxzs',$Arr,"where id ='{$id}'");
        return $row;  
    }
		function Oksxzs_on($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('sxzs_on',$Arr,"where id ='{$id}'");
        return $row;  
    }
		function OkSxzsSeat($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('sxzs_on',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function AddSxzs_on($sid,$name,$number,$nickname,$wxid,$type,$img,$ip){

		if($wxid){
			$messageid = $this->conn->create('sxzs_on',array(
				'sid'		=> $sid,
				'name'       => $name,
				'wxid'		=> $wxid,
				'number'		=> $number,
				'type'		=> $type,
				'img'		=> $img,
				'nickname'		=> $nickname,
				'ip'		=> $ip,
				'addtime'	=> time(),
				'isok'	=> 1,
			));

		return 	$messageid;
		}
	}
	function EditSxzs_on($id,$Arr){
		$row = $this->conn->updateArr('sxzs_on',$Arr,"where id ='{$id}'");
        return $row;  
    }
	 function ReceiveSxzsList($isshow,$isok='1'){
	    $sql = "SELECT * FROM sxzs WHERE isshow='{$isshow}' and isok={$isok} order by addtime desc";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
	 function ReceiveSxzsimgList($isshow,$isok='1'){
	    $sql = "SELECT * FROM sxzs WHERE isshow='{$isshow}' and isok={$isok} order by addtime desc limit 4";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
function SendSxzs($title,$time,$endtime,$content,$lcontent){
		$titlt = addslashes(trim($title));
		$content = addslashes(trim($content));
		if($titlt && $content){

			$id = $this->conn->create2('sxzs',array(
				'title'		=> $title,
				'time'	=> $time,
				'endtime'       => $endtime,
				'isopen'       => '1',
				'content'	=> $content,
				'lcontent'	=> $lcontent,
				'addtime'	=> time(),
				'isok'	=> '1',
			));
		return 	$this->conn->insert_id();
}}
}