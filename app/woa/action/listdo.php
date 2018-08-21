<?php
define('RROOT',ZRoot.'/system/data/app/woa/cache/'.$number.'/');
	if(empty($number)){

 printjson("error",'您还没有绑定，请绑定后再次操作');
	}
		if($_SESSION['zid']['type']!='2'&&$number!='15223232'){
printjson("error",'权限不足');
	}	
empty($params[0]) ? $ttt = '1' : $ttt = $params[0];
empty($params[1]) ? $zt = '1' : $zt = $params[1];
empty($params[2]) ? $page = '1' : $page = $params[2];

if(is_file(ZSystem.'/data/app/woa/cache/'.$number.'/'.$ttt.'-'.$zt.'-'.$page.'.php')){
		if(filemtime(ZSystem.'/data/app/woa/cache/'.$number.'/'.$ttt.'-'.$zt.'-'.$page.'.php')>time()-600){
			printjson("ok",'请勿频繁刷新');	
		}
			}
if(is_file(ZSystem.'/data/app/woa/password/'.$number.'.php')){
				$arr = SetRead('/system/data/app/woa/password/'.$number.'.php');
			}
if(is_file(ZSystem.'/data/app/woa/cookies/'.$number.'.php')){
	//检测是否有效
	if(isloginq($number))
	{
		$islogin=1;
	}else{
		printjson("login",'请重新登录');	
		$islogin=0;
	}
}

switch ($ttt)
{
case 1:
$titlename="发文管理";
$url="http://oa.yctu.edu.cn/oasys/WorkFlow/fwgl.nsf/";
$dirname="fwgl.nsf";
break;
case 2:
$titlename="收文管理";
$url="http://oa.yctu.edu.cn/oasys/WorkFlow/swgl.nsf/";
$dirname="swgl.nsf";
break;
case 3:
$titlename="党委文件";
$url="http://oa.yctu.edu.cn/oasys/WorkFlow/dwfw.nsf/";
$dirname="dwfw.nsf";
break;
case 4:
$titlename="行政文件";
$url="http://oa.yctu.edu.cn/oasys/WorkFlow/xzfw.nsf/";
$dirname="xzfw.nsf";
break;
case 5:
$titlename="党办文件";
$url="http://oa.yctu.edu.cn/oasys/WorkFlow/dbfw.nsf/";
$dirname="dbfw.nsf";
break;
case 6:
$titlename="校办文件";
$url="http://oa.yctu.edu.cn/oasys/WorkFlow/xbfw.nsf/";
$dirname="xbfw.nsf";
break;
case 7:
$titlename="部门文件";
$url="http://oa.yctu.edu.cn/oasys/WorkFlow/bmfw.nsf/";
$dirname="bmfw.nsf";
break;
default://无数据
$titlename="发文管理";
$url="http://oa.yctu.edu.cn/oasys/WorkFlow/fwgl.nsf/";
$dirname="fwgl.nsf";
break;
}
switch ($zt)
{
case 1:
$url.="ViewDocument?OpenForm";
break;
case 2:
$url.="ViewDBDocument?OpenForm";
break;
case 3:
$url.="ViewProcessedDocument?OpenForm";
break;
default://无数据
$zt=1;
$url.="ViewDocument?OpenForm";
break;
}
IF($page!='1')$url.="&page=".$page;
$ch = curl_init();
 curl_setopt ($ch,CURLOPT_REFERER,"http://oa.yctu.edu.cn/oasys/index.nsf/index?readform");
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);        
curl_setopt($ch, CURLOPT_COOKIEFILE, ZSystem.'/data/app/woa/cookies/'.$number.'.php');
$content=curl_exec($ch);
$content = mb_convert_encoding(htmlspecialchars_decode($content),'UTF-8',"GBK");
if(empty($content))	printjson("error",'OA服务不稳定');	
curl_close($ch);	
preg_match_all('/<td align=right class=font_remind>第(.*?)\/(.*?)页/ims',$content,$s);
empty($s[1][0]) ? $nowpage = '1' : $nowpage = $s[1][0];
empty($s[2][0]) ? $tpage = '1' : $tpage = $s[2][0];
$arrp=array(
'now'=>$nowpage,
't'=>$tpage,
);
		SSetWrite($arrp,$ttt.'-'.$zt.'-'.$page.'-p'.'.php');

