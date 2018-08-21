<?php
defined('ZRoot') or die('Access Denied.');
//必须继承MySql Class
class Hdxp{
	var $conn;

function Hdxp(&$DB){
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
				function GetHdxpSeat($id){
	    $sql = "SELECT  * FROM Hdxp_seat WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
		function GetHdxpA($id){
	    $sql = "SELECT  * FROM Hdxp WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
		function EditHdxp($id,$Arr){
		$row = $this->conn->updateArr('hdxp',$Arr,"where id ='{$id}'");
        return $row;
    }
		function ReceiveHdxpSeat($sid,$isok='1'){
		 $WHERE='where isok="'.$isok.'" and sid = '.$sid;

$res1 =  $this->conn->query("select * from hdxp_seat $WHERE  ORDER BY addtime DESC");			
		
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }	

		function ReceiveHdxpSeatMini($sid,$isok='1'){
		 $WHERE='where isok="'.$isok.'" and sid = '.$sid;

$res1 =  $this->conn->query("select xy from hdxp_seat $WHERE  ORDER BY addtime DESC");			
		
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row[0];
			}
        return $users;  
    }	

			function SEATNumA($sid,$isok='1'){
					 $WHERE='where isok="'.$isok.'" and sid = '.$sid;
	    $sql = "select id from hdxp_seat $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
		function ReceiveHdxpAAA($TotalNum,$PerNum=1,$NowNum,$bbb,$ccc){
	$WHERE='';
if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from hdxp $WHERE order by id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
				 function HdxpNumAAA($bbb,$ccc){
		 $WHERE='';
		 if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
	    $sql = "SELECT id FROM hdxp $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
			function ReceiveHdxpRAAA($TotalNum,$PerNum=1,$NowNum,$bbb,$ccc){
	$WHERE='';
if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from hdxp_seat $WHERE order by id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
				 function HdxpNumRAAA($bbb,$ccc){
		 $WHERE='';
		 if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
	    $sql = "SELECT id FROM hdxp_seat $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }

	
	function ReceiveHdxpticker($number){
		 $WHERE='where number="'.$number.'"';


$res1 =  $this->conn->query("select * from hdxp_seat $WHERE order by addtime desc");		

		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }

	function DeleteHdxp($id){
	    $sql = "Delete FROM hdxp WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
		 $sql = "Delete FROM hdxp_seat WHERE sid ='{$id}'";
		$row = $this->conn->query($sql);

        return $row;  
    }
		function DeleteHdxpRe($id){
	    $sql = "Delete FROM hdxp_seat WHERE id ='{$id}'";
		$row = $this->conn->query($sql);

        return $row;  
    }

	function Dhdxp_seat($name){
	    $sql = "DELETE FROM hdxp_seat WHERE number ='{$name}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
	function Showhdxp($id,$isok){
		$Arr = array(
				'isshow'	=> $isok,
			);
		$row = $this->conn->updateArr('hdxp',$Arr,"where id ='{$id}'");
        return $row;  
    }
		function Okhdxp_seat($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('hdxp_seat',$Arr,"where id ='{$id}'");
        return $row;  
    }
		function OkHdxpSeat($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('hdxp_seat',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function AddHdxp_seat($sid,$name,$xy,$number,$type,$img,$x,$y,$seatid,$hdtime){
		$y = addslashes(trim($y));
		$x = addslashes(trim($x));
		if($number){
			$messageid = $this->conn->create('hdxp_seat',array(
				'sid'		=> $sid,
				'name'       => $name,
				'number'		=> $number,
				'number'		=> $number,
				'type'		=> $type,
				'img'		=> $img,
				'x'		=> $x,
				'y'		=> $y,
				'xy'		=> $xy,
				'seatid'		=> $seatid,
				'hdtime'		=> $hdtime,
				'addtime'	=> time(),
				'isok'	=> 1,
			));

		return 	$messageid;
		}
	}
	function EditHdxp_seat($id,$Arr){
		$row = $this->conn->updateArr('hdxp_seat',$Arr,"where id ='{$id}'");
        return $row;  
    }
	 function ReceiveHdxpList($isshow,$isok='1'){
	    $sql = "SELECT * FROM hdxp WHERE isshow='{$isshow}' and isok={$isok} order by addtime desc";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
	 function ReceiveHdxpimgList($isshow,$isok='1'){
	    $sql = "SELECT * FROM hdxp WHERE isshow='{$isshow}' and isok={$isok} order by addtime desc limit 4";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }
function SendHdxp($number,$title,$time,$place,$opentime,$endtime,$seat,$firstimg,$smallimg,$content,$lcontent,$cimg,$owner,$isshow,$swhere,$stype,$xwhere,$xtime,$video){
		$titlt = addslashes(trim($title));
		$content = addslashes(trim($content));
		if($titlt && $content){

			$id = $this->conn->create2('hdxp',array(
				'number'       => $number,
				'title'		=> $title,
				'time'	=> $time,
				'place'       => $place,
				'opentime'       => $opentime,
				'endtime'       => $endtime,
				'seat'       => $seat,
				'firstimg'       => $firstimg,
				'smallimg'       => $smallimg,
				'content'	=> $content,
				'lcontent'	=> $lcontent,
				'cimg'       => $cimg,
				'owner'       => $owner,
				'isshow'       => $isshow,
				'addtime'	=> time(),
				'isok'	=> '1',
				'swhere'	=> $swhere,
			'stype'	=> $stype,
			'xwhere'	=> $xwhere,
			'xtime'	=> $xtime,
				'video'	=> $video,
			));
		return 	$this->conn->insert_id();
}}
}