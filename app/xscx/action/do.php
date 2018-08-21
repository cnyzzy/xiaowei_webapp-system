<?php

function rewrite($filename, $data) {    
  $filenum = fopen ( $filename, "w" );    
  flock ( $filenum, LOCK_EX );    
  fwrite ( $filenum, $data );    
  fclose ( $filenum );    
}
empty($params[0]) ? $LId = '1' : $LId = $params[0];
IF($LId == 're'){
	empty($_POST['name']) ? $name = '' : $name = mysql_real_escape_string (trim($_POST['name']));
		empty($_POST['idid']) ? $idid = '' : $idid = mysql_real_escape_string (trim($_POST['idid']));
	//个人信息
	if($idid!='8'&&$name!='8'){
	
	$sql3="SELECT  * FROM xssj1 where xm = '{$name}' and sfzh = '{$idid}'";	
	$row = @$DB->once_fetch_array($sql3);
	if(!EMPTY($row['id']))
	{
	 printjson('ok',$row);

}else{
		 printjson('error','查询为空');

	}
	}else{
		 printjson('error',"提交有误");
}
}
function printjson($type,$msg)
{

IF(is_array($msg)){
	$Errormsg=array (
  'type' => urlencode ($type),
  'msg' => array_urlencode ($msg),
); 
}ELSE
	
	{$Errormsg=array (
  'type' => urlencode ($type),
  'msg' => urlencode ($msg),
); }
$php_json = json_encode($Errormsg); 
ob_flush();
ob_clean();
echo urldecode($php_json); 
exit;
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