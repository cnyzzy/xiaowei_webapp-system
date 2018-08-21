<?php  
define('RROOT',ZSystem.'/data/app/Wblogin');
header("Content-Type:text/html;charset=utf-8");
session_start();

$arrWxapi = SetRead('/system/config/Public/Wbapi.php');
if(isset($_GET['source'])&&isset($_GET['uid'])&&isset($_GET['auth_end'])){
	 $source=$_GET['source'];
 $uid=$_GET['uid'];
  $auth_end=$_GET['auth_end'];
  if($arrWxapi['APPID']!=$source)exit;


//检查绑定
		 $sql = "SELECT * FROM wbid WHERE openid ='$uid' and isok=1";
		$result = $DB->query($sql);
		$row = $DB->fetch_array($result);
		if(!empty($row)){
			//绑定


		if($row['stop']==1){ECHO'该微信号或身份被停用';EXIT;}else{
			//ok
			if(!empty($row['number'])&&is_file(RROOT.$row['number'].'.php'))
{
unlink(RROOT.$row['number'].'.php'); 
 }
 if(!empty($row['number'])&&is_file(RROOT.$row['number'].'l.php'))
{
unlink(RROOT.$row['number'].'l.php'); 
 }
	unset($_SESSION['zid']);
unset($_SESSION['wxid']);
	EXIT;
		}}
	


  }ELSE{

  }
   
function getJson($url,$post='',$json=''){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 if($post) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
			
        }
		 if($json) {
           curl_setopt($ch, CURLOPT_POSTFIELDS,$json);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($json))
);
        }
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output, true);
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