if($ttt=='1'){
		$ARR=ARRAY();
if(preg_match('/<table width=\"96%\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\" bordercolorlight=\"C0BFD1\" bordercolordark=\"#FFFFFF\" bgcolor=\"#FFFFFF\" align=\"center\" frame=\"void\" rules=\"rows\">(.*?)<\/table>/ims', $content, $block)){
if($zt=='1')
{
				
		$table = $block[1];
		$i=0;
		if(preg_match_all('/<tr(?:.*?)?>(.*?)<\/tr>/ims',$table,$_block)){
				foreach($_block[1] as $c=>$v){
					
					preg_match_all('/<div align=\'left\'>(.*?)<\/div>/ims',$v,$str_block);
		if(!empty($str_block[1])){
					$ARR[$i]=$str_block[1];

					preg_match_all('/<a href=\/oasys\/WorkFlow\/(.*?)\/0\/(.*?)\?opendocument  onClick=(.*?)>(.*?)<\/a>/ims',$str_block[1][2],$str);
					$ARR[$i][2]=$str[4][0];
					$ARR[$i][5]=$str[2][0];
		$i++;
		}
		}
}}
IF($zt=='3'){
			
		$table = $block[1];
		$i=0;
		if(preg_match_all('/<tr(?:.*?)>(.*?)<td(?:.*?)><div align=\'left\'>(?:.*?)<\/div><\/td><td(?:.*?)><div align=\'left\'>(?:.*?)<\/div><\/td><td(?:.*?)><div align=\'left\'>(?:.*?)<\/div><\/td><td(?:.*?)><div align=\'left\'>(?:.*?)<\/div><\/td>/ims',$table,$_block)){
				foreach($_block[0] as $c=>$v){
					
					preg_match_all('/<div align=\'left\'>(.*?)<\/div>/ims',$v,$str_block);
			preg_match_all('/<a href=\/oasys\/WorkFlow\/(.*?)\/0\/(.*?)\?opendocument onClick=(.*?)>(.*?)<\/div>/ims',$v,$str);

		if(!empty($str_block[1])){
		$ARR[$i][3]=$str_block[1][2];
		$ARR[$i][4]=$str_block[1][3];
		$ARR[$i][0]=$str_block[1][0];
		$ARR[$i][5]=$str[2][0];
		$ARR[$i][2]=$str[4][0];
					
		$i++;
		}
	
		}
}
}
IF($zt=='2'){		
	
		$table = $block[1];
		$i=0;
		if(preg_match_all('/<tr(?:.*?)?>(.*?)<\/tr(?:.*?)?>/ims',$table,$_block)){
				foreach($_block[1] as $c=>$v){

					preg_match_all('/<div align=\'left\'>(.*?)<\/div>/ims',$v,$str_block);
			preg_match_all('/<a href=\/oasys\/WorkFlow\/(.*?)\/0\/(.*?)\?opendocument  onClick=(.*?)>(.*?)<\/div>/ims',$v,$str);

		if(!empty($str_block[1])){

		$ARR[$i][0]=$str_block[1][0];
		$ARR[$i][1]=$str_block[1][1];
		$ARR[$i][2]=$str[4][0];
		$ARR[$i][3]=$str_block[1][3];
		$ARR[$i][4]=$str_block[1][4];
		$ARR[$i][5]=$str[2][0];
		
					
		$i++;
		}

		}
}
}

}
if(!empty($ARR)){
		SSetWrite($ARR,$ttt.'-'.$zt.'-'.$page.'.php');
	  	printjson("ok",'同步数据成功');	
}else{
	
			printjson("no",'无数据');	
}
}


