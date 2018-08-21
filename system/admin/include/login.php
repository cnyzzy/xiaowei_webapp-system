<?php
empty($params[0]) ? $ok = '0' : $ok = $params[0];
if($ok =="exit"){
	$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],12,6,$_SESSION['admin']['id'],$_SESSION['admin']['rightint']);
	unset($_SESSION['admin']);
	header("Location:".$arrInfo[url]."/admin/login");
}elseif(!empty($_SESSION['admin']['rightint'])&&@$_SESSION['admin']['rightint']>4){
	header("Location:".$arrInfo[url]."/admin/index");
}else{
if(isset($_POST['username']))$username=$_POST['username'];
if(isset($_POST['password']))$password=$_POST['password'];
if(isset($username)&&!empty($password))
{
if($Admin->OkUser($username,$password)!=0)
{
	$_SESSION['admin']=$Admin->LoginUser($username,$password);
	$Log-> AddLog($_SESSION['admin']['id'],$_SESSION['admin']['name'],11,6,$_SESSION['admin']['id'],$_SESSION['admin']['rightint']);
	header("Location:".$arrInfo[url]."/admin/index");
}
}
}