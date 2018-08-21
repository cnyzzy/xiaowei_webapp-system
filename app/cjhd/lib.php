<?php
defined('ZRoot') or die('Access Denied.');
//必须继承MySql Class
class Cjhd{
	var $conn;

function Cjhd(&$DB){
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
				function GetCjhdon($id){
	    $sql = "SELECT  * FROM Cjhd_on WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
		function GetCjhdA($id){
	    $sql = "SELECT  * FROM Cjhd WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
		function EditCjhd($id,$Arr){
		$row = $this->conn->updateArr('cjhd',$Arr,"where id ='{$id}'");
        return $row;
    }
		function ReceiveCjhdon($sid,$isok='1'){
		 $WHERE='where isok="'.$isok.'" and sid = '.$sid;

$res1 =  $this->conn->query("select * from cjhd_on $WHERE  ORDER BY addtime DESC");			
		
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }	

		function ReceiveCjhdIOnMini($sid,$isok='1'){
		 $WHERE='where isok="'.$isok.'" and sid = '.$sid;

$res1 =  $this->conn->query("select nickname,imgurl from cjhd_on $WHERE  ORDER BY addtime DESC");			
		
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row[0];
			}
        return $users;  
    }	

			function OnNumA($sid,$isok='1'){
					 $WHERE='where isok="'.$isok.'" and sid = '.$sid;
	    $sql = "select id from cjhd_on $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
		function ReceiveCjhdAAA($TotalNum,$PerNum=1,$NowNum,$bbb,$ccc){
	$WHERE='';
if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from cjhd $WHERE order by id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
				 function CjhdNumAAA($bbb,$ccc){
		 $WHERE='';
		 if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
	    $sql = "SELECT id FROM cjhd $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
			function ReceiveCjhdRAAA($TotalNum,$PerNum=1,$NowNum,$bbb,$ccc){
	$WHERE='';
if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from cjhd_on $WHERE order by id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
				 function CjhdNumRAAA($bbb,$ccc){
		 $WHERE='';
		 if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
	    $sql = "SELECT id FROM cjhd_on $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }

		function ReceiveCjhdresid($wxid){
		 $WHERE='where sid="'.$wxid.'"';


$res1 =  $this->conn->query("select * from cjhd_re $WHERE order by addtime desc");		

		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
	function ReceiveCjhdre($wxid){
		 $WHERE='where wxid="'.$wxid.'"';


$res1 =  $this->conn->query("select * from cjhd_re $WHERE order by addtime desc");		

		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }

	function DeleteCjhd($id){
	    $sql = "Delete FROM cjhd WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
		 $sql = "Delete FROM cjhd_on WHERE sid ='{$id}'";
		$row = $this->conn->query($sql);

        return $row;  
    }
		function DeleteCjhdRe($id){
	    $sql = "Delete FROM cjhd_on WHERE id ='{$id}'";
		$row = $this->conn->query($sql);

        return $row;  
    }

	function Dcjhd_on($name){
	    $sql = "DELETE FROM cjhd_on WHERE wxid ='{$name}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
	function Showcjhd($id,$isok){
		$Arr = array(
				'isopen'	=> $isok,
			);
		$row = $this->conn->updateArr('cjhd',$Arr,"where id ='{$id}'");
        return $row;  
    }
		function Okcjhd_on($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('cjhd_on',$Arr,"where id ='{$id}'");
        return $row;  
    }
		function OkCjhdSeat($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('cjhd_on',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function AddCjhd_on($sid,$name,$number,$nickname,$wxid,$type,$img,$ip){

		if($wxid){
			$messageid = $this->conn->create('cjhd_on',array(
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
	function EditCjhd_on($id,$Arr){
		$row = $this->conn->updateArr('cjhd_on',$Arr,"where id ='{$id}'");
        return $row;  
    }
	 function ReceiveCjhdList($isshow,$isok='1'){
	    $sql = "SELECT * FROM cjhd WHERE isshow='{$isshow}' and isok={$isok} order by addtime desc";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
	 function ReceiveCjhdimgList($isshow,$isok='1'){
	    $sql = "SELECT * FROM cjhd WHERE isshow='{$isshow}' and isok={$isok} order by addtime desc limit 4";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
function SendCjhd($title,$time,$endtime,$content,$lcontent){
		$titlt = addslashes(trim($title));
		$content = addslashes(trim($content));
		if($titlt && $content){

			$id = $this->conn->create2('cjhd',array(
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