<?php
$imgurl2=-1;
if(!is_dir(ZSystem.'/data/app/gcdxy') )mkdir(ZSystem.'/data/app/gcdxy');
if(!is_dir(ZSystem.'/data/app/gcdxy/img') )mkdir(ZSystem.'/data/app/gcdxy/img');
$dir=ZSystem.'/data/app/gcdxy/img/'.$number.'/';
if (!is_dir($dir)) mkdir($dir);
    $fileName = md5($openid);
    $savename = $dir.$fileName;
    $savepath = $savename.'.jpg'; 
 if(file_exists($savepath)) {
	 unlink($savepath);
 }$imgurl=$_SESSION['zid']['img'];
$header = array(     
 'User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:45.0) Gecko/20100101 Firefox/45.0',      
 'Accept-Language: zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3',      
 'Accept-Encoding: gzip, deflate',);  
 $url=$imgurl;
 $curl = curl_init();curl_setopt($curl, CURLOPT_URL, $url);curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  
 curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);curl_setopt($curl, CURLOPT_ENCODING, 'gzip');  
 curl_setopt($curl, CURLOPT_HTTPHEADER, $header);$data = curl_exec($curl);$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);curl_close($curl);  
 if ($code == 200) {    
 $imgBase64Code = "data:image/jpeg;base64," . base64_encode($data);  
 }  
 $img_content=$imgBase64Code;//图片内容  
 
 if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $img_content, $result))  
 {   
 $type = $result[2];//得到图片类型png?jpg?gif?   
 $new_file =  $savename.".{$type}";   
 if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $img_content))))  
 {  		$imgurl2=$arrInfo['url'].'/system/data/app/gcdxy/img/'.$number.'/'.md5($openid).'.'.$type;
}ELSE{
{
	$imgurl2=$arrInfo['url']."/xw.jpg";
	}	
}}else{
	$imgurl2=$arrInfo['url']."/xw.jpg";
	}
	
echo $imgurl2;

	