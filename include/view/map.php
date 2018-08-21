<?php
define("TXMAPKEY","ZDEBZ-CB3RF-QYTJZ-JNQ77-EHCUE-56BFJ");
//转换发送地址
$TransArray=getJson("http://apis.map.qq.com/ws/coord/v1/translate?locations=39.12,116.83&type=2&key=".TXMAPKEY);
if($TransArray['status']==0)
{
$TransLocation=$TransArray['locations'][0];
PRINT_R($TransLocation);

}else{
echo($TransArray['message']);
}

$TimeArray=getJson("http://apis.map.qq.com/ws/distance/v1/?mode=driving&from=33.23144,119.85138&to=33.37677,120.20469;33.3845,120.15662&key=".TXMAPKEY);
if($TimeArray['status']==0)
{
$TimeArrayXC=$TimeArray['result']['elements'][0];
$TimeArrayTY=$TimeArray['result']['elements'][1];
//PRINT_R($TransLocation);
}elseif($TimeArray['status']==373){
	echo "当前坐标路径超过10公里";
}else{
echo($TransArray['message']);
}



	//规划路径
	$GuihuaArray=getJson("http://apis.map.qq.com/ws/direction/v1/transit/?from=33.23144,119.85138&to=33.37677,120.20469&policy=LEAST_TIME&output=json&callback=&key=".TXMAPKEY);
if($GuihuaArray['status']==0)
{
$GArray=$GuihuaArray['result']['routes'];
//方案划分
foreach($GArray as $k=>$v){ 
ECHO'【方案'.($k+1).'】';
ECHO'距离'.$v['distance'].'米 ';                                
ECHO'预计用时'.$v['duration'].'分钟</br>';
$steps=$v['steps'];
foreach($steps as $k=>$v){ 

ECHO'第'.($k+1).'阶段'.':';
if($v['mode']=='WALKING')
{
	echo"步行 ";

	ECHO'距离'.$v['distance'].'米 ';                                
ECHO'预计用时'.$v['duration'].'分钟</p>';
	
}
if($v['mode']=='TRANSIT')
{
	echo"公交系统";

	foreach($v['lines'] as $k=>$v){ 
//平行公交路径
if($v['mode']=='BUS')echo"[公交车]";
if($v['mode']=='SUBWAY')echo"[地铁]";
	
}
if($v['mode']=='WALKING')
{
	echo"步行";
	ECHO'距离'.$v['distance'].'米</p>';                                
ECHO'预计用时'.$v['duration'].'分钟</p>';
	
}
}
} 
//PRINT_R($TransLocation);
}elseif($GuihuaArray['status']==373){

}else{
echo($GuihuaArray['message']);
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
?>