<?php
empty($params[0]) ? $id = '0' : $id =urldecode($params[0]);
empty($params[1]) ? $id2 = '0' : $id2 =urldecode($params[1]);
if($id!='0'&&$id2!='0'){
	 $ida=iconv('UTF-8', 'GBK', $id);

				  $sql = "SELECT * FROM teacherphone WHERE sx='{$id}' and name='{$id2}'";
		$row = $DB->once_fetch_array($sql);	
				
			}		
$yunxu=0;
if($_SESSION['zid']['type']==2)$yunxu=1;
if($_SESSION['zid']['number']=='15223232')$yunxu=1;	
if($_SESSION['zid']['number']=='16318421')$yunxu=1;		