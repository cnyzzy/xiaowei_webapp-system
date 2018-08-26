<?php
header("Cache-control:private");
empty($params[0]) ? $id = '0' : $id = intval($params[0]);
empty($params[1]) ? $idid = '0' : $idid = strip_tags($params[1]);
if(!empty($id)&&!EMPTY($idid)){
	$sql1="SELECT  * FROM xssj2018 where id={$id} and sfzh='{$idid}'";
	$row = @$DB->once_fetch_array($sql1);
}