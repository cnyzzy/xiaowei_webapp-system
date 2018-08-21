<?php
empty($params[0]) ? $LId = '1' : $LId = $params[0];
empty($params[1]) ? $id = '1' : $id = intval($params[1]);
empty($params[2]) ? $id2 = '1' : $id2 = intval($params[2]);
empty($params[3]) ? $id3 = '3' : $id3 = intval($params[3]);

	$Sxzs = new Sxzs($DB);
if(!is_dir(ZSystem.'/data/app/sxzs/roomindex') )mkdir(ZSystem.'/data/app/sxzs/roomindex');
define('RROOT',ZSystem.'/data/app/sxzs/roomindex/');
IF($LId == 'axajxq'){
	   if(is_file(ZSystem.'/data/app/sxzs/roomindex/type.php')){
				$type = SetRead( '/system/data/app/sxzs/roomindex/type.php');
				$typearray=$type[$id];	
			}ELSE
			{
				 	   $sql = "SELECT  xq,xqid FROM shixun_room WHERE isok='1' group by xq";
		$Arr=array();
		$Arr =  $DB->fetch_all_array($sql);
			foreach((array)$Arr as $key=>$row)
			{
			$room[$row['xqid']] = $row['xq'];
			}
		SSWrite($room,'xq.php');
	    $sql = "SELECT  xqid,type,typeid FROM shixun_room WHERE isok='1'";
			$Arr=array();
			$type=array();
		$Arr =  $DB->fetch_all_array($sql);
			foreach((array)$Arr as $key=>$row)
			{
		
			$type[$row['xqid']][$row['typeid']] = $row['type'];
			}
		SSWrite($type,'type.php');
				$typearray=$type[$id];
			}
	  if(is_file(ZSystem.'/data/app/sxzs/roomindex/type-dept.xq-'.$id.'.php')&&(filectime(ZSystem.'/data/app/sxzs/roomindex/type-dept.xq-'.$id.'.php')>time()-3600*12)){
				$backarray = SetRead( '/system/data/app/sxzs/roomindex/type-dept.xq-'.$id.'.php');
				$php_json = json_encode($backarray); 
echo urldecode($php_json); 
exit;

				
			}ELSE{
$backarray =array();
			foreach((array)$typearray as $key=>$row)
			{
				$temparray=array();
				$temparray['value']=$key;
				$temparray['text']=$row;
				$temparray['children']=array();
		$sql = "SELECT  dept,deptid FROM shixun_room WHERE isok='1' and typeid='".$key."' and xqid = '".$id."' group by deptid";
		$Arr=array();
		$Arr =  $DB->fetch_all_array($sql);
		foreach((array)$Arr as $key=>$row2)
			{
				$temparray2=array();
				$temparray2['value']=$row2['deptid'];
				$temparray2['text']=$row2['dept'];
				$temparray['children'][]=$temparray2;
	
			}
	
			$backarray[]=$temparray;
			}
		SSWrite($backarray,'type-dept.xq-'.$id.'.php');
						$php_json = json_encode($backarray); 
echo urldecode($php_json); 
exit;
			}

}
IF($LId == 'axajde'){
	   if(is_file(ZSystem.'/data/app/sxzs/roomindex/dept.'.$id.'.php')){
				$type = SetRead( '/system/data/app/sxzs/roomindex/dept.'.$id.'.php');
				$typearray=$type;	
			}ELSE
			{
				 	   $sql = "SELECT  build,buildid FROM shixun_room WHERE isok='1' and deptid='".$id."' group by build";
		$Arr=array();
		$Arr =  $DB->fetch_all_array($sql);
			foreach((array)$Arr as $key=>$row)
			{
			$room[$row['buildid']] = $row['build'];
			}
	SSWrite($room,'dept.'.$id.'.php');
	 $typearray  =$room; 
			}
	  if(is_file(ZSystem.'/data/app/sxzs/roomindex/build-ground.dept-'.$id.'.php')&&(filectime(ZSystem.'/data/app/sxzs/roomindex/build-ground.dept-'.$id.'.php')>time()-3600*12)){
				$backarray = SetRead( '/system/data/app/sxzs/roomindex/build-ground.dept-'.$id.'.php');
				$php_json = json_encode($backarray); 
echo urldecode($php_json); 
exit;

				
			}ELSE{
$backarray =array();
			foreach((array)$typearray as $key=>$row)
			{
				$temparray=array();
				$temparray['value']=$key;
				$temparray['text']=$row;
				$temparray['children']=array();
		$sql = "SELECT  ground,whereid FROM shixun_room WHERE isok='1' and buildid='".$key."' and deptid = '".$id."' group by groundid";
		$Arr=array();
		$Arr =  $DB->fetch_all_array($sql);
		foreach((array)$Arr as $key=>$row2)
			{
				$temparray2=array();
				$temparray2['value']=$row2['whereid'];
				$temparray2['text']=$row2['ground'];
				$temparray['children'][]=$temparray2;
	
			}
	
			$backarray[]=$temparray;
			}
		SSWrite($backarray,'build-ground.dept-'.$id.'.php');
						$php_json = json_encode($backarray); 
echo urldecode($php_json); 
exit;
			}

}
IF($LId == 'qiandao'){
						
if(isset($_POST['time']))$timejc=$_POST['time'];
								IF(empty($timejc)||time()-$timejc>1800)
	{
					$arr['status']=0; 
$arr['content']="页面过期 请刷新"; 
echo json_encode($arr);	
exit();
	}
	$Array = $Sxzs->GetSxzsAPon($id);
		$Array2 =  $Sxzs->GetSxzsRid($Array['rid']);
		$opentime= strtotime(date('G:i:s', $Array2['opentime']));
$endtime= strtotime(date('G:i:s', $Array2['endtime']));

	IF(time()<$opentime||TIME()>$endtime)
	{
					$arr['status']=0; 
$arr['content']="超出开放时段"; 
echo json_encode($arr);	
exit();
	}
	IF($Array['limittime']<time())
	{
		$Arr = array(
				'nowtype'	=> 3,
			);
		$row = $DB->updateArr('shixun_ap',$Arr,"WHERE id ='".$Array['id']."'");
$arr['status']=0; 
$arr['content']="超出最后期限"; 
echo json_encode($arr);	
exit();
	}else{
		if(empty($Array['shichangtime'])){
			$newend=$Array['iendtime'];
		}else{
			$newend=time()+$Array['shichangtime'];
		}
			
		
		$Arr = array(
				'nowtype'	=> 4,
				'realstarttime' => time(),
				'iendtime'=>$newend,
				
			);
		$row = $DB->updateArr('shixun_ap',$Arr,"WHERE id ='".$Array['id']."'");	
		$arr['status']=1; 
$arr['content']="OK"; 
echo json_encode($arr);	
exit();
	}
}
IF($LId == 'qiantui'){
						
if(isset($_POST['time']))$timejc=$_POST['time'];
								IF(empty($timejc)||time()-$timejc>1800)
	{
					$arr['status']=0; 
$arr['content']="页面过期 请刷新"; 
echo json_encode($arr);	
exit();
	}
	$Array = $Sxzs->GetSxzsAPon($id);

	IF($Array['iendtime']<time())
	{
		$Arr = array(
				'nowtype'	=> 5,
			);
		$row = $DB->updateArr('shixun_ap',$Arr,"WHERE id ='".$Array['id']."'");
$arr['status']=1; 
$arr['content']="自动签退"; 
echo json_encode($arr);	
exit();
	}else{

			
		
		$Arr = array(
				'nowtype'	=> 6,
				'realendtime' => time(),
			);
		$row = $DB->updateArr('shixun_ap',$Arr,"WHERE id ='".$Array['id']."'");	
		$arr['status']=1; 
$arr['content']="OK"; 
echo json_encode($arr);	
exit();
	}
}
IF($LId == 'chexiao'){
						
if(isset($_POST['time']))$timejc=$_POST['time'];
								IF(empty($timejc)||time()-$timejc>1800)
	{
					$arr['status']=0; 
$arr['content']="页面过期 请刷新"; 
echo json_encode($arr);	
exit();
	}
	$Array = $Sxzs->GetSxzsAPon($id);

	IF($Array['yuyuetime']<time())
	{
	
$arr['status']=0; 
$arr['content']="无法撤销"; 
echo json_encode($arr);	
exit();
	}else{

			
		
		$Arr = array(
				'nowtype'	=> 9,
				
			);
		$row = $DB->updateArr('shixun_ap',$Arr,"WHERE id ='".$Array['id']."'");	
		$arr['status']=1; 
$arr['content']="OK"; 
echo json_encode($arr);	
exit();
	}
}
IF($LId == 'addcg'){
			$number=$_SESSION['zid']['number'];

		$Array = $Sxzs->GetSxzsAPon($id);
			if(isset($_POST['title']))$title=$_POST['title'];
			if(isset($_POST['stype']))$stype=$_POST['stype'];
			if(isset($_POST['photo']))$photo=$_POST['photo'];
if(isset($_POST['content']))$content=$_POST['content'];
			$ip=getIP();
			if(empty($title)||empty($number)||empty($stype)||empty($photo)||empty($content)||empty($ip))
			{
			$arr['status']=0; 
$arr['content']="填写错误"; 
echo json_encode($arr);	
exit();
			}	
			$type=$_SESSION['zid']['type'];

	switch ($type)
{
case 1:
$sql2 = "SELECT * FROM jwinfo WHERE number ='{$number}' and isok=1";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
		$xy=$info['xy'];
		$xzb=$info['xzb'];
break;
case 2://无数据
$sql2 = "SELECT * FROM ghzl WHERE  number ='{$number}'";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
				$xy=$info['dname'];
				$xzb=$info['dnumber'];
break;
}
			if(empty($xy)||empty($xzb)){ECHO'1';
			$arr['status']=0; 
$arr['content']="资料登记错误"; 
echo json_encode($arr);	
exit();
			}
			
			$dir=ZRoot.'/temp/uploadimg/'.$number.'/';
			    $savepath = $dir.$photo; 
 if(file_exists($savepath)) {
	 $dir2=ZSystem.'/data/app/sxzs/';
if (!is_dir($dir2)) mkdir($dir2);
	 $dir2=ZSystem.'/data/app/sxzs/uploadimg/';
	 if (!is_dir($dir2)) mkdir($dir2);
	 $dir2=ZSystem.'/data/app/sxzs/uploadimg/'.$number.'/';
	 if (!is_dir($dir2)) mkdir($dir2);
	 $photonew=md5($number.TIME()).'.jpge';
	 copy($savepath,$dir2.$photonew);
	  if(file_exists($dir2.$photonew)) {
	  unlink($savepath);
	  $photo=$arrInfo['url']."/system/data/app/sxzs/uploadimg/".$number."/".$photonew;
	 
	  }else{
		  $arr['status']=0; 
$arr['content']="图片转移失败"; 
echo json_encode($arr);	
exit(); 
	  }
 }else{
$arr['status']=0; 
$arr['content']="上传图片丢失"; 
echo json_encode($arr);	
exit(); 
 }
			$ID=$Sxzs->SendCJ($Array['id'],$title,$xy,$xzb,$name,$number,$stype,$photo,$content,$ip);
			if(!empty($ID)){
				 deleteAll($dir);
				 		$Arr = array(
				'nowtype'	=> 7,
					'sctime'	=> time(),
				
			);
		$row = $DB->updateArr('shixun_ap',$Arr,"WHERE id ='".$Array['id']."'");	
		  $arr['status']=1; 
$arr['content']="提交成功"; 
$arr['id']=$ID; 
echo json_encode($arr);	
exit(); 
	  
 }else{
$arr['status']=0; 
$arr['content']="数据库故障"; 
echo json_encode($arr);	
exit(); 
 }
}
IF($LId == 'add'){
	$number0=@$number;
	IF(empty($number0))
	{
					$arr['status']=0; 
$arr['content']="身份识别失败"; 
echo json_encode($arr);	
exit();
	}
		$type=$_SESSION['zid']['type'];
	switch ($type)
{
case 1:
$sql2 = "SELECT * FROM jwinfo WHERE number ='{$number0}' and isok=1";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
		 $nianji=date('Y')-$info['szj'];
		 if(date('m')>=9)$nianji++;
		 switch ($nianji)
{
case 1:
  $info['sznj']="大一";
  break;
case 2:
  $info['sznj']="大二";
  break;
case 3:
 $info['sznj']="大三";
  break;
case 4:
 $info['sznj']="大四";
  break;  
default:
  $info['sznj']="离校";
}
			$collage = $info['xy'];	
			$xzb = $info['xzb'];	
			$xname = $info['xm'];	
break;
case 2://无数据
$sql2 = "SELECT * FROM ghzl WHERE  number ='{$number0}'";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
			$collage = $info['dname'];	
			$xzb = $info['dnumber'];	
			$xname = $info['name'];	
break;
case 3://无数据
		$collage = '访客';	
			$xzb = '';	
			$xname ='';	
break;
}
	$Array = $Sxzs->GetSxzsRid($id);
					if(isset($_POST['addt'])){
										if(isset($_POST['number']))$numberr=$_POST['number'];
							if(isset($_POST['sc']))$sc=$_POST['sc'];
								IF(empty($sc)||empty($numberr))
	{
					$arr['status']=0; 
$arr['content']="提交有误"; 
echo json_encode($arr);	
exit();
}
						$rqtime=TIME();
$date= date('Y-m-d', $rqtime);
$yuyuetime=TIME();	
					}ELSE{

				if(isset($_POST['number']))$numberr=$_POST['number'];
			if(isset($_POST['sj']))$sj=$_POST['sj'];
			if(isset($_POST['sc']))$sc=$_POST['sc'];
			if(isset($_POST['rq']))$rq=$_POST['rq'];
				IF(empty($sj)||empty($sc)||empty($rq)||empty($numberr))
	{
					$arr['status']=0; 
$arr['content']="提交有误"; 
echo json_encode($arr);	
exit();
}
$rqtime=strtotime($rq);	
$date= date('Y-m-d', $rqtime);
$yuyuetime=strtotime($sj);	}

$iendtime=strtotime("+".$sc,$yuyuetime);	
$shichangtime=$iendtime-$yuyuetime;
$limittime=$yuyuetime+$Array['limittime']-strtotime('2018-8-8');
$WHERE='where nowtype!="9" and yuyuetime<='.$yuyuetime.' and iendtime>='.$yuyuetime;
	    $sql = "select id from shixun_ap $WHERE";
		$row = $DB->query($sql);
		$nownum = $DB->num_rows($row);
		$WHERE='where nowtype!="9" and yuyuetime>='.$yuyuetime.' and iendtime<='.$iendtime;
	    $sql2 = "select id from shixun_ap $WHERE";
		$row2 = $DB->query($sql2);
		$nownum2 = $DB->num_rows($row2);
					$arr['status']=1; 
$arrcontent=$Array['number']-($nownum+$nownum2) ;
				IF($arrcontent<$numberr)
	{
					$arr['status']=0; 
$arr['content']="该时段可预约人数不足，当前仅剩余".$arrcontent; 
echo json_encode($arr);	
exit();
	}
	IF($rqtime>$yuyuetime||$yuyuetime>$iendtime||$yuyuetime>$limittime)
	{
					$arr['status']=0; 
$arr['content']="日期不合法"; 
echo json_encode($arr);	
exit();
	}
		IF($rqtime>$yuyuetime||$yuyuetime>=$iendtime||$yuyuetime>$limittime)
	{
					$arr['status']=0; 
$arr['content']="日期不合法"; 
echo json_encode($arr);	
exit();
	}
			IF($yuyuetime<time()-120)
	{
					$arr['status']=0; 
$arr['content']="不可以预约过去时间"; 
echo json_encode($arr);	
exit();
	}
	$opentime= strtotime(date('G:i:s', $Array['opentime']));
$endtime= strtotime(date('G:i:s', $Array['endtime']));
	$yuyuetime2= strtotime(date('G:i:s', $yuyuetime));
		$iendtime2= strtotime(date('G:i:s', $iendtime));
	IF($yuyuetime2<$opentime||$yuyuetime2>$endtime||$iendtime2<$opentime||$iendtime2>$endtime)
	{
					$arr['status']=0; 
$arr['content']="超出开放时段"; 
echo json_encode($arr);	
exit();
	}
		if(isset($_POST['addt'])){
	$nowarray=ARRAY(
 'type'  =>$Array['type'],
  'nowtype'  =>'4',
  'whereid' =>$Array['whereid'],
  'room' =>$Array['room'], 
  'roomid' =>$Array['roomid'],
  'rid' =>$Array['rid'],
  'name'  =>$Array['name'],
  'stype' =>@$type,
  'sname'  =>@$xname,
  'snumber'  =>$number0,
  'sxy'  =>@$collage,
  'sxzb'  =>@$xzb,
  'number' =>$numberr,
  'limittime' =>$limittime,
  'yuyuetime' =>$yuyuetime,
  'shichangtime' =>$shichangtime,
  'iendtime'=>$iendtime,
  'realstarttime' =>$yuyuetime,
  'realendtime' =>'',
  'sctime' =>'',
  'dptime' =>'',
  'othernumber'  =>'',
  'date' =>$date,
  'addtime'=>TIME(),
  'isok'=>'1',
		);}else{
				$nowarray=ARRAY(
 'type'  =>$Array['type'],
  'nowtype'  =>'1',
  'whereid' =>$Array['whereid'],
  'room' =>$Array['room'], 
  'roomid' =>$Array['roomid'],
  'rid' =>$Array['rid'],
  'name'  =>$Array['name'],
  'stype' =>@$type,
  'sname'  =>@$xname,
  'snumber'  =>$number0,
  'sxy'  =>@$collage,
  'sxzb'  =>@$xzb,
  'number' =>$numberr,
  'limittime' =>$limittime,
  'yuyuetime' =>$yuyuetime,
  'shichangtime' =>$shichangtime,
  'iendtime'=>$iendtime,
  'realstarttime' =>'',
  'realendtime' =>'',
  'sctime' =>'',
  'dptime' =>'',
  'othernumber'  =>'',
  'date' =>$date,
  'addtime'=>TIME(),
  'isok'=>'1',
  );
		}
  	$DB->create('shixun_ap',$nowarray);

					$arr['status']=1; 
$arr['content']=@$DB->insert_id(); 
echo json_encode($arr);	
exit();
	
}
function array_urlencode($data){
    $new_data = array();
    foreach($data as $key => $val){
        // 这里过滤mysql多余的数据
		if(is_numeric($key)){
        $new_data[urlencode($key)] = is_array($val) ? array_urlencode($val) : urlencode($val);}
    }
    return $new_data;
}
 function unique($data = array()){
        $tmp = array();
        foreach($data as $key => $value){
                //把一维数组键值与键名组合
                foreach($value as $key1 => $value1){
                        $value[$key1] = $key1 . '_|_' . $value1;//_|_分隔符复杂点以免冲突
                }
                $tmp[$key] = implode(',|,', $value);//,|,分隔符复杂点以免冲突
        }
        //对降维后的数组去重复处理
        $tmp = array_unique($tmp);
        //重组二维数组
        $newArr = array();
        foreach($tmp as $k => $tmp_v){
                $tmp_v2 = explode(',|,', $tmp_v);
                foreach($tmp_v2 as $k2 => $v2){
                        $v2 = explode('_|_', $v2);
                        $tmp_v3[$v2[0]] = $v2[1];
                }
                $newArr[$k] = $tmp_v3;
        }
        return $newArr;
}

function SSWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}
function deleteAll($path) {
    $op = dir($path);
    while(false != ($item = $op->read())) {
        if($item == '.' || $item == '..') {
            continue;
        }
        if(is_dir($op->path.'/'.$item)) {
            deleteAll($op->path.'/'.$item);
            rmdir($op->path.'/'.$item);
        } else {
            unlink($op->path.'/'.$item);
        }
    
    }   
}