<?php
empty($_GET['u']) ? $U = '0' : $U = $_GET['u'];

if($U == '0'){
	ECHO('-1');
	EXIT;
}
$sql2 = "SELECT id,nickname,amr,mp3,addtime,mediaid,imgurl,sroce,addtime FROM gcdxy WHERE id ='{$U}'";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
		$arr=ARRAY();

IF(!EMPTY($info)){
$arr['WxAudio']=@$info['mediaid'];
$arr['Score']=@$info['sroce'];
$arr['Name']=@$info['nickname'];
$arr['ID']=@$info['id'];
$arr['AudioAmr']=@$info['amr'];
$arr['AudioMp3']=@$info['mp3'];
$arr['CreateDate']=@$info['addtime'];
$arr['State']=1;
	if(!empty($info['imgurl']))
	{
		$arr['Code']=$info['imgurl'];
	
			}else{
			$arr['Code']=$arrInfo['url']."/xw.jpg";

}
	if(!empty($info['mp3'])&&$info['mp3']!='0'&&(TIME()-$info['mp3']>48*60*60))$arr['State']=0;
	
	printjson($arr);	



 }ELSE
		{
	echo'-1';		
		}
 EXIT;
 //HTTP get 请求
function httpGet($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V6);
    $res = curl_exec($curl);
    curl_close($curl);
    
    return $res;
}

//根据URL地址，下载文件
function downAndSaveFile($url,$savePath){
    ob_start();
    readfile($url);
    $img  = ob_get_contents();
    ob_end_clean();
    $size = strlen($img);
    $fp = fopen($savePath, 'a');
    fwrite($fp, $img);
    fclose($fp);
}
function printjson($type)
{
	ob_flush();
ob_clean();

$php_json = json_encode($type); 
echo urldecode($php_json); 
exit;
}