<?php
define('AROOT',ZSystem.'/data/app/xjxg/'.$openid);
define('RROOT',AROOT.'/result/');

if(isset($_POST['submitdata'])){
$postcd='';
$r=array();
$str=$_POST['submitdata'];
$a=explode("}",$str); 
foreach((array)$a as $key=>$Child)
 {
	 $b=explode("$",$Child); 
	 $r[$b[0]-1]=$b[1]-1;
 }
 if(count($r,0)!=20)
{
	header("HTTP/1.1 404 Not Found");  
header("Status: 404 Not Found");  
exit; 
}
 if(is_file(AROOT.'/ok/o.php'))	
 {
	if(filemtime(AROOT.'/ok/o.php')>time()-6){ header("HTTP/1.1 404 Not Found");  
header("Status: 404 Not Found");  
exit; 
}
	 $oarr = SetRead('/system/data/app/xjxg/'.$openid.'/ok/o.php');	
 	}
 if(count($oarr,0)!=20)
{
	header("HTTP/1.1 404 Not Found");  
header("Status: 404 Not Found");  
exit; 
}	
 $total=0;
 $result=ARRAY();
 foreach((array)$oarr as $key=>$Child)
 {
	 $result[$key]['title']=$Child['title'];
	  $result[$key]['pid']=$Child['pid'];
	  $postcd.=$Child['pid']."$";
	 $nowsroce=$Child['option'][$r[$key]]['score'];
 $postcd.=$Child['option'][$r[$key]]['id']."}";
 $total+= $nowsroce;
	$result[$key]['score']=$nowsroce;
	$result[$key]['yoption']=$Child['option'][$r[$key]]['content'];
	 foreach((array)$Child['option'] as $key2=>$Child2)
 {
	 if($Child2['score']==5)$result[$key]['roption']=$Child2['content'];
 }
 }
 $result['total']=$total;
SSetWrite( $result,"s.php");
if(is_file(AROOT.'/ok/o.php'))
{
copyf(AROOT.'/ok/o.php',AROOT.'/result/o.php'); 
unlink(AROOT.'/ok/o.php'); 
 }
 $NICKNAMEE=@$_SESSION['wx']['nickname'];
		$ip=getIP();
			$id = $DB->create('ks_result',array(
				'number'       => @$number,
				'openid'       => @$openid,
				'nickname'=>@ $NICKNAMEE,
				'post'=>$postcd,
				'sroce'       => @$total,
				'addtime'	=> time(),
				'ip'	=> @$ip,
				'appid'	=> '1',
			));
	
 }else{
header("HTTP/1.1 404 Not Found");  
header("Status: 404 Not Found");  
exit;  
 }
 function SSetWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}	
function copyf($file1,$file2){ 
 $contentx =@file_get_contents($file1); 
  $openedfile = fopen($file2, "w"); 
  fwrite($openedfile, $contentx); 
  fclose($openedfile); 
   if ($contentx === FALSE) { 
   $status=false; 
   }else $status=true; 
   return $status; 
  } 