<?php
defined('ZRoot') or die('Access Denied.');
/**
 * 基础函数库
 * @copyright (c) Z All Rights Reserved
 */
function __autoload($class) {
	if (file_exists(ZSystem . '/lib/' . $class . '.php')) {
		require_once(ZSystem . '/lib/' . $class . '.php');
	} elseif (file_exists(ZSystem . '/com/' . $class . '.php')) {
		require_once(ZSystem . '/com/' . $class . '.php');
	} elseif (file_exists(ZSystem . '/lib/Private/' . $class . '.php')) {
		require_once(ZSystem . '/lib/Private/' . $class . '.php');
	} else {
		echo($class . '加载失败。');
	}
}
function is_weixin(){ 
	if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
			return true;
	}	
	return false;
}
function is_qq(){ 
	if ( strpos($_SERVER['HTTP_USER_AGENT'], 'QQ/') !== false ) {
			return true;
	}	
	return false;
}
function is_tim(){ 
	if ( strpos($_SERVER['HTTP_USER_AGENT'], 'TIM/') !== false ) {
			return true;
	}	
	return false;
}
function is_wb(){ 
	if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Weibo') !== false ) {
			return true;
	}	
	return false;
}
/**
 * 去除多余的转义字符
 */
function doStripslashes() {
	if (get_magic_quotes_gpc()) {
		$_GET = stripslashesDeep($_GET);
		$_POST = stripslashesDeep($_POST);
		$_COOKIE = stripslashesDeep($_COOKIE);
		$_REQUEST = stripslashesDeep($_REQUEST);
	}
}

/**
 * 递归去除转义字符
 */
function stripslashesDeep($value) {
	$value = is_array($value) ? array_map('stripslashesDeep', $value) : stripslashes($value);
	return $value;
}

/**
 * 转换HTML代码函数
 *
 * @param unknown_type $content
 * @param unknown_type $wrap 是否换行
 */
function htmlClean($content, $wrap = true) {
	$content = htmlspecialchars($content);
	if ($wrap) {
		$content = str_replace("\n", '<br />', $content);
	}
	$content = str_replace('  ', '&nbsp;&nbsp;', $content);
	$content = str_replace("\t", '&nbsp;&nbsp;&nbsp;&nbsp;', $content);
	return $content;
}

function getIP(){

    if (isset($_SERVER)){

        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){

            $IPaddress = $_SERVER["HTTP_X_FORWARDED_FOR"];

        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {

            $IPaddress = $_SERVER["HTTP_CLIENT_IP"];

        } else {

            $IPaddress = $_SERVER["REMOTE_ADDR"];

        }

    } else {

        if (getenv("HTTP_X_FORWARDED_FOR")){

            $IPaddress = getenv("HTTP_X_FORWARDED_FOR");

        } else if (getenv("HTTP_CLIENT_IP")) {

            $IPaddress = getenv("HTTP_CLIENT_IP");

        } else {

            $IPaddress = getenv("REMOTE_ADDR");

        }

    }

    return $IPaddress;


}

/**
 * 获取站点地址(仅限根目录脚本使用,目前仅用于首页ajax请求)
 */
function getBlogUrl() {
	$phpself = isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : '';
	if (preg_match("/^.*\//", $phpself, $matches)) {
		return 'http://' . $_SERVER['HTTP_HOST'] . $matches[0];
	} else {
		return BLOG_URL;
	}
}

function isIE6Or7() {
	if (isset($_SERVER['HTTP_USER_AGENT'])) {
		if (strpos($_SERVER['HTTP_USER_AGENT'], "MSIE 7.0") || strpos($_SERVER['HTTP_USER_AGENT'], "MSIE 6.0")) {
			return true;
		}
	}
	return false;
}
function SetRead($Dir){
	$arrData = require ZRoot.$Dir;
	return $arrData;
}
function SetWrite($Data,$Dir){

	$File = ZRoot.$Dir;
	if(is_file($File)) unlink($File);
	@ $fp = fopen($File,'a') OR EXIT('读取设置失败');
	$Data = "<?php\nreturn ".var_export($Data,true).";\n?>";
	@ $fw = fwrite($fp,$Data) OR EXIT('写入设置失败');
	fclose($fp);
}

