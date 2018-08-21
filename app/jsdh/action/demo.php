<?php
if(is_file(ZSystem.'/data/app/jsdh/all.php')){
				$arr1 = SetRead( '/system/data/app/jsdh/all.php');
			}else{
		    $sql = "SELECT  * FROM teacherphone  ORDER BY id ASC";
	
		$row = $DB->fetch_all_array($sql);
		      
        
		SSetWrite($row,'all.php');
		$arr1 =$row;
			}
