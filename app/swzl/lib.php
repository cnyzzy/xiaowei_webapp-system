<?php
defined('ZRoot') or die('Access Denied.');
//必须继承MySql Class
class Swzl{
	var $conn;

function Swzl(&$DB){
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
		function SwzlNumAll(){
	    $sql = "SELECT  id FROM swzl";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;  
    }    
	function SwzlNuNum($number){
	    $sql = "SELECT  id FROM swzl WHERE number = '".$number."'";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;  
    }    

			 function SwzlNum($a,$c,$isok='1'){
		 $WHERE='where isok="'.$isok.'" ';
		 if($a!='index'&&strlen($a)==1)$WHERE.= 'and swhere = "'.$a.'"';
		 if($a!='index'&&strlen($a)==2)$WHERE.= 'and swhere like "'.$a.'%"';
		 if($c!='index')$WHERE.= 'and stype = "'.$c.'"';
		  if($c!='index')$WHERE.= 'and stype = "'.$c.'"';
	    $sql = "SELECT id FROM swzl $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
				 function SwzlNumS($ss,$isok='1'){
		  $WHERE="where isok='".$isok."' and title like '%".$ss."%' or content like '%".$ss."%' or mwhere like '%".$ss."%'";
	    $sql = "SELECT id FROM swzl $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
	
		function SwzlReplyNum($sid,$isok='1'){
		$WHERE='where isok="'.$isok.'" and sid = '.$sid;
	    $sql = "SELECT id FROM swzlre $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
	function SwzlReplyNumA($sid,$isok='1'){
		$WHERE='where isok="'.$isok.'" and number = '.$sid;
	    $sql = "SELECT id FROM swzlre $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
			function SwzlLikeNum($sid){
		$WHERE='where number = '.$sid;
	    $sql = "SELECT id FROM swzlgx $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
				function SwzlSNum($number){
	    $sql = "SELECT SUM(pl) as plnum,SUM(ll) as llnum,SUM(gx) as gxnum FROM swzl WHERE number = '".$number."'";
		$row = $this->conn->once_fetch_array($sql);
       return $row;
    }
		function EditSwzl($id,$Arr){
		$row = $this->conn->updateArr('swzl',$Arr,"where id ='{$id}'");
        return $row;
    }
		function ReceiveSwzlRE($sid,$isok='1'){
		 $WHERE='where isok="'.$isok.'" and sid = '.$sid;

$res1 =  $this->conn->query("select * from swzlre $WHERE  ORDER BY addtime DESC");			
		
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }	

		function ReceiveSwzlXG($a,$c,$isok='1'){
		 $WHERE='where isok="'.$isok.'" ';
		 if($a!='index'&&strlen($a)==2)$WHERE.= 'and swhere like "'.substr($a,0,1).'%"';
		 if($a!='index'&&strlen($a)==1)$WHERE.= 'and swhere like "'.$a.'%"';
		 if($c!='index')$WHERE.= 'and stype = "'.$c.'"';

$res1 =  $this->conn->query("select * from swzl $WHERE or isok='".$isok."' ORDER BY RAND() LIMIT 6");			
		
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }	
	function ReceiveSwzl($id){
		$sql = "update swzl set ll=ll+1 WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
	    $sql = "SELECT  * FROM swzl WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);

        return $row;  
    }
		function ReceiveSwzlL($id){
	    $sql = "SELECT  * FROM swzl WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);

        return $row;  
    }
			function ReceiveSwzlRL($id){
	    $sql = "SELECT  * FROM swzlre WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);

        return $row;  
    }
		function ReceiveSwzlAS($TotalNum,$PerNum=1,$NowNum,$ss,$isok='1'){
		 $WHERE="where isok='".$isok."' and title like '%".$ss."%' or content like '%".$ss."%' or mwhere like '%".$ss."%'";
		

$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;
$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';

$res1 =  $this->conn->query("select * from swzl $WHERE order by id desc $limit");		
		

		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
		function ReceiveSwzlAAA($TotalNum,$PerNum=1,$NowNum,$bbb,$ccc){
	$WHERE='';
if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from swzl $WHERE order by id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
				 function SwzlNumAAA($bbb,$ccc){
		 $WHERE='';
		 if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
	    $sql = "SELECT id FROM swzl $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
			function ReceiveSwzlRAAA($TotalNum,$PerNum=1,$NowNum,$bbb,$ccc){
	$WHERE='';
if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from swzlre $WHERE order by id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
				 function SwzlNumRAAA($bbb,$ccc){
		 $WHERE='';
		 if($bbb!='index')$WHERE='where '.$bbb.'= "'.$ccc.'"';
	    $sql = "SELECT id FROM swzlre $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
	function ReceiveSwzlA($TotalNum,$PerNum=1,$NowNum,$a,$b,$c,$isok='1'){
		 $WHERE='where isok="'.$isok.'" ';
		 if($a!='index'&&strlen($a)==2)$WHERE.= 'and swhere = "'.$a.'"';
		 if($a!='index'&&strlen($a)==1)$WHERE.= 'and swhere like "'.$a.'%"';
		 if($c!='index')$WHERE.= 'and stype = "'.$c.'"';
 $suanfa='';

$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;
$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		if($b!='index'){
switch ($b)
{
case 'gx':
 $suanfa='gx';
break; 
case 'll':
 $suanfa='ll';
break;
case 'pl':
 $suanfa='pl';
break;
case 'fb':
 $suanfa='addtime';
break;
default:
 $suanfa='id';
		}
$res1 =  $this->conn->query("select * from swzl $WHERE order by $suanfa desc $limit");		
		}else{
$res1 =  $this->conn->query("select * from swzl $WHERE ORDER BY gx > 50 DESC ,ll > 100 DESC,pl > 5 DESC,addtime DESC $limit");			
		}
			
		
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
	
	function ReceiveSwzlLike($TotalNum,$PerNum=1,$NowNum,$number){
		 $WHERE='where number="'.$number.'" ';
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;
$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';

$res1 =  $this->conn->query("select * from swzlgx $WHERE order by addtime desc $limit");		

		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
		function ReceiveSwzlPl($TotalNum,$PerNum=1,$NowNum,$number){
		 $WHERE='where number="'.$number.'" ';
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;
$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
$res1 =  $this->conn->query("select * from swzlre $WHERE order by addtime desc $limit");		

		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }

			function ReceiveSwzlMy($TotalNum,$PerNum=1,$NowNum,$number){
		 $WHERE='where number="'.$number.'" ';
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;
$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';

$res1 =  $this->conn->query("select * from swzl $WHERE order by id desc $limit");		

		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
	function DeleteSwzl($id){
	    $sql = "Delete FROM swzl WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
		 $sql = "Delete FROM swzlre WHERE sid ='{$id}'";
		$row = $this->conn->query($sql);
		 $sql = "Delete FROM swzlgx WHERE sid ='{$id}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
		function DeleteSwzlRe($id){
	    $sql = "Delete FROM swzlre WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
		$sql = "update swzl  set pl=pl-1 WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
		function AddGxSwzlRe($id,$number){
	    $sql = "update swzl  set gx=gx+1 WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
	
			$messageid = $this->conn->create('swzlgx',array(
				'number'		=> $number,
				'sid'		=> $id,
				'addtime'		=> time(),
			));
		return 	$messageid;
		
	}
   		function DGxSwzlRe($id,$number){
	    $sql = "update swzl  set gx=gx-1 WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
		$sql = "Delete FROM swzlgx WHERE number ='{$number}'";
		$row = $this->conn->query($sql);
		return $row;
		
	}
	function Dswzl($name){
	    $sql = "DELETE FROM swzl WHERE number ='{$name}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
	function OkSwzl($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('swzl',$Arr,"where id ='{$id}'");
        return $row;  
    }
		function OkSwzlR($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('swzlre',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function AddReply($sid,$name,$number,$img,$reply,$editreply=''){
		$reply = addslashes(trim($reply));
		$editreply = addslashes(trim($editreply));
		if($number && $reply){
			$messageid = $this->conn->create('swzlre',array(
				'sid'		=> $sid,
				'name'       => $name,
				'number'		=> $number,
				'img'		=> $img,
				'reply'		=> $reply,
				'editreply'		=> $editreply,
				'addtime'	=> time(),
				'isok'	=> 1,
			));
		$sql = "update swzl  set pl=pl+1 WHERE id ='{$sid}'";
		$row = $this->conn->query($sql);
		return 	$messageid;
		}
	}
	function EditReply($id,$Arr){
		$row = $this->conn->updateArr('swzlre',$Arr,"where id ='{$id}'");
        return $row;  
    }
				function ReceiveSwzlfeed($TotalNum,$PerNum=1,$NowNum,$number){
		 	 $WHERE='where sid in(select id from swzl where number="'.$number.'") ';
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;
$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';

$res1 =  $this->conn->query("select * from swzlre $WHERE order by addtime desc $limit");		

		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
		function SwzlFeedNum($number){
	    $sql = "select * from swzlre where sid in(select id from swzl where number='".$number."')  order by addtime";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;  
    }
	function SendSwzl($title,$xy,$xzb,$name,$number,$tname,$stype,$swhere,$mwhere,$photo,$content,$qq,$mobile,$ip){
		$titlt = addslashes(trim($title));
		$content = addslashes(trim($content));
		if($titlt && $photo&& $content){
			$id = $this->conn->create('swzl',array(
				'number'       => $number,
				'name'       => $name,
				'xy'       => $xy,
				'xzb'       => $xzb,
				'swhere'       => $swhere,
				'stype'       => $stype,
				'title'		=> $title,
				'tname'		=> $tname,
				'mwhere'       => $mwhere,
				'content'	=> $content,
				'qq'		=> $qq,
				'mobile'		=> $mobile,
				'img'=> $photo,
				'addtime'	=> time(),
				'isok'	=> '0',
				'ip'	=> $ip,
				'gx'	=> '0',
				'pl'	=> '0',
				'll'	=> '0',
			));
		return 	$this->conn->insert_id();
		}
	}
}