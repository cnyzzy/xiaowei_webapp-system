<?php
$postn=@urldecode($_POST['id']);
$postn = isset($_GET['id']) ? @urldecode($_GET['id']) : @urldecode($_POST['id']);
empty($params[0]) ? $LId = '' : $LId = $params[0];
if(empty($postn))
{
printjson("error",'非法数值');
}
$content = file_get_contents( ZApp.'/' . $AppName . '/action/logdata.php');
$rows = explode("\r\n\r\n", $content);
$page=$postn;
$size=3;
$pnum = ceil(count($rows) / $size);
 $arr = array_slice($rows, ($page-1)*$size, $size);
// print_R($arr );
  $newarr=array();
 foreach($arr as $key=>$val)
{//print_R($val );
	$temp=array();
 $temp=explode("\n",$val,2);
 if(empty($temp)||empty($temp[0])||empty($temp[1]))continue;
$temp[1]=nl2br(str_replace(chr(32),'&nbsp;',$temp[1]));
 $newarr[]=$temp;
}
if(count($newarr)==3)printjsonarray('ok',$newarr);
if(count($newarr)!=3&&count($newarr)>0)printjsonarray('okn',$newarr);
if(count($newarr)==0)printjsonarray('no',$newarr);
function printjson($type,$msg)
{
	ob_flush();
ob_clean();
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
echo urldecode($php_json); 
exit;
}
function printjsonarray($type,$msg)
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