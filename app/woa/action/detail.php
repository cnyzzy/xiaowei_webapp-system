<?php
$number=$_SESSION['zid']['number'];
$type=$_SESSION['zid']['type'];
		if($type!='2'&&$number!='15223232'){
$isstop=1;
	}else{
		$isstop=0;
	}
if(is_file(ZSystem.'/data/app/woa/password/'.$number.'.php')){
				$arr = SetRead('/system/data/app/woa/password/'.$number.'.php');
			}ELSE{
					header("Location:/woa"); 
			}
empty($params[0]) ? $ttt = '1' : $ttt = $params[0];
empty($params[1]) ? $idid = '1' : $idid = $params[1];
	if(is_file(ZSystem.'/data/app/woa/cache/'.$number.'/'.$ttt.'-'.$idid.'-detail.php')){
		if(filemtime(ZSystem.'/data/app/woa/cache/'.$number.'/'.$ttt.'-'.$idid.'-detail.php')>time()-600){
			$isneed=0;
			$arr = SetRead('/system/data/app/woa/cache/'.$number.'/'.$ttt.'-'.$idid.'-detail.php');
if(!empty($arr['Attachments'])&&!empty($arr['Attachmentnames']))
{$Attach1 = explode(',',$arr['Attachmentnames']); 
}
		}else{
			$isneed=1;
		}
			}else{$isneed=1;}


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

