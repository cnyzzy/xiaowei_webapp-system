<?php
defined('ZRoot') or die('Access Denied.');

class Surl {

public function shorturl($url = 0){ 
/** 生成短网址 
* @param String $url 原网址 
* @return String 
*/ 
$code = sprintf('%u', crc32($url.time())); 
$surl = ''; 
while($code){ 
$mod = $code % 62; 
if($mod>9 && $mod<=35){ 
$mod = chr($mod + 55); 
}elseif($mod>35){ 
$mod = chr($mod + 61); 
} 
$surl .= $mod; 
$code = floor($code/62); 
} 
return $surl; 

} 

	}