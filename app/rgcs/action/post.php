<?php
define('AROOT',ZSystem.'/data/app/rgcs/'.$openid);
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
 if(count($r,0)!=144)
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
	 $oarr = SetRead('/system/data/app/rgcs/'.$openid.'/ok/o.php');	
 	}
 if(count($oarr,0)!=144)
{
	header("HTTP/1.1 404 Not Found");  
header("Status: 404 Not Found");  
exit; 
}	
 $total=array(
 'A'=>0,
 'B'=>0,
 'C'=>0,
 'D'=>0,
 'E'=>0,
 'F'=>0,
 'G'=>0,
 'H'=>0,
 'I'=>0,
 );
 $cslx='';
  $csnum=0;
 $result=ARRAY();
 foreach((array)$oarr as $key=>$Child)
 {
	 $result[$key]['title']=$Child['title'];
	  $result[$key]['pid']=$Child['pid'];
	  $postcd.=$Child['pid']."$";
	 $nowsroce=$Child['option'][$r[$key]]['score'];
 $postcd.=$Child['option'][$r[$key]]['id']."}";
 $total[$nowsroce]++;
	$result[$key]['score']=$nowsroce;
	$result[$key]['yoption']=$Child['option'][$r[$key]]['content'];

 }
 	 foreach((array)$total as $key2=>$Child2)
 {
	 
	 if($Child2>$csnum){
		 $csnum=$Child2;
		 $cslx=$key2;
	 }
 }
 $result['total']=json_encode($total);
SSetWrite( $result,"s.php");
$rtotal= $result['total'];
if(is_file(AROOT.'/ok/o.php'))
{
copyf(AROOT.'/ok/o.php',AROOT.'/result/o.php'); 
unlink(AROOT.'/ok/o.php'); 
 }
 $NICKNAMEE=@$_SESSION['wx']['nickname'];
$gonghao=@$_SESSION['csxx']['gonghao'];
	$xingbie=@$_SESSION['csxx']['xingbie'];
	$nianling=@$_SESSION['csxx']['nianling'];
	$jz=@$_SESSION['csxx']['jz'];
	$rzny=trimall(@$_SESSION['csxx']['rzny']);
	if(empty($_SESSION['csxx'])){
	header("HTTP/1.1 404 Not Found");  
header("Status: 404 Not Found");  
exit; 
ECHO'2';
}
	if(empty($gonghao)||empty($xingbie)||empty($nianling)||empty($jz)||empty($rzny)){
	header("HTTP/1.1 404 Not Found");  
header("Status: 404 Not Found");  
exit; 

}
		$ip=getIP();
			$id = $DB->create2('rg_result',array(
				'number'       => @$number,
				'openid'       => @$openid,
				'nickname'=>@ $NICKNAMEE,
				'gonghao'=>@$gonghao,
				'xingbie'=>@$xingbie,
				'nianling'=>@$nianling,
				'jz'=>@$jz,
				'rzny'=>@$rzny,
				'post'=>$postcd,
				'sroce'       => @$cslx,
				'result'       => @$rtotal,
				'addtime'	=> time(),
				'ip'	=> @$ip,
				'appid'	=> '1',
			));
	
 }else{
	 ECHO'1';
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
  function trimall($str)//删除空格
{
    $oldchar=array(" ","　","\t","\n","\r");
$newchar=array("","","","","");
    return str_replace($oldchar,$newchar,$str);
}