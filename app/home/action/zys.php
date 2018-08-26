<?php
header("Cache-control:private");
$number=$_SESSION['zid']['number'];
$postn=@urldecode($_POST['s']);
$postn = isset($_GET['s']) ? @urldecode($_GET['s']) : @urldecode($_POST['s']);
	$row1=array();
	$row2=array();
	$row3=array();
if(!empty($postn)){
	$sql1="SELECT  *, count(id) AS num FROM jwinfo where number like '%{$postn}%' or xm like '%{$postn}%' or xzb like '%{$postn}%'  or gzxx like '%{$postn}%' or jtzz like '%{$postn}%' or sfz like '%{$postn}%'  order by id desc";
	$row1 = @$DB->fetch_all_array($sql1);

	$sql3="SELECT  * FROM xszl  where xh like '%{$postn}%' or xm like '%{$postn}%' or xzb like '%{$postn}%'  or xy like '%{$postn}%'  or sfz like '%{$postn}%' order by id desc ";
	$row3 = @$DB->fetch_all_array($sql3);
}
if(!empty($postn)){
		$sql21="SELECT  * FROM 17xs where xh like '%{$postn}%' or xm like '%{$postn}%' or bj like '%{$postn}%' or zxmc like '%{$postn}%' or dqmc like '%{$postn}%'  or sfz like '%{$postn}%' order by id desc ";
	$row2 = @$DB->fetch_all_array($sql21);
	
}
if(!empty($postn)){
		$sql21="SELECT  * FROM 18xs where xh like '%{$postn}%' or xm like '%{$postn}%' or bj like '%{$postn}%' or zxmc like '%{$postn}%' or dqmc like '%{$postn}%'  or sfz like '%{$postn}%' or pc like '%{$postn}%' order by id desc ";
	$row18 = @$DB->fetch_all_array($sql21);
	
}
if(!empty($postn)){
		$sql4="SELECT  * FROM wxid where number like '%{$postn}%' or nickname like '%{$postn}%' or name like '%{$postn}%'  order by id desc";

	$row4 = @$DB->fetch_all_array($sql4);

}
if(!empty($postn)){
		$sql4="SELECT  * FROM qqid where number like '%{$postn}%' or nickname like '%{$postn}%' or name like '%{$postn}%'  order by id desc";

	$row4qq = @$DB->fetch_all_array($sql4);

}
if(!empty($postn)){
		$sql4="SELECT  * FROM wbid where number like '%{$postn}%' or nickname like '%{$postn}%' or name like '%{$postn}%'  order by id desc";

	$row4wb = @$DB->fetch_all_array($sql4);

}
if(!empty($postn)){
		$sql4="SELECT  * FROM ghzl where number like '%{$postn}%' or dname like '%{$postn}%' or name like '%{$postn}%'  order by id desc";

	$row5 = @$DB->fetch_all_array($sql4);

}
if($_SESSION['zid']['number']!='15223232')
{header("Location:./");EXIT; }	