<?php
session_start();
if(!empty($_SESSION['wxsub'])&&$_SESSION['wxsub']!=1)
{	
unset($_SESSION['wx']);
unset($_SESSION['wxsub']);
}else{
	if(isset( $_SESSION['backurl']))
{ echo($_SESSION['backurl']);
$URLL=$_SESSION['backurl'];

unset($_SESSION['backurl']);
if (strpos($URLL, $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) === false&&strpos( 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],$URLL) === false ) {
	if(is_https())$URLL = str_replace("http://","https://",$URLL);
	header("Location:".$URLL);}ELSE{
	header("Location:".$arrInfo['url']."/home/index/".$_SESSION['wxsub'].mt_rand(1111,9999));
}
}ELSE{
	header("Location:".$arrInfo['url']."/home/index/".$_SESSION['wxsub'].mt_rand(1111,9999));
}
}