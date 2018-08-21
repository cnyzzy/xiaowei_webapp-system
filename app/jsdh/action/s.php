<?php
header("Cache-control: no-cache");
$number=$_SESSION['zid']['number'];
$postn=@urldecode($_POST['searchpost']);
$postn = isset($_GET['searchpost']) ? @urldecode($_GET['searchpost']) : @urldecode($_POST['searchpost']);
	$row1=array();
	$row2=array();
	$row3=array();
if(!empty($postn)&&!is_numeric($postn)){
	$sql1="SELECT  *, count(id) AS num FROM teacherphone where bm like '%{$postn}%' group by bm order by id desc";
	$row1 = @$DB->fetch_all_array($sql1);

	$sql3="SELECT  * FROM teacherphone where name like '%{$postn}%' order by id desc";
	$row3 = @$DB->fetch_all_array($sql3);
}elseif(!empty($postn)&&is_numeric($postn)&&strlen($postn)>6){
		$sql21="SELECT  * FROM teacherphone where bgdh1 like '%{$postn}%' or bgdh2 like '%{$postn}%' or zd like '%{$postn}%' or sjhm1 like '%{$postn}%' or sjhm2 like '%{$postn}%' order by id desc";
	$row2 = @$DB->fetch_all_array($sql21);
}elseif(!empty($postn)&&is_numeric($postn)&&strlen($postn)==5){
		$sql4="SELECT  * FROM teacherphone where jtdh like '%{$postn}%' order by id desc";

	$row4 = @$DB->fetch_all_array($sql4);

}
$yunxu=0;
if($_SESSION['zid']['type']==2)$yunxu=1;
if($_SESSION['zid']['number']=='15223232')$yunxu=1;		