<?php

	if(empty($_SESSION['wx']['openid'])){
 printjson("error",'您还没有绑定');
	}
	$type=@$_SESSION['zid']['type'];
		if(empty($type)||($type!='1'&&$type!='2')){
		 printjson("error",'不能参与');
	}
//是否符合要求
empty($params[0]) ? $LId = '' : $LId = $params[0];
	$postn = isset($_GET['post']) ? @urldecode($_GET['post']) : @urldecode($_POST['post']);
 if(empty($postn)||empty($LId))printjson("error",'数据提交为空');	
if(eregi ( 'select|inert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|UNION|into|load_file|outfile', $postn )){  
printjson("error",'数据非法');
}

IF($LId == 'xy'){

 if(empty($arr))printjson("no",'查询为空');	



$arr=array_reverse(unique($arr));

		if(!empty($arr)){
			printjson("ok", $arr);
		}else{
			printjson("no",'查询不到');	
			
		}
}
elseIF($LId == 'txcx'){

		$sq3 = "SELECT xm,id,dqmc FROM  17xs WHERE dqmc like '%".$postn."%' or zxmc like '%".$postn."%' order by rand() ASC LIMIT 20";
$result2 =$DB->fetch_all_array($sq3);
		 if(empty($result2)||count($result2)<5){
			 $Apostn=$postn;
$strnum = mb_strlen($Apostn,'UTF8');
while ($strnum){
    $array[] = mb_substr($Apostn,0,1,'utf8');
    $Apostn = mb_substr($Apostn,1,$strnum,'utf8');
    $strnum = mb_strlen($Apostn,'UTF8');
}
 $newpost=implode("%",$array); 

			 if(isset( $newpost))
			 {$sq3 = "SELECT xm,id,dqmc FROM  17xs WHERE  dqmc like '%".$newpost."%' or zxmc like '%".$newpost."%' order by rand() ASC LIMIT 20";
			 $result3 =$DB->fetch_all_array($sq3);}
		 }

 if(empty($result3)&&empty($result2))printjson("no",'查询为空');	
$arr=array();
if(!empty($result2))$arr=$result2;
if(!empty($result2)&&!empty($result3))$arr=array_merge($arr,$result3);
if(empty($result2)&&!empty($result3))$arr=$result3;

$arr=array_reverse(unique($arr));

		if(!empty($arr)){
			printjson("ok", $arr);
		}else{
			printjson("no",'查询不到');	
			
		}
}
elseIF($LId == 'cscx'){
	if(!is_numeric($postn )||strlen($postn)!=8){  
printjson("error",'数据非法');
}
$sr=date("Y/n/j",strtotime($postn));
		$sq3 = "SELECT xm,id,csrq FROM  17xs WHERE csrq = '".$sr."' or csrq like '".date("Y",strtotime($postn))."/".date("n",strtotime($postn))."/".date("j",strtotime($postn))."' order by rand() ASC LIMIT 20";
$result2 =$DB->fetch_all_array($sq3);
		 if(empty($result2)||count($result2)<5){

$sq3 = "SELECT xm,id,csrq FROM  17xs WHERE csrq like '%/".date("n",strtotime($postn))."/".date("j",strtotime($postn))."' order by rand() ASC LIMIT 20";
			 $result3 =$DB->fetch_all_array($sq3);
		 }

 if(empty($result3)&&empty($result2))printjson("no",'查询为空');	
$arr=array();
if(!empty($result2))$arr=$result2;
if(!empty($result2)&&!empty($result3))$arr=array_merge($arr,$result3);
if(empty($result2)&&!empty($result3))$arr=$result3;

$arr=array_reverse(unique($arr));
		if(!empty($arr)){
			printjson("ok", $arr);
		}else{
			printjson("no",'查询不到');	
			
		}
}
ELSEIF($LId == 'detaild'){
		empty($_POST['type']) ? $type = '1' : $type = trim($_POST['type']);

			if(!is_numeric($type)||!is_numeric($postn)){  
			printjson("error",'查询数值非法');
}
switch ($type)
{
case 1:
$sq3 = "SELECT xm,xy,xb,sf FROM  17xs WHERE id = '".$postn."' ";
break;
case 2:
$sq3 = "SELECT xm,xy,xb,sf,zxmc,dqmc FROM  17xs WHERE id = '".$postn."' ";
break;
case 3:

$sq3 = "SELECT xm,xy,xb,sf,csrq FROM  17xs WHERE id = '".$postn."' ";
break;

default://无数据
$sq3 = "SELECT xm,xy,xb,sf FROM  17xs WHERE id = '".$postn."' ";
break;
}


$result3 =$DB->once_fetch_array($sq3);
	if(empty($result3))printjson("no",'查询为空');	
		if(!empty($result3)){
			printjson("ok",$result3);
		}else{
			printjson("no",'查询不到');			
		}

}else{
	printjson("no",'访问非法');	
}

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
function splitName($fullname){  
     $hyphenated = array('欧阳','太史','端木','上官','司马','东方','独孤','南宫','万俟','闻人','夏侯','诸葛','尉迟','公羊','赫连','澹台','皇甫',  
        '宗政','濮阳','公冶','太叔','申屠','公孙','慕容','仲孙','钟离','长孙','宇文','城池','司徒','鲜于','司空','汝嫣','闾丘','子车','亓官',  
        '司寇','巫马','公西','颛孙','壤驷','公良','漆雕','乐正','宰父','谷梁','拓跋','夹谷','轩辕','令狐','段干','百里','呼延','东郭','南门',  
        '羊舌','微生','公户','公玉','公仪','梁丘','公仲','公上','公门','公山','公坚','左丘','公伯','西门','公祖','第五','公乘','贯丘','公皙',  
        '南荣','东里','东宫','仲长','子书','子桑','即墨','达奚','褚师');  
        $vLength = mb_strlen($fullname, 'utf-8');  
        $lastname = '';  
        $firstname = '';//前为姓,后为名  
        if($vLength > 2){  
            $preTwoWords = mb_substr($fullname, 0, 2, 'utf-8');//取命名的前两个字,看是否在复姓库中  
            if(in_array($preTwoWords, $hyphenated)){  
                $lastname = $preTwoWords;  
                $firstname = mb_substr($fullname, 2, 10, 'utf-8');  
            }else{  
                $lastname = mb_substr($fullname, 0, 1, 'utf-8');  
                $firstname = mb_substr($fullname, 1, 10, 'utf-8');  
            }  
        }else if($vLength == 2){//全名只有两个字时,以前一个为姓,后一下为名  
            $lastname = mb_substr($fullname ,0, 1, 'utf-8');  
            $firstname = mb_substr($fullname, 1, 10, 'utf-8');  
        }else{  
            $lastname = $fullname;  
        }  
        return array($lastname, $firstname);  
}