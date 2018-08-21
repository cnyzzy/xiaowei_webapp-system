<?php
defined('ZRoot') or die('Access Denied.');
//必须继承MySql Class
class Z60news{
	var $conn;

function Z60news(&$DB){
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
		function GetZ60newsA($id){
	    $sql = "SELECT  * FROM Z60news WHERE id ='{$id}'";
		$row = $this->conn->once_fetch_array($sql);
        return $row;  
    }
			function ReceiveNewZ60newsA($TotalNum,$PerNum=1,$NowNum,$isok='1'){
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from Z60news WHERE isok=$isok order by istop DEsc ,addtime DEsc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
			function ReceiveZ60newsA10($num=10){

		$res1 =  $this->conn->query("select * from Z60news order by groupid,id desc LIMIT $num");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
		function ReceiveZ60newsA($TotalNum,$PerNum=1,$NowNum){
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from Z60news order by groupid,id desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }		
			function Z60newsNumA(){
	    $sql = "SELECT id FROM Z60news";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
	function Z60newsNum($isok='1'){
	    $sql = "SELECT id FROM Z60news WHERE isok={$isok}";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;
    }
	function Z60newsGroupNum($group,$isok='1'){
	    $sql = "SELECT id FROM Z60news WHERE isok=$isok and groupid='{$group}'";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
        return $num;  
    }    
			function ReceiveZ60newsAGroup($TotalNum,$PerNum=1,$NowNum,$group,$isok='1'){
$prePageNum=$TotalNum>$PerNum?round($TotalNum/$PerNum):1;
$start_limit = empty($NowNum) ? 0:($NowNum - 1) * $PerNum;

		$limit = ISSET($prePageNum) ? "LIMIT $start_limit, $PerNum" : '';
		$res1 =  $this->conn->query("select * from Z60news WHERE isok=$isok and groupid='{$group}' order by istop desc,id desc,addtime desc $limit");
		$users = array();
		while($row =  $this->conn->fetch_array($res1))
			{
			$users[] = $row;
			}
        return $users;  
    }
	function ReceiveZ60news($id){
	    $sql = "SELECT  * FROM Z60news WHERE id ='{$id}' and isok=1";
		$row = $this->conn->once_fetch_array($sql);
		 $sql = "update Z60news  set view=view+1 WHERE id ='{$id}'";
		$this->conn->query($sql);
        return $row;  
		
    }
	function DeleteZ60news($id){
		$Arr = array(
				'isok'	=> 0,
				'deletetime'	=>time(),
			);
		$row = $this->conn->updateArr('Z60news',$Arr,"where id ='{$id}'");
        return $row;  
    }
function EditZ60news($id,$Arr){
		$row = $this->conn->updateArr('Z60news',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function IsokZ60news($id,$isok){
		$Arr = array(
				'isok'	=> $isok,
			);
		$row = $this->conn->updateArr('Z60news',$Arr,"where id ='{$id}'");
        return $row;  
    }
	function DZ60news($id){
	    $sql = "DELETE FROM Z60news WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
        return $row;  
    }
	 function ReceiveGruopList($group,$isok='1'){
	    $sql = "SELECT * FROM Z60news WHERE groupid='{$group}' and isok={$isok} order by istop desc,addtime desc";
		$row = $this->conn->fetch_all_array($sql);
        return $row;  
    }

			function AddLike($id,$number){
	    $sql = "update Z60news  set liku=liku+1 WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
	
			$messageid = $this->conn->create('Z60news_like',array(
				'number'		=> $number,
				'sid'		=> $id,
				'addtime'		=> time(),
			));
		return 	$messageid;
		
	}
   		function DLike($id,$number){
	    $sql = "update Z60news  set liku=liku-1 WHERE id ='{$id}'";
		$row = $this->conn->query($sql);
		$sql = "Delete FROM Z60news_like WHERE number ='{$number}'";
		$row = $this->conn->query($sql);
		return $row;
		
	}
	function LikeNumA($sid,$number){
		$WHERE='where sid = '.$sid.' and number = "'.$number.'"';
	    $sql = "SELECT id FROM Z60news_like $WHERE";
		$row = $this->conn->query($sql);
		$num = $this->conn->num_rows($row);
       return $num;
    }
	function SendZ60news($groupid,$title,$editor,$dcontent,$content,$istop){
		$groupid = intval($groupid);
		$titlt = addslashes(trim($title));
		$dcontent = addslashes(trim($dcontent));
		$content = trim($content);
		$istop = intval($istop);
		$img=array();
		@preg_match_all('/src="(.*)"/iUs', stripslashes($content), $out);
$imgARR=$out[1];

if (count($imgARR)!=0) {
$imgnum=0;
foreach((array)$imgARR as $key=>$loopChild)
 {
	 UNSET($result);
	$result = @myGetImageSize($loopChild);
	if($result&&$result['width']>110&&$result['height']>10)
	{
		$imgnum++;
		$img[]=$loopChild;
	}
	if($imgnum>4)BREAK;
 }
}
if(count($img)==2) $img=array_slice($img, 0, 1);
if(count($img)>2) $img=array_slice($img, 0, 3);
if (count($img)==0)$img[]="/app/60app/model/images/top2.jpg";	



	

		$imgjson = addslashes(json_encode($img));
		if($groupid && $content&& $title){
			$id = $this->conn->create('Z60news',array(
				'groupid'       => $groupid,
				'title'		=> $title,
				'editor'		=> $editor,
				'img'		=> $imgjson,
				'dcontent'		=> $dcontent,
				'content'	=> $content,
				'addtime'	=> time(),
				'istop'	=> $istop,
				'deletetime'	=> NULL,
				'isok'	=> 1,
				'liku'	=> 0,
				'view'	=> 0,
			));
		return 	$id;
		}
	}
}