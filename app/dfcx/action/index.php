<?php
define('RROOT',ZSystem.'/data/app/dfcx/');
	$Dfcx = new Dfcx($DB);
$mysqll=0;
	$cookie_jar = ZSystem.'/data/app/dfcx/temp/';

empty($params[0]) ? $a = '1' : $a =$params[0];
 $info=$Dfcx->GetRoomInfo($number);
 if(!empty($info)){
if(is_file(ZSystem.'/data/app/dfcx/'.$number.'.php')){
				$arr1 = SetRead( '/system/data/app/dfcx/'.$number.'.php');
			}
if(is_file(ZSystem.'/data/app/dfcx/'.$number.'d.php')){
				$arr2 = SetRead( '/system/data/app/dfcx/'.$number.'d.php');
				$timei=filemtime(ZSystem.'/data/app/dfcx/'.$number.'d.php');
			}
			
!empty($arr1)?$cecha=1:$cecha=0;
!empty($arr2)?$cecha=1:$cecha=0;
 $xfbroom='';
switch ( $info['xq'])
{
case 11:
//新校区

//取楼号
$xfblh=substr($info['lh'], -2);
//取AB楼
$xfbab=substr($info['abl'], -1);
//取房间号
$xfbfj=substr($info['fj'], -3);

//验证
if(strlen($xfblh)==2&&strlen($xfbab)==1&&strlen($xfbfj)==3)
{$xfbroom=$xfblh.$xfbab.$xfbfj;}else{
 $xfbroom='未知.';	
}
  break;  
case 22:
//老校区
//取楼号
$xfblh=substr($info['lh'], -2);
//取房间号
$xfbfj=substr($info['fj'], -3);
//验证
if(strlen($xfblh)==2&&strlen($xfbfj)==3)
{$xfbroom='9'.$xfblh.$xfbfj;}else{
 $xfbroom='未知.';	
}

  break;
default:
 $xfbroom='未知'.$info['xq'];
}
 
if($cecha==0){
	$ch = curl_init();
  curl_setopt ($ch,CURLOPT_REFERER,'http://210.28.176.221/isimscx/default.aspx'); 
curl_setopt($ch, CURLOPT_URL, "http://210.28.176.221/isimscx/usedRecord.aspx");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 8);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_COOKIEFILE,$cookie_jar.$number.".php");
$html=curl_exec($ch);
preg_match('/<h6>(.*?)<\/h6>/ims', $html, $block);
@preg_match_all('/<span class="number orange">(.*?)<\/span>/ims',$block[1],$block1);

$ARRAR['gm']=@$block1[1][0];
$ARRAR['bz']=@$block1[1][1];
$ARRAR['sy']=@$block1[1][2];
$ARRAR['yy']=@$block1[1][3];
if(EMPTY($ARRAR['gm'])&&EMPTY($ARRAR['bz'])&&EMPTY($ARRAR['sy'])&&EMPTY($ARRAR['yy'])){
	$ch = curl_init();
  curl_setopt ($ch,CURLOPT_REFERER,'http://210.28.176.221/isimscx/default.aspx'); 
curl_setopt($ch, CURLOPT_URL, "http://210.28.176.221/isimscx/default.aspx");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE,$cookie_jar.$number.".php");
$html=curl_exec($ch);
	$chakan=0;
	if(!EMPTY($info['xq'])&&!EMPTY($info['abl'])&&!EMPTY($info['lh'])&&!EMPTY($info['lc'])&&!EMPTY($info['fj']))$mysqll=1;

}else{$chakan=1;}}else{$chakan=1;}

 }
