<?php
empty($params[0]) ? $ttt = '1' : $ttt = $params[0];
empty($params[1]) ? $zt = '1' : $zt = $params[1];
empty($params[2]) ? $page = '1' : $page = $params[2];
$number=$_SESSION['zid']['number'];
$type=$_SESSION['zid']['type'];
		if($type!='2'&&$number!='15223232'||empty($number)){
$isstop=1;
	}else{
		$isstop=0;
	}
	if(is_file(ZSystem.'/data/app/woa/cache/'.$number.'/'.$ttt.'-'.$zt.'-'.$page.'.php')){
		if(filemtime(ZSystem.'/data/app/woa/cache/'.$number.'/'.$ttt.'-'.$zt.'-'.$page.'.php')>(time()-600)){
			$isneed=0;
			$arrok = SetRead('/system/data/app/woa/cache/'.$number.'/'.$ttt.'-'.$zt.'-'.$page.'.php');
			if($ttt=='1')$ARR=$arrok;
if($ttt=='2')$ARR2=$arrok;
if($ttt!='1'&&$ttt!='2')$ARR3=$arrok;
				if(is_file(ZSystem.'/data/app/woa/cache/'.$number.'/'.$ttt.'-'.$zt.'-'.$page.'-p.php')){
					$arrp = SetRead('/system/data/app/woa/cache/'.$number.'/'.$ttt.'-'.$zt.'-'.$page.'-p.php');
empty($arrp['now']) ? $nowpage = '1' : $nowpage = $arrp['now'];	
empty($arrp['t']) ? $tpage = '1' : $tpage = $arrp['t'];
$qpage=$nowpage-1;
$hpage=$nowpage+1;
				}
		}else{ECHO"过期";
			$isneed=1;
		}
			}else{
				ECHO"无文件";
				$isneed=1;}



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