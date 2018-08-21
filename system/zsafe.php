<?php
/**
 * 安全器
 * @copyright (c) ZY All Rights Reserved
 */
/*
	 *错误处理
	 */

function myErrorHandler2($error_level, $msg, $file, $line) {
	  $time = time();
  $logfile = LOG_PATH . date('Y.m.d') . '_errorlog.php';
$EXIT = FALSE;
    switch ($error_level) {
        case E_NOTICE:
        case E_USER_NOTICE:
            $error_type = 'Notice';
            break;
        case E_WARNING:
        case E_USER_WARNING:
            $error_type = 'Warning';
            break;
        case E_ERROR:
        case E_USER_ERROR:
            $error_type = 'Fatal Error';
            $EXIT = TRUE;
            break;
        default:
            $error_type = 'Unknown';
            $EXIT = TRUE;
            break;
    }
$Errorlog=" error_type => $error_type,
  file => $file,
  line => $line,
  msg => $msg,
  errcontext => $errcontext";
	
$msg= ($msg);

$Errormsg = 
array (
  'error_type' => $error_type,
  'file' => $file,
  'line' => $line,
  'msg' => $msg,
  'errcontext' => $errcontext,
);
  $hash = md5( $Errorlog);
 

  $ip = getIp();
 
  $user = '<b>User:</b> IP=' . $ip . '; RIP:' . $_SERVER['REMOTE_ADDR'];
  $uri = 'Request: ' . htmlspecialchars(($_SERVER['REQUEST_URI']));
  $message = "<?php exit;?>%*{$time}%*$Errorlog%*$hash%*$user%*$uri *n";
 
  if (is_file($logfile)) {
   $fp = @fopen($logfile, 'rb');
   $lastlen = 50000;  // 读取最后的 $lastlen 长度字节内容
   $maxtime = 60 * 10;  // 时间间隔：10分钟
   $offset = filesize($logfile) - $lastlen;
   if ($offset > 0) {
    fseek($fp, $offset);
   }
   if ($data = fread($fp, $lastlen)) {
    $array = explode(" *n", $data);
    if (is_array($array))
     foreach ($array as $key => $val) {
      $row = explode("%*", $val);
      if ($row[0] != '<?php exit;?>') {
       continue;
      }
      if ($row[3] == $hash || $row[1] < $time + $maxtime) { 

      }else{	  error_log($message, 3, $logfile);}
     }
   }
  }else{ error_log($message, 3, $logfile);}

ErrorMsg($Errormsg);
if ($EXIT) {
       die();
    }
}

//set_error_handler('myErrorHandler2');
require_once(ZConfig.'/Safe/public.php');
 
 
 if($Re == 1)
 {
 //覆盖安装
 }
 
if($level == 9||$cheak == 1)
 {
 //检查
 //MD5检查

 }
 
 
 
 function ReFile() {
 }
        