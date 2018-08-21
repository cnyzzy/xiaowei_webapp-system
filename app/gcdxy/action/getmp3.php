<?php
empty($_GET['u']) ? $U = '0' : $U = intval($_GET['u']);
if($U == '0'){
	ECHO('-1');
	EXIT;
}

if(!is_dir(ZSystem.'/data/app/gcdxy/mp3') )mkdir(ZSystem.'/data/app/gcdxy/mp3');
if(!is_dir(ZSystem.'/data/app/gcdxy') )mkdir(ZSystem.'/data/app/gcdxy');
if(!is_dir(ZSystem.'/data/app/gcdxy/amr') )mkdir(ZSystem.'/data/app/gcdxy/amr');


$dir1=ZSystem.'/data/app/gcdxy/amr/';
$dirMP3=ZSystem.'/data/app/gcdxy/mp3/';

$sql2 = "SELECT amr,number,mediaid,mp3 FROM gcdxy WHERE id ='{$U}'";
		$result2 = $DB->query($sql2);
		$info = $DB->fetch_array($result2);
$MediaID=@$info['mediaid'];
		ob_flush();
ob_clean();
	if(!empty($MediaID))
	{$numberd=$info['number'];
		$dir=ZSystem.'/data/app/gcdxy/amr/'.$numberd.'/';
if (!is_dir($dir)) mkdir($dir);
    $fileName = time().'_'.rand(1111,9999);
    $savename = $dir.$fileName;
    $savepath = $savename.'.amr'; 
 if(file_exists($savepath)) {
	 unlink($savepath);
 }
	if(empty($info['amr'])||(!empty($info['amr'])&&$info['amr']=='0')||(!empty($info['amr'])&&$info['amr']!='0'&&abs(filesize($dir1.$info['amr']))<4))
	{
		if(!empty($info['amr'])&&$info['amr']!='0'){
			 if(file_exists($dir1.$info['amr'])) {
	 unlink($dir1.$info['amr']);
 }
		}
$Wx = new Wx();
$Atoken=$Wx->zGetAtoken();	
	    $url = "https://api.weixin.qq.com/cgi-bin/media/get?access_token=".$Atoken."&media_id=".$MediaID;
	$arr = https_request($url);
saveWeixinFile($savepath,$arr);
		$file='';
			$newarr=array(
 'amr'=>'0',
 );
     if(file_exists($savepath)&&abs(filesize($savepath))>4) {
	$info['amr']=$numberd.'/'. $fileName.'.amr';
			$newarr=array(
 'amr'=>$numberd.'/'. $fileName.'.amr',
 );

	 }
	 $row = $DB->updateArr('gcdxy',$newarr,"WHERE id ='{$U}'");
 }
 $dir2=ZSystem.'/data/app/gcdxy/mp3/'.$numberd.'/';
		 if(empty($info['mp3'])||(!empty($info['mp3'])&&$info['mp3']=='0')||(!empty($info['mp3'])&&abs(filesize($dirMP3.$info['mp3']))<4)) {

		
		if(!is_dir($dir2) )mkdir($dir2);

    $fileName1 = time().'_'.rand(1111,9999);
    $savename1 = $dir2.$fileName1;
    $savepath1 = $savename1.'.mp3'; 	
	$string = $savepath1; // 假设一个路径
// 正则样式

// 检测是否需要替换

    $string = str_replace('/','\/',$string);
	    $string = str_replace('/','',$string);
		    $string2 = str_replace('/','\/',$dir1.$info['amr']);
	    $string2 = str_replace('/','',$string2);
//print_r($string);
//print_r("ffmpeg -i ".addslashes( $string2 )." ".addslashes( $string));
system("C:\\ffmpeg\\ffmpeg.exe -i ".addslashes( $string2 )." ".addslashes( $string), $output);    
//print_r($output); 


     if(file_exists($savepath1)) {

	$newarr=array(
 'mp3'=>$numberd.'/'. $fileName1.'.mp3',
 );
$row = $DB->updateArr('gcdxy',$newarr,"WHERE id ='{$U}'");
	 }
		 }else{
	printjson('OK');	
}


 
 EXIT;


}


function saveWeixinFile($filename, $filecontent)
{
    $local_file = fopen($filename, 'w');
    if (false !== $local_file){
        if (false !== fwrite($local_file, $filecontent)) {
            fclose($local_file);
        }
    }
}

function https_request($url, $data = null)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}

function printjson($type)
{
	ob_flush();
ob_clean();

			$Errormsg=array (
  'ID' => urlencode ($type),
); 
$php_json = json_encode($Errormsg); 
echo urldecode($php_json); 
exit;
}