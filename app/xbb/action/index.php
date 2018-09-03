<?php
define('AROOT',ZSystem.'/data/app/xbb');
$iscx=1;
$iserror=0;
$Wx = new Wx();
$signPackage=$Wx->getSignPackage();
empty($params[0]) ? $aaa = '1' : $aaa = $params[0];
empty($params[1]) ? $bbb = '0' : $bbb = $params[1];
if($bbb != '0'){
if($aaa=='bj')
{
	if( $bbb == '0'||strlen($bbb)<6){  
$iserror=1;
}else{
$xh=substr($bbb, 0,6); }
	 if(is_file(AROOT.'/bj'.$xh.'.php'))	
 {
$sarr = SetRead('/system/data/app/xbb/bj'.$xh.'.php');	
}else{
		$sq3 = "SELECT nj,xzb,COUNT(*)as num FROM xszl where xh like '%".$xh."%' and xb='男'";
		$sq33 = "SELECT nj,xzb,COUNT(*)as num FROM xszl where xh like '%".$xh."%' and xb='女'";
$Child =$DB->once_fetch_array($sq3);
$result33 =$DB->once_fetch_array($sq33);

$sarr['nj']=$Child['nj'];
$sarr['bj']=$Child['xzb'];
$sarr['nan']=$Child['num'];
$sarr['nv']=$result33['num'];
$sarr['bi']=sprintf("%.2f",$Child['num']/$result33['num']*100);
$sarr['rbi']=round($Child['num']/($result33['num']+$Child['num']), 2);


}
	 if(count($sarr,0)>0){
$iscx=0;
		}else{
$iserror=1;
			
		}
	 
 	}
}
if($aaa=='xy')
{
	if( $bbb == '0'){  
$iserror=1;
}else{
			switch ( $bbb)
{
case 1:
  $jp2="体育学院";
  break;  
case 2:
$jp2="信息工程学院";
  break;
  case 3:
$jp2="公共管理学院";
  break;
  case 4:
$jp2="化学与环境工程学院";
  break;
 case 5:
  $jp2="商学院";
  break;  
case 6:
$jp2="城市与规划学院";
  break;
  case 7:
$jp2="外国语学院";
  break;
  case 8:
$jp2="教育科学学院";
  break;
  case 9:
  $jp2="数学与统计学院";
  break;  
case 10:
$jp2="文学院";
  break;
  case 11:
$jp2="新能源与电子工程学院";
  break;
  case 12:
$jp2="法政学院";
  break;
  case 13:
  $jp2="海洋与生物工程学院";
  break;  
case 14:
$jp2="美术与设计学院";
  break;
  case 15:
$jp2="药学院";
  break;
  case 16:
$jp2="音乐学院";
  break;
      case 17:
$jp2="预科学院";
  break;
default:
$jp2="";

}
}

if( $jp2 == ''){  
$iserror=1;
}else{
	 if(is_file(AROOT.'/xy'.$bbb.'.php'))	
 {
$sarr = SetRead('/system/data/app/xbb/xy'.$bbb.'.php');	
}else{
$sq3 = "SELECT nj,COUNT(*)as num FROM xszl where xy='".$jp2."' and xb='男'  group by nj";
		$sq33 = "SELECT nj,COUNT(*)as num FROM xszl where xy='".$jp2."' and xb='女'  group by nj";
$result3 =$DB->fetch_all_array($sq3);
$result33 =$DB->fetch_all_array($sq33);
foreach((array)$result3 as $key=>$Child)
 {
$key2=$Child['nj'];
$sarr[$key2]['nan']=$Child['num'];
$sarr[$key2]['nv']=$result33[$key]['num'];
$sarr[$key2]['bi']=round($Child['num']/$result33[$key]['num']*100, 2);
$sarr[$key2]['rbi']=round($Child['num']/($result33[$key]['num']+$Child['num']), 2);
 }


}
	 if(count($sarr,0)>0){
$iscx=0;
		}else{
$iserror=1;
			
		}
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