function ErrorMsg($errorMsg,$button='点击返回>>',$url='javascript:window.history.go(-1);',$isAutoGo=false){
	if($errorMsg['error_type'] == 'File')
{
$echo =
<<<EOT
<div class='info'>{$errorMsg['msg']}</div>
EOT;
if($errorMsg['file']) $echo .="<div class='file'>{$errorMsg['file']}</div>";
}
elseif($errorMsg['error_type'] == 'MySql')
{
$echo =
<<<EOT
<div class='info'>{$errorMsg['msg']}</div>
EOT;
if($errorMsg['sql']) $echo .="<div class='sql'>{$errorMsg['sql']}</div>";
}elseif($errorMsg['error_type'] == '提示')
{
$echo =
<<<EOT
<div class='info'>{$errorMsg['msg']}</div>
EOT;
}else{
$echo =<<<EOT
<div class='info'>{$errorMsg['file']}的 <a class=red>{$errorMsg['line']}行</a> 出现一个问题。</div>
<div class='help'>{$errorMsg['msg']}</div>
EOT;
if($errorMsg['errcontext']) $echo .="<div class='help'>{$errorMsg['errcontext']}</div>";
}
		echo 
<<<EOT
<html>
<head>
EOT;
		if($isAutoGo){
			echo "<meta http-equiv=\"refresh\" content=\"2;url=$url\" />";
		}
		
		echo 
<<<EOT
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
 <title>System Error Msg:{$errorMsg['error_type']}</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <style type="text/css">
 <!--
 body { background-color: white; color: black; font: 9pt/11pt verdana, arial, sans-serif;}
 #container {margin: 10px;}
 #message {width: 1024px; color: black;}
 .red {color: red;}
 a:link {font: 9pt/11pt verdana, arial, sans-serif; color: red;}
 a:visited {font: 9pt/11pt verdana, arial, sans-serif; color: #4e4e4e;}
 h1 {color: #FF0000; font: 18pt "Verdana"; margin-bottom: 0.5em;}
 .bg1 {background-color: #FFFFCC;}
 .bg2 {background-color: #EEEEEE;}
 .table {background: #AAAAAA; font: 11pt Menlo,Consolas,"Lucida Console"}
 .info {
  background: none repeat scroll 0 0 #F3F3F3;
  border: 0px solid #aaaaaa;
  border-radius: 10px 10px 10px 10px;
  color: #000000;
  font-size: 11pt;
  line-height: 160%;
  margin-bottom: 1em;
  padding: 1em;
 }
 
 .help {
  background: #F3F3F3;
  border-radius: 10px 10px 10px 10px;
  font: 12px verdana, arial, sans-serif;
  text-align: center;
  line-height: 160%;
  padding: 1em;
 }
 
 .sql {
  background: none repeat scroll 0 0 #FFFFCC;
  border: 1px solid #aaaaaa;
  color: #000000;
  font: arial, sans-serif;
  font-size: 9pt;
  line-height: 160%;
  margin-top: 1em;
  padding: 4px;
 }
 -->
 </style>
</head>
<body>
<div id="container">
<h1>Error Type:{$errorMsg['error_type']}</h1>
{$echo}
<p><a href="$url" class='help'>$button</a></p>
</div>
</body>
</html>
EOT;
		exit;
	}
function isWriteFile($file, $content, $mod = 'w', $exit = TRUE) {
if(!@$fp = @fopen($file, $mod)) {
	if($exit) {
		exit('File :<br>'.$file.'<br>Have no access to write!');
	} else {
		return false;
	}
} else {
	@flock($fp, 2);
	@fwrite($fp, $content);
	@fclose($fp);
	return true;
}
}

//创建目录
function makedir($dir) {
return is_dir($dir) or (makedir(dirname($dir)) and mkdir($dir, 0777)); 
}	
function Template($file) {
$tplfile = TemplateROOT.$file.'.html';
$objfile = TemplateObj.$file.'.tpl.php';
	$T = new Template();
	
	$T->complie($tplfile, $objfile);
if(@filemtime($tplfile) > @filemtime($objfile)) {
	//note 加载模板类文件
	$T = new Template();
	
	$T->complie($tplfile, $objfile);
}

return $objfile;
}
function appTemplate($file) {
$tplfile = aTemplateROOT.$file.'.html';
$objfile = aTemplateObj.$file.'.tpl.php';
	$T = new Template();
	
	$T->complie($tplfile, $objfile);
if(@filemtime($tplfile) > @filemtime($objfile)) {
	//note 加载模板类文件
	$T = new Template();
	
	$T->complie($tplfile, $objfile);
}

return $objfile;
}
/**
 * 分页函数
 *
 * @param int $count 条目总数
 * @param int $perlogs 每页显示条数目
 * @param int $page 当前页码
 * @param string $url 页码的地址
 */
function pagination($count, $perlogs, $page, $url, $anchor = '') {
	$pnums = @ceil($count / $perlogs);
	$re = '';
	$urlHome = preg_replace("|[\?&/][^\./\?&=]*page[=/\-]|", "", $url);
	for ($i = $page - 5; $i <= $page + 5 && $i <= $pnums; $i++) {
		if ($i > 0) {
			if ($i == $page) {
				$re .= " <span>$i</span> ";
			} elseif ($i == 1) {
				$re .= " <a href=\"$urlHome$anchor\">$i</a> ";
			} else {
				$re .= " <a href=\"$url$i$anchor\">$i</a> ";
			}
		}
	}
	if ($page > 6)
		$re = "<a href=\"{$urlHome}$anchor\" title=\"首页\">&laquo;</a><em>...</em>$re";
	if ($page + 5 < $pnums)
		$re .= "<em>...</em> <a href=\"$url$pnums$anchor\" title=\"尾页\">&raquo;</a>";
	if ($pnums <= 1)
		$re = '';
	return $re;
}
function secToTime($times){  
        $result = '00:00:00';  
        if ($times>0) {  
                $hour = floor($times/3600);  
                $minute = floor(($times-3600 * $hour)/60);  
                $second = floor((($times-3600 * $hour) - 60 * $minute) % 60);  
                $result = $hour.':'.$minute.':'.$second;  
        }  
        return $result;  
}  
/**
 * 时间转化函数
 *
 * @param $now
 * @param $datetemp
 * @param $dstr
 * @return string
 */
function smartDate($datetemp, $dstr = 'Y-m-d H:i:s') {
	$op = '';
	$sec = time() - $datetemp;
	$hover = floor($sec / 3600);
	if ($hover == 0) {
		$min = floor($sec / 60);
		if ($min == 0) {
			$op = $sec . ' 秒前';
		} else {
			$op = "$min 分钟前";
		}
	} elseif ($hover < 24) {
		$op = "约 {$hover} 小时前";
	} else {
		$op = gmdate($dstr, $datetemp);
	}
	return $op;
}

/**
 * 生成一个随机的字符串
 *
 * @param int $length
 * @param boolean $special_chars
 * @return string
 */
function getRandStr($length = 12, $special_chars = true) {
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	if ($special_chars) {
		$chars .= '!@#$%^&*()';
	}
	$randStr = '';
	for ($i = 0; $i < $length; $i++) {
		$randStr .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	}
	return $randStr;
}

function highlight_code($code){
    if (ereg("<\?(php)?[^[:graph:]]", $code)) {
        $code = highlight_string($code, TRUE);
    } else {
        $code = ereg_replace("(&lt;\?php&nbsp;)+", "", highlight_string("<?php ".$code, TRUE));
    }
    return $code;
}
function is_https() {
    if ( !empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') {
        return true;
    } elseif ( isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
        return true;
    } elseif ( !empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off') {
        return true;
    }
    return false;
}
/** 
 * 获取远程图片的宽高和体积大小 
 * 
 * @param string $url 远程图片的链接 
 * @param string $type 获取远程图片资源的方式, 默认为 curl 可选 fread 
 * @param boolean $isGetFilesize 是否获取远程图片的体积大小, 默认false不获取, 设置为 true 时 $type 将强制为 fread  
 * @return false|array 
 */  
function myGetImageSize($url, $type = 'curl', $isGetFilesize = false)   
{  
    // 若需要获取图片体积大小则默认使用 fread 方式  
    $type = $isGetFilesize ? 'fread' : $type;  
   
     if ($type == 'fread') {  
        // 或者使用 socket 二进制方式读取, 需要获取图片体积大小最好使用此方法  
        $handle = fopen($url, 'rb');  
   
        if (! $handle) return false;  
   
        // 只取头部固定长度168字节数据  
        $dataBlock = fread($handle, 168);  
    }  
    else {  
        // 据说 CURL 能缓存DNS 效率比 socket 高  
        $ch = curl_init($url);  
        // 超时设置  
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);  
        // 取前面 168 个字符 通过四张测试图读取宽高结果都没有问题,若获取不到数据可适当加大数值  
        curl_setopt($ch, CURLOPT_RANGE, '0-167');  
        // 跟踪301跳转  
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
        // 返回结果  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
   
        $dataBlock = curl_exec($ch);  
   
        curl_close($ch);  
   
        if (! $dataBlock) return false;  
    }  
   
    // 将读取的图片信息转化为图片路径并获取图片信息,经测试,这里的转化设置 jpeg 对获取png,gif的信息没有影响,无须分别设置  
    // 有些图片虽然可以在浏览器查看但实际已被损坏可能无法解析信息   
    $size = getimagesize('data://image/jpeg;base64,'. base64_encode($dataBlock));  
    if (empty($size)) {  
        return false;  
    }  
   
    $result['width'] = $size[0];  
    $result['height'] = $size[1];  
   
    // 是否获取图片体积大小  
    if ($isGetFilesize) {  
        // 获取文件数据流信息  
        $meta = stream_get_meta_data($handle);  
        // nginx 的信息保存在 headers 里，apache 则直接在 wrapper_data   
        $dataInfo = isset($meta['wrapper_data']['headers']) ? $meta['wrapper_data']['headers'] : $meta['wrapper_data'];  
   
        foreach ($dataInfo as $va) {  
            if ( preg_match('/length/iU', $va)) {  
                $ts = explode(':', $va);  
                $result['size'] = trim(array_pop($ts));  
                break;  
            }  
        }  
    }  
   
    if ($type == 'fread') fclose($handle);  
   
    return $result;  
}  