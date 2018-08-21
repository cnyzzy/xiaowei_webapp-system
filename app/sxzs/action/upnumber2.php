<?php
empty($params[0]) ? $LId = '1' : $LId = intval($params[0]);
empty($params[1]) ? $id = '1' : $id = $params[1];

$Sxzs = new Sxzs($DB);
	$Array = $Sxzs->GetSxzsRid($LId);
				if(isset($_POST['number']))$numberr=$_POST['number'];
			if(isset($_POST['sj']))$sj=$_POST['sj'];
			if(isset($_POST['sc']))$sc=$_POST['sc'];
			if(isset($_POST['rq']))$rq=$_POST['rq'];
if($numberr!='9701'){
	
IF(empty($sj)||empty($sc)||empty($rq)||empty($numberr))
	{
					$arr['status']=0; 
$arr['content']="提交有误"; 
echo json_encode($arr);	
exit();
}}
else{
	IF(empty($sc)||empty($numberr))
	{
					$arr['status']=0; 
$arr['content']="提交有误"; 
echo json_encode($arr);	
exit();
}
}
if($numberr=='9701'){	
$rqtime=TIME();
$date= date('Y-m-d', $rqtime);
$yuyuetime=TIME();	
}ELSE{$rqtime=strtotime($rq);	
$date= date('Y-m-d', $rqtime);
$yuyuetime=strtotime($sj);	}
$iendtime=strtotime("+".$sc,$yuyuetime);	
$shichangtime=$iendtime-$yuyuetime;
$limittime=$yuyuetime+$Array['limittime']-strtotime('2018-8-8');
	IF(empty($Array))
	{
					$arr['status']=0; 
$arr['content']="房间不存在"; 
echo json_encode($arr);	
exit();
	}
$opentime= strtotime(date('G:i:s', $Array['opentime']));
$endtime= strtotime(date('G:i:s', $Array['endtime']));
	IF($yuyuetime<$opentime||$yuyuetime>$endtime||$iendtime<$opentime||$iendtime>$endtime)
	{
					$arr['status']=0; 
$arr['content']="超出时段"; 
echo json_encode($arr);	
exit();
	}
		$WHERE='where nowtype!="9" and yuyuetime<='.$yuyuetime.' and iendtime>='.$yuyuetime;
	    $sql = "select id from shixun_ap $WHERE";
		$row = $DB->query($sql);
		$nownum = $DB->num_rows($row);
		$WHERE='where nowtype!="9" and yuyuetime>='.$yuyuetime.' and iendtime<='.$iendtime;
	    $sql2 = "select id from shixun_ap $WHERE";
		$row2 = $DB->query($sql2);
		$nownum2 = $DB->num_rows($row2);
					$arr['status']=1; 
$arr['zynumber']=$nownum+$nownum2; 
$arr['content']=$Array['number']-($nownum+$nownum2) ;
echo json_encode($arr);	
exit();
	
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
?>