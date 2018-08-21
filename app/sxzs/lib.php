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
	    $sql = "SELECT  * FROM Sxzs_on WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
		function GetSxzsA($id){
	    $sql = "SELECT  * FROM Sxzs WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
		function EditSxzs($id,$Arr){
		$row = $this->conn->updateArr('cjhd',$Arr,"where id ='{$id}'");
        return $row;
    }
		function ReceiveSxzson($sid,$isok='1'){
		 $WHERE='where isok="'.$isok.'" and sid = '.$sid;

$res1 =  $this->conn->query("select * from cjhd_on $WHERE  ORDER BY addtime DESC");			
		
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }	

		function ReceiveSxzsIOnMini($sid,$isok='1'){
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
		function ReceiveSxzsAAA($TotalNum,$PerNum=1,$NowNum,$bbb,$ccc){
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
				 function SxzsNumAAA($bbb,$ccc){
		 $WHERE='';
		 if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
	    $sql = "SELECT id FROM cjhd $WHERE";
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
		$res1 =  $this->conn->query("select * from cjhd_on $WHERE order by id desc $limit");
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
	    $sql = "SELECT id FROM cjhd_on $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }

		function ReceiveSxzsresid($wxid){
		 $WHERE='where sid="'.$wxid.'"';


$res1 =  $this->conn->query("select * from cjhd_re $WHERE order by addtime desc");		

		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
	function ReceiveSxzsre($wxid){
		 $WHERE='where wxid="'.$wxid.'"';


$res1 =  $this->conn->query("select * from cjhd_re $WHERE order by addtime desc");		

		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }

	function DeleteSxzs($id){
	    $sql = "Delete FROM cjhd WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
		 $sql = "Delete FROM cjhd_on WHERE sid ='{$id}'";
		$row = $this->conn->query($sql);

        return $row;  
    }
		function DeleteSxzsRe($id){
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
		function OkSxzsSeat($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('cjhd_on',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function AddSxzs_on($sid,$name,$number,$nickname,$wxid,$type,$img,$ip){

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
	function EditSxzs_on($id,$Arr){
		$row = $this->conn->updateArr('cjhd_on',$Arr,"where id ='{$id}'");
        return $row;  
    }
	 function ReceiveSxzsList($isshow,$isok='1'){
	    $sql = "SELECT * FROM cjhd WHERE isshow='{$isshow}' and isok={$isok} order by addtime desc";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
	 function ReceiveSxzsimgList($isshow,$isok='1'){
	    $sql = "SELECT * FROM cjhd WHERE isshow='{$isshow}' and isok={$isok} order by addtime desc limit 4";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
function SendSxzs($title,$time,$endtime,$content,$lcontent){
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