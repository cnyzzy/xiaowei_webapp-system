<?php 
defined('ZRoot') or die('Access Denied.');
class Router
{ 
public function getHtaccess($must = 0){
	if(!file_exists(ZRoot.'/.htaccess')||$must == 1){
$scriptName = explode('index.php',$_SERVER['SCRIPT_NAME']);
			
			//生成.htaccess文件
			$fp =  fopen(ZRoot.'/.htaccess','w');
			
			if(!is_writable(ZRoot.'/.htaccess')) 
			{
				$Errormsg = 
array (
  'error_type' => 'File',
  'file' => '/.htaccess',
  'msg' => "文件(.htaccess)不可写。如果您使用的是Unix/Linux主机，请修改该文件的权限为777。如果您使用的是Windows主机，请联系管理员，将此文件设为everyone可写",
);
ErrorMsg($Errormsg);
			}
			$htaccess = "RewriteEngine On\n"
					."RewriteBase ".$scriptName[0]."\n"
					."RewriteCond %{REQUEST_FILENAME} !-d\n"
					."RewriteCond %{REQUEST_FILENAME} !-f\n"
					."RewriteRule ^(.*)$ index.php/$1 [QSA,PT,L]\n"
					."<IfModule deflate_module>\n"
."SetOutputFilter DEFLATE\n"
."SetEnvIfNoCase Request_URI .(?:gif|jpe?g|png)$ no-gzip dont-vary\n"
."SetEnvIfNoCase Request_URI .(?:exe|t?gz|zip|bz2|sit|rar)$ no-gzip dont-vary\n"
."SetEnvIfNoCase Request_URI .(?:pdf|doc)$ no-gzip dont-vary\n"
."AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript\n"
."AddOutputFilterByType DEFLATE application/x-javascript\n"
."AddOutputFilterByType DEFLATE application/x-httpd-php application/x-http\n"
."</IfModule>"
;
			
	$fw =  fwrite($fp,$htaccess);}
}

public function getRouter($types = 1) 
{ 
if ( !empty($_SERVER['PATH_INFO']) ) 
{ 
$query_string = substr(str_replace(array('.html','.htm', '.asp', '//'), '',$_SERVER['PATH_INFO']),1); 
} 
else 
{ 
$query_string = str_replace($_SERVER['SCRIPT_NAME'], '',$_SERVER['PHP_SELF']);
} 
if ( $types == 1 ) 
{ 
// 第一种类型以/分隔 
$temp = explode('/', $query_string); 
} 
elseif ($types == 2) 
{ 
$temp = explode('-', $query_string); 
} 
elseif ($types == 3) 
{ 
return array('Controller'=>$_GET['controller']); 
} 
if ( empty($temp[0]) ) 
{ 
return array('Controller' => 'home','Operate' => 'index'); 
} 
if ( empty($temp[1]) ) 
{ 
$temp[] = 'index'; 
} 
// 去除空项 
foreach ($temp as $val) 
{ 
if ($val) 
{ 
$url[] = $val; 
} 
} 
list($controller, $operate) = $url; 
//有参数的情况 
$params = array(); 
if ( count($url)>2 ) 
{ 
array_shift($url); 
array_shift($url); 
$params = $url; 
} 
return 
array( 
"Controller" => $controller, 
"Operate" => $operate, 
"params" => $params, 
); 
} 
} 
?> 