<?php
header("Content-Type:text/html;charset=utf-8");
$time = time();
$mysqlname='wxid';
if(is_qq()||is_tim())$mysqlname='qqid';
if(is_wb())$mysqlname='wbid';
empty($params[0]) ? $CHO  = '1' : $CHO  = $params[0];
	 if(isset($_POST['username'])&&isset($_POST['password'])){
	$snumber = $_POST['username'];
	$spassword=$_POST['password'];
	 }else{
$rarr['isok']	='0';
  ECHO json_encode($rarr);
  EXIT;
}	
if($CHO=="stu"){

if(strlen($snumber)!=8){
$rarr['isok']	='0';
  ECHO json_encode($rarr);
  EXIT;
}	

		 $sql = "SELECT * FROM ".$mysqlname." WHERE number ='{$snumber}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);	
				if(empty($row)){
								$Arr['isok']=2;
								$Arr['msg']='尚未绑定';
			    echo trim(json_encode($Arr));
				exit;
		}
		if($row['islock']=='1'){
								$Arr['isok']=2;
								$Arr['msg']='绑定锁定保护';
			    echo trim(json_encode($Arr));
				exit;
		}
		 $sql = "SELECT * FROM jwpass WHERE number ='{$snumber}' and pass='{$spassword}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);	
		if(empty($row)){
								$Arr['isok']=2;
								$Arr['msg']='验证失败';
			    echo trim(json_encode($Arr));
				exit;
		}
		
		$sql2 = "update ".$mysqlname." SET isok = 0 where number = '{$snumber}' and isok = 1";
				if(!($DB->query($sql2))){
					$rarr['isok']	=2;
					$rarr['msg']='数据操作失败';
  ECHO json_encode($rarr);
  EXIT;
					
				}else{
					$rarr['isok']	=1;
					$rarr['msg']='成功解绑';
  ECHO json_encode($rarr);
  EXIT;
			}	
			
					}
	
if($CHO=="tea"){
	
if(strlen($snumber)>5){
$rarr['isok']	='0';
  ECHO json_encode($rarr);
  EXIT;
}	

		 $sql = "SELECT * FROM ".$mysqlname." WHERE number ='{$snumber}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);	
				if(empty($row)){
								$Arr['isok']=2;
								$Arr['msg']='尚未绑定';
			    echo trim(json_encode($Arr));
				exit;
		}
		if($row['islock']=='1'){
								$Arr['isok']=2;
								$Arr['msg']='绑定锁定保护';
			    echo trim(json_encode($Arr));
				exit;
		}
	$sql2 = "SELECT * FROM ghzl WHERE name ='{$spassword}' and number ='{$snumber}'";
		$result2 = $DB->query($sql2);
		$row2 = $DB->fetch_array($result2);
		if(empty($row2['id'])){//没有资料
					$rarr['isok']	=2;
					$rarr['msg']='验证失败';
  ECHO json_encode($rarr);
  EXIT;
		}
		$m=@$_POST['m'];
		if(strlen($m)!=11){
$rarr['isok']	='0';
  ECHO json_encode($rarr);
  EXIT;
}
				$query = $DB->query("select * from mobiles where mobile='$m' and number='{$snumber}' and isok='1'");
		$Num = $DB->num_rows($query);
			if($Num==0){
								$Arr['isok']=2;
								$Arr['msg']='验证失败';
			    echo trim(json_encode($Arr));
				exit;
		}
		$sql2 = "update ".$mysqlname." SET isok = 0 where number = '{$snumber}' and isok = 1";
				if(!($DB->query($sql2))){
					$rarr['isok']	=2;
					$rarr['msg']='数据操作失败';
  ECHO json_encode($rarr);
  EXIT;
					
				}else{
					$rarr['isok']	=1;
					$Arr['msg']='成功解绑';
  ECHO json_encode($rarr);
  EXIT;
			}	
			
					}
if($CHO=="gue"){
	
if(strlen($snumber)>11){
$rarr['isok']	='0';
  ECHO json_encode($rarr);
  EXIT;
}	

		 $sql = "SELECT * FROM ".$mysqlname." WHERE number ='{$snumber}' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);	
				if(empty($row)){
								$Arr['isok']=2;
								$Arr['msg']='尚未绑定';
			    echo trim(json_encode($Arr));
				exit;
		}
		if($row['islock']=='1'){
								$Arr['isok']=2;
								$Arr['msg']='绑定锁定保护';
			    echo trim(json_encode($Arr));
				exit;
		}

		if($row['number']!=$snumber||$row['name']!=$spassword){//没有资料
					$rarr['isok']	=2;
					$rarr['msg']='验证失败';
  ECHO json_encode($rarr);
  EXIT;
		}
		$sql2 = "update ".$mysqlname." SET isok = 0 where number = '{$snumber}' and isok = 1";
				if(!($DB->query($sql2))){
					$rarr['isok']	=2;
					$rarr['msg']='数据操作失败';
  ECHO json_encode($rarr);
  EXIT;
					
				}else{
					$rarr['isok']	=1;
					$Arr['msg']='成功解绑';
  ECHO json_encode($rarr);
  EXIT;
			}	
			
					}

function getJson($url,$post=''){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 if($post) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        }
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output, true);
	
}

/**
 * 读取/dev/urandom获取随机数
 * @param $len
 * @return mixed|string
 */
function randomFromDev($len,$format='ALL') {
   $is_abc = $is_numer = 0;
$password = $tmp =''; 
switch($format){
case 'ALL':
$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
break;
case 'CHAR':
$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
break;
case 'NUMBER':
$chars='0123456789';
break;
default :
$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
break;
} 
mt_srand((double)microtime()*1000000*getmypid());
while(strlen($password)<$len){
$tmp =substr($chars,(mt_rand()%strlen($chars)),1);
if(($is_numer <> 1 && is_numeric($tmp) && $tmp > 0 )|| $format == 'CHAR'){
$is_numer = 1;
}
if(($is_abc <> 1 && preg_match('/[a-zA-Z]/',$tmp)) || $format == 'NUMBER'){
$is_abc = 1;
}
$password.= $tmp;
}
if($is_numer <> 1 || $is_abc <> 1 || empty($password) ){
$password = randpw($len,$format);
}
return $password;
}

?>
