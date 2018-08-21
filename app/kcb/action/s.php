<?php
header("Cache-control: no-cache");
$number=$_SESSION['zid']['number'];
$postn=urldecode($_POST['searchpost']);
	$row1=array();
	$row2=array();
	$row3=array();
if(!empty($postn)&&strlen($postn)!=8){
	$sql1="SELECT  *, count(id) AS num FROM kcb where cteam='".KCBDATE."' and cplace like '%{$postn}%' group by cplace order by id desc";
	$row2 = @$DB->fetch_all_array($sql1);
	$sql2="SELECT  *, count(id) AS num FROM kcb where cteam='".KCBDATE."' and  cteacher like '%{$postn}%' group by cteacher order by id desc";
	$row1 = @$DB->fetch_all_array($sql2);
	$sql4="SELECT  *, count(cplace) AS num FROM kcb where cteam='".KCBDATE."' and  cname like '%{$postn}%' group by cname order by id desc";
	$row4 = @$DB->fetch_all_array($sql4);
}elseif(!empty($postn)&&strlen($postn)==8){$sql3="SELECT  *, count(id) AS num FROM kcb where cteam='".KCBDATE."' and  number like '%{$postn}%' group by number order by id desc";
	$row3 = @$DB->fetch_all_array($sql3);

}
		