<?php
require(ZApp.'/' . $AppName . "/pinyin.php");
	    $sql = "SELECT id,xm,py FROM 17xs WHERE py is null order by id asc";
		$row = $DB->fetch_all_array($sql);

           foreach ($row as $sett) {  
			
              $name = $sett['xm'];  
        $id = $sett['id']; 
$PY = pinyin( $name);
$Arr=array('py'=>$PY);

$row = $DB->updateArr('17xs',$Arr,"where id ='{$id}'");
            
           } 		