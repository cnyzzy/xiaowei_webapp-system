<?php
session_start();
echo"var _czc = _czc || [];var _hmt = _hmt || [];";
if(!empty($_SESSION['my']))
{
	$bdname='';
if($_SESSION['my']=='WX')$bdname='微信';
if($_SESSION['my']=='QQ')$bdname='QQ';
if($_SESSION['my']=='WB')$bdname='微博';
	echo'_czc.push(["_setCustomVar","环境","'.$bdname.'",1]);';
	echo"_hmt.push(['_setCustomVar', 1, '环境', '".$bdname."', 1]);";
	;
}ELSE{
		echo'_czc.push(["_setCustomVar","环境","非客户端环境",120]);';
		echo"_hmt.push(['_setCustomVar', 1, '环境', '非客户端环境', 1]);";

}
if(!empty($_SESSION['zid']['type']))
{
		switch ($_SESSION['zid']['type'])
{
case 1:
$type='学生';
break;
case 2:
$type='教职工';
break;
case 3:
$type='访客';
break;
default:
$type='未知';
break;
}
	echo'_czc.push(["_setCustomVar","身份","'.$type.'",1]);';
			echo"_hmt.push(['_setCustomVar', 2, '身份', '".$type."', 1]);";

}ELSE{
		echo'_czc.push(["_setCustomVar","身份","未绑定",120]);';
				echo"_hmt.push(['_setCustomVar', 2, '身份', '未绑定', 1]);";


}

if(!empty($_SESSION['zid']['number']))
{
	
	echo'_czc.push(["_setCustomVar","账号","'.$_SESSION['zid']['number'].'",1]);';
			echo"_hmt.push(['_setCustomVar', 3, '账号','".$_SESSION['zid']['number']."', 1]);";

}ELSE{
		echo'_czc.push(["_setCustomVar","账号","未绑定",120]);';
			echo"_hmt.push(['_setCustomVar', 3, '账号','未绑定', 1]);";

}

if(!empty($_SESSION['zid']['name']))
{
	
	echo'_czc.push(["_setCustomVar","姓名","'.$_SESSION['zid']['name'].'",1]);';
				echo"_hmt.push(['_setCustomVar', 4, '姓名','".$_SESSION['zid']['name']."', 1]);";

}ELSE{
		echo'_czc.push(["_setCustomVar","姓名","未绑定",120]);';
					echo"_hmt.push(['_setCustomVar', 4, '姓名','未绑定', 1]);";


}
