<?php
empty($params[0]) ? $id = '0' : $id =urldecode($params[0]);
if($id!='0'){
	    $sql = "SELECT * FROM officephone WHERE orders='{$id}' order by id asc";
		$row = @$DB->fetch_all_array($sql);
				
			}		