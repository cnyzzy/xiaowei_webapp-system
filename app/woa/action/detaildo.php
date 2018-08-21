<?php
define('RROOT',ZRoot.'/system/data/app/woa/cache/'.$number.'/');
	if(empty($number)){

 printjson("error",'您还没有绑定，请绑定后再次操作');
	}
		if($_SESSION['zid']['type']!='2'&&$number!='15223232'){
printjson("error",'权限不足');
	}	
empty($params[0]) ? $ttt = '1' : $ttt = $params[0];
empty($params[1]) ? $idid = '1' : $idid = $params[1];
$number=$_SESSION['zid']['number'];
if(is_file(ZSystem.'/data/app/woa/cache/'.$number.'/'.$ttt.'-'.$idid.'-detail.php')){
		if(filemtime(ZSystem.'/data/app/woa/cache/'.$number.'/'.$ttt.'-'.$idid.'-detail.php')>time()-600){
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
$url.="0/".$idid."?opendocument";
$ch = curl_init();
 curl_setopt ($ch,CURLOPT_REFERER,"http://oa.yctu.edu.cn/oasys/index.nsf/index?readform");
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);        
curl_setopt($ch, CURLOPT_COOKIEFILE, ZSystem.'/data/app/woa/cookies/'.$number.'.php');
$content=curl_exec($ch);
$content = htmlspecialchars_decode(mb_convert_encoding($content,'UTF-8',"GBK"));

if(empty($content))	printjson("error",'OA服务不稳定');	
curl_close($ch);	
if(preg_match('/<\/OBJECT>(?:.*?)br>(.*?)<\/form>/ims', $content, $block)){
			$table = $block[1];
		$i=0;
			$arr=ARRAY();
		if(preg_match_all('/input name="RecordID" value="(.*?)" style=\"display:none\"/ims',$table ,$str_block2)){
		$arr['RecordID']=htmlspecialchars_decode($str_block2[1][0]);}
		if(preg_match_all('/<input(?:.*?)value="(?:.*?)">/ims',$table,$_block)){
			
	
				foreach($_block[0] as $c=>$v){
						if(preg_match_all('/type="hidden" name="(.*?)" value="(.*?)"/ims',$v,$str_block1))
							{if(!empty($str_block[1][0]))$arr[$str_block[1][0]]=htmlspecialchars_decode($str_block[2][0]);}

					if(preg_match_all('/name="(.*?)" type="hidden" value="(.*?)"/ims',$v,$str_block))
					{if(!empty($str_block[1][0]))$arr[$str_block[1][0]]=htmlspecialchars_decode($str_block[2][0]);
					if($str_block[1][0]=="Disposal_idea_show"||$str_block[1][0]=="Dep_idea_show"||$str_block[1][0]=="Off_idea_show")
					{
						$arr[$str_block[1][0]]= str_replace("[<br>]","<br>",$str_block[2][0]);
						$arr[$str_block[1][0]]=str_replace('????','',$arr[$str_block[1][0]]);
				}
				}

		}
}
if(preg_match('/<td colspan=4>(?:.*?)<tr>(.*?)<\/table>/ims', $content, $block)){
			$table = $block[1];
		$i=0;


		if(preg_match_all('/<img src="(?:.*?)"><a href=\'(.*?)\'/ims',$table ,$str_block2)){

									foreach($str_block2[1] as $c=>$v){
				$arr['attaurl'][$c]="http://oa.yctu.edu.cn".$v;}

					
		}
		
}
}
if(!empty($arr)&&!empty($arr['wjbt'])){
		SSetWrite($arr,$ttt.'-'.$idid.'-detail.php');
	  	printjson("ok",'同步数据成功');	
}else{
			printjson("no",'无数据');	
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