if($ttt=='2'){
		$ARR2=ARRAY();
if(preg_match('/<table width=\"96%\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\" bordercolorlight=\"C0BFD1\" bordercolordark=\"#FFFFFF\" bgcolor=\"#FFFFFF\" align=\"center\" frame=\"void\" rules=\"rows\">(.*?)<\/table>/ims', $content, $block)){
if($zt=='1')
{
				
		$table = $block[1];
		$i=0;
		if(preg_match_all('/<tr(?:.*?)?>(.*?)<\/tr>/ims',$table,$_block)){
				foreach($_block[1] as $c=>$v){
					
					preg_match_all('/<div align=\'left\'>(.*?)<\/div>/ims',$v,$str_block);
		if(!empty($str_block[1])){
					$ARR2[$i]=$str_block[1];
					
					preg_match_all('/<a href=\/oasys\/WorkFlow\/(.*?)\/0\/(.*?)\?opendocument  onClick=(.*?)>(.*?)<\/a>/ims',$str_block[1][2],$str);
					$ARR2[$i][2]=$str[4][0];
					$ARR2[$i][5]=$str[2][0];

		$i++;
		}
		}
}}
if($zt=='3'){
				
		$table = $block[1];
		$i=0;
		if(preg_match_all('/<tr(?:.*?)?>(.*?)<\/tr(?:.*?)?>/ims',$table,$_block)){
				foreach($_block[1] as $c=>$v){
					preg_match_all('/<div align=\'left\'>(.*?)<\/div>/ims',$v,$str_block);
		if(!empty($str_block[1])){
preg_match_all('/<a href=\/oasys\/WorkFlow\/(.*?)\/0\/(.*?)\?opendocument onClick=(.*?)>(.*?)<\/div>/ims',$str_block[0][0],$str);
			$ARR2[$i][0]=$str[4][0];
		$ARR2[$i][1]=$str_block[1][1];
		$ARR2[$i][2]=$str_block[1][2];
		$ARR2[$i][3]=$str[2][0];		
		$i++;
		}

		}

}
}
}
if(!empty($ARR2)){
		SSetWrite($ARR2,$ttt.'-'.$zt.'-'.$page.'.php');
	  	printjson("ok",'同步数据成功');	
}else{
			printjson("no",'无数据');	
}
}
IF($ttt!=='1'&&$ttt!='2')
{
$ARR3=ARRAY();
if(preg_match('/<table width=\"96%\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\" bordercolorlight=\"C0BFD1\" bordercolordark=\"#FFFFFF\" bgcolor=\"#FFFFFF\" align=\"center\" frame=\"void\" rules=\"rows\">(.*?)<\/table>/ims', $content, $block)){

				
$table = $block[1];
		$i=0;
		if(preg_match_all('/<tr class=(?:.*?)>(.*?)号<\/div><\/td>/ims',$table,$_block)){
				foreach($_block[0] as $c=>$v){
					preg_match_all('/<div align=\'left\'>(.*?)<\/div>/ims',$v,$str_block);
					
		if(!empty($str_block[1])){
preg_match_all('/<a href=\/oasys\/WorkFlow\/(.*?)\/0\/(.*?)\?opendocument onClick=(.*?)>(.*?)<\/div>/ims',$str_block[0][0],$str);
			$ARR3[$i][0]=$str[4][0];
		$ARR3[$i][1]=$str_block[1][1];
		$ARR3[$i][2]=$str_block[1][2];
		$ARR3[$i][3]=$str[2][0];
				
		$i++;
		
		}

		}
}
}
if(!empty($ARR3)){
		SSetWrite($ARR3,$ttt.'-'.$zt.'-'.$page.'.php');
	  	printjson("ok",'同步数据成功');	
}else{
			printjson("no",'无数据');	
}
}

function SSetWrite($Data,$Dir){
	$File = RROOT.$Dir;
	if(is_file($File)) unlink($File);
	 @$fp = fopen($File,'a');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	 @$fw = fwrite($fp,$Data);
	fclose($fp);
}
	function isloginq($number)
	{
$ch = curl_init();
 curl_setopt ($ch,CURLOPT_REFERER,"http://oa.yctu.edu.cn/oasys/index.nsf/index?readform");
curl_setopt($ch, CURLOPT_URL, "http://oa.yctu.edu.cn/oasys/index.nsf/topbelow?openform");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);        
curl_setopt($ch, CURLOPT_COOKIEFILE, ZSystem.'/data/app/woa/cookies/'.$number.'.php');
$html=curl_exec($ch);

curl_close($ch);	
	if(strpos($html,"LoginLog=1"))
	{return true;}ELSE
		{RETURN false;}
	}
function printjson($type,$msg)
{
	ob_flush();
ob_clean();

			$Errormsg=array (
  'type' => urlencode ($type),
  'msg' => urlencode ($msg),
); 
$php_json = json_encode($Errormsg); 
echo urldecode($php_json); 
exit;
}	