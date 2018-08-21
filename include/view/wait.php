<?php
session_start();
if(isset( $_SESSION['backurl']))
{ echo($_SESSION['backurl']);
$URLL=$_SESSION['backurl'];
unset($_SESSION['backurl']);
if (strpos($URLL, $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) === false&&strpos( 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],$URLL) === false ) {
	
}ELSE{
	$URLL=$arrInfo['url']."/home/index/".mt_rand(1111,9999999);
}
}ELSE{
$URLL=$arrInfo['url']."/home/index/".mt_rand(1111,999999);
}
